<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Doctor\DoctorController as DoctorDoctorController;
use App\Http\Controllers\publicSite\CourseController as PublicSiteCourseController;
use App\Http\Controllers\publicSite\ArticleController as PublicSiteArticleController;
use App\Http\Controllers\publicSite\DoctorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
       
Route::middleware(['auth:doctor'])->prefix('doctor')->as('api.doctor.')->group(function () {   
   // Route::get('/doctor/create-api', [DoctorDoctorController::class, 'create_api'])->name('test');
    Route::post('/doctor/store', [DoctorDoctorController::class, 'store'])->name('store');
  //  Route::get('/get-sub-category-by-category/{category}', [DoctorDoctorController::class, 'get_sub_categories'])->name('get_sub_categories');
   
 });

   
});
Route::get('/get-sub-category-by-category/{category}', [DoctorDoctorController::class, 'get_sub_categories'])->name('get_sub_categories');

Route::get('/doctor/create-api', [DoctorDoctorController::class, 'create_api'])->name('test');

Route::middleware(['changeLang'])->group(function () {   

Route::get('/doctor/search', [DoctorController::class, 'search'])->name('search');
Route::post('/doctor/login', [LoginController::class, 'authenticate'])->name('doctor.login');
Route::get('/course/get', [PublicSiteCourseController::class, 'index']);
Route::get('/article/get', [PublicSiteArticleController::class, 'index']);
});
