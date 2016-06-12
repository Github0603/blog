<?php 
namespace Home\Model;
use Think\Model\ViewModel;

class BlogViewModel extends ViewModel{

	protected $viewFields = array(
		'blog' => array(
			'id','title','click','summary','time',
			'_type'=>'LEFT'
			),
		'cate' => array(
			'name','_on'=> 'blog.cid = cate.id',
			),
		);


	public function getAll($where,$limit){
		return $this->where($where)->order('time DESC')->limit($limit)->select();
	}







}
 ?>