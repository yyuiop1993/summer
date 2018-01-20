<?php

namespace Content\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;
use Api\Controller\Checkcode;
class GbookController extends Base {
	public function postgbook (){
		if (IS_POST) {
				$data = I('post.');

				$rules = array(
				     array('name','require','姓名必须填写！'),
				     array('phone','require','联系电话必须填写！'),
				     array('mail','require','邮箱必须填写！'),
				     array('qq','require','QQ必须填写！'),
				     array('cont','require','内容必须填写！'),
				     array('title','require','标题必须填写！'),
				     array('yzm','require','验证码必须填写！'),
				);

				$verify = new \Api\Controller\CheckcodeController();
				$res = $verify->validate('gbook' ,$data['yzm']);

				
				if( $data['yzm'] == $res){
					$this->error('验证码错误!');
				}


				if(!preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $data['phone']) ){  
				    $this->error('手机号错误');
				}


				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$data['mail'])) {
				  	 $this->error("无效的 email 格式！"); 
				}


				$ad = M("gbook");
				if (!$ad->validate($rules)->create()){
				     $this->error($ad->getError());
				}else{
					$data['type'] = 1;		
					
					$data['is_show'] = 1;
					$data['status'] = 0;
					$data['add_time'] = time();
				   	$data['cxm']  = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
				   	if($ad->data($data)->add()){
				   		$this->success('提交成功 您的查询码是:'.$data['cxm'],'/index.php?a=lists&catid='.$data['catid'] , 90000);		
				   	}
				   	
				}

		}
		  
	}

	public function findmsg(){
			if (IS_POST){

				$cxm = I('cxm');
				if($cxm == '' || !is_numeric($cxm)){
					$this->error('查询码有误！');	
				}
				
				$catid = I('catid');
				
				$res =  M("gbook")->field('status,cont,name,cxm')->where('cxm = ' .$cxm )->find();
				//var_dump($res);
				if(!$res ){
					$this->error('无效查询码！');
				}
				if($res['status']== 0 && $res['hf_cont'] == '' ){
					$this->error('正在处理 请耐心等待');
				}else{

					$this->success('查询成功,跳转中',U('Index/showgbook',array('id'=>$res['cxm'],'catid'=>$catid)),2000);

				}
				// if($res && $res['status']  && $res['cont'] != '' ){
				// 	$this->success($res['name'].'<br/>您得到的回复是:'.$res['cont'],'/index.php?a=lists&catid='.$catid , 90000);	
				// }
			}
		}
    


	public function ajax_add(){
		if (IS_POST){
			header('Content-type: application/json');
			
		
			$data["card_num"]     = I('card_num');  //
			$data["name"]         = I('name');
			$data["sex"]          = I('sex');
			$data["birth"]        = I('birth');
			$data["tfuyao"]       = I('tfuyao');
			$data["tganmao"]      = I('tganmao');
			$data["tbaya"]        = I('tbaya');
			$data["national"]     = I('national');     //民族
			$data["cishu"]        = I('cishu');	       //献血次数
			$data["wenhua"]       = I('wenhua');       //文化程度
			$data["zhiye"]        = I('zhiye');        //职业
			$data["danwei"]       = I('danwei');       //工作单位
			$data["mobile"]       = I('mobile');       //联系电话
			$data["address"]      = I('address');      //联系地址
			$data["mail"]         = I('mail');         //电子邮箱
			$data["qq"]           = I('qq');           //QQ
			$data["xianxueliang"] = I('xianxueliang'); //本次献血量
			$data["add_time"]     = time();

			$res =  M("xianxue")->where(" mobile = '".$data["mobile"]."' and add_time > ".(time()-86400))->find();
			if($res ){
				print json_encode(array ('status' => "-1", 'message' => '您已经提交过，请不要重复提交'));
    			exit();
			}

			$res =  M("xianxue")->where(" card_num = '".$data["card_num"]."' and add_time > ".(time()-86400))->find();
			if($res ){
				print json_encode(array ('status' => "-1", 'message' => '您已经提交过，请不要重复提交'));
    			exit();
			}

			$res =  M("xianxue")->add($data);

			if($res){
				print json_encode(array ('status' => 1, 'message' => '添加成功！'));
    			exit();
			}else{
				print json_encode(array ('status' => 0, 'message' => '网络错误，请刷新重试'));
    			exit();
			}

		}else{
			print json_encode(array ('status' => 0, 'message' => '网络错误，请刷新重试'));
    		exit();
		}
	}

   
	
}
