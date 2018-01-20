

<div class="footer clearfix">
    <div class="footer_box">
        <div class="footer_left">
            <img class="left_logo" src="{$config_siteurl}statics/default/images/logo2.png">
            <div class="footer_left_code">
                <img src="{$config_siteurl}statics/default/images/code1.png">
                <img src="{$config_siteurl}statics/default/images/code2.png">
                <img src="{$config_siteurl}statics/default/images/code3.png">
            </div>
        </div>
        <div class="footer_right">
            <ul class="footer_nav">
                <li><a href="/index.php" >首页</a></li>
                <content action="category" catid="0" num='7'  order="listorder ASC" >
                    <volist name="data" id="vo">
                        <li><a href="{$vo.url}">{$vo.catname}</a></li>
                    </volist>
                </content>
            </ul>
            
            {:cache('Config.footerinfo')}
            
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/layer/layer.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/default/js/jquery.flexslider-min.js"></script>
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