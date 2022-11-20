<?php /*a:4:{s:36:"G:\gougu\app\home\view\pages\oa.html";i:1668565607;s:39:"G:\gougu\app\home\view\common\base.html";i:1668565607;s:41:"G:\gougu\app\home\view\common\header.html";i:1668565607;s:41:"G:\gougu\app\home\view\common\footer.html";i:1668565607;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="renderer" content="webkit"/>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="mobile-prefetch" href=""/>


<title><?php echo htmlentities($detail['title']); ?></title>


<meta name="keywords" content="<?php echo htmlentities($detail['keyword_names']); ?>" />
<meta name="description" content="<?php echo htmlentities($detail['desc']); ?>" />


  <link rel="stylesheet" href="/static/home/css/common.css?v=<?php echo get_system_config('web','version'); ?>" media="all">


<link rel="stylesheet" href="/static/home/js/aos/aos.css" />
<link rel="stylesheet" href="https://www.gougucms.com/static/home/oa/oa.css" />


<script src="https://cdn.staticfile.org/jquery/3.5.1/jquery.min.js"></script> 
<script defer src="/static/home/js/layer/layer.js"></script> 

</head>
<body class="main-body">
	<!-- 主体 -->
	
<header class="header">
	<div class="nav-box">
		<div class="l nav-logo">
			<a href="/"><img src="/static/home/images/logo.png" height="60" alt="勾股CMS" /></a>
		</div>
		<div class="r navbar">
			<ul>
			<?php if(is_array($COMMON_NAV) || $COMMON_NAV instanceof \think\Collection || $COMMON_NAV instanceof \think\Paginator): if( count($COMMON_NAV)==0 ) : echo "" ;else: foreach($COMMON_NAV as $key=>$a): if(empty($a['list']) || (($a['list'] instanceof \think\Collection || $a['list'] instanceof \think\Paginator ) && $a['list']->isEmpty())): ?>
				<li <?php if(strpos($a['param'],$params['action']) !== false): ?>class="active"<?php endif; ?>>
					<a href="<?php echo $a['src']=='' ? 'javascript : ;':$a['src']; ?>" <?php if($a['target'] == '1'): ?> target="_blank"<?php endif; ?>><?php echo htmlentities($a['title']); ?></a>
				</li>
				<?php else: ?>
				<li class="dropdown">
					<a href="<?php echo $a['src']=='' ? 'javascript : ;':$a['src']; ?>" <?php if($a['target'] == '1'): ?> target="_blank"<?php endif; ?>><?php echo htmlentities($a['title']); ?><i class="bi bi-chevron-down"></i></a>
					<ul>
						<?php if(is_array($a['list']) || $a['list'] instanceof \think\Collection || $a['list'] instanceof \think\Paginator): if( count($a['list'])==0 ) : echo "" ;else: foreach($a['list'] as $key=>$b): ?>
						<li <?php if(!(empty($b['list']) || (($b['list'] instanceof \think\Collection || $b['list'] instanceof \think\Paginator ) && $b['list']->isEmpty()))): ?> class="dropdown" <?php endif; ?>>
							<a href="<?php echo $b['src']=='' ? 'javascript : ;':$b['src']; ?>" <?php if($b['target'] == '1'): ?> target="_blank"<?php endif; ?>><?php echo htmlentities($b['title']); if(!(empty($b['list']) || (($b['list'] instanceof \think\Collection || $b['list'] instanceof \think\Paginator ) && $b['list']->isEmpty()))): ?><i class="bi bi-chevron-down"></i><?php endif; ?></a>
							<?php if(!(empty($b['list']) || (($b['list'] instanceof \think\Collection || $b['list'] instanceof \think\Paginator ) && $b['list']->isEmpty()))): ?>
							<ul>
							<?php if(is_array($b['list']) || $b['list'] instanceof \think\Collection || $b['list'] instanceof \think\Paginator): if( count($b['list'])==0 ) : echo "" ;else: foreach($b['list'] as $key=>$c): ?>
								<li <li <?php if(!(empty($c['list']) || (($c['list'] instanceof \think\Collection || $c['list'] instanceof \think\Paginator ) && $c['list']->isEmpty()))): ?> class="dropdown" <?php endif; ?>>
									<a href="<?php echo $b['src']=='' ? 'javascript : ;':$b['src']; ?>" <?php if($b['target'] == '1'): ?> target="_blank"<?php endif; ?>><?php echo htmlentities($b['title']); if(!(empty($c['list']) || (($c['list'] instanceof \think\Collection || $c['list'] instanceof \think\Paginator ) && $c['list']->isEmpty()))): ?><i class="bi bi-chevron-down"></i><?php endif; ?></a>
									<?php if(!(empty($c['list']) || (($c['list'] instanceof \think\Collection || $c['list'] instanceof \think\Paginator ) && $c['list']->isEmpty()))): ?>
									<ul>
										<?php if(is_array($c['list']) || $c['list'] instanceof \think\Collection || $c['list'] instanceof \think\Paginator): if( count($c['list'])==0 ) : echo "" ;else: foreach($c['list'] as $key=>$d): ?>
											<li><a href="<?php echo $d['src']=='' ? 'javascript : ;':$d['src']; ?>" <?php if($d['target'] == '1'): ?> target="_blank"<?php endif; ?>><?php echo htmlentities($d['title']); ?></a></li>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
									<?php endif; ?>
								</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						<?php endif; ?>
						</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</li>	
				<?php endif; ?>		
			<?php endforeach; endif; else: echo "" ;endif; if(empty($login_top) || (($login_top instanceof \think\Collection || $login_top instanceof \think\Paginator ) && $login_top->isEmpty())): ?>
				<li><a class="login-btn scrollto" href="/home/login/index">登录</a></li>
				<li><a class="reg-btn scrollto" href="/home/login/reg">注册</a></li>
				<?php else: ?>
				<li class="nav-logined">
					<?php echo htmlspecialchars_decode($login_top); ?>
					<div class="nav-login-box">
						<div class="login-menu">
							<a href="/home/user/index">个人中心</a>
						</div>
						<div class="login-menu-bottom clearfix">
							<a class="l" href="/home/user/index">个人设置</a>
							<a class="r" href="javascript:;" data-node="logout">退出</a>
						</div>
					</div>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<script>
		$('[data-node="logout"]').on("click", function () {
			layer.confirm('确认注销登录吗?', { icon: 7, title: '警告' }, function (index) {
				$.ajax({
					url: '/home/login/login_out',
					success: function (res) {
						layer.msg(res.msg);
						if (res.code == 0) {
							setTimeout(function () {
								location.href = "<?php echo url('/'); ?>"
							}, 1000)
						}
					}
				})
			})
		})
	</script>
</header>
	<section class="banner">
		<div class="container">
				<div class="banner-text">
					<h1 data-aos="fade-up">勾股OA办公系统</h1>
					<h2 data-aos="fade-up" data-aos-delay="400">开源免费，企业数字化、信息化办公的优秀解决方案</h2>
					<div data-aos="fade-up" data-aos-delay="800">
						<a href="https://gitee.com/gouguopen/office" class="btn-down" target="_blank"><span>立即下载(Gitee)</span></a>
						<a href="https://oa.gougucms.com/" class="btn-go" target="_blank"><span>体验演示</span></a>
						<span class="btn-view">查看体验账号</span>
					</div>
					<div class="banner-ops" data-aos="fade-up" data-aos-delay="1000">
						<a href="https://blog.gougucms.com/home/book/detail/bid/3.html" class="btn-full" target="_blank">文档说明</a>						
						<a href="https://gitee.com/gouguopen/office/releases" target="_blank">更新日志</a>
						<a href="https://www.bt.cn/?invite_code=MV9zbG93ank=" rel="nofollow" target="_blank">推荐使用宝塔面板部署</a>
					</div>
				</div>
				<div class="banner-img" data-aos="zoom-out" data-aos-delay="300">
					<img src="https://www.gougucms.com/static/home/oa/banner_bg.png" alt="">
				</div>
			</div>
		</div>
	</section>

	<section class="advantage">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>企业管理九大难题，勾股OA完美解决</h2>
                <p>实现数字化办公，优化调整管理组织结构体制，在提高效率的基础上，提升协同办公能力，强化决策的一致性。</p>
            </header>
            <div class="item-wrap">
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="200">
                        <h3>一、业务办理效率<span>低</span></h3>
                        <p>办事跨部门咨询、沟通、找人签字，程序多、周期长，效率难保障</p>
                    </div>
                </div>
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="200">
                        <h3>二、内部沟通协作<span>难</span></h3>
                        <p>各部门沟通费时费力，具体事项不知道负责人是谁，沟通协作难。</p>
                    </div>
                </div>
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="200">
                        <h3>三、规章制度落实<span>难</span></h3>
                        <p>现有规章制度无法督促落实，不能确保每项业务经过合规审批授权。</p>
                    </div>
                </div>
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="400">
                        <h3>四、签字盖章效率<span>低</span></h3>
                        <p>签字盖章停留在面签、手动操作阶 段，负责人不在，业务就推进不了。</p>
                    </div>
                </div>
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="400">
                        <h3>五、分/子公司管控<span>难</span></h3>
                        <p>分/子公司分布在各地，业务运营、制度落实情况看不见，无法管控。</p>
                    </div>
                </div>
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="400">
                        <h3>六、责任追踪查询<span>难</span></h3>
                        <p>办事过程不透明、无痕迹， 申请-审批缺乏可信记录，追责难。</p>
                    </div>
                </div>
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="600">
                        <h3>七、内部知识流失<span>快</span></h3>
                        <p>各类知识存在个人电脑里，收集不及时-流失快-需要用的时候找不到。</p>
                    </div>
                </div>
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="600">
                        <h3>八、印章管理风险<span>高</span></h3>
                        <p>实体印章管理中存在盗用-冒用-乱用-丢失等风险，使用效率低、成本高。</p>
                    </div>
                </div>
                <div class="item-col-3">
                    <div class="box" data-aos="fade-up" data-aos-delay="600">
                        <h3>九、流程、信息流通<span>慢</span></h3>
                        <p>数据、流程等信息不能实时同步和有效共享，甚至出现“信息孤岛”现象。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <section class="check">    
        <div class="container" data-aos="fade-down">
            <header class="section-header">
                <h2>多类型流程审批模式</h2>
                <p>固定流程、半固定流程、自由流程，满足多业务、多组织需求，企业OA流程审批更灵活、更高效。</p>
            </header>  
            <ul class="item-wrap">
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="200"><div class="li"><img src="https://www.gougucms.com/static/home/oa/qingjia.png" alt=""><p>请假审批</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="200"><div class="li"><img src="https://www.gougucms.com/static/home/oa/chuchai.png" alt=""><p>出差申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="200"><div class="li"><img src="https://www.gougucms.com/static/home/oa/waichu.png" alt=""><p>外出申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="200"><div class="li"><img src="https://www.gougucms.com/static/home/oa/jiaban.png" alt=""><p>加班申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="200"><div class="li"><img src="https://www.gougucms.com/static/home/oa/huiyi.png" alt=""><p>会议室预定</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="200"><div class="li"><img src="https://www.gougucms.com/static/home/oa/gongwen.png" alt=""><p>公文流转</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="200"><div class="li"><img src="https://www.gougucms.com/static/home/oa/weixiu.png" alt=""><p>物品维修</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="200"><div class="li"><img src="https://www.gougucms.com/static/home/oa/zhang.png" alt=""><p>用章申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="400"><div class="li"><img src="https://www.gougucms.com/static/home/oa/che.png" alt=""><p>用车申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="400"><div class="li"><img src="https://www.gougucms.com/static/home/oa/guihuai.png" alt=""><p>用车归还</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="400"><div class="li"><img src="https://www.gougucms.com/static/home/oa/jiekuan.png" alt=""><p>借款申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="400"><div class="li"><img src="https://www.gougucms.com/static/home/oa/fukuan.png" alt=""><p>付款申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="400"><div class="li"><img src="https://www.gougucms.com/static/home/oa/jiangli.png" alt=""><p>奖励申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="400"><div class="li"><img src="https://www.gougucms.com/static/home/oa/caigou.png" alt=""><p>采购申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="400"><div class="li"><img src="https://www.gougucms.com/static/home/oa/huodong.png" alt=""><p>活动经费</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="400"><div class="li"><img src="https://www.gougucms.com/static/home/oa/wuliao.png" alt=""><p>物料申领</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="600"><div class="li"><img src="https://www.gougucms.com/static/home/oa/zhaopin.png" alt=""><p>招聘申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="600"><div class="li"><img src="https://www.gougucms.com/static/home/oa/ruzhi.png" alt=""><p>入职申请</p></div</li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="600"><div class="li"><img src="https://www.gougucms.com/static/home/oa/zhuanzheng.png" alt=""><p>转正申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="600"><div class="li"><img src="https://www.gougucms.com/static/home/oa/zhuangang.png" alt=""><p>转岗申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="600"><div class="li"><img src="https://www.gougucms.com/static/home/oa/lizhi.png" alt=""><p>离职申请</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="600"><div class="li"><img src="https://www.gougucms.com/static/home/oa/baoxiao.png" alt=""><p>费用报销</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="600"><div class="li"><img src="https://www.gougucms.com/static/home/oa/fapiao.png" alt=""><p>发票审批</p></div></li>
              <li class="item-col-8" data-aos="fade-up" data-aos-delay="600"><div class="li"><img src="https://www.gougucms.com/static/home/oa/diy.png" alt=""><p>万能审批</p></div></li>
            </ul>
        </div>
    </section>

	<section class="services">
		<div class="container" data-aos="fade-down">
			<header class="section-header">
				<h2>六大主要功能模块，开箱即用</h2>
				<p>为企业构建一站式智能、敏捷、高效的数字化及信息化办公平台。</p>
			</header>
			<div class="item-wrap">
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="200">
					<div class="service-box blue">
						<i class="bi bi-calendar2-check-fill"></i>
						<h3>办公审批</h3>
						<p>支持人事、财务、行政、业务等多审批流程</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="300">
					<div class="service-box orange">
						<i class="bi bi-exclude"></i>
						<h3>日常办公</h3>
						<p>日程、计划、周报、日报等信息化办公工具</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="400">
					<div class="service-box green">
						<i class="bi bi-people-fill"></i>
						<h3>客户管理</h3>
						<p>统一管理客户，沉淀客户资产，避免客户流失</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="500">
					<div class="service-box red">
						<i class="bi bi-stickies-fill"></i>
						<h3>合同管理</h3>
						<p>合同维护、审批、执行、变更、关闭全流程管理</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="600">
					<div class="service-box purple">
						<i class="bi bi-collection-fill"></i>
						<h3>项目管理</h3>
						<p>项目操作记录全覆盖跟踪，项目进度一目了然</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="700">
					<div class="service-box pink">
						<i class="bi bi-table"></i>
						<h3>财务管理</h3>
						<p>财务报销、开票、到账，财务数据规范化管理</p>
					</div>
				</div>
			</div>
        </div>
	</section>


    <section class="step">
        <div class="step-container">
        <div class="container" data-aos="fade-up">            
            <header class="section-header" style="height:80px;">
                <h2>系统私有化部署的优势</h2>
            </header>  
            <div class="item-wrap">
                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-x-diamond-fill"></i>
                        <div>
                            <p>功能应用</p>
                            <span>更灵活</span>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-shield-fill-check" style="color: #ee6c20;"></i>
                        <div>
                            <p>安 全 性</p>
                            <span style="color: #ee6c20;">更高</span>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-menu-button-wide-fill" style="color: #52CD75;"></i>
                        <div>
                            <p>可拓展性</p>
                            <span style="color: #52CD75;">更强</span>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-currency-exchange" style="color: #EA4335;"></i>
                        <div>
                            <p>性 价 比</p>
                            <span style="color: #EA4335;">更高</span>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-server" style="color: #9B74D7;"></i>
                        <div>
                            <p>数据私密性</p>
                            <span style="color: #9B74D7;">更强</span>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-inboxes-fill" style="color: #f51f9c;"></i>
                        <div>
                            <p>功能定制</p>
                            <span style="color: #f51f9c;">更贴近</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>	
	

	<!-- /主体 -->

	<!-- 底部 -->
	
	<div class="footer">
	<div class="footer-top">
		<div class="footer-top-box clearfix">
			<div class="l footer-link">
				<dl>
					<dt class="dt-title"><a href="/">勾股CMS</a></dt>
					<dd><a href="https://blog.gougucms.com/home/book/detail/bid/1.html">开发手册</a></dd>
					<dd><a href="https://blog.gougucms.com/home/book/detail/bid/1/id/2.html">进阶指南</a></dd>
					<dd><a href="/home/index/down.html">下载中心</a></dd>
					<dd><a href="/admin">在线演示</a></dd>
				</dl>
			</div>
			<div class="l footer-link">
				<dl>
					<dt class="dt-title"><a href="https://blog.gougucms.com/home/book/detail/bid/1/id/2.html">使用帮助</a></dt>
					<dd><a href="https://blog.gougucms.com/">在线社区</a></dd>
					<dd><a href="https://blog.gougucms.com/home/book/detail/bid/1.html">帮助中心</a></dd>
					<dd><a href="https://blog.gougucms.com/home/book/detail/bid/1/id/3.html">常见问题</a></dd>
				</dl>
			</div>
			<div class="l footer-link">
				<dl>
					<dt class="dt-title"><a href="https://gitee.com/gougucms" target="_blank">勾股开源系列软件</a></dt>
					<dd><a href="https://gitee.com/gougucms/office" target="_blank">勾股OA办公系统</a></dd>
					<dd><a href="https://gitee.com/gougucms/blog" target="_blank">勾股BLOG博客系统</a></dd>
					<dd><a href="https://gitee.com/gougucms/gougucms" target="_blank">勾股CMS内容管理系统</a></dd>
					<dd><a href="https://gitee.com/gougucms/dev" target="_blank">勾股DEV项目管理系统</a></dd>					
				</dl>
			</div>
			<div class="l footer-link">
				<dl>
					<dt class="dt-title"><a href="tencent://message/?uin=327725426&Site=SuperNic&Menu=yes">商务合作</a></dt>
					<dd><a href="tencent://message/?uin=327725426&Site=SuperNic&Menu=yes">定制开发</a></dd>
					<dd><a href="tencent://message/?uin=327725426&Site=SuperNic&Menu=yes">插件开发</a></dd>
					<dd><a href="tencent://message/?uin=327725426&Site=SuperNic&Menu=yes">赞助投资</a></dd>
					<dd><a href="tencent://message/?uin=327725426&Site=SuperNic&Menu=yes">广告投放</a></dd>
				</dl>
			</div>
			<div class="r footer-about">
				<dl>
					<dt>联系方式</dt>
					<dd>电子邮箱：hdm58@qq.com</dd>
					<dd>QQ交流群：24641076</dd>
					<dd><a href="https://github.com/hdm58/gougucms" target="_blank" rel="nofollow" class="site-fork">GitHub</a></dd>
					<dd><a href="https://gitee.com/gougucms/gougucms" target="_blank" rel="nofollow" class="site-fork">Gitee</a></dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="footer-bottom-box clearfix">
			<div class="l">
				<?php echo get_system_config('web','copyright'); ?>
					<a target="_blank" rel="nofollow" style="margin-left: 15px;color:#dad8d5" href="http://www.beian.gov.cn/portal/registerSystemInfo"><?php echo get_system_config('web','beian'); ?></a><a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow" style="margin-left: 15px;color:#dad8d5"><?php echo get_system_config('web','icp'); ?></a>
			</div>
			<div class="r">Powered by GouguCMS</div>
		</div>
	</div>
</div>
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
<script src="/static/home/js/aos/aos.js"></script>
	<script src="https://www.gougucms.com/static/home/js/layer/layer.js"></script> 
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
	  
	  $('.btn-view').on('click',function(){
		layer.open({
			'title':'体验账号',
			'content':'BOSS角色：suhaizhen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br> 总经理：yiyeshu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br> 人事总监：fengcailing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br>财务总监：yucixin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1234566<br>市场总监：qinjiaxian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1234566<br>技术总监：yexiaochai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1234566<br> 销售组长：fujianfenshuo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br> 销售组长：jianzixianji &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br> 销售组长：shuloulongsu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br> 客服经理：hongchenxue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br> 客服人员：guxinglei &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456'
		});
	  })
    </script>

	<!-- /脚本 -->
	
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
