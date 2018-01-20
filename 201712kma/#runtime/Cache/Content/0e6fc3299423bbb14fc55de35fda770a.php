<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
    <meta name="description" content="<?php echo ($SEO['description']); ?>" />
    <meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />

    <link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/base.css">
    <link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/index.css">
</head>
<body>

    <!-- header start -->
    <div class="header clearfix min-w">
        <div class="head-bg"></div>

        <div class="nav-bg">
            <div class="nav">

                <div class="logo fl">
                    <a href="/index.php"><img class="" src="<?php echo ($config_siteurl); ?>statics/default/images/logo.png"></a>
                </div>
                
                <ul class="nav-list fr">

                    <li class="li1 <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>current<?php endif; ?>"><a href="/index.php" >首页</a></li>
                    
                    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'7','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?>><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>

            </div>
        </div>

    </div>

    <div class="flexslider">
        <ul class="slides">

            <li data-thumb="<?php echo ($config_siteurl); ?>statics/default/images/banner1.jpg">
                <img src="<?php echo ($config_siteurl); ?>statics/default/images/banner1.jpg" alt="" />
            </li>

            <li data-thumb="<?php echo ($config_siteurl); ?>statics/default/images/banner2.jpg">
                <img src="<?php echo ($config_siteurl); ?>statics/default/images/banner2.jpg" alt="" />
            </li>
            
        </ul>
    </div>
    

    <div class="search_box clearfix">
        姓名：[<input type="text" name="name" id="name" autocomplete="off" placeholder="请输入姓名。" >]
        身份证：[<input type="text" name="card" id="card" autocomplete="off" placeholder="请输入身份证号。" >]
        <button class="text_btn"></button>
    </div>
    <!-- footer end -->
    
    <!-- <div class="code_shadow"></div> -->
    <div class="code_boxs clearfix" style="display: none;">
            <input type="text" autocomplete="off" name="code" id="code" placeholder="请输入验证码。" />
            <img src="/index.php?g=Api&m=Checkcode&type=gbook&code_len=4&font_size=20&width=100&height=30&font_color=&background=&refresh=1" onclick="refreshs()" style="cursor: pointer;" id="code_img" width="110" height="30" >
            
            <br>
        <div class="code_item">
            <button class="sub_btn">提交</button>
        </div>
    </div>


    <div class="floor floor2 clearfix">
        <div class="floor2_title">
            CURRICULUM
            <hr>
            课程分类
        </div>

        <ul class="teacher_tab">

            <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'7','num'=>'5','order'=>'listorder desc','thumb'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <!-- <div class="tab_title"><?php echo ($vo["catname"]); ?></div> -->
                        <a href="<?php echo ($vo["url"]); ?>" target='_blank' >
                            <img src="<?php echo ($vo["image"]); ?>" alt="<?php echo ($vo["title"]); ?>" title="<?php echo ($vo["title"]); ?>">
                            <div class='item_shadow'><?php echo ($vo["catname"]); ?></div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>

        <!-- <div class="teacher_boxs" style="display: none;">

            <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'7','num'=>'5','order'=>'listorder desc','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><ul class="teacher_item">
                        <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$v['catid'],'num'=>'4','order'=>'listorder DESC','thumb'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li data-href="<?php echo ($vo["url"]); ?>" data-title="<?php echo ($vo["title"]); ?>" >
                                    <img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>" title="<?php echo ($vo["title"]); ?>">
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            
        </div> -->

        <!-- <a href="<?php echo getCategory(7,'url');?>" target="_blank">
            <div class="more">查看更多&nbsp;&nbsp;&nbsp;&nbsp;→</div>
        </a> -->

    </div>

    <div class="floor floor3 clearfix">
        <div class="floor3_title">教练阵容<span>COACHING TEAM</span></div>
        <ul class="coach_box">
            <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'2','num'=>'5','order'=>'listorder DESC','thumb'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="coach_item">
                        <a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>" title="<?php echo ($vo["title"]); ?>">
                        <a href="<?php echo ($vo["url"]); ?>"><div class="item_title"><?php echo ($vo["title"]); ?></div></a> 
                        <div class="item_content"><?php echo ($vo["description"]); ?></div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>


    <div class="floor floor4 clearfix">
        <div class="floor4_box">
            <div class="floor4_box_main">
                <span>KAM泰拳拳击馆</span>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;WMC全名世界泰拳理事会，其业务主要是竞技性的赛事注册管理和推广。WMC同样受到政府认可，竞技相关的申请一般都通过它审核。KMA则是非盈利性的泰国政府官方机构，主要上司是泰国的文化教育部门，偏重于泰拳在世界范围内的教学，建立标准，管理教师和教学内容。WMC没有泰拳教学、考级方面相关的业务板块。通俗一点来说，WMC是各大竞赛品牌的管理者，而KMA是各大教学品牌的管理者。</p>
            </div>
        </div>
    </div>

    <div class="floor floor5 clearfix">
        <div class="floor5_title">KMA全球频道  与您国际化同行</div>
        <div class="point-area" style="top: 197px;left: 862px;position: absolute; width: 80px; height: 80px; visibility: visible; opacity: 1;">
            <p class="point-name" style="position: absolute; top: 30px; left: 50px;">临沂</p>
            <a class="point point-dot"></a>
            <div class="point point-10"></div>
            <div class="point point-40"></div>
            <div class="point point-70"></div>
        </div>
    </div>

    



