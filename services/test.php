<?php
header("Content-type: text/plain; charset=UTF-8");
require_once 'medoo.php';
date_default_timezone_set('PRC'); //设置中国时区 
set_time_limit(0);

$shop = new medoo("shop_sdsnw_cn");
$sql="select * from ns_shop where shop_id > 41  ";
$datas = $shop->query($sql)->fetchAll();


foreach ($datas as $key => $v) {
	
	
	echo $shop_id = $v["shop_id"];
	

	$insert["shop_id"]      = $v["shop_id"];
	$insert["company_name"] = '优速快递';
	$insert["express_no"]   = '';
	$insert["is_enabled"]   = '1';
	$insert["image"]        = '';
	$insert["phone"]        = '';
	$insert["orders"]       = 0;
	$insert["express_logo"] = '';
	$insert["is_default"]   = 1;
	$co_id1 = $shop->insert("ns_express_company",$insert);

	$insert["shop_id"]      = $v["shop_id"];
	$insert["company_name"] = '中通快递';
	$insert["express_no"]   = '';
	$insert["is_enabled"]   = '1';
	$insert["image"]        = '';
	$insert["phone"]        = '';
	$insert["orders"]       = 0;
	$insert["express_logo"] = '';
	$insert["is_default"]   = 0;
	$co_id2 = $shop->insert("ns_express_company",$insert);

	$insert["shop_id"]      = $v["shop_id"];
	$insert["company_name"] = '申通快递';
	$insert["express_no"]   = '';
	$insert["is_enabled"]   = '1';
	$insert["image"]        = '';
	$insert["phone"]        = '';
	$insert["orders"]       = 0;
	$insert["express_logo"] = '';
	$insert["is_default"]   = 0;
	$co_id3 = $shop->insert("ns_express_company",$insert);

	/*ns_express_shipping*/
	
	$insert2["shop_id"]       = $v["shop_id"];
	$insert2["template_name"] = '优速快递';
	$insert2["co_id"]         = $co_id1;
	$insert2["size_type"]     = 1;
	$insert2["width"]         = 0;
	$insert2["height"]        = 0;
	$insert2["image"]         = '';
	$es_id1 = $shop->insert("ns_express_shipping",$insert2);
	
	$insert2["shop_id"]       = $v["shop_id"];
	$insert2["template_name"] = '中通快递';
	$insert2["co_id"]         = $co_id2;
	$insert2["size_type"]     = 1;
	$insert2["width"]         = 0;
	$insert2["height"]        = 0;
	$insert2["image"]         = '';
	$es_id2 = $shop->insert("ns_express_shipping",$insert2);

	$insert2["shop_id"]       = $v["shop_id"];
	$insert2["template_name"] = '申通快递';
	$insert2["co_id"]         = $co_id3;
	$insert2["size_type"]     = 1;
	$insert2["width"]         = 0;
	$insert2["height"]        = 0;
	$insert2["image"]         = '';
	$es_id3 = $shop->insert("ns_express_shipping",$insert2);

	

	//echo $shop->last_query();  

	$sql_1 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '山东', '0', '".$co_id1."','".$shop_id."', '15', '135,150,149,148,147,146,145,144,143,142,141,140,139,138,137,136,151', '1', '1.00', '4.00', '1.00', '1.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:13:40', '2017-11-13 09:14:07')";
	$sql_2 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '江苏 浙江上海', '0', '".$co_id1."','".$shop_id."', '9,10,11', '73,74,85,84,83,82,81,80,79,78,77,76,75,86,87,96,95,94,93,92,91,90,89,88,97', '1', '1.00', '4.00', '1.00', '1.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:14:59', NULL)";
	$sql_3 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '北京 天津 安徽', '0', '".$co_id1."','".$shop_id."', '12,2,1', '98,113,112,111,110,109,108,107,106,105,104,103,102,101,100,99,114,2,1', '1', '1.00', '4.00', '1.00', '1.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:23:25', NULL)";
	$sql_4 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ('河南 河北 山西 湖南 湖北 江西 广东', '0', '".$co_id1."','".$shop_id."', '14,3,4,19,16,17,18', '124,133,132,131,130,129,128,127,126,125,134,3,12,11,10,9,8,7,6,5,4,13,14,23,22,21,20,19,18,17,16,15,24,197,208,210,211,212,213,214,215,216,207,206,198,199,200,201,202,203,204,205,217,209,152,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,168,169,181,180,179,178,177,176,175,174,173,172,171,170,182,183,195,194,193,192,191,190,189,188,187,186,185,184,196', '1', '1.00', '4.00', '1.00', '2.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:24:49', NULL)";
	$sql_5 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '四川 重庆 陕西 福建 东北三省', '0', '".$co_id1."','".$shop_id."', '13,6,7,8,27,22,23', '115,116,117,118,119,120,121,122,123,37,49,48,47,46,45,44,43,42,41,40,39,38,50,51,52,53,54,55,56,57,58,59,60,71,70,69,68,67,66,65,64,63,62,61,72,288,296,295,294,293,292,291,290,289,297,234,235,247,248,249,250,251,252,253,254,246,245,244,236,237,238,239,240,241,242,243,255', '1', '1.00', '5.00', '1.00', '3.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:25:58', NULL)";
	$sql_6 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '广西 云南 贵州 宁夏 甘肃', '0', '".$co_id1."','".$shop_id."', '20,28,30,24,25', '218,230,229,228,227,226,225,224,223,222,221,220,219,231,298,310,309,308,307,306,305,304,303,302,301,300,299,311,320,321,322,323,324,256,257,258,259,260,261,262,263,264,265,279,278,277,276,275,274,273,272,271,270,269,268,267,266,280', '1', '1.00', '8.00', '1.00', '5.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:27:10', NULL)";
	$sql_7 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ('青海 海南 内蒙', '0', '".$co_id1."','".$shop_id."', '5,21,29', '25,35,34,33,32,31,30,29,28,27,26,36,232,233,312,313,314,315,316,317,318,319', '1', '1.00', '8.00', '1.00', '6.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:27:43', NULL)";
	$sql_8 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '新疆 西藏', '0', '".$co_id1."','".$shop_id."', '31,26', '325,341,340,339,338,337,336,335,334,333,332,331,330,329,328,327,326,342,281,282,283,284,285,286,287', '1', '1.00', '10.00', '1.00', '8.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:28:18', NULL)";
	$sql_9 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '山东省内', '0', '".$co_id2."','".$shop_id."', '15', '135,150,149,148,147,146,145,144,143,142,141,140,139,138,137,136,151', '1', '1.00', '6.00', '1.00', '1.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:30:58', NULL)";
	$sql_10 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '上海 江苏 浙江 安徽', '0', '".$co_id2."','".$shop_id."', '9,10,11,12', '73,74,85,84,83,82,81,80,79,78,77,76,75,86,87,96,95,94,93,92,91,90,89,88,97,98,113,112,111,110,109,108,107,106,105,104,103,102,101,100,99,114', '1', '1.00', '6.00', '1.00', '1.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:31:35', NULL)";
	$sql_11 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '北京 天津 河南 河北', '0', '".$co_id2."','".$shop_id."', '2,3,1,16', '2,3,12,11,10,9,8,7,6,5,4,13,1,152,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,168', '1', '1.00', '8.00', '1.00', '2.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:32:16', NULL)";
	$sql_12 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '广东 福建 湖南 湖北 江西 山西 陕西', '0', '".$co_id2."','".$shop_id."', '14,4,13,19,17,18,27', '124,133,132,131,130,129,128,127,126,125,134,14,23,22,21,20,19,18,17,16,15,24,115,116,117,118,119,120,121,122,123,197,208,210,211,212,213,214,215,216,207,206,198,199,200,201,202,203,204,205,217,209,169,181,180,179,178,177,176,175,174,173,172,171,170,182,183,195,194,193,192,191,190,189,188,187,186,185,184,196,288,296,295,294,293,292,291,290,289,297', '1', '1.00', '8.00', '1.00', '3.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:33:42', NULL)";

	$sql_13 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '辽宁 吉林 黑龙江', '0', '".$co_id2."','".$shop_id."', '6,7,8', '37,49,48,47,46,45,44,43,42,41,40,39,38,50,51,52,53,54,55,56,57,58,59,60,71,70,69,68,67,66,65,64,63,62,61,72', '1', '1.00', '8.00', '1.00', '4.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:34:28', NULL)";
	$sql_14 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '重庆 四川 云南 内蒙', '0', '".$co_id2."','".$shop_id."', '5,22,23,25', '25,35,34,33,32,31,30,29,28,27,26,36,234,235,247,248,249,250,251,252,253,254,246,245,244,236,237,238,239,240,241,242,243,255,265,279,278,277,276,275,274,273,272,271,270,269,268,267,266,280', '1', '1.00', '10.00', '1.00', '5.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:35:23', NULL)";

	$sql_15 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ('青海 甘肃 海南 贵州 宁夏 广西', '0', '".$co_id2."','".$shop_id."', '20,21,28,29,30,24', '218,230,229,228,227,226,225,224,223,222,221,220,219,231,232,233,298,310,309,308,307,306,305,304,303,302,301,300,299,311,312,313,314,315,316,317,318,319,320,321,322,323,324,256,257,258,259,260,261,262,263,264', '1', '1.00', '10.00', '1.00', '6.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:36:27', NULL)";
	$sql_16 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '新疆 西藏', '0', '".$co_id2."','".$shop_id."', '31,26', '325,341,340,339,338,337,336,335,334,333,332,331,330,329,328,327,326,342,281,282,283,284,285,286,287', '1', '1.00', '15.00', '1.00', '15.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 09:36:52', NULL)";




	$sql_17 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '海南', '0', '".$co_id3."','".$shop_id."', '21', '232,233', '1', '15.00', '60.00', '1.00', '3.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:36:31', NULL);
