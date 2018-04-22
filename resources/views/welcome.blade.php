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
    <div class="row" style="display:flex;justify-content:space-around">
        @foreach(App\Item::where('category_id',$categoryId)->orderBy('created_at','desc')->limit(5)->get() as $item)
            {{-- <div class="furniture_item">
                <img src="{{count($item->photos()) > 0 ? $item->photos()[0]:url('/img/placeholder.gif')}}" height="100" style="padding:10px">
            </div> --}}
            <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="{{count($item->photos()) > 0 ? $item->photos()[0]:url('/img/placeholder.gif')}}" style="max-height;100%;max-width:100%;">
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">{{$item->title}}</h3>
                                @foreach($item->specs->slice(0,2) as $spec)
                                <div class="row card-spec text-center">
                                    <label class="col-5">{{$spec->spec_key}}:</label>
                                    <span class="col-5">{{$spec->spec_value}}  </span>
                                </div>
                                @endforeach
                            </div>
                            <div class="price">
                                <div style="font-size:1.25rem">
                                    @if(!is_null($item->auction))
                                        <p style="font-size:1.25rem">الوقت المتبقي :<span id="timer_{{$item->id}}"></span></p>
                                    @else
                                        <p style="font-size:1.25rem">السعر:   {{$item->buy_now}} رس</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="text-center"><h4>{{$item->title}}</h4></div>
                        @foreach($item->specs->slice(0,15) as $spec)
                        <div class="row card-spec text-center">
                            <label class="col-5">{{$spec->spec_key}}:</label>
                            <span class="col-5">{{$spec->spec_value}}  </span>
                        </div>
                        @endforeach
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div>
        @endforeach
    </div>
    <a style="padding-right:1% float:right" href="{{url('category/' . $categoryId)}}">مشاهدة المزيد</a>
</section>
@endforeach


</section>

@endsection
