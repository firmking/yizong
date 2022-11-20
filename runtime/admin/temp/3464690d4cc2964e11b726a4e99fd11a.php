<?php /*a:2:{s:39:"G:\gougu\app\admin\view\conf\token.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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


</head>
<body class="main-body">
	<!-- 主体 -->
	
<form class="layui-form p-4">
	<h3 class="pb-3">TOKEN配置</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray-2">Token签发组织</td>
			<td>
				<input type="hidden" value="<?php echo htmlentities($id); ?>" name="id">
				<input type="text" name="iss" autocomplete="off" placeholder="请输入签发组织" lay-reqText="请输入签发组织"
					class="layui-input" <?php if(!(empty($config['iss']) || (($config['iss'] instanceof \think\Collection || $config['iss'] instanceof \think\Paginator ) && $config['iss']->isEmpty()))): ?> value="<?php echo htmlentities($config['iss']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray-2">Token签发作者
			</td>
			<td>
				<input type="text" name="aud" autocomplete="off" placeholder="请输入签发作者" lay-reqText="请输入签发作者"
					class="layui-input" <?php if(!(empty($config['aud']) || (($config['aud'] instanceof \think\Collection || $config['aud'] instanceof \think\Paginator ) && $config['aud']->isEmpty()))): ?> value="<?php echo htmlentities($config['aud']); ?>" <?php endif; ?>>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">Token Secrect</td>
			<td>
				<input type="text" name="secrect" autocomplete="off" placeholder="请输入secrect" lay-reqText="请输入secrect"
					class="layui-input" <?php if(!(empty($config['secrect']) || (($config['secrect'] instanceof \think\Collection || $config['secrect'] instanceof \think\Paginator ) && $config['secrect']->isEmpty()))): ?> value="<?php echo htmlentities($config['secrect']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray">Token过期时间
			</td>
			<td>
				<input type="text" name="exptime" autocomplete="off" placeholder="请输入过期时间" lay-reqText="请输入过期时间"
					class="layui-input" <?php if(!(empty($config['exptime']) || (($config['exptime'] instanceof \think\Collection || $config['exptime'] instanceof \think\Paginator ) && $config['exptime']->isEmpty()))): ?> value="<?php echo htmlentities($config['exptime']); ?>" <?php endif; ?>>
			</td>
		</tr>
	</table>
	<div style="padding:20px 0;">
		<span class="layui-btn layui-btn-sm" onclick="testReg();">Api测试注册</span>
		<span class="layui-btn layui-btn-sm" onclick="testLogin();">Api测试登录</span>
		<span class="layui-btn layui-btn-sm" onclick="testToken();">Token测试</span>
	</div>
	<div style="padding:12px 0;word-wrap:break-word">
		测试结果：
		<div id="res"></div>
	</div>
	<div class="p-y3">
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">立即提交</button>
		<button type="reset" class="layui-btn layui-btn-primary">重置</button>
	</div>
</form>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var form = layui.form, tool = layui.tool;
		//监听提交
		form.on('submit(webform)', function (data) {
			let callback = function (e) {
				layer.msg(e.msg);
				if (e.code == 0) {
					parent.layui.tool.close(1000);
				}
			}
			tool.post("/admin/conf/edit", data.field, callback);
			return false;
		});
	}

	var token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhcGkuZ291Z3VjbXMuY29tIiwiYXVkIjoiZ291Z3VjbXMiLCJpYXQiOjE2MjczMTY1MTgsImV4cCI6MTYyNzMyMDExOCwidWlkIjoxfQ.3soLDbwrEqn4EZtpD4h05FmvmMtJEh1LtE1vZ_ANcnI';
	function testToken() {
		$.ajax({
			headers: {
				Token: token
			},
			url: "/api/index/demo",
			type: "get",
			success: function (res) {
				$('#res').html(JSON.stringify(res));
				if (res.code == 111) {
					layer.msg(res.msg);
				}
			}
		});
	}

	function testReg() {
		var content = '<form class="layui-form" style="width:400px"><div style="padding:10px 15px">\
						<p style="padding:10px 0">用户名：</p>\
						<p><input name="username" type="text" class="layui-input" value=""/></p>\
						<p style="padding:10px 0">密 码：</p>\
						<p><input name="password" type="password" class="layui-input" value=""/></p>\
						<p style="padding:10px 0">重复密码：</p>\
						<p><input name="newpassword" type="password" class="layui-input" value=""/></p>\
						</div>\
					</form>';
		layer.open({
			type: 1,
			title: 'API测试用户注册',
			area: ['432px', '360px'],
			content: content,
			btnAlign: 'c',
			btn: ['注册'],
			yes: function (idx) {
				var username = $('[name="username"]').val();
				var password = $('[name="password"]').val();
				var newpassword = $('[name="newpassword"]').val();
				if (username == '') {
					layer.msg('请填写用户名');
					return;
				}
				if (password == '') {
					layer.msg('请填写密码');
					return;
				}
				if (password != newpassword) {
					layer.msg('两次密码填写不一致');
					return;
				}
				$.ajax({
					url: "/api/index/reg",
					type: 'post',
					data: { username: username, pwd: password },
					success: function (res) {
						$('#res').html(JSON.stringify(res));
						layer.msg(res.msg);
						if (res.code == 0) {
							layer.close(idx);
						}
					}
				})
			}
		})
	}


	function testLogin() {
		var content = '<form class="layui-form" style="width:400px"><div style="padding:10px 15px">\
							<p style="padding:10px 0">用户名：</p>\
							<p><input name="username" type="text" class="layui-input" value="hdm58"/></p>\
							<p style="padding:10px 0">密 码：</p>\
							<p><input name="password" type="password" class="layui-input" value="123456"/></p>\
							</div>\
						</form>';
		layer.open({
			type: 1,
			title: 'API测试用户登录',
			area: ['432px', '300px'],
			content: content,
			btnAlign: 'c',
			btn: ['登录'],
			yes: function (idx) {
				var username = $('[name="username"]').val();
				var password = $('[name="password"]').val();
				if (username == '') {
					layer.msg('请填写用户名');
					return;
				}
				if (password == '') {
					layer.msg('请填写密码');
					return;
				}
				$.ajax({
					url: "/api/index/login",
					type: 'post',
					data: { username: username, password: password },
					success: function (res) {
						$('#res').html(JSON.stringify(res));
						layer.msg(res.msg);
						if (res.code == 0) {
							token = res.data.token;
							layer.close(idx);
						}
					}
				})
			}
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
