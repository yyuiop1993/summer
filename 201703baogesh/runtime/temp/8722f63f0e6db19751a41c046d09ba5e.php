<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\freehost\zhidui0301\web/application/wx\view\service\service_show.html";i:1498529178;s:67:"E:\freehost\zhidui0301\web/application/wx\view\Common\baseHome.html";i:1493860094;}*/ ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="white" />

<head>
<!-- 引入icon -->
<link rel="icon" href="__IMG__/favicon.ico" />
<!-- 引入base.css -->
<link rel="stylesheet" href="__CSS__/base.css"/>

<script type="text/javascript" src="__JS__/layui/layui.js"></script>
<link rel="stylesheet" href="__JS__/layui/css/layui.css"/>

<!-- layer单独使用 -->
<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<link rel="stylesheet" href="__JS__/layer/skin/default/layer.css"/>
<!-- 引入基础js和jquery -->
<script type="text/javascript" src="__JS__/jquery-2.1.4.min.js"></script>

<title><?php echo $headArr['title']; ?></title>
<meta name="keywords" content="<?php echo $headArr['keyword']; ?>"/>
<meta name="description" content="<?php echo $headArr['description']; ?>"/>




<link rel="stylesheet" href="__CSS__/curd.css"/>
<style type="text/css">
.list_table tbody tr>th{
    text-align: right;
}
.list_table .parts_table th{
    text-align: left;
}

/*status3 on*/
.view_status .staut_yx_yb.on .status_xian,.view_status .staut_yx_yb.on .status_bian,.view_status .staut_yx_yb.on .status_bian2{
    background-color: #F50;
}

tbody tr th{
    width: 30%;
}

</style>

<style type="text/css">

</style>
<!-- 每个页面独自的css -->
</head>

<body style="height:100%">

<div id="wrap">
    

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend><?php echo $headArr['title']; ?></legend>
</fieldset>
 
<table class="layui-table list_table">
    <colgroup>
        
    </colgroup>
    <thead>

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
            <th>处理人：</th>
            <td><?php echo $data['chuli_user']; ?></td>
        </tr>

        <tr>
            <th>处理措施：</th>
            <td><?php echo $data['chuli_cuoshi']; ?></td>
        </tr>

        <tr>
            <th>处理时间：</th>
            <td><?php echo $data['chuli_time']; ?></td>
        </tr>
        <tr>
            <th>备注</th>
            <td><?php echo $data['beizhu']; ?></td>
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
<table class="layui-table">
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


</div>


</body>
</html>

<script type="text/javascript">


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
                    window.location.href = "<?php echo url('service/service_show'); ?>?id="+data.service_id;
                });
            }else{
                layer.alert(data.msg,{icon: 2});
                //window.reload();
            }
        });

    });
    
});

</script>
