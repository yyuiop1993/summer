<?php
namespace app\wx\controller;
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


    /*图片上传*/
    public function webupload_img(){
        if (!empty($_FILES)) {

            $file_type = array('jpg','jpeg','png','JPG','JPEG','PNG');
            if(in_array($file_info['extension'],$file_type)) {
                print json_encode(array('status'=>0,"msg"=>"图片类型不符合"));
            }

            if($_FILES["file"]["size"]>8388608) {    //大于15MB
                print json_encode(array('status'=>0,"msg"=>"图片尺寸过大"));
            }
            $file_part = pathinfo($_FILES['file']['name']);
            $temp_file = $_FILES['file']['tmp_name'];

            import('@.ORG.UpYun');
            $upyun = new UpYun(C('UPYUN.UPYUN_BUCKET'),C('UPYUN.UPYUN_USER'),C('UPYUN.UPYUN_PWD'));

            $path_name = $this->getStr(12).rand(1000,9999).'.'.$file_part['extension'];

            $file_path =  $this->_get_path($upyun).$path_name;
            
            try{
                $fh = fopen($temp_file, 'rb');
                $rsp = $upyun->writeFile($file_path, $fh, True);   // 上传图片，自动创建目录
                fclose($fh);
            }catch(Exception $e){
                
                /*echo $e->getCode();
                echo $e->getMessage();
                exit();*/
                
                try{
                    $fh = fopen($temp_file, 'rb');
                    $rsp = $upyun->writeFile($file_path, $fh, True);   // 上传图片，自动创建目录
                    fclose($fh);
                }catch(Exception $e) {
                    print json_encode(array('status'=>0,"msg"=>"图片上传失败,请刷新页面重新上传","error"=>$rsp));
                    exit();
                }
            }
            
            $file_path = ltrim($file_path, "/");
            print json_encode(array('status'=>1,'path'=>$file_path));

        }else{
            print json_encode(array('status'=>0,"msg"=>"请选择照片"));
        }
    }
    

    public function simditor_img(){
        header("Content-type:text/html");

        $file_part = pathinfo($_FILES['file']['name']);
        $temp_file = $_FILES['file']['tmp_name'];

        import('@.ORG.UpYun');
        $upyun = new UpYun(C('UPYUN.UPYUN_BUCKET'),C('UPYUN.UPYUN_USER'),C('UPYUN.UPYUN_PWD'));

        $path_name = $this->getStr(12).rand(1000,9999).'.'.$file_part['extension'];
        
        $file_path =  $this->_get_path($upyun).$path_name;
        
        try{
            $fh = fopen($temp_file, 'rb');
            $rsp = $upyun->writeFile($file_path, $fh, True);   // 上传图片，自动创建目录
            fclose($fh);
        }catch(Exception $e){
            try{
                $fh = fopen($temp_file, 'rb');
                $rsp = $upyun->writeFile($file_path, $fh, True);   // 上传图片，自动创建目录
                fclose($fh);
            }catch(Exception $e) {
                $result['success']  = false;
                $result['msg']      = "图片上传失败,请刷新页面重新上传";
                $this->ajaxReturn($result);
            }
        }

        $result['success']  = true;
        $result['msg']      = "Upload Success!";
        $result['file_path']= C('TMPL_PARSE_STRING.__PIC__').$file_path;

        $this->ajaxReturn($result);
    }

    /*获取图片路径*/
    public function _get_path($upyun){
        $file_type = cookie('upload_file_type');
        $file_value = cookie('upload_file_value');
        
		if($file_type=="/brand/"){
			$path = $file_type;
		}else{
			$value = D('Parameter')->get_value($file_value);
	        $folder = chunk_split(sprintf('%06d', $value), 2, '/');
	        $file_list = $upyun->getList($file_type.$folder);
	        if(count($file_list)>150){
	            $value++;
	            $res = D('Parameter')->set_value($file_value,$value);
	            $folder = chunk_split(sprintf('%06d', $value), 2, '/');
	            $upyun->makeDir($file_type.$folder);
	        }
	        $path = $file_type.$folder;
		}
		return $path;
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
        $cid = $this->_post("cid",0);
        header("Content-type: text/html; charset=utf-8");
        $data = M("address_province")->getField("id,provinceName,bigArea");
        $html = '<option value ="">请选择</option>';
        foreach ($data as $key => $value) {
            if($cid == $value['id']){
                $html.='<option value ="'.$value['id'].'" selected>'.$value['provinceName'].'</option>';
            }else{
                $html.='<option value ="'.$value['id'].'"  >'.$value['provinceName'].'</option>';
            }

        }
        $this->ajaxReturn($html);
    }
    /*获取城市*/
    public function get_city(){
        header("Content-type: text/html; charset=utf-8");
        $id = $this->_post("id");
        $cid = $this->_post("cid",0);
        if($id){
            $data = M("address_city")->where("provinceId = ".$id)->getField("id,cityName,provinceId");
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
        $this->ajaxReturn($city);
    }
    /*获取地区*/
    public function get_area(){
        header("Content-type: text/html; charset=utf-8");
        $id = $this->_post("id");
        $cid = $this->_post("cid",0);
        if($id){
            $data = M("address_area")->where("cityId = ".$id)->getField("id,areaName,cityId");
            $area = '<option value ="">请选择</option>';
            foreach ($data as $key => $value) {

                if($cid == $value['id']){
                    $area.='<option value ="'.$value['id'].'" selected>'.$value['areaName'].'</option>';
                }else{
                    $area.='<option value ="'.$value['id'].'" >'.$value['areaName'].'</option>';
                }
            }
        }else{
            $area='';
        }
        $this->ajaxReturn($area);
    }
    
    public function get_pro_all(){
        header("Content-type: text/html; charset=utf-8");
        $province_id = $this->_post("province_id");
        $city_id = $this->_post("city_id");
        $area_id = $this->_post("area_id");

        $data = M("address_province")->getField("id,provinceName,bigArea");
        $html = '<option value ="">请选择</option>';

        foreach ($data as $key => $value) {
            if($province_id == $value['id']){
                $html.='<option value ="'.$value['id'].'" selected>'.$value['provinceName'].'</option>';
            }else{
                $html.='<option value ="'.$value['id'].'"  >'.$value['provinceName'].'</option>';
            }
        }

        $data = M("address_city")->where("provinceId = ".$province_id)->getField("id,cityName,provinceId");
        $city = '<option value ="">请选择</option>';
        foreach ($data as $key => $value) {
            if($city_id == $value['id']){
                $city.='<option value ="'.$value['id'].'" selected>'.$value['cityName'].'</option>';
            }else{
                $city.='<option value ="'.$value['id'].'" >'.$value['cityName'].'</option>';
            }
        }

        $data = M("address_area")->where("cityId = ".$city_id)->getField("id,areaName,cityId");
        $area = '<option value ="">请选择</option>';
        foreach ($data as $key => $value) {
            if($area_id == $value['id']){
                $area.='<option value ="'.$value['id'].'" selected>'.$value['areaName'].'</option>';
            }else{
                $area.='<option value ="'.$value['id'].'" >'.$value['areaName'].'</option>';
            }
        }

        $res['status'] = 1;
        $res['province'] = $html;
        $res['city'] = $city;
        $res['area'] = $area;
        $this->ajaxReturn($res);
    }

    

}
