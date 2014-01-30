<?php

class m140125_091903_create_channel extends \yii\db\Migration
{
    public function up()
    {
        $this->db->createCommand()->setSql(
            'CREATE TABLE `channel` (
             `id` INT(11) NOT NULL AUTO_INCREMENT,
             `group_id` INT(11) DEFAULT NULL,
             `name` TEXT NOT NULL,
             `url` TEXT NOT NULL,
             PRIMARY KEY (`id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8;'
        )->execute();

    }

    public function down()
    {
        $this->db->createCommand()->dropTable('channel')->execute();
    }
}
