<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;
use Auth;

class ItemController extends Controller{
    function create(Request $request){
        $fields = $request->except('photos');
        $fields['seller_id'] = Auth::user()->id;
        $item = Item::create($fields);
        $filenames = [];
        if(isset($request->photos)){
            for($i = 0; $i < count($request->photos) ;$i++) {

                if(!is_null($request->photos[$i]))
                    $filenames[] = $request->photos[$i]->store('photos');
            }
        }
        $item->update(['photos'=>json_encode($filenames)]);
        return view('user/profile');
    }

    function show($itemId){
        $item = Item::find($itemId);


        return view('item',['item'=>$item]);
    }

    function search($needle){
        $items = Item::where('title','like',"%$needle%")->get();
        return json_encode($items);
    }
}
