<?php
namespace app\wx\controller;
use think\Controller;
use think\Db;
use think\Session;
use Image;

class Service extends Base{

	public function index(){
        
        $headArr = self::_getTKD('信息列表');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }


    /*服务列表*/
    public function service_list(){
        $list_data = DB::name("service_list")
        ->where(" user_id = ".Session::get('user_id'))
        ->order("id desc")->paginate(10);
        
    	$headArr = self::_getTKD('服务信息列表');
        $this->assign(compact("headArr","list_data"));
        return $this->fetch();
    }

    public function service_show_view(){
        $id = $this->request->param("id");
        
        $view_data = $this->_get_view_data($id);
        
        $this->assign('view_data', $view_data);

        
        $headArr = self::_getTKD('查看审批信息');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }

    public function _get_view_data($id){
        $view_temp = DB::name('service_list')
                ->join("think_admin_user r2","r2.admin_id = think_service_list.user_id2",'left')
                ->join("think_admin_user r3","r3.admin_id = think_service_list.user_id3",'left')
                ->join("think_admin_user r4","r4.admin_id = think_service_list.user_id4",'left')
                ->join("think_admin_user r5","r5.admin_id = think_service_list.user_id5",'left')
                ->join("think_admin_user r6","r6.admin_id = think_service_list.user_id5",'left')
                ->where("think_service_list.id = ".$id)
                ->field("think_service_list.*,r2.username name2,r3.username name3,r4.username name4,r5.username name5,r6.username name6")->find();
        
    

        $view_data = array();

        /*质量部审批审批*/
        if($view_temp['status2'] == 2){
            $view_data[2]["view_status"]  = $view_temp['status2'];
            $view_data[2]["role_id"]      = $view_temp['role_id2'];
            $view_data[2]["role_name"]    = $view_temp['name2'];
            $view_data[2]["user_id"]      = $view_temp['user_id2'];
            $view_data[2]["view_content"] = $view_temp['content2'];
            $view_data[2]["add_time"]     = $view_temp['time2'];
            $view_data[2]["type"]         = '2';
        }

        /*质量部长审批*/
        if($view_temp['status3'] == 2){
            $view_data[3]["view_status"]  = $view_temp['status3'];
            $view_data[3]["role_id"]      = $view_temp['role_id3'];
            $view_data[3]["role_name"]    = $view_temp['name3'];
            $view_data[3]["user_id"]      = $view_temp['user_id3'];
            $view_data[3]["view_content"] = $view_temp['content3'];
            $view_data[3]["add_time"]     = $view_temp['time3'];
            $view_data[3]["type"]         = '3';
        }
        
        /*生产采购*/
        if($view_temp['status4'] == 2){
            $view_data[4]["view_status"]  = $view_temp['status4'];
            $view_data[4]["role_id"]      = $view_temp['role_id4'];
            $view_data[4]["role_name"]    = $view_temp['name4'];
            $view_data[4]["user_id"]      = $view_temp['user_id4'];
            $view_data[4]["view_content"] = $view_temp['content4'];
            $view_data[4]["add_time"]     = $view_temp['time4'];
            $view_data[4]["type"]         = '4';
        }

        /*技术部*/
        if($view_temp['status5'] == 2){
            $view_data[5]["view_status"]  = $view_temp['status5'];
            $view_data[5]["role_id"]      = $view_temp['role_id5'];
            $view_data[5]["role_name"]    = $view_temp['name5'];
            $view_data[5]["user_id"]      = $view_temp['user_id5'];
            $view_data[5]["view_content"] = $view_temp['content5'];
            $view_data[5]["add_time"]     = $view_temp['time5'];
            $view_data[5]["type"]         = '5';
        }

        /*财务部*/
        if($view_temp['status6'] == 2){
            $view_data[6]["view_status"]  = $view_temp['status6'];
            $view_data[6]["role_id"]      = $view_temp['role_id6'];
            $view_data[6]["role_name"]    = $view_temp['name6'];
            $view_data[6]["user_id"]      = $view_temp['user_id6'];
            $view_data[6]["view_content"] = $view_temp['content6'];
            $view_data[6]["add_time"]     = $view_temp['time6'];
            $view_data[6]["type"]         = '6';
        }
        
        return $view_data;
    }

    /*添加新服务*/
    public function service_add(){
    	/*反馈单号*/
        $data["id"]              = 0;
        $data["add_time"]        = time();
        $data["order_num"]       = $this->_getOrderId();
        $data["title"]           = '';
        $data["type"]            = '';
        $data["department"]      = '';
        $data["product_code"]    = '';
        $data["happen_position"] = '';
        $data["part_code"]       = '';
        $data["part_num"]        = '';
        $data["description"]     = '';
        $data["cost_money"]      = '';
        
        $data["chuli_user"]      = '';
        $data["chuli_cuoshi"]    = '';
        $data["chuli_time"]      = '';
        $data["beizhu"]          = '';

        
        $data["user_id2"]      = 0;
        
        $this->assign('data', $data);
        $this->assign('img_data', array());

        $type = DB::name("service_type")->select();
        $this->assign('type', $type);

        $zl_user = DB::name("admin_user")->where("role_id = 2")->select();
        $this->assign('zl_user', $zl_user);

        $headArr = self::_getTKD('产品质量信息反馈单');
        $this->assign(compact("headArr"));
    	return $this->fetch("service_edit");
    }

