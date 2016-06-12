<?php 
namespace Admin\Model;
use Think\Model\RelationModel;

class BlogRelationModel extends RelationModel{
	protected $tableName = 'blog';
	protected $_link = array(
		'attr' =>array(
			'mapping_type' => self::MANY_TO_MANY,
			'mapping_name' => 'attr',
			'foreign_key' => 'bid',
			'relation_foreign_key' => 'aid',
			'relation_table' => 'hd_blog_attr',

			),
		'cate' =>array(
			'mapping_type' => self::BELONGS_TO,
			'foreign_key' => 'cid',
			'mapping_fields' =>'name',
			'as_fields' => 'name:cateName'
			)
		);

//获取博客
public function getBlogs($del = 0){
	$fields = array('content');
	return $this->where(array('del'=>$del))->field($fields,true)->relation(true)->select();
}



}
 ?>