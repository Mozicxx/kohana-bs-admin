<?php

/**
 * Created by PhpStorm.
 * User: MozDoc
 * Date: 2016/11/1
 * Time: 下午6:34
 */
class Common
{
    static function templateToStr ($templatePath) {
        $html = View::factory($templatePath)->render();
        $html = str_replace("\n", "", $html);
        $html = str_replace("\r", "", $html);
        return $html;
    }
}