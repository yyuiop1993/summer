<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\www\201708taierzhuang/application/admin\view\vote\user_list.html";i:1504081768;s:68:"D:\www\201708taierzhuang/application/admin\view\Common\baseHome.html";i:1503650615;}*/ ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<!-- 引入icon -->
<link rel="icon" href="__IMG__/favicon.ico" />
<!-- 引入base.css -->
<link rel="stylesheet" href="__CSS__/base.css"/>
<!-- 引入layui -->
<script type="text/javascript" src="__JS__/layui/layui.js"></script>
<link rel="stylesheet" href="__JS__/layui/css/layui.css"/>
<link rel="stylesheet" href="__CSS__/layui_user.css"/>
<!-- layer单独使用 -->
<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<link rel="stylesheet" href="__JS__/layer/skin/default/layer.css"/>

<!-- 引入基础js和jquery -->
<script type="text/javascript" src="__JS__/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="__JS__/jquery-pjax-master/jquery.pjax.js"></script>
<script type="text/javascript" src="__JS__/baseHome.js"></script>

<script language="javascript" type="text/javascript" src="__JS__/My97DatePicker/WdatePicker.js"></script>

<title><?php echo $headArr['title']; ?></title>
<meta name="keywords" content="<?php echo $headArr['keyword']; ?>"/>
<meta name="description" content="<?php echo $headArr['description']; ?>"/>

<link rel="stylesheet" href="__CSS__/baseHome.css"/>

