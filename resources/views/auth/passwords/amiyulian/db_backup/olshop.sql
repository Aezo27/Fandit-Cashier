/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : olshop

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 26/05/2022 19:16:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for banks
-- ----------------------------
DROP TABLE IF EXISTS `banks`;
CREATE TABLE `banks`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_rek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `an` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banks
-- ----------------------------
INSERT INTO `banks` VALUES (1, 'Bank BRI', '0000000000000', 'Rama Sullivan', NULL, '2020-06-30 21:41:47', NULL);
INSERT INTO `banks` VALUES (2, 'Bank BCA', '0000000', 'Rama Sullivan', NULL, '2020-06-30 21:42:29', NULL);
INSERT INTO `banks` VALUES (20, 'GoPay', '', 'Aezo27', '12312312.png', '2020-06-30 23:43:54', '2020-07-01 00:00:19');
INSERT INTO `banks` VALUES (22, 'BNI', '5555555555555', 'Rama', NULL, '2022-05-18 19:49:16', '2022-05-18 19:49:16');

-- ----------------------------
-- Table structure for banner_category
-- ----------------------------
DROP TABLE IF EXISTS `banner_category`;
CREATE TABLE `banner_category`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banner_category
-- ----------------------------
INSERT INTO `banner_category` VALUES (1, 'Hijab', 'http://localhost:8000/product/category?cate=2', 'banner-1.png', '2020-06-20 01:38:08', NULL);
INSERT INTO `banner_category` VALUES (2, 'Gamis', 'http://localhost:8000/product/category?cate=4', 'banner-2.png', '2020-06-20 01:38:11', NULL);
INSERT INTO `banner_category` VALUES (3, 'Sarung', 'http://localhost:8000/product/category?cate=10', 'banner-3.png', '2020-06-20 01:38:15', NULL);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (2, 'Hijab', NULL, NULL);
INSERT INTO `categories` VALUES (4, 'Gamis', NULL, NULL);
INSERT INTO `categories` VALUES (9, 'Couple', '2022-04-19 18:51:03', '2022-04-19 18:51:03');
INSERT INTO `categories` VALUES (10, 'Sarung', '2022-05-18 12:43:22', '2022-05-18 12:43:22');