    public function service_edit(){
        $id = $this->request->param("id");
        
        $data = DB::name('service_list')->where("id = ".$id)->find();
        $img_data = DB::name('service_img')->where("service_id = ".$id)->select();
        
        $this->assign('data', $data);
        $this->assign('img_data', $img_data);

        $type = DB::name("service_type")->select();
        $this->assign('type', $type);

        $zl_user = DB::name("admin_user")->where("role_id = 2")->select();
        $this->assign('zl_user', $zl_user);

        $headArr = self::_getTKD('修改产品质量信息反馈单');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }


    public function ajax_service_edit(){

        $where['id'] = $this->request->param("id");
        
        $data["order_num"]       = $this->request->param("order_num");
        $data["title"]           = $this->request->param("title");
        $data["type"]            = $this->request->param("type");
        $data["department"]      = $this->request->param("department");
        $data["product_code"]    = $this->request->param("product_code");
        $data["happen_position"] = $this->request->param("happen_position");
        $data["part_code"]       = $this->request->param("part_code");
        $data["part_num"]        = $this->request->param("part_num");
        $data["description"]     = $this->request->param("description");
        $data["cost_money"]      = $this->request->param("cost_money");

        $data["chuli_user"]      = $this->request->param("chuli_user");
        $data["chuli_cuoshi"]    = $this->request->param("chuli_cuoshi");
        $data["chuli_time"]      = $this->request->param("chuli_time");
        $data["beizhu"]          = $this->request->param("beizhu");

        $data["user_id2"]      = $this->request->param("user_id2");
        $data['user_id']         = Session::get('user_id');
        $data["update_time"]     = time();


        if($where["id"]){

            $data['status2'] = 1;/*质量部审批*/
            $data['status3'] = 1;/*质量部长*/
            $data['status4'] = 1;/*生产审批*/
            $data['status5'] = 1;/*技术部*/
            $data['status6'] = 1;/*财务部*/

            $res = DB::name("service_list")->where($where)->update($data);

            $service_id = $where["id"];
            /*图片表*/
            $img_id = $this->request->param("img_id/a");
            $img = $this->request->param("img/a");
            $img_data = array();
            foreach ($img as $k => $v) {
                
                $img_where["id"] = $img_id[$k];
                $img_data["service_id"] = $service_id;
                $img_data["src"] = $img[$k];
          
                if($img_where["id"]){
                    DB::name("service_img")->where($img_where)->update($img_data);
                }else{
                    DB::name("service_img")->insert($img_data);
                }
                //echo DB::name("service_img")->getLastSql();
            }

        }else{
            $data["add_time"]        = time();
            
            $res = DB::name("service_list")->insert($data);
            $service_id = Db::name('service_list')->getLastInsID();

            $img = $this->request->param("img/a");
            $img_data = array();
            foreach ($img as $k => $v) {
                $img_data["service_id"] = $service_id;
                $img_data["src"] = $img[$k];
                DB::name("service_img")->insert($img_data);
                //echo DB::name("service_img")->getLastSql();
            }
        }

        
        if($res){
            return ['status'=>1];
        }else{
            return ['status'=>0,'msg'=>'网络错误，请重试'];
        }
    }



    /*服务列表详情*/
    public function service_show(){
        $id = $this->request->param("id");

        $data = DB::name('service_list')
                ->join("think_service_type type","type.id = think_service_list.type","left")
                ->join("think_admin_user u","u.admin_id = think_service_list.user_id")
                ->join("think_admin_role r","r.role_id = u.role_id")
                ->where("think_service_list.id = ".$id)
                ->field("think_service_list.*,type.name as type_name,u.username,r.role_name")->find();
        
        /*图片表*/
        $img_data_arr = DB::name('service_img')->where("service_id = ".$id)->select();
        $img_data = array();
        foreach ($img_data_arr as $key => $v) {
            if($v['src']){
                $img_data[$key] = $v;
                $info = pathinfo($v['src']);
                //$info['extension'];
                $img_data[$key]['src_300'] = str_replace('.'.$info['extension'],"!300.".$info['extension'],$v['src']);
            }
            
        }

        
        $view_data = $this->_get_view_data($id);



        $this->assign('view_data', $view_data);
        $this->assign('data', $data);
        $this->assign('img_data', $img_data);

        $role_user = DB::name("admin_user")->where("role_id in (2,3,4,5)")->select();
        $this->assign('role_user', $role_user);


        $headArr = self::_getTKD('审核反馈信息');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }


    public function upload_img(){
        header('Content-type:text/html;charset=utf-8');

        //$type_id = $this->request->param("type_id");
        $upload = $this->request->param("img");

        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $upload, $result)){
            
            $type = $result[2];

            $floder = "upload/".date("Y")."/".date("m")."/".date("d")."/";
            if(!file_exists($floder)){mkdir($floder, 0755,true);}

            $upload_path = $floder.date("YmdHis")."_0".rand(000,999);
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
                return ['status'=>1,"path"=>$upload_path_,"src"=>$src];
            }else{
                return ['status'=>0,'msg'=>'文件保存失败，请重新选择上传'];
            }

        }else{
            return ['status'=>0,'msg'=>'网络错误，请重新选择图片进行上传'];
        }
    }

    protected static function _getOrderId(){
        //订单第一位为1 表示普通购买
        $id = 'FK'.date('YmdH');//substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 4);
        $find = DB::name("service_list")->order(" add_time desc ")->limit(0,1)->value("id");
        
        if($find<1000){
            $find = substr(strval($find+10000),1,4);
        }

        return $id.$find;
    }

}
