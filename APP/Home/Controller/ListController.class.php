<?php
namespace Home\Controller;
use Think\Controller;
use Myclass\Category;
use Think\Page;

class ListController extends Controller {
    public function index(){
    	$id = I('id','','intval');	//获取传过来的id值 这个id值是cate表分类id 
    	// p($id);die;
    	$cate = M('cate')->order('sort')->select(); //从cate表取出所有分类
    	// p($cate);die;
    	$cids = Category::getChildsId($cate,$id); //进行递归组合，查找$id下的子分类id
    	$cids[] = $id;	//将自身id也放进去
    	$where = array('cid'=>array('IN',$cids));
    	//分页
    	$count = M('blog')->where($where)->count(); //计算要分页的总数
    	$page = new Page($count,3); //实例化分页类
    	$page->setConfig('theme','%HEADER% %NOW_PAGE% %UP_PAGE% %DOWN_PAGE% %LINK_PAGE% %END%');
    	//配置分页主题
    	$show = $page->show();//调用show方法，生成分页链接
    	$limit = $page->firstRow.','.$page->listRows; //组合limit条件
    	$this->blog = D('BlogView')->getAll($where,$limit); //视图模型查询，条件是 blog的cid 在 $cids里面
    	// p($show);die;
    	$this->page = $show; //将组合好的分页分配到模板

        $this->display();
    }
}