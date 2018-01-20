<?php
header("Content-type: text/plain; charset=UTF-8");
require_once 'medoo.php';
$database = new medoo(MYSQL_DATABASE);

//$datas = $database->select("clinique_campaign201409", array ('id', 'name', 'mobile', 'email', 'address', 'created'));


$sql='select id,upc,brand,brand_detail,type,gender,model_code,material,rim,img1,name,isnew,created,isshow from products where isshow = 4 or isshow = 5 or isshow = 6  order by id asc';

$datas = $database->query($sql)->fetchAll();  


//add-wangjun-2014-0827
    
    $output = '';
    $header = '';
    $content = '';
    $i=1;
    $header = "id,name,upc,brand,brand_detail,type,gender,material,rim,\r\n";
    foreach($datas as $data) {
    	$content .=
        '' . $i++ . ',' 
        . $data['model_code'] . ',' 
        . $data['upc'] . ',' 
        . iconv('UTF-8', 'GBK', $data['brand']) . ',' 
        . iconv('UTF-8', 'GBK', $data['brand_detail']) . ','  
        . iconv('UTF-8', 'GBK', $data['type']) . ','  
        . iconv('UTF-8', 'GBK', $data['gender']) . ','  
        . iconv('UTF-8', 'GBK', $data['material']) . ','  
        . iconv('UTF-8', 'GBK', $data['rim'])  . "\r\n";
	}
    $output = $header . $content;
    header("Content-type: text/plain; charset=UTF-8");
    header("Content-Disposition: attachment; filename=20140924" . time() . ".csv");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $output;
    exit();

?>