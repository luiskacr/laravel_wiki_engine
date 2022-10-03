<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MyProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Login & Auth Section
Route::group([
    'middleware'=>'guest',
    ],
    function (){
        Route::get('/login' ,[LoginController::class,'show'] )->name('login');
        Route::post('/login' ,[LoginController::class,'login'] );
        Route::get('reset-password/{token}', [PasswordResetController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [PasswordResetController::class, 'store'])->name('password.update');
        Route::get('forgot-password', [PasswordResetController::class, 'show'])->name('password.request');
        Route::post('forgot-password', [PasswordResetController::class, 'update'])->name('password.email');
    }
);

//Admin Section
Route::group([
        'prefix' => '/home',
        'middleware'=>'auth',
        'name' => 'admin.',
    ],
    function (){
        Route::get('/' ,[HomeController::class,'show'] )->name('admin.home');
        Route::post('/logout', [LoginController::class,'logout'])->name('login.logout');

        //Profile Section
        Route::get('/my-profile/{id}',[MyProfileController::class,'show'])->name('profile');
        Route::put('/my-profile/{id}/update',[MyProfileController::class,'update'])->name('profile.update');
        Route::put('/my-profile/{id}/password',[MyProfileController::class,'password'])->name('profile.password');
        Route::post('/my-profile/{id}/avatarImage',[MyProfileController::class,'avatar'])->name('profile.avatar');

        //Crud's Section
        Route::resource('/users','App\Http\Controllers\Admin\UserController');
        Route::resource('/permission','App\Http\Controllers\Admin\PermissionController');
        Route::resource('/role','App\Http\Controllers\Admin\RoleController');
        Route::resource('/tag','App\Http\Controllers\Admin\TagController');
        Route::resource('/tag','App\Http\Controllers\Admin\TagController');

        //Category & Sub Category
        Route::resource('/category','App\Http\Controllers\Admin\CategoryController');
        Route::get('/category/{category:name}/subcategory/',['App\Http\Controllers\Admin\CategoryController','sub_Index'])->name('subcategory.index');
        Route::post('/category/{category:name}/subcategory',['App\Http\Controllers\Admin\CategoryController','sub_store'])->name('subcategory.store');
        Route::get('/category/{category:name}/subcategory/create',['App\Http\Controllers\Admin\CategoryController','sub_create'])->name('subcategory.create');
        Route::get('/category/{category:name}/subcategory/{subcategory}',['App\Http\Controllers\Admin\CategoryController','sub_show'])->name('subcategory.show');
        Route::get('/category/{category:name}/subcategory/{subcategory}/edit',['App\Http\Controllers\Admin\CategoryController','sub_edit'])->name('subcategory.edit');

    }
);






