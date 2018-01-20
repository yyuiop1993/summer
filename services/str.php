<?php
header("Content-type: text/plain; charset=UTF-8");
require_once 'medoo.php';


$database = new medoo(MYSQL_DATABASE);
$sql='select * from sheet ';
$datas = $database->query($sql)->fetchAll();  

$sql='select * from zifi_card_city ';
$citys = $database->query($sql)->fetchAll();  

/*$city_list = array();
foreach ($citys as $k => $v) {
	$city_list[$v["id"]]["name"] = $v["name"];
	$city_list[$v["id"]]["card"] = $v["card"];
}*/

$list = array();
foreach ($datas as $k => $v) {
	$code = substr($v["code"] , 0 , 4);
	
	$insert["name"] = $v["area"];
	$insert["card"] = $v["code"];
	
	foreach ($citys as $k2 => $v2) {
		if($v2["card"] == $code){
			$insert["fid"] = $v2["id"];
		}
	}

	echo $res = $database->insert("zifi_card_area",$insert);
	echo "\r"; 

}



/*//城市
foreach ($list as $k => $v) {
	
	
}*/

exit();

		

/*
	$temp_str1 = 
	

	if(strlen($temp[0]) == 2){
		$data[$temp[0]] = $temp;

		$insert["id"]       = $temp[0];
		$insert["name"]       = $temp[1];
		$insert["card"]       = $temp[0];
		
		echo $res = $database->insert("zifi_card_province",$insert); 

	}*/
	/*if(strlen($temp[0]) > 2 && strlen($temp[0]) <5){
		$temp_str1 = substr($temp[0] , 0 , 2);

		$temp[1] = str_replace($data[$temp_str1][1], "", $temp[1]);

		$data[$temp_str1]["city"][$temp[0]] = $temp;
		

	}
	if(strlen($temp[0]) > 5){
		$temp_str1 = substr($temp[0] , 0 , 2);
		$temp_str2 = substr($temp[0] , 0 , 4);

		if($temp[1]!= $data[$temp_str1][1].$data[$temp_str1]["city"][$temp_str2][1].'市辖区'){
			$data[$temp_str1]["city"][$temp_str2]["area"][$temp[0]] = $temp;
		}
	}*/


?>