<?php /*a:2:{s:43:"G:\gougu\app\admin\view\goods\datalist.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
				<option value="">请选择商品分类</option>
				<?php $_result=set_recursion(get_goods_cate());if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
				<option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['title']); ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<div class="layui-input-inline" style="width:300px;">
			<input type="text" name="keywords" placeholder="请输入关键字" class="layui-input" autocomplete="off" />
		</div>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="searchform">提交搜索</button>
	</form>
	<table class="layui-hide" id="goods" lay-filter="goods"></table>
</div>

<script type="text/html" id="toolbarDemo">
	<div class="layui-btn-container">
		<span class="layui-btn layui-btn-sm" lay-event="add" data-title="添加商品">+ 添加商品</span>
	</div>
</script>

<script type="text/html" id="status">
	<i class="layui-icon {{#  if(d.status == 1){ }}layui-icon-ok green{{#  } else { }}layui-icon-close red{{#  } }}"></i>
</script>
<script type="text/html" id="is_home">
	<i class="layui-icon {{#  if(d.is_home == 1){ }}layui-icon-ok green{{#  } else { }}layui-icon-close red{{#  } }}"></i>
</script>

<script type="text/html" id="barDemo">
<div class="layui-btn-group"><a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="read">查看</a><a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a></div>
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
			elem: '#goods',
			title: '商品列表',
			toolbar: '#toolbarDemo',
			url: '/admin/goods/datalist',
			page: true,
			limit: 20,
			cellMinWidth: 300,
			cols: [
				[
				{
					fixed: 'left',
					field: 'id',
					title: '编号',
					align: 'center',
					width: 80
				},{
					field: 'cate_title',
					title: '所属分类',
					align: 'center',
					width: 100
				},{
					field: 'type_str',
					title: '属性',
					align: 'center',
					width: 80
				},{
					field: 'title',
					title: '商品名称',
				},{
					field: 'base_price',
					title: '市场价格',
					align: 'center',
					width: 90
				},{
					field: 'price',
					title: '实际价格',
					align: 'center',
					width: 90
				},{
					field: 'stocks',
					title: '商品库存',
					align: 'center',
					width: 80
				},{
					field: 'sales',
					title: '商品销量',
					align: 'center',
					width: 80
				},{
					field: 'read',
					title: '阅读量',
					align: 'center',
					width: 80
				},{
					field: 'is_home',
					title: '首页显示',
					toolbar: '#is_home',
					align: 'center',
					width: 90
				},{
					field: 'sort',
					title: '排序',
					align: 'center',
					width: 80
				},{
					field: 'status',
					title: '上下架',
					toolbar: '#status',
					align: 'center',
					width: 80
				},{
					field: 'admin_name',
					title: '创建人',
					align: 'center',
					width: 100
				},{
					field: 'create_time',
					title: '创建时间',
					align: 'center',
					width: 160
				},{
					fixed: 'right',
					field: 'right',
					title: '操作',
					toolbar: '#barDemo',
					width: 136,
					align: 'center'
				}				
				]
			]
		});
		
		//监听表头工具栏事件
		table.on('toolbar(goods)', function(obj){
			if (obj.event === 'add') {
				tool.side("/admin/goods/add");
				return false;
			}
		});

		//监听表格行工具事件
		table.on('tool(goods)', function(obj) {
			var data = obj.data;
			if (obj.event === 'read') {
				tool.side('/admin/goods/read?id='+obj.data.id);
			}
			else if (obj.event === 'edit') {
				tool.side('/admin/goods/edit?id='+obj.data.id);
			}
			else if (obj.event === 'del') {
				layer.confirm('确定要删除该记录吗?', {
					icon: 3,
					title: '提示'
				}, function(index) {
					let callback = function (e) {
						layer.msg(e.msg);
						if (e.code == 0) {
							obj.del();
						}
					}
					tool.delete("/admin/goods/del", { id: data.id }, callback);
					layer.close(index);
				});
			}
			return false;
		});

		//监听搜索提交
		form.on('submit(searchform)', function(data) {
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
