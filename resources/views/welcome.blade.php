@extends('layouts.app')
@section('content')

<section class="boot" style="background-color:rgb(203, 134, 134)">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" href="Zad_details.php">
                <img class="d-block" src="img/lab.jpg" alt="First slide">

                <div style="margin:0 10px">
                    <div>لابتوب</div>
                    <button class="btn btn-default">اشتر الآن</button>
                </div>
            </div>
            <div class="carousel-item" href="Zad_details.php">
                <img class="d-block" src="img/bag.jpg" alt="Second slide">

                <div style="margin:0 10px">
                    <div>حقيبة</div>
                    <button class="btn btn-default">اشتر الآن</button>
                </div>
            </div>
            <div class="carousel-item" href="Zad_details.php">
                <img class="d-block" src="img/k.png" alt="Third slide">

                <div style="margin:0 10px">
                    <div>شنطة</div>
                    <button class="btn btn-default">اشتر الآن</button>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="furniture">
    <h3 style="padding-right:2%">أثاث</h3>
    <div style="display:flex;justify-content:space-around">
        <div class="furniture_item">
            <img src="{{asset('img/th.jpg')}}" height="100" style=" margin:10px 10px 0px 20px">
        </div>
        <div class="furniture_item">
            <img src="{{asset('img/k.png')}}" height="100" style="margin:10px 10px 0px 20px">
        </div>
        <div class="furniture_item">
            <img src="{{asset('img/tt.jpg')}}" height="100" style="margin:10px 10px 0px 20px">
        </div>
        <div class="furniture_item">
            <img src="{{asset('img/knb.jpg')}}" height="100" style="margin:10px 10px 0px 20px">
        </div>
        <div class="furniture_item">
            <img src="{{asset('img/abj.jpg')}}" height="100" style="margin:10px 10px 0px 20px">
        </div>
    </div>
</section>

@endsection
