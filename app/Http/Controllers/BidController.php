<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\Auction;
use Auth;

class BidController extends Controller{
    function bid(Request $request){
        return $this->addBid($request->auction_id, $request->price);
    }

    function getHeighestBid($auctionId){
        return Bid::where('auction_id',$auctionId)->max('price');
    }

    function getItemId($auctionId){
        return Item::where('auction_id',$auctionId)->id;
    }
    
    function addBid($auctionId,$maxPrice){
        $auction = Auction::find($auctionId);
        $heighestBid = $auction->heighest_bid();//$this->getHeighestBid($auction['id']);
        
        $min_increment = $auction['min_increment'];
    
        $userId = Auth::user()->id;
        
        if(is_null($heighestBid['price'])){
            $currentBid = $auction['start_price'];
            Bid::create([
                'user_id'=>$userId,
                'auction_id'=>$auctionId,
                'price'=>$currentBid,
                'max_price'=>$maxPrice
            ]);
        }elseif($maxPrice > $heighestBid['price'] ){
            $old = $heighestBid; 
            
            $currentBid = $old['price'] + $min_increment;
            $new = [];
            $new['max_price'] = $maxPrice;
            $new['price'] = $currentBid;
            $new['user_id'] = $userId;
            $current = $new;
            $other = $old;
            
            while($new['max_price'] > $currentBid  && $old['max_price'] > $currentBid){
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
        }
        return redirect('item/'. $this->getItemId($auctionId));
    }
}
