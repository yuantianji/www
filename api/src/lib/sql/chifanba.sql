CREATE DATABASE IF NOT EXISTS `chifanba` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `chifanba`;


CREATE TABLE IF NOT EXISTS `cookie_data` (
  `id` int(5) unsigned NOT NULL COMMENT '流水号',
  `open_id` text NOT NULL COMMENT 'cookie参数',
  `eleme_key` text NOT NULL COMMENT 'cookie参数',
  `track_id` text NOT NULL COMMENT 'cookie参数',
  `cookie` text NOT NULL COMMENT '完整cookie',
  `available` int(1) unsigned NOT NULL COMMENT '次数消耗状态',
  `timestamp` int(10) unsigned NOT NULL COMMENT '时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `fingerprint` (
  `identify` text COMMENT '用户唯一识别码',
  `phone` text COMMENT '手机号',
  `visits` int(2) unsigned DEFAULT NULL COMMENT '使用次数',
  `banned` int(1) unsigned DEFAULT NULL COMMENT '封禁状态',
  `timestamp` int(10) unsigned DEFAULT NULL COMMENT '时间戳'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '留言ID',
  `username` text NOT NULL COMMENT '留言人名称',
  `message` text NOT NULL COMMENT '留言内容',
  `userid` int(11) unsigned NOT NULL COMMENT '留言人ID',
  `timestamp` int(11) unsigned NOT NULL COMMENT '时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `record` (
  `id` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '事件id',
  `mailrecord` int(1) unsigned DEFAULT '0' COMMENT '事件状态',
  `timestamp` int(10) unsigned DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `messageid` int(10) unsigned NOT NULL COMMENT '对应messageid',
  `reply_id` int(10) unsigned NOT NULL COMMENT '回复人id',
  `replied_id` int(10) unsigned NOT NULL COMMENT '被回复人id',
  `reply_content` text NOT NULL COMMENT '回复内容',
  `timestamp` int(10) unsigned NOT NULL COMMENT '时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) unsigned NOT NULL COMMENT '用户唯一userid',
  `name` text NOT NULL COMMENT '用户名称',
  `names` int(11) unsigned DEFAULT '0' COMMENT '上一次修改名称时间',
  `account` text NOT NULL COMMENT '用户账号',
  `password` text NOT NULL COMMENT '用户密码',
  `qq` int(11) unsigned DEFAULT NULL COMMENT '用户QQ',
  `phone` bigint(11) unsigned DEFAULT NULL COMMENT '用户手机号',
  `phones` int(1) unsigned DEFAULT '0',
  `mail` text NOT NULL COMMENT '用户邮箱',
  `avatar` text COMMENT '用户头像',
  `integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户积分',
  `ele` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '饿了么使用权限',
  `meituan` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '美团使用权限',
  `frequency` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户总次数',
  `timestamp` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  `banned` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户封禁状态',
  `token` text NOT NULL COMMENT 'token',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
