<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\ItemController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//在庫管理
Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/edit/{item}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/itemEdit', [App\Http\Controllers\ItemController::class, 'itemEdit']);
    Route::get('/delete/{item}', [App\Http\Controllers\ItemController::class, 'delete']);
    
});

//注文履歴
Route::prefix('orders')->group(function () {
    Route::get('/', [App\Http\Controllers\OrderController::class, 'history'])->name('history');
    Route::post('/', [App\Http\Controllers\OrderController::class, 'type'])->name('type');

    Route::get('/order/{item}', [App\Http\Controllers\OrderController::class, 'order']);
    Route::post('/itemOrder', [App\Http\Controllers\OrderController::class, 'itemOrder']);
    //新規注文
    Route::get('/add', [App\Http\Controllers\OrderController::class, 'addOrder']);
    Route::post('/add', [App\Http\Controllers\OrderController::class, 'addOrder']);
    
    //注文更新
    Route::get('/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit']);
    Route::post('/orderEdit', [App\Http\Controllers\OrderController::class, 'orderEdit']);
    Route::get('/historyDelete/{id}', [App\Http\Controllers\OrderController::class, 'historyDelete']);
});

//備品検索ツール
    Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('index');
    Route::post('/search', [App\Http\Controllers\SearchController::class, 'type'])->name('type');
    Route::get('/detail/{id}', [App\Http\Controllers\SearchController::class, 'detail'])->name('detail');

    
    

    
    
    

//ユーザー管理画面
    Route::get('/users', [App\Http\Controllers\UserController::class, 'users']);
    Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/memberEdit', [App\Http\Controllers\UserController::class, 'memberEdit']);
    Route::get('/memberDelete/{id}', [UserController::class,'memberDelete']);

});