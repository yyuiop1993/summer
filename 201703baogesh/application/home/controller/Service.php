<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;
use Image;
use CustomPagerJH;
//use phpexcel\PHPExcel;

class Service extends Base{


	public function index(){

        
        $headArr = self::_getTKD('信息列表');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }


    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*服务列表*/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/

    public function service_list(){
        $page = $this->request->param("page");
        $keyword = $this->request->param("keyword");
        $where = '';
        
        if($keyword){
            $where['think_service_list.title'] = array('like',"%".$keyword."%");
        }

        if($this->user["role_id"] == 2){
        	/*信息专员*/
            $where['think_service_list.status2']  = 1;
            $where['think_service_list.user_id2'] = $this->user["user_id"];
        }else if($this->user["role_id"] == 3){
            /*质量部长*/
            $where['think_service_list.status2']  = 2;
            $where['think_service_list.status3']  = 1;
            $where['think_service_list.user_id3'] = $this->user["user_id"];
        }else if($this->user["role_id"] == 4){
            /*分管领导*/
            $where['think_service_list.status2']  = 2;
            $where['think_service_list.status3']  = 2;
            $where['think_service_list.status4']  = 1;
            $where['think_service_list.user_id4'] = $this->user["user_id"];
        }else if($this->user["role_id"] == 5){
            /*技术部*/
            $where['think_service_list.status2']  = 2;
            $where['think_service_list.status3']  = 2;
            $where['think_service_list.status4']  = 2;
            $where['think_service_list.status5']  = 1;
            $where['think_service_list.user_id5'] = $this->user["user_id"];
        }else if($this->user["role_id"] == 6){
            /*财务部*/
            $where['think_service_list.status2']  = 2;
            $where['think_service_list.status3']  = 2;
            $where['think_service_list.status4']  = 2;
            $where['think_service_list.status5']  = 2;
            $where['think_service_list.status6']  = 1;
            $where['think_service_list.user_id6'] = $this->user["user_id"];
        }else if($this->user["role_id"] == 7){
            /*审阅*/
            $where['think_service_list.status2']  = 2;
            $where['think_service_list.status3']  = 2;
            $where['think_service_list.status4']  = 2;
            $where['think_service_list.status5']  = 2;
            $where['think_service_list.status6']  = 2;
            $where['think_service_list.status7']  = 2;
            $where['think_service_list.user_id7'] = $this->user["user_id"];
        }else{
            /*普通用户*/
            $where['think_service_list.status2']  = 1;
            $where['think_service_list.status3']  = 1;
            $where['think_service_list.status4']  = 1;
            $where['think_service_list.status5']  = 1;
            $where['think_service_list.status6']  = 1;
            $where['think_service_list.status7']  = 1;
        }

        $list_data = DB::name("service_list")
        ->join("think_admin_user u","u.admin_id = think_service_list.user_id")
        ->join("think_admin_role r","r.role_id = u.role_id")
        ->where($where)->field("think_service_list.*,u.username,r.role_name")
        ->order("think_service_list.id desc")->page($page,$this->limit)->paginate($this->limit);


    	$headArr = self::_getTKD('服务信息列表');
        $this->assign(compact("headArr","list_data"));
        return $this->fetch();
    }



    /*服务列表详情*/
    public function service_list_show(){
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

        $role_data = DB::name('admin_role')->select();
        $this->assign('role_data', $role_data);
        
        $view_data = $this->_get_view_data($id);
        $this->assign('view_data', $view_data);
        $this->assign('data', $data);
        $this->assign('img_data', $img_data);

        $role_user = DB::name("admin_user")->where("role_id in (2,3,4,5,6)")->select();
        $this->assign('role_user', $role_user);


        $headArr = self::_getTKD('审核反馈信息');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }


    public function ajax_service_show(){
        $type = $this->request->param("type");
        $where['id'] = $this->request->param("id");

        if($type == '2'){

            $data['role_id2'] = Session::get('role_id');
            $data['status2']  = $this->request->param("group_status");
            $data['content2'] = $this->request->param("group_content");
            $data['user_id3'] = $this->request->param("admin_id");
            $data['time2']    = time();
        }else if($type == '3'){
            //$data['zlbz_user_id'] = Session::get('user_id');
            $data['role_id3']   = Session::get('role_id');
            $data['status3']    = $this->request->param("group_status");
            $data['content3']   = $this->request->param("group_content");
            $data['user_id4'] = $this->request->param("admin_id");
            $data['time3']      = time();
        }else if($type == '4'){
            //$data['leader_user_id'] = Session::get('user_id');
            $data['role_id4'] = Session::get('role_id');
            $data['status4']  = $this->request->param("group_status");
            $data['content4'] = $this->request->param("group_content");
            $data['user_id5']     = $this->request->param("admin_id");
            $data['time4']    = time();
        }else if($type == '5'){
            //$data['cw_user_id'] = Session::get('user_id');
            $data['role_id5'] = Session::get('role_id');
            $data['status5']  = $this->request->param("group_status");
            $data['content5'] = $this->request->param("group_content");
            $data['user_id6']     = $this->request->param("admin_id");
            $data['time5']    = time();
        }else if($type == '6'){
            //$data['cw_user_id'] = Session::get('user_id');
            $data['role_id6'] = Session::get('role_id');
            $data['status6']  = $this->request->param("group_status");
            $data['content6'] = $this->request->param("group_content");
            $data['user_id7']     = $this->request->param("admin_id");
            $data['time6']    = time();
        }else if($type == '7'){
            //$data['cw_user_id'] = Session::get('user_id');
            $data['role_id7'] = Session::get('role_id');
            $data['status7']  = $this->request->param("group_status");
            $data['content7'] = $this->request->param("group_content");
            //$data['user_id4']     = $this->request->param("admin_id");
            $data['time7']    = time();
        }

        

        $res = DB::name('service_list')->where($where)->update($data);

        //echo DB::name('service_list')->getLastSql();
        if($res){
            return ['status'=>1,'service_id'=>$where['id']];
        }else{
            return ['status'=>0,'msg'=>'网络错误，请重试'];
        }
    }   


    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*已审核列表*/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/

