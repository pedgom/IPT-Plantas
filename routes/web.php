<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingController;



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

//only users autenticated and with email verified can access the following routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');

    Route::post('/api-upload', [HomeController::class,'apiUpload'])->name('home.api_upload');
    Route::delete('/api-upload-delete', [HomeController::class,'apiUploadDelete'])->name('home.api_upload_delete');

    Route::post('/renew-model-lock', [HomeController::class,'renewModelLock'])->name('home.renew_model_lock');

    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::get('/users/get-users', [UserController::class,'getUsers'])->name('users.get_users');
    Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class,'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');

    //Route::middleware('can:adminApp')->group(function () { // dava problemas no leave impersonation
    Route::impersonate();
    //});


    Route::resource('roles', RoleController::class)->middleware('can:adminFullApp');
    Route::patch('/roles/{role}/update-permissions', [RoleController::class,'updatePermissions'])->name('roles.update_permissions')->middleware('can:adminFullApp');
    Route::resource('permissions', PermissionController::class)->middleware('can:adminFullApp');

    Route::resource('settings', SettingController::class)->middleware('can:adminFullApp');
    //Route::resource('settings', SettingController::class)->middleware('can:viewAny,App\Models\Setting'); // não funciona porque vai aplicar sempre a mesma policy tinha que separar todas as routes



    /*Route::resource('testes', TesteController::class)->parameters([
        'testes' => 'teste'
    ]); //para escolher um parametro diferentes dava erro e em vez de teste estava a meter testis*/
    Route::get('/demos/get-demos', [App\Http\Controllers\DemoController::class,'getDemos'])->name('demos.get_demos');
    Route::resource('demos', App\Http\Controllers\DemoController::class);

    Route::resource('plantas', App\Http\Controllers\PlantaController::class)->except('index');

});

require __DIR__.'/auth.php';

Route::get('plantas', [App\Http\Controllers\PlantaController::class,'index'])->name('plantas.index');
