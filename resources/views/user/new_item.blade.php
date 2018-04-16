@extends('user')

@section('user_content')
<div class="boot">
<form class="register_form" method="post" onsubmit="try { var myValidator = validate_signup_register_personal_form; } catch(e) { return true; } return myValidator(this);">

            <div>
                <lable for="">
                    الاسم : *
                </lable>
                <input type="text"  name="title" value="" style="text-align:right;">

            </div>

            <div>
                الاسم الأخير: *
                <br>
                <input type="text" id="lastname" name="subtitle" value="" style="text-align:right;">
            </div>

            <div>
                اسم المستخدم:* 
                <br>
                <input type="text" id="user_name" name="description" value="" style="text-align:right;">
            </div>


            <div>
                البريد الإلكتروني:* 
                <br>
                <input type="text" name="buy_now" value="" style="text-align:right;">
            </div>
            

            <div>
                PAyment Method:* 
                <br>
                <input type="text"  name="payMethod" value="" style="text-align:right;">
            </div>
            <div>
                Shipping Method :* 
                <br>
                <input type="text"  name='shipMethod' value="" style="text-align:right;">
            </div>
            <div>
                المدينة:* 
                <br>
                <input type="text"  name='photos' value="" style="text-align:right;">
            </div>
            <div>
                المدينة:* 
                <br>
                <input type="text"  name='category' value="" style="text-align:right;">
            </div>
            <div>
                المدينة:* 
                <br>
                <input type="text"  name="status" value="" style="text-align:right;">
            </div>


            <div>
                المدينة:* 
                <br>
                <input type="text" name="payMethod" value="" style="text-align:right;">
            </div>

            

            <div>
                الرقم السري:*
                <br>
                <input type="password" id="password" name="password" value="" style="text-align:left;">
            </div>

            <div>
                تأكيد الرقم السري:* 
                <br>
                <input type="password" id="Rpassword" name="Rpassword" value="" style="text-align:left;">
            </div>


            <div style="margin-top:20px">
                <fieldset>
                    <legend> هل تريد صفحة تعريف عن نفسك </legend>

                    <input type="checkbox" name="sellerpage"  style="width:auto">
                    <label for="aboutmepage">نعم أريد</label>
                </fieldset>
            </div>


            <input type="submit" name = "register" value="تسجيل" style="margin:10px auto">
        </form>
</div>

@endsection