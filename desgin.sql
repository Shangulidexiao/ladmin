-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: desgin
-- ------------------------------------------------------
-- Server version	5.1.73

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `l_admin`
--

DROP TABLE IF EXISTS `l_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) DEFAULT '' COMMENT '密码',
  `trueName` varchar(20) NOT NULL DEFAULT '' COMMENT '真实名字',
  `photo` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `lastIp` varchar(16) NOT NULL DEFAULT '0.0.0.0' COMMENT '最后一次登录的IP',
  `lastTime` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次登录的时间',
  `createId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者ID',
  `createTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updateTime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(8) NOT NULL DEFAULT '0' COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT '0' COMMENT '添加人',
  `orderBy` int(11) DEFAULT '0' COMMENT '排序',
  `isDel` int(11) DEFAULT '0' COMMENT '是否删除 1删除',
  PRIMARY KEY (`id`),
  KEY `userName` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台管理员';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_admin`
--

LOCK TABLES `l_admin` WRITE;
/*!40000 ALTER TABLE `l_admin` DISABLE KEYS */;
INSERT INTO `l_admin` VALUES (1,'admin','$2y$10$JOcEIco3NO3jKQ8eG40FNuF5bl/3E5UNoWH9CkkieVGRe3DNYMhMm','韩剑','','18335831710@163.com','18335831710','0.0.0.0',0,0,0,1501018411,0,0,0,0),(2,'hanjian','$2y$10$QVMxwWWW92jxA7UnIVlGG.fS6Myowe5xk2ZkWHBju05NZUibmnWGe','??','','18335831710@163.com','18335831710','0.0.0.0',0,0,0,0,0,0,0,1),(3,'hanjian','$2y$10$tegmpA1UqImYioqrIUN4Me.nRsTY57TXG.5qS96oNVmvxZ222V7Ee','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(4,'hanjian','$2y$10$ZKOSxR0H5wfx.dAeTRqhiuhexbtjL9Dku9dXOjVjIGHMaKTGrObWK','1','','18335832714@163.com','18335832714','0.0.0.0',0,0,0,0,0,0,0,1),(5,'hanjian','$2y$10$NF8KyS1H0Is1wwxrCOiBa.USzeBbHkasO4iQnGS1KnKYp9U5uAYfO','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(6,'hanjian','$2y$10$Dc5sqp1g4BAJsou92zbob.lQr0.E5HJrP.RCB6lRd9r6RGVxK2y0y','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(7,'hanjian','$2y$10$joVX6W1q8JLpngPuLfbNH.G1gcNfOHErxlGsO5/J7NppNHQho4ZDy','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(8,'hanjian','$2y$10$wZILYyupHBfahgk8heSrdOo9ngw0bmvS2Nkb9a1lUyxUKplqvgBUe','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(9,'hanjian','$2y$10$QXd3Pn9erkODWGvZsdsN..t9CpMaHayE8YCrdWNQBMjW.uvZwKWHG','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(10,'hanjian','$2y$10$GXj.HoQdFKQD5RbxwdkoYOYHhN20D2TtSMjVK7hAT11FN7HMoAbYW','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(11,'hanjian','$2y$10$zEIg2brTVvUEvLz8lqZgnurnzXzQuXoxtuW3iwZydwkn7lgOXfcsm','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(12,'hanjian','$2y$10$S73DgyQgr349z2Lm9z20Pey1Un1p9XyWq2.bbLqiSfES1lk2OG1xy','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(13,'hanjian','$2y$10$QVo/3uQLKxxrjEYs8x/kEOR8xys3RI0qYHuu1kU0U3zMT2iEM7RHW','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(14,'hanjian','$2y$10$hdbLXzvM87/Z2beZJOKWKebC23tYEj8GlElfMQyWW5.8hrQwSjDXi','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(15,'hanjian','$2y$10$CMWtHS3ZuOzd2XIX7FEfJeKSOHGw0ZzD5MKFquhGEy0taEOsAa82O','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(16,'hanjian','$2y$10$DOQ7AQkrm17tbBcqt1lRoe2xPHOA5SeVEHEzQ.ieqfLy5lDQSEpZ6','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(17,'hanjian','$2y$10$yDzxfCtWj9Y7JnPM9bH8xuLtVhHqwTPWyfuFMSSTbQDXUDvA0FnT6','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(18,'hanjian','$2y$10$SOHZv/LipcWODi/QykmVqOIXCj8U4f.J8k.bGniuwz0GAggThHOXy','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(19,'hanjian','$2y$10$kOV/Zx9Ml25pw2a90Q8kgOU4NBoL.cHdO88PeLZxVDtTedNlSqXW2','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(20,'hanjian','$2y$10$cxJYD0ITfuu4ofY.pcoe7e34rK/92hvb2W07bcG6QJRl6Iuk103BO','','','','','0.0.0.0',0,0,0,0,0,0,0,1),(27,'admin','$2y$10$/axmmButX7Z.Gd7tHplyxeWyO1ufc3lb0xfptTvvUdJCqulBer1gy','','','18335831710@163.com','18335831710','0.0.0.0',0,0,1499094163,0,0,1,0,1),(28,'liliting','$2y$10$usIJ/B1vpapQjOhb9ya.d.D1wVhd18EA7I7BXIqJbbtPuzpJ5xHF6','李丽婷','','18335832714@163.com','18335832711','0.0.0.0',0,0,1500135035,1501018424,0,1,0,0),(29,'role11','$2y$10$knRYi2Im63HLrb8YpJe4puPd3xIall9v8le0caA61zbQ4Y3SgWZU.','hanjinan','','18335831710@163.com','18335831710','0.0.0.0',0,0,1500820062,1505135180,0,28,0,1),(30,'3333333','$2y$10$no5ai/hwYvEz3.EEXJ8.Yu5rVLvnQx1IE9L59ZdqyxWbTq7IXmgfO','3333333','','18335831710@163.com','18335831710','0.0.0.0',0,0,1500820322,1505135149,0,28,0,1),(31,'admin666','$2y$10$iLfxPlmfBXqLvnTZsyqnc.tikk.B0h2ze4Gwszoq7hWCgfMVi8KTS','admin','','18335831710@163.com','18335831710','0.0.0.0',0,0,1505136016,1505136029,0,1,0,1),(32,'hanjian','$2y$10$TwKO9t8VgLI1RRe/FOL7LeSoLfv22vGrGh.O.3ILFrCxjvafjgY12','韩剑','','hanjian@zol.com.cn','18335831710','0.0.0.0',0,0,1505136052,1505136843,0,1,0,0),(35,'hanjian1','$2y$10$9hJDSnwbbcLys54yTlL.QeRgLPXHE.AjD3ccS4qigHsoPjSvfiusa','18335831710','','hanjian@zol.com.cn','18335831710','0.0.0.0',0,0,1505137221,1505392585,0,1,0,0);
/*!40000 ALTER TABLE `l_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_admin_auth`
--

DROP TABLE IF EXISTS `l_admin_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_admin_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminId` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `authId` int(11) DEFAULT '0' COMMENT '菜单id',
  `createId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT '0' COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT '0' COMMENT '添加人',
  `isDel` tinyint(4) DEFAULT '0' COMMENT '0未删除 1删除',
  PRIMARY KEY (`id`),
  KEY `adminId` (`adminId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='共享设计-后台管理员权限';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_admin_auth`
--

LOCK TABLES `l_admin_auth` WRITE;
/*!40000 ALTER TABLE `l_admin_auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_admin_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_admin_role`
--

DROP TABLE IF EXISTS `l_admin_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminId` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `roleId` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `createId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT '0' COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT '0' COMMENT '添加人',
  `isDel` tinyint(4) DEFAULT '0' COMMENT '1删除',
  PRIMARY KEY (`id`),
  KEY `adminId` (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台管理员角色';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_admin_role`
--

LOCK TABLES `l_admin_role` WRITE;
/*!40000 ALTER TABLE `l_admin_role` DISABLE KEYS */;
INSERT INTO `l_admin_role` VALUES (13,30,16,28,1500821826,0,0,0,0,0),(12,30,15,28,1500821826,0,0,0,0,0),(11,30,14,28,1500821826,0,0,0,0,0),(10,30,13,28,1500821826,0,0,0,0,0),(21,1,6,1,1501018411,0,0,0,0,0),(20,1,5,1,1501018411,0,0,0,0,0),(23,29,6,1,1505135175,0,0,0,0,0),(24,31,6,1,1505136016,0,0,0,0,0),(25,32,6,1,1505136052,0,0,0,0,0),(28,35,7,1,1505392585,0,0,0,0,0);
/*!40000 ALTER TABLE `l_admin_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_article`
--

DROP TABLE IF EXISTS `l_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `fullTitle` varchar(255) NOT NULL DEFAULT '' COMMENT '完整的标题',
  `subTitle` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `editorId` int(11) NOT NULL DEFAULT '0' COMMENT '编辑者ID',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `intro` varchar(500) NOT NULL DEFAULT '' COMMENT '简介',
  `content` text COMMENT '文章内容',
  `createTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updateTime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `isShow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0显示 1不显示',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 正常',
  `isDel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除 1删除',
  `topId` int(11) NOT NULL DEFAULT '0' COMMENT '一级类别id',
  `subId` int(11) NOT NULL DEFAULT '0' COMMENT '二级类别id',
  `adder` int(11) NOT NULL DEFAULT '0' COMMENT '添加者',
  `orderBy` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_article`
--

LOCK TABLES `l_article` WRITE;
/*!40000 ALTER TABLE `l_article` DISABLE KEYS */;
INSERT INTO `l_article` VALUES (1,'fff','','fff',0,'ddd','ffff','<p>fff</p>',1506318125,0,1,0,0,2,3,1,5),(2,'dfddd','','ddd',0,'ddd','dddd','<p>ddd</p>',1506318168,1506322026,1,0,0,1,2,1,5),(3,'dfddd','','ddd',0,'ddd','dddd','<p>ddd</p>',1506318222,1506322073,1,0,0,1,2,1,5),(4,'ffff','','ffff',0,'ffff','fff','<p>ffff</p>',1506322910,0,0,0,0,2,0,1,5),(5,'ffff','','ffff',0,'ffff','fff','<p>ffff</p>',1506323156,1506323262,0,0,1,2,0,1,5);
/*!40000 ALTER TABLE `l_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_article_cate`
--

DROP TABLE IF EXISTS `l_article_cate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_article_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '类别名称',
  `pId` int(11) NOT NULL DEFAULT '0' COMMENT '父类别id',
  `createTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updateTime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `orderBy` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `isShow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否显示 0显示',
  `isDel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除：1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章类别表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_article_cate`
--

LOCK TABLES `l_article_cate` WRITE;
/*!40000 ALTER TABLE `l_article_cate` DISABLE KEYS */;
INSERT INTO `l_article_cate` VALUES (1,'关于我们',0,0,0,0,1,0),(2,'首页',0,0,1503910170,0,1,0),(3,'热点事件',2,0,0,0,1,0);
/*!40000 ALTER TABLE `l_article_cate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_auth`
--

DROP TABLE IF EXISTS `l_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '菜单地址',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `icon` varchar(255) NOT NULL DEFAULT '' COMMENT '菜单类名',
  `parentId` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `createId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT '0' COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT '0' COMMENT '添加人',
  `isDel` tinyint(4) DEFAULT '0' COMMENT '0未删除 1删除',
  `isShow` int(11) DEFAULT '0' COMMENT '是否显示 0不显示 1显示',
  `orderBy` int(11) NOT NULL DEFAULT '0' COMMENT '排序 数字越高越靠前',
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台权限';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_auth`
--

LOCK TABLES `l_auth` WRITE;
/*!40000 ALTER TABLE `l_auth` DISABLE KEYS */;
INSERT INTO `l_auth` VALUES (1,'/','权限管理','fa-windows',0,0,1501018668,0,0,0,1,0,1,100),(2,'auth.index','菜单管理','',1,0,1501019942,0,0,0,1,0,1,50),(3,'auth.store','添加菜单','',2,0,1501020075,0,0,0,1,0,0,0),(4,'auth.update','菜单修改','',2,0,1501020194,0,0,0,1,0,0,0),(5,'admin.index','人员管理','',1,0,1503555191,0,0,0,1,0,1,50),(6,'role.index','角色管理','',1,0,1504348195,0,0,0,1,0,1,10),(9,'admin.default','后台首页','',30,0,1504447194,0,0,0,1,0,0,0),(10,'auth.destroy','删除菜单','',2,0,1504449118,0,0,0,1,0,0,0),(11,'auth.create','添加菜单展示','',2,0,1504449185,0,0,0,1,0,0,0),(12,'auth.edit','修改菜单展示','',2,0,1504449233,0,0,0,1,0,0,0),(13,'auth.deleteAll','批量删除菜单','',2,0,1504449268,0,0,0,1,0,0,0),(14,'admin.create','添加人员展示','',5,0,1504449375,0,0,0,1,0,0,0),(15,'admin.store','添加人员','',5,0,1504449426,0,0,0,1,0,0,0),(16,'admin.edit','修改人员展示','',5,0,1504449476,0,0,0,1,0,0,0),(17,'admin.update','修改人员','',5,0,1504449492,0,0,0,1,0,0,0),(18,'admin.destroy','删除人员','',5,0,1504449539,0,0,0,1,0,0,0),(19,'admin.deleteAll','批量删除人员','',5,0,1504449561,0,0,0,1,0,0,0),(20,'role.create','添加角色展示','',6,0,1504450096,0,0,0,1,0,0,0),(21,'role.store','添加角色','',6,0,1504450134,0,0,0,1,0,0,0),(22,'role.edit','修改角色展示','',6,0,1504450158,0,0,0,1,0,0,0),(23,'role.update','修改角色','',6,0,1504450182,0,0,0,1,0,0,0),(24,'role.destroy','删除角色','',6,0,1504450212,0,0,0,1,0,0,0),(25,'role.deleteAll','批量删除角色','',6,0,1504450237,0,0,0,1,0,0,0),(27,'article','文章管理','menu-icon fa fa-book',0,0,1505799925,0,0,0,1,0,1,4),(28,'article.create','添加文章展示','',29,0,1505800704,0,0,0,1,0,0,0),(29,'article.index','文章管理','',27,0,1505805576,0,0,0,1,0,1,10),(30,'common','公用功能','',0,0,1503872452,0,0,0,1,0,0,0),(31,'ueditor.upload','文件上传','',30,0,1503872625,0,0,0,1,0,0,0),(32,'category.index','类别管理','',27,0,1503883690,0,0,0,1,0,1,10),(33,'category.store','类别添加','',32,0,1503884054,0,0,0,1,0,0,0),(34,'category.create','类别添加展示','',32,0,1503884159,0,0,0,1,0,0,0),(35,'category.edit','类别修改展示','',32,0,1503884195,0,0,0,1,0,0,0),(36,'category.update','类别修改','',32,0,1503884223,0,0,0,1,0,0,0),(37,'category.destroy','类别删除','',32,0,1503884270,0,0,0,1,0,0,0),(38,'category.deleteAll','类别批量删除','',32,0,1503884395,0,0,0,1,0,0,0),(39,'article.store','文章添加','',29,0,1506310121,0,0,0,1,0,0,0),(40,'article.edit','文章修改展示','',29,0,1506310161,0,0,0,1,0,0,0),(41,'article.update','文章修改','',29,0,1506310184,0,0,0,1,0,0,0),(42,'article.destroy','文章删除','',29,0,1506310209,0,0,0,1,0,0,0),(43,'article.deleteAll','文章批量删除','',29,0,1506310232,0,0,0,1,0,0,0),(44,'article.subCate','获得二级文章类别','',29,0,1506323757,0,0,0,1,0,0,0);
/*!40000 ALTER TABLE `l_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_role`
--

DROP TABLE IF EXISTS `l_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '角色名称',
  `createId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT '0' COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT '0' COMMENT '添加人',
  `isDel` tinyint(4) DEFAULT '0' COMMENT '0未删除 1删除',
  `orderBy` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台角色';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_role`
--

LOCK TABLES `l_role` WRITE;
/*!40000 ALTER TABLE `l_role` DISABLE KEYS */;
INSERT INTO `l_role` VALUES (1,'guanliyuan',0,0,0,0,0,1,1,0),(2,'1113',0,0,0,1500204132,0,1,1,3),(3,'guanliyuan',0,0,0,0,0,1,1,0),(4,'guanliyuan',0,0,0,0,0,1,1,0),(5,'guanliyuan',0,0,0,1504450528,0,1,1,0),(6,'管理员',0,1500178727,0,1506323768,0,1,0,655),(7,'编辑',0,1500179048,0,1505392790,0,1,0,7),(17,'美女',0,1505134771,0,1505134972,0,1,1,6555),(18,'ii',0,1505482771,0,1505482789,0,1,1,3);
/*!40000 ALTER TABLE `l_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_role_auth`
--

DROP TABLE IF EXISTS `l_role_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_role_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authId` int(11) NOT NULL DEFAULT '0' COMMENT '权限id',
  `roleId` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `createId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT '0' COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT '0' COMMENT '0 正常 1 禁用',
  `isDel` tinyint(4) DEFAULT '0' COMMENT '是否删除 0 未 1 已删除',
  PRIMARY KEY (`id`),
  KEY `roleId` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=654 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台角色权限';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_role_auth`
--

LOCK TABLES `l_role_auth` WRITE;
/*!40000 ALTER TABLE `l_role_auth` DISABLE KEYS */;
INSERT INTO `l_role_auth` VALUES (391,9,7,0,0,0,0,0,0),(237,25,17,0,0,0,0,0,0),(236,24,17,0,0,0,0,0,0),(235,23,17,0,0,0,0,0,0),(234,22,17,0,0,0,0,0,0),(233,21,17,0,0,0,0,0,0),(232,20,17,0,0,0,0,0,0),(231,6,17,0,0,0,0,0,0),(230,19,17,0,0,0,0,0,0),(229,18,17,0,0,0,0,0,0),(228,17,17,0,0,0,0,0,0),(227,16,17,0,0,0,0,0,0),(226,15,17,0,0,0,0,0,0),(225,14,17,0,0,0,0,0,0),(652,9,6,0,0,0,0,0,0),(651,30,6,0,0,0,0,0,0),(650,38,6,0,0,0,0,0,0),(649,37,6,0,0,0,0,0,0),(648,36,6,0,0,0,0,0,0),(647,35,6,0,0,0,0,0,0),(646,34,6,0,0,0,0,0,0),(645,33,6,0,0,0,0,0,0),(644,32,6,0,0,0,0,0,0),(643,44,6,0,0,0,0,0,0),(642,43,6,0,0,0,0,0,0),(641,42,6,0,0,0,0,0,0),(640,41,6,0,0,0,0,0,0),(639,40,6,0,0,0,0,0,0),(638,39,6,0,0,0,0,0,0),(637,28,6,0,0,0,0,0,0),(224,5,17,0,0,0,0,0,0),(223,13,17,0,0,0,0,0,0),(636,29,6,0,0,0,0,0,0),(635,27,6,0,0,0,0,0,0),(634,25,6,0,0,0,0,0,0),(633,24,6,0,0,0,0,0,0),(632,23,6,0,0,0,0,0,0),(631,22,6,0,0,0,0,0,0),(630,21,6,0,0,0,0,0,0),(222,12,17,0,0,0,0,0,0),(221,11,17,0,0,0,0,0,0),(220,10,17,0,0,0,0,0,0),(219,4,17,0,0,0,0,0,0),(218,3,17,0,0,0,0,0,0),(217,2,17,0,0,0,0,0,0),(216,1,17,0,0,0,0,0,0),(390,25,7,0,0,0,0,0,0),(389,24,7,0,0,0,0,0,0),(388,23,7,0,0,0,0,0,0),(387,22,7,0,0,0,0,0,0),(386,21,7,0,0,0,0,0,0),(385,20,7,0,0,0,0,0,0),(384,6,7,0,0,0,0,0,0),(383,19,7,0,0,0,0,0,0),(382,18,7,0,0,0,0,0,0),(381,17,7,0,0,0,0,0,0),(380,16,7,0,0,0,0,0,0),(379,15,7,0,0,0,0,0,0),(378,14,7,0,0,0,0,0,0),(377,5,7,0,0,0,0,0,0),(376,13,7,0,0,0,0,0,0),(375,12,7,0,0,0,0,0,0),(374,11,7,0,0,0,0,0,0),(373,10,7,0,0,0,0,0,0),(372,4,7,0,0,0,0,0,0),(371,3,7,0,0,0,0,0,0),(370,2,7,0,0,0,0,0,0),(369,1,7,0,0,0,0,0,0),(629,20,6,0,0,0,0,0,0),(628,6,6,0,0,0,0,0,0),(627,19,6,0,0,0,0,0,0),(626,18,6,0,0,0,0,0,0),(625,17,6,0,0,0,0,0,0),(624,16,6,0,0,0,0,0,0),(623,15,6,0,0,0,0,0,0),(622,14,6,0,0,0,0,0,0),(621,5,6,0,0,0,0,0,0),(620,13,6,0,0,0,0,0,0),(619,12,6,0,0,0,0,0,0),(618,11,6,0,0,0,0,0,0),(617,10,6,0,0,0,0,0,0),(616,4,6,0,0,0,0,0,0),(615,3,6,0,0,0,0,0,0),(614,2,6,0,0,0,0,0,0),(613,1,6,0,0,0,0,0,0),(653,31,6,0,0,0,0,0,0);
/*!40000 ALTER TABLE `l_role_auth` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-25 16:16:00
