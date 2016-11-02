<?php

defined('SYSPATH') or die('No direct script access.');
return array
(  
    "权限管理" => array(
        "id" => "config",
        array(
            "name" => "角色管理",
            "id" => "configrole",
            "description" => "角色管理",
            "uri" => "backend/config/role",
            "display" => true,),
        array(
            "name" => "员工管理",
            "id" => "configmanager",
            "description" => "媒介审核",
            "uri" => "backend/config/manager",
            "display" => true,),
    ),
    "个人中心" => array(
        "id" => "home",
        array(
            "name" => "个人资料",
            "id" => "homemy",
            "description" => "个人资料",
            "uri" => "backend/home/my",
            "display" => true,),
        array(
            "name" => "修改密码",
            "id" => "homeretpwd",
            "description" => "修改密码",
            "uri" => "backend/home/retpwd",
            "display" => false,),
        array(
            "name" => "首页面板",
            "id" => "homeindex",
            "description" => "首页面板",
            "uri" => "backend/home/index",
            "display" => false,),
        array(
            "name" => "今日数据",
            "id" => "homedashboard",
            "description" => "今日数据",
            "uri" => "backend/home/dashboard",
            "display" => false,),
        array(
            "name" => "上传文件",
            "id" => "homeupload",
            "description" => "上传文件",
            "uri" => "backend/home/upload",
            "display" => false,),
        array(
            "name" => "导航菜单",
            "id" => "homemenu",
            "description" => "导航菜单",
            "uri" => "backend/home/menu",
            "display" => false,),
        array(
            "name" => "系统手册",
            "id" => "homebook",
            "description" => "系统手册",
            "uri" => "backend/home/book",
            "display" => false,),

    )
);
