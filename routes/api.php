<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\Auth\ApiLogin;
// use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\HelpController;
use App\Http\Controllers\Api\SiteController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\devicesController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SaveDistanceController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\MySubscriptionContoller;
use App\Http\Controllers\Api\NotificationConfigController;
// /var/www/html/proximity_sb2/app/Http/Controllers/Api/SettingsController.php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/apilogin', [ApiLogin::class, 'login'])->name('apilogin');
Route::post('/apiregister', [RegisterController::class, 'register'])->name('apiregister');



Route::middleware('auth:api')->group(function () {



    Route::post('/logout-api', [ApiLogin::class, 'logout'])->name('logout-api');


    Route::resource('/user_management-api', UserController::class);
    Route::get('/user_management-api', [UserController::class, 'index'])->name('user_management-api');

    Route::resource('/devices-api', devicesController::class);
    Route::get('/devices-api', [devicesController::class, 'index'])->name('device_management-api');

    Route::resource('/site-api', SiteController::class);
    Route::get('/site-api', [SiteController::class, 'index'])->name('site-api');

    Route::get('/site-api/{$id}', [SiteController::class, 'show'])->name('site-locations-details-api');
    // Route::delete('/site-location/{$id}', [SiteController::class, 'delSiteLocations'])->name('delete-site-locations');
    Route::delete('/delete-site-location-api/{id}', [SiteController::class, 'delSiteLocations'])->name('delete-site-location-api');
    Route::post('/add-site-location-api', [SiteController::class, 'addSiteLocations'])->name('add-site-location-api');
    Route::put('/update-site-location-api/{id}', [SiteController::class, 'siteDetailsUpdate'])->name('update-site-location-api');
    Route::get('/locations-on-site-api/{id}', [SiteController::class, 'locationsInASite'])->name('locations-on-site-api');


    Route::get('/', [SaveDistanceController::class, 'index'])->name('home-api');
    Route::resource('/savedistance-api', saveDistanceController::class);

    Route::resource('/notification-api', NotificationController::class);
    Route::get('/notification-api', [NotificationController::class, 'index'])->name('notification-api');

    Route::resource('/notification-config-api', NotificationConfigController::class);

    Route::resource('/subscriptions-api', SubscriptionController::class);
    Route::get('/subscriptions-api', [SubscriptionController::class, 'index'])->name('subscriptions-api');
    Route::post('/subscriptions-api/{id}', [SubscriptionController::class, 'subscribe'])->name('subscriptions.subscribe-api');

    Route::resource('/mysubscriptions-api', MySubscriptionContoller::class);
    Route::get('/mysubscriptions-api', [MySubscriptionContoller::class, 'index'])->name('mysubscriptions-api');
    Route::post('/save_reciept-api', [MySubscriptionContoller::class, 'save_reciept'])->name('save_reciept-api');
    Route::post('/confirm-pay-api/{id}', [MySubscriptionContoller::class, 'confirm_payment_reciept'])->name('confirm-pay-api');

    Route::get('/help-api', [HelpController::class, 'index'])->name('help-api');

    Route::get('/settings-api', [SettingsController::class, 'index'])->name('settings-api');
});
        // Route::post('/savedistance', [SaveDistanceController::class, 'store'])->name('savedistance');
