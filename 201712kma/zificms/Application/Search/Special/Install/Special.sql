
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shuipfcms_special`
-- ----------------------------
DROP TABLE IF EXISTS `shuipfcms_special`;
CREATE TABLE `shuipfcms_special` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '专题ID',
  `title` char(60) NOT NULL COMMENT '专题名称',
  `typeids` char(100) NOT NULL,
  `thumb` char(100) NOT NULL COMMENT '缩略图',
  `banner` char(100) NOT NULL COMMENT '专题横幅',
  `keywords` char(40) NOT NULL COMMENT '关键字',
  `description` char(255) NOT NULL COMMENT '简介',
  `code` varchar(255) NOT NULL COMMENT '统计代码',
  `url` char(100) NOT NULL COMMENT '访问地址',
  `ishtml` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否生成静态1:生成 0：不生成',
  `filename` char(40) NOT NULL COMMENT '专题目录',
  `pics` char(100) NOT NULL COMMENT '图片报道信息',
  `voteid` char(60) NOT NULL COMMENT '投票信息',
  `index_template` char(40) NOT NULL COMMENT '首页模板',
  `list_template` char(40) NOT NULL COMMENT '列表页模板',
  `show_template` char(60) NOT NULL COMMENT '内容页模板',
  `username` char(40) NOT NULL COMMENT '添加专题的用户名',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '专题创建时间',
  `listorder` smallint(5) unsigned NOT NULL COMMENT '排序',
  `elite` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐1：推荐 0：不推荐',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否启用0：不启用1：启用',
  PRIMARY KEY (`id`),
  KEY `disabled` (`disabled`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专题表';

-- ----------------------------
-- Table structure for `lvyecms_special`
-- ----------------------------
DROP TABLE IF EXISTS `lvyecms_special`;
CREATE TABLE `lvyecms_special` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '专题ID',
  `title` char(60) NOT NULL COMMENT '专题名称',
  `typeids` char(100) NOT NULL,
  `thumb` char(100) NOT NULL COMMENT '缩略图',
  `banner` char(100) NOT NULL COMMENT '专题横幅',
  `keywords` char(40) NOT NULL COMMENT '关键字',
  `description` char(255) NOT NULL COMMENT '简介',
  `code` varchar(255) NOT NULL COMMENT '统计代码',
  `url` char(100) NOT NULL COMMENT '访问地址',
  `ishtml` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否生成静态1:生成 0：不生成',
  `filename` char(40) NOT NULL COMMENT '专题目录',
  `pics` char(100) NOT NULL COMMENT '图片报道信息',
  `voteid` char(60) NOT NULL COMMENT '投票信息',
  `index_template` char(40) NOT NULL COMMENT '首页模板',
  `list_template` char(40) NOT NULL COMMENT '列表页模板',
  `show_template` char(60) NOT NULL COMMENT '内容页模板',
  `username` char(40) NOT NULL COMMENT '添加专题的用户名',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '专题创建时间',
  `listorder` smallint(5) unsigned NOT NULL COMMENT '排序',
  `elite` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐1：推荐 0：不推荐',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否启用0：不启用1：启用',
  PRIMARY KEY (`id`),
  KEY `disabled` (`disabled`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专题表';

-- ----------------------------
-- Table structure for `shuipfcms_special_content`
-- ----------------------------
DROP TABLE IF EXISTS `shuipfcms_special_content`;
CREATE TABLE `shuipfcms_special_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `specialid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '专题ID',
  `title` char(80) NOT NULL COMMENT '标题',
  `style` char(24) NOT NULL COMMENT '样式',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `thumb` char(100) NOT NULL COMMENT '缩略图',
  `keywords` char(40) NOT NULL COMMENT '关键字',
  `description` char(255) NOT NULL COMMENT '简介',
  `url` char(100) NOT NULL COMMENT '访问地址',
  `curl` char(15) NOT NULL COMMENT '导入原文的栏目ID和内容ID',
  `listorder` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `username` char(20) NOT NULL COMMENT '用户名',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '外部链接1：外部链接；0：原创',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`),
  KEY `specialid` (`specialid`,`typeid`),
  KEY `typeid` (`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专题内容表';

-- ----------------------------
-- Table structure for `lvyecms_special_content`
-- ----------------------------
DROP TABLE IF EXISTS `lvyecms_special_content`;
CREATE TABLE `lvyecms_special_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `specialid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '专题ID',
  `title` char(80) NOT NULL COMMENT '标题',
  `style` char(24) NOT NULL COMMENT '样式',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `thumb` char(100) NOT NULL COMMENT '缩略图',
  `keywords` char(40) NOT NULL COMMENT '关键字',
  `description` char(255) NOT NULL COMMENT '简介',
  `url` char(100) NOT NULL COMMENT '访问地址',
  `curl` char(15) NOT NULL COMMENT '导入原文的栏目ID和内容ID',
  `listorder` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `username` char(20) NOT NULL COMMENT '用户名',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '外部链接1：外部链接；0：原创',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`),
  KEY `specialid` (`specialid`,`typeid`),
  KEY `typeid` (`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专题内容表';

-- ----------------------------
-- Table structure for `shuipfcms_special_type`
-- ----------------------------
DROP TABLE IF EXISTS `shuipfcms_special_type`;
CREATE TABLE `shuipfcms_special_type` (
  `typeid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL COMMENT '类别名称',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `typedir` char(20) NOT NULL COMMENT '路径',
  `url` char(100) NOT NULL COMMENT '链接地址',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `description` varchar(255) NOT NULL COMMENT '描述',
  PRIMARY KEY (`typeid`),
  KEY `module` (`parentid`,`listorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT=' 专题类别表';

-- ----------------------------
-- Table structure for `lvyecms_special_type`
-- ----------------------------
DROP TABLE IF EXISTS `lvyecms_special_type`;
CREATE TABLE `lvyecms_special_type` (
  `typeid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL COMMENT '类别名称',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `typedir` char(20) NOT NULL COMMENT '路径',
  `url` char(100) NOT NULL COMMENT '链接地址',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `description` varchar(255) NOT NULL COMMENT '描述',
  PRIMARY KEY (`typeid`),
  KEY `module` (`parentid`,`listorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT=' 专题类别表';