<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%home}}`.
 */
class m211107_205802_create_home_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%home}}', [
            'id'                     => $this->primaryKey(),
            'body_text_1'            => $this->string(),
            'body_text_2'            => $this->string(),
            'body_text_3'            => $this->string(),
            'body_text_4'            => $this->string(),
            'body_text_5'            => $this->string(),
            'image_file_name_1'      => $this->string(),
            'image_file_name_2'      => $this->string(),
            'image_file_name_3'      => $this->string(),
            'image_file_name_4'      => $this->string(),
            'image_file_name_5'      => $this->string(),
            'show_menu_1'            => $this->integer(),
            'show_limit_1'           => $this->tinyInteger(),
            'show_menu_2'            => $this->integer(),
            'show_limit_2'           => $this->tinyInteger(),
            'show_menu_3'            => $this->integer(),
            'content_tw'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_cn'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_en'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'org_text_1'             => $this->string(),
            'org_text_2'             => $this->string(),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%home}}', [
            'id',
            'body_text_1',
            'body_text_2',
            'body_text_3',
            'body_text_4',
            'body_text_5',
            'image_file_name_1',
            'image_file_name_2',
            'image_file_name_3',
            'image_file_name_4',
            'image_file_name_5',
            'show_menu_1',
            'show_limit_1',
            'show_menu_2',
            'show_limit_2',
            'show_menu_3',
            'content_tw',
            'content_cn',
            'content_en',
            'org_text_1',
            'org_text_2',
            'created_at',
            'updated_at',
            'updated_UID'
        ], [
            array('id' => '1','body_text_1' => 'Asia Pacific Stroke Conference 2023','body_text_2' => 'in conjunction with','body_text_3' => 'Annual Scientific Meeting 2023 of the Hong Kong Stroke Society','body_text_4' => '24 - 26 November 2023 (Fri - Sun)','body_text_5' => 'Advancing stroke care in times of change','image_file_name_1' => '/apsc/content/title_banner/1.png','image_file_name_2' => '/apsc/content/title_banner/2.jpg','image_file_name_3' => '/apsc/content/title_banner/3.jpg','image_file_name_4' => '/apsc/content/title_banner/4.png','image_file_name_5' => '/apsc/content/title_banner/5.png','show_menu_1' => '7','show_limit_1' => '2','show_menu_2' => '8','show_limit_2' => '2','show_menu_3' => '5','content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.9rem;">The Asia Pacific Stroke Conference 2023 will take place in Hong Kong on 24 to 26 November 2023. It will be the first full physical meeting since the COVID pandemic hit the world.</p>

            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.9rem;">The meeting will take place at the Hong Kong Science and Technology Parks.</p>
            ','org_text_1' => 'Asia Pacific Stroke Organisation','org_text_2' => 'Hong Kong Stroke Society','created_at' => '2022-12-28 18:00:26','updated_at' => '2023-03-02 01:23:23','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%home}}');
    }
}
