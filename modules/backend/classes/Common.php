<?php

/**
 * Created by PhpStorm.
 * User: MozDoc
 * Date: 2016/11/1
 * Time: 下午6:34
 */
class Common
{
    static function templateToStr ($templatePath,$data='') {
        $html = View::factory($templatePath,['data'=>$data])->render();
        $html = str_replace("\n", "", $html);
        $html = str_replace("\r", "", $html);
        return $html;
    }
}