    public function service_suc_list(){
        $page = $this->request->param("page",1);
        $keyword = $this->request->param("keyword");
        $where = '';
        
        if($keyword){
            $where['think_service_list.title'] = array('like',"%".$keyword."%");
        }
        

        if($this->user["role_id"] == 2){
            /*信息专员*/
            $where['think_service_list.status2'] = 2;
        }else if($this->user["role_id"] == 3){
            /*质量部长*/
            $where['think_service_list.status3'] = 2;
        }else if($this->user["role_id"] == 4){
            /*分管领导*/
            $where['think_service_list.status4'] = 2;
        }else if($this->user["role_id"] == 5){
            /*技术部*/
            $where['think_service_list.status5'] = 2;
        }else if($this->user["role_id"] == 6){
            /*财务部*/
            $where['think_service_list.status6'] = 2;
        }else if($this->user["role_id"] == 7){
            /*审阅*/
            $where['think_service_list.status7'] = 2;
        }else if($this->user["role_id"] == 1){
            //$where['think_service_list.status2'] = 2;
            //$where['think_service_list.status3'] = 2;
            //$where['think_service_list.status4'] = 2;
            //$where['think_service_list.status5'] = 2;
            //$where['think_service_list.status6'] = 2;
        }else{
            //$where['think_service_list.status2'] = 2;
            //$where['think_service_list.status3'] = 2;
            //$where['think_service_list.status4'] = 2;
            //$where['think_service_list.status5'] = 2;
            //$where['think_service_list.status6'] = 2;
        }

        $list_data = DB::name("service_list")
        ->join("think_admin_user u","u.admin_id = think_service_list.user_id","left")
        ->join("think_admin_role r","r.role_id = u.role_id","left")
            
            ->join("think_admin_user r2","r2.admin_id = think_service_list.user_id2",'left')
            ->join("think_admin_user r3","r3.admin_id = think_service_list.user_id3",'left')
            ->join("think_admin_user r4","r4.admin_id = think_service_list.user_id4",'left')
            ->join("think_admin_user r5","r5.admin_id = think_service_list.user_id5",'left')
            ->join("think_admin_user r6","r6.admin_id = think_service_list.user_id6",'left')
            ->join("think_admin_user r7","r7.admin_id = think_service_list.user_id7",'left')

        ->where($where)->field("think_service_list.*,r.role_name,r2.username username2,r3.username username3,r4.username username4,r5.username username5,r6.username username6,r7.username username7 ")
        ->order("think_service_list.id desc")->page($page,$this->limit)->paginate($this->limit);

      
        $this->assign("role_id",$this->user["role_id"]);
        $headArr = self::_getTKD('已审核列表');
        $this->assign(compact("headArr","list_data"));
        return $this->fetch();
    }

    /*已审核的详情*/
    public function service_suc_show(){
        $id = $this->request->param("id");
        $data = DB::name('service_list')
                ->join("think_service_type type","type.id = think_service_list.type","left")
                ->join("think_admin_user u","u.admin_id = think_service_list.user_id")
                ->join("think_admin_role r","r.role_id = u.role_id")
                ->where("think_service_list.id = ".$id)
                ->field("think_service_list.*,type.name as type_name,u.username,r.role_name")->find();
       
        /*图片表*/
        $img_data = DB::name('service_img')->where("service_id = ".$id)->select();

        foreach ($img_data as $key => $v) {
            $info = pathinfo($v['src']);
            if($info["basename"]){
                $img_data[$key]['src_300'] = str_replace('.'.$info['extension'],"!300.".$info['extension'],$v['src']);    
            }else{
                $img_data[$key]['src_300'] = 0;
            }
            if(!$img_data[$key]['src_300']){
                unset($img_data[$key]);
            }
        }


        $role_data = DB::name('admin_role')->select();
        $this->assign('role_data', $role_data);
        
        $view_data = $this->_get_view_data($id);
        
        $this->assign('view_data', $view_data);
        $this->assign('data', $data);
        $this->assign('img_data', $img_data);


        $headArr = self::_getTKD('查看反馈信息');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }

