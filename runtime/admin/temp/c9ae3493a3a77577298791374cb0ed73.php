<?php /*a:2:{s:39:"G:\gougu\app\admin\view\user\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
			<input type="text" name="keywords" placeholder="昵称/真实姓名/手机号" class="layui-input" autocomplete="off" />
		</div>
		<div class="layui-input-inline" style="width:120px;">
			<input type="text" class="layui-input" id="start_time" readonly placeholder="注册开始时间" name="start_time">
		</div>
		~
		<div class="layui-input-inline" style="width:120px;">
			<input type="text" class="layui-input" id="end_time" readonly placeholder="注册结束时间" name="end_time">
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">提交搜索</button>
	</form>
	<table class="layui-hide" id="user" lay-filter="user"></table>
</div>
<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}layui-icon-ok{{#  } else { }}layui-icon-close{{#  } }}"></i>
</script>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var tool = layui.tool, table = layui.table, laydate = layui.laydate, form = layui.form;
		laydate.render({
			elem: '#start_time',
			type: 'date'
		});

		laydate.render({
			elem: '#end_time',
			type: 'date'
		});

		layui.pageTable = table.render({
			elem: '#user',
			title: '用户列表',
			toolbar: '#toolbarDemo',
			url: '/admin/user/index', //数据接口
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
						field: 'headimgurl',
						title: '头像',
						align: 'center',
						width: 60,
						templet: function (d) {
							var html = '';
							var delBtn = '<img src="' + d.headimgurl + '" width="28" height="28"/>';
							return delBtn;
						}
					}, {
						field: 'username',
						title: '用户名',
						align: 'center',
						width: 100
					}, {
						field: 'level_name',
						title: '会员等级',
						align: 'center',
						width: 90
					}, {
						field: 'sex',
						title: '性别',
						align: 'center',
						width: 60,
						templet: function (d) {
							var html = '-';
							if (d.sex == 1) {
								html = '男'
							} else if (d.sex == 2) {
								html = '女'
							}
							return html;
						}
					}, {
						field: 'nickname',
						title: '昵称',
						align: 'center',
						width: 100
					}, {
						field: 'name',
						title: '真实姓名',
						align: 'center',
						width: 100
					}, {
						field: 'mobile',
						title: '手机号码',
						align: 'center',
						width: 120
					}, {
						field: 'email',
						title: '电子邮箱',
						align: 'center',
						minWidth: 150
					}, {
						field: 'register_time',
						title: '注册时间',
						align: 'center',
						width: 150
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
						align: 'center',
						width: 136,
						templet:function(d){
							let btn1 = '<span class="layui-btn layui-btn-xs layui-btn-normal" lay-event="view">详情</span><span class="layui-btn layui-btn-xs" lay-event="edit">编辑</span>';
							let btn2 = '<span class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">禁用</span>';
							let btn3 = '<span class="layui-btn layui-btn-normal layui-btn-xs" lay-event="open">启用</span>';
							if(d.status == 1){
								return '<div class="layui-btn-group">'+btn1+btn2+'</div>';
							}else{
								return '<div class="layui-btn-group">'+btn1+btn3+'</div>';
							}							
						}
					}
				]
			]
		});

		//监听行工具事件
		table.on('tool(user)', function (obj) {
			var data = obj.data;
			if (obj.event === 'view') {
				tool.side('/admin/user/view?id=' + data.id);
				return;
			}
			else if (obj.event === 'edit') {
				tool.side('/admin/user/edit?id=' + data.id);
				return;
			}
			else if (obj.event === 'del') {
				layer.confirm('您确定要禁用该用户', {
					icon: 3,
					title: '提示'
				}, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							layer.close(index);
							layui.pageTable.reload()
						}
					}
					tool.post("/admin/user/disable", { id: data.id, status: 0 }, callback);
					layer.close(index);
				});
			} else if (obj.event === 'open') {
				layer.confirm('您确定要启用该用户', {
					icon: 3,
					title: '提示'
				}, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							layer.close(index);
							layui.pageTable.reload()
						}
					}
					tool.post("/admin/user/disable", { id: data.id, status: 1 }, callback);
					layer.close(index);
				});
			}
		});
		//监听搜索提交
		form.on('submit(webform)', function (data) {
			layui.pageTable.reload({
				where: {
					keywords: data.field.keywords,
					attach: data.field.attach,
					start_time: data.field.start_time,
					end_time: data.field.end_time
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
