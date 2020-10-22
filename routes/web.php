<?php
require '../vendor/autoload.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;


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


Route::get('welcome2', function () {
    return view('frontend.welcome2', ['name' => '大帥哥']);
});


Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('home', function () {
    return view('frontend.index');
})->name('home');

Route::get('about', function () {
    return view('frontend.about');
})->name('about');

Route::get('products', function () {
    return view('frontend.products');
})->name('products');
Route::get('store', function () {
    return view('frontend.store');
})->name('store');





// Route::get('/', 'Frontend\HomeController@index')->name('home');
//
// Route::get('about', 'Frontend\AboutController@index')->name('about');
//
// Route::get('products', 'Frontend\ProductController@index')->name('products');
//
// Route::get('store', 'Frontend\StoreController@index')->name('store');




// 登入頁面
Route::get('/admin/login', function (){
    return view('backend.login');
});
Route::post('/admin/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
// 用auth middleware進行驗證
// prefix 代表group內的url路徑前都有/admin/
// name 代表 group中route命名時，每個name的前綴會加入admin.
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {

    // 登出
    Route::get('/admin/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    // Website的更新
    Route::get('/', 'App\Http\Controllers\Backend\WebsiteController@edit')->name('website.edit');
    Route::post('/', 'App\Http\Controllers\Backend\WebsiteController@update')->name('website.update');

    // Home的更新
    Route::get('home', 'App\Http\Controllers\Backend\HomeController@edit')->name('home.edit');
    Route::post('home', 'App\Http\Controllers\Backend\HomeController@update')->name('home.update');

    // About的更新
    Route::get('about', 'App\Http\Controllers\Backend\AboutController@edit')->name('about.edit');
    Route::post('about', 'App\Http\Controllers\Backend\AboutController@update')->name('about.update');

    // Product的增刪改查還有index頁面
    Route::resource('product', 'App\Http\Controllers\Backend\ProductController', ['except'=> ['show']]);

    // Store的更新
    Route::get('store', 'App\Http\Controllers\Backend\StoreController@edit')->name('store.edit');
    Route::post('store', 'App\Http\Controllers\Backend\StoreController@update')->name('store.update');
});






 //Auth::routes();
//
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
