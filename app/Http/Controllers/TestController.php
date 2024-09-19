<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller{
    public function firstAction(){
        $name = "Rana From Controller";
        return view('test', ['nameFromRouteFile' => $name]);
    }
}