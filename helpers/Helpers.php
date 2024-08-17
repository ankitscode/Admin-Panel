<?php

use App\Models\ActionPerformed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


if (!function_exists('auth_permission_check')) {
    /**
     * check user auth and permission.
     *
     * @return boolean|integer
     */
    function auth_permission_check($permission)
    {
        if (!Auth::user()) {
            Session::flash('alert-error', __('message.User not authorized'));
            return false;
        }

        if (!Auth::user()->can($permission)) {
            Session::flash('alert-error', __('message.User does not have permission'));
            return false;
        }
        return true;
    }
}

if (!function_exists('auth_permission_check_any')) {
    /**
     * check user auth and any permission.
     *
     * @return boolean|integer
     */
    function auth_permission_check_any($permission)
    {
        if (!Auth::user()) {
            Session::flash('alert-error', __('message.User not authorized'));
            return false;
        }
        if (!Auth::user()->hasAnyPermission($permission)) {
            Session::flash('alert-error', __('message.User does not have permission'));
            return false;
        }
        return true;
    }

    function addActionPerformed($action = null, $actionId = null, $file = null){

        if(!empty($file)){
          $fileName = $file->getClientOriginalName();
        }else{
          $fileName = null;
        }
  
        ActionPerformed::create([
          'user_id' => Auth::user()->id,
          'file_name' => $fileName,
          'action_id' => $actionId,
          'action_performed' =>  $action
        ]);
  
        return true;
      }
}
