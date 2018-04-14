<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
class TestController extends Controller{
    function doSomething(){

        $user = Test::where('name','Arwa 2')->where("age",25)->get()[0];
        

        return view("arwa",['user'=>$user]);
    }
}