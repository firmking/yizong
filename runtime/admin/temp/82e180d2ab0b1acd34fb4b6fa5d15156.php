<?php /*a:2:{s:40:"G:\gougu\app\admin\view\index\index.html";i:1668565607;s:40:"G:\gougu\app\admin\view\common\base.html";i:1668565607;}*/ ?>
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


<link rel="stylesheet" href="/static/assets/gougu/css/layout.css" media="all">

</head>
<body class="main-body">
	<!-- 主体 -->
	
<div class="layui-layout-body">
    <div id="GouguApp">
        <div class="layui-layout gg-layout">
            <div class="layui-header">
                <!-- 头部区域 -->
                <div class="layui-layout-left">
                    <span class="gg-head-item">
                        <a href="javascript:;" gg-event="shrink" title="侧边伸缩"><i class="layui-icon layui-icon-shrink-right"></i></a>
                    </span>
                    <span class="gg-head-item gg-head-cache">
                        <a href="javascript:;" gg-event="cache" data-href="/admin/api/cache_clear" title="清空缓存"><i class="layui-icon layui-icon-fonts-clear"></i></a>
                    </span>
                    <span class="gg-head-item gg-head-home">
                        <a href="/" target="_blank" title="前台首页"><i class="layui-icon layui-icon-website"></i></a>
                    </span>
                </div>

                <div class="layui-layout-right">
                    <span class="gg-head-item gg-head-refresh">
                        <a href="javascript:;" class="refreshThis" gg-event="refresh" title="刷新">
                            <i class="layui-icon layui-icon-refresh"></i>
                        </a>
                    </span>
                    <span class="gg-head-item gg-head-screen">
                        <a href="javascript:;" gg-event="screen" data-screen="full">
                            <i class="fullScreen layui-icon layui-icon-screen-full"></i>
                        </a>
                    </span>
					<span class="gg-head-item gg-head-set">
                        <a href="javascript:;" id="theme">
                            <i class="layui-icon layui-icon-set"></i>
                        </a>
                    </span>
                    <span class="gg-head-item gg-head-message">
                        <a data-text="消息中心" data-url="" gg-event="message" title="消息中心">
                            <i class="layui-icon layui-icon-notice"></i>
                            <!-- 如果有新消息，则显示 -->
                            <div class="gg-message-num"><span>99</span></div>
                        </a>
                    </span>
                    <span class="gg-head-item gg-head-avatar">
                        <ul class="layui-nav">
                            <li class="layui-nav-item">
                                <a href="javascript:;">
									<img src="<?php echo get_login_admin('thumb'); ?>" onerror="javascript:this.src='{__ADMIN_IMG__}/nonepic360x360.jpg';this.onerror=null;">
                                    <cite><?php echo get_login_admin('nickname'); ?></cite>
                                </a>
                                <dl class="layui-nav-child" style="text-align: center; cursor: pointer;">
                                    <dd><a data-href="/admin/api/edit_personal" data-id="0101" data-title="基本资料" class="side-menu-item">基本资料</a></dd>
                                    <dd><a data-href="/admin/api/edit_password" data-id="0102" data-title="修改密码" class="side-menu-item">修改密码</a></dd>
                                    <hr>
                                    <dd gg-event="logout"><a>退出</a></dd>
                                </dl>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>

            <!-- 侧边菜单 -->
            <div class="layui-side layui-side-menu layui-side-<?php echo htmlentities($theme); ?>">
                <div class="layui-side-scroll">
                    <div class="layui-logo" gg-event="closeAllTabs">
                        <img src="/static/admin/images/syslogo.png" style="height: 40px;" class="syslogo">
                        <img src="/static/admin/images/logo.png" style="height: 40px;" class="logo">
                    </div>

					<ul id="menuList" class="layui-nav layui-nav-tree layui-inline" lay-shrink="all">
					<?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$a): ?>
						<li class="layui-nav-item menu-li">
							<a href="javascript:;" lay-tips="<?php echo htmlentities($a['title']); ?>" lay-direction="2" data-id="<?php echo htmlentities($a['id']); ?>" data-title="<?php echo htmlentities($a['title']); ?>" data-href="/<?php echo htmlentities($a['src']); ?>"><i class="bi <?php echo htmlentities($a['icon']); ?>"></i> <?php echo htmlentities($a['title']); ?></a>
							<?php if(!(empty($a['list']) || (($a['list'] instanceof \think\Collection || $a['list'] instanceof \think\Paginator ) && $a['list']->isEmpty()))): ?>
								<dl class="layui-nav-child">
								<?php if(is_array($a['list']) || $a['list'] instanceof \think\Collection || $a['list'] instanceof \think\Paginator): if( count($a['list'])==0 ) : echo "" ;else: foreach($a['list'] as $key=>$b): ?>
									<dd>
									<a href="javascript:;" class="side-menu-item" data-id="<?php echo htmlentities($b['id']); ?>" data-title="<?php echo htmlentities($b['title']); ?>" data-href="/<?php echo htmlentities($b['src']); ?>"><?php echo htmlentities($b['title']); ?></a>
									<?php if(!(empty($b['list']) || (($b['list'] instanceof \think\Collection || $b['list'] instanceof \think\Paginator ) && $b['list']->isEmpty()))): ?>
										<dl class="layui-nav-child">
										<?php if(is_array($b['list']) || $b['list'] instanceof \think\Collection || $b['list'] instanceof \think\Paginator): if( count($b['list'])==0 ) : echo "" ;else: foreach($b['list'] as $key=>$c): ?>
											<dd>
											<a href="javascript:;" class="side-menu-item" data-id="<?php echo htmlentities($c['id']); ?>" data-title="<?php echo htmlentities($c['title']); ?>" data-href="/<?php echo htmlentities($c['src']); ?>"><?php echo htmlentities($c['title']); ?></a>
											<?php if(!(empty($c['list']) || (($c['list'] instanceof \think\Collection || $c['list'] instanceof \think\Paginator ) && $c['list']->isEmpty()))): ?>
												<dl class="layui-nav-child">
												<?php if(is_array($c['list']) || $c['list'] instanceof \think\Collection || $c['list'] instanceof \think\Paginator): if( count($c['list'])==0 ) : echo "" ;else: foreach($c['list'] as $key=>$d): ?>
													<dd><a href="javascript:;" class="side-menu-item" data-id="<?php echo htmlentities($d['id']); ?>" data-title="<?php echo htmlentities($d['title']); ?>" data-href="/<?php echo htmlentities($d['src']); ?>"><?php echo htmlentities($d['title']); ?></a></dd>
												<?php endforeach; endif; else: echo "" ;endif; ?>
												</dl>
											<?php endif; ?>
											</dd>
										<?php endforeach; endif; else: echo "" ;endif; ?>
										</dl>
									<?php endif; ?>
									</dd>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</dl>
							<?php endif; ?>
						</li>			
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
                </div>
            </div>

            <!-- 页面标签 -->
            <div id="pageTabs" class="page-tabs">
                <div class="layui-icon gg-tabs-control layui-icon-prev" gg-event="tabRollLeft"></div>
                <div class="layui-icon gg-tabs-control layui-icon-next" gg-event="tabRollRight"></div>
                <div class="layui-icon gg-tabs-control layui-icon-down">
                    <ul class="layui-nav gg-tabs-select">
                        <li class="layui-nav-item">
                            <a href="javascript:;"></a>
                            <dl class="layui-nav-child layui-anim-fadein">
                                <dd gg-event="closeThisTabs"><a href="javascript:;">关闭当前</a></dd>
                                <dd gg-event="closeOtherTabs"><a href="javascript:;">关闭其它</a></dd>
                                <dd gg-event="closeAllTabs"><a href="javascript:;">关闭全部</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
                <div class="layui-tab gg-admin-tab" lay-unauto lay-allowClose="true" lay-filter="gg-admin-tab">
                    <ul class="layui-tab-title" id="pageTabUl">
                        <li lay-id="0" lay-attr="view/home/index.html" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
                    </ul>
                </div>
            </div>

            <!-- 主体内容 -->
            <div class="layui-body" id="GouguAppBody">
                <div class="gg-tab-page layui-show" id="tabItem0">
                    <iframe id="0" data-frameid="0" name="myiframe" src="<?php echo url('/admin/index/main'); ?>" frameborder="0" align="left" width="100%" height="100%" scrolling="yes"></iframe>
                </div>
            </div>
            <!-- 辅助元素，用于移动设备下遮罩 -->
            <div class="gg-body-shade" gg-event="shade"></div>
        </div>
    </div>
</div>
<!-- /主体 -->

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	
	<!-- 脚本 -->
	
	<script>
		const moduleInit = ['tool','admin'];
		function gouguInit() {
			layui.dropdown.render({
				elem: '#theme',
				trigger: 'mousedown',
				align: 'center',
				data: [{
					title: '经典黑',
					theme: 'black'
				},{
					title: '简约白',
					theme: 'white'
				}],
				click: function(data, othis){
					$.ajax({
						url: "/admin/index/set_theme",
						data:{'theme':data.theme},
						success: function (e) {
							layer.msg(e.msg);
							if (e.code == 0) {
								setTimeout(function () {
									parent.location.reload();
								}, 1000)
							}
						}
					})
				}
			});
			$('#GouguApp').on("click",'[gg-event="logout"]',function () {
				layer.confirm('确认注销登录吗?', { icon: 7, title: '警告' }, function (index) {
					//注销
					$.ajax({
						url: "/admin/login/login_out",
						success: function (e) {
							layer.msg(e.msg);
							if (e.code == 0) {
								setTimeout(function () {
									location.href = "<?php echo url('admin/login/index'); ?>"
								}, 1000)
							}
						}
					})
					layer.close(index);
				});
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
