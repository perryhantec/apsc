<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m210519_103207_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu}}', [
            'id'                     => $this->primaryKey(),
            'type'                   => $this->integer()->unsigned(),
            'MID'                    => $this->integer()->unsigned(),
            'seq'                    => $this->integer(),
            'home_seq'               => $this->integer(),
            'url'                    => $this->string()->notNull(),
            'name_tw'                => $this->string(),
            'name_cn'                => $this->string(),
            'name_en'                => $this->string(),
            'page_type'              => $this->integer(),
            'link'                   => $this->text(),
            'link_target'            => $this->integer(1)->defaultValue(0),
            'banner_image_file_name' => $this->string(),
            'icon_file_name'         => $this->string(),
            'display_home'           => $this->integer()->defaultValue(0),
            'status'                 => $this->integer()->defaultValue(1),
            // 'show_after_login'       => $this->integer()->defaultValue(0),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%menu}}', [
            'id',
            'type',
            'MID',
            'seq',
            'home_seq',
            'url',
            'name_tw',
            'name_cn',
            'name_en',
            'page_type',
            'link',
            'link_target',
            'banner_image_file_name',
            'icon_file_name',
            'display_home',
            'status',
            // 'show_after_login',
            'created_at',
            'updated_at',
            'updated_UID'
        ], [
            // array('id' => '1','type' => '1','MID' => NULL,'seq' => '0','home_seq' => NULL,'url' => 'about-the-conference','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'About the Conference','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            // array('id' => '2','type' => '1','MID' => NULL,'seq' => '1','home_seq' => NULL,'url' => 'programme','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Programme','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            // array('id' => '3','type' => '1','MID' => NULL,'seq' => '2','home_seq' => NULL,'url' => 'call-for-abstract','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Call For Abstracts','page_type' => '0','link' => 'call-for-abstract','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            // array('id' => '4','type' => '1','MID' => NULL,'seq' => '3','home_seq' => NULL,'url' => 'registration','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Registration','page_type' => '0','link' => 'registration','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            // array('id' => '5','type' => '1','MID' => NULL,'seq' => '4','home_seq' => NULL,'url' => 'sponsorship','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Sponsorship','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            // array('id' => '6','type' => '1','MID' => NULL,'seq' => '5','home_seq' => NULL,'url' => 'about','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'About Hong Kong','page_type' => '2','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            // array('id' => '7','type' => '1','MID' => NULL,'seq' => '6','home_seq' => NULL,'url' => 'new','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'What\'s New','page_type' => '6','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '0','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            // array('id' => '8','type' => '1','MID' => NULL,'seq' => '7','home_seq' => NULL,'url' => 'important-dates','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Important Dates','page_type' => '6','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '0','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            // array('id' => '9','type' => '2','MID' => '1','seq' => '0','home_seq' => NULL,'url' => 'message','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Welcome Message','page_type' => '7','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 09:02:43','updated_at' => '2021-11-07 09:02:43','updated_UID' => '1'),
            // array('id' => '10','type' => '2','MID' => '1','seq' => '1','home_seq' => NULL,'url' => 'committees','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Committees','page_type' => '5','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 09:02:43','updated_at' => '2021-11-07 09:02:43','updated_UID' => '1'),
            // array('id' => '11','type' => '2','MID' => '1','seq' => '2','home_seq' => NULL,'url' => 'organizers','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'The Organizers','page_type' => '4','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 09:02:43','updated_at' => '2021-11-07 09:02:43','updated_UID' => '1'),
            // array('id' => '12','type' => '2','MID' => '1','seq' => '3','home_seq' => NULL,'url' => 'conference','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Conference Information','page_type' => '2','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 09:02:43','updated_at' => '2021-11-07 09:02:43','updated_UID' => '1'),

            array('id' => '1','type' => '1','MID' => NULL,'seq' => '0','home_seq' => NULL,'url' => 'about-the-conference','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'About the Conference','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            array('id' => '2','type' => '1','MID' => NULL,'seq' => '1','home_seq' => NULL,'url' => 'programme-title','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Programme','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            array('id' => '3','type' => '1','MID' => NULL,'seq' => '2','home_seq' => NULL,'url' => 'call-for-abstracts','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Call for Abstracts','page_type' => '0','link' => 'call-for-abstract','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            array('id' => '4','type' => '1','MID' => NULL,'seq' => '3','home_seq' => NULL,'url' => 'registration','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Registration','page_type' => '0','link' => 'registration','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            array('id' => '5','type' => '1','MID' => NULL,'seq' => '4','home_seq' => NULL,'url' => 'sponsorship','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Sponsorship','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            array('id' => '6','type' => '1','MID' => NULL,'seq' => '5','home_seq' => NULL,'url' => 'about','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'About Hong Kong','page_type' => '2','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            array('id' => '7','type' => '1','MID' => NULL,'seq' => '6','home_seq' => NULL,'url' => 'new','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'What\'s New','page_type' => '6','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '0','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            array('id' => '8','type' => '1','MID' => NULL,'seq' => '7','home_seq' => NULL,'url' => 'important-dates','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Important Dates','page_type' => '6','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '0','created_at' => '2021-11-07 15:40:56','updated_at' => '2021-11-07 15:40:56','updated_UID' => '1'),
            array('id' => '9','type' => '2','MID' => '1','seq' => '0','home_seq' => NULL,'url' => 'message','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Welcome Message','page_type' => '7','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 09:02:43','updated_at' => '2023-02-13 21:30:22','updated_UID' => '1'),
            array('id' => '10','type' => '2','MID' => '1','seq' => '1','home_seq' => NULL,'url' => 'committees','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Committees','page_type' => '5','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 09:02:43','updated_at' => '2023-02-13 21:30:22','updated_UID' => '1'),
            array('id' => '11','type' => '2','MID' => '1','seq' => '2','home_seq' => NULL,'url' => 'organizers','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'The Organizers','page_type' => '4','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 09:02:43','updated_at' => '2023-02-13 21:30:22','updated_UID' => '1'),
            array('id' => '12','type' => '2','MID' => '1','seq' => '3','home_seq' => NULL,'url' => 'conference','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Conference Information','page_type' => '2','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2021-11-07 09:02:43','updated_at' => '2023-02-13 21:30:22','updated_UID' => '1'),
            array('id' => '13','type' => '2','MID' => '1','seq' => '4','home_seq' => NULL,'url' => 'accommodation','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Accommodation','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2023-02-13 21:30:13','updated_at' => '2023-02-13 21:30:22','updated_UID' => '1'),
            array('id' => '14','type' => '2','MID' => '2','seq' => '1','home_seq' => NULL,'url' => 'speaker-information','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Speaker Information','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2023-02-13 21:32:36','updated_at' => '2023-02-13 21:35:25','updated_UID' => '1'),
            array('id' => '15','type' => '2','MID' => '2','seq' => '0','home_seq' => NULL,'url' => 'old-programme','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Programme (Old)','page_type' => '1','link' => '','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '0','status' => '0','created_at' => '2023-02-13 21:34:54','updated_at' => '2023-02-13 21:35:25','updated_UID' => '1'),
            array('id' => '16','type' => '2','MID' => '2','seq' => '0','home_seq' => NULL,'url' => 'programme','name_tw' => NULL,'name_cn' => NULL,'name_en' => 'Programme','page_type' => '0','link' => 'programme','link_target' => '0','banner_image_file_name' => '','icon_file_name' => '','display_home' => '1','status' => '1','created_at' => '2023-02-13 21:34:54','updated_at' => '2023-02-13 21:35:25','updated_UID' => '1'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}
