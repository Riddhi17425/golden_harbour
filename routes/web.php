<?php

use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\ValuableClientController;
use App\Http\Controllers\admin\WhyChooseController;
use App\Http\Controllers\admin\NetworkController;
use App\Http\Controllers\admin\IndustrySolutionController;
use App\Http\Controllers\admin\IndustryController;
use App\Http\Controllers\admin\ImageSliderController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\CatalogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubProductController;
use App\Http\Controllers\admin\AgenciesController;
use App\Http\Controllers\admin\CertificateController;
use App\Http\Controllers\admin\MilestoneController;
use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\admin\IndustryProductController;
use App\Http\Controllers\admin\HomeSliderController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\AgencySliderController;
use App\Http\Controllers\admin\BlogsController;
use App\Http\Controllers\admin\HomePageBanner;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [DashboardController::class,'index'])->name('front.home');
Route::get('about', [DashboardController::class, 'about'])->name('about');
Route::get('industries', [DashboardController::class, 'industries'])->name('industries');
Route::get('event', [DashboardController::class, 'event'])->name('event');
Route::get('news', [DashboardController::class,'news'])->name('news');
Route::get('our-culture', [DashboardController::class, 'ourculture'])->name('ourculture');
Route::get('news/{url}', [DashboardController::class, 'newsdetail'])->name('newsdetail');
Route::get('blog', [DashboardController::class,'blogs'])->name('blog');
Route::get('blog/{url}', [DashboardController::class, 'blogsdetail'])->name('blogdetail');
Route::get('current-opportunities', [DashboardController::class, 'currentopportunities'])->name('currentopportunities');
Route::get('no-vacancy', [DashboardController::class, 'novacancy'])->name('novacancy');
Route::post('no-vacancy-store', [DashboardController::class, 'novacancystore'])->name('novacancy.store');
Route::get('current-opportunities/{url}', [DashboardController::class, 'currentoppdetails'])->name('currentoppdetails');
Route::get('privacy-policy', [DashboardController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('terms-and-conditions', [DashboardController::class, 'termsandconditions'])->name('termsandconditions');
Route::get('catalogue', [DashboardController::class,'catalogue'])->name('catalogue');
Route::get('gallery', [DashboardController::class,'gallery'])->name('gallery');
Route::get('faq', [DashboardController::class,'faq'])->name('faq');
Route::post('faqstore', [DashboardController::class,'faqstore'])->name('faqstore');
Route::get('contact', [DashboardController::class,'contact'])->name('contact');
Route::post('contactstore', [DashboardController::class,'contactstore'])->name('contactstore');
Route::post('/vacancy-store', [DashboardController::class, 'vacancystore'])->name('vacancystore');
Route::get('catalogue', [DashboardController::class,'catalogue'])->name('catalogue');
Route::get('milestone', [DashboardController::class,'milestone'])->name('milestone');
Route::get('thank-you', [DashboardController::class,'thankyou'])->name('thankyou');
Route::post('/product-enquiry-store', [DashboardController::class, 'productenquiry'])->name('product.enquiry.store');
Route::get('certifications', [DashboardController::class,'certifications'])->name('certifications');
Route::get('our-agencies', [DashboardController::class,'ouragencies'])->name('our-agencies');
Route::post('catelogue-submit', [DashboardController::class, 'CatelogueSubmit'])->name('catalogue.submit');
Route::get('product/{category}', [DashboardController::class, 'getsubcategory'])->name('subcategorylist');
Route::get('product/{category}/{subcategory}', [DashboardController::class, 'getproduct'])->name('productlist');
Route::get('product/{category}/{subcategory}/{product}', [DashboardController::class, 'getsubproduct'])->name('subproductlist');
Route::get('product/{category}/{subcategory}/{product}/detail', [DashboardController::class, 'productdetail'])->name('productdetail');
Route::get('/product/{category}/{subcategory}/{product}/{subproduct}/detail', [DashboardController::class, 'subproductDetail'])->name('subproductdetail');
Route::post('/whatsaapinquiry', [DashboardController::class, 'whatsaapinquiry'])->name('whatsaapinquiry');
Route::post('/inquiery-store', [DashboardController::class, 'inquieryStore'])->name('inquiery-store');


Route::get('/search', [DashboardController::class, 'Search'])->name('search');
Route::get('/autocomplete-search', [DashboardController::class, 'autocomplete'])->name('autocomplete.search');

Route::get('login', [DashboardController::class, 'login'])->name('login');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/admin/dashboard', [adminController::class, 'admin'])->name('admin/dashboard');
  Route::resource('admin/valuableclient', ValuableClientController::class);
    Route::resource('admin/whychoose', WhyChooseController::class);
    Route::resource('admin/network', NetworkController::class);
    Route::resource('admin/industrysolution', IndustrySolutionController::class);
    Route::resource('admin/industry', IndustryController::class);
    Route::resource('admin/news', NewsController::class);
    Route::resource('admin/imageslider', ImageSliderController::class);
    Route::resource('admin/video', VideoController::class);
    Route::resource('admin/event', EventController::class);
    Route::resource('admin/faq', faqController::class);
    Route::resource('admin/catalog', CatalogController::class);
    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/subcategory', SubCategoryController::class);
    Route::resource('admin/product', ProductController::class);
    Route::resource('admin/subproduct', SubProductController::class);
    Route::resource('admin/certificate', CertificateController::class);
    Route::resource('admin/agencies', AgenciesController::class);
    Route::resource('admin/milestone', MilestoneController::class);
    Route::resource('admin/jobcategory', JobCategoryController::class);
    Route::resource('admin/industryproduct', IndustryProductController::class);
    Route::resource('admin/job', JobController::class);
    Route::resource('admin/homepagebanner', HomePageBanner::class);
    Route::resource('admin/blog', BlogsController::class);
    Route::resource('admin/homeslider', HomeSliderController::class);
    Route::resource('admin/agencyslider', AgencySliderController::class);
     // AJAX routes
    Route::get('/admin/subcategories/{categoryId}', [IndustryProductController::class, 'getSubcategories']);
    Route::get('/admin/products/{categoryId}/{subcategoryId}', [IndustryProductController::class, 'getProducts']);

    Route::prefix('backend')->group(function () {
    });


});