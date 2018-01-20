<?php
header("Content-type: text/html; charset=utf-8");

require_once('medoo.php');
set_time_limit (0);

$database = new medoo(MYSQL_DATABASE);

$log = 'last.log';
$lastId = file_get_contents($log);


$sql = "select id,tags from 90sheji_yc_cover where tags !='' LIMIT ".$lastId.",10000";
$datas =  $database->query($sql)->fetchAll();

//strstr(string,search)
$str  = array(
	'iOS 7' =>'iOS',
	'iOS 8' =>'iOS',
	'电商app' =>'移动电商',
	'搜索' =>'搜索页',
	'信息页' =>'详情页',
	'导航' =>'导航菜单',
	'列表' =>'列表页',
	'启动闪屏' =>'启动页',
	'整套app' =>'app设计',
	'Andriod' =>'app设计',
	'网页登陆注册' =>'登录注册',
	'个人主页' =>'个人中心',
	'创意404' =>'404页面',
	'企业网站' =>'企业',
	'电商网站' =>'电商',
	'扁平' =>'扁平图标',
	'拟物' =>'拟物图标',
	'矢量图标' =>'线型图标',
	'动效设计' =>'GIF交互&动效',
	'引导' =>'引导动效',
	'下拉' =>'下拉刷新',
	'主题/皮肤' =>'手机主题',
	'H5移动界面' =>'H5海报',
	'包装设计' =>'包装',
	'画册' =>'宣传册');


echo "<pre>";

foreach ($datas as $k => $v) {

	foreach ($str as $key => $value) {
		$v['tags'] = str_replace($key, $value, $v['tags']);
	}

	echo $v['tags'];
	echo "<br>";
	$database->update('90sheji_yc_cover', array("tags"=>$v['tags']),array('id' => $v['id']));
	file_put_contents($log,$v['id']);
}
echo $lastId = file_get_contents($log);
exit();

foreach ($path_arr as $k => $v) {
	$v = str_replace("\n","",$v);
	$v = str_replace("\r","",$v);
	$where['psd_url'] = $v;

	$data = $database->select("90sheji_prototype","*",$where);//,array("LIMIT"=>array("30670",'10000')
	
	echo $database->last_query();
	
	print_r($data);

	if($data){
		echo '有'.'<br>';
	}else{
		echo '没有';
	}

}
exit();

function is($uuid){
	$url = dwz($uuid);
	$database = new medoo(MYSQL_DATABASE);
	$data = $database->select("90sheji_yc_cover","*",array("uuidd"=>$url));//array("LIMIT"=>array("4350",'4355'))
	if(!empty($data)){
		return is($uuid.rand(0,99));
	}else{
		return $url;	
	}
}

	function dwz($url){ 

		$code = sprintf('%u', crc32($url)); 

		$surl = ''; 

		while($code){ 
		$mod = $code % 62; 
		if($mod>9 && $mod<=35){ 
		$mod = chr($mod + 55); 
		}elseif($mod>35){ 
		$mod = chr($mod + 61); 
		} 
		$surl .= $mod; 
		$code = floor($code/62); 
		} 
		return $surl; 
	} 

exit();

$chinamap = 'iconfont-filter.svg';
$im = new Imagick();
$svg = file_get_contents($chinamap);
$im->readImageBlob($svg);
$im->setImageFormat("png24");
$im->resizeImage(128, 128, imagick::FILTER_LANCZOS, 1); /*改变大小*/
$im->writeImage('chinamap.png');/*(or .jpg)*/
$im->clear();
$im->destroy();






exit();


// Create image handle
$im = imagecreatetruecolor(200, 200);

// Allocate colors
$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);

// Load the PostScript Font
$font = imagepsloadfont('font.svg');

// Write the font to the image
imagepstext($im, 'Sample text is simple', $font, 12, $black, $white, 50, 50);

// Output and free memory
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
?>