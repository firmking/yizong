<?php /*a:2:{s:40:"G:\gougu\app\admin\view\admin\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
		<div class="layui-input-inline" style="width: 320px;">
			<input type="text" name="keywords" placeholder="登录账户/用户名/手机号码" class="layui-input" autocomplete="off"/>
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">提交搜索</button>
	</form>
	<table class="layui-hide" id="admin" lay-filter="admin"></table>
</div>

<script type="text/html" id="thumb">
	<img src="{{d.thumb}}" width="30" height="30" />
</script>
<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}layui-icon-ok{{#  } else { }}layui-icon-close{{#  } }}"></i>
</script>
<script type="text/html" id="toolbarDemo">
	<div class="layui-btn-container">
		<span class="layui-btn layui-btn-sm add-user">+ 添加管理员</span>
	</div>
</script>
<script type="text/html" id="barDemo">
<div class="layui-btn-group"><span class="layui-btn layui-btn-xs layui-btn-normal" lay-event="view">详情</span><span class="layui-btn layui-btn-xs" lay-event="edit">编辑</span><span class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</span></div>
</script>


	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var table = layui.table, tool = layui.tool, form = layui.form;
		layui.pageTable = table.render({
			elem: '#admin',
			title: '管理员列表',
			toolbar: '#toolbarDemo',
			url: '/admin/admin/index', //数据接口				
			page: true, //开启分页
			limit: 20,
			cols: [
				[
					{
						field: 'id',
						title: 'ID号',
						align: 'center',
						width: 80
					}, {
						field: 'username',
						title: '登录账号',
						width: 120
					}, {
						field: 'thumb',
						title: '头像',
						toolbar: '#thumb',
						align: 'center',
						width: 60
					}, {
						field: 'nickname',
						title: '用户名',
						width: 120
					}, {
						field: 'groupName',
						title: '角色'
					}, {
						field: 'login_num',
						title: '累计登录',
						align: 'center',
						width: 80
					}, {
						field: 'last_login_time',
						title: '最后登录时间',
						align: 'center',
						width: 142
					}, {
						field: 'last_login_ip',
						title: '最后登录IP',
						width: 130
					}, {
						field: 'status',
						title: '状态',
						toolbar: '#status',
						align: 'center',
						width: 60
					}, {
						field: 'right',
						fixed: 'right',
						title: '操作',
						toolbar: '#barDemo',
						width: 132,
						align: 'center'
					}
				]
			]
		});
		//表头工具栏事件
		$('body').on('click','.add-user', function () {
			tool.side("/admin/admin/add");
			return;
		});
		//监听行工具事件
		table.on('tool(admin)', function (obj) {
			var data = obj.data;			
			if (obj.event === 'view') {
				tool.side('/admin/admin/view?id='+data.id);
				return;
			}
			else if (obj.event === 'edit') {
				tool.side('/admin/admin/add?id='+data.id);
				return;
			}
			else if (obj.event === 'del') {
				if (data.id == 1) {
					layer.msg('超级管理员不能删除');
					return;
				}
				layer.confirm('您确定要删除该账户', {
					icon: 3,
					title: '提示'
				}, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/admin/delete", { id: data.id }, callback);
					layer.close(index);
				});
			}
		});

		//监听搜索提交
		form.on('submit(webform)', function (data) {
			layui.pageTable.reload({
				where: {
					keywords: data.field.keywords
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
