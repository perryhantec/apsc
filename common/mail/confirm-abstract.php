<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Definitions;

$home_model = common\models\Home::findOne(1);

?>
<div style="padding:20px;">
    <div style="margin:20px 0 40px;font-size:13pt;">
        <div style="margin-bottom:20px;">Dear <?= $model->user->title ?> <?= $model->user->last_name ?>：</div>

        <p style="margin-bottom:20px;">Thank you for submitting your abstract to the Asia Pacific Stroke Conference (APSC) 2023 (1–3 December 2023, Hong Kong SAR). Your submission has been received.</p>
        <p style="margin-bottom:20px;">Please read the following information carefully. You are advised to mark your calendar with the important dates and deadlines, and save this message for future reference.</p>

        <div><strong><u>Check your submission for accuracy</u></strong></div>
        <p style="margin-bottom:20px;">Please ensure that all of the following information is complete and correct:</p>

        <div><b>Abstract Number</b>: <?= $model->abstract_no ?></div>
        <div><b>Abstract Submitter Name</b>: <?= $model->user->name ?></div>
        <div><b>Abstract Title</b>: <?= $model->title ?></div>
        <div><b>Presentation Type Preference</b>*: <?= Definitions::getPresentationType($model->present_type) ?></div>
        <div><b>Keyword 1</b>: <?= $model->keyword_1 ?></div>
        <div><b>Keyword 2</b>: <?= $model->keyword_2 ?></div>
        <div><b>Keyword 3</b>: <?= $model->keyword_3 ?></div>
        <div><b>Theme</b>: <?= Definitions::getTheme($model->theme) ?></div>
        <div><b>Abstract Authors</b>:</div>
        <div style="padding-left:20px;">
        <?php
            $i = $j = 1;
            $total_author = count($model->author);
            $total_affiliation = count($model->affiliation);
        ?>

        <?php foreach ($model->author as $author) { ?>
            <div>Title: <?= $author['tle'] ?></div>
            <div>First Name: <?= $author['first_name'] ?></div>
            <div>Last Name: <?= $author['last_name'] ?></div>
            <div>Presenter: <?= $author['is_presenter'] ? 'Yes' : 'No' ?></div>
            <div>Organization: <?= $author['organization'] ?></div>
            <div>Position: <?= $author['position'] ?></div>
            <div>Affiliations: <?= $author['affiliations'] ?></div>
            <?php
                if ($i < $total_author) { echo '<hr />'; } 
                $i++;
            ?>
        <?php } ?>
        </div>
        <div><b>Abstract Affiliation</b>:</div>
        <div style="padding-left:20px;">
        <?php foreach ($model->affiliation as $affiliation) { ?>
            <div>Row: <?= $j ?></div>
            <div>Affiliation: <?= $affiliation['affiliation'] ?></div>
            <div>City/Suburb/Town: <?= $affiliation['city'] ?></div>
            <div>State: <?= $affiliation['state'] ?></div>
            <div>Country: <?= $affiliation['country'] ?></div>
            <?php
                if ($j < $total_affiliation) { echo '<hr />'; } 
                $j++;
            ?>
        <?php } ?>
        </div>

        <div><b>Young Investigator Award</b>: <?= Definitions::getIsYoung($model->is_young) ?></div>
        <div><b>Registration Preference</b>: <?= Definitions::getIsRegistered($model->is_registered) ?></div>
        <br />

        <p style="margin-bottom:20px;">*Presentation type will be subject to the final decision of the International Scientific Committee (ISC)</p>

        <p style="margin-bottom:20px;color:red;text-decoration:underline;font-weight:bold;">
            It is your responsibility to make the necessary changes via the online abstract submission portal on or before 31 August 2023.
            You may also contact the Conference Secretariat at <a href="mailto:info@apsc2023hk.org">info@apsc2023hk.org</a> for assistance if you encounter any difficulty in making the chances. Please note that changes can no longer be made during or after the review period.
        </p>

        <div><strong><u>Communications from APSC 2023 Secretariat</u></strong></div>
        <p style="margin-bottom:20px;">Please set your spam filter to accept messages from "apsc2023hk.org", which is the address of our official email server.</p>

        <div><strong><u>About acceptance notification</u></strong></div>
        <p style="margin-bottom:20px;">
            You will receive a notification e-mail from the APSC 2023 Congress Secretariat regarding your abstract's acceptance status <b><u>on or before 30 Sept 2023</u></b>. Please save this email for future reference.
        </p>

        <p style="margin-bottom:20px;">
            If you have not received any notification e‐mails regarding your submission status by 30 Sept 2023, please contact the Conference Secretariat at <a href="mailto:info@apsc2023hk.org">info@apsc2023hk.org</a> with your name and abstract number.
        </p>

        <div><strong><u>Presenting author registration, sponsorships, and visa application</u></strong></div>
        <p style="margin-bottom:20px;">
            APSC 2023 Registration is now open. Presenting authors are required to register and complete payment via the online registration portal of the APSC 2023 official website (www.apsc2023hk.org). If you are haven’t registered with fees paid in full <b><u>on or before 15 October 2023</u></b>, your presentation will be disregarded and omitted from the program. If you have extenuating circumstances which would require later payment, please contact the Conference Secretariat at <a href="mailto:info@apsc2023hk.org">info@apsc2023hk.org</a> to make arrangements <b><u>on or before 15 October 2023</u></b>.
        </p>

        <p style="margin-bottom:20px;">
            The APSC 2023 does not provide any form of sponsorships for conference registration, accommodation or travel expenses. If you require any official documents to assist your visa or third-party funding applications, please contact the Conference Secretariat at <a href="mailto:info@apsc2023hk.org">info@apsc2023hk.org</a> for arrangements. You are encouraged to commence these applications as soon as possible since the process may take time.
        </p>

        <div><strong><u>Presenting author substitutions</u></strong></div>
        <p style="margin-bottom:20px;">
            Substitution requests for presenting authors may be made online <b><u>on or before 30 Sept 2023</u></b>. The substitute must be an original co‐author, must not be giving more than 2 presentations already, and will be listed as the presenting author in the conference documents.
        </p>

        <div><strong><u>Presentation Date, Time and Venue</u></strong></div>
        <p style="margin-bottom:20px;">
            If your abstract is accepted, the APSC 2023 Congress Secretariat will contact you by email <b><u>on or before 1 November 2023</u></b> to provide you with the date and time of your presentation, the allocated time, and other final information and instructions. Please save the email for future reference. If you do not receive any instructions regarding your accepted abstract <b><u>by 1 November 2023</u></b>, please contact the Conference Secretariat at <a href="mailto:info@apsc2023hk.org">info@apsc2023hk.org</a> with your name and abstract number.
        </p>

        <p style="margin-bottom:20px;">
            You are advised to be available for the duration of the conference. Due to the very large number of sessions and complex algorithm in program planning, we apologize that we will not able to accommodate specific requests for presentation sessions or time slots.
        </p>

        <div><strong><u>Refund on Registration Fee</u></strong></div>
        <p style="margin-bottom:20px;">
            Participants who fulfilled <b><u>ALL</u></b> of the following conditions will be eligible for a full cash refund on the APSC 2023 registration fee at the Conference site (Hong Kong Science Park, Hong Kong SAR) during the event:
        </p>

        <ol style="margin-bottom:20px;">
            <li>A <em>student participant</em>* from Hong Kong SAR, or Lower Income Country (LIC), or Lower Middle Income Country (LMIC), AND</li>
            <li>40 years old or below during the time when the Conference takes place, AND</li>
            <li>Submitted abstract(s) to the APSC 2023 and being accepted by the ISC, AND</li>
            <li>Registered for the APSC 2023 and attended the Conference physically, AND</li>
            <li>Completed the oral free paper presentation OR submitted the poster for poster presentation (subject to the instruction of the ISC)</li>
        </ol>

        <p style="margin-bottom:20px;">
            *Proof of student status will be required during the online registration process (e.g. student ID card / confirmation letter)
        </p>

        <p style="margin-bottom:20px;color:red;text-decoration:underline;font-weight:bold;">
            The Organizers of APSC 2023 reserve the final decision right of refund arrangements.
        </p>

        <div><strong><u>Please use your abstract number</u></strong></div>
        <p style="margin-bottom:20px;">
            To facilitate our staff and the Scientific Committee in assisting you, please always reference your name and submission number during your abstract submission queries.
        </p>

        <p style="margin-bottom:20px;">
            All queries should be sent to <a href="mailto:info@apsc2023hk.org">info@apsc2023hk.org</a>.
        </p>

        <div>Regards</div>
        <div>Jolin Ha</div>
        <div>Congress Secretariat</div>
        <div>APSC 2023</div>
    </div>
</div>