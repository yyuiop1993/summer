<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"E:\freehost\zhidui0301\web/application/home\view\index\index.html";i:1495524803;s:65:"E:\freehost\zhidui0301\web/application/home\view\Common\left.html";i:1495269662;}*/ ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<!-- 引入icon -->
<link rel="icon" href="__IMG__/favicon.ico" />
<!-- 引入base.css -->
<!-- 引入layui -->
<script type="text/javascript" src="__JS__/layui/layui.js"></script>
<link rel="stylesheet" href="__JS__/layui/css/layui.css"/>
<link rel="stylesheet" href="__CSS__/layui_user.css"/>
<!-- layer单独使用 -->
<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<link rel="stylesheet" href="__JS__/layer/skin/default/layer.css"/>
<!-- 引入基础js和jquery -->
<script type="text/javascript" src="__JS__/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="__JS__/index_user.js"></script>

<title><?php echo $headArr['title']; ?></title>
<meta name="keywords" content="<?php echo $headArr['keyword']; ?>"/>
<meta name="description" content="<?php echo $headArr['description']; ?>"/>

<link rel="stylesheet" href="__CSS__/index.css"/>
<style type="text/css">

</style>
</head>

<body>
<div id="wrap">
    
    <div class="head_box">
        <div class="logo_img">
            <a href="/index.php/home"><img src="__IMG__/logo.jpg?v=1" ></a>
        </div>
        
        <!-- <div class="nav">
            <ul class="layui-nav">
                <li class="layui-nav-item"><a href="<?php echo url('index/index'); ?>"><span>首页</span></a></li>
                <li class="layui-nav-item"><a href="<?php echo url('order/order_list'); ?>"><span>订单列表</span></a></li>
                <li class="layui-nav-item"><a href="<?php echo url('product/product_list'); ?>"><span>产品列表</span></a></li>
                <li class="layui-nav-item"><a href="<?php echo url('product/product_add'); ?>"><span>产品添加</span></a></li>
                <li class="layui-nav-item"><a href="<?php echo url('admin/admin_user_password'); ?>"><span>修改密码</span></a></li>
            </ul>
        </div> -->
        <div class="login_info">
            <span><?php echo \think\Session::get('user_name'); ?>(<?php echo \think\Session::get('role_name'); ?>)</span>
            <a href="<?php echo url('Login/logout'); ?>">退出</a> 
        </div>
    </div>

    <div class="content">
        <div class="middle_left">
    <div class="layui-side layui-side-bg layui-larry-side" lay-filter="side" >

        <!-- <ul class="layui-nav layui-nav-tree admin-nav-tree"> -->
        <ul class="layui-nav layui-nav-tree" lay-filter="test">
            <?php foreach ($list_menu as $k => $v) { if($v['id']==1){ ?>
                <li class="layui-nav-item layui-nav-title layui-nav-itemed">
            <?php }else{ ?>
                <li class="layui-nav-item layui-nav-title layui-nav-itemed">
            <?php } ?>
                
                <a href="javascript:void(0);"><?php echo $v["menu_name"];?></a>
                <dl class="layui-nav-child">
                    <?php foreach ($v["menu"] as $k2 => $v2) { if($v2['a']==$action){ ?>
                            <dd class="layui-nav-item layui-nav-item-child "  >
                                <a target="right_frame" href_url="<?php echo url($v2['c'].'/'.$v2['a']);?>" data-url="<?php echo url($v2['c'].'/'.$v2['a']);?>" ><span><?php echo $v2["menu_name"];?></span></a>
                            </dd>
                        <?php }else{ ?>
                            <dd class="layui-nav-item layui-nav-item-child " >
                                <a target="right_frame" href_url="<?php echo url($v2['c'].'/'.$v2['a']);?>" data-url="<?php echo url($v2['c'].'/'.$v2['a']);?>" ><span><?php echo $v2["menu_name"];?></span></a>
                            </dd>
                        <?php } } ?>
                </dl>
            </li>
                
            <?php } ?>
        </ul>

    </div>
</div>
<style type="text/css">
.layui-nav .layui-nav-title>a{
    color: #ccc!important;
}
.layui-nav .layui-nav-title .layui-nav-child a{
    color: #ccc!important;
    background-color: #393D49!important;
}
</style>
<script type="text/javascript">

</script>
        <div class="middle_right">
            <div class="layui-tab layui-tab-card main_tab_box" id="main_tab" lay-filter="page-tab" lay-allowclose="true">
                <ul class="layui-tab-title">
                    <li class="layui-this"><span>首页</span></li>
                </ul>
                
                <div class="layui-tab-content" >
                    <div class="layui-tab-item layui-show">
                            <iframe src="/index.php/home/index/main.html"></iframe>
                    </div>
                </div>
                
            </div>

            <!-- <iframe name="right_frame" id="right_frame" src="/index.php/index/main" frameborder="false" scrolling="auto" style="border:none;" width="100%" allowtransparency="true" ></iframe> -->
        </div>
    </div>

</div>


</body>
</html>
<!-- 引入基础js和jquery -->

<script type="text/javascript">
/*赋予页面高度*/
$(function(){
    //var height =  $(window).height()-$(".head_box").height()
    //$(".content").height(height-6);
    //$("#right_frame").height(height);
    var height2 = $(".middle_right").height();
    $(".layui-tab-content").height(height2-$(".layui-tab-title").height()-3);
});
window.onresize = function(){
    var height2 = $(".middle_right").height();
    $(".layui-tab-content").height(height2-$(".layui-tab-title").height()-3);
    $(".layui-tab-content").find("iframe").height(height2-$(".layui-tab-title").height()-3);
}
</script>
