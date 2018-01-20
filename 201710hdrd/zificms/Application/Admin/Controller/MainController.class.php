<?php

// +----------------------------------------------------------------------
// | LvyeCMS 后台框架首页
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.lvyecms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 旅烨集团 <web@alvye.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;

class MainController extends AdminBase {

    public function index() {
        //服务器信息
        $info = array(
            '当前域名' => $_SERVER['SERVER_NAME'],
            '操作系统' => PHP_OS,
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            '产品名称' => '<font color="#FF0000">' . SHUIPF_APPNAME . '</font>' . "&nbsp;&nbsp;&nbsp; [<a href='http://www.zhifengchina.cn' target='_blank'>访问官网</a>]",
            '上传附件限制' => ini_get('upload_max_filesize'),
            '执行时间限制' => ini_get('max_execution_time') . "秒",
            '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
        );

        $this->assign('server_info', $info);
        $this->display();
    }

    public function public_server() {
        $post = array(
            'domain' => $_SERVER['SERVER_NAME'],
        );
        $cache = S('_serverinfo');
        if (!empty($cache)) {
            $data = $cache;
        } else {
            $data = $this->Cloud->data($post)->act('get.serverinfo');
            S('_serverinfo', $data, 300);
        }
        if (!empty($_COOKIE['notice_' . $data['notice']['id']])) {
            $data['notice']['id'] = 0;
        }
        if (version_compare(SHUIPF_VERSION, $data['latestversion']['version'], '<')) {
            $data['latestversion'] = array(
                'status' => true,
                'version' => $data['latestversion'],
            );
        } else {
            $data['latestversion'] = array(
                'status' => false,
                'version' => $data['latestversion'],
            );
        }
        $this->ajaxReturn($data);
    }

}
