<?php 
namespace Home\TagLib;
use Think\Template\TagLib;


class My extends TagLib{
	//自定义标签属性
	protected $tags = array(
		//nav是自定义标签的名称使用的时候<nav></nav>,attr是传入的属性,close指定标签是否闭合
		'nav' =>array('attr'=>'order','close'=>1),
		'hot' =>array('attr'=>'limit','close'=>1)
		);
	public function _nav($attr,$content){
		$order = $attr['order'];
		$str = <<<str
		<?php
			\$nav_cate = M('cate')->order("$order")->select();
			\$nav_category = new Myclass\Category();
			\$nav_cate = \$nav_category::unlimitedForLayer(\$nav_cate);
			foreach(\$nav_cate as \$v):
		?>		
str;

		$str .=$content;
		$str .="<?php endforeach;?>";
		return $str;
		
	}

	//自定义标签：hot 用来获取热门博文
	public function _hot($attr,$content){
		$limit = $attr['limit'];
		$str = "<?php ";
		$str .= "\$hot_blog = M('blog')->field(array('id','title','click'))->order('click DESC')->limit($limit)->select();";
		$str .= "foreach(\$hot_blog as \$v):";
		$str .= "?>";
		$str .= $content;
		$str .= "<?php endforeach; ?>";
		return $str;

	}







}
?>