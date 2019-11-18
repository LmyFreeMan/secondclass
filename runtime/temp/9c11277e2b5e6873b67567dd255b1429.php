<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:77:"/www/wwwroot/secondclass/public/../application/index/view/index/newslist.html";i:1574005992;s:66:"/www/wwwroot/secondclass/application/index/view/common/common.html";i:1574008934;s:67:"/www/wwwroot/secondclass/application/index/view/common/include.html";i:1573996689;s:70:"/www/wwwroot/secondclass/application/index/view/common/nav-header.html";i:1574010013;s:66:"/www/wwwroot/secondclass/application/index/view/common/footer.html";i:1574006921;}*/ ?>
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



	<ol class="am-breadcrumb">
		<li><a href="/index/index/index" class="am-icon-home">首页</a></li>
		<li class="am-active"><a href="/index/index/newslist">活动列表</a></li>
	</ol>

    <div class="am-u-md-12 am-u-sm-12">

		<?php if(is_array($actinfo) || $actinfo instanceof \think\Collection || $actinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $actinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>

		<article class="am-g blog-entry-article">

            <div class="am-u-lg-3 am-u-md-12 am-u-sm-12 blog-entry-img">
                <img src="<?php echo $data['image']; ?>" alt="" class="am-u-sm-12">
            </div>


				<h1 ><a  href="/index/index/news/id/<?php echo $data['id']; ?>.html"><?php echo $data['title']; ?></a></h1>
				<span>活动时间：<?php echo $data['time']; ?></span><br><br>
				<span>活动地点：<?php echo $data['place']; ?></span>

        </article>
		<?php endforeach; endif; else: echo "" ;endif; ?>

<ul class="am-pagination am-pagination-centered">
	<li class="am-disabled" id="insertli"><a >&laquo;</a></li>
	<!--<li ><a >1</a></li>-->
	<li class="am-disabled"><a >&raquo;</a></li>

</ul>
	</div>
<script>



    $(document).ready(function(){
        $.post("/index/index/pagelist",{id:1},function(res){
            console.log(res)
			console.log($("ul"))
			var li='';

			if(res%5==0)
			{
			    console.log("dd");
			    for(var i=1;i<=res/5;i++)
                    li=li+'<li><a onclick="go(this);" href='+"/index/index/newslist/?id="+i+'>'+i+'</a></li>';
			}
			else
			{ for(var i=1;i<=res/5+1;i++)

                li=li+'<li><a onclick="go(this);" href='+"/index.php/index/index/newslist/?id="+i+'>'+i+'</a></li>';

			}
            console.log(li);
            $("li#insertli").after(li)

        })
    })
    function go(btn) {
		console.log(btn.innerHTML)
        $.post("/index.php/index/index/newslist",{id:btn.innerHTML},function(res){
            console.log(res)
        })


    }









</script>


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
