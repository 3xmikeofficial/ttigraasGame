/*
 Navicat Premium Data Transfer

 Source Server         : Ttigraas
 Source Server Type    : MySQL
 Source Server Version : 80029
 Source Host           : sql9.hostcreators.sk:3314
 Source Schema         : d15088_ttigraas

 Target Server Type    : MySQL
 Target Server Version : 80029
 File Encoding         : 65001

 Date: 05/05/2022 17:20:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rank` int NOT NULL DEFAULT 0,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO `accounts` VALUES (1, 'testaccount', '$2y$10$bzjqt3y8YT04cUXPYxeZd.9Hxh9gGTb875UwVS5QaG59Ye1Hke8SW', 0, 0);

-- ----------------------------
-- Table structure for characters
-- ----------------------------
DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `account_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  INDEX `token`(`account_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of characters
-- ----------------------------
INSERT INTO `characters` VALUES (1, '1', 'testaccount', 1, 0, 'Slime', 0, 100, 100, 100, 10, 20, 0, 0, 0);

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of item_proto
-- ----------------------------
INSERT INTO `item_proto` VALUES (1, 'Wooden Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 7, 9, 25);
INSERT INTO `item_proto` VALUES (2, 'Stone Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 9, 11, 50);
INSERT INTO `item_proto` VALUES (3, 'Iron Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 11, 13, 75);
INSERT INTO `item_proto` VALUES (4, 'Steel Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 13, 15, 100);
INSERT INTO `item_proto` VALUES (5, 'Magisteel Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 15, 18, 125);
INSERT INTO `item_proto` VALUES (6, 'Mithril Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 18, 21, 150);
INSERT INTO `item_proto` VALUES (7, 'Orichalcum Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 21, 23, 175);
INSERT INTO `item_proto` VALUES (8, 'Adamantite Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 23, 25, 200);
INSERT INTO `item_proto` VALUES (9, 'Dragotite Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 25, 27, 225);
INSERT INTO `item_proto` VALUES (10, 'Hihiirokane Sword', 'ITEM_WEAPON', 'ITEM_SWORD', 2, 0, 27, 29, 250);
INSERT INTO `item_proto` VALUES (11, 'Leather Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 7, 9, 25);
INSERT INTO `item_proto` VALUES (12, 'Fur Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 9, 11, 50);
INSERT INTO `item_proto` VALUES (13, 'Iron Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 11, 13, 75);
INSERT INTO `item_proto` VALUES (14, 'Steel Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 13, 15, 100);
INSERT INTO `item_proto` VALUES (15, 'Magisteel Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 15, 17, 125);
INSERT INTO `item_proto` VALUES (16, 'Mithril Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 17, 19, 150);
INSERT INTO `item_proto` VALUES (17, 'Orichalcum Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 19, 21, 175);
INSERT INTO `item_proto` VALUES (18, 'Adamantite Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 21, 23, 200);
INSERT INTO `item_proto` VALUES (19, 'Dragotite Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 23, 25, 225);
INSERT INTO `item_proto` VALUES (20, 'Hihiirokane Armor', 'ITEM_ARMOR', 'ITEM_BODY', 2, 0, 25, 27, 250);
INSERT INTO `item_proto` VALUES (21, 'Leather Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 3, 5, 25);
INSERT INTO `item_proto` VALUES (22, 'Fur Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 5, 7, 50);
INSERT INTO `item_proto` VALUES (23, 'Iron Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 7, 9, 75);
INSERT INTO `item_proto` VALUES (24, 'Steel Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 9, 11, 100);
INSERT INTO `item_proto` VALUES (25, 'Magisteel Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 11, 13, 125);
INSERT INTO `item_proto` VALUES (26, 'Mithril Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 13, 15, 150);
INSERT INTO `item_proto` VALUES (27, 'Orichalcum Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 15, 17, 175);
INSERT INTO `item_proto` VALUES (28, 'Adamantite Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 17, 19, 200);
INSERT INTO `item_proto` VALUES (29, 'Dragotite Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 19, 21, 225);
INSERT INTO `item_proto` VALUES (30, 'Hihiirokane Helmet', 'ITEM_ARMOR', 'ITEM_HELMET', 1, 0, 21, 23, 250);
INSERT INTO `item_proto` VALUES (31, 'Wooden Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 3, 5, 25);
INSERT INTO `item_proto` VALUES (32, 'Stone Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 5, 7, 50);
INSERT INTO `item_proto` VALUES (33, 'Iron Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 7, 9, 75);
INSERT INTO `item_proto` VALUES (34, 'Steel Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 9, 11, 100);
INSERT INTO `item_proto` VALUES (35, 'Magisteel Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 11, 13, 125);
INSERT INTO `item_proto` VALUES (36, 'Mithril Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 13, 15, 150);
INSERT INTO `item_proto` VALUES (37, 'Orichalcum Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 15, 17, 175);
INSERT INTO `item_proto` VALUES (38, 'Adamantite Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 17, 19, 200);
INSERT INTO `item_proto` VALUES (39, 'Dragotite Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 19, 21, 225);
INSERT INTO `item_proto` VALUES (40, 'Hihiirokane Shield', 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 0, 21, 23, 250);
INSERT INTO `item_proto` VALUES (41, 'Wooden Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 3, 5, 25);
INSERT INTO `item_proto` VALUES (42, 'Stone Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 5, 7, 50);
INSERT INTO `item_proto` VALUES (43, 'Iron Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 7, 9, 75);
INSERT INTO `item_proto` VALUES (44, 'Steel Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 9, 11, 100);
INSERT INTO `item_proto` VALUES (45, 'Magisteel Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 11, 13, 125);
INSERT INTO `item_proto` VALUES (46, 'Mithril Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 13, 15, 150);
INSERT INTO `item_proto` VALUES (47, 'Orichalcum Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 15, 17, 175);
INSERT INTO `item_proto` VALUES (48, 'Adamantite Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 17, 19, 200);
INSERT INTO `item_proto` VALUES (49, 'Dragotite Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 19, 21, 225);
INSERT INTO `item_proto` VALUES (50, 'Hihiirokane Earings', 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 0, 21, 23, 250);
INSERT INTO `item_proto` VALUES (51, 'Wooden Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 3, 5, 25);
INSERT INTO `item_proto` VALUES (52, 'Stone Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 5, 7, 50);
INSERT INTO `item_proto` VALUES (53, 'Iron Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 7, 9, 75);
INSERT INTO `item_proto` VALUES (54, 'Steel Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 9, 11, 100);
INSERT INTO `item_proto` VALUES (55, 'Magisteel Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 11, 13, 125);
INSERT INTO `item_proto` VALUES (56, 'Mithril Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 13, 15, 150);
INSERT INTO `item_proto` VALUES (57, 'Orichalcum Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 15, 17, 175);
INSERT INTO `item_proto` VALUES (58, 'Adamantite Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 17, 19, 200);
INSERT INTO `item_proto` VALUES (59, 'Dragotite Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 19, 21, 225);
INSERT INTO `item_proto` VALUES (60, 'Hihiirokane Bracelet', 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 0, 21, 23, 250);
INSERT INTO `item_proto` VALUES (61, 'Wooden Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 3, 5, 25);
INSERT INTO `item_proto` VALUES (62, 'Stone Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 5, 7, 50);
INSERT INTO `item_proto` VALUES (63, 'Iron Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 7, 9, 75);
INSERT INTO `item_proto` VALUES (64, 'Steel Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 9, 11, 100);
INSERT INTO `item_proto` VALUES (65, 'Magisteel Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 11, 13, 125);
INSERT INTO `item_proto` VALUES (66, 'Mithril Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 13, 15, 150);
INSERT INTO `item_proto` VALUES (67, 'Orichalcum Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 15, 17, 175);
INSERT INTO `item_proto` VALUES (68, 'Adamantite Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 17, 19, 200);
INSERT INTO `item_proto` VALUES (69, 'Dragotite Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 19, 21, 225);
INSERT INTO `item_proto` VALUES (70, 'Hihiirokane Necklace', 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 0, 21, 23, 250);
INSERT INTO `item_proto` VALUES (71, 'Leather Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 3, 5, 25);
INSERT INTO `item_proto` VALUES (72, 'Fur Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 5, 7, 50);
INSERT INTO `item_proto` VALUES (73, 'Iron Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 7, 9, 75);
INSERT INTO `item_proto` VALUES (74, 'Steel Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 9, 11, 100);
INSERT INTO `item_proto` VALUES (75, 'Magisteel Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 11, 13, 125);
INSERT INTO `item_proto` VALUES (76, 'Mithril Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 13, 15, 150);
INSERT INTO `item_proto` VALUES (77, 'Orichalcum Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 15, 17, 175);
INSERT INTO `item_proto` VALUES (78, 'Adamantite Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 17, 19, 200);
INSERT INTO `item_proto` VALUES (79, 'Dragotite Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 19, 21, 225);
INSERT INTO `item_proto` VALUES (80, 'Hihiirokane Boots', 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 0, 21, 23, 250);
INSERT INTO `item_proto` VALUES (81, 'Leather Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 3, 5, 25);
INSERT INTO `item_proto` VALUES (82, 'Fur Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 5, 7, 50);
INSERT INTO `item_proto` VALUES (83, 'Iron Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 7, 9, 75);
INSERT INTO `item_proto` VALUES (84, 'Steel Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 9, 11, 100);
INSERT INTO `item_proto` VALUES (85, 'Magisteel Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 11, 13, 125);
INSERT INTO `item_proto` VALUES (86, 'Mithril Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 13, 15, 150);
INSERT INTO `item_proto` VALUES (87, 'Orichalcum Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 15, 17, 175);
INSERT INTO `item_proto` VALUES (88, 'Adamantite Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 17, 19, 200);
INSERT INTO `item_proto` VALUES (89, 'Dragotite Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 19, 21, 225);
INSERT INTO `item_proto` VALUES (90, 'Hihiirokane Belt', 'ITEM_ARMOR', 'ITEM_BELT', 1, 0, 21, 23, 250);
INSERT INTO `item_proto` VALUES (91, 'Stamina Potion (S)', 'ITEM_POTION', 'ITEM_STAMINA', 1, 0, 25, 25, 25);
INSERT INTO `item_proto` VALUES (92, 'Stamina Potion (M)', 'ITEM_POTION', 'ITEM_STAMINA', 1, 0, 50, 50, 50);
INSERT INTO `item_proto` VALUES (93, 'Stamina Potion (L)', 'ITEM_POTION', 'ITEM_STAMINA', 1, 0, 75, 75, 75);
INSERT INTO `item_proto` VALUES (94, 'Stamina Potion (E)', 'ITEM_POTION', 'ITEM_STAMINA', 1, 0, 100, 100, 100);
INSERT INTO `item_proto` VALUES (95, 'Leather', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 10);
INSERT INTO `item_proto` VALUES (96, 'Fur', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 25);
INSERT INTO `item_proto` VALUES (97, 'Iron ingot', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 50);
INSERT INTO `item_proto` VALUES (98, 'Steel ingot', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 75);
INSERT INTO `item_proto` VALUES (99, 'Magisteel ingot', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 100);
INSERT INTO `item_proto` VALUES (100, 'Mithril ingot', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 125);
INSERT INTO `item_proto` VALUES (101, 'Orichalcum ingot', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 150);
INSERT INTO `item_proto` VALUES (102, 'Adamantite ingot', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 200);
INSERT INTO `item_proto` VALUES (103, 'Dragotite ingot', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 400);
INSERT INTO `item_proto` VALUES (104, 'Hihiirokane ingot', 'ITEM_MISC', 'ITEM_MATERIAL', 1, 0, 0, 0, 1000);

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `player_id` int NOT NULL,
  `item_vnum` int NOT NULL,
  `item_type` enum('ITEM_WEAPON','ITEM_ARMOR','ITEM_POTION','ITEM_POISON','ITEM_MISC') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ITEM_MISC',
  `item_subtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` tinyint UNSIGNED NOT NULL DEFAULT 1,
  `rarity` int NOT NULL DEFAULT 1,
  `equipped` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vnum`(`item_vnum`) USING BTREE,
  INDEX `owner`(`player_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of items
-- ----------------------------

-- ----------------------------
-- Table structure for labyrinth
-- ----------------------------
DROP TABLE IF EXISTS `labyrinth`;
CREATE TABLE `labyrinth`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `quardian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of labyrinth
-- ----------------------------

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
  `cost` int NOT NULL DEFAULT 5,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of quests
-- ----------------------------
INSERT INTO `quests` VALUES (1, 'Armorsaurus', 5, 100, 5, 5, 0, 5, 10, 10, 20, 0, 0, 'NONE', 0, 5);
INSERT INTO `quests` VALUES (2, 'Bandit', 5, 100, 5, 5, 0, 5, 10, 10, 20, 0, 0, 'NONE', 0, 5);
INSERT INTO `quests` VALUES (3, 'Black serpent', 5, 100, 5, 5, 0, 5, 10, 10, 20, 0, 0, 'NONE', 0, 5);
INSERT INTO `quests` VALUES (4, 'Black spider', 5, 100, 5, 5, 0, 5, 10, 10, 20, 0, 0, 'NONE', 0, 5);
INSERT INTO `quests` VALUES (5, 'Direwolf', 5, 100, 5, 5, 0, 5, 10, 10, 20, 0, 0, 'NONE', 0, 5);
INSERT INTO `quests` VALUES (6, 'Evil centipede', 5, 100, 5, 5, 0, 5, 10, 10, 20, 0, 0, 'NONE', 0, 5);
INSERT INTO `quests` VALUES (7, 'Giant bat', 5, 100, 5, 5, 0, 5, 10, 10, 20, 0, 0, 'NONE', 0, 5);
INSERT INTO `quests` VALUES (8, 'Goblin', 5, 100, 5, 5, 0, 5, 10, 10, 20, 0, 0, 'NONE', 0, 5);

-- ----------------------------
-- Table structure for skill_proto
-- ----------------------------
DROP TABLE IF EXISTS `skill_proto`;
CREATE TABLE `skill_proto`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of skill_proto
-- ----------------------------

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of skills
-- ----------------------------

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of town_upgrades
-- ----------------------------

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of towns
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
