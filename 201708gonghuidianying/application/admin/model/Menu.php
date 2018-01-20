<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\Session;

class Menu extends Model{
    
	public function get_menu(){
        
        // 多表查询
        $uid        = Session::get("user_id");
        $role_id    = Db::name('admin_user')->where('admin_id='.$uid)->value("role_id");
        $power = Db::name('admin_role')->where('role_id='.$role_id)->value("power");

    	$list_data = Db::name("admin_menu")->where('fid = 0 and shows = 1 ')->order("sort desc")->select();
        $menu_data = Db::name("admin_menu")->where('fid != 0 and shows = 1 and id in ('.$power.')')
        ->order("sort desc")->select();

        foreach ($list_data as $key => $value) {
            $list_data[$key]["menu"] = array();
            foreach ($menu_data as $k => $v) {
                if($v["fid"] == $value["id"]){
                    $list_data[$key]["menu"][]=$v;
                }
            }
        }
        
        foreach ($list_data as $key => $value) {
            if(!count($list_data[$key]["menu"])){
                unset($list_data[$key]);
            }
        }
        

        return $list_data;
	}




}

?>