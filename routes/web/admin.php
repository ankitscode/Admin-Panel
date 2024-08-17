<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManageRoleController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\NotificationController;


Route::group(
    [
        'middleware' => ['auth'],

    ],
    function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [HomeController::class, 'profile'])->name('admin.profile');
        Route::get('/notificationslist', [HomeController::class, 'notification'])->name('admin.notificaton');
        Route::post('/profile/updated', [HomeController::class, 'updateProfile'])->name('admin.updateProfile');
        Route::post('/profile/update-profile-image', [HomeController::class, 'updateProfileImage'])->name('admin.updateProfileImage');
        Route::get('/change-password', [HomeController::class, 'changePassword'])->name('admin.changePassword');
        Route::post('/change-password/store', [HomeController::class, 'changePasswordStore'])->name('admin.changePasswordStore');
        Route::post('/notification', [HomeController::class, 'newOrderNotification'])->name('admin.newOrderNotification');
        Route::post('/mark-as-read', [HomeController::class, 'markNotification'])->name('admin.markNotification');
        Route::get('/change-language/{lang}', [HomeController::class, 'changeLanguage'])->name('admin.changeLanguage');

        Route::group(['prefix' => 'users'], function () {

            Route::group(['prefix' => 'admin',], function () {
                Route::get('/', [AdminController::class, 'adminList'])->name('admin.adminList');
                Route::get('/create', [AdminController::class, 'createAdmin'])->name('admin.createAdmin');
                Route::post('/store', [AdminController::class, 'storeAdmin'])->name('admin.storeAdmin');
                Route::get('/view/{uuid}', [AdminController::class, 'viewAdmin'])->name('admin.viewAdmin');
                Route::get('/edit/{uuid}', [AdminController::class, 'editAdmin'])->name('admin.editAdmin');
                Route::post('/edit/{uuid}', [AdminController::class, 'updateAdmin'])->name('admin.updateAdmin');
                Route::post('/image-upload/{uuid}', [AdminController::class, 'updateImage'])->name('admin.updateImage');
                Route::delete('/delete/{id}', [AdminController::class, 'destroyAdmin'])->name('admin.destroyAdmin');
            });
            Route::group(['prefix' => 'userlist',], function () {
                Route::get('/', [ManageUserController::class, 'index'])->name('admin.usersList');
                Route::post('/', [ManageUserController::class, 'import'])->name('admin.importUsers');
                Route::get('/view/{id}', [ManageUserController::class, 'viewUser'])->name('admin.viewUser');
                Route::get('/edit/{id}', [ManageUserController::class, 'editUser'])->name('admin.editUser');
                Route::post('/user-image/{id}', [ManageUserController::class, 'updateUserImage'])->name('admin.updateUserImage');
                Route::post('/edit/{id}', [ManageUserController::class, 'updateUser'])->name('admin.updateUser');
                Route::delete('/deleteuser/{id}', [ManageUserController::class, 'destroyUser'])->name('admin.destroyUser');
                Route::get('/import', [ManageUserController::class, 'importViewUsers'])->name('admin.importViewUsers');
            });

            Route::group(['prefix' => 'role',], function () {
                Route::get('/', [ManageRoleController::class, 'index'])->name('admin.roleList');
                Route::get('/create', [ManageRoleController::class, 'create'])->name('admin.createRole');
                Route::post('/store', [ManageRoleController::class, 'store'])->name('admin.storeRole');
                Route::get('/show/{id}', [ManageRoleController::class, 'show'])->name('admin.showRole');
                Route::get('/edit/{id}', [ManageRoleController::class, 'edit'])->name('admin.editRole');
                Route::post('/update/{id}', [ManageRoleController::class, 'update'])->name('admin.updateRole');
                Route::post('/destroy/{id}', [ManageRoleController::class, 'destroy'])->name('admin.destroyRole');
            });
        });

        Route::group(['prefix' => 'catalog'], function () {

            #Catalog/Products route
            Route::group(['prefix' => 'products',], function () {
                Route::get('/', [ProductController::class, 'getProduct'])->name('admin.productList');
                Route::get('/create', [ProductController::class, 'productCreate'])->name('admin.createProduct');
                Route::post('/store', [ProductController::class, 'productStore'])->name('admin.storeProduct');
                Route::get('/view/{id}', [ProductController::class, 'productView'])->name('admin.viewProduct');
                Route::get('/edit/{id}', [ProductController::class, 'productedit'])->name('admin.editProduct');
                Route::post('/update/{id}', [ProductController::class, 'productupdate'])->name('admin.updateProduct');
                // Route for updating product details
                Route::post('/update-product/{id}', [ProductController::class, 'uploadProductImage'])->name('admin.uploadProductImage');


                Route::get('/deleteproduct/{id}', [ProductController::class, 'productDestroy'])->name('admin.destroyProduct');
                Route::get('/importproducts', [ProductController::class, 'importViewProducts'])->name('admin.importViewProducts');
                Route::post('/importproductsfile', [ProductController::class, 'importProducts'])->name('admin.importProducts');
            });

            #Catalog/Catogries route
            Route::group(['prefix' => 'categories',], function () {
                Route::get('/allcategories', [CategoryController::class, 'indexCategory'])->name('admin.categoriesList');
                Route::post('/store', [CategoryController::class, 'storeCategory'])->name('admin.storeCategory');
                Route::get('/view/{id}', [CategoryController::class, 'viewCategory'])->name('admin.viewCategory');
                Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
                Route::post('/update/{id}', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
                Route::delete('/delete/{id}', [CategoryController::class, 'destroyCategory'])->name('admin.destroyCategory');
            });
        });

        Route::group(['prefix' => 'notification',], function () {

            Route::get('/allnotification', [NotificationController::class, 'getnotification'])->name('admin.getNotification');
            Route::get('/deleteallnotification', [NotificationController::class, 'deleteAllNotificatons'])->name('admin.deleteNotification');
            Route::post('/markedallasread', [NotificationController::class, 'markedAllNotificationAsRead'])->name('admin.markedAllNotificationAsRead');
        });
    }
);
