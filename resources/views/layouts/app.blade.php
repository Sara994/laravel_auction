<!doctype html>
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/boot.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style_item.css') }}">
    <script src="{{asset('js/script.js')}}"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> ZAD </title>
    <style>
        body{
            text-align:right;

        }
        </style>
</head>

<body style="display:flex;flex-direction:column;min-height:100vh">
    <header class="navbar" style="max-height:15vh">
        <div style="display:flex; margin:0 5px">
            <img src="{{asset('img/logo.png')}}" alt="HTML5 Icon" style="max-height: 10vh;align-self:center">
        </div>

        <h2 style="flex:1; align-self:center"> زاد+ </h2>
        @guest
        <!-- <a style="align-self: center;padding:0 20px" href="{{url('login')}}"> تسجيل دخول</a>
        <a style="align-self: center;padding:0 20px" href="{{url('register')}}">تسجيل</a>
         -->
        
        <span><a class="nav-link" href="{{ route('login') }}">{{ __('main.login') }}</a></span>
        <span><a class="nav-link" href="{{ route('register') }}">{{ __('main.register') }}</a></span>
        @else
        <span class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->first_name }} 
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{url('user/profile')}}">الملف الشخصي</a>
                <a class="dropdown-item" href="{{url('user/new_item')}}">أضف منتج</a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('main.logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </span>
        @endguest

        <a style="align-self: center;padding:0 20px" href="{{url('help')}}">مساعدة
        </a>
    </header>

    <nav class="menu_list" style="margin-bottom:10px;display:flex;overflow:visible;position:relative">
        <div style="flex:2;justify-content:center;display:flex;">
            <input id="search" type="text" placeholder="ابحث عن" style="width:90%;line-height:2;align-self:center">
        </div>

        <div class="dropdown-container">
            <div class="dropdown">
                <button class="dropbtn" style="margin:0px;border-left:solid; border-right:solid; border-width: thin; border-color:black">المدن</button>
                <div class="dropdown-content">
                    
                    @foreach (App\City::all() as $city)
                        <div><a href="#">{{$city->name}}</a></div>
                    @endforeach
                    
                </div>
            </div>

            <div style="flex:1" class="dropdown">
                <button class="dropbtn" style="margin:0px;border-left:solid; border-right-color:#b30000; border-width: thin; border-color:black">الأقسام</button>
                <div class="dropdown-content">
                    @foreach (App\ItemCategory::whereNull('parent_id')->get() as $category)
                        <div><a href="#">{{$category->title}}</a></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div style="align-self:center;margin-right:15px;">
            <button>ابحث</button>
        </div>
        <div style="Flex:8"></div>

    </nav>
    <nav>
        <div id="wrap">
            <div id="nheader">
                <div>
                    <div class="header">
                        <div class="menu">
                            <ul class="menu_list">

                                <li>
                                    <a class="active" href="Zad_follow.php">متابعاتي </a>
                                </li>
                                <li>
                                    <a class="active" href="Zad_new.php">جديد اليوم </a>
                                </li>

                                <li>
                                    <a href="Zad_End.php">ستنتهي اليوم </a>
                                </li>

                                <li>
                                    <a href="Zad_chance.php"> الفرصة الاخيرة</a>
                                </li>
                                <li>
                                    <a href="Zad_BuyNow.php">اشتر الآن</a>
                                </li>
                                <li>
                                    <a href="Most_Bid.php">الاكثر مزايدة</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

   
       <!-- 
            <script>
            <?php

        //require("includes/search.php");
        //echo ("var items = " . json_encode(search()));

        ?>

        items = items.map(i => i.Title);
        // ---------------------------- DB
        $(function() {
            autocomplete(document.getElementById("search"), items);
        });
    </script> -->

    <main style="flex:1;display:flex;flex-direction:column">
        @yield('content')
    </main>
    <script>$('.carousel').carousel()</script>
    <footer>
        <p>&copy; 2018 زاد. جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>