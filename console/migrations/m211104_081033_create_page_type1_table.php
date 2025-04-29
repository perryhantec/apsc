<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_type1}}`.
 */
class m211104_081033_create_page_type1_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_type1}}', [
            'id'                     => $this->primaryKey(),
            'MID'                    => $this->integer()->unsigned(),
            'summary_tw'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'summary_cn'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'summary_en'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_tw'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_cn'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'content_en'             => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'file_names'             => $this->text(),
            'status'                 => $this->tinyInteger()->defaultValue(1),
            'created_at'             => $this->dateTime().' DEFAULT NOW()',
            'updated_at'             => $this->timestamp(),
            'updated_UID'            => $this->integer(),
        ]);

        $this->batchInsert('{{%page_type1}}', [
            'id',
            'MID',
			'summary_tw',
            'summary_cn',
            'summary_en',
            'content_tw',
            'content_cn',
            'content_en',
            'file_names',
            'status',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
			array('id' => '1','MID' => '2','summary_tw' => NULL,'summary_cn' => NULL,'summary_en' => NULL,'content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p class="subheader1" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 20px; font-weight: bold; color: rgb(0, 102, 204); padding-bottom: 10px; padding-top: 15px; display: inline-block; font-family: &quot;Open Sans&quot;, sans-serif; background-color: rgb(255, 255, 255);">Programme-at-a-glance</p>

			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><em style="box-sizing: border-box;">The programme is at Hong Kong Time (UTC +8).</em></p>
			
			<p class="subheader2" style="box-sizing: border-box; margin-top: 0px; margin-bottom: -3px; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; font-family: &quot;Open Sans&quot;, sans-serif;"><span style="box-sizing: border-box;">4 August 2023 (Friday)</span></p>
			
			<div style="box-sizing: border-box; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255); overflow-x: auto;">
			<table class="table-prog" style="border-collapse: collapse; width: 1110px; border: 3px solid rgb(3, 115, 135);">
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" width="130">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Time</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" width="87%">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 1</span></p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">14:00-17:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Pre-conference Symposium / Workshop</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">17:00-17:30</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Opening Ceremony</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">17:30-18:30</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Keynote Lecture</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">18:30-20:00</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Welcome Reception</p>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			
			<p class="subheader2" style="box-sizing: border-box; margin-top: 0px; margin-bottom: -3px; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; font-family: &quot;Open Sans&quot;, sans-serif;"><br style="box-sizing: border-box;" />
			5 August 2023 (Saturday)</p>
			
			<div style="box-sizing: border-box; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255); overflow-x: auto;">
			<table class="table-prog" style="border-collapse: collapse; width: 1110px; border: 3px solid rgb(3, 115, 135);">
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="130">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Time</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 1</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 2</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 3</span></p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">08:00-09:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Breakfast Symposium 1</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Breakfast Symposium 2</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">09:00-10:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 1</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">10:00-10:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Coffee Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">10:30-12:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 1</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 2</p>
						</td>
						<td bgcolor="#FFFAE2" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">AOASO President: Country Update</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">12:00-13:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">12:00-13:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Symposium 1</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Symposium 2</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">13:30-14:30</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 2</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">14:30-16:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 3</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 4</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 5</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">16:00-16:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Coffee Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">16:30-18:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 6</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 7</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 8</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">18:00-19:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Dinner Symposium</p>
						</td>
						<td bgcolor="#FFFAE2" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">AOASO Council Meeting</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">19:00-22:00</p>
						</td>
						<td bgcolor="#FFE9E9" colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Conference Dinner</p>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			
			<p class="subheader2" style="box-sizing: border-box; margin-top: 0px; margin-bottom: -3px; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; font-family: &quot;Open Sans&quot;, sans-serif;"><br style="box-sizing: border-box;" />
			6 August 2023 (Sunday)</p>
			
			<div style="box-sizing: border-box; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255); overflow-x: auto;">
			<table class="table-prog" style="border-collapse: collapse; width: 1110px; border: 3px solid rgb(3, 115, 135);">
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Time</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 1</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 2</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 3</span></p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">08:00-09:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Breakfast Symposium 3</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Breakfast Symposium 4</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">09:00-10:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 3</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">10:00-10:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Coffee Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">10:30-12:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 9</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 10</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 11</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">12:00-13:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">12:00-13:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Symposium 3</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Symposium 4</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">13:30-14:30</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 4</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">14:30-16:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 12</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 13</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 14</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">16:00-16:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Coffee Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">16:30-17:30</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 5</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">17:30-18:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Closing Ceremony</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><em style="box-sizing: border-box;">*The programme is subject to change without prior notice.</em></p>
			','file_names' => NULL,'status' => '1','created_at' => '2022-12-27 13:40:32','updated_at' => '2022-12-27 13:40:32','updated_UID' => '1'),
  array('id' => '2','MID' => '5','summary_tw' => NULL,'summary_cn' => NULL,'summary_en' => '<h2 style="box-sizing: border-box; line-height: 1; padding: 0px; text-transform: uppercase; font-family: Helvetica, Sans-serif;font-weight:600;">SPONSORSHIP &amp; EXHIBITION</h2>

<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.9rem;">As a sponsor or exhibitor of the Conference, your company will be able to enjoy special privileges and gain maximum company exposure.</p>

<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.9rem;">Please contact the Conference Secretariat (Email: info@apsc2023hk.org / Tel: +852 2396 6261) for details of the sponsorship and exhibition opportunities available.</p>
','content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p>The Asia Pacific Stroke Conference is the annual flagship meeting of the APSO, which brings together stakeholders and budding scholars in stroke care from the region and across the world. Each year, hundreds of delegates gather to learn from international experts, and enlighten each other in the ever-evolving field of stroke medicine.</p>

<p>After three years of virtual and hybrid meeting, the APSC 2023 will return to a full physical format, where delegates can once again meet and enjoy face-to-face exchanges.&nbsp;</p>

<p>The APSC 2023 will take place at the conference halls of the Hong Kong Science and Technology Parks, which includes the iconic Charles K. Kao Auditorium (a.k.a. the Golden Egg). Exhibition spaces are easily accessible, and situated right next to the conference rooms.</p>

<p>Sponsors and exhibitors of the Conference will be able to enjoy special privileges and gain maximum company exposure. A selection of sponsorship options are available.</p>

<p>Please contact the Conference Secretariat (Email: <a href="mailto:info@apsc2023hk.org">info@apsc2023hk.org</a> / Tel: +852 2396 6261) for more information.</p>
','file_names' => '["gPj6MkF4nX2enjsU3wUSG7K1lL2IwJVt_1677078073.jpg","JMR5zkQ7Z2g3_lo3BIHWgbYBIPTU0YQ-_1677078073.jpg","8SFNTRlF5jewNGw2JSbsKw4bpuj8Gf-X_1677078073.jpg","RGwTbQJ2OF12BraFZ2jjmi1FUrabNAlL_1677078073.jpg","55bXDi8J6a_wI-Aq_mmGRAA-IEn3-ozc_1677078083.jpg","RE8QOdmvS5t8oVYWzTGh-YOX-6TFIRFG_1677078083.jpg","JAWk7JtxSiH-P7PpxzOc5LlNVHlmcRYY_1677078083.jpg"]','status' => '1','created_at' => '2022-12-27 13:41:25','updated_at' => '2023-03-02 01:26:00','updated_UID' => '1'),
  array('id' => '3','MID' => '15','summary_tw' => NULL,'summary_cn' => NULL,'summary_en' => NULL,'content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p class="subheader1" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 20px; font-weight: bold; color: rgb(0, 102, 204); padding-bottom: 10px; padding-top: 15px; display: inline-block; font-family: &quot;Open Sans&quot;, sans-serif; background-color: rgb(255, 255, 255);">Programme-at-a-glance</p>
			
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><em style="box-sizing: border-box;">The programme is at Hong Kong Time (UTC +8).</em></p>
			
			<p class="subheader2" style="box-sizing: border-box; margin-top: 0px; margin-bottom: -3px; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; font-family: &quot;Open Sans&quot;, sans-serif;"><span style="box-sizing: border-box;">4 August 2023 (Friday)</span></p>
			
			<div style="box-sizing: border-box; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255); overflow-x: auto;">
			<table class="table-prog" style="border-collapse: collapse; width: 1110px; border: 3px solid rgb(3, 115, 135);">
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" width="130">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Time</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" width="87%">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 1</span></p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">14:00-17:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Pre-conference Symposium / Workshop</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">17:00-17:30</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Opening Ceremony</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">17:30-18:30</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Keynote Lecture</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">18:30-20:00</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Welcome Reception</p>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			
			<p class="subheader2" style="box-sizing: border-box; margin-top: 0px; margin-bottom: -3px; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; font-family: &quot;Open Sans&quot;, sans-serif;"><br style="box-sizing: border-box;" />
			5 August 2023 (Saturday)</p>
			
			<div style="box-sizing: border-box; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255); overflow-x: auto;">
			<table class="table-prog" style="border-collapse: collapse; width: 1110px; border: 3px solid rgb(3, 115, 135);">
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="130">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Time</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 1</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 2</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 3</span></p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">08:00-09:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Breakfast Symposium 1</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Breakfast Symposium 2</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">09:00-10:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 1</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">10:00-10:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Coffee Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">10:30-12:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 1</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 2</p>
						</td>
						<td bgcolor="#FFFAE2" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">AOASO President: Country Update</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">12:00-13:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">12:00-13:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Symposium 1</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Symposium 2</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">13:30-14:30</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 2</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">14:30-16:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 3</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 4</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 5</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">16:00-16:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Coffee Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">16:30-18:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 6</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 7</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 8</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">18:00-19:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Dinner Symposium</p>
						</td>
						<td bgcolor="#FFFAE2" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">AOASO Council Meeting</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">19:00-22:00</p>
						</td>
						<td bgcolor="#FFE9E9" colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Conference Dinner</p>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			
			<p class="subheader2" style="box-sizing: border-box; margin-top: 0px; margin-bottom: -3px; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; font-family: &quot;Open Sans&quot;, sans-serif;"><br style="box-sizing: border-box;" />
			6 August 2023 (Sunday)</p>
			
			<div style="box-sizing: border-box; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255); overflow-x: auto;">
			<table class="table-prog" style="border-collapse: collapse; width: 1110px; border: 3px solid rgb(3, 115, 135);">
				<tbody style="box-sizing: border-box;">
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Time</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 1</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 2</span></p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); background: rgb(3, 115, 135); color: rgb(255, 255, 255); vertical-align: middle; font-size: 18px; line-height: 28px;" valign="top" width="29%">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><span style="box-sizing: border-box; font-weight: bolder;">Room 3</span></p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">08:00-09:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Breakfast Symposium 3</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Breakfast Symposium 4</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">09:00-10:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 3</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">10:00-10:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Coffee Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">10:30-12:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 9</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 10</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 11</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">12:00-13:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">12:00-13:00</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Symposium 3</p>
						</td>
						<td bgcolor="#E2FFEF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Lunch Symposium 4</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">13:30-14:30</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 4</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">14:30-16:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 12</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 13</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Symposium 14</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">16:00-16:30</p>
						</td>
						<td colspan="3" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Coffee Break/Poster Viewing</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">16:30-17:30</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Plenary Lecture 5</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
					<tr style="box-sizing: border-box;">
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135); text-align: center; background: rgb(244, 244, 244);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">17:30-18:00</p>
						</td>
						<td bgcolor="#E0F9FF" style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">Closing Ceremony</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p align="center" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
						<td style="box-sizing: border-box; padding: 5px; border: thin solid rgb(3, 115, 135);" valign="top">
						<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;">&nbsp;</p>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><em style="box-sizing: border-box;">*The programme is subject to change without prior notice.</em></p>
			','file_names' => '[]','status' => '1','created_at' => '2023-02-13 21:35:04','updated_at' => '2023-02-13 21:35:04','updated_UID' => '1'),
  array('id' => '4','MID' => '13','summary_tw' => NULL,'summary_cn' => NULL,'summary_en' => NULL,'content_tw' => NULL,'content_cn' => NULL,'content_en' => '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">The organizer reserved a number of rooms at the following hotels which are within walking distance to the AOCO 2023 Conference Venue (Hong Kong Convention and Exhibition Centre - HKCEC).</p>
			
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><img alt="" class="img100" src="https://aoco2023hk.org/images/location_map-01.jpg" style="box-sizing: border-box; vertical-align: middle; border-style: none; width: 1110px;" /></p>
			
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">&nbsp;</p>
			
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><span class="subheader2" style="box-sizing: border-box; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; margin-bottom: -3px;">Renaissance Harbour View Hotel</span><br style="box-sizing: border-box;" />
			<em style="box-sizing: border-box;">(1 Harbour Road, Wanchai)</em></p>
			
			<div class="hotel1" style="box-sizing: border-box; display: inline-block; vertical-align: text-top; width: 444px; margin-right: 22.1875px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><img alt="" class="img100" src="https://aoco2023hk.org/images/Renaissance3.jpg" style="box-sizing: border-box; vertical-align: middle; border-style: none; width: 444px;" /></div>
			
			<div class="hotel2" style="box-sizing: border-box; display: inline-block; vertical-align: text-top; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /><br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/marker.png" style="width: 20px;" />&nbsp;within the same complex of HKCEC<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/bed.png" style="width: 20px;" />&nbsp;Room with daily breakfast for 1 person<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/dollar.png" style="width: 20px;" />&nbsp;from HK$1,600+10%<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/bookmark.png" style="width: 20px;" />&nbsp;<a href="https://www.marriott.com/en-us/hotels/hkghv-renaissance-hong-kong-harbour-view-hotel/overview/?scid=9e0c7c29-3326-458f-b6a7-69221d4eb9a6&amp;gclid=EAIaIQobChMIg-vns4nO_AIVHdpMAh3KMQj8EAAYASAAEgJfivD_BwE&amp;gclsrc=aw.ds" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;" target="_blank">Website</a><br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/link.png" style="width: 20px;" />&nbsp;Booking Link (to be available soon)</p>
			</div>
			
			<hr class="hr01" style="box-sizing: content-box; height: 0px; overflow: visible; margin-top: 1rem; margin-bottom: 1rem; border-right: 0px; border-bottom: 0px; border-left: 0px; border-image: initial; border-top-style: dashed; border-top-color: rgb(11, 156, 201); color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);" />
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><span class="subheader2" style="box-sizing: border-box; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; margin-bottom: -3px;">Gloucester Luk Kwok Hong Kong</span><br style="box-sizing: border-box;" />
			<em style="box-sizing: border-box;">(72 Gloucester Road, Wanchai)</em></p>
			
			<div class="hotel1" style="box-sizing: border-box; display: inline-block; vertical-align: text-top; width: 444px; margin-right: 22.1875px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><img alt="" class="img100" src="https://aoco2023hk.org/images/Gloucester-Luk-Kwok.jpg" style="box-sizing: border-box; vertical-align: middle; border-style: none; width: 444px;" /></div>
			
			<div class="hotel2" style="box-sizing: border-box; display: inline-block; vertical-align: text-top; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /><br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/marker.png" style="width: 20px;" />&nbsp;5-min walk to HKCEC<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/bed.png" style="width: 20px;" />&nbsp;Room with daily breakfast for 1 person<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/dollar.png" style="width: 20px;" />&nbsp;from HK$1,030+10%<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/bookmark.png" style="width: 20px;" />&nbsp;<a href="https://gloucesterlukkwok.com.hk/hotel/" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;" target="_blank">Website</a><br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/link.png" style="width: 20px;" />&nbsp;<a href="https://aoco2023hk.org/doc/Gloucester-Luk-Kwok-AOCO2023-Reservation-Form.doc" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;" target="_blank">Download Booking Form</a></p>
			</div>
			
			<hr class="hr01" style="box-sizing: content-box; height: 0px; overflow: visible; margin-top: 1rem; margin-bottom: 1rem; border-right: 0px; border-bottom: 0px; border-left: 0px; border-image: initial; border-top-style: dashed; border-top-color: rgb(11, 156, 201); color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);" />
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><span class="subheader2" style="box-sizing: border-box; font-size: 24px; font-weight: bold; color: rgb(0, 139, 128); display: inline-block; margin-bottom: -3px;">The Harbourview</span><br style="box-sizing: border-box;" />
			<em style="box-sizing: border-box;">(4 Harbour Road, Wanchai)</em></p>
			
			<div class="hotel1" style="box-sizing: border-box; display: inline-block; vertical-align: text-top; width: 444px; margin-right: 22.1875px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);"><img alt="" class="img100" src="https://aoco2023hk.org/images/The-Harbourview.jpg" style="box-sizing: border-box; vertical-align: middle; border-style: none; width: 444px;" /></div>
			
			<div class="hotel2" style="box-sizing: border-box; display: inline-block; vertical-align: text-top; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">
			<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;"><img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /> <img alt="" src="/apsc/content/files/star.png" style="width: 20px;" /><br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/marker.png" style="width: 20px;" />&nbsp;3-min walk to HKCEC<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/bed.png" style="width: 20px;" />&nbsp;Room with daily breakfast for 1 person<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/dollar.png" style="width: 20px;" />&nbsp;from HK$770<br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/bookmark.png" style="width: 20px;" />&nbsp;<a style="box-sizing: border-box; color: rgb(52, 152, 219); background-color: transparent;">Website</a><br style="box-sizing: border-box;" />
			<img alt="" src="/apsc/content/files/link.png" style="width: 20px;" />&nbsp;<a href="https://aoco2023hk.org/doc/The-Harbourview-Booking-Form.docx" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;" target="_blank">Download Booking Form</a></p>
			</div>
			
			<hr class="hr01" style="box-sizing: content-box; height: 0px; overflow: visible; margin-top: 1rem; margin-bottom: 1rem; border-right: 0px; border-bottom: 0px; border-left: 0px; border-image: initial; border-top-style: dashed; border-top-color: rgb(11, 156, 201); color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);" />
			<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">
				<li style="box-sizing: border-box;">Please refer to the booking terms and cancellation policy of each hotel when you make reservation.</li>
				<li style="box-sizing: border-box;">For enquiries and assistance, please contact AOCO 2023 Secretariat by email:&nbsp;<a href="mailto:info@aoco2023hk.org" style="box-sizing: border-box; color: rgb(52, 152, 219); text-decoration-line: none; background-color: transparent;">info@aoco2023hk.org</a>&nbsp;or by phone: (852) 2559 9973.</li>
			</ul>
			','file_names' => '[]','status' => '1','created_at' => '2023-02-14 09:19:26','updated_at' => '2023-02-14 10:00:16','updated_UID' => '1')
		]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page_type1}}');
    }
}
