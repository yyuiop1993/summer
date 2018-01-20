<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 专题标签
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Special\TagLib;

class SpecialTagLib {

    protected $db = NULL;

    public function __construct() {
        $this->db = D('Special/Special');
    }

    /**
     * 数据统计，用于分页
     * @param type $data
     * @return type
     */
    public function count($data) {
        //专题列表
        if ($data['action'] == 'lists') {
            $where = array(
                'disabled' => 1,
            );
            //站点
            if ($data['siteid']) {
                $where['siteid'] = $data['siteid'];
            }
            //是否推荐
            if ($data['elite']) {
                $where['elite'] = 1;
            }
            //缩略图是否允许为空
            if ($data['thumb']) {
                $where['thumb'] = array('NEQ', '');
            }
            return $this->db->where($where)->count('id');
        } else if ($data['action'] == 'content_list') {//专题信息
            $this->db = D('Special/SpecialContent');
            $where = array();
            //专题ID
            if ((int) $data['specialid']) {
                $where['specialid'] = (int) $data['specialid'];
            }
            //分类ID
            if ((int) $data['typeid']) {
                $where['typeid'] = (int) $data['typeid'];
            }
            //缩略图是否允许为空
            if ((int) $data['thumb']) {
                $where['thumb'] = array('NEQ', '');
            }
            return $this->db->where($where)->count('id');
        }
    }

    /**
     * 专题列表
     * 参数名                       是否必须	默认值	 说明
     * siteid                        否	当前站点	 站点ID
     * elite                          否	null	 是否推荐
     * isthumb	 否	null	 必须有缩略图
     * order                        否	null	 排序
     * @param type $data
     * @return type
     */
    public function lists($data) {
        //缓存时间
        $cache = (int) $data['cache'];
        $cacheID = to_guid_string($data);
        if ($cache && $return = S($cacheID)) {
            return $return;
        }
        $getLastSql =  array();
        $where = array(
            'disabled' => 1,
        );
        //站点
        if ($data['siteid']) {
            $where['siteid'] = array('EQ', $data['siteid']);
        }
        //是否推荐
        if ($data['elite']) {
            $where['elite'] = 1;
        }
        //缩略图是否允许为空
        if ($data['thumb']) {
            $where['thumb'] = array('NEQ', '');
        }
        //排序方式
        $order = $data['order'] ? $data['order'] : array('id' => 'DESC');
        //判断是否启用分页，如果没启用分页则显示指定条数的内容
        if (!isset($data['limit'])) {
            $data['limit'] = (int) $data['num'] == 0 ? 10 : (int) $data['num'];
        }
        //查询数据
        $return = $this->db->where($where)->limit($data['limit'])->order($order)->select();
        $getLastSql[] = $this->db->getLastSql();
        //结果进行缓存
        if ($cache) {
            S($cacheID, $return, $cache);
        }
        //log
        if (APP_DEBUG) {
            $msg = "SpecialTagLib标签->lists：\n";
            $msg .="SQL:" . implode("\n", $getLastSql);
            \Think\Log::record($msg, \Think\Log::DEBUG);
        }
        return $return;
    }

    /**
     * 专题信息列表
     * 参数名       是否必须        默认值	 说明
     * specialid    是                  null	 专题ID
     * typeid       否                  null	 分类ID
     * isthumb      否                  null	 必须有缩略图
     * order        否                  null	 排序
     * @param type $data
     * @return type
     */
    public function content_list($data) {
        //缓存时间
        $cache = (int) $data['cache'];
        $cacheID = to_guid_string($data);
        if ($cache && $return = S($cacheID)) {
            return $return;
        }
        $getLastSql = array();
        $this->db = D('Special/SpecialContent');
        $where = array();
        //专题ID
        if ((int) $data['specialid']) {
            $where['specialid'] = (int) $data['specialid'];
        } else {
            return false;
        }
        //分类ID
        if ((int) $data['typeid']) {
            $where['typeid'] = (int) $data['typeid'];
        }
        //缩略图是否允许为空
        if ((int) $data['thumb']) {
            $where['thumb'] = array('NEQ', '');
        }
        //排序方式
        $order = $data['order'] ? $data['order'] : array('listorder' => 'ASC', 'id' => 'DESC');
        //判断是否启用分页，如果没启用分页则显示指定条数的内容
        if (!isset($data['limit'])) {
            $data['limit'] = (int) $data['num'] == 0 ? 10 : (int) $data['num'];
        }
        //查询数据
        $return = $this->db->where($where)->limit($data['limit'])->order($order)->select();
        $getLastSql[] = $this->db->getLastSql();
        if (!empty($return)) {
            foreach ($return as $k => $rs) {
                $curl = explode('|', $rs['curl']);
                $return[$k]['catid'] = $curl[0];
                $return[$k]['al_id'] = $curl[1];
            }
        }
        //结果进行缓存
        if ($cache) {
            S($cacheID, $return, $cache);
        }
        //log
        if (APP_DEBUG) {
            $msg = "SpecialTagLib标签->content_list：\n";
            $msg .="SQL:" . implode("\n", $getLastSql);
            \Think\Log::record($msg, \Think\Log::DEBUG);
        }
        return $return;
    }

    /**
     * 取得专题分类
     * 参数名       是否必须        默认值	 说明
     * specialid    是                  null	 专题ID
     * order        否                  null	 排序
     * @param type $data
     * @return type
     */
    public function get_type($data) {
        //缓存时间
        $cache = (int) $data['cache'];
        $cacheID = to_guid_string($data);
        if ($cache && $return = S($cacheID)) {
            return $return;
        }
        $getLastSql = array();
        $this->db = D('Special/SpecialType');
        $where = array();
        //专题ID
        if ((int) $data['specialid']) {
            $where['parentid'] = (int) $data['specialid'];
        } else {
            return false;
        }
        //排序方式
        $order = $data['order'] ? $data['order'] : array('listorder' => 'ASC', 'typeid' => 'DESC');
        //判断是否启用分页，如果没启用分页则显示指定条数的内容
        if (!isset($data['limit'])) {
            $data['limit'] = (int) $data['num'] == 0 ? 10 : (int) $data['num'];
        }

        //查询数据
        $return = $this->db->where($where)->limit($data['limit'])->order($order)->select();
        $getLastSql[] = $this->db->getLastSql();
        //结果进行缓存
        if ($cache) {
            S($cacheID, $return, $cache);
        }
        //log
        if (APP_DEBUG) {
            $msg = "SpecialTagLib标签->get_type：\n";
            $msg .="SQL:" . implode("\n", $getLastSql);
            \Think\Log::record($msg, \Think\Log::DEBUG);
        }
        return $return;
    }

}
