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
        <div class="table_full">
            <form method='post'   id="myform" class="J_ajaxForm"  action="<?php echo U('Config/addition');?>">
<!--                 <div class="h_a">云平台设置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">帐号:</th>
                        <td><input type="text" class="input"  name="CLOUD_USERNAME" value="<?php echo ($addition["CLOUD_USERNAME"]); ?>" size="40">
                        <span class="gray"> http://www.lvyecms.com 会员帐号</span></td>
                    </tr>
                    <tr>
                        <th width="140">密码:</th>
                        <td><input type="password" class="input"  name="CLOUD_PASSWORD" value="<?php echo ($addition["CLOUD_PASSWORD"]); ?>" size="40">
                        <span class="gray"> http://www.lvyecms.com 会员密码</span></td>
                    </tr>
                </table> -->
                <div class="h_a">Cookie配置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">Cookie有效期:</th>
                        <td><input type="text" class="input"  name="COOKIE_EXPIRE" value="<?php echo ($addition["COOKIE_EXPIRE"]); ?>" size="40">
                            <span class="gray"> 单位秒</span></td>
                    </tr>
                    <tr>
                        <th width="140">Cookie有效域名:</th>
                        <td><input type="text" class="input"  name="COOKIE_DOMAIN" value="<?php echo ($addition["COOKIE_DOMAIN"]); ?>" size="40">
                            <span class="gray"> 例如：“.abc3210.com”表示这个域名下都可以访问</span></td>
                    </tr>
                    <tr>
                        <th width="140">Cookie路径:</th>
                        <td><input type="text" class="input"  name="COOKIE_PATH" value="<?php echo ($addition["COOKIE_PATH"]); ?>" size="40">
                            <span class="gray"> 一般是“/”</span></td>
                    </tr>
                </table>
                <div class="h_a">Session配置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">Session前缀:</th>
                        <td><input type="text" class="input"  name="SESSION_PREFIX" value="<?php echo ($addition["SESSION_PREFIX"]); ?>" size="40">
                            <span class="gray">一般为空即可</span></td>
                    </tr>
                    <tr>
                        <th width="140">Session域名:</th>
                        <td><input type="text" class="input"  name="SESSION_OPTIONS[domain]" value="<?php echo ($addition["SESSION_OPTIONS"]["domain"]); ?>" size="40">
                            <span class="gray"> 一般是“.abc3210.com”</span></td>
                    </tr>
                </table>
                <div class="h_a">错误设置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">显示错误信息:</th>
                        <td><input name="SHOW_ERROR_MSG" type="radio" value="1" <?php if( $addition['SHOW_ERROR_MSG'] ): ?>checked<?php endif; ?>> 开启 <input name="SHOW_ERROR_MSG" type="radio" value="0" <?php if( !$addition['SHOW_ERROR_MSG'] ): ?>checked<?php endif; ?>> 关闭</td>
                    </tr>
                    <tr>
                        <th width="140">错误显示信息:</th>
                        <td><input type="text" class="input"  name="ERROR_MESSAGE" value="<?php echo ($addition["ERROR_MESSAGE"]); ?>" size="40"></td>
                    </tr>
                    <tr>
                        <th width="140">错误定向页面:</th>
                        <td><input type="text" class="input"  name="ERROR_PAGE" value="<?php echo ($addition["ERROR_PAGE"]); ?>" size="40">
                            <span class="gray">例如：http://www.abc3210.com/error.html</span></td>
                    </tr>
                </table>
                <div class="h_a">URL设置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">URL不区分大小写:</th>
                        <td><input name="URL_CASE_INSENSITIVE" type="radio" value="1" <?php if( $addition['URL_CASE_INSENSITIVE'] ): ?>checked<?php endif; ?>> 开启 <input name="URL_CASE_INSENSITIVE" type="radio" value="0" <?php if( !$addition['URL_CASE_INSENSITIVE'] ): ?>checked<?php endif; ?>> 关闭</td>
                    </tr>
                    <tr>
                        <th width="140">URL访问模式:</th>
                        <td><select name="URL_MODEL" id="URL_MODEL" >
                                <option value="0" <?php if($addition['URL_MODEL'] == '0' ): ?>selected<?php endif; ?>>普通模式</option>
                                <option value="1" <?php if($addition['URL_MODEL'] == '1' ): ?>selected<?php endif; ?>>PATHINFO 模式</option>
                                <option value="2" <?php if($addition['URL_MODEL'] == '2' ): ?>selected<?php endif; ?>>REWRITE  模式</option>
                                <option value="3" <?php if($addition['URL_MODEL'] == '3' ): ?>selected<?php endif; ?>>兼容模式</option>
                            </select> <span class="gray"> 除了普通模式外其他模式可能需要服务器伪静态支持，同时需要写相应伪静态规则！</span></td>
                    </tr>
                    <tr>
                        <th width="140">PATHINFO模式参数分割线:</th>
                        <td><input type="text" class="input"  name="URL_PATHINFO_DEPR" value="<?php echo ($addition["URL_PATHINFO_DEPR"]); ?>" size="40">
                            <span class="gray"> 例如：“/”</span></td>
                    </tr>
                    <tr>
                        <th width="140">URL伪静态后缀:</th>
                        <td><input type="text" class="input"  name="URL_HTML_SUFFIX" value="<?php echo ($addition["URL_HTML_SUFFIX"]); ?>" size="40">
                            <span class="gray"> 例如：“.html”</span></td>
                    </tr>
                </table>
                <div class="h_a">表单令牌</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">使用说明:</th>
                        <td>开启前，需要在行为管理 view_filter 行为里添加 phpfile:TokenBuildBehavior 行为才能正常启用。</td>
                    </tr>
                    <tr>
                        <th width="140">是否开启令牌验证:</th>
                        <td><input name="TOKEN_ON" type="radio" value="1" <?php if( $addition['TOKEN_ON'] ): ?>checked<?php endif; ?>> 开启 <input name="TOKEN_ON" type="radio" value="0" <?php if( !$addition['TOKEN_ON'] ): ?>checked<?php endif; ?>> 关闭</td>
                    </tr>
                    <tr>
                        <th width="140">表单隐藏字段名称:</th>
                        <td><input type="text" class="input"  name="TOKEN_NAME" value="<?php echo ($addition["TOKEN_NAME"]); ?>" size="40">
                            <span class="gray"> 令牌验证的表单隐藏字段名称！</span></td>
                    </tr>
                    <tr>
                        <th width="140">令牌哈希验证规则:</th>
                        <td><input type="text" class="input"  name="TOKEN_TYPE" value="<?php echo ($addition["TOKEN_TYPE"]); ?>" size="40">
                            <span class="gray"> 令牌哈希验证规则 默认为MD5</span></td>
                    </tr>
                </table>
                <div class="h_a">分页配置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">默认分页数:</th>
                        <td><input type="text" class="input"  name="PAGE_LISTROWS" value="<?php echo ($addition["PAGE_LISTROWS"]); ?>" size="40">
                            <span class="gray"> 默认20！</span></td>
                    </tr>
                    <tr>
                        <th width="140">分页变量:</th>
                        <td><input type="text" class="input"  name="VAR_PAGE" value="<?php echo ($addition["VAR_PAGE"]); ?>" size="40">
                            <span class="gray"> 默认：page，建议不修改</span></td>
                    </tr>
                </table>
                <div class="h_a">杂项配置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">默认分页模板:</th>
                        <td>
                            <textarea name="PAGE_TEMPLATE" style="width:500px;"><?php echo ($addition["PAGE_TEMPLATE"]); ?></textarea>
                            <br/>
                            <span class="gray"> 当没有设置分页模板时，默认使用该项设置</span></td>
                    </tr>
                    <tr>
                        <th width="140">默认模块:</th>
                        <td><input type="text" class="input"  name="DEFAULT_MODULE" value="<?php echo ($addition["DEFAULT_MODULE"]); ?>" size="40">
                            <span class="gray"> 默认：Content，建议不修改，填写时注意大小写</span></td>
                    </tr>
                    <tr>
                        <th width="140">默认时区:</th>
                        <td><input type="text" class="input"  name="DEFAULT_TIMEZONE" value="<?php echo ($addition["DEFAULT_TIMEZONE"]); ?>" size="40"></td>
                    </tr>
                    <tr>
                        <th width="140">AJAX 数据返回格式:</th>
                        <td><input type="text" class="input"  name="DEFAULT_AJAX_RETURN" value="<?php echo ($addition["DEFAULT_AJAX_RETURN"]); ?>" size="40">
                            <span class="gray">默认AJAX 数据返回格式,可选JSON XML ...</span></td>
                    </tr>
                    <tr>
                        <th width="140">默认参数过滤方法:</th>
                        <td><input type="text" class="input"  name="DEFAULT_FILTER" value="<?php echo ($addition["DEFAULT_FILTER"]); ?>" size="40">
                            <span class="gray"> 默认参数过滤方法 用于 $this->_get('变量名');$this->_post('变量名')...</span></td>
                    </tr>
                    <tr>
                        <th width="140">默认语言:</th>
                        <td><input type="text" class="input"  name="DEFAULT_LANG" value="<?php echo ($addition["DEFAULT_LANG"]); ?>" size="40">
                            <span class="gray">默认语言</span></td>
                    </tr>
                    <tr>
                        <th width="140">数据缓存类型:</th>
                        <td><select name="DATA_CACHE_TYPE" id="DATA_CACHE_TYPE" >
                                <option value="File" <?php if($addition['DATA_CACHE_TYPE'] == 'File' ): ?>selected<?php endif; ?>>File</option>
                                <option value="Memcache" <?php if($addition['DATA_CACHE_TYPE'] == 'Memcache' ): ?>selected<?php endif; ?>>Memcache</option>
								<option value="Redis" <?php if($addition['DATA_CACHE_TYPE'] == 'Redis' ): ?>selected<?php endif; ?>>Redis</option>
								<option value="Xcache" <?php if($addition['DATA_CACHE_TYPE'] == 'Xcache' ): ?>selected<?php endif; ?>>Xcache</option>
                            </select>
                            <span class="gray">数据缓存类型,支持:File|Memcache</span></td>
                    </tr>
                    <tr>
                        <th width="140">子目录缓存:</th>
                        <td><input name="DATA_CACHE_SUBDIR" type="radio" value="1" <?php if( $addition['DATA_CACHE_SUBDIR'] ): ?>checked<?php endif; ?>> 是 <input name="DATA_CACHE_SUBDIR" type="radio" value="0" <?php if( !$addition['DATA_CACHE_SUBDIR'] ): ?>checked<?php endif; ?>> 否
                    <span class="gray">使用子目录缓存 (自动根据缓存标识的哈希创建子目录)</span></td>
                    </tr>
                    <tr>
                        <th width="140">函数加载:</th>
                        <td><input type="text" class="input"  name="LOAD_EXT_FILE" value="<?php echo ($addition["LOAD_EXT_FILE"]); ?>" size="40">
                            <span class="gray">加载shuipf/Common/目录下的扩展函数，扩展函数建议添加到extend.php。多个用逗号间隔。</span></td>
                    </tr>
                </table>
                <div class="btn_wrap">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script> 
    <script type="text/javascript">
        function generates(genid) {
            //生成静态
            if (genid == 1) {
                $("#index_ruleid_1").show();
                $("#index_ruleid_1 select").attr("disabled", false);
                $("#index_ruleid_0").hide();
                $("#index_ruleid_0 select").attr("disabled", "disabled");
            } else {
                $("#index_ruleid_0").show();
                $("#index_ruleid_0 select").attr("disabled", false);
                $("#index_ruleid_1").hide();
                $("#index_ruleid_1 select").attr("disabled", "disabled");
            }
        }
    </script>
</body>
</html>