<div class="footer clearfix">
    <div class="footer_box">
        <div class="footer_left">
            <img class="left_logo" src="<?php echo ($config_siteurl); ?>statics/default/images/logo2.png">
            <div class="footer_left_code">
                <img src="<?php echo ($config_siteurl); ?>statics/default/images/code1.png">
                <img src="<?php echo ($config_siteurl); ?>statics/default/images/code2.png">
                <img src="<?php echo ($config_siteurl); ?>statics/default/images/code3.png">
            </div>
        </div>
        <div class="footer_right">
            <ul class="footer_nav">
                <li><a href="/index.php" >首页</a></li>
                <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'7','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            
            <?php echo cache('Config.footerinfo');?>
            
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/layer/layer.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
/*隐藏电脑端段位查询*/
    $(".nav li").each(function(){
        if($(this).find("a").text()=='段位查询'){
            $(this).hide();
        }
    });
    $(".footer_nav li").each(function(){
        if($(this).find("a").text()=='段位查询'){
            $(this).hide();
        }
    });
</script>



<script type="text/javascript">
$(function(){
    $('.flexslider').flexslider({
        animation: "slide", 
        directionNav: true,
        //pauseOnAction: false,
        controlNav: "true"
    });
});

/*搜索框点击*/
$(".text_btn").click(function(){
    var name = $("#name").val();
    if(name == ''){
        layer.alert("请输入姓名。");
        return false;
    }

    var card = $("#card").val();
    if(card == ''){
        layer.alert("请输入身份证号。");
        return false;
    }

    var load_index = layer.load(2, {shade: false});
    $.ajax({
        type : "post",
        url : "<?php echo U('Content/Gbook/findstudent');?>",
        data : {
            'name' : name,
            'card' : card
        },
        async : true,
        success : function(data) {    
            layer.close(load_index);
            if (data.status == "-2") {
                layer.alert("没有此用户");
            }else if (data.status == "-3") {
                layer.alert("错误提交。");
            } else if(data.status == 1){
                layer.alert('姓名：'+data.uname+'<br>段位：'+data.duanwei);
            }     
        }
    });

    /*layer.open({
        type: 1,
        skin: 'layui-layer-rim', //加上边框
        area: ['380px', '200px'], //宽高
        content: $(".code_boxs")
    });*/
});
/*验证码点击*/
$("body").on("click",".sub_btn",function(){

    var name = $("#name").val();
    var card = $("#card").val();
    var code = $("#code").val();
    if(code == ''){
        layer.alert("请输入验证码。");
        return false;
    }

    var load_index = layer.load(2, {shade: false});
    $.ajax({
        type : "post",
        url : "<?php echo U('Content/Gbook/findstudent');?>",
        data : {
            'name' : name,
            'card' : card,
            'code' :code
        },
        async : true,
        success : function(data) {    
            layer.close(load_index);
            if (data == "-1") {
                layer.alert("验证码错误");
            }else if (data == "-2") {
                layer.alert("没有此用户");
            }else if (data == "-3") {
                layer.alert("错误提交。");
            } else if(data >= 1){
                window.open("<?php echo U('Content/Gbook/student_jump');?>&id="+data); 
            }    
        }
    });

});
/*tab切换*/
$(".teacher_tab li:first").addClass("current");
$(".teacher_tab li").hover(function(){
    $(this).addClass("current").siblings().removeClass("current");
    //$(".teacher_item").eq($(this).index()).show().siblings().hide();
});
/*鼠标经过红色阴影*/
/*$(".teacher_item li").hover(function(){
    var html = "<a href="+$(this).attr("data-href")+" target='_blank' ><div class='item_shadow'>"+$(this).attr("data-title")+"</div></a>";
    $(this).append(html);
},function(){
    $(".item_shadow").remove();
});*/

function refreshs(){
    document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=100&height=30&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
}

</script>