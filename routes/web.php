<?php

use Illuminate\Support\Facades\Route;
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

use App\Models\Product;
Route::get('/', function () {
	$this->data['products'] = Product::orderBy('name', 'DESC')->paginate(10);

	return view('welcome', $this->data);
    
});

Route::get('/cv', function() {
	return view('cv');
});

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
    function() {
        Route::get('dashboard', 'DashboardController@index');
        Route::resource('categories', 'CategoryController');

        Route::resource('products', 'ProductController');
		Route::get('products/{productID}/images', 'ProductController@images')->name('products.images');
		Route::get('products/{productID}/add-image', 'ProductController@addImage')->name('products.add_image');
		Route::post('products/images/{productID}', 'ProductController@uploadImage')->name('products.upload_image');
		Route::delete('products/images/{imageID}', 'ProductController@removeImage')->name('products.remove_image');

		Route::resource('attributes', 'AttributeController');
		Route::get('attributes/{attributeID}/options', 'AttributeController@options')->name('attributes.options');
		Route::get('attributes/{attributeID}/add-option', 'AttributeController@add_option')->name('attributes.add_option');
		Route::post('attributes/options/{attributeID}', 'AttributeController@store_option')->name('attributes.store_option');
		Route::delete('attributes/options/{optionID}', 'AttributeController@remove_option')->name('attributes.remove_option');
		Route::get('attributes/options/{optionID}/edit', 'AttributeController@edit_option')->name('attributes.edit_option');
		Route::put('attributes/options/{optionID}', 'AttributeController@update_option')->name('attributes.update_option');

        Route::resource('roles', 'RoleController');
		Route::resource('users', 'UserController');

        Route::resource('brands', 'BrandController');
        Route::resource('articles', 'ArticleController');
        Route::resource('category_article', 'CategoryArticleController');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
