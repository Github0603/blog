<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台首页控制器
 */
class IndexController extends CommonController {
	
    /**
	 * 首页视图
	 * @return [type] [description]
	 */
    public function index(){
        $this->display();
    }


    /**
     * 退出登录
     * @return [type] [description]
     */
    public function logout(){
    	session_unset();
    	session_destroy();
    	$this->redirect('Admin/Login/index');
    }
}