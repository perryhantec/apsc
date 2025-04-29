<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%general}}`.
 */
class m211107_204232_create_registration_text_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registration_text}}', [
            'id'                 => $this->primaryKey(),
            'intro_tw'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'intro_cn'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'intro_en'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'early1_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'early1_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'early1_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'regular1_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'regular1_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'regular1_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'late1_tw'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'late1_cn'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'late1_en'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'contact_tw'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'contact_cn'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'contact_en'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'special_tw'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'special_cn'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'special_en'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'early2_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'early2_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'early2_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'regular2_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'regular2_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'regular2_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'late2_tw'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'late2_cn'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'late2_en'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'dinner_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'dinner_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'dinner_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'rules_tw'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'rules_cn'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'rules_en'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'thanks_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'thanks_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'thanks_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email1_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email1_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email1_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email2_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email2_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email2_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_paypal_tw'   => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_paypal_cn'   => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_paypal_en'   => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_cheque_tw'   => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_cheque_cn'   => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_cheque_en'   => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_bank_tw'     => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_bank_cn'     => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email3_bank_en'     => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email4_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email4_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'email4_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'created_at'         => $this->dateTime().' DEFAULT NOW()',
            'updated_at'         => $this->timestamp(),
            'updated_UID'        => $this->integer(),
        ]);

        $this->batchInsert('{{%registration_text}}', [
            'id',
            'intro_tw',
            'intro_cn',
            'intro_en',
            'early1_tw',
            'early1_cn',
            'early1_en',
            'regular1_tw',
            'regular1_cn',
            'regular1_en',
            'late1_tw',
            'late1_cn',
            'late1_en',
            'contact_tw',
            'contact_cn',
            'contact_en',
            'special_tw' ,
            'special_cn' ,
            'special_en' ,
            'early2_tw',
            'early2_cn',
            'early2_en',
            'regular2_tw',
            'regular2_cn',
            'regular2_en',
            'late2_tw',
            'late2_cn',
            'late2_en',
            'dinner_tw',
            'dinner_cn',
            'dinner_en',
            'rules_tw',
            'rules_cn',
            'rules_en',
            'thanks_tw',
            'thanks_cn',
            'thanks_en',
			'email1_tw',
            'email1_cn',
            'email1_en',
            'email2_tw',
            'email2_cn',
            'email2_en',
            'email3_paypal_tw',
            'email3_paypal_cn',
            'email3_paypal_en',
            'email3_cheque_tw',
            'email3_cheque_cn',
            'email3_cheque_en',
            'email3_bank_tw',
            'email3_bank_cn',
            'email3_bank_en',
            'email4_tw',
            'email4_cn',
            'email4_en',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
			array('id' => '1','intro_tw' => NULL,'intro_cn' => NULL,'intro_en' => '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><span class="subheader2" style="box-sizing: border-box; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; margin-bottom: -3px;">Registration Fees</span></p>

			<div style="text-align:left;margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: 600; color: rgb(104, 104, 104); font-size: 1.5rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0);">Low to Lower Middle Income Countries</div>
			
			<div style="text-align:left;margin-bottom:20px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(78, 142, 203); font-size: 1.3rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0);"><a href="https://data.worldbank.org/?locations=XM-XN" style="color: inherit; box-shadow: none; font-size: inherit; line-height: inherit;">(Please refer to the World Bank listing)</a></div>
			
			<table style="width:100%;border-collapse: collapse;">
				<thead style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<th style="width:33.3333%;border:none;background-color: rgb(11, 121, 180);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">EARLY BIRD</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(On or before 15 Sep 2023)</div>
						</th>
						<th style="width:33.3333%;border:none;background-color: rgb(11, 180, 173);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">REGULAR</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(16 Sep to 26 Nov 2023)</div>
						</th>
						<th style="width:33.3333%;border:none;background-color: rgb(111, 81, 170);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">LATE &amp; ONSITE</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(27 Nov 2023 onwards)</div>
						</th>
					</tr>
				</thead>
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 300 (HKD 2400)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 180, 173);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 400 (HKD 3200)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(111, 81, 170);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 500 (HKD 4000)</div>
						</div>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 150 (HKD 1200)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 180, 173);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 250 (HKD 2000)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(111, 81, 170);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 350 (HKD 2800)</div>
						</div>
						</td>
					</tr>
				</tbody>
			</table>
			
			<p style="text-align: center;">&nbsp;</p>
			
			<div style="text-align:left;margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: 600; color: rgb(104, 104, 104); font-size: 1.5rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0);">Upper Middle to High Income Countries</div>
			
			<div style="text-align:left;margin-bottom:20px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(78, 142, 203); font-size: 1.3rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0);"><a href="https://data.worldbank.org/?locations=XM-XN" style="color: inherit; box-shadow: none; font-size: inherit; line-height: inherit;">(Please refer to the World Bank listing)</a></div>
			
			<table style="width:100%;border-collapse: collapse;">
				<thead style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<th style="width:33.3333%;border:none;background-color: rgb(11, 121, 180);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">EARLY BIRD</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(On or before 15 Sep 2023)</div>
						</th>
						<th style="width:33.3333%;border:none;background-color: rgb(11, 180, 173);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">REGULAR</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(16 Sep to 26 Nov 2023)</div>
						</th>
						<th style="width:33.3333%;border:none;background-color: rgb(111, 81, 170);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">LATE &amp; ONSITE</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(27 Nov 2023 onwards)</div>
						</th>
					</tr>
				</thead>
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 450 (HKD 3600)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 180, 173);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 500 (HKD 4000)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(111, 81, 170);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 600 (HKD 4800)</div>
						</div>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 300 (HKD 2400)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 180, 173);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 350 (HKD 2800)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(111, 81, 170);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 450 (HKD 3600)</div>
						</div>
						</td>
					</tr>
				</tbody>
			</table>
			
			<p style="text-align: center;">&nbsp;</p>
			
			<div style="text-align:left;margin-bottom:20px;font-family: Helvetica, sans-serif; font-weight: 600; color: rgb(104, 104, 104); font-size: 1.5rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0);">Local Participants</div>
			
			<table style="width:100%;border-collapse: collapse;">
				<thead style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<th style="width:33.3333%;border:none;background-color: rgb(11, 121, 180);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">EARLY BIRD</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(On or before 15 Sep 2023)</div>
						</th>
						<th style="width:33.3333%;border:none;background-color: rgb(11, 180, 173);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">REGULAR</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(16 Sep to 26 Nov 2023)</div>
						</th>
						<th style="width:33.3333%;border:none;background-color: rgb(111, 81, 170);padding:5px;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">LATE &amp; ONSITE</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(255, 255, 255); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">(27 Nov 2023 onwards)</div>
						</th>
					</tr>
				</thead>
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td colspan="3" style="width:100%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">HKSS Member</div>
						</div>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 150 (HKD 1200)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 180, 173);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 200 (HKD 1600)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(111, 81, 170);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 250 (HKD 2000)</div>
						</div>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 40 (HKD 320)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 180, 173);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 80 (HKD 640)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(111, 81, 170);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 100 (HKD 800)</div>
						</div>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td colspan="3" style="width:100%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-HKSS Member</div>
						</div>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 200 (HKD 1600)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 180, 173);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 250 (HKD 2000)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(111, 81, 170);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 300 (HKD 2400)</div>
						</div>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 121, 180);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 60 (HKD 480)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(11, 180, 173);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 100 (HKD 800)</div>
						</div>
						</td>
						<td style="width:33.3333%;border:none;padding:0;">
						<div style="border:2px solid rgb(111, 81, 170);padding:5px 0;">
						<div style="margin-bottom:10px;font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">Non-physician</div>
			
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 120 (HKD 960)</div>
						</div>
						</td>
					</tr>
				</tbody>
			</table>
			
			<p style="text-align: center;">&nbsp;</p>
			
			<table style="width:100%;border-collapse: collapse; border-bottom:1px solid rgb(104, 104, 104);">
				<thead style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<th colspan="2" style="width:100%;border:none;background-color: rgb(104, 104, 104);padding:5px;">
						<div style="font-family: Helvetica, sans-serif; font-weight: bold; color: rgb(255, 255, 255); font-size: 1.5rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-shadow: rgba(0, 0, 0, 0.3) 0px 0px 10px; text-align: center;">Gala Dinner</div>
						</th>
					</tr>
				</thead>
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="width:50%;border:none;padding:10px 0;">
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">2 December 2023</div>
						</td>
						<td style="width:50%;border:none;padding:10px 0;">
						<div style="font-family: Helvetica, sans-serif; font-weight: normal; color: rgb(104, 104, 104); font-size: 1.25rem; -webkit-text-stroke-color: rgb(0, 0, 0); stroke: rgb(0, 0, 0); text-align: center;">USD 80 (HKD 640)</div>
						</td>
					</tr>
				</tbody>
			</table>
			
			<p style="text-align: center;">&nbsp;</p>
			
			<p><em style="font-size: 1.1rem;">The payment of registration fee will be processed in United States Dollar (USD) or Hong Kong Dollar (HKD).</em></p>
			
			<p>* To apply for registration fee refunds, a verification letter or valid student identity card issued by a qualified institution is required.</p>
			
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><span class="subheader2" style="box-sizing: border-box; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; margin-bottom: -3px;">Rules and Regulation</span></p>
			
			<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);" type="disc">
				<li style="box-sizing: border-box;">Registrations are subject to acceptance on a &ldquo;first-come-first-served&rdquo; basis.</li>
				<li style="box-sizing: border-box;">Registration forms received without payment will not be processed.</li>
				<li style="box-sizing: border-box;">Written confirmation will be sent upon receipt of your registration form and full payment. If you could not receive this confirmation within two weeks, please contact the Secretariat at&nbsp;<a href="mailto:info@apsc2023hk.org" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;">info@apsc2023hk.org</a>.</li>
				<li style="box-sizing: border-box;">The Programme is subject to change without prior notice. In the unlikely event of cancellation of the Conference, the only and maximum liability of the Organizers is to refund all the fees paid.</li>
				<li style="box-sizing: border-box;">The decision of the Organizers shall be final and conclusive.</li>
				<li style="box-sizing: border-box;">All enquiries, changes and cancellations should be made in writing to the Secretariat.</li>
			</ul>
			
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><span class="subheader2" style="box-sizing: border-box; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; margin-bottom: -3px;">For enquiries, please contact</span><br style="box-sizing: border-box;" />
			APSC 2023 Secretariat<br style="box-sizing: border-box;" />
			c/o Genesis Marketing Company<br style="box-sizing: border-box;" />
			Office Address:<br style="box-sizing: border-box;" />
			Unit C, 3/F, Worldwide Centre,<br style="box-sizing: border-box;" />
			123 Tung Chau Street, Kowloon, Hong Kong<br style="box-sizing: border-box;" />
			Tel: (852) 2396 6261<br style="box-sizing: border-box;" />
			Fax: (852) 2396 6465<br style="box-sizing: border-box;" />
			Email: <a href="mailto:info@apsc2023hk.org" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;">info@apsc2023hk.org</a></p>
			','early1_tw' => NULL,'early1_cn' => NULL,'early1_en' => '<p><span style="color: rgb(255, 0, 0); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 18.6667px; text-align: center;">&nbsp;(Deadline for Early-bird Registration: on or before 31 May 2023)</span></p>
			','regular1_tw' => NULL,'regular1_cn' => NULL,'regular1_en' => '','late1_tw' => NULL,'late1_cn' => NULL,'late1_en' => '','contact_tw' => NULL,'contact_cn' => NULL,'contact_en' => '<p><em style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; color: rgb(68, 68, 68);">Should you encounter any difficulties during the registration process, please contact AOCO 2023 Secretariat by email at&nbsp;<a href="mailto:info@aoco2023hk.orgaospr2023.org" style="box-sizing: border-box; background: none 0% 0% repeat scroll transparent; color: rgb(31, 73, 125); text-decoration-line: none;">info@aoco2023hk.org</a><a style="box-sizing: border-box; background: none 0% 0% repeat scroll transparent; color: rgb(31, 73, 125);">&nbsp;</a>or by phone at (852) 2559 9973 for assistance.</em></p>
			','special_tw' => NULL,'special_cn' => NULL,'special_en' => '<p><span style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px; color: rgb(68, 68, 68);">Please contact the Secretariat by email (</span><a href="mailto:info@aoco2023hk.orgospr2023.org" style="box-sizing: border-box; background-image: none; background-position: 0% 0%; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; color: rgb(31, 73, 125); text-decoration-line: none; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px;">info@aoco2023hk.org</a><span style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px; color: rgb(68, 68, 68);">) should you have any other special requirement.</span></p>
			','early2_tw' => NULL,'early2_cn' => NULL,'early2_en' => '<div class="component " id="eebb949b-9c29-47e4-a1de-06aa05e9490b" style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px; color: rgb(68, 68, 68);">
			<div style="box-sizing: border-box;">
			<p style="box-sizing: border-box; margin: 0px 0px 7.5pt;"><span lang="EN-HK" style="box-sizing: border-box; font-size: 11pt; font-family: Arial; color: rgb(34, 34, 34); line-height: 15px;"><em style="box-sizing: border-box;">(The amount listed below is in Hong Kong Dollar.)</em></span></p>
			
			<p style="box-sizing: border-box; margin: 0px 0px 7.5pt;"><span style="box-sizing: border-box; font-size: 13pt; color: rgb(3, 2, 2);"><strong style="box-sizing: border-box;">Early Bird Registration Deadline: on or before 31 May 2023</strong></span></p>
			</div>
			</div>
			','regular2_tw' => NULL,'regular2_cn' => NULL,'regular2_en' => '','late2_tw' => NULL,'late2_cn' => NULL,'late2_en' => '','dinner_tw' => NULL,'dinner_cn' => NULL,'dinner_en' => '<p><span style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px; color: rgb(5, 3, 3);">Venue and details will be annouced soon at&nbsp;</span><a href="http://www.aoco2023hk.org./" style="box-sizing: border-box; color: rgb(31, 73, 125); text-decoration-line: none; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px;">www.aoco2023hk.org.</a><span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">&nbsp;Please</span><span style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px; color: rgb(5, 3, 3);">&nbsp;stay tuned.</span></p>
			','rules_tw' => NULL,'rules_cn' => NULL,'rules_en' => '<p><strong>Rules and Regulations</strong></p>
			
			<ul>
				<li>Registrations are subject to acceptance on a &ldquo;first-come-first-served&rdquo; basis.</li>
				<li>Registration forms received without payment will not be processed.</li>
				<li>Written confirmation will be sent upon receipt of your registration form and full payment. If you could not receive this confirmation within two weeks, please contact the Secretariat at&nbsp;<a href="mailto:info@aoco2023hk.org">info@aoco2023hk.org</a>.</li>
				<li>The Programme is subject to change without prior notice. In the unlikely event of cancellation of the Conference, the only and maximum liability of the Organizers is to refund all the fees paid.</li>
				<li>The decision of the Organizers shall be final and conclusive.</li>
				<li>All enquiries, changes and cancellations should be made in writing to the Secretariat.</li>
			</ul>
			
			<p><strong>Data Processing Consent</strong></p>
			
			<ul>
				<li>The Organizers and their affiliates or third parties shall have the right to assist them in processing my personal data for the purpose of providing scientific education, services and other relevant communication.</li>
				<li>The Organizers and their entities are permitted to collect, store and use my personal data (as defined in the Personal Data (Privacy) Ordinance) as provided by me in the application form for the purpose of or in connection with the Conference.</li>
			</ul>
			','thanks_tw' => NULL,'thanks_cn' => NULL,'thanks_en' => '<p><span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">Thank you for your registration.&nbsp; You will be receiving a registration acknowledgement / confirmation by email in 10-15 minutes.&nbsp; Please check your spam or junk email box before contacting us if you do not receive it.&nbsp;</span><br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">Please do not hesitate to contact us should you require any assistance.</span><br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">Best Regards</span><br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">AOCO 2023 Secretariat&nbsp;</span><br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">c/o International Conference Consultants Ltd.</span><br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">Tel:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +852 2559 9973</span><br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">Fax:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +852 2847 9528</span><br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
			<span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="mailto:info@aoco02023hk.org" style="box-sizing: border-box; color: rgb(73, 195, 101); text-decoration-line: none; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">info@aoco02023hk.org</a><span style="color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">&nbsp;&nbsp;</span></p>
			','email1_tw' => NULL,'email1_cn' => NULL,'email1_en' => '<p><em style="color: rgb(2, 2, 2); font-family: arial; font-size: 13.3333px;">Please add&nbsp;<a class="moz-txt-link-freetext" href="mailto:info@aoco2023hk.org" rel="noreferrer" style="color: rgb(0, 105, 166);">info@aoco2023hk.org</a>&nbsp;</em><em style="color: rgb(2, 2, 2); font-family: arial; font-size: 13.3333px;">to your address book to ensure future email delivery.<br />
			<i><span style="font-family: sans-serif; color: rgb(252, 1, 1);"><span style="font-family: arial;"><i>(</i></span>You are advised to check your&nbsp;email account (including junk/spam box)&nbsp;frequently as Secretariat will send registration and Conference updates to this email.)</span></i></em></p>
			','email2_tw' => NULL,'email2_cn' => NULL,'email2_en' => '<p><span style="color: rgb(8, 1, 1); font-size: 12pt; font-family: sans-serif; line-height: 19.2px;"><strong><span style="font-size: 15pt;"><b><span style="font-size: 14pt; line-height: 22.4px;"><span style="font-size: 12pt;"><b><span style="line-height: 19.2px;">REGISTRATION ACKNOWLEDGEMENT</span></b></span></span></b></span></strong></span><br />
			<br />
			<span style="font-size: 16px; font-family: sans-serif;">Thank you for registering to attend the&nbsp;</span><b style="color: rgb(8, 1, 1); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 16px;"><span style="font-size: 12pt; font-family: sans-serif; color: black; line-height: 19.2px;"><strong>Asia-Oceania Conference on Obesity 2023&nbsp;</strong>which will be held on&nbsp;<strong>4-6&nbsp;August&nbsp;2023</strong></span></b><span style="font-size: 16px; font-family: sans-serif;">.&nbsp;This&nbsp;email is an acknowledgement that we have received your registration. You have been assigned a unique registration number which can be found above. Please quote this number during all correspondence.<br />
			<br />
			An official confirmation will be sent by email in two weeks upon receipt of registration payment.</span></p>
			','email3_paypal_tw' => NULL,'email3_paypal_cn' => NULL,'email3_paypal_en' => '','email3_cheque_tw' => NULL,'email3_cheque_cn' => NULL,'email3_cheque_en' => '<p><span style="color: rgb(5, 1, 1); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14pt;"><strong><span style="font-size: 13pt;"><u>Cheque Payment</u></span></strong></span><br style="color: rgb(5, 1, 1); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px;" />
			<span style="color: rgb(5, 1, 1); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px;">If&nbsp;you will pay the registration fee by Cheque, please kindly arrange a cheque (in Hong Kong dollars only) payable to&nbsp;</span><strong style="color: rgb(5, 1, 1); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px;">&quot;International Conference Consultants Ltd.&quot;</strong><span style="color: rgb(5, 1, 1); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px;">&nbsp;and send to:</span><br style="color: rgb(5, 1, 1); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px;" />
			<em style="color: rgb(5, 1, 1); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px;">Address: Unit C-D, 17/F, Max Share Centre, 373 King&#39;s Road, North Point, Hong Kong.<br />
			Attention: AOCO 2023 Secretariat<br />
			(Please mark your name and registration number at the back of your cheque.)</em></p>
			
			<p><span style="font-family: sans-serif; font-size: 16px;">Please note that registration is not complete until your full payment is received.&nbsp;Registration Fees depend on the date your payment is received and confirmed by the Secretariat. The fees may be adjusted accordingly if the payment is not received by the relevant deadlines. The registration will be completed upon settling of the payment. An official receipt will be issued after clearance of the payment.</span></p>
			','email3_bank_tw' => NULL,'email3_bank_cn' => NULL,'email3_bank_en' => '','email4_tw' => NULL,'email4_cn' => NULL,'email4_en' => '<p style="font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px; line-height: 17.6px;"><span style="font-size: 12pt;"><span style="font-family: sans-serif; line-height: 19.2px;">Should you have any enquiries, please feel free to contact us at&nbsp;<a class="moz-txt-link-freetext" href="mailto:info@aoco2023hk.org" rel="noreferrer" style="color: rgb(0, 105, 166);">info@aoco2023hk.org</a>.<br />
			<br />
			Thank you for your attention and we look forward to welcoming you at the Conference.</span></span></p>
			
			<p style="font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px;">&nbsp;</p>
			
			<p style="font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: 14.6667px; line-height: 17.6px;"><span style="font-family: sans-serif; line-height: 17.6px;">Best Regards,&nbsp;<br />
			AOCO 2023 Secretariat<br />
			c/o International Conference Consultants Ltd.<br />
			Tel: (852) 2559 9973<br />
			Fax: (852) 2547 9528<br />
			Email:&nbsp;<a class="moz-txt-link-freetext" href="mailto:info@aoco2023hk.org" rel="noreferrer" style="color: rgb(0, 105, 166);">info@aoco2023hk.org</a></span><br />
			Website:&nbsp;<a href="http://mail.eventsairmail.com/ls/click?upn=xWD4vVzn5joaIC3JZrKOZOrzuRAPBxbPhycB8yfzT8FK2sflwKtPu1qFnNBeKDVN3as5_30jnR2Y4wqWiTa-2FqjwLCsKERAnjvwrt2rIspfRYDzEAmHSAV1TTv7N5DpEC75zxK-2BTqMm5zpIVl7N0RSuSHGAyHhvq41IEkftwpXwy1SB6uRj8UcU87H0otXI3HB-2F7175xTgCMWj05-2F0cjiq1TVMwE5eXWEO1hpifM9e0VBJU8BSZHGL90lObmSex5e7nfxZaPXldQdwC04MluSloMAImnM6HyExqh2i4Z3-2Fu5vE5WykF5ixzf4y5381LzWMyxmgWDTLXsRGk9Pnaf5wy5mav21o47JDUhG9oGmEydzmoC-2B-2FRUSWTdyJ9y0kN-2BdpkGRf" rel="noreferrer" style="color: rgb(0, 105, 166);" target="_blank">www.aoco2023hk.org</a></p>
			','created_at' => '2023-02-15 12:42:25','updated_at' => '2023-05-16 03:22:04','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%registration_text}}');
    }
}
