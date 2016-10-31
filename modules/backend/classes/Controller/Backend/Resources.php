<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Backend_Resources extends Controller_Backend {

  //  public function action_app() {
		//echo'c';
//        $adminInfo = DB::select()->from(["market_admin_user",'user'])->
//            join(['market_admin_user_role','userrole'])->on('user.user_id','=','userrole.user_id')->
//            join(['market_admin_role','adminrole'])->on('userrole.role_id','=','adminrole.role_id')->
//            where("user.user_id", "=", $this->manager)->execute()->current();
//        $config = Kohana::$config->load("backend")->as_array();
       // $this->template->content = new View("backend/resources/app");
   // }

    public function action_app(){
		  $appdata = DB::select()->from('market_app')->limit(10);
		$config = Kohana::$config->load("backend")->as_array();
		$this->template->content = new View("backend/resources/app");
	}
	

}


