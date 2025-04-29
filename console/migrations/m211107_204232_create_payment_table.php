<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m211107_204232_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id'           => $this->primaryKey(),
            'registration_id'  => $this->integer(),
            'token'        => $this->string(2056),
            'url'          => $this->string(2083),
            'note'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            // 'api_note'     => $this->text(),
            // 'payment_note' => $this->text(),
            'refCode'      => $this->string(),
            'status'       => "ENUM(
                'start',
                'waiting',
                'done',
                'cancel',
                'fail'
            )",
            'created_at'                  => $this->dateTime().' DEFAULT NOW()',
            'updated_at'                  => $this->timestamp(),
        ]);

        $this->batchInsert('{{%payment}}', [
            'order_id',
            'registration_id',
            'token',
            'url',
            'note',
            // 'api_note',
            // 'payment_note',
            'refCode',
            'status',
            'created_at'
        ], [

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment}}');
    }
}
