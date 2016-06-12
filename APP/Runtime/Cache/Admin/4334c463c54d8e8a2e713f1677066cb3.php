<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>验证码配置</title>
	<link rel="stylesheet" href="/blog/APP/admin/PUBLIC/Css/public.css" />
</head>
<body>
	<form action="<?php echo U(MODULE_NAME.'/System/updateVerify');?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">验证码配置</th>
			</tr>
			<tr>
				<td align="right">验证码长度：</td>
				<td>
					<input type="text" name="length" value="<?php echo ($verify["length"]); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">验证码字体大小</td>
				<td>
					<input type="text" name="fontSize" value="<?php echo ($verify["fontsize"]); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">是否画混淆曲线</td>
				<td>
					<select name="useCurve" >
					<?php if($verify["usecurve"]): ?><option value="1" selected="selected">是</option>
						<option value="0">否</option>
					<?php else: ?>
						<option value="1" >是</option>
						<option value="0" selected="selected">否</option><?php endif; ?>

					</select>
				</td>
			</tr>
			<tr>
				<td align="right">是否添加杂点</td>
				<td>
					<select name="useNoise" >
					<?php if($verify["usenoise"]): ?><option value="1" selected="selected">是</option>
						<option value="0">否</option>
					<?php else: ?>
						<option value="1">是</option>
						<option value="0" selected="selected">否</option><?php endif; ?>
					</select>
				</td>
			</tr>
			<input type="hidden" name="id" value="<?php echo ($verify["id"]); ?>" />
		</table>
		<input type="submit" value="保存修改" style="display: block;width: 100px;height:24px;margin:10px auto;" />
	</form>
</body>
</html>