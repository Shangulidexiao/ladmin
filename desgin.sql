-- MySQL dump 10.16  Distrib 10.2.15-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ladmin
-- ------------------------------------------------------
-- Server version	10.2.15-MariaDB-log

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
  `lastTime` int(11) NOT NULL DEFAULT 0 COMMENT '最后一次登录的时间',
  `createId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者ID',
  `createTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updateTime` int(11) NOT NULL DEFAULT 0 COMMENT '更新时间',
  `status` tinyint(8) NOT NULL DEFAULT 0 COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT 0 COMMENT '添加人',
  `orderBy` int(11) DEFAULT 0 COMMENT '排序',
  `isDel` int(11) DEFAULT 0 COMMENT '是否删除 1删除',
  PRIMARY KEY (`id`),
  KEY `userName` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台管理员';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_admin`
--

LOCK TABLES `l_admin` WRITE;
/*!40000 ALTER TABLE `l_admin` DISABLE KEYS */;
INSERT INTO `l_admin` VALUES (1,'admin','$2y$10$JOcEIco3NO3jKQ8eG40FNuF5bl/3E5UNoWH9CkkieVGRe3DNYMhMm','韩剑','','18335831710@163.com','18335831710','0.0.0.0',0,0,0,1501018411,0,0,0,0);
/*!40000 ALTER TABLE `l_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_admin_role`
--

DROP TABLE IF EXISTS `l_admin_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminId` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
  `roleId` int(11) NOT NULL DEFAULT 0 COMMENT '角色id',
  `createId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT 0 COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT 0 COMMENT '添加人',
  `isDel` tinyint(4) DEFAULT 0 COMMENT '1删除',
  PRIMARY KEY (`id`),
  KEY `adminId` (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台管理员角色';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_admin_role`
--

LOCK TABLES `l_admin_role` WRITE;
/*!40000 ALTER TABLE `l_admin_role` DISABLE KEYS */;
INSERT INTO `l_admin_role` VALUES (1,1,6,1,1501018411,0,0,0,0,0);
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
  `editorId` int(11) NOT NULL DEFAULT 0 COMMENT '编辑者ID',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `intro` varchar(500) NOT NULL DEFAULT '' COMMENT '简介',
  `content` text DEFAULT NULL COMMENT '文章内容',
  `createTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updateTime` int(11) NOT NULL DEFAULT 0 COMMENT '更新时间',
  `isShow` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0显示 1不显示',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 正常',
  `isDel` tinyint(4) NOT NULL DEFAULT 0 COMMENT '是否删除 1删除',
  `topId` int(11) NOT NULL DEFAULT 0 COMMENT '一级类别id',
  `subId` int(11) NOT NULL DEFAULT 0 COMMENT '二级类别id',
  `adder` int(11) NOT NULL DEFAULT 0 COMMENT '添加者',
  `orderBy` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_article`
--

LOCK TABLES `l_article` WRITE;
/*!40000 ALTER TABLE `l_article` DISABLE KEYS */;
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
  `pId` int(11) NOT NULL DEFAULT 0 COMMENT '父类别id',
  `createTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updateTime` int(11) NOT NULL DEFAULT 0 COMMENT '更新时间',
  `orderBy` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  `isShow` tinyint(4) NOT NULL DEFAULT 0 COMMENT '是否显示 0显示',
  `isDel` tinyint(4) NOT NULL DEFAULT 0 COMMENT '是否删除：1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章类别表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_article_cate`
--

LOCK TABLES `l_article_cate` WRITE;
/*!40000 ALTER TABLE `l_article_cate` DISABLE KEYS */;
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
  `parentId` int(11) NOT NULL DEFAULT 0 COMMENT '父id',
  `createId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT 0 COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT 0 COMMENT '添加人',
  `isDel` tinyint(4) DEFAULT 0 COMMENT '0未删除 1删除',
  `isShow` int(11) DEFAULT 0 COMMENT '是否显示 0不显示 1显示',
  `orderBy` int(11) NOT NULL DEFAULT 0 COMMENT '排序 数字越高越靠前',
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台权限';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_auth`
--

