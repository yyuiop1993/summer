<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 专题类别模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Special\Model;

use Common\Model\Model;

class SpecialTypeModel extends Model {

    //数据表
    protected $tableName = 'special_type';
    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('name', 'require', '分类名称不能为空！', 1, 'regex', 3),
        array('typedir', 'require', '分类路径不能为空！', 1, 'regex', 3),
    );
    //自动完成
    protected $_auto = array(
            //array(填充字段,填充内容,填充条件,附加规则)
    );

    /**
     * 添加分类
     * @param type $data 提交数据
     * @return boolean
     */
    public function addType($data) {
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        $data = $this->token(false)->create($data, 1);
        if ($data) {
            $typeId = $this->add($data);
            if ($typeId) {
                return $typeId;
            } else {
                $this->error = '分类添加失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 根据parentid删除指定分类
     * @param type $parentid
     * @return boolean
     */
    public function delTypeByParentid($parentid) {
        $parentid = (int) $parentid;
        if (empty($parentid)) {
            $this->error = '参数不完整！';
            return false;
        }
        if (false !== $this->where(array('parentid' => $parentid))->delete()) {
            return true;
        } else {
            $this->error = '删除分类错误！';
            return false;
        }
    }

}
