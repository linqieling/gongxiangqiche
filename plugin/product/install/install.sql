--
-- TQCMS  数据库SQL
-- 生成日期: 2015 年 1 月 1 日 00:00
--

--
-- 数据库: 'TQCMS'
--

-- --------------------------------------------------------

-- 
-- 表的结构 `plug_category`
-- 
create table `plug_category` (
  `catid` mediumint(8) unsigned not null auto_increment,
  `pid` mediumint(8) unsigned not null,
  `level` smallint(6) unsigned not null,
  `weight` mediumint(8) not null,
  `catname` varchar(50) not null,
  `ckeywords` varchar(250) not null, 
  `cdescription` varchar(250) not null, 
  `visual` tinyint(1) not null,
  primary key  (`catid`)
) engine=myisam;

-- 
-- 表的结构 `plug_product`
-- 

create table `plug_product` (
  `id` mediumint(8) unsigned not null auto_increment,
  `uid` mediumint(8) unsigned not null,
  `catid` mediumint(8) unsigned not null,
  `name` varchar(50) not null,
  `content` mediumtext not null,
  `picfilepath` varchar(60) not null,
  `dateline` int(10) unsigned not null,
  `updatetime` int(10) unsigned not null,
  `topdateline` int(10) unsigned not null,
  primary key  (`id`)
) engine=myisam;



