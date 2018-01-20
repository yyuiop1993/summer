<?php

namespace app\wx\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use Image;

class Index extends Controller{
    public $_CFG  = array();
	public $web_index;
    public $request  = array();

    public function _initialize(){
        $this->CFG = model("Param")->get_cfg();
        $this->request = Request::instance();
        $this->web_index = $this->CFG["web_index"];

        

        //define("APPID", $this->CFG["APPID"]);
        //define("APPSECRET", $this->CFG["APPSECRET"]);
    }
    
    protected static function _getTKD($prefix='') {
        $headArr = array();
        $headArr["title"] = $prefix;
        $headArr["keyword"] = "";
        $headArr["description"] = "";
        return $headArr;
    }
    
    public function index(){
        //$this->getAuthor();

        $temp = $this->request->param($this->CFG["error_param"],'');

        if($temp != $this->CFG["error_value"]){
            $url = $this->CFG["error_http"];
            Header("Location: $url");
        }

        $signPackage = action('Index/getSignPackage');
        $this->assign("signPackage",$signPackage);
        

        $headArr = self::_getTKD($this->CFG["web_title"]);
        $this->assign(compact("headArr"));
        return $this->fetch();
    }
    
    public function jump(){
        $url = $this->CFG["error_http"];
        $this->assign(compact("url"));
        return $this->fetch();
    }

    public function submit(){
        $data["name"]      = $this->request->param("name",'');
        $data["mobile"]    = $this->request->param("mobile");
        $data["card"]      = $this->request->param("card");
        $data["number"]    = $this->request->param("number",1);
        $data["work_unit"] = $this->request->param("work_unit");
        /*验证姓名*/
        if($data["name"]==''){
            return ["status" =>10001,"msg"=>"请填写姓名！"];
        }
        /*验证手机号*/
        if($data["mobile"]==''){
            return ["status" =>10002,"msg"=>"请填写手机号！"];
        }
        $mobileRex = '/^(1(([357][0-9])|(47)|[8][0-9]))\d{8}$/';
        if (!preg_match($mobileRex, $data['mobile'])) {
            return ["status" =>10002,"msg"=>"请输入有效的手机号码！"];
        }

        $where["mobile"] = $data["mobile"];
        $res=DB::name("user")->where($where)->find();
        if($res){
            return ["status" =>10002,"msg"=>"此手机号码已经登记过"];
        }

        /*验证身份证号*/
        if($data["card"]==''){
            return ["status" =>10003,"msg"=>"请填写身份证号！"];
        }
        if(!$this->is_idcard($data["card"])){
            return ["status" =>10003,"msg"=>"请填写正确的身份证号！"];
        }
        $where_card["card"] = $data["card"];
        $res=DB::name("user")->where($where_card)->find();
        if($res){
            return ["status" =>10003,"msg"=>"此身份证号已经登记过"];
        }

        /*验证购票数量*/
        if(!is_numeric($data["number"])){
            return ["status" =>10004,"msg"=>"请输入购票数量！"];
        }
        if($data["number"] > 2 ){
            return ["status" =>10004,"msg"=>"最大不能超过2"];
        }
        /*验证工作单位*/
        if($data["work_unit"]==''){
            return ["status" =>10005,"msg"=>"请填写工作单位！"];
        }

        $data["status"] = 1;
        $data["add_time"] = time();
        $data["update_time"] = time();
        $res = DB::name("user")->insert($data);
        if($res){
            return ["status" =>1,"msg"=>"提交成功！"];
        }else{
            return ["status" =>10006,"msg"=>"网络错误！"];
        }
    }



