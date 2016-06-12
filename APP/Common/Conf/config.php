<?php
return array(
	//'配置项'=>'配置值'
	
	'DB_TYPE' =>'mysql',
	'DB_HOST' =>'127.0.0.1',
	'DB_NAME' =>'blog',
	'DB_USER' => 'root',
	'DB_PWD' =>'',
	'DB_PREFIX' =>'hd_',
	// 'DB_SQL_LOG' => TRUE,
	// 'SHOW_PAGE_TRACE' => TRUE,
	// 
	//注册自己的命名空间
	'AUTOLOAD_NAMESPACE' => array(
		'Myclass' => APP_PATH.'/Myclass',
		),
	'URL_MODEL' => 2,	//去掉U方法生成地址中的index.php
	'URL_ROUTER_ON' => TRUE,
	'URL_ROUTE_RULES' => array(
		'/^c_(\d+)$/' =>'Home/List/index?id=:1', //栏目路由 c_xx的方式
		':id\d' => 'Home/Show/index', //文章路由 xx的方式
		),

);