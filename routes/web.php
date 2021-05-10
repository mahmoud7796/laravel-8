<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactForm;
use App\Http\Controllers\MultiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Visitors\VisitorsController;
use App\Models\User;
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
/*define('PAGINATION',5);*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=> 'auth:sanctum'], function () {
   // Route::get('/dashboard', [UserController::class,'getData'])-> name('dashboard')->middleware('verified');
    Route::get('/all-category', [CategoryController::class,'AllCat'])-> name('all.category');
    Route::post('/store', [CategoryController::class,'store'])-> name('category.store');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])-> name('category.edit');
    Route::post('/update/{id}', [CategoryController::class,'update'])-> name('category.update');
    Route::get('/move-trash/{id}', [CategoryController::class,'MoveTrash'])-> name('category.trash');
    Route::get('/restore/{id}', [CategoryController::class,'restore'])-> name('category.restore');
    Route::get('/delete/{id}', [CategoryController::class,'delete'])-> name('category.delete');
    Route::get('/index', [BrandController::class,'index'])-> name('brand.index');
    Route::post('/brand-store', [BrandController::class,'store'])-> name('brand.store');
    Route::get('/brand-edit/{id}', [BrandController::class,'edit'])-> name('brand.edit');
    Route::post('/brand-update/{id}', [BrandController::class,'update'])-> name('brand.update');
    Route::get('/brand-delete/{id}', [BrandController::class,'delete'])-> name('brand.delete');

});
Route::get('/admin-login', [LoginController::class,'adminLogin'])-> name('admin.login');
Route::get('/admin-register', [AdminController::class,'register'])->name('admin.signup');

Route::group(['middleware'=> 'auth:sanctum'], function () {
     Route::get('/dashboard', [AdminController::class,'master'])->name('dashboard');
     Route::get('/admin-logout', [LogoutController::class,'logout'])->name('user.logout');
});

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function(){

    ######## Pages ##########
    Route::get('/', [VisitorsController::class,'home'])->name('home');
    Route::get('/blog', [VisitorsController::class,'blog'])->name('blog');
    Route::get('/services', [VisitorsController::class,'services'])->name('services');
    Route::get('/contact-us', [VisitorsController::class,'contact'])->name('contact-us');
    Route::get('/portfolio', [VisitorsController::class,'portfolio'])->name('portfolio');
    Route::get('/portfolio-details', [VisitorsController::class,'portfolio-details'])->name('portfolio-details');
    Route::get('/pricing', [VisitorsController::class,'pricing'])->name('pricing');
    Route::get('/team', [VisitorsController::class,'team'])->name('team');
    Route::get('/testmonials', [VisitorsController::class,'services'])->name('testimonials');
    ######## End Pages ##########


    ######## Slider ##########
    Route::get('/slider-index', [SliderController::class,'index'])-> name('slider.index');
    Route::post('/slider-store', [SliderController::class,'store'])-> name('slider.store');
    Route::get('/slider-edit/{id}', [SliderController::class,'edit'])-> name('slider.edit');
    Route::post('/slider-update/{id}', [SliderController::class,'update'])-> name('slider.update');
    Route::get('/slider-delete/{id}', [SliderController::class,'delete'])-> name('slider.delete');
    ######## end Slider ##########

    ######## about ##########
    Route::get('/about-index', [AboutController::class,'index'])-> name('about.index');
    Route::get('/about-create', [AboutController::class,'create'])-> name('about.create');
    Route::post('/about-store', [AboutController::class,'store'])-> name('about.store');
    Route::get('/about-edit/{id}', [AboutController::class,'edit'])-> name('about.edit');
    Route::post('/about-update/{id}', [AboutController::class,'update'])-> name('about.update');
    Route::get('/about-delete/{id}', [AboutController::class,'delete'])-> name('about.delete');
    ######## end about ######

    ######## Multi Images ######
    Route::get('/multi-images', [MultiController::class,'muim'])-> name('multi.images');
    Route::post('/multi-store', [MultiController::class,'store'])-> name('multi.store');
    ######## End Multi Images ######

    ######## contact ##########
    Route::get('/contact-index', [ContactController::class,'index'])-> name('contact.index');
    Route::get('/contact-create', [ContactController::class,'create'])-> name('contact.create');
    Route::post('/contact-store', [ContactController::class,'store'])-> name('contact.store');
    Route::get('/contact-edit/{id}', [ContactController::class,'edit'])-> name('contact.edit');
    Route::post('/contact-update/{id}', [ContactController::class,'update'])-> name('contact.update');
    Route::get('/contact-delete/{id}', [ContactController::class,'delete'])-> name('contact.delete');
    ######## end contact ######

    ######## contact form ##########
    Route::post('/contact-form', [ContactController::class,'contactForm'])-> name('contact.form');
    Route::get('/form-index', [ContactForm::class,'indexForm'])-> name('contactForm.index');
    Route::get('/form-create', [ContactForm::class,'createForm'])-> name('contactForm.create');
    Route::post('/form-store', [ContactForm::class,'storeForm'])-> name('contactForm.store');
    Route::get('/form-edit/{id}', [ContactForm::class,'editForm'])-> name('contactForm.edit');
    Route::post('/form-update/{id}', [ContactForm::class,'updateForm'])-> name('contactForm.update');
    Route::get('/form-delete/{id}', [ContactForm::class,'deleteForm'])-> name('contactForm.delete');
    ######## end contact form######

    ######## Change Password######
    Route::post('/user-chPassword', [ContactController::class,'changePass'])-> name('change.password');
    ######## end Change Password######

});
