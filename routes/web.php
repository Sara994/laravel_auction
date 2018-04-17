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
use Intervention\Image\ImageServiceProvider;
use App\ItemCategory;
//use Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/item/{id}','ItemController@show');
Route::get('/bid',function(){ return view('item/bid');});

Route::group(['prefix'=>'user'],function(){
    Route::get('profile',function(){
        $user = Auth::user();
        return view('user/profile',['user'=> $user]);
    });
    Route::post('profile','UserController@update')->name('userprofile');
    Route::get('new_item',function(){
        $categories = ItemCategory::all();
        return view('user/new_item',['categories'=>$categories]);
    });
    Route::post('/new_item','ItemController@create');
    Route::get('/bids',function(){ return view('user/bids');});
    Route::get('/new_auction',function(){ return view('user/new_auction');});
    Route::get('/items',function(){ return view('user/items');});
    Route::get('/reviews',function(){ return view('user/reviews');});
});


Route::get('photos/{filename}', function ($filename)
{
    return Image::make(storage_path('app/photos/' . $filename))->response();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