";
	$sql_18 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ('广西', '0', '".$co_id3."','".$shop_id."', '20', '218,230,229,228,227,226,225,224,223,222,221,220,219,231', '1', '15.00', '50.00', '1.00', '2.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:37:07', NULL);";

	$sql_19 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '重庆', '0', '".$co_id3."','".$shop_id."', '22', '234', '1', '15.00', '50.00', '1.00', '2.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:37:34', NULL)";


	$sql_20 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ('贵州', '0', '".$co_id3."','".$shop_id."', '24', '256,257,258,259,260,261,262,263,264', '1', '15.00', '55.00', '1.00', '2.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:38:09', NULL)";

	$sql_21 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '四川', '0', '".$co_id3."','".$shop_id."', '23', '235,247,248,249,250,251,252,253,254,246,245,244,236,237,238,239,240,241,242,243,255', '1', '15.00', '50.00', '1.00', '2.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:38:37', NULL)";
	$sql_22 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '云南', '0', '".$co_id3."','".$shop_id."', '25', '265,279,278,277,276,275,274,273,272,271,270,269,268,267,266,280', '1', '15.00', '55.00', '1.00', '2.60', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:39:09', NULL)";
	$sql_23 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '北京', '0', '".$co_id3."','".$shop_id."', '1', '1', '1', '15.00', '35.00', '1.00', '1.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:39:44', NULL)";
	$sql_24 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '内蒙古', '0', '".$co_id3."','".$shop_id."', '5', '25,35,34,33,32,31,30,29,28,27,26,36', '1', '15.00', '50.00', '1.00', '5.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:40:29', NULL)";
	$sql_25 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '河北 天津', '0', '".$co_id3."','".$shop_id."', '2,3', '2,3,12,11,10,9,8,7,6,5,4,13', '1', '15.00', '35.00', '1.00', '1.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:41:11', NULL)";
	$sql_26 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '辽宁 吉林', '0', '".$co_id3."','".$shop_id."', '6,7', '37,49,48,47,46,45,44,43,42,41,40,39,38,50,51,52,53,54,55,56,57,58,59', '1', '15.00', '40.00', '1.00', '2.30', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:41:41', NULL)";
	$sql_27 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '黑龙江', '0', '".$co_id3."','".$shop_id."', '8', '60,71,70,69,68,67,66,65,64,63,62,61,72', '1', '15.00', '45.00', '1.00', '2.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:42:25', NULL)";
	$sql_28 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '江苏 浙江 上海 安徽', '0', '".$co_id3."','".$shop_id."', '9,10,11,12', '73,74,85,84,83,82,81,80,79,78,77,76,75,86,87,96,95,94,93,92,91,90,89,88,97,98,113,112,111,110,109,108,107,106,105,104,103,102,101,100,99,114', '1', '15.00', '30.00', '1.00', '1.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:43:28', NULL)";
	$sql_29 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '江西 湖南 福建 广东', '0', '".$co_id3."','".$shop_id."', '14,13,19,18', '124,133,132,131,130,129,128,127,126,125,134,115,116,117,118,119,120,121,122,123,197,208,210,211,212,213,214,215,216,207,206,198,199,200,201,202,203,204,205,217,209,183,195,194,193,192,191,190,189,188,187,186,185,184,196', '1', '15.00', '40.00', '1.00', '1.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:44:09', NULL)";
	$sql_30 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '山东', '0', '".$co_id3."','".$shop_id."', '15', '135,150,149,148,147,146,145,144,143,142,141,140,139,138,137,136,151', '1', '15.00', '26.00', '1.00', '0.80', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:44:34', NULL)";

	$sql_31 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '湖北', '0', '".$co_id3."','".$shop_id."', '17', '169,181,180,179,178,177,176,175,174,173,172,171,170,182', '1', '15.00', '40.00', '1.00', '1.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:45:02', NULL)";
	$sql_32 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '河南 山西', '0', '".$co_id3."','".$shop_id."', '4,16', '14,23,22,21,20,19,18,17,16,15,24,152,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,168', '1', '15.00', '40.00', '1.00', '1.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:45:38', NULL)";
	$sql_33 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '新疆', '0', '".$co_id3."','".$shop_id."', '31', '325,341,340,339,338,337,336,335,334,333,332,331,330,329,328,327,326,342', '1', '15.00', '60.00', '1.00', '6.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:46:19', '2017-11-13 11:50:22')";
	$sql_34 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ('宁夏 甘肃 青海', '0', '".$co_id3."','".$shop_id."', '28,29,30', '298,310,309,308,307,306,305,304,303,302,301,300,299,311,312,313,314,315,316,317,318,319,320,321,322,323,324', '1', '15.00', '60.00', '1.00', '5.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-1		1-13 11:50:53', NULL)";
	$sql_35 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '西藏', '0', '".$co_id3."','".$shop_id."', '26', '281,282,283,284,285,286,287', '1', '15.00', '60.00', '1.00', '6.00', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:51:53', NULL)";
	$sql_36 = "INSERT INTO `ns_order_shipping_fee` ( `shipping_fee_name`, `is_default`, `co_id`, `shop_id`, `province_id_array`, `city_id_array`, `weight_is_use`, `weight_snum`, `weight_sprice`, `weight_xnum`, `weight_xprice`, `volume_is_use`, `volume_snum`, `volume_sprice`, `volume_xnum`, `volume_xprice`, `bynum_is_use`, `bynum_snum`, `bynum_sprice`, `bynum_xnum`, `bynum_xprice`, `create_time`, `update_time`) VALUES ( '陕西', '0', '".$co_id3."','".$shop_id."', '27', '288,296,295,294,293,292,291,290,289,297', '1', '15.00', '45.00', '1.00', '2.50', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0', '0.00', '2017-11-13 11:52:18', NULL)";

	for ($i=1; $i < 37; $i++) {
		$j = "sql_".$i; 
		$shop->query($$j);
	}


	/*$insert["typeid"]          = 0;
	$insert["title"]           = $v["newsname"];
	$insert["style"]           = '';
	$insert["thumb"]           = '';
	$insert["keywords"]        = '';
	$insert["tags"]             = '';
	$insert["description"]     = $v["Description"];
	$insert["posid"]           = 0;
	$insert["url"]             = '';
	$insert["listorder"]       = 0;
	$insert["status"]          = 99;
	$insert["sysadd"]          = 1;
	$insert["islink"]          = 0;
	$insert["username"]        = 'zhifeng';
	$insert["inputtime"]       = strtotime($v["newstime"]);
	$insert["updatetime"]      = strtotime($v["newstime"]);
	$insert["views"]           = $v["newshit"];
	$insert["yesterdayviews"]  = 0;
	$insert["dayviews"]        = 0;
	$insert["weekviews"]       = 0;
	$insert["monthviews"]      = 0;
	$insert["viewsupdatetime"] = time();
	$insert["author"]          = $v["newsperson"];*/

	
	/*echo $res = $xuezhan->insert("zf_content",$insert);
	
	$insert_data["id"]             = $res;
	$insert_data["content"]        = $v["newsnr"];
	$insert_data["paginationtype"] = 2;
	$insert_data["maxcharperpage"] = 10000;
	$insert_data["template"]       = '';
	$insert_data["paytype"]        = 0;
	$insert_data["allow_comment"]  = 1;
	$insert_data["relation"]       = '';

	
	echo "----"; 
	echo $res = $xuezhan->insert("zf_content_data",$insert_data);*/
	
	echo "\r"; 
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