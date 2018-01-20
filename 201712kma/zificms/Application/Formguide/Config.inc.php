<?php

// +----------------------------------------------------------------------
// | LvyeCMS 搜索模块配置
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.lvyecms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 旅烨 <admin@lvyecms.com>
// +----------------------------------------------------------------------
return array(
    //模块名称
    'modulename' => '表单',
    //图标
    'icon' => 'http://www.lvyecms.com/d/file/content/2016/09/57e53d19a8223.png',
    //模块简介
    'introduce' => '自定义信息表单，用于收集个例信息！',
    //模块介绍地址
    'address' => 'http://www.lvyecms.com',
    //模块作者
    'author' => 'Alvye',
    //作者地址
    'authorsite' => 'http://www.lvyecms.com',
    //作者邮箱
    'authoremail' => 'admin@lvyecms.com',
    //版本号，请不要带除数字外的其他字符
    'version' => '1.0.1',
    //适配最低ShuipFCMS版本，
    'adaptation' => '2.0.0',
    //签名
    'sign' => 'b19cc279ed484c13c96c2f7142e2f437',
    //依赖模块
    'depend' => array('Content'),
    //行为注册
    'tags' => array(),
    //缓存，格式：缓存key=>array('module','model','action')
    'cache' => array(
        'Model_form' => array(
            'name' => '自定义表单模型',
            'model' => 'Formguide',
            'action' => 'formguide_cache',
        ),
    ),
);
