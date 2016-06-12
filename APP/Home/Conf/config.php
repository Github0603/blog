<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' =>array(
		'__PUBLIC__' => __ROOT__.'/'.APP_NAME.'/'.'Home/Public',
		),
	'TAGLIB_PRE_LOAD'=>'Home\\TagLib\\My',
	'TAGLIB_BUILD_IN' => 'Cx,Home\\TagLib\\My',
		// 'APP_AUTOLOAD_PATH' => '@.TagLib',
	
	//开启静态缓存
	'HTML_CACHE_ON' => true,
	'HTML_CACHE_RULES' => array(
		'Show:index' => array('{:controller}_{:action}_{id}',3600),
		),

	// 'DATA_CACHE_TYPE' => 'Memcache',
	// 'MEMCACHED_HOST' => '127.0.0.1',
	// 'MEMCACHED_PORT' => 11211,

);