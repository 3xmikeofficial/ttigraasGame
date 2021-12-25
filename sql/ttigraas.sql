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

 Date: 25/12/2021 04:22:59
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
  INDEX `token`(`token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for item_proto
-- ----------------------------
DROP TABLE IF EXISTS `item_proto`;
CREATE TABLE `item_proto`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `item_type` enum('ITEM_WEAPON','ITEM_ARMOR','ITEM_POTION','ITEM_POISON','ITEM_MISC') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ITEM_MISC',
  `item_subtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `size` int NOT NULL DEFAULT 1,
  `stackable` tinyint(1) NOT NULL DEFAULT 0,
  `min_value` bigint NOT NULL DEFAULT 0,
  `max_value` bigint NOT NULL DEFAULT 0,
  `price` bigint NULL DEFAULT NULL,
  `salvage` varchar(9999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_vnum` int NOT NULL,
  `item_type` enum('ITEM_WEAPON','ITEM_ARMOR','ITEM_POTION','ITEM_POISON','ITEM_MISC') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ITEM_MISC',
  `item_subtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` tinyint UNSIGNED NOT NULL DEFAULT 1,
  `rarity` int NOT NULL DEFAULT 1,
  `equipped` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vnum`(`item_vnum`) USING BTREE,
  INDEX `owner`(`token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
  `min_gold` int NOT NULL DEFAULT 10,
  `max_gold` int NOT NULL DEFAULT 20,
  `min_magicules` int NOT NULL DEFAULT 0,
  `max_magicules` int NOT NULL DEFAULT 0,
  `section` enum('NONE','Beginner','Intermediate','Expert','Master','Levels','Golds','Magicules','Conquest','Events') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'NONE',
  `time` int NOT NULL,
  `cost` int NOT NULL DEFAULT 60,
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
-- Table structure for town_upgrades
-- ----------------------------
DROP TABLE IF EXISTS `town_upgrades`;
CREATE TABLE `town_upgrades`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tier` int NOT NULL,
  `resources` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 388 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for towns
-- ----------------------------
DROP TABLE IF EXISTS `towns`;
CREATE TABLE `towns`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `main` int NOT NULL DEFAULT 1,
  `storage` int NOT NULL DEFAULT 1,
  `farm` int NOT NULL DEFAULT 1,
  `church` int NOT NULL DEFAULT 0,
  `barracks` int NOT NULL DEFAULT 0,
  `watchtower` int NOT NULL DEFAULT 0,
  `market` int NOT NULL DEFAULT 0,
  `stable` int NOT NULL DEFAULT 0,
  `garage` int NOT NULL DEFAULT 0,
  `smith` int NOT NULL DEFAULT 0,
  `woodcutter` int NOT NULL DEFAULT 0,
  `quarry` int NOT NULL DEFAULT 0,
  `mine` int NOT NULL DEFAULT 0,
  `food` int NOT NULL DEFAULT 0,
  `wood` int NOT NULL DEFAULT 0,
  `stone` int NOT NULL DEFAULT 0,
  `iron` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rank` int NOT NULL DEFAULT 0,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `token`(`token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
