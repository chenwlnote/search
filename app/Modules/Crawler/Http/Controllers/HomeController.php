<?php

namespace App\Modules\Crawler\Http\Controllers;

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

    /**
     * curl post请求
     * @param string $url
     * @param int $timeout
     * @param array $post
     * @param array $options
     * @return mixed
     */
    public function curl_post(string $url, int $timeout=10,array $post = array(), array $options = array())
    {
        $defaults = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_POSTFIELDS => http_build_query($post)
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


    /**
     * curl get请求
     * @param string $url
     * @param int $timeout
     * @param array $options
     * @return mixed
     */
    public function curl_get(string $url,int $timeout=15,array $options = array())
    {
        $defaults = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_NOBODY=>false,
            //CURLOPT_USERAGENT=>'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0',
            //CURLOPT_FOLLOWLOCATION=>1,
            CURLOPT_TIMEOUT => $timeout
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    /**
     * 格式化html编码
     * @param string $url
     * @return mixed|string
     */
    public function getHtml(string $url = "")
    {
        $str = $this->curl_get($url);
        $html = mb_convert_encoding($str,'UTF-8',['UTF-8','GBK','ASCII']);
        return $html;
    }

    /**
     * 获取html 结构
     * @param string $str
     * @return \simple_html_dom
     */
    public function getHtmlDom(string $str = '')
    {
        $dom =  new \simple_html_dom();
        $dom->load($str);
        return $dom;
    }
}
