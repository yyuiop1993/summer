<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\freehost\zhidui0301\web/application/wx\view\service\service_edit.html";i:1499049219;s:67:"E:\freehost\zhidui0301\web/application/wx\view\Common\baseHome.html";i:1493860094;}*/ ?>
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



<link rel="stylesheet" href="__CSS__/service_add.css"/>
<style type="text/css">
#get_province{
    margin-left: 2px;
}
#get_province,#get_city,.work_envir{
    border: 1px solid #333;
    width: 140px;
    height: 24px;
    line-height: 24px;
}
.system_main,.system_part{
    border: 1px solid #333;
    width: 140px;
    height: 24px;
    line-height: 24px;
}
.parts_table thead th span{
    display: block;
    height: 20px; 
    width: 4em;
    text-align: center;
    line-height: 20px;
    background-color: #f50;
    color: #fff;
    border-radius: 3px;
}
.parts_table tbody td input[type='text']{
    width: 100%;
    padding-left: 2px;
}
.parts_table tbody td{
    padding: 5px;
}
.machine_model{
    border:1px solid #000;
}
select{
    width: 80%;
}
</style>

<style type="text/css">

</style>
<!-- 每个页面独自的css -->
</head>

<body style="height:100%">

<div id="wrap">
    
<div class="back">
    <a href="<?php echo url('service/index'); ?>">&lt;返回</a>
    产品质量信息反馈单
</div>

