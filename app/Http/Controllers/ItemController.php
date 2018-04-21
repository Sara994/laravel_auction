<?php

namespace App\Http\Controllers;
use App\Item;
use App\ItemTransaction;
use App\Auction;
use Illuminate\Http\Request;
use Auth;
use Log;
use DB;

class ItemController extends Controller{
    function create(Request $request){
        $fields = $request->except(['photos','end_time','start_price','min_increment']);
        $fields['seller_id'] = Auth::user()->id;
        if($request->end_time && $request->min_increment && $request->start_price){
            $auction = Auction::create([
                'start_time'=>date("Y-m-d H:i:s"),
                'end_time'=>$request->end_time,
                'min_increment'=>$request->min_increment,
                'start_price'=>$request->start_price,
                'buy_now'=>$request->buy_now
            ]);

            $fields['auction_id'] = $auction->id;
        }

        $item = Item::create($fields);
        $filenames = [];
        if(isset($request->photos)){
            for($i = 0; $i < count($request->photos) ;$i++) {

                if(!is_null($request->photos[$i]))
                    $filenames[] = $request->photos[$i]->store('photos');
            }
        }
        $item->update(['photos'=>json_encode($filenames)]);
        return redirect('user/profile');
    }

    public static function getLatestWithCategory($categoryId,$count){
        return DB::table('item')->where('category_id',$categoryId)
            ->orderBy('created_at','desc')->limit(5)->get();
    }

    function show($itemId){
        $item = Item::find($itemId);

        if($item->auction){
            $item->auction['expired'] = $item->auction->isExpired();
            return view('item/bid',['item'=>$item]);
        }else
            return view('item/buynow',['item'=>$item]);
    }

    function search($needle){
        $items = Item::where('title','like',"%$needle%")->get();
        return json_encode($items);
    }
}
