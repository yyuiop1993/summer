<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 专题
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Special\Controller;

use Common\Controller\Base;

class IndexController extends Base {

    protected $special = NULL;

    //初始化
    protected function _initialize() {
        parent::_initialize();
        $this->special = D('Special/Special');
    }

    /**
     * 更新专题首页
     * @param $specialid 专题ID
     * @param $page 页码，默认1
     */
    public function index() {
        $specialid = I('get.id', 0, 'intval');
        if (empty($specialid)) {
            $this->error('该专题不存在！');
        }
        $page = max(I('get.' . C("VAR_PAGE"), 0, 'intval'), 1);
        //取得专题数据
        $specialInfo = $this->special->where(array('id' => $specialid, 'disabled' => 1))->find();
        if (empty($specialInfo)) {
            $this->error('该专题不存在！');
        }
        //模板处理
        $tp = explode(".", $specialInfo['index_template']);
        $template = "Index/" . $tp[0];
        $SEO = seo("", $specialInfo['title'], $specialInfo['description'], $specialInfo['keywords']);
        //生成路径
        $urls = $this->SpecialUrl->index($specialInfo, $page);
        //获取URL规则
        $GLOBALS['URLRULE'] = $urls['page'];
        //把分页分配到模板
        $this->assign(C("VAR_PAGE"), $page);
        //seo分配到模板
        $this->assign('SEO', $SEO);
        $this->assign('specialid', $specialInfo['id']);
        unset($specialInfo['filename']);
        $this->assign($specialInfo);
        $this->display($template);
    }

    /**
     * 生成专题分类列表
     * @param type $typeid 专题ID
     */
    public function type() {
        $typeid = I('get.typeid', 0, 'intval');
        if (empty($typeid)) {
            $this->error('分类ID不能为空！');
        }
        $page = max(I('get.' . C("VAR_PAGE"), 0, 'intval'), 1);
        //获取分类信息
        $info = D('Special/SpecialType')->where(array('typeid' => $typeid))->find();
        //获取专题
        $special = $this->special->where(array('id' => $info['parentid']))->find();
        //取得类别模板
        if ($special['list_template']) {
            $tpar = explode(".", $special['list_template'], 2);
            $template = "List/" . $tpar[0];
        } else {
            $template = "List/list";
        }
        $type_url = $this->SpecialUrl->type($info, $special, $page);
        //取得URL规则
        $urls = $type_url['page'];
        $GLOBALS['URLRULE'] = $urls;

        //把分页分配到模板
        $this->assign(C("VAR_PAGE"), $page);
        //把类别数据和专题数据分配到模板
        $this->assign($info);
        $this->assign('special', $special);
        //当前专题ID
        $this->assign('specialid', $special['id']);
        //seo分配到模板
        $seo = seo('', $info['name'] . ' - ' . $special['title'], $special['description'], $special['keywords']);
        $this->assign("SEO", $seo);
        $this->display($template);
    }

    /**
     * 生成内容页
     * @param  $data 数据
     * @param  $array_merge 是否合并
     * @param  $action 方法
     */
    public function shows() {
        $id = I('get.id', 0, 'intval');
        if (empty($id)) {
            $this->error('请指定需要生成的信息！');
        }
        $page = max(I('get.' . C("VAR_PAGE"), 0, 'intval'), 1);
        //查询内容
        $info = D('SpecialContent')->where(array('id' => $id))->find();
        if (empty($info)) {
            $this->error('该信息不存在！');
        }
        //转向地址不需要生成
        if ($info['islink']) {
            redirect($info['url']);
            return true;
        }

        //专题ID
        $specialid = (int) $info['specialid'];
        //获取专题
        $special = D('Special')->where(array('id' => $specialid))->find();

        $seo = seo(0, $info['title'], $info['description'], $info['keywords']);

        //内容页模板
        if ($special['show_template']) {
            //去除模板文件后缀
            $newstempid = explode(".", $special['show_template']);
            $template = $newstempid[0];
            unset($newstempid);
        } else {
            $template = "show";
        }
        //检测模板是否存在、不存在使用默认！
        $template = "Show/{$template}";
        //分配解析后的文章数据到模板 
        $this->assign($info);
        //seo分配到模板
        $this->assign("SEO", $seo);
        //专题ID
        $this->assign("specialid", $specialid);
        //专题信息分配到模板
        $this->assign('special', $special);
        $pageurl = array();
        //分页生成处理 手动分页
        $CONTENT_POS = strpos($info['content'], '[page]');
        if ($CONTENT_POS !== false) {
            $contents = array_filter(explode('[page]', $output_data['content']));
            $pagenumber = count($contents);
            $pages = page($pagenumber, 1, $page, 6, C("VAR_PAGE"), $urlrules['page'], true)->show("default");
            //判断[page]出现的位置是否在第一位 
            if ($CONTENT_POS < 7) {
                $content = $contents[$page];
            } else {
                $content = $contents[$page - 1];
            }
            //分页
            $this->assign("pages", $pages);
            $this->assign("content", $content);
        } else {
            $this->assign("content", $info['content']);
        }
        $this->assign(C("VAR_PAGE"), $page);
        //生成路径
        $category_url = $this->SpecialUrl->show($info, $special);
        $GLOBALS['URLRULE'] = implode("~", $category_url['page']);
        $this->display($template);
    }

}
