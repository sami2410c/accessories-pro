<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{id}/{img?}', [HomeController::class, 'detail']);
Route::get('/mobile', [HomeController::class, 'mobile']);
Route::get('/cover_models', [HomeController::class, 'cover_models']);
Route::get('/Power_bank', [HomeController::class, 'Power_bank']);
Route::get('/Air_burds', [HomeController::class, 'Air_burds']);
Route::get('/headphones', [HomeController::class, 'headphones']);
Route::get('/add/{id}/{img}', [HomeController::class, 'AddToCart']);
Route::get('/cart', [HomeController::class, 'Cart']);
Route::get('/increase/{id}', [HomeController::class, 'increase']);
Route::get('/decrease/{id}', [HomeController::class, 'decrease']);
Route::get('/cartde/{id}', [HomeController::class, 'cartdelete']);
Route::get('/buy/{id}', [HomeController::class, 'buynow']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::post('/final', [HomeController::class, 'Final']);
Route::get('/thankyou/{checkoutId}', [HomeController::class, 'thank']);

// Route::get('/search', [HomeController::class, 'search']);

Route::get('/model-products/{model}', [HomeController::class,'modelProducts']);

Route::middleware("check")->group(function(){

    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('products', [AdminController::class, 'products']);
    Route::get('all_product', [AdminController::class, 'allproduct']);
    Route::post('product', [AdminController::class, 'add_product']);
    
    // admin/all products:
    Route::get('/delete/{id}', [AdminController::class, 'delete']);
    Route::get('/update/{id}', [AdminController::class, 'updates']);
    // update :
    Route::post('/update/{id}', [AdminController::class, 'result']);
});















Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {

        if (Auth::user()->user_role == "0") {
            return view('home.home');
        } 
        else if (Auth::user()->user_role == "1") {
            return view('admin.admin_index');
        } 
        else {
            return view('home.home'); // ✅ yeh sahi hai
        }

    })->name('/admin');

});