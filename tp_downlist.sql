-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-08-12 09:09:26
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tp_downlist`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_order`
--

CREATE TABLE IF NOT EXISTS `tp_order` (
  `id` int(10) NOT NULL COMMENT 'id',
  `uid` int(10) NOT NULL COMMENT '下单人',
  `u_sj` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '收件人',
  `u_tel` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '收件人联系电话',
  `u_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '收件地址',
  `u_num` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '货号',
  `u_size` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '尺码',
  `u_color` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '颜色',
  `mid` int(10) NOT NULL COMMENT '平台处理',
  `num` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '运单号',
  `addtime` int(40) NOT NULL COMMENT '下单时间'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='订单处理';

--
-- 转存表中的数据 `tp_order`
--
-- --------------------------------------------------------

--
-- 表的结构 `tp_user`
--

CREATE TABLE IF NOT EXISTS `tp_user` (
  `id` int(10) NOT NULL COMMENT 'id',
  `pid` int(10) NOT NULL COMMENT '权限，管理OR用户',
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `nikename` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '昵称',
  `psw` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `isdown` int(10) NOT NULL COMMENT '下单权限，0否，1是',
  `tel` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '联系方式'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';

--
-- 转存表中的数据 `tp_user`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_order`
--
ALTER TABLE `tp_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_user`
--
ALTER TABLE `tp_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tp_order`
--
ALTER TABLE `tp_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tp_user`
--
ALTER TABLE `tp_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
