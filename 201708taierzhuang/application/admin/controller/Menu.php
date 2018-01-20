<?php
namespace app\admin\controller;
use think\Db;

class Menu extends Base{
	public function _initialize() {
	    parent::_initialize();
	}
	/*菜单列表*/
    public function menu_list(){
    	//$page = $this->request->param("page",1);
    	$keyword = $this->request->param("keyword");
		$where = '';
		if($keyword){
			//$where['duoduo_admin_menu.menu_name'] = array('like',"%".$keyword."%");
		}
		
		$list_data = Db::name("admin_menu")->where("fid = 0")->order("sort desc")->select();
		$temp_data = Db::name("admin_menu")->where("fid > 0")->order("sort desc")->select();

		foreach ($list_data as $k => $v) {
			$list_data[$k]['list'] = array();
			foreach ($temp_data as $k2 => $v2) {
				if($v2["fid"] == $v["id"]){
					$list_data[$k]['list'][] = $v2;
				}
			}
			# code...
		}
		//$all_count = DB::name("admin_menu")->where("fid = 0")->count();
        //$show = CustomPagerJH::page($page, $this->limit, $all_count);

		

    	$headArr = self::_getTKD('菜单管理');
        $this->assign(compact("headArr","list_data","keyword"));

        return $this->fetch();
    }
    public function menu_sort(){
    	$id = $this->request->param("id/a");
    	$sort = $this->request->param("sort/a");

    	//$list_data = DB::name("admin_menu")->where($where)->update($data);

    	foreach ($id as $k => $v) {
    		if($sort[$k]!=0){
    			$where["id"] = $v;
    			$data["sort"] = $sort[$k];
    			DB::name("admin_menu")->where($where)->update($data);
    		}
    	}
    	header("Location: ".url('menu/menu_list'));
    }
    //显示添加菜单页面
	public function menu_add(){
		$menu = Db::name("admin_menu")->where(array("fid"=>0))->select();
		$headArr = self::_getTKD('菜单添加');
		$this->assign(compact("menu","headArr"));
		return $this->fetch();
	}

	/*添加菜单的ajax*/
	public function ajax_menu_add(){
		$data["menu_name"] = $this->request->param("menu_name");
		$data["fid"]   = $this->request->param("fid");
		$data["c"]     = $this->request->param("cc");
		$data["a"]     = $this->request->param("aa");
		$data["shows"] = $this->request->param("shows");
		$data["sort"] = $this->request->param("sort",0);
		
		$res = DB::name("admin_menu")->insert($data);

		if($res){
			return ["status" =>1,"msg"=>"添加成功！"];
		}else{
			return ["status" =>0,"msg"=>"网络错误,请重试"];
		}
	}

	//菜单修改
	public function menu_edit(){
		$id  = $this->request->param("id");
		$fid = $this->request->param("fid");
		
		$menu = DB::name("admin_menu")->where(" fid = 0 and id != ".$id)->select();
		$data = DB::name("admin_menu")->where('id='.$id)->find();

		$headArr = self::_getTKD('菜单修改');
		$this->assign(compact("menu","data","fid","id","headArr"));
		return $this->fetch();
	}
	//修改菜单的ajax
	public function ajax_menu_edit(){
		$where["id"] = $this->request->param("menu_id");

		$data["menu_name"] = $this->request->param("menu_name");
		$data["fid"]       = $this->request->param("fid");
		$data["a"]         = $this->request->param("aa");
		$data["c"]         = $this->request->param("cc");
		$data["shows"]     = $this->request->param("shows");

		$res = DB::name("admin_menu")-> where($where)->update($data);

		if($res){
			return ["status" =>1,"msg"=>"修改成功！"];
		}else{
			return ["status" =>0,"msg"=>"网络错误,请重试"];
		}
	}

	//删除菜单
	public function menu_del(){
		$id = $this->request->param("id");
		if($id){
			$where['id']=$id;
			$res = DB::name("admin_menu")->where($where)->delete();
			
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
