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
  <form method="post" action="<?php echo U('tongji');?>">
    <input type="hidden" value="<?php echo ($catid); ?>" name="catid">
    <input type="hidden" value="0" name="steps">
    <input type="hidden" value="1" name="search">
      <div class="search_type cc mb10">
        <div class="mb10"> 
          <span class="mr20">时间：
          <input type="text" name="start_time" class="input length_2 J_date" value="<?php echo ($_GET['start_time']); ?>" style="width:80px;">-<input type="text" class="input length_2 J_date" name="end_time" value="<?php echo ($_GET['end_time']); ?>" style="width:80px;">
          <button class="btn">查询</button>
          </span>
        </div>
      </div>
  </form>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="50%">
        <colgroup>
        
        <col width="15">
        <col width="10">
        </colgroup>
        <thead>
          <tr>
            <td align="left"><span>文章区域</span></td>
            <td align="left">发布数量</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>九曲镇</td>
            <td><?php echo ($jiuqu_num); ?></td>
          </tr>
          <tr>
            <td>凤凰岭镇</td>
            <td><?php echo ($fhl_num); ?></td>
          </tr>
          <tr>
            <td>汤河镇</td>
            <td><?php echo ($tanghe_num); ?></td>
          </tr>

          <tr>
            <td>相公镇</td>
            <td><?php echo ($xianggong_num); ?></td>
          </tr>
            <tr>
            <td>八湖镇</td>
            <td><?php echo ($bahu_num); ?></td>
          </tr>
                    <tr>
            <td>郑旺镇</td>
            <td><?php echo ($zhengwang_num); ?></td>
          </tr>
          <tr>
            <td>太平镇</td>
            <td><?php echo ($taiping_num); ?></td>
          </tr>

          <tr>
            <td>汤头镇</td>
            <td><?php echo ($tangtou_num); ?></td>
          </tr>


        </tbody>
      </table>
      
     
    </div>
    
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>

</body>
</html>