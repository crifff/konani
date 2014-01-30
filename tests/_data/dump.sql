/* Replace this file with actual dump of your database */
CREATE TABLE `channel` (
  `id`       INT(11) NOT NULL AUTO_INCREMENT,
  `group_id` INT(11) DEFAULT NULL,
  `name`     TEXT    NOT NULL,
  `url`      TEXT    NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =216
  DEFAULT CHARSET =utf8;

CREATE TABLE `title` (
  `id`              INT(11) NOT NULL AUTO_INCREMENT,
  `title`           TEXT    NOT NULL,
  `short_title`     TEXT,
  `category`        INT(11) DEFAULT NULL,
  `urls`            TEXT,
  `title_kana`      TEXT,
  `title_english`   TEXT,
  `comment`         TEXT,
  `title_flag`      INT(11) DEFAULT NULL,
  `first_year`      INT(11) DEFAULT NULL,
  `first_month`     INT(11) DEFAULT NULL,
  `first_end_year`  INT(11) DEFAULT NULL,
  `first_end_month` INT(11) DEFAULT NULL,
  `first_channel`   TEXT,
  `keywords`        TEXT,
  `sub_titles`      TEXT,
  PRIMARY KEY (`id`),
  KEY `first_year` (`first_year`),
  KEY `first_month` (`first_month`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =3301
  DEFAULT CHARSET =utf8;

CREATE TABLE `program` (
  `id`           INT(11)  NOT NULL AUTO_INCREMENT,
  `channel_id`   INT(11)  NOT NULL,
  `title_id`     INT(11)  NOT NULL,
  `count`        INT(11) DEFAULT NULL,
  `start_offset` INT(11) DEFAULT NULL,
  `start_time`   DATETIME NOT NULL,
  `end_time`     DATETIME NOT NULL,
  `last_update`  DATETIME NOT NULL,
  `sub_title`    TEXT,
  `flag`         INT(11)  NOT NULL,
  `deleted`      INT(11)  NOT NULL,
  `warn`         INT(11)  NOT NULL,
  `revision`     INT(11)  NOT NULL,
  `all_day`      INT(11)  NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_program_title_id` (`title_id`),
  KEY `fk_program_channel_id` (`channel_id`),
  CONSTRAINT `fk_program_channel_id` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_program_title_id` FOREIGN KEY (`title_id`) REFERENCES `title` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE =InnoDB
  AUTO_INCREMENT =287852
  DEFAULT CHARSET =utf8;

CREATE TABLE `user` (
  `id`         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username`   VARCHAR(128) DEFAULT NULL,
  `password`   VARCHAR(64) DEFAULT NULL,
  `auth_key`   VARCHAR(64) DEFAULT NULL,
  `twitter_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =2
  DEFAULT CHARSET =utf8;

CREATE TABLE `favorite` (
  `id`         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id`    INT(11) UNSIGNED NOT NULL,
  `title_id`   INT(11)          NOT NULL,
  `channel_id` INT(11) DEFAULT NULL,
  `created_at` DATETIME         NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title_id` (`title_id`),
  KEY `channel_id` (`channel_id`),
  KEY `unique_user_title_channel` (`user_id`, `title_id`, `channel_id`),
  CONSTRAINT `favorite_ibfk_3` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`title_id`) REFERENCES `title` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE =InnoDB
  AUTO_INCREMENT =16
  DEFAULT CHARSET =utf8;