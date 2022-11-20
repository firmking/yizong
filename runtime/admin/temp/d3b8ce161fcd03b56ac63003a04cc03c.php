<?php /*a:2:{s:41:"G:\gougu\app\admin\view\search\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
			<input type="text" name="keywords" placeholder="关键字名称" class="layui-input" autocomplete="off" />
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">提交搜索</button>
	</form>
	<table class="layui-hide" id="search" lay-filter="search"></table>
</div>


	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var table = layui.table, tool = layui.tool, form = layui.form;
		layui.pageTable = table.render({
			elem: '#search',
			title: '关键字搜索列表',
			toolbar: '#toolbarDemo',
			url: '/admin/search/index',
			page: true, //开启分页
			limit: 20,
			cols: [
				[{
					field: 'id',
					width: 90,
					title: 'ID号',
					align: 'center'
				}, {
					field: 'title',
					title: '关键字名称'
				}, {
					field: 'times',
					width: 100,
					title: '搜索次数',
					align: 'center'
				}, {
					width: 80,
					title: '操作',
					align: 'center',
					templet: function (d) {
						var html = '';
						var delBtn = '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>';
						return delBtn;
					}
				}]
			]
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

		//删除
		table.on('tool(search)', function (obj) {
			if (obj.event === 'del') {
				layer.confirm('确定要删除吗?', {
					icon: 3,
					title: '提示'
				}, function (index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/search/delete", { id: obj.data.id }, callback);
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
