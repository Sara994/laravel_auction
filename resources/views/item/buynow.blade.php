@extends('item')
@section('price_info')

<div style="font-size:1.25rem">
    <div>السعر : {{$item->buy_now}} ريال</div>
</div>

@if($item->isActive() && Auth::user()->id != $item->seller->id)
    <form method="get" action="{{url('/item/confirm/' . $item->id)}}">
        <div class="submit_bid">
            <button type="submit" class="bid_btn">شراء</button>
        </div>
    </form>
@else


<div style="font-size:1.25rem">
    <h3>هذا المنتج تم يبعه</h3>
</div>
<div>
    @php $rating = App\Review::where('item_id',$item->id)->where('user_id',Auth::user()->id)->first() @endphp
    @php $transaction = App\ItemTransaction::where('item_id',$item->id)->first() @endphp

    @if(is_null($rating) && $transaction->user->id == Auth::user()->id)
    <fieldset>
        <legend>تقييم المنتج </legend>
        <form method="post" action="{{url('/item/'.$item->id.'/review')}}">
            @csrf
            <div class="single-rating">
                <span class="starRating">
                    <input data-id="rating5" type="radio" name="star_num" value="5">
                    <label data-id="rating5">5</label>
                    <input data-id="rating4" type="radio" name="star_num" value="4">
                    <label data-id="rating4">4</label>
                    <input data-id="rating3" type="radio" name="star_num" value="3">
                    <label data-id="rating3">3</label>
                    <input data-id="rating2" type="radio" name="star_num" value="2">
                    <label data-id="rating2">2</label>
                    <input data-id="rating1" type="radio" name="star_num" value="1">
                    <label data-id="rating1">1</label>
                </span>
                <div><input type="hidden" name="item_id" value="{{$item->id}}"></div>
                <div><textarea name="feedback"></textarea></div>
                <div><input type="submit" class="btn btn-default" value="حفظ"></div>
            </div>
        </form>
    </fieldset>
    @else
        <div>شكرا لتقييمك هذا المنتج</div>
    @endif
</div>
@endif
@endsection