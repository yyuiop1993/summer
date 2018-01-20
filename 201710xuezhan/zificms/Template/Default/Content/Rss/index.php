<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
  <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
  <meta name="description" content="{$SEO['description']}" />
  <meta name="keywords" content="{$SEO['keyword']}" />
  <link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
  <link rel="stylesheet" href="{$config_siteurl}statics/default/css/about.css">
  <link rel="stylesheet" href="{$config_siteurl}statics/default/css/contact.css">
  <link rel="stylesheet" href="{$config_siteurl}statics/default/css/news.css">
  <link rel="stylesheet" href="{$config_siteurl}statics/default/css/product.css">
  <link rel="stylesheet" href="{$config_siteurl}statics/default/css/download.css">
<body>
  <!-- header start -->
  <div class="header clearfix min_w">
    <div class="hi">
      <div class="w">
        <p class="fl">hi,欢迎访问济南优润机电设备有限公司</p>
        <p class="fr"><a href="#">返回首页</a>丨<a href="#">网站地图</a>丨<a href="#">联系我们</a></p>
      </div>
    </div>
      <div class="logo">
        <div class="w">
          <h1 class="fl"><a href="#">济南优润机电设备有限公司</a></h1>
            <p class="fr">服务热线：<b>0539-7026518</b></p>
        </div>
        </div>
      <div class="menu">
          <ul class="w">
            <li><a href="/">网站首页</a></li>
            <li>|</li>
            <content action="category" catid="0"  order="listorder ASC" >
                <volist name="data" id="vo">
                <li><a href="{$vo.url}">{$vo.catname}</a></li>
                <li>|</li>
              </volist>
            </content>
          </ul>
      </div>
  </div>
  <!-- header start -->
  <!-- banner start -->
  <div class="banner min_w">
    <a href="#"><img src="{$config_siteurl}statics/default/images/banner1.jpg" alt="济南优润机电" title="济南优润机电"></a>
  </div>
  <!-- banner end -->
  <!-- breaknav start -->
  <div class="breaknav min_w">
    <div class="w">
      当前位置：<a href="{$config_siteurl}">首页</a>&gt;<navigate catid="$catid" space="&gt;" />
    </div>
  </div>