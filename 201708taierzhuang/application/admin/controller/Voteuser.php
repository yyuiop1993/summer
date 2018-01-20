<?php
namespace app\admin\controller;
use think\Db;
use CustomPagerJH;

class Voteuser extends Base{
	public function _initialize() {
	    parent::_initialize();
	}
	/*参选人列表*/
    public function voteuser_list(){

    	$keyword = $this->request->param("keyword");
		$where = '';
		if($keyword){
			$where['zifi_vote_user.name'] = array('like',"%".$keyword."%");
		}
			
		$list_data = Db::name("vote_user")->order("votes desc")->select();


    	$headArr = self::_getTKD('参选人管理');
        $this->assign(compact("headArr","list_data","keyword"));

        return $this->fetch();
    }

    

    //显示添加参选人页面
	public function voteuser_add(){
		$headArr = self::_getTKD('参选人添加');
		$this->assign(compact("headArr"));
		return $this->fetch();
	}

	/*添加参选人的ajax*/
	public function ajax_voteuser_add(){

		$data["name"]    = $this->request->param("name");
		$data["headimg"] = $this->request->param("headimg");
		$data["content"] = $this->request->param("content");

		$data["add_time"]    = time();
		$res = DB::name("vote_user")->insert($data);

		if($res){
			return ["status" =>1,"msg"=>"添加成功！"];
		}else{
			return ["status" =>0,"msg"=>"网络错误,请重试"];
		}
	}
	
	//参选人修改
	public function voteuser_edit(){
		$id  = $this->request->param("id");
		
		$data = DB::name("vote_user")->where('id='.$id)->find();

		$headArr = self::_getTKD('参选人修改');
		$this->assign(compact("menu","data","fid","id","headArr"));
		return $this->fetch();
	}
	//修改参选人的ajax
	public function ajax_voteuser_edit(){
		$where["id"] = $this->request->param("menu_id");

		$data["name"]    = $this->request->param("name");
		$data["headimg"] = $this->request->param("headimg");
		$data["content"] = $this->request->param("content");
		
		
		$res = DB::name("vote_user")-> where($where)->update($data);

		if($res){
			return ["status" =>1,"msg"=>"修改成功！"];
		}else{
			return ["status" =>0,"msg"=>"网络错误,请重试"];
		}
	}

	//删除参选人
	public function voteuser_del(){
		$id = $this->request->param("id");
		if($id){
			$where['id']=$id;
			$res = DB::name("vote_user")->where($where)->delete();
			
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
