<?php /*a:2:{s:43:"G:\gougu\app\admin\view\position\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<table class="layui-hide" id="test" lay-filter="test"></table>
</div>

<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}green layui-icon-ok{{#  } else { }}yellow layui-icon-close{{#  } }}"></i>
</script>
<script type="text/html" id="toolbarDemo">
	<div class="layui-btn-container">
		<button class="layui-btn layui-btn-sm" lay-event="add">+ 添加岗位</button>
	</div>
</script>
<script type="text/html" id="barDemo">
<div class="layui-btn-group"><button class="layui-btn layui-btn-xs" lay-event="edit">编辑</button><button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button></div>
</script>


	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var table = layui.table, tool = layui.tool;
		layui.pageTable = table.render({
			elem: '#test',
			title: '岗位列表',
			toolbar: '#toolbarDemo',
			url: "/admin/position/index", //数据接口				
			page: false, //开启分页
			cols: [
				[
					{
						field: 'id',
						title: 'ID号',
						align: 'center',
						width: 80
					}, {
						field: 'title',
						title: '岗位名称',
						align: 'center',
						width: 120
					},{
						field: 'remark',
						title: '备注'
					},{
						field: 'work_price',
						title: '岗位工时单价(元)',
						align: 'center',
						width: 132
					}, {
						field: 'status',
						title: '状态',
						toolbar: '#status',
						align: 'center',
						width: 60
					}, {
						field: 'right',
						title: '操作',
						toolbar: '#barDemo',
						width: 120,
						align: 'center'
					}
				]
			]
		});

		//表头工具栏事件
		table.on('toolbar(test)', function(obj){
			if (obj.event === 'add') {
				tool.side("/admin/position/add");
				return;
			}
		});
		//监听行工具事件
		table.on('tool(test)', function (obj) {
			var data = obj.data;
			if(obj.event === 'edit'){
				tool.side('/admin/position/add?id='+data.id);
				return;
			}
			if (obj.event === 'del') {
				if (data.id == 1) {
					layer.msg('董事长职位不能删除');
					return;
				}
				layer.confirm('您确定要删除该岗位', {
					icon: 3,
					title: '提示'
				}, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/position/delete", { id: obj.data.id }, callback);
					layer.close(index);
				});
			}
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
