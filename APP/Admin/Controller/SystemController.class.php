<?php 
namespace Admin\Controller;
use Think\Controller;

class SystemController extends CommonController{
	//显示修改验证码配置页
	public function verify(){
		$db = M('verify');
		$verify = $db->find();
		// p($verify);die;
		$this->verify = $verify;
		$this->display();
	}

	//配置验证码处理
	public function updateVerify(){
		// p(I("post."));die;
		$data = array(
			'id' => I('id'),
			'length' => I('length'),
			'fontSize' => I('fontSize'),
			'useCurve' =>I('useCurve',1,'intval'),
			'useNoise' => I('useNoise',1,'intval')
			);
		// p($data);die;
		if(M('verify')->save($data)){
			$this->success('修改成功',U(MODULE_NAME.'/System/verify'));
		}else{
			$this->error('修改失败');
		}
	}

	//友情链接列表
	public function url(){
		$this->url = M('url')->select();

		$this->display();
	}


	//新增友情链接表单
	public function addUrl(){
		// p("1111");
		$this->display();
	}

	//处理 新增友情链接表单
	public function handleAddUrl(){
		$data = array(
			'name' => I('name'),
			'url' => I('url'),
			);
		if(M('url')->add($data)){
			$this->success('添加成功',U(MODULE_NAME.'/System/url'));
		}else{
			$this->error('添加失败');
		}
	}

	//删除友情链接
	public function delete(){
		$id = I('id','','intval');
		if(M('url')->delete($id)){
			$this->success('删除成功',U(MODULE_NAME.'/System/url'));
		}else{
			$this->error('删除失败');
		}
	}

	//修改友情链接
	public function modify(){
		$id = I('id','','intval');
		$this->url = M('url')->where(array('id'=>$id))->find();
		$this->display();
	}

	//处理 修改友情链接表单
	public function handleModify(){

		$data = array(
			'id' =>I('get.id'),
			'name' => I('name'),
			'url' => I('url')
			);
		if(M('url')->save($data)){
			$this->success('修改成功',U(MODULE_NAME.'/System/url'));
		}else{
			$this->error('修改失败');
		}
	}






}
 ?>