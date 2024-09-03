<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    //
    public function index() {
        return "Hi, nama saya First Controller!";   
    }

    public function index2(Request $request) {
        $display = "Display from Request: ".$request->param;
        return $display;
    }

    public function index3(Request $request) {
        $display = "Display from Request: ".$request->param;
        return $display;
    }

    public function index4(Request $request) {
        $display = "Display from controller<br>";
        $display .= "Parameter 1: ". $request->param1. "<br>";
        if (isset($request->param2)) {
            $display .= "Parameter 2: ". $request->param2;
        }
        return $display;
    }
}
