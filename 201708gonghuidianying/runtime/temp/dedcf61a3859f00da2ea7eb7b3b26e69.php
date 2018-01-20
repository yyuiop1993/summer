<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\www\baogesh/application/home\view\service\service_suc_show.html";i:1496739228;s:57:"D:\www\baogesh/application/home\view\Common\baseHome.html";i:1495526082;}*/ ?>
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
.list_table tbody tr>th{
    text-align: right;
}
.list_table .parts_table th{
    text-align: left;
}
.view_status{
    display: block;
    overflow: hidden;
    margin-left:30px;
    min-width: 1010px;
}
.view_status li{
    float: left;
    width: 120px;
    height: 80px;
    position: relative;
}
.view_status h3{
    position: absolute;
    width: 120px;
    text-align: center;
    top: 15px;
    left: 0px;
}

.view_status .status_yuan{
    margin-top: 33px;
    width: 10px;
    height: 10px;
    border-radius: 10px;
    float: left;
    border:2px solid #999999;
}
.view_status .status_xian{
    width: 106px;
    height: 4px;
    margin-top:38px;
    float: left;
    background-color: #999999;
}.view_status li.on>.status_yuan{
    border-color: #F50;
}
.view_status li.on>.status_xian{
    border-color: #F50;
    background-color: #F50;
}
</style>

<!-- 每个页面独自的css -->
</head>

<body style="height:auto;">
    
    

<!-- <span class="layui-breadcrumb">
    <a href="<?php echo url('staff/staff_list'); ?>">员工列表</a>
    <a><cite>工资流水</cite></a>
</span> -->

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend><?php echo $headArr['title']; ?></legend>
</fieldset>
 


<div class="view_status">
    <ul>
         <li class="on">
            <h3>提交人</h3>
            <div class="status_yuan"></div>
            <div class="status_xian"></div>
        </li>
        
        <li class="<?php if($data['status2'] == 2): ?>on<?php endif; ?>">
            <h3>质保部</h3>
            <div class="status_yuan"></div>
            <div class="status_xian"></div>
        </li>

        <li class="<?php if($data['status3'] == 2): ?>on<?php endif; ?>">
            <h3>质保部长</h3>
            <div class="status_yuan"></div>
            <div class="status_xian"></div>
        </li>

        <li class="<?php if($data['status4'] == 2): ?>on<?php endif; ?>">
            <h3>生产采购</h3>
            <div class="status_yuan"></div>
            <div class="status_xian"></div>
        </li>

        <li class="<?php if($data['status5'] == 2): ?>on<?php endif; ?>">
            <h3>技术部</h3>
            <div class="status_yuan"></div>
            <div class="status_xian"></div>
        </li>

        <li class="<?php if($data['status6'] == 2): ?>on<?php endif; ?>">
            <h3>财务部</h3>
            <div class="status_yuan"></div>
            <div class="status_xian"></div>
        </li>

    </ul>
</div>