LOCK TABLES `l_auth` WRITE;
/*!40000 ALTER TABLE `l_auth` DISABLE KEYS */;
INSERT INTO `l_auth` VALUES (1,'/','权限管理','fa-windows',0,0,1501018668,0,0,0,1,0,1,100),(2,'auth.index','菜单管理','',1,0,1501019942,0,0,0,1,0,1,50),(3,'auth.store','添加菜单','',2,0,1501020075,0,0,0,1,0,0,0),(4,'auth.update','菜单修改','',2,0,1501020194,0,0,0,1,0,0,0),(5,'admin.index','人员管理','',1,0,1503555191,0,0,0,1,0,1,50),(6,'role.index','角色管理','',1,0,1504348195,0,0,0,1,0,1,10),(9,'admin.default','后台首页','',30,0,1504447194,0,0,0,1,0,0,0),(10,'auth.destroy','删除菜单','',2,0,1504449118,0,0,0,1,0,0,0),(11,'auth.create','添加菜单展示','',2,0,1504449185,0,0,0,1,0,0,0),(12,'auth.edit','修改菜单展示','',2,0,1504449233,0,0,0,1,0,0,0),(13,'auth.deleteAll','批量删除菜单','',2,0,1504449268,0,0,0,1,0,0,0),(14,'admin.create','添加人员展示','',5,0,1504449375,0,0,0,1,0,0,0),(15,'admin.store','添加人员','',5,0,1504449426,0,0,0,1,0,0,0),(16,'admin.edit','修改人员展示','',5,0,1504449476,0,0,0,1,0,0,0),(17,'admin.update','修改人员','',5,0,1504449492,0,0,0,1,0,0,0),(18,'admin.destroy','删除人员','',5,0,1504449539,0,0,0,1,0,0,0),(19,'admin.deleteAll','批量删除人员','',5,0,1504449561,0,0,0,1,0,0,0),(20,'role.create','添加角色展示','',6,0,1504450096,0,0,0,1,0,0,0),(21,'role.store','添加角色','',6,0,1504450134,0,0,0,1,0,0,0),(22,'role.edit','修改角色展示','',6,0,1504450158,0,0,0,1,0,0,0),(23,'role.update','修改角色','',6,0,1504450182,0,0,0,1,0,0,0),(24,'role.destroy','删除角色','',6,0,1504450212,0,0,0,1,0,0,0),(25,'role.deleteAll','批量删除角色','',6,0,1504450237,0,0,0,1,0,0,0),(27,'article','文章管理','menu-icon fa fa-book',0,0,1505799925,0,0,0,1,0,1,4),(28,'article.create','添加文章展示','',29,0,1505800704,0,0,0,1,0,0,0),(29,'article.index','文章管理','',27,0,1505805576,0,0,0,1,0,1,10),(30,'common','公用功能','',0,0,1503872452,0,0,0,1,0,0,0),(31,'ueditor.upload','文件上传','',30,0,1503872625,0,0,0,1,0,0,0),(32,'category.index','类别管理','',27,0,1503883690,0,0,0,1,0,1,10),(33,'category.store','类别添加','',32,0,1503884054,0,0,0,1,0,0,0),(34,'category.create','类别添加展示','',32,0,1503884159,0,0,0,1,0,0,0),(35,'category.edit','类别修改展示','',32,0,1503884195,0,0,0,1,0,0,0),(36,'category.update','类别修改','',32,0,1503884223,0,0,0,1,0,0,0),(37,'category.destroy','类别删除','',32,0,1503884270,0,0,0,1,0,0,0),(38,'category.deleteAll','类别批量删除','',32,0,1503884395,0,0,0,1,0,0,0),(39,'article.store','文章添加','',29,0,1506310121,0,0,0,1,0,0,0),(40,'article.edit','文章修改展示','',29,0,1506310161,0,0,0,1,0,0,0),(41,'article.update','文章修改','',29,0,1506310184,0,0,0,1,0,0,0),(42,'article.destroy','文章删除','',29,0,1506310209,0,0,0,1,0,0,0),(43,'article.deleteAll','文章批量删除','',29,0,1506310232,0,0,0,1,0,0,0),(44,'article.subCate','获得二级文章类别','',29,0,1506323757,0,0,0,1,0,0,0),(45,'column','栏目管理','fa-columns',0,0,1542620274,0,0,0,1,0,1,20);
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
  `createId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT 0 COMMENT '0 正常 1 禁用',
  `adder` int(11) DEFAULT 0 COMMENT '添加人',
  `isDel` tinyint(4) DEFAULT 0 COMMENT '0未删除 1删除',
  `orderBy` int(11) DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台角色';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_role`
