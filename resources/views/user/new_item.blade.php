@extends('user')

@section('user_content')
<div style="align-self:start" class="boot">
    <form class="register_form" method="post" enctype="multipart/form-data">
 @csrf 
            <div>
                <lable for="">
                    اسم المنتج: *
                </lable>
                <input type="text"  name="title" value="" style="text-align:right;">
          
            </div>

            <div>
                العنوان الفرعي: *
                <br>
                <input type="text" name="subtitle" value="" style="text-align:right;">
            </div>

            <div>
               حالة المنتج: *
                <br>
                <input type="radio" checked name="status" value="0" style="align:right;"> جديد
                <input type="radio" name="status" value="1"> مستعمل
            </div>

             <div>
             القسم الرئيسي : *
                <br>
                <select name="category_id">
                    <option value="الاقسام"></option>
                    @foreach(App\ItemCategory::all() as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>  
            </div>
           <div>
                الوصف :*  
                <br>
                <input type="text" name="description" value="" style="text-align:right;">
            </div>
            <div>
                شراء :*  
                <br>
                <input type="text" name="buy_now" value="" style="text-align:right;">
            </div>


            <div>
                المدينة:* 
                <br>
                <select name="city_id">
                    <option value="الاقسام"></option>
                    @foreach(App\City::all() as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>  
            </div>

            <div>
                 ارفاق الصور:* 
                <br><input type="file"  name='photos[]' style="text-align:right;">             
            </div>
             <div>
                طريقة الدفع:* 
                <br>
                <input type="checkbox" name="sellerpage"   style="width:auto">
                <br>
                <input type="checkbox" name="sellerpage"  style="width:auto">
                <br>
                <input type="checkbox" name="sellerpage"  style="width:auto">

            </div>
            <div>
                 طريفة التوصيل:* 
                <br>
                <input type="text"  name='ship_method' value="" style="text-align:right;">
                
            </div>
            <div>
                 طريفة التوصيل:* 
                <br>
                <input type="text"  name='pay_method' value="" style="text-align:right;">
                
            </div>
        

            <input type="submit"  value="تنفيذ" style="margin:10px auto">
        </form>
</div>

@endsection