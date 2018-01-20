<?php

return array(
    array(
        //父菜单ID，NULL或者不写系统默认，0为顶级菜单
        "parentid" => NULL,
        //地址，[模块/]控制器/方法
        "route" => "Special/Special/index",
        //类型，1：权限认证+菜单，0：只作为菜单
        "type" => 0,
        //状态，1是显示，0不显示（需要参数的，建议不显示，例如编辑,删除等操作）
        "status" => 1,
        //名称
        "name" => "专题管理",
        //备注
        "remark" => "专题管理！",
        //子菜单列表
        "child" => array(
            array(
                "route" => "Special/Special/add",
                "type" => 1,
                "status" => 1,
                "name" => "添加专题",
            ),
            array(
                "route" => "Special/Special/edit",
                "type" => 1,
                "status" => 0,
                "name" => "修改专题",
            ),
            array(
                "route" => "Special/Special/delete",
                "type" => 1,
                "status" => 0,
                "name" => "删除专题",
            ),
            array(
                "route" => "Special/Special/recommend",
                "type" => 1,
                "status" => 0,
                "name" => "推荐专题",
            ),
            array(
                "route" => "Special/Special/listorder",
                "type" => 1,
                "status" => 0,
                "name" => "专题排序",
            ),
            array(
                "route" => "Special/Special/html",
                "type" => 1,
                "status" => 0,
                "name" => "专题生成",
            ),
        ),
    ),
);
