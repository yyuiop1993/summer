<?php
if (C('LAYOUT_ON')) {
    echo '{__NOLAYOUT__}';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>系统发生错误</title>
<style type="text/css">
* {
	margin: 0px;
	padding: 0px;
	text-decoration: none;
}
body,h1,h2,h3,h4,h5,h6,hr,p,blockquote,dl,dt,dd,ul,ol,li,pre,form,fieldset,legend,button,input,textarea,th,td{margin:0;padding:0;word-wrap:break-word}
body,html,input{font:12px/1.5 tahoma,arial,\5b8b\4f53,sans-serif;}
table{border-collapse:collapse;border-spacing:0;}img{border:none}
.c {
	margin: 0px;
	padding: 0px;
	clear: both;
}
#main {
	width: 1000px;
	margin-top: 0px;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
	padding-top: 20px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
}
h1 {
	line-height: 28px;
	font-size: 16px;
	padding-left: 8px;
}
.td {
	padding-left: 8px;
	font-size: 14px;
}
.td1 {
	font-size: 14px;
	padding-left: 8px;
}
.td3 {
	font-size: 12px;
	padding: 8px;
}
.td6 {
	font-size: 12px;
	padding-top: 3px;
	padding-right: 8px;
	padding-bottom: 3px;
	padding-left: 8px;
}
h2 {
	font-size: 14px;
	line-height: 28px;
	padding-left: 8px;
}
.b_1 {
	line-height: 28px;
	font-size: 14px;
	padding: 8px;
}
.b_1 a img {
	padding-right: 5px;
	padding-left: 5px;
}
#box fieldset h6 {
	font-size: 14px;
	color: #333;
}
fieldset {
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
legend {
	margin-bottom: 10px;
}

 a {
	color: #333;
}
 a:hover {
	color: #F60;
}
</style>
</head>
<body>
<div id="main">
  <div id="top">
        	<div class="t1">
        	  <h2>错误位置：</h2>
   	  </div>
    <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#aead81">
      <tr>
        <td><h1>message</h1></td>
        <td><h1>file</h1></td>
        <td><h1>line</h1></td>
      </tr>
      <?php if (isset($e['file'])) { ?>
    	    <tr>
    	      <td height="28" bgcolor="#ffffcc" class="td"><?php echo $e['message']; ?></td>
    	      <td bgcolor="#ffffcc" class="td"><?php echo $e['file']; ?></td>
    	      <td bgcolor="#ffffcc" class="td"><?php echo $e['line']; ?></td>
        </tr>
      <?php } ?>
<?php if (isset($e['trace'])) { ?>
	<tr>
    	      <td colspan="3" bgcolor="#ffffcc" class="td1"><h2>TRACE：</h2><?php echo nl2br($e['trace']); ?></td>
      </tr>
<?php } ?>
    </table>
</body>
</html>