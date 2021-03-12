--
-- TQCMS  数据库SQL
-- 生成日期: 2015 年 1 月 1 日 00:00
--

--
-- 数据库: 'TQCMS'
--

-- --------------------------------------------------------

-- 
-- 表的结构 `plug_guestbook`
-- 

create table `plug_guestbook` (
  `id` mediumint(8) unsigned not null auto_increment,
  `realname` varchar(25) not null,
  `sex` tinyint(1) not null,
  `telephone` varchar(25) not null,
  `content` text not null,
  `dateline` int(10) unsigned not null,
  primary key  (`id`)
) engine=myisam;



