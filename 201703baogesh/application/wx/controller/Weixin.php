<?php
namespace app\wx\controller;
use think\Controller;
use think\Db;
use think\Session;
use Image;

class Weixin extends Controller {
    private $web_index = 'http://support.sdbogo.com/';
    public function _initialize(){
        define("APPID", "wx18de1f678a889006");
        define("APPSECRET", "cc359f635262a3e0b7ad3c8b23aaade1");
        define("TOKEN", "Qd8YjkunF84NT93O");
    }

    public function valid(){
        /*$echoStr = $_GET["echostr"];
        file_put_contents("/log.log", $_GET["echostr"]);*/
        //valid signature , option
        if( $this->checkSignature() ){
            echo $echoStr;
            exit;
        }
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


    public function index(){
        
        $this->getAuthor();
    }

    //微信授权
    private function  getAuthor(){
        //这里要判断cooie
        $redirect_uri = urlencode($this->web_index."/weixin/callback");
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
        
        Header("Location: $url");
    }

    public function callback(){
        //$res = M('weixin')->find();
        //define("APPID", $res['appid']);
        //define("APPSECRET", $res['appsecret']);
        $code = $_GET['code'];
        
        if($code){
            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=$code&grant_type=authorization_code";

            $res = json_decode($this->httpGet($url));
            

            //创建cookie
            //$_SESSION['weixin']['expire_time'] = time() + 7100;
            //$_SESSION['weixin']['refresh_token'] = $res->refresh_token;
            //$access_token = $_SESSION['weixin']['access_token'] = $res->access_token;
            
            /*$access_token = self::getAccessToken(APPID,APPSECRET);
            $url ="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$_openid;
            $user_info = json_decode($this->httpGet($url));*/


            $_openid = $res->openid;
            Session::set('openid', $_openid);
            
            //判断数据库是否存在此openid
            $where['openid'] = $_openid;
            $result = DB::name('admin_user')->where($where)->find();
            $role_result = DB::name("admin_role")->where("role_id = ".$result["role_id"])->find();
            $url = $this->web_index.'/login/login';
            if($result){
                Session::set('user_id',$result["admin_id"]);
                Session::set('user_name',$result["username"]);
                Session::set('role_id',$result["role_id"]);
                Session::set('role_name',$role_result["role_name"]);
                
                $url = $this->web_index.'/service/index';
               
            }
            /*判断是否有中途跳转的页面*/
            $http_url = Session::get("http_url");
            if(!empty($http_url)){
                $url = $http_url;
            }
            Header("Location: $url");
        }else{
            $url = $this->web_index.'/login/login';
            Header("Location: $url");
        }
    }
    //提交公众号下方菜单
    public function subMenu(){
        $access_token = self::getAccessToken(APPID,APPSECRET);

        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $json = self::getMenu();
        $result = self::httpRequest($url,$json);
        var_dump($result);
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

            $accessToken = $this->getAccessToken(APPID,APPSECRET);
            
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
          "appId"     => APPID,
          "nonceStr"  => $nonceStr,
          "timestamp" => $timestamp,
          "url"       => $url,
          "signature" => $signature,
          "rawString" => $string
        );

        header("Content-type: application/json");
        print json_encode($signPackage); 
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
          "appId"     => APPID,
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


}