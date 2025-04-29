<?php

frontend\assets\ProgrammeAsset::register($this);

$js = <<<JS
    $(".table-basic").freezeTable();

    $(".table-scrollable").freezeTable({
    'scrollable': true,
    
    });
JS;

$this->registerJs($js);
?>
<style>
@media (min-width: 801px) {
    html {
        overflow-x: visible;
    }
}
.compensate-for-scrollbar {
    margin-right: 17px;
}
.programme, .lightbox > * {font-family: 'Roboto', "微軟正黑體", sans-serif;}
h1, h2, h3, h4 {
    font-family: 'Roboto', "微軟正黑體", sans-serif;
    margin: 0;
}
p{margin-bottom:0;}
.divider {
    height: 10px;
    line-height: 10px;
}
@media (min-width: 801px) {
    h3 {
        font-size: 23px;
        font-weight: 600;
        color: rgb(255, 102, 0);
    }

    .lightbox > h3 {
        color: rgb(60, 137, 128);
    }
    h3 {
        line-height: 140%;
    }
    p {
        line-height: 160%;
    }
    .NoShowInPC {
        display: none;
    }
}
@media (max-width: 800px) {
    .programme {
        color: #333;
        line-height: 150%;
        font-size: 14px;
        font-family: "微軟正黑體", "Roboto", sans-serif;
    }
    h3 {
        color: #00AFCC;
        font-size: 20px;
        /* font-weight: normal; */
    }
    h3 {
        line-height: 140%;
    }
    p {
        line-height: 150%;
    }
}
#table-basic th.top, #table-basic2 th.top {
    text-align: center;
    background: #fcd557;
    color: #000;
}
#table-basic th.top.r1, #table-basic2 th.top.r1 {
    background: #1b9e91;
    color: #FFF;
}
#table-basic th.top.r2, #table-basic2 th.top.r2 {
    background: #6f53a2;
    color: #FFF;
}
#table-basic th.top.r3, #table-basic2 th.top.r3 {
    background: #087ab5;
    color: #FFF;
}
#table-basic th.top.r4, #table-basic2 th.top.r4 {
    background: #b3683a;
    color: #FFF;
}
#table-basic thead th, #table-basic2 thead th, tbody th, tbody td {
    padding: 15px;
    border: 5px solid #FFF!important;
    text-align: center;
    vertical-align: middle;
    line-height: 130%;
    font-weight: normal;
}
#table-basic tbody th, #table-basic2 tbody th {
    font-size: 15px;
}
.table-striped tbody th {
    text-align: center;
    background: #e5e5e5;
    font-size: 15px;
    padding: 10px;
    border: 1px solid #B8B8B8;
    vertical-align: middle;
}
.Ylight {
    background: #fcee9d;
}
.Ymind {
    background: #f9c958;
}
.Ymind.r1 {
    background: #a9dbc6;
}
.Ymind.r2 {
    background: #c8bee5;
}
.Ymind.r3 {
    background: #c0ebf9;
}
.Ymind.r4 {
    background: #f3d2bc;
}
.ver {
    -webkit-writing-mode: vertical-rl;
    -moz-writing-mode: vertical-rl;
    -ms-writing-mode: vertical-rl;
    writing-mode: vertical-rl;
    background: #e5e5e5;
    color: #000;
}
#table-basic a, #table-basic2 a {
    color: #000;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    outline: none;
    text-decoration: underline !important;
}
#table-basic a:hover, #table-basic2 a:hover {
    color: #ff7d00;
}
.Bblue {
    background: #FFF;
}
.table-striped .top {
    background: #fcd557;
    color: #000;
}
.table-striped thead th, tbody th, tbody td {
    padding: 15px!important;
    border: 5px solid #FFF!important;
    text-align: center;
    vertical-align: middle!important;
    line-height: 130%!important;
}
.table-striped.d2 thead th, .table-striped.d2 tbody th, .table-striped.d2 tbody td {
    padding: 15px 8px!important;
}
.tableDisplay td {
    border: 1px solid #B8B8B8!important;
}
.hidden-content {
    max-width: 750px;
    display: none;
}
.lightbox {
    padding: 5px;
    font-size: 18px;
}
@media (max-width: 800px) {
    .lightbox {
        font-size: 14px;
    }
}
@media (max-width: 800px) {
    .hidden-content {
        max-width: 95%;
        display: none;
    }
}
@media (min-width: 801px) {
    article h1, .indexWrapper h1, .lightbox h1 {
        font-size: 31px;
        color: rgb(255, 102, 0);
        font-weight: bold;
        line-height: 140%;
        margin: 0;
    }
}
@media (max-width: 800px) {
    .lightbox h1 {
        font-size: 25px;
        color: #F39939;
        font-weight: bold;
        line-height: 140%;
        margin: 0;
    }
}
.tableDisplay {
    border-collapse: collapse;
    line-height: 120%;
    font-size: 16px;
}
.tableDisplay td {
    /* word-break: break-all; */
    border-bottom: 1px solid #E0E0E0;
    padding: 8px!important;
    font-size: 16px;
    text-align: left;
}
@media (max-width: 800px) {
    h4 {
        font-size: 16px;
        color: #F39939!important;
        font-weight: normal;
    }
}
@media (max-width: 800px) {
    h1, h2, h3, h4 {
        line-height: 140%;
    }
}
@media screen and (min-width: 801px) {
    h4 {
        font-size: 18px;
        color: #F39939!important;
        font-weight: normal;
    }
}
@media (min-width: 801px) {
    h1, h2, h3, h4 {
        line-height: 140%;
    }
}
</style>

