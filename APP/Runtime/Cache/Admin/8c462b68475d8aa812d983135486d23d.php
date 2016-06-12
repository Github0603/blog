<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>博文列表</title>
	<link rel="stylesheet" href="/blog/APP/admin/PUBLIC/Css/public.css" />
</head>
<body>
	<table class="table">
		<?php if(ACTION_NAME == 'trash'): ?><a href="<?php echo U(MODULE_NAME.'/Blog/clearTrash');?>"><span style=" display:block;width:100px;height:24px;line-height:24px;text-align:center;margin:5px 2px;background: #ccc;color:#fff;font-weight: bold;">清空回收站</span></a><?php endif; ?>
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>所属分类</th>
			<th>点击次数</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>

		<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["title"]); if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style="color:<?php echo ($value["color"]); ?>">[<?php echo ($value["name"]); ?>]</strong><?php endforeach; endif; ?>
				</td>
				<td><?php echo ($v["cateName"]); ?></td>
				<td><?php echo ($v["click"]); ?></td>
				<td><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
				<td>
				<?php if(ACTION_NAME == 'index'): ?><!-- 博客类别中显示的index -->
					[<a href="<?php echo U('Admin/Blog/edit',array('id'=>$v['id']));?>">修改</a>][<a href="<?php echo U('Admin/Blog/delToTrash',array('id'=>$v['id'],'del'=>1));?>">删除</a>]
				<?php else: ?>
				<!-- 回收站中显示的index模板 -->
					[<a href="<?php echo U('Admin/Blog/delToTrash',array('id'=>$v['id'],'del'=>0));?>">还原</a>][<a href="<?php echo U('Admin/Blog/delete',array('id'=>$v['id']));?>">删除</a>]<?php endif; ?>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>