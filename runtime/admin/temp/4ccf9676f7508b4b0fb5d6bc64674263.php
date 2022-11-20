<?php /*a:2:{s:50:"G:\gougu\app\admin\view\article_cate\datalist.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<div class="gg-form-bar border-t border-x">
		<button class="layui-btn layui-btn-sm add-menu">+ 添加分类</button>
    </div>
    <div>
      <table class="layui-hide" id="treeTable" lay-filter="treeTable"></table>
    </div> 
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
	<script>
	const moduleInit = ['tool', 'treeGrid'];
	function gouguInit() {
		var treeGrid = layui.treeGrid,table = layui.table, tool = layui.tool;
		var pageTable = treeGrid.render({
				id:'treeTable'
				,elem: '#treeTable'
				,idField:'id'
				,url:'/admin/article_cate/datalist'
				,cellMinWidth: 300
				,treeId:'id'//树形id字段名称
				,treeUpId:'pid'//树形父id字段名称
				,treeShowName:'title'//以树形式显示的字段
				,page:false
				,cols: [[
					{field:'id',width:80, title: 'ID号', align:'center'}
					,{field: 'sort', title: '排序', align:'center', width:80}
					,{field:'title',width:240, title: '分类名称'}
					,{field:'pid', title: '父级ID',width:80, align:'center'}
					,{field:'keywords', title: '关键词', width:200,}
					,{field:'desc', title: '描述'}
					,{width:160,title: '操作', align:'center',templet: function(d){
						var html = '<span class="layui-btn-group"><span class="layui-btn layui-btn-normal layui-btn-xs" lay-event="add">添加子分类</span><span class="layui-btn layui-btn-xs" lay-event="edit">编辑</span><span class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</span></span>';
					return html;
					  }
					}
				]]
			});
			//表头工具栏事件
			$('.add-menu').on('click', function(){
				tool.side("/admin/article_cate/add");
				return;
			});
			
			//操作按钮
			treeGrid.on('tool(treeTable)',function (obj) {
				if (obj.event === 'add') {
					tool.side("/admin/article_cate/add?pid="+obj.data.id);
					return;
				}
				if (obj.event === 'edit') {
					tool.side("/admin/article_cate/edit?id="+obj.data.id);
					return;
				}
				if(obj.event === 'del'){
					layer.confirm('确定要删除吗?', {icon: 3, title:'提示'}, function(index){
						let callback = function (e) {
							layer.msg(e.msg);
							if (e.code == 0) {
								obj.del();
							}
						}
						tool.delete("/admin/article_cate/del", { id: obj.data.id}, callback);
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
