<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 表单前台
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Formguide\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;

class IndexController extends Base {

    //表单模型缓存
    protected $Model_form;
    //数据模型
    protected $db = NULL, $formguide;
    //当前表单ID
    public $formid;
    //配置
    protected $setting = array();
    //模型信息
    protected $modelInfo = array();
    //输出类型
    protected $showType = NULL;

    //初始化
    protected function _initialize() {
        parent::_initialize();
        $this->showType = I('get.action');
        $this->formguide = D("Formguide/Formguide");
        $this->Model_form = cache("Model_form");
        $this->formid = I('request.formid', 0, 'intval');
        if (!empty($this->formid)) {
            $this->db = \Content\Model\ContentModel::getInstance($this->formid);
        }
        //模型
        $this->modelInfo = $this->Model_form[$this->formid];
        if (empty($this->modelInfo)) {
            if ($this->showType == "js") {
                exit($this->format_js('该表单不存在或者已经关闭！'));
            }
            $this->error('该表单不存在或者已经关闭！');
        }
        //配置
        $this->modelInfo['setting'] = $this->setting = unserialize($this->modelInfo['setting']);
        $this->assign('formid', $this->formid);
    }

    //显示表单
    public function index() {
        if (empty($this->formid)) {
            if ($this->showType == "js") {
                exit($this->format_js('该表单不存在或者已经关闭！'));
            }
            $this->error('该表单不存在或者已经关闭！');
        }
        $r = $this->formguide->where(array("modelid" => $this->formid))->find();
        if (empty($r)) {
            if ($this->showType == "js") {
                exit($this->format_js('该表单不存在或者已经关闭！'));
            }
            $this->error('该表单不存在或者已经关闭！');
        }
        //验证权限
        $this->competence();
        //模板
        $show_template = $this->setting['show_template'] ? $this->setting['show_template'] : "show";
        //js模板
        $show_js_template = $this->setting['show_js_template'] ? $this->setting['show_js_template'] : "js";
        //实例化表单类 传入 模型ID 栏目ID 栏目数组
        $content_form = new \content_form($this->formid);
        //生成对应字段的输入表单
        $forminfos = $content_form->get();
        $forminfos = $forminfos['senior'];
        //生成对应的JS提示等
        $formValidator = $content_form->formValidator;
        $this->assign("forminfos", $forminfos);
        $this->assign("formValidator", $formValidator);
        $this->assign($this->modelInfo);
        $this->assign("modelid", $this->formid);
        if ($this->showType == 'js') {
            $html = $this->fetch(parseTemplateFile("Show/{$show_js_template}"));
            //输出js
            exit($this->format_js($html));
        }
        $this->display("Show/{$show_template}");
    }

