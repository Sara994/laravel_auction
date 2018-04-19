@extends('layouts.app')
@section('content')


<div style="padding-top:50px">
    @foreach($items as $item)
        <a href="{{url('item/'. $item->id)}}">
            <div class="card col-3">
                {{$item->title}}
            </div>
        </a>
    @endforeach
</div>
@endsection