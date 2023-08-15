<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DiariesController;
use App\Http\Controllers\DocumentationsController;
use App\Http\Controllers\ApprovalRequestsController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::resource('admin/diaries', DiariesController::class);


Route::resource('diaries', DiariesController::class);
Route::resource('documentations', DocumentationsController::class);
Route::resource('documentation', DocumentationsController::class);
Route::resource('approval_request', ApprovalRequestsController::class);
Route::resource('users', UsersController::class);

Route::get('users', ['uses'=>'App\Http\Controllers\UsersController@index', 'as'=>'users.index']);
