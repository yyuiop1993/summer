<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 专题模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Special\Model;

use Common\Model\Model;

class SpecialModel extends Model {

    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('title', 'require', '专题名称不能为空！', 1, 'regex', 3),
        array('title', '', '该专题名称已经存在！', 0, 'unique', 1),
        array('thumb', 'require', '专题缩略图不能为空！', 1, 'regex', 3),
        array('banner', 'require', '专题横幅不能为空！', 1, 'regex', 3),
        //是否生成静态
        // array('ishtml', 'require', '专题横幅不能为空！', 1, 'regex', 3),
        //是否启用分页
        //array('ispage', 'require', '专题横幅不能为空！', 1, 'regex', 3),
        array('filename', 'require', '专题生成目录不能为空！', 1, 'regex', 1),
        array('filename', '', '该专题生成目录已经存在！', 0, 'unique', 1),
        array('index_template', 'require', '专题模板不能为空！', 1, 'regex', 3),
        array('list_template', 'require', '专题分类模板不能为空！', 1, 'regex', 3),
        array('show_template', 'require', '专题内容页模板不能为空！', 1, 'regex', 3),
        array('username', 'require', '添加专题的用户名不能为空！', 1, 'regex', 1),
        array('userid', 'require', '添加专题的用户名ID不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        //array(填充字段,填充内容,填充条件,附加规则)
        array('createtime', 'time', 1, 'function'),
    );

