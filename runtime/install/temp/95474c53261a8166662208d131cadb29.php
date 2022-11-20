<?php /*a:1:{s:42:"G:\gougu\app\install\view\index\step3.html";i:1668565607;}*/ ?>
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
	<div style="width:200px;margin: 20px auto;"><img src="/static/admin/images/login_logo.png" alt="勾股CMS安装"
			width="200"></div>
	<div style="width:888px;margin:0 auto 30px;">
		<div class="layui-layout layui-layout-admin">
			<div class="layui-header layui-bg-red" style="border-radius:6px 6px 0 0;position:relative;">
				<div class="layui-logo" style="color: #fff; width:100px;">安装引导</div>
				<ul class="layui-nav layui-layout-right">
					<li class="layui-nav-item">v<?php echo CMS_VERSION; ?></li>
				</ul>
			</div>
			<div style="padding:20px; background-color:#fff;line-height: 27px; border-radius:0 0 6px 6px">
				<form class="layui-form" action="" id="form">
					<h3>数据库配置</h3><br>
					<div class="layui-form-item">
						<label class="layui-form-label">数据库类型</label>
						<div class="layui-input-inline">
							<input type="text" name="DB_TYPE" required lay-verify="required" autocomplete="off"
								class="layui-input" value="mysql" disabled="disabled">
						</div>
						<div class="layui-form-mid layui-word-aux">固定为mysql，不可更改</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">数据库地址</label>
						<div class="layui-input-inline">
							<input type="text" name="DB_HOST" required lay-verify="required" autocomplete="off"
								class="layui-input" value="127.0.0.1" lay-reqText="请输入数据库地址">
						</div>
						<div class="layui-form-mid layui-word-aux">数据库服务器地址，一般为127.0.0.1</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">数据库端口</label>
						<div class="layui-input-inline">
							<input type="text" name="DB_PORT" required lay-verify="required" autocomplete="off"
								class="layui-input" value="3306" lay-reqText="请输入数据库端口">
						</div>
						<div class="layui-form-mid layui-word-aux">数据库端口，一般为3306</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">数据库名</label>
						<div class="layui-input-inline">
							<input type="text" name="DB_NAME" required lay-verify="required" autocomplete="off"
								class="layui-input" value="gougucms" lay-reqText="请输入数据库名">
						</div>
						<div class="layui-form-mid layui-word-aux">系统数据库名,必须包含字母,不能有"-"等特殊符号，最好是小写字母</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">用户名</label>
						<div class="layui-input-inline">
							<input type="text" name="DB_USER" required lay-verify="required" autocomplete="off"
								class="layui-input" value="root" lay-reqText="请输入数据库用户名">
						</div>
						<div class="layui-form-mid layui-word-aux">连接数据库的用户名</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">密码</label>
						<div class="layui-input-inline">
							<input type="password" name="DB_PWD" required lay-verify="required" autocomplete="off"
								class="layui-input" lay-reqText="请输入数据库连接密码">
						</div>
						<div class="layui-form-mid layui-word-aux">连接数据库的密码</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">数据表前缀</label>
						<div class="layui-input-inline">
							<input type="text" name="DB_PREFIX" required lay-verify="required" autocomplete="off"
								class="layui-input" value="cms_" lay-reqText="请输入数据库表前缀">
						</div>
						<div class="layui-form-mid layui-word-aux">建议使用默认，同一个数据库安装多个系统时需更改，否则会覆盖</div>
					</div>

					<hr>
					<h3>创始人信息</h3><br>
					<div class="layui-form-item">
						<label class="layui-form-label">管理员账号</label>
						<div class="layui-input-block" style="max-width: 500px;">
							<input type="text" name="username" lay-verify="required" autocomplete="off"
								class="layui-input" lay-reqText="请输入管理员账户">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">登录密码</label>
						<div class="layui-input-inline">
							<input type="password" name="password" lay-verify="required" autocomplete="off"
								class="layui-input" lay-reqText="请输入管理员账户密码">
						</div>
						<label class="layui-form-label">确认密码</label>
						<div class="layui-input-inline">
							<input type="password" name="password_confirm" lay-verify="required" autocomplete="off"
								class="layui-input" lay-reqText="请重复输入管理员账户密码">
						</div>
					</div>
					<br>

					<div class="layui-progress layui-progress-big" lay-showpercent="true" lay-filter="demo"
						style="display: none;" id="progress">
						<div class="layui-progress-bar layui-bg-blue" lay-percent="0%"></div>
					</div>

					<div class="layui-form-item">
						<div style="margin:10px auto;width: 190px;">
							<a href="/index.php?s=install/index/step2" class="layui-btn layui-bg-cyan">上一步</a>
							<button class="layui-btn layui-bg-blue" lay-submit="" lay-filter="install">安装系统</button>
						</div>
					</div>
				</form>
				<div style="display: none; padding: 20px 0; text-align: center;" id="complete">
					<h1>恭喜，安装完成!</h1><br><br><br>
					<div style="color:red; font-size:16px;">注意：如果出现页面无法访问，请注意把ThinkPHP的伪静态配置好。<a href="https://blog.gougucms.com/home/book/detail/bid/2/id/6.html" target="_blank" class="layui-btn layui-btn-xs layui-bg-blue">更多问题</a></div>
					<br><br><br>
					<a href="/" target="_blank" class="layui-btn layui-bg-cyan">访问首页</a>
					<a href="/admin/index" target="_blank" class="layui-btn layui-bg-green">访问后台</a>
				</div>
			</div>
		</div>
	</div>

	<script src="/static/assets/layui/layui.js" charset="utf-8"></script>
	<script>
		layui.use(['element', 'jquery', 'layer', 'form'], function () {
			var $ = layui.jquery,
				layer = layui.layer,
				form = layui.form,
				element = layui.element;
			var n = 0;
			function install_ajax(){
				$.ajax({  
					url:"https://www.gougucms.com/index.php?s=home/get_module/install_ajax",
					dataType:'jsonp',  
					data:{'name':'勾股CMS'},  
					jsonp:'callback',  
					success:function(result) {  
						console.log(result);
					},  
					timeout:3000  
				});
			}
			//监听提交
			form.on('submit(install)', function (data) {
				$('#progress').css('display', 'block');
				var timer = setInterval(function () {
					n = n + Math.random() * 10 | 0;
					if (n > 99) {
						n = 99;
						clearInterval(timer);
					}
					element.progress('demo', n + '%');
				}, 30 + Math.random() * 100);

				$.ajax({
					url: "/index.php?s=install/index/install",
					type: "post",
					data: data.field,
					beforeSend: function () {
						// 禁用按钮防止重复提交
						$("#install").attr({disabled: "disabled"}).html('创建中...');
					},
					success: function (res) {
						if (res.code == 1) {
							$('#progress').css('display', 'none');
							layer.msg(res.msg);
						} else {
							if (n == 99) {
								element.progress('demo', 100 + '%');
								$('#form').hide();
								$('#complete').show();
								return false;
							} else if (n < 99) {
								var ref = setInterval(function () {
									if (n == 99) {
										clearInterval(ref);
										element.progress('demo', 100 + '%');
										$('#form').hide();
										$('#complete').show();
									}
								}, 500)
							}
							install_ajax();
						}
					},
					complete: function () {
						$("#install").removeAttr("disabled").html('提交');
					}
				})
				return false;
			});

		});
	</script>

</body>

</html>