<?php
/**
 * 正则服务
 * User: Dave
 * Date: 2017/3/31
 * Time: 1:01
 */

namespace App\Services;


class PatternService
{
    /**
     * 国内手机号
     * @var string
     */
    public static $phone = '/0?(13|14|15|18)[0-9]{9}/';


    /**
     * HTML a标签
     * @var string
     */
    public static $aTag = '/<a\s[^>]*href=([\"\']??)([^\"\' >]*?)[^>]*>(.*)<\/a>/siU';


    /**
     * HTML a标签文字
     * @var string
     */
    public static $aText = '';

    /**
     * HTML a标签链接
     * @var string
     */
    public static $aLink = '';


    /**
     * url
     * @var string
     */
    public static $url = '/^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+/';


    /**
     * 邮箱地址
     * @var string
     */
    public static $email = '/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/';


    /**
     * 日期格式
     * @var string
     */
    public static $dateFormat = '/\d{4}(\-|\/|.)\d{1,2}\1\d{1,2}/';

    /**
     * 身份证
     * @var string
     */
    public static $identity = '/\d{17}[\d|x]|\d{15}/';


    /**
     * HTML a标签 href属性
     * @var string
     */
    public static $aHref = '/href\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^"\'>\s]+))/';


    /**
     * HTTP HTTPS 请求
     * @var string
     */
    public static $http = '/https?:[\/]{2}[a-z]+[.]{1}[a-z\d\-]+[.]{1}[a-z\d]*[\/]*[A-Za-z\d]*[\/]*[A-Za-z\d]*/';


    /**
     * 通过class 获取A标签
     * @param string $className
     * @return string
     */
    public static function getATagByClass(string $className = "")
    {
        return '/<a.*class="'.$className.'".*>.*<\/a>/';
    }

    /**
     * 获取span标签
     * @param string $className
     * @return string
     */
    public static function getSpanTagByClass(string $className = "")
    {
        return '/<span.*class="'.$className.'".*>.*<\/span>/';
    }

    /**
     * 获取视频ftp 地址
     * @return string
     */
    public static function getFtpLink()
    {
        return '/(ftp:\/\/.*?rmvb)|(ftp:\/\/.*?mkv))/';
    }


    
}