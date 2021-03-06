<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\www\201708taierzhuang/application/admin\view\vote\user_add.html";i:1504076829;s:68:"D:\www\201708taierzhuang/application/admin\view\Common\baseHome.html";i:1503650615;}*/ ?>
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

<link rel="stylesheet" href="__CSS__/service_add.css"/>

<style type="text/css">

</style>


<!-- 每个页面独自的css -->
</head>

<body style="height:auto;">
    
    
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>增加新服务信息</legend>
</fieldset>

<form id="map" class="layui-form">

    <div class="content">

        <div class="map_form">

            <div class="form_item layui-form-item">
                <label class="form_label layui-form-label">姓名：</label>
                <div class="input_block layui-input-block">
                    <input type="text" name="name" class="name layui-input" required="" placeholder="请输入姓名" autocomplete="off" />
                </div>
            </div>

            <div class="form_item layui-form-item">
                <label class="form_label layui-form-label">手机号：</label>
                <div class="input_block layui-input-block">
                    <input type="text" name="mobile" class="mobile layui-input" required="" placeholder="请输入手机号" autocomplete="off" />
                </div>
            </div>

            <div class="form_item layui-form-item">
                <label class="form_label layui-form-label">身份证号：</label>
                <div class="input_block layui-input-block">
                    <input type="text" name="card" class="card layui-input" required="" placeholder="请输入身份证号" autocomplete="off" />
                </div>
            </div>

            <div class="form_item layui-form-item">
                <label class="form_label layui-form-label">购票数量：</label>
                <div class="input_block layui-input-block">
                    <input type="text" name="number" class="number layui-input" required="" placeholder="请输入购票数量" autocomplete="off" />
                </div>
            </div>

            <div class="form_item layui-form-item">
                <label class="form_label layui-form-label">游玩时间：</label>
                <div class="input_block layui-input-block">
                    <input type="text" name="buy_time" class="buy_time layui-input" onClick="WdatePicker()" required="" placeholder="请点击选择游玩时间" autocomplete="off" />
                </div>
            </div>

            <div class="form_item layui-form-item">
                <label class="form_label layui-form-label">售票单位：</label>
                <div class="input_block layui-input-block">
                    <input type="text" name="work_unit" class="work_unit layui-input" required="" placeholder="请输入售票单位" autocomplete="off" />
                </div>
            </div>

            <!--
            <div class="form_item layui-form-item">
                <label class="form_label layui-form-label">工作环境：</label>
                <div class="layui-input-inline">
                    <select name="work_envir" class="work_envir">
                        foreach name="" item="v" key="k"
                            <option value ="$k">$v</option>
                        /foreach
                    </select>
                </div>
            </div>
             -->

             <a href="javascript:void(0)" class="save_form layui-btn" style="margin-bottom: 100px;" >点击保存</a>

        </div>

    </div>

</form>

    
</body>
</html>

<script type="text/javascript">
/*赋予页面高度*/
$(function(){
    //parent.index_close();
});
</script>

<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<link rel="stylesheet" href="__JS__/layer/skin/default/layer.css"/>
<script language="javascript" type="text/javascript" src="__JS__/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">



$(function(){


    $(".save_form").click(function(){


        /*验证姓名*/
        var name = $(".name").val();
        if(name.length==0){
            layer.alert("请填写姓名!",{icon: 2});
            return false;
        }
        
        /*验证手机号*/
        var mobile = $(".mobile").val();
        if(mobile.length!=0 && mobile.length!=11 ){
            layer.alert("请输入有效的手机号码！!",{icon: 2});
            return false;
        }
        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
        if(!myreg.test(mobile)) { 
            layer.alert("请输入有效的手机号码！!",{icon: 2});
            return false;
        }

        /*验证身份证*/
        var card = $(".card").val();
        if(!IdentityCodeValid(card)){
            layer.alert("请输入正确的身份证号!",{icon: 2});
            return false;
        }

        /*验证购票数量*/
        var number = $(".number").val();
        if (!isNaN(number) && (number-0) ==0) {
         　layer.open({ content:'请输入购票数量!',btn: '好'});
            return false; 
        }
        /*if ((number-0)>2) {
         　layer.open({ content:'购票数量最大不能超过2!',btn: '好'});
            return false; 
        }*/

        /*验证游玩时间*/
        var buy_time = $(".buy_time").val();
        if (buy_time.length==0) {
            layer.alert("请选择游玩时间!",{icon: 2});
            return false;
        }

        /*验证工作单位*/
        var work_unit = $(".work_unit").val();
        if (work_unit.length==0) {
            layer.alert("请输入购票单位!",{icon: 2});
            return false;
        }

        var loading = layer.load(2, {shade: [0.5,'#fff']});
        $.post("<?php echo url('vote/ajax_user_add'); ?>",$("#map").serialize(),function(data){
            layer.close(loading)

            if(data.status == 10001){
                layer.alert(data.msg,{icon: 2});
                return false;
            }else if(data.status == 10002){
                layer.alert(data.msg,{icon: 2});
                return false;
            }else if(data.status == 10003){
                layer.alert(data.msg,{icon: 2});
                return false;
            }else if(data.status == 10004){
                layer.alert(data.msg,{icon: 2});
                return false;
            }else if(data.status == 10005){
                layer.alert(data.msg,{icon: 2});
                return false;
            }else if(data.status == 10006){
                layer.alert(data.msg,{icon: 2});
                return false;
            }else if(data.status == 1){
                
                layer.alert("保存成功!",function(){
                    window.location.href= "<?php echo url('vote/user_add'); ?>";
                });
                return false;

                /*layer.confirm('保存成功，要继续添加吗？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    window.location.href= "<?php echo url('vote/user_add'); ?>";
                }, function(){
                    window.location.href = "<?php echo url('vote/user_list'); ?>";
                });*/

            }

        });
    });


    
});



function IdentityCodeValid(code) { 
    var city={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外 "};
    var tip = "";
    var pass= true;
    
    if(!code || !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i.test(code)){
        tip = "身份证号格式错误";
        pass = false;
    }else if(!city[code.substr(0,2)]){
        tip = "地址编码错误";
        pass = false;
    }else{
        //18位身份证需要验证最后一位校验位
        if(code.length == 18){
            code = code.split('');
            //∑(ai×Wi)(mod 11)
            //加权因子
            var factor = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ];
            //校验位
            var parity = [ 1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2 ];
            var sum = 0;
            var ai = 0;
            var wi = 0;
            for (var i = 0; i < 17; i++)
            {
                ai = code[i];
                wi = factor[i];
                sum += ai * wi;
            }
            var last = parity[sum % 11];
            if(parity[sum % 11] != code[17]){
                tip = "校验位错误";
                pass =false;
            }
        }
    }   

    //if(!pass) alert(tip);
        return pass;
}



</script>
