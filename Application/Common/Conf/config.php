<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => '127.0.0.1', // 服务器地址
    'DB_NAME'               => 'tp_downlist',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => 'root',          // 密码
    'DB_PREFIX'             => 'tp_',    // 数据库表前缀
    // /* SESSION 和 COOKIE 配置 */
    // 'SESSION_PREFIX' => 'crm_1', //ssion前缀
    // 'COOKIE_PREFIX'  => 'crm_1_', // Cookie前缀 避免冲突

    'SHOW_PAGE_TRACE' =>false,//调试页面Trace
    'URL_CASE_INSENSITIVE'  =>  true,  //URL地址不区分大小写
    //类库
    'AUTOLOAD_NAMESPACE' => array( 
       'Lib'     => APP_PATH.'Lib',
       ),
    //模板相关配置
	'TMPL_PARSE_STRING'=>array(
	'__Public__' => __ROOT__.'/Public',
	'__Css__' => __ROOT__.'/Public/css',
	'__Js__' => __ROOT__.'/Public/js',
	'__Image__'=>__ROOT__.'/Public/image'
	),
);
?>