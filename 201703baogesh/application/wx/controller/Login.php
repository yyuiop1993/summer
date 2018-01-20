<?php
namespace app\wx\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Login extends Controller {
    public $request;
	public function _initialize() {
        $this->request = Request::instance();
	    parent::_initialize();  // 调用父类的构造方法
	}
	
    public function login(){
    	$headArr = self::_getTKD('用户登录');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }

    /*登录判断*/
    public function do_login(){

        $username = $this->request->param("username");
        $password = $this->request->param("password");
        $code     = $this->request->param("code");

        
        if(md5($code)!=Session::get('verify')){
            return ["status"=>1,"msg"=>"验证码错误!"];
            exit();
        }
             
        
        $where['username'] = $username;
        $result = DB::name("admin_user")->where($where)->find();

        if(!$result){
            return ["status"=>2,"msg"=>"没有此用户!"];
        }
        
        if(!$result["status"]){
            return ["status"=>2,"msg"=>"此用户已被禁用!"];
        }

        $where['password'] = md5($password);
        $result = DB::name("admin_user")->where($where)->find();
        if(!$result){
            return ["status"=>3,"msg"=>"用户名或者密码错误!"];
        }
        
        $role_result = DB::name("admin_role")->where("role_id = ".$result["role_id"])->find();
        
        Session::set('user_id',$result["admin_id"]);
        Session::set('user_name',$result["username"]);
        Session::set('role_id',$result["role_id"]);
        Session::set('role_name',$role_result["role_name"]);

        $data["openid"] = Session::get('openid');
        $data["last_login_ip"] = $this->request->ip();;
        $data["last_login_time"] = time();

        $result = DB::name("admin_user")->where($where)->update($data);

        $jump_url = Session::set('jump_url')?Session::set('jump_url') : $this->request->baseFile()."/".$this->request->module()."/service/index";
        
        return ["status"=>0,"msg"=>"登录成功!", "jump_url"=>$jump_url];
    }

    /*退出*/
    public function logout(){

        Session::delete('user_id');
        Session::delete('user_name');
        Session::delete('role_id');
        Session::delete('role_name');
        session(null);
        header("Location: /index.php/wx/login/login");
    }

    protected static function _getTKD($prefix='') {
        $headArr = array();
        $headArr["title"] = $prefix;
        $headArr["keyword"] = "";
        $headArr["description"] = "";
        return $headArr;
    }

}
