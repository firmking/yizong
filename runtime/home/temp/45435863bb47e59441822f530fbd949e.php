<?php /*a:4:{s:37:"G:\gougu\app\home\view\pages\dev.html";i:1668565607;s:39:"G:\gougu\app\home\view\common\base.html";i:1668565607;s:41:"G:\gougu\app\home\view\common\header.html";i:1668565607;s:41:"G:\gougu\app\home\view\common\footer.html";i:1668565607;}*/ ?>
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
<link rel="stylesheet" href="https://www.gougucms.com/static/home/dev/dev.css" />


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
					<h1 data-aos="fade-up">项目研发管理工具</h1>
					<h2 data-aos="fade-up" data-aos-delay="400">让项目管理变得简单，实现『研发+管理』全面提升</h2>
					<div data-aos="fade-up" data-aos-delay="800">
						<a href="https://gitee.com/gouguopen/dev" class="btn-down" target="_blank"><span>立即下载(Gitee)</span></a>
						<a href="https://dev.gougucms.com/" class="btn-go" target="_blank"><span>体验演示</span></a>
						<span class="btn-view">查看体验账号</span>
					</div>
					<div class="banner-ops" data-aos="fade-up" data-aos-delay="1000">
						<a href="https://blog.gougucms.com/home/book/detail/bid/7.html" class="btn-full" target="_blank">文档说明</a>						
						<a href="https://gitee.com/gouguopen/dev/releases" target="_blank">更新日志</a>
						<a href="https://www.bt.cn/?invite_code=MV9zbG93ank=" rel="nofollow" target="_blank">推荐使用宝塔面板部署</a>
					</div>
				</div>
				<div class="banner-img" data-aos="zoom-out" data-aos-delay="300">
					<img src="https://www.gougucms.com/static/home/dev/banner_bg.png" alt="">
				</div>
			</div>
		</div>
	</section>

	<section class="advantage">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>适合各行业软件开发团队</h2>
                <p>在线管理团队的工作、项目和任务，覆盖从需求提出到研发完成上线的研发管理全生命周期</p>
            </header>
            <div class="item-wrap">
                <div class="item-col-4">
                    <div class="box" data-aos="fade-up" data-aos-delay="200">
                        <img src="https://www.gougucms.com/static/home/dev/p1.png" class="img-fluid" alt="">
                        <h3>协同</h3>
                        <p>日程 / 日报 / 项目 / 任务</p>
                    </div>
                </div>
                <div class="item-col-4">
                    <div class="box" data-aos="fade-up" data-aos-delay="400">
                        <img src="https://www.gougucms.com/static/home/dev/p2.png" class="img-fluid" alt="">
                        <h3>项目</h3>
                        <p>需求 / 设计 / 研发 / 测试 </p>
                    </div>
                </div>
                <div class="item-col-4">
                    <div class="box" data-aos="fade-up" data-aos-delay="600">
                        <img src="https://www.gougucms.com/static/home/dev/p3.png" class="img-fluid" alt="">
                        <h3>工时</h3>
                        <p>进度 / 成本 / 绩效 / 质量</p>
                    </div>
                </div>
                <div class="item-col-4">
                    <div class="box" data-aos="fade-up" data-aos-delay="800">
                        <img src="https://www.gougucms.com/static/home/dev/p4.png" class="img-fluid" alt="">
                        <h3>知识库</h3>
                        <p>文档 / 经验 / 规范 / 分享</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<section class="step">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>项目研发实施流程</h2>
            </header>
            <div class="item-wrap">
                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-file-text"></i>
                        <div>
                            <span>10%</span>
                            <p>需求分析</p>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-file-medical" style="color: #ee6c20;"></i>
                        <div>
							<span style="color: #ee6c20;">25%</span>
                            <p>产品策划</p>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-file-richtext" style="color: #52CD75;"></i>
                        <div>
                            <span style="color: #52CD75;">45%</span>
                            <p>UI设计</p>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-file-code" style="color: #EA4335;"></i>
                        <div>
                            <span style="color: #EA4335;">85%</span>
                            <p>技术研发</p>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-file-ruled" style="color: #9B74D7;"></i>
                        <div>
                            <span style="color: #9B74D7;">95%</span>
                            <p>测试运维</p>
                        </div>
                    </div>
                </div>

                <div class="item-col-6">
                    <div class="step-box">
                        <i class="bi bi-file-check" style="color: #f51f9c;"></i>
                        <div>
                            <span style="color: #f51f9c;">100%</span>
                            <p>成功上线</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>	
	
	<section class="services">
		<div class="container" data-aos="fade-down">
			<header class="section-header">
				<h2>六大主要功能模块</h2>
				<p>改进项目管理模式 提升团队的研发效率，低成本、全流程、快速定制，属于您团队的研发协同工具</p>
			</header>
			<div class="item-wrap">
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="200">
					<div class="service-box blue">
						<i class="bi bi-grid-1x2-fill"></i>
						<h3>产品</h3>
						<p>支持多产品路线，把控进度，协调团队资源</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="300">
					<div class="service-box orange">
						<i class="bi bi-box2-fill"></i>
						<h3>项目</h3>
						<p>项目操作记录全覆盖跟踪，项目进度一目了然</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="400">
					<div class="service-box green">
						<i class="bi bi-map-fill"></i>
						<h3>任务</h3>
						<p>时间跟踪机制，多状态流转，任务成果可见可控</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="500">
					<div class="service-box red">
						<i class="bi bi-calendar-check-fill"></i>
						<h3>工时</h3>
						<p>日报周报，工时登记，团队工作精细化管理</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="600">
					<div class="service-box purple">
						<i class="bi bi-terminal-fill"></i>
						<h3>测试</h3>
						<p>编写测试用例库，BUG记录、跟踪和管理</p>
					</div>
				</div>
				<div class="item-col-3" data-aos="fade-up" data-aos-delay="700">
					<div class="service-box pink">
						<i class="bi bi-collection-fill"></i>
						<h3>知识库</h3>
						<p>技术文档、开发经验、规则规范、支持多人分享</p>
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
			'content':'技术总监：gougujishu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br> 工 程 师 ：ligong&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456<br>产品经理：ouyangchanpin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456'
		});
	  })
    </script>

	<!-- /脚本 -->
	
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
