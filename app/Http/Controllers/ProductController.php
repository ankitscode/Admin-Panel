<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CommenController;


class ProductController extends Controller
{
    public function importViewProducts()
    {

        return view('admin.catalog.products.import_product_file');
    }

    public function importProducts(Request $request)
    {
        try {
            Excel::queueImport(new ProductImport, $request->file('file')->store('files/excel/products'));
            addActionPerformed('Product_upload', '', $request->file('file'));
            Session::flash('alert-success', __('message.Product_uploaded_successfully'));
            return redirect()->back();
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
                Log::alert('message row ' .
                    json_encode($failure->row()) .
                    'attribute' . json_encode($failure->errors()) .
                    'values' . json_encode($failure->values()));
                Session::flash('alert-error', $failure->errors()[0]);
            }
            Log::error('####### ProductController -> importProducts() #######  ' . $e->getMessage());
            Log::error('####### ProductController -> importProducts() #######  faliure ' . $e->failures());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('####### ProductController -> importProducts() #######  ' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back();
        }
    }

    public function getProduct()
    {

        return view('admin.catalog.products.all_product_list');
    }

    public function productCreate()
    {
        if (!auth_permission_check('Create Product')) abort(404);
        try {
            return view('admin.catalog.products.create_product');
        } catch (\Exception $e) {
            Log::error('##### ProductController -> productView() #####' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back();
        }
    }

    public function productStore(Request $request)
    {
        // dd($request->all());
        if (!auth_permission_check('Create Product')) {
            abort(404);
        }

        try {
            // Validate request
            $request->validate([
                'product_name' => 'required',
                'price' => 'required|integer',
                'description' => 'required',
                'category_id' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png|max:4048',
            ]);

            // Start transaction
            DB::beginTransaction();
            $uniqueCode = now()->second . rand(1000, 9999);
            // Create product
            $product = Product::create([
                'uniquecode' => $uniqueCode,
                'productname' => $request->product_name,
                'price' => $request->price,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'is_active' => isset($request->is_active) && $request->is_active == 'on',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $path = config('image.product_image_path_store');
                $media = CommenController::saveImage($request->file('image'), $path, 'product', $product->id);
                $product->media_id = $media;
                $product->save();
            }

            // Commit transaction
            DB::commit();

            // Flash success message and redirect
            Session::flash('alert-success', __('message.product_added_to_wishlist'));
            return redirect()->route('admin.productList');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('##### ProductController -> productStore() #####' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function productView($id)
    {
        if (auth_permission_check('View Product Details'));
        try {
            $productDetails = Product::with('media', 'category')->find($id);
            // dd($productDetails);
            return view('admin.catalog.products.view_product', compact('productDetails'));
        } catch (\Exception $e) {
            Log::error('##### ProductController -> productView() #####' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back();
        }
    }


    public function productEdit($id)
    {
        if (!auth_permission_check('Edit Product')) abort(404);
        try {
            $productDetails = Product::with('category', 'media')->findOrFail($id);
            $categories = Category::where('is_active', 1)->get();
            // dd($productDetails,$categories);
            return view('admin.catalog.products.edit_product', compact('id', 'productDetails', 'categories'));
        } catch (\Exception $e) {
            Log::error('####### ProductController -> productEdit() #######  ' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back()->withInput();
        }
    }
    public function productUpdate(Request $request)
    {
        dd($request->all());
        if (!auth_permission_check('Edit Product')) abort(404);
        try {
            $request->validate([
                'product_name' => 'required',
                'price'        => 'required|integer',
                'description'  => 'required',
                'category_id'  => 'required',
                'image'        => 'image|mimes:jpeg,jpg,png|max:4048',
            ]);
            $uniqueCode = now()->second . rand(1000, 9999);
            DB::beginTransaction();
            $product = Product::with('category', 'media')->findOrFail($request->id);
            $product->uniquecode = $uniqueCode;
            $product->productname = $request->product_name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->is_active = isset($request->is_active) && $request->is_active == 'on' ? true : false;

            if ($request->hasFile('images')) {
                $path  = config('image.product_image_path_store');
                $media = CommenController::saveImage($request->file('images'), $path, 'product', $product->id);
                $product->media_id = $media;
            }
            // dd( $product);
            $product->save();
            DB::commit();
            Session::flash('alert-success', __('message.product_updated_successfully'));
            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('##### ProductController -> productUpdate() #####' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function uploadProductImage(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'images.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
        ]);
    
        try {
            DB::beginTransaction();
    
            $product = Product::findOrFail($id);
    
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = config('image.product_image_path_store'); 
                    $mediaId = commencontroller::saveImage($image, $path, 'product', $product->id);
                    
                    if ($mediaId) {
                        $product->media()->updateOrCreate(
                            ['product_id' => $product->id, 'media_id' => $mediaId]
                        );
                    }
                }
            }
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Product images uploaded successfully',
            ], 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error: ' . json_encode($e->errors()));
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in uploadProductImage: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }
    



    public function productDestroy($id)
    {
        if (!auth_permission_check('Delete Product')) abort(404);
        DB::beginTransaction();
        try {
            $Product = Product::find($id);
            $Product->delete();
            DB::commit();
            Session::flash('alert-success', __('message.product_deleted_successfully'));
            return response()->json(['status' => 'Product deleted successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('####### ProductController -> productDestroy() #######  ' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return response()->json(['status' => __('message.something_went_wrong')]);
        }
    }

    public function dataTableProductsListTable(Request $request)
    {
        $query = Product::with('media', 'category')
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc');

        ## Search Filter
        if ($request->filled('filterSearchKey')) {
            $searchKey = $request->filterSearchKey;
            $query->where(function ($query) use ($searchKey) {
                $query->where('productname', 'like', '%' . $searchKey . '%');
            });
        }

        ## Apply Status Filter
        if ($request->filled('filterStatus') && in_array($request->filterStatus, ['0', '1'])) {
            $query->where('is_active', $request->filterStatus);
        }

        return Datatables::of($query)
            ->addColumn('product_image', function ($product) {
                if ($product->media) {
                    return asset('/storage/images/product/' . $product->media->name);
                } else {
                    return asset('/assets/images/users/user-dummy-img.jpg');
                }
            })
            ->addColumn('Action', function ($product) {
                $link = '<a href="' . route('admin.viewProduct', $product->id) . '" class="ri-eye-fill fs-16 btn-sm"></a> ' .
                    '<a href="' . route('admin.editProduct', $product->id) . '" class="ri-pencil-fill fs-16 btn-sm"></a> ' .
                    '<a href="#" data-id="' . $product->id . '" class="ri-delete-bin-5-fill fs-16 text-danger d-inline-block remove-item-btn"></a>';
                return $link;
            })
            ->rawColumns(['Action'])
            ->make(true);
    }
}
