<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
<meta name="description" content="<?php echo ($SEO['description']); ?>" />
<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/wap/css/style.css">
</head>
<body>
	<!-- header start  -->
	<div class="header">
		 <div class="header_top">
			<div class="w">
				<div class="logo">
					<h1><a href="/"><img src="<?php echo ($config_siteurl); ?>statics/default/images/logo.png" alt=""></a></h1>
				</div>
				<div class="nav">
					<ul>

						<li><a href="/">网站首页</a></li>

						<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','order'=>'listorder ASC','num'=>'0','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if( in_array($catid,explode(',',$vo['arrchildid']))): ?>class="current"<?php endif; ?> ><a href=" <?php echo caturl($vo['catid']);?>  "><?php echo ($vo["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>

				</div>
			</div>
		</div>
	</div>
	<!-- header end  -->
<div class="con">
	<div class="right">
		<div class="tit"><span>当前位置：<a href="<?php echo ($config_siteurl); ?>">首页</a>&gt;<?php  $arrparentid = array_filter(explode(',', getCategory($catid,"arrparentid") . ',' . $catid)); foreach ($arrparentid as $cid) { $parsestr[] = '<a href="' . getCategory($cid,'url') . '" >' . getCategory($cid,'catname') . '</a>'; } echo implode("&gt;", $parsestr);?></span></div>		
		<div class="nr">
		<?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); $count = $content_tag->count(array('action'=>'lists','catid'=>$catid,'order'=>'id DESC','num'=>'1','page'=>$page,'pagefun'=>'page','return'=>'data',)); $_page_ = page($count ,1,$page,array('isrule'=>'1',)); $GLOBALS["Total_Pages"] = $_page_->Total_Pages; $pages = $_page_->show("default"); $pagetotal = $_page_->Total_Pages; $totalsize = $_page_->Total_Size; if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>$catid,'order'=>'id DESC','num'=>'1','page'=>$page,'pagefun'=>'page','return'=>'data','count'=>$count,'limit'=>$_page_->firstRow.",".$_page_->listRows,)); } ?><div class="pro">
					<ul>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo geturl($vo);?>">
								<div class="pic"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"></div>
								<p><?php echo (str_cut($vo["title"],87)); ?></p>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="fenye">
					<ul>
						<?php echo ($pages); ?> 
					</ul> 
				</div>
		</div>
	</div>
</div>

	<!-- footer start  -->
		<div class="footer">
			
<div class="footer">
	<?php echo cache('Config.footerinfo');?>
</div>


</body>
</html>
		</div>
	<!-- footer end  -->
	
</body>
</html>