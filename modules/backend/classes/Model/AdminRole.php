<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminRole
 *
 * @author jiwei
 */
class Model_AdminRole extends ORM {

    protected $_table_name = "admin_role";
    protected $_primary_key = "role_id";
    protected $_db_group = null;

    public function get_permission() {
        $permission = DB::select("permission")->from("admin_role_permission")->where("role_id", "=", $this->role_id)->execute("core")->as_array("permission");
        return array_keys($permission);
    }

    public function set_permission($permission) {
        DB::delete("admin_role_permission")->where("role_id", "=", $this->role_id)->execute("core");
        if (is_array($permission) && count($permission > 0)) {
            $query = DB::insert("admin_role_permission")->columns(array("role_id", "permission"));
            foreach ($permission as $p) {
                $query->values(array($this->role_id, $p));
            }
            $query->execute("core");
        }
    }

}
