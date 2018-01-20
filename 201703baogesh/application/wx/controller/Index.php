<?php
namespace app\wx\controller;

class Index extends Base{
	
	public function _initialize() {
	    parent::_initialize();  // 调用父类的构造方法
	}

    public function index(){
    	header("Location: /index.php/wx/service/");
    	$headArr = self::_getTKD('主页');
        $this->assign(compact("headArr"));
    	return $this->fetch();
    }
}
