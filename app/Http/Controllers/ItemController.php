<?php

namespace App\Http\Controllers;
use App\Item;
use App\ItemTransaction;
use App\Auction;
use App\ItemSpec;
use Illuminate\Http\Request;
use Auth;
use Log;
use DB;

class ItemController extends Controller{
    function create(Request $request){
        $fields = $request->except(['photos','end_time','start_price','min_increment']);
        $fields['seller_id'] = Auth::user()->id;
        $extraFields = [];

        foreach($fields as $index => $field){
            if(substr( $index, 0, 9 ) === "spec_key_"){
                $extraFields[$field] = $fields['spec_value_' . substr($index,9)];
            }
        }
        
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

        foreach($extraFields as $index => $field){
            ItemSpec::create([
                'item_id' => $item->id,
                'spec_key' => $index,
                'spec_value' => $field
            ]);
        }
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

    function buy(Request $request){
        $item = Item::find($request->item_id);
        if(isset($item->auction) || !$item->isActive()){
            abort(500,'Item is not for sale');
        }
        if($request->price != $item->buy_now){
            abort(500,'Price doesnt match');
        }

        ItemTransaction::create([
            'item_id'=>$item->id,
            'user_id'=>Auth::user()->id,
            'price'=>$item->buy_now,
            'name'=>$request->name,
            'phone'=>$request->phone
        ]);

        return redirect('/item/'.$item->id);
    }

    function myItems(){
        $items = Item::where('seller_id',Auth::user()->id)->orderby('created_at','desc')->get();
        return view('/user/items',['items'=>$items]);
    }

    function delete($itemId){
        $item = Item::find($itemId);
        if($item->seller->id != Auth::user()->id || !$item->isActive()){
            abort('403','UnAuthorized Access');
        }

        $item->delete();

        return redirect('user/items');
    }
}