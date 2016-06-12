<?php 
namespace Admin\Controller;
use Think\Controller;
use Myclass\Category;
use Think\Upload;
use Think\Image;


class BlogController extends CommonController{



	//博文列表
	public function index(){

		$blog = D('BlogRelation')->getBlogs();
		// p($blog);
		$this->blog = $blog;
		$this->display();
	}

	//修改博文
	public function edit(){
		//博文分类
		$cate = M('cate')->order('sort')->select();
		$cate = Category::unlimitedForLevel($cate);
		// p($cate);
		$this->cate = $cate;

		//博文属性
		$attr = M('attr')->select();
		// p($attr);
		$this->attr = $attr;

		//博文信息
		$id = I('id','','intval');
		$this->id = $id;
		$blog = D('BlogRelation')->relation(true)->where(array('id'=>$id))->find();
		$blog['content'] = html_decode($blog['content']);
		// p($blog);die;
		$blog_attr = $blog['attr'];
		$attr_ids = array();
		foreach($blog_attr as $v){
			$attr_ids[]=$v['id'];
		}
		$this->attr_ids=$attr_ids;
		// p($blog);die;
		// $this->blog_attr;
		// p($blog_attr);die;
		$this->blog = $blog;

		$this->display();
	}


	//修改博文表单处理
	public function handleEdit(){
		// p(I('get.id'));die;
		$data = array(
			'title' => I('title'),
			'cid' => I('cid','','intval'),
			'content' => I('content'),
			'time' => time(),
			'click' => I('click','','intval'),
			);

		if(I('aid')){
			foreach(I('aid') as $v){
				$data['attr'][] = $v;
			}
		}

		$id = I('get.id','','intval');

		if(D('BlogRelation')->relation(true)->where(array('id'=>$id))->save($data)){
			$this->success('修改成功',U('Admin/Blog/index'));
		}else{
			$this->error('修改失败');
		}
	}


	//删除到回收站/还原
	public function delToTrash($del=1){
		$del = I('del','','intval');
		$msg = $del?'删除':'还原';
		$id =I('id','','intval');
		$update = array(
			'id' =>$id,
			'del' => $del
			);
		if(M('blog')->save($update)){
			$this->success($msg.'成功',U('Admin/Blog/index'));
		}else{
			$this->error($msg.'失败');
		}

	}

	//回收站
	public function trash(){
		$blog = D('BlogRelation')->getBlogs(1);
		// p($blog);
		$this->blog = $blog;
		$this->display('index');
	}

	//删除博文
	public function delete(){
		$id = I('id','','intval');
		if(D('BlogRelation')->relation('attr')->delete($id)){
			$this->success('删除成功',U('Admin/Blog/trash'));
		}else{
			$this->error('删除失败');
		}
	}

	//清空回收站
	public function clearTrash(){
		$ids = M('blog')->where(array('del'=>1))->field('id')->select();
		// p($ids);
		if(!$ids) $this->error('回收站是空的');
		foreach($ids as $v){
			D('BlogRelation')->relation('attr')->delete($v['id']);
		}
		$this->success('回收站已清空',U('Admin/Blog/trash'));
	}

	//添加博文视图
	public function addBlog(){
		//博文分类
		$cate = M('cate')->order('sort')->select();
		$this->cate = Category::unlimitedForLevel($cate);

		//博文属性
		$this->attr = M('attr')->select();

		//显示添加博文模板
		$this->display();
	}

	//添加博文表单处理
	public function handleAddBlog(){
		// p(I('post.'));

		$data = array(
			'title' => I('title'),
			'cid' => I('cid','','intval'),
			'summary' => I('summary'),
			'content' => I('content'),
			'time' => time(),
			'click' => I('click','','intval'),
			);

		if(I('aid')){
			foreach(I('aid') as $v){
				$data['attr'][] = $v;
			}
		}

		if(D('BlogRelation')->relation(true)->add($data)){
			$this->success('添加成功',U('Admin/Blog/index'));
		}else{
			$this->error('添加失败');
		}
		

	}

	//图片上传处理
	public function upload(){
		// 需要返回给浏览器的数据，要转成json格式
		// "originalName" => $this->oriName ,
  		// "name" => $this->fileName ,
  		//	"url" => $this->fullName ,
  		//	"size" => $this->fileSize ,
  		//	"type" => $this->fileType ,
  		//	"state" => $this->stateInfo
         
		$upload = new Upload();
		$upload->maxSize = '2000000';
		$upload->savePath = './Uploads/';
		$upload->rootPath = './';
		$upload->subName = array('date', 'Ymd');
		$upload->exts = array('gif','jpg','jpeg','bmp','png');
		$info = $upload->upload();

		// p($info);

		if($info){
			//获取相关信息
			$originalName = $info['upfile']['name'];
			$name = $info['upfile']['savename'];
			$url = $info['upfile']['savepath'].$name;
			$size = $info['upfile']['size'];
			$type = $info['upfile']['type'];
			//添加图片水印
			$img = new Image();
			$img->open($url)->water('./APP/Admin/Public/Images/logo.png',Image::IMAGE_WATER_NORTHWEST)->save($url);
			// p($img);
			//组合要返回的数组
			$data = array(
			'originalName' => $originalName,
			'name' => $name,
			'url' => $url,
			'size' => $size,
			'type' => $type,
			'state' => 'SUCCESS'
			);
		echo json_encode($data);
		}else{
			echo json_encode(array(
					'state' => $upload->getError()
				));
			
		}
		
	
	}




}
 ?>