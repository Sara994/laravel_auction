@extends('layouts.app')
@section('content')

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
                <div class="col">
                    <a class="danger" href="{{url('/admin/item/'. $item->id .'/delete')}}">
                        حذف
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection