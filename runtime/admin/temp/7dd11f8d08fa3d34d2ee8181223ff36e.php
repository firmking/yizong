<?php /*a:2:{s:39:"G:\gougu\app\admin\view\crud\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
    <table class="layui-table layui-form">
        <thead>
			<tr>
				<th colspan="7" class="red" style="text-align:left; line-height:1.8">
					使用【<strong>一键CRUD生成代码</strong>】功能可以帮你完成 <strong>60%</strong> 以上的开发工作，只有系统的超级管理员才可以使用该功能，使用前请先<strong>新建数据表</strong>
					<br/>注意：数据表的注释必须带 <strong>::crud</strong> 标识才能被识别，例如：文章表::crud。<a href="http://admin.gougucms.com/" target="_blank" class="layui-btn layui-btn-normal layui-btn-xs">查看建表样例</a>
				</th>
			</tr>
			<tr>
				<th style="text-align:center;">ID编号</th>
				<th style="text-align:center;">表前缀</th>
				<th>数据表名</th>
				<th style="text-align:center;">数据量</th>
				<th style="text-align:center;">创建时间</th>
				<th>数据表注释</th>
				<th style="text-align:center;">操作</th>
			</tr>
        </thead>
        <tbody>
        <?php if(is_array($table_info) || $table_info instanceof \think\Collection || $table_info instanceof \think\Paginator): $i = 0; $__LIST__ = $table_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr>
            <td style="text-align:center;"><?php echo htmlentities($i); ?></td>
            <td style="text-align:center;"><?php echo htmlentities($prefix); ?></td>
            <td><?php echo htmlentities($v['title']); ?></td>
            <td style="text-align:center;"><?php echo htmlentities($v['Rows']); ?></td>
            <td style="text-align:center;"><?php echo htmlentities($v['Create_time']); ?></td>
            <td><?php echo htmlentities($v['Comment']); ?></td>
            <td style="text-align:center;">
				<?php if($v['crud'] == '0'): ?>
                <a href="/admin/crud/table?name=<?php echo htmlentities($v['Name']); ?>" class="layui-btn layui-btn-xs">一键CRUD生成代码</a>
				<?php else: ?>
				已生成CRUD <a href="/admin/crud/table?name=<?php echo htmlentities($v['Name']); ?>" class="layui-btn layui-btn-normal layui-btn-xs">详细</a>
				<?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
	</table>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var tool = layui.tool;		
	}
</script>

	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
