<?php

class m140125_091908_create_program extends \yii\db\Migration
{
    public function up()
    {
        $this->db->createCommand()->setSql(
            'CREATE TABLE `program` (
             `id` INT(11) NOT NULL AUTO_INCREMENT,
             `channel_id` INT(11) NOT NULL,
             `title_id` INT(11) NOT NULL,
             `count` INT(11) DEFAULT NULL,
             `start_offset` INT(11) DEFAULT NULL,
             `start_time` DATETIME NOT NULL,
             `end_time` DATETIME NOT NULL,
             `last_update` DATETIME NOT NULL,
             `sub_title` TEXT,
             `flag` INT(11) NOT NULL,
             `deleted` INT(11) NOT NULL,
             `warn` INT(11) NOT NULL,
             `revision` INT(11) NOT NULL,
             `all_day` INT(11) NOT NULL,
             PRIMARY KEY (`id`),
             KEY `fk_program_title_id` (`title_id`),
             KEY `fk_program_channel_id` (`channel_id`),
             CONSTRAINT `fk_program_channel_id` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
             CONSTRAINT `fk_program_title_id` FOREIGN KEY (`title_id`) REFERENCES `title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
           ) ENGINE=InnoDB AUTO_INCREMENT=287852 DEFAULT CHARSET=utf8;'
        )->execute();
    }

    public function down()
    {
        $this->db->createCommand()->dropTable('program')->execute();
    }
}
