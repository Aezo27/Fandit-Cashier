/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : fandit

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 23/05/2022 20:59:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang_penjualans
-- ----------------------------
DROP TABLE IF EXISTS `barang_penjualans`;
CREATE TABLE `barang_penjualans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `barang_id` bigint NOT NULL,
  `penjualan_id` bigint NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` bigint NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang_penjualans
-- ----------------------------
INSERT INTO `barang_penjualans` VALUES (1, 1, 1, 2, 5000, '2022-04-02 16:00:26', '2022-04-02 16:00:28', NULL);
INSERT INTO `barang_penjualans` VALUES (39, 24, 36, 2, 3000, '2022-04-26 22:26:32', '2022-04-26 22:26:32', NULL);
INSERT INTO `barang_penjualans` VALUES (40, 14, 36, 2, 10000, '2022-04-26 22:26:32', '2022-04-26 22:26:32', NULL);
INSERT INTO `barang_penjualans` VALUES (41, 1, 36, 1, 2500, '2022-04-26 22:26:32', '2022-04-26 22:26:32', NULL);
INSERT INTO `barang_penjualans` VALUES (42, 25, 37, 1, 12500, '2022-04-26 23:02:18', '2022-04-26 23:02:18', NULL);
INSERT INTO `barang_penjualans` VALUES (43, 24, 37, 10, 15000, '2022-04-26 23:02:18', '2022-04-26 23:02:18', NULL);
INSERT INTO `barang_penjualans` VALUES (44, 21, 38, 3, 75000, '2022-05-23 19:43:03', '2022-05-23 19:43:03', NULL);
INSERT INTO `barang_penjualans` VALUES (45, 20, 38, 1, 2500, '2022-05-23 19:43:03', '2022-05-23 19:43:03', NULL);
INSERT INTO `barang_penjualans` VALUES (46, 21, 39, 1, 25000, '2022-05-23 19:44:20', '2022-05-23 19:44:20', NULL);
INSERT INTO `barang_penjualans` VALUES (47, 20, 39, 1, 2500, '2022-05-23 19:44:20', '2022-05-23 19:44:20', NULL);
INSERT INTO `barang_penjualans` VALUES (48, 21, 40, 1, 25000, '2022-05-23 19:44:57', '2022-05-23 19:44:57', NULL);

-- ----------------------------
-- Table structure for barang_tag
-- ----------------------------
DROP TABLE IF EXISTS `barang_tag`;
CREATE TABLE `barang_tag`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `barang_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang_tag
-- ----------------------------
INSERT INTO `barang_tag` VALUES (8, 14, 4, '2022-04-10 07:37:01', '2022-04-10 07:37:01');
INSERT INTO `barang_tag` VALUES (17, 18, 5, '2022-04-20 16:23:16', '2022-04-20 16:23:16');
INSERT INTO `barang_tag` VALUES (18, 20, 4, '2022-04-21 22:33:11', '2022-04-21 22:33:11');
INSERT INTO `barang_tag` VALUES (19, 21, 3, '2022-04-21 22:34:18', '2022-04-21 22:34:18');
INSERT INTO `barang_tag` VALUES (21, 23, 6, '2022-04-21 22:36:48', '2022-04-21 22:36:48');
INSERT INTO `barang_tag` VALUES (22, 24, 3, '2022-04-26 12:02:35', '2022-04-26 12:02:35');
INSERT INTO `barang_tag` VALUES (23, 22, 3, '2022-04-26 12:25:04', '2022-04-26 12:25:04');
INSERT INTO `barang_tag` VALUES (25, 25, 7, '2022-04-26 22:57:12', '2022-04-26 22:57:12');
INSERT INTO `barang_tag` VALUES (28, 1, 4, '2022-05-23 19:51:13', '2022-05-23 19:51:13');
INSERT INTO `barang_tag` VALUES (29, 27, 8, '2022-05-23 19:54:39', '2022-05-23 19:54:39');

-- ----------------------------
-- Table structure for barangs
-- ----------------------------
DROP TABLE IF EXISTS `barangs`;
CREATE TABLE `barangs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_satuan` int NOT NULL,
  `harga_jual` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stok` int NOT NULL DEFAULT 0,
  `kode_scan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_by` int NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barangs
