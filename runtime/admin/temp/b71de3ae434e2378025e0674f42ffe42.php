<?php /*a:2:{s:39:"G:\gougu\app\admin\view\index\main.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
    .dashboard-num table {width: 100%;}
    .dashboard-num td {text-align: center; padding: 16px 0; width: 20%;border-left: 1px solid #f1f1f1; position: relative;}
    .dashboard-num td:nth-child(1) { border-left: none}
    .dashboard-num .num-title { padding-bottom: 10px; color: #999;}
    .dashboard-num .blue {font-size: 20px; font-weight: 300;}
    .dashboard-num td .badge {position: absolute;top: 0; right: 0;}
    .dashboard-num td .badge span { padding: 2px 4px; font-size: 12px; border-radius: 0 0 0 4px;}
    .dashboard-total td {border-top: 1px solid #f1f1f1}
    .dashboard-logs .layui-timeline-item {padding-bottom: 1px;}
    .info-td { width: 90px; text-align: right;background-color: #fafafa; color: #999; padding: 5px 3px;}
    .info-td {width: 90px; text-align: right;background-color: #fafafa; color: #999; padding: 5px 3px;}
	.layui-card-body .layui-timeline-title {
		padding-bottom: 0;
		font-size: 14px;
	}
	.layui-card-body .layui-timeline-item {
		padding-bottom: 5px;
	}
</style>

</head>
<body class="main-body">
	<!-- 主体 -->
	
<div class="p-3">
<div class="layui-row layui-col-space12">
	<div class="layui-col-md8">
		<div class="layui-row layui-col-space12">
			<div class="layui-col-md12">
				<div class="layui-card dashboard-num">
					<table>
						<tr>
						  <td>
							<div class="num-title">系统用户</div>
							<div class="blue"><?php echo htmlentities($adminCount); ?></div>
						  </td>
						  <td>
							<div class="num-title">注册用户</div>
							<div class="blue"><?php echo htmlentities($userCount); ?></div>
						  </td>
						  <td>
							<div class="num-title">文章</div>
							<div class="blue"><?php echo htmlentities($articleCount); ?></div>
						  </td>
						  <td>
							<div class="num-title">商品</div>
							<div class="blue"><?php echo htmlentities($goodsCount); ?></div>
						  </td>
						  <td>
							<div class="num-title">附件</div>
							<div class="blue"><?php echo htmlentities($fileCount); ?></div>
						  </td>
						</tr>
					</table>
				</div>
				<div class="layui-card">
					<div class="layui-card-title">注册用户</div>
					<div class="p-3">
						<table id="UserList" lay-filter="UserList" class="layui-hide"></table>
					</div>
				</div>
				<div class="layui-card">
					<div class="layui-card-title">文章列表</div>
					<div class="p-3">
						<table id="Article" lay-filter="Article" class="layui-hide" style="margin-top:0"></table>
					</div>
				</div>
				<div class="layui-card">
					<div id="chartView" style="width: 100%;height:300px;"></div>
				</div>
				<div class="layui-card">
					<div id="chartYear" style="width: 100%;height:240px;"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="layui-col-md4">
		<div class="layui-card">
			<div class="layui-card-title">系统信息</div>
			<div class="layui-card-body">
				<table class="layui-table" lay-skin="" lay-size="sm">
					<?php if(($install == true)): ?>
					<tr>
						<td colspan="4" style="color: #E94335; background-color:#f8f8f8">提醒：发现app目录下的install文件夹没删除，为了系统的安全,请手动去删除。</td>
					</tr>
					<?php endif; ?>
					<tr>
						<td class="info-td">服务器系统</td>
						<td><?php echo get_system_info('os'); ?></td>
						<td class="info-td">PHP版本</td>
						<td><?php echo get_system_info('php'); ?></td>
					</tr>
					<tr>
						<td class="info-td">上传附件限制</td>
						<td><?php echo get_system_info('upload_max_filesize'); ?></td>
						<td class="info-td">执行时间限制</td>
						<td><?php echo get_system_info('max_execution_time'); ?></td>
					</tr>
					<tr>
						<td class="info-td">勾股CMS版本</td>
						<td colspan="3"><?php echo CMS_VERSION; ?><a class="layui-badge layui-bg-blue" style="margin-left:8px"
							href="https://blog.gougucms.com/home/book/detail/bid/1.html" target="_blank">勾股CMS文档</a></td>
					</tr>
					<tr>
						<td class="info-td">ThinkPHP版本</td>
						<td colspan="3"><?php echo htmlentities($TP_VERSION); ?><a class="layui-badge layui-bg-blue" style="margin-left:8px" href="https://www.kancloud.cn/manual/thinkphp6_0" target="_blank">TP6文档</a></td>
					</tr>
					<tr>
						<td class="info-td">Layui版本</td>
						<td colspan="3"><?php echo LAYUI_VERSION; ?><a class="layui-badge layui-bg-blue" style="margin-left:8px" href="https://layui.gitee.io/v2/docs/" target="_blank">Layui文档</a></td>
					</tr>
					<tr>
						<td class="info-td">BUG反馈</td>
						<td colspan="3"><a href="mailto:hdm58@qq.com" target="_blank">hdm58@qq.com</a></td>
					</tr>
					<tr>
						<td class="info-td">QQ交流群</td>
						<td colspan="3">搜Q群：24641076（满），46924914<br>或点击 <a href="https://jq.qq.com/?_wv=1027&k=aCESqWHQ" target="_blank" rel="nofollow"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="gougucms交流群" title="点击链接加入群聊【勾股开源交流群】" style="vertical-align:middle"></a></td>
					</tr>
					<tr>
						<td class="info-td">同系列开源软件</td>
						<td colspan="3"><a class="layui-badge layui-bg-blue" style="margin-right:8px" href="https://gitee.com/gougucms/blog" target="_blank">勾股BLOG</a><a class="layui-badge layui-bg-blue" style="margin-right:8px" href="https://gitee.com/gougucms/office" target="_blank">勾股OA</a><a class="layui-badge layui-bg-blue" href="https://gitee.com/gougucms/dev" target="_blank">勾股DEV</a></td>
					</tr>
					<tr>
						<td class="info-td">🍗🍗<br/>给作者加鸡腿<br/>🍗🍗</td>
						<td colspan="3">
							<img src="https://www.gougucms.com/static/home/images/zfb.png" data-event="pay" style="width:50%; max-width:100%; cursor:pointer;" align=center /><img src="https://www.gougucms.com/static/home/images/wx.png" data-event="pay" style="width:50%; max-width:100%; cursor:pointer;"  align=center />
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="layui-card">
			<div class="layui-card-header"><h3>操作日志</h3><a data-title="操作日志" data-href="/admin/api/log_list/" class="pull-right tab-a">更多</a></div>
			<div class="layui-card-body">
				<ul class="layui-timeline" id="logs"></ul>
			</div>
		</div>
	</div>
</div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script src="https://cdn.staticfile.org/echarts/5.3.0/echarts.min.js"></script>
<script>
	function getLogs() {
		$.ajax({
			url: "/admin/api/get_log_list",
			type: 'post',
			data: {
				page: 1,
				limit: 20
			},
			success: function (e) {
				if (e.code == 0) {
					var html = '';
					$.each(e.data, function (key, value) {
						html += '<li class="layui-timeline-item">\
										<i class="layui-icon layui-timeline-axis"></i>\
										<div class="layui-timeline-content layui-text">\
										  <div class="layui-timeline-title"><span title="'+ value.id + '">' + value.times + '</span>，' + value.content + '</div>\
										</div>\
									  </li>';
					});
					$('#logs').html(html);
				}
			}
		})
	}

	const moduleInit = ['tool'];
	function gouguInit() {
		var table = layui.table;
		$('body').on('click','[data-event="pay"]',function(){
			var src=$(this).attr('src');
			layer.open({
				type:1,
				title:'感谢您给作者加鸡腿🍗🍗',
				content:'<img src="'+src+'" style="width:100%" align=center />',
			});
		})
		getLogs();
		//注册用户
		table.render({
			elem: '#UserList'
			, url: '/admin/api/get_user_list' //数据接口
			, page: false //开启分页
			, cols: [[ //表头
				{ field: 'username', title: '用户名'}
				,{ field: 'username', title: '昵称', align: 'center', 'width': 120}
				,{ field: 'sex', title: '性别','width': 60, align: 'center', templet: function (d) {
						let str='-';
						if(d.sex==1){
							str='男';
						}
						else if(d.sex==2){
							str='女';
						}
						return str;
					}}
				, {
					field: 'headimgurl', title: '头像', align: 'center','width': 60, templet: function (d) {
						return '<img src="' + d.headimgurl + '" width="20" height="20" />';
					}
				}
				, { field: 'login_num', title: '登录次数', align: 'center','width': 100}
				, { field: 'last_login_time', title: '最后登录时间', align: 'center','width': 168}
			]]
		});

		//文章
		table.render({
			elem: '#Article'
			, url: '/admin/api/get_article_list' //数据接口
			, page: false //开启分页
			, cols: [[ //表头
				{ field: 'title', title: '文章标题'}
				, { field: 'cate_title', title: '文章分类', align: 'center','width': 150 }
				, { field: 'read', title: '访问量', align: 'center','width': 100 }
				, { field: 'create_time', title: '发布时间', align: 'center','width': 168}
			]]
		});
		get_view_data();
	}


	function setHour(num) {
		var str = num + ':00';
		if (num < 10) {
			str = '0' + num + ':00';
		}
		return str;
	}
	var chartView = echarts.init(document.getElementById('chartView'));
	function get_view_data() {
		$.ajax({
			url: "/admin/api/get_view_data",
			type: 'post',
			data: {},
			success: function (e) {
				if (e.code == 0) {
					var data_first = e.data.data_first;
					var data_second = e.data.data_second;
					archiveCalendar = e.data.data_three;
					var myDate = new Date();
					var nowHour = myDate.getHours(); //获取当前小时数(0-23)
					var xData = [];
					var yData1 = [];
					var yData2 = [];
					$.each(data_first, function (key, value) {
						if (key <= nowHour) {
							yData1.push(value);
						}
					});
					$.each(data_second, function (key, value) {
						xData.push(setHour(key));
						yData2.push(value);
					});
					var ops = {
						title: {
							top: '12px',
							text: '今日与昨日访问统计',
							left: '10px',
							textStyle: {
								fontSize: '18',
								color: '#333',
							}
						},
						color: ["#1AAD19", "#1890FF"],
						grid: {
							left: '16px',
							right: '30px',
							bottom: '12px',
							top: '60px',
							containLabel: true
						},
						tooltip: {
							trigger: 'axis',
							axisPointer: {
								type: 'cross',
								crossStyle: {
									color: '#999'
								}
							}
						},
						toolbox: {
							show: true,
						},
						legend: {
							data: ["今日", "昨日"],
							top: '16px',
						},
						xAxis: [{
							type: "category",
							boundaryGap: !1,
							data: xData,
							axisLine: {
								lineStyle: {
									color: '#999999',
									width: 1,
								}
							},
						}],
						yAxis: [{
							type: "value",
							axisLine: {
								show: true,
								lineStyle: {
									color: '#999999',
									width: 1,
								}
							},
						}],
						series: [{
							name: "今日",
							type: "line",
							smooth: !0,
							itemStyle: {
								normal: {
									areaStyle: {
										type: "default",
										opacity: 0.2
									}
								}
							},
							data: yData1
						}, {
							name: "昨日",
							type: "line",
							smooth: !0,
							itemStyle: {
								normal: {
									areaStyle: {
										type: "default",
										opacity: 0.2
									}
								}
							},
							data: yData2
						}]
					}
					chartView.setOption(ops);


					let myChart = echarts.init(document.getElementById('chartYear'));
					let option = {
						title: {
							top: '12px',
							text: '近一年访问统计',
							left: '10px',
							textStyle: {
								fontSize: '18',
								color: '#333',
							}
						},
						tooltip: {
							padding: 6,
							formatter: function (obj) {
								var value = obj.value;
								return '<div style="font-size: 12px;">' + value[0] + '：' + value[1] + ' 个访客</div>';
							}
						},
						visualMap: {
							min: 0,
							max: 300,
							show: false,
							inRange: {
								color: ['#fafafa', '#1AAD19']
							}
						},
						calendar: {
							top: 75,
							left: 50,
							right: 20,
							range: getRange(),
							cellSize: ['auto', 21],
							splitLine: {
								lineStyle: {
									color: '#aaa',
									type: 'dashed'
								}
							},
							itemStyle: {
								borderWidth: 0.5
							},
							yearLabel: { show: false },
							monthLabel: {
								nameMap: 'cn',
								fontSize: 12
							},
							dayLabel: {
								show: true,
								formatter: '{start}  1st',
								fontWeight: 'lighter',
								nameMap: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
								fontSize: 12
							}
						},
						series: [{
							type: 'heatmap',
							coordinateSystem: 'calendar',
							calendarIndex: 0,
							data: getDay()
						}]
					};
					myChart.setOption(option);

					setTimeout(function () {
						window.onresize = function () {
							chartView.resize();
							myChart.resize();
						}
					})
					console.log(e.data);
				}
			}
		})

		var archiveCalendar = {};
		function getRange() {
			let today = new Date();
			let tYear = today.getFullYear();
			let tMonth = today.getMonth() + 1;
			let tDate = today.getDate();
			let dateFirst = tYear + "-" + tMonth + "-" + tDate;
			let datelast = (tYear - 1) + "-" + tMonth + "-" + tDate;
			let dataRange = [];
			dataRange.push(dateFirst);
			dataRange.push(datelast);
			return dataRange;
		}

		function getDay() {
			var today = new Date();
			var dayArray = [];
			for (var i = 0; i < 366; i++) {
				var targetday_milliseconds = today.getTime() - 1000 * 60 * 60 * 24 * i;
				var date = new Date(targetday_milliseconds);
				dayArray.push(retunDay(date));
			}
			return dayArray;
		}

		function retunDay(day) {
			var tYear = day.getFullYear();
			var tMonth = day.getMonth();
			var tDate = day.getDate();
			tMonth = tMonth + 1;
			if (tMonth.toString().length == 1) {
				tMonth = "0" + tMonth;
			}
			if (tDate.toString().length == 1) {
				tDate = "0" + tDate;
			}
			var dateStr = tYear + "-" + tMonth + "-" + tDate;
			var dateArray = [];
			dateArray.push(dateStr);
			if (archiveCalendar[dateStr]) {
				dateArray.push(archiveCalendar[dateStr]);
			}
			else {
				dateArray.push(0);
			}
			return dateArray;
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
