/*
 Navicat Premium Data Transfer

 Source Server         : Prototype
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : mesin

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 11/01/2019 14:56:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `privilleges` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');
INSERT INTO `account` VALUES (2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

-- ----------------------------
-- Table structure for account_admin
-- ----------------------------
DROP TABLE IF EXISTS `account_admin`;
CREATE TABLE `account_admin`  (
  `id` int(11) NOT NULL,
  `fullname` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(24) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of account_admin
-- ----------------------------
INSERT INTO `account_admin` VALUES (1, 'Tito Anugerah M', 'titoanugerah@gmail.com', '085520902920', 1);

-- ----------------------------
-- Table structure for account_user
-- ----------------------------
DROP TABLE IF EXISTS `account_user`;
CREATE TABLE `account_user`  (
  `id` int(11) NOT NULL,
  `fullname` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(24) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of account_user
-- ----------------------------
INSERT INTO `account_user` VALUES (2, 'ini User', 'titonugerahhhhh@gmail.co', '702748074082', 0);

-- ----------------------------
-- Table structure for park
-- ----------------------------
DROP TABLE IF EXISTS `park`;
CREATE TABLE `park`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vehicle_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vehicle_owner` varchar(24) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `start_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `id_pic` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `end_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of park
-- ----------------------------
INSERT INTO `park` VALUES (2, 'motor', 'K 1021 JK', 'Bambang', '2018-10-14 13:28:19', 2, 1, '2018-10-14 15:32:04');
INSERT INTO `park` VALUES (3, 'motor', 'N 9297', 'Adam', '2019-01-11 14:45:50', 2, 0, NULL);

-- ----------------------------
-- View structure for view_admin
-- ----------------------------
DROP VIEW IF EXISTS `view_admin`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_admin` AS select 
a.id,
a.username,
a.`password`,
b.fullname,
b.email,
b.no_hp,
b.`status`,
a.privilleges
from
account as a,
account_admin as b
where
a.id = b.id
and
a.privilleges= 'admin' ;

-- ----------------------------
-- View structure for view_park
-- ----------------------------
DROP VIEW IF EXISTS `view_park`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_park` AS SELECT
	*,
	DATEDIFF( end_time, start_time ) AS 'duration_day',
	HOUR(timediff( end_time, start_time )) AS 'duration_time',
	(DATEDIFF( end_time, start_time ) * 24 * 5000)+ (HOUR(TIMEDIFF( end_time, start_time ))*5000) as 'Total'
FROM
	park ;

-- ----------------------------
-- View structure for view_user
-- ----------------------------
DROP VIEW IF EXISTS `view_user`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_user` AS select 
a.id,
a.username,
a.`password`,
b.fullname,
b.email,
b.no_hp,
b.`status`,
a.privilleges
from
account as a,
account_user as b
where
a.id = b.id
and
a.privilleges= 'user' ;

SET FOREIGN_KEY_CHECKS = 1;
