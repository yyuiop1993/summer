<?php
namespace app\home\model;
use think\Model;
use think\Db;
use think\Session;

class Type extends Model{
    
	public function get_part(){
        
        $first_type = DB::name("part_type")->where("fid = 0 and status = 1")->select();
        $second_type = DB::name("part_type")->where("fid != 0 and status = 1 ")->select();
        
        foreach ($first_type as $k => $v) {
            $first_type[$k]["lists"] = array();
            foreach ($second_type as $k2 => $v2) {
                if($v["id"] == $v2["fid"]){
                    $first_type[$k]["lists"][$k2]=$v2;
                }
            }
        }
        
        foreach ($first_type as $k => $v) {
            foreach ($v["lists"] as $k2 => $v2) {
                $first_type[$k]["lists"][$k2]["lists"] = array();
                $lists = array();
                foreach ($second_type as $k3 => $v3) {
                    if($v2["id"] == $v3["fid"]){
                        $lists[] = $v3;
                    }
                }
                $first_type[$k]["lists"][$k2]["lists"] = $lists;
            }
        }
        
        return $first_type;
	}




}

?>