<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
  <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
  <link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
  <link rel="stylesheet" href="{$config_siteurl}statics/default/css/news.css">
<body>
<template file="Content/header.php"/>
  <!-- breaknav nav -->
  <div class="content w min_w clearfix">
    <div class="con_l fl">
      
      <div class="caption">
        搜索<br/>
      </div>
      <ul>
        <content action="category" catid="$catid" order="listorder ASC">
          <volist name="data" id="vo">
            <li><a href="{$vo.url}" <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="hover"</if>  >{$vo.catname}</a></li>
          </volist>
        </content>
      </ul>
      <div class="contact">
        <a href="#"><img src="{$config_siteurl}statics/default/images/contact.jpg" alt="联系我们" title="联系我们"></a>
      </div>

    </div>
    <div class="con_r fr">
      <div class="title">
        搜索结果
      </div>

      <div class="search">
        <form  name="formsearch" class="form" action="{:U('Search/Index/index')}" method="post">
          <input type="text"  name="q"  placeholder="请输入产品名称">
          <button ></button>
        </form>
      </div>
      
        <div class="inner">
          <ul>
             <volist name="result" id="r">
              
                <li>
                  <div class="date fl">{$r.inputtime|date="d",###}<span>{$r.inputtime|date="Y-m",###}</span></div>
                  <div class="news fr">
                    <h3><a href="{$r.url}">{$r.title}</a></h3>
                    <p>{$r.description|str_cut=###,47}</p>
                    <p>{$category[$r['catid']]['catname']}</p>
                  </div>
                </li>
              
            </volist>
          </ul>
        </div>
        <div class="fenye">
          <ul>
            {$pages}
          </ul>
        </div>          
        <if condition=" !$result "> 
           <div id="result" class="noResult">
              <h3>抱歉，找不到与 "<em>{$keyword}</em>" 相符的信息</h3>
          </div>
        </if>
    </div>
  </div>
<template file="Content/footer.php"/> 
