<?php 
namespace Admin\Controller;
use Think\Controller;
use Myclass\Category;

class CategoryController extends CommonController{

	//分类列表视图
	public function index(){
		$cate = M('cate')->order('sort')->select();
		$cate = Category::unlimitedForLevel($cate);
		// $id = M('cate')->where(array('id'=>'8'))->find();
		// echo $id;die;
		// $cate = Category::getParentsId($cate,'8');
		// p($cate);die;
		$this->cate = $cate;
		$this->display();
	}

	//添加分类视图
	public function addCate(){
		$pid = I('pid',0,'intval');
		$this->pid = $pid;
		$this->display();
	}

	//分类表单处理
	public function handleCate(){
		
		// p($pid);die;
		if(M('cate')->add(I('post.'))){
			$this->success('添加成功',U(MODULE_NAME.'/Category/index'));
		}else{
			$this->error('添加失败');
		}
	}


	//排序
	public function sortCate(){
		$data = I('post.');
		foreach ($data as $id => $sort) {
			M('cate')->where(array('id'=>$id))->setField('sort',$sort);
		}
		$this->redirect(MODULE_NAME.'/Category/index');
	}

	//删除分类
	public function delete(){
		$id = I('id','','intval');
		if(M('cate')->delete($id)){
			$this->success('删除成功',U(MODULE_NAME.'/Category/index'));
		}else{
			$this->error('删除失败');
		}
	}

	//修改分类视图
	public function modify(){
		$id = I('id','','intval');
		$this->cate = M('cate')->where(array('id'=>$id))->find();
		$this->id = $id;
		$this->display();

	}

	//处理修改分类表单
	public function handleModify(){
		$data = array(
			'id'=>I('get.id','','intval'),
			'name'=>I('name'),
			'sort'=>I('sort','','intval')
			);

		if(M('cate')->save($data)){
			$this->success('修改成功',U(MODULE_NAME.'/Category/index'));
		}else{
			$this->error('修改失败');
		}
	}

}
 ?>