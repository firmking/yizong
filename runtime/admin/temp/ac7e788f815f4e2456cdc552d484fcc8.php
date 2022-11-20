<?php /*a:2:{s:45:"G:\gougu\app\admin\view\article_cate\add.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<h3 class="pb-3">新建文章分类</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">父级分类<font>*</font></td>
			<td>
				<select name="pid" lay-verify="required" lay-reqText="请选择父级分类">
					<option value="0">作为顶级分类</option>
					<?php $_result=set_recursion(get_article_cate());if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo htmlentities($v['id']); ?>" <?php if($pid == $v['id']): ?>selected="" <?php endif; ?>><?php echo htmlentities($v['title']); ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
			<td class="layui-td-gray">排序</td>
			<td>
				<input type="text" name="sort" placeholder="请输入排序，数字" value="0" autocomplete="off" class="layui-input">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">分类名称<font>*</font></td>
			<td>
				<input type="text" name="title" lay-verify="required" autocomplete="off" value="" placeholder="请输入分类名称" lay-reqText="请输入分类名称" class="layui-input">
			</td>
			<td class="layui-td-gray">关键词</td>
			<td>
				<input type="text" name="keywords" placeholder="请输入关键词，用“,”隔开，可空" autocomplete="off" class="layui-input" value="">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">描述</td>
			<td colspan="3">
				<textarea name="desc" placeholder="请输入描述，可空" class="layui-textarea"></textarea>
			</td>
		</tr>
	</table>
	<div class="py-3">
		<input type="hidden" name="id" value="0" />
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
					setTimeout(function () {
						parent.location.reload();
					}, 1000);
				}
			}
			tool.post("/admin/article_cate/add", data.field, callback);
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
