<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::group(['middleware'=>['auth']], function(){
    Route::group(['middleware'=>['master']], function(){
        Route::get('/pagination/users', [UserController::class, 'jsonUser']);
        Route::get('/register', [UserController::class, 'getUser']);
        Route::post('/register/user', [UserController::class, 'register'])->name('register.user');
        Route::delete('/delete/user', [UserController::class, 'deleteUser'])->name('delete.user');
    });

    Route::group(['middleware'=>['admin']], function(){
        Route::get('/manage', [MeetingController::class, 'goToManage']);
        Route::post('/store', [MeetingController::class, 'storeMeetingData'])->name('store');
        Route::put('/update', [MeetingController::class, 'updateMeetingData']);
        Route::delete('/delete', [MeetingController::class, 'deleteMeetingData']);
    });

    Route::get('/', [MeetingController::class, 'goToDashboard'])->name('dashboard');

    Route::get('/pagination/ajax', [MeetingController::class, 'paginate']);

    Route::get('/search-data', [MeetingController::class, 'goToSearch'])->name('search');
    Route::get('/search', [MeetingController::class, 'search']);

    Route::get('/account', function () {
        return view('user.account');
    });
    Route::put('/update/password', [UserController::class, 'updatePassword']);

    Route::get('/userguide', function () {
        return view('user.userguide');
    });

    Route::get('/logout', function () {
        Session::flush();
        Session::forget('user');
        Auth::logout();
        return redirect('/login');
    });
});
Route::post('/login/user', [UserController::class, 'login']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/isl', function () {
    return view('user.carrousel');
});