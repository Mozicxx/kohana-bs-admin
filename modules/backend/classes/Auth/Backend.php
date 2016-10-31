<?php

/**
 * Description of Auth_Backend
 *
 * @author jiwei
 */
class Auth_Backend extends Auth {

    public static $_instance;
    
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
        $exist = DB::select()->from("admin_user")->where("username", "=", $username)->execute()->current();
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

    public function get_permission() {
        $u = $this->get_user();
        if ($u) {
            $sql = "SELECT GROUP_CONCAT(DISTINCT permission)as permission FROM admin_role_permission a JOIN market_admin_user_role b ON a.role_id=b.role_id WHERE b.user_id={$u["user_id"]}";
            $p = DB::query(Database::SELECT, $sql)->execute()->current();
            return explode(",", $p["permission"]);
        } else {
            return array();
        }
    }

    public function get_role() {
        $u = $this->get_user();
        if ($u) {
            $sql = "SELECT user_id,GROUP_CONCAT(role_id)as roles FROM admin_user_role WHERE user_id={$u["user_id"]} GROUP BY user_id";
            $roles = DB::query(Database::SELECT, $sql)->execute()->current();
            return explode(",", $roles["roles"]);
        }else {
            return array();
        }
    }

    public function check_password($password) {
        
    }

    public function password($username) {
        
    }

    public function get_admin_info() {
        $u = $this->get_user();
        $adminInfo = DB::select()->from(['admin_user','user'])->
            join(['admin_user_role','userrole'])->on('user.user_id','=','userrole.user_id')->
            join(['market_admin_role','adminrole'])->on('userrole.role_id','=','adminrole.role_id')->
            where("user.user_id", "=", $u['user_id'])->execute()->current();
        return $adminInfo;
    }

//put your code here
}
