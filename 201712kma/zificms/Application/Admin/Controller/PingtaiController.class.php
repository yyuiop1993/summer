<?php

namespace Admin\Controller;
use Common\Controller\AdminBase;
class PingtaiController extends AdminBase {
    
   public function glist(){
      
   	  //$type = I('get.type', 0, 'intval');
   	  $where = array();
   	  //$where['type'] = $type;
   	  $res= M('contact')->where($where)->select();
   	  $count = count($res);
   	  $page = $this->page($count, 20);
      $this->assign("list", $res);
      $this->assign("Page", $page->show());
	     $this->display();
   	 
   }

   public function huifu(){

   	$id = I('get.id', 0, 'intval');
   	//dump($id );die;
   	$where['id'] = $id;
   	$res= M('gbook')->find($id);
   	$this->assign('res',$res);
   	$this->display();
   }
   

   public function posthf(){
   	if(IS_POST){
   		$data = I('post.');		
   		if($data['cl_time'] == ''){
   			$data['cl_time'] = time();
   		}
         if($data['hf_cont'] == ''){
           $this->error('请填写回复内容',U('Pingtai/huifu',array('id'=>$data['id'])));
         }else{
            $data['status'] = 1; 
         }

   		$res= M('gbook')->data($data)->where('id = ' . $data['id'])->save();
         
   		if($res){
   			$this->success('回复成功',U('Pingtai/glist',array('type'=>$data['type'])));
   		}else{
   			$this->error('回复失败',U('Pingtai/huifu',array('id'=>$data['id'])));
   		}
   	}
   }

   public  function del(){

   		$id = I('get.id', 0, 'intval');
   		if(M('contact')->delete($id)){
   			$this->success('删除成功');
   		}else{
   			$this->error('删除成功');
   		}
   }


   public function manyidu(){
      $where = array();
      $res= M('form_manyidu')->where($where)->select();
      $count = count($res);
      $page = $this->page($count, 20);
      $this->assign("list", $res);
      $this->assign("Page", $page->show());
      $this->display();
   }

   
   /*我要献血列表*/
   public function xianxue_list(){
      $where = array();
      $search = I('get.search');
      if ($search) {
         //添加开始时间
         $start_time = I('get.start_time');
         if (!empty($start_time)) {
             $start_time = strtotime($start_time);
             $where["add_time"] = array("EGT", $start_time);
         }
         //添加结束时间
         $end_time = I('get.end_time');
         if (!empty($end_time)) {
             $end_time = strtotime($end_time);
             $where["add_time"] = array("ELT", $end_time);
         }
         if ($end_time > 0 && $start_time > 0) {
             $where['datetime'] = array(array('EGT', $start_time), array('ELT', $end_time));
         }

         //搜索字段
         $type = I('get.type');
         $keyword = \Input::getVar(I('get.keyword'));
         $this->assign("keyword", $keyword);
         if ($type) {
            $this->assign("searchtype", $type);
            if ($type == 1) {
               $where["name"]     = array("LIKE", "%{$keyword}%");
            }
            if ($type == 2) {
               $where["mobile"]   = array("LIKE", "%{$keyword}%");
            }
            if ($type == 3) {
               $where["card_num"] = array("LIKE", "%{$keyword}%");
            }
         }

      }

      $res= M('xianxue')->where($where)->select();
      $count = count($res);
      $page = $this->page($count, 20);
      $this->assign("list", $res);
      $this->assign("Page", $page->show());
      $this->display();
   }

    public function xianxue_detail(){
      $id = I('get.id', 0, 'intval');
      $where['id'] = $id;
      $res= M('xianxue')->find($id);
      $this->assign('res',$res);
      $this->display();
   }

   public function xianxue_del(){
      $id = I('get.id', 0, 'intval');
      if(M('xianxue')->delete($id)){
         $this->success('删除成功');
      }else{
         $this->error('删除成功');
      }
   }

   /*志愿者列表*/
   public function zyz_list(){
      $where = array();
      $search = I('get.search');
      if ($search) {
         //添加开始时间
         $start_time = I('get.start_time');
         if (!empty($start_time)) {
             $start_time = strtotime($start_time);
             $where["add_time"] = array("EGT", $start_time);
         }
         //添加结束时间
         $end_time = I('get.end_time');
         if (!empty($end_time)) {
             $end_time = strtotime($end_time);
             $where["add_time"] = array("ELT", $end_time);
         }
         if ($end_time > 0 && $start_time > 0) {
             $where['datetime'] = array(array('EGT', $start_time), array('ELT', $end_time));
         }

         //搜索字段
         $type = I('get.type');
         $keyword = \Input::getVar(I('get.keyword'));
         $this->assign("keyword", $keyword);
         if ($type) {
            $this->assign("searchtype", $type);
            if ($type == 1) {
               $where["name"]     = array("LIKE", "%{$keyword}%");
            }
            if ($type == 2) {
               $where["mobile"]   = array("LIKE", "%{$keyword}%");
            }
            if ($type == 3) {
               $where["card_num"] = array("LIKE", "%{$keyword}%");
            }
         }

      }

      $res= M('zyz')->where($where)->select();
      $count = count($res);
      $page = $this->page($count, 20);
      $this->assign("list", $res);
      $this->assign("Page", $page->show());
      $this->display();
   }


