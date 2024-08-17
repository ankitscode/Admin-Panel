<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Notification;


class NotificationController extends Controller
{

    public function userNotificationDataTable(Request $request)
    {
        $query = Notification::selectRaw("
            id, 
            type, 
            JSON_UNQUOTE(JSON_EXTRACT(data, '$.username')) as username,
            JSON_UNQUOTE(JSON_EXTRACT(data, '$.email')) as email,
            JSON_UNQUOTE(JSON_EXTRACT(data, '$.phone')) as phone,
            JSON_UNQUOTE(JSON_EXTRACT(data, '$.message')) as message
        ")
        ->whereNotNull('data');

        if ($request->filled('filterSearchKey')) {
            $searchKey = $request->filterSearchKey;
            $query->where(function ($query) use ($searchKey) {
                $query->where('data', 'like', '%' . $searchKey . '%')
                      ->orWhere('type', 'like', '%' . $searchKey . '%');
            });
        }

        $query->orderBy('created_at', 'desc')
              ->orderBy('updated_at', 'desc');

        return DataTables::of($query)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getnotification()
    {
        // if (!auth_permission_check('View All Notifications')) return redirect()->back();

        return view('admin.users.notification.all_user_notification');
    }


    public function deleteAllNotificatons()
    {
        if (!auth_permission_check('Delete All Notifications')) return redirect()->back();

        $notificationCount = DB::table('notifications')->count();
        if ($notificationCount > 0) {
            DB::table('notifications')->delete();
            Session::flash('alert-success', __('message.notifications_deleted_successfully'));
            return response()->json(['status' => 'Notifications deleted successfully']);
        } else {
            Session::flash('alert-info', __('message.no_notifications_to_delete'));
            return response()->json(['status' => 'No notifications to delete']);
        }
    }

    public function markedAllNotificationAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return response()->json(['message' => 'All notifications marked as read.']);
    }
}
