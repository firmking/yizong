<?php /*a:2:{s:48:"G:\gougu\app\admin\view\database\backuplist.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<div class="gg-form-bar border-t border-x" style="background-color:#FAFAFA">
		<h3>数据还原</h3>
	</div>
	<table cellspacing="0" cellpadding="0" border="0" class="layui-table layui-table-form">
		<tr>
			<th style=" text-align: center; font-weight: 800;"><span>文件名称</span></th>
			<th style=" text-align: center; font-weight: 800;"><span>文件格式</span></th>
			<th style=" text-align: center; font-weight: 800;"><span>分隔符</span></th>
			<th style=" text-align: center; font-weight: 800;"><span>文件总大小</span></th>
			<th style=" text-align: center; font-weight: 800;"><span>分卷总数</span></th>
			<th style=" text-align: center; font-weight: 800; width:222px"><span>操作</span></th>
		</tr>
		<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
		<tr>
			<td colspan="6" align="center">暂无备份数据</td>
		</tr>
		<?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
		<tr style="background-color: #fafafa;">
			<td><strong>备份时间：<?php echo htmlentities($vo['time']); ?></strong><?php if($vo['timespan'] == $lock_time): ?><span
					style="color:red; margin-left:20px;">该备份不是完整备份，请删除重新备份</span><?php endif; ?></td>
			<td align="center"><span>.sql</span></td>
			<td align="center"><span><?php echo htmlentities($vo['data']['compress']); ?></span></td>
			<td align="center"><span><?php echo format_bytes($vo['data']['size']); ?></span></td>
			<td align="center"><span><?php echo htmlentities($vo['data']['part']); ?></span></td>
			<td align="center">
				<div class="layui-btn-group" data-time='<?php echo htmlentities($vo['timespan']); ?>'>
					<?php if($vo['timespan'] == $lock_time): ?>
					<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="reset">清除不完整的备份</a>
					<?php else: ?>
					<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="import">数据还原</a>
					<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">备份删除</a>
					<?php endif; ?>
				</div>
			</td>
		</tr>
		<?php $__FOR_START_1763538674__=0;$__FOR_END_1763538674__=$vo['data']['part'];for($i=$__FOR_START_1763538674__;$i < $__FOR_END_1763538674__;$i+=1){ ?>
		<tr>
			<td colspan="5">
				<?php echo date("Ymd",$vo['timespan']); ?><?php echo htmlentities($vo['data']['compress']); ?><?php echo date("His",$vo['timespan']); ?><?php echo htmlentities($vo['data']['compress']); ?><?php echo htmlentities($i+1); ?>.sql
			</td>
			<td align="center">
				<a class="layui-btn layui-btn-xs"
					href='/admin/database/downfile?time=<?php echo htmlentities($vo['data']['time']); ?>&part=<?php echo htmlentities($i+1); ?>'>下载备份(分卷<?php echo htmlentities($i+1); ?>)</a>
			</td>
		</tr>
		<?php } ?>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</div>


	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	function gouguInit() {
		function importData(data) {
			if (data.code == 0) {
				console.log(data.msg);
				layer.closeAll();
				layer.msg(data.msg, { time: 200000 });
				if ($.isPlainObject(data.data)) {
					$.ajax({
						url: "/admin/database/import",
						type: 'get',
						data: { "part": data.data.part, "start": data.data.start, time: data.data.time },
						success: function (res) {
							importData(res);
						}
					})
				} else {
					layer.msg(data.msg);
					window.onbeforeunload = function () { return null; }
				}
			} else {
				layer.msg(data.msg);
			}
		}
		//监听行工具事件
		$('[lay-event="import"]').on('click', function () {
			var time = $(this).parent().data('time');
			layer.confirm('确认要还原该备份吗?', {
				icon: 3,
				title: '提示'
			}, function (index) {
				layer.msg("数据还原中...", { time: 200000 });
				$.ajax({
					url: "/admin/database/import?time=" + time,
					type: 'post',
					success: function (res) {
						importData(res);
					}
				})
				window.onbeforeunload = function () { return "正在还原数据库，请不要关闭！" }
				layer.close(index);
			});
			return false;
		})

		$('[lay-event="del"]').on('click', function () {
			var time = $(this).parent().data('time');
			layer.confirm('确认要删除该备份吗?', {
				icon: 3,
				title: '提示'
			}, function (index) {
				$.ajax({
					url: "/admin/database/del",
					data: { 'time': time },
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
			return false;
		})

		$('[lay-event="reset"]').on('click', function () {
			var time = $(this).parent().data('time');
			layer.confirm('确认要清除该备份吗?', {
				icon: 3,
				title: '提示'
			}, function (index) {
				$.ajax({
					url: "/admin/database/del",
					data: { 'time': time, 'lock': 1 },
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
			return false;
		})
	}
</script>

	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
