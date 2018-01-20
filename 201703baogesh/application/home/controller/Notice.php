<?php
namespace app\home\controller;
use think\Db;
use CustomPagerJH;
use think\Session;

class Notice extends Base{
	public function _initialize() {
	    parent::_initialize();
	}
	/*菜单列表*/
    public function notice_list(){
    	$page = $this->request->param("page",1);
    	$keyword = $this->request->param("keyword");
		$where = '';
		if($keyword){
			//$where['duoduo_admin_menu.menu_name'] = array('like',"%".$keyword."%");
		}

		if(Session::get("role_id") == 1){
			$list_data = Db::name("notice")->order("add_time desc")->select();
			$all_count = DB::name("notice")->count();
		}else{
			$list_data = DB::name("notice")->where("think_notice_read.role_id = ".Session::get("role_id"))->join(" think_notice_read  "," think_notice_read.notice_id = think_notice.id ","left")->field("think_notice.*,think_notice_read.status")->select();
			
			$all_count = DB::name("notice")->where("think_notice_read.role_id = ".Session::get("role_id"))->join(" think_notice_read  "," think_notice_read.notice_id = think_notice.id ","left")->count();
		}

		
        $show = CustomPagerJH::page($page, $this->limit, $all_count);

		
    	$headArr = self::_getTKD('通知管理');
        $this->assign(compact("headArr","list_data","keyword","show"));

        return $this->fetch();
    }
    
    //显示添加菜单页面
	public function notice_add(){

		$role_list = DB::name("admin_role")->select();

		$headArr = self::_getTKD('通知添加');
		$this->assign(compact("headArr","role_list"));
		return $this->fetch();
	}
	
	/*添加菜单的ajax*/
	public function ajax_notice_add(){

		$data["user_id"]  = Session::get('user_id');
		$data["title"]    = $this->request->param("title");
		$read_id   = $this->request->param("read_id/a");
		$data["read_id"]  = implode(",", $read_id);
		$data["content"]  = $this->request->param("content");
		$data["add_time"] = time();
		$res = DB::name("notice")->insert($data);
		

		$res_id = Db::name('notice')->getLastInsID();
		if($res){

	        foreach ($read_id as $k => $v) {
	            if($read_id[$k]){
	                $read_data[$k]["notice_id"]  = $res_id;
	                $read_data[$k]["role_id"]   = $v;
	                $read_data[$k]["status"]  = 1;
	                $read_data[$k]["add_time"]  = time();
	            }
	        }

	        if($read_data){
	            DB::name("notice_read")->insertAll($read_data);    
	        }

			return ["status" =>1,"msg"=>"添加成功！"];
		}else{
			return ["status" =>0,"msg"=>"网络错误,请重试"];
		}
	}

	//菜单修改
	public function notice_edit(){
		$id  = $this->request->param("id");
		
		$role_id = Session::get("role_id");
		if($role_id != 1){
			$res = DB::name("notice_read")->where(" notice_id = ".$id." and role_id = ".$role_id)->find();
			if($res["status"] == 1){

				DB::name("notice_read")->where(" notice_id = ".$id." and role_id = ".$role_id)->update(array('status'=>2,'read_time'=>time()));
			}
		}

		$data = DB::name("notice")->where('think_notice.id='.$id)
		->join(" think_admin_user  ","think_admin_user.admin_id = think_notice.user_id","left")
		->field("think_notice.*,think_admin_user.username")->find();

		if($data["user_id"] == Session::get("user_id")){
			$headArr = self::_getTKD('通知修改');
		}else{
			$headArr = self::_getTKD('查看详情');
		}
		
		$read_role = explode(",",$data["read_id"]);
		$role_list = DB::name("admin_role")->select();


		$this->assign(compact("data","id","headArr","role_list","read_role"));
		return $this->fetch();
	}
	//修改菜单的ajax
	public function ajax_notice_edit(){
		$where["id"] = $this->request->param("id");

		$data["user_id"]  = Session::get('user_id');
		$data["title"]    = $this->request->param("title");
		$read_id   = $this->request->param("read_id/a");
		$data["read_id"]  = implode(",", $read_id);
		$data["content"]  = $this->request->param("content");
		$data["add_time"] = time();

		$res = DB::name("notice")-> where($where)->update($data);
		//DB::name("notice")->getLastSql();

		DB::name("notice_read")->where(" notice_id = ".$where["id"])->delete(); 

		if($res){

	        foreach ($read_id as $k => $v) {
	            if($read_id[$k]){
	                $read_data[$k]["notice_id"]  = $where["id"];
	                $read_data[$k]["role_id"]   = $v;
	                $read_data[$k]["status"]  = 1;
	                $read_data[$k]["add_time"]  = time();
	            }
	        }

	        if($read_data){
	            DB::name("notice_read")->insertAll($read_data);    
	        }


			return ["status" =>1,"msg"=>"修改成功！"];
		}else{
			return ["status" =>0,"msg"=>"网络错误,请重试"];
		}
	}

	//删除菜单
	public function notice_del(){
		$id = $this->request->param("id");
		if($id){
			$where['id']=$id;
			$res = DB::name("notice")->where($where)->delete();
			
			if($res){
				return ["status" =>1,"msg"=>"删除成功"];
			}else{
				return ["status" =>0,"msg"=>"删除失败,请重试"];
			}
		}else {
			return ["status" =>0,"msg"=>"网络错误"];
		}
	}
}
