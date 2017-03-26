<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends HomeController
{
    public function index()
    {
        return view('index');
    }
}
