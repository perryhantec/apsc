<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_type4}}`.
 */
class m211106_212052_create_page_type4_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_type4}}', [
            'id'                     => $this->primaryKey(),
            'MID'                    => $this->integer()->unsigned(),
            'seq'                    => $this->integer(),
            'title_tw'               => $this->string(),
            'title_cn'               => $this->string(),
            'title_en'               => $this->string(),
            'content_tw'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_cn'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_en'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'image_file_name'        => $this->text(),
            'status'                 => $this->tinyInteger()->defaultValue(1),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%page_type4}}', [
            'id',
            'MID',
            'seq',
            'title_tw',
            'title_cn',
            'title_en',
            'content_tw',
            'content_cn',
            'content_en',
            'image_file_name',
            'status',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            array('id' => '1','MID' => '11','seq' => '0','title_tw' => '','title_cn' => '','title_en' => 'Asia-Oceania Association for the Study of Obesity','content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);">The Asia-Oceania Association for the Study of Obesity was established in 1988.&nbsp; It aims to exchange information related to obesity in the Asia-Oceania Region.&nbsp; Its member countries include Australia, Hong Kong, India, Indonesia, Japan, Malaysia, New Zealand, The Philippines, Singapore, South Korea, Taiwan and Thailand.&nbsp; The biennial Asia-Oceania Conference on Obesity provides a platform to exchange information and experiences in obesity research and to keep abreast of the obesity problems in the Region.</p>

            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);"><a href="http://www.aoaso.org/" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;" target="_blank">http://www.aoaso.org/</a></p>
            ','image_file_name' => '/content/organizer/image/1.jpg?1672149591','status' => '1','created_at' => '2022-12-27 21:54:53','updated_at' => '2022-12-27 22:00:35','updated_UID' => '1'),
              array('id' => '2','MID' => '11','seq' => '1','title_tw' => '','title_cn' => '','title_en' => 'Hong Kong Obesity Society','content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);">Hong Kong Obesity Society was set up in April 2016 with the aims of raising awareness of obesity in Hong Kong, serving as a platform to connect doctors and allied health professionals involved in the management of obesity and obesity-related disorders, and serving as a bridge between the local and international professional communities in the field of obesity medicine.&nbsp;</p>
            
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);"><a href="http://www.hkobesity.org/" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;" target="_blank">http://www.hkobesity.org/</a></p>
            ','image_file_name' => '/content/organizer/image/2.jpg?1672149625','status' => '1','created_at' => '2022-12-27 22:00:25','updated_at' => '2022-12-27 22:00:35','updated_UID' => '1')
        ]);        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page_type4}}');
    }
}
