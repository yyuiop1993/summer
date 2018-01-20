<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\Session;

class Param extends Model{
    
	public function get_cfg(){
    
        $param_list = Db::name('param')->select();

    	$list_data = array();

        foreach ($param_list as $k => $v) {
            $list_data[$v["code"]] = $v["value"];
        }

        return $list_data;
	}




}

?>