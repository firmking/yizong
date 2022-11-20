<?php /*a:4:{s:39:"G:\gougu\app\home\view\index\index.html";i:1668565607;s:39:"G:\gougu\app\home\view\common\base.html";i:1668565607;s:41:"G:\gougu\app\home\view\common\header.html";i:1668565607;s:41:"G:\gougu\app\home\view\common\footer.html";i:1668565607;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="renderer" content="webkit"/>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="mobile-prefetch" href=""/>


	<title><?php echo get_system_config('web','admin_title'); ?></title>		


	<meta name="keywords" content="<?php echo get_system_config('web','keywords'); ?>"/>
	<meta name="description" content="<?php echo get_system_config('web','desc'); ?>"/>


  <link rel="stylesheet" href="/static/home/css/common.css?v=<?php echo get_system_config('web','version'); ?>" media="all">


<link rel="stylesheet" href="/static/home/css/index.css?v=<?php echo get_system_config('web','version'); ?>">
<link rel="stylesheet" href="/static/home/js/aos/aos.css" />


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


<section class="banner" style="position:relative;">
	<div class="container">
		<div class="banner-text">
			<h1 data-aos="fade-up">勾股CMS，让WEB开发更简单！</h1>
			<h2 data-aos="fade-up" data-aos-delay="400">
			基于ThinkPHP6 + Layui + MySql的轻量级极速后台开发框架，干净不臃肿、操作简单、开箱即用；<br/>
			通用型的后台权限管理机制，容易功能定制和二次开发，帮助开发者简单高效降低二次开发成本。</h2>
			<div data-aos="fade-up" data-aos-delay="800">
				<a href="https://gitee.com/gouguopen/gougucms" class="btn-down" target="_blank"><span>立即下载(Gitee)</span></a>
				<a href="/admin/" class="btn-go" target="_blank"><span>体验演示</span></a>
				<span class="btn-view">查看体验账号</span>
			</div>
			<div class="banner-ops" data-aos="fade-up" data-aos-delay="1000">
				<a href="/home/index/down.html" target="_blank" class="btn-full">完整包下载</a>
				<a href="https://blog.gougucms.com/home/book/detail/bid/1.html" target="_blank" class="btn-full">文档说明</a>
				<a href="https://gitee.com/gouguopen/gougucms/releases/v<?php echo CMS_VERSION; ?>" target="_blank">当前版本：v<?php echo CMS_VERSION; ?></a>
				<a href="https://gitee.com/gouguopen/gougucms/releases" target="_blank">更新日志</a>
				<a href="https://www.bt.cn/?invite_code=MV9zbG93ank=" rel="nofollow" target="_blank">推荐使用宝塔面板部署</a>
			</div>
		</div>
		<div class="banner-img" data-aos="zoom-out" data-aos-delay="300">
			<img src="/static/home/images/banner_img.png" alt="">
		</div>		
	</div>
</section>

<div class="advantage">
	<div class="container" data-aos="fade-up">
		<header class="section-header">
            <h2>系统特色</h2>
            <p>完全免费开源，系统易于功能扩展，代码维护，非常容易定制和二次开发。</p>
        </header>
		<div class="item-wrap">
			<div class="advantage-item item-col-4" data-aos="fade-up" data-aos-delay="200">
				<div class="feature">
					<div class="part-icon"><img src="/static/home/images/code.png"></div>
					<div class="part-text">
						<h3>友好的二次开发</h3>
						<p>系统采用MVC的开发模式，代码完全免费开源，注释清晰，模块相互独立，可以便捷进行二次开发。</p>
					</div>
				</div>
			</div>
			<div class="advantage-item item-col-4" data-aos="fade-up" data-aos-delay="300">
				<div class="feature">
					<div class="part-icon"><img src="/static/home/images/auth.png"></div>
					<div class="part-text">
						<h3>RBAC权限管理</h3>
						<p>基于RBAC权限控制管理，无限父子级权限分组，可自由分配子级权限，一个管理员可同时属于多个组别。</p>
					</div>
				</div>
			</div>
			<div class="advantage-item item-col-4" data-aos="fade-up" data-aos-delay="400">
				<div class="feature">
					<div class="part-icon"><img src="/static/home/images/log.png"></div>
					<div class="part-text">
						<h3>完整的操作日志</h3>
						<p>后台的操作留痕，全面的日志管理，全面监控方便追溯和定位问题；对平台用户的行为记录，方便分析用户的行为。</p>
					</div>
				</div>
			</div>
			<div class="advantage-item item-col-4" data-aos="fade-up" data-aos-delay="500">
				<div class="feature">
					<div class="part-icon"><img src="/static/home/images/bak.png"></div>
					<div class="part-text">
						<h3>安全的数据备份</h3>
						<p>支持在线自由备份、下载数据、恢复数据库，提供优化表、修复表的功能，无惧数据丢失及人为损坏。</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="cms-banner">
	<div class="container">
		<img src="https://blog.gougucms.com/static/admin/images/login_logo.png">
		<span>开源的博客系统</span>
		<ul>
			<li>● 基于勾股CMS开发，一脉相承</li>
			<li>● 简约、易用、轻快等特点</li>
		</ul>
		<ul>
			<li>● 集成文章、动态、归档、访问统计等功能</li>
			<li>● 可做博客，工作室，自媒体等各类网站</li>
		</ul>
		<a href="https://blog.gougucms.com/" target="_blank">免费开源</a>
	</div>
</div>
	
	
<div class="function">
	<div class="container" data-aos="fade-down">
		<header class="section-header">
            <h2>功能矩阵</h2>
            <p style="text-align:left; padding-bottom:120px;">系统后台集成了主流的通用功能，如：登录验证、系统配置、操作日志管理、角色权限、功能模块、功能节点、导航设置、网站地图、轮播广告、友情链接、TAG关键字管理、搜索关键字管理、文件上传、数据备份/还原、文章功能、商品功能、单页面管理、用户等级、用户管理、用户操作日志、用户注册/登录、 API接口等。更多的个性化功能可以基于当前系统便捷做二次开发。</p>
        </header>
		<div class="function-wrap" data-aos="fade-up">
			<div class="function-img">
				<img src="/static/home/images/function.png">
			</div>
			<div class="function-main">
				<div class="function-item" data-aos="fade-up" data-aos-delay="200">
					<div class="item-box">
						<img src="/static/home/images/system.png">
						<h3>系统管理</h3>
					</div>
					<ul>
						<li><span>✓</span>系统配置</li>
						<li><span>✓</span>功能模块</li>
						<li><span>✓</span>功能节点</li>
						<li><span>✓</span>权限角色</li>
						<li><span>✓</span>管 理 员</li>
						<li><span>✓</span>操作日志</li>
						<li><span>✓</span>系统配置</li>
						<li><span>✓</span>数据备份</li>
						<li><span>✓</span>数据还原</li>
					</ul>
				</div>
				<div class="function-item" data-aos="fade-up" data-aos-delay="300">
					<div class="item-box">
						<img src="/static/home/images/data.png">
						<h3>基础数据</h3>
					</div>
					<ul>
						<li><span>✓</span>导航设置</li>
						<li><span>✓</span>网站地图</li>
						<li><span>✓</span>轮播广告</li>
						<li><span>✓</span>友情链接</li>
						<li><span>✓</span>SEO关键字</li>
						<li><span>✓</span>搜索词</li>
					</ul>
				</div>
				<div class="function-item" data-aos="fade-up" data-aos-delay="400">
					<div class="item-box">
						<img src="/static/home/images/user.png">
						<h3>平台用户</h3>
					</div>
					<ul>
						<li><span>✓</span>用户等级</li>
						<li><span>✓</span>用户列表</li>
						<li><span>✓</span>操作记录</li>
						<li><span>✓</span>操作日志</li>
					</ul>
				</div>
				<div class="function-item" data-aos="fade-up" data-aos-delay="500">
					<div class="item-box">
						<img src="/static/home/images/actrcle.png">
						<h3>资讯中心</h3>
					</div>
					<ul>
						<li><span>✓</span>文章分类</li>
						<li><span>✓</span>文章列表</li>
					</ul>
				</div>
				<div class="function-item" data-aos="fade-up" data-aos-delay="600">
					<div class="item-box">
						<img src="/static/home/images/goods.png">
						<h3>商品中心</h3>
					</div>
					<ul>
						<li><span>✓</span>商品分类</li>
						<li><span>✓</span>商品列表</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div style="text-align:center; width: 100%; margin: 30px auto 0; background-color: #fff; padding:10px; box-sizing: border-box; border-radius: 10px; box-shadow: 0 0 10px rgb(0 0 0 / 10%);">
			<a href="https://curl.qcloud.com/xeKz2noI" target="_blank"><img src="https://www.gougucms.com/storage/image/1200x90.jpg" style="width:100%;border-radius: 6px;"></a>
		</div>
	</div>
</div>

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
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
	  $('.btn-view').on('click',function(){
		layer.open({
			'title':'体验账号',
			'content':'用户：gougucms<br/>密码：123456'
		});
	  })
    </script>

	<!-- /脚本 -->
	
	<!-- 统计代码 -->
	
	<!-- /统计代码 -->
</body>
</html>
