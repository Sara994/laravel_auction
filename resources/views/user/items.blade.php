@extends('user')
@section('user_content')

    @foreach($items as $item)
        <div class="row">
            <div class="col">
                {{$item->title}}
            </div>
            <div class="col">
                <a class="danger" href="{{url('item/'. $item->id .'/delete')}}">
                    حذف
                </a>
            </div>
        </div>
    @endforeach
    
@endsection