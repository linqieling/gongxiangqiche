--
-- TQCMS  数据库SQL
-- 生成日期: 2015 年 1 月 1 日 00:00
--

--
-- 数据库: 'TQCMS'
--

-- --------------------------------------------------------

-- 
-- 表的结构 `plug_wheel`
-- 

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
-- Table structure for `plug_lottery`
-- ----------------------------
DROP TABLE IF EXISTS `plug_lottery`;
CREATE TABLE `plug_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `joinnum` int(11) DEFAULT NULL COMMENT '参与人数',
  `starpicurl` varchar(100) DEFAULT NULL COMMENT '填写活动开始图片网址',
  `title` varchar(60) DEFAULT NULL COMMENT '活动名称',
  `txt` varchar(60) DEFAULT NULL COMMENT '用户输入兑奖时候的显示信息',
  `sttxt` varchar(200) DEFAULT NULL COMMENT '简介',
  `statdate` int(11) DEFAULT NULL COMMENT '活动开始时间',
  `enddate` int(11) DEFAULT NULL COMMENT '活动结束时间',
  `info` mediumtext COMMENT '活动说明',
  `aginfo` varchar(200) DEFAULT NULL COMMENT '重复抽奖回复',
  `endtite` varchar(60) DEFAULT NULL COMMENT '活动结束公告主题',
  `endpicurl` varchar(100) DEFAULT NULL,
  `endinfo` varchar(60) DEFAULT NULL,
  `allpeople` int(11) DEFAULT NULL,
  `canrqnums` int(2) DEFAULT NULL COMMENT '个人限制抽奖次数',
  `jp1` varchar(300) DEFAULT NULL,
  `jp2` varchar(300) DEFAULT NULL,
  `jp3` varchar(300) DEFAULT NULL,
  `jp4` varchar(300) DEFAULT NULL,
  `jp5` varchar(300) DEFAULT NULL,
  `jp6` varchar(300) DEFAULT NULL,
  `jp7` varchar(300) DEFAULT NULL,
  `j1` int(4) DEFAULT NULL,
  `j2` int(4) DEFAULT NULL,
  `j3` int(4) DEFAULT NULL,
  `j4` int(4) DEFAULT NULL,
  `j5` int(4) DEFAULT NULL,
  `j6` int(4) DEFAULT NULL,
  `j7` int(4) DEFAULT NULL,
  `s1` int(4) DEFAULT NULL,
  `s2` int(4) DEFAULT NULL,
  `s3` int(4) DEFAULT NULL,
  `s4` int(4) DEFAULT NULL,
  `s5` int(4) DEFAULT NULL,
  `s6` int(4) DEFAULT NULL,
  `s7` int(4) DEFAULT NULL,
  `viewnum` mediumint(8) DEFAULT '0',
  `dateline` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `plug_lotteryrecord`
-- ----------------------------
DROP TABLE IF EXISTS `plug_lotteryrecord`;
CREATE TABLE `plug_lotteryrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `lotteryid` mediumint(8) NOT NULL,
  `wxopenid` varchar(60) NOT NULL COMMENT '微信唯一识别码',
  `wechatname` varchar(250) NOT NULL,
  `prizetype` int(1) NOT NULL COMMENT '是否中奖',
  `phone` varchar(15) NOT NULL,
  `sn` varchar(15) NOT NULL COMMENT '中奖后序列号',
  `ip` varchar(60) NOT NULL,
  `dateline` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

