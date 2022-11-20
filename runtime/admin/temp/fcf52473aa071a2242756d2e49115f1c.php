<?php /*a:2:{s:37:"G:\gougu\app\admin\view\role\add.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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


<style>
.left-note{font-weight:800; vertical-align:top; padding-top:28px!important; text-align:center}
.left-note .layui-form-checkbox span{background-color: #969696;}
.left-note .layui-form-checkbox:hover span{background-color: #808080;}

.left-note .layui-form-checked span, .left-note .layui-form-checked:hover span { background-color: #5fb878;}
.checkbox14 .layui-form-checkbox span{font-size:15px;font-weight:800;}
.right-note .layui-checkbox-disabled span {color: #666666!important;}
</style>

</head>
<body class="main-body">
	<!-- 主体 -->
	

<form class="layui-form p-4">
	<h3 class="pb-3">权限角色</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">角色名称<font>*</font>
			</td>
			<td>
				<input type="hidden" name="id" value="<?php echo htmlentities($id); ?>" />
				<input class="layui-input" type="text" name="title" lay-verify="required" lay-reqText="请输入角色名称" <?php if(!(empty($role['title']) || (($role['title'] instanceof \think\Collection || $role['title'] instanceof \think\Paginator ) && $role['title']->isEmpty()))): ?>value="<?php echo htmlentities($role['title']); ?>" <?php endif; ?> placeholder="请输入角色名称" autocomplete="off" />
			</td>
			<td class="layui-td-gray">状态<font>*</font>
			</td>
			<td>
			<?php if($id == 0): ?>
			<input type="radio" name="status" value="1" title="正常" checked>
			<input type="radio" name="status" value="-1" title="禁用">
			<?php else: ?>
			<input type="radio" name="status" value="1" title="正常" <?php if($role['status'] == '1'): ?>checked<?php endif; ?>>
			<input type="radio" name="status" value="-1" title="禁用" <?php if($role['status'] == '-1'): ?>checked<?php endif; ?>>
			<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray-2">权限配置说明<font>*</font></td>
			<td colspan="3"><strong class="red">注意：如果右侧子级权限有节点被勾选了，左侧的顶级权限就必须勾选，否则无法查看右侧的子级菜单。</strong></td>
		</tr>
		<tr>
			<td colspan="4">	
				<table style="width:100%" id="rule">
					<tr>
						<td style="text-align:center; background-color:#f8f8f8; width:160px;">选择可操作的顶级权限 <font style="color:red">↓</font></td>
						<td style="text-align:left; background-color:#f8f8f8;">选择可操作的子级权限  <font style="color:red">↓</font></td>
					</tr>
					<?php if(is_array($role_rule) || $role_rule instanceof \think\Collection || $role_rule instanceof \think\Paginator): $i = 0; $__LIST__ = $role_rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<tr>
						<td class="left-note">
						  <input type="checkbox" name="rule[]" value="<?php echo htmlentities($vo['id']); ?>" title="<?php echo htmlentities($vo['title']); ?>" class="aaa" <?php if($vo['checked'] == 'true'): ?>checked<?php endif; ?>>
						</td>
						<?php if(!(empty($vo['children']) || (($vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator ) && $vo['children']->isEmpty()))): ?>
							<td class="right-note">
								<div style="padding:0 0 0 10px;">
								<?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $k = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($k % 2 );++$k;?>
									<div class="checkbox15" style="padding:10px 0;">
										<input type="checkbox" lay-filter="rule" name="rule[]" value="<?php echo htmlentities($voo['id']); ?>" lay-skin="primary" title="<?php echo htmlentities($voo['title']); ?>" <?php if($voo['checked'] == 'true'): ?>checked<?php endif; ?>>
									</div>
									<?php if(!(empty($voo['children']) || (($voo['children'] instanceof \think\Collection || $voo['children'] instanceof \think\Paginator ) && $voo['children']->isEmpty()))): ?>
										<div style="padding:0 0 3px; <?php if($k != count($vo['children'])): ?>margin-bottom:3px; padding-bottom:16px; border-bottom:1px solid #eee;<?php endif; ?>">
										<?php if(is_array($voo['children']) || $voo['children'] instanceof \think\Collection || $voo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $voo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vooo): $mod = ($i % 2 );++$i;?>
											<div class="layui-input-inline" style="margin-right:10px;">
												<input type="checkbox" data-rule="<?php echo htmlentities($voo['id']); ?>" name="rule[]" value="<?php echo htmlentities($vooo['id']); ?>" lay-skin="primary" title="<?php echo htmlentities($vooo['title']); ?>" <?php if($vooo['checked'] == 'true'): ?>checked<?php endif; ?>>
											</div>
										<?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
									<?php endif; ?>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</td>
						<?php endif; ?>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray" style="vertical-align: top;">备注内容</td>
			<td colspan="3">
				<textarea name="desc" placeholder="请输入备注" class="layui-textarea"><?php if(!(empty($role['desc']) || (($role['desc'] instanceof \think\Collection || $role['desc'] instanceof \think\Paginator ) && $role['desc']->isEmpty()))): ?><?php echo htmlentities($role['desc']); ?><?php endif; ?></textarea>
			</td>
		</tr>
	</table>
	<div style="padding: 10px 0">
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
		var form = layui.form,tool=layui.tool, tree = layui.tree;
		//监听提交
		form.on('submit(webform)', function (obj) {
			$.ajax({
				url: "/admin/role/add",
				data: obj.field,
				type: 'post',
				success: function (e) {
					layer.msg(e.msg);
					if (e.code == 0) {
						parent.layui.tool.close(1000);
					}
				}
			});
			return false;
		});
		
		
		//监听多选框点击事件  通过 lay-filter="menu"来监听
		form.on('checkbox(menu)', function (data) {
		　　let val = data.value;
			if(data.elem.checked){
				//判断当前多选框是选中还是取消选中
				$("input[data-menu='"+val+"']").prop("checked", true);//true:选中 false:不选中
			}
			else{
				$("input[data-menu='"+val+"']").prop("checked", false);
			}
			form.render();//实时渲染选中和不选中的样式
		});
		
		//监听多选框点击事件  通过 lay-filter="rule"来监听
		form.on('checkbox(rule)', function (data) {
		　　let val = data.value;
			if(data.elem.checked){
				//判断当前多选框是选中还是取消选中
				$("input[data-rule='"+val+"']").prop("checked", true);//true:选中 false:不选中
			}
			else{
				$("input[data-rule='"+val+"']").prop("checked", false);
			}
			form.render();//实时渲染选中和不选中的样式
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
