<?php

// +----------------------------------------------------------------------
// | LvyeCMS 数据删除时回调
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.lvyecms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 旅烨集团 <web@alvye.cn>
// +----------------------------------------------------------------------
class content_delete {

    //信息ID
    public $id = 0;
    //栏目ID
    public $catid = 0;
    //模型ID
    public $modelid = 0;
    //字段信息
    public $fields = array();
    //模型缓存
    protected $model = array();
    //数据
    protected $data = array();
    //最近错误信息
    protected $error = '';
    // 数据表名（不包含表前缀）
    protected $tablename = '';

    public function __construct($modelid) {
        $this->model = cache('Model');
        if ($modelid) {
            $this->setModelid($modelid);
        }
    }
    
    /**
     * 初始化
     * @param type $modelid
     * @return boolean
     */
    public function setModelid($modelid) {
        if (empty($modelid)) {
            return false;
        }
        $this->modelid = $modelid;
        if (empty($this->model[$this->modelid])) {
            return false;
        }
        $modelField = cache('ModelField');
        $this->fields = $modelField[$this->modelid];
        $this->tablename = trim($this->model[$this->modelid]['tablename']);
    }

    /**
     * 魔术方法，获取配置
     * @param type $name
     * @return type
     */
    public function __get($name) {
        return isset($this->data[$name]) ? $this->data[$name] : (isset($this->$name) ? $this->$name : NULL);
    }

    /**
     *  魔术方法，设置options参数
     * @param type $name
     * @param type $value
     */
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function get($data) {
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        $this->data = $data;
        $this->id = (int) $data['id'];
        $this->catid = (int) $data['catid'];
        $info = array();
        foreach ($this->fields as $fieldInfo) {
            $field = $fieldInfo['field'];
            //字段类型
            $func = $fieldInfo['formtype'];
            if (!$func || !isset($this->data[$field])) {
                continue;
            }
            //字段内容
            $value = $this->data[$field];
            if (method_exists($this, $func)) {
                $this->$func($field, $value);
            }
        }
        return true;
    }

    

/**
 * 删除内容时，回调进行tags处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return type
 */
function tags($field, $value) {
    //删除对应的tags记录
    return D('Content/Tags')->deleteAll($this->id, $this->catid, $this->modelid);
}

/**
 * 删除内容时，推荐位回调处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return type
 */
function posid($field, $value) {
    //删除推荐位
    return M('PositionData')->where(array('id' => $this->id, 'catid' => $this->catid, 'module' => 'content'))->delete();
}

}
