<?php /*a:2:{s:39:"G:\gougu\app\admin\view\conf\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<table class="layui-hide" id="conf" lay-filter="conf"></table>
</div>

<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}layui-icon-ok{{#  } else { }}layui-icon-close{{#  } }}"></i>
</script>
<script type="text/html" id="toolbarDemo">
  <div class="layui-btn-container">
	<button class="layui-btn layui-btn-sm" lay-event="add">+ 添加配置项</button>
  </div>
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
			elem: '#conf',
			title: '配置列表',
			toolbar: '#toolbarDemo',
			url: "/admin/conf/index",
			page: true, //开启分页				
			limit: 20,
			cols: [
				[{
					field: 'id',
					width: 80,
					title: 'ID编号',
					align: 'center'
				}, {
					field: 'title',
					width: 200,
					title: '配置名称'
				}, {
					field: 'name',
					title: '配置标识（新增的模板文件名称需与标识名称一致）'
				}, {
					field: 'status',
					width: 80,
					title: '状态',
					templet: '#status',
					align: 'center'
				}, {
					width: 160,
					title: '操作',
					align: 'center',
					templet: function (d) {
						var html = '<div class="layui-btn-group"><button class="layui-btn layui-btn-xs" lay-event="add">修改</button><button class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit" >编辑配置</button><button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button></div>';
						return html;
					}
				}]
			]
		});

		//表头工具栏事件
		table.on('toolbar(conf)', function (obj) {
			if (obj.event === 'add') {
				tool.side("/admin/conf/add");
				return;
			}
		});
		
		//监听行工具事件
		table.on('tool(conf)', function (obj) {
			var data = obj.data;
			if (obj.event === 'add') {
				tool.side('/admin/conf/add?id=' + data.id);
				return;
			}
			if (obj.event === 'edit') {
				tool.side('/admin/conf/edit?id=' + data.id);
				return;
			}
			if (obj.event === 'del') {
				layer.confirm('确定要删除吗?', {
					icon: 3,
					title: '提示'
				}, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
							layer.close(index);
						}
					}
					tool.delete("/admin/conf/delete", { id: obj.data.id }, callback);
				});
			}
		});

		//监听搜索提交
		form.on('submit(webform)', function (data) {
			if (data.field.keywords) {
				tableIns.reload({
					where: { keywords: data.field.keywords }, page: { curr: 1 }
				});
			} else {
				location.reload();
			}
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
