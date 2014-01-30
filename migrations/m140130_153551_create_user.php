<?php

class m140130_153551_create_user extends \yii\db\Migration
{
    public function up()
    {
        $this->db->createCommand()->setSql(
            'CREATE TABLE `user` (
             `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
             `username` VARCHAR(128) DEFAULT NULL,
             `password` VARCHAR(64) DEFAULT NULL,
             `auth_key` VARCHAR(64) DEFAULT NULL,
             `twitter_id` INT(11) DEFAULT NULL,
             `image_url` TEXT DEFAULT NULL,
             PRIMARY KEY (`id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;'
        )->execute();
    }

    public function down()
    {
        $this->db->createCommand()->dropTable('user')->execute();
    }
}
