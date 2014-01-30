<?php

class m140125_091546_create_title extends \yii\db\Migration
{
    public function up()
    {
        $this->db->createCommand()->setSql(
            'CREATE TABLE `title` (
             `id` INT(11) NOT NULL AUTO_INCREMENT,
             `title` TEXT NOT NULL,
             `short_title` TEXT,
             `category` INT(11) DEFAULT NULL,
             `urls` TEXT,
             `title_kana` TEXT,
             `title_english` TEXT,
             `comment` TEXT,
             `title_flag` INT(11) DEFAULT NULL,
             `first_year` INT(11) DEFAULT NULL,
             `first_month` INT(11) DEFAULT NULL,
             `first_end_year` INT(11) DEFAULT NULL,
             `first_end_month` INT(11) DEFAULT NULL,
             `first_channel` TEXT,
             `keywords` TEXT,
             `sub_titles` TEXT,
             PRIMARY KEY (`id`),
             KEY `first_year` (`first_year`),
             KEY `first_month` (`first_month`)
           ) ENGINE=InnoDB AUTO_INCREMENT=3301 DEFAULT CHARSET=utf8;'
        )->execute();
    }

    public function down()
    {
        $this->db->createCommand()->dropTable('title')->execute();
    }
}
