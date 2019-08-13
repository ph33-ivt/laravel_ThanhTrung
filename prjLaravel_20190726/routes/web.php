<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/cats', 'CatController');

Route::get('/cats', 'CatController@index')->name('list-cat');//list cats
/*Route::get('/cats/create', 'CatController@create')->name('form-create-cat');//show create form cat*/
/*Route::get('/cats/create', 'CatController@create')->name('form-create-cat')->middleware('isAdmin');*/
/*Route::get('/cats/create', 'CatController@create')->name('form-create-cat')->middleware(['owner', 'isAdmin']);// truong hop dung nhieu middleware*/
Route::post('/cats', 'CatController@store')->name('store-cat');//store cat
Route::delete('/cats/{id}', 'CatController@destroy')->name('delete-cat');// delete cat
//Route::get('/cats/{id}', 'CatController@destroy')->name('delete-cat');// delete cat
Route::get('/cats/{id}/edit', 'CatController@edit')->name('edit-cat');// edit cat
Route::put('/cats/{id}', 'CatController@update')->name('update-cat');// update cat

Route::get('/breeds', 'BreedController@index')->name('list-breed');//list breeds
Route::get('/breeds/{id}', 'BreedController@show')->name('show-breed');///show breed
/*Route::get('/breeds/{id}', 'BreedController@destroy')->name('delete-breed');//store cat*/

Route::get('/breeds/{id}/cats', 'BreedController@listCatByBreedID')->name('list-cat-of breed');//get all cat of breed

Route::get('/countries/{id}', 'CountryController@listPostByCountryId')->name('list-post-of-country');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*gom nhom cac route co cung middleware*/
/*Route::group([
    'prefix' => 'admin',
    'middleware' => ['isAdmin'],
    //'namespace' => 'Admin', //neu khai bao namespace thi cac controller nam trong folder admin
    //'as' => 'admin.', // tranh truowng hop ten route trung nhau
], function () {
    Route::get('/cats/create', 'CatController@create')->name('form-create-cat'); //http://laravel.php/admin/cats/create
    Route::get('/breeds/{id}', 'BreedController@show')->name('show-breed'); // admin.show-breed
});*/

// route -> middleware -> request - > controller

//ajax delete cat
Route::get('api/cats/{id}', 'API\CatController@destroy');