    public function _get_view_data($id){
        $view_temp = DB::name('service_list')
                ->join("think_admin_user r2","r2.admin_id = think_service_list.user_id2",'left')
                ->join("think_admin_user r3","r3.admin_id = think_service_list.user_id3",'left')
                ->join("think_admin_user r4","r4.admin_id = think_service_list.user_id4",'left')
                ->join("think_admin_user r5","r5.admin_id = think_service_list.user_id5",'left')
                ->join("think_admin_user r6","r6.admin_id = think_service_list.user_id6",'left')
                ->join("think_admin_user r7","r7.admin_id = think_service_list.user_id7",'left')
                ->where("think_service_list.id = ".$id)
                ->field("think_service_list.*,r2.username name2,r3.username name3,r4.username name4,r5.username name5,r6.username name6,r7.username name7")->find();
        
        

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

        /*审阅*/
        if($view_temp['status7'] == 2){
            $view_data[7]["view_status"]  = $view_temp['status7'];
            $view_data[7]["role_id"]      = $view_temp['role_id7'];
            $view_data[7]["role_name"]    = $view_temp['name7'];
            $view_data[7]["user_id"]      = $view_temp['user_id7'];
            $view_data[7]["view_content"] = $view_temp['content7'];
            $view_data[7]["add_time"]     = $view_temp['time7'];
            $view_data[7]["type"]         = '7';
        }

        
        return $view_data;
    }


    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*待审核列表*/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
   
    public function service_no(){
        $page = $this->request->param("page");
        $keyword = $this->request->param("keyword");
        $where = '';
        
        if($keyword){
            $where['think_service_list.title'] = array('like',"%".$keyword."%");
        }


        $list_data = DB::name("service_list")
        ->where($where)->where("think_service_list.status","eq",1)->field("think_service_list.id,think_service_list.user_id,think_service_list.title,think_service_list.user_name,think_service_list.add_time")
        ->order("think_service_list.id desc")->page($page,$this->limit)->select();
        
        $all_count = DB::name("service_list")
        ->where($where)->where("think_service_list.status","eq",1)->field("think_service_list.id,think_service_list.user_id,think_service_list.title,think_service_list.user_name,think_service_list.add_time")
        ->order("think_service_list.id desc")->count();
        
        
        $show = CustomPagerJH::page($page, $this->limit, $all_count);


        $headArr = self::_getTKD('服务信息列表');
        $this->assign(compact("headArr","list_data","show"));
        return $this->fetch();
    }

    public function service_no_show(){

        $id = $this->request->param("id");

        $data = DB::name('service_list')
                ->join("think_address_province p","p.id = think_service_list.work_province","left")
                ->join("think_address_city c","c.id = think_service_list.work_city","left")
                ->join("think_system_main main","main.id = think_service_list.system_main","left")
                ->join("think_system_part part","part.id = think_service_list.system_part","left")
                ->join("think_admin_user u","u.admin_id = think_service_list.user_id")
                ->join("think_admin_role r","r.role_id = u.role_id")
                ->where("think_service_list.id = ".$id)->field("think_service_list.*,p.provinceName,c.cityName,u.username,r.role_name,main.name as main_name,part.name as part_name")->find();


        $province = DB::name('address_province')->where(" id = ".$data["work_province"])->find();
        $city = DB::name('address_city')->where(" id = ".$data["work_city"])->find();


        /*配件表*/
        $part_data = DB::name('service_parts')->where("service_id = ".$id)->select();
        
        /*图片表*/
        $img_data = DB::name('service_img')->join("think_service_img_type type","think_service_img.type_id = think_service_img_type.id")->where("service_id = ".$id)->field("think_service_img.*,think_service_img_type.name")->select();
        foreach ($img_data as $key => $v) {
            $info = pathinfo($v['src']);
            $info['extension'];
            $img_data[$key]['src_300'] = str_replace('.'.$info['extension'],"!300.".$info['extension'],$v['src']);
        }

        /*审批表*/
        $view_data = DB::name("service_list_view")
        ->join("think_admin_role r","think_service_list_view.role_id = r.role_id","left")
        ->where("service_id = ".$id)->field("think_service_list_view.*,r.role_name")->select();
        //echo DB::name("service_list_view")->getLastSql();
        /*查询已经有多少人进行过审批*/
        $role_is_view = DB::name("service_list_view")->where("service_id = ".$id."  and role_id = ".Session::get('role_id'))->count();
        

        $view_count = DB::name("service_list_view")->where("service_id = ".$id." and view_status = 1")->count();
        


        $this->assign('view_count', $view_count);
        $this->assign('view_data', $view_data);
        $this->assign('data', $data);
        $this->assign('img_data', $img_data);
        $this->assign('part_data', $part_data);

        /*工作站名称*/
        $this->assign('role_name',Session::get('role_name') );
        $this->assign('work_envir', $this->work_envir);
        $this->assign('machine_model', $this->machine_model);
        
        $headArr = self::_getTKD('查看服务信息');
        $this->assign(compact("headArr","province","city"));
        return $this->fetch();
    }

