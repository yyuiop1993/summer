<?php
namespace Content\Controller;
use Common\Controller\Base;
use Content\Model\ContentModel;
use Api\Controller\Checkcode;
class GbookController extends Base {


	public function findstudent(){
		header('Content-type: application/json');
		if (IS_POST){
			
			$name = I('name');
			$card = I('card');
			//$code = I('code');

			/*$verify = new \Api\Controller\CheckcodeController();
			$res = $verify->validate('gbook',$code);
			if($res == false ){
				echo "-1";
				exit();
			}*/
				
			$where["uname"] = $name;
			$where["ucard"] = $card;
			$res =  M("content_student")->where($where)->find();

			if(!$res){
				print json_encode(array ('status' => "-2"));
    			exit();
			}else{
				print json_encode(array ('status' => 1,'uname'=>$res["uname"],'duanwei'=>$res["duanwei"]));
    			exit();
			}

		}else{
			print json_encode(array ('status' => "-3"));
			exit();
		}
	}
    
    public function student_jump(){
    	$id  = I('id');
		$res = M("content_student")->where("id = ".$id)->find();
		$this->success('查询成功,跳转中',U('Index/shows',array('id'=>$res['id'],'catid'=>$res["catid"])),2000);
    }



	public function postcontact (){
		if (IS_POST) {

			$name  = I('name');
			$phone = I('phone');
			$type  = I('type');
			$content = I('content');

			$code  = I('code');


			$verify = new \Api\Controller\CheckcodeController();
			$res = $verify->validate('gbook' ,$code);
			if(!$res){
				echo '-1';
				exit();
			}

			$ad = M("contact");
			
			$data['name']    = $name;		
			$data['phone']   = $phone;		
			$data['type']    = $type;		
			$data['content'] = $content;		
			$data['add_time'] = time();

			
		   	//$data['cxm']  = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		   	if($ad->data($data)->add()){
		   		//$this->success('提交成功!','/index.php?a=lists&catid=6' , 2000);		
		   		echo 1;
			}else{
				echo "-3";
				exit();
			}
			
		} else{
			echo "-3";
			exit();
		}
	}




















	public function postgbookm(){
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
			
			if( false == $res){
				echo "<script>alert('验证码错误');window.location.href='/index.php?g=Wap&a=lists&catid=9'</script>";
			}
			$ad = M("gbook");
			if (!$ad->validate($rules)->create()){
			    echo "<script>alert('".$ad->getError()."');window.location.href='/index.php?g=Wap&a=lists&catid=9'</script>";
			}else{
				$data['type'] = 1;		
				
				$data['is_show'] = 1;
				$data['status'] = 0;
				$data['add_time'] = time();
			   	$data['cxm']  = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
			   	if($ad->data($data)->add()){
			   		echo "<script>alert('提交成功 您的查询码是:".$data['cxm']."');window.location.href='/index.php?g=Wap&a=lists&catid=9'</script>";
                    exit();
				}
			}
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
			$data["xxdd"] = I('xxdd'); //献血地点
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
				switch ($data["xxdd"]) {
					case '市中心血站':
						$mob ='';
						break;
					
					case '广场献血屋':
						$mob = '1786539207';
						break;
					
					case '汽摩配城献血点':
						$mob = '1786539207';
						break;
					
					case '罗庄献血点':
						$mob = '1885496227';
						break;
					
					case '河东献血点':
						$mob = '1885496227';
						break;
					
					case '沂水献血屋':
						$mob = '1786539207';
						break;
					
					case '平邑献血点':
						$mob = '1885490536';
						break;
					
					case '郯城献血点':
						$mob = '1356293362';
						break;
					
					case '费县献血屋':
						$mob = '1786539207';
						break;
					
					case '兰陵献血点':
						$mob = '1358391962';
						break;
					
					case '莒南献血点':
						$mob = '1356290720';
						break;
					
					case '临沭献血点':
						$mob = '1885490536';
						break;
					
					case '沂南献血屋':
						$mob = '17865392071';
						break;
					
					case '蒙阴献血点':
						$mob = '18854962276';
						break;
					
					case '义堂献血点':
						$mob = '13562907205';
						break;
					
					case '半程献血点':
						$mob = '18854962276';
						break;
					default:
						$mob = '0';
						break;
				}
					
					$post_data = array();
					$post_data['userid'] = 1687; 
					$post_data['account'] = 'SDK-A1642-1687';
					$post_data['password'] = 'Zf654987';
					//$post_data['json'] = 1;
					//$post_data['content'] = '【临沂血站】'.$data["name"].'('.$data["mobile"].')'.'预约献血'.$data["xianxueliang"]; 
					$post_data['content'] = '【临沂市中心血站】您好：有一位爱心人士成功预约'.$data["xxdd"].'献血，请尽快电话联系确认！联系电话：'.$data["name"].'('.$data["mobile"].')';
					$post_data['mobile'] = $mob;
					$post_data['sendtime'] = ''; //不定时发送值为空，定时发送，输入格式YYYY-MM-DD HH：mm：ss的日期值
					$url='http://client.movek.net:8888/sms.aspx?action=send';
					$o='';
					foreach ($post_data as $k=>$v)
					{
					   $o.="$k=".urlencode($v).'&';
					}
					$post_data=substr($o,0,-1);
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_URL,$url);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果需要将结果直接返回到变量里，那加上这句。
					$resmsg = curl_exec($ch);
					//$resmsg =  json_decode(curl_exec($ch));
					$msg = array ('status' => 1, 'message' => '添加成功！');
					//$arr = array_merge($resms,$msg);
					print json_encode($msg);
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
	public function manyidu_add(){
		if (IS_POST){
			$catid = I('catid');
			
			$data["wentijieda"]     = I('wentijieda');  //
			$data["shipin"]         = I('shipin');
			$data["quanlizunzhong"] = I('quanlizunzhong');
			$data["zhiqingyuanze"]  = I('zhiqingyuanze');
			$data["fuwutaidu"]      = I('fuwutaidu');
			$data["yantanjuzhi"]    = I('yantanjuzhi');
			$data["jiaoliugoutong"] = I('jiaoliugoutong');
			$data["jiangjie"]       = I('jiangjie');     //民族
			$data["jinianpin"]      = I('jinianpin');	       //献血次数
			$data["add_time"]       = time();
			$data["ip"]             = get_client_ip();
			$res =  M("form_manyidu")->add($data);
			if($res){
				$this->success('提交成功,跳转中',"/index.php?a=lists&catid=21");
			}else{
				$this->error('网络错误，请重试',"/index.php?a=lists&catid=21");
			}
			// if($res && $res['status']  && $res['cont'] != '' ){
			// 	$this->success($res['name'].'<br/>您得到的回复是:'.$res['cont'],'/index.php?a=lists&catid='.$catid , 90000);	
			// }
		}
	}
	// 志愿者提交
	public function zyz(){
   		if(IS_POST){
   			$data = I('post.');
   			$data['add_time'] = time();
   			$data['status'] = 1;
   			$res =  M("zyz")->add($data);
   			if($res){
				$this->success('提交成功');
			}else{
				$this->error('提交失败');
			}

			// $rules = array(
			//      array('name','require','姓名必须填写！'),
			//      array('phone','require','联系电话必须填写！'),
			//      array('mail','require','邮箱必须填写！'),
			//      array('qq','require','QQ必须填写！'),
			//      array('cont','require','内容必须填写！'),
			//      array('title','require','标题必须填写！'),
			//      array('yzm','require','验证码必须填写！'),
			// );


   		}
	}
}
