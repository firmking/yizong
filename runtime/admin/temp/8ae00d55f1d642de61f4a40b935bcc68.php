<?php /*a:2:{s:41:"G:\gougu\app\admin\view\article\read.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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


<style>
.content-article img{max-width:88%!important; height:auto!important; margin:6px 0!important; border-radius:4px;}
</style>

</head>
<body class="main-body">
	<!-- 主体 -->
	
<div class="layui-form p-4">
	<h3 class="pb-3">文章详情</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">文章标题</td>
			<td colspan="3"><?php echo htmlentities($detail['title']); ?></td>
			<td class="layui-td-gray">所属分类</td>
			<td>
			<?php $_result=set_recursion(get_article_cate());if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($detail['cate_id'] == $v['id']): ?><?php echo htmlentities($v['title']); ?><?php endif; ?>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">关键字</td>
			<td colspan="3"><?php echo htmlentities($detail['keyword_names']); ?></td>
			<td class="layui-td-gray">文章属性</td>
			<td>
			<?php if($detail['type'] == '1'): ?>精华<?php endif; if($detail['type'] == '2'): ?>热门<?php endif; if($detail['type'] == '3'): ?>推荐<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">是否原创</td>
			<td>
				<?php if($detail['original'] == '1'): ?>是<?php endif; if($detail['original'] == '0'): ?>否<?php endif; ?>
			</td>
			<td class="layui-td-gray-2">来源或作者</td>
			<td><?php echo htmlentities($detail['origin']); ?></td>
			<td class="layui-td-gray">来源地址</td>
			<td><?php echo htmlentities($detail['origin_url']); ?></td>
		</tr>
		<tr>			
			<td class="layui-td-gray">排序</td>
			<td><?php echo htmlentities($detail['sort']); ?></td>
			<td class="layui-td-gray-2">是否首页显示</td>
			<td>
				<?php if($detail['is_home'] == '1'): ?>是<?php endif; if($detail['is_home'] == '0'): ?>否<?php endif; ?>
			</td>
			<td rowspan="3" class="layui-td-gray-2">缩略图</td>
			<td rowspan="3">
				<img src="<?php echo htmlentities($detail['thumb']); ?>" onerror="javascript:this.src='/static/assets/gougu/images/nonepic600x360.jpg';this.onerror=null;" style="width:200px; max-width:200px" />
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">创建时间</td>
			<td><?php echo htmlentities($detail['create_time']); ?></td>
			<td class="layui-td-gray">状态</td>
			<td>
				<?php if($detail['status'] == '1'): ?>正常<?php endif; if($detail['status'] == '0'): ?>下架<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">文章摘要</td>
			<td colspan="3"><?php echo htmlentities($detail['desc']); ?></td>
		</tr>
		<tr>
			<td class="layui-td-gray">文章内容</td>
			<td colspan="5" class="content-article">
				<?php echo $detail['content']; ?>
			</td>
		</tr>
	</table>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
	<script>
		const moduleInit = ['tool'];
		function gouguInit() {
			console.log('初始化成功...');
		}
	</script>
	
	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
