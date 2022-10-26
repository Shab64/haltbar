<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\CartController;
//use App\Http\Controllers\CouponsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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

require __DIR__ . '/auth.php';


//Admin Route
//name('admin.') is to call the routes on route(admin.login), route(admin.logout) etc
//namespace('Admin') where the controller is located for that route
//prefix('admin') is use to seperate the Admin routes from other routes it autmatically add the admin-
//-before the routes such as admin/login, admin/logout


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('generatePass', function () {
        $password = "haltbaradmin123";
        $hashPassword = Hash::make($password);
        echo $hashPassword, $password;
    });

    Route::middleware(['guest:admin', 'preventBackHistory'])->group(function () { //all functions group to pass through the Auth Middleware
        //login Route
        Route::view('/login', 'admin.signin')->name("login"); //admin.login
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'preventBackHistory'])->group(function () {
        //admin Dashboard
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/view/{page}', [AdminController::class, 'view'])->name('view.page');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::post('/product-view', [AdminController::class, 'viewIndividual'])->name('viewIndividual');

        Route::get('/download_ralawise_csv', [AdminController::class, 'download_csv'])->name('download_csv');
        Route::post('/updateChanges', [AdminController::class, 'updateChanges'])->name('updateChanges');

        //CMS route
        Route::post('/cms/add/{type}', [CMSController::class, 'add'])->name('add');

//        Coupons
        Route::post('/admin/add_coupons', [CouponsController::class, 'store'])->name('addCoupons');
        Route::get('/admin/coupons', [CouponsController::class, 'index'])->name('coupons');
        Route::post('/admin/update_status', [CouponsController::class, 'update'])->name('updateStatus');
    });
});

//cart
Route::get('/cart', [CartController::class, 'index'])->name('view_cart');
Route::post('/customization', [CartController::class, 'customization_modal'])->name('user.showCustomization');

Route::get('/', [WebController::class, 'index'])->name('index');
Route::post('/filter', [WebController::class, 'filter'])->name('filter');
Route::get('/product-view/{supplier}/{id}', [WebController::class, 'singleProductView'])->name('product-view');
Route::post('/get-data', [WebController::class, 'getPagData'])->name('getPagData');
Route::post('/submit-quotes', [WebController::class, 'submitQuotes'])->name('submitQuotes');
Route::get('color_name', [WebController::class, 'getColorName'])->name('getColorName');
Route::get('update_amount', [WebController::class, 'updateAmount'])->name('updateAmount');

