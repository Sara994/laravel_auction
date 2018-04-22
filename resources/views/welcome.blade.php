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
            @foreach( $featured_items as $item)
                <a class="carousel-item {{$loop->first ? 'active':''}}" href="{{url('item/'.$item->id)}}">
                    <div style="position:relative">
                        @if(count($item->photos())>0)
                            <img class="d-block" src="{{url($item->photos()[0])}}">
                        @else
                            <img class="d-block" src="{{asset('img/placeholder.gif')}}">
                        @endif


                        <div class="carousel-link">
                            <div>{{$item->title}}</div>
                            @if($item->auction)
                                <div id="counter_{{$loop->index}}"></div>
                                <script>count_down('counter_'+{{$loop->index}},'{{$item->auction->end_time}}')</script>
                            @else
                                <button class="btn btn-default">اشتر الآن</button>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
            
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

@foreach([1,2] as $categoryId)
<section class="furniture">
    <h3 style="padding-right:2%">{{App\ItemCategory::find($categoryId)->title}}</h3>
    <div style="display:flex;justify-content:space-around">
        @foreach(App\Item::where('category_id',$categoryId)->orderBy('created_at','desc')->limit(5)->get() as $item)
            <div class="furniture_item">
                <img src="{{count($item->photos()) > 0 ? $item->photos()[0]:url('/img/placeholder.gif')}}" height="100" style="padding:10px">
            </div>
        @endforeach
    </div>
</section>


<section class="Antique">
    <h3 style="padding-right:2%">آثريات</h3>
        <div class="card">
            <div class="front">
                <div class="cover">
                <img src="{{asset('img/lenovo.png')}}" height="190" width="290">
                </div>
                <div class="content">
                    <div class="main">

                        <h3 class="name">lenovo</h3>
                        <div class="first float_left">
                            <p style="text_align: center">الشركة: <b>سوني  </b></p>
                        </div>
                        <div class="second float_left">
                        <p style="text_align: center">المعالج: intel corei7 </p>
                        </div>            
                        <div class="second">
                            <span class="icon_gearbox"></span><gearbox>
                        </div>
                    </div>
                    <div class="price">
                    <div style="font-size:1.25rem">
    <p style="font-size:1.25rem">الوقت المتبقي :س</p>
    <p style="font-size:1.25rem">السعر:   560 رس</p>
                    </div>
                    </div> 
                </div>
            </div> <!-- end front panel -->
            <div class="back">              
                <p>
                <label class="title">النوع: </label>
                <span class="value">انتل كور i5‎‎-‎7200‎U‎</span>
                </p>
                <p>
                <label class="title">النوع:</label>
                <span class="value">تاتت</span>
                </p>
                    <p>
                    <label class="title">النوع:</label>
                    <span class="value">تاتت</span>
                </p>
                <p>
                <label class="title">النوع:</label>
                <span class="value">تاتت</span>
                </p>
                <p>
                <label class="title">النوع:</label>
                <span class="value">تاتت</span>
                </p>
                <p>
                <label class="title">كرت الشاشة:</label>
                <span class="value">انتل جي ام ايه عالى الدقة‎</span>
                </p>
                <p>
                <label class="title">النوع:</label>
                <span class="value">تاتت</span>
                </p>               
            </div> <!-- end back panel -->
        </div> <!-- end card -->
    </div> <!-- end card-container -->

<a href="#" style="padding-right:1% float:right" href="item.php">مشاهدة المزيد</a>
        
</section>
@endforeach
@endsection
