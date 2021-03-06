﻿-- 1. opentutorials db 생성
CREATE DATABASE opentutorials CHARACTER SET utf8 COLLATE utf8_general_ci;

-- 2. opentutorials db 선택
USE opentutorials;
 
-- 3. topic table 생성
-- ----------------------------
-- Table structure for `topic`
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `author` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 4. topic table에 data 추가
-- ----------------------------
-- Records of topic
-- ----------------------------
INSERT INTO `topic` VALUES ('1', 'html', 'HTML is HyperText Markup Language.', '1', NOW() );
INSERT INTO `topic` VALUES ('2', 'css', 'CSS is Cascading Style Sheet.', '3', NOW());
INSERT INTO `topic` VALUES ('3', 'javascript', 'JavaScript is for user interaction.', '1', NOW());

-- 5. user table 생성
-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 6. user table에 data 추가
-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'egoing', '111111');
INSERT INTO `user` VALUES ('2', 'jin', '222222');
INSERT INTO `user` VALUES ('3', 'k8805', '333333');
INSERT INTO `user` VALUES ('4', 'sorialgi', '444444');
INSERT INTO `user` VALUES ('5', 'lily', '555555');
INSERT INTO `user` VALUES ('6', 'happydeveloper', '666666');