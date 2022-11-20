<?php /*a:2:{s:39:"G:\gougu\app\admin\view\conf\other.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<h3 class="pb-3">其他配置</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">开发者</td>
			<td>
				<input type="hidden" value="<?php echo htmlentities($id); ?>" name="id">
				<input type="text" name="author" autocomplete="off" placeholder="请输入开发者" lay-reqText="请输入开发者"
					class="layui-input" <?php if(!(empty($config['author']) || (($config['author'] instanceof \think\Collection || $config['author'] instanceof \think\Paginator ) && $config['author']->isEmpty()))): ?> value="<?php echo htmlentities($config['author']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray-2">开发版本号
			</td>
			<td>
				<input type="text" name="version" autocomplete="off" placeholder="请输入版本号" lay-reqText="请输入版本号"
					class="layui-input" <?php if(!(empty($config['version']) || (($config['version'] instanceof \think\Collection || $config['version'] instanceof \think\Paginator ) && $config['version']->isEmpty()))): ?> value="<?php echo htmlentities($config['version']); ?>" <?php endif; ?>>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray-3">系统文本编辑器</td>
			<td colspan="3">
				<?php if(empty($config['editor']) || (($config['editor'] instanceof \think\Collection || $config['editor'] instanceof \think\Paginator ) && $config['editor']->isEmpty())): ?>
				<input type="radio" name="editor" value="1" title="富文本编辑器(TinyMCE)" checked>
				<input type="radio" name="editor" value="2" title="Markdown编辑器(Editor.md)">
				<?php else: ?>
				<input type="radio" name="editor" value="1" title="富文本编辑器(TinyMCE)" <?php if($config['editor'] == '1'): ?>checked<?php endif; ?>>
				<input type="radio" name="editor" value="2" title="Markdown编辑器(Editor.md)" <?php if($config['editor'] == '2'): ?>checked<?php endif; ?>>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<span style="margin-left:20px; color: red">注意：切换编辑器后，文章内容对应的文本内容可能需要重新编辑。</span>
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
</script>

	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
