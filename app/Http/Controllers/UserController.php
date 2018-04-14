<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller{
    function search(Request $request){
        $text =  $request->text ;
        $users = User::where('name',$text)->where('city','Riyadh').get();
        return view('users',['search_result'=>$users]);
    }

    function create(Request $request){
        

    }

    function update(){

    }
}
