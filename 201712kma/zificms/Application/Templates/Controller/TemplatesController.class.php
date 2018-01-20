<?php

// +----------------------------------------------------------------------
// | LvyeCMS 模版商店
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.lvyecms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 旅烨集团 <web@alvye.cn>
// +----------------------------------------------------------------------

namespace Templates\Controller;

use Common\Controller\AdminBase;


class TemplatesController extends AdminBase{



	protected function _initialize() {
        parent::_initialize();
//        if (!isModuleInstall('Templates')) {
//            $this->error('你还没有安装插件模块，无法使用插件商店！');
//        }
    }

    //在线插件列表
    public function index() {
       echo 111;
    }
}