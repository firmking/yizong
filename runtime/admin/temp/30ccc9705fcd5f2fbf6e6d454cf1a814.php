<?php /*a:2:{s:45:"G:\gougu\app\admin\view\department\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
		<button class="layui-btn layui-btn-sm add-menu">+ 添加部门</button>
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
			, url: "/admin/department/index"
			, cellMinWidth: 80
			, treeId: 'id'//树形id字段名称
			, treeUpId: 'pid'//树形父id字段名称
			, treeShowName: 'title'//以树形式显示的字段
			, height: 'full-0'
			,isOpenDefault:true
			, cols: [[
				 { field: 'id', width: 100, title: 'ID号', align: 'center' }
				, { field: 'pid', title: '上级部门ID',width: 120, align: 'center'}
				, { field: 'title', title: '部门名称'}
				, { field: 'leader', title: '部门负责人',width: 120, align: 'center'}
				, { field: 'phone', title: '部门电话',width: 160,}
				, { width:180, title: '操作', align: 'center', templet: function (d) {
						var html = '<span class="layui-btn-group"><button class="layui-btn layui-btn-xs" lay-event="add">添加下级部门</button><button class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">编辑</button><button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button></span>';
						return html;
					}
				}
			]]
			, page: false
		});
		
		//表头工具栏事件
		$('body').on('click','.add-menu', function(){
			tool.side("/admin/department/add");
			return;
		});

		//操作按钮
		treeGrid.on('tool(treeTable)', function (obj) {
			if (obj.event === 'add') {
				tool.side("/admin/department/add?pid="+obj.data.id);
				return;
			}
			if (obj.event === 'edit') {
				tool.side("/admin/department/add?id="+obj.data.id);
				return;
			}
			if (obj.event === 'del') {
				layer.confirm('确定要删除吗?', {icon: 3, title:'提示'}, function(index){
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/department/delete", { id: obj.data.id }, callback);
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
