<?php

/**
 * Description of Backend
 *
 * @author jiwei
 * @update mozic
 */
class Controller_Backend extends Controller_Template {

    public $template = "backend/template/template";

    protected $manager_id;
    protected $manager;
    protected $roles;
    protected $permission;
    protected $config;

    /**
     * 重写了父类的方法,给模板绑定了变量
     */
    public function before() {
        $this->auth();
        $this->roles = Auth_Backend::instance()->get_role();
        $this->manager = Auth_Backend::instance()->get_detail();
        $this->config = Controller_Backend_Common::backend_menu();
        //绑定全局变量admininfo
        View::bind_global('admin', $this->manager);
        $this->template = View::factory($this->template)->set(
            [
                'config' => $this->config,
                'controller' => $this->request->controller(),
                'action' => $this->request->action()
            ]);
    }

    public function after() {
        parent::after();
    }

    protected function is_admin() {
        return in_array(1, $this->roles) || in_array(7, $this->roles);
    }

    /**
     * 检测用户信息和访问权限
     */
    private function auth() {
        $this->permission = Auth_Backend::instance()->get_permission();
        $u = Auth_Backend::instance()->get_user();
        if ($u) {
            $this->manager_id = $u["user_id"];
            $uri = strtolower($this->request->directory() . "/" . $this->request->controller() . "/" . $this->request->action());
            if (!in_array($uri, $this->permission)) {
                exit("[ {$uri} ] access denied, you don't have permission!");
            }
        } else {
            $this->redirect(URL::site("backend/auth/login", TRUE));
        }
    }

}
