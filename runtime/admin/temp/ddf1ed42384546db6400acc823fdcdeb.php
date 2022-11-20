<?php /*a:2:{s:41:"G:\gougu\app\admin\view\module\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<table class="layui-hide" id="list" lay-filter="list"></table>
</div>
<script type="text/html" id="toolbarDemo">
  <div>
  	<span class="red">模块功能即将推出，该列表目前只是预设数据，不影响开发者进行二次开发。</span>
  </div>
</script>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var tool = layui.tool, table = layui.table;
		layui.pageTable = table.render({
			elem: '#list'
			, toolbar: '#toolbarDemo'
			, title: '功能模块列表'
			, url: "/admin/module/index"
			, page: false //开启分页
			, cellMinWidth: 80
			, cols: [[
				{ field: 'id', width: 80, title: 'ID号', align: 'center' }
				, { field: 'title', title: '模块名称' }
				, {
					field: 'name', title: '模块所在目录', templet: function (d) {
						var html = 'app/' + d.name;
						return html;
					}
				}
				, {
					field: 'status', title: '状态', width: 80, align: 'center', templet: function (d) {
						var html1 = '<span>正常</span>';
						var html2 = '<span style="color:#FF5722">禁用</span>';
						if (d.status == 1) {
							return html1;
						}
						else {
							return html2;
						}
					}
				}
				, {
					field: 'type', title: '类型', width: 120, align: 'center', templet: function (d) {
						var html1 = '<span>系统模块</span>';
						var html2 = '<span style="color:#FF5722">普通模块</span>';
						if (d.type == 1) {
							return html1;
						}
						else {
							return html2;
						}
					}
				}
				, {
					width: 100, title: '操作', align: 'center', templet: function (d) {
						var html = '';
						var btn = '<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>';
						var btn1 = '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="disable">禁用</a>';
						var btn2 = '<a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="open">启用</a>';
						if (d.status == 1) {
							html = '<div class="layui-btn-group">' + btn + btn1 + '</div>';
						}
						else {
							html = '<div class="layui-btn-group">' + btn + btn2 + '</div>';
						}
						return html;
					}
				}
			]]
		});

		table.on('tool(list)', function (obj) {
			if (obj.event === 'edit') {
				addExpense(obj.data.id, obj.data.title, obj.data.name);
			}
			if (obj.event === 'disable') {
				layer.confirm('确定要禁用该模块吗?', { icon: 3, title: '提示' }, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							layer.close(index);
							layui.pageTable.reload()
						}
					}
					tool.post("/admin/module/disable", { id: obj.data.id, status: 0 }, callback);
					layer.close(index);
				});
			}
			if (obj.event === 'open') {
				layer.confirm('确定要启用该模块吗?', { icon: 3, title: '提示' }, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							layer.close(index);
							layui.pageTable.reload()
						}
					}
					tool.post("/admin/module/disable", { id: obj.data.id, status: 1 }, callback);
					layer.close(index);
				});
			}
		});

		$('body').on('click', '.addNew', function () {
			addExpense(0, '', '');
		});

		function addExpense(id, title, name) {
			layer.open({
				type: 1
				, title: id > 0 ? '新增模块' : '编辑模块'
				, area: '398px;'
				, id: 'GG_module' //设定一个id，防止重复弹出
				, btn: ['确定', '取消']
				, btnAlign: 'c'
				, content: `<div style="padding-top:16px;">
								<div class="layui-form-item">
								  <label class="layui-form-label">模块名称</label>
								  <div class="layui-input-inline">
									<input type="hidden" name="id" value="${id}">
									<input type="text" name="title" autocomplete="off" value="${title}" placeholder="请输入模块名称" class="layui-input">
								  </div>
								</div>
								<div class="layui-form-item">
								  <label class="layui-form-label">所在目录</label>
								  <div class="layui-input-inline">
									<input type="text" name="name" autocomplete="off" value="${name}" placeholder="请输入至少2个小写字符" class="layui-input">
								  </div>
								</div>
								<div style="padding:8px 0;text-align:center;color:red">目录如："app/admin"，只需要填写"admin"就可以了。</div>
							  </div>`
				, yes: function (index) {
					let id = $('#GG_module').find('[name="id"]').val();
					let title = $('#GG_module').find('[name="title"]').val();
					let name = $('#GG_module').find('[name="name"]').val();
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							layer.close(index);
							layui.pageTable.reload();
						}
					}
					tool.post("/admin/module/add", { id: id, title: title, name: name }, callback);
				}
				, btn2: function () {
					layer.closeAll();
				}
			});
		}
	}
</script>

	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
