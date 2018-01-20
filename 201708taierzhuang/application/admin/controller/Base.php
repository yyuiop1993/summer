<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Config;
use CustomPagerJH;

class Base extends Controller {
    
    //分页限定数
    public $limit = 20;
    //配置数组
    public $_CFG  = array();
    public $request  = array();

    public $user;

	public function _initialize(){
        
        /*echo Session::get('user_id');
        echo Session::get('user_name');
        echo Session::get('role_id');
        echo Session::get('role_name');*/
        
        $this->request = Request::instance();
        $this->assign("controller",$this->request->controller());
        $this->assign("action",$this->request->action());
        $user_id = Session::get('user_id');
        
        if(!strpos($_SERVER["REQUEST_URI"],"index.php")){
            echo("<script language='javascript'>window.top.location.href='/index.php'</script>");
            exit();
        }

        if(empty($user_id)){
            
            if ($this->request->isAjax()){   
                echo Session::set('jump_url',$_SERVER["REQUEST_URI"]);
            }

            //header("Location: ".url("login/login"));
            echo("<script language='javascript'>window.top.location.href='".url('login/login')."'</script>");
            exit();
        }else{
            
            $this->user['user_id']   = Session::get('user_id');
            $this->user['user_name'] = Session::get('user_name');
            $this->user['role_id']   = Session::get('role_id');
            $this->user['role_name'] = Session::get('role_name');
          
        }
        
        
       

        /*获取用户所属权限的菜单*/
        $list_menu = model("Menu")->get_menu();

        $this->assign(compact("list_menu"));
        $this->CFG = model("Param")->get_cfg();
    }

    public function jump($url){
        header("Location: ".$url);
    }

    /*获取当前地址url*/
    public function http_url(){
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
        $http_url =  $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
        return $http_url;
    }

    protected static function _getTKD($prefix='') {
        $headArr = array();
        $headArr["title"] = $prefix;
        $headArr["keyword"] = "";
        $headArr["description"] = "";
        return $headArr;
    }

    /*获取随机字符串*/
    public function getStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    /**
     * 加载参数配置
     * @return array 配置键值数组
     */
    public function load_config(){
        $arr = array();
        $res = M('parameter_set')->field('code, value')->select();

        foreach ($res as $val){
            $arr[$val['code']] = $val['value'];
        }
        return $arr;
    }

    /*汉字根据首字母排序1*/
    public function py_sort($data,$field){
        $list_data = $this->psort($data,$field);
        foreach ($list_data as $key => $value) {
            $list_data[$key][$field.'_A'] = $this->getFirstCharter($value[$field]);
        }
        $res = array();
        foreach ($list_data as $key => $value) {
            //$res[$value.'_A'] = $value;
            $res[$value[$field.'_A']]['arr'][] = $value;
        }
       
       //echo "<pre>";
       //print_r($res);
       //echo "</pre>";

        /*foreach ($list_data as $key => $v) {
            if($v[$field.'_A'] == ''){
                array_unshift($list_data,$v);
                unset($list_data[$key]);
            }
        }*/
        
        return $res;
    }
    /*汉字根据首字母排序2*/
    public function psort($array,$field){
        foreach ($array as $key=>$value){
            $array[$key][$field] = iconv('UTF-8', 'GBK', $value[$field]);
        }
        $new_array = $this->arr_sort($array,$field);
        foreach ($new_array as $key=>$value){
            $new_array[$key][$field] = iconv('GBK', 'UTF-8', $value[$field]);
        }

        return $new_array;
    }
    /*汉字根据首字母排序3*/
    public function arr_sort($array,$field,$order="asc"){
        $arr_nums=$arr=array();
        foreach($array as $k=>$v){
            $arr_nums[$k]=$v[$field];
        }
        asort($arr_nums);
        $new_array = array();
        foreach($arr_nums as $k=>$v){
            foreach ($array as $k2 => $v2) {
                if($v2[$field] == $arr_nums[$k]){
                    $new_array[] = $v2;    
                }
            }
        }
        return $new_array;
    }

    /*汉字根据首字母排序4*/
    public function getFirstCharter($str){ 
        
        if(empty($str)){return '';} 
        $fchar=ord($str{0}); 
        if($fchar>=ord('A')&&$fchar<=ord('z')){
            return strtoupper($str{0}); 
        }
        $s1=iconv('UTF-8','gb2312',$str); 
        $s2=iconv('gb2312','UTF-8',$s1); 
        $s=$s2==$str?$s1:$str; 
        $asc=ord($s{0})*256+ord($s{1})-65536; 
        if($asc>=-20319&&$asc<=-20284) return 'A'; 
        if($asc>=-20283&&$asc<=-19776) return 'B'; 
        if($asc>=-19775&&$asc<=-19219) return 'C'; 
        if($asc>=-19218&&$asc<=-18711) return 'D'; 
        if($asc>=-18710&&$asc<=-18527) return 'E'; 
        if($asc>=-18526&&$asc<=-18240) return 'F'; 
        if($asc>=-18239&&$asc<=-17923) return 'G'; 
        if($asc>=-17922&&$asc<=-17418) return 'H'; 
        if($asc>=-17417&&$asc<=-16475) return 'J'; 
        if($asc>=-16474&&$asc<=-16213) return 'K'; 
        if($asc>=-16212&&$asc<=-15641) return 'L'; 
        if($asc>=-15640&&$asc<=-15166) return 'M'; 
        if($asc>=-15165&&$asc<=-14923) return 'N'; 
        if($asc>=-14922&&$asc<=-14915) return 'O'; 
        if($asc>=-14914&&$asc<=-14631) return 'P'; 
        if($asc>=-14630&&$asc<=-14150) return 'Q'; 
        if($asc>=-14149&&$asc<=-14091) return 'R'; 
        if($asc>=-14090&&$asc<=-13319) return 'S'; 
        if($asc>=-13318&&$asc<=-12839) return 'T'; 
        if($asc>=-12838&&$asc<=-12557) return 'W'; 
        if($asc>=-12556&&$asc<=-11848) return 'X'; 
        if($asc>=-11847&&$asc<=-11056) return 'Y'; 
        if($asc>=-11055&&$asc<=-10247) return 'Z'; 
        return ''; 
    }
    
    
    /*获取id*/
    protected static function _getOrderId(){
        //订单第一位为1 表示普通购买
        $id = 'XF'.date('YmdH');//substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 4);
        $find = DB::name("service_list")->order(" add_time desc ")->limit(0,1)->value("id");
        
        if($find<1000){
            $find = substr(strval($find+10000),1,4);
        }

        return $id.$find;
    }
}