-- ----------------------------
INSERT INTO `barangs` VALUES (1, 'Aqua 600 ML', 2000, '10000', 28, '6725812030127', NULL, NULL, 0, '2022-04-02 15:58:45', '2', '2022-05-23 19:51:13', NULL);
INSERT INTO `barangs` VALUES (14, 'Coca Cola 600Ml', 4000, '5000', 0, '34534ggsss', NULL, NULL, 1, '2022-04-10 07:37:01', '1', '2022-04-26 22:59:10', NULL);
INSERT INTO `barangs` VALUES (18, 'Saniter Air & Surface Sanitizer Spray 200 Ml', 15000, '17000', 40, '8992745610793', 'Saniter_Air_&_Surface_Sanitizer_Spray_200_Mla.jpg', NULL, 1, '2022-04-10 07:43:47', '1', '2022-04-21 23:31:07', NULL);
INSERT INTO `barangs` VALUES (20, 'Le Minerale 600Ml', 2000, '2500', 18, '8996001600269', NULL, NULL, 1, '2022-04-21 22:33:11', NULL, '2022-05-23 19:44:20', NULL);
INSERT INTO `barangs` VALUES (21, 'S.O.S Disinfectan Spray All In One', 20000, '25000', 45, '8999908855701', NULL, NULL, 1, '2022-04-21 22:34:18', NULL, '2022-05-23 19:44:57', NULL);
INSERT INTO `barangs` VALUES (22, 'Minyak Kayu Putih Caplang 60Ml', 5000, '7000', 40, '8993176110074', NULL, NULL, 1, '2022-04-21 22:35:16', '1', '2022-04-26 12:25:04', NULL);
INSERT INTO `barangs` VALUES (23, 'Wafer Tanggo Kalong', 25000, '29000', 40, '8991102374309', NULL, NULL, 1, '2022-04-21 22:36:48', NULL, '2022-04-21 22:36:48', NULL);
INSERT INTO `barangs` VALUES (24, 'Soffel 13Lt Jeruk', 1000, '1500', 10, '8992772311014', NULL, NULL, 1, '2022-04-26 12:02:35', NULL, '2022-04-26 23:02:18', NULL);
INSERT INTO `barangs` VALUES (25, 'Buku Gelatik Isi 50', 10000, '12500', 36, '314010086757', 'buku_gelatik_isi_50.png', NULL, 1, '2022-04-26 22:56:30', '1', '2022-04-26 23:02:18', NULL);
INSERT INTO `barangs` VALUES (27, 'Scaner', 10000, '100000', 6, '222B2021110132', 'scaner.png', NULL, 2, '2022-05-23 19:54:39', NULL, '2022-05-23 19:54:39', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for penjualans
-- ----------------------------
DROP TABLE IF EXISTS `penjualans`;
CREATE TABLE `penjualans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` bigint NOT NULL,
  `bayar` bigint NOT NULL,
  `kembalian` bigint NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualans
-- ----------------------------
INSERT INTO `penjualans` VALUES (1, 1, '', 5000, 10000, 5000, '2022-04-02 15:59:39', '2022-04-02 15:59:42', NULL);
INSERT INTO `penjualans` VALUES (2, 2, '', 2500, 2500, 0, '2022-04-02 18:30:14', '2022-04-02 18:30:16', NULL);
INSERT INTO `penjualans` VALUES (36, 1, '1731185001730701', 15500, 50000, 34500, '2022-04-26 22:26:32', '2022-04-26 22:26:32', NULL);
INSERT INTO `penjualans` VALUES (37, 1, '1731185128088546', 27500, 50000, 22500, '2022-04-26 23:02:18', '2022-04-26 23:02:18', NULL);
INSERT INTO `penjualans` VALUES (38, 1, '1731187377225465', 77500, 100000, 22500, '2022-05-23 19:43:03', '2022-05-23 19:43:03', NULL);
INSERT INTO `penjualans` VALUES (39, 1, '1733620959934241', 27500, 0, 0, '2022-05-23 19:44:20', '2022-05-23 19:44:20', NULL);
INSERT INTO `penjualans` VALUES (40, 1, '1733621041637462', 25000, 0, 0, '2022-05-23 19:44:57', '2022-05-23 19:44:57', NULL);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (1, 'detergent', 1, '2022-04-09 21:02:31', '2022-04-10 14:13:38', NULL);
INSERT INTO `tags` VALUES (2, 'mie instan', 1, '2022-04-09 21:02:34', '2022-04-10 14:13:46', NULL);
INSERT INTO `tags` VALUES (3, 'obat', 1, '2022-04-10 07:30:09', '2022-04-10 07:30:09', NULL);
INSERT INTO `tags` VALUES (4, 'minuman', 1, '2022-04-10 07:34:13', '2022-04-10 07:34:13', NULL);
INSERT INTO `tags` VALUES (5, 'sanitizer', 1, '2022-04-20 13:05:05', '2022-04-20 13:05:05', NULL);
INSERT INTO `tags` VALUES (6, 'makanan', 1, '2022-04-21 22:36:48', '2022-04-21 22:36:48', NULL);
INSERT INTO `tags` VALUES (7, 'alat tulis', 1, '2022-04-26 22:56:30', '2022-04-26 22:56:30', NULL);
INSERT INTO `tags` VALUES (8, 'electronik', 2, '2022-05-23 19:54:39', '2022-05-23 19:54:39', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'ramasullivan27@gmail.com', 'admin', 'admin.jpg', NULL, '$2y$10$8aDqaNcxe/ViBvYzeuJRUOIhjWCxaMbVfEotZqVaocBSOfrrQYZ/u', 'rAPj4AxvfHphSRu2ihvR9pIA74IQJAiOQeQyDinvGDRGrMpaNtiU4MWF3uT7', NULL, NULL);
INSERT INTO `users` VALUES (2, 'Fandit', 'fandit@odama.io', 'karyawan', '', NULL, '$2y$10$8aDqaNcxe/ViBvYzeuJRUOIhjWCxaMbVfEotZqVaocBSOfrrQYZ/u', NULL, NULL, NULL);

-- ----------------------------
-- View structure for lapjuals
-- ----------------------------
DROP VIEW IF EXISTS `lapjuals`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `lapjuals` AS SELECT
	penjualans.id, 
	barangs.nama_barang, 
	barangs.harga_jual, 
	barang_penjualans.jumlah, 
	barang_penjualans.total_harga, 
	users.`name` AS nama_kasir, 
	penjualans.created_at
FROM
	penjualans
	INNER JOIN
	users
	ON 
		penjualans.user_id = users.id
	INNER JOIN
	barangs
	INNER JOIN
	barang_penjualans
	ON 
		barangs.id = barang_penjualans.barang_id AND
		penjualans.id = barang_penjualans.penjualan_id ;

SET FOREIGN_KEY_CHECKS = 1;
