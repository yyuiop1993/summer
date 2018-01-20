<?php

/**
 * 多图片上传获取内容
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return type
 */
function images($field, $value) {
    //取得图片列表
    $pictures = $_POST[$field . '_url'];
    //取得图片说明
    $pictures_alt = isset($_POST[$field . '_alt']) ? $_POST[$field . '_alt'] : array();
    $array = $temp = array();
    if (!empty($pictures)) {
        foreach ($pictures as $key => $pic) {
            $temp['url'] = $pic;
            $temp['alt'] = $pictures_alt[$key];
            $array[$key] = $temp;
        }
    }
    $array = serialize($array);
    return $array;
}