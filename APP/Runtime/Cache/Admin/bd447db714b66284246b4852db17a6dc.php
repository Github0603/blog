<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>修改属性</title>
	<link rel="stylesheet" href="/blog/APP/admin/PUBLIC/Css/public.css" />
</head>
<body>
	<form action="<?php echo U(MODULE_NAME.'/Attribute/handleModify',array('id'=>$id));?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">添加属性</th>
			</tr>
			<tr>
				<td align="right">属性名：</td>
				<td>
					<input type="text" name="name" value="<?php echo ($attr["name"]); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">属性颜色：</td>
				<td>
					<input type="text" name="color" value="<?php echo ($attr["color"]); ?>" />
				</td>
			</tr>
		</table>
		<input type="submit" value="保存提交" style="display:block;width:100px;height:24px;margin:10px auto;" />
	</form>
</body>
</html>