<link rel="stylesheet" href="__CSS__/curd.css"/>
<style type="text/css">
.menu_del{color: #192E32; text-decoration: underline;}
.menu_del:hover{color: #F50;}
</style>

<!-- 每个页面独自的css -->
</head>

<body style="height:auto;">
    
    
<div class="main">
    <div class="form_div">
        <form action="#" method="get" id="menu_list_search" class="layui-form layui-form-pane">
           　
            <input type="hidden" name="m" value="menu">
            <input type="hidden" name="a" value="menu_list">
            
            <div class="search_icon">
                <i class="layui-icon">&#xe615;</i>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="keyword" lay-verify="title" autocomplete="off"  placeholder="请输入名称." class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">身份证号</label>
                <div class="layui-input-block">
                    <input type="text" name="card" lay-verify="title" autocomplete="off"  placeholder="请输入身份证号." class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">手机号</label>
                <div class="layui-input-block">
                    <input type="text" name="mobile" lay-verify="title" autocomplete="off"  placeholder="请输入手机号." class="layui-input">
                </div>
            </div>

            <button class="layui-btn layui-btn-danger" lay-submit lay-filter="menu_list_search" >搜索</button>
            

        </form>
    </div>
    <form action="/admin.php/menu/menu_sort" method="post" >
    

    <div class="list_div" id="listDiv">
    <fieldset class="layui-elem-field">
        <legend>信息</legend>
        <div class="layui-field-box">
            累计用户：<?php echo $ip; ?>
        </div>
    </fieldset>

        <table class="layui-table">
            <colgroup>
                <col width="60">
                <col width="10%">
                <col>
                <col>
                <col width="260">
            </colgroup>
            <thead>
                <tr>
                    <th>编号</th>
                    <th>姓名</th>
                    <th>手机号</th>
                    <th>身份证号</th>
                    <th>购票单位</th>
                    <th>是否发送短信</th>
                    <th>是否购票</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>

                <?php foreach($list_data as $v): ?> 
                    <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['name']; ?></td>
                        <td><?php echo $v['mobile']; ?></td>
                        <td><?php echo $v['card']; ?></td>
                        <td><?php echo $v['work_unit']; ?></td>
                        <td class="work_unit">
                            <?php if($v['status'] == 2): ?> <span style="color:#FF0005;">是</span>
                            <?php else: ?> 否
                            &nbsp;&nbsp;&nbsp;<button type="button" data="<?php echo $v['id']; ?>" class="layui-btn layui-btn-danger layui-btn-small send_msg">发送短信</button>
                            <?php endif; ?>     
                        </td>

                        <td class="work_unit">
                            <?php if($v['buy'] == 2): ?> <span style="color:#FF0005;">是</span>
                            <?php else: ?> 否
                            &nbsp;&nbsp;&nbsp;<button type="button" class="layui-btn layui-btn-danger  layui-btn-small set_on" data="<?php echo $v['id']; ?>" style="color: #fff" >设置已购票</button>
                            <?php endif; ?>     
                        </td>


                        <td>
                            <a href="<?php echo url('vote/user_detial'); ?>?id=<?php echo $v['id']; ?>"><button type="button" class="layui-btn layui-btn-small layui-btn-normal">查看详情</button></a>
                            &nbsp;&nbsp;
                            

                            
                            <button type="button" class="layui-btn layui-btn-small menu_del" data="<?php echo $v['id']; ?>" style="color: #fff" >删除</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        <div class="pagediv"><?php echo $list_data->render(); ?></div>
        
        <div style="height: 50px;">&nbsp;</div>
    </div>


</div>

    
</body>
</html>

<script type="text/javascript">
/*赋予页面高度*/
$(function(){
    //parent.index_close();
});
</script>

<script type="text/javascript">

$(".send_msg").click(function(){

    var _this = $(this);
    var id = _this.attr("data");
    layer.confirm('您确定要发送短信吗？', {
        btn: ['确定','取消'] //按钮
    }, function(index){
        layer.close(index);  

        var index_load = layer.load(2, {shade: 0.5});
        $.post("<?php echo url('vote/user_send'); ?>",{id:id},function(data){
            layer.close(index_load); 
            if(data.status){
                layer.msg(data.msg,{icon: 1}); 
            }else{
                layer.msg(data.msg,{icon: 2});   
            }
        });

    }, function(index){
        layer.close(index);    
    });


});
    

$(".set_on").click(function(){

    var _this = $(this);
    var id = _this.attr("data");
    layer.confirm('您确定要设成已购票吗？', {
        btn: ['确定','取消'] //按钮
    }, function(index){
        layer.close(index);  

        var index_load = layer.load(2, {shade: 0.5});
        $.post("<?php echo url('vote/user_set'); ?>",{id:id},function(data){
            layer.close(index_load); 
            if(data.status){
                layer.msg(data.msg,{icon: 1}); 
            }else{
                layer.msg(data.msg,{icon: 2});   
            }
        });

    }, function(index){
        layer.close(index);    
    });


});


$(".send_msg").click(function(){

    var _this = $(this);
    var id = _this.attr("data");
    layer.confirm('您确定要发送短信吗？', {
        btn: ['确定','取消'] //按钮
    }, function(index){
        layer.close(index);  

        var index_load = layer.load(2, {shade: 0.5});
        $.post("<?php echo url('vote/user_send'); ?>",{id:id},function(data){
            layer.close(index_load); 
            if(data.status){
                layer.msg(data.msg,{icon: 1}); 
            }else{
                layer.msg(data.msg,{icon: 2});   
            }
        });

    }, function(index){
        layer.close(index);    
    });


});
	

$(".menu_del").click(function(){
    var _this = $(this);
    var id = _this.attr("data");
    layer.confirm('您确定要删除吗？', {
        btn: ['确定','取消'] //按钮
    }, function(index){
        layer.close(index);    
        var id = _this.attr("data");
        var index_load = layer.load(2, {shade: 0.5});
        $.post("<?php echo url('vote/user_del'); ?>",{id:id},function(data){
            layer.close(index_load); 
            if(data.status){
                layer.msg(data.msg,{icon: 1});  
                _this.parents("tr").remove();
            }else{
                layer.msg(data.msg,{icon: 2});   
            }
        });
    }, function(index){
        layer.close(index);    
    });
});


</script>
