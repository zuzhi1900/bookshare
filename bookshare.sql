/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : bookshare

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-07-29 15:47:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', '史蒂夫&middot;乔布斯传', '9787508630069', '沃尔特&middot;艾萨克森');
INSERT INTO `books` VALUES ('2', '史蒂夫&middot;乔布斯传', '9787508630069', '沃尔特&middot;艾萨克森');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(18) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `gender` varchar(15) NOT NULL DEFAULT 'undisclosed',
  `bio` text NOT NULL,
  `image_location` varchar(125) NOT NULL DEFAULT 'assets/avatars/default_avatar.png',
  `password` varchar(512) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `confirmed` int(11) NOT NULL DEFAULT '0',
  `generated_string` varchar(35) NOT NULL DEFAULT '0',
  `ip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'zuzhi', '祖志', '胡', '男', 'Take me back to the start.', 'assets/avatars/smile_when_youre_winning_print@140x140.jpg', '$2y$12$46896728553c8ca9d4269u4a1n2kVg52r63DL2IGw.A84p5do1pFS', 'leastlast1900@gmail.com', 'code_53c8ca9d421888.60039219', '1405667997', '1', '0', '::1');
INSERT INTO `users` VALUES ('3', 'loki', '', '', 'undisclosed', '', 'avatars/default_avatar.png', '$2y$12$76249436853d74f1ea01bONnPqAxzRWSjoQw4xqHLja1AkW4Vj.Xu', '476513451@qq.com', 'code_53d74f1ea01a70.50241876', '1406619422', '0', '0', '::1');
INSERT INTO `users` VALUES ('4', 'thor', '', '', 'undisclosed', '', 'avatars/default_avatar.png', '$2y$12$62683826553d7500b8d26u8bvsXpRbyIfICYEiCNrFVCJ2Baeo8OS', '476513452@qq.com', 'code_53d7500b8d2575.42864263', '1406619659', '0', '0', '::1');
