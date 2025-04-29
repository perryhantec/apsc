<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%printer}}`.
 */
class m210519_103200_create_printer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%printer}}', [
            'id'                   => $this->primaryKey(),
            'location'             => $this->string(),
            'ip'                   => $this->string(20),
            'created_at'           => $this->dateTime().' DEFAULT NOW()',
            'updated_at'           => $this->timestamp(),
        ]);

        $this->batchInsert('{{%printer}}', [
            'id',
            'location',
            'ip',
            'created_at',
            'updated_at',
        ], [
            [
                'id'                   => '1',
                'name'                 => 'Test',
                'auth_key'             => '172.16.253.80',
                'created_at'           => '2022-05-28 00:00:00',
                'updated_at'           => '2022-05-28 00:00:00',
            ],
            [
                'id'                   => '2',
                'name'                 => 'TMDHC',
                'auth_key'             => '172.16.10.152',
                'created_at'           => '2022-05-28 00:00:00',
                'updated_at'           => '2022-05-28 00:00:00',
            ],
            [
                'id'                   => '3',
                'name'                 => 'eFaith',
                'auth_key'             => '10.123.123.70',
                'created_at'           => '2022-05-28 00:00:00',
                'updated_at'           => '2022-05-28 00:00:00',
            ],
            [
                'id'                   => '4',
                'name'                 => 'efaith',
                'auth_key'             => '10.123.123.113',
                'created_at'           => '2022-05-28 00:00:00',
                'updated_at'           => '2022-05-28 00:00:00',
            ],
            [
                'id'                   => '5',
                'name'                 => 'ELC Test',
                'auth_key'             => '172.16.10.215',
                'created_at'           => '2022-05-28 00:00:00',
                'updated_at'           => '2022-05-28 00:00:00',
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%printer}}');
    }
}
