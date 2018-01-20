<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
	<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />
    <meta name="description" content="<?php echo ($SEO['description']); ?>" />
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/base.css">

</head>
<body>

	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/default/css/page.css">





	<div class="hearder-top"><a href="/index.php"  class="bank"></a>工惠乐学</div>

	<div class="content public clearfix">

		<div class="title">

			<span class="current">个人预约</span>

			<span>团体预约</span>

			

		</div>

		<div class="boxs">

			<div class="w">



				





				<div class="box box2 clearfix current">

					<p>

						　　在您填写工惠乐学个人版网上约课表单前，请仔细阅读以下内容:
					</p>

					<p>

						　　1、请尽量在课程前12小时致电或通过平台预约，以更好地保证您预约到课程席位。没有提前预约课程的会员，恕不接受此次授课；

					</p>

					<p>

						　　2、我们将按照会员预约时间的先后顺序安排其参与课程的练习，如在当天课程已预约满额，则调整到其他时段的课程练习；

					</p>

					<p>

						　　3、如您不能按照预约时间出席课程，请务必于开课前一天致电取消所预约的课程，以保证我们调整其他会员的预约；

					</p>

					<p>

						　　4、请您尽量在课程开始前10分钟进入教学点,如您因为交通问题或紧急事件不能按时抵达的,请您及时致电于我们，以便我们调整课程。

					</p>

					<p>

						　　联系人：李明<br>

						　　联系电话：8726276

					</p>

					<p class="check"><input type="checkbox" >我已阅读并遵守此协议</p>

					<p class="agree"><button>同意</button></p>

				</div>


				<div class="box box1  clearfix">

				
					<p>

						　　在您填写工惠乐学团体版网上约课表单前，请仔细阅读以下内容:
					</p>

					<p>

						　　1、预约单位提供意向日期、意向时间后，由工惠乐学项目组与讲师协商，确定正式上课时间。
					</p>

					<p>

						　　2、每次预约需至少提前一周，正式上课前两天不再接受上课时间的变更；原则上每场参与人数不少于30人。

					</p>

					<p>

						　　3、课程形式一般为90分钟左右的讲座，授课时间和形式可根据实际予以适当调整。

					</p>

					<p>

						　　4、每家企事业单位（仅限已建工会单位）每年可免费预约两次工惠乐学课程。如需延长或增加课时，需支付一定数额的培训费，具体标准由双方商定。

					</p>
                  
                  	<p>

						　　5、约课成功的企事业单位需按照讲师的要求，提供授课所需的教学场所和设备等，并负责组织学员按时参加培训。位于远郊园区的单位，需负责接送老师。
                      
					</p>

					<p>

						　　联系人：李明<br>

						　　联系电话：8726276

					</p>

					<p class="check"><input type="checkbox" >我已阅读并遵守此协议</p>

					<p class="agree"><button>同意</button></p>

				</div>


				<!-- <div class="box clearfix">

					<p>在您填写工惠乐学企业版课程预约函之前，请仔细阅读以下内容：</p>

					<p>3、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p>1、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p>1、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p>1、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p>1、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p>1、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p>1、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p>1、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p>1、预约单位提供意向日期、意向时间后，由工惠乐学项目组居间与讲师协商，确定正式上课时间。</p>

					<p class="check"><input type="checkbox" >我以阅读并遵守此协议</p>

					<p class="agree"><a href="yuyue1.html" target="_blank"><button disabled="true">同意</button></a></p>

				</div> -->

			</div>

		</div>

	</div>



	<script  type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/jquery-1.7.2.min.js"></script>

	<script  type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/default/js/page.js"></script>

	<script type="text/javascript">

	$(".boxs").on("click",".ahref1",function(){

		window.location.href='/index.php?a=lists&catid=20';

	});

	$(".boxs").on("click",".ahref2",function(){

		window.location.href='/index.php?a=lists&catid=10';

	});

	</script>

	</body>
</html>