<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\CasesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\InsuranceController;
use App\Http\Controllers\Admin\NationalityController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TreatmentsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Nationality;
use App\Models\Treatment;
use App\Models\Cases;
use App\Models\Category;
use App\Models\Insurance;
use App\Models\City;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/modal-example',function(){
return view('backend.doctors.form',['cases'=>Cases::get(),'nationalities'=>Nationality::get(),'categories'=>Category::get(),
                                    'treatments'=>Treatment::get(),'insurances'=>Insurance::get(),'cities'=>City::get()]);
})->name('form');
Route::get('/modal-example/index',function(){
    return view('index');
    })->name('index');
    Route::get('/modal-example/modal',function(){
        return view('modal');
        })->name('modal');
        // Route::get('/doctors',function(){
        //     return view('backend.doctors.tables');
        //     })->name('tables');

            
 Route::get('/doctors', [DoctorController::class, 'index'])->name('tables');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__ . '/auth.php';

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {



    Route::middleware(['auth:admin'])->prefix('admin')->as('admin.')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/users', UserController::class);
        Route::get('/api-users', [UserController::class, 'users_api'])->name('users.api');
        Route::get('/profile', [UserController::class, 'edit_profile'])->name('users.profile.edit');
        Route::post('/profile', [UserController::class, 'update_profile'])->name('users.profile.update');
        Route::get('/profile-security', [UserController::class, 'edit_security'])->name('users.profile.edit-password');
        Route::post('/profile-security', [UserController::class, 'update_security'])->name('users.profile.update-password');

        Route::resource('/categories', CategoryController::class);
        Route::get('/api-categories', [CategoryController::class, 'categories_api'])->name('categories.api');

        Route::resource('/sub-categories', SubCategoryController::class);
        Route::get('/api-sub-categories', [SubCategoryController::class, 'sub_categories_api'])->name('sub_categories.api');

        Route::resource('/countries', CountriesController::class);
        Route::get('/api-countries', [CountriesController::class, 'countries_api'])->name('countries.api');

        Route::resource('/cities', CitiesController::class);
        Route::get('/api-cities', [CitiesController::class, 'cities_api'])->name('cities.api');

        Route::resource('/areas', AreasController::class);
        Route::get('/api-areas', [AreasController::class, 'areas_api'])->name('areas.api');

        Route::resource('/treatments', TreatmentsController::class);
        Route::get('/api-treatments', [TreatmentsController::class, 'treatments_api'])->name('treatments.api');

        Route::get('/doctors/index', [DoctorController::class, 'index2'])->name('tables');
        Route::get('/api-doctors', [DoctorController::class, 'doctors_api'])->name('doctors.api');
        Route::post('/api-createDoctor', [DoctorController::class, 'store'])->name('createDoctor');
        Route::Delete('/doctors/{id}', [DoctorController::class, 'deletedoctor'])->name('deletedoctor');
        Route::resource('/cases', CasesController::class);
        Route::get('/api-cases', [CasesController::class, 'cases_api'])->name('cases.api');

        Route::resource('/nationality', NationalityController::class);
        Route::get('/api-nationality', [NationalityController::class, 'nationality_api'])->name('nationality.api');

        Route::resource('/insurance', InsuranceController::class);
        Route::get('/api-insurance', [InsuranceController::class, 'insurance_api'])->name('insurance.api');

        Route::resource('/currencies', CurrencyController::class);
        Route::get('/api-currencies', [CurrencyController::class, 'currencies_api'])->name('currencies.api');

        Route::resource('/services', ServicesController::class);
        Route::get('/api-services', [ServicesController::class, 'services_api'])->name('services.api');

        Route::get('/get-sub-category-by-category/{category}', [AdminController::class, 'get_sub_categories'])->name('get_sub_categories');
    });

});
