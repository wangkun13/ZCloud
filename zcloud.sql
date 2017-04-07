/*
Navicat MySQL Data Transfer

Source Server         : Test
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : zcloud

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2017-04-04 13:04:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zy_menu`
-- ----------------------------
DROP TABLE IF EXISTS `zy_menu`;
CREATE TABLE `zy_menu` (
  `id` tinyint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `href` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL COMMENT '图标代码',
  `pid` tinyint(8) NOT NULL,
  `pageid` tinyint(8) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1为有效,0为无效',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zy_menu
-- ----------------------------
INSERT INTO `zy_menu` VALUES ('1', '工作总览', 'index/index', '', '0', '3', '1');
INSERT INTO `zy_menu` VALUES ('2', '客户订单', 'index/index', '', '0', '3', '1');
INSERT INTO `zy_menu` VALUES ('3', '客户列表', '/Zcloud/admin/', '', '0', '3', '1');
INSERT INTO `zy_menu` VALUES ('4', '客户A', '', '', '3', '0', '1');
INSERT INTO `zy_menu` VALUES ('5', '客户B', '', '', '3', '0', '1');

-- ----------------------------
-- Table structure for `zy_user`
-- ----------------------------
DROP TABLE IF EXISTS `zy_user`;
CREATE TABLE `zy_user` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zy_user
-- ----------------------------
INSERT INTO `zy_user` VALUES ('1', 'admin', 'admin', '1');
