<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_type1}}`.
 */
class m211106_212052_create_page_type5_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_type5}}', [
            'id'                     => $this->primaryKey(),
            'MID'                    => $this->integer()->unsigned(),
            'content_tw'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_cn'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_en'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'file_names'             => $this->text(),
            'status'                 => $this->tinyInteger()->defaultValue(1),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%page_type5}}', [
            'id',
            'MID',
            'content_tw',
            'content_cn',
            'content_en',
            'file_names',
            'status',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            array('id' => '1','MID' => '10','content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p><span style="color: rgb(0, 102, 204); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 20px; font-weight: 700; background-color: rgb(255, 255, 255);">Organizing Committee</span></p>

            <p>APSO President / Co &ndash; Conveners of APSC 2023</p>
            
            <p>Prof BW Yoon</p>
            
            <p>&nbsp;</p>
            
            <p>HKSS President / President of APSC 2023</p>
            
            <p>Dr Richard Li</p>
            
            <p>&nbsp;</p>
            
            <p>Co - Conveners of APSC 2023</p>
            
            <p>Dr WC Fong</p>
            
            <p>&nbsp;</p>
            
            <p>Secretary General of APSC 2023</p>
            
            <p>Dr SH Li</p>
            
            <p>&nbsp;</p>
            
            <p>Co - chairs of International Scientific Committee</p>
            
            <p>Prof Kazunori Toyoda</p>
            
            <p>Prof Thomas Leung</p>
            
            <p>&nbsp;</p>
            
            <p>International Scientific Committee</p>
            
            <p>Prof Kazunori Toyoda (Japan) (Co - chair)</p>
            
            <p>Prof Thomas Leung (Japan) (Co - chair)</p>
            
            <p>Dr Gary Lau (Hong Kong)</p>
            
            <p>Dr WC Fong (Hong Kong)</p>
            
            <p>Dr Richard Li (Hong Kong)</p>
            
            <p>Prof Mohammad Wasay (Pakistan)</p>
            
            <p>Prof KC Chang (Taiwan) (Past APSC rep )</p>
            
            <p>&nbsp;</p>
            
            <p>Advisory Board</p>
            
            <p>Prof KS Tan (Immediate Past - President APSO)</p>
            
            <p>Dr NV Ramani (President - Elect APSO)</p>
            
            <p>Prof Jiunn - Tay Lee (Immediate Past - President of the last APSC)</p>
            
            <p>Incoming President of the next APSC</p>
            
            <p>Prof Lawrence Wong (Hong Kong)</p>
            
            <p>Prof CY Huang (Hong Kong)&nbsp;</p>
            
            <p>&nbsp;</p>
            
            <p>Local Organizing Committee</p>
            
            <p>PRESIDENT Dr Richard Li</p>
            
            <p>VICE PRESIDENT Dr SH Li</p>
            
            <p>HON. SECRETARY Dr SK Lam</p>
            
            <p>HON. TREASURER Dr Gary Lau</p>
            
            <p>IMMEDIATE PAST PRESIDENT Dr WC Fong</p>
            
            <p>COUNCIL MEMBER</p>
            
            <p>Dr YL Chu</p>
            
            <p>Dr WM Fok</p>
            
            <p>Dr Sonny Hon</p>
            
            <p>Dr Alexander Lau</p>
            
            <p>Dr KM Leung</p>
            
            <p>Dr WT Lo</p>
            
            <p>Dr CP Tsang</p>
            
            <p>Dr Derek Wong</p>
            ','file_names' => '','status' => '1','created_at' => '2022-12-27 22:25:28','updated_at' => '2023-02-14 10:19:17','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page_type5}}');
    }
}
