--
-- TQCMS  数据库SQL
-- 生成日期: 2015 年 1 月 1 日 00:00
--

--
-- 数据库: 'TQCMS'
--

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `plug_config`
-- ----------------------------
DROP TABLE IF EXISTS `plug_config`;
CREATE TABLE `plug_config` (
  `var` varchar(20) NOT NULL DEFAULT '',
  `datavalue` text NOT NULL,
  PRIMARY KEY (`var`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of plug_config
-- ----------------------------
INSERT INTO `plug_config` VALUES ('sitename', '');
INSERT INTO `plug_config` VALUES ('template', 'default');

-- ----------------------------
-- Table structure for `plug_vote`
-- ----------------------------
DROP TABLE IF EXISTS `plug_vote`;
CREATE TABLE `plug_vote` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `name` varchar(150) NOT NULL,
  `brief` mediumtext NOT NULL,
  `banner1` varchar(60) NOT NULL,
  `banner2` varchar(60) NOT NULL,
  `banner3` varchar(60) NOT NULL,
  `starttime` int(10) NOT NULL,
  `endtime` int(10) NOT NULL,
  `desctitleA` varchar(60) NOT NULL,
  `desccontentA` mediumtext NOT NULL,
  `desctitleB` varchar(60) NOT NULL,
  `desccontentB` mediumtext NOT NULL,
  `desctitleC` varchar(60) NOT NULL,
  `desccontentC` mediumtext NOT NULL,
  `detailurl` text NOT NULL,
	`applycontent` text NOT NULL,
  `joincontent` text NOT NULL, 
	`topnotice` text NOT NULL, 
  `votelimit` mediumint(8) NOT NULL,
  `viewnum` mediumint(8) NOT NULL,
  `iplimit` tinyint(1) NOT NULL,
  `ipid` varchar(25) NOT NULL,
  `ipscope` tinyint(1) NOT NULL,
  `ipnubs` mediumint(8) NOT NULL,
  `tpnub` mediumint(8) NOT NULL,
  `tpxznub` tinyint(1) NOT NULL,
  `dateline` int(10) NOT NULL,
  `updatetime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `plug_voteitem`
-- ----------------------------
DROP TABLE IF EXISTS `plug_voteitem`;
CREATE TABLE `plug_voteitem` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `voteid` mediumint(8) unsigned NOT NULL,
  `weight` mediumint(8) NOT NULL,
  `openid` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `qq` varchar(25) NOT NULL,
  `content` mediumtext NOT NULL,
  `votenum` mediumint(8) NOT NULL,
  `viewnum` mediumint(8) unsigned NOT NULL,
  `picfilepathA` varchar(60) NOT NULL,
  `picfilepathB` varchar(60) NOT NULL,
  `picfilepathC` varchar(60) NOT NULL,
  `picfilepathD` varchar(60) NOT NULL,
  `picfilepathE` varchar(60) NOT NULL,
  `pass` tinyint(1) NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `plug_voterecord`
-- ----------------------------
DROP TABLE IF EXISTS `plug_voterecord`;
CREATE TABLE `plug_voterecord` (

  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `voteid` mediumint(8) NOT NULL,
  `itemid` mediumint(8) NOT NULL,
  `openid` varchar(250) NOT NULL,
  `cookies` varchar(60) NOT NULL,
  `ip` varchar(60) NOT NULL,
  `voteday` int(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of plug_voterecord
-- ----------------------------