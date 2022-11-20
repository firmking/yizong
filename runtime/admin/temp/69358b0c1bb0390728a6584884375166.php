<?php /*a:2:{s:40:"G:\gougu\app\admin\view\user\record.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">

	<link rel="mobile-prefetch" href=""/>


	<title><?php echo get_system_config('web','admin_title'); ?></title>		


	<meta name="keywords" content="<?php echo get_system_config('web','keywords'); ?>"/>
	<meta name="description" content="<?php echo get_system_config('web','desc'); ?>"/>


  <link rel="stylesheet" href="/static/assets/gougu/css/gougu.css?v=<?php echo get_system_config('web','version'); ?>" media="all">


<style type="text/css">
	.layui-card-body .layui-timeline-title {
		padding-bottom: 0;
		font-size: 14px;
	}

	.layui-card-body .layui-timeline-item {
		padding-bottom: 5px;
	}

	.layui-timeline-title span {
		color: #999
	}

	.panel-more {
		width: 100%;
		height: 48px;
		line-height: 48px;
		text-align: center;
		position: absolute;
		bottom: 0;
		left: 0;
	}

	.panel-more a {
		color: #0088FF
	}
</style>

</head>
<body class="main-body">
	<!-- 主体 -->
	
<div class="p-3">
	<div class="layui-card">
		<div class="layui-card-header"><h3>用户操作记录</h3></div>
		<div class="layui-card-body">
			<ul class="layui-timeline" id="logs"></ul>
			<div class="panel-more"><a href="javascript:;">查看更多操作记录</a></div>
		</div>
	</div>
</div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	var page=1,limit=20;
	function getLogs() {
		$.ajax({
			url: "/admin/user/record",
			type: 'get',
			data: {
				page:page,
				limit: limit
			},
			success: function(e) {
				if (e.code == 0) {
					var html = '';
					if(e.data.length>0){
						page++;
						$.each(e.data, function(key, value) {
							html += '<li class="layui-timeline-item">\
										<i class="layui-icon layui-timeline-axis"></i>\
										<div class="layui-timeline-content layui-text">\
										  <div class="layui-timeline-title"><span title="'+value.id+'">'+value.times+'</span>，'+value.content+'</div>\
										</div>\
									  </li>';
						});
						$('#logs').append(html);
					}else{
						$('.panel-more').remove();
					}
				}
			}
		})
	}
	function gouguInit() {
		getLogs();
		$('.panel-more').on('click',function(){
			getLogs();
		})
	}
</script>

	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
