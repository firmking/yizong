<?php /*a:2:{s:40:"G:\gougu\app\admin\view\links\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
			<input type="text" name="keywords" placeholder="ID/名称" class="layui-input" />
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">提交搜索</button>
	</form>
	<table class="layui-hide" id="link" lay-filter="link"></table>
</div>

<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}layui-icon-ok{{#  } else { }}layui-icon-close{{#  } }}"></i>
</script>

<script type="text/html" id="toolbarDemo">
  <div class="layui-btn-container">
    <button class="layui-btn layui-btn-sm" lay-event="add">+ 添加友情链接</button>
  </div>
</script>
<script type="text/html" id="barDemo">
<div class="layui-btn-group"><a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a></div>
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
			elem: '#link',
			title: '友情链接列表',
			toolbar: '#toolbarDemo',
			url: '/admin/links/index', //数据接口
			page: false, //开启分页
			cols: [
				[
					{
						field: 'id',
						title: 'ID号',
						align: 'center',
						width: 80
					}, {
						field: 'name',
						title: '网站名称',
						width: 240
					}, {
						field: 'src',
						title: '网站链接'
					}, {
						field: 'sort',
						title: '排序',
						width: 80,
						align: 'center'
					}, {
						field: 'right',
						title: '操作',
						toolbar: '#barDemo',
						width: 100,
						align: 'center'
					}
				]
			]
		});

		//表头工具栏事件
		table.on('toolbar(link)', function (obj) {
			if (obj.event === 'add') {
				tool.side("/admin/links/add");
				return;
			}
		});

		//监听行工具事件
		table.on('tool(link)', function (obj) {
			var data = obj.data;
			if (obj.event === 'edit') {
				tool.side('/admin/links/add?id=' + obj.data.id);
				return;
			}
			if (obj.event === 'del') {
				layer.confirm('确定要删除该数据吗？', {
					icon: 3,
					title: '提示'
				}, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/links/delete", { id: data.id }, callback);
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
