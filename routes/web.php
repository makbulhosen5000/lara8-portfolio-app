<?php

use App\Events\Message;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CountDownTimerController;
use App\Http\Controllers\backend\ExperienceController;
use App\Http\Controllers\backend\LanguageController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\backend\QualificationController;
use App\Http\Controllers\backend\TrainingController;
use App\Http\Controllers\Backend\ReactProjectController;
use App\Http\Controllers\Backend\RecentProjectsController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\backend\SkillController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TotalProjectsController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\backend\UserLocationController;
use App\Http\Controllers\backend\WorkDocumentaryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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

    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/admin-dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('about', [FrontendController::class, 'about'])->name('about');
    Route::get('/resume', [FrontendController::class, 'resume'])->name('resume');
    Route::get('/service', [FrontendController::class, 'service'])->name('service');
    Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
    Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
    Route::get('/package', [FrontendController::class, 'package'])->name('package');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::post('/contact-us', [FrontendController::class, 'ContactStore'])->name('contact.store');
    Route::get('/chat', [FrontendController::class, 'chat']);
    
    //route for chat application

    Route::post('send-message',function (Request $request){
        event(new Message($request->username, $request->message));
        return ['success' => true];
    });

    //__frontend page routes end from here__//


//__backend page routes start from here__//
Route::group(['middleware' => ['test']], function () {
    Route::prefix('users')->group(function () {
        Route::get('/all', [UserController::class, 'index'])->name('users.all');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/change-password', [UserController::class, 'ChangePassword'])->name('users.change.password');
        //User Location Routes
        Route::get('/user-location', [UserLocationController::class, 'index'])->name('users.location.view');
        Route::get('/user-location-create', [UserLocationController::class, 'create'])->name('users.location.create');
        Route::post('/user-location-store', [UserLocationController::class, 'store'])->name('users.location.store');
        
    });



    //Count Down Timers routes start from here__//
    Route::prefix('timers')->group(function () {
        Route::get('/view', [CountDownTimerController::class, 'index'])->name('timers.view');
        Route::get('/create', [CountDownTimerController::class, 'create'])->name('timers.create');
        Route::post('/store', [CountDownTimerController::class, 'store'])->name('timers.store');
        Route::get('/edit/{id}', [CountDownTimerController::class, 'edit'])->name('timers.edit');
        Route::post('/update/{id}', [CountDownTimerController::class, 'update'])->name('timers.update');
        Route::get('/destroy/{id}', [CountDownTimerController::class, 'destroy'])->name('timers.destroy');
    });



    //Logo routes start from here
    Route::prefix('logos')->group(function () {
        Route::get('/view', [LogoController::class, 'index'])->name('logos.view');
        Route::get('/create', [LogoController::class, 'create'])->name('logos.create');
        Route::post('/store', [LogoController::class, 'store'])->name('logos.store');
        Route::get('/edit/{id}', [LogoController::class, 'edit'])->name('logos.edit');
        Route::post('/update/{id}', [LogoController::class, 'update'])->name('logos.update');
        Route::get('/destroy/{id}', [LogoController::class, 'destroy'])->name('logos.destroy');
        //this routes for different type of companies brands logo
        Route::get('/brand/logo/view', [CompaniesBrandLogoController::class, 'index'])->name('companies.logo.view');
        Route::get('/brand/logo/create', [CompaniesBrandLogoController::class, 'create'])->name('companies.logo.create');
        Route::post('/brand/logo/store', [CompaniesBrandLogoController::class, 'store'])->name('companies.logo.store');
        Route::get('/brand/logo/edit/{id}', [CompaniesBrandLogoController::class, 'edit'])->name('companies.logo.edit');
        Route::post('/brand/logo/update/{id}', [CompaniesBrandLogoController::class, 'update'])->name('companies.logo.update');
        Route::get('/brand/logo/destroy/{id}', [CompaniesBrandLogoController::class, 'destroy'])->name('companies.logo.destroy');
    });

    //sliders routes start from here
    Route::prefix('sliders')->group(function () {
        Route::get('/view', [SliderController::class, 'index'])->name('sliders.view');
        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
        Route::get('/destroy/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
    });


    //contacts routes start from here
    Route::prefix('contacts')->group(function () {
        Route::get('/view', [ContactController::class, 'index'])->name('contacts.view');
        Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
        Route::post('/store', [ContactController::class, 'store'])->name('contacts.store');
        Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::post('/update/{id}', [ContactController::class, 'update'])->name('contacts.update');
        Route::get('/destroy/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });

    //__ about routes start from here __//
    Route::prefix('about')->group(function () {
        Route::get('/view', [AboutController::class, 'index'])->name('about.view');
        Route::get('/create', [AboutController::class, 'create'])->name('about.create');
        Route::post('/store', [AboutController::class, 'store'])->name('about.store');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
        Route::post('/update/{id}', [AboutController::class, 'update'])->name('about.update');
        Route::get('/destroy/{id}', [AboutController::class, 'destroy'])->name('about.destroy');
        //__ Team routes start from here __//
        Route::get('team/view', [TeamController::class, 'index'])->name('about.team.view');
        Route::get('team/create', [TeamController::class, 'create'])->name('about.team.create');
        Route::post('team/store', [TeamController::class, 'store'])->name('about.team.store');
        Route::get('team/edit/{id}', [TeamController::class, 'edit'])->name('about.team.edit');
        Route::post('team/update/{id}', [TeamController::class, 'update'])->name('about.team.update');
        Route::get('team/destroy/{id}', [TeamController::class, 'destroy'])->name('about.team.destroy');
        //__ News routes start from here __//
        Route::get('news/view', [NewsController::class, 'index'])->name('about.news.view');
        Route::get('news/create', [NewsController::class, 'create'])->name('about.news.create');
        Route::post('news/store', [NewsController::class, 'store'])->name('about.news.store');
        Route::get('news/pdf/{id}', [NewsController::class, 'viewPdf'])->name('about.news.pdf');
        Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('about.news.edit');
        Route::post('news/update/{id}', [NewsController::class, 'update'])->name('about.news.update');
        Route::get('news/destroy/{id}', [NewsController::class, 'destroy'])->name('about.news.destroy');
        //__ Career routes start from here __//
        Route::get('career/view', [CareerController::class, 'index'])->name('about.career.view');
        Route::get('career/create', [CareerController::class, 'create'])->name('about.career.create');
        Route::post('career/store', [CareerController::class, 'store'])->name('about.career.store');
        Route::get('career/pdf/{id}', [CareerController::class, 'viewPdf'])->name('about.career.pdf');
        Route::get('career/edit/{id}', [CareerController::class, 'edit'])->name('about.career.edit');
        Route::post('career/update/{id}', [CareerController::class, 'update'])->name('about.career.update');
        Route::get('career/destroy/{id}', [CareerController::class, 'destroy'])->name('about.career.destroy');
    });
    //experiences routes start from here
    Route::prefix('resumes')->group(function () {
        // experience routes
        Route::get('/experience/view', [ExperienceController::class, 'index'])->name('resumes.experience.view');
        Route::get('/experience/create', [ExperienceController::class, 'create'])->name('resumes.experience.create');
        Route::post('/experience/store', [ExperienceController::class, 'store'])->name('resumes.experience.store');
        Route::get('/experience/edit/{id}', [ExperienceController::class, 'edit'])->name('resumes.experience.edit');
        Route::post('/experience/update/{id}', [ExperienceController::class, 'update'])->name('resumes.experience.update');
        Route::get('/experience/destroy/{id}', [ExperienceController::class, 'destroy'])->name('resumes.experience.destroy');
        // education routes
        Route::get('/qualification/view', [QualificationController::class, 'index'])->name('resumes.education.view');
        Route::get('/qualification/create', [QualificationController::class, 'create'])->name('resumes.education.create');
        Route::post('/qualification/store', [QualificationController::class, 'store'])->name('resumes.education.store');
        Route::get('/qualification/edit/{id}', [QualificationController::class, 'edit'])->name('resumes.education.edit');
        Route::post('/qualification/update/{id}', [QualificationController::class, 'update'])->name('resumes.education.update');
        Route::get('/qualification/destroy/{id}', [QualificationController::class, 'destroy'])->name('resumes.education.destroy');
         // training routes
         Route::get('/training/view', [TrainingController::class, 'index'])->name('resumes.training.view');
         Route::get('/training/create', [TrainingController::class, 'create'])->name('resumes.training.create');
         Route::post('/training/store', [TrainingController::class, 'store'])->name('resumes.training.store');
         Route::get('/training/edit/{id}', [TrainingController::class, 'edit'])->name('resumes.training.edit');
         Route::post('/training/update/{id}', [TrainingController::class, 'update'])->name('resumes.training.update');
         Route::get('/training/destroy/{id}', [TrainingController::class, 'destroy'])->name('resumes.training.destroy');
        // skill routes
        Route::get('/skill/view', [SkillController::class, 'index'])->name('resumes.skill.view');
        Route::get('/skill/create', [SkillController::class, 'create'])->name('resumes.skill.create');
        Route::post('/skill/store', [SkillController::class, 'store'])->name('resumes.skill.store');
        Route::get('/skill/edit/{id}', [SkillController::class, 'edit'])->name('resumes.skill.edit');
        Route::post('/skill/update/{id}', [SkillController::class, 'update'])->name('resumes.skill.update');
        Route::get('/skill/destroy/{id}', [SkillController::class, 'destroy'])->name('resumes.skill.destroy');
        // Language routes
        Route::get('/language/view', [LanguageController::class, 'index'])->name('resumes.language.view');
        Route::get('/language/create', [LanguageController::class, 'create'])->name('resumes.language.create');
        Route::post('/language/store', [LanguageController::class, 'store'])->name('resumes.language.store');
        Route::get('/language/edit/{id}', [LanguageController::class, 'edit'])->name('resumes.language.edit');
        Route::post('/language/update/{id}', [LanguageController::class, 'update'])->name('resumes.language.update');
        Route::get('/language/destroy/{id}', [LanguageController::class, 'destroy'])->name('resumes.language.destroy');
        // documentary routes
        Route::get('/documentary/view', [WorkDocumentaryController::class, 'index'])->name('resumes.documentary.view');
        Route::get('/documentary/create', [WorkDocumentaryController::class, 'create'])->name('resumes.documentary.create');
        Route::post('/documentary/store', [WorkDocumentaryController::class, 'store'])->name('resumes.documentary.store');
        Route::get('/documentary/edit/{id}', [WorkDocumentaryController::class, 'edit'])->name('resumes.documentary.edit');
        Route::post('/documentary/update/{id}', [WorkDocumentaryController::class, 'update'])->name('resumes.documentary.update');
        Route::get('/documentary/destroy/{id}', [WorkDocumentaryController::class, 'destroy'])->name('resumes.documentary.destroy');
         // Recent Project routes
         Route::get('/recent/project/view', [RecentProjectsController::class, 'index'])->name('resumes.recent.project.view');
         Route::get('/recent/project/create', [RecentProjectsController::class, 'create'])->name('resumes.recent.project.create');
         Route::post('/recent/project/store', [RecentProjectsController::class, 'store'])->name('resumes.recent.project.store');
         Route::get('/recent/project/edit/{id}', [RecentProjectsController::class, 'edit'])->name('resumes.recent.project.edit');
         Route::post('/recent/project/update/{id}', [RecentProjectsController::class, 'update'])->name('resumes.recent.project.update');
         Route::get('/recent/project/destroy/{id}', [RecentProjectsController::class, 'destroy'])->name('resumes.recent.project.destroy');
         // Total Project routes
         Route::get('/total/project/view', [TotalProjectsController::class, 'index'])->name('resumes.total.project.view');
         Route::get('/total/project/create', [TotalProjectsController::class, 'create'])->name('resumes.total.project.create');
         Route::post('/total/project/store', [TotalProjectsController::class, 'store'])->name('resumes.total.project.store');
         Route::get('/total/project/edit/{id}', [TotalProjectsController::class, 'edit'])->name('resumes.total.project.edit');
         Route::post('/total/project/update/{id}', [TotalProjectsController::class, 'update'])->name('resumes.total.project.update');
         Route::get('/total/Project/destroy/{id}', [TotalProjectsController::class, 'destroy'])->name('resumes.total.project.destroy');
         // React Project routes
         Route::get('/react/project/view', [ReactProjectController::class, 'index'])->name('resumes.react.project.view');
         Route::get('/react/project/create', [ReactProjectController::class, 'create'])->name('resumes.react.project.create');
         Route::post('/react/project/store', [ReactProjectController::class, 'store'])->name('resumes.react.project.store');
         Route::get('/react/project/edit/{id}', [ReactProjectController::class, 'edit'])->name('resumes.react.project.edit');
         Route::post('/react/project/update/{id}', [ReactProjectController::class, 'update'])->name('resumes.react.project.update');
         Route::get('/react/project/destroy/{id}', [ReactProjectController::class, 'destroy'])->name('resumes.react.project.destroy');
    });

    //__ Services Management start __//
    Route::prefix('services')->group(function () {
        //__ service one routes __//
        Route::get('/service/view', [ServiceController::class, 'index'])->name('services.view');
        Route::get('/service/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/service/store', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('services.edit');
        Route::post('/service/update/{id}', [ServiceController::class, 'update'])->name('services.update');
        Route::get('/service/destroy/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
    });
    //__Services Management route end__//

    //category routes start from here__//
    Route::prefix('categories')->group(function () {
        Route::get('/view', [CategoryController::class, 'index'])->name('categories.view');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        //sub-category routes start from here__//
        Route::get('/sub/view', [SubCategoryController::class, 'index'])->name('sub.categories.view');
        Route::get("/sub/get", [SubCategoryController::class, 'get_sub_cat'])->name('single.subcategory');
        Route::get('/sub/create', [SubCategoryController::class, 'create'])->name('sub.categories.create');
        Route::post('/sub/store', [SubCategoryController::class, 'store'])->name('sub.categories.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub.categories.edit');
        Route::post('/sub/update/{id}', [SubCategoryController::class, 'update'])->name('sub.categories.update');
        Route::get('/sub/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('sub.categories.destroy');
    });
    //Brand routes start from here__//
    Route::prefix('brands')->group(function () {
        Route::get('/view', [BrandController::class, 'index'])->name('brands.view');
        Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('brands.update');
        Route::get('/destroy/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
    });
    //Color routes start from here__//
    Route::prefix('colors')->group(function () {
        Route::get('/view', [ColorController::class, 'index'])->name('colors.view');
        Route::get('/create', [ColorController::class, 'create'])->name('colors.create');
        Route::post('/store', [ColorController::class, 'store'])->name('colors.store');
        Route::get('/edit/{id}', [ColorController::class, 'edit'])->name('colors.edit');
        Route::post('/update/{id}', [ColorController::class, 'update'])->name('colors.update');
        Route::get('/destroy/{id}', [ColorController::class, 'destroy'])->name('colors.destroy');
    });
    //Size routes start from here__//
    Route::prefix('sizes')->group(function () {
        Route::get('/view', [SizeController::class, 'index'])->name('sizes.view');
        Route::get('/create', [SizeController::class, 'create'])->name('sizes.create');
        Route::post('/store', [SizeController::class, 'store'])->name('sizes.store');
        Route::get('/edit/{id}', [SizeController::class, 'edit'])->name('sizes.edit');
        Route::post('/update/{id}', [SizeController::class, 'update'])->name('sizes.update');
        Route::get('/destroy/{id}', [SizeController::class, 'destroy'])->name('sizes.destroy');
    });
    //product routes start from here__//
    Route::prefix('products')->group(function () {
        Route::get('/view', [ProductController::class, 'index'])->name('products.view');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::get('/details/{slug}', [ProductController::class, 'details'])->name('products.details.info');
        Route::post('/updated/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    //User Email route for admin panel
    Route::prefix('email')->group(function () {
        Route::get('user-email.view', [FrontendController::class, 'UserEmailView'])->name('user-email.view');
        Route::get('/user-email.destroy/{id}', [FrontendController::class, 'destroy'])->name('user-email.destroy');
    });
});
// group middleware End here
