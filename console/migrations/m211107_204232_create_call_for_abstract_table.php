<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%call_for_abstract}}`.
 */
class m211107_204232_create_call_for_abstract_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%call_for_abstract}}', [
            'id'                          => $this->primaryKey(),
            'abstract_no'                 => $this->string(),
            'user_id'                     => $this->integer(),
            'title'                       => $this->text(),
            'present_type'                => $this->tinyInteger(),
            'keyword_1'                   => $this->string(),
            'keyword_2'                   => $this->string(),
            'keyword_3'                   => $this->string(),
            'theme'                       => $this->tinyInteger(),
            'affiliation'                 => $this->text(),
            'author'                      => $this->text(),
            'content'                     => $this->text(),
            'abstract_file_name'          => $this->string(),
            'is_young'                    => $this->tinyInteger(),
            'is_registered'               => $this->tinyInteger(),
            'abstract_status'             => $this->tinyInteger(),
            'result'                      => $this->tinyInteger(),
            'accept_type'                 => $this->tinyInteger(),
            'check_is_registered'         => $this->tinyInteger(),
            'created_at'                  => $this->dateTime().' DEFAULT NOW()',
            'updated_at'                  => $this->timestamp(),
            // 'updated_UID'                 => $this->integer(),
        ]);

        $this->batchInsert('{{%call_for_abstract}}', [
            'id',
            'abstract_no',
            'user_id',
            'title',
            'present_type',
            'keyword_1',
            'keyword_2',
            'keyword_3',
            'theme',
            'affiliation',
            'author',
            'content',
            'abstract_file_name',
            'is_young',
            'is_registered',
            'abstract_status',
            'result',
            'accept_type',
            'check_is_registered',
            'created_at',
            'updated_at',
            // 'updated_UID',
        ], [

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%call_for_abstract}}');
    }
}
