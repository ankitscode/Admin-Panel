<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManageRoleController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\NotificationController;


Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => 'dataTable'
    ],
    function () {

        Route::get('/allusersdatatable',[ManageUserController::class,'dataTableUsersListTable'])->name('dataTable.dataTableUsersListTable');
        Route::get('/alladminsdatatable',[AdminController::class,'dataTableAdminsListTable'])->name('dataTable.dataTableAdminsListTable');
        Route::get('/allproductsdatatable',[ProductController::class,'dataTableProductsListTable'])->name('dataTable.dataTableProductTable');
        Route::get('/category-table', [CategoryController::class, 'dataTablecategory'])->name('dataTable.dataTablecategoriestable');
        Route::get('/roles-list-table', [ManageRoleController::class, 'dataTableRolesListTable'])->name('dataTable.dataTableRolesListTable');
        Route::get('/userallnotification',[NotificationController::class,'userNotificationDataTable'])->name('dataTable.userNotificationdataTable');
    }

);
