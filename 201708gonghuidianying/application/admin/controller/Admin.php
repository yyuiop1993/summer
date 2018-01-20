<?php
namespace app\admin\controller;
use think\Db;
use think\Session;


class Admin extends Base{
	public function _initialize() {
	    parent::_initialize();
	}

	/*菜单列表*/
    public function user_list(){
    	
    	$keyword = $this->request->param("keyword");
		$where = '';
		if($keyword){
			$where['zifi_admin.username'] = array('like',"%".$keyword."%");
		}

		$list_data = Db::name("admin_user")->alias('a')->join(" zifi_admin_role role "," a.role_id = role.role_id ","left")->where($where)->paginate($this->limit);
		
    	$headArr = self::_getTKD('管理员管理');
        $this->assign(compact("headArr","list_data","keyword"));

        return $this->fetch();
    }

    //显示添加用户页面
	public function user_add(){
		$role_data = Db::name("admin_role")->select();
		$headArr = self::_getTKD('管理员添加');
		$this->assign(compact("role_data","headArr"));
		return $this->fetch();
	}

	/*添加用户的ajax*/
	public function ajax_admin_add(){
		

		$data["username"] = $this->request->param("username");
		$data["password"] = MD5($this->request->param("password"));
		$data["role_id"]  = $this->request->param("role_id");

		$data["last_login_ip"] = $this->request->ip();
    	$data["last_login_time"] = time();

    	$data["status"] = 1;

    	$data["add_time"] = time();
    	$data["update_time"] = time();
		$res = DB::name("admin_user")->insert($data);

		if($res){
			return ["status" =>1,"msg"=>"添加成功！"];
		}else{
			return ["status" =>0,"msg"=>"网络错误,请重试"];
		}
	}

	//用户修改
	public function user_edit(){


		$id  = $this->request->param("id");

		$role_data = Db::name("admin_role")->select();
		$data = DB::name("admin_user")->where('admin_id = '.$id)->find();

		$headArr = self::_getTKD('管理员编辑');
		$this->assign(compact("role_data","data","id","headArr"));


		return $this->fetch();
	}
	//修改用户的ajax
	public function ajax_user_edit(){
		$where["admin_id"] = $this->request->param("admin_id");

		
		if($this->request->param("password")){
			$data["password"] = MD5($this->request->param("password"));
		}
		if($this->request->param("role_id")){
			$data["role_id"]  = $this->request->param("role_id");
		}

		$data["username"]    = $this->request->param("username");
		$data["status"]       = $this->request->param("status");
		$data["update_time"]  = time();

		$res = DB::name("admin_user")-> where($where)->update($data);

		if($res){
			return ["status" =>1,"msg"=>"修改成功！"];
		}else{
			return ["status" =>0,"msg"=>"网络错误,请重试"];
		}
	}

	//删除
	public function admin_del(){
		$id = $this->request->param("id");
		if($id){
			$where['admin_id']=$id;
			$res = DB::name("admin_user")->where($where)->delete();
			
			if($res){
				return ["status" =>1,"msg"=>"删除成功"];
			}else{
				return ["status" =>0,"msg"=>"删除失败,请重试"];
			}
		}else {
			return ["status" =>0,"msg"=>"网络错误"];
		}
	}

	/*修改密码*/
	public function user_pwd(){
		$headArr = self::_getTKD('修改密码');
		$this->assign(compact("headArr"));
		return $this->fetch();
	}
	public function user_pwd_ajax(){
		$where["admin_id"] = $this->request->param("admin_id");
		$find = DB::name("admin_user")->where($where)->find();

		$old_password = $this->request->param("old_password");
		if($find["password"]!==MD5($old_password)){
			return ["status" =>2,"msg"=>"旧密码不正确！"];
		}

		$data["password"] = MD5($this->request->param("new_password"));
		$res = DB::name("admin_user")-> where($where)->update($data);
		
		if($res){
			return ["status" =>1,"msg"=>"修改成功"];
		}else{
			return ["status" =>0,"msg"=>"修改失败,请重试"];
		}

	}
}
