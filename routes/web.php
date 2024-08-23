<?php



use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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




Auth::routes();
Route::group(['middleware'=>['guest']],function (){

    Route::get('/', function()
    {
        return View('auth.login');
    });
});






Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);
});


Route::group(['namespace' => 'App\Http\Controllers\Grades'], function () {
    Route::resource('Grades','GradeController');
});



