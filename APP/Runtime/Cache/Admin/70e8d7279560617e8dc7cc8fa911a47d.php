<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>新增分类</title>
	<link rel="stylesheet" href="/blog/APP/admin/PUBLIC/Css/public.css" />
</head>
<body>
	<form action="<?php echo U(MODULE_NAME.'/Category/handleCate');?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">新增分类</th>
			</tr>
			<tr>
				<td align="right">分类名称：</td>
				<td>
					<input type="text" name="name"  />
				</td>
			</tr>
			<tr>
				<td align="right">排序：</td>
				<td>
					<input type="text" name="sort" value="100" />
				</td>
			</tr>
		</table>
		<input type="hidden" name="pid" value="<?php echo ($pid); ?>" />
		<input type="submit" value="保存添加" style="display: block;width:100px;height: 24px;margin:10px auto;" />
	</form>
</body>
</html>