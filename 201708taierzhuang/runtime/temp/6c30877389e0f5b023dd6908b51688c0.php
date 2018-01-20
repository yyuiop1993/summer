<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/www/wwwroot/tez.lyzfrj.com/application/admin/view/param/param_list.html";i:1493108693;s:71:"/www/wwwroot/tez.lyzfrj.com/application/admin/view/Common/baseHome.html";i:1504101306;}*/ ?>
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

<body style="height:100%;">
    
    
<div class="main">
    <div class="form_div">
        <form action="#" method="get" id="menu_list_search" class="layui-form layui-form-pane">
            
            <div class="search_icon">
                <i class="layui-icon">&#xe615;</i>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">参数名称：</label>
                <div class="layui-input-block">
                    <input type="text" name="keyword" lay-verify="title" autocomplete="off"  placeholder="请输入菜单名称." class="layui-input">
                </div>
            </div>

            <button class="layui-btn layui-btn-danger" lay-submit lay-filter="menu_list_search" >搜索</button>
            
            <a href="<?php echo url('param/param_add'); ?>" class="add_button" >添加新参数</a>

        </form>
    </div>
    <form action="<?php echo url('param/param_save'); ?>" method="post" >
    <div class="list_div" id="listDiv">
        <table class="layui-table">
            <colgroup>
                <col width="5%">
                <col width="15%">
                <col width="55%">
                <col width="20%">
            </colgroup>
            <thead>
                <tr>
                    <th>编号</th>
                    <th>名称</th>
                    <th>值</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($list_data) || $list_data instanceof \think\Collection || $list_data instanceof \think\Paginator): if( count($list_data)==0 ) : echo "" ;else: foreach($list_data as $ko=>$v): ?>
                    <tr>
                        <td><?php echo $v['id']; ?><input type="hidden" name="id[]" value="<?php echo $v['id']; ?>"  /></td>
                        <td><?php echo $v['param']; ?></td>
                        <td><input type="text" name="value" value="<?php echo $v['value']; ?>" class="layui-input"  /></td>
                        <td>
                        	<a href="<?php echo url('param/param_edit'); ?>?id=<?php echo $v['id']; ?>">修改</a>
                            <a data="<?php echo $v['id']; ?>"  class="param_del"  >删除</a>
                        </td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        
        <div style="margin: 20px 0 50px 20px;">
            <button class="layui-btn layui-btn-normal">　保存　</button>
        </div>
        
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
$(".param_del").click(function(){
    var _this = $(this);
    var id = _this.attr("data");
    layer.confirm('您确定要删除吗？', {
        btn: ['确定','取消'] //按钮
    }, function(index){
        layer.close(index);    
        var id = _this.attr("data");
        var index_load = layer.load(2, {shade: 0.5});
        $.post("<?php echo url('param/param_del'); ?>",{id:id},function(data){
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
