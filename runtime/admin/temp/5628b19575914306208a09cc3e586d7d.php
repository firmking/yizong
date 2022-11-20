<?php /*a:2:{s:37:"G:\gougu\app\admin\view\conf\web.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<h3 class="pb-3">系统配置</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray-2">系统名称<font>*</font>
			</td>
			<td>
				<input type="hidden" name="id" value="<?php echo htmlentities($id); ?>">
				<input type="text" name="admin_title" lay-verify="required" autocomplete="off" placeholder="请输入系统名称"
					lay-reqText="请输入系统名称" class="layui-input" <?php if(!(empty($config['admin_title']) || (($config['admin_title'] instanceof \think\Collection || $config['admin_title'] instanceof \think\Paginator ) && $config['admin_title']->isEmpty()))): ?>
					value="<?php echo htmlentities($config['admin_title']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray">网站名称<font>*</font>
			</td>
			<td>
				<input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入网站平台名称"
					lay-reqText="请输入网站名称" class="layui-input" <?php if(!(empty($config['title']) || (($config['title'] instanceof \think\Collection || $config['title'] instanceof \think\Paginator ) && $config['title']->isEmpty()))): ?> value="<?php echo htmlentities($config['title']); ?>"
					<?php endif; ?>>
			</td>
			<td rowspan="3" class="layui-td-gray">系统LOGO</td>
			<td rowspan="3" style="width: 240px;">
				<div class="layui-upload" style="width: 240px;">
					<div class="layui-upload-list" id="demo1" style="width: 100%; height:100px; overflow: hidden;">
						<img src='<?php if(!(empty($config['logo']) || (($config['logo'] instanceof \think\Collection || $config['logo'] instanceof \think\Paginator ) && $config['logo']->isEmpty()))): ?><?php echo htmlentities($config['logo']); ?><?php endif; ?>'
							style="max-width: 100%; width: 100%;" />
						<input type="hidden" name="logo" <?php if(!(empty($config['logo']) || (($config['logo'] instanceof \think\Collection || $config['logo'] instanceof \think\Paginator ) && $config['logo']->isEmpty()))): ?> value="<?php echo htmlentities($config['logo']); ?>"
							<?php endif; ?>>
					</div>
					<button type="button" class="layui-btn layui-btn-normal" style="width: 100%;"
						id="uploadBtn">上传LOGO</button>
				</div>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">网站域名<font>*</font>
			</td>
			<td>
				<input type="text" name="domain" lay-verify="required" autocomplete="off" placeholder="请输入网站域名"
					lay-reqText="请输入网站域名" class="layui-input" <?php if(!(empty($config['domain']) || (($config['domain'] instanceof \think\Collection || $config['domain'] instanceof \think\Paginator ) && $config['domain']->isEmpty()))): ?> value="<?php echo htmlentities($config['domain']); ?>"
					<?php endif; ?>>
			</td>
			<td class="layui-td-gray">ICP备案号</td>
			<td>
				<input type="text" name="icp" autocomplete="off" placeholder="请输入ICP备案号" class="layui-input" <?php if(!(empty($config['icp']) || (($config['icp'] instanceof \think\Collection || $config['icp'] instanceof \think\Paginator ) && $config['icp']->isEmpty()))): ?> value="<?php echo htmlentities($config['icp']); ?>" <?php endif; ?>>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">SEO关键词<font>*</font>
			</td>
			<td>
				<input type="text" name="keywords" lay-verify="required" autocomplete="off" placeholder="多个关键词用“,”隔开"
					lay-reqText="请输入SEO关键字" class="layui-input" <?php if(!(empty($config['keywords']) || (($config['keywords'] instanceof \think\Collection || $config['keywords'] instanceof \think\Paginator ) && $config['keywords']->isEmpty()))): ?>
					value="<?php echo htmlentities($config['keywords']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray-2">公安备案号</td>
			<td>
				<input type="text" name="beian" autocomplete="off" placeholder="请输入公安备案号" class="layui-input" <?php if(!(empty($config['beian']) || (($config['beian'] instanceof \think\Collection || $config['beian'] instanceof \think\Paginator ) && $config['beian']->isEmpty()))): ?> value="<?php echo htmlentities($config['beian']); ?>" <?php endif; ?>>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">SEO描述<font>*</font>
			</td>
			<td colspan="5">
				<textarea name="desc" lay-verify="required" placeholder="请输入网站描述" lay-reqText="请输入网站描述"
					class="layui-textarea"><?php if(!(empty($config['desc']) || (($config['desc'] instanceof \think\Collection || $config['desc'] instanceof \think\Paginator ) && $config['desc']->isEmpty()))): ?><?php echo htmlentities($config['desc']); ?> <?php endif; ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">统计代码</td>
			<td colspan="5">
				<textarea name="code" placeholder="请输入完整的统计代码"
					class="layui-textarea"><?php if(!(empty($config['code']) || (($config['code'] instanceof \think\Collection || $config['code'] instanceof \think\Paginator ) && $config['code']->isEmpty()))): ?> value=<?php echo htmlentities($config['code']); ?><?php endif; ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">版权信息</td>
			<td colspan="3">
				<input type="text" name="copyright" autocomplete="off" placeholder="请输入版权信息" lay-reqText="请输入版权信息"
					class="layui-input" <?php if(!(empty($config['copyright']) || (($config['copyright'] instanceof \think\Collection || $config['copyright'] instanceof \think\Paginator ) && $config['copyright']->isEmpty()))): ?> value="<?php echo htmlentities($config['copyright']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray-2">代码版本号<font>*</font>
			</td>
			<td>
				<input type="text" lay-verify="required" name="version" autocomplete="off" placeholder="请输入版本号"
					lay-reqText="请输入版本号" class="layui-input" <?php if(!(empty($config['version']) || (($config['version'] instanceof \think\Collection || $config['version'] instanceof \think\Paginator ) && $config['version']->isEmpty()))): ?>
					value="<?php echo htmlentities($config['version']); ?>" <?php endif; ?>>
			</td>
		</tr>
	</table>

	<div class="py-3">
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
		var form = layui.form, tool = layui.tool, upload = layui.upload;
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

		//logo上传
		var uploadInst = upload.render({
			elem: '#uploadBtn',
			url: "/admin/api/upload",
			done: function (res) {
				if (res.code == 1) {
					layer.msg('上传失败');
				} else {
					layer.msg('上传成功');
					$('#demo1 input').attr('value', res.data.filepath);
					$('#demo1 img').attr('src', res.data.filepath);
				}
			}
		});
	}
</script>

	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
