<?php

// +----------------------------------------------------------------------
// | lvyecms  3G手机版配置
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.lvyecms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 旅烨 <admin@lvyecms.cn>
// +----------------------------------------------------------------------
return array(
    //模块名称
    'modulename' => 'WAP手机版',
    //图标
    'icon' => 'http://www.lvyecms.com/d/file/content/2016/09/57e54489501cf.png',
    //模块简介
    'introduce' => 'WAP手机版！',
    //模块介绍地址
    'address' => 'http://www.lvyecms.com',
    //模块作者
    'author' => '随风',
    //作者地址
    'authorsite' => 'http://www.lvyecms.com',
    //作者邮箱
    'authoremail' => 'admin@lvyecms.com',
    //版本号，请不要带除数字外的其他字符
    'version' => '1.0.2',
    //适配最低lvyecms版本，
    'adaptation' => '2.0.0',
    //签名
    'sign' => '4B7B06DA1101821D6AAE4B51BC96E6AF',
    //依赖模块
    'depend' => array('Content'),
    //行为注册
    'tags' => array(
        'app_begin' => array(
            'title' => '应用开始标签位',
            'remark' => '应用开始标签位',
            'type' => 1,
            'phpfile:WapBehavior|module:Wap',
        ),
    ),
    //缓存，格式：缓存key=>array('module','model','action')
    'cache' => array(),
);
