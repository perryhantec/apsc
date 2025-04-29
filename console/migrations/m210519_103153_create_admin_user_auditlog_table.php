<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admin_log}}`.
 */
class m210519_103153_create_admin_user_auditlog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%admin_user_auditlog}}', [
            'id'            => $this->primaryKey(),
            'admin_user_id' => $this->integer()->unsigned()->notNull(),
            'type'          => $this->integer()->unsigned()->notNull(),
            'msg'           => $this->text()->notNull(),
            'ip'            => $this->char(15)->defaultValue(null),
            'created_at'    => $this->timestamp()->notNull(),
        ]);

        // $this->addForeignKey(
        //     'admin_log-admin_user_id',
        //     'admin_log',
        //     'admin_user_id',
        //     'admin_user',
        //     'id',
        //     null,
        //     'CASCADE'
        // );

        // $this->addForeignKey(
        //     'admin_log-menu_id',
        //     'admin_log',
        //     'menu_id',
        //     'menu',
        //     'id',
        //     'SET NULL',
        //     'CASCADE'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%admin_user_auditlog}}');
    }
}
