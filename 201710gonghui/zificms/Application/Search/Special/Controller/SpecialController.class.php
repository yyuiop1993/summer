<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 专题管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Special\Controller;

use Common\Controller\AdminBase;

class SpecialController extends AdminBase {

    protected $special = NULL;
    //模板文件夹
    private $filepath;
    //专题首页模板
    private $index_template;
    //专题内容页模板
    private $show_template;
    //专题分类模板
    private $list_template;

    protected function _initialize() {
        parent::_initialize();
        $this->special = D('Special/Special');
        //取得当前内容模型模板存放目录
        $this->filepath = TEMPLATE_PATH . (empty(self::$Cache["Config"]['theme']) ? "Default" : self::$Cache["Config"]['theme']) . DIRECTORY_SEPARATOR . "Special" . DIRECTORY_SEPARATOR;
        //专题首页模板
        $this->index_template = str_replace($this->filepath . "Index" . DIRECTORY_SEPARATOR, "", glob($this->filepath . "Index" . DIRECTORY_SEPARATOR . 'index*'));
        //专题内容页模板
        $this->show_template = str_replace($this->filepath . "Show" . DIRECTORY_SEPARATOR, "", glob($this->filepath . "Show" . DIRECTORY_SEPARATOR . 'show*'));
        //专题分类模板
        $this->list_template = str_replace($this->filepath . "List" . DIRECTORY_SEPARATOR, "", glob($this->filepath . "List" . DIRECTORY_SEPARATOR . 'list*'));
    }

    //专题首页
    public function index() {
        $this->basePage($this->special);
    }

    //添加专题
    public function add() {
        if (IS_POST) {
            $special = I('post.special');
            //TOKEN_NAME
            $token = I('post.' . C('TOKEN_NAME'));
            $special[C('TOKEN_NAME')] = $token;
            //分类
            $special['type'] = I('post.type', '', '');
            $id = $this->special->addSpecal($special);
            if ($id) {
                $this->success('专题添加成功！', U('Special/index'));
            } else {
                $error = $this->special->getError();
                $this->error($error ? $error : '专题添加失败！');
            }
        } else {
            $this->assign('index_template', $this->index_template);
            $this->assign('show_template', $this->show_template);
            $this->assign('list_template', $this->list_template);
            $this->display();
        }
    }

    //修改专题
    public function edit() {
        if (IS_POST) {
            $special = I('post.special');
            //TOKEN_NAME
            $token = I('post.' . C('TOKEN_NAME'));
            $special[C('TOKEN_NAME')] = $token;
            //分类
            $special['type'] = I('post.type', '', '');
            $where = array(
                'id' => $special['id'],
            );
            //取得专题信息
            $info = $this->special->where($where)->find();
            if (empty($info)) {
                $this->error('该专题不存在！');
            }
            if (false !== $this->special->editSpecial($special)) {
                $this->success('专题修改成功！', U('Special/index'));
            } else {
                $error = $this->special->getError();
                $this->error($error ? $error : '专题修改失败！');
            }
        } else {
            $specialid = I('get.specialid', 0, 'intval');
            if (empty($specialid)) {
                $this->error('请指定需要修改的专题！');
            }
            $where = array(
                'id' => $specialid,
            );
            //取得专题信息
            $info = $this->special->where($where)->find();
            if (empty($info)) {
                $this->error('该专题不存在！');
            }
            //取得专题分类数据
            $typeData = D('SpecialType')->where(array('parentid' => $specialid))->select();
            if (empty($typeData)) {
                $typeData = array();
            }
            $type = array();
            foreach ($typeData as $r) {
                $type[$r['typeid']] = $r;
            }
            //分类总数
            $typeCont = count($type);

            $this->assign('data', $info);
            $this->assign('type', $type);
            $this->assign('typecount', $typeCont);
            $this->assign('index_template', $this->index_template);
            $this->assign('show_template', $this->show_template);
            $this->assign('list_template', $this->list_template);
            $this->display();
        }
    }

