<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ManageUserController extends Controller
{

  public function index(){
    if (!auth_permission_check('View All Users')) return redirect()->back();
    try {
        return view('admin.users.all_users_list');   
    } catch (\Exception $e) {
        return redirect()->back();
        Log::error('####### ManageUserController -> index() #######  ' . $e->getMessage());
        Session::flash('alert-error', __('message.something_went_wrong'));
        
    }
  }
    
    public function import(Request $request)
  {
    if (!auth_permission_check('Import User')) return redirect()->back();
    try {
      Excel::queueImport(new UsersImport, $request->file('file')->store('files/excel/users'));
      addActionPerformed('users_upload', '', $request->file('file'));
      Session::flash('alert-success', __('message.User_updated_successfully'));
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
      Log::error('####### ManageUserController -> import() #######  ' . $e->getMessage());
      Log::error('####### ManageUserController -> import() #######  faliure ' . $e->failures());
      Session::flash('alert-error', __('message.something_went_wrong'));
      return redirect()->back();
    }
    catch (\Exception $e) {
      Log::error('####### ManageUserController -> import() #######  ' . $e->getMessage());
      Session::flash('alert-error', __('message.something_went_wrong'));
      return redirect()->back();
    }
  }

  public function importViewUsers(){
    if (!auth_permission_check('View All Import Users')) return redirect()->back();
    try {
        return view('admin.users.import_user_file');
    } catch (\Throwable $th) {
        return redirect()->back();
        Log::error('####### ManageUserController -> importViewUsers() #######  ' . $e->getMessage());
        Session::flash('alert-error', __('message.something_went_wrong'));
    }
  }


  public function dataTableUsersListTable(Request $request)
  {
      if (!auth_permission_check('View User Details')) abort(404);

      $query = User::query()->where('usertype', '2');
      // Search key filter
      if ($request->has('filterSearchKey') && !empty($request->filterSearchKey)) {
          $query->where(function ($query) use ($request) {
              $query->where('name', 'like', '%' . $request->filterSearchKey . '%')
                    ->orWhere('email', 'like', '%' . $request->filterSearchKey . '%')
                    ->orWhere('phone', 'like', '%' . $request->filterSearchKey . '%');
          });
      }
      // User type filter
      if ($request->has('filterUserType') && $request->filterUserType != 'all') {
          $query->where('usertype', $request->filterUserType);
      }
  
      // Status filter
      if ($request->has('filterStatus') && in_array($request->filterStatus, ['0', '1'])) {
          $query->where('is_active', $request->filterStatus);
      }
  
      // Order by created_at descending
      $query->orderBy('created_at', 'desc');
  
      // Return JSON response compatible with DataTables AJAX request
      return DataTables::of($query)
          ->addColumn('full_name', function ($user) {
              return $user->full_name;
          })
          ->addColumn('profile_image', function ($user) {
              if ($user->media){ 
                  return asset('/storage/images/profile/' . $user->media->name);
              }else{
                  return asset('/assets/images/users/user-dummy-img.jpg');
              }
          })
          ->addColumn('Action', function ($user) {
              $viewUrl = route('admin.viewUser', $user->id);
              $editUrl = route('admin.editUser', $user->id);
              $deleteUrl = route('admin.destroyUser', $user->id);
          
              $viewBtn = '<a href="' . $viewUrl . '" class="ri-eye-fill fs-16 btn-sm"></a>';
              $editBtn = '<a href="' . $editUrl . '" class="ri-pencil-fill fs-16 btn-sm"></a>';
              $deleteBtn = '<a href="#" data-id="' . $user->id . '" class="ri-delete-bin-5-fill fs-16 text-danger d-inline-block remove-item-btn"></a>';
              
              return $viewBtn . ' ' . $editBtn . ' ' . $deleteBtn;
          })
          ->rawColumns(['profile_image', 'Action'])
          ->make(true);
  }

  public function viewUser($id)
  {
      if (!auth_permission_check('View User Details')) abort(404);

    //   $userDetails = User::with('media', 'interests.category', 'usersubscription.subscription')->find($id);
      $userDetails = User::with('media')->find($id);
    //   dd($userDetails);
      return view('admin.users.view_user', compact('userDetails'));
  }

  public function editUser($id)
  {
      if (!auth_permission_check('Edit User')) abort(404);

      $userDetails = User::where('id', $id)->first();
      return view('admin.users.edit_user', compact('userDetails'));
  }

  public function updateUser(Request $request, $id)
  {
    if (!auth_permission_check('Edit User')) abort(404);

      $request->validate([
          'full_name'         => 'required|string',
          'phone'             => 'required|integer',
          'email'             => 'required',
          'birthdate'         => 'required',
          'gender_type'       => 'required',
    ]);
  
      DB::beginTransaction();
      try {
          $result                 = User::where('id', $id)->first();
          $result->full_name      = $request->full_name;
          $result->name           = str_replace(" ", "", $request->full_name);
          $result->phone          = $request->phone;
          $result->is_active      = $request->has('is_active');
          $result->birthdate      = $request->birthdate;
          $result->gender_type    = $request->gender_type;
          $result->save();
          DB::commit();
          Session::flash('alert-success', __('message.User_updated_successfully'));
          return redirect()->back();
      } catch (\Exception $e) {
          DB::rollBack();
          Log::error('####### ManageUserController -> updateUser() #######  ' . $e->getMessage());
          Session::flash('alert-error', __('message.something_went_wrong'));
          return redirect()->back()->withInput();
      }
  }
  public function updateUserImage(Request $request, $id)
  {
      if (!auth_permission_check('Edit User')) abort(404);

      $validData = validator::make($request->all(), [
          'image' => 'image|mimes:jpeg,jpg,png|max:2048',
      ]);
      if ($validData->fails()) {
          Session::flash('alert-error', $validData->getMessageBag()->first());
          return redirect()->back();
      }

      try {
          #save image
          if ($request->hasFile('image')) {
              $path  = config('image.profile_image_path_store');
              $media = CommenController::saveImage($request->image, $path);
              User::where('id', $id)->update(['media_id' => $media]);
          }

          Session::flash('alert-success', __('message.image_updated_successfully'));
          return redirect()->back();
      } catch (\Exception $e) {
          Log::error('####### HomeController -> updateUserImage() #######  ' . $e->getMessage());
          Session::flash('alert-error', __('message.something_went_wrong'));
          return redirect()->back();
      }
  }

  public function destroyUser($id)
  {
      if (!auth_permission_check('Delete User')) abort(404);

      DB::beginTransaction();
      try {
          User::find($id)->delete();
          DB::commit();
          return response()->json(['status' => 'User deleted successfully']);
      } catch (\Exception $e) {
          DB::rollBack();
          Log::error('####### ManageUserController -> destroyUser() #######  ' . $e->getMessage());
          Session::flash('alert-error', __('message.something_went_wrong'));
          return redirect()->back();
      }
  }
}
