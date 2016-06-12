<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="/blog/APP/admin/PUBLIC/Css/public.css" />
	<title>友情链接设置</title>
</head>
<body>
	<a href="<?php echo U(MODULE_NAME.'/System/addUrl');?>"><span style=" display:block;width:100px;height:24px;line-height:24px;text-align:center;margin:5px 2px;background: #ccc;color:#fff;font-weight: bold;">新增</span></a>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>链接名称</th>
			<th>链接地址</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($url)): foreach($url as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["url"]); ?></td>
				<td>[<a href="<?php echo U(MODULE_NAME.'/System/delete',array('id'=>$v['id']));?>">删除</a>][<a href="<?php echo U(MODULE_NAME.'/System/modify',array('id'=>$v['id']));?>">修改</a>]</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>