    //删除专题
    public function delete() {
        $ids = array();
        if (IS_POST) {
            $ids = I('post.ids', array(), 'intval');
        } else {
            $specialid = I('get.specialid', 0, 'intval');
            $ids[] = $specialid;
        }
        if (empty($ids)) {
            $this->error('请指定需要删除的专题！');
        }
        foreach ($ids as $id) {
            if ($id) {
                if ($this->special->delSpecial($id) == false) {
                    $error = $this->special->getError();
                    $this->error($error ? $error : '专题删除失败！');
                }
            }
        }
        $this->success('专题删除成功！');
    }

    //推荐专题
    public function recommend() {
        $specialid = I('get.specialid', 0, 'intval');
        if (empty($specialid)) {
            $this->error('请指定需要推荐的专题！');
        }
        //专题信息
        $info = $this->special->where(array('id' => $specialid))->find();
        if (empty($info)) {
            $this->error('该专题不存在！');
        }
        if ($info['elite']) {
            if (false !== $this->special->where(array('id' => $specialid))->save(array('elite' => 0))) {
                $this->success('专题取消推荐成功！');
            } else {
                $this->error('操作失败！');
            }
        } else {
            if (false !== $this->special->where(array('id' => $specialid))->save(array('elite' => 1))) {
                $this->success('专题推荐成功！');
            } else {
                $this->error('操作失败！');
            }
        }
    }

    //排序
    public function listorder() {
        $listorders = $_POST['listorders'];
        $listorders = $listorders ? $listorders : array();
        if (empty($listorders)) {
            $this->error('没有排序数据！');
        }
        foreach ($listorders as $id => $v) {
            $this->special->where(array('id' => $id))->save(array('listorder' => (int) $v));
        }
        $this->success('排序更新成功！');
    }

    //生成html
    public function html() {
        if (IS_POST) {
            $ids = I('post.ids', array());
            if (empty($ids)) {
                $this->error('没有信息被选择！');
            }
            F('_special_html_' . \Admin\Service\User::getInstance()->id, $ids);
            $this->success('开始生成！', U('Special/html', array('act' => 'index')));
            exit;
        }
        $act = I('get.act');
        if ($act) {
            $spid = I('get.spid', 0);
            $ids = F('_special_html_' . \Admin\Service\User::getInstance()->id);
            if ($act == 'index') {
                if ($ids[$spid]) {
                    $specialid = $ids[$spid];
                    //生成首页
                    $this->SpecialHtml->index($specialid);
                    $this->assign("waitSecond", 200);
                    $this->success('专题ID：' . $specialid . ' 首页生成成功，接下来生成类别页！', U('Special/html', array('act' => 'type', 'spid' => $spid + 1, 'specialid' => $specialid)));
                    exit;
                } else {
                    $this->assign("waitSecond", 3000);
                    F('_special_html_' . \Admin\Service\User::getInstance()->id, NULL);
                    $this->success('生成完毕！', U('Special/index'));
                    exit;
                }
            } else if ($act == 'type') {
                $this->assign("waitSecond", 200);
                $specialid = I('get.specialid', 0);
                $spid = I('get.spid', 0);
                if ($specialid) {
                    //查询出分类
                    $SpecialType = D('SpecialType');
                    $typeid = $SpecialType->where(array('parentid' => $specialid))->getField('typeid', true);
                    if ($typeid) {
                        foreach ($typeid as $tid) {
                            $this->SpecialHtml->type($tid);
                        }
                    }
                    $this->success('专题分类生成完毕！', U('Special/html', array('act' => 'index', 'spid' => $spid)));
                    exit;
                } else {
                    $this->success('专题分类生成完毕！', U('Special/html', array('act' => 'index', 'spid' => $spid)));
                    exit;
                }
            }
        }
    }

}
