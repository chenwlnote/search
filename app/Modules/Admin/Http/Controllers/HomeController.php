<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $_request = null;

    public function __construct(Request $request)
    {
        $this->_request = $request;
    }
}
