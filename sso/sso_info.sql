/*
 Navicat Premium Data Transfer

 Source Server         : mysql5.7
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : 127.0.0.1:3308
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 26/03/2021 23:04:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sso_info
-- ----------------------------
DROP TABLE IF EXISTS `sso_info`;
CREATE TABLE `sso_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 DEFAULT NULL,
  `client_id` varchar(128) CHARACTER SET utf8mb4 DEFAULT NULL,
  `client_secret` varchar(128) CHARACTER SET utf8mb4 DEFAULT NULL,
  `redirect_url` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `logout_url` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sso_info
-- ----------------------------
BEGIN;
INSERT INTO `sso_info` VALUES (1, '业务系统 A', 'yb2sshhs8k7cyx6b', 'shrhyditeets7pe8rrdktk63', 'http://www.a.com/index/index', 'http://www.a.com/index/logout', 1, '2021-03-21 11:00:53', '2021-03-21 15:18:35');
INSERT INTO `sso_info` VALUES (2, '业务系统 B', 'amp6ndi7jdj3mhky', '57r3mwptehpwy5kcawrzfzci', 'http://www.b.com/index/index', 'http://www.b.com/logout/index', 1, '2021-03-21 15:17:28', '2021-03-21 15:17:28');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