   public function zyz_detail(){
      $id = I('get.id', 0, 'intval');
      $where['id'] = $id;
      $res= M('zyz')->find($id);
      $this->assign('res',$res);
      $this->display();
   }

   public function zyz_del(){
      $id = I('get.id', 0, 'intval');
      if(M('zyz')->delete($id)){
         $this->success('删除成功');
      }else{
         $this->error('删除成功');
      }
   }




   public function export() {

      header("Content-type: text/plain; charset=UTF-8");
      require '/zificms/extend/phpexcel/PHPExcel.php';

      $start_time = I('get.start_time');
      $end_time = I('get.end_time');
     
      $where = '';
      if($start_date && $end_date){
         $where .= ' (add_time between '.strtotime($start_time).' and '.(strtotime($end_time)+86400).')  and ';
      }
      $where .=' 1 ';
     
      $letter = array('A','B','C','D','E','F','G',"H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
      $list_data = M("xianxue")->where($where)->order("id asc")->select();

      
      foreach ($list_data as $key => $v) {
         unset($list_data[$key]["tfuyao"]);
         unset($list_data[$key]["tganmao"]);
         unset($list_data[$key]["tbaya"]);
         unset($list_data[$key]["status"]);
         $list_data[$key]["add_time"] = date("Y-m-d H:i:s",$v["add_time"]);  //录入日期
      }
        
      $tableheader = ['编号','身份证','姓名','性别','出生年月','民族','献血次数','文化程度','职业','工作单位','手机号','地址','邮箱','qq','献血量','添加时间'];

      $excel = new \PHPExcel();
      
      for($i = 0;$i < count($tableheader);$i++) {
         $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
      }
     
      for ($i = 2;$i <= count($list_data) + 1;$i++) {
         $j = 0;
         foreach ($list_data[$i - 2] as $key=>$value) {
             $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
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


 }

 /*public function export() {
       

      header("Content-type: text/plain; charset=UTF-8");
      require '/zificms/extend/phpexcel/PHPExcel.php';

      
      $start_time = I('get.start_time');
      $end_time = I('get.end_time');
     

      $where = '';
      if($start_date && $end_date){
         $where .= ' (add_time between '.strtotime($start_time).' and '.(strtotime($end_time)+86400).')  and ';
      }
      $where .=' 1 ';


      $data = array();
      $cell = array();
     
      $model_data = M('model')->where(" modelid = ".$formid)->find();
      $model_field = M('model_field')->where(" modelid = ".$formid)->order("fieldid asc")->select();

      $letter = array('A','B','C','D','E','F','G',"H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
      $list_data = M("xianxue")->where($where)->order("id asc")->select();


     
     foreach ($list_data as $key => $v) {
         unset($list_data[$key]["userid"]);
         unset($list_data[$key]["username"]);
         unset($list_data[$key]["ip"]);
         $list_data[$key]["datetime"] = date("Y-m-d H:i:s",$v["datetime"]);  //录入日期
     }


    

     $tableheader   = array();
     $tableheader[] = "编号";
     $tableheader[] = "录入时间";
     foreach ($model_field as $key => $v) {
         $tableheader[]=$v["name"];
     }
    


     if($formid == 4){

         
         foreach ($list_data as $key => $v) {
             $data[$key]["id"]              = $v["dataid"];                  //编号
             $data[$key]["jiaoxuedidian"]   = $v["jiaoxuedidian"];           //教学地点
             $data[$key]["jiaoxueaddress"]  = $v["jiaoxueaddress"];          //教学点地址
             $data[$key]["kecheng"]         = $v["kecheng"];                 //课程
             $data[$key]["yy_name"]         = $v["yy_name"];                 //预约人姓名
             $data[$key]["yuyuemobile"]     = $v["yuyuemobile"];             //预约人手机
             $data[$key]["add_time"]        = date("Y-m-d",$v["datetime"]);  //录入日期
         } 

         
         $tableheader = ['编号','教学地点','教学点地址','课程','预约人姓名','预约人手机',"录入时间"];



     }else if($formid == 6){

         
         foreach ($list_data as $key => $v) {
             $data[$key]["id"]            = $v["dataid"];        //编号
             $data[$key]["name"]          = $v["name"];          //真实姓名  
             $data[$key]["card"]          = $v["card"];          //身份证号
             $data[$key]["sex"]           = $v["sex"];           //性别
             $data[$key]["shengri"]       = $v["shengri"];       //出生年月
             $data[$key]["minzu"]         = $v["minzu"];         //民族
             $data[$key]["techang"]       = $v["techang"];       //特长
             $data[$key]["sraddress"]     = $v["sraddress"];     //出生地
             $data[$key]["wenhua"]        = $v["wenhua"];        //文化程度
             $data[$key]["zhengzhi"]      = $v["zhengzhi"];      //政治面貌
             $data[$key]["quyu"]          = $v["quyu"];          //区域
             $data[$key]["zhiwu"]         = $v["zhiwu"];         //现任职务
             $data[$key]["tongxundizhi"]  = $v["tongxundizhi"];  //通讯地址
             $data[$key]["code"]          = $v["code"];          //邮政编码
             $data[$key]["mobile"]        = $v["mobile"];        //手机号
             $data[$key]["email"]         = $v["email"];         //电子邮箱    
             $data[$key]["zhanghuname"]   = $v["zhanghuname"];   //账户名
             $data[$key]["zhanghao"]      = $v["zhanghao"];      //账号
             $data[$key]["kaihuhang"]     = $v["kaihuhang"];     //开户行
             $data[$key]["jingli"]        = $v["jingli"];        //活动经历

             $data[$key]["add_time"]  = date("Y-m-d",$v["datetime"]); //录入日期
         } 
         
         $tableheader = ['编号','真实姓名','身份证号','性别','出生年月','民族','特长','出生地','文化程度','政治面貌','区域','现任职务','通讯地址','邮政编码','手机号','电子邮箱','账户名','账号','开户行','活动经历',"录入时间"];


     }else if($formid == 7){



         foreach ($list_data as $key => $v) {
             $data[$key]["id"]        = $v["dataid"];                  //编号
             $data[$key]["taddress"]  = $v["taddress"];                //预约科目
             $data[$key]["teacher"]   = $v["teacher"];                 //教师
             $data[$key]["ydate"]     = $v["ydate"];                   //预约日期
             $data[$key]["ytime"]     = $v["ytime"];                   //预约时间
             $data[$key]["yname"]     = $v["yname"];                   //姓名
             $data[$key]["mobile"]    = $v["mobile"];                  //手机号码
             $data[$key]["cname"]     = $v["cname"];                   //单位名称
             $data[$key]["add_time"]  = date("Y-m-d",$v["datetime"]);  //录入日期
         } 

         $tableheader = ['编号','预约科目','教师','预约日期','预约时间','姓名','手机号码','单位名称',"录入时间"];

         
     }else if($formid == 8){


         foreach ($list_data as $key => $v) {
             $data[$key]["id"]        = $v["dataid"];                  //编号
             $data[$key]["tujing"]    = $v["tujing"];                  //途径
             $data[$key]["anpai"]     = $v["anpai"];                   //是否满意
             $data[$key]["chengdu"]   = $v["chengdu"];                 //丰富程度
             $data[$key]["xiangfu"]   = $v["xiangfu"];                 //相符程度
             $data[$key]["jianyi"]    = $v["jianyi"];                  //其他建议
             $data[$key]["add_time"]  = date("Y-m-d",$v["datetime"]);  //录入日期
         } 

         $tableheader = ['编号','途径','是否满意','丰富程度','相符程度','其他建议',"录入时间"];

         
     }else if($formid == 10){

         $list_data = M('form_team')->where($where)->select();
         
         foreach ($list_data as $key => $v) {
             $data[$key]["id"]              = $v["dataid"];                  //编号
             $data[$key]["jiaoxuedidian"]   = $v["jiaoxuedidian"];           //教学地点
             $data[$key]["jiaoxueaddress"]  = $v["jiaoxueaddress"];          //教学点地址
             $data[$key]["kecheng"]         = $v["kecheng"];                 //课程
             $data[$key]["yy_name"]         = $v["yy_name"];                 //预约人姓名
             $data[$key]["yuyuemobile"]     = $v["yuyuemobile"];             //预约人手机
             $data[$key]["yy_renshu"]       = $v["yy_renshu"];               //预约人数
             $data[$key]["yy_danwei"]       = $v["yy_danwei"];               //预约单位
             $data[$key]["add_time"]        = date("Y-m-d",$v["datetime"]);  //录入日期
         } 

         $tableheader = ['编号','教学地点','教学点地址','课程','预约人姓名','预约人手机',"预约人数","预约单位","录入时间"];

     }else{
         exit();
     }

     

     $excel = new \PHPExcel();
     
     for($i = 0;$i < count($tableheader);$i++) {
         
         $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
     }
     

     for ($i = 2;$i <= count($list_data) + 1;$i++) {
         $j = 0;
         foreach ($list_data[$i - 2] as $key=>$value) {

             $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");

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


 }*/
}
