<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%general}}`.
 */
class m211107_204232_create_call_for_abstract_text_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%call_for_abstract_text}}', [
            'id'                 => $this->primaryKey(),
            'intro_tw'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'intro_cn'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'intro_en'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'login_tw'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'login_cn'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'login_en'           => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'signup_tw'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'signup_cn'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'signup_en'          => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'home_tw'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'home_cn'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'home_en'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_intro_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_intro_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_intro_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_title_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_title_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_title_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_ptype_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_ptype_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_ptype_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_keyword_tw'      => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_keyword_cn'      => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_keyword_en'      => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_theme_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_theme_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_theme_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_affl_tw'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_affl_cn'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_affl_en'         => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_author_tw'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_author_cn'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_author_en'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_content_tw'      => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_content_cn'      => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_content_en'      => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_table_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_table_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_table_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_young_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_young_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_young_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_review_tw'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_review_cn'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_review_en'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_submit_tw'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_submit_cn'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_submit_en'       => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_terms_tw'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_terms_cn'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'ab_terms_en'        => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'edit_tw'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'edit_cn'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'edit_en'            => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'created_at'         => $this->dateTime().' DEFAULT NOW()',
            'updated_at'         => $this->timestamp(),
            'updated_UID'        => $this->integer(),
        ]);

        $this->batchInsert('{{%call_for_abstract_text}}', [
            'id',
            'intro_tw',
            'intro_cn',
            'intro_en',
            'login_tw',
            'login_cn',
            'login_en',
            'signup_tw',
            'signup_cn',
            'signup_en',
            'home_tw',
            'home_cn',
            'home_en',
            'ab_intro_tw',
            'ab_intro_cn',
            'ab_intro_en',
            'ab_title_tw',
            'ab_title_cn',
            'ab_title_en',
            'ab_ptype_tw',
            'ab_ptype_cn',
            'ab_ptype_en',
            'ab_keyword_tw',
            'ab_keyword_cn',
            'ab_keyword_en',
            'ab_theme_tw',
            'ab_theme_cn',
            'ab_theme_en',
            'ab_affl_tw',
            'ab_affl_cn',
            'ab_affl_en',
            'ab_author_tw',
            'ab_author_cn',
            'ab_author_en',
            'ab_content_tw',
            'ab_content_cn',
            'ab_content_en',
            'ab_table_tw',
            'ab_table_cn',
            'ab_table_en',
            'ab_young_tw',
            'ab_young_cn',
            'ab_young_en',
            'ab_review_tw',
            'ab_review_cn',
            'ab_review_en',
            'ab_submit_tw',
            'ab_submit_cn',
            'ab_submit_en',
            'ab_terms_tw',
            'ab_terms_cn',
            'ab_terms_en',
            'edit_tw',
            'edit_cn',
            'edit_en',
            'created_at',
            'updated_at',
            'updated_UID',
        ], [
            array('id' => '1','intro_tw' => NULL,'intro_cn' => NULL,'intro_en' => '<p style="box-sizing: border-box; margin: 0px 0px 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;"><span class="subheader1" style="box-sizing: border-box; font-size: 20px; font-weight: bold; color: #3C8980; padding-bottom: 10px; padding-top: 15px; display: inline-block;">Important Dates:</span></p>

<p style="box-sizing: border-box; margin: 0px 0px 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px;">Deadline for Abstract Submission:&nbsp;<strong style="box-sizing: border-box; margin-left: 0px !important;">30 June 2023</strong><br style="box-sizing: border-box;" />
Notification of Acceptance:&nbsp;<strong style="box-sizing: border-box; margin-left: 0px !important;">August 2023</strong><br style="box-sizing: border-box;" />
Registration Deadline for Presenting Author:&nbsp;<strong style="box-sizing: border-box; margin-left: 0px !important;">30 Sept 2023</strong></p>

<p class="subheader1" style="box-sizing: border-box; margin: 0px 0px 1rem; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 20px; font-weight: bold; color: #3C8980; padding-bottom: 10px; padding-top: 15px; display: inline-block;">Themes:</p>

<ol style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify;">
	<li style="box-sizing: border-box; text-align: left;">Epidemiology</li>
	<li style="box-sizing: border-box; text-align: left;">Acute Management</li>
	<li style="box-sizing: border-box; text-align: left;">Prognosis/Outcome of Stroke</li>
	<li style="box-sizing: border-box; text-align: left;">Pathophysiology of Stroke</li>
	<li style="box-sizing: border-box; text-align: left;">Intracranial Atherosclerosis</li>
	<li style="box-sizing: border-box; text-align: left;">Basic Neuroscience in Stroke</li>
	<li style="box-sizing: border-box; text-align: left;">Clinical trials</li>
	<li style="box-sizing: border-box; text-align: left;">COVID-19, Infections and Stroke</li>
	<li style="box-sizing: border-box; text-align: left;">Endovascular Approach</li>
	<li style="box-sizing: border-box; text-align: left;">Image</li>
	<li style="box-sizing: border-box; text-align: left;">Late Breaking Trials</li>
	<li style="box-sizing: border-box; text-align: left;">Life Style Modification</li>
	<li style="box-sizing: border-box; text-align: left;">Pharmaceutic Approach</li>
	<li style="box-sizing: border-box; text-align: left;">Risk Factors and Prevention of Stroke</li>
	<li style="box-sizing: border-box; text-align: left;">Anticoagulation</li>
	<li style="box-sizing: border-box; text-align: left;">Antiplatelets</li>
	<li style="box-sizing: border-box; text-align: left;">Hypertension Control</li>
	<li style="box-sizing: border-box; text-align: left;">Hyperglycemia Control</li>
	<li style="box-sizing: border-box; text-align: left;">Hyperlipidemia Control</li>
	<li style="box-sizing: border-box; text-align: left;">Rehabilitation &amp; Restorative Therapy in Stroke</li>
	<li style="box-sizing: border-box; text-align: left;">Surgical Approach</li>
	<li style="box-sizing: border-box; text-align: left;">Thrombectomy</li>
	<li style="box-sizing: border-box; text-align: left;">Thrombolysis</li>
	<li style="box-sizing: border-box; text-align: left;">Vascular Sonology</li>
	<li style="box-sizing: border-box; text-align: left;">Others</li>
</ol>

<p class="subheader1" style="box-sizing: border-box; margin: 0px 0px 1rem; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 20px; font-weight: bold; color: #3C8980; padding-bottom: 10px; padding-top: 15px; display: inline-block;">Guidelines:</p>

<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify;">
	<li style="box-sizing: border-box; text-align: left;">Abstract must be submitted in&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">English</span>.</li>
	<li style="box-sizing: border-box; text-align: left;">Word limit for abstract title is&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">50 words</span>.</li>
	<li style="box-sizing: border-box; text-align: left;">Word limit for abstract content is&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">400 words</span>.</li>
	<li style="box-sizing: border-box; text-align: left;">Each abstract&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">cannot contain more than</span>&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">1 table / graphic / representative figure (if any)</span>&nbsp;as supporting document.</li>
	<li style="box-sizing: border-box; text-align: left;">There is no limit of no. of abstract submission.</li>
	<li style="box-sizing: border-box; text-align: left;">Abstract&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">cannot be edited once submitted</span>.</li>
	<li style="box-sizing: border-box; text-align: left;">If you wish to withdraw the abstract, please send&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">written request to Conference Secretariat by email</span>.</li>
	<li style="box-sizing: border-box; text-align: left;">You are recommended to organize the body of the abstract as follows:
	<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding-bottom: 10px;">
		<li style="box-sizing: border-box; text-align: left;"><span style="box-sizing: border-box; font-weight: bolder;">Background</span></li>
		<li style="box-sizing: border-box; text-align: left;"><span style="box-sizing: border-box; font-weight: bolder;">Objective</span></li>
		<li style="box-sizing: border-box; text-align: left;"><span style="box-sizing: border-box; font-weight: bolder;">Methods</span></li>
		<li style="box-sizing: border-box; text-align: left;"><span style="box-sizing: border-box; font-weight: bolder;">Results</span></li>
		<li style="box-sizing: border-box; text-align: left;"><span style="box-sizing: border-box; font-weight: bolder;">Conclusion(s)</span></li>
	</ul>
	</li>
	<li style="box-sizing: border-box; text-align: left;">The Organizing Committee reserves the right to reject and/or to edit the abstract.</li>
</ul>

<p class="subheader1" style="box-sizing: border-box; margin: 0px 0px 1rem; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 20px; font-weight: bold; color: #3C8980; padding-bottom: 10px; padding-top: 15px; display: inline-block;">Awards:</p>

<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; text-align: justify;">
	<li style="box-sizing: border-box; text-align: left;">APSO Best Free Paper Award (10 quotas)</li>
	<li style="box-sizing: border-box; text-align: left;">Best Young Investigator&rsquo;s Award (5 quotas)</li>
	<li style="box-sizing: border-box; text-align: left;">Best Presentation Award (10 quotas)</li>
</ul>
','login_tw' => NULL,'login_cn' => NULL,'login_en' => '<p><span style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;"><span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #444444; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;"><span data-mce-style="font-size: 15pt; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #444444; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 15pt; float: none; display: inline !important;"><strong style="box-sizing: border-box;color:#3C8980;">Abstract Submission Portal Sign In</strong></span><br style="box-sizing: border-box;" />
<br style="box-sizing: border-box;" />
Please sign into the&nbsp;Abstract Submission&nbsp;Portal with your account email address and password.<strong style="box-sizing: border-box;">&nbsp;</strong>&nbsp;If you have any questions regarding your submission, please refer to our&nbsp;<span data-mce-style="font-size: 13pt;" style="box-sizing: border-box; font-size: 13pt;"><a data-mce-href="https://www.hkccasc.com/" href="http://www.aoco2023hk.org/" style="box-sizing: border-box; background: transparent; color: rgb(73, 195, 101); text-decoration-line: none; font-size: 13pt;"><span data-mce-style="font-size: 13pt;" style="box-sizing: border-box; font-size: 13pt;">website</span></a><span data-mce-style="font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #444444; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; float: none; display: inline !important;">&nbsp;and&nbsp;</span></span></span><span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #444444; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">contact us via email&nbsp;(</span></span><span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #444444; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; color: rgb(68, 68, 68); display: inline !important;"><a data-mce-href="mailto:program@hkccasc.com" href="mailto:program@aoco2023hk.org" style="box-sizing: border-box; background: transparent; color: rgb(73, 195, 101); text-decoration-line: none;">program@aoco2023hk.org</a><span style="box-sizing: border-box; color: rgb(0, 0, 0);">).</span><br style="box-sizing: border-box;" />
<br style="box-sizing: border-box;" />
<span data-mce-style="color: #000000;" style="box-sizing: border-box; color: rgb(0, 0, 0);"><strong style="box-sizing: border-box;">Submission</strong>&nbsp;<strong style="box-sizing: border-box;">Deadline:&nbsp;</strong></span><span data-mce-style="color: #ff0000;" style="box-sizing: border-box; color: rgb(255, 0, 0);"><strong style="box-sizing: border-box;">31&nbsp;March 2023</strong></span></span></p>
','signup_tw' => NULL,'signup_cn' => NULL,'signup_en' => '<h2 style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-weight: 500; line-height: 1.1; margin-top: 15pt; margin-bottom: 7.5pt; font-size: 16pt; color: #3C8980;">Create Account</h2>

<div class="default-bottom-margin" style="box-sizing: border-box; margin-bottom: 15px; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #020202; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">You must create a primary contact before you can submit an abstract.&nbsp;</span><br data-mce-style="box-sizing: border-box; font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; font-weight: 400; color: #020202; font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; color: rgb(2, 2, 2);" />
<span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #020202; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">Please click on the&nbsp;</span><strong data-mce-style="box-sizing: border-box; font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; font-weight: bold; color: #020202; font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial;">&quot;Create Contact&quot;</strong><span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #020202; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">&nbsp;button below to create a new primary contact.&nbsp;</span><br data-mce-style="box-sizing: border-box; font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; font-weight: 400; color: #444444; font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; color: rgb(68, 68, 68);" />
<span data-mce-style="box-sizing: border-box; color: #0a0a0a;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;"><span data-mce-style="box-sizing: border-box; font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; float: none; display: inline !important;">After creating a contact,&nbsp;additional tabs will appear that will enable you to upload and submit your abstract.</span></span></span></div>
','home_tw' => NULL,'home_cn' => NULL,'home_en' => '<p><span style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;"><span data-mce-style="box-sizing: border-box; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;"><span data-mce-style="box-sizing: border-box; font-size: 15pt; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #050404; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 15pt; float: none; display: inline !important;"><strong style="box-sizing: border-box;color:#3C8980;">Welcome to the Abstract Submission Portal</strong></span><br style="box-sizing: border-box;" />
<br style="box-sizing: border-box;" />
Welcome to the Abstract&nbsp;Submission&nbsp;Portal of the Asia-Oceania Conference on Obesity 2023!&nbsp;</span><br style="box-sizing: border-box; font-size: 17px; font-family: Arial; color: rgb(5, 4, 4);" />
<br style="box-sizing: border-box; font-size: 17px; font-family: Arial; color: rgb(5, 4, 4);" />
<span style="box-sizing: border-box; font-size: 17px; font-family: Arial;">Please click&nbsp;</span><span data-mce-style="color: #b31d1d;" style="box-sizing: border-box; font-size: 17px; font-family: Arial;"><strong style="box-sizing: border-box;">&quot;<span style="box-sizing: border-box; color: rgb(1, 180, 144);">Contact&nbsp;Information</span>&quot;</strong></span><span style="box-sizing: border-box; font-size: 17px; font-family: Arial;">&nbsp;to continue your submission.&nbsp;</span></span><br style="box-sizing: border-box;" />
<br style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;" />
<span style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;"><strong style="box-sizing: border-box; font-size: 17px; font-family: Arial;"><span data-mce-style="font-family: Arial; color: #242020;" style="box-sizing: border-box;"><strong style="box-sizing: border-box;color:#3C8980;">Important Dates:</strong></span></strong><br style="box-sizing: border-box;" />
<span data-mce-style="color: #000000;" style="box-sizing: border-box; font-size: 17px; font-family: Arial;">Deadline for Abstract Submission:<strong style="box-sizing: border-box;">&nbsp;<span data-mce-style="color: #ff0000;" style="box-sizing: border-box; color: rgb(255, 0, 0);">31&nbsp;March 2023</span></strong><br style="box-sizing: border-box;" />
Notification of Acceptance:<strong style="box-sizing: border-box;">&nbsp;<span data-mce-style="color: #ff0000;" style="box-sizing: border-box; color: rgb(255, 0, 0);">April 2023</span></strong><br style="box-sizing: border-box;" />
Registration Deadline for Presenting Author:&nbsp;<strong style="box-sizing: border-box;"><span data-mce-style="color: #ff0000;" style="box-sizing: border-box; color: rgb(255, 0, 0);">31 May 2023</span></strong></span></span></p>
','ab_intro_tw' => NULL,'ab_intro_cn' => NULL,'ab_intro_en' => '<h2 style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-weight: 500; line-height: 1.1; margin-top: 15pt; margin-bottom: 7.5pt; font-size: 16pt; color: #3C8980;">Abstract Submission</h2>

<div class="default-bottom-margin" style="box-sizing: border-box; margin-bottom: 15px; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">
<p style="box-sizing: border-box; margin: 0px 0px 7.5pt;"><span style="box-sizing: border-box; font-size: 13pt; font-family: Arial; color: rgb(7, 7, 7);"><span style="box-sizing: border-box; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 13pt;">Welcome to the Abstract Submission&nbsp;Portal of the Asia-Oceania Conference on Obesity 2023!</span><br style="box-sizing: border-box;" />
<br style="box-sizing: border-box;" />
Please use this page to make a new submission.&nbsp;</span>Each of the tabs on the left will bring up a step in the submission process that needs to be completed.<br style="box-sizing: border-box;" />
At any time in the process, you can click&nbsp;<strong style="box-sizing: border-box;">&quot;Save As Draft&quot;</strong>&nbsp;to save your incomplete submission and return to it later.<br style="box-sizing: border-box;" />
The Review section will give you an overview of the sections that are still required to be completed before you can submit your abstract.<br style="box-sizing: border-box;" />
Once all required sections have been completed, you can submit your abstract in the&nbsp;<strong style="box-sizing: border-box;">Submit</strong>&nbsp;section of this page.<br style="box-sizing: border-box;" />
<span style="box-sizing: border-box; color: rgb(249, 4, 4);">Please make sure the submission status&nbsp;indicates &quot;Submitted&quot;. If the status indicates &quot;Draft&quot;, it means that your submission has not been completed.</span><br style="box-sizing: border-box;" />
You can visit our&nbsp;<a href="https://www.aoco2023hk.org/call_for_abstracts.html" rel="noopener" style="box-sizing: border-box; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(73, 195, 101); text-decoration-line: none;" target="_blank">website</a>&nbsp;for details and guidelines of Abstract Submission.</span><br style="box-sizing: border-box; font-size: 14px; font-family: &quot;DM Sans&quot;, sans-serif; color: rgb(99, 102, 146);" />
<br style="box-sizing: border-box;" />
<span style="box-sizing: border-box; font-family: Arial;"><strong style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 13pt; color: rgb(255, 0, 0);">Deadline for Abstract Submission:&nbsp;31 March 2023</span></strong></span></p>
</div>
','ab_title_tw' => NULL,'ab_title_cn' => NULL,'ab_title_en' => '<p><span data-mce-style="white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">Abstract title must be in&nbsp;</span><strong style="box-sizing: border-box; font-size: 17px; font-family: Arial;">Title Case</strong><span style="box-sizing: border-box; font-size: 17px; font-family: Arial;">:&nbsp;</span><span data-mce-style="font-size: 12pt; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #000000; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 12pt; font-family: Arial; float: none; display: inline !important;">Capitalise the first letter of each word, except articles and prepositions when they are not the first word of the title.</span><br style="box-sizing: border-box;" />
<br data-mce-style="font-size: 14px; font-family: -apple-system, BlinkMacSystemFont, \'avenir next\', avenir, helvetica, \'helvetica neue\', ubuntu, roboto, noto, \'segoe ui\', arial, sans-serif; white-space: normal; word-spacing: 0px; text-transform: none; font-weight: 400; color: #031d39; font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 14px; font-family: -apple-system, BlinkMacSystemFont, &quot;avenir next&quot;, avenir, helvetica, &quot;helvetica neue&quot;, ubuntu, roboto, noto, &quot;segoe ui&quot;, arial, sans-serif; color: rgb(3, 29, 57);" />
<span data-mce-style="white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">The title should be brief and descriptive to reflect the content of the abstract, and must be&nbsp;</span><strong data-mce-style="white-space: normal; word-spacing: 0px; text-transform: none; font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial;">no more than&nbsp;50 words in English</strong><span data-mce-style="white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">.&nbsp;<span data-mce-style="font-size: 12pt; font-family: Arial; color: #000000;" style="box-sizing: border-box; font-size: 12pt;">This title will be used in all&nbsp;Conference materials such as the Programme Book, Proceedings and&nbsp;Conference website.</span></span><br style="box-sizing: border-box;" />
<br style="box-sizing: border-box;" />
<span data-mce-style="color: #000000;" style="box-sizing: border-box; font-size: 17px; font-family: Arial;"><span data-mce-style="white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; float: none; display: inline !important;">(PLEASE&nbsp;</span><strong data-mce-style="white-space: normal; word-spacing: 0px; text-transform: none; font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box;">DO NOT</strong><span data-mce-style="white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; float: none; display: inline !important;">&nbsp;INPUT AUTHOR DETAILS AND AFFILIATIONS HERE)</span></span></p>
','ab_ptype_tw' => NULL,'ab_ptype_cn' => NULL,'ab_ptype_en' => '<p><span style="font-family: Arial; font-size: 17px;">Please indicate your preferred presentation format (the Organizing Committee of the APSC2023 reserves the right to accept or refuse an abstract, to designate abstracts either oral or poster presentation, and to choose a suitable session for the abstract. The authors&#39; preference of the type of presentation and theme will be taken into account.):</span></p>

<p><span style="font-family: Arial; font-size: 17px;">Please choose a&nbsp;presentation type&nbsp;from the list below.</span></p>
','ab_keyword_tw' => NULL,'ab_keyword_cn' => NULL,'ab_keyword_en' => '<p><span style="font-family: Arial; font-size: 17px;">Please input 3 key words related to your abstract (e.g. Anticoagulation, Epidemiology, Thrombolysis, etc.)</span></p>
','ab_theme_tw' => NULL,'ab_theme_cn' => NULL,'ab_theme_en' => '<p><span style="font-family: Arial; font-size: 17px;">Please choose a theme from the list below.</span></p>
','ab_affl_tw' => NULL,'ab_affl_cn' => NULL,'ab_affl_en' => '<p><span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #000000; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">Please enter the affiliations for ALL authors.</span></p>
','ab_author_tw' => NULL,'ab_author_cn' => NULL,'ab_author_en' => '<p><span style="font-family: Arial; font-size: 17px;">Please enter the details for each author below and indicate the presenter.</span></p>
','ab_content_tw' => NULL,'ab_content_cn' => NULL,'ab_content_en' => '<p style="box-sizing: border-box; margin: 0px; font-family: Arial; font-size: 17.3333px; line-height: 20px;"><span data-mce-style="font-size: 13pt; font-family: Arial;" style="box-sizing: border-box;">Please enter your abstract below.<br style="box-sizing: border-box;" />
<br style="box-sizing: border-box;" />
Abstracts must confirm to the requirements as outlined:</span></p>

<p style="box-sizing: border-box; margin: 0px; font-family: Arial; font-size: 17.3333px; line-height: 20px;">&nbsp;</p>

<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 7.5pt; font-family: Arial; font-size: 17.3333px;">
	<li style="box-sizing: border-box;">Your abstract submission must be in&nbsp;<strong style="box-sizing: border-box;">English</strong>.</li>
	<li style="box-sizing: border-box;">An abstract should be limited to&nbsp;<strong style="box-sizing: border-box;">400 words in English plus&nbsp;1 additional page of table / graphic / representative figure (if any)</strong>.</li>
	<li style="box-sizing: border-box;">Abstracts for presentations must be submitted via the submission portal by&nbsp;<span style="box-sizing: border-box; color: rgb(255, 0, 0);"><strong style="box-sizing: border-box;">31&nbsp;March&nbsp;2023</strong><span style="box-sizing: border-box; color: rgb(0, 0, 0);">.</span></span></li>
</ul>

<p style="box-sizing: border-box; margin: 0px; font-family: Arial; font-size: 17.3333px; line-height: 20px;"><br style="box-sizing: border-box;" />
<span data-mce-style="font-size: 13pt; font-family: Arial;" style="box-sizing: border-box;"><span data-mce-style="color: #000000;" style="box-sizing: border-box;">When abbreviations are used, please write out the abbreviated words in full at the first mention and follow them with the abbreviation in parenthesis.</span></span></p>
','ab_table_tw' => NULL,'ab_table_cn' => NULL,'ab_table_en' => '<p><span style="font-family: Arial; font-size: 17px;">Please upload your table / graphic / representative figure here (if any).</span></p>
','ab_young_tw' => NULL,'ab_young_cn' => NULL,'ab_young_en' => '<h3 class="well-heading" style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-weight: 500; line-height: 1.1; margin-top: 0px; margin-bottom: 7.5pt; font-size: 14pt; color: #3C8980;">I am eligible for Young Investigator Award.</h3>

<p>(Applications MUST be 40 years old or below. Awardees will be requested to provide document proof before receiving the award.)</p>','ab_review_tw' => NULL,'ab_review_cn' => NULL,'ab_review_en' => '<p><span style="font-family: Arial; font-size: 17px;">Below is a summary of your completed submission. Any sections that are still required to be completed for submission are noted in red.</span></p>
','ab_submit_tw' => NULL,'ab_submit_cn' => NULL,'ab_submit_en' => '<p><span data-mce-style="color: #000000;" style="box-sizing: border-box; font-size: 14px; font-family: &quot;DM Sans&quot;, sans-serif;"><span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">If there are any remaining fields to complete you will only have the option to save your submission as a draft until they are completed.&nbsp;</span><br data-mce-style="box-sizing: border-box; font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; font-weight: 400; color: #444444; font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; color: rgb(68, 68, 68);" />
<span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; display: inline !important;">If all required abstract submission fields have been completed you will have the option to submit your abstract at the bottom of the page.</span></span><span data-mce-style="font-size: 17px; font-family: Arial; white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; color: #444444; font-style: normal; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #fcfcfc; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; font-size: 17px; font-family: Arial; float: none; color: rgb(68, 68, 68); display: inline !important;">&nbsp;</span></p>
','ab_terms_tw' => NULL,'ab_terms_cn' => NULL,'ab_terms_en' => '<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 7.5pt; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">
	<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">Presenting author of abstracts must&nbsp;register as a conference participant.</span></li>
	<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">The abstracts cannot be edited once submitted.&nbsp;<span style="box-sizing: border-box;">An author may request in writing to withdraw an abstract if an error is found on the abstract submitted.</span></span></li>
	<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">All abstracts will be reviewed by the Abstract Review Committee.</span></li>
	<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">The Organizing Committee reserves the right to reject and/or to edit the abstract.</span></li>
	<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">Before submitting the abstract, the Abstract Submitter&nbsp;is required to confirm the followings:&nbsp;</span>
	<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0px;">
		<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">I confirm that I previewed this abstract and all information is correct. I accept that the content of this abstract cannot be modified after final submission.</span></li>
		<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">Submission of the abstract constitutes my consent to publish in all Conference&rsquo;s publications (e.g. Conference website, programme, programme book, etc.)</span></li>
		<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">The Abstract Submitter warrants and represents that he/she is the sole owner or has the rights of all the information and content (&ldquo;Content&rdquo;) provided to the&nbsp;<span style="box-sizing: border-box;">Asia-Oceania Conference on Obesity 2023 (AOCO 2023)</span>. The publication of the abstract does not infringe any third party rights including, but not limited to, intellectual property rights.</span></li>
		<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">The Abstract Submitter grants the Organizers a royalty-free, perpetual, irrevocable nonexclusive license to use, reproduce, publish, translate, distribute, and display the Content.</span></li>
		<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">The Organizers reserve the right to remove an abstract which does not comply with the above from any publication.</span></li>
		<li style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 12pt; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);">I herewith confirm that the contact details saved in this system are those of the corresponding author, who will be notified about the status of the abstract. The corresponding author is responsible for informing the other authors about the status of the abstract.</span></li>
	</ul>
	</li>
</ul>
','edit_tw' => NULL,'edit_cn' => NULL,'edit_en' => '<h2 style="box-sizing: border-box; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-weight: 500; line-height: 1.1; margin-top: 15pt; margin-bottom: 7.5pt; font-size: 16pt; color: #3C8980;">Edit Abstract</h2>

<div style="box-sizing: border-box; color: rgb(89, 89, 89); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14.6667px;">
<p style="box-sizing: border-box; margin: 0px; font-size: 14px; font-family: &quot;DM Sans&quot;, sans-serif; color: rgb(99, 102, 146); line-height: 20px;"><span data-mce-style="font-size: 13pt; font-family: Arial; color: #050505;" style="box-sizing: border-box; font-size: 13pt; font-family: Arial; color: rgb(5, 5, 5);">Your uploaded abstracts are listed below with their status.<br style="box-sizing: border-box;" />
<span data-mce-style="white-space: normal; word-spacing: 0px; text-transform: none; float: none; font-weight: 400; font-style: normal; text-align: left; orphans: 2; widows: 2; display: inline !important; letter-spacing: normal; background-color: #ffffff; text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;" style="box-sizing: border-box; float: none; background-color: rgb(255, 255, 255); display: inline !important;">Please feel free to check, amend or submit another abstract&nbsp;<span style="box-sizing: border-box; color: rgb(254, 12, 12);"><strong style="box-sizing: border-box;"><u style="box-sizing: border-box;">on or before&nbsp;31&nbsp;March&nbsp;2023</u></strong>.</span></span></span></p>
</div>
','created_at' => '2021-11-08 20:34:22','updated_at' => '2023-02-14 07:52:04','updated_UID' => '1')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%call_for_abstract_text}}');
    }
}