    //表单提交
    public function post() {

        //验证权限
        $this->competence();
        //提交间隔
        if ($this->setting['interval']) {
            $formguide = cookie('formguide_' . $this->formid);
            if ($formguide) {
                $this->error("操作过快，请歇息后再次提交！");
            }
        }
        //开启验证码
        if ($this->setting['isverify']) {
            $verify = I('post.verify');
            if (empty($verify)) {
                $this->error('请输入验证码！');
            }
            if (false == $this->verify($verify, 'formguide')) {
                $this->error('验证码错误，请重新输入！');
            }
        }
        

        $find_data =  M("teacher_data")->where("id=". $_POST['info']["teacher"])->find();
        $_POST['info']["teacher"] = $find_data["teacher"];
        
        //表单提交数据
        $info = array_merge($_POST['info'], array(C("TOKEN_NAME") => $_POST[C("TOKEN_NAME")]));
        //增加一些系统必要字段
        $uid = service("Passport")->userid? : 0;
        $username = service("Passport")->username ? : '';
        $info['userid'] = $uid;
        $info['username'] = $username ? : "游客";
        $info['datetime'] = time();
        $info['ip'] = get_client_ip();
        $content_input = new \content_input($this->formid);

        //跳转地址
        $forward = $this->setting['forward']?:cache('Config.siteurl');
        $forward = htmlspecialchars_decode($forward);

        header('Content-type:text/html;charset=utf-8');
        
        /*验证手机号是否重复提交*/
        $model_data = M("model")->where(" modelid= ".$this->formid)->find();
        $mobile_data = M($model_data["tablename"])->where(" yuyuemobile = '".$info["yuyuemobile"]."' ")->find();
        if($mobile_data){
            //echo "<script>alert('您的手机号已经预约成功，无需重复提交！');window.location.href='".$forward."'</script>";
            //exit();
        }   

        if($this->formid == 4){
            
            $kk_arr = array(
                array('kecheng' => "普通话", 'count' => 30),
                array('kecheng' => "朗诵",   'count' => 30),
                array('kecheng' => "太极拳", 'count' => 30),
                array('kecheng' => "八段锦", 'count' => 30),
                array('kecheng' => "瑜伽",   'count' => 20),
                array('kecheng' => "乒乓球", 'count' => 20)
            );


            $count = M("form_geren")->where(" kecheng = '".$info["kecheng"]."' ")->count();
           

            $url='http://smsapi.c123.cn/OpenPlatform/OpenApi';
            $ac='1001@501324300001';                                                             
            $authkey = '1CD4662E597F4170C5B09F8713DA67D8';
            $cgid='52'; //通道组编号
            $csid='8476';   //签名编号 ,可以为空时，使用系统默认的编号
            $m = $info["yuyuemobile"];


            foreach ($kk_arr as $key => $v) {
                if($info["kecheng"] == $v["kecheng"]){
                    if($count>=$v["count"]){
                        echo 1;
                        exit();
                        $c = '工惠乐学欢迎您：亲，非常抱歉，由于报名的学员太多，您本期的['.$info["kecheng"].']课程未预约成功，请选择其他课程或者预约下期，感谢您的信赖和支持。祝您在工惠乐学课堂放松身心，快乐学习！';

                        $res = $this->sendSMS($url,$ac,$authkey,$cgid,$m,$c,$csid);
                        $res = $this->object_array($res);

                        echo "<script>alert('预约人数过多，提交失败！');window.location.href='".$forward."'</script>";
                        exit();
                    }else{
                        echo 0;
                        exit();
                        $c = '工惠乐学欢迎您：亲，您已击败了99.99%的学员，成功预约到['.$info["kecheng"].']课程，请耐心等待工作人员与您联系。祝您在工惠乐学课堂放松身心，快乐学习！'; //内容

                        $res = $this->sendSMS($url,$ac,$authkey,$cgid,$m,$c,$csid);
                        $res = $this->object_array($res);

                        

                        if($res[0]){
                            $add_data["mobile"] = $info["yuyuemobile"];
                            $add_data["status"] = 1;
                            $add_data["add_time"] = date("Y-m-d H:i:s");
                            M("form_geren_sms")->add($add_data);
                            
                        }else{
                            $add_data["mobile"] = $info["yuyuemobile"];
                            $add_data["status"] = 2;
                            $add_data["add_time"] = date("Y-m-d H:i:s");
                            M("form_geren_sms")->add($add_data);
                            
                        }
                    }
                    
                }
            }

            
            
            
        }



        $inputinfo = $content_input->get($info);
        if (false == $inputinfo) {
            $this->error($content_input->getError() ? $content_input->getError() : '出现错误！');
        }
        $inputinfo = $this->db->create($inputinfo, 1);
        if (false == $inputinfo) {
            $this->error($this->db->getError() ? $this->db->getError() : '出现错误！');
        }
        if (!empty($inputinfo)) {

            $id = $this->db->relation(false)->add($inputinfo);

            

            if ($id) {

                //信息量+1
                M("Model")->where(array("modelid" => $this->formid))->setInc("items");
                
                //发送邮件
                if ($this->setting['sendmail'] && $this->setting['mails']) {
                    $mails = explode(",", $this->setting['mails']);
                    $title = $info['username'] . " 在《" . $this->modelInfo['name'] . "》提交了新的信息！";
                    $message = "刚刚有人在《" . $this->modelInfo['name'] . "》中提交了新的信息，请进入后台查看！";
                    SendMail($mails, $title, $message);
                }
                if ($this->setting['interval']) {
                    cookie('formguide_' . $this->formid, 1, $this->setting['interval']);
                }
                //$this->success("提交成功！", $forward);
                header("Content-type: text/html; charset=UTF-8");
                echo "<script>alert('提交成功');window.location.href='".$forward."'</script>";
            } else {
                header("Content-type: text/html; charset=UTF-8");
                //$this->error("提交失败！");
                echo "<script>alert('提交失败！');window.location.href='".$forward."'</script>";
            }
        } else {
            $this->error('系统处理错误！');
        }
    }




