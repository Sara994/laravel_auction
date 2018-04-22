@extends('user')

@section('user_content')
<div style="align-self:center;width:60%;margin:auto;padding-top:10px">

    <div class="form-group">
        <div style="direction:ltr;width:100%" class="btn-group btn-group-toggle" data-toggle="buttons">
            <label style="width:50%" class="btn btn-secondary active" id="buy_now_button">
            <input type="radio" name="options" autocomplete="off" checked> شراء مباشر
            </label>
            <label style="width:50%" class="btn btn-secondary" id="bid_button">
            <input type="radio" name="options" autocomplete="off"> مزاد
            </label>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
        @csrf        
        <div class="form-group">
            <lable for="title">اسم المنتج: *</lable>
            <input class="form-control" id="title" type="text" name="title" style="text-align:right;">
        </div>
        <div class="form-group">
            <lable for="subtitle">العنوان الفرعي: *</lable>
            <input class="form-control" id="subtitle" type="text" name="subtitle" style="text-align:right;">
        </div>

        <div class="form-check">
            <div>حالة المنتج: *</div>
            <input class="" id="new_check" type="radio" checked name="status" value="0">
            <lable class="form-check-label" for="new_check">جديد</lable>
        </div>
        <div class="form-check">
            <input class="" id="used_check" type="radio" name="status" value="1">
            <lable class="form-check-label" for="used_check">مستعمل</lable>
        </div>

        <div class="form-group">
            <lable for="category_id">القسم : *</lable>
            <select class="form-control" id="category_id" name="category_id">
                <option value="الاقسام"></option>
                @foreach(App\ItemCategory::all() as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <lable for="description">الوصف : *</lable>
            <br>
            <input class="form-control" type="text" name="description" value="" style="text-align:right;">
        </div>

        <div class="form-group">
            <lable for="buy_now">السعر : *</lable>
            <input class="form-control" type="number" name="buy_now" value="" style="text-align:right;">
        </div>
        <div class="form-group" id="auction_inputs">

        </div>

        <div class="form-group">
            <lable for="city_id">المدينة : *</lable>
            <select class="form-control" name="city_id">
                <option value="الاقسام"></option>
                @foreach(App\City::all() as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>  
        </div>

        <div class="form-group">
            <lable for="photos[]">ارفاق الصور:* </lable>
            <input multiple="true" class="form-control" type="file"  name='photos[]' style="text-align:right;">             
        </div>
        <div class="form-group">
            <lable for="ship_method">طريقة التوصيل:* </lable>
            <input class="form-control" type="text"  name='ship_method' value="" style="text-align:right;">
        </div>
        <div class="form-group">
            <lable for="pay_method">طريقة الدفع:* </lable>
            <input class="form-control" type="text"  name='pay_method' value="" style="text-align:right;">
        </div>

        <div class="form-group" data-id="specs_row" >
            <div>
                <lable>خيارات إضافية:* </lable>
                <button onClick="addNewSpec()" type="button"><img src={{asset('img/plus.svg')}}> إضافة خيار جديد </button>
            </div>
        </div>
        
        <input class="form-control" type="submit"  value="تنفيذ" style="margin:10px auto">
    </form>
</div>

<script>

    $(function(){
        console.log("sdfsdf");
        $('#buy_now_button').click(function(){
            console.log("sdfsdf");
            $('#auction_inputs').html('');
        });
        $('#bid_button').click(function(){
            $('#auction_inputs').html('' +
            '<div class="form-group" style="background-color:#ccc">'+
            '<lable for="start_price">السعر الابتدائي : *</lable>' +
            '<input id="start_price" class="form-control" type="number" name="start_price" style="text-align:right;">' +
            '<lable for="min_increment">مقدار الزيادة : *</lable>' +
            '<input id="min_increment" class="form-control" type="number" name="min_increment" style="text-align:right;">'+
            '<lable for="end_time">وقت الانتهاء : *</lable>' +
            '<input id="end_time" class="form-control" type="datetime-local" name="end_time" style="text-align:right;">' +
            '</div>');
        });
    });


</script>

@endsection