<?php 
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
/**
 * 后台登录控制器
 */

class LoginController extends Controller{
	//登录页面视图
	public function index(){
		$this->display();
	}

	/**
	 * 登录表单处理方法
	 * @return [type] [description]
	 */
	public function login(){
		//判读是否是表单提交
		if(!IS_POST) $this->redirect(MODULE_NAME.'/Login/index');
		//判断验证码是否正确
		$verify = new Verify();
		if(!$verify->check(I('code'))) $this->error('验证码错误');
		//从数据库中取数据
		$db = M('user');
		$user = $db->where(array('username'=>I('username')))->find();
		//验证用户名密码是否正确
		if(!$user||$user['password']!=I('password','','md5')) $this->error('用户名或密码错误');

		//更新user表的logintime和loginip
		$data = array(
			'id' => $user['id'],
			'logintime' => time(),
			'loginip' => get_client_ip()
			);
		$db->save($data);

		//验证通过，写session
		session('uid',$user['id']);
		session('uname',$user['username']);
		session('logintime',date('Y-m-d H:i:s',$user['logintime']));
		session('loginip',$user['loginip']);



		//跳转到后台管理首页
		$this->redirect(MODULE_NAME.'/Index/index');

	}

	public function verify(){
		$db = M('verify');
		$config = $db->field('id',true)->find();
		if($config){
			$verify = new Verify($config);
		}else{
			$verify = new Verify();
		}
		
		$verify->entry();
	
	}





}

 ?>