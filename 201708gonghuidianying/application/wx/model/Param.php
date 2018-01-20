<?php
namespace app\wx\model;
use think\Model;
use think\Db;
use think\Session;

class Param extends Model{
    
	public function get_cfg($where = ''){
    	
    	if($where){
    		$where = " id in (".$where.")";
    	}
    	
        $param_list = Db::name('param')->where($where)->select();
        
    	$list_data = array();
    	
        foreach ($param_list as $k => $v) {
            $list_data[$v["code"]] = $v["value"];
        }

        return $list_data;
	}




}

?>