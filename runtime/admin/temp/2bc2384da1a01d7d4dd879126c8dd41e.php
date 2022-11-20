<?php /*a:2:{s:40:"G:\gougu\app\admin\view\slide\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
			<input type="text" name="keywords" placeholder="ID/标题/标识/备注" class="layui-input" />
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">提交搜索</button>
	</form>
	<table class="layui-hide" id="slide" lay-filter="slide"></table>
</div>

<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}layui-icon-ok{{#  } else { }}layui-icon-close{{#  } }}"></i>
</script>
<script type="text/html" id="toolbarDemo">
	<div class="layui-btn-container">
	<button class="layui-btn layui-btn-sm" lay-event="add">+ 添加轮播组</button>
  </div>
</script>
<script type="text/html" id="barDemo">
<div class="layui-btn-group"><a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-xs layui-btn-normal" href="/admin/slide/slide_info?id={{d.id}}">管理轮播</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a></div>
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
			elem: '#slide',
			title: '轮播组列表',
			toolbar: '#toolbarDemo',
			url: '/admin/slide/index', //数据接口				
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
						field: 'title',
						title: '标题',
						width: 240
					}, {
						field: 'name',
						title: '标识',
						align: 'center',
						width: 160
					}, {
						field: 'desc',
						title: '备注'
					}, {
						field: 'status',
						title: '状态',
						toolbar: '#status',
						align: 'center',
						width: 80
					}, {
						field: 'right',
						title: '操作',
						toolbar: '#barDemo',
						width: 160,
						align: 'center'
					}
				]
			]
		});

		//表头工具栏事件
		table.on('toolbar(slide)', function (obj) {
			if (obj.event === 'add') {
				tool.side("/admin/slide/add");
				return;
			}
		});
		//监听行工具事件
		table.on('tool(slide)', function (obj) {
			var data = obj.data;
			if (obj.event === 'edit') {
				tool.side('/admin/slide/add?id=' + obj.data.id);
				return;
			}
			if (obj.event === 'del') {
				layer.confirm('确定删除该轮播组吗？', {
					icon: 3,
					title: '提示'
				}, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/slide/delete", { id: data.id }, callback);
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
