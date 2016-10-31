<?php

defined('SYSPATH') or die('No direct Script access!');

class Controller_Backend_Statistics extends Controller_Backend
{
    public function action_app(){
        DB::select('app.id','app.icon','app.app_name','app.download','','','','','')->from(['market_app','app'])->
        join(['market_action_statistics','stt'])->on('app.id','=','stt.app_id')->
        execute('core')->as_array();
    }

    public function action_page(){

    }

    public function action_userkeep(){

    }
}