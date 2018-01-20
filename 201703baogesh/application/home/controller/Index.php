<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Index extends Base{
	public function _initialize() {
	    parent::_initialize();  // 调用父类的构造方法
	}

    public function index(){
    		
    	
        $headArr = self::_getTKD($this->CFG["web_name"].' - 后台管理');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }
    
    public function main(){
        
        
        $domain = $this->request->domain();

        $info['fileupload']     = @ini_get('file_uploads') ? ini_get('upload_max_filesize') :'unknown';

        $notice_count = Db::name("notice_read")->where("status = 1 and role_id = ".Session::get('role_id'))->count();
        
        if(Session::get("role_id") == 1){
            $notice_count = 0;
        }

        $headArr = self::_getTKD('后台管理');
        $this->assign(compact("headArr","domain","notice_count"));
        return $this->fetch();
    }

}
