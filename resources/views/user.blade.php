@extends('layouts.app')
@section('content')

<style type="text/css">
    body{
    padding: 0;
    margin: 0; }
    .my_menu ul{
        list-style: none;
        margin: 0;
        padding: 0;
    } 
    .my_menu ul li{
        padding: 15px;
        position: relative;
        width: 200px;
        vertical-align: middle;
        background-color: #B6B1B1;
        cursor: pointer;
        border-top: 1px solid #6B6B6B;
        -webkit - transition: all 0.3s;
        -o- transition: all 0.3s;
        transition: all 0.3s;
    }
    .my_menu ul li:hover{
        background-color: #6F6F6F;
    }
.my_menu > ul > li{
    border-right: 5px solid #000101;
}
    .my_menu ul ul{ 
        transition: all 0.3s;
        opacity: 0;
        position: absolute;
        border-right:  5px solid #000101;
        visibility: hidden;
        right: 90%;
        top:-2%;
    
    }
    .my_menu ul li:hover > ul{
        opacity: 1;
        visibility: visible;
    }
    .my_menu ul li a{
        color: #fff;
        text-decoration: none;
    }
    span {
        margin-right: 15PX;
    }
    .my_menu >: ul > li: nth-of-type(2)::afrer{
        content: "+";
        position: absolute;
        margin-right: 35% ;
        color: #fff;
        font-size: 20px;
    }
</style>
<div style="display:flex;flex:1">
    <div>
        <form >
            <div class="my_menu">
                <ul>

                <li><a href="#"><span class ="fa fa-user"></span> معلومات الشخصية</a></li>  

                <ul>
                    <li><a href="#"><style class="fa fa-plus"></style>اضافة منتج </a></li>  
                    <li><a href="#"><style class="fa fa-edit"></style> تعديل منتج </a></li> 
                    <li><a href="#"><style class="fa fa-remove"></style> حذف منتج </a></li> 
                </ul>


                    <li><a href="#"><span class="fas fa-gavel"></span>مزايداتي</a></li>  
                    <li><a href="#"> <span class ="fa cart-plus"></span> مشترياتي</a></li>
                    <li><a href="#"><span class ="fa fa-users"></span> تقيماتي</a></li>   
                </ul>  
            </div>
        </form>
    </div>
    <div style="flex:1;background-color:green">

        @yield('user_content')

    </div>
</div>
@endsection