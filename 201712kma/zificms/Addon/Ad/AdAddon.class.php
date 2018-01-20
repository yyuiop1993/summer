<?php
/**
 * 广告管理 插件
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */

namespace Addon\Ad;

use \Addons\Util\Addon;

class AdAddon extends Addon {

    //插件信息
    public $info = array(
        'name' => 'Ad',
        'title' => '广告管理',
        'description' => '一个基本的广告管理',
        'status' => 1,
        'author' => '缪汶臻',
        'version' => '1.0',
        'has_adminlist' => 1,
        'sign' => '0506d7a6edf46e871bc4e91494c300a2',
    );

    //有开启插件后台情况下，添加对应的控制器方法
    //也就是插件目录下 Action/AdminController.class.php中，public属性的方法！
    //每个方法都是一个数组形式，删除，修改类需要具体参数的，建议隐藏！
    public $adminlist = array(
        array(
            //方法名称
            "action" => "index",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //类型，1：权限认证+菜单，0：只作为菜单
            "type" =>1,
            //状态，1是显示，0是不显示
            "status" => 1,
            //名称
            "name" => "广告管理",
            //备注
            "remark" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "add",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //类型，1：权限认证+菜单，0：只作为菜单
            "type" => 0,
            //状态，1是显示，0是不显示
            "status" => 1,
            //名称
            "name" => "添加广告",
            //备注
            "remark" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "delete",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //类型，1：权限认证+菜单，0：只作为菜单
            "type" => 0,
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "name" => "删除广告",
            //备注
            "remark" => "",
            //排序
            "listorder" => 0,
        ),	
        array(
            //方法名称
            "action" => "edit",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //类型，1：权限认证+菜单，0：只作为菜单
            "type" => 0,
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "name" => "编辑广告",
            //备注
            "remark" => "",
            //排序
            "listorder" => 0,
        ),		
    );

    //安装
    public function install() {
        return true;
    }

    //卸载
    public function uninstall() {
        return true;
    }

    //实现行为 view_begin
    //$param 是行为传递过来的参数
    public function view_begin($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 view_parse
    //$param 是行为传递过来的参数
    public function view_parse($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 action_begin
    //$param 是行为传递过来的参数
    public function action_begin($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 action_name
    //$param 是行为传递过来的参数
    public function action_name($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 app_init
    //$param 是行为传递过来的参数
    public function app_init($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 app_begin
    //$param 是行为传递过来的参数
    public function app_begin($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 app_end
    //$param 是行为传递过来的参数
    public function app_end($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 appframe_rbac_init
    //$param 是行为传递过来的参数
    public function appframe_rbac_init($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 view_member_menu
    //$param 是行为传递过来的参数
    public function view_member_menu($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 content_edit_end
    //$param 是行为传递过来的参数
    public function content_edit_end($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 content_delete_end
    //$param 是行为传递过来的参数
    public function content_delete_end($param = NULL) {
        //具体的处理逻辑代码
    }

    //实现行为 content_add_begin
    //$param 是行为传递过来的参数
    public function content_add_begin($param = NULL) {
        //具体的处理逻辑代码
    }

}
