	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
	<meta name="keywords" content="{$SEO['keyword']}" />
    <meta name="description" content="{$SEO['description']}" />
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/base.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/default/css/page.css">
</head>
<body>
	<!-- hearder start -->
	<div class="hearder">
		<div class="heard-banner min-w"><a href="/"></a></div>
		<div class="nav clearfix min-w">
			<ul class="w">
	            <content action="category" catid="0" num='9'  order="listorder ASC" >
	                <volist name="data" id="vo">
	                    <li <if condition="  in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>><a href="{$vo.url}">{$vo.catname}</a></li>
	                </volist>
	            </content>
			</ul>
		</div>
		<div class="date clearfix min-w">
			<div class="w clearfix">
				<div class="date-l fl">
					今天是 :
					<span id="date"></span>
				</div>
				<div class="date-r fr clearfix">
					<div class="search fl">
						<form  name="formsearch" class="form" action="{:U('Search/Index/index')}" method="post" onsubmit="return checksearch();">
							<input type="text" name="q" id="search" value="-请输入关键字试试-" onfocus="if (value =='-请输入关键字试试-'){value =''}"onblur="if (value ==''){value='-请输入关键字试试-'}">
							<button>搜索</button>
						</form>
						<script type="text/javascript">
							function checksearch(){
								if ($("#search").val().trim().length == 0) {
							        $("#search").focus();
							        return false;
							    }
							}
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- hearder end -->
	<!-- content start -->
	<div class="w clearfix">
		<div class="content list-con clearfix">
			<div class="cont-l">
				<h3>
					搜索结果
				</h3>
				<ul>
					<content action="category" catid="$catid" order="listorder ASC">
						<volist name="data" id="vo">
							<li  <if condition="in_array($catid,explode(',',$vo['arrchildid']))"> class="current"</if>  ><a href="{$vo.url}" ><span>&gt;&gt;</span>{$vo.catname}</a></li>
						</volist>
					</content>
				</ul>
			</div>
			<div class="cont-r fr clearfix">
				<div class="breaknav">您所在的位置 :当前位置：<a href="/">首页</a> &gt; 搜索</div>
				<content action="lists" catid="$catid" order="id DESC" page="$page">
					<div class="boxs">
						<div class="box clearfix">
							<ul>
								 <volist name="result" id="vo">
									<li><a href="{$vo.url}" target="_blank">{$vo.title}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
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
				</content>
			</div>
		</div>
		<template file="Content/fw.php"/>
	</div>
	<!-- content end -->
	<template file="Content/footer.php"/>