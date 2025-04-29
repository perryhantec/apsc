<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banner}}`.
 */
class m211107_204232_create_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banner}}', [
            'id'                          => $this->primaryKey(),
            'seq'                         => $this->integer(),
            'image_file_name'             => $this->string(),
            'text'                        => $this->getDb()->getSchema()->createColumnSchemaBuilder('mediumtext'),
            'url'                         => $this->getDb()->getSchema()->createColumnSchemaBuilder('mediumtext'),
            'url_target'                  => $this->integer(),
            'status'                      => $this->tinyInteger()->defaultValue(1),
            'created_at'                  => $this->dateTime().' DEFAULT NOW()',
            'updated_at'                  => $this->timestamp(),
            'updated_UID'                 => $this->integer(),
        ]);

        $this->batchInsert('{{%banner}}', [
            'id',
            'seq',
            'image_file_name',
            'text',
            'url',
            'url_target',
            'status',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            array('id' => '1','seq' => NULL,'image_file_name' => '/apsc/content/banners/1.jpg?1676330347','text' => NULL,'url' => '','url_target' => '0','status' => '1','created_at' => '2022-12-28 15:51:04','updated_at' => '2022-12-28 15:52:08','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banner}}');
    }
}
