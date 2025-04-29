<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_type1}}`.
 */
class m211106_212052_create_page_type7_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_type7}}', [
            'id'                     => $this->primaryKey(),
            'MID'                    => $this->integer()->unsigned(),
            'title_tw'               => $this->string(),
            'title_cn'               => $this->string(),
            'title_en'               => $this->string(),
            'content_tw'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_cn'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_en'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'file_names'             => $this->text(),
            'title2_tw'              => $this->string(),
            'title2_cn'              => $this->string(),
            'title2_en'              => $this->string(),
            'content2_tw'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content2_cn'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content2_en'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'file_names2'            => $this->text(),
            'status'                 => $this->tinyInteger()->defaultValue(1),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%page_type7}}', [
            'id',
            'MID',
            'title_tw',
            'title_cn',
            'title_en',
            'content_tw',
            'content_cn',
            'content_en',
            'file_names',
            'title2_tw',
            'title2_cn',
            'title2_en',
            'content2_tw',
            'content2_cn',
            'content2_en',
            'file_names2',
            'status',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            array('id' => '1','MID' => '9','title_tw' => NULL,'title_cn' => NULL,'title_en' => 'From Organizing Committee','content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);">Dear Friends and Colleagues,</p>

            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);">On behalf of the Asia Pacific Stroke Organisation and the Hong Kong Stroke Society, we cordially invite you to join us in the&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">Asia Pacific Stroke</span><span style="box-sizing: border-box; font-weight: bolder;">&nbsp;Conference&nbsp;2023 (APSC&nbsp;2023)</span>&nbsp;to be held in Hong Kong from Friday to Sunday, 24&nbsp;&ndash; 26&nbsp;November&nbsp;2023 at the Hong Kong Science and Technology Parks.&nbsp;</p>
            
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);">Although we have adapted to virtual conferences in the past two years due to the pandemic, we hope that by Novmeber&nbsp;2023 the situation will allow us to hold a face-to-face Conference.&nbsp; The Organizing Committee is carefully preparing the Conference with all our best endeavours to offer an excellent scientific programme.&nbsp; The main theme of the Conference is<span style="box-sizing: border-box; font-weight: bolder;">&nbsp;&ldquo;Advancing stroke care in times of change&rdquo;</span>&nbsp;and we will explore the current developments and advances in a variety of specialty areas within the sphere of stroke. &nbsp;We aim to bring together a multi-disciplinary group of researchers, scientists, clinicians, surgeons, and other healthcare professionals from across the international community to exchange ideas, acquire new knowledge and be inspired on stroke-related subjects.</p>
            
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);">The 3-day conference will feature keynote lectures, focused symposia, plenary sessions, free paper presentations, poster presentations and networking sessions that will undoubtedly enrich knowledge and stimulate thinking.&nbsp; Opportunities are also provided in the Exhibition for leading companies in the industry to showcase their latest technologies and products.&nbsp;</p>
            
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);">Hong Kong is a metropolitan and information hub customized with vibrant lifestyle, beautiful scenery, and mixed cultures from the east and west.&nbsp; Hence, the fun of the Conference will continue with our fabulous social events.&nbsp; From the traditional Chinese and Asian culture to the modern westernized design, Hong Kong has plenty of excitement to offer you and your companion.</p>
            
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify; background-color: rgb(255, 255, 255);">We are sure it is going to be a rewarding and enjoyable Conference.&nbsp; Come and explore this unforgettable experience in our energetic city.&nbsp; We look forward to seeing you in APSC&nbsp;2023 in Hong Kong.</p>
            ','file_names' => '[{"name":"Dr Richard Li","title":"President ","organization":"APSC 2023","image":"Y5mvzkF0Uo8FHyTOv0IffjB4aQqFhWXN_1674539433.jpg"},{"name":"Prof Byung-Woo Yoon","title":"President","organization":"Asia Pacific Stroke Organisation","image":"00Sgh7n2ALluTLkzgQuN_6J_yFnUX2RB_1674539433.jpg"}]','title2_tw' => NULL,'title2_cn' => NULL,'title2_en' => 'From APSC','content2_tw' => NULL,'content2_cn' => NULL,'content2_en' => '<p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;">Dear colleagues and friends,</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;">&nbsp;</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;">I am delighted to invite you on behalf of the Asia Pacific Stroke Organization (APSO) to the Asia Pacific Stroke Conference (APSC) 2022, which will be held in Kaohsiung, Taiwan, from November 25 to 27, 2022.</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;"><br />
                        The world is struggling with the Corona Pandemic, which is especially true in the medical field. The fact that the situation is improving with the dedicated efforts of the medical community reminds us of the duty and pride of medical personnel to protect human health.</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;"><br />
                        However, as it has not yet returned to the pre-pandemic state, APSCs have been held as virtual meetings for the past two years. And APSC 2022 will be held in a hybrid form rather than a full face-to-face meeting.</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;"><br />
                        The theme of APSC 2022 is &#39;Stroke Care Reform through Collaboration and Cooperation.&#39; The scientific committee is preparing a wealth of exciting content, so I believe that all participants will enjoy the conference.</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;"><br />
                        APSO has been growing and extending its impact on stroke care, education, and research of the Asia-Pacific region since its establishment in 2009. Currently, 21 countries are joining the APSO as sponsoring or affiliated members.</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;"><br />
                        In the Asia-Pacific region, the resources and environment of each country related to stroke and its care are different. APSO pursues &#39;a unified vision in diversity&#39; and emphasizes balanced development to overcome these differences.</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;"><br />
                        The annual APSC is the flagship conference of APSO, although APSO conducts various academic and educational activities. Taiwan Stroke Society and APSO are working together to prepare the best academic conference. So I am confident that it will be an excellent opportunity to exchange opinions on the issues we face regarding stroke in the Asia-Pacific region, promote mutual understanding, grow together, and share friendship.</p>
                        
                        <p style="margin: 0px; padding: 0px; box-sizing: border-box; line-height: 28.8px; color: rgb(51, 51, 51); font-family: Roboto, 微軟正黑體, sans-serif; font-size: 18px;"><br />
                        We hope all of you will join us and enjoy APSC 2022.<br />
                        Thank you.</p>
                        ','file_names2' => '[]','status' => '1','created_at' => '2022-12-27 13:32:48','updated_at' => '2023-02-14 10:16:14','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page_type7}}');
    }
}
