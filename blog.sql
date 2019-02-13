-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-01-18 12:06:02
-- 服务器版本： 5.5.53
-- PHP 版本： 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE IF NOT EXISTS `tp_admin` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` char(32) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `username`, `password`) VALUES
(9, 'admin', '202cb962ac59075b964b07152d234b70'),
(8, 'ssss', '2d02e669731cbade6a64b58d602cf2a4'),
(7, '222', 'bcbe3365e6ac95ea2c0343a2395834dd');

-- --------------------------------------------------------

--
-- 表的结构 `tp_article`
--

DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE IF NOT EXISTS `tp_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `intro` varchar(255) NOT NULL COMMENT '文章简介',
  `keywords` varchar(255) NOT NULL COMMENT '文章关键词',
  `content` text NOT NULL COMMENT '文章内容',
  `pic` varchar(100) NOT NULL COMMENT '缩略图地址',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '点击率',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1：推荐，0：不推荐',
  `time` int(20) NOT NULL COMMENT '发布时间',
  `cateid` int(11) NOT NULL COMMENT '所属栏目',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_article`
--

INSERT INTO `tp_article` (`id`, `title`, `author`, `intro`, `keywords`, `content`, `pic`, `click`, `state`, `time`, `cateid`) VALUES
(4, '山科美食啊啊啊啊', 'bao', '', '吃', '嗯嗯嗯', '', 0, 1, 1547803464, 7),
(5, '山科美食', 'bao', '', '吃', '嗯嗯嗯', '', 0, 1, 1547803542, 6),
(8, '444', '', '', '', '', '', 0, 0, 1547805041, 7);

-- --------------------------------------------------------

--
-- 表的结构 `tp_cate`
--

DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE IF NOT EXISTS `tp_cate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `catename` varchar(30) NOT NULL COMMENT '栏目名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_cate`
--

INSERT INTO `tp_cate` (`id`, `catename`) VALUES
(7, '购物'),
(6, '美食');

-- --------------------------------------------------------

--
-- 表的结构 `tp_tags`
--

DROP TABLE IF EXISTS `tp_tags`;
CREATE TABLE IF NOT EXISTS `tp_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标签id',
  `tagname` varchar(255) NOT NULL COMMENT '标签名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
