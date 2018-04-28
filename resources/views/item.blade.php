@extends('layouts.app')
@section('content')
<div style="display: flex">
    <div style="flex:5;border:1px solid #F01010;border-radius:10px;margin:5px;padding:10px">
        <div style="display:flex">
            <div style="flex:1;padding:10px">
                <div>
                    @if( count($item->photos()) > 0)
                        <img style="width:100%" src="{{ url($item->photos()[0]) }}" />
                    @else
                        <img style="width:100%" src="{{ url('img/placeholder.gif') }}" />
                    @endif
                </div>
                <div class="more_products">
                    @for ($i = 1; $i < count($item->photos()); $i++)
                        <div><img style="max-width:100%" src="{{ url($item->photos()[$i]) }}" /></div>
                    @endfor
                </div>
            </div>
            <div style="flex:3;display:flex;flex-direction:column;justify-content:space-between">
                <div style="align-self:flex-end;margin:20px">
                    <h3>البائع: <a href="{{url('/user/'.$item->seller->id)}}">{{$item->seller->username}}</a> </h3>
                    <div style="width:20%">
                        {{-- <img style="max-width: 100%" src="{{url('img/rating.jpeg')}}"> --}}
                        <span class="staticStarRating">
                            <input type="radio" name="star_num" value="5" {{$item->seller->rating() == 5? "checked":""}}>
                            <label >5</label>
                            <input type="radio" name="star_num" value="4" {{$item->seller->rating() == 4? "checked":""}}>
                            <label>4</label>
                            <input type="radio" name="star_num" value="3" {{$item->seller->rating() == 3? "checked":""}}>
                            <label>3</label>
                            <input type="radio" name="star_num" value="2" {{$item->seller->rating() == 2? "checked":""}}>
                            <label>2</label>
                            <input type="radio" name="star_num" value="1" {{$item->seller->rating() == 1? "checked":""}}>
                            <label>1</label>
                        </span>
                    </div>
                </div>
                <div>
                    <span style="font-weight:900;font-size:2rem">{{$item->title}}</span>
                    <span><img class="fav_star" src="{{url('img/star.png')}}"></span>
                    <span>أضف إلى المفضلة</span>
                </div>
                <span style="font-weight:900;font-size:1rem">مستعمل قليلا منذ 2016 سعة 5 جيجابايت</span>
                <span style="font-weight:900;font-size:1rem;color:rgb(102, 102, 102)">رقم السلعة: 10888738</span>
             <!-- <hr align="right" style="width:50%"> -->
                <hr align="right" style="width:50%"> 
                <div style="font-size:1.3rem">
                    الأقسام: 
                    @foreach($item->category() as $category)
                        {{ $category->title }}
                    @endforeach
                </div>
                @yield('price_info')
            </div>
        </div>
        <hr>
    </div>
    <div style="flex:1">
        <img style="max-width:100%" src="{{url('img/lenovo.png')}}">
        <img style="max-width:100%" src="{{url('img/lenovo.png')}}">
        <img style="max-width:100%" src="{{url('img/lenovo.png')}}">
    </div>
</div>
@endsection