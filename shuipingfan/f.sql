# Host: localhost  (Version: 5.5.53)
# Date: 2017-08-04 14:59:27
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "zf_access"
#

DROP TABLE IF EXISTS `zf_access`;
CREATE TABLE `zf_access` (
  `role_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `app` varchar(20) NOT NULL DEFAULT '' COMMENT '模块',
  `controller` varchar(20) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(20) NOT NULL DEFAULT '' COMMENT '方法',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否有效',
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色权限表';

#
# Data for table "zf_access"
#

/*!40000 ALTER TABLE `zf_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_access` ENABLE KEYS */;

#
# Structure for table "zf_addons"
#

DROP TABLE IF EXISTS `zf_addons`;
CREATE TABLE `zf_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '插件名或标识，区分大小写',
  `sign` varchar(255) NOT NULL DEFAULT '' COMMENT '签名',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1-启用 0-禁用 -1-损坏',
  `config` text COMMENT '配置 序列化存放',
  `author` varchar(40) NOT NULL DEFAULT '' COMMENT '作者',
  `version` varchar(20) NOT NULL DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1-有后台列表 0-无后台列表',
  PRIMARY KEY (`id`),
  KEY `sign` (`sign`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';

#
# Data for table "zf_addons"
#

/*!40000 ALTER TABLE `zf_addons` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_addons` ENABLE KEYS */;

#
# Structure for table "zf_admin_panel"
#

DROP TABLE IF EXISTS `zf_admin_panel`;
CREATE TABLE `zf_admin_panel` (
  `mid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '菜单ID',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` char(32) NOT NULL DEFAULT '' COMMENT '菜单名',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '菜单地址',
  UNIQUE KEY `userid` (`mid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='常用菜单';

#
# Data for table "zf_admin_panel"
#

/*!40000 ALTER TABLE `zf_admin_panel` DISABLE KEYS */;
INSERT INTO `zf_admin_panel` VALUES (12,1,'扩展配置','Admin/Config/extend'),(117,1,'添加友情链接','Links/Links/add'),(65,1,'管理内容','Content/Content/index'),(47,1,'栏目列表','Content/Category/index'),(48,1,'添加栏目','Content/Category/add');
/*!40000 ALTER TABLE `zf_admin_panel` ENABLE KEYS */;

#
# Structure for table "zf_attachment"
#

DROP TABLE IF EXISTS `zf_attachment`;
CREATE TABLE `zf_attachment` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '附件ID',
  `module` char(15) NOT NULL DEFAULT '' COMMENT '模块名称',
  `catid` smallint(5) NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `filename` char(50) NOT NULL DEFAULT '' COMMENT '上传附件名称',
  `filepath` char(200) NOT NULL DEFAULT '' COMMENT '附件路径',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '附件大小',
  `fileext` char(10) NOT NULL DEFAULT '' COMMENT '附件扩展名',
  `isimage` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为图片 1为图片',
  `isthumb` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为缩略图 1为缩略图',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上传用户ID',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否后台用户上传',
  `uploadtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `uploadip` char(15) NOT NULL DEFAULT '' COMMENT '上传ip',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '附件使用状态',
  `authcode` char(32) NOT NULL DEFAULT '' COMMENT '附件路径MD5值',
  PRIMARY KEY (`aid`),
  KEY `authcode` (`authcode`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='附件表';

#
# Data for table "zf_attachment"
#

/*!40000 ALTER TABLE `zf_attachment` DISABLE KEYS */;
INSERT INTO `zf_attachment` VALUES (1,'content',4,'f9a1d42ab2a5f42c2854991626cbb57d.jpg','content/2017/07/59672db64a054.jpg',13404,'jpg',1,0,1,1,1499934134,'127.0.0.1',1,'a7e17452c263ae311f4c7bda69a45aad'),(2,'contents',1,'5c3774a08457284225a459bb8e6895aa.jpg','contents/2017/07/596f0018f2f53.jpg',87649,'jpg',1,0,1,1,1500446744,'127.0.0.1',1,'bc9d9d85f9fd4b391abeef307e9c7867'),(3,'content',4,'video1.jpg','content/2017/07/596f0cf34e842.jpg',71590,'jpg',1,0,1,1,1500450035,'127.0.0.1',1,'7fb17f9c0740983b1a7804b3d2f911fc'),(4,'content',8,'product2.jpg','content/2017/08/5982c72a3a0ce.jpg',30437,'jpg',1,0,1,1,1501742890,'127.0.0.1',1,'0120f988c2c36d6c8dec6a61edae556b'),(5,'content',4,'1.rar','content/2017/08/5982cb93dbd23.rar',20,'rar',0,0,1,1,1501744019,'127.0.0.1',1,'bf0531c6faf9842b292cc6770d382d83'),(6,'content',4,'1.rar','content/2017/08/5982cb9d7fea2.rar',20,'rar',0,0,1,1,1501744029,'127.0.0.1',1,'be854033b740d19abdff9f7b33ac59ba');
/*!40000 ALTER TABLE `zf_attachment` ENABLE KEYS */;

#
# Structure for table "zf_attachment_index"
#

DROP TABLE IF EXISTS `zf_attachment_index`;
CREATE TABLE `zf_attachment_index` (
  `keyid` char(30) NOT NULL DEFAULT '' COMMENT '关联id',
  `aid` char(10) NOT NULL DEFAULT '' COMMENT '附件ID',
  KEY `keyid` (`keyid`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件关系表';

#
# Data for table "zf_attachment_index"
#

/*!40000 ALTER TABLE `zf_attachment_index` DISABLE KEYS */;
INSERT INTO `zf_attachment_index` VALUES ('c-4-2','1'),('c-5-4','1'),('c-4-5','1'),('c-2-6','1'),('catid-1','2'),('c-4-5','3'),('c-4-2','3'),('c-8-1','4'),('c-4-1','5'),('c-4-1','6');
/*!40000 ALTER TABLE `zf_attachment_index` ENABLE KEYS */;

#
# Structure for table "zf_behavior"
#

DROP TABLE IF EXISTS `zf_behavior`;
CREATE TABLE `zf_behavior` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '行为说明',
  `remark` char(140) NOT NULL DEFAULT '' COMMENT '行为描述',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-控制器，2-视图',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态（0：禁用，1：正常）',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '所属模块',
  `datetime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='系统行为表';

#
# Data for table "zf_behavior"
#

/*!40000 ALTER TABLE `zf_behavior` DISABLE KEYS */;
INSERT INTO `zf_behavior` VALUES (1,'app_init','应用初始化标签位','应用初始化标签位',1,1,1,'',1381021393),(2,'path_info','PATH_INFO检测标签位','PATH_INFO检测标签位',1,1,1,'',1381021411),(3,'app_begin','应用开始标签位','应用开始标签位',1,1,1,'',1381021424),(4,'action_name','操作方法名标签位','操作方法名标签位',1,1,1,'',1381021437),(5,'action_begin','控制器开始标签位','控制器开始标签位',1,1,1,'',1381021450),(6,'view_begin','视图输出开始标签位','视图输出开始标签位',1,1,1,'',1381021463),(7,'view_parse','视图解析标签位','视图解析标签位',1,1,1,'',1381021476),(8,'template_filter','模板内容解析标签位','模板内容解析标签位',1,1,1,'',1381021488),(9,'view_filter','视图输出过滤标签位','视图输出过滤标签位',1,1,1,'',1381021621),(10,'view_end','视图输出结束标签位','视图输出结束标签位',1,1,1,'',1381021631),(11,'action_end','控制器结束标签位','控制器结束标签位',1,1,1,'',1381021642),(12,'app_end','应用结束标签位','应用结束标签位',1,1,1,'',1381021654),(13,'appframe_rbac_init','后台权限控制','后台权限控制',1,1,1,'',1381023560),(22,'content_add_end','内容添加结束行为标签','模块Search中的行为！',1,1,0,'Search',1501816183),(23,'content_edit_end','内容编辑结束行为标签','模块Search中的行为！',1,1,0,'Search',1501816183),(24,'content_check_end','内容审核结束行为标签','模块Search中的行为！',1,1,0,'Search',1501816183),(25,'content_delete_end','内容删除结束行为标签','模块Search中的行为！',1,1,0,'Search',1501816183);
/*!40000 ALTER TABLE `zf_behavior` ENABLE KEYS */;

#
# Structure for table "zf_behavior_log"
#

DROP TABLE IF EXISTS `zf_behavior_log`;
CREATE TABLE `zf_behavior_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `ruleid` int(10) NOT NULL DEFAULT '0' COMMENT '行为ID',
  `guid` char(50) NOT NULL DEFAULT '' COMMENT '标识',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行为日志';

#
# Data for table "zf_behavior_log"
#

/*!40000 ALTER TABLE `zf_behavior_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_behavior_log` ENABLE KEYS */;

#
# Structure for table "zf_behavior_rule"
#

DROP TABLE IF EXISTS `zf_behavior_rule`;
CREATE TABLE `zf_behavior_rule` (
  `ruleid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `behaviorid` int(11) NOT NULL DEFAULT '0' COMMENT '行为id',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '规则所属模块',
  `addons` char(20) NOT NULL DEFAULT '' COMMENT '规则所属插件',
  `rule` text COMMENT '行为规则',
  `listorder` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `datetime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`ruleid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='行为规则表';

#
# Data for table "zf_behavior_rule"
#

/*!40000 ALTER TABLE `zf_behavior_rule` DISABLE KEYS */;
INSERT INTO `zf_behavior_rule` VALUES (1,1,1,'','','phpfile:BuildLiteBehavior',0,1381021954),(2,3,1,'','','phpfile:ReadHtmlCacheBehavior',0,1381021954),(3,12,1,'','','phpfile:ShowPageTraceBehavior',0,1381021954),(4,7,1,'','','phpfile:ParseTemplateBehavior',0,1381021954),(5,8,1,'','','phpfile:ContentReplaceBehavior',0,1381021954),(6,9,1,'','','phpfile:WriteHtmlCacheBehavior',0,1381021954),(7,1,1,'','','phpfile:AppInitBehavior|module:Common',0,1381021954),(8,3,1,'','','phpfile:AppBeginBehavior|module:Common',0,1381021954),(9,6,1,'','','phpfile:ViewBeginBehavior|module:Common',0,1381021954),(10,3,0,'Wap','','phpfile:WapBehavior|module:Wap',0,1499310157),(23,22,0,'Search','','phpfile:SearchApi|module:Search',0,1501816183),(24,23,0,'Search','','phpfile:SearchApi|module:Search',0,1501816183),(25,24,0,'Search','','phpfile:SearchApi|module:Search',0,1501816183),(26,25,0,'Search','','phpfile:SearchApi|module:Search',0,1501816183);
/*!40000 ALTER TABLE `zf_behavior_rule` ENABLE KEYS */;

#
# Structure for table "zf_cache"
#

DROP TABLE IF EXISTS `zf_cache`;
CREATE TABLE `zf_cache` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增长ID',
  `key` char(100) NOT NULL DEFAULT '' COMMENT '缓存key值',
  `name` char(100) NOT NULL DEFAULT '' COMMENT '名称',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '模块名称',
  `model` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `action` char(30) NOT NULL DEFAULT '' COMMENT '方法名',
  `param` char(255) NOT NULL DEFAULT '' COMMENT '参数',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统',
  PRIMARY KEY (`id`),
  KEY `ckey` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='缓存更新列队';

#
# Data for table "zf_cache"
#

/*!40000 ALTER TABLE `zf_cache` DISABLE KEYS */;
INSERT INTO `zf_cache` VALUES (1,'Config','网站配置','','Config','config_cache','',1),(2,'Module','可用模块列表','','Module','module_cache','',1),(3,'Behavior','行为列表','','Behavior','behavior_cache','',1),(4,'Menu','后台菜单','Admin','Menu','menu_cache','',0),(5,'Category','栏目索引','Content','Category','category_cache','',0),(6,'Model','模型列表','Content','Model','model_cache','',0),(7,'Urlrules','URL规则','Content','Urlrule','urlrule_cache','',0),(8,'ModelField','模型字段','Content','ModelField','model_field_cache','',0),(9,'Position','推荐位','Content','Position','position_cache','',0),(10,'Addons','插件列表','Addons','Addons','addons_cache','',0),(11,'Model_form','自定义表单模型','Formguide','Formguide','formguide_cache','',0),(15,'Search_config','全站搜索配置','Search','Search','search_cache','',0);
/*!40000 ALTER TABLE `zf_cache` ENABLE KEYS */;

#
# Structure for table "zf_category"
#

DROP TABLE IF EXISTS `zf_category`;
CREATE TABLE `zf_category` (
  `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `module` varchar(15) NOT NULL DEFAULT '' COMMENT '所属模块',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类别',
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `domain` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目绑定域名',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `arrparentid` varchar(255) NOT NULL DEFAULT '' COMMENT '所有父ID',
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否存在子栏目，1存在',
  `arrchildid` mediumtext COMMENT '所有子栏目ID',
  `catname` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `encatname` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '' COMMENT '栏目图片',
  `description` mediumtext COMMENT '栏目描述',
  `parentdir` varchar(100) NOT NULL DEFAULT '' COMMENT '父目录',
  `catdir` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目目录',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '栏目点击数',
  `setting` mediumtext COMMENT '相关配置信息',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `sethtml` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否生成静态',
  `letter` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目拼音',
  PRIMARY KEY (`catid`),
  KEY `module` (`module`,`parentid`,`listorder`,`catid`),
  KEY `siteid` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='栏目表';

#
# Data for table "zf_category"
#

/*!40000 ALTER TABLE `zf_category` DISABLE KEYS */;
INSERT INTO `zf_category` VALUES (1,'content',1,0,'',0,'0',0,'1','关于我们','about','','','','about','/index.php?a=lists&catid=1',0,'a:8:{s:6:\"seturl\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"page_template\";s:8:\"page.php\";s:6:\"ishtml\";s:1:\"0\";s:15:\"category_ruleid\";s:1:\"1\";s:11:\"show_ruleid\";N;}',0,1,0,'guanyuwomen'),(2,'content',0,1,'',0,'0',1,'2,8','产品中心','pro','','','','product','/index.php?a=lists&catid=2',0,'a:15:{s:6:\"seturl\";s:0:\"\";s:12:\"generatehtml\";s:1:\"1\";s:12:\"generatelish\";s:1:\"0\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:17:\"category_template\";s:12:\"category.php\";s:13:\"list_template\";s:8:\"list.php\";s:13:\"show_template\";s:8:\"show.php\";s:19:\"list_customtemplate\";s:0:\"\";s:6:\"ishtml\";s:1:\"0\";s:9:\"repagenum\";s:0:\"\";s:14:\"content_ishtml\";s:1:\"0\";s:15:\"category_ruleid\";s:1:\"1\";s:11:\"show_ruleid\";s:1:\"4\";}',0,1,0,'chanpinzhongxin'),(3,'content',0,1,'',0,'0',1,'3,6,7','新闻中心','news','','','','news','/index.php?a=lists&catid=3',0,'a:12:{s:6:\"seturl\";s:0:\"\";s:12:\"generatehtml\";s:1:\"1\";s:12:\"generatelish\";s:1:\"0\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:17:\"category_template\";s:17:\"category_news.php\";s:19:\"list_customtemplate\";s:0:\"\";s:6:\"ishtml\";s:1:\"0\";s:9:\"repagenum\";s:0:\"\";s:15:\"category_ruleid\";s:1:\"1\";s:11:\"show_ruleid\";N;}',0,1,0,'xinwenzhongxin'),(4,'content',0,2,'',0,'0',0,'4','资料下载','down','','','','down','/index.php?a=lists&catid=4',0,'a:14:{s:6:\"seturl\";s:0:\"\";s:12:\"generatehtml\";s:1:\"1\";s:12:\"generatelish\";s:1:\"0\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"list_template\";s:13:\"list_down.php\";s:13:\"show_template\";s:13:\"show_down.php\";s:19:\"list_customtemplate\";s:0:\"\";s:6:\"ishtml\";s:1:\"0\";s:9:\"repagenum\";s:0:\"\";s:14:\"content_ishtml\";s:1:\"0\";s:15:\"category_ruleid\";s:1:\"1\";s:11:\"show_ruleid\";s:1:\"4\";}',0,1,0,'ziliaoxiazai'),(5,'content',1,0,'',0,'0',0,'5','联系我们','contact','','','','contact','/index.php?a=lists&catid=5',0,'a:8:{s:6:\"seturl\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"page_template\";s:8:\"page.php\";s:6:\"ishtml\";s:1:\"0\";s:15:\"category_ruleid\";s:1:\"1\";s:11:\"show_ruleid\";N;}',0,1,0,'lianxiwomen'),(6,'content',0,1,'',3,'0,3',0,'6','公司新闻','','','','news/','gsxw','/index.php?a=lists&catid=6',0,'a:15:{s:6:\"seturl\";s:0:\"\";s:12:\"generatehtml\";s:1:\"1\";s:12:\"generatelish\";s:1:\"0\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:17:\"category_template\";s:12:\"category.php\";s:13:\"list_template\";s:8:\"list.php\";s:13:\"show_template\";s:8:\"show.php\";s:19:\"list_customtemplate\";s:0:\"\";s:6:\"ishtml\";s:1:\"0\";s:9:\"repagenum\";s:0:\"\";s:14:\"content_ishtml\";s:1:\"0\";s:15:\"category_ruleid\";s:1:\"1\";s:11:\"show_ruleid\";s:1:\"4\";}',0,1,0,'gongsixinwen'),(7,'content',0,1,'',3,'0,3',0,'7','行业新闻','','','','news/','hyxw','/index.php?a=lists&catid=7',0,'a:15:{s:6:\"seturl\";s:0:\"\";s:12:\"generatehtml\";s:1:\"1\";s:12:\"generatelish\";s:1:\"0\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:17:\"category_template\";s:12:\"category.php\";s:13:\"list_template\";s:8:\"list.php\";s:13:\"show_template\";s:8:\"show.php\";s:19:\"list_customtemplate\";s:0:\"\";s:6:\"ishtml\";s:1:\"0\";s:9:\"repagenum\";s:0:\"\";s:14:\"content_ishtml\";s:1:\"0\";s:15:\"category_ruleid\";s:1:\"1\";s:11:\"show_ruleid\";s:1:\"4\";}',0,1,0,'xingyexinwen'),(8,'content',0,1,'',2,'0,2',0,'8','测试','ce','','','product/','ceshi','/index.php?a=lists&catid=8',0,'a:15:{s:6:\"seturl\";s:0:\"\";s:12:\"generatehtml\";s:1:\"1\";s:12:\"generatelish\";s:1:\"0\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:17:\"category_template\";s:12:\"category.php\";s:13:\"list_template\";s:8:\"list.php\";s:13:\"show_template\";s:8:\"show.php\";s:19:\"list_customtemplate\";s:0:\"\";s:6:\"ishtml\";s:1:\"0\";s:9:\"repagenum\";s:0:\"\";s:14:\"content_ishtml\";s:1:\"0\";s:15:\"category_ruleid\";s:1:\"1\";s:11:\"show_ruleid\";s:1:\"4\";}',0,1,0,'ceshi');
/*!40000 ALTER TABLE `zf_category` ENABLE KEYS */;

#
# Structure for table "zf_category_field"
#

DROP TABLE IF EXISTS `zf_category_field`;
CREATE TABLE `zf_category_field` (
  `fid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '自增长id',
  `catid` smallint(5) NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `fieldname` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `type` varchar(10) NOT NULL DEFAULT '' COMMENT '类型,input',
  `setting` mediumtext COMMENT '其他',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目扩展字段列表';

#
# Data for table "zf_category_field"
#

/*!40000 ALTER TABLE `zf_category_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_category_field` ENABLE KEYS */;

#
# Structure for table "zf_category_priv"
#

DROP TABLE IF EXISTS `zf_category_priv`;
CREATE TABLE `zf_category_priv` (
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `roleid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色或者组ID',
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为管理员 1、管理员',
  `action` char(30) NOT NULL DEFAULT '' COMMENT '动作',
  KEY `catid` (`catid`,`roleid`,`is_admin`,`action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目权限表';

#
# Data for table "zf_category_priv"
#

/*!40000 ALTER TABLE `zf_category_priv` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_category_priv` ENABLE KEYS */;

#
# Structure for table "zf_config"
#

DROP TABLE IF EXISTS `zf_config`;
CREATE TABLE `zf_config` (
  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(20) NOT NULL DEFAULT '',
  `info` varchar(100) NOT NULL DEFAULT '',
  `groupid` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `value` text,
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='网站配置表';

#
# Data for table "zf_config"
#

/*!40000 ALTER TABLE `zf_config` DISABLE KEYS */;
INSERT INTO `zf_config` VALUES (1,'sitename','网站名称',1,'济南优润机电设备有限公司'),(2,'siteurl','网站网址',1,'/'),(3,'sitefileurl','附件地址',1,'/d/file/'),(4,'siteemail','站点邮箱',1,'1029913256@qq.com'),(6,'siteinfo','网站介绍',1,'济南优润机电设备有限公司总部坐落于美丽的“泉城”-山东济南，工厂位于革命老区-山东临沂，我公司主要从事液压产品的设计研发和生产加工，拥有熟悉国内外液压机电产品的专业技术团队，并汇集了一批在流体传动领域内具有丰富实践经验的专业技术人才；公司自成立以来，一贯坚持“最高效的反应、最周到的服务、最合理的价格”三大生产经营理念，一直致力于为客户提供最优质的流体解决方案，在业内赢得了良好的企业信誉。'),(7,'sitekeywords','网站关键字',1,'济南优润机电设备有限公司'),(8,'uploadmaxsize','允许上传附件大小',1,'20240'),(9,'uploadallowext','允许上传附件类型',1,'jpg|jpeg|gif|bmp|png|doc|docx|xls|xlsx|ppt|pptx|pdf|txt|rar|zip|swf'),(10,'qtuploadmaxsize','前台允许上传附件大小',1,'200'),(11,'qtuploadallowext','前台允许上传附件类型',1,'jpg|jpeg|gif'),(12,'watermarkenable','是否开启图片水印',1,'0'),(13,'watermarkminwidth','水印-宽',1,'300'),(14,'watermarkminheight','水印-高',1,'100'),(15,'watermarkimg','水印图片',1,'/statics/images/mark_bai.png'),(16,'watermarkpct','水印透明度',1,'80'),(17,'watermarkquality','JPEG 水印质量',1,'85'),(18,'watermarkpos','水印位置',1,'7'),(19,'theme','主题风格',1,'Default'),(20,'ftpstatus','FTP上传',1,'0'),(21,'ftpuser','FTP用户名',1,''),(22,'ftppassword','FTP密码',1,''),(23,'ftphost','FTP服务器地址',1,''),(24,'ftpport','FTP服务器端口',1,'21'),(25,'ftppasv','FTP是否开启被动模式',1,'1'),(26,'ftpssl','FTP是否使用SSL连接',1,'0'),(27,'ftptimeout','FTP超时时间',1,'10'),(28,'ftpuppat','FTP上传目录',1,'/'),(29,'mail_type','邮件发送模式',1,'1'),(30,'mail_server','邮件服务器',1,'smtp.qq.com'),(31,'mail_port','邮件发送端口',1,'25'),(32,'mail_from','发件人地址',1,'admin@abc3210.com'),(33,'mail_auth','密码验证',1,'1'),(34,'mail_user','邮箱用户名',1,''),(35,'mail_password','邮箱密码',1,''),(36,'mail_fname','发件人名称',1,'LvyeCMS管理员'),(37,'domainaccess','指定域名访问',1,'0'),(38,'generate','是否生成首页',1,'1'),(39,'index_urlruleid','首页URL规则',1,'11'),(40,'indextp','首页模板',1,'index.php'),(41,'tagurl','TagURL规则',1,'8'),(42,'checkcode_type','验证码类型',1,'0'),(43,'attachment_driver','附件驱动',1,'Local'),(44,'addonsite','开放平台',1,'http://addon.lvyecms.com/'),(45,'footerinfo','网站底部信息',2,'<p>版权所有：济南优润机电设备有限公司   鲁ICP备05043559号-1  技术支持：<a href=\"#\">智峰软件</a></p>\n<p>公司地址:山东省临沂市兰山区金雀山路162-1号    传 真：0539-8153017   电子信箱：ygrlb@ygrlb.com</p>'),(47,'tel','网站电话',2,'0539-7026518'),(48,'about','网站首页公司简介',2,'<p> 济南优润机电设备有限公司总部坐落于美丽的“泉城”-山东济南，工厂位于革命老区-山东临沂，我公司主要从事液压产品的设计研发和生产加工，拥有熟悉国内外液压机电产品的专业技术团队，并汇集了一批在流体传动领域内具有丰富实践经验的专业技术人才；公司自成立以来，一贯坚持“最高效的反应、最周到的服务、最合理的价格”三大生产经营理念，一直致力于为客户提供最优质的流体解决方案，在业内赢得了良好的企业信誉。业务范围遍及北京、上海、浙江、福建、江苏、河北、山东、山西、新疆、四川、贵州、内蒙古、黑龙江等地；同时产品出口至斯里兰卡、卡塔尔、印尼、迪拜、朝鲜、韩国、越南、缅甸、老挝等多个国家。产品涉及船舶制造、海洋工程、港口机械、工程机械、环保设备、冶金、化工、纺织、建筑、军工等多个领域。</p>\n\t\t\t\t<p>公司主营：液压系统、液压油缸、液压设备的设计、制造及业务咨询和技术服务；（HYDAC）产品等多个进口品牌、国产液压元件和气动元件、建筑用实心和空心丝杆、上下托座、脚手架...</p>'),(49,'left','网站侧边联系方式',2,'史贝美生态肥业<br>\n公司地址：中国山东兰陵经济开发区<br>\n联系电话：4008582868');
/*!40000 ALTER TABLE `zf_config` ENABLE KEYS */;

#
# Structure for table "zf_config_field"
#

DROP TABLE IF EXISTS `zf_config_field`;
CREATE TABLE `zf_config_field` (
  `fid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '自增长id',
  `fieldname` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `type` varchar(10) NOT NULL DEFAULT '' COMMENT '类型,input',
  `setting` mediumtext COMMENT '其他',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='网站配置，扩展字段列表';

#
# Data for table "zf_config_field"
#

/*!40000 ALTER TABLE `zf_config_field` DISABLE KEYS */;
INSERT INTO `zf_config_field` VALUES (1,'footerinfo','textarea','a:3:{s:5:\"title\";s:18:\"网站底部信息\";s:4:\"tips\";s:18:\"网站底部信息\";s:5:\"style\";s:25:\"width:450px;height:120px;\";}',1499309412),(3,'tel','input','a:3:{s:5:\"title\";s:12:\"网站电话\";s:4:\"tips\";s:12:\"网站电话\";s:5:\"style\";s:24:\"width:180px;height:24px;\";}',1499309814),(4,'about','textarea','a:3:{s:5:\"title\";s:24:\"网站首页公司简介\";s:4:\"tips\";s:24:\"网站首页公司简介\";s:5:\"style\";s:25:\"width:450px;height:120px;\";}',1499309863),(5,'left','textarea','a:3:{s:5:\"title\";s:24:\"网站侧边联系方式\";s:4:\"tips\";s:24:\"网站侧边联系方式\";s:5:\"style\";s:25:\"width:250px;height:160px;\";}',1499309962);
/*!40000 ALTER TABLE `zf_config_field` ENABLE KEYS */;

#
# Structure for table "zf_content"
#

DROP TABLE IF EXISTS `zf_content`;
CREATE TABLE `zf_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `style` varchar(24) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `posid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `sysadd` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '点击总数',
  `yesterdayviews` int(11) NOT NULL DEFAULT '0' COMMENT '最日',
  `dayviews` int(10) NOT NULL DEFAULT '0' COMMENT '今日点击数',
  `weekviews` int(10) NOT NULL DEFAULT '0' COMMENT '本周访问数',
  `monthviews` int(10) NOT NULL DEFAULT '0' COMMENT '本月访问',
  `viewsupdatetime` int(10) NOT NULL DEFAULT '0' COMMENT '点击数更新时间',
  PRIMARY KEY (`id`),
  KEY `status` (`status`,`listorder`,`id`),
  KEY `listorder` (`catid`,`status`,`listorder`,`id`),
  KEY `catid` (`catid`,`weekviews`,`views`,`dayviews`,`monthviews`,`status`,`id`),
  KEY `thumb` (`thumb`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "zf_content"
#

/*!40000 ALTER TABLE `zf_content` DISABLE KEYS */;
INSERT INTO `zf_content` VALUES (1,8,0,'测试','','/d/file/content/2017/08/5982c72a3a0ce.jpg','','','测试测试测试测试测试测试',0,'/index.php?a=shows&catid=8&id=1',0,99,1,0,'zhifeng',1501742893,1501742893,0,0,0,0,0,0);
/*!40000 ALTER TABLE `zf_content` ENABLE KEYS */;

#
# Structure for table "zf_content_data"
#

DROP TABLE IF EXISTS `zf_content_data`;
CREATE TABLE `zf_content_data` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `content` text COLLATE utf8_unicode_ci,
  `paginationtype` tinyint(1) NOT NULL DEFAULT '0',
  `maxcharperpage` mediumint(6) NOT NULL DEFAULT '0',
  `template` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `paytype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allow_comment` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "zf_content_data"
#

/*!40000 ALTER TABLE `zf_content_data` DISABLE KEYS */;
INSERT INTO `zf_content_data` VALUES (1,'<p>测试测试测试测试测试测试</p>',2,10000,'',0,1,'');
/*!40000 ALTER TABLE `zf_content_data` ENABLE KEYS */;

#
# Structure for table "zf_customlist"
#

DROP TABLE IF EXISTS `zf_customlist`;
CREATE TABLE `zf_customlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自定义列表ID',
  `url` char(100) NOT NULL DEFAULT '' COMMENT '访问地址',
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '列表标题',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '网页标题',
  `keywords` varchar(40) NOT NULL DEFAULT '' COMMENT '网页关键字',
  `description` text COMMENT '页面简介',
  `totalsql` text COMMENT '数据统计SQL',
  `listsql` text COMMENT '数据查询SQL',
  `lencord` int(11) NOT NULL DEFAULT '0' COMMENT '每页显示',
  `urlruleid` int(11) NOT NULL DEFAULT '0' COMMENT 'URL规则ID',
  `urlrule` varchar(120) NOT NULL DEFAULT '' COMMENT 'URL规则',
  `template` mediumtext COMMENT '模板',
  `listpath` varchar(60) NOT NULL DEFAULT '' COMMENT '列表模板文件',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义列表';

#
# Data for table "zf_customlist"
#

/*!40000 ALTER TABLE `zf_customlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_customlist` ENABLE KEYS */;

#
# Structure for table "zf_customtemp"
#

DROP TABLE IF EXISTS `zf_customtemp`;
CREATE TABLE `zf_customtemp` (
  `tempid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '模板ID',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '模板名称',
  `tempname` varchar(30) NOT NULL DEFAULT '' COMMENT '模板完整文件名',
  `temppath` varchar(200) NOT NULL DEFAULT '' COMMENT '模板生成路径',
  `temptext` mediumtext COMMENT '模板内容',
  PRIMARY KEY (`tempid`),
  KEY `tempname` (`tempname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义模板表';

#
# Data for table "zf_customtemp"
#

/*!40000 ALTER TABLE `zf_customtemp` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_customtemp` ENABLE KEYS */;

#
# Structure for table "zf_down"
#

DROP TABLE IF EXISTS `zf_down`;
CREATE TABLE `zf_down` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `style` varchar(24) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `posid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `sysadd` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '点击总数',
  `yesterdayviews` int(11) NOT NULL DEFAULT '0' COMMENT '最日',
  `dayviews` int(10) NOT NULL DEFAULT '0' COMMENT '今日点击数',
  `weekviews` int(10) NOT NULL DEFAULT '0' COMMENT '本周访问数',
  `monthviews` int(10) NOT NULL DEFAULT '0' COMMENT '本月访问',
  `viewsupdatetime` int(10) NOT NULL DEFAULT '0' COMMENT '点击数更新时间',
  PRIMARY KEY (`id`),
  KEY `status` (`status`,`listorder`,`id`),
  KEY `listorder` (`catid`,`status`,`listorder`,`id`),
  KEY `catid` (`catid`,`weekviews`,`views`,`dayviews`,`monthviews`,`status`,`id`),
  KEY `thumb` (`thumb`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "zf_down"
#

/*!40000 ALTER TABLE `zf_down` DISABLE KEYS */;
INSERT INTO `zf_down` VALUES (1,4,0,'资料下载','','','资料下载','','资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载',0,'/index.php?a=shows&catid=4&id=1',0,99,1,0,'zhifeng',1501744046,1501744046,0,0,0,0,0,0);
/*!40000 ALTER TABLE `zf_down` ENABLE KEYS */;

#
# Structure for table "zf_down_data"
#

DROP TABLE IF EXISTS `zf_down_data`;
CREATE TABLE `zf_down_data` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `content` text COLLATE utf8_unicode_ci,
  `paginationtype` tinyint(1) NOT NULL DEFAULT '0',
  `maxcharperpage` mediumint(6) NOT NULL DEFAULT '0',
  `template` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `paytype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allow_comment` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mdown` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "zf_down_data"
#

/*!40000 ALTER TABLE `zf_down_data` DISABLE KEYS */;
INSERT INTO `zf_down_data` VALUES (1,'<p>资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载资料下载</p>',2,10000,'',0,1,'','a:2:{i:0;a:4:{s:7:\"fileurl\";s:41:\"/d/file/content/2017/08/5982cb93dbd23.rar\";s:8:\"filename\";s:1:\"1\";s:7:\"groupid\";i:0;s:5:\"point\";i:0;}i:1;a:4:{s:7:\"fileurl\";s:41:\"/d/file/content/2017/08/5982cb9d7fea2.rar\";s:8:\"filename\";s:1:\"1\";s:7:\"groupid\";i:0;s:5:\"point\";i:0;}}');
/*!40000 ALTER TABLE `zf_down_data` ENABLE KEYS */;

#
# Structure for table "zf_links"
#

DROP TABLE IF EXISTS `zf_links`;
CREATE TABLE `zf_links` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '链接名称',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '链接图片',
  `target` varchar(25) NOT NULL DEFAULT '' COMMENT '链接打开方式',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '链接描述',
  `visible` tinyint(1) NOT NULL COMMENT '链接是否可见',
  `rating` int(11) NOT NULL DEFAULT '0' COMMENT '链接等级',
  `updated` int(11) NOT NULL COMMENT '链接最后更新时间',
  `notes` mediumtext NOT NULL COMMENT '链接详细介绍',
  `rss` varchar(255) NOT NULL DEFAULT '' COMMENT '链接RSS地址',
  `termsid` int(4) NOT NULL COMMENT '分类id',
  PRIMARY KEY (`id`),
  KEY `visible` (`visible`),
  KEY `termsid` (`termsid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接';

#
# Data for table "zf_links"
#

/*!40000 ALTER TABLE `zf_links` DISABLE KEYS */;
INSERT INTO `zf_links` VALUES (1,'http://www.zhifengchina.cn','智峰软件','','_blank','',1,0,1499310884,'','',1);
/*!40000 ALTER TABLE `zf_links` ENABLE KEYS */;

#
# Structure for table "zf_locking"
#

DROP TABLE IF EXISTS `zf_locking`;
CREATE TABLE `zf_locking` (
  `userid` int(11) NOT NULL COMMENT '用户ID',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `catid` smallint(5) NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `id` mediumint(8) NOT NULL DEFAULT '0' COMMENT '信息ID',
  `locktime` int(10) NOT NULL DEFAULT '0' COMMENT '锁定时间',
  KEY `userid` (`userid`),
  KEY `onlinetime` (`locktime`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT='信息锁定';

#
# Data for table "zf_locking"
#


#
# Structure for table "zf_loginlog"
#

DROP TABLE IF EXISTS `zf_loginlog`;
CREATE TABLE `zf_loginlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '登录帐号',
  `logintime` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间戳',
  `loginip` char(20) NOT NULL DEFAULT '' COMMENT '登录IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,1为登录成功，0为登录失败',
  `password` varchar(30) NOT NULL DEFAULT '' COMMENT '尝试错误密码',
  `info` varchar(255) NOT NULL DEFAULT '' COMMENT '其他说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='后台登陆日志表';

#
# Data for table "zf_loginlog"
#

/*!40000 ALTER TABLE `zf_loginlog` DISABLE KEYS */;
INSERT INTO `zf_loginlog` VALUES (1,'zhifeng',1499308920,'127.0.0.1',1,'密码保密','用户名登录'),(2,'zhifeng',1499322822,'127.0.0.1',1,'密码保密','用户名登录'),(3,'zhifeng',1499323944,'127.0.0.1',0,'34124','用户名登录'),(4,'zhifeng',1499323953,'127.0.0.1',1,'密码保密','用户名登录'),(5,'zhifeng',1499324087,'127.0.0.1',1,'密码保密','用户名登录'),(6,'zhifeng',1499325342,'127.0.0.1',1,'密码保密','用户名登录'),(7,'zhifeng',1499480635,'127.0.0.1',1,'密码保密','用户名登录'),(8,'zhifeng',1499481735,'127.0.0.1',1,'密码保密','用户名登录'),(9,'zhifeng',1499481924,'127.0.0.1',1,'密码保密','用户名登录'),(10,'zhifeng',1499649166,'127.0.0.1',1,'密码保密','用户名登录'),(11,'zhifeng',1499651450,'127.0.0.1',1,'密码保密','用户名登录'),(12,'zhifeng',1499651950,'127.0.0.1',1,'密码保密','用户名登录'),(13,'zhifeng',1499652086,'127.0.0.1',1,'密码保密','用户名登录'),(14,'shunshang',1499656755,'127.0.0.1',0,'ss654987','用户名登录'),(15,'zhifeng',1499656776,'127.0.0.1',1,'密码保密','用户名登录'),(16,'zhifeng',1499656817,'127.0.0.1',1,'密码保密','用户名登录'),(17,'zhifeng',1499733838,'127.0.0.1',1,'密码保密','用户名登录'),(18,'zhifeng',1499913985,'127.0.0.1',1,'密码保密','用户名登录'),(19,'zhifeng',1499928019,'127.0.0.1',1,'密码保密','用户名登录'),(20,'zhifeng',1499994333,'127.0.0.1',1,'密码保密','用户名登录'),(21,'zhifeng',1499995617,'127.0.0.1',1,'密码保密','用户名登录'),(22,'zhifeng',1500018545,'127.0.0.1',1,'密码保密','用户名登录'),(23,'zhifeng',1500428082,'127.0.0.1',1,'密码保密','用户名登录'),(24,'zhifeng',1501640075,'127.0.0.1',1,'密码保密','用户名登录'),(25,'zhifeng',1501643477,'127.0.0.1',1,'密码保密','用户名登录'),(26,'zhifeng',1501663793,'127.0.0.1',1,'密码保密','用户名登录'),(27,'zhifeng',1501666143,'127.0.0.1',1,'密码保密','用户名登录'),(28,'zhifeng',1501724975,'127.0.0.1',1,'密码保密','用户名登录'),(29,'zhifeng',1501729242,'127.0.0.1',1,'密码保密','用户名登录'),(30,'zhifeng',1501740790,'127.0.0.1',1,'密码保密','用户名登录'),(31,'zhifeng',1501742714,'127.0.0.1',1,'密码保密','用户名登录'),(32,'zhifeng',1501813591,'127.0.0.1',1,'密码保密','用户名登录');
/*!40000 ALTER TABLE `zf_loginlog` ENABLE KEYS */;

#
# Structure for table "zf_menu"
#

DROP TABLE IF EXISTS `zf_menu`;
CREATE TABLE `zf_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `app` char(20) NOT NULL DEFAULT '' COMMENT '应用标识',
  `controller` char(20) NOT NULL DEFAULT '' COMMENT '控制键',
  `action` char(20) NOT NULL DEFAULT '' COMMENT '方法',
  `parameter` char(255) NOT NULL DEFAULT '' COMMENT '附加参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID',
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

#
# Data for table "zf_menu"
#

/*!40000 ALTER TABLE `zf_menu` DISABLE KEYS */;
INSERT INTO `zf_menu` VALUES (1,'缓存更新',0,'Admin','Index','cache','',1,0,'',0),(2,'我的面板',0,'Admin','Config','index','',0,0,'',0),(3,'设置',0,'Admin','Config','index','',0,1,'',0),(4,'个人信息',2,'Admin','Adminmanage','myinfo','',0,1,'',0),(5,'修改个人信息',4,'Admin','Adminmanage','myinfo','',1,1,'',0),(6,'修改密码',4,'Admin','Adminmanage','chanpass','',1,1,'',0),(7,'系统设置',3,'Admin','Config','index','',0,1,'',0),(8,'站点配置',7,'Admin','Config','index','',1,1,'',0),(9,'邮箱配置',8,'Admin','Config','mail','',1,0,'',0),(10,'附件配置',8,'Admin','Config','attach','',1,1,'',0),(11,'高级配置',8,'Admin','Config','addition','',1,1,'',0),(12,'扩展配置',8,'Admin','Config','extend','',1,1,'',0),(13,'行为管理',7,'Admin','Behavior','index','',1,0,'',0),(14,'行为日志',13,'Admin','Behavior','logs','',1,1,'',0),(15,'编辑行为',13,'Admin','Behavior','edit','',1,0,'',0),(16,'删除行为',13,'Admin','Behavior','delete','',1,0,'',0),(17,'后台菜单管理',7,'Admin','Menu','index','',1,1,'',0),(18,'添加菜单',17,'Admin','Menu','add','',1,1,'',0),(19,'修改',17,'Admin','Menu','edit','',1,0,'',0),(20,'删除',17,'Admin','Menu','delete','',1,0,'',0),(21,'管理员设置',3,'Admin','Management','index','',0,1,'',0),(22,'管理员管理',21,'Admin','Management','manager','',1,1,'',0),(23,'添加管理员',22,'Admin','Management','adminadd','',1,1,'',0),(24,'编辑管理信息',22,'Admin','Management','edit','',1,0,'',0),(25,'删除管理员',22,'Admin','Management','delete','',1,0,'',0),(26,'角色管理',21,'Admin','Rbac','rolemanage','',1,1,'',0),(27,'添加角色',26,'Admin','Rbac','roleadd','',1,1,'',0),(28,'删除角色',26,'Admin','Rbac','roledelete','',1,0,'',0),(29,'角色编辑',26,'Admin','Rbac','roleedit','',1,0,'',0),(30,'角色授权',26,'Admin','Rbac','authorize','',1,0,'',0),(31,'日志管理',3,'Admin','Logs','index','',0,0,'',0),(32,'后台登陆日志',31,'Admin','Logs','loginlog','',1,1,'',0),(33,'后台操作日志',31,'Admin','Logs','index','',1,1,'',0),(34,'删除一个月前的登陆日志',32,'Admin','Logs','deleteloginlog','',1,1,'',0),(35,'删除一个月前的操作日志',33,'Admin','Logs','deletelog','',1,1,'',0),(36,'添加行为',13,'Admin','Behavior','add','',1,1,'',0),(37,'模块',0,'Admin','Module','index','',0,1,'',0),(38,'在线云平台',37,'Admin','Cloud','index','',0,0,'',0),(39,'模块商店',38,'Admin','Moduleshop','index','',1,1,'',0),(40,'插件商店',38,'Admin','Addonshop','index','',1,1,'',0),(41,'在线升级',38,'Admin','Upgrade','index','',1,0,'',0),(42,'本地模块管理',37,'Admin','Module','local','',0,1,'',0),(43,'模块管理',42,'Admin','Module','index','',1,1,'',0),(44,'内容',0,'Content','Index','index','',0,1,'',0),(45,'内容管理',44,'Content','Content','index','',0,1,'',0),(46,'内容相关设置',44,'Content','Category','index','',0,1,'',0),(47,'栏目列表',46,'Content','Category','index','',1,1,'',0),(48,'添加栏目',47,'Content','Category','add','',1,1,'',0),(49,'添加单页',47,'Content','Category','singlepage','',1,1,'',0),(50,'添加外部链接栏目',47,'Content','Category','wadd','',1,1,'',0),(51,'编辑栏目',47,'Content','Category','edit','',1,0,'',0),(52,'删除栏目',47,'Content','Category','delete','',1,0,'',0),(53,'栏目属性转换',47,'Content','Category','categoryshux','',1,0,'',0),(54,'模型管理',46,'Content','Models','index','',1,1,'',0),(55,'创建新模型',54,'Content','Models','add','',1,1,'',0),(56,'删除模型',54,'Content','Models','delete','',1,0,'',0),(57,'编辑模型',54,'Content','Models','edit','',1,0,'',0),(58,'模型禁用',54,'Content','Models','disabled','',1,0,'',0),(59,'模型导入',54,'Content','Models','import','',1,1,'',0),(60,'字段管理',54,'Content','Field','index','',1,0,'',0),(61,'字段修改',60,'Content','Field','edit','',1,0,'',0),(62,'字段删除',60,'Content','Field','delete','',1,0,'',0),(63,'字段状态',60,'Content','Field','disabled','',1,0,'',0),(64,'模型预览',60,'Content','Field','priview','',1,0,'',0),(65,'管理内容',45,'Content','Content','index','',1,1,'',0),(66,'附件管理',45,'Attachment','Atadmin','index','',1,1,'',0),(67,'删除',66,'Attachment','Atadmin','delete','',1,0,'',0),(68,'发布管理',44,'Content','Createhtml','index','',0,1,'',0),(69,'批量更新栏目页',68,'Content','Createhtml','category','',1,1,'',0),(70,'生成首页',68,'Content','Createhtml','index','',1,1,'',0),(71,'批量更新URL',68,'Content','Createhtml','update_urls','',1,1,'',0),(72,'批量更新内容页',68,'Content','Createhtml','update_show','',1,1,'',0),(73,'刷新自定义页面',68,'Template','Custompage','createhtml','',1,0,'',0),(74,'URL规则管理',46,'Content','Urlrule','index','',1,1,'',0),(75,'添加规则',74,'Content','Urlrule','add','',1,1,'',0),(76,'编辑',74,'Content','Urlrule','edit','',1,0,'',0),(77,'删除',74,'Content','Urlrule','delete','',1,0,'',0),(78,'推荐位管理',46,'Content','Position','index','',1,1,'',0),(79,'信息管理',78,'Content','Position','item','',1,0,'',0),(80,'添加推荐位',78,'Content','Position','add','',1,1,'',0),(81,'修改推荐位',78,'Content','Position','edit','',1,0,'',0),(82,'删除推荐位',78,'Content','Position','delete','',1,0,'',0),(83,'信息编辑',79,'Content','Position','item_manage','',1,0,'',0),(84,'信息排序',79,'Content','Position','item_listorder','',1,0,'',0),(85,'数据重建',78,'Content','Position','rebuilding','',1,0,'',0),(86,'Tags管理',45,'Content','Tags','index','',1,0,'',0),(87,'修改',86,'Content','Tags','edit','',1,0,'',0),(88,'删除',86,'Content','Tags','delete','',1,0,'',0),(89,'Tags数据重建',86,'Content','Tags','create','',1,1,'',0),(90,'界面',0,'Template','Style','index','',0,1,'',0),(91,'模板管理',90,'Template','Style','index','',0,1,'',0),(92,'模板风格',91,'Template','Style','index','',1,1,'',0),(93,'添加模板页',92,'Template','Style','add','',1,1,'',0),(94,'删除模板',92,'Template','Style','delete','',1,0,'',0),(95,'修改模板',92,'Template','Style','edit','',1,0,'',0),(96,'主题管理',91,'Template','Theme','index','',1,1,'',0),(97,'主题更换',96,'Template','Theme','chose','',1,0,'',0),(98,'自定义页面',90,'Template','Custompage','index','',0,0,'',0),(99,'自定义页面',98,'Template','Custompage','index','',1,1,'',0),(100,'添加自定义页面',99,'Template','Custompage','add','',1,1,'',0),(101,'删除自定义页面',99,'Template','Custompage','delete','',1,0,'',0),(102,'编辑自定义页面',99,'Template','Custompage','edit','',1,0,'',0),(103,'自定义列表',98,'Template','Customlist','index','',1,1,'',0),(104,'添加列表',103,'Template','Customlist','add','',1,1,'',0),(105,'删除列表',103,'Template','Customlist','delete','',1,0,'',0),(106,'编辑列表',103,'Template','Customlist','edit','',1,0,'',0),(107,'生成列表',103,'Template','Customlist','generate','',1,0,'',0),(108,'安装模块',39,'Admin','Moduleshop','install','',1,1,'',0),(109,'升级模块',39,'Admin','Moduleshop','upgrade','',1,0,'',0),(110,'安装插件',40,'Admin','Addonshop','install','',1,0,'',0),(111,'升级插件',40,'Admin','Addonshop','upgrade','',1,0,'',0),(112,'栏目授权',26,'Admin','Rbac','setting_cat_priv','',1,0,'',0),(113,'模板商店',38,'Admin','Templateshop','index','',1,1,'',0),(114,'3G手机版管理',42,'Wap','Wap','index','',1,1,'3G手机版管理！',0),(115,'修改',114,'Wap','Wap','edit','',1,0,'',0),(116,'友情链接',42,'Links','Links','index','',0,1,'友情链接！',0),(117,'添加友情链接',116,'Links','Links','add','',1,1,'',0),(118,'编辑',116,'Links','Links','edit','',1,0,'',0),(119,'删除',116,'Links','Links','delete','',1,0,'',0),(120,'分类管理',116,'Links','Links','terms','',1,1,'',0),(121,'扩展',0,'Addons','Addons','index','',0,0,'扩展管理！',0),(122,'插件管理',121,'Addons','Addons','index','',0,1,'',0),(123,'插件管理',122,'Addons','Addons','index','',1,1,'',0),(124,'创建新插件',123,'Addons','Addons','create','',1,1,'',0),(125,'本地安装',123,'Addons','Addons','local','',1,1,'',0),(126,'插件打包',123,'Addons','Addons','unpack','',1,0,'',0),(127,'插件后台列表',121,'Addons','Addons','addonadmin','',0,0,'',0),(128,'表单管理',42,'Formguide','Formguide','index','',0,1,'自定义表单管理！',0),(129,'添加表单',128,'Formguide','Formguide','add','',1,1,'',0),(130,'编辑',128,'Formguide','Formguide','edit','',1,0,'',0),(131,'删除',128,'Formguide','Formguide','delete','',1,0,'',0),(132,'禁用',128,'Formguide','Formguide','status','',1,0,'',0),(133,'信息列表',128,'Formguide','Info','index','',1,0,'',0),(134,'信息删除',133,'Formguide','Info','delete','',1,0,'',0),(135,'管理字段',128,'Formguide','Field','index','',1,0,'',0),(136,'添加字段',135,'Formguide','Field','add','',1,0,'',0),(137,'编辑字段',135,'Formguide','Field','edit','',1,0,'',0),(138,'删除字段',135,'Formguide','Field','delete','',1,0,'',0),(142,'搜索配置',42,'Search','Search','index','',0,1,'搜索配置！',0),(143,'重建索引',142,'Search','Search','create','',1,1,'',0),(144,'热门搜索',142,'Search','Search','searchot','',1,1,'',0);
/*!40000 ALTER TABLE `zf_menu` ENABLE KEYS */;

#
# Structure for table "zf_model"
#

DROP TABLE IF EXISTS `zf_model`;
CREATE TABLE `zf_model` (
  `modelid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `description` char(100) NOT NULL DEFAULT '' COMMENT '描述',
  `tablename` char(20) NOT NULL DEFAULT '' COMMENT '表名',
  `setting` text COMMENT '配置信息',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `items` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '信息数',
  `enablesearch` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启全站搜索',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用 1禁用',
  `default_style` char(30) NOT NULL DEFAULT '' COMMENT '风格',
  `category_template` char(30) NOT NULL DEFAULT '' COMMENT '栏目模板',
  `list_template` char(30) NOT NULL DEFAULT '' COMMENT '列表模板',
  `show_template` char(30) NOT NULL DEFAULT '' COMMENT '内容模板',
  `js_template` varchar(30) NOT NULL DEFAULT '' COMMENT 'JS模板',
  `sort` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '模块标识',
  PRIMARY KEY (`modelid`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='内容模型列表';

#
# Data for table "zf_model"
#

/*!40000 ALTER TABLE `zf_model` DISABLE KEYS */;
INSERT INTO `zf_model` VALUES (1,'文章模型','文章模型','content','',1499502325,0,0,0,'','','','','',0,0),(2,'下载','','down','',1501743767,0,0,0,'','','','','',0,0),(3,'产品','','product','',1501816435,0,0,0,'','','','','',0,0);
/*!40000 ALTER TABLE `zf_model` ENABLE KEYS */;

#
# Structure for table "zf_model_field"
#

DROP TABLE IF EXISTS `zf_model_field`;
CREATE TABLE `zf_model_field` (
  `fieldid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `field` varchar(20) NOT NULL DEFAULT '' COMMENT '字段名',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '别名',
  `tips` text COMMENT '字段提示',
  `css` varchar(30) NOT NULL DEFAULT '' COMMENT '表单样式',
  `minlength` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最小值',
  `maxlength` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最大值',
  `pattern` varchar(255) NOT NULL DEFAULT '' COMMENT '数据校验正则',
  `errortips` varchar(255) NOT NULL DEFAULT '' COMMENT '数据校验未通过的提示信息',
  `formtype` varchar(20) NOT NULL DEFAULT '' COMMENT '字段类型',
  `setting` mediumtext,
  `formattribute` varchar(255) NOT NULL DEFAULT '',
  `unsetgroupids` varchar(255) NOT NULL DEFAULT '',
  `unsetroleids` varchar(255) NOT NULL DEFAULT '',
  `iscore` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否内部字段 1是',
  `issystem` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否系统字段 1 是',
  `isunique` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '值唯一',
  `isbase` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '作为基本信息',
  `issearch` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '作为搜索条件',
  `isadd` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '在前台投稿中显示',
  `isfulltext` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '作为全站搜索信息',
  `isposition` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否入库到推荐位',
  `listorder` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 禁用 0启用',
  `isomnipotent` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fieldid`),
  KEY `modelid` (`modelid`,`disabled`),
  KEY `field` (`field`,`modelid`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='模型字段列表';

#
# Data for table "zf_model_field"
#

/*!40000 ALTER TABLE `zf_model_field` DISABLE KEYS */;
INSERT INTO `zf_model_field` VALUES (1,1,'status','状态','','',0,2,'','','box','','','','',1,1,0,1,0,0,0,0,15,0,0),(2,1,'username','用户名','','',0,20,'','','text','','','','',1,1,0,1,0,0,0,0,16,0,0),(3,1,'islink','转向链接','','',0,0,'','','islink','','','','',0,1,0,0,0,1,0,0,17,0,0),(4,1,'template','内容页模板','','',0,30,'','','template','a:2:{s:4:\"size\";s:0:\"\";s:12:\"defaultvalue\";s:0:\"\";}','','-99','-99',0,0,0,0,0,0,0,0,13,0,0),(5,1,'allow_comment','允许评论','','',0,0,'','','box','a:9:{s:7:\"options\";s:33:\"允许评论|1\r\n不允许评论|0\";s:7:\"boxtype\";s:5:\"radio\";s:9:\"fieldtype\";s:7:\"tinyint\";s:9:\"minnumber\";s:1:\"1\";s:5:\"width\";s:2:\"88\";s:4:\"size\";s:0:\"\";s:12:\"defaultvalue\";s:1:\"1\";s:10:\"outputtype\";s:1:\"1\";s:10:\"filtertype\";s:1:\"0\";}','','','',0,0,0,0,0,0,0,0,14,0,0),(6,1,'pages','分页方式','','',0,0,'','','pages','','','-99','-99',0,0,0,1,0,0,0,0,9,0,0),(7,1,'inputtime','真实发布时间','','',0,0,'','','datetime','a:3:{s:9:\"fieldtype\";s:3:\"int\";s:6:\"format\";s:11:\"Y-m-d H:i:s\";s:11:\"defaulttype\";s:1:\"0\";}','','','',1,1,0,0,0,0,0,1,11,0,0),(8,1,'posid','推荐位','','',0,0,'','','posid','a:4:{s:5:\"width\";s:3:\"125\";s:12:\"defaultvalue\";s:0:\"\";s:12:\"backstagefun\";s:0:\"\";s:8:\"frontfun\";s:0:\"\";}','','','',0,1,0,1,0,0,0,1,11,0,0),(9,1,'url','URL','','',0,100,'','','text','','','','',1,1,0,1,0,0,0,1,12,0,0),(10,1,'listorder','排序','','',0,6,'','','number','','','','',1,1,0,1,0,0,0,0,18,0,0),(11,1,'relation','相关文章','','',0,255,'','','omnipotent','a:4:{s:8:\"formtext\";s:464:\"<input type=\"hidden\" name=\"info[relation]\" id=\"relation\" value=\"{FIELD_VALUE}\" style=\"50\" >\n<ul class=\"list-dot\" id=\"relation_text\">\n</ul>\n<input type=\"button\" value=\"添加相关\" onClick=\"omnipotent(\'selectid\',GV.DIMAUB+\'index.php?a=public_relationlist&m=Content&g=Content&modelid={MODELID}\',\'添加相关文章\',1)\" class=\"btn\">\n<span class=\"edit_content\">\n  <input type=\"button\" value=\"显示已有\" onClick=\"show_relation({MODELID},{ID})\" class=\"btn\">\n</span>\";s:9:\"fieldtype\";s:7:\"varchar\";s:12:\"backstagefun\";s:0:\"\";s:8:\"frontfun\";s:0:\"\";}','','','',0,0,0,0,0,0,1,0,8,0,0),(12,1,'thumb','缩略图','','',0,100,'','','image','a:9:{s:4:\"size\";s:2:\"50\";s:12:\"defaultvalue\";s:0:\"\";s:9:\"show_type\";s:1:\"1\";s:14:\"upload_maxsize\";s:4:\"1024\";s:15:\"upload_allowext\";s:20:\"jpg|jpeg|gif|png|bmp\";s:9:\"watermark\";s:1:\"0\";s:13:\"isselectimage\";s:1:\"1\";s:12:\"images_width\";s:0:\"\";s:13:\"images_height\";s:0:\"\";}','','','',0,1,0,0,0,1,0,1,7,0,0),(13,1,'catid','栏目','','',1,6,'/^[0-9]{1,6}$/','请选择栏目','catid','a:1:{s:12:\"defaultvalue\";s:0:\"\";}','','-99','-99',0,1,0,1,1,1,0,0,1,0,0),(14,1,'typeid','类别','','',0,0,'','','typeid','a:2:{s:9:\"minnumber\";s:0:\"\";s:12:\"defaultvalue\";s:0:\"\";}','','','',1,1,0,1,1,1,0,0,2,0,0),(15,1,'title','标题','','inputtitle',1,80,'','请输入标题','title','','','','',0,1,0,1,1,1,1,1,3,0,0),(16,1,'keywords','关键词','多关键词之间用空格隔开','',0,40,'','','keyword','a:2:{s:4:\"size\";s:3:\"100\";s:12:\"defaultvalue\";s:0:\"\";}','','-99','-99',0,1,0,1,1,1,1,0,4,0,0),(17,1,'tags','TAGS','多关之间用空格或者“,”隔开','',0,0,'','','tags','a:4:{s:12:\"backstagefun\";s:0:\"\";s:17:\"backstagefun_type\";s:1:\"1\";s:8:\"frontfun\";s:0:\"\";s:13:\"frontfun_type\";s:1:\"1\";}','','','',0,1,0,1,0,0,0,0,4,0,0),(18,1,'description','摘要','','',0,255,'','','textarea','a:4:{s:5:\"width\";s:2:\"98\";s:6:\"height\";s:2:\"46\";s:12:\"defaultvalue\";s:0:\"\";s:10:\"enablehtml\";s:1:\"0\";}','','','',0,1,0,1,0,1,1,1,5,0,0),(19,1,'updatetime','发布时间','','',0,0,'','','datetime','a:3:{s:9:\"fieldtype\";s:3:\"int\";s:6:\"format\";s:11:\"Y-m-d H:i:s\";s:11:\"defaulttype\";s:1:\"0\";}','','','',0,1,0,0,0,0,0,0,10,0,0),(20,1,'content','内容','<style type=\"text/css\">.content_attr{ border:1px solid #CCC; padding:5px 8px; background:#FFC; margin-top:6px}</style><div class=\"content_attr\"><label><input name=\"add_introduce\" type=\"checkbox\"  value=\"1\" checked>是否截取内容</label><input type=\"text\" name=\"introcude_length\" value=\"200\" size=\"3\">字符至内容摘要\r\n<label><input type=\'checkbox\' name=\'auto_thumb\' value=\"1\" checked>是否获取内容第</label><input type=\"text\" name=\"auto_thumb_no\" value=\"1\" size=\"2\" class=\"\">张图片作为标题图片\r\n</div>','',1,999999,'','内容不能为空','editor','a:6:{s:7:\"toolbar\";s:4:\"full\";s:12:\"defaultvalue\";s:0:\"\";s:13:\"enablekeylink\";s:1:\"1\";s:10:\"replacenum\";s:1:\"2\";s:9:\"link_mode\";s:1:\"0\";s:15:\"enablesaveimage\";s:1:\"1\";}','','','',0,0,0,1,0,1,1,0,6,0,0),(21,2,'status','状态','','',0,2,'','','box','','','','',1,1,0,1,0,0,0,0,15,0,0),(22,2,'username','用户名','','',0,20,'','','text','','','','',1,1,0,1,0,0,0,0,16,0,0),(23,2,'islink','转向链接','','',0,0,'','','islink','','','','',0,1,0,0,0,1,0,0,17,0,0),(24,2,'template','内容页模板','','',0,30,'','','template','a:2:{s:4:\"size\";s:0:\"\";s:12:\"defaultvalue\";s:0:\"\";}','','-99','-99',0,0,0,0,0,0,0,0,13,0,0),(25,2,'allow_comment','允许评论','','',0,0,'','','box','a:9:{s:7:\"options\";s:33:\"允许评论|1\r\n不允许评论|0\";s:7:\"boxtype\";s:5:\"radio\";s:9:\"fieldtype\";s:7:\"tinyint\";s:9:\"minnumber\";s:1:\"1\";s:5:\"width\";s:2:\"88\";s:4:\"size\";s:0:\"\";s:12:\"defaultvalue\";s:1:\"1\";s:10:\"outputtype\";s:1:\"1\";s:10:\"filtertype\";s:1:\"0\";}','','','',0,0,0,0,0,0,0,0,14,0,0),(26,2,'pages','分页方式','','',0,0,'','','pages','','','-99','-99',0,0,0,1,0,0,0,0,9,0,0),(27,2,'inputtime','真实发布时间','','',0,0,'','','datetime','a:3:{s:9:\"fieldtype\";s:3:\"int\";s:6:\"format\";s:11:\"Y-m-d H:i:s\";s:11:\"defaulttype\";s:1:\"0\";}','','','',1,1,0,0,0,0,0,1,11,0,0),(28,2,'posid','推荐位','','',0,0,'','','posid','a:4:{s:5:\"width\";s:3:\"125\";s:12:\"defaultvalue\";s:0:\"\";s:12:\"backstagefun\";s:0:\"\";s:8:\"frontfun\";s:0:\"\";}','','','',0,1,0,1,0,0,0,1,11,0,0),(29,2,'url','URL','','',0,100,'','','text','','','','',1,1,0,1,0,0,0,1,12,0,0),(30,2,'listorder','排序','','',0,6,'','','number','','','','',1,1,0,1,0,0,0,0,18,0,0),(31,2,'relation','相关文章','','',0,255,'','','omnipotent','a:4:{s:8:\"formtext\";s:464:\"<input type=\"hidden\" name=\"info[relation]\" id=\"relation\" value=\"{FIELD_VALUE}\" style=\"50\" >\n<ul class=\"list-dot\" id=\"relation_text\">\n</ul>\n<input type=\"button\" value=\"添加相关\" onClick=\"omnipotent(\'selectid\',GV.DIMAUB+\'index.php?a=public_relationlist&m=Content&g=Content&modelid={MODELID}\',\'添加相关文章\',1)\" class=\"btn\">\n<span class=\"edit_content\">\n  <input type=\"button\" value=\"显示已有\" onClick=\"show_relation({MODELID},{ID})\" class=\"btn\">\n</span>\";s:9:\"fieldtype\";s:7:\"varchar\";s:12:\"backstagefun\";s:0:\"\";s:8:\"frontfun\";s:0:\"\";}','','','',0,0,0,0,0,0,1,0,8,0,0),(32,2,'thumb','缩略图','','',0,100,'','','image','a:9:{s:4:\"size\";s:2:\"50\";s:12:\"defaultvalue\";s:0:\"\";s:9:\"show_type\";s:1:\"1\";s:14:\"upload_maxsize\";s:4:\"1024\";s:15:\"upload_allowext\";s:20:\"jpg|jpeg|gif|png|bmp\";s:9:\"watermark\";s:1:\"0\";s:13:\"isselectimage\";s:1:\"1\";s:12:\"images_width\";s:0:\"\";s:13:\"images_height\";s:0:\"\";}','','','',0,1,0,0,0,1,0,1,7,0,0),(33,2,'catid','栏目','','',1,6,'/^[0-9]{1,6}$/','请选择栏目','catid','a:1:{s:12:\"defaultvalue\";s:0:\"\";}','','-99','-99',0,1,0,1,1,1,0,0,1,0,0),(34,2,'typeid','类别','','',0,0,'','','typeid','a:2:{s:9:\"minnumber\";s:0:\"\";s:12:\"defaultvalue\";s:0:\"\";}','','','',1,1,0,1,1,1,0,0,2,0,0),(35,2,'title','标题','','inputtitle',1,80,'','请输入标题','title','','','','',0,1,0,1,1,1,1,1,3,0,0),(36,2,'keywords','关键词','多关键词之间用空格隔开','',0,40,'','','keyword','a:2:{s:4:\"size\";s:3:\"100\";s:12:\"defaultvalue\";s:0:\"\";}','','-99','-99',0,1,0,1,1,1,1,0,4,0,0),(37,2,'tags','TAGS','多关之间用空格或者“,”隔开','',0,0,'','','tags','a:4:{s:12:\"backstagefun\";s:0:\"\";s:17:\"backstagefun_type\";s:1:\"1\";s:8:\"frontfun\";s:0:\"\";s:13:\"frontfun_type\";s:1:\"1\";}','','','',0,1,0,1,0,0,0,0,4,0,0),(38,2,'description','摘要','','',0,255,'','','textarea','a:4:{s:5:\"width\";s:2:\"98\";s:6:\"height\";s:2:\"46\";s:12:\"defaultvalue\";s:0:\"\";s:10:\"enablehtml\";s:1:\"0\";}','','','',0,1,0,1,0,1,1,1,5,0,0),(39,2,'updatetime','发布时间','','',0,0,'','','datetime','a:3:{s:9:\"fieldtype\";s:3:\"int\";s:6:\"format\";s:11:\"Y-m-d H:i:s\";s:11:\"defaulttype\";s:1:\"0\";}','','','',0,1,0,0,0,0,0,0,10,0,0),(40,2,'content','内容','<style type=\"text/css\">.content_attr{ border:1px solid #CCC; padding:5px 8px; background:#FFC; margin-top:6px}</style><div class=\"content_attr\"><label><input name=\"add_introduce\" type=\"checkbox\"  value=\"1\" checked>是否截取内容</label><input type=\"text\" name=\"introcude_length\" value=\"200\" size=\"3\">字符至内容摘要\r\n<label><input type=\'checkbox\' name=\'auto_thumb\' value=\"1\" checked>是否获取内容第</label><input type=\"text\" name=\"auto_thumb_no\" value=\"1\" size=\"2\" class=\"\">张图片作为标题图片\r\n</div>','',1,999999,'','内容不能为空','editor','a:6:{s:7:\"toolbar\";s:4:\"full\";s:12:\"defaultvalue\";s:0:\"\";s:13:\"enablekeylink\";s:1:\"1\";s:10:\"replacenum\";s:1:\"2\";s:9:\"link_mode\";s:1:\"0\";s:15:\"enablesaveimage\";s:1:\"1\";}','','','',0,0,0,1,0,1,1,0,6,0,0),(41,2,'mdown','下载文件','','',0,0,'','','downfiles','a:9:{s:15:\"upload_allowext\";s:11:\"rar,zip,doc\";s:13:\"isselectimage\";s:1:\"1\";s:13:\"upload_number\";s:2:\"10\";s:10:\"statistics\";s:0:\"\";s:12:\"downloadlink\";s:1:\"1\";s:12:\"backstagefun\";s:0:\"\";s:17:\"backstagefun_type\";s:1:\"1\";s:8:\"frontfun\";s:0:\"\";s:13:\"frontfun_type\";s:1:\"1\";}','','','',0,0,0,1,0,1,0,0,5,0,0);
/*!40000 ALTER TABLE `zf_model_field` ENABLE KEYS */;

#
# Structure for table "zf_module"
#

DROP TABLE IF EXISTS `zf_module`;
CREATE TABLE `zf_module` (
  `module` varchar(15) NOT NULL COMMENT '模块',
  `modulename` varchar(20) NOT NULL DEFAULT '' COMMENT '模块名称',
  `sign` varchar(255) NOT NULL DEFAULT '' COMMENT '签名',
  `iscore` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '内置模块',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否可用',
  `version` varchar(50) NOT NULL DEFAULT '' COMMENT '版本',
  `setting` mediumtext COMMENT '设置信息',
  `installtime` int(10) NOT NULL DEFAULT '0' COMMENT '安装时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`module`),
  KEY `sign` (`sign`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='已安装模块列表';

#
# Data for table "zf_module"
#

/*!40000 ALTER TABLE `zf_module` DISABLE KEYS */;
INSERT INTO `zf_module` VALUES ('Addons','插件管理','912b7e22bd9d86dddb1d460ca90581eb',0,1,'1.1.3','',1499310736,1499310736,0),('Formguide','表单','b19cc279ed484c13c96c2f7142e2f437',0,1,'1.0.1','',1499310758,1499310758,0),('Links','友情链接','960c30f9b119fa6c39a4a31867441c82',0,1,'1.0.0','',1499310208,1499310208,0),('Search','搜索','2e01dfe1d6be7e454aea66c442639b7e',0,1,'1.0.2','a:9:{s:7:\"modelid\";a:1:{i:0;s:1:\"1\";}s:13:\"relationenble\";s:1:\"1\";s:7:\"segment\";s:1:\"1\";s:9:\"dzsegment\";s:1:\"0\";s:8:\"pagesize\";s:2:\"10\";s:9:\"cachetime\";s:1:\"0\";s:12:\"sphinxenable\";s:1:\"0\";s:10:\"sphinxhost\";s:0:\"\";s:10:\"sphinxport\";s:0:\"\";}',1501816183,1501816183,0),('Templates','模板管理','7df96b18c230f90ada0a9e2307226338',0,1,'1.0.0','',1499310111,1499310111,0),('Wap','WAP手机版','4B7B06DA1101821D6AAE4B51BC96E6AF',0,1,'1.0.2','',1499310157,1499310157,0);
/*!40000 ALTER TABLE `zf_module` ENABLE KEYS */;

#
# Structure for table "zf_operationlog"
#

DROP TABLE IF EXISTS `zf_operationlog`;
CREATE TABLE `zf_operationlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `uid` smallint(6) NOT NULL DEFAULT '0' COMMENT '操作帐号ID',
  `time` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `ip` char(20) NOT NULL DEFAULT '' COMMENT 'IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0错误提示，1为正确提示',
  `info` text COMMENT '其他说明',
  `get` varchar(255) NOT NULL DEFAULT '' COMMENT 'get数据',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `username` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=497 DEFAULT CHARSET=utf8 COMMENT='后台操作日志表';

#
# Data for table "zf_operationlog"
#

/*!40000 ALTER TABLE `zf_operationlog` DISABLE KEYS */;
INSERT INTO `zf_operationlog` VALUES (1,0,1499308892,'127.0.0.1',0,'提示语：用户名或者密码不能为空，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(2,0,1499308909,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(3,1,1499309123,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(4,1,1499309124,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site'),(5,1,1499309124,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData'),(6,1,1499309127,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(7,1,1499309128,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=1'),(8,1,1499309128,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=2'),(9,1,1499309129,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=3'),(10,1,1499309129,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=4'),(11,1,1499309130,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=5'),(12,1,1499309130,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=6'),(13,1,1499309131,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=7'),(14,1,1499309131,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=8'),(15,1,1499309132,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=9'),(16,1,1499309188,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：attach<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=attach&menuid=8'),(17,1,1499309412,'127.0.0.1',1,'提示语：扩展配置项添加成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=extend&menuid=8'),(18,1,1499309479,'127.0.0.1',1,'提示语：扩展配置项添加成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=extend'),(19,1,1499309630,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(20,1,1499309631,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site'),(21,1,1499309632,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData'),(22,1,1499309635,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(23,1,1499309635,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=1'),(24,1,1499309636,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=2'),(25,1,1499309637,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=3'),(26,1,1499309637,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=4'),(27,1,1499309638,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=5'),(28,1,1499309638,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=6'),(29,1,1499309639,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=7'),(30,1,1499309639,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=8'),(31,1,1499309640,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=9'),(32,1,1499309645,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(33,1,1499309649,'127.0.0.1',1,'提示语：站点日志清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(34,1,1499309789,'127.0.0.1',1,'提示语：扩展配置项删除成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=extend&menuid=8'),(35,1,1499309814,'127.0.0.1',1,'提示语：扩展配置项添加成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=extend&menuid=8'),(36,1,1499309863,'127.0.0.1',1,'提示语：扩展配置项添加成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=extend'),(37,1,1499309963,'127.0.0.1',1,'提示语：扩展配置项添加成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=extend'),(38,1,1499309970,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=extend'),(39,1,1499310068,'127.0.0.1',1,'提示语：修改成功，请及时更新缓存！<br/>模块：Admin,控制器：Config,方法：addition<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Config&a=addition&menuid=8'),(40,1,1499310089,'127.0.0.1',0,'提示语：你还没有安装插件模块，无法使用插件商店！<br/>模块：Admin,控制器：Addonshop,方法：index<br/>请求方式：GET','http://zifi.com/admin.php'),(41,1,1499310111,'127.0.0.1',1,'提示语：文件下载完毕！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=7df96b18c230f90ada0a9e2307226338'),(42,1,1499310111,'127.0.0.1',1,'提示语：移动文件到模块目录中，等待安装！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_2<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=7df96b18c230f90ada0a9e2307226338'),(43,1,1499310111,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_3<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=7df96b18c230f90ada0a9e2307226338'),(44,1,1499310156,'127.0.0.1',1,'提示语：文件下载完毕！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=4B7B06DA1101821D6AAE4B51BC96E6AF'),(45,1,1499310157,'127.0.0.1',1,'提示语：移动文件到模块目录中，等待安装！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_2<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=4B7B06DA1101821D6AAE4B51BC96E6AF'),(46,1,1499310157,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_3<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=4B7B06DA1101821D6AAE4B51BC96E6AF'),(47,1,1499310208,'127.0.0.1',1,'提示语：文件下载完毕！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=960c30f9b119fa6c39a4a31867441c82'),(48,1,1499310208,'127.0.0.1',1,'提示语：移动文件到模块目录中，等待安装！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_2<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=960c30f9b119fa6c39a4a31867441c82'),(49,1,1499310208,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_3<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=960c30f9b119fa6c39a4a31867441c82'),(50,1,1499310245,'127.0.0.1',1,'提示语：文件下载完毕！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=b05344b0b2eecaa55327c00aeb5fd361'),(51,1,1499310245,'127.0.0.1',1,'提示语：移动文件到模块目录中，等待安装！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_2<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=b05344b0b2eecaa55327c00aeb5fd361'),(52,1,1499310717,'127.0.0.1',0,'提示语：你还没有安装插件模块，无法使用插件商店！<br/>模块：Admin,控制器：Addonshop,方法：index<br/>请求方式：GET','http://zifi.com/admin.php'),(53,1,1499310736,'127.0.0.1',1,'提示语：文件下载完毕！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=912b7e22bd9d86dddb1d460ca90581eb'),(54,1,1499310736,'127.0.0.1',1,'提示语：移动文件到模块目录中，等待安装！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_2<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=912b7e22bd9d86dddb1d460ca90581eb'),(55,1,1499310736,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_3<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=912b7e22bd9d86dddb1d460ca90581eb'),(56,1,1499310758,'127.0.0.1',1,'提示语：文件下载完毕！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=b19cc279ed484c13c96c2f7142e2f437'),(57,1,1499310758,'127.0.0.1',1,'提示语：移动文件到模块目录中，等待安装！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_2<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=b19cc279ed484c13c96c2f7142e2f437'),(58,1,1499310758,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_3<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Moduleshop&a=install&sign=b19cc279ed484c13c96c2f7142e2f437'),(59,1,1499310884,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Links,控制器：Links,方法：add<br/>请求方式：Ajax','http://zifi.com/index.php?g=Links&m=Links&a=add&menuid=116'),(60,1,1499311111,'127.0.0.1',1,'提示语：注销成功！<br/>模块：Admin,控制器：Public,方法：logout<br/>请求方式：GET','http://zifi.com/admin.php'),(61,0,1499313517,'127.0.0.1',0,'提示语：用户名或者密码不能为空，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(62,0,1499313875,'127.0.0.1',0,'提示语：用户名或者密码不能为空，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(63,1,1499322826,'127.0.0.1',1,'提示语：注销成功！<br/>模块：Admin,控制器：Public,方法：logout<br/>请求方式：GET','http://zifi.com/admin.php'),(64,0,1499323921,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(65,0,1499323934,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(66,0,1499323944,'127.0.0.1',0,'提示语：用户名或者密码错误，登陆失败！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(67,1,1499325332,'127.0.0.1',1,'提示语：注销成功！<br/>模块：Admin,控制器：Public,方法：logout<br/>请求方式：GET','http://zifi.com/admin.php'),(68,1,1499329898,'127.0.0.1',1,'提示语：清理缓存目录[Cloud]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(69,1,1499329899,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site'),(70,1,1499329900,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CCloud'),(71,1,1499329900,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CCloud%2CData'),(72,1,1499329904,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CCloud%2CData%2CTemp'),(73,1,1499329904,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=1'),(74,1,1499329905,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=2'),(75,1,1499329905,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=3'),(76,1,1499329906,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=4'),(77,1,1499329906,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=5'),(78,1,1499329907,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=6'),(79,1,1499329908,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=7'),(80,1,1499329908,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=8'),(81,1,1499329909,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=9'),(82,1,1499329910,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=10'),(83,1,1499329910,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=11'),(84,1,1499329960,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Admin,控制器：Public,方法：changyong<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Public&a=changyong'),(85,0,1499480628,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(86,1,1499481550,'127.0.0.1',1,'提示语：注销成功！<br/>模块：Admin,控制器：Public,方法：logout<br/>请求方式：GET','http://zifi.com/admin.php'),(87,0,1499481726,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(88,1,1499481782,'127.0.0.1',1,'提示语：注销成功！<br/>模块：Admin,控制器：Public,方法：logout<br/>请求方式：GET','http://zifi.com/admin.php'),(89,0,1499481916,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://zifi.com/admin.php?m=Public&a=login'),(90,1,1499502069,'127.0.0.1',1,'提示语：修改成功！<br/>模块：Content,控制器：Urlrule,方法：edit<br/>请求方式：Ajax','http://zifi.com/index.php?m=Urlrule&a=edit&urlruleid=2'),(91,1,1499502159,'127.0.0.1',1,'提示语：修改成功！<br/>模块：Content,控制器：Urlrule,方法：edit<br/>请求方式：Ajax','http://zifi.com/index.php?m=Urlrule&a=edit&urlruleid=3'),(92,1,1499502166,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(93,1,1499502167,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site'),(94,1,1499502168,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData'),(95,1,1499502171,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(96,1,1499502172,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=1'),(97,1,1499502172,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=2'),(98,1,1499502173,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=3'),(99,1,1499502173,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=4'),(100,1,1499502174,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=5'),(101,1,1499502175,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=6'),(102,1,1499502175,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=7'),(103,1,1499502176,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=8'),(104,1,1499502177,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=9'),(105,1,1499502177,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=10'),(106,1,1499502178,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=11'),(107,1,1499502193,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(108,1,1499502326,'127.0.0.1',1,'提示语：添加模型成功！<br/>模块：Content,控制器：Models,方法：add<br/>请求方式：Ajax','http://zifi.com/index.php?m=Models&a=add&menuid=54'),(109,1,1499502885,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://zifi.com/index.php?m=Category&a=add&menuid=47'),(110,1,1499502900,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://zifi.com/index.php?m=Category&a=edit&catid=1'),(111,1,1499503457,'127.0.0.1',1,'提示语：栏目删除成功！<br/>模块：Content,控制器：Category,方法：delete<br/>请求方式：Ajax','http://zifi.com/index.php?m=Category'),(112,1,1499503457,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://zifi.com/index.php?m=Category'),(113,1,1499649250,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=121'),(114,1,1499649274,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=2'),(115,1,1499649306,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=38'),(116,1,1499649358,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=43'),(117,1,1499649380,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=13'),(118,1,1499649401,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=31'),(119,1,1499649441,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=86'),(120,1,1499649477,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=98'),(121,1,1499650075,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=73'),(122,1,1499650088,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://zifi.com/admin.php?m=Menu&a=edit&id=9'),(123,1,1499650181,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(124,1,1499650182,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site'),(125,1,1499650182,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData'),(126,1,1499650186,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(127,1,1499650186,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=1'),(128,1,1499650187,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=2'),(129,1,1499650187,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=3'),(130,1,1499650188,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=4'),(131,1,1499650188,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=5'),(132,1,1499650189,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=6'),(133,1,1499650189,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=7'),(134,1,1499650190,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=8'),(135,1,1499650190,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=9'),(136,1,1499650191,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=10'),(137,1,1499650191,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=11'),(138,1,1499650206,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(139,1,1499650211,'127.0.0.1',1,'提示语：站点日志清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(140,1,1499650611,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(141,1,1499650612,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site'),(142,1,1499650613,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData'),(143,1,1499650614,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(144,1,1499650615,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=1'),(145,1,1499650615,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=2'),(146,1,1499650616,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=3'),(147,1,1499650616,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=4'),(148,1,1499650617,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=5'),(149,1,1499650617,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=6'),(150,1,1499650618,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=7'),(151,1,1499650618,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=8'),(152,1,1499650618,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=9'),(153,1,1499650619,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=10'),(154,1,1499650619,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=11'),(155,1,1499651232,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache'),(156,1,1499651232,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site'),(157,1,1499651233,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData'),(158,1,1499651236,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(159,1,1499651237,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=1'),(160,1,1499651237,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://zifi.com/admin.php?a=cache&type=site&stop=2'),(161,1,1499652107,'127.0.0.1',0,'提示语：主题未改变！<br/>模块：Template,控制器：Theme,方法：chose<br/>请求方式：GET','http://zifi.com/index.php?g=Template&m=Theme&menuid=96'),(162,0,1499656755,'127.0.0.1',0,'提示语：用户名或者密码错误，登陆失败！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://z.com/admin.php?m=Public&a=login'),(163,1,1499656778,'127.0.0.1',1,'提示语：注销成功！<br/>模块：Admin,控制器：Public,方法：logout<br/>请求方式：GET','http://z.com/admin.php'),(164,0,1499656796,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://z.com/admin.php?m=Public&a=login'),(165,1,1499754734,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Category&a=singlepage&menuid=47'),(166,1,1499754757,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Category&a=add&menuid=47'),(167,1,1499754778,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Category&a=add&menuid=47'),(168,1,1499754803,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Category&a=add&menuid=47'),(169,1,1499754819,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Category&a=singlepage&menuid=47'),(170,1,1499754822,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">5</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?m=Category&'),(171,1,1499754822,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?m=Category&a=public_cache'),(172,1,1499755366,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend&menuid=8'),(173,1,1499913998,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend&menuid=8'),(174,1,1499927088,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend&menuid=8'),(175,0,1499927999,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://z.com/admin.php?m=Public&a=login'),(176,1,1499928080,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Category&a=singlepage&menuid=47'),(177,1,1499928082,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">6</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?m=Category&'),(178,1,1499928082,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?m=Category&a=public_cache'),(179,1,1499929465,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache'),(180,1,1499931067,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend&menuid=8'),(181,1,1499932932,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://z.com/index.php?m=Category&a=edit&catid=3'),(182,1,1499932944,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://z.com/index.php?m=Category&a=edit&catid=5'),(183,1,1499932946,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">6</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?m=Category'),(184,1,1499932946,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?m=Category&a=public_cache'),(185,1,1499933038,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Content&a=add&catid=3'),(186,1,1499934001,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：index<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&menuid=8'),(187,1,1499934005,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：index<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&menuid=8'),(188,1,1499934162,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Content&a=add&catid=4'),(189,1,1499934173,'127.0.0.1',1,'提示语：添加成功！<font color=\"#FF0000\">请更新缓存！</font><br/>模块：Content,控制器：Position,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Position&a=add&menuid=78'),(190,1,1499934191,'127.0.0.1',1,'提示语：推送到推荐位成功！<br/>模块：Content,控制器：Content,方法：push<br/>请求方式：Ajax','http://z.com/index.php?g=Content&m=Content&a=push&action=position_list&modelid=1&catid=4&id=2'),(191,1,1499935111,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://z.com/admin.php?m=Menu&a=edit&id=108'),(192,1,1499935134,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache'),(193,1,1499935171,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://z.com/admin.php?m=Menu&a=edit&id=38'),(194,0,1499994327,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://z.com/admin.php?m=Public&a=login'),(195,1,1499995280,'127.0.0.1',1,'提示语：注销成功！<br/>模块：Admin,控制器：Public,方法：logout<br/>请求方式：GET','http://z.com/admin.php'),(196,0,1499995604,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://z.com/admin.php?m=Public&a=login'),(197,1,1499995705,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend&menuid=8'),(198,1,1499995729,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend&menuid=8'),(199,1,1499996071,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache'),(200,1,1499998126,'127.0.0.1',1,'提示语：3G版栏目配置更新成功！记得点击右上角的清除缓存！<br/>模块：Wap,控制器：Wap,方法：edit<br/>请求方式：Ajax','http://z.com/index.php?g=Wap&m=Wap&a=edit&catid=3'),(201,1,1499998128,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">6</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Wap,控制器：Wap,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?g=Wap&m=Wap&a=edit&catid=3'),(202,1,1499998129,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Wap,控制器：Wap,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?g=Wap&m=Wap&a=public_cache'),(203,1,1499998632,'127.0.0.1',1,'提示语：3G版栏目配置更新成功！记得点击右上角的清除缓存！<br/>模块：Wap,控制器：Wap,方法：edit<br/>请求方式：Ajax','http://z.com/index.php?g=Wap&m=Wap&a=edit&catid=5'),(204,1,1499998635,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">6</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Wap,控制器：Wap,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?g=Wap&m=Wap'),(205,1,1499998635,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Wap,控制器：Wap,方法：public_cache<br/>请求方式：GET','http://z.com/index.php?g=Wap&m=Wap&a=public_cache'),(206,1,1500014796,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend&menuid=8'),(207,1,1500014905,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Content&a=add&catid=5'),(208,1,1500015247,'127.0.0.1',1,'提示语：扩展配置项添加成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend&menuid=8'),(209,1,1500015258,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=extend'),(210,1,1500015431,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Content&a=add&catid=5'),(211,1,1500015492,'127.0.0.1',0,'提示语：推送的栏目不能是当前栏目！<br/>模块：Content,控制器：Content,方法：push<br/>请求方式：Ajax','http://z.com/index.php?m=Content&a=push&action=push_to_category&modelid=1&catid=5&id=4'),(212,1,1500015499,'127.0.0.1',0,'提示语：推送的栏目不能是当前栏目！<br/>模块：Content,控制器：Content,方法：push<br/>请求方式：Ajax','http://z.com/index.php?m=Content&a=push&action=push_to_category&modelid=1&catid=5&id=4'),(213,1,1500015536,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://z.com/index.php?m=Content&a=add&catid=4'),(214,1,1500015683,'127.0.0.1',1,'提示语：修改成功，请及时更新缓存！<br/>模块：Admin,控制器：Config,方法：addition<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=addition&menuid=8'),(215,1,1500015704,'127.0.0.1',1,'提示语：修改成功，请及时更新缓存！<br/>模块：Admin,控制器：Config,方法：addition<br/>请求方式：Ajax','http://z.com/admin.php?m=Config&a=addition&menuid=8'),(216,1,1500018548,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache'),(217,1,1500021668,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache'),(218,1,1500021668,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site'),(219,1,1500021669,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&dir=%2CData'),(220,1,1500021672,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(221,1,1500021673,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=1'),(222,1,1500021674,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=2'),(223,1,1500021675,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=3'),(224,1,1500021676,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=4'),(225,1,1500021677,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=5'),(226,1,1500021678,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=6'),(227,1,1500021679,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=7'),(228,1,1500021680,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=8'),(229,1,1500021681,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=9'),(230,1,1500021682,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=10'),(231,1,1500021683,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://z.com/admin.php?a=cache&type=site&stop=11'),(232,1,1500367328,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=singlepage&menuid=47'),(233,1,1500367369,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(234,1,1500367422,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(235,1,1500367472,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(236,1,1500367493,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(237,1,1500367515,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=singlepage&menuid=47'),(238,1,1500367547,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(239,1,1500367614,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">7</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&menuid=47'),(240,1,1500367614,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(241,1,1500367730,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=singlepage&menuid=47'),(242,1,1500367732,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">8</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&'),(243,1,1500367733,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(244,1,1500367958,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=1'),(245,1,1500367972,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=2'),(246,1,1500367981,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=1'),(247,1,1500367984,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">8</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&'),(248,1,1500367985,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(249,1,1500367985,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(250,1,1500367999,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=1'),(251,1,1500368008,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=2'),(252,1,1500368011,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">8</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(253,1,1500368011,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(254,1,1500368034,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=8'),(255,1,1500368035,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">8</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&'),(256,1,1500368036,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(257,0,1500428064,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://f.com/admin.php?m=Public&a=login'),(258,1,1500428155,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(259,1,1500429866,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(260,1,1500429942,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(261,1,1500429970,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(262,1,1500429995,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(263,1,1500430012,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(264,1,1500430101,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(265,1,1500430126,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(266,1,1500430232,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(267,1,1500430286,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(268,1,1500431083,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Content&a=add&catid=2'),(269,1,1500431130,'127.0.0.1',1,'提示语：修改成功！<br/>模块：Content,控制器：Content,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Content&a=edit&catid=2&id=6'),(270,1,1500432913,'127.0.0.1',1,'提示语：推送其他栏目成功！<br/>模块：Content,控制器：Content,方法：push<br/>请求方式：Ajax','http://f.com/index.php?m=Content&a=push&action=push_to_category&modelid=1&catid=2&id=6'),(271,1,1500433961,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(272,1,1500434407,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(273,1,1500434423,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=9'),(274,1,1500434653,'127.0.0.1',1,'提示语：扩展配置项删除成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(275,1,1500434669,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(276,1,1500446760,'127.0.0.1',1,'提示语：操作成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Content&a=add&catid=1'),(277,1,1500447034,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=2'),(278,1,1500447036,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">9</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(279,1,1500447036,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(280,1,1500447471,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=3'),(281,1,1500447474,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">9</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(282,1,1500447474,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(283,1,1500448936,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=4'),(284,1,1500448949,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">9</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(285,1,1500448950,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(286,1,1500450039,'127.0.0.1',1,'提示语：修改成功！<br/>模块：Content,控制器：Content,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Content&a=edit&catid=4&id=5'),(287,1,1500450052,'127.0.0.1',1,'提示语：修改成功！<br/>模块：Content,控制器：Content,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Content&a=edit&catid=4&id=2'),(288,1,1500450463,'127.0.0.1',1,'提示语：推送到推荐位成功！<br/>模块：Content,控制器：Content,方法：push<br/>请求方式：Ajax','http://f.com/index.php?g=Content&m=Content&a=push&action=position_list&modelid=1&catid=4&id=5'),(289,0,1501640069,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://f.com/admin.php?m=Public&a=login'),(290,1,1501640221,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：index<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&menuid=8'),(291,1,1501640435,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(292,1,1501642070,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&menuid=47'),(293,1,1501642098,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=singlepage&menuid=47'),(294,1,1501642122,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(295,1,1501642142,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(296,1,1501642491,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">3</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&menuid=47'),(297,1,1501642491,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(298,1,1501642524,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&menuid=47'),(299,1,1501642528,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">4</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(300,1,1501642528,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(301,1,1501642548,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=singlepage&menuid=47'),(302,1,1501642551,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">5</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&'),(303,1,1501642551,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(304,1,1501643469,'127.0.0.1',1,'提示语：注销成功！<br/>模块：Admin,控制器：Public,方法：logout<br/>请求方式：GET','http://f.com/admin.php'),(305,1,1501644903,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(306,1,1501644908,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(307,1,1501663795,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(308,1,1501663846,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(309,1,1501663971,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(310,1,1501664054,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(311,1,1501664079,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(312,1,1501664109,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=1'),(313,0,1501666130,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://f.com/index.php?g=Admin&m=Public&a=login'),(314,0,1501666137,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://f.com/index.php?g=Admin&m=Public&a=login'),(315,1,1501666149,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">5</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&menuid=47'),(316,1,1501666149,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(317,1,1501666443,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/index.php?g=Admin&m=Config&a=extend&menuid=8'),(318,1,1501724989,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=3'),(319,1,1501724991,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">5</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(320,1,1501724991,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(321,1,1501729267,'127.0.0.1',0,'提示语：云平台帐号不能为空！请进入网站设置->高级配置中进行配置。提示：配置完记得 更新缓存 ！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(322,1,1501729675,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://f.com/admin.php?m=Menu&a=edit&id=43'),(323,1,1501729688,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(324,1,1501729690,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(325,1,1501729691,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site'),(326,1,1501729691,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData'),(327,1,1501729694,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(328,1,1501729695,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=1'),(329,1,1501729695,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=2'),(330,1,1501729695,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=3'),(331,1,1501729696,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=4'),(332,1,1501729696,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=5'),(333,1,1501729696,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=6'),(334,1,1501729697,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=7'),(335,1,1501729697,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=8'),(336,1,1501729697,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=9'),(337,1,1501729698,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=10'),(338,1,1501729698,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=11'),(339,1,1501729721,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Module,方法：install<br/>请求方式：Ajax','http://f.com/admin.php?m=Module&a=install&module=Search'),(340,0,1501740785,'127.0.0.1',0,'提示语：验证码错误，请重新输入！<br/>模块：Admin,控制器：Public,方法：tologin<br/>请求方式：POST','http://f.com/admin.php?m=Public&a=login'),(341,1,1501740804,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=4'),(342,1,1501740806,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">5</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(343,1,1501740806,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(344,1,1501741272,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&parentid=3'),(345,1,1501741275,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">7</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(346,1,1501741275,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(347,1,1501742767,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Category,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=add&parentid=2'),(348,1,1501742776,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">8</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(349,1,1501742777,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(350,1,1501742893,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Content&a=add&catid=8'),(351,1,1501743768,'127.0.0.1',1,'提示语：添加模型成功！<br/>模块：Content,控制器：Models,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Models&a=add&menuid=54'),(352,1,1501743912,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Field,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Field&a=add&modelid=2'),(353,1,1501743924,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=4'),(354,1,1501743926,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">8</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(355,1,1501743926,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(356,1,1501743968,'127.0.0.1',1,'提示语：排序更新成功！<br/>模块：Content,控制器：Field,方法：listorder<br/>请求方式：Ajax','http://f.com/index.php?m=Field&modelid=2'),(357,1,1501744046,'127.0.0.1',1,'提示语：添加成功！<br/>模块：Content,控制器：Content,方法：add<br/>请求方式：Ajax','http://f.com/index.php?m=Content&a=add&catid=4'),(358,1,1501744268,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Content,控制器：Category,方法：edit<br/>请求方式：Ajax','http://f.com/index.php?m=Category&a=edit&catid=4'),(359,1,1501744270,'127.0.0.1',1,'提示语：栏目总数:<font color=\"#FF0000\">8</font>,每次处理:<font color=\"#FF0000\">100</font>,进度:<font color=\"#FF0000\">1/1</font>,栏目缓存更新中...<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category'),(360,1,1501744270,'127.0.0.1',1,'提示语：缓存更新成功！<br/>模块：Content,控制器：Category,方法：public_cache<br/>请求方式：GET','http://f.com/index.php?m=Category&a=public_cache'),(361,1,1501747373,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(362,1,1501748702,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Config,方法：extend<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=extend&menuid=8'),(363,1,1501813671,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(364,1,1501813673,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(365,1,1501813674,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site'),(366,1,1501813674,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData'),(367,1,1501813676,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(368,1,1501813677,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=1'),(369,1,1501813677,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=2'),(370,1,1501813677,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=3'),(371,1,1501813678,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=4'),(372,1,1501813678,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=5'),(373,1,1501813678,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=6'),(374,1,1501813679,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=7'),(375,1,1501813679,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=8'),(376,1,1501813679,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=9'),(377,1,1501813680,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=10'),(378,1,1501813680,'127.0.0.1',1,'提示语：更新缓存：全站搜索配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=11'),(379,1,1501813680,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=12'),(380,1,1501813688,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(381,1,1501813693,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(382,1,1501813693,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site'),(383,1,1501813693,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData'),(384,1,1501813695,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(385,1,1501813696,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=1'),(386,1,1501813696,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=2'),(387,1,1501813696,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=3'),(388,1,1501813697,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=4'),(389,1,1501813697,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=5'),(390,1,1501813697,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=6'),(391,1,1501813698,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=7'),(392,1,1501813698,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=8'),(393,1,1501813698,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=9'),(394,1,1501813699,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=9'),(395,1,1501813700,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=10'),(396,1,1501813700,'127.0.0.1',1,'提示语：更新缓存：全站搜索配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=11'),(397,1,1501813700,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=12'),(398,1,1501813721,'127.0.0.1',1,'提示语：状态转换成功，请及时更新缓存！<br/>模块：Admin,控制器：Module,方法：disabled<br/>请求方式：GET','http://f.com/admin.php?m=Module&menuid=43'),(399,1,1501813725,'127.0.0.1',1,'提示语：状态转换成功，请及时更新缓存！<br/>模块：Admin,控制器：Module,方法：disabled<br/>请求方式：GET','http://f.com/admin.php?m=Module'),(400,1,1501813730,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(401,1,1501813731,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site'),(402,1,1501813731,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData'),(403,1,1501813732,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(404,1,1501813732,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=1'),(405,1,1501813732,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=2'),(406,1,1501813733,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=3'),(407,1,1501813733,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=4'),(408,1,1501813733,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=5'),(409,1,1501813734,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=6'),(410,1,1501813734,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=7'),(411,1,1501813734,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=8'),(412,1,1501813735,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=9'),(413,1,1501813735,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=10'),(414,1,1501813735,'127.0.0.1',1,'提示语：更新缓存：全站搜索配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=11'),(415,1,1501813736,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=12'),(416,1,1501813737,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php'),(417,1,1501813740,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php'),(418,1,1501813741,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php'),(419,1,1501813962,'127.0.0.1',1,'提示语：模块卸载成功，请及时更新缓存！<br/>模块：Admin,控制器：Module,方法：uninstall<br/>请求方式：Ajax','http://f.com/admin.php?m=Module&menuid=43'),(420,1,1501813982,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(421,1,1501813985,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(422,1,1501813986,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site'),(423,1,1501813986,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData'),(424,1,1501813989,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(425,1,1501813990,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=1'),(426,1,1501813990,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=2'),(427,1,1501813990,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=3'),(428,1,1501813991,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=4'),(429,1,1501813991,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=5'),(430,1,1501813991,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=6'),(431,1,1501813992,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=7'),(432,1,1501813992,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=8'),(433,1,1501813992,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=9'),(434,1,1501813993,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=10'),(435,1,1501813993,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=11'),(436,1,1501814036,'127.0.0.1',0,'提示语：云平台帐号不能为空！请进入网站设置->高级配置中进行配置。提示：配置完记得 更新缓存 ！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(437,1,1501814254,'127.0.0.1',1,'提示语：修改成功，请及时更新缓存！<br/>模块：Admin,控制器：Config,方法：addition<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=addition&menuid=8'),(438,1,1501814256,'127.0.0.1',1,'提示语：修改成功，请及时更新缓存！<br/>模块：Admin,控制器：Config,方法：addition<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=addition&menuid=8'),(439,1,1501814427,'127.0.0.1',1,'提示语：修改成功，请及时更新缓存！<br/>模块：Admin,控制器：Config,方法：addition<br/>请求方式：Ajax','http://f.com/admin.php?m=Config&a=addition&menuid=8'),(440,1,1501814501,'127.0.0.1',0,'提示语：该帐号正在审核中，无法使用云平台功能！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(441,1,1501814583,'127.0.0.1',1,'提示语：文件下载完毕！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(442,1,1501814583,'127.0.0.1',1,'提示语：移动文件到模块目录中，等待安装！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_2<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(443,1,1501814583,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_3<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(444,1,1501814596,'127.0.0.1',1,'提示语：清理缓存目录[Cloud]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(445,1,1501814596,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site'),(446,1,1501814597,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CCloud'),(447,1,1501814597,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CCloud%2CData'),(448,1,1501814600,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CCloud%2CData%2CTemp'),(449,1,1501814601,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=1'),(450,1,1501814601,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=2'),(451,1,1501814601,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=3'),(452,1,1501814602,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=4'),(453,1,1501814602,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=5'),(454,1,1501814602,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=6'),(455,1,1501814603,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=7'),(456,1,1501814603,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=8'),(457,1,1501814603,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=9'),(458,1,1501814604,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=10'),(459,1,1501814604,'127.0.0.1',1,'提示语：更新缓存：全站搜索配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=11'),(460,1,1501814604,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=12'),(461,1,1501814605,'127.0.0.1',1,'提示语：缓存更新完毕！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=13'),(462,1,1501814878,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Module,方法：install<br/>请求方式：Ajax','http://f.com/admin.php?m=Module&a=install&module=Search_XL'),(463,1,1501814896,'127.0.0.1',1,'提示语：配置修改成功！<br/>模块：Search,控制器：Search,方法：index<br/>请求方式：Ajax','http://f.com/index.php?g=Search&m=Search&menuid=139'),(464,1,1501814901,'127.0.0.1',1,'提示语：模板缓存清理成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(465,1,1501814903,'127.0.0.1',1,'提示语：清理缓存目录[Data]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache'),(466,1,1501814903,'127.0.0.1',1,'提示语：清理缓存目录[Temp]成功！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site'),(467,1,1501814903,'127.0.0.1',1,'提示语：即将更新站点缓存！<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData'),(468,1,1501814906,'127.0.0.1',1,'提示语：更新缓存：网站配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&dir=%2CData%2CTemp'),(469,1,1501814907,'127.0.0.1',1,'提示语：更新缓存：可用模块列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=1'),(470,1,1501814907,'127.0.0.1',1,'提示语：更新缓存：行为列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=2'),(471,1,1501814908,'127.0.0.1',1,'提示语：更新缓存：后台菜单<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=3'),(472,1,1501814908,'127.0.0.1',1,'提示语：更新缓存：栏目索引<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=4'),(473,1,1501814908,'127.0.0.1',1,'提示语：更新缓存：模型列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=5'),(474,1,1501814909,'127.0.0.1',1,'提示语：更新缓存：URL规则<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=6'),(475,1,1501814909,'127.0.0.1',1,'提示语：更新缓存：模型字段<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=7'),(476,1,1501814909,'127.0.0.1',1,'提示语：更新缓存：推荐位<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=8'),(477,1,1501814909,'127.0.0.1',1,'提示语：更新缓存：插件列表<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=9'),(478,1,1501814910,'127.0.0.1',1,'提示语：更新缓存：自定义表单模型<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=10'),(479,1,1501814910,'127.0.0.1',1,'提示语：更新缓存：全站搜索配置<br/>模块：Admin,控制器：Index,方法：cache<br/>请求方式：GET','http://f.com/admin.php?a=cache&type=site&stop=11'),(480,1,1501815025,'127.0.0.1',1,'提示语：配置修改成功！<br/>模块：Search,控制器：Search,方法：index<br/>请求方式：Ajax','http://f.com/index.php?g=Search&m=Search&menuid=139'),(481,1,1501815821,'127.0.0.1',1,'提示语：模块卸载成功，请及时更新缓存！<br/>模块：Admin,控制器：Module,方法：uninstall<br/>请求方式：Ajax','http://f.com/admin.php?m=Module&menuid=43'),(482,1,1501815840,'127.0.0.1',1,'提示语：模块卸载成功，请及时更新缓存！<br/>模块：Admin,控制器：Module,方法：uninstall<br/>请求方式：Ajax','http://f.com/admin.php?m=Module&menuid=43'),(483,1,1501815966,'127.0.0.1',1,'提示语：模块卸载成功，请及时更新缓存！<br/>模块：Admin,控制器：Module,方法：uninstall<br/>请求方式：Ajax','http://f.com/admin.php?m=Module&menuid=43'),(484,1,1501816183,'127.0.0.1',1,'提示语：文件下载完毕！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_1<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(485,1,1501816183,'127.0.0.1',1,'提示语：移动文件到模块目录中，等待安装！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_2<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(486,1,1501816183,'127.0.0.1',1,'提示语：模块安装成功！<br/>模块：Admin,控制器：Moduleshop,方法：public_step_3<br/>请求方式：Ajax','http://f.com/admin.php?m=Moduleshop&a=install&sign=2e01dfe1d6be7e454aea66c442639b7e'),(487,1,1501816331,'127.0.0.1',1,'提示语：更新成功！<br/>模块：Admin,控制器：Menu,方法：edit<br/>请求方式：Ajax','http://f.com/admin.php?m=Menu&a=edit&id=38'),(488,1,1501826710,'127.0.0.1',1,'提示语：开始进行索引重建...<br/>模块：Search,控制器：Search,方法：create<br/>请求方式：POST','http://f.com/index.php?g=Search&m=Search&a=create&menuid=142'),(489,1,1501826714,'127.0.0.1',1,'提示语：模型【文章模型】更新完成 ...<br/>模块：Search,控制器：Search,方法：create<br/>请求方式：GET','http://f.com/index.php?g=Search&m=Search&a=create'),(490,1,1501826714,'127.0.0.1',1,'提示语：更新完成！ ...<br/>模块：Search,控制器：Search,方法：create<br/>请求方式：GET','http://f.com/index.php?g=Search&m=Search&a=create&start=1&pagesize=10&modelid=0'),(491,1,1501826739,'127.0.0.1',1,'提示语：开始进行索引重建...<br/>模块：Search,控制器：Search,方法：create<br/>请求方式：POST','http://f.com/index.php?g=Search&m=Search&a=create&menuid=142'),(492,1,1501826742,'127.0.0.1',1,'提示语：更新完成！ ...<br/>模块：Search,控制器：Search,方法：create<br/>请求方式：GET','http://f.com/index.php?g=Search&m=Search&a=create'),(493,1,1501826994,'127.0.0.1',1,'提示语：配置修改成功！<br/>模块：Search,控制器：Search,方法：index<br/>请求方式：Ajax','http://f.com/index.php?g=Search&m=Search&menuid=142'),(494,1,1501827164,'127.0.0.1',1,'提示语：配置修改成功！<br/>模块：Search,控制器：Search,方法：index<br/>请求方式：Ajax','http://f.com/index.php?g=Search&m=Search&menuid=142'),(495,1,1501827212,'127.0.0.1',1,'提示语：配置修改成功！<br/>模块：Search,控制器：Search,方法：index<br/>请求方式：Ajax','http://f.com/index.php?g=Search&m=Search&menuid=142'),(496,1,1501827215,'127.0.0.1',1,'提示语：配置修改成功！<br/>模块：Search,控制器：Search,方法：index<br/>请求方式：Ajax','http://f.com/index.php?g=Search&m=Search&menuid=142');
/*!40000 ALTER TABLE `zf_operationlog` ENABLE KEYS */;

#
# Structure for table "zf_page"
#

DROP TABLE IF EXISTS `zf_page`;
CREATE TABLE `zf_page` (
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `title` varchar(160) NOT NULL DEFAULT '' COMMENT '标题',
  `style` varchar(24) NOT NULL DEFAULT '' COMMENT '样式',
  `keywords` varchar(40) NOT NULL DEFAULT '' COMMENT '关键字',
  `content` text COMMENT '内容',
  `template` varchar(30) NOT NULL DEFAULT '',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`catid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='单页内容表';

#
# Data for table "zf_page"
#

/*!40000 ALTER TABLE `zf_page` DISABLE KEYS */;
INSERT INTO `zf_page` VALUES (1,'关于我们','','','<p style=\"text-align: center;\"><img src=\"/d/file/contents/2017/07/596f0018f2f53.jpg\" title=\"5c3774a08457284225a459bb8e6895aa.jpg\" alt=\"5c3774a08457284225a459bb8e6895aa.jpg\"/></p>','',1500446760);
/*!40000 ALTER TABLE `zf_page` ENABLE KEYS */;

#
# Structure for table "zf_position"
#

DROP TABLE IF EXISTS `zf_position`;
CREATE TABLE `zf_position` (
  `posid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `modelid` char(30) NOT NULL DEFAULT '' COMMENT '模型id',
  `catid` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目id',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '推荐位名称',
  `maxnum` smallint(5) NOT NULL DEFAULT '20' COMMENT '最大存储数据量',
  `extention` char(100) NOT NULL DEFAULT '',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`posid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='推荐位';

#
# Data for table "zf_position"
#

/*!40000 ALTER TABLE `zf_position` DISABLE KEYS */;
INSERT INTO `zf_position` VALUES (1,'1','0','推荐',10,'',0);
/*!40000 ALTER TABLE `zf_position` ENABLE KEYS */;

#
# Structure for table "zf_position_data"
#

DROP TABLE IF EXISTS `zf_position_data`;
CREATE TABLE `zf_position_data` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'ID',
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `posid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位ID',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '模型',
  `modelid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `thumb` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否有缩略图',
  `data` mediumtext COMMENT '数据信息',
  `listorder` mediumint(8) NOT NULL DEFAULT '0' COMMENT '排序',
  `expiration` int(10) NOT NULL,
  `extention` char(30) NOT NULL DEFAULT '',
  `synedit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否同步编辑',
  KEY `posid` (`posid`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐位数据表';

#
# Data for table "zf_position_data"
#

/*!40000 ALTER TABLE `zf_position_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_position_data` ENABLE KEYS */;

#
# Structure for table "zf_role"
#

DROP TABLE IF EXISTS `zf_role`;
CREATE TABLE `zf_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parentid` smallint(6) NOT NULL DEFAULT '0' COMMENT '父角色ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`id`),
  KEY `parentId` (`parentid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色信息列表';

#
# Data for table "zf_role"
#

/*!40000 ALTER TABLE `zf_role` DISABLE KEYS */;
INSERT INTO `zf_role` VALUES (1,'超级管理员',0,1,'拥有网站最高管理员权限！',1329633709,1329633709,0),(2,'站点管理员',1,1,'站点管理员',1329633722,1399780945,0),(3,'发布人员',2,1,'发布人员',1329633733,1399798954,0);
/*!40000 ALTER TABLE `zf_role` ENABLE KEYS */;

#
# Structure for table "zf_search"
#

DROP TABLE IF EXISTS `zf_search`;
CREATE TABLE `zf_search` (
  `searchid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '信息id',
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目id',
  `modelid` smallint(5) NOT NULL COMMENT '模型id',
  `adddate` int(10) unsigned NOT NULL COMMENT '添加时间',
  `data` text NOT NULL COMMENT '数据',
  PRIMARY KEY (`searchid`),
  KEY `id` (`id`,`catid`,`adddate`) USING BTREE,
  KEY `modelid` (`modelid`,`catid`),
  FULLTEXT KEY `data` (`data`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='全站搜索数据表';

#
# Data for table "zf_search"
#

/*!40000 ALTER TABLE `zf_search` DISABLE KEYS */;
INSERT INTO `zf_search` VALUES (2,1,8,1,1501742893,'测试 ');
/*!40000 ALTER TABLE `zf_search` ENABLE KEYS */;

#
# Structure for table "zf_search_keyword"
#

DROP TABLE IF EXISTS `zf_search_keyword`;
CREATE TABLE `zf_search_keyword` (
  `keyword` char(20) NOT NULL COMMENT '关键字',
  `pinyin` char(20) NOT NULL COMMENT '关键字拼音',
  `searchnums` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '搜索次数',
  `data` char(20) NOT NULL,
  UNIQUE KEY `keyword` (`keyword`),
  UNIQUE KEY `pinyin` (`pinyin`),
  FULLTEXT KEY `data` (`data`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='搜索关键字表';

#
# Data for table "zf_search_keyword"
#

/*!40000 ALTER TABLE `zf_search_keyword` DISABLE KEYS */;
INSERT INTO `zf_search_keyword` VALUES ('测','ce',37,''),('试','shi',1,''),('测试','ceshi',1,'');
/*!40000 ALTER TABLE `zf_search_keyword` ENABLE KEYS */;

#
# Structure for table "zf_tags"
#

DROP TABLE IF EXISTS `zf_tags`;
CREATE TABLE `zf_tags` (
  `tagid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'tagID',
  `tag` char(20) NOT NULL DEFAULT '' COMMENT 'tag名称',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keyword` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo简介',
  `style` char(5) NOT NULL DEFAULT '' COMMENT '附加状态码',
  `usetimes` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '信息总数',
  `lastusetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后使用时间',
  `hits` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `lasthittime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近访问时间',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`tagid`),
  UNIQUE KEY `tag` (`tag`),
  KEY `usetimes` (`usetimes`,`listorder`),
  KEY `hits` (`hits`,`listorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='tags主表';

#
# Data for table "zf_tags"
#

/*!40000 ALTER TABLE `zf_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_tags` ENABLE KEYS */;

#
# Structure for table "zf_tags_content"
#

DROP TABLE IF EXISTS `zf_tags_content`;
CREATE TABLE `zf_tags_content` (
  `tag` char(20) NOT NULL COMMENT 'tag名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '信息地址',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '标题',
  `modelid` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `contentid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '信息ID',
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  KEY `modelid` (`modelid`,`contentid`),
  KEY `tag` (`tag`(10))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='tags数据表';

#
# Data for table "zf_tags_content"
#

/*!40000 ALTER TABLE `zf_tags_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `zf_tags_content` ENABLE KEYS */;

#
# Structure for table "zf_terms"
#

DROP TABLE IF EXISTS `zf_terms`;
CREATE TABLE `zf_terms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `parentid` smallint(5) NOT NULL DEFAULT '0' COMMENT '父ID',
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '分类名称',
  `module` varchar(200) NOT NULL DEFAULT '' COMMENT '所属模块',
  `setting` mediumtext COMMENT '相关配置信息',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `module` (`module`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='分类表';

#
# Data for table "zf_terms"
#

/*!40000 ALTER TABLE `zf_terms` DISABLE KEYS */;
INSERT INTO `zf_terms` VALUES (1,0,'友情链接','links','');
/*!40000 ALTER TABLE `zf_terms` ENABLE KEYS */;

#
# Structure for table "zf_urlrule"
#

DROP TABLE IF EXISTS `zf_urlrule`;
CREATE TABLE `zf_urlrule` (
  `urlruleid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id',
  `module` varchar(15) NOT NULL DEFAULT '' COMMENT '所属模块',
  `file` varchar(20) NOT NULL DEFAULT '' COMMENT '所属文件',
  `ishtml` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '生成静态规则 1 静态',
  `urlrule` varchar(255) NOT NULL DEFAULT '' COMMENT 'url规则',
  `example` varchar(255) NOT NULL DEFAULT '' COMMENT '示例',
  PRIMARY KEY (`urlruleid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='内容模型URL规则';

#
# Data for table "zf_urlrule"
#

/*!40000 ALTER TABLE `zf_urlrule` DISABLE KEYS */;
INSERT INTO `zf_urlrule` VALUES (1,'content','category',0,'index.php?a=lists&catid={$catid}|index.php?a=lists&catid={$catid}&page={$page}','动态：index.php?a=lists&catid=1&page=1'),(2,'content','category',1,'{$categorydir}{$catdir}/index.html|{$categorydir}{$catdir}/index_{$page}.html','news/china/'),(3,'content','show',1,'{$categorydir}{$catdir}/{$id}.html|{$categorydir}{$catdir}/{$id}_{$page}.html','news/china/1.html'),(4,'content','show',0,'index.php?a=shows&catid={$catid}&id={$id}|index.php?a=shows&catid={$catid}&id={$id}&page={$page}','动态：index.php?m=Index&a=shows&catid=1&id=1'),(5,'content','category',1,'news/{$catid}.shtml|news/{$catid}-{$page}.shtml','静态：news/1.shtml'),(6,'content','category',0,'list-{$catid}.html|list-{$catid}-{$page}.html','伪静态：list-1-1.html'),(7,'content','tags',0,'index.php?a=tags&amp;tagid={$tagid}|index.php?a=tags&amp;tagid={$tagid}&amp;page={$page}','动态：index.php?a=tags&amp;tagid=1'),(8,'content','tags',0,'index.php?a=tags&amp;tag={$tag}|/index.php?a=tags&amp;tag={$tag}&amp;page={$page}','动态：index.php?a=tags&amp;tag=标签'),(9,'content','tags',0,'tag-{$tag}.html|tag-{$tag}-{$page}.html','伪静态：tag-标签.html'),(10,'content','tags',0,'tag-{$tagid}.html|tag-{$tagid}-{$page}.html','伪静态：tag-1.html'),(11,'content','index',1,'index.html|index_{$page}.html','静态：index_2.html'),(12,'content','index',0,'index.html|index_{$page}.html','伪静态：index_2.html'),(13,'content','index',0,'index.php|index.php?page={$page}','动态：index.php?page=2'),(14,'content','category',1,'download.shtml|download_{$page}.shtml','静态：download.shtml'),(15,'content','show',1,'{$categorydir}{$id}.shtml|{$categorydir}{$id}_{$page}.shtml','静态：/父栏目/1.shtml'),(16,'content','show',1,'{$catdir}/{$id}.shtml|{$catdir}/{$id}_{$page}.shtml','示例：/栏目/1.html');
/*!40000 ALTER TABLE `zf_urlrule` ENABLE KEYS */;

#
# Structure for table "zf_user"
#

DROP TABLE IF EXISTS `zf_user`;
CREATE TABLE `zf_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称/姓名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `bind_account` varchar(50) NOT NULL DEFAULT '' COMMENT '绑定帐户',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(40) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  `verify` varchar(32) NOT NULL DEFAULT '' COMMENT '证验码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `role_id` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '对应角色ID',
  `info` text COMMENT '信息',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

#
# Data for table "zf_user"
#

/*!40000 ALTER TABLE `zf_user` DISABLE KEYS */;
INSERT INTO `zf_user` VALUES (1,'zhifeng','未知','ca9e056800f097303f368e1ac25f8896','',1501813591,'127.0.0.1','HvK8Rf','admin@abc3210.com','备注信息',1499308881,1499308881,1,1,'');
/*!40000 ALTER TABLE `zf_user` ENABLE KEYS */;
