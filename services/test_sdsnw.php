
<?php
header("Content-type: text/plain; charset=UTF-8");
require_once 'medoo.php';


$sdsnw = new medoo("sdsnw");
$sdsnw2017 = new medoo("2017sdsnw_cn");
//$sql="select * from jy_content_news where tiaozhuanlianjie like '%http//%'";
$sql="select * from ecs_article where cat_id > 10";
$datas = $sdsnw->query($sql)->fetchAll();  

/*foreach ($datas as $key => $v) {
	$str = str_replace("http//", "http://", $v["tiaozhuanlianjie"]);
	echo "update jy_content_news set tiaozhuanlianjie = '".$str."' where id = ".$v["id"]." ;";
}*/


foreach ($datas as $key => $v) {


	$insert["title"] = $v["title"];
	
	
	if($v["cat_id"] == 11){//农资新闻

		$insert["class_id"] = 29;

	}elseif($v["cat_id"] == 12){//公告

		$insert["class_id"] = 33;

	} elseif($v["cat_id"] == 13){//金融资讯

		$insert["class_id"] = 31;

	} elseif($v["cat_id"] == 15){//公司新闻

		$insert["class_id"] = 27;

	} elseif($v["cat_id"] == 18){//行业新闻

		$insert["class_id"] = 28;

	}

	$v["content"] = str_replace("http://www.sdsnw.cn/includes/ueditor/php/../../../images/image", "/public/article_images/image", $v["content"]);
	$v["content"] = str_replace("http://www.sdsnw.cn/includes/ueditor/php/../../../images/image", "/public/article_images/image", $v["content"]);
	$v["content"] = str_replace("http://www.sdsnw.cn/includes/ueditor/php/../../../bdimages", "/public/article_images/bdimages", $v["content"]);

	$insert["content"] = $v["content"];

	$insert["keyword"] = $v["keywords"];
	$insert["publisher_name"] = 293;
	$insert["uid"] = 293;
	$insert["sort"] = 0;
	$insert["comment_flag"] = 0;
	$insert["status"] = 2;

	$insert["public_time"] = date("Y-m-d H:i:s",$v["add_time"]);
	$insert["create_time"] = date("Y-m-d H:i:s",$v["add_time"]);

	echo "<pre>";
	//print_r($insert);
	echo "</pre>";
	//exit();

	//echo $res = $sdsnw2017->insert("nc_cms_article",$insert);
	//echo "\r"; 
}



exit();


$arr = explode("\r", $str);



$temp = array();
$i = 1;
foreach ($arr as $key => $v) {
	
	$temp_arr = explode("&&&", $v);
	$temp_arr[0] = str_replace("\r", "",$temp_arr[0]);
	$temp_arr[0] = str_replace("\n", "",$temp_arr[0]);
	$temp_arr[0] = str_replace("\r\n", "",$temp_arr[0]);
	
	$sql="select * from jy_content where title like '%".$temp_arr[0]."' ";
	//echo $sql;
	$find = $new->query($sql)->fetchAll();  
	//echo $find[0]["id"];
	if($find){
		echo $sql = " update jy_content_news set tiaozhuanlianjie = '".$temp_arr[1]."' where id = ".$find[0]["id"]." ; ";
	}


	//tiaozhuanlianjie
}
exit();

echo count($temp);




foreach ($datas as $key => $v) {
	$content["catid"] = $insert["catid"] = 35;
	$insert["modelid"] = 1;
	$insert["title"] = $v["subject"];
	
	$insert["thumb"] = '';
	$insert["keywords"] = '';
	$insert["description"] = '';
	$insert["keywords"] = '';
	$insert["listorder"] = '';
	$insert["status"] = 1;
	$insert["hits"] = 1;
	$insert["username"] = "admin";
	$insert["time"] = strtotime($v["post_time"]);
	echo $res = $new->insert("jy_content",$insert);
	echo "\r"; 
	
	$content["id"] = $res;
	$content["content"] = $v["content"];
	echo $new->insert("jy_content_news",$content);
	echo "\r"; 
	
}


exit();


$database = new medoo(MYSQL_DATABASE);
$sql='select * from News where BigClassName = "通知公告"';
$datas = $database->query($sql)->fetchAll();  


?>