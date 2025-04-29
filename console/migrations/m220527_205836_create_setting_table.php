<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%set_menu}}`.
 */
class m220527_205836_create_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%setting}}', [
            'id'                => $this->primaryKey(),
            'ab_close'          => $this->dateTime(),
            'reg_early_close'   => $this->dateTime(),
            'reg_regular_close' => $this->dateTime(),
            'created_at'        => $this->dateTime().' DEFAULT NOW()',
            'updated_at'        => $this->timestamp(),
        ]);

        $this->batchInsert('{{%setting}}', [
            'id',
            'ab_close',
            'reg_early_close',
            'reg_regular_close',
            'created_at',
            'updated_at',
        ], [
            array('id' => '1','ab_close' => '2023-08-31 00:00:00','reg_early_close' => '2023-09-16 00:00:00','reg_regular_close' => '2023-11-24 00:00:00','created_at' => '2022-06-28 00:00:00','updated_at' => '2023-02-19 09:02:54')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setting}}');
    }
}