    public function object_array($array) {  
        if(is_object($array)) {  
            $array = (array)$array;  
         } if(is_array($array)) {  
             foreach($array as $key=>$value) {  
                 $array[$key] = $this->object_array($value);  
                 }  
         }  
         return $array;  
    }
    
    
    public function sendSMS($url,$ac,$authkey,$cgid,$m,$c,$csid,$t=''){
        $t = date("YmdHis");
        $data = array(
            'action'=>'sendOnce',  //发送类型 ，可以有sendOnce短信发送，sendBatch一对一发送，sendParam    动态参数短信接口
            'ac'=>$ac,                    //用户账号
            'authkey'=>$authkey,         //认证密钥
            'cgid'=>$cgid,              //通道组编号
            'm'=>$m,             //号码,多个号码用逗号隔开
            'c'=>$c,//iconv('gbk','utf-8',$c),           //如果页面是gbk编码，则转成utf-8编码，如果是页面是utf-8编码，则不需要转码,内容用{|}，如测试一{|}测试二
            'csid'=>$csid,            //签名编号 ，可以为空，为空时使用系统默认的签名编号
            't'=>''    //定时发送，为空时表示立即发送,yyyyMMddHHmmss 如:20130721182038
        );
        


        $xml= $this->postSMS($url,$data);//POST方式提交

        $re=simplexml_load_string(utf8_encode($xml));

        if(trim($re['result'])==1) { //发送成功 ，返回企业编号，员工编号，发送编号，短信条数，单价，余额
             foreach ($re->Item as $item){
                $stat['msgid'] =trim((string)$item['msgid']);
                $stat['total']=trim((string)$item['total']);
                $stat['price']=trim((string)$item['price']);
                $stat['remain']=trim((string)$item['remain']);
                $stat_arr[]=$stat;
             }

             if(is_array($stat_arr)){
               return $re['result'];
             }
            
        }else{  //发送失败的返回值
        
            switch(trim($re['result'])){
                case  0: echo "帐户格式不正确(正确的格式为:员工编号@企业编号)";break; 
                case  -1: echo "服务器拒绝(速度过快、限时或绑定IP不对等)如遇速度过快可延时再发";break;
                case  -2: echo " 密钥不正确";break;
                case  -3: echo "密钥已锁定";break;
                case  -4: echo "参数不正确(内容和号码不能为空，手机号码数过多，发送时间错误等)";break;
                case  -5: echo "无此帐户";break;
                case  -6: echo "帐户已锁定或已过期";break;
                case  -7:echo "帐户未开启接口发送";break;
                case  -8: echo "不可使用该通道组";break;
                case  -9: echo "帐户余额不足";break;
                case  -10: echo "内部错误";break;
                case  -11: echo "扣费失败";break;
                default:break;
            }

        }

    }

    public function postSMS($url,$data=''){
        $row = parse_url($url);
        $host = $row['host'];
        //$port = $row['port'] ? $row['port']:80;
        $port = 80;
        $file = $row['path'];

        $post = '';
        while (list($k,$v) = each($data)) {
            $post .= rawurlencode($k)."=".rawurlencode($v)."&"; //转URL标准码
        }

        $post = substr( $post , 0 , -1 );
        $len = strlen($post);
        $fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
        
        if (!$fp) {
            return "$errstr ($errno)\n";
        } else {

            $receive = '';
            $out = "POST $file HTTP/1.0\r\n";
            $out .= "Host: $host\r\n";
            $out .= "Content-type: application/x-www-form-urlencoded\r\n";
            $out .= "Connection: Close\r\n";
            $out .= "Content-Length: $len\r\n\r\n";
            $out .= $post;      
            fwrite($fp, $out);
            while (!feof($fp)) {
                $receive .= fgets($fp, 128);
            }
            fclose($fp);
            $receive = explode("\r\n\r\n",$receive);
            unset($receive[0]);
            return implode("",$receive);

        }
    }

