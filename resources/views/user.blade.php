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





    .navigation {
        width: 300px;
        height:100%;
        background-color:#CCC;
    }

        /* reset our lists to remove bullet points and padding */
        .mainmenu, .submenu {
        list-style: none;
        padding: 0;
        margin: 0;
        }

        /* make ALL links (main and submenu) have padding and background color */
        .mainmenu a {
        display: block;
        background-color: #CCC;
        text-decoration: none;
        padding: 10px;
        color: #000;
        }

        /* add hover behaviour */
        .mainmenu a:hover {
            background-color: #C5C5C5;
        }


        /* when hovering over a .mainmenu item,
        display the submenu inside it.
        we're changing the submenu's max-height from 0 to 200px;
        */

        .mainmenu li:hover .submenu {
        display: block;
        max-height: 200px;
        }

        /*
        we now overwrite the background-color for .submenu links only.
        CSS reads down the page, so code at the bottom will overwrite the code at the top.
        */

        .submenu a {
        background-color: #999;
        }

        /* hover behaviour for links inside .submenu */
        .submenu a:hover {
        background-color: #666;
        }

        /* this is the initial state of all submenus.
        we set it to max-height: 0, and hide the overflowed content.
        */
        .submenu {
        overflow: hidden;
        max-height: 0;
        -webkit-transition: all 0.5s ease-out;
        }
    </style>
<div style="display:flex;flex:1">
    <div>
        <div class="navigation">
            <ul class="mainmenu">

                <li><a href="{{url('user/profile')}}"><span class ="fa fa-user"></span> معلومات الشخصية</a></li>  
                <li><a href="{{url('user/items')}}"><span class ="fa fa-user"></span>منتجاتي</a></li>  

                <li><a href="#"><span class="fas fa-gavel"></span>مزاداتي</a>

                    <ul class="submenu">
                        <li><a href="{{url('user/new_item')}}"><style class="fa fa-plus"></style>اضافة منتج </a></li>  
                        <li><a href="#"><style class="fa fa-edit"></style> تعديل منتج </a></li> 
                        <li><a href="#"><style class="fa fa-remove"></style> حذف منتج </a></li> 
                    </ul>
                </li>  

                <li><a href="#"><span class="fas fa-gavel"></span>مبيعاتي</a></li>  
                <li><a href="#"> <span class ="fa cart-plus"></span> مشترياتي</a></li>
                <li><a href="#"><span class ="fa fa-users"></span> تقيماتي</a></li>   
            </ul>  
        </div>
    </div>
    <div style="flex:1">
        @yield('user_content')
    </div>
</div>
@endsection