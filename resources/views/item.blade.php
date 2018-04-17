@extends('layouts.app')
@section('content')
<div style="display: flex">
    <div style="flex:5;border:1px solid #F01010;border-radius:10px;margin:5px;padding:10px">
        <div style="display:flex">
            <div style="flex:1;padding:10px">
                <div>
                    <img style="width:100%" src="img/dell.png" />
                </div>
                <div class="more_products">
                    <div><img style="max-width:100%" src="img/xps13-1.jpeg" /></div>
                    <div><img style="max-width:100%" src="img/xps13-2.png" /></div>
                    <div><img style="max-width:100%" src="img/xps13-1.png" /></div>
                </div>
            </div>
            <div style="flex:3;display:flex;flex-direction:column;justify-content:space-between">
                <div style="align-self:flex-end;margin:20px">
                    <h3>البائع: <a href="#">ِAhmad201</a> </h3>
                    <div style="width:20%"><img style="max-width: 100%" src="img/rating.jpeg"></div>
                </div>
                <div>
                    <span style="font-weight:900;font-size:2rem">{{$one->title}}</span>
                    <span><img class="fav_star" src="img/star.png"></span>
                    <span>أضف إلى المفضلة</span>

                </div>
                <span style="font-weight:900;font-size:1rem">مستعمل قليلا منذ 2016 سعة 5 جيجابايت</span>
                <span style="font-weight:900;font-size:1rem;color:rgb(102, 102, 102)">رقم السلعة: 10888738</span>
             <!-- <hr align="right" style="width:50%"> -->
                <hr align="right" style="width:50%"> 
                <div style="font-size:1.3rem">
                    الأقسام: الالكترونيات
                </div>
                @yield('price_info')
            </div>
        </div>
        <hr>
        <div class="submit_bid">
            <button class="bid_btn">شراء</button>
        </div>
    </div>
    <div style="flex:1">
        <img style="max-width:100%" src="img/lenovo.png">
        <img style="max-width:100%" src="img/lenovo.png">
        <img style="max-width:100%" src="img/lenovo.png">
    </div>
</div>
@endsection