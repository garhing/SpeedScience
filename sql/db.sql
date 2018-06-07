/*
 Navicat MySQL Data Transfer

 Source Server         : LocalMac
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:8889
 Source Schema         : ssrpanel

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 07/06/2018 12:50:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `author` varchar(255) DEFAULT '' COMMENT '作者',
  `content` text COMMENT '内容',
  `type` tinyint(4) DEFAULT '1' COMMENT '类型：1-文章、2-公告',
  `is_del` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of article
-- ----------------------------
BEGIN;
INSERT INTO `article` VALUES (1, 'IOS使用教程', '管理员', '<p style=\"text-align: center;\"><embed src=\"https://imgcache.qq.com/tencentvideo_v1/playerv3/TPout.swf?max_age=86400&v=20161117&vid=n0026tyhsg6&auto=0\" quality=\"high\" width=\"900\" height=\"600\" align=\"middle\" type=\"application/x-shockwave-flash\"/></p>', 1, 1, 0, '2018-05-25 21:15:16', '2018-06-06 00:13:19');
INSERT INTO `article` VALUES (2, '测试的公告', '管理员', '<p>正在公告，哈哈啊</p>', 2, 1, 0, '2018-05-25 21:15:51', '2018-06-02 16:47:12');
INSERT INTO `article` VALUES (3, '公告2', '管理员', '<p>大法师分阿斯达</p>', 1, 1, 0, '2018-05-25 21:16:16', '2018-06-02 16:47:16');
INSERT INTO `article` VALUES (4, 'Mac使用教程', '管理员', '<p style=\"text-align: center;\"><embed src=\"https://imgcache.qq.com/tencentvideo_v1/playerv3/TPout.swf?max_age=86400&v=20161117&vid=s0026j5dzcm&auto=0\" quality=\"high\" width=\"900\" height=\"600\" align=\"middle\" type=\"application/x-shockwave-flash\"/></p>', 1, 1, 0, '2018-06-02 16:41:23', '2018-06-06 00:13:24');
INSERT INTO `article` VALUES (5, 'aaa', 'aaa', '<p><video class=\"edui-upload-video  vjs-default-skin  video-js\" controls=\"\" preload=\"none\" width=\"420\" height=\"280\" src=\"/upload/video/20180606/1528267840438828.mp4\" data-setup=\"{}\"><source src=\"/upload/video/20180606/1528267840438828.mp4\" type=\"video/mp4\"/></video></p>', 1, 0, 0, '2018-06-06 14:59:32', '2018-06-06 14:59:32');
COMMIT;

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '配置名',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COMMENT='系统配置';

-- ----------------------------
-- Records of config
-- ----------------------------
BEGIN;
INSERT INTO `config` VALUES (1, 'is_rand_port', '0');
INSERT INTO `config` VALUES (2, 'is_user_rand_port', '0');
INSERT INTO `config` VALUES (3, 'invite_num', '20');
INSERT INTO `config` VALUES (4, 'is_register', '1');
INSERT INTO `config` VALUES (5, 'is_invite_register', '0');
INSERT INTO `config` VALUES (6, 'website_name', '本地开发');
INSERT INTO `config` VALUES (7, 'is_reset_password', '0');
INSERT INTO `config` VALUES (8, 'reset_password_times', '3');
INSERT INTO `config` VALUES (9, 'website_url', 'https://science.izhangxm.com');
INSERT INTO `config` VALUES (10, 'is_active_register', '0');
INSERT INTO `config` VALUES (11, 'active_times', '100');
INSERT INTO `config` VALUES (12, 'login_add_score', '1');
INSERT INTO `config` VALUES (13, 'min_rand_score', '1');
INSERT INTO `config` VALUES (14, 'max_rand_score', '100');
INSERT INTO `config` VALUES (15, 'wechat_qrcode', '');
INSERT INTO `config` VALUES (16, 'alipay_qrcode', '');
INSERT INTO `config` VALUES (17, 'login_add_score_range', '1440');
INSERT INTO `config` VALUES (18, 'referral_traffic', '1024');
INSERT INTO `config` VALUES (19, 'referral_percent', '0.3');
INSERT INTO `config` VALUES (20, 'referral_money', '10');
INSERT INTO `config` VALUES (21, 'referral_status', '1');
INSERT INTO `config` VALUES (22, 'default_traffic', '512');
INSERT INTO `config` VALUES (23, 'traffic_warning', '1');
INSERT INTO `config` VALUES (24, 'traffic_warning_percent', '80');
INSERT INTO `config` VALUES (25, 'expire_warning', '1');
INSERT INTO `config` VALUES (26, 'expire_days', '15');
INSERT INTO `config` VALUES (27, 'reset_traffic', '1');
INSERT INTO `config` VALUES (28, 'default_days', '7');
INSERT INTO `config` VALUES (29, 'subscribe_max', '2');
INSERT INTO `config` VALUES (30, 'min_port', '50000');
INSERT INTO `config` VALUES (31, 'max_port', '60000');
INSERT INTO `config` VALUES (32, 'is_captcha', '0');
INSERT INTO `config` VALUES (33, 'is_traffic_ban', '1');
INSERT INTO `config` VALUES (34, 'traffic_ban_value', '10');
INSERT INTO `config` VALUES (35, 'traffic_ban_time', '60');
INSERT INTO `config` VALUES (36, 'is_clear_log', '1');
INSERT INTO `config` VALUES (37, 'is_node_crash_warning', '1');
INSERT INTO `config` VALUES (38, 'crash_warning_email', 'izhangxm@foxmail.com');
INSERT INTO `config` VALUES (39, 'is_server_chan', '0');
INSERT INTO `config` VALUES (40, 'server_chan_key', '');
INSERT INTO `config` VALUES (41, 'is_subscribe_ban', '1');
INSERT INTO `config` VALUES (42, 'subscribe_ban_times', '20');
INSERT INTO `config` VALUES (43, 'paypal_status', '0');
INSERT INTO `config` VALUES (44, 'paypal_client_id', '');
INSERT INTO `config` VALUES (45, 'paypal_client_secret', '');
INSERT INTO `config` VALUES (46, 'is_free_code', '0');
INSERT INTO `config` VALUES (47, 'is_forbid_robot', '1');
INSERT INTO `config` VALUES (48, 'subscribe_domain', '');
INSERT INTO `config` VALUES (49, 'auto_release_port', '0');
INSERT INTO `config` VALUES (50, 'is_youzan', '1');
INSERT INTO `config` VALUES (51, 'youzan_client_id', '0086151204b38915fe');
INSERT INTO `config` VALUES (52, 'youzan_client_secret', 'b34497f46c95edd95558d7dd031b1251');
INSERT INTO `config` VALUES (53, 'kdt_id', '40871208');
INSERT INTO `config` VALUES (54, 'initial_labels_for_user', '1');
INSERT INTO `config` VALUES (55, 'website_analytics', '');
INSERT INTO `config` VALUES (56, 'website_customer_service', '');
INSERT INTO `config` VALUES (57, 'register_ip_limit', '0');
INSERT INTO `config` VALUES (58, 'referral_good_ids', '0');
INSERT INTO `config` VALUES (59, 'initial_good_ids', '1;2');
COMMIT;

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '代码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of country
-- ----------------------------
BEGIN;
INSERT INTO `country` VALUES (1, '澳大利亚', 'au');
INSERT INTO `country` VALUES (2, '巴西', 'br');
INSERT INTO `country` VALUES (3, '加拿大', 'ca');
INSERT INTO `country` VALUES (4, '瑞士', 'ch');
INSERT INTO `country` VALUES (5, '中国', 'cn');
INSERT INTO `country` VALUES (6, '德国', 'de');
INSERT INTO `country` VALUES (7, '丹麦', 'dk');
INSERT INTO `country` VALUES (8, '埃及', 'eg');
INSERT INTO `country` VALUES (9, '法国', 'fr');
INSERT INTO `country` VALUES (10, '希腊', 'gr');
INSERT INTO `country` VALUES (11, '香港', 'hk');
INSERT INTO `country` VALUES (12, '印度尼西亚', 'id');
INSERT INTO `country` VALUES (13, '爱尔兰', 'ie');
INSERT INTO `country` VALUES (14, '以色列', 'il');
INSERT INTO `country` VALUES (15, '印度', 'in');
INSERT INTO `country` VALUES (16, '伊拉克', 'iq');
INSERT INTO `country` VALUES (17, '伊朗', 'ir');
INSERT INTO `country` VALUES (18, '意大利', 'it');
INSERT INTO `country` VALUES (19, '日本', 'jp');
INSERT INTO `country` VALUES (20, '韩国', 'kr');
INSERT INTO `country` VALUES (21, '墨西哥', 'mx');
INSERT INTO `country` VALUES (22, '马来西亚', 'my');
INSERT INTO `country` VALUES (23, '荷兰', 'nl');
INSERT INTO `country` VALUES (24, '挪威', 'no');
INSERT INTO `country` VALUES (25, '纽西兰', 'nz');
INSERT INTO `country` VALUES (26, '菲律宾', 'ph');
INSERT INTO `country` VALUES (27, '俄罗斯', 'ru');
INSERT INTO `country` VALUES (28, '瑞典', 'se');
INSERT INTO `country` VALUES (29, '新加坡', 'sg');
INSERT INTO `country` VALUES (30, '泰国', 'th');
INSERT INTO `country` VALUES (31, '土耳其', 'tr');
INSERT INTO `country` VALUES (32, '台湾', 'tw');
INSERT INTO `country` VALUES (33, '英国', 'uk');
INSERT INTO `country` VALUES (34, '美国', 'us');
INSERT INTO `country` VALUES (35, '越南', 'vn');
INSERT INTO `country` VALUES (36, '波兰', 'pl');
INSERT INTO `country` VALUES (37, '哈萨克斯坦', 'kz');
INSERT INTO `country` VALUES (38, '乌克兰', 'ua');
INSERT INTO `country` VALUES (39, '罗马尼亚', 'ro');
INSERT INTO `country` VALUES (40, '阿联酋', 'ae');
INSERT INTO `country` VALUES (41, '南非', 'za');
INSERT INTO `country` VALUES (42, '缅甸', 'mm');
INSERT INTO `country` VALUES (43, '冰岛', 'is');
INSERT INTO `country` VALUES (44, '芬兰', 'fi');
INSERT INTO `country` VALUES (45, '卢森堡', 'lu');
INSERT INTO `country` VALUES (46, '比利时', 'be');
INSERT INTO `country` VALUES (47, '保加利亚', 'bg');
INSERT INTO `country` VALUES (48, '立陶宛', 'lt');
INSERT INTO `country` VALUES (49, '哥伦比亚', 'co');
INSERT INTO `country` VALUES (50, '澳门', 'mo');
INSERT INTO `country` VALUES (51, '肯尼亚', 'ke');
INSERT INTO `country` VALUES (52, '捷克', 'cz');
INSERT INTO `country` VALUES (53, '摩尔多瓦', 'md');
INSERT INTO `country` VALUES (54, '西班牙', 'es');
INSERT INTO `country` VALUES (55, '巴基斯坦', 'pk');
INSERT INTO `country` VALUES (56, '葡萄牙', 'pt');
INSERT INTO `country` VALUES (57, '匈牙利', 'hu');
INSERT INTO `country` VALUES (58, '阿根廷', 'ar');
COMMIT;

-- ----------------------------
-- Table structure for coupon
-- ----------------------------
DROP TABLE IF EXISTS `coupon`;
CREATE TABLE `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '优惠券名称',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '优惠券LOGO',
  `sn` char(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '优惠券码',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '类型：1-现金券、2-折扣券、3-充值券',
  `usage` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用途：1-仅限一次性使用、2-可重复使用',
  `amount` bigint(20) NOT NULL DEFAULT '0' COMMENT '金额，单位分',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣',
  `available_start` int(11) NOT NULL DEFAULT '0' COMMENT '有效期开始',
  `available_end` int(11) NOT NULL DEFAULT '0' COMMENT '有效期结束',
  `is_del` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已删除：0-未删除、1-已删除',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0-未使用、1-已使用、2-已失效',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='优惠券';

-- ----------------------------
-- Records of coupon
-- ----------------------------
BEGIN;
INSERT INTO `coupon` VALUES (3, '8折优惠券', '', 'UXFP29J', 2, 1, 0, 0.08, 1527868800, 1528387199, 1, 0, '2018-06-02 14:58:48', '2018-06-02 15:05:18');
INSERT INTO `coupon` VALUES (4, '8折优惠券', '', 'MHDTGGM', 2, 1, 0, 0.08, 1527868800, 1528387199, 1, 0, '2018-06-02 14:58:48', '2018-06-02 15:05:14');
INSERT INTO `coupon` VALUES (5, '8折优惠券', '', '9GJWD45', 2, 1, 0, 0.80, 1527782400, 1528646399, 1, 0, '2018-06-02 15:05:48', '2018-06-05 20:46:31');
INSERT INTO `coupon` VALUES (6, '8折优惠券', '', 'PCUEPYM', 2, 1, 0, 0.80, 1527782400, 1528646399, 1, 0, '2018-06-02 15:05:48', '2018-06-05 20:46:26');
INSERT INTO `coupon` VALUES (7, '5折优惠券', '', '8FEVU7Q', 2, 2, 0, 0.50, 1528128000, 1528473599, 0, 0, '2018-06-05 20:47:37', '2018-06-05 20:47:37');
INSERT INTO `coupon` VALUES (8, '充值测试', '', 'JQWGDSH', 3, 1, 10000, 0.00, 1528128000, 1529855999, 0, 0, '2018-06-06 13:11:01', '2018-06-06 13:11:01');
INSERT INTO `coupon` VALUES (9, '充值测试', '', 'BRCCMM5', 3, 1, 10000, 0.00, 1528128000, 1529855999, 0, 1, '2018-06-06 13:11:01', '2018-06-06 13:11:12');
COMMIT;

-- ----------------------------
-- Table structure for coupon_log
-- ----------------------------
DROP TABLE IF EXISTS `coupon_log`;
CREATE TABLE `coupon_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券ID',
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='优惠券使用日志';

-- ----------------------------
-- Records of coupon_log
-- ----------------------------
BEGIN;
INSERT INTO `coupon_log` VALUES (2, 7, 5, 30, '2018-06-05 21:20:29', '2018-06-05 21:20:29');
INSERT INTO `coupon_log` VALUES (3, 7, 3, 33, '2018-06-05 22:43:16', '2018-06-05 22:43:16');
INSERT INTO `coupon_log` VALUES (4, 7, 6, 35, '2018-06-06 07:56:22', '2018-06-06 07:56:22');
INSERT INTO `coupon_log` VALUES (5, 9, 0, 0, '2018-06-06 13:11:12', '2018-06-06 13:11:12');
COMMIT;

-- ----------------------------
-- Table structure for email_log
-- ----------------------------
DROP TABLE IF EXISTS `email_log`;
CREATE TABLE `email_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '接收者ID',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '邮件标题',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT '邮件内容',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：1-发送成功、2-发送失败',
  `error` text COLLATE utf8mb4_unicode_ci COMMENT '发送失败抛出的异常信息',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='邮件投递记录';

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '商品服务SKU',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '商品名称',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '商品图片地址',
  `traffic` bigint(20) NOT NULL DEFAULT '0' COMMENT '商品内含多少流量，单位Mib',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '商品价值多少积分',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '商品类型：1-流量包、2-套餐',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '商品售价，单位分',
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '商品描述',
  `order` int(2) NOT NULL DEFAULT '0' COMMENT '流量扣去优先级',
  `days` int(11) NOT NULL DEFAULT '30' COMMENT '有效期',
  `is_del` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已删除：0-否、1-是',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0-下架、1-上架',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品信息表';

-- ----------------------------
-- Records of goods
-- ----------------------------
BEGIN;
INSERT INTO `goods` VALUES (1, 'S00001', '超值包年超级会员', '', 30720, 0, 2, 12900, '有效期一年，获得北美高级VPI服务器使用权限，每个月流量30GB，根据购买日期每月自动重置。', 0, 365, 0, 1, '2018-05-25 16:01:29', '2018-06-05 21:12:36');
INSERT INTO `goods` VALUES (2, 'S00002', '10GB流量包', '', 10240, 0, 1, 100, '10GB流量包，有效期30天', 0, 30, 1, 1, '2018-05-25 16:35:27', '2018-05-26 22:53:52');
INSERT INTO `goods` VALUES (3, 'S00003', '1GB流量日包测试', '', 1024, 0, 1, 200, '购买后向账户添加流量1GB，该流量包可使用VIP服务器，注意当日失效', 0, 1, 0, 1, '2018-05-26 19:07:41', '2018-06-06 13:17:57');
INSERT INTO `goods` VALUES (4, 'S00004', '人工远程指导', '', 10, 0, 1, 2000, '远程指导服务费，购买后请发工单联系管理员', 0, 1, 0, 0, '2018-05-26 22:56:43', '2018-06-05 20:51:15');
INSERT INTO `goods` VALUES (5, 'S00005', '超值季度包', '', 30720, 0, 2, 5000, '获得VIP服务器90天的使用权限，每个月流量30GB，根据购买日期自动重置。', 0, 90, 0, 1, '2018-06-02 12:35:15', '2018-06-02 12:35:15');
INSERT INTO `goods` VALUES (6, 'S00006', '1GB流量两天体验包', '', 1024, 0, 1, 200, '购买后向账户添加流量1GB，该流量包可使用VIP服务器，注意两天有效期', 0, 2, 0, 1, '2018-06-06 00:07:09', '2018-06-06 08:04:58');
INSERT INTO `goods` VALUES (7, 'S00007', 'jasonleeis', '', 1024, 0, 1, 1100, NULL, 0, 30, 1, 1, '2018-06-06 08:26:55', '2018-06-06 08:28:39');
INSERT INTO `goods` VALUES (8, 'S00008', '25GBVIP高速流量月包', '', 25000, 0, 1, 980, '只要2元，让你畅游整个互联网世界。北美高速VIP服务器稳定安全，4K视频秒开，全局翻墙，支持win,mac，ios,android等主流平台，再也不用为翻墙谷歌烦恼。分享给有需要的优秀的你们。', 1, 30, 0, 1, '2018-06-06 08:29:48', '2018-06-07 00:40:06');
INSERT INTO `goods` VALUES (9, 'S00009', 'aa', '', 1024, 0, 1, 100, 'aa', 3, 30, 1, 1, '2018-06-07 00:40:25', '2018-06-07 00:40:33');
COMMIT;

-- ----------------------------
-- Table structure for goods_label
-- ----------------------------
DROP TABLE IF EXISTS `goods_label`;
CREATE TABLE `goods_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `label_id` int(11) NOT NULL DEFAULT '0' COMMENT '标签ID',
  PRIMARY KEY (`id`),
  KEY `idx` (`goods_id`,`label_id`),
  KEY `idx_goods_id` (`goods_id`),
  KEY `idx_label_id` (`label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品标签';

-- ----------------------------
-- Records of goods_label
-- ----------------------------
BEGIN;
INSERT INTO `goods_label` VALUES (30, 1, 1);
INSERT INTO `goods_label` VALUES (31, 1, 2);
INSERT INTO `goods_label` VALUES (3, 2, 1);
INSERT INTO `goods_label` VALUES (39, 3, 1);
INSERT INTO `goods_label` VALUES (26, 4, 4);
INSERT INTO `goods_label` VALUES (18, 5, 1);
INSERT INTO `goods_label` VALUES (37, 6, 1);
INSERT INTO `goods_label` VALUES (40, 8, 1);
COMMIT;

-- ----------------------------
-- Table structure for invite
-- ----------------------------
DROP TABLE IF EXISTS `invite`;
CREATE TABLE `invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '邀请人ID',
  `fuid` int(11) NOT NULL DEFAULT '0' COMMENT '受邀人ID',
  `code` char(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邀请码',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '邀请码状态：0-未使用、1-已使用、2-已过期',
  `dateline` datetime DEFAULT NULL COMMENT '有效期至',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='邀请码表';

-- ----------------------------
-- Records of invite
-- ----------------------------
BEGIN;
INSERT INTO `invite` VALUES (18, 1, 0, '9AC79762A0B4', 0, '2018-06-09 14:41:24', '2018-06-02 14:41:24', '2018-06-02 14:41:24');
INSERT INTO `invite` VALUES (19, 1, 0, '73D727DF71AA', 0, '2018-06-09 14:41:24', '2018-06-02 14:41:24', '2018-06-02 14:41:24');
INSERT INTO `invite` VALUES (20, 1, 0, '299409A03C6C', 0, '2018-06-09 14:41:24', '2018-06-02 14:41:24', '2018-06-02 14:41:24');
INSERT INTO `invite` VALUES (21, 1, 10, '267D8AAD1C5C', 1, '2018-06-09 14:41:24', '2018-06-02 14:41:24', '2018-06-02 14:42:52');
INSERT INTO `invite` VALUES (22, 1, 9, '9B359645B71F', 1, '2018-06-09 14:41:24', '2018-06-02 14:41:24', '2018-06-02 14:42:32');
INSERT INTO `invite` VALUES (23, 10, 0, '273D7A23B203', 0, '2018-06-09 15:08:23', '2018-06-02 15:08:23', '2018-06-02 15:08:23');
INSERT INTO `invite` VALUES (24, 9, 11, '79E4AD3F9A86', 1, '2018-06-09 15:19:33', '2018-06-02 15:19:33', '2018-06-02 15:21:44');
INSERT INTO `invite` VALUES (25, 12, 0, '021B4780AA82', 0, '2018-06-12 22:05:09', '2018-06-05 22:05:09', '2018-06-05 22:05:09');
INSERT INTO `invite` VALUES (26, 12, 0, 'DADE5469DD76', 0, '2018-06-12 22:10:22', '2018-06-05 22:10:22', '2018-06-05 22:10:22');
INSERT INTO `invite` VALUES (27, 12, 0, '4811C0C5C6FB', 0, '2018-06-12 22:10:22', '2018-06-05 22:10:22', '2018-06-05 22:10:22');
INSERT INTO `invite` VALUES (28, 12, 0, 'C398D36A2AAC', 0, '2018-06-12 22:10:22', '2018-06-05 22:10:22', '2018-06-05 22:10:22');
INSERT INTO `invite` VALUES (29, 12, 0, '34ADA12C3410', 0, '2018-06-12 22:10:22', '2018-06-05 22:10:22', '2018-06-05 22:10:22');
INSERT INTO `invite` VALUES (30, 12, 0, 'E9FA598CE25B', 0, '2018-06-12 22:10:22', '2018-06-05 22:10:22', '2018-06-05 22:10:22');
COMMIT;

-- ----------------------------
-- Table structure for label
-- ----------------------------
DROP TABLE IF EXISTS `label`;
CREATE TABLE `label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='标签';

-- ----------------------------
-- Records of label
-- ----------------------------
BEGIN;
INSERT INTO `label` VALUES (1, '北美高速VIP', 0);
INSERT INTO `label` VALUES (2, '免费线路', 0);
INSERT INTO `label` VALUES (3, '试用线路', 0);
INSERT INTO `label` VALUES (4, '空线路', 0);
COMMIT;

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL DEFAULT '1' COMMENT '等级',
  `level_name` varchar(100) NOT NULL DEFAULT '' COMMENT '等级名称',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of level
-- ----------------------------
BEGIN;
INSERT INTO `level` VALUES (1, 1, '倔强青铜', '2017-10-26 15:56:52', '2017-10-26 15:38:58');
INSERT INTO `level` VALUES (2, 2, '秩序白银', '2017-10-26 15:57:30', '2017-10-26 12:37:51');
INSERT INTO `level` VALUES (3, 3, '荣耀黄金', '2017-10-26 15:41:31', '2017-10-26 15:41:31');
INSERT INTO `level` VALUES (4, 4, '尊贵铂金', '2017-10-26 15:41:38', '2017-10-26 15:41:38');
INSERT INTO `level` VALUES (5, 5, '永恒钻石', '2017-10-26 15:41:47', '2017-10-26 15:41:47');
INSERT INTO `level` VALUES (6, 6, '至尊黑曜', '2017-10-26 15:41:56', '2017-10-26 15:41:56');
INSERT INTO `level` VALUES (7, 7, '最强王者', '2017-10-26 15:42:02', '2017-10-26 15:42:02');
COMMIT;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '订单编号',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '操作人',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券ID',
  `origin_amount` int(11) NOT NULL DEFAULT '0' COMMENT '订单原始总价，单位分',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '订单总价，单位分',
  `expire_at` datetime DEFAULT NULL COMMENT '过期时间',
  `is_expire` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已过期：0-未过期、1-已过期',
  `pay_way` tinyint(4) NOT NULL DEFAULT '1' COMMENT '支付方式：0-系统支付、1-余额支付、2-有赞云支付',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态：-1-已关闭、0-待支付、1-已支付待激活、2-正在使用、3-流量耗尽',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后一次更新时间',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='订单信息表';

-- ----------------------------
-- Records of order
-- ----------------------------
BEGIN;
INSERT INTO `order` VALUES (43, '180607014645540740', 1, 1, 0, 12900, 12900, '2019-06-07 01:46:45', 0, 1, 2, '2018-06-07 01:46:45', '2018-06-07 01:46:45');
COMMIT;

-- ----------------------------
-- Table structure for order_goods
-- ----------------------------
DROP TABLE IF EXISTS `order_goods`;
CREATE TABLE `order_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `order_sn` varchar(20) NOT NULL DEFAULT '' COMMENT '订单编号',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `num` int(11) NOT NULL DEFAULT '0' COMMENT '商品数量',
  `origin_price` int(11) NOT NULL DEFAULT '0' COMMENT '商品原价，单位分',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '商品实际价格，单位分',
  `is_expire` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已过期：0-未过期、1-已过期',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for order_label
-- ----------------------------
DROP TABLE IF EXISTS `order_label`;
CREATE TABLE `order_label` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL COMMENT '订单SN',
  `label_id` int(11) NOT NULL COMMENT 'label_ID',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `oid` (`oid`),
  CONSTRAINT `aa` FOREIGN KEY (`oid`) REFERENCES `order` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order_label
-- ----------------------------
BEGIN;
INSERT INTO `order_label` VALUES (1, 43, 1);
INSERT INTO `order_label` VALUES (4, 43, 2);
COMMIT;

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `oid` int(11) DEFAULT NULL COMMENT '本地订单ID',
  `order_sn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '本地订单长ID',
  `pay_way` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '支付方式：1-微信、2-支付宝',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '金额，单位分',
  `qr_id` int(11) NOT NULL DEFAULT '0' COMMENT '有赞生成的支付单ID',
  `qr_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '有赞生成的支付二维码URL',
  `qr_code` text COLLATE utf8mb4_unicode_ci COMMENT '有赞生成的支付二维码图片base64',
  `qr_local_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支付二维码的本地存储URL',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态：-1-支付失败、0-等待支付、1-支付成功',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of payment
-- ----------------------------
BEGIN;
INSERT INTO `payment` VALUES (10, '8RSXAQKKh4fB', 10, 28, '180602144442302673', '1', 200, 7009331, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7009331&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180602/430333855197222494.png', 1, '2018-06-02 14:44:45', '2018-06-02 14:45:19');
INSERT INTO `payment` VALUES (11, 'tn43q7ndrmjv', 9, 29, '180602144526491418', '1', 200, 7009337, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7009337&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180602/267037578517486286.png', 1, '2018-06-02 14:45:28', '2018-06-02 14:46:00');
INSERT INTO `payment` VALUES (12, 'EBsMrum2avcv', 11, 30, '180605211941676176', '1', 2500, 7032280, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7032280&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180605/258222026065028165.png', 1, '2018-06-05 21:19:46', '2018-06-05 21:20:29');
INSERT INTO `payment` VALUES (13, 'm7VqwXnH5kta', 12, 31, '180605213719997707', '1', 5000, 7032356, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7032356&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180605/000234128677504739.png', -1, '2018-06-05 21:37:21', '2018-06-05 22:08:02');
INSERT INTO `payment` VALUES (14, 'H6ZfNqTfsJWX', 12, 32, '180605221734561689', '1', 200, 7032586, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7032586&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180605/259949300773763592.png', 1, '2018-06-05 22:17:36', '2018-06-05 22:17:57');
INSERT INTO `payment` VALUES (15, 'PMcxkNRmgT9G', 13, 33, '180605224010364051', '1', 100, 7032704, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7032704&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180605/137656398707575632.png', 1, '2018-06-05 22:40:13', '2018-06-05 22:43:16');
INSERT INTO `payment` VALUES (16, 'kmqkhVyTwC6T', 20, 34, '180606001917413630', '1', 200, 7033106, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7033106&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180606/867610655532653080.png', 1, '2018-06-06 00:19:19', '2018-06-06 00:19:52');
INSERT INTO `payment` VALUES (17, 'XpTFMjDpSjFd', 12, 35, '180606075547564785', '1', 100, 7033402, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7033402&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180606/084060241292146255.png', 1, '2018-06-06 07:55:51', '2018-06-06 07:56:22');
INSERT INTO `payment` VALUES (18, 'Fbxf6pm73xba', 1, 39, '180606184052322594', '1', 12900, 7039912, 'https://trade.koudaitong.com/wxpay/confirmQr?qr_id=7039912&kdt_id=40871208', 'data:image/png;base64,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', '/assets/images/qrcode/20180606/211435443133994533.png', 0, '2018-06-06 18:40:53', '2018-06-06 18:40:53');
COMMIT;

-- ----------------------------
-- Table structure for payment_callback
-- ----------------------------
DROP TABLE IF EXISTS `payment_callback`;
CREATE TABLE `payment_callback` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(50) DEFAULT NULL,
  `yz_id` varchar(50) DEFAULT NULL,
  `kdt_id` varchar(50) DEFAULT NULL,
  `kdt_name` varchar(50) DEFAULT NULL,
  `mode` tinyint(4) DEFAULT NULL,
  `msg` text,
  `sendCount` int(11) DEFAULT NULL,
  `sign` varchar(32) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `test` tinyint(4) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `version` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COMMENT='有赞云回调日志';

-- ----------------------------
-- Table structure for referral_apply
-- ----------------------------
DROP TABLE IF EXISTS `referral_apply`;
CREATE TABLE `referral_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `before` int(11) NOT NULL DEFAULT '0' COMMENT '操作前可提现金额，单位分',
  `after` int(11) NOT NULL DEFAULT '0' COMMENT '操作后可提现金额，单位分',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '本次提现金额，单位分',
  `link_logs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '关联返利日志ID，例如：1,3,4',
  `account_type` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '账户类型：支付宝，微信',
  `account_num` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '返现账户',
  `bill_num` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '返现账单号码',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：-1-驳回、0-待审核、1-审核通过待打款、2-已打款',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='提现申请';

-- ----------------------------
-- Table structure for referral_log
-- ----------------------------
DROP TABLE IF EXISTS `referral_log`;
CREATE TABLE `referral_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `ref_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '推广人ID',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '关联订单ID',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '消费金额，单位分',
  `ref_amount` int(11) NOT NULL DEFAULT '0' COMMENT '返利金额',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-未提现、1-审核中、2-已提现',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='消费返利日志';

-- ----------------------------
-- Records of referral_log
-- ----------------------------
BEGIN;
INSERT INTO `referral_log` VALUES (10, 10, 1, 28, 200, 60, 0, '2018-06-02 14:45:19', '2018-06-02 14:45:19');
INSERT INTO `referral_log` VALUES (11, 9, 1, 29, 200, 60, 0, '2018-06-02 14:46:00', '2018-06-02 14:46:00');
INSERT INTO `referral_log` VALUES (12, 11, 10, 30, 2500, 750, 0, '2018-06-05 21:20:29', '2018-06-05 21:20:29');
INSERT INTO `referral_log` VALUES (13, 13, 1, 33, 100, 30, 0, '2018-06-05 22:43:16', '2018-06-05 22:43:16');
INSERT INTO `referral_log` VALUES (14, 20, 12, 34, 200, 60, 0, '2018-06-06 00:19:52', '2018-06-06 00:19:52');
COMMIT;

-- ----------------------------
-- Table structure for ss_config
-- ----------------------------
DROP TABLE IF EXISTS `ss_config`;
CREATE TABLE `ss_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '配置名',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '类型：1-加密方式、2-协议、3-混淆',
  `is_default` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否默认：0-不是、1-是',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序：值越大排越前',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ss_config
-- ----------------------------
BEGIN;
INSERT INTO `ss_config` VALUES (1, 'none', 1, 0, 0, '2017-08-01 13:12:23', '2017-08-01 13:12:23');
INSERT INTO `ss_config` VALUES (2, 'rc4-md5', 1, 0, 0, '2017-08-01 13:12:29', '2017-08-01 13:12:29');
INSERT INTO `ss_config` VALUES (3, 'bf-cfb', 1, 0, 0, '2017-08-01 13:13:05', '2017-08-01 13:13:05');
INSERT INTO `ss_config` VALUES (4, 'aes-128-cfb', 1, 0, 0, '2017-08-01 13:13:13', '2017-08-01 13:13:13');
INSERT INTO `ss_config` VALUES (5, 'aes-192-cfb', 1, 0, 0, '2017-08-01 13:13:25', '2017-08-01 13:13:25');
INSERT INTO `ss_config` VALUES (6, 'aes-256-cfb', 1, 0, 0, '2017-08-01 13:13:39', '2017-08-01 13:13:39');
INSERT INTO `ss_config` VALUES (7, 'aes-128-ctr', 1, 0, 0, '2017-08-01 13:13:46', '2017-08-01 13:13:46');
INSERT INTO `ss_config` VALUES (8, 'aes-192-ctr', 1, 1, 0, '2017-08-01 13:13:53', '2017-08-01 13:13:53');
INSERT INTO `ss_config` VALUES (9, 'aes-256-ctr', 1, 0, 0, '2017-08-01 13:14:00', '2017-08-01 13:14:00');
INSERT INTO `ss_config` VALUES (10, 'camellia-128-cfb', 1, 0, 0, '2017-08-01 13:14:08', '2017-08-01 13:14:08');
INSERT INTO `ss_config` VALUES (11, 'camellia-192-cfb', 1, 0, 0, '2017-08-01 13:14:12', '2017-08-01 13:14:12');
INSERT INTO `ss_config` VALUES (12, 'camellia-256-cfb', 1, 0, 0, '2017-08-01 13:14:51', '2017-08-01 13:14:51');
INSERT INTO `ss_config` VALUES (13, 'salsa20', 1, 0, 0, '2017-08-01 13:15:09', '2017-08-01 13:15:09');
INSERT INTO `ss_config` VALUES (14, 'chacha20', 1, 0, 0, '2017-08-01 13:15:16', '2017-08-01 13:15:16');
INSERT INTO `ss_config` VALUES (15, 'chacha20-ietf', 1, 0, 0, '2017-08-01 13:15:27', '2017-08-01 13:15:27');
INSERT INTO `ss_config` VALUES (16, 'chacha20-ietf-poly1305', 1, 0, 0, '2017-08-01 13:15:39', '2017-08-01 13:15:39');
INSERT INTO `ss_config` VALUES (17, 'chacha20-poly1305', 1, 0, 0, '2017-08-01 13:15:46', '2017-08-01 13:15:46');
INSERT INTO `ss_config` VALUES (18, 'xchacha-ietf-poly1305', 1, 0, 0, '2017-08-01 13:21:51', '2017-08-01 13:21:51');
INSERT INTO `ss_config` VALUES (19, 'aes-128-gcm', 1, 0, 0, '2017-08-01 13:22:05', '2017-08-01 13:22:05');
INSERT INTO `ss_config` VALUES (20, 'aes-192-gcm', 1, 0, 0, '2017-08-01 13:22:12', '2017-08-01 13:22:12');
INSERT INTO `ss_config` VALUES (21, 'aes-256-gcm', 1, 0, 0, '2017-08-01 13:22:19', '2017-08-01 13:22:19');
INSERT INTO `ss_config` VALUES (22, 'sodium-aes-256-gcm', 1, 0, 0, '2017-08-01 13:22:32', '2017-08-01 13:22:32');
INSERT INTO `ss_config` VALUES (23, 'origin', 2, 0, 0, '2017-08-01 13:23:57', '2017-08-01 13:23:57');
INSERT INTO `ss_config` VALUES (24, 'auth_sha1_v4', 2, 0, 0, '2017-08-01 13:24:41', '2017-08-01 13:24:41');
INSERT INTO `ss_config` VALUES (25, 'auth_aes128_md5', 2, 0, 0, '2017-08-01 13:24:58', '2017-08-01 13:24:58');
INSERT INTO `ss_config` VALUES (26, 'auth_aes128_sha1', 2, 0, 0, '2017-08-01 13:25:11', '2017-08-01 13:25:11');
INSERT INTO `ss_config` VALUES (27, 'auth_chain_a', 2, 1, 0, '2017-08-01 13:25:24', '2017-08-01 13:25:24');
INSERT INTO `ss_config` VALUES (28, 'auth_chain_b', 2, 0, 0, '2017-08-01 14:02:31', '2017-08-01 14:02:31');
INSERT INTO `ss_config` VALUES (29, 'plain', 3, 0, 0, '2017-08-01 13:29:14', '2017-08-01 13:29:14');
INSERT INTO `ss_config` VALUES (30, 'http_simple', 3, 0, 0, '2017-08-01 13:29:30', '2017-08-01 13:29:30');
INSERT INTO `ss_config` VALUES (31, 'http_post', 3, 0, 0, '2017-08-01 13:29:38', '2017-08-01 13:29:38');
INSERT INTO `ss_config` VALUES (32, 'tls1.2_ticket_auth', 3, 1, 0, '2017-08-01 13:29:51', '2017-08-01 13:29:51');
INSERT INTO `ss_config` VALUES (33, 'tls1.2_ticket_fastauth', 3, 0, 0, '2017-08-01 14:02:19', '2017-08-01 14:02:19');
INSERT INTO `ss_config` VALUES (34, 'auth_chain_c', 2, 0, 0, '2017-08-01 14:02:31', '2017-08-01 14:02:31');
INSERT INTO `ss_config` VALUES (35, 'auth_chain_d', 2, 0, 0, '2017-08-01 14:02:31', '2017-08-01 14:02:31');
INSERT INTO `ss_config` VALUES (36, 'auth_chain_e', 2, 0, 0, '2017-08-01 14:02:31', '2017-08-01 14:02:31');
INSERT INTO `ss_config` VALUES (37, 'auth_chain_f', 2, 0, 0, '2017-08-01 14:02:31', '2017-08-01 14:02:31');
COMMIT;

-- ----------------------------
-- Table structure for ss_group
-- ----------------------------
DROP TABLE IF EXISTS `ss_group`;
CREATE TABLE `ss_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分组名称',
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '分组级别，对应账号级别',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ss_group
-- ----------------------------
BEGIN;
INSERT INTO `ss_group` VALUES (1, '高速VIP-洛杉矶', 2, '2018-05-25 15:11:03', '2018-05-25 15:11:11');
INSERT INTO `ss_group` VALUES (2, '免费线路', 1, '2018-05-26 13:06:41', '2018-05-26 13:15:18');
COMMIT;

-- ----------------------------
-- Table structure for ss_group_node
-- ----------------------------
DROP TABLE IF EXISTS `ss_group_node`;
CREATE TABLE `ss_group_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '分组ID',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='分组节点关系表';

-- ----------------------------
-- Records of ss_group_node
-- ----------------------------
BEGIN;
INSERT INTO `ss_group_node` VALUES (4, 2, 2);
INSERT INTO `ss_group_node` VALUES (8, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for ss_node
-- ----------------------------
DROP TABLE IF EXISTS `ss_node`;
CREATE TABLE `ss_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '' COMMENT '名称',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属分组',
  `country_code` char(5) DEFAULT '' COMMENT '国家代码',
  `server` varchar(128) DEFAULT NULL COMMENT '服务器域名地址',
  `ip` char(15) DEFAULT NULL COMMENT '服务器IPV4地址',
  `ipv6` char(128) DEFAULT NULL COMMENT '服务器IPV6地址',
  `desc` varchar(255) DEFAULT '' COMMENT '节点简单描述',
  `method` varchar(32) NOT NULL DEFAULT 'aes-192-ctr' COMMENT '加密方式',
  `protocol` varchar(128) NOT NULL DEFAULT 'auth_chain_a' COMMENT '协议',
  `protocol_param` varchar(128) DEFAULT '' COMMENT '协议参数',
  `obfs` varchar(128) NOT NULL DEFAULT 'tls1.2_ticket_auth' COMMENT '混淆',
  `obfs_param` varchar(128) DEFAULT '' COMMENT '混淆参数',
  `traffic_rate` float NOT NULL DEFAULT '1' COMMENT '流量比率',
  `bandwidth` int(11) NOT NULL DEFAULT '100' COMMENT '出口带宽，单位M',
  `traffic` bigint(20) NOT NULL DEFAULT '1000' COMMENT '每月可用流量，单位G',
  `monitor_url` varchar(255) DEFAULT NULL COMMENT '监控地址',
  `is_subscribe` tinyint(4) DEFAULT '1' COMMENT '是否允许用户订阅该节点：0-否、1-是',
  `compatible` tinyint(4) DEFAULT '0' COMMENT '兼容SS',
  `single` tinyint(4) DEFAULT '0' COMMENT '单端口多用户：0-否、1-是',
  `single_force` tinyint(4) DEFAULT NULL COMMENT '模式：0-兼容模式、1-严格模式',
  `single_port` varchar(50) DEFAULT '' COMMENT '端口号，用,号分隔',
  `single_passwd` varchar(50) DEFAULT '' COMMENT '密码',
  `single_method` varchar(50) DEFAULT '' COMMENT '加密方式',
  `single_protocol` varchar(50) NOT NULL DEFAULT '' COMMENT '协议',
  `single_obfs` varchar(50) NOT NULL DEFAULT '' COMMENT '混淆',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序值，值越大越靠前显示',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0-维护、1-正常',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='节点信息表';

-- ----------------------------
-- Records of ss_node
-- ----------------------------
BEGIN;
INSERT INTO `ss_node` VALUES (1, '北美高速VIP', 1, 'us', 'vip.us1.izhangxm.com', '67.218.155.138', NULL, '高级会员专用线路1', 'aes-192-ctr', 'auth_chain_a', 'vip.us1.baidu.com', 'tls1.2_ticket_auth', 'baike.baidu.com', 1, 1000, 1000, 'http://speed.izhangxm.com/api/monitor', 1, 0, 0, 0, '', '', '', '', '', 1, 1, '2018-05-25 15:15:52', '2018-05-26 23:26:29');
INSERT INTO `ss_node` VALUES (2, '免费线路', 2, 'us', NULL, '149.28.37.249', NULL, '免费线路', 'aes-192-ctr', 'auth_chain_a', NULL, 'tls1.2_ticket_auth', NULL, 1, 1000, 1000, NULL, 1, 0, 0, 0, '', '', '', '', '', 1, 1, '2018-05-26 13:08:09', '2018-05-26 13:17:01');
COMMIT;

-- ----------------------------
-- Table structure for ss_node_info
-- ----------------------------
DROP TABLE IF EXISTS `ss_node_info`;
CREATE TABLE `ss_node_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `uptime` float NOT NULL COMMENT '更新时间',
  `load` varchar(32) NOT NULL COMMENT '负载',
  `log_time` int(11) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`),
  KEY `idx_node_id` (`node_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31836 DEFAULT CHARSET=utf8 COMMENT='节点负载信息';

-- ----------------------------
-- Records of ss_node_info
-- ----------------------------
BEGIN;
INSERT INTO `ss_node_info` VALUES (31776, 1, 897133, '0.05 0.14 0.08\n', 1528249835);
INSERT INTO `ss_node_info` VALUES (31777, 2, 937504, '0.07 0.12 0.06\n', 1528249842);
INSERT INTO `ss_node_info` VALUES (31778, 1, 897193, '0.02 0.12 0.08\n', 1528249895);
INSERT INTO `ss_node_info` VALUES (31779, 2, 937565, '0.08 0.11 0.06\n', 1528249904);
INSERT INTO `ss_node_info` VALUES (31780, 1, 897253, '0.00 0.09 0.07\n', 1528249955);
INSERT INTO `ss_node_info` VALUES (31781, 2, 937627, '0.06 0.10 0.06\n', 1528249965);
INSERT INTO `ss_node_info` VALUES (31782, 1, 897313, '0.00 0.07 0.06\n', 1528250015);
INSERT INTO `ss_node_info` VALUES (31783, 2, 937688, '0.02 0.08 0.06\n', 1528250026);
INSERT INTO `ss_node_info` VALUES (31784, 1, 897373, '0.00 0.06 0.06\n', 1528250075);
INSERT INTO `ss_node_info` VALUES (31785, 2, 937749, '0.21 0.11 0.07\n', 1528250088);
INSERT INTO `ss_node_info` VALUES (31786, 1, 897433, '0.00 0.04 0.05\n', 1528250135);
INSERT INTO `ss_node_info` VALUES (31787, 2, 937811, '0.07 0.09 0.06\n', 1528250149);
INSERT INTO `ss_node_info` VALUES (31788, 1, 897493, '0.00 0.03 0.05\n', 1528250195);
INSERT INTO `ss_node_info` VALUES (31789, 2, 937872, '0.36 0.19 0.10\n', 1528250210);
INSERT INTO `ss_node_info` VALUES (31790, 1, 897553, '0.06 0.04 0.05\n', 1528250255);
INSERT INTO `ss_node_info` VALUES (31791, 2, 937933, '0.27 0.19 0.10\n', 1528250272);
INSERT INTO `ss_node_info` VALUES (31792, 1, 897613, '0.18 0.08 0.06\n', 1528250315);
INSERT INTO `ss_node_info` VALUES (31793, 2, 937995, '0.14 0.17 0.10\n', 1528250333);
INSERT INTO `ss_node_info` VALUES (31794, 1, 897673, '0.06 0.06 0.05\n', 1528250375);
INSERT INTO `ss_node_info` VALUES (31795, 2, 938056, '0.21 0.17 0.10\n', 1528250395);
INSERT INTO `ss_node_info` VALUES (31796, 1, 897733, '0.07 0.06 0.05\n', 1528250435);
INSERT INTO `ss_node_info` VALUES (31797, 2, 938118, '0.26 0.22 0.12\n', 1528250456);
INSERT INTO `ss_node_info` VALUES (31798, 1, 897793, '0.02 0.05 0.04\n', 1528250495);
INSERT INTO `ss_node_info` VALUES (31799, 2, 938179, '0.09 0.18 0.11\n', 1528250517);
INSERT INTO `ss_node_info` VALUES (31800, 1, 897853, '0.04 0.05 0.04\n', 1528250555);
INSERT INTO `ss_node_info` VALUES (31801, 2, 938240, '0.03 0.14 0.09\n', 1528250579);
INSERT INTO `ss_node_info` VALUES (31802, 1, 897913, '0.01 0.04 0.04\n', 1528250615);
INSERT INTO `ss_node_info` VALUES (31803, 2, 938302, '0.01 0.11 0.09\n', 1528250640);
INSERT INTO `ss_node_info` VALUES (31804, 1, 897973, '0.00 0.03 0.03\n', 1528250675);
INSERT INTO `ss_node_info` VALUES (31805, 2, 938363, '0.47 0.22 0.12\n', 1528250701);
INSERT INTO `ss_node_info` VALUES (31806, 1, 898033, '0.00 0.02 0.03\n', 1528250735);
INSERT INTO `ss_node_info` VALUES (31807, 2, 938424, '0.27 0.21 0.12\n', 1528250763);
INSERT INTO `ss_node_info` VALUES (31808, 1, 898093, '0.07 0.03 0.03\n', 1528250795);
INSERT INTO `ss_node_info` VALUES (31809, 2, 938486, '0.10 0.17 0.11\n', 1528250824);
INSERT INTO `ss_node_info` VALUES (31810, 1, 898153, '0.07 0.04 0.03\n', 1528250855);
INSERT INTO `ss_node_info` VALUES (31811, 2, 938547, '0.43 0.22 0.13\n', 1528250885);
INSERT INTO `ss_node_info` VALUES (31812, 1, 898214, '0.02 0.03 0.02\n', 1528250915);
INSERT INTO `ss_node_info` VALUES (31813, 2, 938609, '0.54 0.27 0.15\n', 1528250947);
INSERT INTO `ss_node_info` VALUES (31814, 1, 898274, '0.06 0.04 0.02\n', 1528250975);
INSERT INTO `ss_node_info` VALUES (31815, 2, 938670, '0.20 0.22 0.14\n', 1528251009);
INSERT INTO `ss_node_info` VALUES (31816, 1, 898334, '0.02 0.03 0.02\n', 1528251035);
INSERT INTO `ss_node_info` VALUES (31817, 2, 938732, '0.25 0.23 0.15\n', 1528251070);
INSERT INTO `ss_node_info` VALUES (31818, 1, 898394, '0.01 0.02 0.01\n', 1528251095);
INSERT INTO `ss_node_info` VALUES (31819, 2, 938793, '0.52 0.30 0.17\n', 1528251131);
INSERT INTO `ss_node_info` VALUES (31820, 1, 898454, '0.00 0.02 0.00\n', 1528251155);
INSERT INTO `ss_node_info` VALUES (31821, 2, 938854, '0.19 0.24 0.16\n', 1528251193);
INSERT INTO `ss_node_info` VALUES (31822, 1, 898514, '0.46 0.11 0.03\n', 1528251215);
INSERT INTO `ss_node_info` VALUES (31823, 2, 938916, '0.20 0.23 0.16\n', 1528251254);
INSERT INTO `ss_node_info` VALUES (31824, 1, 898574, '0.57 0.17 0.05\n', 1528251275);
INSERT INTO `ss_node_info` VALUES (31825, 2, 938977, '0.07 0.18 0.15\n', 1528251315);
INSERT INTO `ss_node_info` VALUES (31826, 1, 898634, '0.21 0.14 0.05\n', 1528251335);
INSERT INTO `ss_node_info` VALUES (31827, 2, 939038, '0.06 0.16 0.14\n', 1528251377);
INSERT INTO `ss_node_info` VALUES (31828, 1, 898694, '0.11 0.12 0.05\n', 1528251395);
INSERT INTO `ss_node_info` VALUES (31829, 2, 939100, '0.54 0.27 0.18\n', 1528251438);
INSERT INTO `ss_node_info` VALUES (31830, 1, 898754, '0.07 0.11 0.05\n', 1528251455);
INSERT INTO `ss_node_info` VALUES (31831, 2, 939161, '0.76 0.36 0.21\n', 1528251499);
INSERT INTO `ss_node_info` VALUES (31832, 1, 898814, '0.02 0.09 0.04\n', 1528251515);
INSERT INTO `ss_node_info` VALUES (31833, 2, 939222, '0.28 0.29 0.20\n', 1528251561);
INSERT INTO `ss_node_info` VALUES (31834, 1, 898874, '0.04 0.08 0.04\n', 1528251575);
INSERT INTO `ss_node_info` VALUES (31835, 2, 939284, '0.63 0.38 0.23\n', 1528251622);
COMMIT;

-- ----------------------------
-- Table structure for ss_node_label
-- ----------------------------
DROP TABLE IF EXISTS `ss_node_label`;
CREATE TABLE `ss_node_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `label_id` int(11) NOT NULL DEFAULT '0' COMMENT '标签ID',
  PRIMARY KEY (`id`),
  KEY `idx` (`node_id`,`label_id`),
  KEY `idx_node_id` (`node_id`),
  KEY `idx_label_id` (`label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点标签';

-- ----------------------------
-- Records of ss_node_label
-- ----------------------------
BEGIN;
INSERT INTO `ss_node_label` VALUES (9, 1, 1);
INSERT INTO `ss_node_label` VALUES (10, 1, 3);
INSERT INTO `ss_node_label` VALUES (2, 2, 2);
COMMIT;

-- ----------------------------
-- Table structure for ss_node_online_log
-- ----------------------------
DROP TABLE IF EXISTS `ss_node_online_log`;
CREATE TABLE `ss_node_online_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL COMMENT '节点ID',
  `online_user` int(11) NOT NULL COMMENT '在线用户数',
  `log_time` int(11) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`),
  KEY `idx_node_id` (`node_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31836 DEFAULT CHARSET=utf8 COMMENT='节点在线信息';

-- ----------------------------
-- Table structure for ss_node_traffic_daily
-- ----------------------------
DROP TABLE IF EXISTS `ss_node_traffic_daily`;
CREATE TABLE `ss_node_traffic_daily` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `total` bigint(20) NOT NULL DEFAULT '0' COMMENT '总流量',
  `traffic` varchar(255) DEFAULT '' COMMENT '总流量（带单位）',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_node_id` (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for ss_node_traffic_hourly
-- ----------------------------
DROP TABLE IF EXISTS `ss_node_traffic_hourly`;
CREATE TABLE `ss_node_traffic_hourly` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `total` bigint(20) NOT NULL DEFAULT '0' COMMENT '总流量',
  `traffic` varchar(255) DEFAULT '' COMMENT '总流量（带单位）',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_node_id` (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-待处理、1-已处理未关闭、2-已关闭',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ticket
-- ----------------------------
BEGIN;
INSERT INTO `ticket` VALUES (2, 1, '邮件测试', '<p>测试邮件能否正常发送</p>', 0, '2018-06-01 16:29:33');
INSERT INTO `ticket` VALUES (3, 1, '邮件发送测试', '<p>测试邮件</p>', 1, '2018-06-01 16:36:55');
INSERT INTO `ticket` VALUES (4, 1, '服务单邮件通知', '<p>测试</p>', 0, '2018-06-02 01:08:17');
INSERT INTO `ticket` VALUES (5, 1, 'Paper notification delay of IEEE BigMM 2018', '<p>Dear Xinming Zhang,\n \nThanks for submitting to IEEE BigMM 2018!\n \nDue to a problem with CMT, which took more than one week to fix, we decided to extend the paper notification due from 1st June to 10th June. \n \nThank you for your patience and looking forward to seeing you at IEEE BigMM 2018 (Xi\'an, September 13-16).</p>\n\n<p>Best regards,</p>\n\n<p>BigMM 2018 TPC Chair</p>', 1, '2018-06-02 01:18:43');
INSERT INTO `ticket` VALUES (6, 10, '流量查询请求', '<p>开始测试功能</p>', 2, '2018-06-02 14:48:16');
INSERT INTO `ticket` VALUES (7, 9, '11', '<p>111</p>', 2, '2018-06-02 14:50:59');
COMMIT;

-- ----------------------------
-- Table structure for ticket_reply
-- ----------------------------
DROP TABLE IF EXISTS `ticket_reply`;
CREATE TABLE `ticket_reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL DEFAULT '0' COMMENT '工单ID',
  `user_id` int(11) NOT NULL COMMENT '回复人ID',
  `content` text NOT NULL COMMENT '回复内容',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ticket_reply
-- ----------------------------
BEGIN;
INSERT INTO `ticket_reply` VALUES (1, 5, 1, '<p>测试工单回复提醒信息</p>', '2018-06-02 09:51:18');
INSERT INTO `ticket_reply` VALUES (2, 5, 1, '<p>asdf</p>', '2018-06-02 09:53:03');
INSERT INTO `ticket_reply` VALUES (3, 5, 1, '<p>再次回复测试</p>', '2018-06-02 09:57:01');
INSERT INTO `ticket_reply` VALUES (4, 3, 1, '<p>你是收件人，应该有额可以收到邮件</p>', '2018-06-02 12:25:08');
INSERT INTO `ticket_reply` VALUES (5, 6, 1, '<p>你的流量在主页查询</p>', '2018-06-02 14:51:43');
INSERT INTO `ticket_reply` VALUES (6, 6, 10, '<p>好的，谢谢</p>', '2018-06-02 14:52:28');
INSERT INTO `ticket_reply` VALUES (7, 7, 1, '<p>已收到您的工单请求</p>', '2018-06-02 14:56:36');
INSERT INTO `ticket_reply` VALUES (8, 2, 1, '<p>再给你发一等测试邮件能否正常发送</p>', '2018-06-03 21:06:18');
INSERT INTO `ticket_reply` VALUES (9, 2, 1, '<p>在册</p>', '2018-06-03 21:07:33');
INSERT INTO `ticket_reply` VALUES (10, 2, 1, '<p>aaaa</p>', '2018-06-03 21:10:13');
INSERT INTO `ticket_reply` VALUES (11, 2, 1, '<p>zaadadf</p>', '2018-06-03 21:12:15');
INSERT INTO `ticket_reply` VALUES (12, 2, 1, '<p>bbbbbbbbbbb</p>', '2018-06-03 21:13:23');
INSERT INTO `ticket_reply` VALUES (13, 2, 1, '<p>测试哈哈哈<br></p>', '2018-06-03 21:18:40');
INSERT INTO `ticket_reply` VALUES (14, 2, 1, '<p>在册测试env环境</p>', '2018-06-03 21:21:22');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `port` int(11) NOT NULL DEFAULT '0' COMMENT 'SS端口',
  `passwd` varchar(16) NOT NULL DEFAULT '' COMMENT 'SS密码',
  `transfer_enable` bigint(20) NOT NULL DEFAULT '1073741824000' COMMENT '可用流量，单位字节，默认1TiB',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '已上传流量，单位字节',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '已下载流量，单位字节',
  `t` int(11) NOT NULL DEFAULT '0' COMMENT '最后使用时间',
  `enable` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'SS状态',
  `method` varchar(30) NOT NULL DEFAULT 'aes-192-ctr' COMMENT '加密方式',
  `custom_method` varchar(30) DEFAULT 'aes-192-ctr' COMMENT '自定义加密方式',
  `protocol` varchar(30) NOT NULL DEFAULT 'auth_chain_a' COMMENT '协议',
  `protocol_param` varchar(255) DEFAULT '' COMMENT '协议参数',
  `obfs` varchar(30) NOT NULL DEFAULT 'tls1.2_ticket_auth' COMMENT '混淆',
  `obfs_param` varchar(255) DEFAULT '' COMMENT '混淆参数',
  `speed_limit_per_con` int(255) NOT NULL DEFAULT '204800' COMMENT '单连接限速，默认200M，单位KB',
  `speed_limit_per_user` int(255) NOT NULL DEFAULT '204800' COMMENT '单用户限速，默认200M，单位KB',
  `gender` tinyint(4) NOT NULL DEFAULT '1' COMMENT '性别：0-女、1-男',
  `wechat` varchar(30) DEFAULT '' COMMENT '微信',
  `qq` varchar(20) DEFAULT '' COMMENT 'QQ',
  `usage` tinyint(4) NOT NULL DEFAULT '4' COMMENT '用途：1-手机、2-电脑、3-路由器、4-其他',
  `pay_way` tinyint(4) NOT NULL DEFAULT '0' COMMENT '付费方式：0-免费、1-月付、2-半年付、3-年付',
  `balance` int(11) NOT NULL DEFAULT '0' COMMENT '余额，单位分',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `enable_time` date DEFAULT NULL COMMENT '开通日期',
  `expire_time` date NOT NULL DEFAULT '2099-01-01' COMMENT '过期时间',
  `ban_time` int(11) NOT NULL DEFAULT '0' COMMENT '封禁到期时间',
  `remark` text COMMENT '备注',
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '等级：可定义名称',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否管理员：0-否、1-是',
  `reg_ip` varchar(20) NOT NULL DEFAULT '127.0.0.1' COMMENT '注册IP',
  `last_login` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `referral_uid` int(11) NOT NULL DEFAULT '0' COMMENT '邀请人',
  `traffic_reset_day` tinyint(4) NOT NULL DEFAULT '0' COMMENT '流量自动重置日，0表示不重置',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：-1-禁用、0-未激活、1-正常',
  `remember_token` varchar(256) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `port` (`port`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'izhangxm@foxmail.com', '89ac8933ea8e2e5b21ce4a88681ba83c', 10000, 'ParFCe', 512174850048, 0, 0, 1528250915, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', NULL, 'tls1.2_ticket_auth', NULL, 204800, 204800, 1, 'A991671006', '991671006', 1, 3, 999800, 697, '2018-05-25', '2019-06-07', 0, '', 7, 1, '127.0.0.1', 1528261660, 0, 7, 1, 'CpzzR5VD8MTx4gBEuSEm', NULL, '2018-06-07 01:46:45');
INSERT INTO `user` VALUES (9, '1358384211@qq.com', '73f0596f4835ee5f2da16b3883cbe807', 10001, 'ptJMjW', 1610612736, 0, 0, 0, 0, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 96, '2018-06-02', '2018-06-03', 0, NULL, 1, 0, '123.126.70.239', 1527923620, 1, 0, 1, '', '2018-06-02 14:42:32', '2018-06-03 14:50:02');
INSERT INTO `user` VALUES (10, '690141808@qq.com', '708096676661d686967c22a40f4a6ddc', 10002, 'agcANa', 2684354560, 10508921, 185257388, 1527954515, 0, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 85, '2018-06-02', '2018-06-03', 0, NULL, 1, 0, '123.126.70.238', 1527924378, 1, 0, 1, '7Uxv5ZabDjEm3Vzt3HKa', '2018-06-02 14:42:52', '2018-06-03 14:50:02');
INSERT INTO `user` VALUES (11, 'shjzly@sina.cn', '708096676661d686967c22a40f4a6ddc', 10003, 'W778mT', 33822867456, 325434, 3357717, 1528249955, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 60, '2018-06-02', '2018-09-07', 0, NULL, 1, 0, '123.126.70.238', 1527924473, 10, 5, 1, '4xtptr8DrPfjSYMQE3VD', '2018-06-02 15:21:44', '2018-06-05 21:20:29');
INSERT INTO `user` VALUES (12, '364975573@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 10004, '5UF9gU', 8053063680, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', NULL, 'tls1.2_ticket_auth', NULL, 204800, 204800, 1, NULL, NULL, 4, 0, 0, 26, '2018-06-05', '2018-06-08', 0, '', 1, 1, '211.82.112.197', 1528251003, 0, 0, 1, '5trc4Rap9EcjRNZzmmAT', '2018-06-05 21:08:18', '2018-06-06 10:10:03');
INSERT INTO `user` VALUES (13, 'lq_mail0@sina.com', 'c6239b4394a828a8bb3cee985cda3221', 10005, '8e4KVu', 2684354560, 0, 0, 0, 0, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 16, '2018-06-05', '2018-06-06', 0, NULL, 1, 0, '221.192.179.150', 1528209290, 1, 0, 1, 'FB4mDJNv7ta7bD5A6VKz', '2018-06-05 22:09:43', '2018-06-06 00:00:03');
INSERT INTO `user` VALUES (14, '335098278@qq.com', '7c5ab178abe41da45d5cc1e2bdf323fb', 10006, 'k4RA8A', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 0, '2018-06-05', '2018-06-12', 0, NULL, 1, 0, '106.37.216.128', 0, 1, 0, 1, '', '2018-06-05 22:11:17', '2018-06-05 22:14:29');
INSERT INTO `user` VALUES (15, 'dyb9714@sina.com', '7c5ab178abe41da45d5cc1e2bdf323fb', 10007, 'bwSbJA', 536870912, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 53, '2018-06-05', '2018-06-12', 0, NULL, 1, 0, '106.37.216.176', 1528208708, 0, 0, 1, '', '2018-06-05 22:23:10', '2018-06-05 22:25:08');
INSERT INTO `user` VALUES (16, 'classics_dev@126.com', '3838b02b2a12078b296ba00a8f1c1e5c', 10008, 'HBUqgt', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 60, '2018-06-05', '2018-06-12', 0, NULL, 1, 0, '221.220.232.82', 1528210620, 1, 0, 1, 'ykdJz2ay66rzkMmJ6naN', '2018-06-05 22:54:11', '2018-06-05 22:57:00');
INSERT INTO `user` VALUES (17, 'toto@gmail.com', '25d55ad283aa400af464c76d713c07ad', 10009, 'uJ4ZiY', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 0, '2018-06-05', '2018-06-12', 0, NULL, 1, 0, '223.72.70.160', 0, 12, 0, 0, '', '2018-06-05 23:50:53', '2018-06-05 23:50:53');
INSERT INTO `user` VALUES (18, '987234234@163.com', '81dc9bdb52d04dc20036dbd8313ed055', 10010, 'k3iEyD', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 0, '2018-06-05', '2018-06-12', 0, NULL, 1, 0, '111.205.218.81', 0, 12, 0, 0, '', '2018-06-05 23:53:22', '2018-06-05 23:53:22');
INSERT INTO `user` VALUES (19, '1364496555@qq.com', '9ac950820e4cd13ea9204fca51e8c4eb', 10011, 'CkuWBb', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 42, '2018-06-06', '2018-06-13', 0, NULL, 1, 0, '117.136.92.13', 1528214538, 12, 0, 1, '', '2018-06-06 00:01:05', '2018-06-06 00:02:18');
INSERT INTO `user` VALUES (20, '2517069503@qq.com', '4607e782c4d86fd5364d7e4508bb10d9', 10012, 'ahPEiq', 2684354560, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 63, '2018-06-06', '2018-06-08', 0, NULL, 1, 0, '220.201.8.215', 1528215414, 12, 0, 1, 'eMGhmpNMMjywad7SVveA', '2018-06-06 00:13:09', '2018-06-06 00:19:52');
INSERT INTO `user` VALUES (21, 'sphvxunq@mail.bccto.me', '6eea9b7ef19179a06954edd0f6c05ceb', 10013, 'Ddb4QV', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 53, '2018-06-06', '2018-06-13', 0, NULL, 1, 0, '117.159.35.99', 1528218522, 1, 0, 1, '', '2018-06-06 01:07:56', '2018-06-06 01:08:42');
INSERT INTO `user` VALUES (22, 'dobio@foxmail.com', '773261b4669c3bd060b7b596b9518706', 10014, 'ZmXif6', 536870912, 225365, 6609893, 1528249895, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 63, '2018-06-06', '2018-06-13', 0, NULL, 1, 0, '116.7.245.181', 1528248843, 0, 0, 1, '2ZfHFgnPQpvNizjmcC6y', '2018-06-06 09:10:26', '2018-06-06 09:34:03');
INSERT INTO `user` VALUES (23, '313319854@qq.com', '6ad15394c2cf04a5bc454f4c27e21e7d', 10015, 'GckNrC', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 32, '2018-06-06', '2018-06-13', 0, NULL, 1, 0, '112.97.63.84', 1528248677, 12, 0, 1, 'VieMKbvAFFdgE57aEYPf', '2018-06-06 09:29:36', '2018-06-06 09:31:17');
INSERT INTO `user` VALUES (24, '644992741@qq.com', 'aedc13ae4f6569c7c9d59a803ef46156', 10016, 'BGDTtS', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 31, '2018-06-06', '2018-06-13', 0, NULL, 1, 0, '221.2.162.93', 1528250808, 12, 0, 1, 'jE5Q6GtW8Pzev928MBy9', '2018-06-06 09:56:20', '2018-06-06 10:06:48');
INSERT INTO `user` VALUES (25, '1114514915@qq.com', '3b2da514af296dfd9732338425e7e541', 10017, 'Eq4D7a', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 71, '2018-06-06', '2018-06-13', 0, NULL, 1, 0, '223.99.220.196', 1528250739, 12, 0, 1, 'TYVzi3n3aBAHKqq273Ft', '2018-06-06 09:56:55', '2018-06-06 10:05:39');
INSERT INTO `user` VALUES (26, '776183159@qq.com', 'c52c45cd302a6a3cb65e3d485850d5cf', 10018, 'TSfTaP', 1610612736, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 0, 0, '2018-06-06', '2018-06-13', 0, NULL, 1, 0, '111.226.6.150', 0, 12, 0, 0, '', '2018-06-06 10:19:18', '2018-06-06 10:19:18');
INSERT INTO `user` VALUES (27, 'test1@123.com', '89ac8933ea8e2e5b21ce4a88681ba83c', 10019, 'PYsniV', 2684354560, 0, 0, 0, 1, 'aes-192-ctr', 'aes-192-ctr', 'auth_chain_a', '', 'tls1.2_ticket_auth', '', 204800, 204800, 1, '', '', 4, 0, 9600, 65, '2018-06-06', '2018-06-13', 0, NULL, 1, 0, '127.0.0.1', 1528261815, 0, 0, 1, 'zZ7tQvyQavBH97eGkdgh', '2018-06-06 13:10:10', '2018-06-06 13:18:20');
COMMIT;

-- ----------------------------
-- Table structure for user_balance_log
-- ----------------------------
DROP TABLE IF EXISTS `user_balance_log`;
CREATE TABLE `user_balance_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '账号ID',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `before` int(11) NOT NULL DEFAULT '0' COMMENT '发生前余额，单位分',
  `after` int(11) NOT NULL DEFAULT '0' COMMENT '发生后金额，单位分',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '发生金额，单位分',
  `desc` varchar(255) DEFAULT '' COMMENT '操作描述',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_balance_log
-- ----------------------------
BEGIN;
INSERT INTO `user_balance_log` VALUES (19, 1, 27, 63600, 51600, -12000, '购买服务：年费超级会员', '2018-06-01 16:28:07');
INSERT INTO `user_balance_log` VALUES (20, 1, 36, 51600, 51400, -200, '购买服务：1GB流量两天体验包', '2018-06-06 10:26:15');
INSERT INTO `user_balance_log` VALUES (21, 27, 0, 0, 10000, 10000, '用户手动充值 - [充值券：BRCCMM5]', '2018-06-06 13:11:12');
INSERT INTO `user_balance_log` VALUES (22, 27, 37, 10000, 9800, -200, '购买服务：1GB流量两天体验包', '2018-06-06 13:12:50');
INSERT INTO `user_balance_log` VALUES (23, 27, 38, 9800, 9600, -200, '购买服务：1GB流量日包测试', '2018-06-06 13:18:16');
INSERT INTO `user_balance_log` VALUES (24, 1, 40, 51400, 38500, -12900, '购买服务：超值包年超级会员', '2018-06-06 18:44:44');
INSERT INTO `user_balance_log` VALUES (25, 1, 41, 38500, 25600, -12900, '购买服务：超值包年超级会员', '2018-06-06 18:48:33');
INSERT INTO `user_balance_log` VALUES (26, 1, 42, 25600, 12700, -12900, '购买服务：超值包年超级会员', '2018-06-06 19:49:57');
INSERT INTO `user_balance_log` VALUES (27, 1, 0, 12700, 1012700, 1000000, '后台手动充值', '2018-06-07 01:46:33');
INSERT INTO `user_balance_log` VALUES (28, 1, 43, 1012700, 999800, -12900, '购买服务：超值包年超级会员', '2018-06-07 01:46:45');
COMMIT;

-- ----------------------------
-- Table structure for user_ban_log
-- ----------------------------
DROP TABLE IF EXISTS `user_ban_log`;
CREATE TABLE `user_ban_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `minutes` int(11) NOT NULL DEFAULT '0' COMMENT '封禁账号时长，单位分钟',
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '操作描述',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-未处理、1-已处理',
  `created_at` datetime DEFAULT NULL COMMENT ' 创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户封禁日志';

-- ----------------------------
-- Records of user_ban_log
-- ----------------------------
BEGIN;
INSERT INTO `user_ban_log` VALUES (1, 8, 0, '【自动封禁】-流量超限', 0, '2018-05-28 09:10:02', '2018-05-28 09:10:02');
COMMIT;

-- ----------------------------
-- Table structure for user_label
-- ----------------------------
DROP TABLE IF EXISTS `user_label`;
CREATE TABLE `user_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `label_id` int(11) NOT NULL DEFAULT '0' COMMENT '标签ID',
  PRIMARY KEY (`id`),
  KEY `idx` (`user_id`,`label_id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_label_id` (`label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户标签';

-- ----------------------------
-- Records of user_label
-- ----------------------------
BEGIN;
INSERT INTO `user_label` VALUES (189, 1, 1);
INSERT INTO `user_label` VALUES (190, 1, 1);
INSERT INTO `user_label` VALUES (191, 1, 1);
INSERT INTO `user_label` VALUES (192, 1, 1);
INSERT INTO `user_label` VALUES (193, 1, 1);
INSERT INTO `user_label` VALUES (199, 1, 1);
INSERT INTO `user_label` VALUES (194, 1, 2);
INSERT INTO `user_label` VALUES (195, 1, 2);
INSERT INTO `user_label` VALUES (196, 1, 2);
INSERT INTO `user_label` VALUES (197, 1, 2);
INSERT INTO `user_label` VALUES (200, 1, 2);
INSERT INTO `user_label` VALUES (198, 1, 3);
INSERT INTO `user_label` VALUES (125, 9, 2);
INSERT INTO `user_label` VALUES (126, 9, 3);
INSERT INTO `user_label` VALUES (123, 10, 2);
INSERT INTO `user_label` VALUES (124, 10, 3);
INSERT INTO `user_label` VALUES (130, 11, 1);
INSERT INTO `user_label` VALUES (128, 11, 2);
INSERT INTO `user_label` VALUES (129, 11, 3);
INSERT INTO `user_label` VALUES (147, 12, 1);
INSERT INTO `user_label` VALUES (148, 12, 1);
INSERT INTO `user_label` VALUES (149, 12, 1);
INSERT INTO `user_label` VALUES (137, 13, 1);
INSERT INTO `user_label` VALUES (138, 13, 1);
INSERT INTO `user_label` VALUES (133, 14, 1);
INSERT INTO `user_label` VALUES (136, 15, 1);
INSERT INTO `user_label` VALUES (139, 16, 1);
INSERT INTO `user_label` VALUES (140, 17, 1);
INSERT INTO `user_label` VALUES (141, 18, 1);
INSERT INTO `user_label` VALUES (142, 19, 1);
INSERT INTO `user_label` VALUES (144, 20, 1);
INSERT INTO `user_label` VALUES (145, 20, 1);
INSERT INTO `user_label` VALUES (146, 21, 1);
INSERT INTO `user_label` VALUES (150, 22, 1);
INSERT INTO `user_label` VALUES (151, 23, 1);
INSERT INTO `user_label` VALUES (152, 24, 1);
INSERT INTO `user_label` VALUES (153, 25, 1);
INSERT INTO `user_label` VALUES (154, 26, 1);
INSERT INTO `user_label` VALUES (162, 27, 1);
INSERT INTO `user_label` VALUES (163, 27, 1);
INSERT INTO `user_label` VALUES (164, 27, 1);
COMMIT;

-- ----------------------------
-- Table structure for user_score_log
-- ----------------------------
DROP TABLE IF EXISTS `user_score_log`;
CREATE TABLE `user_score_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '账号ID',
  `before` int(11) NOT NULL DEFAULT '0' COMMENT '发生前积分',
  `after` int(11) NOT NULL DEFAULT '0' COMMENT '发生后积分',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '发生积分',
  `desc` varchar(50) DEFAULT '' COMMENT '描述',
  `created_at` datetime DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  KEY `idx` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for user_subscribe
-- ----------------------------
DROP TABLE IF EXISTS `user_subscribe`;
CREATE TABLE `user_subscribe` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `code` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '' COMMENT '订阅地址唯一识别码',
  `times` int(11) NOT NULL DEFAULT '0' COMMENT '地址请求次数',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0-禁用、1-启用',
  `ban_time` int(11) NOT NULL DEFAULT '0' COMMENT '封禁时间',
  `ban_desc` varchar(50) NOT NULL DEFAULT '' COMMENT '封禁理由',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_subscribe
-- ----------------------------
BEGIN;
INSERT INTO `user_subscribe` VALUES (1, 1, 'G3diu', 21, 1, 0, '', '2018-05-25 15:53:43', '2018-06-05 20:11:12');
INSERT INTO `user_subscribe` VALUES (2, 10, 'pceDq', 1, 1, 0, '', '2018-06-02 14:45:30', '2018-06-02 14:46:14');
INSERT INTO `user_subscribe` VALUES (3, 9, 'AYjna', 0, 1, 0, '', '2018-06-02 15:08:14', '2018-06-02 15:08:14');
INSERT INTO `user_subscribe` VALUES (4, 12, 'SjShc', 1, 1, 0, '', '2018-06-05 21:12:07', '2018-06-06 07:58:58');
INSERT INTO `user_subscribe` VALUES (5, 11, '83Qzw', 0, 1, 0, '', '2018-06-05 21:18:15', '2018-06-05 21:18:15');
INSERT INTO `user_subscribe` VALUES (6, 13, 'zm7We', 0, 1, 0, '', '2018-06-05 22:12:11', '2018-06-05 22:12:11');
INSERT INTO `user_subscribe` VALUES (7, 15, '8NiKA', 0, 1, 0, '', '2018-06-05 22:26:39', '2018-06-05 22:26:39');
INSERT INTO `user_subscribe` VALUES (8, 20, 'yXAnX', 0, 1, 0, '', '2018-06-06 00:17:05', '2018-06-06 00:17:05');
INSERT INTO `user_subscribe` VALUES (9, 21, 'Xfsx4', 0, 1, 0, '', '2018-06-06 01:08:57', '2018-06-06 01:08:57');
INSERT INTO `user_subscribe` VALUES (10, 22, '83FGn', 6, 1, 0, '', '2018-06-06 09:11:22', '2018-06-06 09:45:00');
INSERT INTO `user_subscribe` VALUES (11, 23, '2sTtR', 0, 1, 0, '', '2018-06-06 09:33:18', '2018-06-06 09:33:18');
INSERT INTO `user_subscribe` VALUES (12, 25, '8fret', 0, 1, 0, '', '2018-06-06 09:58:49', '2018-06-06 09:58:49');
INSERT INTO `user_subscribe` VALUES (13, 24, 'j9F7F', 0, 1, 0, '', '2018-06-06 09:59:36', '2018-06-06 09:59:36');
INSERT INTO `user_subscribe` VALUES (14, 27, '7fDgW', 0, 1, 0, '', '2018-06-06 13:10:18', '2018-06-06 13:10:18');
COMMIT;

-- ----------------------------
-- Table structure for user_subscribe_log
-- ----------------------------
DROP TABLE IF EXISTS `user_subscribe_log`;
CREATE TABLE `user_subscribe_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL COMMENT '对应user_subscribe的id',
  `request_ip` varchar(20) DEFAULT NULL COMMENT '请求IP',
  `request_time` datetime DEFAULT NULL COMMENT '请求时间',
  `request_header` text COMMENT '请求头部信息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_subscribe_log
-- ----------------------------
BEGIN;
INSERT INTO `user_subscribe_log` VALUES (10, 1, '211.82.112.180', '2018-06-02 09:42:25', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 2\r\n');
INSERT INTO `user_subscribe_log` VALUES (11, 2, '123.126.70.238', '2018-06-02 14:46:14', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 2\r\n');
INSERT INTO `user_subscribe_log` VALUES (12, 1, '123.126.70.235', '2018-06-02 17:03:13', 'Accept:          */*\r\nAccept-Encoding: gzip, deflate\r\nAccept-Language: zh-cn\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nUser-Agent:      Shadowrocket/516 CFNetwork/897.15 Darwin/17.5.0\r\n');
INSERT INTO `user_subscribe_log` VALUES (13, 1, '123.126.70.235', '2018-06-02 17:07:59', 'Accept:          */*\r\nAccept-Encoding: gzip, deflate\r\nAccept-Language: zh-cn\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nUser-Agent:      Shadowrocket/516 CFNetwork/897.15 Darwin/17.5.0\r\n');
INSERT INTO `user_subscribe_log` VALUES (14, 1, '114.242.250.150', '2018-06-02 17:09:34', 'Accept:          */*\r\nAccept-Encoding: gzip, deflate\r\nAccept-Language: zh-cn\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nUser-Agent:      Shadowrocket/516 CFNetwork/897.15 Darwin/17.5.0\r\n');
INSERT INTO `user_subscribe_log` VALUES (15, 1, '123.126.70.238', '2018-06-02 17:21:50', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
INSERT INTO `user_subscribe_log` VALUES (16, 1, '123.126.70.238', '2018-06-02 17:26:16', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
INSERT INTO `user_subscribe_log` VALUES (17, 1, '123.126.70.238', '2018-06-02 18:07:14', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
INSERT INTO `user_subscribe_log` VALUES (18, 1, '123.126.70.238', '2018-06-02 19:48:11', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
INSERT INTO `user_subscribe_log` VALUES (19, 1, '123.126.70.238', '2018-06-02 20:02:51', 'Connection:     Keep-Alive\r\nContent-Length: \r\nContent-Type:   \r\nHost:           science.izhangxm.com\r\nUser-Agent:     Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.3319.102 Safari/537.36\r\n');
INSERT INTO `user_subscribe_log` VALUES (20, 1, '114.242.250.150', '2018-06-03 17:15:21', 'Accept:          */*\r\nAccept-Encoding: gzip, deflate\r\nAccept-Language: zh-cn\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nUser-Agent:      Shadowrocket/516 CFNetwork/897.15 Darwin/17.5.0\r\n');
INSERT INTO `user_subscribe_log` VALUES (21, 1, '123.126.70.238', '2018-06-05 12:14:18', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
INSERT INTO `user_subscribe_log` VALUES (22, 1, '123.126.70.238', '2018-06-05 20:11:12', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
INSERT INTO `user_subscribe_log` VALUES (23, 4, '149.28.37.249', '2018-06-06 07:58:58', 'Content-Length: \r\nContent-Type:   \r\nHost:           science.izhangxm.com\r\nUser-Agent:     Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.3319.102 Safari/537.36\r\n');
INSERT INTO `user_subscribe_log` VALUES (24, 10, '116.7.245.181', '2018-06-06 09:15:35', 'Connection:     Keep-Alive\r\nContent-Length: \r\nContent-Type:   \r\nHost:           science.izhangxm.com\r\nUser-Agent:     Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.3319.102 Safari/537.36\r\n');
INSERT INTO `user_subscribe_log` VALUES (25, 10, '67.218.155.138', '2018-06-06 09:21:28', 'Content-Length: \r\nContent-Type:   \r\nHost:           science.izhangxm.com\r\nUser-Agent:     Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.3319.102 Safari/537.36\r\n');
INSERT INTO `user_subscribe_log` VALUES (26, 10, '116.7.245.181', '2018-06-06 09:24:55', 'Connection:     Keep-Alive\r\nContent-Length: \r\nContent-Type:   \r\nHost:           science.izhangxm.com\r\nUser-Agent:     Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.3319.102 Safari/537.36\r\n');
INSERT INTO `user_subscribe_log` VALUES (27, 10, '116.7.245.181', '2018-06-06 09:36:51', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
INSERT INTO `user_subscribe_log` VALUES (28, 10, '116.7.245.181', '2018-06-06 09:38:51', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
INSERT INTO `user_subscribe_log` VALUES (29, 10, '116.7.245.181', '2018-06-06 09:45:00', 'Accept:          */*\r\nAccept-Encoding: gzip;q=1.0, compress;q=0.5\r\nAccept-Language: zh-Hans-CN;q=1.0, en-CN;q=0.9\r\nConnection:      keep-alive\r\nContent-Length:  \r\nContent-Type:    \r\nHost:            science.izhangxm.com\r\nToken:           \r\nUser-Agent:      ShadowsocksX-NG-R 1.4.3-R8 Version 3\r\n');
COMMIT;

-- ----------------------------
-- Table structure for user_traffic_daily
-- ----------------------------
DROP TABLE IF EXISTS `user_traffic_daily`;
CREATE TABLE `user_traffic_daily` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID，0表示统计全部节点',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `total` bigint(20) NOT NULL DEFAULT '0' COMMENT '总流量',
  `traffic` varchar(255) DEFAULT '' COMMENT '总流量（带单位）',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_user` (`user_id`) USING BTREE,
  KEY `idx_user_node` (`user_id`,`node_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for user_traffic_hourly
-- ----------------------------
DROP TABLE IF EXISTS `user_traffic_hourly`;
CREATE TABLE `user_traffic_hourly` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID，0表示统计全部节点',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `total` bigint(20) NOT NULL DEFAULT '0' COMMENT '总流量',
  `traffic` varchar(255) DEFAULT '' COMMENT '总流量（带单位）',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_user` (`user_id`) USING BTREE,
  KEY `idx_user_node` (`user_id`,`node_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1544 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for user_traffic_log
-- ----------------------------
DROP TABLE IF EXISTS `user_traffic_log`;
CREATE TABLE `user_traffic_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `u` int(11) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` int(11) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `rate` float NOT NULL COMMENT '流量比例',
  `traffic` varchar(32) NOT NULL COMMENT '产生流量',
  `log_time` int(11) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`),
  KEY `idx_user` (`user_id`),
  KEY `idx_node` (`node_id`),
  KEY `idx_user_node` (`user_id`,`node_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=715 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for verify
-- ----------------------------
DROP TABLE IF EXISTS `verify`;
CREATE TABLE `verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '校验token',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-未使用、1-已使用、2-已失效',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
