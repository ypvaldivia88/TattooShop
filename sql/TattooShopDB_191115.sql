/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : 127.0.0.1:3306
 Source Schema         : tattooshop

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 15/11/2019 09:33:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for artista
-- ----------------------------
DROP TABLE IF EXISTS `artista`;
CREATE TABLE `artista`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of artista
-- ----------------------------
INSERT INTO `artista` VALUES (1, 'Jose');
INSERT INTO `artista` VALUES (2, 'Albert');

-- ----------------------------
-- Table structure for cita
-- ----------------------------
DROP TABLE IF EXISTS `cita`;
CREATE TABLE `cita`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` datetime(0) NOT NULL,
  `Deposito` double NOT NULL,
  `cliente_id` int(11) NULL DEFAULT NULL,
  `tipo_trabajo_id` int(11) NULL DEFAULT NULL,
  `artista_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_9E05355CDE734E51`(`cliente_id`) USING BTREE,
  INDEX `IDX_9E05355CB9FC1162`(`tipo_trabajo_id`) USING BTREE,
  INDEX `IDX_9E05355CAEB0CF13`(`artista_id`) USING BTREE,
  CONSTRAINT `FK_9E05355CAEB0CF13` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `FK_9E05355CB9FC1162` FOREIGN KEY (`tipo_trabajo_id`) REFERENCES `tipotrabajo` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `FK_9E05355CDE734E51` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cita
-- ----------------------------
INSERT INTO `cita` VALUES (1, '2019-11-06 17:38:46', 12, 1, 2, 1);

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (1, 'Ternelio', '654546546');

-- ----------------------------
-- Table structure for pago
-- ----------------------------
DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FechaInicial` datetime(0) NOT NULL,
  `FechaFinal` datetime(0) NOT NULL,
  `Efectivo` double NOT NULL,
  `artista_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_54EDF000AEB0CF13`(`artista_id`) USING BTREE,
  CONSTRAINT `FK_54EDF000AEB0CF13` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pago
-- ----------------------------
INSERT INTO `pago` VALUES (1, '2019-11-06 17:38:10', '2019-11-06 17:38:12', 23, 1);

-- ----------------------------
-- Table structure for tipotrabajo
-- ----------------------------
DROP TABLE IF EXISTS `tipotrabajo`;
CREATE TABLE `tipotrabajo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipotrabajo
-- ----------------------------
INSERT INTO `tipotrabajo` VALUES (1, 'Old School');
INSERT INTO `tipotrabajo` VALUES (2, 'Realismo');

-- ----------------------------
-- Table structure for trabajo
-- ----------------------------
DROP TABLE IF EXISTS `trabajo`;
CREATE TABLE `trabajo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` datetime(0) NOT NULL,
  `Precio` double NOT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PagoId` int(11) NOT NULL,
  `ArtistaId` int(11) NOT NULL,
  `cita_id` int(11) NULL DEFAULT NULL,
  `artista_id` int(11) NULL DEFAULT NULL,
  `pago_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_326B81961E011DDF`(`cita_id`) USING BTREE,
  INDEX `IDX_326B8196AEB0CF13`(`artista_id`) USING BTREE,
  INDEX `IDX_326B819663FB8380`(`pago_id`) USING BTREE,
  CONSTRAINT `FK_326B81961E011DDF` FOREIGN KEY (`cita_id`) REFERENCES `cita` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `FK_326B819663FB8380` FOREIGN KEY (`pago_id`) REFERENCES `pago` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `FK_326B8196AEB0CF13` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trabajo
-- ----------------------------
INSERT INTO `trabajo` VALUES (1, '2019-11-06 17:37:45', 32, 'asdasd', 1, 1, 1, 1, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('ROLE_ADMIN','ROLE_USER') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `UNIQ_1483A5E9F85E0677`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'naga', 'Yasmani', 'Palmero', 'ypvaldivia@mail.cu', '123', 'ROLE_ADMIN', 1, '2019-11-03 18:04:24', '2019-11-03 18:04:28');
INSERT INTO `users` VALUES (2, 'bio', 'Alejandro', 'Sanchez', 'bio@mail.cu', '123', 'ROLE_USER', 1, '2019-11-03 18:05:43', '2019-11-03 18:05:45');
INSERT INTO `users` VALUES (5, 'nane', 'Yainel', 'Garcia', 'nane@mail.com', '123', 'ROLE_USER', 1, '2019-11-06 22:09:39', '2019-11-06 22:11:08');

SET FOREIGN_KEY_CHECKS = 1;
