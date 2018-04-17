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
                    <li>
                    <a href="#"><span class="arrow">&#9660;</span></a>
                    <ul class="sub-menu">
                    <li>الكترونيات </li>
                    <li>سيارات</li>
                    </ul>
                    </li>
            </div>
            <div>
                Category :*  
                <br>
                <input type="text" name="category" value="" style="text-align:right;">
            </div>

             <div>
               القسم الفرعي : *
                <br>
                <li>
                    <a href="#"><span class="arrow">&#9660;</span></a>
                    <ul class="sub-menu">
                    <li>الكترونيات </li>
                    <li>سيارات</li>
                    </ul>
                    </li>   
             </div>


           <div>
                الوصف :*  
                <br>
                <input type="text" name="description" value="" style="text-align:right;">
            </div>
            <div>
                Buy Now :*  
                <br>
                <input type="text" name="buy_now" value="" style="text-align:right;">
            </div>


            <div>
                المدينة:* 
                <br>
                <input type="text" name="city" value="ناخذها من بوفايل اليوزر" style="text-align:right;">
            </div>

            <div>
                طريقة الدفع:* 
                <br>
                <input type="checkbox" name="sellerpage"  style="width:auto">
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
            <div>
                 طريفة التوصيل:* 
                <br>
                <input type="file"  name='photos[]' style="text-align:right;">
                
            </div>

            <input type="submit"  value="تنفيذ" style="margin:10px auto">
        </form>
</div>

@endsection