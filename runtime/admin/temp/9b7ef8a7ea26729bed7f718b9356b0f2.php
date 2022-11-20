<?php /*a:2:{s:41:"G:\gougu\app\admin\view\article\edit.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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


<style type="text/css">
.editormd-code-toolbar select {display: inline-block}
.editormd li {list-style: inherit;}
</style>

</head>
<body class="main-body">
	<!-- 主体 -->
	
<form class="layui-form p-4">
	<h3 class="pb-3">编辑文章表</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">文章标题<font>*</font></td>
			<td colspan="7"> <input type="text" name="title" lay-verify="required" lay-reqText="请输入文章标题"
					autocomplete="off" placeholder="请输入文章标题" class="layui-input" value="<?php echo htmlentities($detail['title']); ?>"></td>
		</tr>
		<tr>
			<td class="layui-td-gray">文章分类<font>*</font></td>
			<td>
				<select name="cate_id" lay-verify="required" lay-reqText="请选择分类">
					<option value="">请选择分类</option>
					<?php $_result=set_recursion(get_article_cate());if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo htmlentities($v['id']); ?>" <?php if($detail['cate_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo htmlentities($v['title']); ?>
					</option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
			<td class="layui-td-gray">关键字<font>*</font></td>
			<td>
				<input type="text" id="keyword_name" name="keyword_names" autocomplete="off" lay-verify="required"
					lay-reqText="请选择关键字" placeholder="请选择关键字" class="layui-input" value="<?php echo htmlentities($detail['keyword_names']); ?>"
					readonly>
				<input type="hidden" id="keyword_id" name="keywords_id" autocomplete="off"
					value="<?php echo htmlentities($detail['keyword_ids']); ?>">
			</td>
			<td class="layui-td-gray">状态<font>*</font></td>
			<td>
				<input type="radio" name="status" value="1" title="正常" <?php if($detail['status'] == '1'): ?>checked<?php endif; ?>>
				<input type="radio" name="status" value="0" title="下架" <?php if($detail['status'] == '0'): ?>checked<?php endif; ?>>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">排序</td>
			<td>
				<input type="text" name="sort" placeholder="请输入排序，数字" autocomplete="off" class="layui-input"
					value="<?php echo htmlentities($detail['sort']); ?>">
			</td>
			<td class="layui-td-gray">首页显示</td>
			<td>
				<input type="radio" name="is_home" value="1" title="是" <?php if($detail['is_home'] == '1'): ?>checked<?php endif; ?>>
				<input type="radio" name="is_home" value="0" title="否" <?php if($detail['is_home'] == '0'): ?>checked<?php endif; ?>>
			</td>
			<td class="layui-td-gray">属性</td>
			<td>
				<select name="type">
					<option value="">请选择属性</option>
					<option value="1" <?php if($detail['type'] == '1'): ?>selected<?php endif; ?>>精华</option>
					<option value="2" <?php if($detail['type'] == '2'): ?>selected<?php endif; ?>>热门</option>
					<option value="3" <?php if($detail['type'] == '3'): ?>selected<?php endif; ?>>推荐</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">是否原创</td>
			<td>
				<input type="radio" name="original" value="1" title="是" <?php if($detail['original'] == '1'): ?>checked<?php endif; ?>>
				<input type="radio" name="original" value="0" title="否" <?php if($detail['original'] == '0'): ?>checked<?php endif; ?>>
			</td>
			<td class="layui-td-gray">作者/来源</td>
			<td>
				<input type="text" name="origin" class="layui-input" autocomplete="off" placeholder="请输入文章来源"
					value="<?php echo htmlentities($detail['origin']); ?>">
			</td>
			<td class="layui-td-gray">来源链接</td>
			<td>
				<input type="text" name="origin_url" class="layui-input" autocomplete="off" placeholder="请输入来源链接"
					value="<?php echo htmlentities($detail['origin_url']); ?>">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray" style="vertical-align:top;">摘要</td>
			<td colspan="3">
				<textarea name="desc" placeholder="请输入摘要，不能超过200个字" class="layui-textarea"><?php echo htmlentities($detail['desc']); ?></textarea>
			</td>
			<td class="layui-td-gray" style="vertical-align:top;">缩略图</td>
			<td>
				<div class="layui-upload">
					<button type="button" class="layui-btn layui-btn-sm" id="upload_btn_thumb">上传缩略图(尺寸:480x272)</button>
					<div class="layui-upload-list" id="upload_box_thumb" style="width: 120px; height:66px; overflow: hidden;">
						<img src="<?php echo get_file($detail['thumb']); ?>" onerror="javascript:this.src='/static/assets/gougu/images/nonepic600x360.jpg';this.onerror=null;" style="max-width: 100%; height:66px;" />
						<input type="hidden" name="thumb" value="<?php echo htmlentities($detail['thumb']); ?>">
					</div>
				</div>
			</td>
		</tr>
		<?php if($editor == '1'): ?>
		<tr>
			<td colspan="6" class="layui-td-gray" style="text-align:left">文章内容<font>*</font><span class="ml-4 red">当前为TinyMCE富文本编辑器，可在【系统管理->系统配置->其他配置】中切换为mardown编辑器</span></td>
		</tr>
		<tr>
			<td colspan="6">
				<textarea placeholder="请输入内容" class="layui-textarea" id="container_content"><?php echo htmlentities($detail['content']); ?></textarea>
			</td>
		</tr>
		<?php else: ?>
		<tr>
			<td colspan="6" class="layui-td-gray" style="text-align:left">文章内容<font>*</font><span class="ml-4 red">当前为mardown编辑器，可在【系统管理->系统配置->其他配置】中切换为TinyMCE富文本编辑器</span></td>
		</tr>
		<tr>
			<td colspan="6">
				<div style="margin-top:-2px; margin-right:2px">
					<textarea id="mdContent" style="display:none;"><?php echo $detail['md_content']; ?></textarea>
					<div id="docContent"></div>
				</div>
			</td>
		</tr>
		<?php endif; ?>
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
	const editorType = '<?php echo htmlentities($editor); ?>';
	var moduleInit;
	if (editorType == 1) {
		moduleInit = ['tool', 'tagpicker', 'tinymce'];
	}
	else {
		moduleInit = ['tool', 'tagpicker', 'editormd'];
	}

	function gouguInit() {
		var form = layui.form, tool = layui.tool,tagpicker = layui.tagpicker;

		var tags = new tagpicker({
			'url': '/admin/api/get_keyword_cate',
			'target': 'keyword_name',
			'tag_ids': 'keyword_id',
			'tag_tags': 'keyword_name',
			'height': 500,
			'isDiy': 1
		});
		
		//上传缩略图
		var upload_thumb = layui.upload.render({
			elem: '#upload_btn_thumb',
			url: '/admin/api/upload',
			done: function (res) {
				//如果上传失败
				if (res.code == 1) {
					layer.msg('上传失败');
					return false;
				}
				//上传成功
				$('#upload_box_thumb input').attr('value', res.data.id);
				$('#upload_box_thumb img').attr('src', res.data.filepath);
			}
		});

		if (editorType == 1) {
			var editor = layui.tinymce;
			var edit = editor.render({
				selector: "#container_content",
				height: 500
			});
			//监听提交
			form.on('submit(webform)', function (data) {
				data.field.content = tinyMCE.editors['container_content'].getContent();
				if (data.field.content == '') {
					layer.msg('请先完善文章内容');
					return false;
				}
				let callback = function (e) {
					layer.msg(e.msg);
					if (e.code == 0) {
						tool.sideClose(1000);
					}
				}
				tool.post("/admin/article/edit", data.field, callback);
				return false;
			});
		}
		else {
			var editor = layui.editormd;
			var edit = editor.render('docContent', {
				markdown: document.getElementById('mdContent').value
			});
			//监听提交
			form.on('submit(webform)', function (data) {
				if (data.field.mdContent == '') {
					layer.msg('请先完善文章内容');
					return false;
				}
				let callback = function (e) {
					layer.msg(e.msg);
					if (e.code == 0) {
						tool.sideClose(1000);
					}
				}
				tool.post("/admin/article/edit", data.field, callback);
				return false;
			});
		}
	}
</script>

	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
