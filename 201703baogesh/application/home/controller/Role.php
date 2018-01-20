<?php
namespace app\home\controller;
use think\Db;

class Role extends Base{
	public function _initialize() {
	    parent::_initialize();
	}

	//角色管理
    public function role_list(){

    	$keyword = $this->request->param("keyword");
		$where = '';
		if($keyword){
			$where['think_admin_role.role_name'] = array('like',"%".$keyword."%");
		}

        $role_data = DB::name('admin_role')->where($where)->paginate($this->limit);

        
        

    	$headArr = self::_getTKD('角色管理');
    	$this->assign(compact("headArr"));
    	$this->assign('role_data',$role_data);
    	return $this->fetch();
        
    }

    
    //添加角色
    public function role_add(){
    	$role_title_data = $this->_get_role_menu();

        $this->assign('role_title_data',$role_title_data);

        $headArr = self::_getTKD('添加角色');
        $this->assign(compact("headArr"));
        return $this->fetch();
      
    }  

    public function role_add_ajax(){
        
        $data["power"]     = implode(',',$_POST['access']);
        $data["role_name"] = $this->request->param("role_name");

        $res = DB::name('admin_role')->insert($data);
        
        if ($res) {
            return ['status' =>  1,'msg' => '添加成功'];
        }else{
            return ['status' =>0, 'msg' =>"网络错误,请重试" ];
        }
        
    }

    
    //角色编辑
    public function role_edit(){
        $id = $this->request->param("id");

        $data = DB::name("admin_role")->where('role_id='.$id)->find();
        $role = DB::name("admin_role")->where("role_id = ".$id)->value("power");
        $role = explode(",",$role);
        
        
        $role_title_data = $this->_get_role_menu();

        $this->assign('role_title_data',$role_title_data);
        $this->assign('data',$data);
        $this->assign('role',$role);

        $headArr = self::_getTKD('角色编辑');
    	$this->assign(compact("headArr"));
    	return $this->fetch();
        
    } 


   

    //权限分配
    public function role_edit_ajax(){
        $where["role_id"]  = $this->request->param("role_id");

        $data["power"]     = implode(',',$_POST['access']);
        $data["role_name"] = $this->request->param("role_name");

        $res = DB::name('admin_role')->where($where)->update($data);
       	
        if ($res) {
            return ['status' =>  1,'msg' => '修改成功'];
        }else{
            return ['status' =>0, 'msg' =>"网络错误,请重试" ];
        }
    }


    //角色删除
    public function role_datail(){
    	$id = $where["role_id"] = I("post.id");
		/*判断id是否存在*/
		if($id){
			$res = M("admin_role")->where($where)->delete();
	        if($res){
	            $return = array("status"=>1,"msg"=>"删除成功");
	            $this->ajaxReturn($return);
	        }else{
	            $return = array("status"=>0,"msg"=>"系统错误,请刷新重试");
	            $this->ajaxReturn($return);
	        }
		}else{

			$this -> ajaxReturn(array('status' =>0, 'msg' =>"非法操作" ));
		}
    }

    //删除角色
    public function role_del(){
        $id = $this->request->param("id");
        if($id){
            $where['role_id']=$id;
            $res = DB::name("admin_role")->where($where)->delete();
            
            if($res){
                return ["status" =>1,"msg"=>"删除成功"];
            }else{
                return ["status" =>0,"msg"=>"删除失败,请重试"];
            }
        }else {
            return ["status" =>0,"msg"=>"网络错误"];
        }
    }

    
    private function _get_role_menu(){
        
        $role_title_data = DB::name("admin_menu") -> where('fid = 0 and shows = 1') -> field("id,menu_name,fid,shows")
        -> order("sort desc")-> select();
        $role_menu_title = DB::name('admin_menu') -> where('fid > 0 and shows = 1 ') 
        -> field("id,menu_name,fid,shows") -> order("sort desc")-> select();
        
        
        foreach($role_title_data as $k => $v){
            $role_title_data[$k]["menu"] = array();
            foreach($role_menu_title as $k2 => $v2){
                if($v["id"] == $v2["fid"]){
                    $role_title_data[$k]["menu"][] = $v2;//给一维数组加一个键。
                }
            }
        }


        foreach ($role_title_data as $key => $value) {
            if(!count($role_title_data[$key]["menu"])){
                unset($role_title_data[$key]);
            }
        }
        return $role_title_data;
    }
}