    public function ajax_service_no_show(){
        $status      = $this->request->param("group_status");
        $where["id"] = $this->request->param("id");
        
        if($status){
            $data["status"] = 2;
            $data["examine_time"] = time();
        }else{
            $data["status"] = 3;
        }
        
        $data["examine_user_id"] = Session::get('user_id');
        $data["examine_role_id"] = Session::get('role_id');
        $data["examine_content"] = $this->request->param("examine_content");
        $res = DB::name("service_list")->where($where)->update($data);
        
        $this->assign('machine_model', $this->machine_model);
        if($res){
            return ['status'=>1];
        }else{
            return ['status'=>0,'msg'=>'网络错误，请重试'];
        }
    }



    /*导出*/
    public function export(){
        $data["system_main"] = '';
        $data["system_part"] = '';
        $this->assign('data', $data);


        header("Content-type: text/plain; charset=UTF-8");


        require __DIR__ . '/../../../extend/phpexcel/PHPExcel.php';


        $type = $this->request->param("type");
        $where = '';
        if($type == 'export'){

            $start_date = $this->request->param("start_date");
            $end_date   = $this->request->param("end_date");

            $system_main = $this->request->param("system_main",0);
            $system_part = $this->request->param("system_part",0);

            $where = '';

            if($start_date && $end_date){
                $where .= ' (think_service_list.add_time between '.strtotime($start_date).' and '.(strtotime($end_date)+86400).')  and ';
            }

            if($system_main){
                $where .= '   think_service_list.system_main =  '.$system_main.' and ';
            }

            if($system_part){
                $where .= '   think_service_list.system_part =  '.$system_part.' and ';
            }

            $where .=' 1 ';
            

            $list_data = DB::name('service_list')
                ->join("think_admin_user u","u.admin_id = think_service_list.user_id","left")
                ->join("think_admin_role r","r.role_id = u.role_id","left")
                ->join("think_service_type type","type.id = think_service_list.type","left")
                ->where($where)->field("think_service_list.*,u.username,r.role_name,type.name as type_name")->select();

            

            $data = array();
            $cell = array();
            
            $cell_count = 2;
            foreach ($list_data as $key => $v) {
                $data[$key]["id"]              = $v["id"];                     //编号
                $data[$key]["order_num"]       = $v["order_num"];              //反馈单号
                $data[$key]["role_name"]       = $v["role_name"];              //服务站名称
                $data[$key]["add_time"]        = date("Y-m-d",$v["add_time"]); //录入日期
                $data[$key]["department"]      = $v["department"];             //部门
                $data[$key]["product_code"]    = $v["product_code"];           //产品型号和名称
                $data[$key]["happen_position"] = $v["happen_position"];        //发生位置
                $data[$key]["part_code"]       = $v["part_code"];              //零件图号和名称
                $data[$key]["part_num"]        = $v["part_num"];               //零件数量
                $data[$key]["description"]     = $v["description"];            //原因描述
                $data[$key]["cost_money"]      = $v["cost_money"];             //索赔金额
                if($v['zl_status'] ==2 && $v['zlbz_status'] == 2 && $v['leader_status'] == 2 && $v['cw_status'] == 2){
                    $data[$key]["status"] = '已通过'; //是否通过审核
                }else{
                    $data[$key]["status"] = '未通过'; //是否通过审核
                }

            }  
            
            /*echo "<pre>";
            print_r($data);
            echo "</pre>";
            exit();*/

            $letter = array('A','B','C','D','E','F','F','G','H','I','J',"K");
            //,'L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AB'
            
            $tableheader = ['编号','反馈单号','用户名称','录入日期','部门','产品型号和名称','发生位置','零件图号和名称','零件数量','原因描述','索赔金额',"审核状态"];

            $excel = new \PHPExcel();

            for($i = 0;$i < count($tableheader);$i++) {
                $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
            }


            $cell_arr = array('K','L','M','V','W','X','Y','Z',"AA","AB");
            $cell_num = array();

            for ($i = 2;$i <= count($data) + 1;$i++) {
                $j = 0;
                foreach ($data[$i - 2] as $key=>$value) {
                    $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
                    

                    if($i>2){
                        if(in_array($letter[$j],$cell_arr)){
                            
                            if($data[$i-2]["id"] == $data[$i-3]["id"]){
                                $excel->getActiveSheet()->mergeCells($letter[$j].($i-1).':'.$letter[$j].$i);
                                $excel->getActiveSheet()->getStyle($letter[$j].($i-1))->getAlignment()->setVertical('center');
                            }
                            $cell_num[] = ($i-1);
                        }
                    }

                    $j++;
                }
            }
            
            $write = new \PHPExcel_Writer_Excel5($excel);
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");;
            header('Content-Disposition:attachment;filename="'.date("Y-m-d H:i:s").'.xls"');
            header("Content-Transfer-Encoding:binary");
            $write->save('php://output');
            exit();


            $output = '';
            $header = '';
            $content = '';
            $i=1;
            $header = "id,name,upc,brand,brand_detail,type,gender,material,rim,\r\n";
            $header = "编号,反馈单号,服务站名称,录入日期,整机编号,机型,购车日期,故障日期,失效模式,工作小时,故障描述,原因分析,故障处理,是否通过审核,配件名称,故障件名称,产品类型,用户名,电话,地址,机器工作地,工作环境,\r\n";
            foreach($data as $v) {
                $v['user_fault_content'] = str_replace("\n"," ",$v['user_fault_content']); 
                $v['user_fault_content'] = str_replace("\r"," ",$v['user_fault_content']); 
                $v['user_fault_content'] = str_replace("\r\n"," ",$v['user_fault_content']); 

                $v['analysis_reason'] = str_replace("\n"," ",$v['analysis_reason']); 
                $v['analysis_reason'] = str_replace("\r"," ",$v['analysis_reason']); 
                $v['analysis_reason'] = str_replace("\r\n"," ",$v['analysis_reason']); 

                $v['handel_way'] = str_replace("\n"," ",$v['handel_way']); 
                $v['handel_way'] = str_replace("\r"," ",$v['handel_way']); 
                $v['handel_way'] = str_replace("\r\n"," ",$v['handel_way']); 

                $content .="" . $i++ . ','
                . $v['order_num'] . ','
                . $v['role_name'] . ','
                . $v['add_time'] . ','
                . $v['machine_number'] . ','
                . $v['machine_model'] . ','
                . $v['come_date'] . ','
                . $v['fault_date'] . ',' 
                . $v['work_hour'] . ',' 

                . $v['user_fault_content'] . ','
                . $v['analysis_reason'] . ','
                . $v['handel_way']. ','

                . $v['status'] . ','
                . $v['part_name'] . ','
                //. $v['fault_item_name'] . ','
                //. $v['item_type'] . ','
                . $v['user_name'] . ','
                . $v['user_mobile'] . ','
                . $v['user_address'] . ','
                . $v['work_loca'] . ','
                . $v['work_envir'] . "\r\n";
            }

            $output = "\xEF\xBB\xBF";
            $output .= $header . $content;
            //header("Content-type: text/plain; charset=UTF-8");
            header("Content-Disposition: attachment; filename=" .date("Y-m-d").rand(0000,9999) . ".csv");
            header("Pragma: no-cache");
            header("Expires: 0");
            print $output;
            exit();
        }

        
        $headArr = self::_getTKD('导出');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }





