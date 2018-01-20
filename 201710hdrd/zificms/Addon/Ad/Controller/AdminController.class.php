<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 插件后台管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Addon\Ad\Controller;

use Addons\Util\Adminaddonbase;

class AdminController extends Adminaddonbase {

    public function index() {
		$ad=M('ad');
		$count = $ad->where($where)->count();
		$page = $this->page($count, 20);
		$data = $ad->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("time" => "DESC"))->select();
		$this->assign("Page", $page->show());
		$this->assign("data", $data);
		$this->display();				
    }
	public function add(){
        if (IS_POST) {
            $info = I('post.info');
			$data=array(
			'title'=>$info['title'],
			'url'=>$info['url'],
			'image'=>$info['image'],
			'type'=>$info['type'],
			'time'=>date('Y-m-d H:i:s',time()),
			'status'=>$info['status'],
			);
            if(M('ad')->add($data)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}       
            } else {		
		    $this->display();
		    }
	    }
	public function edit(){
        if (IS_POST) {
	            $info = I('post.info');
				$where=array('id'=>$info['id']);
				$data=array(
				'title'=>$info['title'],
				'url'=>$info['url'],
				'image'=>$info['image'],
				'type'=>$info['type'],
				'status'=>$info['status'],
				);
				
	            if(M('ad')->where('id = ' .$info['id'])->save($data)){
					$this->success('修改成功');
				}else{
					$this->error('修改失败');
				}       
            } else {
             $id = I('id','',int);
            
           	 $info1=M('ad')->find( $id);
           	 
	            if(!$info1){
					$this->error('该广告不存在啦');
				}else{
					$this->assign('yjz_ad',$info1);
					$this->display();
				}			
		    }
	    }		
	public function delete(){
        if (IS_GET) {
           $where=array('id'=>I('id'));			
            if(M('ad')->where($where)->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}       
	    }	
	}
}
