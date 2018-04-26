@extends('item')
@section('price_info')



@if($item->auction->isExpired())

<div style="font-size:1.25rem">
    <h3>هذا المزاد منتهي</h3>
    @if(!is_null($item->auction->heighest_bid()))
    <h3> تهانينا .. 
        <a href="{{url('/user/'.$item->auction->heighest_bid()->user->id)}}">
            {{$item->auction->heighest_bid()->user->username}}
        </a>
    </h3>
    @else
        <h3> لم يوجد أي مزايدات على هذا المنتج
            
        </h3>
    @endif

</div>
<div>
    <table class="table">
        <thead><tr>
            <th scope="col">Price</td>
            <th scope="col">Username</td>
        </tr></thead>
        <tbody>
    
    @foreach($item->auction->bids as $bid)
        <tr>
            <th scope="row">{{$bid->price}}</th>
            <td>{{$bid->user->username}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@else
<div style="font-size:1.25rem">
    الوقت المتبقي: <span id="end_time_counter"></span>
    <script>
        count_down('end_time_counter',"{{ $item->auction->end_time}}");    
    </script>
</div>

<div style="font-size:1.25rem">
    <form action="{{url('/item/'.$item->id.'/bid')}}" method="post">
        @csrf
        <input name="price" value="{{$item->auction->minimum_bid()}}" type="number" min="{{$item->auction->minimum_bid()}}" step="{{$item->auction->min_increment}}">
        <input type="hidden" name="auction_id" value="{{$item->auction->id}}">
        <input type="submit" value="Bid" >
        <div> أعلى مزايدة الآن: {{$item->auction->heighest_bid()['price']}}</div>
    </form>
</div>
@endif
@endsection