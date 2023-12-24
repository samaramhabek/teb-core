<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\ArticleController;
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
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\LessonsController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\ExamQuestionsController;
use App\Http\Controllers\Admin\UserController;
 use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Nationality;
use App\Models\Treatment;
use App\Models\Service;
use App\Models\Cases;
use App\Models\Category;
use App\Models\Insurance;
use App\Models\City;
use App\Models\Hospital;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Doctor\DoctorController as DoctorDoctorController;

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


// Route::get('/modal-example/Edit',function(){
//     return view('backend.doctors.formEdit',['cases'=>Cases::get(),'nationalities'=>Nationality::get(),'categories'=>Category::get(),
//                                         'treatments'=>Treatment::get(),'insurances'=>Insurance::get(),'cities'=>City::get()]);
//     })->name('formEdit');
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

        Route::resource('/courses', CoursesController::class);
        Route::get('/api-courses', [CoursesController::class, 'courses_api'])->name('courses.api');

        // Route::get('/lessons/{id}/edit', [LessonsController::class,'edit'] );
        Route::resource('/lessons', LessonsController::class);   
        Route::get('/api-lessons', [LessonsController::class, 'lessons_api'])->name('lessons.api');
        // Route::get('/lessons/{id}/edit', [HospitalController::class,'edit'] );

        // Route::get('/questions/{id}/edit', [QuestionsController::class,'edit'] );
        Route::resource('/questions', QuestionsController::class);   
        Route::get('/api-questions', [QuestionsController::class, 'questions_api'])->name('questions.api');


        // Route::get('/exam_questions/{id}/edit', [ExamQuestionsController::class,'edit'] );
        Route::resource('/exam_questions', ExamQuestionsController::class);   
        Route::get('/api-exam_questions', [ExamQuestionsController::class, 'exam_questions_api'])->name('exam_questions.api');


        Route::get('/doctors/index', [DoctorController::class, 'index2'])->name('tables');
        Route::get('/api-doctors', [DoctorController::class, 'doctors_api'])->name('doctors.api');
        Route::post('/api-createDoctor', [DoctorController::class, 'store'])->name('createDoctor');
        Route::post('/assignArticle', [DoctorController::class, 'assignArticle'])->name('assignArticle');

        Route::Delete('/doctors/{id}', [DoctorController::class, 'deletedoctor'])->name('deletedoctor');
        Route::get('/api_doctors/edit/{id}', [DoctorController::class, 'showdoctor'])->name('showdoctor.api');
        Route::get('/modal-example', [DoctorController::class, 'create'])->name('form');

        Route::get('/modal-example/article', [ArticleController::class, 'create'])->name('formarticle');
        Route::get('/articles/index', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/api-articles', [ArticleController::class, 'articles_api'])->name('articles.api');
        Route::post('/api-createArticle', [ArticleController::class, 'store'])->name('createArticle');
        Route::Delete('/articles/{id}', [ArticleController::class, 'deletearticle'])->name('deletearticle');
        
        // Route::get('/modal-example',function(){
        //     return view('backend.doctors.form',['cases'=>Cases::get(),'nationalities'=>Nationality::get(),'categories'=>Category::get(),
        //                  'Hospitals'=>Hospital::get(),'child_categories'=>Category::whereNotNull('parent_id')->get(),'treatments'=>Treatment::get(),'insurances'=>Insurance::get(),'cities'=>City::get(),'services'=>Service::get(),]);
        //     })->name('form');

            Route::get('/hospitals/index', [HospitalController::class, 'index'])->name('hospitals.index');
            Route::get('/hospitals/{id}/edit', [HospitalController::class,'edit'] );
            Route::Delete('/hospitals/{id}', [HospitalController::class,'destroy'] );
              Route::post('/hospitals', [HospitalController::class, 'store'])->name('hospitals.store');
             
             Route::get('/api-hospitals', [HospitalController::class, 'hospitals_api'])->name('hospitals.api');

        
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
Route::prefix('doctor')->group(function () {
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('loginnew');
    // Add other doctor routes...
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
Route::middleware(['auth:doctor'])->prefix('doctor')->as('doctor.')->group(function () {   
    Route::get('/doctor/create', [DoctorDoctorController::class, 'create'])->name('test');
    Route::post('/doctor/store', [DoctorDoctorController::class, 'store'])->name('store');
    Route::get('/singledoctor', [DoctorDoctorController::class, 'singledoctor'])->name('singledoctor');
    Route::get('/index', [DoctorDoctorController::class, 'index'])->name('index');
    Route::get('/search', [DoctorDoctorController::class, 'search'])->name('search');
   // Route::get('display-user', [DoctorDoctorController::class, 'index']);
    // Route::get('/doctortest',function(){
    //     return view('doctorbackend.form');
    //     })->name('test');
 });
});