-- ----------------------------
-- Table structure for color_product
-- ----------------------------
DROP TABLE IF EXISTS `color_product`;
CREATE TABLE `color_product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `color_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 243 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of color_product
-- ----------------------------
INSERT INTO `color_product` VALUES (71, 1, 1593445730, '2020-06-29 15:48:50', '2020-06-29 15:48:50');
INSERT INTO `color_product` VALUES (72, 4, 1593445799, '2020-06-29 15:49:59', '2020-06-29 15:49:59');
INSERT INTO `color_product` VALUES (126, 2, 1650084466, '2022-04-19 17:56:07', '2022-04-19 17:56:07');
INSERT INTO `color_product` VALUES (127, 4, 1650084466, '2022-04-19 17:56:07', '2022-04-19 17:56:07');
INSERT INTO `color_product` VALUES (128, 19, 1650084466, '2022-04-19 17:56:07', '2022-04-19 17:56:07');
INSERT INTO `color_product` VALUES (129, 33, 1650084466, '2022-04-19 17:56:07', '2022-04-19 17:56:07');
INSERT INTO `color_product` VALUES (130, 8, 1650091299, '2022-04-19 18:08:57', '2022-04-19 18:08:57');
INSERT INTO `color_product` VALUES (131, 18, 1650091299, '2022-04-19 18:08:57', '2022-04-19 18:08:57');
INSERT INTO `color_product` VALUES (132, 34, 1650091299, '2022-04-19 18:08:57', '2022-04-19 18:08:57');
INSERT INTO `color_product` VALUES (133, 16, 1650393935, '2022-04-19 18:45:35', '2022-04-19 18:45:35');
INSERT INTO `color_product` VALUES (134, 20, 1650393935, '2022-04-19 18:45:35', '2022-04-19 18:45:35');
INSERT INTO `color_product` VALUES (135, 35, 1650393935, '2022-04-19 18:45:35', '2022-04-19 18:45:35');
INSERT INTO `color_product` VALUES (136, 36, 1650393935, '2022-04-19 18:45:35', '2022-04-19 18:45:35');
INSERT INTO `color_product` VALUES (137, 1, 1651145618, '2022-04-28 11:33:38', '2022-04-28 11:33:38');
INSERT INTO `color_product` VALUES (138, 4, 1651145618, '2022-04-28 11:33:38', '2022-04-28 11:33:38');
INSERT INTO `color_product` VALUES (139, 5, 1651145618, '2022-04-28 11:33:38', '2022-04-28 11:33:38');
INSERT INTO `color_product` VALUES (140, 7, 1651145618, '2022-04-28 11:33:38', '2022-04-28 11:33:38');
INSERT INTO `color_product` VALUES (141, 14, 1651145618, '2022-04-28 11:33:38', '2022-04-28 11:33:38');
INSERT INTO `color_product` VALUES (142, 1, 1651145881, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `color_product` VALUES (143, 2, 1651145881, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `color_product` VALUES (144, 4, 1651145881, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `color_product` VALUES (145, 5, 1651145881, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `color_product` VALUES (146, 7, 1651145881, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `color_product` VALUES (147, 14, 1651145881, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `color_product` VALUES (148, 23, 1651145881, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `color_product` VALUES (149, 35, 1651145881, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `color_product` VALUES (150, 1, 1651146269, '2022-04-28 11:44:29', '2022-04-28 11:44:29');
INSERT INTO `color_product` VALUES (151, 2, 1651146269, '2022-04-28 11:44:29', '2022-04-28 11:44:29');
INSERT INTO `color_product` VALUES (152, 14, 1651146269, '2022-04-28 11:44:29', '2022-04-28 11:44:29');
INSERT INTO `color_product` VALUES (153, 19, 1651146269, '2022-04-28 11:44:29', '2022-04-28 11:44:29');
INSERT INTO `color_product` VALUES (154, 26, 1651146269, '2022-04-28 11:44:29', '2022-04-28 11:44:29');
INSERT INTO `color_product` VALUES (155, 28, 1651146269, '2022-04-28 11:44:29', '2022-04-28 11:44:29');
INSERT INTO `color_product` VALUES (156, 29, 1651146269, '2022-04-28 11:44:29', '2022-04-28 11:44:29');
INSERT INTO `color_product` VALUES (165, 1, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (166, 5, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (167, 7, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (168, 8, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (169, 14, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (170, 17, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (171, 18, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (172, 19, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (173, 26, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (174, 28, 1651146937, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `color_product` VALUES (175, 1, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (176, 2, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (177, 4, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (178, 5, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (179, 8, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (180, 14, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (181, 15, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (182, 16, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (183, 18, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (184, 19, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (185, 28, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (186, 36, 1651146556, '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `color_product` VALUES (187, 1, 1651147243, '2022-04-28 12:00:43', '2022-04-28 12:00:43');
INSERT INTO `color_product` VALUES (188, 2, 1651147243, '2022-04-28 12:00:43', '2022-04-28 12:00:43');
INSERT INTO `color_product` VALUES (189, 4, 1651147243, '2022-04-28 12:00:43', '2022-04-28 12:00:43');
INSERT INTO `color_product` VALUES (190, 14, 1651147243, '2022-04-28 12:00:43', '2022-04-28 12:00:43');
INSERT INTO `color_product` VALUES (191, 15, 1651147243, '2022-04-28 12:00:43', '2022-04-28 12:00:43');
INSERT INTO `color_product` VALUES (192, 1, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (193, 2, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (194, 4, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (195, 5, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (196, 7, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (197, 8, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (198, 14, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (199, 15, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (200, 17, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (201, 28, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (202, 34, 1651147395, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `color_product` VALUES (203, 1, 1651147562, '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `color_product` VALUES (204, 2, 1651147562, '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `color_product` VALUES (205, 4, 1651147562, '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `color_product` VALUES (206, 5, 1651147562, '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `color_product` VALUES (207, 7, 1651147562, '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `color_product` VALUES (208, 14, 1651147562, '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `color_product` VALUES (209, 34, 1651147562, '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `color_product` VALUES (210, 1, 1651147847, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `color_product` VALUES (211, 2, 1651147847, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `color_product` VALUES (212, 4, 1651147847, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `color_product` VALUES (213, 5, 1651147847, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `color_product` VALUES (214, 7, 1651147847, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `color_product` VALUES (215, 14, 1651147847, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `color_product` VALUES (216, 16, 1651147847, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `color_product` VALUES (217, 19, 1651147847, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `color_product` VALUES (218, 1, 1651147998, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `color_product` VALUES (219, 2, 1651147998, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `color_product` VALUES (220, 13, 1651147998, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `color_product` VALUES (221, 14, 1651147998, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `color_product` VALUES (222, 21, 1651147998, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `color_product` VALUES (223, 22, 1651147998, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `color_product` VALUES (224, 23, 1651147998, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `color_product` VALUES (225, 31, 1651147998, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `color_product` VALUES (226, 1, 1651148148, '2022-04-28 12:15:48', '2022-04-28 12:15:48');
INSERT INTO `color_product` VALUES (227, 2, 1651148148, '2022-04-28 12:15:48', '2022-04-28 12:15:48');
INSERT INTO `color_product` VALUES (228, 11, 1651148148, '2022-04-28 12:15:48', '2022-04-28 12:15:48');
INSERT INTO `color_product` VALUES (229, 14, 1651148148, '2022-04-28 12:15:48', '2022-04-28 12:15:48');
INSERT INTO `color_product` VALUES (230, 24, 1651148148, '2022-04-28 12:15:48', '2022-04-28 12:15:48');
INSERT INTO `color_product` VALUES (231, 1, 1651148303, '2022-04-28 12:18:23', '2022-04-28 12:18:23');
INSERT INTO `color_product` VALUES (232, 2, 1651148303, '2022-04-28 12:18:23', '2022-04-28 12:18:23');
INSERT INTO `color_product` VALUES (233, 3, 1651148303, '2022-04-28 12:18:23', '2022-04-28 12:18:23');
INSERT INTO `color_product` VALUES (234, 4, 1651148303, '2022-04-28 12:18:23', '2022-04-28 12:18:23');
INSERT INTO `color_product` VALUES (235, 5, 1651148303, '2022-04-28 12:18:24', '2022-04-28 12:18:24');
INSERT INTO `color_product` VALUES (236, 16, 1651148303, '2022-04-28 12:18:24', '2022-04-28 12:18:24');
INSERT INTO `color_product` VALUES (237, 17, 1651148303, '2022-04-28 12:18:24', '2022-04-28 12:18:24');
INSERT INTO `color_product` VALUES (238, 26, 1651148303, '2022-04-28 12:18:24', '2022-04-28 12:18:24');
INSERT INTO `color_product` VALUES (239, 27, 1651148303, '2022-04-28 12:18:24', '2022-04-28 12:18:24');
INSERT INTO `color_product` VALUES (240, 28, 1651148303, '2022-04-28 12:18:24', '2022-04-28 12:18:24');
INSERT INTO `color_product` VALUES (241, 1, 1652877340, '2022-05-18 12:35:40', '2022-05-18 12:35:40');
INSERT INTO `color_product` VALUES (242, 10, 1652877340, '2022-05-18 12:35:41', '2022-05-18 12:35:41');

-- ----------------------------
-- Table structure for colors
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of colors
-- ----------------------------
INSERT INTO `colors` VALUES (1, 'Hitam', '#000', '2020-06-25 05:35:11', '2020-06-25 05:35:14');
INSERT INTO `colors` VALUES (2, 'Merah', '#da0016', NULL, NULL);
INSERT INTO `colors` VALUES (3, 'Putih', '#fff', NULL, NULL);
INSERT INTO `colors` VALUES (4, 'Hijau', '#28a745', NULL, NULL);
INSERT INTO `colors` VALUES (5, 'Coklat', '#c77520', NULL, NULL);
INSERT INTO `colors` VALUES (7, 'Kuning', '#c2bb00', '2020-06-26 13:52:34', '2020-06-26 13:52:34');
INSERT INTO `colors` VALUES (8, 'Darwin Orchid', '#FD58C6', '2020-09-11 07:02:51', '2020-09-11 07:02:51');
INSERT INTO `colors` VALUES (9, 'Orchid Darwin', '#D79999', '2020-09-11 07:03:15', '2020-09-11 07:03:15');
INSERT INTO `colors` VALUES (10, 'Milo Muda Maroon', '#9A7272', '2020-09-11 07:03:31', '2020-09-11 07:03:31');
INSERT INTO `colors` VALUES (11, 'Maroon Milo Muda', '#530B0B', '2020-09-11 07:03:56', '2020-09-11 07:03:56');
INSERT INTO `colors` VALUES (12, 'Light Grey Dark Grey', '#CECACA', '2020-09-11 07:04:08', '2020-09-11 07:04:08');
INSERT INTO `colors` VALUES (13, 'Dark Grey Light Grey', '#656161', '2020-09-11 07:04:22', '2020-09-11 07:04:22');
INSERT INTO `colors` VALUES (14, 'Maroon', '#921616', '2020-09-11 07:18:49', '2020-09-11 07:18:49');
INSERT INTO `colors` VALUES (15, 'Dark Green', '#244524', '2020-09-11 07:19:03', '2020-09-11 07:19:03');
INSERT INTO `colors` VALUES (16, 'Mustard', '#D2CD63', '2020-09-11 07:19:14', '2020-09-11 07:19:14');
INSERT INTO `colors` VALUES (17, 'Light Grey', '#C2C2C2', '2020-09-11 07:19:23', '2020-09-11 07:19:23');
INSERT INTO `colors` VALUES (18, 'Dark Grey', '#595555', '2020-09-11 07:19:35', '2020-09-11 07:19:35');
INSERT INTO `colors` VALUES (19, 'Lavender', '#A85ACE', '2020-09-11 07:19:50', '2020-09-11 07:19:50');
INSERT INTO `colors` VALUES (20, 'Coksu Maroon', '#F7DBDB', '2020-09-12 04:16:52', '2020-09-12 04:16:52');
INSERT INTO `colors` VALUES (21, 'Medium Grey Navy', '#826F98', '2020-09-12 04:17:11', '2020-09-12 04:17:11');
INSERT INTO `colors` VALUES (22, 'Maroon Mustard', '#611111', '2020-09-12 04:17:29', '2020-09-12 04:17:29');
INSERT INTO `colors` VALUES (23, 'Mint Coksu', '#6DF5B4', '2020-09-12 04:17:51', '2020-09-12 04:17:51');
INSERT INTO `colors` VALUES (24, 'Darwin Medium Grey', '#DB84C2', '2020-09-12 04:18:15', '2020-09-12 04:18:15');
INSERT INTO `colors` VALUES (25, 'Silver Darwin', '#AAA9A9', '2020-09-12 04:18:45', '2020-09-12 04:18:45');
INSERT INTO `colors` VALUES (26, 'Biru Turkish Navy', '#63E1EF', '2020-09-12 04:24:27', '2020-09-12 04:24:27');
INSERT INTO `colors` VALUES (27, 'Mint Silver', '#6BFFDC', '2020-09-12 04:24:40', '2020-09-12 04:24:40');
INSERT INTO `colors` VALUES (28, 'Hitam Mint', '#1C1A1A', '2020-09-12 04:24:48', '2020-09-12 04:24:48');
INSERT INTO `colors` VALUES (29, 'Peach Coksu', '#F1C3E6', '2020-09-12 04:25:10', '2020-09-12 04:25:10');
INSERT INTO `colors` VALUES (30, 'Darwin Maroon', '#EBB1B1', '2020-09-12 04:25:24', '2020-09-12 04:25:24');
INSERT INTO `colors` VALUES (31, 'Maroon Mustard', '#8C2323', '2020-09-12 04:25:37', '2020-09-12 04:25:37');
INSERT INTO `colors` VALUES (32, 'Army', '#082D1D', '2020-09-12 04:29:13', '2020-09-12 04:29:13');
INSERT INTO `colors` VALUES (33, 'Milo Muda', '#AAB29A', '2020-09-12 04:29:46', '2020-09-12 04:29:46');
INSERT INTO `colors` VALUES (34, 'Maroon', '#471414', '2020-09-12 04:29:56', '2020-09-12 04:29:56');
INSERT INTO `colors` VALUES (35, 'Darwin', '#D78F8F', '2020-09-12 04:30:08', '2020-09-12 04:30:08');
INSERT INTO `colors` VALUES (36, 'Orchid', '#DF85C1', '2020-09-12 04:30:23', '2020-09-12 04:30:23');
INSERT INTO `colors` VALUES (37, 'Hijau Tua', '#006F20', '2022-05-18 12:43:51', '2022-05-18 12:43:51');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES (1, 'whatsapp', '#', '2020-06-29 12:30:16', '2020-08-19 03:28:34');
INSERT INTO `contacts` VALUES (2, 'instagram', 'https://www.instagram.com/amdiarahijab', '2020-06-29 12:30:13', '2020-08-19 03:28:34');
INSERT INTO `contacts` VALUES (3, 'facebook', 'https://fb.com/amdiarahijab', '2020-06-29 11:01:02', '2020-08-19 03:28:34');
INSERT INTO `contacts` VALUES (4, 'twitter', '#', '2020-06-29 12:30:10', '2020-08-19 03:33:14');
INSERT INTO `contacts` VALUES (5, 'messenger', 'https://m.me/amdiarahijab', '2020-07-09 01:42:41', '2020-08-19 03:28:34');
INSERT INTO `contacts` VALUES (6, 'email', 'amdiarahijab@gmail.com', '2020-06-29 12:30:03', '2020-08-19 03:33:14');
INSERT INTO `contacts` VALUES (7, 'alamat', 'Jl. Mayor Achmadi, Mojosongo, Kec. Jebres, Kota Surakarta, Jawa Tengah - 57127', '2020-06-19 15:58:12', '2020-07-09 01:58:07');
INSERT INTO `contacts` VALUES (8, 'maps', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.373575765559!2d110.8447055141515!3d-7.534171376451998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17017abcb467%3A0xa408754b66c897f2!2sAmdiara!5e0!3m2!1sen!2sid!4v1597807507493!5m2!1sen!2sid', '2020-06-29 11:01:39', '2020-08-19 03:33:14');
INSERT INTO `contacts` VALUES (9, 'telfon', '+6285103059999', '2020-06-29 12:29:59', '2020-07-09 01:58:07');
INSERT INTO `contacts` VALUES (10, 'shopee', '#', '2022-04-16 04:57:08', NULL);

-- ----------------------------
-- Table structure for data_reseller
-- ----------------------------
DROP TABLE IF EXISTS `data_reseller`;
CREATE TABLE `data_reseller`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `foto_profil` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1675420605511927 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_reseller
-- ----------------------------

-- ----------------------------
-- Table structure for discount_widgets
-- ----------------------------
DROP TABLE IF EXISTS `discount_widgets`;
CREATE TABLE `discount_widgets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_selesai` datetime(0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of discount_widgets
-- ----------------------------
INSERT INTO `discount_widgets` VALUES (1, 'Diskon Hari Raya', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed\r\ndo ipsum dolor sit amet, consectetur adipisicing elit', 'Jaket', '100000', 'diskon.png', '2022-05-17 19:45:40', NULL, NULL, '1650084466');

-- ----------------------------
-- Table structure for faqs
-- ----------------------------
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faqs
-- ----------------------------
INSERT INTO `faqs` VALUES (1, 'Bagaimana Cara Memesan?', 'Klik barang dan tambahkan', NULL, '2022-05-18 12:47:55');
INSERT INTO `faqs` VALUES (2, 'Bagaimana Cara Membayar?', 'sed do eiusmod\r\n                                            tempor incididunt ut labore et dolore magna aliqua.', NULL, NULL);
INSERT INTO `faqs` VALUES (3, 'Kapan Barang Dikirim?', 'Ut enim ad minim veniam,\r\n                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                                            consequat.', NULL, NULL);

-- ----------------------------
-- Table structure for footer_link
-- ----------------------------
DROP TABLE IF EXISTS `footer_link`;
CREATE TABLE `footer_link`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of footer_link
-- ----------------------------
INSERT INTO `footer_link` VALUES (1, 'Reseller', '#', NULL, '2022-04-16 04:54:53');
INSERT INTO `footer_link` VALUES (2, 'About Us', 'http://localhost:8000/iklan', NULL, '2022-04-16 04:54:53');
INSERT INTO `footer_link` VALUES (3, 'Informasi', '#', NULL, '2022-05-18 12:48:25');
INSERT INTO `footer_link` VALUES (4, NULL, NULL, NULL, '2020-08-19 03:37:43');
INSERT INTO `footer_link` VALUES (5, NULL, NULL, NULL, '2020-08-19 03:37:43');
INSERT INTO `footer_link` VALUES (6, NULL, NULL, NULL, '2020-08-19 03:37:43');

-- ----------------------------
-- Table structure for home_slide
-- ----------------------------
DROP TABLE IF EXISTS `home_slide`;
CREATE TABLE `home_slide`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `diskon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of home_slide
-- ----------------------------
INSERT INTO `home_slide` VALUES (1, 'Blog', 'Ramadhan Telah Tiba', 'kami mengucapkan selamat menjalankan ibadah puasa 1443 H/2022.', 'http://localhost:8000/product', '2020-06-19 16:18:43', NULL, '50%', 'hero-1.png');
INSERT INTO `home_slide` VALUES (2, NULL, NULL, NULL, NULL, '2020-06-19 16:18:14', NULL, NULL, 'hero-2.png');
INSERT INTO `home_slide` VALUES (3, NULL, NULL, NULL, NULL, '2020-06-19 16:22:00', NULL, NULL, 'hero-3.png');
INSERT INTO `home_slide` VALUES (4, NULL, NULL, NULL, NULL, '2020-06-19 16:22:03', NULL, NULL, 'hero-4.png');
INSERT INTO `home_slide` VALUES (5, NULL, NULL, NULL, NULL, '2020-06-19 16:22:06', NULL, '75%', 'hero-5.jpg');

-- ----------------------------
-- Table structure for kurir
-- ----------------------------
DROP TABLE IF EXISTS `kurir`;
CREATE TABLE `kurir`  (
  `no_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_orders` bigint UNSIGNED NOT NULL,
  `kurir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kurir
-- ----------------------------
INSERT INTO `kurir` VALUES ('345345345345', 11, 'JNE', 10000, NULL, NULL);
INSERT INTO `kurir` VALUES ('23423424244', 12, 'JNT', 27000, NULL, NULL);
INSERT INTO `kurir` VALUES ('21312432451', 13, 'TIKI', 15000, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_06_08_133840_create_data_reseller', 1);
INSERT INTO `migrations` VALUES (4, '2020_06_10_203712_create_kontak_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_06_12_100118_create_order_table', 2);
INSERT INTO `migrations` VALUES (6, '2020_06_12_100258_create_product_table', 2);
INSERT INTO `migrations` VALUES (7, '2020_06_12_100329_create_order_has_product_table', 2);
INSERT INTO `migrations` VALUES (8, '2020_06_12_130906_create_kurir_table', 2);
INSERT INTO `migrations` VALUES (9, '2020_06_12_174726_create_order_product_table', 3);
INSERT INTO `migrations` VALUES (10, '2020_06_12_174726_create_orders_products_table', 4);
INSERT INTO `migrations` VALUES (11, '2020_06_14_085026_create_product_picture_table', 5);
INSERT INTO `migrations` VALUES (12, '2020_06_14_100345_create_categories_table', 5);
INSERT INTO `migrations` VALUES (13, '2020_06_14_100614_create_category_product_table', 5);
INSERT INTO `migrations` VALUES (14, '2020_06_14_101238_create_tags_table', 6);
INSERT INTO `migrations` VALUES (15, '2020_06_14_101318_create_product_tags_table', 6);
INSERT INTO `migrations` VALUES (16, '2020_06_16_220012_create_faq_table', 7);
INSERT INTO `migrations` VALUES (18, '2020_06_17_002122_create_discount_widgets_table', 8);
INSERT INTO `migrations` VALUES (19, '2020_06_19_214944_create_partner_table', 9);
INSERT INTO `migrations` VALUES (20, '2020_06_19_215024_create_footer_link_table', 9);
INSERT INTO `migrations` VALUES (21, '2020_06_19_231455_create_home_slide_table', 10);
INSERT INTO `migrations` VALUES (22, '2020_06_20_082907_create_banner_category_table', 11);
INSERT INTO `migrations` VALUES (23, '2020_06_20_102703_create_best_seller_table', 12);
INSERT INTO `migrations` VALUES (24, '2020_06_25_115755_create_sizes_table', 13);
INSERT INTO `migrations` VALUES (25, '2020_06_25_120456_create_colors_table', 13);
INSERT INTO `migrations` VALUES (26, '2020_06_25_122409_create_color_products_table', 14);

-- ----------------------------
-- Table structure for order_product
-- ----------------------------
DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_product
-- ----------------------------
INSERT INTO `order_product` VALUES (31, 1730239845728012, 1650084466, 1, '2022-04-15 05:01:42', '2022-04-16 05:01:42');
INSERT INTO `order_product` VALUES (32, 1730246261887388, 1650091299, 2, '2022-04-16 06:43:41', '2022-04-16 06:43:41');
INSERT INTO `order_product` VALUES (33, 1730246261887388, 1650084466, 3, '2022-04-16 06:43:41', '2022-04-16 06:43:41');
INSERT INTO `order_product` VALUES (34, 1731355232608692, 1650393935, 1, '2022-04-28 12:30:18', '2022-04-28 12:30:18');
INSERT INTO `order_product` VALUES (35, 1733087435773206, 1650084466, 1, '2022-05-17 15:22:55', '2022-05-17 15:22:55');
INSERT INTO `order_product` VALUES (36, 1733167661931541, 1652877340, 3, '2022-05-18 12:38:05', '2022-05-18 12:38:05');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` int NOT NULL,
  `alamat_lengkap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan_tambahan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `total` int NULL DEFAULT NULL,
  `diskon` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_tf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kurir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1733167661931542 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1730239845728012, 'Olshop_Project', 'Rama', 'ramasullivan27@gmail.com', '82134626597', 'Jawa Tengah', 'Sragen', 'Sukodono', 57263, 'Baleharjo', 'M', 258000, '0', 'finish', NULL, NULL, 'JNE: REG - 3-6 HARI KERJA', '8000', '2022-04-15 05:01:42', '2022-04-16 05:04:03');
INSERT INTO `orders` VALUES (1730246261887388, 'Olshop_Project', 'Aezo', 'ramasullivan27@gmail.com', '082134626598', 'Jawa Tengah', 'Sukoharjo', 'Kartasura', 57145, 'Gonilan, Kartasura', 'Biru l', 775000, '0', 'finish', NULL, '773624920jusfb', 'WAHANA: NORMAL -  HARI KERJA', '5000', '2022-04-16 06:43:41', '2022-04-16 06:44:29');
INSERT INTO `orders` VALUES (1731355232608692, 'Amiyulian', 'Rama', 'ramasullivan27@gmail.com', '082134626598', 'Jawa Tengah', 'Sukoharjo', 'Kartasura', 57145, 'Gonilan', NULL, 128000, '0', 'pending', NULL, NULL, 'SICEPAT: REG - 1-2 HARI KERJA', '18000', '2022-04-28 12:30:17', '2022-04-28 12:30:17');
INSERT INTO `orders` VALUES (1733087435773206, 'Amiyulian', 'Rama', 'ramasullivan27@gmail.com', '082134626598', 'Jawa Tengah', 'Sragen', 'Sukodono', 57263, 'Bangunrejo, Baleharjo', NULL, 249000, '0', 'pending', NULL, NULL, 'J&T: EZ -  HARI KERJA', '9000', '2022-05-17 15:22:55', '2022-05-17 15:22:55');
INSERT INTO `orders` VALUES (1733167661931541, 'Amiyulian', 'Rama', 'ramasullivan27@gmail.com', '082134626598', 'Jawa Tengah', 'Sukoharjo', 'Kartasura', 57145, 'Gonilan', NULL, 169000, '50000', 'finish', '1733167661931541.png', '773624920jusfb', 'J&T: EZ -  HARI KERJA', '9000', '2022-05-18 12:38:05', '2022-05-18 12:40:42');

-- ----------------------------
-- Table structure for partner
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of partner
-- ----------------------------
INSERT INTO `partner` VALUES (1, 'kosong', 'logo-1.png', NULL, '2020-06-19 15:17:29', NULL);
INSERT INTO `partner` VALUES (2, 'Yulian Express', 'logo-2.png', NULL, '2020-06-19 15:17:56', '2022-04-28 12:20:32');
INSERT INTO `partner` VALUES (3, 'j&t', 'logo-3.png', NULL, '2020-06-19 15:18:17', '2022-04-28 12:22:34');
INSERT INTO `partner` VALUES (4, 'kosong', 'logo-4.png', NULL, '2020-06-19 15:18:34', NULL);
INSERT INTO `partner` VALUES (5, 'kosong', 'logo-5.png', NULL, '2020-06-19 15:18:49', NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NULL DEFAULT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `harga_diskon` int NULL DEFAULT NULL,
  `stok` int NOT NULL,
  `ket1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_utama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gambar3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gambar4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gambar5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `views` int NULL DEFAULT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15934457999 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1650084466, 9, 'Gamis Set Syari Couple Mom & Kids Cerutty 2 Layer', 365000, 240000, 40, 'Gamis yang sangat nyaman untuk dipakai sehari-hari.', 'Spesifikasi AIRA MOM  & KIDZ :\r\n➖ Bahan Original Babydoll Platinum Twist Impor\r\n➖ Detail rok dengan variasi renda pada bagain bawah dan kombinasi warna\r\n➖ Busui Depan (Busui Friendly)\r\n➖ Terdapat Tali samping kanan & kiri \r\n➖Manset Variasi rufle, dengan kombinasi warna dan aksen renda.\r\n\r\nSpesifikasi Khimar Aira Mom :\r\n➖ Bahan Original babydoll Platinun Twist Impor \r\n➖ Pad Antem\r\n➖ Panjang Depan 95\r\n➖ Panjang Belakang 140\r\n➖ 2 Layer\r\n➖ Lancip Depan\r\n.\r\nSpesifikasi Khimar Aira Kidz :\r\n➖ Bahan Original babydoll Platinun Twist Impor \r\n➖ Pad Antem\r\n➖ Panjang Depan 65 \r\n➖ Panjang Belakang 105\r\n➖ 2 Layer\r\n➖ Lancip Depan\r\n\r\nHarga AIRA MOM 365.000\r\n.\r\nHarga Retail AIRA KIDZ :\r\nS - 240.000\r\nM - 255.000\r\nL - 270.000\r\nXL - 285.000', '1650084466_utama.png', '1650084466_1.png', '1650084466_2.png', '1650084466_3.png', NULL, 38, 'https://shopee.co.id/Gamis-Set-Syari-Couple-mom-kids-cerutty-2-layer-size-jumbo-sampai-xxl-i.497970110.8083027784?xptdk=dc05e5b6-6c4b-4d8b-aaee-be3f5a35e23f', '2022-04-16 04:47:46', '2022-05-18 12:45:56');
INSERT INTO `products` VALUES (1650091299, 4, 'Gamis Remaja Cerruty Mix Tile Import Berkualitas Dengan Khimar 2 Layer Set Syari', 330000, 0, 79, 'Gamis yang cantik berbahan berkualitas untuk remaja.', '☘️ Detail Gamis MAIRA TILE :\r\n▪️Matt Original Babydoll Platinum Twist Import mix Tile \r\n▪️Busui depan\r\n▪️Pinggang kerut kanan kiri \r\n▪️Saku kanan \r\n▪️Manset kerut terompet dengan kombinasi \r\n▪️Bagian bawah terdapat kriwil dengan aksen renda\r\n\r\n▶️ Detail Khimar MAIRA TILE :\r\n▪️Matt Original Babydoll Platinum Twist Import\r\n▪️2 Layer\r\n▪️Pad antem \r\n▪️Belah depan terdapat serut samping \r\n▪️PD 85 PB 120\r\n\r\n🌷 Tersedia Warna :\r\n✨ Dasty pink \r\n✨ Maroon\r\n✨ Dark grey\r\nFree Bross', '1650091299_utama.png', '1650091299_1.png', '1650091299_2.png', NULL, NULL, 25, NULL, '2022-04-16 06:41:39', '2022-04-26 09:01:49');
INSERT INTO `products` VALUES (1650393935, 2, 'Khumaira Pad', 110000, 0, 100, 'Hijab yang nyaman untuk dipakai.', 'ealpict\r\n\r\nDeskripsi produk dapat dilihat di foto...\r\n\r\nGamis dengan kualitas memukau harga terjangkau\r\n\r\nMenerima reseller dan dropship \r\n\r\nInsyaAlloh tiap hari kami ada pengiriman. Transfer stelah jam 13:00 akan dikirim besoknya.\r\n\r\nMaaf (Keep = Transfer)\r\n\r\n#gamis #gamissyari #longdress #gamisjumbo #gamishijab #orinaura #naura #khimar #hijab #hijabsyari #maxidress #gamismuslimah #gamismurah #gamisbaloteli #gamisbusui #gamisumbrella #gamiscantik #busanamuslim', '1650393935_utama.png', '1650393935_1.png', '1650393935_2.png', '1650393935_3.png', NULL, 3, 'https://shopee.co.id/Khumaira-Pad-Ori-Ami-Yulian-Murah-i.56180399.1816619758?gclid=CjwKCAjwu_mSBhAYEiwA5BBmfxAbcby0C3Hp9N8joX6yMmWiEqmNlJyEl0PmosO2LTTmhvKNkZUvKhoCJHgQAvD_BwE', '2022-04-19 18:45:35', '2022-04-28 12:28:49');
INSERT INTO `products` VALUES (1651145618, 2, 'Pastan Yasmin', 80000, 0, 120, 'Hijab Pastan Yamin merupakan hijab yang berbahan berkualitas dang sangat nyaman tentunya.', 'Finally, Pastan Karet Yasmin salah satu koleksi hijab homey dengan ragam warna yang ceria dan cantik sudah banyak yang order nih 💕💕..\r\n\r\nPastan ini hadir dengan bahan kualitas terbaik, bahan original babydoll platonim twist import yang adem,halus, & lembut😍.\r\n.\r\n.\r\nPastan karet ini hadir dalam 10 warna yang Elegant :\r\n🌸Green Basil\r\n🌸Navy\r\n🌸Maroon\r\n🌸Lemen Lime\r\n🌸Gorgeous Purple\r\n🌸Pixie Pink\r\n🌸Army\r\n🌸Coktu\r\n🌸Green Emerald\r\n🌸Black\r\n.\r\n\r\nSpesifikasi Pastan karet YASMIN :\r\n📍 Matt Original Babydoll Platinum Twist Impor\r\n📍Tepi Dilipit\r\n📍Terdapat karet dileher (jadi tidak perlu pakek jarum)\r\n📍Panjang + lebar (145 + 75).', '1651145618_utama.png', '1651145618_1.png', '1651145618_2.png', '1651145618_3.png', NULL, 0, NULL, '2022-04-28 11:33:38', '2022-04-28 11:33:38');
INSERT INTO `products` VALUES (1651145881, 2, 'Khimar Safa', 145000, 0, 150, 'Khimar yang sangat nyaman untuk dipakai sehari-hari.', 'Meski beraktivitas dirumah, pakai khimar harus tetap yang nyaman kan ??\r\n.\r\n.\r\nIni saatanya Sahabat Ami pakai Khimar Safa 💕.\r\n.\r\nTerbuar dari bahan Original Babydoll Platinum Twist Import yang berkarakteristik sangat adem, halus, dan sangat ringan. Selain itu jatuh saat di pakai..\r\n.\r\nDengan model Tali samping kanan & kiri memberikan kesan cantik, dan meniruskan wajah juga nih😁☺..\r\n.\r\n.\r\nKesan manis juga dapat terlihat kalau memakai Khimar Safa ini lho😘.', '1651145881_utama.png', '1651145881_1.png', '1651145881_2.png', '1651145881_3.png', NULL, 0, NULL, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `products` VALUES (1651146269, 4, 'Aisyah Gamis Set', 365000, 0, 120, 'Khimar yang sangat modis untuk dipakai.', 'Assalamualaikum Sahabat Ami 😊😍. Subhanallah ini detail khimarnya bunda. Petnya mudah dipakai, ringan banget dan simpel. Yuk buruan diorder sekarang, Jangan sampai kehabisan ya😁😊.\r\n.\r\n==== IDR 365.000 ====\r\n.\r\nTersedia Size :\r\nS = LD 90 PB 130\r\nM = LD 95 PB 135\r\nL = LD 100 PB 140\r\nXL = LD 110 PB 142\r\nXXL = LD 120 PB 145\r\n.\r\nNote :\r\nXL +15.000\r\nXXL +25.000\r\nCadar +25.000', '1651146269_utama.png', '1651146269_1.png', '1651146269_2.png', '1651146269_3.png', NULL, 0, NULL, '2022-04-28 11:44:30', '2022-04-28 11:44:30');
INSERT INTO `products` VALUES (1651146556, 4, 'Alesha Gamis Set', 365000, 300000, 200, 'Trendy and Syari with new product by amiyulianhijab', 'ALESHA GAMIS SET ❤️\r\nTrendy and Syari with new product by amiyulianhijab\r\n\r\nKoleksi terbaru dari @amiyulianhijab , dengan desain yang super fresh dan elegant..\r\n\r\nDengan menggunakan bahan Original Babydoll Platinum Twist Import. Yang gramasinya lebih padat, serta full furing HQ yang dikenakan terasa adem dan jatuh dibadan nih 😍.\r\n\r\nPilihan Warna :\r\n🌼 Yellow Fire\r\n🌼 Gorgeous Purple\r\n🌼 Olive\r\n🌼 Green Pine\r\n🌼 Mauve Mist\r\n🌼 Summer Blue\r\n\r\nDetail Gamis :\r\n✓ Bahan : Original Babydoll Platinum Twist Import\r\n✓ Terdapat variasi renda pada bagian lengan.\r\n✓ Busui depan (Busui friendly)\r\n✓ Tali Pinggang\r\n✓ Rok depan bagian tengah lipit atau wiru\r\n✓ Variasi pada bagian Manset\r\n\r\nDetail Khimar :\r\n▫️ Bahan : Original Babydoll Platinum Twist Import\r\n▫️ Khimar lancip depan atau V\r\n▫️ Jahit Tengah\r\n▫️ Pad Antem\r\n\r\n=== IDR 365.000 ===\r\n\r\nUntuk Info pemesanan Hub Agen/Reseller Resmi kami🤗..', '1651146556_utama.png', '1651146556_1.png', '1651146556_2.png', '1651146556_3.png', NULL, 2, NULL, '2022-04-28 11:49:16', '2022-04-28 11:57:24');
INSERT INTO `products` VALUES (1651146937, 4, 'Shabila Gamis Set', 315000, 270000, 200, 'Shabila Gamis Set Promo', 'BIG SALE SAMBUT RAMADHAN & IDUL FITRI 🥰🥰\r\nHai sahabat Ami, apa kabar nih? Kali ini Ami Yulian Hijab lagi ada promo loh untuk GAMIS SHABILA.\r\nGamis SHABILA ini dibuat dengan bahan premium dengan kualitas tinggi dan memiliki perpaduan warna yang cantik dan soft. Oh iya untuk varian warnannya ada 18 loh , jadi bisa tentuin warna kesukaanmu mulai sekarang ya 😊😍..\r\nDan Dapatkan Diskon Khusus Pembelian Gamis SHABILA 10% + 5% 😍😍..\r\nNah Banyak banget kan potongannya, Eits jangan ragu ya sama kualitasnya. Dijamin adem dan nyaman saat dipakai. Cocok juga nih buat acara formal atau non formal 😍😍..\r\nMiliki sekarang juga gamis cantik Shabila sebelum kehabisan!!', '1651146937_utama.png', '1651146937_1.png', '1651146937_2.png', '1651146937_3.png', NULL, 0, NULL, '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `products` VALUES (1651147243, 4, 'Shania Gamis Set', 170000, 0, 199, 'Gamis Set baru dari ami yulian hijab', 'NEW PRODUCT AMI YULIAN HIJAB ⚡⚡⚡\r\nSHANIA MAXI hadir dengan desain yang simple dan trendy. Pastinya nyaman dan adem saat dikenakan.. karena terbuat dari bahan Rayon Viscose yang berkualitas pastinya..\r\nSpesifikasi Gamis :\r\n✨ Bahan Rayon Viscose Premium mix Diara Peach Premium HQ\r\n✨ Busui Depan\r\n✨Model kerut di bagian pingang kanan kiri\r\n✨ Manset Rample\r\n✨ Saku Kanan & Kiri\r\n=== IDR 170.000 ===\r\nTerdapat Pilihan Warna :\r\n1. Biru Tosca\r\n2. Black\r\n3. Violet\r\n4. Coklat Tua\r\nReady size :\r\nM LD 95 PB 135\r\nL LD 100 PB 140', '1651147243_utama.png', '1651147243_1.png', '1651147243_2.png', '1651147243_3.png', NULL, 0, NULL, '2022-04-28 12:00:43', '2022-04-28 12:00:43');
INSERT INTO `products` VALUES (1651147395, 4, 'Ayana Gamis Set', 330000, 0, 250, 'AYANA GAMIS SET ❤️ More Elegant and Syari', 'This is AYANA GAMIS SET ❤️\r\nMore Elegant and Syari\r\nKoleksi terbaru dengan desain yang super elegant. Dan kombinasi warna yang cantik dan serasi pastinya 🤗.\r\nTerbuat dari bahan Original Babydoll Platinum Twist Import. Yang berkualitas dan pastinya full furing HQ  jadi dikenakan terasa adem dan jatuh dibadan. \r\n====== IDR 330.000 ====\r\nPilihan Warna : \r\n🌼 Grey Purple\r\n🌼 Grape Pink\r\n🌼 Maroon Darwin\r\n🌼 Army Milo Muda  \r\nDetail Gamis :\r\n〰️ Bahan : Original Babydoll Platinum Twist Import\r\n〰️ Terdapat kombinasi  warna pada bagian gamis\r\n〰️ Busui depan (Busui friendly)\r\n〰️ Tali Pinggang \r\n〰️ Ada Kombinasi pada bagian lengan dan terdapat list\r\n〰️ Terdapat Saku bagian kanan\r\nDetail Khimar :\r\n▫️ Bahan : Original Babydoll Platinum Twist Import\r\n▫️ Khimar lancip depan atau V \r\n▫️ Jahit Tengah\r\n▫️ Pad Antem\r\n▫️PD 80\r\n▫️PB 115', '1651147395_utama.png', '1651147395_1.png', '1651147395_2.png', '1651147395_3.png', NULL, 0, NULL, '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `products` VALUES (1651147562, 4, 'Shakila Gamis Set', 330000, 269999, 300, 'Gebyar DISKON 20% SAMPAI 30% , untuk Gamis SAKHILA', 'Ada kabar baru nih dari Ami Yulian Hijab😍. Di bulan Ramadhan ini Ami Yulian Hijab lagi ngadain promo untuk GAMIS SAKHILA 🥰🥰.\r\nGebyar DISKON 20% SAMPAI 30% , untuk Gamis SAKHILA 😱😱..\r\n WOW banyak bangetkan diskonnya.. Tunggu apa lagi, dapatkan Gamis SAKHILA sekarang juga !!\r\nDengan kombinasi warna yang cantik dan serasi.  serta dibuat dengan bahan yang berkualitas premium sehingga nyaman saat dikenakan🥰..', '1651147562_utama.png', '1651147562_1.png', '1651147562_2.png', '1651147562_3.png', NULL, 0, NULL, '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `products` VALUES (1651147847, 9, 'Nairra Syari & Naira Combi', 420000, 340000, 497, 'gamis cantik NAIRRA SYARI Atau NAIRRA COMBI by Ami Yulian Hijab', 'Yang mau cari gamis berkualitas dan harga diskon. Langsung aja mampir kesini yuk😘🤗.\r\nGebyar Diskon kali ini 20 - 30 % untuk Gamis NAIRRA SYARI & NAIRRA COMBI 🥰🥰..\r\nDengan desain dan perpaduan warna yang serasi serta cocok digunakan untuk segala usia juga nih, tentunya dengan pilihan warna yang banyak ✨..\r\nManfaatkan kesempatan ini untuk mendapatkan gamis cantik NAIRRA SYARI Atau NAIRRA COMBI by Ami Yulian Hijab', '1651147847_utama.png', '1651147847_1.png', '1651147847_2.png', '1651147847_3.png', NULL, 0, NULL, '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `products` VALUES (1651147998, 4, 'Ishita Gaming Set', 270000, 0, 149998, 'ISHITA SYARI BEST SELLER Ami Yulian Hijab', 'ISHITA SYARI BEST SELLER Ami Yulian Hijab\r\nDapatkan DISKON 10 % + 5% Up to  20% \r\nGamis set Brand Ami Yulian Hijab dibuat dari bahan berkualitas tinggi yang cocok digunakan untuk acara formal maupun non formal.\r\nDengan bahan Premium yang berkualitas, sehingga terasa nyaman dan jatuh dibadan. Dan pastinya dengan harga yang terjangkau 😘.\r\nJANGAN SAMPAI KETINGGALAN !!!, Miliki segera gamis cantik ini sebelum harga kembali normal 😉..\r\nSTOCK TERBATAS !!', '1651147998_utama.png', '1651147998_1.png', '1651147998_2.png', '1651147998_3.png', NULL, 0, NULL, '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `products` VALUES (1651148148, 4, 'Maira Tile Gamis', 33000, 0, 197, 'Produk Terbaru ami yulian hijab', 'NEW PRODUCT 💕 by @amiyulianhijab \r\nAlhamdulillah,  Ami Yulian Hijab mengeluarkan produk baru dengan tampilan yang berbeda dari produk sebelumnya.\r\nDituangkan dengan bahan Original Babydoll Platinum Twist Import mix tile premium, yang memberikan kesan kemewahan ✨. Dan pastinya tetap cocok dipakai segala usia dan tetap mengutamakan syar\'i 😍😍..\r\nYou must have item now !!! \r\n🌷 Detail Gamis MAIRA TILE :\r\n▪️Matt Original Babydoll Platinum Twist Import mix Tile \r\n▪️Busui depan\r\n▪️Pinggang kerut kanan kiri \r\n▪️Saku kanan \r\n▪️Manset kerut terompet dengan kombinasi \r\n▪️Bagian bawah terdapat kriwil dengan aksen renda\r\n🌷 Detail Khimar MAIRA TILE :\r\n▪️Matt Original Babydoll Platinum Twist Import\r\n▪️2 Layer\r\n▪️Pad antem \r\n▪️Belah depan terdapat serut samping \r\n▪️PD 85 PB 120\r\n🌷 Tersedia Warna :\r\n✨ Dasty pink \r\n✨ Maroon\r\n✨ Dark grey\r\nTersedia size : S,M,L,XL\r\n💫💫 IDR 330.000 💫💫\r\nNote :\r\nXL +15.000\r\nFree Bross', '1651148148_utama.png', '1651148148_1.png', '1651148148_2.png', NULL, NULL, 0, NULL, '2022-04-28 12:15:48', '2022-04-28 12:15:48');
INSERT INTO `products` VALUES (1651148303, 4, 'Qiara Gamis Set', 330000, 0, 199, 'QIARA GAMIS SET,  Gamis terbaru dari Ami Yulian Hijab', 'QIARA GAMIS SET,  Gamis terbaru dari Ami Yulian Hijab 😘💕..\r\n.\r\nUntuk kali ini bahan yang kami pakai sangat berkualitas yaitu Original Babydoll Platinum Twist Import, jadi dijamin nyaman dikenakan..\r\n.\r\nUntuk gamis terbaru ini modelnya sangat simple & trendy nih, cocok dikenakan oleh segala umur. Tentu tetap mengutamakan syar\'i pastinya 😘.\r\n.\r\n 💕QIARA GAMIS SET💕\r\n.\r\n👉🏻Spesifikasi Gamis :\r\n🍃Matt Original Babydoll Platinum Twist Import\r\n🍃Zipper Depan (Busui Friendly)\r\n🍃Serut pinggang kanan kiri\r\n🍃Cutting A \r\n🍃Full Furing HQ\r\n🍃Karakter kain gramasi lebih padat, Adem, Halus & Lembut\r\n🍃Rok tmpuk\r\n🍃Terdapat saku kanan\r\n.\r\n👉🏻Spesifikasi Khimar :\r\n❤Matt Original Babydoll Platinum Twist impor\r\n❤Panjang Depan 95\r\n❤Panjang Belakang 130\r\n❤Khimar Pad lancip depan nutup', '1651148303_utama.png', '1651148303_1.png', '1651148303_2.png', '1651148303_3.png', NULL, 0, NULL, '2022-04-28 12:18:24', '2022-04-28 12:18:24');
INSERT INTO `products` VALUES (1652877340, 2, 'Hijab', 100000, 70000, 199, 'Hijab yang nyaman dipakai', 'Hijab blabalaba', '1652877340_utama.png', '1652877340_1.png', NULL, NULL, NULL, 3, NULL, '2022-05-18 12:35:41', '2022-05-18 12:40:02');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 'Produk Berkualitas', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.', NULL, NULL);
INSERT INTO `services` VALUES (2, 'Toko Fisik', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.', NULL, NULL);
INSERT INTO `services` VALUES (3, 'Respon Cepat', 'Lorem ipsum dolor', NULL, '2020-06-30 09:26:43');

-- ----------------------------
-- Table structure for sizes
-- ----------------------------
DROP TABLE IF EXISTS `sizes`;
CREATE TABLE `sizes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `s` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `m` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `l` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `xl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `xxl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 67 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sizes
-- ----------------------------
INSERT INTO `sizes` VALUES (22, 1593443172, NULL, NULL, NULL, NULL, NULL, '2020-06-29 15:11:56', '2020-06-29 15:11:56');
INSERT INTO `sizes` VALUES (23, 1593445730, NULL, NULL, NULL, '1', NULL, '2020-06-29 15:48:50', '2020-06-29 15:48:50');
INSERT INTO `sizes` VALUES (24, 1593445799, NULL, '1', NULL, NULL, NULL, '2020-06-29 15:49:59', '2020-06-29 15:49:59');
INSERT INTO `sizes` VALUES (49, 1650084466, '1', '1', '1', '1', '1', '2022-04-19 17:56:07', '2022-04-19 17:56:07');
INSERT INTO `sizes` VALUES (50, 1650091299, '1', '1', '1', '1', NULL, '2022-04-19 18:08:57', '2022-04-19 18:08:57');
INSERT INTO `sizes` VALUES (51, 1650393935, '1', '1', '1', NULL, NULL, '2022-04-19 18:45:35', '2022-04-19 18:45:35');
INSERT INTO `sizes` VALUES (52, 1651145618, NULL, '1', '1', NULL, NULL, '2022-04-28 11:33:38', '2022-04-28 11:33:38');
INSERT INTO `sizes` VALUES (53, 1651145881, NULL, '1', '1', NULL, NULL, '2022-04-28 11:38:01', '2022-04-28 11:38:01');
INSERT INTO `sizes` VALUES (54, 1651146269, '1', '1', '1', '1', '1', '2022-04-28 11:44:30', '2022-04-28 11:44:30');
INSERT INTO `sizes` VALUES (56, 1651146937, '1', '1', '1', '1', '1', '2022-04-28 11:55:37', '2022-04-28 11:55:37');
INSERT INTO `sizes` VALUES (58, 1651146556, '1', '1', '1', '1', '1', '2022-04-28 11:57:18', '2022-04-28 11:57:18');
INSERT INTO `sizes` VALUES (59, 1651147243, '1', '1', '1', '1', '1', '2022-04-28 12:00:43', '2022-04-28 12:00:43');
INSERT INTO `sizes` VALUES (60, 1651147395, '1', '1', '1', '1', '1', '2022-04-28 12:03:15', '2022-04-28 12:03:15');
INSERT INTO `sizes` VALUES (61, 1651147562, '1', '1', '1', '1', '1', '2022-04-28 12:06:02', '2022-04-28 12:06:02');
INSERT INTO `sizes` VALUES (62, 1651147847, '1', '1', '1', '1', '1', '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `sizes` VALUES (63, 1651147998, '1', '1', '1', '1', '1', '2022-04-28 12:13:18', '2022-04-28 12:13:18');
INSERT INTO `sizes` VALUES (64, 1651148148, '1', '1', '1', '1', '1', '2022-04-28 12:15:48', '2022-04-28 12:15:48');
INSERT INTO `sizes` VALUES (65, 1651148303, '1', '1', '1', '1', '1', '2022-04-28 12:18:24', '2022-04-28 12:18:24');
INSERT INTO `sizes` VALUES (66, 1652877340, '1', '1', '1', '1', '1', '2022-05-18 12:35:41', '2022-05-18 12:35:41');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (1, NULL, 'Wanita', NULL, NULL);
INSERT INTO `tags` VALUES (2, NULL, 'Jaket', NULL, NULL);
INSERT INTO `tags` VALUES (3, NULL, 'Diskon', NULL, NULL);
INSERT INTO `tags` VALUES (75, 1593443172, 'Baju', '2020-06-29 15:11:56', '2020-06-29 15:11:56');
INSERT INTO `tags` VALUES (76, 1593445730, 'Jas', '2020-06-29 15:48:50', '2020-06-29 15:48:50');
INSERT INTO `tags` VALUES (77, 1593445799, 'Asdas', '2020-06-29 15:49:59', '2020-06-29 15:49:59');
INSERT INTO `tags` VALUES (98, 1650084466, 'Gamis', '2022-04-19 17:56:07', '2022-04-19 17:56:07');
INSERT INTO `tags` VALUES (99, 1650393935, 'Hijab', '2022-04-19 18:45:35', '2022-04-19 18:45:35');
INSERT INTO `tags` VALUES (100, 1651147847, 'Gamis', '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `tags` VALUES (101, 1651147847, 'Couple', '2022-04-28 12:10:47', '2022-04-28 12:10:47');
INSERT INTO `tags` VALUES (102, 1651148148, 'Gamis', '2022-04-28 12:15:48', '2022-04-28 12:15:48');
INSERT INTO `tags` VALUES (103, 1651148303, 'Gamis', '2022-04-28 12:18:23', '2022-04-28 12:18:23');
INSERT INTO `tags` VALUES (104, 1652877340, 'Hijab', '2022-05-18 12:35:40', '2022-05-18 12:35:40');

-- ----------------------------
-- Table structure for testimoni
-- ----------------------------
DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE `testimoni`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pesan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of testimoni
-- ----------------------------
INSERT INTO `testimoni` VALUES (1, 'Rama Sullivan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.', 'person_1.png', '2020-06-30 10:48:17', NULL);
INSERT INTO `testimoni` VALUES (2, 'Fandit Gio', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.', 'person_2.png', '2020-06-30 10:48:20', NULL);
INSERT INTO `testimoni` VALUES (3, 'Rohmad Khoirudin', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.', 'person_3.png', '2020-06-30 10:48:23', NULL);

-- ----------------------------
-- Table structure for text_banner
-- ----------------------------
DROP TABLE IF EXISTS `text_banner`;
CREATE TABLE `text_banner`  (
  `id` bigint NOT NULL,
  `bagian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of text_banner
-- ----------------------------
INSERT INTO `text_banner` VALUES (1, 'Reseller', 'Jadilah Bagian Dari Kami!!!', 'Repudiandae nostrum natus excepturi fuga ullam accusantium vel ut eveniet aut consequatur laboriosam ipsam.', '2020-06-29 23:32:53', NULL);
INSERT INTO `text_banner` VALUES (2, 'Header Iklan', 'Belanja Dengan Kami', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam assumenda ea quo cupiditate facere deleniti fuga officia.', '2020-06-29 23:32:55', NULL);
INSERT INTO `text_banner` VALUES (3, 'Produk Terlaris', 'Pilihan Terbaik', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nostrum natus excepturi fuga ullam accusantium vel ut eveniet aut consequatur laboriosam ipsam.', '2020-06-29 23:52:06', NULL);
INSERT INTO `text_banner` VALUES (4, 'Produk Terbaik', 'Produk Unggulan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nostrum natus excepturi fuga ullam accusantium vel ut eveniet aut consequatur laboriosam ipsam.', '2020-06-29 23:52:09', '2020-06-30 08:50:13');
INSERT INTO `text_banner` VALUES (5, 'Toko Kami', 'Tentang Kami', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui fuga ipsa, repellat blanditiis nihil, consectetur. Consequuntur eum inventore, rem maxime, nisi excepturi ipsam libero ratione adipisci alias eius vero vel!', '2020-06-29 23:58:31', NULL);
INSERT INTO `text_banner` VALUES (6, 'Pengalaman', 'Terpercaya', 'Lebih Dari 3 Tahun', '2020-06-30 11:21:53', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'ramasullivan27@gmail.com', 'admin', '2021-10-22 06:33:42', '$2y$10$8aDqaNcxe/ViBvYzeuJRUOIhjWCxaMbVfEotZqVaocBSOfrrQYZ/u', 'lSBspEB1TGSXgzEs05gBh7SDf31UiCvN4fMAYM7nYFN1ePsyEX3CQAF1McWc', NULL, NULL);

-- ----------------------------
-- Table structure for vouchers
-- ----------------------------
DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE `vouchers`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `potongan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `persen` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vouchers
-- ----------------------------
INSERT INTO `vouchers` VALUES (1, 'DISKONHARIINI', '50000', NULL, '2020-07-04 19:46:29', '2020-07-04 19:46:31');
INSERT INTO `vouchers` VALUES (2, 'GILAGILAAN', NULL, 50, '2020-07-04 19:47:30', '2020-07-04 19:47:33');
INSERT INTO `vouchers` VALUES (3, 'KASIHANIKAMI', NULL, 20, '2020-07-05 17:07:16', '2020-07-05 17:07:16');
INSERT INTO `vouchers` VALUES (5, 'LAGIKERE', '25000', NULL, '2020-07-05 17:08:04', '2020-07-05 17:08:04');

-- ----------------------------
-- View structure for datajuals
-- ----------------------------
DROP VIEW IF EXISTS `datajuals`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `datajuals` AS SELECT
	order_product.id, 
	order_product.order_id, 
	order_product.product_id, 
	products.nama_barang AS barang, 
	order_product.jumlah, 
	order_product.created_at, 
	products.harga, 
	products.harga_diskon,
	CASE WHEN products.harga IS NOT NULL THEN (order_product.jumlah*products.harga)
	ELSE (order_product.jumlah*products.harga_diskon)
	END AS total
FROM
	order_product
	INNER JOIN
	orders
	ON 
		order_product.order_id = orders.id
	INNER JOIN
	products
	ON 
		order_product.product_id = products.id ;

SET FOREIGN_KEY_CHECKS = 1;
