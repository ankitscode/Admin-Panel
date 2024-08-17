<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\ProductQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\ProductInformation;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{

    public function productCheckout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'min:10'],
            'address' => ['required', 'string'],
            'query' => ['required', 'string'],
            'city' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            Log::error('#### ProductApiController->productCheckout #### Validation failed');
            Log::error($validator->errors());
            return response()->json(['errors' => $validator->errors()], 422);
        }
        DB::beginTransaction();
        try {
            $query = new ProductQuery;
            $query->name = $request->input('name');
            $query->email = $request->input('email');
            $query->phone = $request->input('phone');
            $query->address = $request->input('address');
            $query->city = $request->input('city');
            $query->query = $request->input('query');
            $query->save();

            $superAdminId = 1;
            $superAdmin = User::find($superAdminId);
            $superAdmin->notify(new ProductInformation($query));
            
            DB::commit();
            return response()->json([
                'response' => $query,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("#### ProductApiController->productCheckout #### ", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Internal Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
