<?php /*a:1:{s:42:"G:\gougu\app\install\view\index\step1.html";i:1668565607;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>勾股CMS安装</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="/static/assets/layui/css/layui.css" media="all">
	<style>
		body {
			width: 100%;
			height: 100%;
			background-size: cover;
			background: url("/static/admin/images/bg_pattern.png"), #7b4397;
			background: url("/static/admin/images/bg_pattern.png"), -webkit-linear-gradient(to left, #34a853, #4285f4);
			background: url("/static/admin/images/bg_pattern.png"), linear-gradient(to left, #34a853, #4285f4);
		}
	</style>
</head>

<body>
	<div style="width:200px;margin: 20px auto;"><img src="/static/admin/images/login_logo.png" alt="勾股CMS安装" width="200"></div>
	<div style="width:888px;margin:0 auto 30px;">
		<div class="layui-layout layui-layout-admin">
			<div class="layui-header layui-bg-red" style="border-radius:6px 6px 0 0; position:relative;">
				<div class="layui-logo" style="color: #fff; width:100px;">安装引导</div>
				<ul class="layui-nav layui-layout-right">
					<li class="layui-nav-item">v<?php echo CMS_VERSION; ?></li>
				</ul>
			</div>
			<div style="padding:20px; background-color:#fff;line-height: 27px; border-radius:0 0 6px 6px">
				<p>勾股CMS是一套基于ThinkPHP<?php echo htmlentities($TP_VERSION); ?> + Layui<?php echo LAYUI_VERSION; ?> + MySql打造的轻量级、高性能快速建站的内容管理系统，通用型后台权限管理框架，开箱即用，让WEB开发更简单！<br><br>
					<strong>开源协议：</strong><br>
					本系统遵循Apache Lisense 2.0开源协议发布，并提供免费使用。<br>
					Apache Licence是著名的非盈利开源组织Apache采用的协议。该协议和BSD类似，鼓励代码共享和尊重原作者的著作权，允许代码修改，再作为开源或商业软件发布。需要满足的条件：<br>
					1、需要给用户一份Apache Licence ；<br>
					2、如果你修改了代码，需要在被修改的文件中说明；<br>
					3、在延伸的代码中（修改和有源代码衍生的代码中）需要带有原来代码中的协议，商标，专利声明和其他原来作者规定需要包含的说明；<br>
					4、如果再发布的产品中包含一个Notice文件，则在Notice文件中需要带有本协议内容。你可以在Notice中增加自己的许可，但不可以表现为对Apache Licence构成更改。<br><br>
					<strong>免责声明：</strong><br>
					1、使用勾股CMS系统构建的网站的任何信息内容以及导致的任何版权纠纷和法律争议及后果，本(勾股CMS)系统不承担任何责任。<br>
					2、您一旦安装使用勾股CMS系统，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。
				</p>
				<div style="margin:10px auto;width: 90px;">
					<a href="/index.php?s=install/index/step2" class="layui-btn layui-bg-blue">接受协议</a>
				</div>
			</div>
		</div>
	</div>
	<script src="/static/assets/layui/layui.js" charset="utf-8"></script>
</body>

</html>