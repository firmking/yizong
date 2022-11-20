<?php /*a:2:{s:40:"G:\gougu\app\admin\view\level\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<table class="layui-hide" id="level" lay-filter="level"></table>
</div>
<script type="text/html" id="toolbarDemo">
  <div class="layui-btn-container">
  	<button class="layui-btn layui-btn-sm addNew" type="button">+ 添加用户等级</button>
  </div>
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
			elem: '#level'
			, toolbar: '#toolbarDemo'
			, title: '用户等级列表'
			, url: "/admin/level/index"
			, page: false //开启分页
			, cellMinWidth: 120
			, cols: [[
				{ field: 'id', width: 80, title: 'ID号', align: 'center' }
				, { field: 'title', title: '等级名称', width: 120, align: 'center' }
				, { field: 'desc', title: '等级描述' }
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

		table.on('tool(level)', function (obj) {
			if (obj.event === 'edit') {
				addExpense(obj.data.id, obj.data.title, obj.data.desc);
			}
			if (obj.event === 'disable') {
				layer.confirm('确定要禁用该等级吗?', { icon: 3, title: '提示' }, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							layer.close(index);
							layui.pageTable.reload()
						}
					}
					tool.post("/admin/level/disable", { id: obj.data.id, status: 0 }, callback);
					layer.close(index);
				});
			}
			if (obj.event === 'open') {
				layer.confirm('确定要启用该等级吗?', { icon: 3, title: '提示' }, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							layer.close(index);
							layui.pageTable.reload()
						}
					}
					tool.post("/admin/level/disable", { id: obj.data.id, status: 1 }, callback);
					layer.close(index);
				});
			}
		});

		$('body').on('click', '.addNew', function () {
			addExpense(0, '', '');
		});

		function addExpense(id, title, desc) {
			var biaoti = '新增等级';
			if (id > 0) {
				biaoti = '编辑等级';
			}

			layer.open({
				type: 1
				, title: biaoti
				, area: '512px;'
				, id: 'LAY_module' //设定一个id，防止重复弹出
				, btn: ['确定', '取消']
				, btnAlign: 'c'
				, content: '<div style="padding-top:15px;">\
								<div class="layui-form-item">\
								  <label class="layui-form-label">等级名称</label>\
								  <div class="layui-input-inline" style="width:360px;">\
									<input type="hidden" name="id" value="'+ id + '">\
									<input type="text" name="title" autocomplete="off" value="'+ title + '" placeholder="请输入模块名称" class="layui-input">\
								  </div>\
								</div>\
								<div class="layui-form-item">\
								  <label class="layui-form-label">等级描述</label>\
								  <div class="layui-input-inline" style="width:360px;">\
									<textarea name="desc" placeholder="请输入等级描述，100字以内" class="layui-textarea">'+ desc + '</textarea>\
								  </div>\
								</div>\
							  </div>'
				, yes: function (index) {
					let id = $('#LAY_module').find('[name="id"]').val();
					let title = $('#LAY_module').find('[name="title"]').val();
					let desc = $('#LAY_module').find('[name="desc"]').val();
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							if (e.code == 0) {
								layer.close(index);
								layui.pageTable.reload();
							}
						}
					}
					tool.post("/admin/level/add", {
						id: id,
						title: title,
						desc: desc
					}, callback);
					return false;
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
