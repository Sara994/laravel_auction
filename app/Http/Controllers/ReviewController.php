<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Item;
use App\User;
use Auth;

class ReviewController extends Controller{

    function addReview(Request $request){
        $user = Auth::user();
        $item = Item::find($request->item_id);
        $review = Review::where('item_id',$item->id)->where('user_id',$user->id)->first();
        $fields = [
            'user_id'=>Auth::user()->id,
            'item_id'=>$item->id,
            'feedback'=>is_null($request->feedback) ? "":$request->feedback,
            'star_num'=>$request->star_num
        ];

        if($review)
            $result = $review->update($fields);
        else
            $result = Review::create($fields);


        return redirect('/item/'.$item->id);
    }

    function editReview(Request $request){
        $reviewId = Item::find($request->review_id);
        $fields = [
            'feedback'=>$request->feedback,
            'star_num'=>$request->star_num
        ];
        $result = Review::where('id',$reviewId)->first()->update($fields);
        if($result){
            return json_encode(["success"=>true]);
        }
        return json_encode(["success"=>false]);
    }
    
    function getReviewsForItem($itemId){
        return json_encode(Item::find($itemId)->reviews);
    }
    function getReviewsForAllItemsByUser($userId){

    }

    function getUserRating($userId){

    }
}
