@extends('layouts.app')
@section('content')
<div>
    <h2>{{$user->first_name}}</h2>
    <div style="width:20%">
        {{-- <img style="max-width: 100%" src="{{url('img/rating.jpeg')}}"> --}}
        <span class="staticStarRating">
            <input type="radio" name="star_num" value="5" {{$user->rating() == 5? "checked":""}}>
            <label >5</label>
            <input type="radio" name="star_num" value="4" {{$user->rating() == 4? "checked":""}}>
            <label>4</label>
            <input type="radio" name="star_num" value="3" {{$user->rating() == 3? "checked":""}}>
            <label>3</label>
            <input type="radio" name="star_num" value="2" {{$user->rating() == 2? "checked":""}}>
            <label>2</label>
            <input type="radio" name="star_num" value="1" {{$user->rating() == 1? "checked":""}}>
            <label>1</label>
        </span>
    </div>



</div>
@endsection('content')