<?php /*a:2:{s:41:"G:\gougu\app\admin\view\keywords\add.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<h3 class="pb-3">关键字</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray-2">关键字名称<font>*</font>
			</td>
			<td>
				<input type="hidden" name="id" value="<?php echo htmlentities($id); ?>" />
				<input type="text" name="title" lay-verify="required" lay-reqText="请输入关键字名称" autocomplete="off" placeholder="请输入关键字名称"
					class="layui-input" <?php if(!(empty($keywords['title']) || (($keywords['title'] instanceof \think\Collection || $keywords['title'] instanceof \think\Paginator ) && $keywords['title']->isEmpty()))): ?>
					value="<?php echo htmlentities($keywords['title']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray">排序</td>
			<td><input type="text" name="sort" placeholder="请输入排序，数字" autocomplete="off" class="layui-input" <?php if(!(empty($keywords['sort']) || (($keywords['sort'] instanceof \think\Collection || $keywords['sort'] instanceof \think\Paginator ) && $keywords['sort']->isEmpty()))): ?>value="<?php echo htmlentities($keywords['sort']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray">状态
			</td>
			<td>
				<?php if($id == 0): ?>
				<input type="radio" name="status" value="1" title="正常" checked>
				<input type="radio" name="status" value="0" title="禁用">
				<?php else: ?>
				<input type="radio" name="status" value="1" title="正常" <?php if($keywords['status'] == '1'): ?>checked<?php endif; ?>>
				<input type="radio" name="status" value="0" title="禁用" <?php if($keywords['status'] == '0'): ?>checked<?php endif; ?>>
				<?php endif; ?>
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
		var form = layui.form,tool=layui.tool;
		//监听提交
		form.on('submit(webform)', function (data) {
			let callback = function (e) {
				layer.msg(e.msg);
				if (e.code == 0) {
					parent.layui.tool.close(1000);
				}
			}
			tool.post("/admin/keywords/add", data.field, callback);
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
