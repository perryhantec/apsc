<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staff}}`.
 */
class m210519_103200_create_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff}}', [
            'id'                   => $this->primaryKey(),
            'name'                 => $this->string(),
            'auth_key'             => $this->string(32),
            'username'             => $this->string()->notNull()->unique(),
            'password_hash'        => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'role'                 => $this->integer()->defaultValue(30),
            'status'               => $this->smallInteger()->defaultValue(1),
            'created_at'           => $this->dateTime().' DEFAULT NOW()',
            'updated_at'           => $this->timestamp(),
            'updated_UID'          => $this->integer(),
        ]);

        $this->batchInsert('{{%staff}}', [
            'id',
            'name',
            'auth_key',
            'username',
            'password_hash',
            'password_reset_token',
            'status',
            'created_at',
            'updated_at',
        ], [
            [
                'id'                   => '1',
                'name'                 => 'Staff 1',
                'auth_key'             => NULL,
                'username'             => 'staff1',
                'password_hash'        => '$2y$13$jYaqb0L1HxkCpi4JIa0rrueKTyy5nPGyTCmulGvvBmMe75HWU0eA6',
                'password_reset_token' => NULL,
                'status'               => '1',
                'created_at'           => '2022-05-28 00:00:00',
                'updated_at'           => '2022-05-28 00:00:00',
            ],
            [
                'id'                   => '2',
                'name'                 => 'Staff 2',
                'auth_key'             => NULL,
                'username'             => 'staff2',
                'password_hash'        => '$2y$13$jYaqb0L1HxkCpi4JIa0rrueKTyy5nPGyTCmulGvvBmMe75HWU0eA6',
                'password_reset_token' => NULL,
                'status'               => '1',
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
        $this->dropTable('{{%staff}}');
    }
}