<div class="programme">
    <h3>Day1 - 1 Dec 2023 (Fri)</h3>
    <p class="divider">&nbsp;</p>
    <p class="red NoShowInPC">Swipe the table left and right to show more</p>
    <p class="divider">&nbsp;</p>
    <div class="table-scrollable" style="height: auto; overflow-x: scroll;">
        <table cellspacing="0" id="table-basic" class="table table-sm table-striped" style="min-width:100%;">
            <thead>
                <tr>
                    <th class="top" width="7%">Time (UTC+8)</th>
                    <th class="top r1" width="18.4%">Room 1<br>(Grand Hall)<br>800 pax</th>
                    <th class="top r2" width="18.4%">Room 2<br>(CKK)<br>280 pax</th>
                    <th class="top r3" width="18.4%">Room 3<br>(CH05)<br>120 pax</th>
                    <th class="top r4" width="18.4%">Room 4<br>(CH06)<br>50 pax</th>
                    <th class="top" width="18.4%">Poster / Exhibition</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>08:00<br>|<br>08:30</th>
                    <td colspan="4" class="Ylight">Registration (08:30-17:30)</td>
                    <td rowspan="13" class="ver">Poster station at<br />CKK Pre-function Hall and Room 1
                    <br /><br />Exhibition at Grand Hall Pre-function area,<br />Function Hall and Green Trail</td>
                </tr>
                <tr>
                    <th>08:30<br>|<br>10:30</th>
                    <td class="Ymind r1"><a data-fancybox="" data-src="#Session1" href="javascript:;">Session 1:<br>Thrombectomy Workshop (Collaborate with SVIN)</a></td>
                    <td class="Ymind r2"><a data-fancybox="" data-src="#Session2" href="javascript:;">Session 2:<br>VasCog Asia 12 Workshop</a></td>
                    <td class="Ymind r3"><a data-fancybox="" data-src="#Session3" href="javascript:;">Session 3:<br>Neurosonology Workshop</a></td>
                </tr>
                <tr>
                    <th>10:30<br>|<br>11:00</th>
                    <td colspan="4" class="Ylight">Coffee Break and Poster Tour (Room 1 / CKK Pre-function Area)</td>
                </tr>
                <tr>
                    <th>11:00<br>|<br>12:30</th>
                    <td colspan="4" class="Ymind r1"><a data-fancybox="" data-src="#Session4" href="javascript:;">Session 4:<br />Presidential Plenary Session</a> (Room 1)</td>
                </tr>
                <tr>
                    <th>12:30<br>|<br>13:30</th>
                    <td colspan="4" class="Ymind r1"><a data-fancybox="" data-src="#Session5" href="javascript:;">Session 5:<br />The Hong Kong Stroke Society - Lunch Symposium</a> (Room 1)</td>
                </tr>
                <tr>
                    <th>13:30<br>|<br>15:00</th>
                    <td class="Ymind r1"><a data-fancybox="" data-src="#Session6" href="javascript:;">Session 6:<br>Advances in MT (Medtronic)</a></td>
                    <td class="Ymind r2"><a data-fancybox="" data-src="#Session7" href="javascript:;">Session 7:<br>Small Vessel Disease</a></td>
                    <td class="Ymind r3"><a data-fancybox="" data-src="#Session8" href="javascript:;">Session 8:<br>CAIS: Cancer Associated Ischaemic Stroke</a></td>
                    <td class="Ymind r4"><a data-fancybox="" data-src="#fp1" href="javascript:;">FP 1:<br>Free Paper Presentations 1</a></td>
                </tr>
                <tr>
                    <th>15:00<br>|<br>15:30</th>
                    <td colspan="4" class="Ylight">Coffee Break and Poster Tour (Room 1 / CKK Pre-function Area)</td>
                </tr>
                <tr>
                    <th>15:30<br>|<br>17:00</th>
                    <td class="Ymind r1"><a data-fancybox="" data-src="#Session9" href="javascript:;">Session 9:<br>Heart & Brain</a></td>
                    <td class="Ymind r2"><a data-fancybox="" data-src="#Session10" href="javascript:;">Session 10:<br>Extracranial Large Artery Disease</a></td>
                    <td class="Ymind r3"><a data-fancybox="" data-src="#fp2" href="javascript:;">FP 2:<br>Free Paper Presentations 2</a></td>
                    <td class="Ymind r4"><a data-fancybox="" data-src="#fp3" href="javascript:;">FP 3:<br>Free Paper Presentations 3</a></td>
                </tr>
                <tr>
                    <th>17:00<br>|<br>17:15</th>
                    <td colspan="4" class="Ylight">Break Time before Opening Ceremony</td>
                </tr>
                <tr>
                    <th>17:15<br>|<br>18:00</th>
                    <td colspan="4" class="Ymind r1"><a data-fancybox="" data-src="#Session12" href="javascript:;">Session 12:<br />Opening Ceremony</a> (Room 1)</td>
                </tr>
                <tr>
                    <th>18:00<br>|<br>19:00</th>
                    <td colspan="4" class="Ylight">Welcome Reception (Room 1 + Exhibition Area)</td>
                </tr>
                <tr>
                    <th>19:00</th>
                    <td colspan="4" class="Bblue">End of Day 1 Programme</td>
                </tr>
                <tr>
                    <th>19:30<br>|<br>21:00</th>
                    <td colspan="4" class="Ylight">Faculty Dinner (Double Haven I, 4/F, HKJC Shatin Clubhouse)</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<?= $this->render('_programme_detail_1'); ?>