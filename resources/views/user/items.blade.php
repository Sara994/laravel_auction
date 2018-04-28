@extends('user')
@section('user_content')

<div class="container">

    @foreach($items as $item)
        <div class="row">
            <div class="col">
                <a href="{{url('/item/'.$item->id)}}">{{$item->title}}</a>
            </div>
            <div class="col">
                {{$item->subtitle}}
            </div>
            <div class="col">
                {{$item->category()[0]->title}}
            </div>
            @if(!isset($allow_delete) || $allow_delete != false)
            <div class="col">
                <a class="danger" href="{{url('item/'. $item->id .'/delete')}}">
                    حذف
                </a>
            </div>
            @endif
        </div>
    @endforeach
</div>
@endsection