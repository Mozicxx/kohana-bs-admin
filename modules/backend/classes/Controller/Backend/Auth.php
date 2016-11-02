<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author jiwei
 */
class Controller_Backend_Auth extends Controller_Template {

    public $template = "backend/template/template";

    public $default_module = 'backend';//登录成功跳转的模块

    public function action_login() {
        if ($_POST) {
            $ref = URL::site($this->default_module, TRUE);
            $username = $this->request->post('username');
            $password = $this->request->post('password');
            $remember = $this->request->post('remember');
            if (Auth_Backend::instance()->login($username, $password, $remember)) {
                $ret = array("ret" => 0, "msg" => "登录成功", "url" => $ref);
            } else {
                $ret = array("ret" => 1, "msg" => "登陆失败，用户名或密码错误!");
            }
            if ($this->request->is_ajax()) {
                return json_encode($ret);
            } else {
                $this->redirect($ref);
            }
        }
        $this->template = new View("backend/login");
    }

    public function action_logout() {
        Auth_Backend::instance()->logout();
        $this->redirect(URL::site("backend/auth/login", TRUE));
    }

}
