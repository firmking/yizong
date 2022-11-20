<?php /*a:2:{s:37:"G:\gougu\app\admin\view\conf\add.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<h3 class="pb-3">配置项</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">配置名称<font>*</font>
			</td>
			<td>
				<input type="hidden" name="id" value="<?php echo htmlentities($id); ?>" />
				<input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入配置名称"
					lay-reqText="请输入配置名称" class="layui-input" <?php if(!(empty($config['title']) || (($config['title'] instanceof \think\Collection || $config['title'] instanceof \think\Paginator ) && $config['title']->isEmpty()))): ?> value="<?php echo htmlentities($config['title']); ?>"
					<?php endif; ?>>
			</td>
			<td class="layui-td-gray">状态<font>*</font>
			</td>
			<td><?php if($id == 0): ?>
				<input type="radio" name="status" value="1" title="正常" checked>
				<input type="radio" name="status" value="0" title="禁用">
				<?php else: ?>
				<input type="radio" name="status" value="1" title="正常" <?php if($config['status'] == '1'): ?>checked<?php endif; ?>>
				<input type="radio" name="status" value="0" title="禁用" <?php if($config['status'] == '0'): ?>checked<?php endif; ?>>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">
				配置标识<font>*</font>
			</td>
			<td colspan="3">
				<input type="text" name="name" lay-verify="required" placeholder="请输入配置标识" lay-reqText="请输入配置标识"
					autocomplete="off" class="layui-input" <?php if(!(empty($config['name']) || (($config['name'] instanceof \think\Collection || $config['name'] instanceof \think\Paginator ) && $config['name']->isEmpty()))): ?> value="<?php echo htmlentities($config['name']); ?>"
					<?php endif; ?>>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<span
					style="color: red; font-size: 12px;">注意：新增配置项以后，需要对应新增模板文件，模板文件名称需与标识名称一致，建议复制现有的配置模板文件，然后根据需求修改对应的表单即可。</span>
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
			tool.post("/admin/conf/add", data.field, callback);
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