//Add to Cart
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::delete('remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
Route::patch('update-cart', [CartController::class, 'updateCart'])->name('update.cart');

//Filter
Route::get('/products/{category}', [ProductController::class, 'ProductsCategory'])->name('products_by_category');
Route::get('/product_type/{type}', [ProductController::class, 'productsFilter'])->name('products_by_type');
Route::get('/product_filter', [ProductController::class, 'productSideFilter'])->name('productSideFilter');

//search
Route::get('/searchresults', [ProductController::class, 'filter_search'])->name('search_products');
Route::get('/products', [ProductController::class, 'index'])->name('products');

//ad customization
Route::post('/add_customization', [CartController::class, 'add_customization'])->name('addCustomization');

//bulk csv upload for ralawise
Route::get('/upload_csv_in_chunks', function () {
    return view('upload-input');
});

//faq
Route::get('/faq', [WebController::class, 'faq'])->name('faq');
Route::get('/about', [WebController::class, 'about'])->name('about');

Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/blogs', [WebController::class, 'blog'])->name('blogs');

Route::post('/uploadRalawise', [AdminController::class, 'uploadRalawise']);
Route::get('/loadDatainline', [AdminController::class, 'load_data_infile']);
Route::get('/uploadData', [WebController::class, 'get_data'])->name('get_data');
Route::get('/viewUpload', [WebController::class, 'uploadFile']);
Route::post('/uploadCsv', [WebController::class, 'uploadCsv'])->name('uploadCsv');
//filter products
Route::post('/filterBy', [ProductController::class, 'filter_by'])->name('filterBy');


//CMS
Route::get('/about', [CMSController::class, 'about']);
Route::get('/artwork', [CMSController::class, 'artwork']);
Route::get('/cookies', [CMSController::class, 'cookies']);
Route::get('/delivery', [CMSController::class, 'delivery']);
Route::get('/orderprocess', [CMSController::class, 'orderprocess']);
Route::get('/personaldata', [CMSController::class, 'personaldata']);
Route::get('/pricingexplain', [CMSController::class, 'pricingexplain']);
Route::get('/printmethod', [CMSController::class, 'printmethod']);
Route::get('/privacy', [CMSController::class, 'privacy']);
Route::get('/return', [CMSController::class, 'return']);
Route::get('/termandcondition', [CMSController::class, 'termandcondition']);

//CMS Routes
Route::get('admin/about', [CMSController::class, 'getAbout'])->name('getAbout');
Route::post('admin/about/add', [CMSController::class, 'storeAbout'])->name('storeAbout');
Route::post('admin/about/update', [CMSController::class, 'updateAbout'])->name('updateAbout');

Route::get('admin/privacy', [CMSController::class, 'getPrivacy'])->name('getPrivacy');
Route::post('admin/privacy/add', [CMSController::class, 'storePrivacy'])->name('storePrivacy');
Route::post('admin/privacy/update', [CMSController::class, 'updatePrivacy'])->name('updatePrivacy');

Route::get('admin/cookies', [CMSController::class, 'getCookies'])->name('getCookies');
Route::post('admin/cookies/add', [CMSController::class, 'storeCookies'])->name('storeCookies');
Route::post('admin/cookies/update', [CMSController::class, 'updateCookies'])->name('updateCookies');

Route::get('admin/delivery', [CMSController::class, 'getDelivery'])->name('getDelivery');
Route::post('admin/delivery/add', [CMSController::class, 'storeDelivery'])->name('storeDelivery');
Route::post('admin/delivery/update', [CMSController::class, 'updateDelivery'])->name('updateDelivery');

Route::get('admin/return', [CMSController::class, 'getReturn'])->name('getReturn');
Route::post('admin/return/add', [CMSController::class, 'storeReturn'])->name('storeReturn');
Route::post('admin/return/update', [CMSController::class, 'updateReturn'])->name('updateReturn');

Route::get('admin/orderprocess', [CMSController::class, 'getOrderProcess'])->name('getOrderProcess');
Route::post('admin/orderprocess/add', [CMSController::class, 'storeOrderProcess'])->name('storeOrderProcess');
Route::post('admin/orderprocess/update', [CMSController::class, 'updateOrderProcess'])->name('updateOrderProcess');

Route::get('admin/personal-data', [CMSController::class, 'getPersonsalData'])->name('getPersonsalData');
Route::post('admin/personal-data/add', [CMSController::class, 'storePersonsalData'])->name('storePersonsalData');
Route::post('admin/personal-data/update', [CMSController::class, 'updatePersonsalData'])->name('updatePersonsalData');

Route::get('admin/artwork', [CMSController::class, 'getArtwork'])->name('getArtwork');
Route::post('admin/artwork/add', [CMSController::class, 'storeArtwork'])->name('storeArtwork');
Route::post('admin/artwork/update', [CMSController::class, 'updateArtwork'])->name('updateArtwork');

Route::get('admin/pricing-explainded', [CMSController::class, 'getPricingExplained'])->name('getPricingExplained');
Route::post('admin/pricing-explainded/add', [CMSController::class, 'storePricingExplained'])->name('storePricingExplained');
Route::post('admin/pricing-explainded/update', [CMSController::class, 'updatePricingExplained'])->name('updatePricingExplained');

Route::get('admin/print-method', [CMSController::class, 'getPrintMethod'])->name('getPrintMethod');
Route::post('admin/print-method/add', [CMSController::class, 'storePrintMethod'])->name('storePrintMethod');
Route::post('admin/print-method/update', [CMSController::class, 'updatePrintMethod'])->name('updatePrintMethod');

Route::get('admin/terms-condition', [CMSController::class, 'getTermsCondition'])->name('getTermsCondition');
Route::post('admin/terms-condition/add', [CMSController::class, 'storeTermsCondition'])->name('storeTermsCondition');
Route::post('admin/terms-condition/update', [CMSController::class, 'updateTermsCondition'])->name('updateTermsCondition');
Auth::Routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
