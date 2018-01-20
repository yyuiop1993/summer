<?php
header("Content-type:text/html;charset=utf-8");
require_once('medoo.php');
set_time_limit (0);

$database = new medoo(MYSQL_DATABASE);
$datas = $database->select("90sheji_learnty","*",array("LIMIT"=>array("500",'500')));//

$urls = array();
foreach ($datas as $k => $v) {
	 $url = 'http://97ui.com/ux/'.$v['id'].'.html';
	 $urls[] = $url;
}

$api = 'http://data.zz.baidu.com/urls?site=97ui.com&token=pAyRHb7UtKkhiPec';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
print_r($result) ;

?>