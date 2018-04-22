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
use App\City;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//use Auth;

Route::get('/', function () {
    $featured_items = App\Item::orderBy('created_at','desc')->limit(30)->get();
    $items = [];
    foreach($featured_items as $item){
        if(!is_null($item->auction)){
            if(! $item->auction->isExpired())
                $items[] = $item;
        }else{
            $items[] = $item;
        }
    }
    $items = array_slice($items,0,12);

    return view('welcome',['featured_items'=>$items]);
});

Route::group(['prefix'=>'item'],function(){
    Route::get('/search/{needle}','ItemController@search');
    Route::get('/{id}','ItemController@show');
    Route::post("/{id}/bid",'BidController@bid')->middleware('auth');
});

Route::get('/bid',function(){ return view('item/bid');});

Route::group(['prefix'=>'user'],function(){
    Route::get('profile',function(){
        $user = Auth::user();
        return view('user/profile',['user'=> $user]);
    });
    Route::post('profile','UserController@update')->name('userprofile')->middleware('auth');
    Route::get('new_item',function(){
        $categories = ItemCategory::all();
        return view('user/new_item',['categories'=>$categories]);
    })->middleware('auth');

    Route::post('/new_item','ItemController@create')->middleware('auth');
    Route::get('/bids',function(){ return view('user/bids');});
    
    Route::get('/new_auction',function(){ return view('user/new_auction');})->middleware('auth');
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

Route::get('photos/{filename}', function ($filename){
    return Image::make(storage_path('app/photos/' . $filename))->response();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add',function(){
    Schema::create('item_spec',function(Blueprint $table){
        $table->increments('id');
        $table->unsignedinteger('item_id');
        $table->string('spec_key');
        $table->string('spec_value');
        $table->timestamps();

        $table->foreign('item_id')->references('id')->on('item');
    });
});