    public function getMonthNum($date1,$date2){
        $date1_stamp=strtotime($date1);
        $date2_stamp=strtotime($date2);
        list($date_1['y'],$date_1['m'])=explode("-",date('Y-m',$date1_stamp));
        list($date_2['y'],$date_2['m'])=explode("-",date('Y-m',$date2_stamp));
        return abs($date_1['y']-$date_2['y'])*12 +$date_2['m']-$date_1['m'];
     }


















    /*用户服务列表*/
    public function service_user_list(){
        $page = $this->request->param("page");
        $keyword = $this->request->param("keyword");
        $where = '';
        
        if($keyword){
            $where['think_service_list.title'] = array('like',"%".$keyword."%");
        }
        
        
        $where['think_service_list.user_id'] = Session::get('user_id');
        

        $list_data = DB::name("service_list")
        ->where($where)->order("think_service_list.id desc")->page($page,$this->limit)->select();
        
        $all_count = DB::name("service_list")
        ->where($where)->order("think_service_list.id desc")->count();
        
        $show = CustomPagerJH::page($page, $this->limit, $all_count);


        $headArr = self::_getTKD('服务信息列表');
        $this->assign(compact("headArr","list_data","show"));
        return $this->fetch();
    }

    /*服务列表详情*/
    public function service_user_show(){
        $id = $this->request->param("id");
        $data = DB::name('service_list')
                ->join("think_address_province p","p.id = think_service_list.work_province","left")
                ->join("think_address_city c","c.id = think_service_list.work_city","left")
                ->join("think_system_main main","main.id = think_service_list.system_main","left")
                ->join("think_system_part part","part.id = think_service_list.system_part","left")
                ->join("think_admin_user u","u.admin_id = think_service_list.user_id")
                ->join("think_admin_role r","r.role_id = u.role_id")
                ->where("think_service_list.id = ".$id)->field("think_service_list.*,p.provinceName,c.cityName,u.username,r.role_name,main.name as main_name,part.name as part_name")->find();
       
        /*配件表*/
        $part_data = DB::name('service_parts')->where("service_id = ".$id)->select();
        
        /*图片表*/
        $img_data = DB::name('service_img')->join("think_service_img_type type","think_service_img.type_id = think_service_img_type.id")->where("service_id = ".$id)->field("think_service_img.*,think_service_img_type.name")->select();
        foreach ($img_data as $key => $v) {
            $info = pathinfo($v['src']);
            $info['extension'];
            $img_data[$key]['src_300'] = str_replace('.'.$info['extension'],"!300.".$info['extension'],$v['src']);
        }

        $view_temp = DB::name('service_list')
                ->join("think_admin_role r1","r1.role_id = think_service_list.examine_role_id",'left')
                ->join("think_admin_role r2","r2.role_id = think_service_list.tech_role_id",'left')
                ->join("think_admin_role r3","r3.role_id = think_service_list.support_role_id",'left')
                ->join("think_admin_role r4","r4.role_id = think_service_list.leader_role_id",'left')
                ->where("think_service_list.id = ".$id)->field("think_service_list.*,r1.role_name examine_name,r2.role_name tech_name,r3.role_name support_name,r4.role_name leader_name")->find();
        
        /*信息员审批*/
        $view_data[0]["view_status"]  = $view_temp['status'];
        $view_data[0]["role_id"]      = $view_temp['examine_role_id'];
        $view_data[0]["role_name"]    = $view_temp['examine_name'];
        $view_data[0]["user_id"]      = $view_temp['examine_user_id'];
        $view_data[0]["view_content"] = $view_temp['examine_content'];
        $view_data[0]["add_time"]     = $view_temp['examine_time'];
        $view_data[0]["type"]         = 'info';


        /*技术部审批*/
        if($view_temp['tech_role_id']){
            $view_data[1]["view_status"]  = $view_temp['tech_status'];
            $view_data[1]["role_id"]      = $view_temp['tech_user_id'];
            $view_data[1]["role_name"]    = $view_temp['tech_name'];
            $view_data[1]["user_id"]      = $view_temp['tech_role_id'];
            $view_data[1]["view_content"] = $view_temp['tech_content'];
            $view_data[1]["add_time"]     = $view_temp['tech_time'];
            $view_data[1]["type"]         = 'tech';
        }
        
        if($view_temp['support_user_id']){
            /*售后服务部门审批*/
            $view_data[2]["view_status"]  = $view_temp['support_status'];
            $view_data[2]["user_id"]      = $view_temp['support_user_id'];
            $view_data[2]["role_name"]    = $view_temp['support_name'];
            $view_data[2]["role_id"]      = $view_temp['support_role_id'];
            $view_data[2]["view_content"] = $view_temp['support_content'];
            $view_data[2]["add_time"]     = $view_temp['support_time'];
            $view_data[2]["type"]         = 'support';
        }

        if($view_temp['leader_user_id']){
            /*分管领导*/
            $view_data[3]["view_status"]  = $view_temp['leader_status'];
            $view_data[3]["role_id"]      = $view_temp['leader_role_id'];
            $view_data[3]["role_name"]    = $view_temp['leader_name'];
            $view_data[3]["user_id"]      = $view_temp['leader_user_id'];
            $view_data[3]["view_content"] = $view_temp['leader_content'];
            $view_data[3]["add_time"]     = $view_temp['leader_time'];
            $view_data[3]["type"]         = 'leader';
        }
        
        

       
        $this->assign('view_data', $view_data);
        $this->assign('data', $data);
        $this->assign('img_data', $img_data);
        $this->assign('part_data', $part_data);



        /*工作站名称*/
        $this->assign('role_name',Session::get('role_name') );
        $this->assign('work_envir', $this->work_envir);
        $this->assign('machine_model', $this->machine_model);

        $headArr = self::_getTKD('查看服务信息');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }

