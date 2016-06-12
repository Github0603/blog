<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加博文</title>
	<link rel="stylesheet" href="/blog/APP/admin/PUBLIC/Css/public.css" />
	<script src="/blog/APP/Umeditor/third-party/jquery.min.js"></script>
	<script type="text/javascript" src="/blog/APP/Umeditor/umeditor.config.js"></script>
	<script type="text/javascript" src="/blog/APP/Umeditor/umeditor.min.js"></script>
	<script src="/blog/APP/Umeditor/lang/zh-cn/zh-cn.js"></script>
	<link rel="stylesheet" href="/blog/APP/Umeditor/themes/default/css/umeditor.min.css" />
	<script type="text/javascript">
		window.UMEDITOR_HOME_URL = '/blog/APP/Umeditor/';
		window.onload = function(){
			window.UMEDITOR_CONFIG.initialFrameWidth = "98%";
			window.UMEDITOR_CONFIG.imageUrl = "<?php echo U('Admin/Blog/upload');?>";
			window.UMEDITOR_CONFIG.imagePath = "/blog/";
			window.UMEDITOR_CONFIG.textarea = 'content';
			UM.getEditor('content');
		}
	</script>
</head>
<body>
	<form action="<?php echo U(MODULE_NAME.'/Blog/handleAddBlog');?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">博文发布</td>
			</tr>
			<tr>
				<td width="10%">博文分类</td>
				<td>
					<select name="cid" >
						<option>请选择分类</option>
						<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>博文属性</td>
				<td>
					<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><input type="checkbox" name="aid[]" value="<?php echo ($v["id"]); ?>" /><?php echo ($v["name"]); ?>&nbsp;<?php endforeach; endif; ?>
				</td>
			</tr>
			<tr>
				<td>点击次数</td>
				<td>
					<input type="text" name="click" value="100" />
				</td>
			</tr>
			<tr>
				<td>博文标题</td>
				<td>
					<input type="text" name="title" />
				</td>
			</tr>
			<tr>
				<td>摘要</td>
				<td>
					<input type="text" name="summary" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div id="content"></div>
				</td>
			</tr>
		</table>
		<input type="submit" value="保存提交"  style="display:block;width:100px;height:24px;margin:10px auto;"/>
	</form>
</body>
</html>