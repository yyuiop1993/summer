<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
	<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />
    <meta name="description" content="<?php echo ($SEO['description']); ?>" />
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/base.css">

</head>
<body>

<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/index.css">



<div class="hearder"></div>

<div class="content clearfix">

	<div class="w">

		<ul>

			<li class="li0"><a href="/index.php?a=lists&catid=1" >预约报名</a></li>

			<li class="li1"><a href="/index.php?a=lists&catid=11" ><?php echo getCategory(11,'catname');?></a></li>

			<li class="li2"><a href="/index.php?a=lists&catid=12" ><?php echo getCategory(12,'catname');?></a></li>

			<li class="li3"><a href="/index.php?a=lists&catid=19" ><?php echo getCategory(19,'catname');?></a></li>

			<li class="li4"><a href="/index.php?a=lists&catid=15" ><?php echo getCategory(15,'catname');?></a></li>

			<li class="li5"><a href="/index.php?a=lists&catid=16" ><?php echo getCategory(16,'catname');?></a></li>

			<li class="li6"><a href="/index.php?a=lists&catid=17" ><?php echo getCategory(17,'catname');?></a></li>

		</ul>

	</div>

</div>



</body>
</html>