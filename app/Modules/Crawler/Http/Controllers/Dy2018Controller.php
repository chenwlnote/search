<?php

namespace App\Modules\Crawler\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Dy2018Controller extends HomeController
{
    private $host = 'http://www.dy2018.com/';


    public function index()
    {
        $html = $this->curl_get($this->host);
        echo $html;
    }
}
