<?php if (!defined('THINK_PATH')) exit();?><dl>
	<dt>最新博文</dt>
	<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><dd><a href="<?php echo U('/'.$v['id']);?>"><?php echo ($v["title"]); ?>(<?php echo (date('m/d',$v["time"])); ?>)</a></dd><?php endforeach; endif; ?>
</dl>