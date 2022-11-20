<?php /*a:2:{s:37:"G:\gougu\app\admin\view\rule\add.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<h3 class="pb-3">功能菜单/节点</h3>
	<?php if($id == 0): ?>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray-2">父级菜单/节点<font>*</font>
			</td>
			<td>
				<select name="pid" lay-verify="required" lay-reqText="请选择父级菜单/节点">
					<option value="0">作为顶级菜单/节点</option>
					<?php $_result=set_recursion(get_admin_rule());if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo htmlentities($v['id']); ?>" <?php if($pid == $v['id']): ?>selected="" <?php endif; ?>><?php echo htmlentities($v['title']); ?> </option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
			<td class="layui-td-gray-2">左侧菜单显示<font>*</font>
			</td>
			<td>
				<input type="radio" name="menu" value="1" title="是">
				<input type="radio" name="menu" value="2" title="不是">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">菜单/节点名称<font>*</font>
			</td>
			<td>
				<input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入菜单/节点名称"
					lay-reqText="请输入菜单/节点名称" class="layui-input">
			</td>
			<td class="layui-td-gray">操作日志名称<font>*</font>
			</td>
			<td>
				<input type="text" name="name" lay-verify="required" placeholder="请输入操作日志名称" lay-reqText="请输入操作日志名称"
					autocomplete="off" class="layui-input">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">菜单/节点URL</td>
			<td>
				<input type="text" name="src" placeholder="请输入菜单/节点URL，可空" autocomplete="off" class="layui-input">
			</td>
			<td class="layui-td-gray">菜单排序</td>
			<td>
				<input type="text" name="sort" value="0" placeholder="请输入数字，越小越靠前" autocomplete="off"
					class="layui-input">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">菜单图标</td>
			<td colspan="3">
				<input type="text" name="icon" style="width:150px; display:inline" placeholder="请输入图标，可空"
					autocomplete="off" class="layui-input">
				如：bi-gear<a href="/static/assets/icon/index.html" target="_blank" style="margin-left:10px; color:#007AFF">[查看图标]</a>
			</td>
		</tr>
	</table>
	<?php else: ?>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray-2">父级菜单/节点<font>*</font>
			</td>
			<td>
				<select name="pid" lay-verify="required" lay-reqText="请选择父级菜单/节点">
					<option value="0">作为顶级节点</option>
					<?php $_result=set_recursion(get_admin_rule());if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo htmlentities($v['id']); ?>" <?php if($detail['pid'] == $v['id']): ?>selected="" <?php endif; ?>><?php echo htmlentities($v['title']); ?> </option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
			<td class="layui-td-gray-2">左侧菜单显示<font>*</font>
			</td>
			<td>
				<input type="radio" name="menu" value="1" title="是" <?php if($detail['menu'] == '1'): ?> checked<?php endif; ?>>
				<input type="radio" name="menu" value="2" title="不是" <?php if($detail['menu'] == '2'): ?> checked<?php endif; ?>>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">菜单/节点名称<font>*</font>
			</td>
			<td>
				<input type="text" name="title" value="<?php echo htmlentities($detail['title']); ?>" lay-verify="required" autocomplete="off"
					placeholder="请输入菜单/节点名称" lay-reqText="请输入菜单/节点名称" class="layui-input">
			</td>
			<td class="layui-td-gray">操作日志名称<font>*</font>
			</td>
			<td>
				<input type="text" name="name" value="<?php echo htmlentities($detail['name']); ?>" lay-verify="required" placeholder="请输入操作日志名称"
					lay-reqText="请输入操作日志名称" autocomplete="off" class="layui-input">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">菜单/节点URL</td>
			<td>
				<input type="text" name="src" value="<?php echo htmlentities($detail['src']); ?>" placeholder="请输入菜单/节点URL，可空" autocomplete="off"
					class="layui-input">
			</td>
			<td class="layui-td-gray">菜单排序</td>
			<td>
				<input type="text" name="sort" value="<?php echo htmlentities($detail['sort']); ?>" placeholder="请输入数字，越小越靠前" autocomplete="off"
					class="layui-input">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">菜单图标</td>
			<td colspan="3">
				<input style="width:150px; display:inline" type="text" name="icon" value="<?php echo htmlentities($detail['icon']); ?>" placeholder="请输入图标，可空" autocomplete="off" class="layui-input">
				<i class="bi <?php echo htmlentities($detail['icon']); ?>"></i><a href="/static/assets/icon/index.html" target="_blank" style="margin-left:10px; color:#007AFF">[查看图标]</a>
			</td>
		</tr>
	</table>
	<?php endif; ?>
	<div style="padding: 10px 0">
		<input type="hidden" name="id" value="<?php echo htmlentities($id); ?>">
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
			if (!data.field.menu || data.field.menu == '') {
				layer.msg('请选择是否在左侧菜单显示');
				return false;
			}
			let callback = function (e) {
				layer.msg(e.msg);
				if (e.code == 0) {
					setTimeout(function () {
						parent.location.reload();
					}, 1000);					
				}
			}
			tool.post("/admin/rule/add", data.field, callback);
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