--

LOCK TABLES `l_role` WRITE;
/*!40000 ALTER TABLE `l_role` DISABLE KEYS */;
INSERT INTO `l_role` VALUES (1,'管理员',0,1500178727,0,1542620282,0,1,0,655),(2,'编辑',0,1500179048,0,1542335511,0,1,0,8);
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
  `authId` int(11) NOT NULL DEFAULT 0 COMMENT '权限id',
  `roleId` int(11) NOT NULL DEFAULT 0 COMMENT '角色id',
  `createId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者id',
  `createTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updateId` int(11) NOT NULL DEFAULT 0 COMMENT '创建者id',
  `updateTime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `status` tinyint(8) NOT NULL DEFAULT 0 COMMENT '0 正常 1 禁用',
  `isDel` tinyint(4) DEFAULT 0 COMMENT '是否删除 0 未 1 已删除',
  PRIMARY KEY (`id`),
  KEY `roleId` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=696 DEFAULT CHARSET=utf8 COMMENT='共享设计-后台角色权限';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_role_auth`
--

LOCK TABLES `l_role_auth` WRITE;
/*!40000 ALTER TABLE `l_role_auth` DISABLE KEYS */;
INSERT INTO `l_role_auth` VALUES (694,31,6,0,0,0,0,0,0),(693,9,6,0,0,0,0,0,0),(692,30,6,0,0,0,0,0,0),(691,38,6,0,0,0,0,0,0),(690,37,6,0,0,0,0,0,0),(689,36,6,0,0,0,0,0,0),(688,35,6,0,0,0,0,0,0),(687,34,6,0,0,0,0,0,0),(686,33,6,0,0,0,0,0,0),(685,32,6,0,0,0,0,0,0),(684,44,6,0,0,0,0,0,0),(683,43,6,0,0,0,0,0,0),(682,42,6,0,0,0,0,0,0),(681,41,6,0,0,0,0,0,0),(680,40,6,0,0,0,0,0,0),(679,39,6,0,0,0,0,0,0),(678,28,6,0,0,0,0,0,0),(677,29,6,0,0,0,0,0,0),(676,27,6,0,0,0,0,0,0),(675,25,6,0,0,0,0,0,0),(674,24,6,0,0,0,0,0,0),(673,23,6,0,0,0,0,0,0),(672,22,6,0,0,0,0,0,0),(695,45,6,0,0,0,0,0,0),(671,21,6,0,0,0,0,0,0),(670,20,6,0,0,0,0,0,0),(669,6,6,0,0,0,0,0,0),(668,19,6,0,0,0,0,0,0),(667,18,6,0,0,0,0,0,0),(666,17,6,0,0,0,0,0,0),(665,16,6,0,0,0,0,0,0),(664,15,6,0,0,0,0,0,0),(663,14,6,0,0,0,0,0,0),(662,5,6,0,0,0,0,0,0),(661,13,6,0,0,0,0,0,0),(660,12,6,0,0,0,0,0,0),(659,11,6,0,0,0,0,0,0),(658,10,6,0,0,0,0,0,0),(657,4,6,0,0,0,0,0,0),(656,3,6,0,0,0,0,0,0),(655,2,6,0,0,0,0,0,0),(654,1,6,0,0,0,0,0,0);
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

-- Dump completed on 2018-11-19 18:07:37
