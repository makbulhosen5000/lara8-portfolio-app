<?php


use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
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

// Route::get('/sign-in', function () {
//     return redirect()->route('login');
// });




Auth::routes();



//__frontend page routes start from here__//
Route::get('/',[FrontendController::class,'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/',[HomeController::class,'index']);
// Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('resume', [FrontendController::class, 'resume'])->name('resume');
Route::get('service', [FrontendController::class, 'service'])->name('service');
Route::get('portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('package', [FrontendController::class, 'package'])->name('package');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');

//__frontend page routes end from here__//


//__backend page routes start from here__//
Route::group(['middleware' => ['test']], function () {
Route::prefix('users')->group(function () {
Route::get('/all',[UserController::class,'index'])->name('users.all');
Route::get('/create',[UserController::class,'create'])->name('users.create');
Route::post('/store',[UserController::class,'store'])->name('users.store');
Route::get('/edit/{id}',[UserController::class,'edit'])->name('users.edit');
Route::post('/update/{id}',[UserController::class,'update'])->name('users.update');
Route::get('/destroy/{id}',[UserController::class,'destroy'])->name('users.destroy');

});

// Profile Routes start from here
Route::prefix('profile')->group(function () {
Route::get('/user',[UserController::class,'index'])->name('profile.user');
Route::post('/store',[UserController::class,'store'])->name('profile.store');
Route::get('/edit',[UserController::class,'edit'])->name('profile.edit');
Route::post('/update',[UserController::class,'update'])->name('profile.update');
Route::get('/change-password',[ProfileController::class,'ChangePassword'])->name('change.password');
Route::post('/update-password',[ProfileController::class,'UpdatePassword'])->name('update.password');
});


//Logo routes start from here
Route::prefix('logos')->group(function () {
Route::get('/view',[LogoController::class,'index'])->name('logos.view');
Route::get('/create',[LogoController::class,'create'])->name('logos.create');
Route::post('/store',[LogoController::class,'store'])->name('logos.store');
Route::get('/edit/{id}',[LogoController::class,'edit'])->name('logos.edit');
Route::post('/update/{id}',[LogoController::class,'update'])->name('logos.update');
Route::get('/destroy/{id}',[LogoController::class,'destroy'])->name('logos.destroy');

});

//sliders routes start from here
Route::prefix('sliders')->group(function () {
Route::get('/view',[SliderController::class,'index'])->name('sliders.view');
Route::get('/create',[SliderController::class,'create'])->name('sliders.create');
Route::post('/store',[SliderController::class,'store'])->name('sliders.store');
Route::get('/edit/{id}',[SliderController::class,'edit'])->name('sliders.edit');
Route::post('/update/{id}',[SliderController::class,'update'])->name('sliders.update');
Route::get('/destroy/{id}',[SliderController::class,'destroy'])->name('sliders.destroy');
});


//contacts routes start from here
Route::prefix('contacts')->group(function () {
Route::get('/view',[ContactController::class,'index'])->name('contacts.view');
Route::get('/create',[ContactController::class,'create'])->name('contacts.create');
Route::post('/store',[ContactController::class,'store'])->name('contacts.store');
Route::get('/edit/{id}',[ContactController::class,'edit'])->name('contacts.edit');
Route::post('/update/{id}',[ContactController::class,'update'])->name('contacts.update');
Route::get('/destroy/{id}',[ContactController::class,'destroy'])->name('contacts.destroy');
});

//__ about routes start from here __//
Route::prefix('about')->group(function () {
Route::get('/view',[AboutController::class,'index'])->name('about.view');
Route::get('/create',[AboutController::class,'create'])->name('about.create');
Route::post('/store',[AboutController::class,'store'])->name('about.store');
Route::get('/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
Route::post('/update/{id}',[AboutController::class,'update'])->name('about.update');
Route::get('/destroy/{id}',[AboutController::class,'destroy'])->name('about.destroy');
//__ Team routes start from here __//

//__ News routes start from here __//
Route::get('news/view',[NewsController::class,'index'])->name('about.news.view');
Route::get('news/create',[NewsController::class,'create'])->name('about.news.create');
Route::post('news/store',[NewsController::class,'store'])->name('about.news.store');
Route::get('news/pdf/{id}',[NewsController::class,'viewPdf'])->name('about.news.pdf');
Route::get('news/edit/{id}',[NewsController::class,'edit'])->name('about.news.edit');
Route::post('news/update/{id}',[NewsController::class,'update'])->name('about.news.update');
Route::get('news/destroy/{id}',[NewsController::class,'destroy'])->name('about.news.destroy');

});

//category routes start from here__//
Route::prefix('categories')->group(function () {
Route::get('/view',[CategoryController::class,'index'])->name('categories.view');
Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/update/{id}',[CategoryController::class,'update'])->name('categories.update');
Route::get('/destroy/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');
//sub-category routes start from here__//
Route::get('/sub/view',[SubCategoryController::class,'index'])->name('sub.categories.view');
Route::get("/sub/get", [SubCategoryController::class, 'get_sub_cat'])->name('single.subcategory');
Route::get('/sub/create',[SubCategoryController::class,'create'])->name('sub.categories.create');
Route::post('/sub/store',[SubCategoryController::class,'store'])->name('sub.categories.store');
Route::get('/sub/edit/{id}',[SubCategoryController::class,'edit'])->name('sub.categories.edit');
Route::post('/sub/update/{id}',[SubCategoryController::class,'update'])->name('sub.categories.update');
Route::get('/sub/destroy/{id}',[SubCategoryController::class,'destroy'])->name('sub.categories.destroy');
});


});

//product routes start from here__//
Route::prefix('products')->group(function () {
Route::get('/view',[ProductController::class,'index'])->name('products.view');
Route::get('/create',[ProductController::class,'create'])->name('products.create');
Route::post('/store',[ProductController::class,'store'])->name('products.store');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::get('/details/{slug}',[ProductController::class,'details'])->name('products.details.info');
Route::post('/updated/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('/destroy/{id}',[ProductController::class,'destroy'])->name('products.destroy');
});

//order routes start from here__//
Route::prefix('orders')->group(function () {
Route::get('/view',[OrderController::class,'customerOrder'])->name('orders.view');
Route::get('/details/{id}',[OrderController::class,'customerOrderDetails'])->name('orders.details');
Route::get('/destroy/{id}',[OrderController::class,'orderDestroy'])->name('orders.destroy');
});
    

//User Email route for admin panel
Route::prefix('email')->group(function () {
Route::get('user-email.view',[FrontendController::class,'UserEmailView'])->name('user-email.view');
Route::get('/user-email.destroy/{id}',[FrontendController::class,'destroy'])->name('user-email.destroy');
});

// group middleware End here


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
