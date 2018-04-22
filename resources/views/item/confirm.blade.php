@extends('item')
@section('price_info')

<div style="font-size:1.25rem">
    <div>السعر : {{$item->buy_now}} ريال</div>
</div>

<div>هل أنت متأكد من الشراء ؟</div>
<form method="post">
    @csrf
    <div class="row">
        <div class="col form-group">
            <lable for="name">الاسم: *</lable>
            <input required class="form-control" type="text" id="name" name="name" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" style="text-align:right;">
        </div>
        <input type="hidden" name="item_id" value="{{$item->id}}">
        
        <div class="col form-group">
            <lable for="phone">رقم الجوال : *</lable>
            <input required class="form-control" type="text" id="phone" name="phone" value="{{Auth::user()->phone}}" style="text-align:right;">
        </div>

        <div class="col form-group">
            <lable for="buy_now">تأكيد السعر : (يجب أن يكون مطابق للسعر المعروض)</lable>
            <input class="form-control" type="number" name="price"  style="text-align:right;">
        </div>
    </div>
    <div class="submit_bid">
        <button type="submit" class="bid_btn">شراء</button>
    </div>
</form>

@endsection