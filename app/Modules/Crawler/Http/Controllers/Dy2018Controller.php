<?php

namespace App\Modules\Crawler\Http\Controllers;

use App\Services\MovieService;
use App\Services\PatternService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Dy2018Controller extends HomeController
{
    private $host = 'http://www.dy2018.com/';


    public function getCategory()
    {
        $data = [
            '2' => '动作片',
            '0' => '剧情片',
            '3' => '爱情片',
            '1' => '喜剧片',
            '4' => '科幻片',
            '8' => '恐怖片',
            '5' => '动画片',
            '7' => '惊悚片',
            '14' => '战争片',
            '15' => '犯罪片',
            'html/tv/hytv' => '华语连续剧',
            'html/tv/oumeitv' => '美剧',
            'html/tv/rihantv' => '日韩剧',
            'html/zongyi2013' => '综艺',
            'html/dongman' => '动漫资源',
        ];
        return $data;
    }


    public function getCategoryIndex()
    {
        $route = [];
        $data = $this->getCategory();
        foreach ($data as $k=>$v) {
            $route[$this->host.$k.'/'] = $v;
        }
        return $route;
    }

    public function index()
    {

        $i = 0;
        $cl = $this->getCategoryIndex();
        foreach ($cl as $index => $value) {
            $i++;
            $page = 1;
            for (; ;) {
                if ($page == 1) {
                    $href = $index;
                } else {
                    $href = $index . 'index_' . $page . '.html';
                }
                $html = $this->getHtml($href);
                preg_match_all(PatternService::getATagByClass('ulink'), $html, $aTags);
                if (!empty($aTags[0])) {

                    foreach ($aTags[0]??[] as $aTag) {
                        $data = array();

                        $dom = $this->getHtmlDom($aTag);
                        $a = $dom->find('a')[0];
                        $href = $a->href;
                        $title = $a->title;
                        $data['title'] = $title;
                        $url = $this->host . $href;
                        $html = $this->getHtml($url);
                        preg_match(PatternService::getFtpLink(), $html, $links);

                        $list = array();
                        foreach ($links as $link) {
                            if ( !empty($link) && !in_array($link,$list) ) {
                                $list[] = $link;
                            }
                        }
                        foreach ($list as $link) {
                            $data['link'] = $link;
                            $data['source'] = '电影天堂';
                            MovieService::doInsert($data);
                        }
                    }
                    $page++;
                }

            }
            if ($i == 1) {
                break;
            }
        }
    }
}
