<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Test;
use App\Http\Controllers\admin\GoodsController;
use App\Http\Controllers\admin\ManagerController;
use App\Http\Controllers\TestController;
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



// show
Route::get('/show', function () {
   return view('admin.show');
});


Route::get('/login', [ManagerController::class, 'login']);
Route::post('/login', [ManagerController::class, 'login']);


Route::middleware([\App\Http\Middleware\EnsureUserLogin::class])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    // 路由的前缀已经路由组
    // 商品
    Route::prefix('goods')->group(function () {
        Route::get('/', [GoodsController::class, 'index']);
        Route::get('/create', [GoodsController::class, 'create']);
        Route::get('/edit/{id}', [GoodsController::class, 'edit']);
        Route::get('/read/{id}', [GoodsController::class, 'read']);
        Route::get('/delete/{id}', [GoodsController::class, 'delete']);

        Route::post('/update', [GoodsController::class, 'update']);
        Route::post('/save', [GoodsController::class, 'save']);
    });


    // 管理员
    Route::prefix('manager')->group(function () {
        Route::get('/', [ManagerController::class, 'index']);
        Route::get('/create', [ManagerController::class, 'create']);
        Route::get('/edit/{id}', [ManagerController::class, 'edit']);
        Route::get('/logout', [ManagerController::class, 'logout']);
        Route::get('/delete/{id}', [ManagerController::class, 'delete']);

        Route::post('/save', [ManagerController::class, 'save']);
        Route::post('/update', [ManagerController::class, 'update']);
    });
});





Route::prefix('test')->group(function () {
    Route::get('/test1', [TestController::class, 'test1']);
    Route::get('/test2', function () {
        return view('admin.tmp');
    });

    Route::get('/test3', [TestController::class, 'test3']);
    Route::get('/test4', [TestController::class, 'test4']);

    Route::get('/read/{id}', [GoodsController::class, 'read']);
    Route::get('/success', function () {
        return view('admin.success_jump', [
            'message'=>'你已经提交申请，请您耐心等待！',
            'url' =>'/test1',
           'jumpTime'=>3,
        ]);
    });
});
