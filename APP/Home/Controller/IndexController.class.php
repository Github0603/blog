<?php
namespace Home\Controller;
use Think\Controller;
use Myclass\Category;
class IndexController extends Controller {
    public function index(){
    	//判断缓存是否存在，如果不存在则查询数据库
    	if(!$list = S('index_list')){

    		$list = M('cate')->where(array('pid' => 0))->field('id,name')->order('sort')->select();
	    	$cate = M('cate')->order('sort')->select();
	    	$db = M('blog');
	    	$fields = array('id','title','time');
	    	// p($list);die;
	    	// 
	    	foreach($list as $k => $v){
	    		
	    		$cids = Category::getChildsId($cate,$v['id']);
	    		$cids[] = $v['id'];

	    		// p($cids);
	    		$where = array('cid' => array('IN',$cids));
	    		$list[$k]['blog'] = $db->field($fields)->where($where)->order('time DESC')->limit(5)->select();
	    		
	    	}

	    	// p($list);die;
	    	//生成缓存
    		S('index_list',$list,10);
    	}
    	
    	
    	$this->topCate = $list;
        $this->display();
    }




}