    /*用户添加新服务*/
    public function service_user_add(){
        /*反馈单号*/
        $order_num = $this->_getOrderId();
        $this->assign('order_num', $order_num);
        /*工作站名称*/
        $this->assign('role_name',Session::get('role_name') );
        
        $this->assign('work_envir', $this->work_envir);
        $this->assign('machine_model', $this->machine_model);

        $data["work_province"] = '';
        $data["work_city"] = '';
        $data["system_main"] = '';
        $data["system_part"] = '';
        $this->assign('data', $data);

        $headArr = self::_getTKD('增加新服务信息');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }

    public function ajax_service_user_add(){
        
        $data['user_id']    = Session::get('user_id');

        $data['order_num']  = $this->request->param("order_num");
        $order_num = $this->_getOrderId();
        if($data['order_num'] != $order_num){
        	$data['order_num'] = $order_num;
        }

        //$data['fault_code'] = $this->request->param("fault_code");
        $data['title']      = $this->request->param("title");

        $data['work_province'] = $this->request->param("work_province");
        $data['work_city']     = $this->request->param("work_city");
        $data['work_envir']    = $this->request->param("work_envir");
        
        $data['user_name']      = $this->request->param("user_name");
        $data['user_mobile']    = $this->request->param("user_mobile");
        $data['user_address']   = $this->request->param("user_address");
        
        $data['driver_name']    = $this->request->param("driver_name");
        $data['driver_mobile']   = $this->request->param("driver_mobile");

        $data['machine_model']  = $this->request->param("machine_model");
        $data['machine_number'] = $this->request->param("machine_number");

        $data['come_date'] = $this->request->param("come_date");
        $data['fault_date'] = $this->request->param("fault_date");
        $data['work_hour'] = $this->request->param("work_hour");

        $data['system_main'] = $this->request->param("system_main");
        $data['system_part'] = $this->request->param("system_part");

        $data['user_fault_content'] = $this->request->param("user_fault_content");
        $data['analysis_reason']    = $this->request->param("analysis_reason");
        $data['handel_way']         = $this->request->param("handel_way");

        //$data['fault_item_name'] = $this->request->param("fault_item_name");
        //$data['item_type']       = $this->request->param("item_type");

        $data['add_time']    = time();
        $data['update_time'] = time();

        $res = DB::name("service_list")->insert($data);
        $service_id = Db::name('service_list')->getLastInsID();
        

        /*配件*/
        $part_name   = $this->request->param("part_name/a");
        $part_type   = $this->request->param("part_type/a");
        $part_newtu  = $this->request->param("part_newtu/a");
        $part_oldtu  = $this->request->param("part_oldtu/a");
        $part_newnum = $this->request->param("part_newnum/a");
        $part_oldnum = $this->request->param("part_oldnum/a");
        $part_number = $this->request->param("part_number/a");

        $part_data = array();
        foreach ($part_name as $k => $v) {
            if($part_name[$k]){
                $part_data[$k]["service_id"]  = $service_id;
                $part_data[$k]["part_name"]   = $part_name[$k];
                $part_data[$k]["part_type"]   = $part_type[$k];
                $part_data[$k]["part_newtu"]  = $part_newtu[$k];
                $part_data[$k]["part_oldtu"]  = $part_oldtu[$k];
                $part_data[$k]["part_newnum"] = $part_newnum[$k];
                $part_data[$k]["part_oldnum"] = $part_oldnum[$k];
                $part_data[$k]["part_number"] = $part_number[$k];
            }
        }

        if($part_data){
            DB::name("service_parts")->insertAll($part_data);    
        }
        

        /*图片表*/
        $img = $this->request->param("img/a");
        $img_data = array();
        foreach ($img as $k => $v) {
            $temp = explode("#", $v);
            $img_data[$k]["service_id"] = $service_id;
            $img_data[$k]["type_id"] = $temp[0];
            $img_data[$k]["src"] = $temp[1];
        }
        DB::name("service_img")->insertAll($img_data);
        
        

        if($res){
            return ['status'=>1];
        }else{
            return ['status'=>0,'msg'=>'网络错误，请重试'];
        }
    }



