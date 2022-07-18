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
    Route::get('/', [MeetingController::class, 'goToDashboard'])->name('dashboard');

    Route::get('/manage', function () {
        return view('user.manage');
    });

    Route::post('/store', [MeetingController::class, 'storeMeetingData'])->name('store');

    Route::get('/shortcut', function () {
        return view('user.shortcut');
    });

    Route::get('/account', function () {
        return view('user.account');
    });

    Route::get('/register', function () {
        return view('master.register');
    });
    Route::post('/register/user', [UserController::class, 'register'])->name('register.user');

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


Route::get('/pagination/ajax', [MeetingController::class, 'paginate']);
Route::get('/pagination', function(){
    return view('user.pagination');
});
Route::post('/tes', function(Request $request){
    dd($request);
});
