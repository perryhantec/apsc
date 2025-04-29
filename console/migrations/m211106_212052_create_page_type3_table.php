<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_type3}}`.
 */
class m211106_212052_create_page_type3_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_type3}}', [
            'id'                     => $this->primaryKey(),
            'MID'                    => $this->integer()->unsigned(),
            'display_at'             => $this->date()->notNull(),
            'content_tw'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_cn'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_en'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'status'                 => $this->tinyInteger()->defaultValue(1),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%page_type3}}', [
            'id',
            'MID',
            'display_at',
            'content_tw',
            'content_cn',
            'content_en',
            'status',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            // array('id' => '1','MID' => '7','display_at' => '2022-10-24','content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p><span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">Abstract submission portal is open.</span><br style="box-sizing: border-box; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);" />
            // <span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">Please click&nbsp;</span><a href="https://aoco2023hk.org/call_for_abstracts.html" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: rgb(255, 255, 255); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;"><span style="box-sizing: border-box; font-weight: bolder;">here</span></a><span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">&nbsp;to submit your abstract.</span></p>
            // ','status' => '1','created_at' => '2022-12-27 21:06:03','updated_at' => '2022-12-27 21:06:03','updated_UID' => '1'),
        ]);        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page_type3}}');
    }
}
