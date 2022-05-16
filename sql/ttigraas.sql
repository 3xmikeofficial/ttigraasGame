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

 Date: 16/05/2022 13:46:39
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
  `species` enum('Physical','Spiritual') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Physical',
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
INSERT INTO `characters` VALUES (1, '1', 'testaccount', 19, 19, 'Slime', NULL, 0, 100, 10, 100, 10, 20, 0, 0, 433);

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
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES (1, 1, 91, 'ITEM_POTION', 'ITEM_STAMINA', 10, 1, 0);
INSERT INTO `items` VALUES (2, 1, 31, 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 1, 0);
INSERT INTO `items` VALUES (3, 1, 71, 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 1, 0);
INSERT INTO `items` VALUES (4, 1, 31, 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 1, 0);
INSERT INTO `items` VALUES (5, 1, 11, 'ITEM_ARMOR', 'ITEM_BODY', 1, 8, 1);
INSERT INTO `items` VALUES (6, 1, 81, 'ITEM_ARMOR', 'ITEM_BELT', 1, 1, 0);
INSERT INTO `items` VALUES (7, 1, 31, 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 1, 0);
INSERT INTO `items` VALUES (8, 1, 51, 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 1, 0);
INSERT INTO `items` VALUES (9, 1, 61, 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 1, 0);
INSERT INTO `items` VALUES (10, 1, 81, 'ITEM_ARMOR', 'ITEM_BELT', 1, 1, 0);
INSERT INTO `items` VALUES (11, 1, 81, 'ITEM_ARMOR', 'ITEM_BELT', 1, 1, 0);
INSERT INTO `items` VALUES (12, 1, 41, 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 1, 0);
INSERT INTO `items` VALUES (13, 1, 21, 'ITEM_ARMOR', 'ITEM_HELMET', 1, 1, 0);
INSERT INTO `items` VALUES (14, 1, 61, 'ITEM_ARMOR', 'ITEM_NECKLACE', 1, 1, 0);
INSERT INTO `items` VALUES (15, 1, 1, 'ITEM_WEAPON', 'ITEM_SWORD', 1, 1, 0);
INSERT INTO `items` VALUES (16, 1, 31, 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 1, 0);
INSERT INTO `items` VALUES (17, 1, 51, 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 1, 0);
INSERT INTO `items` VALUES (18, 1, 1, 'ITEM_WEAPON', 'ITEM_SWORD', 1, 1, 0);
INSERT INTO `items` VALUES (20, 1, 51, 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 1, 0);
INSERT INTO `items` VALUES (21, 1, 95, 'ITEM_MISC', 'ITEM_MATERIAL', 1, 1, 0);
INSERT INTO `items` VALUES (22, 1, 31, 'ITEM_ARMOR', 'ITEM_SHIELD', 1, 1, 0);
INSERT INTO `items` VALUES (23, 1, 41, 'ITEM_ARMOR', 'ITEM_EARINGS', 1, 1, 0);
INSERT INTO `items` VALUES (24, 1, 71, 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 1, 0);
INSERT INTO `items` VALUES (25, 1, 51, 'ITEM_ARMOR', 'ITEM_BRACELET', 1, 1, 0);
INSERT INTO `items` VALUES (26, 1, 11, 'ITEM_ARMOR', 'ITEM_BODY', 1, 1, 0);
INSERT INTO `items` VALUES (27, 1, 71, 'ITEM_ARMOR', 'ITEM_BOOTS', 1, 1, 0);

-- ----------------------------
-- Table structure for labyrinth
-- ----------------------------
DROP TABLE IF EXISTS `labyrinth`;
CREATE TABLE `labyrinth`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `quardian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('PASSIVE','ATTACK','RESISTENCE') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `previous` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `next` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `evolution` enum('INTRINSIC','COMMON','EXTRA','COMPOSITE','UNIQUE','ULTIMATE','ORIGIN','MANAS') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'COMMON',
  `rank` enum('DEFAULT','DEMON_LORD','TRUE_DEMON_LORD','GREAT_DEMON_LORD','TRUE_DRAGON') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'DEFAULT',
  `level_limit` int NOT NULL,
  `max_level` int NOT NULL,
  `apply_type` enum('NONE') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apply_value` int NOT NULL,
  `cooldown` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of skill_proto
