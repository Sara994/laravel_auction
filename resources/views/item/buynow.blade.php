@extends('item')
@section('price_info')

<div style="font-size:1.25rem">
    <div>السعر : {{$item->buy_now}} ريال</div>
</div>
@if($item->isActive())
    <form method="get" action="{{url('/item/confirm/' . $item->id)}}">
        <div class="submit_bid">
            <button type="submit" class="bid_btn">شراء</button>
        </div>
    </form>
@else

<div style="font-size:1.25rem">
    <h3>هذا المنتج تم يبعه</h3>
    <h3> تهانينا .. 
        <a href="{{url('/user/'.$item->auction->heighest_bid()->user->id)}}">
            {{$item->transaction->user->username}}
        </a>
    </h3>

</div>


@endif
@endsection