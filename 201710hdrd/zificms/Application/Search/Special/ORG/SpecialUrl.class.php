<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 专题URL处理类
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Special\ORG;

class SpecialUrl {

    /**
     * 专题首页链接
     * @param type $data 专题数据
     * @param type $page 页码
     * @return array Array ( 
     *    [url] => / 访问地址
     *    [path] => /index.html 生存路径
     *    [page] => Array ( 
     *       [index] => /index.html 
     *       [list] => /index_{$page}.html 
     *    ) 
     * )
     */
    public function index($data, $page = 1) {
        $config = cache('Config');
        //站点域名
        $domain = $config['siteurl'];
        $parseDomain = parse_url($domain);
        //站点存放目录
        $dirname = $parseDomain['path'];
        //取分页最大值
        $page = max($page, 1);
        //生成专题URL规则
        $urlrule = array();
        if ($data['ishtml']) {
            $urlrule[0] = 'special/' . $data['filename'] . '/index.html';
            $urlrule[1] = 'special/' . $data['filename'] . '/index_{$page}.html';
        } else {
            $urlrule[0] = 'index.php?g=Special&id=' . $data['id'];
            $urlrule[1] = 'index.php?g=Special&id=' . $data['id'] . '&' . C('VAR_PAGE') . '={$page}';
        }
        $url = array(
            "url" => ($page > 1 ? $urlrule[1] : $urlrule[0]),
            "path" => "",
        );
        $url["url"] = str_replace('{$page}', $page, $url["url"]);
        $parse_url = parse_url($url['url']);
        $url['path'] = ($dirname ? $dirname : "/") . $parse_url['path'];
        $url["path"] = str_replace(array('\/', '//', '\\'), '/', $url["path"]);
        //用于分页使用
        $url['page'] = array(
            "index" => $domain . $urlrule[0],
            "list" => $domain . $urlrule[1],
        );

        //判断是否为首页文件，如果是，就不显示文件名，隐藏
        if (in_array(basename($url["url"]), array('index.html', 'index.htm', 'index.shtml', 'index.php'))) {
            $url["url"] = str_replace(array('\/', '//', '\\'), '/', dirname($url["url"]) . '/');
        }

        //判断是否有加域名
        if (!isset($parse_url['host'])) {
            $url['url'] = $domain . $url['url'];
        }

        //把生成路径中的分页标签替换
        $url['path'] = str_replace('{$page}', $page, $url['path']);

        return $url;
    }

    /**
     * 专题分类链接
     * @param type $data 分类数据
     * @param type $special 专题数据
     * @param type $page 页码
     * @return array Array ( 
     *    [url] => / 访问地址
     *    [path] => /index.html 生存路径
     *    [page] => Array ( 
     *       [index] => /index.html 
     *       [list] => /index_{$page}.html 
     *    ) 
     * )
     */
    public function type($data, $special, $page = 1) {
        $config = cache('Config');
        //站点域名
        $domain = $config['siteurl'];
        $parseDomain = parse_url($domain);
        //站点存放目录
        $dirname = $parseDomain['path'];
        //取分页最大值
        $page = max($page, 1);
        //生成专题URL规则
        $urlrule = array();
        if ($special['ishtml']) {
            $urlrule[0] = 'special/' . $special['filename'] . '/' . $data['typedir'] . '/index.html';
            $urlrule[1] = 'special/' . $special['filename'] . '/' . $data['typedir'] . '/index_{$page}.html';
        } else {
            $urlrule[0] = 'index.php?g=Special&a=Type&typeid=' . $data['typeid'];
            $urlrule[1] = 'index.php?g=Special&a=Type&typeid=' . $data['typeid'] . '&' . C('VAR_PAGE') . '={$page}';
        }
        $url = array(
            "url" => ($page > 1 ? $urlrule[1] : $urlrule[0]),
            "path" => "",
        );
        $url["url"] = str_replace('{$page}', $page, $url["url"]);
        $parse_url = parse_url($url['url']);
        $url['path'] = ($dirname ? $dirname : "/") . $parse_url['path'];
        $url["path"] = str_replace(array('\/', '//', '\\'), '/', $url["path"]);
        //用于分页使用
        $url['page'] = array(
            "index" => $domain . $urlrule[0],
            "list" => $domain . $urlrule[1],
        );

        //判断是否为首页文件，如果是，就不显示文件名，隐藏
        if (in_array(basename($url["url"]), array('index.html', 'index.htm', 'index.shtml', 'index.php'))) {
            $url["url"] = str_replace(array('\/', '//', '\\'), '/', dirname($url["url"]) . '/');
        }

        //判断是否有加域名
        if (!isset($parse_url['host'])) {
            $url['url'] = $domain . $url['url'];
        }

        //把生成路径中的分页标签替换
        $url['path'] = str_replace('{$page}', $page, $url['path']);
        return $url;
    }

