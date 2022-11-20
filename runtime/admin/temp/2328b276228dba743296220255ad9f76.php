<?php /*a:2:{s:39:"G:\gougu\app\admin\view\pages\edit.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	.upload-img {
		width: 120px;
		height: 90px;
		overflow: hidden;
		position: relative;
		border: 1px solid #eee;
		padding: 1px;
		margin: 5px;
		float: left;
	}

	.upload-close {
		position: absolute;
		top: 1px;
		right: 1px;
	}
</style>

</head>
<body class="main-body">
	<!-- 主体 -->
	
<form class="layui-form p-4">
	<h3 class="pb-3">编辑单页面</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">页面标题<font>*</font></td>
			<td colspan="3"><input type="text" name="title" lay-verify="required" lay-reqText="请输入页面标题" placeholder="请输入页面标题" class="layui-input" value="<?php echo htmlentities($detail['title']); ?>"></td>
			<td class="layui-td-gray" rowspan="3">缩略图</td>
			<td rowspan="3" style="vertical-align:top">
				<div class="layui-upload" style="text-align:center;">
					<button type="button" class="layui-btn layui-btn-sm" id="upload_btn_thumb">上传封面图(尺寸：750x560)</button>
					<div class="layui-upload-list" id="upload_box_thumb">
						<img src="<?php echo htmlentities(get_file($detail['thumb'])); ?>" style="width:200px;max-width:200px" />
						<input type="hidden" name="thumb" value="<?php echo htmlentities($detail['thumb']); ?>">
					</div>
				</div>
			</td>		
		</tr>
		<tr>
			<td class="layui-td-gray">关键字<font>*</font></td>
			<td colspan="3">
				<input type="text" id="keyword_name" name="keyword_names" lay-verify="required" lay-reqText="请选择关键字"
					placeholder="请选择关键字" class="layui-input" value="<?php echo htmlentities($detail['keyword_names']); ?>" readonly>
				<input type="hidden" id="keyword_id" name="keyword_ids" value="<?php echo htmlentities($detail['keyword_ids']); ?>">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray" style="vertical-align:top;">页面摘要</td>
			<td colspan="3">
				<textarea name="desc" placeholder="请输入页面摘要，200字以内" class="layui-textarea"><?php echo htmlentities($detail['desc']); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">图集相册</td>
			<td colspan="5">
				<div class="layui-upload">
					<button type="button" class="layui-btn layui-btn-sm" id="uploadBtn2">上传图片</button>
					<div class="layui-upload-list" id="demo2">
						<input type="hidden" name="banner" value="<?php echo htmlentities($detail['banner']); ?>">
						<?php if(!(empty($detail['banner']) || (($detail['banner'] instanceof \think\Collection || $detail['banner'] instanceof \think\Paginator ) && $detail['banner']->isEmpty()))): if(is_array($detail['banner_array']) || $detail['banner_array'] instanceof \think\Collection || $detail['banner_array'] instanceof \think\Paginator): $i = 0; $__LIST__ = $detail['banner_array'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class="upload-img img-cover" id="uploadImg<?php echo htmlentities($vo); ?>"><div class="gg-img-cover cover-4-3"><img src="<?php echo htmlentities(get_file($vo)); ?>"><div class="upload-close"><a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="delimg" data-id="<?php echo htmlentities($vo); ?>">删除</a></div></div></div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">展示模板<font>*</font></td>
			<td>
				<select name="template" lay-verify="required" lay-reqText="请选择前台展示模板">
					<option value="">请选择前台展示模板</option>
					<?php if(is_array($templates) || $templates instanceof \think\Collection || $templates instanceof \think\Paginator): $i = 0; $__LIST__ = $templates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo htmlentities($vo['filename']); ?>" <?php if($vo['filename'] == $detail['template']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['basename']); ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
			<td class="layui-td-gray-2">URL文件名称</td>
			<td>
				<input type="text" name="name" value="<?php echo htmlentities($detail['name']); ?>" placeholder="请输入URL文件名称" class="layui-input">
			</td>
			<td class="layui-td-gray">状态<font>*</font></td>
			<td>
				<input type="radio" name="status" value="1" title="正常" <?php if($detail['status'] == '1'): ?>checked<?php endif; ?>>
				<input type="radio" name="status" value="0" title="下架" <?php if($detail['status'] == '0'): ?>checked<?php endif; ?>>
			</td>
		</tr>
		<tr>
			<td colspan="6" class="layui-td-gray" style="text-align:left">页面内容<font>*</font></td>
		</tr>
		<tr>
			<td colspan="6">
				<textarea placeholder="请输入内容" class="layui-textarea" id="container_content"><?php echo htmlentities($detail['content']); ?></textarea>
			</td>
		</tr>
	</table>
	<div class="pt-3">
		<input type="hidden" name="id" value="<?php echo htmlentities($detail['id']); ?>"/>
		<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="webform">立即提交</button>
		<button type="reset" class="layui-btn layui-btn-primary">重置</button>
	</div>
</form>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script>
	// 查找指定的元素在数组中的位置
	Array.prototype.indexOf = function (val) {
		for (var i = 0; i < this.length; i++) {
			if (this[i] == val) {
				return i;
			}
		}
		return -1;
	};
	// 通过索引删除数组元素
	Array.prototype.remove = function (val) {
		var index = this.indexOf(val);
		if (index > -1) {
			this.splice(index, 1);
		}
	};
	var moduleInit = ['tool','tagpicker','tinymce'];

	function gouguInit() {
		var form = layui.form, tool = layui.tool,tagpicker = layui.tagpicker;

		//上传缩略图
		var upload_thumb = layui.upload.render({
			elem: '#upload_btn_thumb',
			url: '/admin/api/upload',
			done: function (res) {
				//如果上传失败
				if (res.code == 1) {
					return layer.msg('上传失败');
				}
				//上传成功
				$('#upload_box_thumb input').attr('value', res.data.filepath);
				$('#upload_box_thumb img').attr('src', res.data.filepath);
			}
		});
		
		var tags = new tagpicker({
			'url': '/admin/api/get_keyword_cate',
			'target': 'keyword_name',
			'tag_ids': 'keyword_id',
			'tag_tags': 'keyword_name',
			'height': 500,
			'isDiy': 1
		});
		
		//banner图上传
		var uploadInst2 = layui.upload.render({
			elem: '#uploadBtn2'
			, url: '/admin/api/upload'
			, done: function (res) {
				//如果上传失败
				if (res.code == 1) {
					return layer.msg('上传失败');
				}
				//上传成功
				var idsStr = $('#demo2 input').val();
				var idsArray = [];
				if (idsStr != '') {
					idsArray = idsStr.split(",");
				}
				idsArray.push(res.data.id);
				$('#demo2 input').attr('value', idsArray.join(','));		
				$('#demo2').append('<div class="upload-img img-cover" id="uploadImg' + res.data.id + '"><div class="gg-img-cover cover-4-3"><img src="' + res.data.filepath + '"><div class="upload-close"><a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="delimg" data-id="' + res.data.id + '">删除</a></div></div></div>');
			}
		});

		$('#demo2').on('click', '[lay-event="delimg"]', function () {
			var _id = $(this).data('id');
			var idsStr = $('#demo2 input').val();
			var idsArray = [];
			if (idsStr != '') {
				idsArray = idsStr.split(",");
			}
			idsArray.remove(_id);
			$('#demo2 input').attr('value', idsArray.join(','));
			$('#uploadImg' + _id).remove();
		})

		//内容描述富文本编辑器
		var edit = layui.tinymce.render({
			selector: '#container_content',
			height: 500
		});
		
		//监听提交
		form.on('submit(webform)', function (data) {
			data.field.content = tinyMCE.editors['container_content'].getContent();
			if (data.field.content == '') {
				layer.msg('请先完善内容描述内容');
				return false;
			}
			let callback = function (e) {
				layer.msg(e.msg);
				if (e.code == 0) {
					tool.sideClose(1000);
				}
			}
			tool.post("/admin/pages/edit", data.field, callback);
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