    public function service_user_edit(){
        $id = $this->request->param("id");
        $data = DB::name('service_list')->where("id = ".$id)->find();


        $part_data = DB::name('service_parts')->where("service_id = ".$id)->select();
        $img_data = DB::name('service_img')->join("think_service_img_type type","think_service_img.type_id = think_service_img_type.id")->where("service_id = ".$id)->field("think_service_img.*,think_service_img_type.name")->select();
        
        $this->assign('data', $data);
        $this->assign('img_data', $img_data);
        $this->assign('part_data', $part_data);


        $view_temp = DB::name('service_list')
                ->join("think_admin_role r1","r1.role_id = think_service_list.examine_role_id",'left')
                ->join("think_admin_role r2","r2.role_id = think_service_list.tech_role_id",'left')
                ->join("think_admin_role r3","r3.role_id = think_service_list.support_role_id",'left')
                ->join("think_admin_role r4","r4.role_id = think_service_list.leader_role_id",'left')
                ->where("think_service_list.id = ".$id)->field("think_service_list.*,r1.role_name examine_name,r2.role_name tech_name,r3.role_name support_name,r4.role_name leader_name")->find();
        
        /*信息员审批*/
        $view_data = array();
        /*信息员审批*/
        if($view_temp['examine_user_id']){
            $view_data[0]["view_status"]  = $view_temp['status'];
            $view_data[0]["role_id"]      = $view_temp['examine_role_id'];
            $view_data[0]["role_name"]    = $view_temp['examine_name'];
            $view_data[0]["user_id"]      = $view_temp['examine_user_id'];
            $view_data[0]["view_content"] = $view_temp['examine_content'];
            $view_data[0]["add_time"]     = $view_temp['examine_time'];
            $view_data[0]["type"]         = 'info';
        }

        /*技术部审批*/
        if($view_temp['tech_user_id']){
            $view_data[1]["view_status"]  = $view_temp['tech_status'];
            $view_data[1]["user_id"]      = $view_temp['tech_user_id'];
            $view_data[1]["role_name"]    = $view_temp['tech_name'];
            $view_data[1]["role_id"]      = $view_temp['tech_role_id'];
            $view_data[1]["view_content"] = $view_temp['tech_content'];
            $view_data[1]["add_time"]     = $view_temp['tech_time'];
            $view_data[1]["type"]         = 'tech';
        }
        
        if($view_temp['support_user_id']){
            /*售后服务部门审批*/
            $view_data[2]["view_status"]  = $view_temp['support_status'];
            $view_data[2]["user_id"]      = $view_temp['support_user_id'];
            $view_data[2]["role_name"]    = $view_temp['support_name'];
            $view_data[2]["role_id"]      = $view_temp['support_role_id'];
            $view_data[2]["view_content"] = $view_temp['support_content'];
            $view_data[2]["add_time"]     = $view_temp['support_time'];
            $view_data[2]["type"]         = 'support';
        }

        if($view_temp['leader_user_id']){
            /*分管领导*/
            $view_data[3]["view_status"]  = $view_temp['leader_status'];
            $view_data[3]["role_id"]      = $view_temp['leader_role_id'];
            $view_data[3]["role_name"]    = $view_temp['leader_name'];
            $view_data[3]["user_id"]      = $view_temp['leader_user_id'];
            $view_data[3]["view_content"] = $view_temp['leader_content'];
            $view_data[3]["add_time"]     = $view_temp['leader_time'];
            $view_data[3]["type"]         = 'leader';
        }


        $this->assign('view_data', $view_data);

        /*工作站名称*/
        $this->assign('role_name',Session::get('role_name') );
        $this->assign('work_envir', $this->work_envir);
        $this->assign('machine_model', $this->machine_model);

        $headArr = self::_getTKD('修改服务信息');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }

    