    /**
     * 生成专题内容页相关地址
     * @param type $data 文章数据
     * @param type $special 专题数据
     * @param type $page 分页
     * @return boolean
     * Array
     * (
     *     [url] => http://news.abc.com/1970/web_01/2.html 访问路径
     *     [path] => /record/1970/web_01/2.html 生成路径 动态木有
     *     [page] => Array
     *     (
     *         [index] => http://news.abc.com/1970/web_01/2.html
     *         [list] => http://news.abc.com/1970/web_01/2_{$page}.html
     *     )
     * )
     */
    public function show($data, $special, $page = 1) {
        if (!$data['inputtime'] || !$data['id'] || !$special) {
            return false;
        }
        //信息id
        $id = (int) $data['id'];
        //分页
        $page = max($page, 1);
        //真实发布时间
        if (is_numeric($data['inputtime']) == false) {
            $time = strtotime($data['inputtime']);
        } else {
            $time = (int) $data['inputtime'];
        }
        $config = cache('Config');
        //站点域名
        $domain = $config['siteurl'];
        $parseDomain = parse_url($domain);
        //站点存放目录
        $dirname = $parseDomain['path'];
        //生成静态处理
        if ($special['ishtml']) {
            //取得URL规则
            $urlrule = 'special/{$year}/{$month}/{$id}.html|special/{$year}/{$month}/{$id}_{$page}.html';
        } else {
            //取得URL规则
            $urlrule = 'index.php?g=Special&a=shows&id={$id}|index.php?g=Special&a=shows&id={$id}&page={$page}';
        }

        $replace_l = array(); //需要替换的标签
        $replace_r = array(); //替换的内容
        //初始
        //年份
        if (strstr($urlrule, '{$year}')) {
            $replace_l[] = '{$year}';
            $replace_r[] = date('Y', $time);
        }
        //月份
        if (strstr($urlrule, '{$month}')) {
            $replace_l[] = '{$month}';
            $replace_r[] = date('m', $time);
        }
        //日期
        if (strstr($urlrule, '{$day}')) {
            $replace_l[] = '{$day}';
            $replace_r[] = date('d', $time);
        }
        //专题ID
        if (strstr($urlrule, '{$specialid}')) {
            $replace_l[] = '{$specialid}';
            $replace_r[] = $data['specialid'];
        }
        $replace_l[] = '{$id}';
        $replace_r[] = $id;

        //标签替换
        $urlrule = str_replace($replace_l, $replace_r, $urlrule);

        $urlrule = explode("|", $urlrule);
        $url = array(
            "url" => ($page > 1 ? $urlrule[1] : $urlrule[0]),
            "path" => "",
        );

        //用于分页使用
        $url['page'] = array(
            "index" => $urlrule[0],
            "list" => $urlrule[1],
        );
        $url["url"] = str_replace('{$page}', $page, $url["url"]);
        //如果绑定域名，分析真实的生成目录
        $parse_url = parse_url($url['url']);
        $url['path'] = str_replace(array("//", "\\"), '/', ($dirname ? $dirname : "") . $parse_url['path']);

        //判断是否为首页文件，如果是，就不显示文件名，隐藏
        if (in_array(basename($url["url"]), array('index.html', 'index.htm', 'index.shtml'))) {
            $url["url"] = dirname($url["url"]) . '/';
        }

        //判断是否有加域名
        if (!isset($parse_url['host'])) {
            $url['url'] = $domain . $url['url'];
            $url['page']['index'] = $domain . $url['page']['index'];
            $url['page']['list'] = $domain . $url['page']['list'];
        }

        if (strpos($url["url"], '://') === false) {
            $url["url"] = str_replace('//', '/', $url["url"]);
        }

        //把生成路径中的分页标签替换
        $url['path'] = str_replace('{$page}', $page, $url['path']);

        return $url;
    }

}
