<?php
namespace app\admin\controller;
use think\Config;
use think\Db;

class Vote extends Base{
	public function _initialize() {
	    parent::_initialize();
	}

    public function user_add(){

        $headArr = self::_getTKD('添加用户');
        $this->assign(compact("headArr"));

        return $this->fetch();
    }

    public function ajax_user_add(){
        $data["name"]      = $this->request->param("name",'');
        $data["mobile"]    = $this->request->param("mobile");
        $data["card"]      = $this->request->param("card");
        $data["number"]    = $this->request->param("number",1);
        $data["buy_time"]  = $this->request->param("buy_time",1);
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

        /*$where["mobile"] = $data["mobile"];
        //$where["add_time"] = $data["mobile"];
        $res=DB::name("user")->where($where)->find();
        if($res){
            return ["status" =>10003,"msg"=>"此手机号码已经登记过"];
        }*/


        /*验证购票数量*/
        if($data["number"]==''){
            return ["status" =>10003,"msg"=>"请填写购票数量！"];
        }

        /*游玩时间*/
        if($data["buy_time"]==''){
            return ["status" =>10003,"msg"=>"请填写出票时间！"];
        }

        /*验证身份证号*/
        /*if($data["card"]==''){
            return ["status" =>10003,"msg"=>"请填写身份证号！"];
        }*/
        /*if(!$this->is_idcard($data["card"])){
            return ["status" =>10003,"msg"=>"请填写正确的身份证号！"];
        }*/

        /*$where_card["card"] = $data["card"];
        $res=DB::name("user")->where($where_card)->find();
        if($res){
            return ["status" =>10003,"msg"=>"此身份证号已经登记过"];
        }*/

        /*验证购票数量*/
        /*if(!is_numeric($data["number"])){
            return ["status" =>10004,"msg"=>"请输入购票数量！"];
        }
        if($data["number"] > 2 ){
            return ["status" =>10004,"msg"=>"最大不能超过2"];
        }*/

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

    public function vote_list(){

    	$keyword = $this->request->param("keyword");
		$where = '';
		if($keyword){
			$where['zifi_vote_user.name'] = array('like',"%".$keyword."%");
		}
			
		$list_data = Db::name("vote_user")->order("votes desc")->select();


    	$headArr = self::_getTKD('投票信息');
        $this->assign(compact("headArr","list_data","keyword"));

        return $this->fetch();
    }

    public function user_list(){

    	$keyword = $this->request->param("keyword");
        $card = $this->request->param("card");
        $mobile = $this->request->param("mobile");
		$where = '';
		
        if($keyword){
			$where[config('database.prefix').'user.name'] = array('like',"%".$keyword."%");
		}

        if($card){
            $where[config('database.prefix').'user.card'] = array('like',"%".$card."%");
        }

        if($mobile){
            $where[config('database.prefix').'user.mobile'] = array('like',"%".$mobile."%");
        }
		
    	$list_data = Db::name("user")->where($where)->order("add_time desc")->paginate(50);


		$ip = Db::name("user")->count();
		//$pv = $this->CFG["pv"];

    	$headArr = self::_getTKD('投票用户');
        $this->assign(compact("headArr","list_data","keyword","ip","pv"));
        
        return $this->fetch();
    }

    public function user_del(){
        $id = $this->request->param("id");
        if($id){
            $where['id']=$id;
            $res = DB::name("user")->where($where)->delete();
            
            if($res){
                return ["status" =>1,"msg"=>"删除成功"];
            }else{
                return ["status" =>0,"msg"=>"删除失败,请重试"];
            }
        }else {
            return ["status" =>0,"msg"=>"网络错误"];
        }
    }


    public function user_set(){
        $id = $this->request->param("id");
        if($id){
            $where['id']=$id;
            $data["buy"] = 2;
            $res = DB::name("user")->where($where)->update($data);
            
            if($res){
                return ["status" =>1,"msg"=>"修改成功"];
            }else{
                return ["status" =>0,"msg"=>"修改失败,请重试"];
            }
        }else {
            return ["status" =>0,"msg"=>"网络错误"];
        }
    }




    public function user_detial(){

        $id = $this->request->param("id");
        $where["zifi_user.id"] = $id;
        
        $data = Db::name("user")->where($where)->find();

        $headArr = self::_getTKD('用户详情');
        $this->assign(compact("headArr","data"));

        return $this->fetch();
    }


    public function user_send(){ 
        $id = $this->request->param("id");
        $where['id']=$id;
        $data["status"] = 2;
        $find = DB::name("user")->where($where)->find();

        

        $url='http://smsapi.c123.cn/OpenPlatform/OpenApi';
        $ac='1001@501324300002';                                                             
        $authkey = '9090F2F5FF65750A3C902B50392CCD67';
        $cgid='185'; //通道组编号

        $mobile = $find["mobile"];

        $c = '尊敬的游客欢迎预定台儿庄古城门票,取票位置：台儿庄古城新游客服务中心西侧（康宁路南首）台儿庄古城国际旅行社，取票时间早8点30至晚18点。电话0539-8057778';        //内容
        $m = $mobile;  //号码
        $csid='8476';   //签名编号 ,可以为空时，使用系统默认的编号
        
        $m = $mobile;
        $res = $this->sendSMS($url,$ac,$authkey,$cgid,$m,$c,$csid);
        
        $res = $this->object_array($res);

        if($res[0] == 1){
            $res = DB::name("user")->where($where)->update($data);
            return ["status" =>1,"msg"=>"发送成功"];
        }else{
            return ["status" =>0,"msg"=>"发送失败"];
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


            $where = '';

            if($start_date && $end_date){
                $where .= ' ('.config('database.prefix').'user.add_time between '.strtotime($start_date).' and '.(strtotime($end_date)+86400).')  and ';
            }
            $where .=' 1 ';
            


            $list_data = DB::name('user')->where($where)->select();

            $data = array();
            $cell = array();
            

            foreach ($list_data as $key => $v) {
                $data[$key]["id"]     = $v["id"];                   
                $data[$key]["name"]       = $v["name"];              
                $data[$key]["mobile"]     = $v["mobile"];             
                $data[$key]["card"]       = $v["card"];   
                $data[$key]["number"]     = $v["number"];             
                $data[$key]["work_unit"]  = $v["work_unit"];         
                if($v['status'] == 2){
                    $data[$key]["status"] = '已购票'; 
                }else{
                    $data[$key]["status"] = '未购票'; 
                }
                $data[$key]["add_time"] =date("Y-m-d H:i:s",$v["add_time"]); 
            }  
            

            $excel = new \PHPExcel();

            $letter = array('A','B','C','D','E','F','G','H','I');
            //,'L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AB'
            
            $tableheader = ['编号','姓名','手机号','身份证号','购票数量','工作单位','状态','提交时间'];

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
        }else{
            $headArr = self::_getTKD('导出');
            $this->assign(compact("headArr"));
            return $this->fetch();
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



    

	//删除参选人
	public function vote_del(){
		$id = $this->request->param("id");
		if($id){
			$where['id']=$id;
			$res = DB::name("vote_user")->where($where)->delete();
			
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
