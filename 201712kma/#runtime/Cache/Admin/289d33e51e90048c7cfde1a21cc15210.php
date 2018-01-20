<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>系统后台 - <?php echo ($Config["sitename"]); ?> - by LvyeCMS</title>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?><link href="<?php echo ($config_siteurl); ?>statics/css/admin_style.css" rel="stylesheet" />
<link href="<?php echo ($config_siteurl); ?>statics/js/artDialog/skins/default.css" rel="stylesheet" />
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "<?php echo ($config_siteurl); ?>",
	JS_ROOT: "<?php echo ($config_siteurl); ?>statics/js/"
};
</script>
<script src="<?php echo ($config_siteurl); ?>statics/js/wind.js"></script>
<script src="<?php echo ($config_siteurl); ?>statics/js/jquery.js"></script>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <?php  $getMenu = isset($Custom)?$Custom:D('Admin/Menu')->getMenu(); if($getMenu) { ?>
<div class="nav">
  <?php
 if(!empty($menuReturn)){ echo '<div class="return"><a href="'.$menuReturn['url'].'">'.$menuReturn['name'].'</a></div>'; } ?>
  <ul class="cc">
    <?php
 foreach($getMenu as $r){ $app = $r['app']; $controller = $r['controller']; $action = $r['action']; ?>
    <li <?php echo $action==ACTION_NAME ?'class="current"':""; ?>><a href="<?php echo U("".$app."/".$controller."/".$action."",$r['parameter']);?>" <?php echo $r['target']?'target="'.$r['target'].'"':"" ?>><?php echo $r['name'];?></a></li>
    <?php
 } ?>
  </ul>
</div>
<?php } ?>
  
  <div class="h_a">搜索</div>
  <form method="get" action="">

  <input type="hidden" value="Admin" name="g">
  <input type="hidden" value="Pingtai" name="m">
  <input type="hidden" value="xianxue_list" name="a">
  <input type="hidden" value="1" name="search">

    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">时间：
        <input type="text" name="start_time" class="input length_2 J_date start_time" value="<?php echo ($_GET['start_time']); ?>" style="width:80px;">-
        <input type="text" name="end_time" class="input length_2 J_date end_time"  value="<?php echo ($_GET['end_time']); ?>" style="width:80px;">
        <select class="select_2" name="type"style="width:70px;">
          <option value="1" <?php if( $searchtype == '1' ): ?>selected<?php endif; ?>>姓名</option>
          <option value="2" <?php if( $searchtype == '2' ): ?>selected<?php endif; ?>>手机号</option>
          <option value="3" <?php if( $searchtype == '3' ): ?>selected<?php endif; ?>>身份证</option>
        </select>
        关键字：
        <input type="text" class="input length_2" name="keyword" style="width:200px;" value="<?php echo ($keyword); ?>" placeholder="请输入关键字...">

        <button class="btn">搜索</button>　　　
        
        <button class="btn export" type="button">导出</button>
        </span>
      </div>
    </div>
  </form>

   <div class="table_list">
   <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="5%" align="center">序号</td>
            <td width="6%" align="center">姓名</td>
            <td width="6%" align="center">性别</td>
            <td width="6%" align="center">联系电话</td>
            <td width="6%" align="center">民族</td>
            <td width="6%" align="center">工作单位</td>
            <td width="6%" align="center"> QQ</td>
            <td width="8%" align="center">提交时间</td>
            <td width="5%" align="center">管理操作</td>
          </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
            <td width="5%" align="center"><?php echo ($vo["id"]); ?></td>
            <td width="6%" align="center"><?php echo ($vo["name"]); ?></td>
            <td width="6%" align="center"><?php echo ($vo["sex"]); ?></td>
            <td width="6%" align="center"><?php echo ($vo["mob"]); ?></td>
            <td width="6%" align="center"><?php echo ($vo["mz"]); ?></td>
            <td width="6%" align="center"><?php echo ($vo["gzdw"]); ?></td>
            <td width="6%" align="center"><?php echo ($vo["qq"]); ?></td>
            <td width="8%" align="center"><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
            <td width="5%" align="center">
              <a href='<?php echo U("Pingtai/zyz_detail",array("id"=>$vo[id]));?>'>查看详情</a> | 
              <a href="<?php echo U('Pingtai/zyz_del',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a>
            </td>
          </tr><?php endforeach; endif; ?>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> <?php echo ($Page); ?> </div>
      </div>
   </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
</body>
</html>

<script type="text/javascript">
  $(".export").click(function(){

    var url ="/index.php?g=Admin&m=Pingtai&a=export&start_time="+$(".start_time").val()+"&end_time="+$(".end_time").val();
    window.open(url);
});

</script>