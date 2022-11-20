<?php /*a:2:{s:40:"G:\gougu\app\admin\view\sitemap\add.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<h3 class="pb-3">网站地图分类</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">分类名称<font>*</font></td>
			<td>
				<input type="hidden" name="id" value="<?php echo htmlentities($id); ?>" />
				<input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入分类名" lay-reqText="请输入分类名" class="layui-input" <?php if(!(empty($cate['name']) || (($cate['name'] instanceof \think\Collection || $cate['name'] instanceof \think\Paginator ) && $cate['name']->isEmpty()))): ?>value="<?php echo htmlentities($cate['name']); ?>" <?php endif; ?>>
			</td>
			<td class="layui-td-gray">排序</td>
			<td>
				<input type="text" name="sort" autocomplete="off" placeholder="请输入排序" class="layui-input" <?php if(!(empty($cate['sort']) || (($cate['sort'] instanceof \think\Collection || $cate['sort'] instanceof \think\Paginator ) && $cate['sort']->isEmpty()))): ?>value="<?php echo htmlentities($cate['sort']); ?>" <?php else: ?> value="0"<?php endif; ?>>
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
			tool.post("/admin/sitemap/add", data.field, callback);
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
