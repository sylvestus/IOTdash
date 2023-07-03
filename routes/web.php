<?php

use App\Http\Controllers\Help;
use App\Models\NotificationConfig;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\devicesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SaveDistanceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MySubscriptionContoller;
use App\Http\Controllers\NotificationConfigController;

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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::middleware('auth2')->group(
    function () {

        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


        Route::resource('/user_management', UserController::class);
        Route::get('/user_management', [UserController::class, 'index'])->name('user_management');

        Route::resource('/devices', devicesController::class);
        Route::get('/devices', [devicesController::class, 'index'])->name('device_management');

        Route::resource('/site', SiteController::class);
        Route::get('/site', [SiteController::class,'index'])->name('site');

        Route::get('/site/{$id}', [SiteController::class, 'show'])->name('site-locations-details');
        // Route::delete('/site-location/{$id}', [SiteController::class, 'delSiteLocations'])->name('delete-site-locations');
        Route::delete('/delete-site-location/{id}', [SiteController::class, 'delSiteLocations'])->name('delete-site-location');
        Route::post('/add-site-location', [SiteController::class, 'addSiteLocations'])->name('add-site-location');
        Route::put('/update-site-location/{id}', [SiteController::class, 'siteDetailsUpdate'])->name('update-site-location');
        Route::get('/locations-on-site/{id}', [SiteController::class, 'locationsInASite'])->name('locations-on-site');


        Route::get('/', [SaveDistanceController::class, 'index'])->name('home');

        Route::resource('/notification', NotificationController::class);
        Route::get('/notification', [NotificationController::class, 'index'])->name('notification');

        Route::resource('/notification-config', NotificationConfigController::class);

        Route::resource('/subscriptions', SubscriptionController::class);
        Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');
        Route::post('/subscriptions/{id}', [SubscriptionController::class, 'subscribe'])->name('subscriptions.subscribe');

        Route::resource('/mysubscriptions', MySubscriptionContoller::class);
        Route::get('/mysubscriptions', [MySubscriptionContoller::class, 'index'])->name('mysubscriptions');
        Route::post('/save_reciept',[MySubscriptionContoller::class, 'save_reciept'])->name('save_reciept');
        Route::post('/confirm-pay/{id}',[MySubscriptionContoller::class, 'confirm_payment_reciept'])->name('confirm-pay');

        Route::get('/help',[HelpController::class,'index'])->name('help');

        Route::get('/settings',[SettingsController::class,'index'])->name('settings');
    }
);



// Route::get('/', [SaveDistanceController::class, 'index'])->name('home');
// Route::get('/', [SaveDistanceController::class, 'index'])->name('home');
// Route::get('/', [SaveDistanceController::class, 'index'])->name('home');
// Route::get('/', [SaveDistanceController::class, 'index'])->name('home');
// Route::get('/', [SaveDistanceController::class, 'index'])->name('home');
