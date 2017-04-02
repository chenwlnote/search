<?php

namespace App\Modules\Crawler\Http\Controllers;

use App\Services\PatternService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Dy2018Controller extends HomeController
{
    private $host = 'http://www.dy2018.com/';


    public function index()
    {
        $str = $this->curl_get($this->host);

        $html =  $this->getHtml($str);
        preg_match_all(PatternService::$aHref,$html,$matches);
    }
}
