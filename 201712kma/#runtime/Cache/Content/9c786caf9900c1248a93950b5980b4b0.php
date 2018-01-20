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
<style type="text/css">
.cu,.cu-li li,.cu-span span {cursor: hand;!important;cursor: pointer}
 .line_ff9966,.line_ff9966:hover td{
	background-color:#FF9966;
}
 .line_fbffe4,.line_fbffe4:hover td {
	background-color:#fbffe4;
}
</style>
<div class="wrap">
  <div class="h_a">搜索</div>
  <form name="searchform" action="<?php echo U("Content/Content/public_relationlist");?>" method="post">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">
        <select class="select_2" name="searchtype" style="width:70px;">
          <option value='title' <?php if( $_GET['field']=='title' ): ?>selected<?php endif; ?>>标题</option>
          <option value='keywords' <?php if( $_GET['field']=='keywords' ): ?>selected<?php endif; ?> >关键字</option>
          <option value='description' <?php if( $_GET['field']=='description' ): ?>selected<?php endif; ?>>描述</option>
          <option value='id' <?php if( $_GET['field']=='id' ): ?>selected<?php endif; ?>>ID</option>
        </select>
        <?php echo ($Formcategory); ?>
        关键字：
        <input type="text" class="input length_2" name="keywords" style="width:200px;" value="<?php echo ($_GET['keywords']); ?>" placeholder="请输入关键字...">
        <button class="btn">搜索</button>
        </span>
      </div>
    </div>
  </form>
    <div class="table_list">
      <table width="100%">
        <colgroup>
        <col width="40">
        <col width="">
        <col width="80">
        <col width="70">
        <col width="140">
        </colgroup>
        <thead>
          <tr>
            <td>ID</td>
            <td>标题</td>
            <td align="center">点击量</td>
            <td>发布人</td>
            <td><span>发帖时间</span></td>
          </tr>
        </thead>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onClick="select_list(this,'<?php echo ($vo["title"]); ?>',<?php echo getCategory($vo['catid'],'modelid');?>,<?php echo ($vo["id"]); ?>)"  class="cu" title="点击选择">
            <td><?php echo ($vo["id"]); ?></td>
            <td ><a href="javascript:;;"><span style="" >
              <?php if( $vo['status']==99 ): echo ($vo["title"]); ?>
                <?php else: ?>
                <font color="#FF0000">[未审核]</font> - <?php echo ($vo["title"]); endif; ?>
              </span></a>
              <?php if( $vo['thumb']!='' ): ?><img src="<?php echo ($config_siteurl); ?>statics/images/icon/small_img.gif" title="标题图片"><?php endif; ?>
              <?php if( $vo['posids'] ): ?><img src="<?php echo ($config_siteurl); ?>statics/images/icon/small_elite.gif" title="推荐位"><?php endif; ?>
              <?php if( $vo['islink'] ): ?><img src="<?php echo ($config_siteurl); ?>statics/images/icon/link.png" title="转向地址"><?php endif; ?></td>
            <td align="center"><?php echo ($vo["views"]); ?></td>
            <td><?php if( $vo['sysadd'] ): echo ($vo["username"]); ?>
                <?php else: ?>
                <font color="#FF0000"><?php echo ($vo["username"]); ?></font><img src="<?php echo ($config_siteurl); ?>statics/images/icon/contribute.png" title="会员投稿"><?php endif; ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$vo["updatetime"])); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <div class="p10"><div class="pages"> <?php echo ($Page); ?> </div> </div>
    </div>
</div>
<script>
function select_list(obj, title,modelid, id) {
    var relation_ids = window.top.$('#relation').val();
    var sid = 'v'+modelid+ '_' + id;
    if ($(obj).attr('class') == 'line_ff9966' || $(obj).attr('class') == null) {
        $(obj).attr('class', 'line_fbffe4');
        window.top.$('#' + sid).remove();
        if (relation_ids != '') {
            var r_arr = relation_ids.split('|');
            var newrelation_ids = '';
            $.each(r_arr, function (i, n) {
                if (n != id) {
                    if (i == 0) {
                        newrelation_ids = n;
                    } else {
                        newrelation_ids = newrelation_ids + '|' + n;
                    }
                }
            });
            window.top.$('#relation').val(newrelation_ids);
        }
    } else {
        $(obj).attr('class', 'line_ff9966');
        var str = "<li id='" + sid + "'>·<span>" + title + "</span><a href='javascript:;' class='close' onclick=\"remove_relation('" + sid + "'," + id + ")\"></a></li>";
        window.top.$('#relation_text').append(str);
        if (relation_ids == '') {
            window.top.$('#relation').val(id);
        } else {
            relation_ids = relation_ids + '|' + modelid+','+id;
            window.top.$('#relation').val(relation_ids);
        }
    }
}
</script>
</body>
</html>