<table class="layui-table list_table">
    <colgroup>
        <col width="200">
        <col>
    </colgroup>
    <thead>
        <!-- <tr>
          <th>人物</th>
          <th>民族</th>
        </tr>  -->
    </thead>
    <tbody>

        <tr>
            <th>文件编号：</th>
            <td><?php echo $data['order_num']; ?></td>
        </tr>

        <tr>
            <th>录入时间：</th>
            <td><?php echo date("Y-m-d",$data['add_time']); ?></td>
        </tr>

        <tr>
            <th>检验员：</th>
            <td><?php echo $data['username']; ?></td>
        </tr>

        <tr>
            <th>服务站名称：</th>
            <td><?php echo $data['role_name']; ?></td>
        </tr>

        <tr>
            <th>标题：</th>
            <td><?php echo $data['title']; ?></td>
        </tr>
        
        <tr>
            <th>类型：</th>
            <td><?php echo $data['type_name']; ?></td>
        </tr>

        <tr>
            <th>责任部门：</th>
            <td><?php echo $data['department']; ?></td>
        </tr>

        <tr>
            <th>产品型号与名称：</th>
            <td><?php echo $data['product_code']; ?></td>
        </tr>
        <tr>
            <th>发生位置：</th>
            <td><?php echo $data['happen_position']; ?></td>
        </tr>


        <tr>
            <th>零件图号和名称：</th>
            <td><?php echo $data['part_code']; ?></td>
        </tr>

        <tr>
            <th>零件数量：</th>
            <td><?php echo $data['part_num']; ?></td>
        </tr>

        <tr>
            <th>问题描述和原因分析：</th>
            <td><?php echo $data['description']; ?></td>
        </tr>



        <tr>
            <th>图片：</th>
            <td>
                <table class="layui-table parts_table" style="width:350px; margin-left: 1px;">
                <colgroup>
                    <col width="100">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th>预览</th>
                    </tr> 
                </thead>

                <tbody>
                    <?php if(is_array($img_data) || $img_data instanceof \think\Collection || $img_data instanceof \think\Paginator): if( count($img_data)==0 ) : echo "" ;else: foreach($img_data as $key=>$v): ?> 
                    <tr class="parts_list">
                        <td>
                            <a class="example" href="/<?php echo $v['src']; ?>">
                                <img src="/<?php echo $v['src_300']; ?>" style="display: inline;width: 300px;" />
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                </tbody>

                </table>
            </td>
        </tr>


    </tbody>
</table>




<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>审批信息</legend>
</fieldset>

<?php if(is_array($view_data) || $view_data instanceof \think\Collection || $view_data instanceof \think\Paginator): if( count($view_data)==0 ) : echo "" ;else: foreach($view_data as $key=>$v): ?>
<table class="layui-table" style="margin-top: 10px;">
    <colgroup>
        <col width="150">
        <col>
    </colgroup>
    <thead>
    </thead>
    <tbody>
        <tr>
            <th>部门：</th>
            <td><?php echo $v['role_name']; ?></td>
        </tr>
        <tr>
            <th>是否通过</th>
            <td>
                <?php if($v['view_status'] == '2'): ?>
                通过
                <?php else: ?>驳回
                <?php endif; ?>
            </td>
            
        </tr>
        <tr>
            <th>审批意见</th>
            <td>
                <?php echo $v['view_content']; ?>
            </td>
        </tr>
    </tbody>
</table>
<?php endforeach; endif; else: echo "" ;endif; ?>




<div style="height:150px;">&nbsp;</div>


    
</body>
</html>

<script type="text/javascript">
/*赋予页面高度*/
$(function(){
    parent.index_close();
});
</script>

<script type="text/javascript" src="__JS__/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__JS__/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="__JS__/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script type="text/javascript">
/*
//微信点击图片
$(".qx_img img").click(function(){
    var img = $(this).attr("src");
    var img2= img.replace("!300","");
    wx.previewImage({
        current: img,
        urls: [img2]
    });
});
*/
$(function(){

    $("a.example").fancybox();
    
    $(".save_form").click(function(){
        var temp = $("#map input[type=radio]").val();
        if(temp==''){
            layer.alert("请选择是否通过!",{icon: 2},function(){
                //$(".title").focus();
            });
            return false;
        }

        var temp = $(".group_content").val();
        if(temp==''){
            layer.alert("请填写审批意见!",{icon: 2},function(){
                //$(".fault_code").focus();
            });
            return false;
        }

        var loading = layer.load(2, {shade: [0.5,'#fff']});
        $.post("<?php echo url('service/ajax_service_show'); ?>",$("#map").serialize(),function(data){
            layer.close(loading);
            //console.log(data.status);
            if(data.status){ 
                index = layer.alert('保存成功',{icon: 1},function(){
                    window.location.href = "<?php echo url('service/service_list'); ?>";
                });
            }else{
                layer.alert(data.msg,{icon: 2});
                //window.reload();
            }
        });

    });
    
});

</script>