    public function is_idcard( $id ) { 
        $id = strtoupper($id); 
        $regx = "/(^\d{15}$)|(^\d{17}([0-9]|X)$)/"; 
        $arr_split = array(); 
        if(!preg_match($regx, $id)) { 
            return FALSE; 
        }
        //检查15位 
        if(15==strlen($id)){ 
            $regx = "/^(\d{6})+(\d{2})+(\d{2})+(\d{2})+(\d{3})$/"; 

            @preg_match($regx, $id, $arr_split); 
            //检查生日日期是否正确 
            $dtm_birth = "19".$arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4]; 
            if(!strtotime($dtm_birth)) { 
                return FALSE; 
            } else { 
                return TRUE; 
            } 

        }else{//检查18位

            $regx = "/^(\d{6})+(\d{4})+(\d{2})+(\d{2})+(\d{3})([0-9]|X)$/"; 
            @preg_match($regx, $id, $arr_split); 
            $dtm_birth = $arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4]; 
            //检查生日日期是否正确
            if(!strtotime($dtm_birth))   { 
                return FALSE; 
            } else { 
                //检验18位身份证的校验码是否正确。 
                //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。 
                $arr_int = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); 
                $arr_ch = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); 
                $sign = 0; 
                for ( $i = 0; $i < 17; $i++ ) { 
                    $b = (int) $id{$i}; 
                    $w = $arr_int[$i]; 
                    $sign += $b * $w; 
                } 

                $n = $sign % 11; 
                $val_num = $arr_ch[$n]; 
                if ($val_num != substr($id,17, 1)) { 
                    return FALSE; 
                } else{ 
                    return TRUE; 
                } 

            } 
        } 
  
    } 





















    //微信授权
    private function  getAuthor(){
        //这里要判断cooie
        $redirect_uri = urlencode($this->web_index."/index.php/index/callback");
        
        //$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
        
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->CFG["APPID"]."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        
        //snsapi_base
        //snsapi_userinfo
        
        
        Header("Location: $url");
    }

    public function callback(){
        header("Content-type: text/html; charset=utf-8");
        
        $code = $_GET['code'];
        
        if($code){
            /*获取openid 和 access_token*/
            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->CFG["APPID"]."&secret=".$this->CFG["APPSECRET"]."&code=$code&grant_type=authorization_code";
            $res = json_decode($this->httpGet($url));
            
            if(!$res){
            	//$url = $this->web_index."/index.php/index/index";
            	//Header("Location: $url");
            }
            
            //$res = object_array($res);
            /*获取用户基本信息*/
            $url ="https://api.weixin.qq.com/sns/userinfo?access_token=".$res->access_token."&openid=".$res->openid."&lang=zh_CN";
            
            $user_info = json_decode($this->httpGet($url));
            if(!$user_info){
            	//$url = $this->web_index."/index.php/index/index";
            	//Header("Location: $url");
            }
            
            Session::set('openid', $res->openid);
            
            //判断数据库是否存在此openid
            $where['openid'] = $res->openid;
            $result = DB::name('user')->where($where)->find();

            if($result){
                Session::set('uid',$result["id"]);
            }else{

                $data["openid"] = $res->openid;
                $data["nickname"] = base64_encode($user_info->nickname);
                $data["sex"] = $user_info->sex;
                $data["city"] = $user_info->city;
                $data["province"] = $user_info->province;
                $data["country"] = $user_info->country;
                $data["headimgurl"] = $user_info->headimgurl;
                $data["add_time"] = time();
                
                $res = DB::name('user')->insert($data);
                

                if($res){
                    $uid = Db::name('user')->getLastInsID();
                    Session::set('uid',$uid);
                }else{
                    $url = $this->web_index."/index.php/index/callback";
                    Header("Location: $url");
                }
                
            }


            $url = $this->web_index."/index.php/vote/index";
            /*判断是否有中途跳转的页面*/
            $http_url = Session::get("http_url");
            if(!empty($http_url)){
                $url = $http_url;
            }
            Header("Location: $url");
        }else{
            $url = $this->web_index."/index.php/index/callback";
            Header("Location: $url");
        }
    }



    /*微信点击菜单的反应*/
    public function response(){
        if (!isset($_GET['echostr'])) {
            $this->responseMsg();
        }else{
            $this->valid();
        }
    }

    public function valid(){
        $echoStr = $_GET["echostr"];
        file_put_contents("/log.log", $_GET["echostr"]);
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    
    public function responseMsg(){
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);

            switch ($RX_TYPE){
                case "text":
                    $resultStr = $this->receiveText($postObj);
                    break;
                case "event":
                    $resultStr = $this->receiveEvent($postObj);
                    break;
                default:
                    $resultStr = "";
                    break;
            }
            echo $resultStr;
        }else {
            echo "";
            exit;
        }
    }
    /*文本消息*/
    private function receiveText($object,$RX_TYPE){
        $funcFlag = 0;
        $contentStr = "你发送的内容为：".$object->Content;
        $resultStr = $this->transmitText($object, $contentStr, $funcFlag);
        //$resultStr = "";
        return $resultStr;
    }
    /*事件*/
    private function receiveEvent($object){

        $contentStr = "";
        switch ($object->Event)
        {
            case "subscribe":
                $contentStr = "欢迎关注6号工厂";
            case "ENTER":
                $contentStr = "欢迎关注6号工厂";
            case "unsubscribe":
                break;
            case "CLICK":
                switch ($object->EventKey)
                {
                    case "V1001_CONTACT_US":
                        $contentStr.= "在线客服电话:  \n";
                        $contentStr.= "400-6171820\n";
                        $contentStr.= "6号工厂官方微信号:\n";
                        $contentStr.= "2556409882\n";
                        $contentStr.= "在线客服微信号:\n";
                        $contentStr.= "小6:18553938467\n";
                        $contentStr.= "馒头:18669903670\n";
                        break;
                    default:
                        //$contentStr = '';
                        /*$contentStr[] = array("Title" =>"默认菜单回复", 
                        "Description" =>"您正在使用的是方倍工作室的自定义菜单测试接口", 
                        "PicUrl" =>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", 
                        "Url" =>"weixin://addfriend/pondbaystudio");*/
                        break;
                }
                break;
            default:
                break;      

        }
        if (is_array($contentStr)){
            $resultStr = $this->transmitNews($object, $contentStr);
        }else{
            $resultStr = $this->transmitText($object, $contentStr);
        }
        return $resultStr;
    }

    /*返回文字消息*/
    private function transmitText($object, $content, $funcFlag = 0){
        $textTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[%s]]></Content>
        <FuncFlag>%d</FuncFlag>
        </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $funcFlag);
        return $resultStr;
    }
    /*返回文字消息*/
    private function transmitImg($object, $content, $funcFlag = 0){
        $textTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[%s]]></Content>
        <FuncFlag>%d</FuncFlag>
        </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $funcFlag);
        return $resultStr;
    }   
    /*转到客服*/
    private function transmitText2($object, $content, $funcFlag = 0){
        $textTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[%s]]></Content>
        <FuncFlag>%d</FuncFlag>
        </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $funcFlag);
        return $resultStr;
    }
    /*返回图文消息*/
    private function transmitNews($object, $arr_item, $funcFlag = 0){
        //首条标题28字，其他标题39字
        if(!is_array($arr_item))
            return;

        $itemTpl = "<item>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <PicUrl><![CDATA[%s]]></PicUrl>
        <Url><![CDATA[%s]]></Url>
        </item>";
        $item_str = "";
        foreach ($arr_item as $item){
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }

        $newsTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[news]]></MsgType>
        <Content><![CDATA[]]></Content>
        <ArticleCount>%s</ArticleCount>
        <Articles>
        $item_str</Articles>
        <FuncFlag>%s</FuncFlag>
        </xml>";

        $resultStr = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item), $funcFlag);
        return $resultStr;
    }


        


    


    private function checkSignature(){
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
                
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }


    
    //提交公众号下方菜单
    public function subMenu(){
        $access_token = self::getAccessToken($this->CFG["APPID"],$this->CFG["APPSECRET"]);

        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $json = self::getMenu();
        $result = self::httpRequest($url,$json);
        var_dump($result);
    }


    private function getMenu(){
        $json = '{
            "button":
            [
                {    
                    "type":"view",
                    "name":"售后服务",
                    "url":"http://byu2427680001.my3w.com/index.php/admin/weixin/index"
                },
                {
                   "name":"联系我们",
                   "sub_button":[
                       {    
                           "type":"view",
                           "name":"售后服务",
                           "url":"http://byu2427680001.my3w.com/index.php/admin/weixin/index"
                        }
                    ]
                }
            ]
        } ';
        return $json;
    }

    //获取 access_token
    private function ajaxGetAccessToken($appId='',$appSecret='') {

        // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
        $path = "./weixin/access_token.php";
        $data = json_decode($this->get_php_file($path));

        if ($data->expire_time < time()) {
            // 如果是企业号用以下URL获取access_token
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->CFG["APPID"]."&secret=".$this->CFG["APPSECRET"];
            
            $res = json_decode($this->httpGet($url));
            $access_token = $res->access_token;
            
            if ($access_token) {
                $data->expire_time = time() + 7000;
                $data->access_token = $access_token;
                $this->set_php_file($path, json_encode($data));
                
                //$datas['access_token'] = $access_token;
                //M('weixin')->where("id = 1")->save($datas);
            }

        } else {
            $access_token = $data->access_token;
        }
        return $access_token;
    }


    //获取 access_token
    private function getAccessToken($appId='',$appSecret='') {

        // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
        $path = "./weixin/access_token.php";
        $data = json_decode($this->get_php_file($path));

        if ($data->expire_time < time()) {
            // 如果是企业号用以下URL获取access_token
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$appSecret";
            
            $res = json_decode($this->httpGet($url));
            $access_token = $res->access_token;
            
            if ($access_token) {
                $data->expire_time = time() + 7000;
                $data->access_token = $access_token;
                $this->set_php_file($path, json_encode($data));
                
                //$datas['access_token'] = $access_token;
                //M('weixin')->where("id = 1")->save($datas);
            }

        } else {
            $access_token = $data->access_token;
        }
        return $access_token;
    }

    
    //获取 jsapi_ticket
    private function getJsApiTicket() {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
        $path = "./weixin/jsapi_ticket.php";
        $data = json_decode($this->get_php_file($path));
        if ($data->expire_time < time()) {

            $accessToken = $this->getAccessToken($this->CFG["APPID"],$this->CFG["APPSECRET"]);
            
            // 如果是企业号用以下 URL 获取 ticket
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
            $res = json_decode($this->httpGet($url));
            $ticket = $res->ticket;
            if ($ticket) {
              $data->expire_time = time() + 7000;
              $data->jsapi_ticket = $ticket;
              $this->set_php_file($path, json_encode($data));
            }
        }else {
          $ticket = $data->jsapi_ticket;
        }

        return $ticket;
    }

    public function getSignPackage(){
        
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    	$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $jsapiTicket = $this->getJsApiTicket();
        // 注意 URL 一定要动态获取，不能 hardcode.
        
        /*$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        echo $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";*/
        
        $timestamp = time();
        $nonceStr = $this->createNonceStr();
        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);
        
        $signPackage = array(
          "appId"     => $this->CFG["APPID"],
          "nonceStr"  => $nonceStr,
          "timestamp" => $timestamp,
          "url"       => $url,
          "signature" => $signature,
          "rawString" => $string
        );
        
       	return $signPackage; 
    }


    public function get_signpackage(){
        $url = $this->_post("url","__MAIN__");

        $jsapiTicket = $this->getJsApiTicket();
        // 注意 URL 一定要动态获取，不能 hardcode.
        
        /*$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        echo $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";*/
        
        $timestamp = time();
        $nonceStr = $this->createNonceStr();
        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
          "appId"     => $this->CFG["APPID"],
          "nonceStr"  => $nonceStr,
          "timestamp" => $timestamp,
          "url"       => $url,
          "signature" => $signature,
          "rawString" => $string
        );
        
        return $signPackage; 
    }

    /*****************
    获取随机字符串
    ******************/
    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    /*****************
    向微信提交链接（带参数）
    ******************/
    function httpRequest($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    /**********************
    使用https进行请求
    **********************/
    private function httpsGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
        // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    //get 方式获取访问指定地址
    function httpGet($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    private function get_php_file($filename) {
        return trim(substr(file_get_contents($filename), 15));
    }

    private function set_php_file($filename, $content) {
        $fp = fopen($filename, "w");
        fwrite($fp, "<?php exit();?>" . $content);
        fclose($fp);
    }

    function object_array($array) {  
        if(is_object($array)) {  
            $array = (array)$array;  
        }
        if(is_array($array)) {  
            foreach($array as $key=>$value) {  
                $array[$key] = object_array($value);  
            }  
        }  
        return $array;  
    }
}
