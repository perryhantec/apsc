<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%general}}`.
 */
class m211107_204232_create_general_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%general}}', [
            'id'                          => $this->primaryKey(),
            'web_name_tw'                 => $this->string(),
            'web_name_cn'                 => $this->string(),
            'web_name_en'                 => $this->string(),
            'description'                 => $this->text(),
            'keywords'                    => $this->text(),
            'banner_image_file_name'      => $this->string(),
            'copyright_tw'                => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'copyright_cn'                => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'copyright_en'                => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'call_for_abstract_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'call_for_abstract_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'call_for_abstract_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'registration_tw'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'registration_cn'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'registration_en'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'copyright_notice_tw'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'copyright_notice_cn'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'copyright_notice_en'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'disclaimer_tw'               => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'disclaimer_cn'               => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'disclaimer_en'               => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'privacy_statement_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'privacy_statement_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'privacy_statement_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'shop_empty_desc_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'shop_empty_desc_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'shop_empty_desc_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'delivery_fee'                => $this->float(),
            // 'delivery_fee_free_when'      => $this->float(),
            // 'site_counter'                => $this->integer(10),
            'created_at'                  => $this->dateTime().' DEFAULT NOW()',
            'updated_at'                  => $this->timestamp(),
            'updated_UID'                 => $this->integer(),
        ]);

        $this->batchInsert('{{%general}}', [
            'id',
            'web_name_tw',
            'web_name_cn',
            'web_name_en',
            'description',                 
            'keywords',
            'banner_image_file_name',
            'copyright_tw',
            'copyright_cn',
            'copyright_en',
            // 'call_for_abstract_tw',
            // 'call_for_abstract_cn',
            // 'call_for_abstract_en',
            'registration_tw',
            'registration_cn',
            'registration_en',

            // 'copyright_notice_tw',
            // 'copyright_notice_cn',
            // 'copyright_notice_en',
            // 'disclaimer_tw',
            // 'disclaimer_cn',
            // 'disclaimer_en',
            // 'privacy_statement_tw',
            // 'privacy_statement_cn',
            // 'privacy_statement_en',
            // 'shop_empty_desc_tw',
            // 'shop_empty_desc_cn',
            // 'shop_empty_desc_en',
            // 'delivery_fee',
            // 'delivery_fee_free_when',
            // 'site_counter',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            array('id' => '1','web_name_tw' => NULL,'web_name_cn' => NULL,'web_name_en' => 'AOCO 2023','description' => '','keywords' => '','banner_image_file_name' => '/apsc/content/title_banner/0.gif','copyright_tw' => NULL,'copyright_cn' => NULL,'copyright_en' => '<p><span style="font-family: Roboto, sans-serif; font-size: 16px; text-align: center;">&copy; APSC 2023. All Rights Reserved</span></p>
            ','registration_tw' => NULL,'registration_cn' => NULL,'registration_en' => '<p><span class="subheader1" style="font-family: &quot;Open Sans&quot;, sans-serif; box-sizing: border-box; font-size: 20px; font-weight: bold; color: rgb(0, 102, 204); padding-bottom: 10px; padding-top: 15px; display: inline-block;">Payment Method:</span><br style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; box-sizing: border-box;" />
                        <font color="#444444" face="Open Sans, sans-serif"><span style="font-size: 17.6px; background-color: rgb(255, 255, 255);">Paypal</span></font></p>
                        
                        <p><span class="subheader1" style="font-family: &quot;Open Sans&quot;, sans-serif; box-sizing: border-box; font-size: 20px; font-weight: bold; color: rgb(0, 102, 204); padding-bottom: 10px; padding-top: 15px; display: inline-block;">Registration Fee:</span><br style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; box-sizing: border-box;" />
                        <font color="#444444" face="Open Sans, sans-serif"><span style="font-size: 17.6px; background-color: rgb(255, 255, 255);">HKD $0.1</span></font></p>
            ','created_at' => '2021-11-08 20:34:22','updated_at' => '2023-02-22 22:25:02','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%general}}');
    }
}
