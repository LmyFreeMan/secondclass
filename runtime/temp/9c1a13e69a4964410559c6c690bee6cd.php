<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:74:"/www/wwwroot/secondclass/public/../application/index/view/index/index.html";i:1574008882;s:66:"/www/wwwroot/secondclass/application/index/view/common/common.html";i:1574008934;s:67:"/www/wwwroot/secondclass/application/index/view/common/include.html";i:1573996689;s:70:"/www/wwwroot/secondclass/application/index/view/common/nav-header.html";i:1574010013;s:64:"/www/wwwroot/secondclass/application/index/view/common/left.html";i:1573996689;s:66:"/www/wwwroot/secondclass/application/index/view/common/banner.html";i:1574008911;s:66:"/www/wwwroot/secondclass/application/index/view/common/footer.html";i:1574006921;}*/ ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo $settinginfo['content']; ?>">
  <meta name="keywords" content="<?php echo $settinginfo['content']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $settinginfo['title']; ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/static/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileImage" content="/static/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="/static/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/static/assets/css/app.css">
	<!--[if (gte IE 9)|!(IE)]><!-->
	<script src="/static/assets/js/jquery.min.js"></script>
	<!--<![endif]-->
	<!--[if lte IE 8 ]>
	<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
	<script src="/static/assets/js/amazeui.ie8polyfill.min.js"></script>
	<![endif]-->
	<script src="/static/assets/js/amazeui.min.js"></script>
	<!-- <script src="/static/assets/js/app.js"></script> -->
  <script src="/static/assets/js/amazeui.datetimepicker.min.js"></script>
  <script src="/static/assets/js/amazeui.datetimepicker.zh-CN.js" charset="UTF-8"></script>
  <link rel="stylesheet" href="/static/assets/css/amazeui.datetimepicker.css"/>
  <link rel="shortcut icon" href="/static/assets/fonts/favicon.ico">
  <script src="/static/assets/js/wangEditor.min.js"></script>
</head>
<body id="blog">
<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
        <img width="100%" src="/static/images/logoa.png"/>
</header>
<hr>

<nav class="am-g am-g-fixed blog-fixed blog-nav">
<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="blog-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li ><a href="/index/index/index">首页</a></li>
  <li ><a href="/index/index/newslist">活动列表</a></li>
    <li><a href="/index/index/apply">学分申请</a></li>
        <li><a href="/index/index/edit">修改密码</a></li>
        <li><a href="http://huihua.hebtu.edu.cn/">汇华首页</a></li>
    </ul>
    <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
      </div>
    </form>
  </div>
</nav>

<hr>

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
<div class="am-u-md-4 am-u-sm-12 blog-sidebar ">
		<div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>登录</span></h2>
            <p>

				<?php if(empty(\think\Session::get('userinfo')) || ((\think\Session::get('userinfo') instanceof \think\Collection || \think\Session::get('userinfo') instanceof \think\Paginator ) && \think\Session::get('userinfo')->isEmpty())): ?>
				<form class="am-form" action="/index/index/cheakuser" method="post" id="log-form">
				  <div class="am-input-group am-radius">       
					<input type="text" name="username" id="doc-vld-text-2-1" class="am-radius" data-validation-message="请输入学分制系统账号" placeholder="账号" required/>
					<span class="am-input-group-label am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
				  </div>      
				  <br>
				  <div class="am-input-group log-animation-delay">       
					<input type="password" name="password" class="am-form-field am-radius log-input" placeholder="密码" minlength="6" required>
					<span class="am-input-group-label am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
				  </div>      
				  <br>
				  <button type="submit" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius log-animation-delay">登 录</button>
				</form>
				<?php else: ?>
				<form class="am-form" action="/index/index/quit" method="post" id="log-form">
					<div class="am-input-group am-radius">       
					学号：<?php echo \think\Session::get('userinfo')['schoolnum']; ?>

				  </div>      
				  <br>

				  <div class="am-input-group log-animation-delay">
					姓名：<?php echo \think\Session::get('userinfo')['name']; ?>

				</div>
					<br>
					<div class="am-input-group log-animation-delay">
						行政班：<?php echo \think\Session::get('userinfo')['cname']; ?>

					</div>
					<br><a class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius log-animation-delay" href="/index/index/personal.html">个人中心</a>
					<button type="submit" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius log-animation-delay">注 销</button>
				</form>
				<?php endif; ?>
                
            </p>
        </div>

		<div class="blog-sidebar-widget blog-bor am-hide-sm-only">
            <h2 class="blog-text-center blog-title"><span>往期回顾</span></h2>
            <!-- banner start -->
<div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-article-margin">
      <div data-am-widget="slider" class="am-slider am-slider-d1" data-am-slider='{"controlNav":false}' >
  <ul class="am-slides">
	<?php if(is_array($slider) || $slider instanceof \think\Collection || $slider instanceof \think\Paginator): $i = 0; $__LIST__ = $slider;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
			<li>

				<div class="am-slider-desc"><h2 class="am-slider-title"><?php echo $data['title']; ?></h2><a class="am-slider-more">了解更多</a></div>
         
			</li>
	<?php endforeach; endif; else: echo "" ;endif; ?>
     
  </ul>
</div>
</div>
<!-- banner end -->

		</div>
		<div class="blog-sidebar-widget blog-bor am-hide-sm-only">
            <h2 class="blog-title"><span>文件下载</span></h2>
            <ul class="am-list">
                <li><a href="#">文件下载1</a></li>
                <li><a href="#">文件下载1</a></li>
                <li><a href="#">文件下载1</a></li>
                <li><a href="#">文件下载1</a></li>
            </ul>
        </div>
</div>


    <div class="am-u-md-8 am-u-sm-12">
		<?php if(is_array($actinfo) || $actinfo instanceof \think\Collection || $actinfo instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($actinfo) ? array_slice($actinfo,0,4, true) : $actinfo->slice(0,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>

		<article class="am-g blog-entry-article">
            <div class="am-u-lg-5 am-u-md-12 am-u-sm-12 blog-entry-img">
				<?php if(empty($data['image']) || (($data['image'] instanceof \think\Collection || $data['image'] instanceof \think\Paginator ) && $data['image']->isEmpty())): ?>
				<img src="/static/images/defult.png" alt="" class="am-u-sm-12">
				<?php else: ?>
				<img src="<?php echo $data['image']; ?>" alt="" class="am-u-sm-12">

				<?php endif; ?>
            </div>
            <div class="am-u-lg-7 am-u-md-12 am-u-sm-12 blog-entry-text">
                
                <h1><a href="/index/index/news/id/<?php echo $data['id']; ?>.html"><?php echo $data['title']; ?></a></h1>
				<span>活动时间：<?php echo $data['time']; ?></span><br>
				<span>活动地点：<?php echo $data['place']; ?></span><br>
				<span>主讲人：<?php echo $data['leader']; ?></span>
				<p></p>
            </div>
        </article>
		<?php endforeach; endif; else: echo "" ;endif; ?>
    </div>



</div>
<!-- content end -->
<footer class="blog-footer">  
    <div class="content_box"  style="background-color:#696969; both;margin: 0 auto;">

<div  class="content_w" style="text-align:center;padding:10px;color:#fff;clear: both;margin: 0 auto;width: 1004px;">
学校地址：石家庄市红旗大街469号&nbsp;邮政编码：050091<br>联系电话：0311—80785888(办公)&nbsp;0311—80785999(传真)<br>Copyright 2001-2019&nbsp;版权所有：河北师范大学汇华学院
    </div>
	</div>	    
</footer>

</body>
</html>
