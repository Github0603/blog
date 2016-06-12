<?php 
namespace Myclass;

class Category {

	//组合成一个一维数组
	static public function unlimitedForLevel($cate,$html="&nbsp;&nbsp;&nbsp;&nbsp;",$pid=0,$level=0){

			$data=array();
			foreach ($cate as $v) {
				if($v['pid']==$pid){
					$v['level']=$level+1;
					$v['html']=str_repeat($html, $level);
					$data[]=$v;
					$data = array_merge($data,self::unlimitedForLevel($cate,$html,$v['id'],$level+1));
				}
			}
			return $data;
	}


	//层层嵌套，组合成一个多维数组
	static public function unlimitedForLayer($cate,$pid=0){
		$data = array();
		foreach($cate as $v){
			if($v['pid']==$pid){
				$v['child']=self::unlimitedForLayer($cate,$v['id']);
				$data[] = $v;
			}
		}
		return $data;
	}


	//根据id查出它所有的父级
	static public function getParents($cate,$id){
		$data = array();
		foreach($cate as $v){
			if($v['id']==$id){
				$data[] = $v;
				$data = array_merge(self::getParents($cate,$v['pid']),$data);
			}
		}
		return $data;
	}

	//根据id查出它所有的父级ID
	static public function getParentsId($cate,$id){
		$data = array();
		foreach($cate as $v){
			if($v['id']==$id){
				$data[] = $v['id'];
				$data = array_merge(self::getParentsId($cate,$v['pid']),$data);
			}
		}
		return $data;
	}

	//传递一个父级分类ID返回所有子级分类ID
	static public function getChildsId($cate,$id){
		$data = array();
		foreach($cate as $v){
			if($v['pid'] == $id){
				$data[] = $v['id'];
				$data = array_merge(self::getChildsId($cate,$v['id']),$data);
			}
		}
		return $data;
	}



}
 ?>