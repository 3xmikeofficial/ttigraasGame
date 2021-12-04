/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : ttigraas

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 04/12/2021 23:28:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for characters
-- ----------------------------
DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` int NOT NULL DEFAULT 1,
  `exp` int NOT NULL DEFAULT 0,
  `race` enum('Slime','Human','Demon','Angel','Goblin','Lizardman','Orc') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Slime',
  `class` int NOT NULL,
  `health` int NOT NULL DEFAULT 0,
  `stamina` int NOT NULL DEFAULT 100,
  `max_stamina` int NOT NULL DEFAULT 100,
  `speed` int NOT NULL DEFAULT 0,
  `strenght` int NOT NULL DEFAULT 0,
  `defense` int NOT NULL DEFAULT 0,
  `magicules` bigint NOT NULL DEFAULT 0,
  `gold` bigint NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `token`(`token`) USING BTREE,
  CONSTRAINT `token` FOREIGN KEY (`token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for item_proto
-- ----------------------------
DROP TABLE IF EXISTS `item_proto`;
CREATE TABLE `item_proto`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `item_type` enum('ITEM_WEAPON','ITEM_ARMOR','ITEM_POTION','ITEM_POISON','ITEM_MISC') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ITEM_MISC',
  `item_subtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stackable` tinyint(1) NOT NULL DEFAULT 0,
  `min_value` bigint NULL DEFAULT NULL,
  `max_value` bigint NULL DEFAULT NULL,
  `price` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 92 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_vnum` int NOT NULL,
  `quantity` int NOT NULL DEFAULT 1,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rarity` int NOT NULL DEFAULT 1,
  `equipped` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vnum`(`item_vnum`) USING BTREE,
  INDEX `owner`(`token`) USING BTREE,
  CONSTRAINT `owner` FOREIGN KEY (`token`) REFERENCES `characters` (`token`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vnum` FOREIGN KEY (`item_vnum`) REFERENCES `item_proto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for labyrinth
-- ----------------------------
DROP TABLE IF EXISTS `labyrinth`;
CREATE TABLE `labyrinth`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `quardian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for quests
-- ----------------------------
DROP TABLE IF EXISTS `quests`;
CREATE TABLE `quests`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stamina_required` int NOT NULL DEFAULT 5,
  `health` int NOT NULL DEFAULT 100,
  `speed` int NOT NULL DEFAULT 5,
  `strenght` int NOT NULL DEFAULT 5,
  `defense` int NOT NULL DEFAULT 0,
  `min_exp` int NOT NULL DEFAULT 5,
  `max_exp` int NOT NULL DEFAULT 10,
  `min_gold` int NOT NULL DEFAULT 5,
  `max_gold` int NOT NULL DEFAULT 10,
  `inventory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for skill_proto
-- ----------------------------
DROP TABLE IF EXISTS `skill_proto`;
CREATE TABLE `skill_proto`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for skills
-- ----------------------------
DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills`  (
  `id` int NOT NULL,
  `skill_vnum` int NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('Intrinsic','Common','Extra','Unique','Ultimate') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Intrinsic',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for towns
-- ----------------------------
DROP TABLE IF EXISTS `towns`;
CREATE TABLE `towns`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wood` int NOT NULL DEFAULT 0,
  `stone` int NOT NULL DEFAULT 0,
  `iron` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `token`(`token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
