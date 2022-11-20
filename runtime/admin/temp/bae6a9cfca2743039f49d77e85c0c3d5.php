<?php /*a:2:{s:38:"G:\gougu\app\admin\view\goods\add.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
	<h3 class="pb-3">新建商品</h3>
	<table class="layui-table layui-table-form">
		<tr>
			<td class="layui-td-gray">商品标题<font>*</font></td>
			<td colspan="5"><input type="text" name="title" lay-verify="required" lay-reqText="请输入商品标题" placeholder="请输入商品标题" class="layui-input"></td>
			<td class="layui-td-gray">商品分类<font>*</font></td>
			<td>
				<select name="cate_id" lay-verify="required" lay-reqText="请选择商品分类">
					<option value="">请选择商品分类</option>
					<?php $_result=set_recursion(get_goods_cate());if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['title']); ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">关键字<font>*</font></td>
			<td colspan="5">
				<input type="text" id="keyword_name" name="keyword_names" lay-verify="required" lay-reqText="请选择关键字" placeholder="请选择关键字" class="layui-input" readonly>
				<input type="hidden" id="keyword_id" name="keyword_ids">
			</td>
			<td class="layui-td-gray" rowspan="3">缩略图<font>*</font></td>
			<td rowspan="3" style="vertical-align:top">
				<div class="layui-upload" style="text-align:center;">
					<button type="button" class="layui-btn layui-btn-sm" id="upload_btn_thumb">上传商品封面图(尺寸：750x560)</button>
					<div class="layui-upload-list" id="upload_box_thumb">
						<img src="" width="100" style="width:200px;max-width:200px" />
						<input type="hidden" name="thumb" value="" lay-verify="required" lay-reqText="请上传缩略图">
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">商品卖点<font>*</font></td>
			<td colspan="5">
				<input type="text" name="tips" lay-verify="required" lay-reqText="请输入商品卖点" placeholder="一句话描述商品卖点，30字以内" class="layui-input">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray" style="vertical-align:top;">商品简介</td>
			<td colspan="5">
				<textarea name="desc" placeholder="请输入商品简介，200字以内" class="layui-textarea"></textarea>
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">商品标签<font>*</font></td>
			<td colspan="7">
				<input type="checkbox" name="tag_values[]" title="正品保证" lay-skin="primary" value="1" checked />
				<input type="checkbox" name="tag_values[]" title="一年保修" lay-skin="primary" value="2" checked />
				<input type="checkbox" name="tag_values[]" title="七天退换(拆封后不支持)" lay-skin="primary" value="3" />
				<input type="checkbox" name="tag_values[]" title="赠运费险" lay-skin="primary" value="4" />
				<input type="checkbox" name="tag_values[]" title="闪电发货" lay-skin="primary" value="5" />
				<input type="checkbox" name="tag_values[]" title="售后无忧" lay-skin="primary" value="6" />
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">市场价格<font>*</font></td>
			<td>
				<input type="text" name="base_price" lay-verify="required|number" lay-reqText="请输入市场价格" placeholder="请输入市场价格" class="layui-input">
			</td>
			<td class="layui-td-gray">实际价格<font>*</font></td>
			<td>
				<input type="text" name="price" lay-verify="required|number" lay-reqText="请输入实际价格" placeholder="请输入实际价格" class="layui-input">
			</td>
			<td class="layui-td-gray">商品库存<font>*</font></td>
			<td>
				<input type="text" name="stocks" lay-verify="required|number" lay-reqText="请输入商品库存" placeholder="请输入商品库存" class="layui-input">
			</td>
			<td class="layui-td-gray">是否包邮<font>*</font></td>
			<td>
				<input type="radio" name="is_mail" value="1" title="是" checked lay-verify="otherReq" lay-reqText="请选择是否包邮">
				<input type="radio" name="is_mail" value="0" title="否" lay-verify="otherReq" lay-reqText="请选择是否包邮">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">商品属性</td>
			<td>
				<select name="type">
					<option value="">请选择属性</option>
					<option value="1">精华</option>
					<option value="2">热门</option>
					<option value="3">推荐</option>
				</select>
			</td>
			<td class="layui-td-gray">排序</td>
			<td>
				<input type="text" name="sort" value="0" lay-verify="number" placeholder="请输入排序，数字" class="layui-input">
			</td>
			<td class="layui-td-gray">首页显示</td>
			<td>
				<input type="radio" name="is_home" value="1" title="是" checked>
				<input type="radio" name="is_home" value="0" title="否">
			</td>
			<td class="layui-td-gray">状态<font>*</font></td>
			<td>
				<input type="radio" name="status" value="1" title="正常" checked>
				<input type="radio" name="status" value="0" title="下架">
			</td>
		</tr>
		<tr>
			<td class="layui-td-gray">商品图集</td>
			<td colspan="7">
				<div class="layui-upload">
					<button type="button" class="layui-btn layui-btn-sm" id="uploadBtn2">上传商品图</button>
					<div class="layui-upload-list clearfix" id="demo2">
						<input type="hidden" name="banner" value="">
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="8" class="layui-td-gray" style="text-align:left">商品介绍<font>*</font></td>
		</tr>
		<tr>
			<td colspan="8">
				<textarea class="layui-textarea" id="container_content"></textarea>
			</td>
		</tr>
	</table>
	<div class="pt-3">
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
				$('#upload_box_thumb input').attr('value', res.data.id);
				$('#upload_box_thumb img').attr('src', res.data.filepath);
			}
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
				$('#demo2').append('<div class="upload-img img-cover" id="uploadImg' + res.data.id + '"><div class="gg-img-cover cover-4-3"><img src="' + res.data.filepath + '"><div class="upload-close"><a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="delimg" data-id="' + res.data.id + '">删除</a></div></div>');
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
		
		var tags = new tagpicker({
			'url': '/admin/api/get_keyword_cate',
			'target': 'keyword_name',
			'tag_ids': 'keyword_id',
			'tag_tags': 'keyword_name',
			'height': 500,
			'isDiy': 1
		});

		//商品描述富文本编辑器
		var edit = layui.tinymce.render({
			selector: '#container_content',
			height: 500
		});
		
		//自定义验证规则
		form.verify({
			otherReq: function (value, item) {
				var verifyName = $(item).attr('name')
					, verifyType = $(item).attr('type')
					, formElem = $(item).parents('.layui-form')//获取当前所在的form元素，如果存在的话
					, verifyElem = formElem.find('input[name=' + verifyName + ']')//获取需要校验的元素
					, isTrue = verifyElem.is(':checked')//是否命中校验
					, focusElem = verifyElem.next().find('i.layui-icon');//焦点元素
				if (!isTrue || !value) {
					//定位焦点
					focusElem.css(verifyType == 'radio' ? { "color": "#FF5722" } : { "border-color": "#FF5722" });
					//对非输入框设置焦点
					focusElem.first().attr("tabIndex", "1").css("outline", "0").blur(function () {
						focusElem.css(verifyType == 'radio' ? { "color": "" } : { "border-color": "" });
					}).focus();
					var reqText = verifyElem.attr('lay-reqText');
					if (reqText && reqText != '') {
						return reqText;
					}
					else {
						return '必填项不能为空';
					}
				}
			}
		});
		
		//监听提交
		form.on('submit(webform)', function (data) {
			data.field.content = tinyMCE.editors['container_content'].getContent();
			if (data.field.content == '') {
				layer.msg('请先完善商品描述内容');
				return false;
			}
			let callback = function (e) {
				layer.msg(e.msg);
				if (e.code == 0) {
					tool.sideClose(1000);
				}
			}
			tool.post("/admin/goods/add", data.field, callback);
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