<form id="map">
    <div class="content">

        <div class="map_form">

            <div class="form_item">
                <label class="form_label">文件编号：</label>
                <div class="input_block">
                    <input type="text" name="order_num" class="order_num" readonly value="<?php echo $data['order_num']; ?>" autocomplete="off" />
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">日期：</label>
                <div class="input_block">
                    <input type="text"  value='<?php echo date("Y-m-d",$data['add_time']); ?>' readonly autocomplete="off" />
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">检验员：</label>
                <div class="input_block">
                    <input type="text" value="<?php echo \think\Session::get('role_name'); ?>" readonly autocomplete="off" /><span>*</span>
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">选定审批人：</label>
                <div class="input_block">
                    <select name="user_id2" class="user_id2">
                        <option value ="0">请选择</option>
                        <?php if(is_array($zl_user) || $zl_user instanceof \think\Collection || $zl_user instanceof \think\Paginator): if( count($zl_user)==0 ) : echo "" ;else: foreach($zl_user as $k=>$v): if($data['user_id2'] == $v['admin_id']): ?>
                                <option value ="<?php echo $v['admin_id']; ?>" selected><?php echo $v['username']; ?></option>
                            <?php else: ?>
                                <option value ="<?php echo $v['admin_id']; ?>"><?php echo $v['username']; ?></option>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?><span>*</span>
                    </select>
                </div>
            </div>

            
            <div class="form_item">
                <label class="form_label">标题：</label>
                <div class="input_block">
                    <input type="text" name="title" class="title" required="" placeholder="请输入标题"  value="<?php echo $data['title']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">选择类型：</label>
                <div class="input_block">
                    <select name="type" class="type">
                        <option value ="0">请选择</option>
                        <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): if( count($type)==0 ) : echo "" ;else: foreach($type as $k=>$v): if($data['type'] == $v['id']): ?>
                                <option value ="<?php echo $v['id']; ?>" selected><?php echo $v['name']; ?></option>
                            <?php else: ?>
                                <option value ="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?><span>*</span>
                    </select>
                </div>
            </div>
            
            <div class="form_item">
                <label class="form_label">责任部门：</label>
                <div class="input_block">
                    <input type="text" name="department" class="department" required="" placeholder="请输入责任部门" autocomplete="off" value="<?php echo $data['department']; ?>" />
                    <span>*</span>
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">产品型号和名称：</label>
                <div class="input_block">
                    <input type="text" name="product_code" class="product_code" required="" placeholder="请输入产品型号和名称"  value="<?php echo $data['product_code']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">发生位置：</label>
                <div class="input_block">
                    <input type="text" name="happen_position" class="happen_position" required="" placeholder="请输入发生位置"  value="<?php echo $data['happen_position']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>


            <div class="form_item">
                <label class="form_label">零件图号和名称：</label>
                <div class="input_block">
                    <input type="text" name="part_code" class="part_code" required="" placeholder="请输入零件图号和名称"  value="<?php echo $data['part_code']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">零件数量：</label>
                <div class="input_block">
                    <input type="text" name="part_num" class="part_num" required="" placeholder="请输入零件数量"  value="<?php echo $data['part_num']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>


            <div class="form_item" >
                <label class="form_label">问题描述和原因分析：</label>
                <div class="input_block">
                    <textarea name="description" class="description"><?php echo $data['description']; ?></textarea><span>*</span>
                </div>
            </div>


            <div class="form_item">
                <label class="form_label">索赔金额：</label>
                <div class="input_block">
                    <input type="text" name="cost_money" class="cost_money" required="" placeholder="请输入索赔金额"  value="<?php echo $data['cost_money']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>

            
            
            <div class="form_item">
                <label class="form_label">处理人：</label>
                <div class="input_block">
                    <input type="text" name="chuli_user" class="chuli_user" required="" placeholder="请输入处理人"  value="<?php echo $data['chuli_user']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">处理措施：</label>
                <div class="input_block">
                    <input type="text" name="chuli_cuoshi" class="chuli_cuoshi" required="" placeholder="请输入处理措施"  value="<?php echo $data['chuli_cuoshi']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">处理时间：</label>
                <div class="input_block">
                    <input type="text" name="chuli_time" class="chuli_time" required="" placeholder="请选择处理时间"  value="<?php echo $data['chuli_time']; ?>"  autocomplete="off" /><span>*</span>
                </div>
            </div>

            <div class="form_item">
                <label class="form_label">备注：</label>
                <div class="input_block">
                    <textarea name="beizhu" class="beizhu"><?php echo $data['beizhu']; ?></textarea><span>*</span>
                </div>
            </div>

            <div class="upload_form">
                <?php if(count($img_data)): ?>
                    <div class="form_item" style="height: auto;">
                        <label class="form_label">附加图片：</label>
                        <div class="input_block">
                            
                            <?php if(is_array($img_data) || $img_data instanceof \think\Collection || $img_data instanceof \think\Paginator): if( count($img_data)==0 ) : echo "" ;else: foreach($img_data as $key=>$v): ?> 
                             <div class="save_box" >
                                <img src="/<?php echo $v['src']; ?>" style="display: inline;" />
                                <input type="hidden" name="img_id[]" value="<?php echo $v['id']; ?>"  />
                                <input type="hidden" name="img[]" class="img_hidden img" value="<?php echo $v['src']; ?>"  />
                                <a class="img_button ">
                                     <input type="file" onchange="upload_img(this)" accept="image/gif,image/jpeg,image/jpg,image/png"><span>点击修改</span>
                                </a>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                        </div>
                    </div>
                <?php else: ?>

                    <div class="fault_img_body">

                        <div class="form_item" style="height: auto;">
                            <label class="form_label">附加图片：</label>
                            <div class="input_block">
                                 <div class="save_box" >
                                    <img src="" />
                                    <input type="hidden" name="img[]" class="img_1 img_hidden" data="4" />
                                    <a class="img_button ">
                                        <input type="file" onchange="upload_img(this,4)" accept="image/gif,image/jpeg,image/jpg,image/png"><span>点击上传</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="form_item" style="height: auto;">
                        <label class="form_label">&nbsp;</label>
                        <div class="input_block">
                             <button class="layui-btn layui-btn-small fault_img_but" type="button" >添加图片</button>
                        </div>
                    </div>

                <?php endif; ?>

            </div>

            <a href="javascript:void(0)" class="save_form" >点击保存</a>
        </div>

    </div>



<style type="text/css">
    .mask{
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
        opacity: 0.3;
        background-color: #000;
        display: none;
    }
    .mask_div{
        position: fixed;
        top: 50%;
        left: 50%;
        z-index: 101;
        margin-left: -16px;
        margin-top: -16px;
        height: 32px;
        width: 32px;
        display: none;
    }

</style>

<div class="mask"></div>
<div class="mask_div">


<img src="__JS__/layer/skin/default/loading-2.gif" />
</div>


<input type="hidden" name="id" class="id"  value="<?php echo $data['id']; ?>" />
</form>

