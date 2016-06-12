<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="/blog/APP/admin/PUBLIC/Css/public.css" />
	<title>修改友情链接</title>
</head>
<body>

	<form action="<?php echo U(MODULE_NAME.'/System/handleModify',array('id'=>$url['id']));?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">修改友情链接</th>
			</tr>
			<tr>
				<td align="right">链接名称：</td>
				<td>
					<input type="text" name="name" value="<?php echo ($url["name"]); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">链接地址：</td>
				<td>
					<input type="text" name="url" value="<?php echo ($url["url"]); ?>" />

				</td>
			</tr>
		</table>
		<input type="submit" value="保存" style="display: block;width: 100px;height:24px;margin:10px auto;" />
	</form>
</body>
</html>