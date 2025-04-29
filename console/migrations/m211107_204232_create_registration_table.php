<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%registration}}`.
 */
class m211107_204232_create_registration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registration}}', [
            'id'                          => $this->primaryKey(),
            'registration_no'             => $this->string(),
            'title'                       => $this->string(),
            'first_name'                  => $this->string(),
            'last_name'                   => $this->string(),
            'department'                  => $this->string(),
            'institution'                 => $this->string(),
            'country'                     => $this->string(),
            'email'                       => $this->string(),
            'other_email'                 => $this->text(),
            'country_code'                => $this->string(),
            'mobile'                      => $this->string(),
            'office_phone'                => $this->string(),
            'professions'                 => $this->tinyInteger(),
            'other_pro'                   => $this->string(),
            'specialty'                   => $this->tinyInteger(),
            'dietary'                     => $this->tinyInteger(),
            'statement'                   => $this->tinyInteger(),
            'is_refund'                   => $this->tinyInteger(),
            'student_file_name'           => $this->string(),
            'hotel'                       => $this->tinyInteger(),
            'payment_type'                => $this->tinyInteger(),
            'dinner'                      => $this->tinyInteger(),
            // 'total_payment'               => $this->float(),
            'payment_method'              => $this->tinyInteger(),
            'is_attend'                   => $this->tinyInteger()->defaultValue(0),
            // 'registration_fee'            => $this->float(),
            'status'                      => "ENUM(
                                                'canceled',
                                                'form_submitted',
                                                'online_payment_failed',
                                                'online_payment',
                                                'waiting_for_confirm',
                                                'confirmed',
                                                'end'
                                            )",
            'is_vip'                      => $this->tinyInteger(),
            'check_is_abstracted'         => $this->tinyInteger(),
            'faculty_dinner'              => $this->tinyInteger(),
                                
            'created_at'                  => $this->dateTime().' DEFAULT NOW()',
            'updated_at'                  => $this->timestamp(),
            // 'updated_UID'                 => $this->integer(),
        ]);

        $this->batchInsert('{{%registration}}', [
            'id',
            'registration_no',
            'title',
            'first_name',
            'last_name',
            'department',
            'institution',
            'country',
            'email',
            'other_email',
            'country_code',
            'mobile',
            'office_phone',
            'professions',
            'other_pro',
            'specialty',
            'dietary',
            'statement',
            'is_refund',
            'student_file_name',
            'hotel',
            'payment_type',
            'dinner',
            // 'total_payment',
            'payment_method',
            'is_attend',
            'registration_fee',
            'status',
            'is_vip',
            'check_is_abstracted',
            'faculty_dinner',
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
        $this->dropTable('{{%registration}}');
    }
}
