<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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


Route::get('/storebooking',[App\Http\Controllers\BookingController::class,"storebooking"]);
Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sentmail', [App\Http\Controllers\HomeController::class, 'sentmail']);

Route::get('/testmail',[HomeController::class,'sentmail']);


Route::group(['middleware' => ['CheckAdminLogin']], function () {
Route::post('/getAdminNotifications',[App\Http\Controllers\AdminController::class,'getAdminNotifications']);
Route::get('/readNotification/{id}',[App\Http\Controllers\AdminController::class,'readNotification']);
Route::get('/dashboard' , [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/profile' , [App\Http\Controllers\AdminController::class, 'getprofiledata']);
Route::get('/edit/profile' , [App\Http\Controllers\AdminController::class, 'edit_profile']);
Route::put('/update/{id}/profile' , [App\Http\Controllers\AdminController::class, 'update_profile']);


  Route::get('/clear/route', [App\Http\Controllers\AdminController::class, 'clearRoute']);




// Coach

Route::get('/coach' , [App\Http\Controllers\CoachController::class, 'index']);
Route::get('/coach/create' , [App\Http\Controllers\CoachController::class , 'create']);
Route::post('/coach/store' , [App\Http\Controllers\CoachController::class, 'store']);
Route::get('/coach/{id}/edit' , [App\Http\Controllers\CoachController::class, 'edit']);
Route::put('/coach/{id}/update' , [App\Http\Controllers\CoachController::class, 'update']);
Route::get('/coach/{id}/delete' , [App\Http\Controllers\CoachController::class, 'delete']);
Route::get('/coach/{id}/show' , [App\Http\Controllers\CoachController::class, 'show']);
Route::get('/coach/{id}/status' , [App\Http\Controllers\CoachController::class, 'show_account_status']);
Route::put('/coach/ChangePassword/{id}' , [App\Http\Controllers\CoachController::class, 'ChangePassword']);
Route::get('/coach/downloadMedia/{id}' , [App\Http\Controllers\CoachController::class, 'downloadMedia']);

Route::get('/coach/{id}' , [App\Http\Controllers\CoachController::class, 'Coach']);

// Coachee

Route::get('/coachee' ,           [App\Http\Controllers\CoachController::class, 'CoacheeAccounts']);
Route::get('/coachee/{id}/edit' , [App\Http\Controllers\CoachController::class, 'edit']);
Route::put('/coachee/{id}/update' , [App\Http\Controllers\CoachController::class, 'update']);
Route::get('/coachee/{id}/delete' , [App\Http\Controllers\CoachController::class, 'delete']);
Route::get('/coachee/{id}/show' ,   [App\Http\Controllers\CoachController::class, 'show']);
Route::get('/coachee/{id}/status' , [App\Http\Controllers\CoachController::class, 'show_account_status']);

// Web Setting

Route::get('/web_setting/create' , [App\Http\Controllers\WebSettingController::class, 'create']);
Route::post('/web_setting/store' , [App\Http\Controllers\WebSettingController::class, 'store']);
Route::get('/web_setting' , [App\Http\Controllers\WebSettingController::class, 'index']);
Route::get('/web_setting/{id}/edit' , [App\Http\Controllers\WebSettingController::class, 'edit']);
Route::put('/web_setting/{id}/update' , [App\Http\Controllers\WebSettingController::class, 'update']);

//Email configuration

Route::get('/sitesetting' , [App\Http\Controllers\SiteSettingController::class, 'index']);


Route::get('/email_controls', [App\Http\Controllers\EmailConfigurationController::class, 'index']);
Route::get('/email_controls/sentmail' , [App\Http\Controllers\EmailConfigurationController::class, 'sentmail']);

// Coachee

Route::get('/coachee' ,           [App\Http\Controllers\CoachController::class, 'CoacheeAccounts']);
Route::get('/coachee/{id}/edit' , [App\Http\Controllers\CoachController::class, 'edit']);
Route::put('/coachee/{id}/update' , [App\Http\Controllers\CoachController::class, 'update']);
Route::get('/coachee/{id}/delete' , [App\Http\Controllers\CoachController::class, 'delete']);
Route::get('/coachee/{id}/show' ,   [App\Http\Controllers\CoachController::class, 'show']);
Route::get('/coachee/{id}/status' , [App\Http\Controllers\CoachController::class, 'show_account_status']);

// Web Setting

Route::get('/web_setting/create' , [App\Http\Controllers\WebSettingController::class, 'create']);
Route::post('/web_setting/store' , [App\Http\Controllers\WebSettingController::class, 'store']);
Route::get('/web_setting' , [App\Http\Controllers\WebSettingController::class, 'index']);
Route::get('/web_setting/{id}/edit' , [App\Http\Controllers\WebSettingController::class, 'edit']);
Route::put('/web_setting/{id}/update' , [App\Http\Controllers\WebSettingController::class, 'update']);



Route::get('/websetting/create' , [App\Http\Controllers\WebSettingController::class, 'create']);
Route::post('/websetting/store' , [App\Http\Controllers\WebSettingController::class, 'store']);
Route::get('/websetting' , [App\Http\Controllers\WebSettingController::class, 'index']);
Route::get('/websetting/{id}/edit' , [App\Http\Controllers\WebSettingController::class, 'edit']);
Route::put('/websetting/{id}/update' , [App\Http\Controllers\WebSettingController::class, 'update']);


//Email configuration

Route::get('/email_controls', [App\Http\Controllers\EmailConfigurationController::class, 'index']);


Route::get('/email_controls/sent', [App\Http\Controllers\EmailConfigurationController::class, 'sent']);


Route::get('/email_controls/{id}/edit' , [App\Http\Controllers\EmailConfigurationController::class, 'edit']);
Route::put('/email_controls/{id}/update' , [App\Http\Controllers\EmailConfigurationController::class, 'update']);
// Category


Route::get('/category' , [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/category/create' , [App\Http\Controllers\CategoryController::class, 'create']);
Route::post('/category/store' , [App\Http\Controllers\CategoryController::class, 'store']);
Route::get('/category/{id}/edit' , [App\Http\Controllers\CategoryController::class, 'edit']);
Route::put('/category/{id}/update' , [App\Http\Controllers\CategoryController::class, 'update']);
Route::get('/category/{id}/delete' , [App\Http\Controllers\CategoryController::class, 'delete']);

// Blog


Route::get('/blog' , [App\Http\Controllers\BlogController::class, 'index']);
Route::get('/blog/create' , [App\Http\Controllers\BlogController::class, 'create']);
Route::post('/blog/store' , [App\Http\Controllers\BlogController::class, 'store']);
Route::get('/blog/{id}/edit' , [App\Http\Controllers\BlogController::class, 'edit']);
Route::put('/blog/{id}/update' , [App\Http\Controllers\BlogController::class, 'update']);
Route::get('/blog/{id}/delete' , [App\Http\Controllers\BlogController::class, 'delete']);
Route::get('/blog/{id}/status' , [App\Http\Controllers\BlogController::class, 'ChangeStatusById']);
Route::get('showpublishdraftblog/{id}' , [App\Http\Controllers\BlogController::class, 'ShowPublishDraftBlog']);

// Service Category

Route::get('/service_category' , [App\Http\Controllers\ServiceCategoryController::class, 'index']);
Route::get('/service_category/create' , [App\Http\Controllers\ServiceCategoryController::class, 'create']);
Route::post('/service_category/store' , [App\Http\Controllers\ServiceCategoryController::class, 'store']);
Route::get('/service_category/{id}/edit' , [App\Http\Controllers\ServiceCategoryController::class, 'edit']);
Route::put('/service_category/{id}/update' , [App\Http\Controllers\ServiceCategoryController::class, 'update']);
Route::get('/service_category/{id}/delete' , [App\Http\Controllers\ServiceCategoryController::class, 'delete']);

// Caoch Services

Route::get('/service_status/{id}' , [App\Http\Controllers\ServiceCategoryController::class, 'service_status']);


Route::get('/author' , [App\Http\Controllers\AuthorController::class, 'index']);
Route::post('/author/store' , [App\Http\Controllers\AuthorController::class, 'store']);
Route::put('/author/{id}/update' , [App\Http\Controllers\AuthorController::class, 'update']);
Route::get('/author/{id}/delete' , [App\Http\Controllers\AuthorController::class, 'delete']);

});


Route::post('/forget_password' , [App\Http\Controllers\AdminController::class, 'forget_password']);
Route::get('/getpassword/link/{email}' , [App\Http\Controllers\AdminController::class, 'getlinkforpassword']);
Route::put('/UpdatePassword/{email}' , [App\Http\Controllers\AdminController::class, 'UpdatePassword']);


//payment gateway

Route::get('/paymentmethod', [App\Http\Controllers\PaymentmethodController::class, 'index']);
Route::get('/paymentmethod/edit/{id}' , [App\Http\Controllers\PaymentmethodController::class, 'edit']);
Route::get('/paymentgateway', [App\Http\Controllers\PaymentGatewaysController::class, 'index']);
Route::put('/paymentmethod/update/{id}' , [App\Http\Controllers\PaymentmethodController::class, 'update']);
Route::put('/paymentmethod/status_update/{id}' , [App\Http\Controllers\PaymentmethodController::class, 'statusupdate']);
Route::get('/paymentgateway/{id}/status' , [App\Http\Controllers\PaymentGatewaysController::class, 'show_account_status']);

// Transaction

Route::get('/transaction' , [App\Http\Controllers\TransactionController::class, 'index']);

// service calender

Route::get('/servicecalender' , [App\Http\Controllers\ServiceCalendarController::class, 'index']);



// Booking

Route::get('/booking' , [App\Http\Controllers\BookingController::class, 'index']);


// Deposite

Route::get('/deposite' , [App\Http\Controllers\DepositeController::class, 'index']);
Route::get('/deposite/{id}/update/' , [App\Http\Controllers\DepositeController::class, 'deposite_status']);


// Deposite

Route::get('/payout' , [App\Http\Controllers\PayoutController::class, 'index']);
Route::put('/payoutdate', [App\Http\Controllers\DepositeController::class, 'payoutdate']);


Route::get('/payout/{id}/update/' , [App\Http\Controllers\PayoutController::class, 'payout_status']);


// Notification


Route::get('/getCustomFilterData' , [App\Http\Controllers\notificationController::class, 'getCustomFilterData']);


// Notification

Route::get('/notification' , [App\Http\Controllers\UserNotificationsController::class, 'index']);
Route::get('/notification/create' , [App\Http\Controllers\UserNotificationsController::class, 'create']);
Route::post('/notification/store' , [App\Http\Controllers\UserNotificationsController::class, 'store']);
// sansowallet

Route::get('/sansowallet' , [App\Http\Controllers\SansoWalletsController::class, 'index']);


// Review and likes

Route::get('/reviews' , [App\Http\Controllers\ReviewController::class, 'index']);
Route::get('/addreviews' , [App\Http\Controllers\ReviewController::class, 'addreviews']);
Route::post('/storereviews',[App\Http\Controllers\ReviewController::class, 'storereviews']);
Route::get('/allreviews',[App\Http\Controllers\ReviewController::class, 'allreviews']);
Route::get('/likes' , [App\Http\Controllers\LikesController::class, 'index']);

// payment_card

Route::get('/payment_card' , [App\Http\Controllers\PaymentCardController::class, 'index']);
Route::get('/payment_card/edit/{id}' , [App\Http\Controllers\PaymentCardController::class, 'edit']);
Route::put('/payment_card/update/{id}' , [App\Http\Controllers\PaymentCardController::class, 'update']);

// Topic

Route::get('/topic' , [App\Http\Controllers\TopicController::class, 'index']);
Route::get('/topic/edit/{id}' , [App\Http\Controllers\TopicController::class, 'edit']);
Route::put('/topic/{id}/update/' , [App\Http\Controllers\TopicController::class, 'update']);
Route::get('/topic/create' , [App\Http\Controllers\TopicController::class, 'create']);
Route::post('/topic/store' , [App\Http\Controllers\TopicController::class, 'store']);

//sitelog

Route::get('/coachlog' , [App\Http\Controllers\SitelogController::class, 'coach']);
Route::get('/coacheelog' , [App\Http\Controllers\SitelogController::class, 'coachee']);
Route::get('/logs/{id}' ,   [App\Http\Controllers\SitelogController::class, 'logs']);


//paypal payment

Route::get('payment/{id}', 'App\Http\Controllers\PaymentController@payment')->name('payment');
Route::get('cancel', 'App\Http\Controllers\PaymentController@cancel')->name('payment.cancel');
Route::get('payment/success', 'App\Http\Controllers\PaymentController@success')->name('payment.success');








Route::get('/clear-cachee', function() {
 $exitCode = Artisan::call('cache:clear');
 return 'Application cache cleared';
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimizee', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

Route::get('/optimizenew', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


