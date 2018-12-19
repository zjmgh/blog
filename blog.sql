/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : blog

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 20/12/2018 00:10:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `id` int(11) NOT NULL,
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `url` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `keyword` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for content
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content`  (
  `cid` int(11) UNSIGNED NOT NULL DEFAULT 0 AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keyword` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `hit` int(11) NOT NULL DEFAULT 0,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `c_date` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`cid`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of content
-- ----------------------------
INSERT INTO `content` VALUES (1, 1, 'this is test blog', '<p>this is this blog&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'blog', 23, 'test blog', 1545231329);
INSERT INTO `content` VALUES (3, 1, '22', '<p>22222</p>', '222', 2, '222', 1545231863);

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice`  (
  `nid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `n_title` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `n_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `n_keyword` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `n_date` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`nid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for talk
-- ----------------------------
DROP TABLE IF EXISTS `talk`;
CREATE TABLE `talk`  (
  `tid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `t_date` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id` int(11) NOT NULL DEFAULT 0,
  `cid` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`tid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of talk
-- ----------------------------
INSERT INTO `talk` VALUES (1, '11', 1545234863, 1, 2, 1);
INSERT INTO `talk` VALUES (2, 'test', 1545235011, 1, 2, 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `sex` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `phone` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'wyx', '123', '女', 123456, 1);
INSERT INTO `user` VALUES (2, 'zjm', '123', '女', 1234, 1);
INSERT INTO `user` VALUES (3, '王艺萱大傻叼', '123', '女', 123, 1);

SET FOREIGN_KEY_CHECKS = 1;
