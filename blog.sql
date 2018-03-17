/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-03-17 18:35:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `art_id` int(20) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) NOT NULL DEFAULT '' COMMENT '//文章标题',
  `art_tag` varchar(100) NOT NULL DEFAULT '' COMMENT '//关键词',
  `art_description` varchar(255) NOT NULL DEFAULT '' COMMENT '//描述',
  `art_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '//缩略图',
  `art_content` text NOT NULL COMMENT '//文章内容',
  `art_time` int(11) NOT NULL COMMENT '//发布时间',
  `art_editor` varchar(50) NOT NULL DEFAULT '' COMMENT '//作者',
  `art_view` int(10) NOT NULL DEFAULT '0' COMMENT '//查看次数',
  `cate_id` int(10) NOT NULL DEFAULT '0' COMMENT '//分类ID',
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', '阿道夫', '的说法', '大师傅', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('3', '发', '阿道夫', '', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('4', '大幅', '的说法', '', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('5', '出现', '你同意', '', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('6', '大巴', '划分', '', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('7', '安管部', '吧如图', '', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('8', '阿女', '昂贵', '', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('9', '爱迪生', '发的是', '', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('10', '阿斯蒂芬', '安抚', '', '', '', '0', '', '0', '0');
INSERT INTO `blog_article` VALUES ('11', '划分', '安慰', '阿范德萨阿道夫', 'uploads/20180317140400551.png', '<p>阿道夫嘎嘎嘎三个傻瓜阿道夫阿打发发生过玩儿</p>', '0', '发', '0', '1');
INSERT INTO `blog_article` VALUES ('12', '阿道夫撒', '阿道夫撒', '阿道夫撒', 'uploads/20180317163138856.png', '<p>阿道夫撒</p>', '1521275502', '阿道夫撒', '0', '1');

-- ----------------------------
-- Table structure for `blog_category`
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cate_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `cate_name` varchar(50) NOT NULL COMMENT '文章名称',
  `cate_title` varchar(255) NOT NULL COMMENT '文章标题',
  `cate_keywords` varchar(255) NOT NULL COMMENT '关键词',
  `cate_description` varchar(255) NOT NULL COMMENT '介绍',
  `cate_view` int(10) NOT NULL,
  `cate_pid` int(10) NOT NULL COMMENT '父级ID',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '新闻', '', '', '', '0', '0');
INSERT INTO `blog_category` VALUES ('2', '体育', '', '', '', '0', '0');
INSERT INTO `blog_category` VALUES ('3', '娱乐', '', '', '', '0', '0');
INSERT INTO `blog_category` VALUES ('6', '军事新闻', '', '', '', '0', '1');
INSERT INTO `blog_category` VALUES ('7', '体育彩票', '', '', '', '0', '2');
INSERT INTO `blog_category` VALUES ('8', '乐视体育', '', '', '', '0', '2');
INSERT INTO `blog_category` VALUES ('9', '新闻资讯', '新闻资讯', '新闻资讯', '新闻资讯', '0', '0');
INSERT INTO `blog_category` VALUES ('10', '新闻风向标', '新闻', '新闻', '新闻', '0', '1');

-- ----------------------------
-- Table structure for `blog_users`
-- ----------------------------
DROP TABLE IF EXISTS `blog_users`;
CREATE TABLE `blog_users` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_users
-- ----------------------------
INSERT INTO `blog_users` VALUES ('1', 'admin', 'eyJpdiI6InN3VHRNMHdcL3RMN2dIRG5DVmtIcCtBPT0iLCJ2YWx1ZSI6ImtBOHdRSWg1UlgzKzZiSVlcL0I2ejZnPT0iLCJtYWMiOiI4MDU0NTE4ZTZjMTdjNDQ5NGJiOGYzMDQwOWU0YmMxOTI0YTg4ZDk4ZTc3MDZkMTJkNWRhZjRlNDhiMTUxMTliIn0=');
