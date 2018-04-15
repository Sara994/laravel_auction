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
                    <span style="font-weight:900;font-size:2rem">لابتوب لينوفا</span>
                    <span><img class="fav_star" src="img/star.png"></span>
                    <span>أضف إلى المفضلة</span>

                </div>
                <hr align="right" style="width:50%">
                <div style="font-size:1.5rem">
                    لاب توب مستعمل, استعمال قليل, نظيف وبحالة جيدة
                </div>
                <hr align="right" style="width:50%">
                <div style="font-size:1.5rem">
                    الأقسام: الالكترونيات
                </div>
                <div style="font-size:1.25rem">
                    <div>السعر : ٨٥٠ ريال</div>
                </div>
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