    public function ajax_service_user_edit(){

        $where['id'] = $this->request->param("id");

        $arr = DB::name("service_list")->where($where)->find();

        $data['user_id']    = Session::get('user_id');
        $data['order_num']  = $this->request->param("order_num");
        //$data['fault_code'] = $this->request->param("fault_code");
        $data['title']      = $this->request->param("title");

        $data['work_province'] = $this->request->param("work_province");
        $data['work_city']     = $this->request->param("work_city");
        $data['work_envir']    = $this->request->param("work_envir");
        
        $data['user_name']      = $this->request->param("user_name");
        $data['user_mobile']    = $this->request->param("user_mobile");
        $data['user_address']   = $this->request->param("user_address");

        $data['driver_name']    = $this->request->param("driver_name");
        $data['driver_mobile']   = $this->request->param("driver_mobile");

        $data['machine_model']  = $this->request->param("machine_model");
        $data['machine_number'] = $this->request->param("machine_number");

        $data['come_date'] = $this->request->param("come_date");
        $data['fault_date'] = $this->request->param("fault_date");
        $data['work_hour'] = $this->request->param("work_hour");

        $data['system_main'] = $this->request->param("system_main");
        $data['system_part'] = $this->request->param("system_part");

        $data['user_fault_content'] = $this->request->param("user_fault_content");
        $data['analysis_reason']    = $this->request->param("analysis_reason");
        $data['handel_way']         = $this->request->param("handel_way");

        //$data['fault_item_name'] = $this->request->param("fault_item_name");
        //$data['item_type']       = $this->request->param("item_type");

        
        //if($arr["status"] == 3){
            $data['status'] = 1;/*信息员审批*/
        //}else if($arr["leader_status"] == 3){
            $data['leader_status'] = 1;/*分管领导审批*/
        //}else if($arr["support_status"] == 3){
            $data['support_status'] = 1;/*售后服务部审批*/
        //}else if($arr["tech_status"] == 3){
            $data['tech_status'] = 1;/*技术部审批*/
        //}
        $data['add_time']    = time();
        $data['update_time'] = time();

        $res = DB::name("service_list")->where($where)->update($data);
        $service_id = $where["id"];
        
       
        /*配件*/
        $part_id = $this->request->param("part_id/a");
        $part_name   = $this->request->param("part_name/a");
        $part_type   = $this->request->param("part_type/a");
        $part_newtu  = $this->request->param("part_newtu/a");
        $part_oldtu  = $this->request->param("part_oldtu/a");
        $part_newnum = $this->request->param("part_newnum/a");
        $part_oldnum = $this->request->param("part_oldnum/a");
        $part_number = $this->request->param("part_number/a");
        
        $part_data = array();
        if($part_name){
            foreach ($part_name as $k => $v) {

                $part_data["service_id"] = $service_id; 
                $part_data["part_name"] = $part_name[$k];
                $part_data["part_type"] = $part_type[$k];
                $part_data["part_newtu"] = $part_newtu[$k];
                $part_data["part_oldtu"] = $part_oldtu[$k];
                $part_data["part_newnum"] = $part_newnum[$k];
                $part_data["part_oldnum"] = $part_oldnum[$k];
                $part_data["part_number"] = $part_number[$k];
                
                if( ($k+1) <= count($part_id)){
                    $part_where["id"] = $part_id[$k];

                    if($part_where["id"]){
                        DB::name("service_parts")->where($part_where)->update($part_data);
                    }
                }else{
                    DB::name("service_parts")->insert($part_data);
                }
                
                
            }
        }


        

        /*图片表*/
        $img_id = $this->request->param("img_id/a");
        $img = $this->request->param("img/a");
        $img_data = array();
        foreach ($img as $k => $v) {
            
            $temp = explode("#", $v);
            $img_where["id"] = $img_id[$k];
            $img_data["service_id"] = $service_id;
            $img_data["type_id"] = $temp[0];
            $img_data["src"] = $temp[1];
                
        
            if($img_where["id"]){
                DB::name("service_img")->where($img_where)->update($img_data);
            }else{
                DB::name("service_img")->insert($img_data);
            }
            //echo DB::name("service_img")->getLastSql();
        }



        if($res){
            return ['status'=>1];
        }else{
            return ['status'=>0,'msg'=>'网络错误，请重试'];
        }


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


    //删除服务
    public function service_del(){
        $id = $this->request->param("id");
        if($id){
            $where['id']=$id;
            $res = DB::name("service_list")->where($where)->delete();
            
            if($res){
                return ["status" =>1,"msg"=>"删除成功"];
            }else{
                return ["status" =>0,"msg"=>"删除失败,请重试"];
            }
        }else {
            return ["status" =>0,"msg"=>"网络错误"];
        }
    }
    

}