    /**
     * 添加专题
     * @param type $data
     * @return boolean
     */
    public function addSpecal($data) {
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        //分类数据
        $type = $data['type'];
        if (empty($type)) {
            $this->error = '至少需要添加一个分类！';
            return false;
        }
        //添加用户信息
        $data['username'] = \Admin\Service\User::getInstance()->username;
        $data['userid'] = \Admin\Service\User::getInstance()->id;
        //数据验证
        $data = $this->create($data, 1);
        if ($data) {
            $id = $this->add($data);
            if ($id) {
                $data['id'] = $id;
                //更新附件状态，把相关附件和专题进行管理
                service("Attachment")->api_update('', 'special-' . $id, 1);
                if ($this->saveType($id, $type) == false) {
                    //删除专题
                    $this->where(array('id' => $id))->delete();
                    return false;
                }
                $url = ShuipFCMS()->SpecialUrl->index($data, 1);
                //更新专题地址
                $this->where(array('id' => $id))->save(array('url' => $url['url']));
                return $id;
            } else {
                $this->error = '入库失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 编辑专题
     * @param type $data 数据
     * @return boolean
     */
    public function editSpecial($data) {
        if (empty($data) || empty($data['id'])) {
            $this->error = '数据不能为空！';
            return false;
        }
        //专题ID
        $specialid = (int) $data['id'];
        unset($data['id']);
        //分类数据
        $type = $data['type'];
        if (empty($type)) {
            $this->error = '至少需要添加一个分类！';
            return false;
        }
        $data = $this->token(false)->create($data, 2);
        if ($data) {
            if (false !== $this->where(array('id' => $specialid))->save($data)) {
                //更新附件状态，把相关附件和专题进行管理
                service("Attachment")->api_update('', 'special-' . $specialid, 1);
                $info = $this->where(array('id' => $specialid))->find();
                $url = ShuipFCMS()->SpecialUrl->index($info, 1);
                //更新专题地址
                $this->where(array('id' => $specialid))->save(array('url' => $url['url']));
                if ($this->saveType($specialid, $type, 'edit') == false) {
                    return false;
                }
                return true;
            } else {
                $this->error = '专题更新失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 删除专题
     * @param type $speical
     * @return boolean
     */
    public function delSpecial($speical) {
        $speical = (int) $speical;
        if (empty($speical)) {
            $this->error = '请指定需要删除的专题！';
            return false;
        }
        //获取专题数据
        $info = $this->where(array('id' => $speical))->find();
        if (empty($info)) {
            return true;
        }
        $SpecialType = D('SpecialType');
        if ($info['ishtml']) {
            if (false !== $this->where(array('id' => $speical))->delete()) {
                //删除分类
                $SpecialType->delTypeByParentid($speical);
                //获取专题相关生成路径
                $url = ShuipFCMS()->SpecialUrl->index($info);
                //获取专题目录
                $speicalPath = SITE_PATH . str_replace(basename($url['path']), '', $url['path']);
                ShuipFCMS()->Dir->delDir($speicalPath);
                //删除附件
                service("Attachment")->api_delete('special-' . $speical);
                return true;
            } else {
                $this->error = '专题删除失败！';
                return false;
            }
        } else {
            if (false !== $this->where(array('id' => $speical))->delete()) {
                //删除分类
                $SpecialType->delTypeByParentid($speical);
                //删除附件
                service("Attachment")->api_delete('special-' . $speical);
                return true;
            } else {
                $this->error = '专题删除失败！';
                return false;
            }
        }
    }

    /**
     * 更新分类数据
     * @param type $specialid
     * @param type $type
     * @param type $act
     * @return boolean
     */
    public function saveType($specialid, $type, $act = 'add') {
        $specialid = (int) $specialid;
        if (empty($specialid)) {
            $this->error = '专题ID不能为空！';
            return false;
        }
        if (empty($type) || !is_array($type)) {
            $this->error = '专题分类数据错误！';
            return false;
        }
        //取得专题数据
        $special_info = $this->where(array('id' => $specialid))->find();
        if (empty($special_info)) {
            $this->error = '该专题不存在！';
            return false;
        }
        //专题类别模型
        $specialType = D('SpecialType');
        foreach ($type as $k => $v) {
            if (!$v['name'] || !$v['typedir'])
                continue;
            //添加时，无需判断直接加到数据表中，修改时应判断是否为新添加、修改还是删除
            if ($act == 'add' && !$v['del']) {
                $data = array(
                    'module' => 'special',
                    'name' => $v['name'],
                    'listorder' => $v['listorder'],
                    'typedir' => $v['typedir'],
                    'parentid' => $specialid,
                    'listorder' => $k
                );
                //添加分类
                $typeid = $specialType->addType($data);
                if (false == $typeid) {
                    return false;
                }
                $data['typeid'] = $typeid;
                //获取分类地址
                $url = ShuipFCMS()->SpecialUrl->type($data, $special_info, 1);
                //更新分类url
                $specialType->where(array('typeid' => $typeid))->save(array('url' => $url['url']));
            } elseif ($act == 'edit') {//编辑分类
                //当不存在typeid，表示新增部分，且不是删除项
                if ((!isset($v['typeid']) || empty($v['typeid'])) && (!isset($v['del']) || empty($v['del']))) {
                    //添加分类
                    $data = array(
                        'module' => 'special',
                        'name' => $v['name'],
                        'listorder' => $v['listorder'],
                        'typedir' => $v['typedir'],
                        'parentid' => $specialid,
                        'listorder' => $k
                    );
                    //添加分类
                    $typeid = $specialType->addType($data);
                    if (false == $typeid) {
                        return false;
                    }
                    $data['typeid'] = $typeid;
                    //获取分类地址
                    $url = ShuipFCMS()->SpecialUrl->type($data, $special_info, 1);
                    //更新分类url
                    $specialType->where(array('typeid' => $typeid))->save(array('url' => $url['url']));
                }
                //更新旧的分类
                if ((!isset($v['del']) || empty($v['del'])) && $v['typeid']) {
                    $data = array(
                        'name' => $v['name'],
                        'listorder' => $v['listorder'],
                        'typedir' => $v['typedir'],
                        'listorder' => $k
                    );
                    //更新
                    $specialType->where(array('typeid' => $v['typeid']))->save($data);
                    $data['typeid'] = $v['typeid'];
                    //获取分类地址
                    $url = ShuipFCMS()->SpecialUrl->type($data, $special_info, 1);
                    //更新分类url
                    $specialType->where(array('typeid' => $v['typeid']))->save(array('url' => $url['url']));
                }
                //删除分类
                if ($v['typeid'] && $v['del']) {
                    $this->deleteType($v['typeid'], $special_info['ishtml']);
                }
            }
        }
        return true;
    }

    /**
     * 删除分类数据
     * @param type $typeid 分类ID
     * @param type $ishtml 是否生成静态
     * @return boolean
     */
    public function deleteType($typeid, $ishtml) {
        $typeid = (int) $typeid;
        if (empty($typeid)) {
            $this->error = '请指定需要删除的分类ID';
            return false;
        }
        //专题类别模型
        $specialType = D('SpecialType');
        //条件
        $where = array(
            'typeid' => $typeid,
        );

        //查询出分类信息
        $info = $specialType->where($where)->find();
        if (empty($info)) {
            $this->error = '该分类不存在！';
            return false;
        }
        //删除分类
        $specialType->where($where)->delete();
        //如果专题是生成静态的，删除分类静态文件
        if ($ishtml) {
            
        }
        return true;
    }

}
