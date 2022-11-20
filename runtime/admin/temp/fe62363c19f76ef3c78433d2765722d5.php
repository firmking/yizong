<?php /*a:2:{s:46:"G:\gougu\app\admin\view\database\database.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<table class="layui-hide" id="backup" lay-filter="backup"></table>
</div>
<script type="text/html" id="toolbarDemo">
	<div class="layui-btn-group">
		<span class="layui-btn layui-btn-sm layui-btn-normal" lay-event="backup">数据备份</span><span class="layui-btn layui-btn-sm" lay-event="optimize">数据表优化</span><span class="layui-btn layui-btn-danger layui-btn-sm" lay-event="repair">数据表修复</span>
  	</div>
	<span id="dataTips" style="font-size:12px; margin-left:10px"></span>  
</script>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	function gouguInit() {
		var table = layui.table, form = layui.form;
		var tableIns = table.render({
			elem: '#backup',
			title: '数据备份',
			toolbar: '#toolbarDemo',
			url: "/admin/database/database", //数据接口
			page: false,
			cols: [
				[ //表头
					{ type: 'checkbox' },
					{
						field: 'name',
						title: '数据表',
						width: 200
					},
					{
						field: 'status',
						title: '状态',
						width: 100,
						templet: function (d) {
							return '<span id="table_' + d.name + '">-</span>';
						}
					},
					{
						field: 'engine',
						title: '存储引擎',
						align: 'center',
						width: 80
					}, {
						field: 'row_format',
						title: '行格式',
						align: 'center',
						width: 80
					}, {
						field: 'rows',
						title: '行数',
						align: 'center',
						width: 60,
					}, {
						field: 'data_size',
						title: '字节数',
						align: 'center',
						width: 80
					}, {
						field: 'data_length',
						title: '数据大小',
						align: 'center',
						width: 80
					}, {
						field: 'comment',
						title: '数据表注释'
					}, {
						field: 'create_time',
						title: '创建时间',
						width: 160,
						align: 'center'
					}
				]
			],
			done: function (res, curr, count) {
				$('#dataTips').html(res.msg);
			}
		});

		//递归备份表
		function backup(tab, status, table) {
			layer.closeAll();
			layer.msg("备份中...，请勿关闭本页面", { time: 200000 });
			$.get("/admin/database/backup", tab, function (data) {
				if (data.code == 0) {
					showmsg(data.data.tab.table, data.msg);
					if (data.data.tab.start == 'ok') {
						layer.msg('备份完成');
						window.onbeforeunload = function () { return null }
						return;
					}
					backup(data.data.tab, tab.id != data.data.tab.id);
				} else {
					layer.msg('立即备份');
				}
			}, "json");
		}

		//修改备份状态
		function showmsg(table, msg) {
			console.log(table);
			$("#table_" + table).addClass('span-color-2').html(msg);
		}
		//监听行工具事件
		table.on('toolbar(backup)', function (obj) {
			var checkData = table.checkStatus(obj.config.id).data;
			var len = checkData.length;
			var tables = [];
			if (len == 0) {
				layer.msg('请先选择表');
				return false;
			}
			for (var i = 0; i < len; i++) {
				tables.push(checkData[i].name);
			}
			if (obj.event === 'backup') {
				layer.confirm('确认要备份选中的' + len + '个数据表吗?', {
					icon: 3,
					title: '提示'
				}, function (index) {
					$.ajax({
						url: "/admin/database/backup",
						type: 'post',
						data: { 'tables': tables },
						success: function (res) {
							if (res.code == 0) {
								layer.msg("开始备份，请不要关闭本页面！");
								window.onbeforeunload = function () { return "正在备份数据库，请不要关闭！" }
								backup(res.data.tab);
							}
							if (res.code == 2) {
								layer.confirm('检测到有一个备份任务未完成，请先清除未完成的备份', {
									icon: 3,
									title: '提示'
								}, function (index) {
									$.ajax({
										url: "/admin/database/del",
										data: { 'lock': 1 },
										success: function (res) {
											layer.msg(res.msg);
										}
									})
								})
							}
							else {
								layer.msg(res.msg);
							}
						}
					})
					layer.close(index);
				});
			} else if (obj.event === 'optimize') {
				layer.confirm('确认要优化选中的' + len + '个数据表吗?', {
					icon: 3,
					title: '提示'
				}, function (index) {
					$.ajax({
						url: "/admin/database/optimize",
						type: 'post',
						data: { 'tables': tables },
						success: function (res) {
							layer.msg(res.msg);
							if (res.code == 0) {
								setTimeout(function () {
									location.reload();
								}, 2000)
							}
						}
					})
					layer.close(index);
				});
			} else if (obj.event === 'repair') {
				layer.confirm('确认要修复选中的' + len + '个数据表吗?', {
					icon: 3,
					title: '提示'
				}, function (index) {
					$.ajax({
						url: "/admin/database/repair",
						type: 'post',
						data: { 'tables': tables },
						success: function (res) {
							layer.msg(res.msg);
							if (res.code == 0) {
								setTimeout(function () {
									location.reload();
								}, 2000)
							}
						}
					})
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