</div>


</body>
</html>

<script type="text/javascript">


</script>


<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<link rel="stylesheet" href="__JS__/layer/skin/default/layer.css"/>

<script language="javascript" type="text/javascript" src="__JS__/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">


function upload_img(obj){
    
    var file = obj.files[0];  
    if($(obj).val()){

        $(".mask").show();
        $(".mask_div").show();

        //var index = layer.load(2, {shade: [0.3,'#000']});

    }else{
        return false;
    }
    //console.log($(obj).val());

    /*判断类型是不是图片*/
    if(!/image\/\w+/.test(file.type)){
        alert("请确保文件为图像类型!",{icon: 2});   
        return false;   
    }

    var reader = new FileReader();   
    reader.readAsDataURL(file);   
    reader.onload = function(e){   
        var img = this.result;

        if(img){
            //$(obj).parent().hide()
            $.post("<?php echo url('service/upload_img'); ?>",{img:img},function(data){
            
                $(".mask").hide();
                $(".mask_div").hide();

                if(data.status){ 
                    $(obj).parents(".save_box").find("img").attr("src",'/'+data.src).show()
                    $(obj).parents(".save_box").find("input.img_hidden").val(data.path);
                    $(obj).parents(".save_box").find(".img_button span").text("点击修改");
                }else{
                    alert(data.msg,{icon: 2});
                }
            });
        }else{
            alert("网络错误，请重新选择图片!",{icon: 2});   
            return false;   
        }
    }
    
}   


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

    

    $(".fault_img_but").click(function(){
        /*添加故障图片*/
        html =  '<div class="form_item" style="height: auto;">';
        html+=  '<label class="form_label">附加图片：</label>';
        html+=  '<div class="input_block">';
        html+=  '<div class="save_box" >';
        html+=  '<img src="" />';
        html+=  '<input type="hidden" name="img[]" data="4" />';
        html+=  '<a class="img_button ">';
        html+=  '<input type="file" onchange="upload_img(this,4)" accept="image/gif,image/jpeg,image/jpg,image/png"><span>点击上传</span>';
        html+=  '</a></div></div></div>';

        $(".fault_img_body").append(html);
        
    })



    $(".save_form").click(function(){
       

        var temp = $(".title").val();
        if(temp==''){
            alert("请填写标题!");
            $(".title").focus();
            return false;
        }

        
        var temp = $(".user_id2").val();
        if(temp==0){
            alert("请选择审批人!");
            $(".user_id2").focus();
            return false;
        }


        var temp = $(".type").val();
        if(temp==0){
            alert("请选择类型!");
            $(".type").focus();
            return false;
        }


        var temp = $(".department").val();
        if(temp==''){
            alert("请输入责任部门!");
            $(".department").focus();
            return false;
        }

        var temp = $(".product_code").val();
        if(temp==''){
            alert("请输入产品型号和名称!");
            $(".product_code").focus();
            return false;
        }


        var temp = $(".happen_position").val();
        if(temp==''){
            alert("请输入发生位置!");
            $(".happen_position").focus();
            return false;
        }

        var temp = $(".part_code").val();
        if(temp==''){
            alert("请输入零件图号和名称!");
            $(".part_code").focus();
            return false;
        }

        var temp = $(".part_num").val();
        if(temp==''){
            alert("请输入零件数量!");
            $(".part_num").focus();
            return false;
        }

        var temp = $(".description").val();
        if(temp==''){
            alert("请输入问题描述和原因分析!");
            $(".description").focus();
            return false;
        }
        
        var temp = $(".cost_money").val();
        if(temp==''){
            alert("请输入索赔金额!");
            $(".cost_money").focus();
            return false;
        }

        
       	
       	

        $(".mask").show();
        $(".mask_div").show();

        

        $.post("<?php echo url('service/ajax_service_edit'); ?>",$("#map").serialize(),function(data){
            $(".mask").hide();
            $(".mask_div").hide();

            //$(".text").append("<div>"+data+"</div>")



            //console.log(data.status);

            if(data.status){ 
                alert('保存成功');
                window.location.href = "<?php echo url('service/service_list'); ?>";
            }else{
                alert(data.msg);
                //window.reload();
            }
        });
    });


    
});

</script>
