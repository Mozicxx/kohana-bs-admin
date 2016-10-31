<?php

/**
 * Description of Backend
 *
 * @author jiwei
 */
class Controller_Backend extends Controller_Template {

    public $template = "backend/template/template";
    public $manager = 0;
    public $manager_name = "";
    public $admin_info = [];
    public $config;
    public $roles = array();
    protected $permission = array();

    public function before() {
        $this->auth();
        View::bind_global('admin', $this->admin_info);//设置全局变量admin
        View::bind_global('config', $this->config);//设置全局变量config
        $controller = $this->request->controller();
        $action = $this->request->action();
        $this->template = View::factory($this->template)->set(['admin'=>$this->admin_info,'config'=>$this->config,'controller'=>$controller,'action'=>$action]);
    }

    public function after() {
        parent::after();
    }

    protected function is_admin() {
        return in_array(1, $this->roles) || in_array(7, $this->roles);
    }

    private function auth() {
        $u = Auth_Backend::instance()->get_user();
        if ($u) {
            $this->manager = $u["user_id"];
            $this->manager_name = $u["username"];
            $this->roles = Auth_Backend::instance()->get_role();
            $this->permission = Auth_Backend::instance()->get_permission();
            $this->admin_info = Auth_Backend::instance()->get_admin_info();
            $this->config = Kohana::$config->load("backend")->as_array();
            $uri = strtolower($this->request->directory() . "/" . $this->request->controller() . "/" . $this->request->action());
            if (!in_array($uri, $this->permission)) {
                echo $uri;
                die("access denied, you don't have permission!");
            }
        } else {
            $this->redirect(URL::site("backend/auth/login", TRUE) . "?ref=" . $this->request->url(TRUE));
        }
    }

}
