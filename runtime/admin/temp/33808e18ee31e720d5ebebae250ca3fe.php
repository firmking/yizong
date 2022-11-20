<?php /*a:2:{s:43:"G:\gougu\app\admin\view\pages\datalist.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
			<input type="text" name="keywords" placeholder="请输入关键字" class="layui-input" autocomplete="off" />
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="searchform">提交搜索</button>
	</form>
	<table class="layui-hide" id="pages" lay-filter="pages"></table>
</div>

<script type="text/html" id="toolbarDemo">
	<div class="layui-btn-container">
		<span class="layui-btn layui-btn-sm" lay-event="add" data-title="添加单页面">+ 添加单页面</span>
	</div>
</script>

<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}layui-icon-ok green{{#  } else { }}layui-icon-close red{{#  } }}"></i>
</script>
<script type="text/html" id="barDemo">
<div class="layui-btn-group"><a class="layui-btn layui-btn-normal layui-btn-xs" href="/home/pages/detail/id/{{d.id}}.html" target="_blank">查看</a><a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a></div>
</script>


	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var table = layui.table,tool = layui.tool, form = layui.form;
		layui.pageTable = table.render({
			elem: '#pages',
			title: '单页面列表',
			toolbar: '#toolbarDemo',
			url: '/admin/pages/datalist',
			page: true,
			limit: 20,
			cellMinWidth: 300,
			cols: [
				[
				{
					fixed: 'left',
					field: 'id',
					title: '编号',
					align: 'center',
					width: 80
				},{
					field: 'title',
					title: '页面名称',
				},{
					field: 'read',
					title: '阅读量',
					align: 'center',
					width: 100
				},{
					field: 'name',
					title: 'URL文件名',
					align: 'center',
					width: 100
				},{
					field: 'template',
					title: '前端模板',
					align: 'center',
					width: 100
				},{
					field: 'admin_name',
					title: '创建人',
					align: 'center',
					width: 100
				},{
					field: 'create_time',
					title: '创建时间',
					align: 'center',
					width: 150
				},
				{
					field: 'status',
					title: '上下架',
					toolbar: '#status',
					align: 'center',
					width: 80
				},
				{
					fixed: 'right',
					field: 'right',
					title: '操作',
					toolbar: '#barDemo',
					width: 136,
					align: 'center'
				}				
				]
			]
		});
		
		//监听表头工具栏事件
		table.on('toolbar(pages)', function(obj){
			if (obj.event === 'add') {
				tool.side("/admin/pages/add");
				return false;
			}
		});

		//监听表格行工具事件
		table.on('tool(pages)', function(obj) {
			var data = obj.data;
			if (obj.event === 'read') {
				tool.side('/admin/pages/read?id='+obj.data.id);
			}
			else if (obj.event === 'edit') {
				tool.side('/admin/pages/edit?id='+obj.data.id);
			}
			else if (obj.event === 'del') {
				layer.confirm('确定要删除该记录吗?', {
					icon: 3,
					title: '提示'
				}, function(index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/pages/del", { id: data.id }, callback);
					layer.close(index);
				});
			}
			return false;
		});

		//监听搜索提交
		form.on('submit(searchform)', function(data) {
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
