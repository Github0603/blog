<?php
namespace Home\Controller;
use Think\Controller;
use Myclass\Category;

class ShowController extends Controller {
    public function index(){
    	$id = I('id','','intval'); //获取传过来的博文id值
    	
    	$fields = array('id','title','time','content','cid');	//要查询的字段
    	$blog = M('blog')->field($fields)->find($id);	//获取博文信息
    	$blog['content'] = html_entity_decode($blog['content']);	//将博文content进行html实体转码
    	$cid = $blog['cid'];	//获取此博文的分类id
    	$cate = M('cate')->order('sort')->select();		//获取所有的分类项
    	$this->parent = Category::getParents($cate,$cid); 	//递归组合获取此cid的所有父cid
    	// p($this->parent);die;
    	// p($blog);die;
    	$this->blog = $blog; 	//分配变量到前台模板
        $this->display();	//调用显示前台模板
    }



    public function getNumAndInc(){
    	$id = I('id','','intval');
    	//获取click值
		$this->getNum($id);
    	 //让点击次数+1
    	$this->numInc($id);

    }


    //点击次数+1
    public function numInc($id){
    	$where = array('id' => $id);
    	M('blog')->where($where)->setInc('click',1);
    }

    //根据博文id获取它的点击次数
    public function getNum($id){
    	$where = array('id' => $id);
    	$click = M('blog')->where($where)->getField('click');
    	echo "document.write(".$click.")";
    }
}