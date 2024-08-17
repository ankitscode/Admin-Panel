<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    public function indexCategory(Request $request)
    {
        if (!auth_permission_check('View All Categories')) return redirect()->back();
        $categories = Category::get();
        return view('admin.catalog.category.categoery_list', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        if (!auth_permission_check('Create Category')) return redirect()->back();
        
        $request->validate([
            'name'    => ['required', 'string', 'max:30', 'regex:/^[a-zA-Z\s]+$/']
        ], [
            'name.regex' => 'The :attribute must only contain letters.',
        ]);

        try {
            $category =  new Category;
            $category->name = $request->name;
            $category->is_active = isset($request->is_active) && $request->is_active == 'on' ? 1 : 0;
            $category->is_menu = isset($request->is_menu) && $request->is_menu == 'on' ? 1 : 0;

            // if ($request->hasFile('image')) {
            //     $path  = config('image.category_image_path_store');
            //     $media = CommenController::saveImage($request->image, $path);
            //     $category->category_image_id  = $media;
            // }
            
            $category->save();
            Session::flash('alert-success', __('message.Category_saved_successfully'));
            return redirect()->route('admin.categoriesList');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('#######  CategoryController -> storeCategory() #####' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function viewCategory($id)
    {
        if (!auth_permission_check('View Category Details')) return redirect()->back();
        try {
            $categories = Category::with('media')->findOrFail($id);
            return view('admin.catalog.categories.view_category', compact('categories'));
        } catch (\Exception $e) {
            Log::error('##### CategoryController -> viewCategory #####' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function editCategory(Request $request, $id)
    {
        if (!auth_permission_check('Edit Category')) return redirect()->back();
        try {
            $categories = Category::find($id);
            if ($request->ajax()) {
                if (!empty($categories)) {
                    return response(["status" => 1, "message" => __('message.category_list'), 'data' => $categories], Response::HTTP_OK);
                } else {
                    return response(["status" => 1, "message" => __('message.category_list'), 'data' => 'empty'], Response::HTTP_OK);
                }
            }
            return view('admin.catalog.categories.edit_category', compact('categories', 'parent_categories'));
        } catch (\Exception $e) {
            if ($request->ajax()) {
                Log::error('######## CategoryController -> editCategory() #######  ' . $e->getMessage());
                return response()->json(["status" => 0, "message" => __('message.something_went_wrong')], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            Log::error('#######  CategoryController -> editCategory() #####' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function updateCategory(Request $request, $id)
    {
        if (!auth_permission_check('Edit Category')) return redirect()->back();

        $request->validate([
            'category_name'    => ['required', 'string', 'max:30', 'regex:/^[a-zA-Z\s]+$/']
        ], [
            'category_name.regex' => 'The :attribute must only contain letters.',
        ]);
        
        DB::beginTransaction();
        try {
            $category =  Category::findOrFail($id);
            $category->name = $request->category_name;
            $category->is_active = isset($request->is_active) && $request->is_active == 'on' ? true : false;
            $category->is_menu = isset($request->is_menu) && $request->is_menu == 'on' ? true : false;

            //  if ($request->hasFile('image')) {
            //      $path  = config('image.category_image_path_store');
            //      $media = CommenController::saveImage($request->image, $path);
            //      $category->category_image_id  = $media;
            //  }
            $category->save();
            DB::commit();
            Session::flash('alert-success', __('message.Category_updated_successfully'));
            return redirect()->route('admin.categoriesList');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('#######  CategoryController -> updateCategory() #####' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function destroyCategory($id)
    {
        if (!auth_permission_check('Delete Category')) return redirect()->back();
        DB::beginTransaction();
        try {
            Category::where('id', $id)->delete();
            DB::commit();
            return response()->json(['status' => 'Category deleted successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('####### CategoryController -> destroyCategory() #######  ' . $e->getMessage());
            Session::flash('alert-error', __('message.something_went_wrong'));
            return redirect()->back();
        }
    }

    public function dataTablecategory(Request $request)
    {
        if (!auth_permission_check('View Category Details')) return redirect()->back();
        
        $query = Category::query();
        // Apply search filters
        if ($request->filled('filterSearchKey')) {
            $searchKey = $request->filterSearchKey;
            $query->where(function ($query) use ($searchKey) {
                $query->where('name', 'like', '%' . $searchKey . '%');
            });
        }
        // Apply status filter
        if ($request->filled('filterStatus') && in_array($request->filterStatus, ['0', '1'])) {
            $query->where('is_active', $request->filterStatus);
        }
        
        $query->orderBy('created_at', 'desc');

        if (!empty($query)) {
            return DataTables::of($query)->make(true);
        }
        return DataTables::of([])->make(true);
    }

    // ======================================================================================

    public static function categoryImage($image)
    {
        if (isset($image) && !empty($image)) {
            return url(config('image.api_category_image_path_view') . $image);
        } else {
            return null;
        }
    }
}
