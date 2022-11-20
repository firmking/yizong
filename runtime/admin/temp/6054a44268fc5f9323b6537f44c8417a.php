<?php /*a:1:{s:40:"G:\gougu\app\admin\view\login\index.html";i:1668565607;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="renderer" content="webkit" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php echo get_system_config('web','admin_title'); ?></title>
		<link rel="stylesheet" href="/static/assets/layui/css/layui.css" media="all">
		<style type="text/css">
			html,body {width: 100%;height: 100%;background: #EAF3FF;}
			input:-webkit-autofill {
				-webkit-box-shadow: 0 0 0px 1000px white inset;
			}
			#container {width: 100%;height: 100%;position: fixed;top: 0;left: 0;z-index: 999;color: #ffffff;
				background: url(/static/home/images/bg.png);
				background-size: cover;
			}
			.container h2 {font-size: 36px;padding: 36px 0;font-weight: 500;}
			.login {width: 360px;text-align: center;position: absolute;top: 50%;left: 50%;margin-top: -240px;margin-left: -180px;border-radius: 12px;box-shadow: 0 2px 6px rgba(92, 110, 136, .32);
			}
			.login .top {width: 360px;height: 117px;background-color: #fbbc05;border-radius: 12px 12px 0 0;line-height: 117px;text-align: center;overflow: hidden;
				-webkit-transform: rotate(0deg);
				-moz-transform: rotate(0deg);
				-ms-transform: rotate(0deg);
				-o-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			.login .top .bg1 {display: inline-block;width: 72px;height: 72px;background: #fff;opacity: .1;border-radius: 0 72px 0 0;position: absolute;left: 0;top: 42px;}
			.login .top .bg2 {display: inline-block;width: 92px;height: 92px;background: #fff;opacity: .1;border-radius: 50%;position: absolute;right: -16px;top: -16px;}
			.login .bottom {background-color: #fff;padding:26px 24px;border-radius: 0 0 12px 12px;}
			
			.layui-input,.layui-textarea {height: 44px;border: 1px solid #ddd;}
			.captcha_img img{width:142px; height:44px; cursor:pointer;}
			.layui-btn {height: 45px;font-size: 16px;margin-top: 6px;background-color: #FF6347!important}
			.foot {position: absolute; font-size: 12px; bottom: 28px;text-align: center;width: 100%;color: #458BF3;}
		</style>
	</head>
	<body>
		<div id="container">
			<div class="login">
				<div class="top">
					<img src="/static/admin/images/login_logo.png" height="60" width="200">
					<span class="bg1"></span>
					<span class="bg2"></span>
				</div>
				<div class="bottom">
					<form class="layui-form" id="gougu-login">
						<div class="layui-form-item">
							<input type="text" name="username" lay-verify="required" value="" placeholder="请输入账户" lay-reqText="请输入账户" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-form-item">
							<input type="password" name="password" lay-verify="required" value="" placeholder="请输入密码" lay-reqText="请输入密码" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-form-item">
							<div class="layui-input-inline" style="width:158px;">
								<input type="text" name="captcha" lay-verify="required" placeholder="验证码" lay-reqText="请输入验证码" autocomplete="off" class="layui-input">
							</div>
							<div class="layui-input-inline captcha_img" style="width:142px; height:44px; margin-right:0">
								<?php echo captcha_img(); ?>
								<input type="hidden" value="<?php echo make_token(); ?>"/>
							</div>
						</div>
						
						<button id="login-submit" class="layui-btn layui-btn-fluid layui-bg-cyan" lay-submit lay-filter="login-submit">登入系统</button>
					</form>
				</div>
			</div>
			<div class="foot">
			<?php echo get_system_config('web','copyright'); ?>，勾股CMS - v<?php echo CMS_VERSION; ?>，Powered by GouguCMS
			</div>
		</div>
		<script src="/static/assets/layui/layui.js"></script>
		<script type="text/javascript">
			layui.use(['form'], function() {
				var form = layui.form,
					layer = layui.layer,
					$ = layui.$;
				form.on('submit(login-submit)', function(data) {
					$.ajax({
						url: "/admin/login/login_submit",
						data: $('#gougu-login').serialize(),
						type: 'post',
						async: false,
						success: function(res) {
							layer.tips(res.msg, '#login-submit');
							if (res.code === 0) {
								setTimeout(function() {
								//	parent.document.location.reload();
									parent.document.location.href="<?php echo url('/admin/index'); ?>";
								}, 1500);
							} else {
								$('[alt="captcha"]').click();
							}
						}
					})
					return false;
				});
			});
		</script>
	</body>
</html>
