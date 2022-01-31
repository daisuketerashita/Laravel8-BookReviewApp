<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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
Auth::routes();

Route::get('/', [ReviewController::class, 'index'])->name('index');

Route::group(['middleware' => 'auth'],function(){
    //新規作成
    Route::get('/review/',[ReviewController::class,'create'])->name('create');
    Route::post('/review/store/',[ReviewController::class,'store'])->name('store');
});