    /**
     * 将文本格式成适合js输出的字符串
     * @param string $string 需要处理的字符串
     * @param intval $isjs 是否执行字符串格式化，默认为执行
     * @return string 处理后的字符串
     */
    protected function format_js($str, $isjs = 1) {
        preg_match_all("/[\xc2-\xdf][\x80-\xbf]+|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}|[\x01-\x7f]+/e", $str, $r);
        //匹配utf-8字符， 
        $str = $r[0];
        $l = count($str);
        for ($i = 0; $i < $l; $i++) {
            $value = ord($str[$i][0]);
            if ($value < 223) {
                $str[$i] = rawurlencode(utf8_decode($str[$i]));
                //先将utf8编码转换为ISO-8859-1编码的单字节字符，urlencode单字节字符. 
                //utf8_decode()的作用相当于iconv("UTF-8","CP1252",$v)。 
            } else {
                $str[$i] = "%u" . strtoupper(bin2hex(iconv("UTF-8", "UCS-2", $str[$i])));
            }
        }
        $reString = join("", $str);
        return $isjs ? 'document.write(unescape("' . $reString . '"));' : $reString;
    }

    //验证提交权限
    protected function competence() {
        $time = time();
        //表单有有效期时间限制 判断
        if (!empty($this->setting['enabletime'])) {
            //开始时间
            if ($this->setting['starttime']) {
                if ($time < (int) $this->setting['starttime']) {
                    if ($this->showType == "js") {
                        exit($this->format_js('该表单还没有开始！'));
                    }
                    $this->error('该表单还没有开始！');
                }
            }
            //结束时间
            if ($this->setting['endtime']) {
                if ($time > (int) $this->setting['endtime']) {
                    if ($this->showType == "js") {
                        exit($this->format_js('该表单已经结束！'));
                    }
                    $this->error('该表单已经结束！');
                }
            }
        }
        //是否允许游客提交
        if ((int) $this->setting['allowunreg'] == 0) {
            //判断是否登陆
            if (!service("Passport")->userid) {
                if ($this->showType == "js") {
                    exit($this->format_js('该表单不允许游客提交，请登陆后操作！'));
                }
                $this->error('该表单不允许游客提交，请登陆后操作！', U('Member/Index/login'));
            }
        }
        //是否允许同一IP多次提交
        if ((int) $this->setting['allowmultisubmit'] == 0) {
            $ip = get_client_ip();
            $count = $this->db->where(array("ip" => $ip))->count();
            if ($count) {
                if ($this->showType == "js") {
                    exit($this->format_js('你已经提交过了！'));
                }
                $this->error('你已经提交过了！');
            }
        }
        //不允许提交IP
        if (!empty($this->setting['noip'])) {
            $noip = explode("\n", $this->setting['noip']);
            //转换成正则
            foreach ($noip as $k => $v) {
                $ipaddres = $this->makePregIP($v);
                $ip = str_ireplace(".", "\.", $ipaddres);
                $ip = str_replace("*", "[0-9]{1,3}", $ip);
                $ipaddres = "/" . $ip . "/";
                $ip_list[] = $ipaddres;
            }
            //用户IP
            $ip = get_client_ip();
            if ($ip_list) {
                foreach ($ip_list as $value) {
                    if (preg_match("{$value}", $ip)) {
                        if ($this->showType == "js") {
                            exit($this->format_js('您的IP在禁止提交列表中！'));
                        }
                        $this->error('您的IP在禁止提交列表中！');
                        break;
                    }
                }
            }
        }
    }

    //ip进行处理
    private function makePregIP($str) {
        if (strstr($str, "-")) {
            $aIP = explode(".", $str);
            foreach ($aIP as $k => $v) {
                if (!strstr($v, "-")) {
                    $preg_limit .= $this->makePregIP($v);
                } else {
                    $aipNum = explode("-", $v);
                    for ($i = $aipNum[0]; $i <= $aipNum[1]; $i++) {
                        $preg .=$preg ? "|" . $i : "[" . $i;
                    }
                    $preg_limit .=strrpos($preg_limit, ".", 1) == (strlen($preg_limit) - 1) ? $preg . "]" : "." . $preg . "]";
                }
            }
        } else {
            $preg_limit .= $str;
        }
        return $preg_limit;
    }

}
