<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_us}}`.
 */
class m211107_201158_create_contact_us_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_us}}', [
            'id'                     => $this->primaryKey(),
            'title'                  => $this->string(),
            'address'                => $this->string(),
            'phone'                  => $this->string(),
            'fax'                    => $this->string(),
            'email'                  => $this->string(),

            // 'company_name_tw'        => $this->string(),
            // 'company_name_cn'        => $this->string(),
            // 'company_name_en'        => $this->string(),
            // 'address_tw'             => $this->text(),
            // 'address_cn'             => $this->text(),
            // 'address_en'             => $this->text(),
            // 'phone'                  => $this->string(),
            // 'fax'                    => $this->string(),
            // 'whatsapp'               => $this->string(),
            // 'email'                  => $this->string(),
            // 'website'                => $this->string(),
            // 'facebook'               => $this->string(),
            // 'instagram'              => $this->string(),
            // 'twitter'                => $this->string(),
            // 'youtube'                => $this->string(),
            // 'googlemap'              => $this->string(510),
            // 'content_tw'             => $this->text(),
            // 'content_cn'             => $this->text(),
            // 'content_en'             => $this->text(),
            // 'status'                 => $this->integer()->defaultValue(1),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%contact_us}}', [
            'id',
            'title',
            'address',
            'phone',
            'fax',
            'email',

            // 'company_name_tw',
            // 'company_name_cn',
            // 'company_name_en',
            // 'address_tw',
            // 'address_cn' ,
            // 'address_en',
            // 'phone',
            // 'fax',
            // 'whatsapp',
            // 'email',
            // 'website',
            // 'facebook',
            // 'instagram',
            // 'twitter',
            // 'youtube',
            // 'googlemap',
            // 'content_tw',
            // 'content_cn',
            // 'content_en',
            // 'status',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            array('id' => '1','title' => 'APSC 2023 Secretariat','address' => 'Unit 3, 3/F, Worldwide Centre, 123 Tung Chau Street, Kowloon, Hong Kong SAR','phone' => '(852) 2396 6261','fax' => '(852) 2396 6465','email' => 'info@apsc2023hk.org','created_at' => '2023-02-22 22:40:22','updated_at' => '2023-02-22 22:40:22','updated_UID' => '1')
//             array('id' => '1','content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p><strong><span style="box-sizing: border-box; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;">APSC 2023 Secretariat</span></strong><br style="box-sizing: border-box; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;" />
// <span style="box-sizing: border-box; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;">Tel: (852) 2396 6261</span><br style="box-sizing: border-box; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;" />
// <span style="box-sizing: border-box; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;">Fax: (852) 2396 6465</span><br style="box-sizing: border-box; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;" />
// <span style="box-sizing: border-box; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;">E-mail:&nbsp;</span><a href="mailto:info@aoco2023hk.org" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;">info@apsc2023hk.org</a></p>
// ','created_at' => '2021-11-08 10:34:41','updated_at' => '2023-02-14 10:51:45','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_us}}');
    }
}
