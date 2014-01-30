<?php

class m140130_153700_create_favorite extends \yii\db\Migration
{
    public function up()
    {
        $this->db->createCommand()->setSql(
            'CREATE TABLE `favorite` (
             `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
             `user_id` INT(11) UNSIGNED NOT NULL,
             `title_id` INT(11) NOT NULL,
             `channel_id` INT(11) DEFAULT NULL,
             `created_at` DATETIME NOT NULL,
             PRIMARY KEY (`id`),
             KEY `title_id` (`title_id`),
             KEY `channel_id` (`channel_id`),
             KEY `unique_user_title_channel` (`user_id`,`title_id`,`channel_id`),
             CONSTRAINT `favorite_ibfk_3` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
             CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
             CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`title_id`) REFERENCES `title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
           ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;'
        )->execute();
    }

    public function down()
    {
        $this->db->createCommand()->dropTable('favorite')->execute();
    }
}
