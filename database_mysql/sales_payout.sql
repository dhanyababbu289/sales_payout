/*
 Navicat Premium Data Transfer

 Source Server         : localhost_mysql
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : sales_payout

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 12/01/2025 18:58:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_adminuser
-- ----------------------------
DROP TABLE IF EXISTS `tb_adminuser`;
CREATE TABLE `tb_adminuser`  (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_adminuser
-- ----------------------------
INSERT INTO `tb_adminuser` VALUES (1, 'admin', '4deb7d406be11fb2af49dc7662ce759e');

-- ----------------------------
-- Table structure for tb_commission
-- ----------------------------
DROP TABLE IF EXISTS `tb_commission`;
CREATE TABLE `tb_commission`  (
  `level_id` int(11) NOT NULL,
  `level` int(5) NULL DEFAULT NULL,
  `commission` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`level_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_commission
-- ----------------------------
INSERT INTO `tb_commission` VALUES (5, 5, '1');
INSERT INTO `tb_commission` VALUES (4, 4, '2');
INSERT INTO `tb_commission` VALUES (3, 3, '3');
INSERT INTO `tb_commission` VALUES (2, 2, '5');
INSERT INTO `tb_commission` VALUES (1, 1, '10');

-- ----------------------------
-- Table structure for tb_commission_gain
-- ----------------------------
DROP TABLE IF EXISTS `tb_commission_gain`;
CREATE TABLE `tb_commission_gain`  (
  `user_id` int(4) NOT NULL,
  `product_id` int(5) NOT NULL,
  `commission_gained` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`user_id`, `product_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_commission_gain
-- ----------------------------
INSERT INTO `tb_commission_gain` VALUES (24, 2, '2');
INSERT INTO `tb_commission_gain` VALUES (25, 2, '4');
INSERT INTO `tb_commission_gain` VALUES (26, 2, '6');
INSERT INTO `tb_commission_gain` VALUES (27, 2, '10');
INSERT INTO `tb_commission_gain` VALUES (28, 2, '20');

-- ----------------------------
-- Table structure for tb_product
-- ----------------------------
DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE `tb_product`  (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cost` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_product
-- ----------------------------
INSERT INTO `tb_product` VALUES (1, 'Powder', '100');
INSERT INTO `tb_product` VALUES (2, 'Soap', '200');

-- ----------------------------
-- Table structure for tb_seller
-- ----------------------------
DROP TABLE IF EXISTS `tb_seller`;
CREATE TABLE `tb_seller`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `sell_status` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_seller
-- ----------------------------
INSERT INTO `tb_seller` VALUES (13, 29, 2, 'Y');

-- ----------------------------
-- Table structure for tb_seller_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_seller_users`;
CREATE TABLE `tb_seller_users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mobile_number` bigint(12) NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_seller_users
-- ----------------------------
INSERT INTO `tb_seller_users` VALUES (28, 'ANAND', 'ggsggsgg house', 977777777777);
INSERT INTO `tb_seller_users` VALUES (27, 'MITTU', 'asss', 7888888884);
INSERT INTO `tb_seller_users` VALUES (26, 'Suha', 'asggsg', 9888888888);
INSERT INTO `tb_seller_users` VALUES (25, 'Lichu', 'sassss', 9888888889);
INSERT INTO `tb_seller_users` VALUES (24, 'APPU', 'SSS', 955566667);
INSERT INTO `tb_seller_users` VALUES (29, 'Meenu', 'cccccc', 98899900);

-- ----------------------------
-- Table structure for tb_user_hierarchy
-- ----------------------------
DROP TABLE IF EXISTS `tb_user_hierarchy`;
CREATE TABLE `tb_user_hierarchy`  (
  `user_id` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `parent_user_id` int(11) NOT NULL
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of tb_user_hierarchy
-- ----------------------------
INSERT INTO `tb_user_hierarchy` VALUES ('24', 0);
INSERT INTO `tb_user_hierarchy` VALUES ('25', 24);
INSERT INTO `tb_user_hierarchy` VALUES ('26', 25);
INSERT INTO `tb_user_hierarchy` VALUES ('27', 26);
INSERT INTO `tb_user_hierarchy` VALUES ('28', 27);
INSERT INTO `tb_user_hierarchy` VALUES ('29', 28);

SET FOREIGN_KEY_CHECKS = 1;
