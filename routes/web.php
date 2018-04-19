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

Route::group(['prefix'=>'item'],function(){
    Route::get('/search/{needle}','ItemController@search');
    Route::get('/{id}','ItemController@show');
    Route::post("/{id}/bid",'BidController@bid');
});

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

Route::get('following',function(){return view('items',['items'=>[]]);});
Route::get('today',function(){
    $items = App\Item::join('auction','auction.id','item.auction_id')->whereDay('start_time', date('d'))->get();
    return view('items',['items'=>$items]);
});
Route::get('ending_today',function(){
    $items = App\Auction::whereDay('end_time', date('d'))->get();
    return view('items',['items'=>$items]);
});
Route::get('last_chance',function(){
    $items = App\Auction::whereDay('end_time', date('h'))->get();
    return view('items',['items'=>$items]);
});
Route::get('buy_now',function(){
    $items = App\Item::whereNull('auction_id')->limit(10)->get();
    return view('items',['items'=>$items]);
});
Route::get('most_bid',function(){return view('items',['items'=>[]]);});


Route::get('photos/{filename}', function ($filename)
{
    return Image::make(storage_path('app/photos/' . $filename))->response();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
