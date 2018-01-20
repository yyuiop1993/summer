<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
<meta name="description" content="<?php echo ($SEO['description']); ?>" />
<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/base.css">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/page.css">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/wap/css/jquery.mmenu.all.css" />

<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/layer_mobile/layer.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery.mmenu.min.all.js"></script>


</head>
<body>

	<div class="header clearfix">
		<div class="header-left">
			<a href="#menu"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/menu.png"></a>
		</div>
		<div class="header-right">
			<img src="<?php echo ($config_siteurl); ?>statics/wap/images/logo.png" >
		</div>
	</div>

	<nav id="menu">
		<ul>
			<li><a href="/index.php">首页</a></li>

			<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','num'=>'7','order'=>'listorder ASC','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?>><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

		</ul>
	</nav>

<script type="text/javascript">
	var $orgMenu, $menu, $html;
	$html = $('html');
	$orgMenu = $('nav#menu').detach();
	updateMenu({});
	function updateMenu( opts ){
		var opened = false;
		var createMenu = function(){
			if ( $menu ){
				$menu.remove();
			}
			$menu = $orgMenu.clone().prependTo( 'body' ).mmenu( opts );
			if ( opened ){
				$menu.trigger( 'open.mm' );
			}
		}
		
		if ( $menu ){
			if ( $html.hasClass( 'mm-opened' ) ){
				opened = true;
				$menu.on( 'closed.mm', createMenu ).trigger( 'close.mm' );
			}else{
				createMenu();
			}
		}else{
			createMenu();
		}

	}

</script>


<div class="page_content">
	<div class="page_title">
		<!-- <img src="<?php echo ($config_siteurl); ?>statics/wap/images/page_title.png"> -->
		<h3><?php echo ($catname); ?></h3>
	</div>


	<div class="form">
        <div class="block clearfix">
            <input type="text" id="name" name="name" class="required" placeholder="姓名">
        </div>

        <div class="block clearfix">
            <input type="text" id="card" name="card" class="required" placeholder="身份证号">
        </div>

        <div class="block clearfix">
            <button class="ContactSubmit">查询</button>
        </div>
	</div>


</div>


<div class="bottom clearfix">
	<ul>
		<li><a href="/index.php"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon1.png" alt="" /></a></li>
		<li><a href="/index.php?g=Wap&a=lists&catid=5"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon2.png" alt="" /></a></li>
		<li><a href="/index.php?g=Wap&a=lists&catid=6"><img src="<?php echo ($config_siteurl); ?>statics/wap/images/bicon3.png" alt="" /></a></li>
	</ul>
</div>



</body>
</html>

<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/layer_mobile/layer.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/wap/js/jquery.mmenu.min.all.js"></script>


<script type="text/javascript">


function refreshs(){
    document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','type=gbook&code_len=4&font_size=20&width=100&height=30&font_color=&background=&refresh=1');?>&time='+Math.random();void(0);
}

$(function(){


     $('.form .required').blur(function(){
        var $parent = $(this).parent();
        $parent.find(".formtips").remove();
        var _value = $(this).val();
        value = $.trim(_value);
        
        if( $(this).is('#name') ){
            if( value=="" ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '姓名不能为空';
                $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                $(this).css("border-color", "#eaeaea")
                var okMsg = '';
                $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
        }        
        //phone
        if( $(this).is('#card') ){
            if( value=="" ){
                $(this).css("border-color", "#b4130d")
                var errorMsg = '身份证不能为空';
                $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                $(this).css("border-color", "#eaeaea")
                var okMsg = '';
                $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
        }

    }).focus(function(){
         $(this).css("border-color", "#b4130d")
    });
    /*点击提交*/
    $('.ContactSubmit').click(function(){
        
        var obj = $('.form');
        $('.form .required').trigger('blur');
        var numError = $(' .form .onError').length;
        
        if(numError){
            return false;
        }else{
            /**/

            var name = $("#name").val();
            var card = $("#card").val();

            var load_index =  layer.open({type: 2});
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
		                layer.open({content: '没有此用户',btn: '好'});
		            }else if (data.status == "-3") {
		                layer.open({content: '错误提交！',btn: '好'});
		            } else if(data.status == 1){
		                layer.open({content: '姓名：'+data.uname+'<br>段位：'+data.duanwei,btn: '好',yes:function(index){
                        	layer.close(index);
                            //window.location.reload();
                        }});
		            }  

                }
            });
        }
        return false;
    });
});
</script>