<?php
header('Content-type: application/json');

require_once 'medoo.php';
//name mobile email address

if (!isset($_POST['name']) || !$_POST['name']) {
    print json_encode(array ('status' => 0, 'message' => 'name is required'));
    exit();
}

if (!isset($_POST['mobile']) || !is_numeric($_POST['mobile'])) {
    print json_encode(array ('status' => 0, 'message' => 'mobile is required'));
    exit();
}

if (!isset($_POST['email']) || !$_POST['email'] ) {
    print json_encode(array ('status' => 0, 'message' => 'email is required'));
    exit();
}
if (!isset($_POST['address']) || !$_POST['address']) {
    print json_encode(array ('status' => 0, 'message' => 'address is required'));
    exit();
}

$database = new medoo(MYSQL_DATABASE);
print json_encode(array ('status' => '-1', 'message' => '手机号重复'));
exit();

$where['mobile']=$_POST['mobile'];
$datas = $database->select('clinique_campaign201409','mobile',$where);
if(count($datas)>0){
	print json_encode(array ('status' => '-1', 'message' => '手机号重复'));
    exit();
}



$mobileRex = '/^(1(([357][0-9])|(47)|[8][0-9]))\d{8}$/';
if (!preg_match($mobileRex, $_POST['mobile'])) {
    print json_encode(array ('status' => 0, 'message' => 'mobile error'));
    exit();
}

$emailRex = '/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/';
if (!preg_match($emailRex, $_POST['email'])) {
    $ret = array ('status' => 0, 'message' => 'email error');
    print json_encode($ret);
    exit();
}
	



$database->insert('clinique_campaign201409', array (
	'name'    => $_POST['name'],
	'mobile'  => $_POST['mobile'],
	'email'   => $_POST['email'],
	'address' => $_POST['address'],
	'created' => date('Y-m-d H:i:s'),
));

$ret = array ('status' => 1, 'message' => 'submit success');
print json_encode($ret);
exit();
?>