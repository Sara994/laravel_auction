@extends('layouts.app')
@section('content')
<div>
    <h2>{{$user->first_name}}</h2>
    <div style="width:20%">
        {{-- <img style="max-width: 100%" src="{{url('img/rating.jpeg')}}"> --}}
        <span class="staticStarRating">
            <input type="radio" name="star_num" value="5" {{$user->rating() == 5? "checked":""}}>
            <label >5</label>
            <input type="radio" name="star_num" value="4" {{$user->rating() == 4? "checked":""}}>
            <label>4</label>
            <input type="radio" name="star_num" value="3" {{$user->rating() == 3? "checked":""}}>
            <label>3</label>
            <input type="radio" name="star_num" value="2" {{$user->rating() == 2? "checked":""}}>
            <label>2</label>
            <input type="radio" name="star_num" value="1" {{$user->rating() == 1? "checked":""}}>
            <label>1</label>
        </span>
    </div>
</div>
<div>
    <fieldset>
        <legend>منتجاتي</legend>
        @foreach($items as $item)
        <div class="card-container">
            <div class="card" onclick="window.location = '{{'/item/' . $item->id}}'">
                <div class="front">
                    <div class="cover">
                        <img src="{{ is_array($item->photos()) && count($item->photos()) > 0 ? '/'. $item->photos()[0]:url('/img/placeholder.gif')}}" style="max-height;100%;max-width:100%;">
                    </div>
                    <div class="content">
                        <div class="main">
                            <h3 class="name">{{$item->title}}</h3>
                            @foreach($item->specs->slice(0,2) as $spec)
                            <div class="row card-spec text-center">
                                <label class="col-5">{{$spec->spec_key}}:</label>
                                <span class="col-5">{{$spec->spec_value}}  </span>
                            </div>
                            @endforeach
                        </div>
                        <div class="price">
                            <div style="font-size:1.25rem">
                                @if(!is_null($item->auction))
                                    <p style="font-size:1.25rem">الوقت المتبقي :<span id="timer_{{$item->id}}"></span></p>
                                @else
                                    <p style="font-size:1.25rem">السعر:   {{$item->buy_now}} رس</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> <!-- end front panel -->
                <div class="back">
                    <div class="text-center"><h4>{{$item->title}}</h4></div>
                    @foreach($item->specs->slice(0,15) as $spec)
                    <div class="row card-spec text-center">
                        <label class="col-5">{{$spec->spec_key}}:</label>
                        <span class="col-5">{{$spec->spec_value}}  </span>
                    </div>
                    @endforeach
                </div> <!-- end back panel -->
            </div> <!-- end card -->
        </div>
    @endforeach
    </fieldset>
</div>
@endsection('content')