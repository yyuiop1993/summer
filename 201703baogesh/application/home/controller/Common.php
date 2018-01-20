<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use Verify;

class Common  {

	public function _initialize(){
		parent::_initialize();
    }

   	//主要页面
    public function baseHome(){
    	$this->display();
    }
    

    /*验证码*/
    public function verify(){
        $verify = new Verify();
        $verify->buildImageVerify(4,1,'png', 100, 38);            //生成验证码
    }



    /*layui的编辑器 上传图片*/
    public function layer_img(){
        /*创建目录*/
        $floder = "upload/".date("Y")."/".date("m")."/".date("d")."/";
        if(!file_exists($floder)){mkdir($floder, 0700,true);}

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/upload/ 目录下
        $floder = "upload/";
        $info = $file->move($floder);
        //$info = $file->rule('md5')->move("upload/");
        if($info){
            $res = array(
                    "code" => 0, 
                    "msg"  => "",
                    "data" =>array(
                        "src"=>'/'.$floder.str_replace('\\',"/",$info->getSaveName()),
                        "title"=>$info->getFilename()
                        )
                    );
            echo json_encode($res);
        }else{
            $res = array(
                        "code" => 1, 
                        "msg"  => $file->getError(),
                        "data" =>array(
                            "src"   => "",
                            "title" => ""
                            )
                        );
            echo json_encode($res);
        }
        exit();
    }
    

    public function upload_img(){
        header('Content-type:text/html;charset=utf-8');

        $type_id = $this->request->param("type_id");
        $upload = $this->request->param("img");

        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $upload, $result)){
            
            $type = $result[2];

            $floder = "public/upload/".date("Y")."/".date("m")."/".date("d")."/";
            if(!file_exists($floder)){mkdir($floder, 0755,true);}

            $upload_path = $floder.date("YmdHis")."_0".$type_id.rand(000,999);
            $upload_path_ = $upload_path.".{$type}";
            
            $upload_size = file_put_contents($upload_path_, base64_decode(str_replace($result[1],'', $upload)));
            
            /*添加到数据库*/
            /*$data["type_id"] = $type_id;
            $data["src"] = $upload_path_;
            $res = DB::name("service_img")->insert($data);*/
            
            $Image = Image::open($upload_path_);
            $src = $upload_path.'!300'.".{$type}";
            $Image->thumb(300,300)->save($src);
            
            if($upload_size){
                return ['status'=>1,'type_id'=>$type_id,"path"=>$upload_path_,"src"=>$upload_path_];
            }else{
                return ['status'=>0,'msg'=>'文件保存失败，请重新选择上传'];
            }

        }else{
            return ['status'=>0,'msg'=>'网络错误，请重新选择图片进行上传'];
        }
    }


    public function simditor_img(){
        header("Content-type:text/html");

        $file_part = pathinfo($_FILES['file']['name']);

      


        $floder = "public/upload/".date("Y")."/".date("m")."/".date("d")."/";
        if(!file_exists($floder)){mkdir($floder, 0755,true);}

        

        $upload_path = $floder.date("YmdHis")."_".rand(000,999);
        $file_path_name = $upload_path.".".$file_part['extension'];
        
        move_uploaded_file($_FILES["file"]["tmp_name"],$file_path_name);
        
        return ['success'=>true,'msg'=>"Upload Success!",'file_path'=>'/'.$file_path_name];
    }

    /*
     * 解析object成数组的方法
     * @param $json 输入的object数组
     * return $data 数组
     */
    private function json_array($json){
        if($json){
            foreach ((array)$json as $k=>$v){
                $data[$k] = !is_string($v)?$this->json_array($v):$v;
            }
            return $data;
        }
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

    /*获取文件路径*/
    private function get_file_path(){
        return $file_path;
    }
    /*获取文件名称*/
    private function get_file_name(){
        return $file_name;
    }
    
    
    /*获得省*/
    public function get_province(){
        $cid = Request::instance()->param("cid");

        $data = DB::name("address_province")->field("id,provinceName,bigArea")->select();
        $html = '<option value ="">请选择</option>';
        foreach ($data as $key => $value) {
            if($cid == $value['id']){
                $html.='<option value ="'.$value['id'].'" selected>'.$value['provinceName'].'</option>';
            }else{
                $html.='<option value ="'.$value['id'].'"  >'.$value['provinceName'].'</option>';
            }
        }
        return $html;
    }
    /*获取城市*/
    public function get_city(){
        
        $id = Request::instance()->param("id");
        $cid = Request::instance()->param("cid");

        if($id){
            $data = DB::name("address_city")->where("provinceId = ".$id)->field("id,cityName,provinceId")->select();
            $city = '<option value ="">请选择</option>';
            foreach ($data as $key => $value) {
                if($cid == $value['id']){
                    $city.='<option value ="'.$value['id'].'" selected>'.$value['cityName'].'</option>';
                }else{
                    $city.='<option value ="'.$value['id'].'" >'.$value['cityName'].'</option>';
                }
            }
        }else{
            $city='';
        }
        return $city;
    }


    /*获得省*/
    public function get_system_main(){
        $cid = Request::instance()->param("cid");

        $data = DB::name("system_main")->select();
        $html = '<option value ="">请选择</option>';
        foreach ($data as $key => $value) {
            if($cid == $value['id']){
                $html.='<option value ="'.$value['id'].'" selected>'.$value['name'].'</option>';
            }else{
                $html.='<option value ="'.$value['id'].'"  >'.$value['name'].'</option>';
            }
        }
        return $html;
    }
    /*获取城市*/
    public function get_system_part(){
        
        $id = Request::instance()->param("id");
        $cid = Request::instance()->param("cid");

        if($id){
            $data = DB::name("system_part")->where("fid = ".$id)->select();
            $city = '<option value ="">请选择</option>';
            foreach ($data as $key => $value) {
                if($cid == $value['id']){
                    $city.='<option value ="'.$value['id'].'" selected>'.$value['name'].'</option>';
                }else{
                    $city.='<option value ="'.$value['id'].'" >'.$value['name'].'</option>';
                }
            }
        }else{
            $city='';
        }
        return $city;
    }

    

}
