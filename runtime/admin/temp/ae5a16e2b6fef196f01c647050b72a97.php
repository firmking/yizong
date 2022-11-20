<?php /*a:2:{s:39:"G:\gougu\app\admin\view\rule\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<div class="gg-form-bar border-t border-x">
		<button class="layui-btn layui-btn-sm add-menu">+ 添加菜单/节点</button>
	</div>
	<div>
		<table class="layui-hide" id="treeTable" lay-filter="treeTable"></table>
	</div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool', 'treeGrid'];
	function gouguInit() {
		var treeGrid = layui.treeGrid,table = layui.table, tool = layui.tool;
		var pageTable = treeGrid.render({
			id: 'treeTable'
			, elem: '#treeTable'
			, idField: 'id'
			, url: "/admin/rule/index"
			, cellMinWidth: 80
			, treeId: 'id'//树形id字段名称
			, treeUpId: 'pid'//树形父id字段名称
			, treeShowName: 'title'//以树形式显示的字段
			, cols: [[
				{ field: 'id', width: 80, title: 'ID号', align: 'center' }
				, { field: 'sort', width: 60, title: '排序', align: 'center' }
				,{field:'icon',title: '菜单图标',width: 80, align: 'center' ,templet: function(d){
					var html='<strong class="bi '+d.icon+'"></strong>';
					return html;
				}}
				, { field: 'title', width: 160, title: '菜单/节点名称' }
				, { field: 'pid', title: '父ID', width: 80, align: 'center' }
				, { field: 'src', title: 'URL链接' }
				, {
					field: 'menu', width: 100, title: '是否是菜单', align: 'center', templet: function (d) {
						var html = '<span style="color:#fbbc05">否</span>';
						if (d.menu == '1') {
							html = '<span style="color:#12bb37">是</span>';
						}
						return html;
					}
				}
				, { field: 'name', width: 110, title: '操作日志名称', align: 'center' }
				, {
					width: 188, title: '操作', align: 'center'
					, templet: function (d) {
						var html = '<span class="layui-btn-group"><button class="layui-btn layui-btn-xs" lay-event="add">添加子菜单/节点</button><button class="layui-btn  layui-btn-normal layui-btn-xs" lay-event="edit">编辑</button><button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button>';
						return html;
					}
				}
			]]
			, page: false
		});
		//表头工具栏事件
		$('.add-menu').on('click', function () {
			tool.side("/admin/rule/add");
			return;
		});

		//操作按钮
		treeGrid.on('tool(treeTable)', function (obj) {
			console.log(obj);
			if (obj.event === 'add') {
				tool.side('/admin/rule/add?pid=' + obj.data.id);
				return;
			}
			if (obj.event === 'edit') {
				tool.side('/admin/rule/add?id=' + obj.data.id);
				return;
			}
			if (obj.event === 'del') {
				layer.confirm('确定要删除吗?', { icon: 3, title: '提示' }, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/rule/delete", { id: obj.data.id }, callback);
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