-- ----------------------------
INSERT INTO `skill_proto` VALUES (1, 'regeneration', 'PASSIVE', '{0}', '{15}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (2, 'absorb', 'PASSIVE', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (3, 'dissolve', 'PASSIVE', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (4, 'poisonous_breath', 'ATTACK', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (5, 'sense_heat_source', 'PASSIVE', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (6, 'paralyzing_breath', 'ATTACK', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (7, 'sticky_thread', 'ATTACK', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (8, 'steel_thread', 'PASSIVE', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (9, 'vampirism', 'ATTACK', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (10, 'ultrasound_waves', 'ATTACK', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (11, 'body_armor', 'PASSIVE', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (12, 'keen_smell', 'PASSIVE', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (13, 'telepathy', 'PASSIVE', '{0}', '{17}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (14, 'coercion', 'ATTACK', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (15, 'ultraspeed_regeneration', 'PASSIVE', '{1}', '{16}', 'COMMON', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (16, 'infinite_regeneration', 'PASSIVE', '{15}', '{0}', 'COMMON', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (17, 'thought_communication', 'PASSIVE', '{13}', '{0}', 'COMMON', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (18, 'hydraulic_propulsion', 'PASSIVE', '{0}', '{21}', 'COMMON', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (19, 'water_current_manipulation', 'PASSIVE', '{0}', '{21}', 'COMMON', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (20, 'water_blade', 'ATTACK', '{0}', '{21}', 'COMMON', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (21, 'water_manipulation', 'PASSIVE', '{18,19,20}', '{25}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (22, 'fire_manipulation', 'PASSIVE', '{0}', '{24,25}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (23, 'combustion', 'PASSIVE', '{0}', '{24,25}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (24, 'black_flame', 'PASSIVE', '{21,22,23}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (25, 'molecular_manipulation', 'PASSIVE', '{21,22,23}', '{27,36}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (26, 'black_lightning', 'ATTACK', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (27, 'black_thunder', 'ATTACK', '{25,26}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (28, 'body_double', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (29, 'enchanced_body_double', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (30, 'haki', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (31, 'earth_manipulation', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (32, 'gravity_manipulation', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (33, 'heroic_haki', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (34, 'demon_lord_haki', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (35, 'magic_jamming', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (36, 'magic_manipulation', 'PASSIVE', '{25,35}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (37, 'magic_sense', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (38, 'universal_sense', 'PASSIVE', '{10,12,37,39}', '{0}', 'INTRINSIC', 'TRUE_DEMON_LORD', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (39, 'sense_soundwaves', 'PASSIVE', '{0}', '{0}', 'COMMON', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (40, 'ranged_barrier', 'PASSIVE', '{0}', '{0}', 'INTRINSIC', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (41, 'multilayer_barrier', 'PASSIVE', '{40}', '{42}', 'COMPOSITE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (42, 'multidimensional_barrier', 'PASSIVE', '{41}', '{0}', 'COMMON', 'TRUE_DRAGON', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (43, 'wise_one', 'PASSIVE', '{0}', '{44}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (44, 'sage', 'PASSIVE', '{43}', '{45}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (45, 'great_sage', 'PASSIVE', '{44}', '{46}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (46, 'raphael', 'PASSIVE', '{45,47}', '{0}', 'ULTIMATE', 'TRUE_DEMON_LORD', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (47, 'degenerate', 'PASSIVE', '{0}', '{46}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (48, 'ciel', 'PASSIVE', '{46}', '{0}', 'MANAS', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (49, 'shadow_step', 'PASSIVE', '{0}', '{50}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (50, 'spacial_travel', 'PASSIVE', '{49}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (51, 'unlimited_imprisonment', 'ATTACK', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (52, 'uriel', 'PASSIVE', '{50,51}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (53, 'sticky_steel_thread', 'ATTACK', '{7.8}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (54, 'hell_flare', 'ATTACK', '{22,24,40}', '{0}', 'COMPOSITE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (55, 'wind_manipulation', 'PASSIVE', '{0}', '{0}', 'EXTRA', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (56, 'death_storm', 'ATTACK', '{', '', 'COMMON', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (57, 'death_storm', 'ATTACK', '{26,55}', '{0}', 'COMPOSITE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (58, 'flare_circle', 'ATTACK', '{22,23,40}', '{0}', 'COMPOSITE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (59, 'absolute_severance', 'ATTACK', '{0}', '{59}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (60, 'usurper', 'ATTACK', '{0}', '{60}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (61, 'yog_sothoth', 'ATTACK', '{51,59,60,62}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (62, 'time_travel', 'PASSIVE', '{0}', '{61}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (63, 'analyst', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (64, 'mathematician', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (65, 'berserker', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (66, 'bewilder', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (67, 'chosen_one', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (68, 'king_of_heroes', 'PASSIVE', '{0}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (69, 'cook', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (70, 'creator', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (71, 'generalissimo', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (72, 'predator', 'ATTACK', '{0}', '{74}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (73, 'starved', 'ATTACK', '{0}', '{74}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (74, 'gluttony', 'ATTACK', '{72,73}', '{75}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (75, 'beelzebuth', 'ATTACK', '{75}', '{76}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (76, 'merciless', 'ATTACK', '{0}', '{75}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (77, 'velgrynd', 'ATTACK', '{0}', '{79}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (78, 'veldora', 'ATTACK', '{0}', '{79}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (79, 'azathoth', 'ATTACK', '{46,75,77,78}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (80, 'gourmet', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (81, 'godly_craftsman', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (82, 'researcher', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (83, 'great_wiseman', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (84, 'greed', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (85, 'mammon', 'PASSIVE', '{84}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (86, 'guardian', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (87, 'investigator', 'PASSIVE', '{0}', '{88}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (88, 'faust', 'PASSIVE', '{87}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (89, 'lust', 'PASSIVE', '{0}', '{90}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (90, 'asmodeus', 'PASSIVE', '{89}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (91, 'survivor', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (92, 'tempter', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (93, 'pride', 'PASSIVE', '{0}', '{94}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (94, 'lucifer', 'PASSIVE', '{93}', '{95}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (95, 'nodens', 'PASSIVE', '{94}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (96, 'plunderer', 'PASSIVE', '{0}', '{85,97}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (97, 'azi_dahaka', 'PASSIVE', '{96}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (98, 'unyielding', 'PASSIVE', '{0}', '{99}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (99, 'sariel', 'PASSIVE', '{98}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (100, 'magicule_breeder_reactor', 'PASSIVE', '{0}', '{0}', 'ORIGIN', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (101, 'ahura_mazda', 'PASSIVE', '{70}', '{102}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (102, 'akashic_records', 'PASSIVE', '{101}', '{0}', 'ORIGIN', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (103, 'traveler', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (104, 'assassin', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (105, 'ruler', 'PASSIVE', '{0}', '{85}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (106, 'raguel', 'PASSIVE', '{0}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (107, 'cthugha', 'PASSIVE', '{52,106}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (108, 'shub-niggurath', 'PASSIVE', '{52}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (109, 'azazel', 'PASSIVE', '{83,92}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (110, 'gabriel', 'PASSIVE', '{0}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (111, 'leviathan', 'PASSIVE', '{0}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (112, 'cthulhu', 'PASSIVE', '{110,111}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (113, 'planner', 'PASSIVE', '{0}', '{0}', 'UNIQUE', 'DEFAULT', 0, 0, 'NONE', 0, 0);
INSERT INTO `skill_proto` VALUES (114, 'melchizedek', 'PASSIVE', '{113}', '{0}', 'ULTIMATE', 'DEFAULT', 0, 0, 'NONE', 0, 0);

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of towns
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
