<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\Auction;
use Auth;
use App\Item;
use Log;

class BidController extends Controller{
    function bid(Request $request){
        return $this->addBid($request->auction_id, $request->price);
    }

    function getItemId($auctionId){
        return Item::where('auction_id',$auctionId)->get()[0]->id;
    }
    
    function addBid($auctionId,$maxPrice){
        $auction = Auction::find($auctionId);
        if($auction->isExpired()){
            abort(401,'Auction Expired');
        }
        $heighestBid = $auction->heighest_bid();//$this->getHeighestBid($auction['id']);
        
        $min_increment = $auction['min_increment'];
    
        $userId = Auth::user()->id;
        
        if(is_null($heighestBid)){
            $currentBid = $auction['start_price'];
            Bid::create([
                'user_id'=>$userId,
                'auction_id'=>$auctionId,
                'price'=>$currentBid,
                'max_price'=>$maxPrice
            ]);
        }elseif($maxPrice > $heighestBid['price'] && $heighestBid['user_id'] != $userId){
            $old = $heighestBid; 
            
            $currentBid = $old['price'] + $min_increment;
            $new = [];
            $new['max_price'] = $maxPrice;
            $new['price'] = $currentBid;
            $new['user_id'] = $userId;
            $current = $new;
            $other = $old;
            
            while($current['max_price'] > $currentBid  && $other['max_price'] > $currentBid){
                Log::error("inside");
                $temp = $current;
                $current = $other;
                $other = $temp;
                
                // insert other, update currentBid, 
                $currentBid = $other['price'];
                Bid::create([
                    'user_id'=>$other['user_id'],
                    'auction_id'=>$auctionId,
                    'price'=>$currentBid,
                    'max_price'=>$other['max_price']
                ]);

                $current['price'] = $other['price'] + $min_increment;
            }
            Log::error($auction->heighest_bid()['user_id'] . "|$userId, $maxPrice , $currentBid");

            if($auction->heighest_bid()['user_id'] != $userId && $maxPrice >= $currentBid){
                Bid::create([
                    'user_id'=>$userId,
                    'auction_id'=>$auctionId,
                    'price'=>$currentBid,
                    'max_price'=>$new['max_price']
                ]);
            }
        }
        return redirect('item/'. $this->getItemId($auctionId));
    }
}
