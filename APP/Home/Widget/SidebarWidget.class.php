<?php 
namespace Home\Widget;
use Think\Controller;

class SidebarWidget extends Controller{
	//热门博文
	public function hot(){
		$fields = array('id','title','click');
		$this->blog = M('blog')->field($fields)->order('click DESC')->limit(5)->select();
		return $this->fetch('Sidebar:hot');
	
	}
	//最新博文
	public function newest(){
		$fields = array('id','title','time');
		$this->blog = M('blog')->field($fields)->order('time DESC')->limit(5)->select();
		return $this->fetch('Sidebar:newest');
	}


	//友情链接
	public function url(){
		$this->url = M('url')->select();
		return $this->fetch('Sidebar:url');
	}

	



}
 ?>