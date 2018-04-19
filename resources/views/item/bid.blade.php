@extends('item')
@section('price_info')


<div style="font-size:1.25rem">
    الوقت المتبقي: <span id="end_time_counter"></span>
    <script>
        var end_time = new Date("{{ $item->auction->end_time}}");
        setInterval(() => {
            var diff = end_time - new Date();
            var seconds = parseInt(diff/1000)%60;
            var minutes = parseInt(diff/60000)%60;
            var hours = parseInt(diff/3600000)%24;
            var days = parseInt(diff / (60 * 60 * 1000 * 24));
            
            document.getElementById('end_time_counter').innerText = days + ":" + hours +":" + minutes + ":" + seconds;
        }, 1000,0);
        
    </script>
</div>

<div style="font-size:1.25rem">
    <form action="{{url('/item/'.$item->id.'/bid')}}" method="post">
        @csrf
        <input name="price" value="{{$item->auction->minimum_bid()}}" type="number" min="{{$item->auction->minimum_bid()}}" step="{{$item->auction->min_increment}}">
        <input type="hidden" name="auction_id" value="{{$item->auction->id}}">
        <input type="submit" value="Bid" >
        <div> أعلى مزايدة الآن: {{$item->auction->heighest_bid()}}</div>
    </form>
</div>
@endsection