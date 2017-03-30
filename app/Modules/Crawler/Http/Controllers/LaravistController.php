<?php

namespace App\Modules\Crawler\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LaravistController extends HomeController
{
    private $host = "http://www.laravist.com/";

    public function index()
    {
        header('content-type:text/html;charset=utf8');
        $headers = [
            'content-type'=>'text/html;charset=utf8'
        ];
        $html = $this->curl_get($this->host,10,$headers);
        echo $html;
    }
}
