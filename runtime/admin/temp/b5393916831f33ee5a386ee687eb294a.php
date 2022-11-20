<?php /*a:2:{s:45:"G:\gougu\app\admin\view\gallery\datalist.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
		<div class="layui-input-inline">
			<select name="cate_id">
				<option value="">请选择图集分类</option>
				<?php $_result=set_recursion(get_gallery_cate());if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
				<option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['title']); ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<div class="layui-input-inline" style="width:300px;">
			<input type="text" name="keywords" placeholder="ID/标题/分类/摘要" class="layui-input" autocomplete="off" />
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">提交搜索</button>
	</form>
	<table class="layui-hide" id="gallery" lay-filter="gallery"></table>
</div>

<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}layui-icon-ok{{#  } else { }}layui-icon-close{{#  } }}"></i>
</script>
<script type="text/html" id="is_home">
	<i class="layui-icon {{#  if(d.is_home == 1){ }}layui-icon-ok{{#  } else { }}layui-icon-close{{#  } }}"></i>
</script>
<script type="text/html" id="toolbarDemo">
	<div class="layui-btn-container">
    <span class="layui-btn layui-btn-sm tab-a" data-title="添加图集" data-href="/admin/gallery/add">+ 添加图集</span>
  </div>
</script>
<script type="text/html" id="barDemo">
<div class="layui-btn-group"><a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="view">查看</a><a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a></div>
</script>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	const moduleInit = ['tool'];
	function gouguInit() {
		var table = layui.table,tool = layui.tool, form = layui.form;
		layui.pageTable = table.render({
			elem: '#gallery',
			title: '图集列表',
			toolbar: '#toolbarDemo',
			url: '/admin/gallery/datalist', //数据接口
			page: true, //开启分页
			limit: 20,
			cols: [
				[ //表头
					{
						field: 'id',
						title: '编号',
						align: 'center',
						width: 80
					}, {
						field: 'cate_title',
						title: '分类',
						width: 200
					}, {
						field: 'title',
						title: '标题'
					},{
						field: 'count',
						title: '图片数',
						align: 'center',
						width: 80
					},{
						field: 'sort',
						title: '排序',
						align: 'center',
						width: 80
					}, {
						field: 'status',
						title: '状态',
						toolbar: '#status',
						align: 'center',
						width: 66
					}, {
						field: 'is_home',
						title: '首页显示',
						toolbar: '#is_home',
						align: 'center',
						width: 90
					},{
						field: 'admin_name',
						title: '创建人',
						align: 'center',
						width: 90
					},{
						field: 'create_time',
						title: '创建时间',
						align: 'center',
						width: 150
					}, {
						field: 'right',
						title: '操作',
						toolbar: '#barDemo',
						width: 150,
						align: 'center'
					}
				]
			]
		});

		//监听行工具事件
		table.on('tool(gallery)', function(obj) {
			var data = obj.data;
			if (obj.event === 'view') {
				tool.side('/admin/gallery/read?id='+obj.data.id);
			}
			else if (obj.event === 'edit') {
				tool.tabAdd('/admin/gallery/edit?id='+obj.data.id,'编辑图集'+obj.data.id);
			}
			else if (obj.event === 'del') {
				layer.confirm('确定要删除吗?', {
					icon: 3,
					title: '提示'
				}, function(index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/gallery/del", { id: data.id }, callback);
					layer.close(index);
				});
			}
		});

		//监听搜索提交
		form.on('submit(webform)', function(data) {
			layui.pageTable.reload({
				where: {
					keywords: data.field.keywords,
					cate_id: data.field.cate_id
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
