<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 专题内容管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Special\Controller;

use Common\Controller\AdminBase;

class ContentController extends AdminBase {

    //专题模型
    protected $special = NULL;
    //专题内容模型
    protected $content = NULL;
    //专题ID
    protected $specialid = 0;

    protected function _initialize() {
        parent::_initialize();
        $this->specialid = I('get.specialid', 0, 'intvaL');
        $this->content = D('SpecialContent');
    }

    //管理信息
    public function index() {
        if (empty($this->specialid)) {
            $this->error('请选择专题！');
        }
        //查询条件
        $where = array();
        $where['specialid'] = $this->specialid;

        //信息总数
        $count = $this->content->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->content->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("listorder" => "ASC", "id" => "DESC"))->select();

        //取得专题分类
        $SpecialType = D('SpecialType');
        $typeRs = $SpecialType->where(array('parentid' => $this->specialid))->select();
        $typeRs = $typeRs ? $typeRs : array();
        $types = array();
        foreach ($typeRs as $r) {
            $types[$r['typeid']] = $r['name'];
        }

        $this->assign('types', $types);
        $this->assign('data', $data);
        $this->assign("Page", $page->show());
        $this->assign('specialid', $this->specialid);
        $this->display();
    }

    //添加内容
    public function add() {
        if (IS_POST) {
            $info = $_POST['info'];
            //TOKEN_NAME
            $token = I('post.' . C('TOKEN_NAME'));
            $info[C('TOKEN_NAME')] = $token;
            if (false !== $this->content->addContent($info)) {
                $this->success("添加成功！");
            } else {
                $error = $this->content->getError();
                $this->error($error ? $error : '添加内容失败！');
            }
        } else {
            if (empty($this->specialid)) {
                $this->error('请选择专题！');
            }
            $this->special = D('Special');
            //查询出专题信息
            $info = $this->special->where(array('id' => $this->specialid))->find();
            //取得专题分类
            $SpecialType = D('SpecialType');
            $typeRs = $SpecialType->where(array('parentid' => $this->specialid))->select();
            $typeRs = $typeRs ? $typeRs : array();
            $types = array();
            foreach ($typeRs as $r) {
                $types[$r['typeid']] = $r['name'];
            }

            $this->assign('types', $types);
            $this->assign('special', $info);
            $this->assign('specialid', $this->specialid);
            $this->display();
        }
    }

    //编辑
    public function edit() {
        if (IS_POST) {
            $info = $_POST['info'];
            //TOKEN_NAME
            $token = I('post.' . C('TOKEN_NAME'));
            $info[C('TOKEN_NAME')] = $token;
            if (false !== $this->content->editContent($info)) {
                $this->success("修改成功！");
            } else {
                $error = $this->content->getError();
                $this->error($error ? $error : '修改内容失败！');
            }
        } else {
            $id = I('get.id', 0, 'intval');
            $info = $this->content->where(array('id' => $id))->find();
            if (empty($info)) {
                $this->error('该信息不存在！');
            }
            $this->special = D('Special');
            //查询出专题信息
            $specialInfo = $this->special->where(array('id' => $info['specialid']))->find();
            //取得专题分类
            $SpecialType = D('SpecialType');
            $typeRs = $SpecialType->where(array('parentid' => $info['specialid']))->select();
            $typeRs = $typeRs ? $typeRs : array();
            $types = array();
            foreach ($typeRs as $r) {
                $types[$r['typeid']] = $r['name'];
            }

            $this->assign('types', $types);
            $this->assign('special', $specialInfo);
            $this->assign('info', $info);
            $this->assign('id', $id);
            $this->assign('specialid', $info['specialid']);
            $this->display();
        }
    }

    //删除文章
    public function delete() {
        $ids = array();
        if (IS_POST) {
            $ids = I('post.ids', array(), 'intval');
        } else {
            $id = I('get.id', 0, 'intval');
            $ids[] = $id;
        }
        if (empty($ids)) {
            $this->error('请指定需要删除的文章！');
        }
        foreach ($ids as $id) {
            if ($id) {
                if ($this->content->delContent($id) == false) {
                    $error = $this->content->getError();
                    $this->error($error ? $error : '文章删除失败！');
                }
            }
        }
        $this->success('文章删除成功！');
    }

    //信息导入
    public function import() {
        if (IS_POST) {
            //专题ID
            $specialid = I('post.specialid', 0, 'intval');
            if (empty($specialid)) {
                $this->error('专题ID不能为空！');
            }
            //模型ID
            $modelid = I('post.modelid', 0, 'intvaL');
            //信息ID
            $ids = I('post.ids', array());
            //分类ID
            $typeid = I('post.typeid', 0, 'intval');
            if (empty($modelid)) {
                $this->error('模型ID不能为空！');
            }
            if (empty($ids)) {
                $this->error('信息为空！');
            }
            if (empty($typeid)) {
                $this->error('请选择导入分类！');
            }
            if ($this->content->import($specialid, $modelid, $typeid, $ids)) {
                $this->success('信息导入成功！<script>setCookie("refersh_time",1);setTimeout(function(){window.close();},1500)</script>');
            } else {
                $error = $this->content->getError();
                $this->error($error ? $error : '信息导入失败！');
            }
        } else {
            //模型ID
            $modelid = I('get.modelid', 0, 'intvaL');
            //栏目ID
            $catid = I('get.catid', 0, 'intval');
            //是否搜索
            $search = I('get.search');
            //条件
            $where = array(
                'status' => 99,
            );
            if ($catid) {
                $where['catid'] = $catid;
            }
            $catList = array();

            //取得模型数据
            $models = array();
            foreach (cache('Model') as $v) {
                if($v['type']){
                    continue;
                }
                if ($v['disabled'] == 0) {
                    $models[] = $v;
                }
            }
            if (!empty($search) && $modelid) {
                $catList = M('Category')->where(array('modelid' => $modelid, 'child' => 0))->order(array('listorder' => 'ASC'))->select();
                //添加开始时间
                $start_time = I('get.start_time');
                if (!empty($start_time)) {
                    $start_time = strtotime($start_time);
                    $where["inputtime"] = array("EGT", $start_time);
                }
                //添加结束时间
                $end_time = I('get.end_time');
                if (!empty($end_time)) {
                    $end_time = strtotime($end_time);
                    $where["inputtime"] = array("ELT", $end_time);
                }
                if ($end_time > 0 && $start_time > 0) {
                    $where['inputtime'] = array(array('EGT', $start_time), array('ELT', $end_time));
                }
                //搜索关键字
                $keyword = \Input::getVar(I('get.keyword'));
                if (!empty($keyword)) {
                    $where['title'] = array("LIKE", "%{$keyword}%");
                    $this->assign('keyword', $keyword);
                }
                $contentModel = \Content\Model\ContentModel::getInstance($modelid);
                $count = $contentModel->where($where)->count();
                $page = $this->page($count, 20);
                $data = $contentModel->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
                $this->assign("count", $count);
                $this->assign("data", $data);
                $this->assign("Page", $page->show('Admin'));
            }

            //取得专题分类
            $SpecialType = D('SpecialType');
            $typeRs = $SpecialType->where(array('parentid' => $this->specialid))->select();
            $typeRs = $typeRs ? $typeRs : array();
            $types = array();
            foreach ($typeRs as $r) {
                $types[$r['typeid']] = $r['name'];
            }

            $this->assign('types', $types);
            $this->assign("start_time", $start_time);
            $this->assign("end_time", $end_time);
            $this->assign("keyword", $keyword);
            $this->assign('catList', $catList);
            $this->assign('catid', $catid);
            $this->assign('modelid', $modelid);
            $this->assign("models", $models);
            $this->assign('specialid', $this->specialid);
            $this->display();
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
            $this->content->where(array('id' => $id))->save(array('listorder' => (int) $v));
        }
        $this->success('排序更新成功！');
    }

    //更新HTML
    public function html() {
        import("ORG.SpecialHtml", BASE_LIB_PATH);
        if (IS_POST) {
            $ids = I('post.ids');
            if (empty($ids)) {
                $this->error('请选择需要生成的信息！');
            }
            foreach ($ids as $id) {
                $SpecialHtml = get_instance_of('SpecialHtml');
                $SpecialHtml->show($id);
            }
            $this->success('页面生成完毕！');
        }
    }

}
