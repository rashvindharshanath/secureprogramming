<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

	
	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('bookings', function () {
		return view('bookings');
	})->name('bookings');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('login/github', [SessionsController::class, 'redirectToProviderGithub'])->name('login.github');
Route::get('login/github/redirect', [SessionsController::class, 'handleProviderCallbackGithub']);


// google
Route::get('login/google', [SessionsController::class, 'redirectToProviderGoogle'])->name('login.google');
Route::get('callback/google', [SessionsController::class, 'handleProviderCallbackGoogle']);





Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

//Dashboard
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', "App\Http\Controllers\dashboardController@index")->middleware(['auth', 'verified'])->name('dashboard.index');

Route::post(
    '/dashboard/confirmcomplaint',
    "App\Http\Controllers\dashboardController@confirmComplaint"
)->middleware(['auth', 'verified'])->name('dashboard.confirmcomplaint');

Route::get('/complaints', function () {
    return view('complaints');
})->middleware(['auth', 'verified'])->name('complaints');

Route::post('/complaints', "App\Http\Controllers\ComplaintsController@store")->middleware(['auth', 'verified'])->name('complaints.store');
Route::post('/complaints/confirm', "App\Http\Controllers\ComplaintsController@confirm")->middleware(['auth', 'verified'])->name('complaints.confirm');

Route::get('/complaints', "App\Http\Controllers\ComplaintsController@index")->middleware(['auth', 'verified'])->name('complaints.index');



Route::get('/bookings', function () {
    return view('bookings');
})->middleware(['auth', 'verified'])->name('bookings');

Route::post('/bookings', "App\Http\Controllers\BookingController@store")->middleware(['auth', 'verified'])->name('bookings.store');

Route::get('/bookings', "App\Http\Controllers\BookingController@index")->middleware(['auth', 'verified'])->name('bookings.index');

Route::post('/bookings/confirm', "App\Http\Controllers\BookingController@confirm")->middleware(['auth', 'verified'])->name('bookings.confirm');

Route::get('/addbooking', function () {
    return view('addbooking');
})->middleware(['auth', 'verified'])->name('addbooking');



Route::get('/addbookingSuccess', function () {
    return view('addbookingSuccess');
})->middleware(['auth', 'verified'])->name('addbookingSuccess');

Route::post('/addbooking', "App\Http\Controllers\addbookingController@store")->middleware(['auth', 'verified'])->name('addbooking.store');

// qrconfirmbooking
Route::get('/QRconfirmBooking', function () {
    // empty bookings and false statusDone
    return view('QRconfirmBooking', ['bookings' => [], 'doneStatus' => false]);
})->middleware(['auth', 'verified'])->name('QRconfirmBooking');

Route::post('/qrconfirmbooking', "App\Http\Controllers\qrconfirmbookingController@getBookingsFromQR")->middleware(['auth', 'verified'])->name('qrconfirmbooking.getBookingsFromQR');


// page that admin can use to add new items that is bookable
Route::get('/additem', function () {
    return view('additem');
})->middleware(['auth', 'verified'])->name('additem');

Route::post('/additem', "App\Http\Controllers\additemController@store")->middleware(['auth', 'verified'])->name('additem.store');

Route::get('/additem', "App\Http\Controllers\additemController@index")->middleware(['auth', 'verified'])->name('additem.index');






