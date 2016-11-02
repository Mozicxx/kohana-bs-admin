<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Backend_Home extends Controller_Backend {

    public function action_index() {
        $this->template->content = new View("backend/home/index");
    }

    public function action_upload() {
        if ($_POST) return new Uploader();
        $this->template = new View("backend/upload");
    }


    public function action_dashboard() {
        
    }

    public function action_chgpwd() {
        $adminuser = ORM::factory("AdminUser");
        $method = $this->request->query("method");
            if ($method == "save") {
                $data = $this->request->post();
                $oldpwd = Auth_Backend::instance()->hash($data['oldpwd']);
                $pwd = Auth_Backend::instance()->hash($data['newpwd']);
                $u = $adminuser->where("user_id", "=", $this->manager_id)->find();
                if ($u->password == $oldpwd) {
                    $u->password = $pwd;
                    $u->save();
                    $res = ['ret'=>0,'msg'=>'密码修改成功'];
                } else {
                    $res = ['ret'=>1,'msg'=>'旧密码错误'];
                }
            }
            exit(json_encode($res));
    }

    public function action_my() {
        $adminuser = ORM::factory("AdminUser");
        $method = $this->request->query("method");
        if ($method == "save") {
            $userInfo = $this->request->post();
            $adminuser->where("user_id", "=", $this->manager_id)->find()
                ->values((array) $userInfo)
                ->save();
            exit('修改成功');
        } else {
            $res = $adminuser->where("user_id", "=", $this->manager_id)->find()->as_array();
            $this->template->content = new View("backend/home/my",['admin'=>$res]);
        }
    }

    public function action_book() {
        echo __FUNCTION__;
    }

}
