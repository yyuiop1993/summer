<?php
namespace app\admin\controller;
use think\Config;
use think\Db;

class Vote extends Base{
	public function _initialize() {
	    parent::_initialize();
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


    
    public function user_set(){
        $id = $this->request->param("id");
        if($id){
            $where['id']=$id;
            $data["status"] = 2;
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
		
		$data = Db::name("user")->where($where)
		->join("zifi_vote_list list","list.uid = zifi_user.id")
		->order("add_time desc")->field("zifi_user.*,count(list.uid) as votes")->group("list.uid")->find();

		$list_data = Db::name("vote_list")->where("zifi_vote_list.uid = ".$id)
		->join("zifi_vote_user user","user.id = zifi_vote_list.vid")
		->order("zifi_vote_list.add_time desc")->field("zifi_vote_list.*,user.name,user.headimg")->select();


		$ip = Db::name("user")->count();
		$pv = $this->CFG["pv"];

    	$headArr = self::_getTKD('投票用户');
        $this->assign(compact("headArr","list_data","data","keyword","ip","pv"));

        return $this->fetch();
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
