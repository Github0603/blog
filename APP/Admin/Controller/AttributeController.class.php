<?php 
namespace Admin\Controller;
use Think\Controller;


class AttributeController extends CommonController{

	//属性列表
	public function index(){
		$this->attr = M('attr')->select();
		$this->display();
	}

	//添加属性视图
	public function addAttr(){
		$this->display();
	}

	//添加属性表单处理
	public function handleAddAttr(){
		// p(I('post.'));
		if(M('attr')->add(I('post.'))){
			$this->success('添加成功',U(MODULE_NAME.'/Attribute/index'));
		}else{
			$this->error('添加失败');
		}
	}

	//删除属性
	public function delete(){
		$id = I('id','','intval');
		if(M('attr')->delete($id)){
			$this->success('删除成功',U(MODULE_NAME.'/Attribute/index'));
		}else{
			$this->error('删除失败');
		}
	}





	//修改属性视图
	public function modify(){
		$id = I('id','','intval');
		$this->attr = M('attr')->where(array('id'=>$id))->find();
		$this->id = $id;
		$this->display();

	}


	//处理修改属性表单
	public function handleModify(){

		$data = array(
			'id' => I('get.id','','intval'),
			'name' => I('name'),
			'color' => I('color')		
			);

		if(M('attr')->save($data)){
			$this->success('修改成功',U(MODULE_NAME.'/Attribute/index'));
		}else{
			$this->error('修改失败');
		}
	}













}
 ?>