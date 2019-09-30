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
/* todo: Testing purpese Route*/
//Route::get('/porductshowid',function (){
//    return view('Frontend.Pages.add_to_cart');
//});
/*
Route
 *FRONTEND Controller
------------------------------------------------------
 * */
Route::get('/','frontendController@index');
Route::get('/showproduct_by_category/{category_id}','frontendController@showproduct_by_category');
Route::get('/showproduct_by_menufacture/{menufacture_id}','frontendController@showproduct_by_menufacture');
Route::get('/productdetails/{product_id}','frontendController@productDetails');

Route::post('subcriber','subcriberController@subcriber');
Route::post('/add_to_cart','cartController@addToCart');



/*
 *todo: BACKEND Controller
------------------------------------------------------
 * */
Route::get('/logout','superAdminController@logout');
Route::get('admin','backendController@index');
Route::post('admin_deshboard','backendController@admin_deshboard');


/*todo: Category Controller */
Route::resource('category','CategoryController');
Route::get('/destroy_category/{category_id}','CategoryController@destroy_category');
Route::post('update_category/{category_id}','CategoryController@update_category');
Route::get('unactive_ctry/{category_id}','backendController@unactive_ctry');
Route::get('active_ctry/{category_id}','backendController@active_ctry');


Route::get('dashboard',function(){
    return view('Backend.dashbord');
});

/* todo: Menufacture or Brand route here*/
Route::resource('menufacture','menufactureController');
Route::post('update_menufacture/{menufacture_id}','menufactureController@update_menufacture');
Route::get('destroy_menufacture/{menufacture_id}','menufactureController@destroy_menufacture');
Route::get('unactive_menufact/{category_id}','backendController@unactive_menufact');
Route::get('active_menufact/{category_id}','backendController@active_menufact');


/* todo: Product all route here */
Route::resource('product','productController');
Route::post('update_product/{product_id}','productController@update_product');
Route::get('destroy_product/{product_id}','productController@destroy_product');
Route::get('unactive_product/{product_id}','backendController@unactive_product');
Route::get('active_product/{product_id}','backendController@active_product');

/* todo: Slider all route here */
Route::resource('sliderImage','SliderController');
Route::get('destroy/{slider_id}','SliderController@destroy');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');

/* todo: Customer all route here */
Route::resource('customer','custormerController');


/* todo: Sell Man Details  all route here */
Route::resource('sellman','sellManController');
Route::post('/sellman/{id}','sellManController@update');
Route::get('/del/{id}','sellManController@destroy');
