<?php /*a:2:{s:38:"G:\gougu\app\admin\view\log\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	
<div class="p-3">
	<form class="layui-form gg-form-bar border-t border-x">
		<div class="layui-input-inline" style="width:300px;">
			<input type="text" name="keywords" placeholder="昵称/操作数据id/操作描述" class="layui-input" autocomplete="off" />
		</div>
		<div class="layui-input-inline">
			<select name="action">
				<option value="">请选择类型</option>
				<?php if(is_array($type_action) || $type_action instanceof \think\Collection || $type_action instanceof \think\Paginator): $i = 0; $__LIST__ = $type_action;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<option value="<?php echo htmlentities($vo); ?>"><?php echo htmlentities($vo); ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">提交搜索</button>
	</form>
	<table class="layui-hide" id="log" lay-filter="log"></table>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	function gouguInit() {
		var table = layui.table, form = layui.form;
		var tableIns = table.render({
			elem: '#log',
			title: '操作日志列表',
			toolbar: '#toolbarDemo',
			url: "/admin/log/index", //数据接口	
			page: true, //开启分页
			limit: 20,
			cols: [
				[ //表头
					{
						field: 'id',
						title: 'ID号',
						align: 'center',
						width: 90
					}, {
						field: 'action',
						title: '操作',
						align: 'center',
						width: 80
					}, {
						field: 'content',
						title: '操作描述'
					}, {
						field: 'param_id',
						title: '操作数据ID',
						align: 'center',
						width: 100
					},{
						field: 'nickname',
						title: '操作用户',
						align: 'center',
						width: 100
					}, {
						field: 'ip',
						title: 'IP地址',
						align: 'center',
						width: 130
					}, {
						field: 'create_time',
						title: '操作时间',
						fixed: 'right',
						align: 'center',
						width: 160
					}
				]
			]
		});

		//监听搜索提交
		form.on('submit(webform)', function (data) {
			tableIns.reload({
				where: {
					keywords: data.field.keywords,
					action: data.field.action
				},
				page: {
					curr: 1
				}
			});
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
