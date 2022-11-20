<?php /*a:2:{s:43:"G:\gougu\app\admin\view\analysis\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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
/* 这段样式只是用于演示 */
.layui-card-header span {
    position: absolute;
    right: 10px;
    top: 10px;
}
.layui-sales {
    margin-bottom: 0;
    overflow: hidden;
    color: rgba(0,0,0,.85);
    font-size: 30px;
}

.layui-sales-info {
    padding-top: 16px;
    color: rgba(0,0,0,.65);
    white-space: nowrap;
    text-overflow: ellipsis;
}

fieldset.layui-field-title {
    margin-bottom: 10px;
}
</style>

</head>
<body class="main-body">
	<!-- 主体 -->
	
<div class="p-3">
<div class="layui-row layui-col-space15">
	<div class="layui-col-xs6 layui-col-md3">
	  <div class="layui-card">
		<div class="layui-card-header">今日访问</div>
		<div class="layui-card-body">
			<div class="layui-sales">126,560</div>
			<div class="layui-sales-info" style="height: 125px;">
				周同比 <span>12%</span>
				<i class="layui-edge layui-edge-top" style="border-bottom-color: green"></i>
				日同比 <span>3%</span>
				<i class="layui-edge layui-edge-bottom" style="border-top-color: red"></i>
				<fieldset class="layui-elem-field layui-field-title" style="margin-top: 66px;"></fieldset>
				<div>日访问量 1,234</div>
			</div>
		</div>
	  </div>
	</div>
	<div class="layui-col-xs6 layui-col-md3">
	  <div class="layui-card">
		<div class="layui-card-header">下载数量<span class="layui-badge layui-badge-blue pull-right">月</span></div>
		<div class="layui-card-body">
			<div class="layui-sales">6,560</div>
			<div class="layui-sales-info" >
				<div id="zfbs" style="height: 80px;"></div>
				<fieldset class="layui-elem-field layui-field-title"></fieldset>
				<div>总数 1,234</div>
			</div>      	
		</div>
	  </div>
	</div>
	<div class="layui-col-xs6 layui-col-md3">
	  <div class="layui-card">
		<div class="layui-card-header">流量统计 <span class="layui-badge layui-badge-green pull-right">日</span></div>
		<div class="layui-card-body">
			<div class="layui-sales">6,560</div>
			<div class="layui-sales-info" >
				<div id="fwl" style="height: 80px;"></div>
				<fieldset class="layui-elem-field layui-field-title" ></fieldset>
				<div>日访问量 1,234</div>
			</div>
		</div>
	  </div>
	</div>
	<div class="layui-col-xs6 layui-col-md3">
	  <div class="layui-card">
		<div class="layui-card-header">转化率 <span class="layui-badge layui-badge-red pull-right">周</span></div>
		<div class="layui-card-body">
			<div class="layui-sales">83%</div>
			<div class="layui-sales-info" >
				<div style="height: 80px;">
					<div class="layui-progress layui-progress-big">
					<div class="layui-progress-bar layui-bg-blue" lay-percent="83%" style="width: 83%;"></div>
				  </div>
			  </div>
				<fieldset class="layui-elem-field layui-field-title" style="position: relative;"></fieldset>
				<div>转化数量  12,234</div>
			</div>   
		</div>
	  </div>
	</div>
	
	
	<div class="layui-col-xs6 layui-col-md9">
	  <div class="layui-card">
		<div class="layui-card-header">地域分布</div>
		<div class="layui-card-body">
			<div id="map" style="height: 578px;"></div>
		</div>
	  </div>
	</div>
	
	<div class="layui-col-xs6 layui-col-md3">
	  <div class="layui-card" >
		<div class="layui-card-header">在线人数</div>
		<div class="layui-card-body">
			<div id="zxrs" style="height: 250px" ></div>
		</div>
	  </div>
	</div>
	<div class="layui-col-xs6 layui-col-md3">
	  <div class="layui-card"  >
		<div class="layui-card-header">浏览器分布</div>
		<div class="layui-card-body">
			<div id="llq" style="height: 250px" ></div>
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
<script src="/static/assets/third_party/echart/china.js"></script>
<script>
	function init(layui) {
		var layer = layui.layer, table = layui.table;
	}

      // 访问量
      var fwlCharts = echarts.init(document.getElementById('fwl'));
      var fwlOptions = {
          tooltip: {
              trigger: 'axis',
              axisPointer: {
                  type: 'cross',
                  label: {
                      backgroundColor: '#6a7985'
                  }
              }
          },
          grid: {
              left: '-1%', 
              right: '0', 
              bottom: '0', 
              top: '5px', 
              containLabel: false
          },
          xAxis: [
              {
                  type: 'category',
                  boundaryGap: false,
                  data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日'],
                  show: false
              }
          ],
          yAxis: [
              {
                  type: 'value',
                  show: false
              }
          ],
          series: [
              {
                  name: '总量',
                  type: 'line',
                  stack: '总量',
                  smooth: true,
                  lineStyle: {
                      width: 0
                  },
                  showSymbol: false,
                  areaStyle: {
                      opacity: 0.8,
                      color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                          offset: 0,
                          color: '#1890ff'
                      }, {
                          offset: 1,
                          color: '#1890ff'
                      }])
                  },
                  emphasis: {
                      focus: 'series'
                  },
                  data: [120, 132, 156, 200, 90, 100, 165]
              },
          ]
      };    	

      fwlCharts.setOption(fwlOptions);    

      // 渲染表信息
      var zfbsCharts = echarts.init(document.getElementById('zfbs'));

      var zfbsOptions = {
          color: ['#1890ff','#666'],
          tooltip: {},
          grid: {
              left: '0',
              right: '20',
              bottom: '30',
              containLabel: true
          },
          xAxis: {
              data: ['1月', '2月', '3月', '4月', '6月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
              show:false,
          },
          yAxis: {
              show:false 
          },
          series: [{
              type: 'bar',
              data: [726, 1013, 690, 892, 982, 570, 536, 546, 988, 1002, 500, 506],
              barMaxWidth: 45
          }]
      }

      zfbsCharts.setOption(zfbsOptions);


      // 地图数据信息
		function randomValue() {
			return Math.round(Math.random()*1000);
		}
		var mapCharts = echarts.init(document.getElementById('map'));
		var dataList=[
          {name:"南海诸岛",value:0},
          {name: '北京', value: randomValue()},
          {name: '天津', value: randomValue()},
          {name: '上海', value: randomValue()},
          {name: '重庆', value: randomValue()},
          {name: '河北', value: randomValue()},
          {name: '河南', value: randomValue()},
          {name: '云南', value: randomValue()},
          {name: '辽宁', value: randomValue()},
          {name: '黑龙江', value: randomValue()},
          {name: '湖南', value: randomValue()},
          {name: '安徽', value: randomValue()},
          {name: '山东', value: randomValue()},
          {name: '新疆', value: randomValue()},
          {name: '江苏', value: randomValue()},
          {name: '浙江', value: randomValue()},
          {name: '江西', value: randomValue()},
          {name: '湖北', value: randomValue()},
          {name: '广西', value: randomValue()},
          {name: '甘肃', value: randomValue()},
          {name: '山西', value: randomValue()},
          {name: '内蒙古', value: randomValue()},
          {name: '陕西', value: randomValue()},
          {name: '吉林', value: randomValue()},
          {name: '福建', value: randomValue()},
          {name: '贵州', value: randomValue()},
          {name: '广东', value: randomValue()},
          {name: '青海', value: randomValue()},
          {name: '西藏', value: randomValue()},
          {name: '四川', value: randomValue()},
          {name: '宁夏', value: randomValue()},
          {name: '海南', value: randomValue()},
          {name: '台湾', value: randomValue()},
          {name: '香港', value: randomValue()},
          {name: '澳门', value: randomValue()}
		]

		// 世界地图
		var mapOption = {
			tooltip: {
				formatter:function(params,ticket, callback){
					return params.seriesName+'<br />'+params.name+'：'+params.value
				}
			},
			visualMap: {
				min: 0,
				max: 1500,
				left: 'left',
				top: 'bottom',
				text: ['高','低'],//取值范围的文字
				inRange: {
					color: ['#e0ffff', '#006edd']//取值范围的颜色
				},
				show: true//图注
			},
			geo: {
              map: 'china',
              roam: false,  //不开启缩放和平移
              zoom:1.23,    //视角缩放比例
              label: {
                  normal: {
                      show: true,
                      fontSize:'10',
                      color: 'rgba(0,0,0,0.7)'
                  }
              },
              itemStyle: {
                  normal:{
                      borderColor: 'rgba(0, 0, 0, 0.2)'
                  },
                  emphasis:{
                      areaColor: '#F3B329',//鼠标选择区域颜色
                      shadowOffsetX: 0,
                      shadowOffsetY: 0,
                      shadowBlur: 20,
                      borderWidth: 0,
                      shadowColor: 'rgba(0, 0, 0, 0.5)'
                  }
              }
			},
			series : [
              {
                  name: '信息量',
                  type: 'map',
                  geoIndex: 0,
                  data:dataList
              }
			]
		};
        mapCharts.setOption(mapOption);


      var myCharts = echarts.init(document.getElementById('zxrs'));
      var mData = [50, 100, 150, 80, 120, 150, 200, 250, 220, 250, 300, 350, 400, 380, 440, 450, 500, 550, 500];
      var option = {


          tooltip: {
              trigger: "axis"
          },
          xAxis: [{
              type: "category",
              boundaryGap: !1,
              data: ["06:00", "06:30", "07:00", "07:30", "08:00", "08:30", "09:00", "09:30", "10:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00"]
          }],
          yAxis: [{
              type: "value"
          }],
          series: [{
              name: "总量",
              type: "line",
              smooth: !0,
              itemStyle: {
                  normal: {
                      areaStyle: {
                          type: "default"
                      }
                  }
              },
              data: mData
          }]
      };
      myCharts.setOption(option);

      // 动态改变图表1数据
      setInterval(function () {
          for (var i = 0; i < mData.length; i++) {
              mData[i] += (Math.random() * 50 - 25);
              if (mData[i] < 0) {
                  mData[i] = 0;
              }
          }
          myCharts.setOption({
              series: [{
                  data: mData
              }]
          });
      }, 1000);

        // 渲染浏览器分布
      var llqCharts = echarts.init(document.getElementById('llq'));
        var llqOptions = {
          tooltip: {
              trigger: 'item'
          },
          legend: {
              bottom: '1%',
              left: 'center',
              icon: 'circle', // 设置小圆点
              itemWidth: 10,  // 设置宽度
              itemHeight: 10, // 设置高度
          },

          series: [
              {
                  name: '浏览器分布',
                  type: 'pie',
                  radius: ['40%', '70%'],
                  avoidLabelOverlap: false,
                  label: {
                      show: false,
                      position: 'center'
                  },
                  emphasis: {
                      label: {
                          show: true,
                          fontSize: '14px',
                      }
                  },
                  labelLine: {
                      show: false
                  },
                  data: [
                      {value: 1048, name: 'Chrome'},
                      {value: 735, name: 'Safair'},
                      {value: 580, name: 'Firefox'},
                      {value: 484, name: 'Edge'},
                      {value: 300, name: 'IE'},
                      {value: 200, name: 'Other'},
                  ]
              }
          ]
      };
      llqCharts.setOption(llqOptions);

      // 窗口大小改变事件
      window.onresize = function () {
          myCharts.resize();
          mapCharts.resize();
          fwlCharts.resize();
          zfbsCharts.resize();
          llqCharts.resize();
      };


	//页面停留时长统计
	let stopTime;

	window.onpageshow = ()=>{
		stopTime = new Date().getTime();
	}

	window.onpagehide = ()=>{
		stopTime = new Date().getTime() - stopTime;
		let record = localStorage.getItem('data');
		console.log(record);
		let data = record && JSON.parse(record) || [];
		localStorage.setItem('data',JSON.stringify([...data,{user:new Date().getTime(),path:window.location.href,stopTime}]));	  
	}

</script>

	<!-- /脚本 -->
	
	<script src="/static/assets/layui/layui.js"></script>
	<script src="/static/assets/gougu/gouguInit.js"></script>
			
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
