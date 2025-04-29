<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_type6}}`.
 */
class m211106_212052_create_page_type6_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_type6}}', [
            'id'                     => $this->primaryKey(),
            'MID'                    => $this->integer()->unsigned(),
            'display_at'             => $this->date()->notNull(),
            'title_tw'               => $this->string(),
            'title_cn'               => $this->string(),
            'title_en'               => $this->string(),
            'status'                 => $this->tinyInteger()->defaultValue(1),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%page_type6}}', [
            'id',
            'MID',
            'display_at',
            'title_tw',
            'title_cn',
            'title_en',
            'status',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            array('id' => '1','MID' => '8','display_at' => '2022-12-31','title_tw' => NULL,'title_cn' => NULL,'title_en' => 'Registration opens','status' => '1','created_at' => '2022-12-28 17:23:31','updated_at' => '2022-12-28 17:25:47','updated_UID' => '1'),
            array('id' => '2','MID' => '8','display_at' => '2023-03-31','title_tw' => NULL,'title_cn' => NULL,'title_en' => 'Abstract submission deadline','status' => '1','created_at' => '2022-12-28 17:23:50','updated_at' => '2022-12-28 17:23:50','updated_UID' => '1'),
            array('id' => '3','MID' => '8','display_at' => '2023-04-30','title_tw' => NULL,'title_cn' => NULL,'title_en' => 'Notification of acceptance of abstracts','status' => '1','created_at' => '2022-12-28 17:24:33','updated_at' => '2022-12-28 17:24:33','updated_UID' => '1'),
            array('id' => '4','MID' => '8','display_at' => '2023-05-31','title_tw' => NULL,'title_cn' => NULL,'title_en' => 'Registration deadline for accepted abstracts','status' => '1','created_at' => '2022-12-28 17:24:58','updated_at' => '2022-12-28 17:24:58','updated_UID' => '1'),
            array('id' => '5','MID' => '8','display_at' => '2023-05-31','title_tw' => NULL,'title_cn' => NULL,'title_en' => 'Deadline of Early-bird registration','status' => '1','created_at' => '2022-12-28 17:25:37','updated_at' => '2022-12-28 17:25:37','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page_type6}}');
    }
}
