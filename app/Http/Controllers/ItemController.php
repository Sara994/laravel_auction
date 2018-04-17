<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    function create(Request $request){
        $item = Item::create($request->except('photos'));
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


        return view('item',['one'=>$item]);
    }
}
