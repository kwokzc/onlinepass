<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件




/**
 * 公共函数
 */

// 用于PHP返回给JS数据的函数，注意需要JSON解码
function show($status,$message,$data=array()){
	$result = array(
		'status' => $status,
		'message' => $message,
		'data' => $data,
		);
	exit(json_encode($result));
}