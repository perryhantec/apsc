<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id'                   => $this->primaryKey(),
            'title'                => $this->string(),
            'first_name'           => $this->string(),
            'last_name'            => $this->string(),
            'department'           => $this->string(),
            'institution'          => $this->string(),
            'email'                => $this->string(),
            'other_email'          => $this->string(),
            'mobile'               => $this->string(),
            'work_mobile'          => $this->string(),
            'country'              => $this->string(),
            'auth_key'             => $this->string(32),
            'username'             => $this->string()->notNull()->unique(),
            'password_hash'        => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'role'                 => $this->integer()->defaultValue(30),
            'status'               => $this->smallInteger()->defaultValue(1),
            'created_at'           => $this->dateTime().' DEFAULT NOW()',
            'updated_at'           => $this->timestamp(),
            'updated_UID'          => $this->integer(),
        ], $tableOptions);

        $this->batchInsert('{{%user}}', [
            'id',
            'title',
            'first_name',
            'last_name',
            'department',
            'institution',
            'email',
            'other_email',
            'mobile',
            'work_mobile',
            'country',    
            'auth_key',
            'username',
            'password_hash',
            'password_reset_token',
            'role',
            'status',
            'created_at',
            'updated_at',
        ], [
            // array('id' => '1','title' => NULL,'first_name' => NULL,'last_name' => NULL,'department' => NULL,'institution' => NULL,'email' => NULL,'other_email' => NULL,'mobile' => NULL,'work_mobile' => NULL,'country' => NULL,'auth_key' => 'esmf4M5S0xUflAB3hkwGWgpo7Ndecdwd','username' => 'hong.wong@efaith.com.hk','password_hash' => '$2y$13$3OflGZEph8qbcgPlvY268.Mu.Z9IyfiLX2yUqZHVBnRcJ7Gm7k26y','password_reset_token' => NULL,'role' => '30','status' => '1','created_at' => '2023-02-07 00:49:29','updated_at' => '2023-02-07 00:49:28'),
            array('id' => '1','title' => 'Mr.','first_name' => 'test','last_name' => 'test','department' => '','institution' => 'abc','email' => 'hong.wong@efaith.com.hk','other_email' => '','mobile' => '12345678','work_mobile' => '','country' => 'HK','auth_key' => 'esmf4M5S0xUflAB3hkwGWgpo7Ndecdwd','username' => 'hong.wong@efaith.com.hk','password_hash' => '$2y$13$3OflGZEph8qbcgPlvY268.Mu.Z9IyfiLX2yUqZHVBnRcJ7Gm7k26y','password_reset_token' => NULL,'role' => '30','status' => '1','created_at' => '2023-02-07 00:49:29','updated_at' => '2023-02-08 00:43:44')
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
