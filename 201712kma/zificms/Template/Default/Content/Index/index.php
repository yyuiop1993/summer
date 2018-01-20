<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />

    <link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/default/css/index.css">
</head>
<body>

    <!-- header start -->
    <div class="header clearfix min-w">
        <div class="head-bg"></div>

        <div class="nav-bg">
            <div class="nav">

                <div class="logo fl">
                    <a href="/index.php"><img class="" src="{$config_siteurl}statics/default/images/logo.png"></a>
                </div>
                
                <ul class="nav-list fr">

                    <li class="li1 <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> current</if>"><a href="/index.php" >首页</a></li>
                    
                    <content action="category" catid="0" num='7'  order="listorder ASC" >
                        <volist name="data" id="vo">
                            <li <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>><a href="{$vo.url}">{$vo.catname}</a></li>
                        </volist>
                    </content>

                </ul>

            </div>
        </div>

    </div>

    <div class="flexslider">
        <ul class="slides">

            <li data-thumb="{$config_siteurl}statics/default/images/banner1.jpg">
                <img src="{$config_siteurl}statics/default/images/banner1.jpg" alt="" />
            </li>

            <li data-thumb="{$config_siteurl}statics/default/images/banner2.jpg">
                <img src="{$config_siteurl}statics/default/images/banner2.jpg" alt="" />
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

            <content action="category"  catid="7" num='5'  order="listorder desc" thumb="1" >
                <volist name="data" id="vo">
                    <li>
                    <!-- <div class="tab_title">{$vo.catname}</div> -->
                        <a href="{$vo.url}" target='_blank' >
                            <img src="{$vo.image}" alt="{$vo.title}" title="{$vo.title}">
                            <div class='item_shadow'>{$vo.catname}</div>
                        </a>
                    </li>
                </volist>
            </content>

        </ul>

        <!-- <div class="teacher_boxs" style="display: none;">

            <content action="category" catid="7" num='5' order="listorder desc" >
                <volist name="data" id="v">
                    <ul class="teacher_item">
                        <content action="lists" catid="$v['catid']" num='4' order="listorder DESC" thumb="1" >
                            <volist name="data" id="vo" key='k'>
                                <li data-href="{$vo.url}" data-title="{$vo.title}" >
                                    <img src="{$vo.thumb}" alt="{$vo.title}" title="{$vo.title}">
                                </li>
                            </volist>
                        </content>
                    </ul>
                </volist>
            </content>
            
        </div> -->

        <!-- <a href="{:getCategory(7,'url')}" target="_blank">
            <div class="more">查看更多&nbsp;&nbsp;&nbsp;&nbsp;→</div>
        </a> -->

    </div>

    <div class="floor floor3 clearfix">
        <div class="floor3_title">教练阵容<span>COACHING TEAM</span></div>
        <ul class="coach_box">
            <content action="lists" catid="2" num='5' order="listorder DESC" thumb="1" >
                <volist name="data" id="vo" key='k'>
                    <li class="coach_item">
                        <a href="{$vo.url}"><img src="{$vo.thumb}" alt="{$vo.title}" title="{$vo.title}">
                        <a href="{$vo.url}"><div class="item_title">{$vo.title}</div></a> 
                        <div class="item_content">{$vo.description}</div>
                    </li>
                </volist>
            </content>
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

    

<template file="Content/footer.php"/>



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
        url : "{:U('Content/Gbook/findstudent')}",
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
        url : "{:U('Content/Gbook/findstudent')}",
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
                window.open("{:U('Content/Gbook/student_jump')}&id="+data); 
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