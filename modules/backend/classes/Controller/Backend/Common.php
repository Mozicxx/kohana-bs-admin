<?php

/**
 * Created by PhpStorm.
 * User: MozDoc
 * Date: 2016/11/1
 * Time: 下午4:39
 */
class Controller_Backend_Common
{
    /**
     * 获取后台菜单数组
     * @return array
     * @throws Kohana_Exception
     */
    public static function backend_menu() {
        $config = Kohana::$config->load("backend")->as_array();
        $permision = Auth_Backend::instance()->get_permission();
        $arr = array();
        $son = [];
        foreach ($config as $k => $g) {
            $flag = 0;
            foreach ($g as $i => $m) {
//        $access = in_array($m["uri"], $permission);
                $access = true;
                if (is_array($m) && $access && $m["display"]) {
                    $son[] = array("id" => $m["id"], "pid" => $g["id"], "text" => $m["name"], "iconCls" => $m["id"], "url" => URL::site($m["uri"], TRUE));
                    $flag++;
                }
            }
            if ($flag) {
                $arr[] = ["id" => $g["id"], "text" => $k, "iconCls" => $g["id"], "son" => $son];
            }
            $son = [];
        }
        return $arr;
    }
}