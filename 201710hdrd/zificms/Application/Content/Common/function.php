<?php

// +----------------------------------------------------------------------
// | LvyeCMS 内容模块自定义函数
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.lvyecms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 旅烨集团 <web@alvye.cn>
// +----------------------------------------------------------------------

 function hz_get_type($type){

 	if($type == 1){
 		return '主任信箱';
 	}elseif ($type == 2) {
 		return '意见建议';
 	}else{
 		return '未知';
 	}
 }

 function hz_get_status($type){

 	if($type == 1){
 		return '处理完成';
 	}else{
 		return '待处理';
 	}
 }