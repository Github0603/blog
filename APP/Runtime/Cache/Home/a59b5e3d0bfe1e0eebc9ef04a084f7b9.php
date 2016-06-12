<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/blog/APP/Home/Public/Css/common.css" />
	<script type="text/JavaScript" src='/blog/APP/Home/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/JavaScript" src='/blog/APP/Home/Public/Js/common.js'></script>
	<!-- -->
</head>
<body>

	<link rel="stylesheet" href="/blog/APP/Home/Public/Css/index.css" />
	
<!--头部-->
	<div class='top-list-wrap'>
		<div class='top-list'>
			<ul class='l-list'>
				<li><a href="http://www.thinkphp.cn" target='_blank'>ThinkPHP</a></li>
				<li><a href="http://www.imooc.com" target='_blank'>慕课网</a></li>
				<li><a href="http://www.bootcss.com" target='_blank'>Bootstrap</a></li>
			</ul>
			<ul class='r-list'>
				<li><a href="http://www.wooyun.org" target='_blank'>乌云</a></li>
				<li><a href="http://wiki.wooyun.org" target='_blank'>乌云WiKi</a></li>
			</ul>
		</div>
	</div>


	<div class='top-search-wrap'>
		<div class='top-search'>
			<a href="http://bbs.houdunwang.com" target='_blank' class='logo'>
				<img src="/blog/APP/Home/Public/Images/logo.png"/>
			</a>
			<div class='search-wrap'>
				<form action="<?php echo U(MODULE_NAME.'/Index/search/');?>" method='get'>
					<input type="text" name='keyword' class='search-content'/>
					<input type="submit" name='search' value='搜索'/>
				</form>
			</div>
		</div>
	</div>


	
	<div class='top-nav-wrap'>
		<ul class='nav-lv1'>
			<li class='nav-lv1-li'>
				<a href="/blog/" class='top-cate'>博客首页</a>
			</li>
					<?php
 $nav_cate = M('cate')->order("sort")->select(); $nav_category = new Myclass\Category(); $nav_cate = $nav_category::unlimitedForLayer($nav_cate); foreach($nav_cate as $v): ?>		<li class="nav-lv1-li">
					<a href="<?php echo U('/c_'.$v['id']);?>" class="top-cate"><?php echo ($v["name"]); ?></a>
					<ul>
						<?php if(is_array($v["child"])): foreach($v["child"] as $key=>$value): ?><li><a href="<?php echo U('/c_'.$value['id']);?>"><?php echo ($value["name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</li><?php endforeach;?>
		</ul>
	</div>

<!--主体-->
	<div class='main'>
		<div class='main-left'>
			<p>后盾博文</p>
				<?php if(is_array($topCate)): foreach($topCate as $key=>$v): ?><dl>
						<dt><?php echo ($v["name"]); ?><a href="<?php echo U('/c_'.$v['id']);?>">更多>></a></dt>
							<?php if(is_array($v["blog"])): foreach($v["blog"] as $key=>$value): ?><dd>
									<a href="<?php echo U('/'.$value['id']);?>" target="_blank"><?php echo ($value["title"]); ?></a>
									<span><?php echo (date('m/d',$value["time"])); ?></span>
								</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
				
			
		</div>
	<div class='main-right'>

	<!-- 热门博文 -->
	<?php echo W('Sidebar/hot');?>

	<!-- 最新博文 -->
	<?php echo W('Sidebar/newest');?>

	<!-- 友情链接 -->
	<?php echo W('Sidebar/url');?>
</div>
	</div>
	<div class='bottom'>
		<div></div>
	</div>
</body>
</html>