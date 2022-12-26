<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\EduController;
use App\Http\Controllers\Api\ExpController;
use App\Http\Controllers\Api\FileShareController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PayoutController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SansoWalletController;
use App\Http\Controllers\Api\ServiceCalendarController;
use App\Http\Controllers\Api\ServiceCategoryController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\UserController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'signup']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

Route::get('/vistor-services', [ServiceController::class, 'index']);

Route::group(['prefix' => 'visitor'], function () {
    Route::get('/service-category', [ServiceCategoryController::class, 'index']);
    # Review
    // Route::resource('/review', ReviewController::class);
    Route::resource('/countries', CountryController::class);
    Route::get('/languages', [LanguageController::class, 'search']);
    Route::get('/coach/{id}', [ServiceController::class, 'coach']);

    Route::get('/filtered-search', [ServiceController::class, 'filteredSearch']);
});

Route::middleware(['auth:sanctum'])->group(function () {

    #Profile
    Route::post('/update-profile', [UserController::class, 'update']);
    Route::post('/upload-profile-image', [UserController::class, 'uploadProfile']);
    Route::get('/dashboard-counters', [UserController::class, 'dashboardCounter']);
    Route::post('/logout', [AuthController::class, 'logout']);

    #Countries
    Route::get('/countries', function () {
        return Country::all();
    });

    Route::get('/user', [UserController::class, 'userInfo']);

    #Experience
    Route::resource('/experience', ExpController::class);
    Route::post('/experience-update/{id}', [ExpController::class, 'update']);

    #Education
    Route::resource('/education', EduController::class);
    Route::post('/education-update/{id}', [EduController::class, 'update']);

    #Language
    Route::get('/languages', [LanguageController::class, 'getLanguages']);
    Route::get('/user-languages', [LanguageController::class, 'getUserLanguages']);

    # Media
    Route::resource('/media', MediaController::class);
    Route::post('/media-update/{id}', [MediaController::class, 'update']);

    # Service Category
    Route::resource('/service-category', ServiceCategoryController::class);
    Route::resource('/services', ServiceController::class);
    Route::post('/services-update/{id}', [ServiceController::class, 'update']);
    Route::get('/service-category-filter', [ServiceController::class, 'categorizedSearch']);

    # Topics
    Route::resource('/topics', TopicController::class);
    Route::post('/topic-update/{id}', [TopicController::class, 'update']);

    # Service Calendar
    Route::resource('/service-calendar', ServiceCalendarController::class);

    # Sanso Wallet
    Route::resource('/wallet', SansoWalletController::class);
    Route::post('/wallet-login', [SansoWalletController::class, 'walletLogin']);

    # Likes
    Route::resource('/like', LikeController::class);

    # Booking
    Route::resource('/booking', BookingController::class);
    Route::post('/booking-update', [BookingController::class, 'changeStatus']);
    # Blogs
    Route::resource('/blogs', BlogApiController::class);
    # Reviews
    Route::resource('/review', ReviewController::class);
    # File shareing
    Route::resource('/file-sharing', FileShareController::class);

    # Notifications
    Route::resource('/notifications', NotificationController::class);

    # Cards
    Route::resource('/card-management', CardController::class);

    # Payout
    Route::resource('/payout', PayoutController::class);
});

# SSH ACCESS
# pass: oDckIGW-=#zz
#username id_rsa
#SHA256:Gd7ymOiRSSkpi5UdESGlt1icsA7CTwFtYpLeCsoIenM
