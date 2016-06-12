<?php if (!defined('THINK_PATH')) exit();?><dl>
	<dt>最热博文</dt>
	<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><dd><a href="<?php echo U('/'.$v['id']);?>"><?php echo ($v["title"]); ?>(<script type="text/javascript" src="<?php echo U(MODULE_NAME.'/Show/getNum',array('id'=>$v['id']));?>"></script>)</a></dd><?php endforeach; endif; ?>
</dl>