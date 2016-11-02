<?php

/**
 * Description of Auth_Backend
 *
 * @author jiwei
 */
class Auth_Backend extends Auth {

    public static $_instance;

    protected $db_group = null;
    
    public static function instance() {
        if (!isset(Auth_Backend::$_instance)) {
            // Load the configuration for this type
            $config = Kohana::$config->load('backendauth');

            // Create a new session instance
            Auth_Backend::$_instance = new Auth_Backend($config);
        }
        return Auth_Backend::$_instance;
    }

    protected function _login($username, $password, $remember) {
        $exist = DB::select()->from("admin_user")->where("username", "=", $username)->execute($this->db_group)->current();
        if ($exist["status"] == "actived" && $this->hash($password) == $exist["password"]) {
            return $this->complete_login(array(
                        "user_id" => $exist["user_id"],
                        "username" => $exist["username"],
                        "realname" => $exist["realname"],
            ));
        } else {
            return false;
        }
    }

    /**
     * @return array 管理员表用户允许访问的url数组
     */
    public function get_permission() {
        $u = $this->get_user();
        if ($u) {
            $sql = "SELECT GROUP_CONCAT(DISTINCT permission)as permission FROM admin_role_permission a JOIN admin_user_role b ON a.role_id=b.role_id WHERE b.user_id={$u["user_id"]}";
            $p = DB::query(Database::SELECT, $sql)->execute($this->db_group)->current();
            return explode(",", $p["permission"]);
        } else {
            return array();
        }
    }

    /**
     * @return array 管理员表用户的角色数组
     */
    public function get_role() {
        $u = $this->get_user();
        if ($u) {
            $sql = "SELECT user_id,GROUP_CONCAT(role_id)as roles FROM admin_user_role WHERE user_id={$u["user_id"]} GROUP BY user_id";
            $roles = DB::query(Database::SELECT, $sql)->execute($this->db_group)->current();
            return explode(",", $roles["roles"]);
        }else {
            return array();
        }
    }

    /**
     * @return array 管理员的详细信息
     */
    public function get_detail() {
        $u = $this->get_user();
        if ($u) {
            $adminInfo = DB::select()->from(['admin_user','user'])->
            join(['admin_user_role','userrole'])->on('user.user_id','=','userrole.user_id')->
            join(['admin_role','adminrole'])->on('userrole.role_id','=','adminrole.role_id')->
            where("user.user_id", "=", $u['user_id'])->execute($this->db_group)->current();
            return $adminInfo;
        }else {
            return array();
        }
    }

    public function check_password($password) {

    }

    public function password($username) {

    }

//put your code here
}
