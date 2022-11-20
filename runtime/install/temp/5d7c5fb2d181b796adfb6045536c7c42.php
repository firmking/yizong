<?php /*a:1:{s:42:"G:\gougu\app\install\view\index\step2.html";i:1668565607;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>勾股CMS安装</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="/static/assets/layui/css/layui.css" media="all">
	<style>
		body {
			width: 100%;
			height: 100%;
			background-size: cover;
			background: url("/static/admin/images/bg_pattern.png"), #7b4397;
			background: url("/static/admin/images/bg_pattern.png"), -webkit-linear-gradient(to left, #34a853, #4285f4);
			background: url("/static/admin/images/bg_pattern.png"), linear-gradient(to left, #34a853, #4285f4);
		}
	</style>
</head>

<body>
	<div style="width:200px;margin: 20px auto;"><img src="/static/admin/images/login_logo.png" alt="勾股CMS安装"
			width="200"></div>
	<div style="width:888px;margin:0 auto 30px;">
		<div class="layui-layout layui-layout-admin">
			<div class="layui-header layui-bg-red" style="border-radius:6px 6px 0 0;position:relative;">
				<div class="layui-logo" style="color: #fff; width:100px;">安装引导</div>
				<ul class="layui-nav layui-layout-right">
					<li class="layui-nav-item">v<?php echo CMS_VERSION; ?></li>
				</ul>
			</div>
			<div style="padding:20px; background-color:#fff;line-height: 27px; border-radius:0 0 6px 6px">
				<h3>安装环境检测</h3>
				<table class="layui-table" lay-skin="nob" lay-size="sm">
					<colgroup>
						<col width="150">
						<col width="200">
						<col width="200">
						<col width="100">
						<col>
					</colgroup>
					<thead>
						<tr>
							<th>环境</th>
							<th>最低配置</th>
							<th>当前配置</th>
							<th>是否符合</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>操作系统</td>
							<td>不限</td>
							<td>
								<?php echo php_uname('s'); ?>
							</td>
							<td class="yes"><i class="layui-icon layui-icon-ok"></i></td>
						</tr>
						<tr>
							<td>php版本</td>
							<td>≥ 7.0</td>
							<td>
								<?php echo PHP_VERSION ?>
							</td>
							<?php $php_version=explode('.', PHP_VERSION); ?>
							<td class="<?php if(($php_version['0']>=7))echo 'yes'; ?>">
								<?php if (($php_version['0']>=7)): ?>
								<i class="layui-icon layui-icon-ok"></i>
								<?php else: ?>
								<i class="layui-icon layui-icon-close"></i>
								<?php endif ?>
							</td>
						</tr>
					</tbody>
				</table>
				<h3>模块检测</h3>
				<table class="layui-table" lay-skin="nob" lay-size="sm">
					<colgroup>
						<col width="150">
						<col width="200">
						<col width="200">
						<col width="100">
						<col>
					</colgroup>
					<thead>
						<tr>
							<th>环境</th>
							<th>最低配置</th>
							<th>当前配置</th>
							<th>是否符合</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>session</td>
							<td>支持</td>
							<td><?php if($data['session'] == '1'): ?>支持<?php else: ?>不支持<?php endif; ?></td>
							<td><i class="layui-icon <?php if($data['session'] == '1'): ?>layui-icon-ok yes<?php else: ?>layui-icon-close<?php endif; ?>">
								</i> </td>
						</tr>
						<tr>
							<td>PDO</td>
							<td>开启</td>
							<td><?php if($data['pdo'] == '1'): ?>已开启<?php else: ?>未开启<?php endif; ?></td>
							<td><i class="layui-icon <?php if($data['pdo'] == '1'): ?>layui-icon-ok yes<?php else: ?>layui-icon-close<?php endif; ?>"> </i>
							</td>
						</tr>
						<tr>
							<td>PDO_Mysql</td>
							<td>开启</td>
							<td><?php if($data['pdo_mysql'] == '1'): ?>已开启<?php else: ?>未开启<?php endif; ?></td>
							<td><i class="layui-icon <?php if($data['pdo_mysql'] == '1'): ?>layui-icon-ok yes<?php else: ?>layui-icon-close<?php endif; ?>"> </i> </td>
						</tr>
						<tr>
							<td>上传限制</td>
							<td>≥ 2M</td>
							<td><?php if($data['upload_size'] == '0'): ?>不支持<?php else: ?><?php echo htmlentities($data['upload_size']); ?><?php endif; ?></td>
							<td><i class="layui-icon <?php if($data['upload_size'] == '0'): ?>layui-icon-close<?php else: ?>layui-icon-ok yes<?php endif; ?>">
								</i> </td>
						</tr>
					</tbody>
				</table>
				<h3>目录权限</h3>
				<table class="layui-table" lay-skin="nob" lay-size="sm">
					<colgroup>
						<col width="150">
						<col width="200">
						<col width="200">
						<col width="100">
						<col>
					</colgroup>
					<thead>
						<tr>
							<th>环境</th>
							<th>最低配置</th>
							<th>当前配置</th>
							<th>是否符合</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>config</td>
							<td>可写</td>
							<td>
								<?php if (is_writable(CMS_ROOT . 'config')): ?>
								可写
								<?php else: ?>
								不可写
								<?php endif ?>
							</td>
							<td class="<?php if(is_writable(CMS_ROOT . 'config'))echo 'yes'; ?>">
								<?php if (is_writable(CMS_ROOT . 'config')): ?>
								<i class="layui-icon layui-icon-ok"></i>
								<?php else: ?>
								<i class="layui-icon layui-icon-close"></i>
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<td>/storage</td>
							<td>可写</td>
							<td>
								<?php if (is_writable('./storage')): ?>
								可写
								<?php else: ?>
								不可写
								<?php endif ?>
							</td>
							<td class="<?php if(is_writable('./storage'))echo 'yes'; ?>">
								<?php if (is_writable('./storage')): ?>
								<i class="layui-icon layui-icon-ok"></i>
								<?php else: ?>
								<i class="layui-icon layui-icon-close"></i>
								<?php endif ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div style="margin:10px auto;width: 190px;">
					<a href="/index.php?s=install/index/index" class="layui-btn layui-bg-cyan">上一步</a>
					<a href="javascript:;" class="layui-btn layui-bg-blue" id="step2">下一步</a>
				</div>
			</div>
		</div>
	</div>

	<script src="/static/assets/layui/layui.js" charset="utf-8"></script>
	<script>
		layui.use(['jquery', 'layer'], function () {
			var $ = layui.jquery,
				layer = layui.layer;
			$('#step2').click(function () {
				if ($('.yes').length != 8) {
					layer.tips('您的配置或权限不符合要求', this);
				} else {
					location.href = "/index.php?s=install/index/step3";
				}
			})

		});
	</script>
</body>

</html>