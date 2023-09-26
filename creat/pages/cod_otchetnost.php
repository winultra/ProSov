<?php
$dateYersNew = date('Y');
$dateLast = $dateYersNew-1;
$marth = date('m')-1;
if($marth == 0) $marth = 12;
$dateSBD = $dateLast.'_'.$marth;
$dateSBDNew = $dateYersNew.'_'.$marth;
if($section_page == 'add'){//Добавить отчет
$userifnar = querydb("SELECT * FROM `administatrors_user` WHERE `login` = '".chektextST($LoginUser)."' AND `hashauth` = '".chektextST($passUser)."'");
$otchetnostArr = querydb("SELECT * FROM `otchet_cod` WHERE `id_user` = '".$userifnar['id']."' AND `date_otch` = '".$dateSBD."'");
if(isset($otchetnostArr)){
    /*Если есть данные*/
    $last_yers_chp_ld = 'value="'.$otchetnostArr['number_users'].'" readonly';//Число пользователей
    $last_yers_chp_dt_ld = 'value="'.$otchetnostArr['number_users_kd'].'" readonly';//Число пользователей(kids)
    $last_yers_chpos_ld = 'value="'.$otchetnostArr['number_visits'].'" readonly';//Число посещений
    $last_yers_chpos_dt_ld = 'value="'.$otchetnostArr['number_visits_kd'].'" readonly';//Число посещений(kids)
    $last_yers_knigv_ld = 'value="'.$otchetnostArr['number_book_publishing'].'" readonly';//Число книговыдач
    $last_yers_knigv_dt_ld = 'value="'.$otchetnostArr['number_book_publishing_kd'].'" readonly';//Число книговыдач(kids)
    $last_yers_workkomp_ld = 'value="'.$otchetnostArr['work_komp'].'" readonly';//Работа за компьютером
    $last_yers_workkomp_dt_ld = 'value="'.$otchetnostArr['work_komp_kd'].'" readonly';//Работа за компьютером(kids)
    $last_yers_garant_ld = 'value="'.$otchetnostArr['garant'].'" readonly';//Гарант
    $last_yers_garant_dt_ld = 'value="'.$otchetnostArr['garant_kd'].'" readonly';//Гарант(kids)
    $last_yers_konsult_ld = 'value="'.$otchetnostArr['konsultant'].'" readonly';//Консультант
    $last_yers_konsult_dt_ld = 'value="'.$otchetnostArr['konsultant_kd'].'" readonly';//Консультант(kids)
    $last_yers_ethernet_ld = 'value="'.$otchetnostArr['ethernet'].'" readonly';//Интернет
    $last_yers_ethernet_dt_ld = 'value="'.$otchetnostArr['ethernet_kd'].'" readonly';//Интернет(kids)
    $last_yers_elkat_ld = 'value="'.$otchetnostArr['electronic_catalog'].'" readonly';//Электронный каталог
    $last_yers_elkat_dt_ld = 'value="'.$otchetnostArr['electronic_catalog_kd'].'" readonly';//Электронный каталог(kids)
    $last_yers_provmer_ld = 'value="'.$otchetnostArr['activities_carried'].'" readonly';//Проведено мероприятий
    $last_yers_provmer_dt_ld = 'value="'.$otchetnostArr['activities_carried_kd'].'" readonly';//Проведено мероприятий(kids)
    $last_yers_numposmer_ld = 'value="'.$otchetnostArr['number_event_visits'].'" readonly';//Число посещений мероприятий
    $last_yers_numposmer_dt_ld = 'value="'.$otchetnostArr['number_event_visits_kd'].'" readonly';//Число посещений мероприятий(kids)
    $last_yers_sculkg_ld = 'value="'.$otchetnostArr['computer_school'].'" readonly';//Школа компьютерной грамотности
    $last_yers_sculkg_dt_ld = 'value="'.$otchetnostArr['computer_school_kd'].'" readonly';//Школа компьютерной грамотности(kids)
    $last_yers_numobuch_ld = 'value="'.$otchetnostArr['number_students'].'" readonly';//Количество обучающихся
    $last_yers_numobuch_dt_ld = 'value="'.$otchetnostArr['number_students_kd'].'" readonly';//Количество обучающихся(kids)
    $last_yers_numzanyt_ld = 'value="'.$otchetnostArr['number_classes'].'" readonly';//Количество занятий
    $last_yers_numzanyt_dt_ld = 'value="'.$otchetnostArr['number_classes_kd'].'" readonly';//Количество занятий(kids)
}
?>
<div class="alert_warning_cod"><div class="wranningIco"></div>Отчет принимается с 1 по 6 число каждого месяца</div>
<style>
.txtleftth{text-align:left;}
</style>
<div class="row">
    <div class="col_sm_12">
        <div class="card">
            <div class="card_body">
                <div class="table_responsive">
                <div class="tableNadPos">В Т.Ч. ДЕТЕЙ</div>
                <div class="tableNadPos">ВСЕГО</div>
                    <table class="table user_table">
                        <thead>
                            <tr>
                                <th class="border_top_0">Показатели</th>
                                <th class="border_top_0"><?=$dateLast?></th>
                                <th class="border_top_0"><?=$dateYersNew?></th>
                                <th class="border_top_0">+ / -</th>
                                <th class="border_top_0"><?=$dateLast?></th>
                                <th class="border_top_0"><?=$dateYersNew?></th>
                                <th class="border_top_0">+ / - </th>
                            </tr>
                        </thead>
                        <tbody class="body_work_cod_ot">
                            <tr>
                                <th class="txtleftth">Число пользователей</th>
                                <th><input type="text" name="last_yers_chp" onkeyup="numresults('last_yers_chp','new_yers_chp','reuslts_chp')" class="inputsvvodcodtable last_yers_chp" <?=$last_yers_chp_ld?>></th>
                                <th><input type="text" name="new_yers_chp" onkeyup="numresults('last_yers_chp','new_yers_chp','reuslts_chp')" class="inputsvvodcodtable new_yers_chp"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chp" value="0" readonly></th>
                                <th><input type="text" name="last_yers_chp_dt" onkeyup="numresults('last_yers_chp_dt','new_yers_chp_dt','reuslts_chp_dt')" class="inputsvvodcodtable last_yers_chp_dt" <?=$last_yers_chp_dt_ld?>></th>
                                <th><input type="text" name="new_yers_chp_dt" onkeyup="numresults('last_yers_chp_dt','new_yers_chp_dt','reuslts_chp_dt')" class="inputsvvodcodtable new_yers_chp_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chp_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число посещений</th>
                                <th><input type="text" name="last_yers_chpos" onkeyup="numresults('last_yers_chpos','new_yers_chpos','reuslts_chpos')" class="inputsvvodcodtable last_yers_chpos" <?=$last_yers_chpos_ld?>></th>
                                <th><input type="text" name="new_yers_chpos" onkeyup="numresults('last_yers_chpos','new_yers_chpos','reuslts_chpos')" class="inputsvvodcodtable new_yers_chpos"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chpos" value="0" readonly></th>
                                <th><input type="text" name="last_yers_chpos_dt" onkeyup="numresults('last_yers_chpos_dt','new_yers_chpos_dt','reuslts_chpos_dt')" class="inputsvvodcodtable last_yers_chpos_dt" <?=$last_yers_chpos_dt_ld?>></th>
                                <th><input type="text" name="new_yers_chpos_dt" onkeyup="numresults('last_yers_chpos_dt','new_yers_chpos_dt','reuslts_chpos_dt')" class="inputsvvodcodtable new_yers_chpos_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chpos_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число книговыдач</th>
                                <th><input type="text" name="last_yers_knigv" onkeyup="numresults('last_yers_knigv','new_yers_knigv','reuslts_knigv')" class="inputsvvodcodtable last_yers_knigv" <?=$last_yers_knigv_ld?>></th>
                                <th><input type="text" name="new_yers_knigv" onkeyup="numresults('last_yers_knigv','new_yers_knigv','reuslts_knigv')" class="inputsvvodcodtable new_yers_knigv"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_knigv" value="0" readonly></th>
                                <th><input type="text" name="last_yers_knigv_dt" onkeyup="numresults('last_yers_knigv_dt','new_yers_knigv_dt','reuslts_knigv_dt')" class="inputsvvodcodtable last_yers_knigv_dt" <?=$last_yers_knigv_dt_ld?>></th>
                                <th><input type="text" name="new_yers_knigv_dt" onkeyup="numresults('last_yers_knigv_dt','new_yers_knigv_dt','reuslts_knigv_dt')" class="inputsvvodcodtable new_yers_knigv_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_knigv_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Работа на компьютере</th>
                                <th><input type="text" name="last_yers_workkomp" onkeyup="numresults('last_yers_workkomp','new_yers_workkomp','reuslts_workkomp')" class="inputsvvodcodtable last_yers_workkomp" <?=$last_yers_workkomp_ld?>></th>
                                <th><input type="text" name="new_yers_workkomp" onkeyup="numresults('last_yers_workkomp','new_yers_workkomp','reuslts_workkomp')" class="inputsvvodcodtable new_yers_workkomp"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_workkomp" value="0" readonly></th>
                                <th><input type="text" name="last_yers_workkomp_dt" onkeyup="numresults('last_yers_workkomp_dt','new_yers_workkomp_dt','reuslts_workkomp_dt')" class="inputsvvodcodtable last_yers_workkomp_dt" <?=$last_yers_workkomp_dt_ld?>></th>
                                <th><input type="text" name="new_yers_workkomp_dt" onkeyup="numresults('last_yers_workkomp_dt','new_yers_workkomp_dt','reuslts_workkomp_dt')" class="inputsvvodcodtable new_yers_workkomp_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_workkomp_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Гарант</th>
                                <th><input type="text" name="last_yers_garant" onkeyup="numresults('last_yers_garant','new_yers_garant','reuslts_garant')" class="inputsvvodcodtable last_yers_garant" <?=$last_yers_garant_ld?>></th>
                                <th><input type="text" name="new_yers_garant" onkeyup="numresults('last_yers_garant','new_yers_garant','reuslts_garant')" class="inputsvvodcodtable new_yers_garant"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_garant" value="0" readonly></th>
                                <th><input type="text" name="last_yers_garant_dt" onkeyup="numresults('last_yers_garant_dt','new_yers_garant_dt','reuslts_garant_dt')" class="inputsvvodcodtable last_yers_garant_dt" <?=$last_yers_workkomp_dt_ld?>></th>
                                <th><input type="text" name="new_yers_garant_dt" onkeyup="numresults('last_yers_garant_dt','new_yers_garant_dt','reuslts_garant_dt')" class="inputsvvodcodtable new_yers_garant_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_garant_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Консультант</th>
                                <th><input type="text" name="last_yers_konsult" onkeyup="numresults('last_yers_konsult','new_yers_konsult','reuslts_konsult')" class="inputsvvodcodtable last_yers_konsult" <?=$last_yers_konsult_ld?>></th>
                                <th><input type="text" name="new_yers_konsult" onkeyup="numresults('last_yers_konsult','new_yers_konsult','reuslts_konsult')" class="inputsvvodcodtable new_yers_konsult"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_konsult" value="0" readonly></th>
                                <th><input type="text" name="last_yers_konsult_dt" onkeyup="numresults('last_yers_konsult_dt','new_yers_konsult_dt','reuslts_konsult_dt')" class="inputsvvodcodtable last_yers_konsult_dt" <?=$last_yers_konsult_dt_ld?>></th>
                                <th><input type="text" name="new_yers_konsult_dt" onkeyup="numresults('last_yers_konsult_dt','new_yers_konsult_dt','reuslts_konsult_dt')" class="inputsvvodcodtable new_yers_konsult_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_konsult_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Интернет</th>
                                <th><input type="text" name="last_yers_ethernet" onkeyup="numresults('last_yers_ethernet','new_yers_ethernet','reuslts_ethernet')" class="inputsvvodcodtable last_yers_ethernet" <?=$last_yers_ethernet_ld?>></th>
                                <th><input type="text" name="new_yers_ethernet" onkeyup="numresults('last_yers_ethernet','new_yers_ethernet','reuslts_ethernet')" class="inputsvvodcodtable new_yers_ethernet"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_ethernet" value="0" readonly></th>
                                <th><input type="text" name="last_yers_ethernet_dt" onkeyup="numresults('last_yers_ethernet_dt','new_yers_ethernet_dt','reuslts_ethernet_dt')" class="inputsvvodcodtable last_yers_ethernet_dt" <?=$last_yers_ethernet_dt_ld?>></th>
                                <th><input type="text" name="new_yers_ethernet_dt" onkeyup="numresults('last_yers_ethernet_dt','new_yers_ethernet_dt','reuslts_ethernet_dt')" class="inputsvvodcodtable new_yers_ethernet_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_ethernet_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Электронный каталог</th>
                                <th><input type="text" name="last_yers_elkat" onkeyup="numresults('last_yers_elkat','new_yers_elkat','reuslts_elkat')" class="inputsvvodcodtable last_yers_elkat" <?=$last_yers_elkat_ld?>></th>
                                <th><input type="text" name="new_yers_elkat" onkeyup="numresults('last_yers_elkat','new_yers_elkat','reuslts_elkat')" class="inputsvvodcodtable new_yers_elkat"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_elkat" value="0" readonly></th>
                                <th><input type="text" name="last_yers_elkat_dt" onkeyup="numresults('last_yers_elkat_dt','new_yers_elkat_dt','reuslts_elkat_dt')" class="inputsvvodcodtable last_yers_elkat_dt" <?=$last_yers_elkat_dt_ld?>></th>
                                <th><input type="text" name="new_yers_elkat_dt" onkeyup="numresults('last_yers_elkat_dt','new_yers_elkat_dt','reuslts_elkat_dt')" class="inputsvvodcodtable new_yers_elkat_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_elkat_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Проведено мероприятий</th>
                                <th><input type="text" name="last_yers_provmer" onkeyup="numresults('last_yers_provmer','new_yers_provmer','reuslts_provmer')" class="inputsvvodcodtable last_yers_provmer" <?=$last_yers_provmer_ld?>></th>
                                <th><input type="text" name="new_yers_provmer" onkeyup="numresults('last_yers_provmer','new_yers_provmer','reuslts_provmer')" class="inputsvvodcodtable new_yers_provmer"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_provmer" value="0" readonly></th>
                                <th><input type="text" name="last_yers_provmer_dt" onkeyup="numresults('last_yers_provmer_dt','new_yers_provmer_dt','reuslts_provmer_dt')" class="inputsvvodcodtable last_yers_provmer_dt" <?=$last_yers_provmer_dt_ld?>></th>
                                <th><input type="text" name="new_yers_provmer_dt" onkeyup="numresults('last_yers_provmer_dt','new_yers_provmer_dt','reuslts_provmer_dt')" class="inputsvvodcodtable new_yers_provmer_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_provmer_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число посещений мероприятий</th>
                                <th><input type="text" name="last_yers_numposmer" onkeyup="numresults('last_yers_numposmer','new_yers_numposmer','reuslts_numposmer')" class="inputsvvodcodtable last_yers_numposmer" <?=$last_yers_numposmer_ld?>></th>
                                <th><input type="text" name="new_yers_numposmer" onkeyup="numresults('last_yers_numposmer','new_yers_numposmer','reuslts_numposmer')" class="inputsvvodcodtable new_yers_numposmer"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numposmer" value="0" readonly></th>
                                <th><input type="text" name="last_yers_numposmer_dt" onkeyup="numresults('last_yers_numposmer_dt','new_yers_numposmer_dt','reuslts_numposmer_dt')" class="inputsvvodcodtable last_yers_numposmer_dt" <?=$last_yers_numposmer_dt_ld?>></th>
                                <th><input type="text" name="new_yers_numposmer_dt" onkeyup="numresults('last_yers_numposmer_dt','new_yers_numposmer_dt','reuslts_numposmer_dt')" class="inputsvvodcodtable new_yers_numposmer_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numposmer_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Школа компьютерной грамотности</th>
                                <th><input type="text" name="last_yers_sculkg" onkeyup="numresults('last_yers_sculkg','new_yers_sculkg','reuslts_sculkg')" class="inputsvvodcodtable last_yers_sculkg" <?=$last_yers_sculkg_ld?>></th>
                                <th><input type="text" name="new_yers_sculkg" onkeyup="numresults('last_yers_sculkg','new_yers_sculkg','reuslts_sculkg')" class="inputsvvodcodtable new_yers_sculkg"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_sculkg" value="0" readonly></th>
                                <th><input type="text" name="last_yers_sculkg_dt" onkeyup="numresults('last_yers_sculkg_dt','new_yers_sculkg_dt','reuslts_sculkg_dt')" class="inputsvvodcodtable last_yers_sculkg_dt" <?=$last_yers_sculkg_dt_ld?>></th>
                                <th><input type="text" name="new_yers_sculkg_dt" onkeyup="numresults('last_yers_sculkg_dt','new_yers_sculkg_dt','reuslts_sculkg_dt')" class="inputsvvodcodtable new_yers_sculkg_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_sculkg_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Количество обучающихся</th>
                                <th><input type="text" name="last_yers_numobuch" onkeyup="numresults('last_yers_numobuch','new_yers_numobuch','reuslts_numobuch')" class="inputsvvodcodtable last_yers_numobuch" <?=$last_yers_numobuch_ld ?>></th>
                                <th><input type="text" name="new_yers_numobuch" onkeyup="numresults('last_yers_numobuch','new_yers_numobuch','reuslts_numobuch')" class="inputsvvodcodtable new_yers_numobuch"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numobuch" value="0" readonly></th>
                                <th><input type="text" name="last_yers_numobuch_dt" onkeyup="numresults('last_yers_numobuch_dt','new_yers_numobuch_dt','reuslts_numobuch_dt')" class="inputsvvodcodtable last_yers_numobuch_dt" <?=$last_yers_numobuch_dt_ld?>></th>
                                <th><input type="text" name="new_yers_numobuch_dt" onkeyup="numresults('last_yers_numobuch_dt','new_yers_numobuch_dt','reuslts_numobuch_dt')" class="inputsvvodcodtable new_yers_numobuch_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numobuch_dt" value="0" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Количество занятий</th>
                                <th><input type="text" name="last_yers_numzanyt" onkeyup="numresults('last_yers_numzanyt','new_yers_numzanyt','reuslts_numzanyt')" class="inputsvvodcodtable last_yers_numzanyt" <?=$last_yers_numzanyt_ld?>></th>
                                <th><input type="text" name="new_yers_numzanyt" onkeyup="numresults('last_yers_numzanyt','new_yers_numzanyt','reuslts_numzanyt')" class="inputsvvodcodtable new_yers_numzanyt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numzanyt" value="0" readonly></th>
                                <th><input type="text" name="last_yers_numzanyt_dt" onkeyup="numresults('last_yers_numzanyt_dt','new_yers_numzanyt_dt','reuslts_numzanyt_dt')" class="inputsvvodcodtable last_yers_numzanyt_dt" <?=$last_yers_numzanyt_dt_ld?>></th>
                                <th><input type="text" name="new_yers_numzanyt_dt" class="inputsvvodcodtable new_yers_numzanyt_dt"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numzanyt_dt" value="0" readonly></th>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="send_otche_work_cod()">Отправить</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?}else if($section_page == 'id'){
    $idOtchet = chektextST($_GET['id']);
    $userifnar = querydb("SELECT * FROM `administatrors_user` WHERE `login` = '".chektextST($LoginUser)."' AND `hashauth` = '".chektextST($passUser)."'");
    $otchetnostArrNew = querydb("SELECT * FROM `otchet_cod` WHERE `id_otchet` = '".$idOtchet."'");
    $dateBD = $otchetnostArrNew['date_otch'];
    $datebdaar = explode('_', $dateBD);
    $goddtarr = $datebdaar[0]-1;
    $resiltQuerdatedb = $goddtarr.'_'.$datebdaar[1];
    $otchetnostArrLast= querydb("SELECT * FROM `otchet_cod` WHERE `id_user` = '".$otchetnostArrNew['id_user']."' AND `date_otch` = '".$resiltQuerdatedb."'");
?>
<style>
.txtleftth{text-align:left;}
</style>
<div class="row">
    <div class="col_sm_12">
        <div class="card">
            <div class="card_body">
                <div class="table_responsive">
                <div class="tableNadPos">В Т.Ч. ДЕТЕЙ</div>
                <div class="tableNadPos">ВСЕГО</div>
                    <table class="table user_table">
                        <thead>
                            <tr>
                                <th class="border_top_0">Показатели</th>
                                <th class="border_top_0"><?=$dateLast?></th>
                                <th class="border_top_0"><?=$dateYersNew?></th>
                                <th class="border_top_0">+ / -</th>
                                <th class="border_top_0"><?=$dateLast?></th>
                                <th class="border_top_0"><?=$dateYersNew?></th>
                                <th class="border_top_0">+ / - </th>
                            </tr>
                        </thead>
                        <tbody class="body_work_cod_ot">
                            <tr>
                                <th class="txtleftth">Число пользователей</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_chp" value="<?=$otchetnostArrLast['number_users']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_chp" value="<?=$otchetnostArrNew['number_users']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chp" value="<?=znakmatemformat((int)$otchetnostArrNew['number_users'] - (int)$otchetnostArrLast['number_users'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_chp_dt" value="<?=$otchetnostArrLast['number_users_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_chp_dt" value="<?=$otchetnostArrNew['number_users_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chp_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_users_kd'] - (int)$otchetnostArrLast['number_users_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число посещений</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_chpos" value="<?=$otchetnostArrLast['number_visits']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_chpos" value="<?=$otchetnostArrNew['number_visits']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chpos" value="<?=znakmatemformat((int)$otchetnostArrNew['number_visits'] - (int)$otchetnostArrLast['number_visits'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_chpos_dt" value="<?=$otchetnostArrLast['number_visits_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_chpos_dt" value="<?=$otchetnostArrNew['number_visits_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chpos_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_visits_kd'] - (int)$otchetnostArrLast['number_visits_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число книговыдач</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_knigv" value="<?=$otchetnostArrLast['number_book_publishing']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_knigv" value="<?=$otchetnostArrNew['number_book_publishing']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_knigv" value="<?=znakmatemformat((int)$otchetnostArrNew['number_book_publishing'] - (int)$otchetnostArrLast['number_book_publishing'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_knigv_dt" value="<?=$otchetnostArrLast['number_book_publishing_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_knigv_dt" value="<?=$otchetnostArrNew['number_book_publishing_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_knigv_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_book_publishing_kd'] - (int)$otchetnostArrLast['number_book_publishing_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Работа на компьютере</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_workkomp" value="<?=$otchetnostArrLast['work_komp']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_workkomp" value="<?=$otchetnostArrNew['work_komp']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_workkomp" value="<?=znakmatemformat((int)$otchetnostArrNew['work_komp'] - (int)$otchetnostArrLast['work_komp'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_workkomp_dt" value="<?=$otchetnostArrLast['work_komp_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_workkomp_dt" value="<?=$otchetnostArrNew['work_komp_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_workkomp_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['work_komp_kd'] - (int)$otchetnostArrLast['work_komp_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Гарант</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_garant" value="<?=$otchetnostArrLast['garant']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_garant" value="<?=$otchetnostArrNew['garant']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_garant" value="<?=znakmatemformat((int)$otchetnostArrNew['garant'] - (int)$otchetnostArrLast['garant'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_garant_dt" value="<?=$otchetnostArrLast['garant_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_garant_dt" value="<?=$otchetnostArrNew['garant_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_garant_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['garant_kd'] - (int)$otchetnostArrLast['garant_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Консультант</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_konsult" value="<?=$otchetnostArrLast['konsultant']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_konsult" value="<?=$otchetnostArrNew['konsultant']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_konsult" value="<?=znakmatemformat((int)$otchetnostArrNew['konsultant'] - (int)$otchetnostArrLast['konsultant'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_konsult_dt" value="<?=$otchetnostArrLast['konsultant_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_konsult_dt" value="<?=$otchetnostArrNew['konsultant_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_konsult_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['konsultant_kd'] - (int)$otchetnostArrLast['konsultant_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Интернет</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_ethernet" value="<?=$otchetnostArrLast['ethernet']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_ethernet" value="<?=$otchetnostArrNew['ethernet']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_ethernet" value="<?=znakmatemformat((int)$otchetnostArrNew['ethernet'] - (int)$otchetnostArrLast['ethernet'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_ethernet_dt" value="<?=$otchetnostArrLast['ethernet_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_ethernet_dt" value="<?=$otchetnostArrNew['ethernet_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_ethernet_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['ethernet_kd'] - (int)$otchetnostArrLast['ethernet_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Электронный каталог</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_elkat" value="<?=$otchetnostArrLast['electronic_catalog']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_elkat" value="<?=$otchetnostArrNew['electronic_catalog']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_elkat" value="<?=znakmatemformat((int)$otchetnostArrNew['electronic_catalog'] - (int)$otchetnostArrLast['electronic_catalog'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_elkat_dt" value="<?=$otchetnostArrLast['electronic_catalog_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_elkat_dt" value="<?=$otchetnostArrNew['electronic_catalog_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_elkat_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['electronic_catalog_kd'] - (int)$otchetnostArrLast['electronic_catalog_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Проведено мероприятий</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_provmer" value="<?=$otchetnostArrLast['activities_carried']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_provmer" value="<?=$otchetnostArrNew['activities_carried']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_provmer" value="<?=znakmatemformat((int)$otchetnostArrNew['activities_carried'] - (int)$otchetnostArrLast['activities_carried'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_provmer_dt" value="<?=$otchetnostArrLast['activities_carried_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_provmer_dt" value="<?=$otchetnostArrNew['activities_carried_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_provmer_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['activities_carried_kd'] - (int)$otchetnostArrLast['activities_carried_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число посещений мероприятий</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_numposmer" value="<?=$otchetnostArrLast['number_event_visits']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_numposmer" value="<?=$otchetnostArrNew['number_event_visits']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numposmer" value="<?=znakmatemformat((int)$otchetnostArrNew['number_event_visits'] - (int)$otchetnostArrLast['number_event_visits'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_numposmer_dt" value="<?=$otchetnostArrLast['number_event_visits_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_numposmer_dt" value="<?=$otchetnostArrNew['number_event_visits_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numposmer_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_event_visits_kd'] - (int)$otchetnostArrLast['number_event_visits_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Школа компьютерной грамотности</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_sculkg" value="<?=$otchetnostArrLast['computer_school']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_sculkg" value="<?=$otchetnostArrNew['computer_school']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_sculkg" value="<?=znakmatemformat((int)$otchetnostArrNew['computer_school'] - (int)$otchetnostArrLast['computer_school'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_sculkg_dt" value="<?=$otchetnostArrLast['computer_school_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_sculkg_dt" value="<?=$otchetnostArrNew['computer_school_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_sculkg_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['computer_school_kd'] - (int)$otchetnostArrLast['computer_school_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Количество обучающихся</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_numobuch" value="<?=$otchetnostArrLast['number_students']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_numobuch" value="<?=$otchetnostArrNew['number_students']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numobuch" value="<?=znakmatemformat((int)$otchetnostArrNew['number_students'] - (int)$otchetnostArrLast['number_students'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_numobuch_dt" value="<?=$otchetnostArrLast['number_students_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_numobuch_dt" value="<?=$otchetnostArrNew['number_students_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numobuch_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_students_kd'] - (int)$otchetnostArrLast['number_students_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Количество занятий</th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_numzanyt" value="<?=$otchetnostArrLast['number_classes']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_numzanyt" value="<?=$otchetnostArrNew['number_classes']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numzanyt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_classes'] - (int)$otchetnostArrLast['number_classes'])?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable last_yers_numzanyt_dt" value="<?=$otchetnostArrLast['number_classes_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable new_yers_numzanyt_dt" value="<?=$otchetnostArrNew['number_classes_kd']?>" readonly></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numzanyt_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_classes_kd'] - (int)$otchetnostArrLast['number_classes_kd'])?>" readonly></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?
}else if($section_page == 'list-otchets-work-cod' && $dostyp_pages == 'access'){
    $dateYer = date('Y');
    $date_math = date('n')-1;
    if(date('n') == 12 && date('d') > 21){ $date_math = date('n'); }
    $rs_date = $dateYer.'_'.$date_math;
    $numb = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    $merth = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Откбярь','Ноябрь','Декабрь'];
    $gods = ['2022','2023','2024','2025','2026','2027','2028'];
    $otchetnostQr = querydb("SELECT * FROM `otchet_cod` WHERE `date_otch` = '".$rs_date."'",'noArray');
    ?>
     <div class="row">
    <div class="col_sm_12">
        <div class="card">
            <div class="card_body">
                <div class="table_responsive">
                    <table class="table user_table">
                        <thead>
                            <tr>
                                <th class="border_top_0">Библиотека</th>
                                <th class="border_top_0">
                                    <select name="gods" class="selectstyle yers_data">
                                        <?
                                         for($i=0; $i < count($gods); $i++){
                                            $ss = '';
                                            if($dateYer == $gods[$i]){$ss = 'selected';}
                                            echo'<option value="'.$gods[$i].'" '.$ss.'>'.$gods[$i].'</option>';
                                         }
                                        ?>
                                    </select> | 
                                    <select name="moth" class="selectstyle moth_data">
                                        <?
                                            for($i=0; $i < count($numb); $i++){
                                                $ss = '';
                                                if($date_math == $numb[$i]){$ss = 'selected';}
                                                echo'<option value="'.$numb[$i].'" '.$ss.'>'.$merth[$i].'</option>';
                                            }
                                        ?>
                                    </select>
                                </th>
                                <th class="border_top_0">Просмотр</th>
                                <th class="border_top_0">Редактировать</th>
                                <th class="border_top_0">Загрузка</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_append">
<?$im=0;while($otchetnostArr = mysqli_fetch_assoc($otchetnostQr)){
    /*Проверка на отсутсвие сданных отчетов*/
    if($otchetnostArr['id_user'] == $push_id[0] || $otchetnostArr['id_user'] == $push_id[12] 
    || $otchetnostArr['id_user'] == $push_id[13] || $otchetnostArr['id_user'] == $push_id[14]){
        unset($push_id[0]);unset($push_id[12]);unset($push_id[13]);unset($push_id[14]);
}else{
    foreach($push_id as $key => $item){
        if ($item == $otchetnostArr['id_user']){
          unset($push_id[$key]);
        }
    }
}
$im++;
/*Конец проверки на отсутсвие сданных отчетов*/
$infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$otchetnostArr['id_user']."'");
echo'<tr>';
echo'<th>'.$infuserID['biblios'].'</th>';
echo'<th>'.$otchetnostArr['date_otch'].'</th>';
echo'<th><a href="/work-cod'.$otchetnostArr['id_otchet'].'">Посмотреть</a></th>';
echo'<th><a href="/edit-otchet-work-cod'.$otchetnostArr['id_otchet'].'">Редактировать</a></th>';
echo'<th><a href="#" onclick="downloadCodOtchet('.$otchetnostArr['id_otchet'].');return false;">Скачать</a></th>';
echo'</tr>';
}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?if(count($push_id) > 0){?>
        <div class="card">
        <div class="head_title_table_list">Отсутствующие отчеты</div>
            <div class="card_body">
                <div class="table_responsive">
                    <table class="table user_table">
                        <thead>
                            <tr>
                                <th class="border_top_0">Библиотеки</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_noappend">
                            <?foreach($push_id as $key => $item){
                                $infuserIDs = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$item."' LIMIT 1");
                                echo'<tr>';
                                echo'<th>'.$infuserIDs['biblios'].'</th>';
                                echo'</tr>';
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?}?>
    </div>
</div>
    <?
}else if($section_page == 'generate-all-otchet' && $dostyp_pages == 'access'){
echo'<div style="text-align:center;"><button class="buttonStyle" id="send_otchet_cdo" onclick="download_result_otchet()">Сгенерировать Excel документ</button></div>';
}else if($section_page == 'edit-otchet' && $dostyp_pages == 'access'){
    $idOtchet = chektextST($_GET['id']);//INFOUSER
    //запрос для правки администратором
    $otchetnostArrNew = querydb("SELECT * FROM `otchet_cod` WHERE `id_otchet` = '".$idOtchet."'");
    $dateBD = $otchetnostArrNew['date_otch'];
    $authorOtchet = $otchetnostArrNew['id_user'];
    $datebdaar = explode('_', $dateBD);
    $goddtarr = $datebdaar[0]-1;
    $resiltQuerdatedb = $goddtarr.'_'.$datebdaar[1];
    $otchetnostArrLast= querydb("SELECT * FROM `otchet_cod` WHERE `id_user` = '".$authorOtchet."' AND `date_otch` = '".$resiltQuerdatedb."'");
    ?>
<style>
.txtleftth{text-align:left;}
</style>
<div class="row">
    <div class="col_sm_12">
        <div class="card">
            <div class="card_body">
                <div class="table_responsive">
                <div class="tableNadPos">В Т.Ч. ДЕТЕЙ</div>
                <div class="tableNadPos">ВСЕГО</div>
                    <table class="table user_table">
                        <thead>
                            <tr>
                                <th class="border_top_0">Показатели</th>
                                <th class="border_top_0"><?=$dateLast?></th>
                                <th class="border_top_0"><?=$dateYersNew?></th>
                                <th class="border_top_0">+ / -</th>
                                <th class="border_top_0"><?=$dateLast?></th>
                                <th class="border_top_0"><?=$dateYersNew?></th>
                                <th class="border_top_0">+ / - </th>
                            </tr>
                        </thead>
                        <tbody class="body_work_cod_ot">
                            <tr>
                                <th class="txtleftth">Число пользователей</th>
                                <th><input type="text" name="last_yers_chp" class="inputsvvodcodtable last_yers_chp" onkeyup="numresults('last_yers_chp','new_yers_chp','reuslts_chp')" value="<?=$otchetnostArrLast['number_users']?>"></th>
                                <th><input type="text" name="new_yers_chp" class="inputsvvodcodtable new_yers_chp" onkeyup="numresults('last_yers_chp','new_yers_chp','reuslts_chp')" value="<?=$otchetnostArrNew['number_users']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chp" value="<?=znakmatemformat((int)$otchetnostArrNew['number_users'] - (int)$otchetnostArrLast['number_users'])?>" readonly></th>
                                <th><input type="text" name="last_yers_chp_dt" class="inputsvvodcodtable last_yers_chp_dt" onkeyup="numresults('last_yers_chp_dt','new_yers_chp_dt','reuslts_chp_dt')" value="<?=$otchetnostArrLast['number_users_kd']?>"></th>
                                <th><input type="text" name="new_yers_chp_dt" class="inputsvvodcodtable new_yers_chp_dt" onkeyup="numresults('last_yers_chp_dt','new_yers_chp_dt','reuslts_chp_dt')" value="<?=$otchetnostArrNew['number_users_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chp_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_users_kd'] - (int)$otchetnostArrLast['number_users_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число посещений</th>
                                <th><input type="text" name="last_yers_chpos" class="inputsvvodcodtable last_yers_chpos" onkeyup="numresults('last_yers_chpos','new_yers_chpos','reuslts_chpos')" value="<?=$otchetnostArrLast['number_visits']?>"></th>
                                <th><input type="text" name="new_yers_chpos" class="inputsvvodcodtable new_yers_chpos" onkeyup="numresults('last_yers_chpos','new_yers_chpos','reuslts_chpos')" value="<?=$otchetnostArrNew['number_visits']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chpos" value="<?=znakmatemformat((int)$otchetnostArrNew['number_visits'] - (int)$otchetnostArrLast['number_visits'])?>" readonly></th>
                                <th><input type="text" name="last_yers_chpos_dt" class="inputsvvodcodtable last_yers_chpos_dt" onkeyup="numresults('last_yers_chpos_dt','new_yers_chpos_dt','reuslts_chpos_dt')" value="<?=$otchetnostArrLast['number_visits_kd']?>"></th>
                                <th><input type="text" name="new_yers_chpos_dt" class="inputsvvodcodtable new_yers_chpos_dt" onkeyup="numresults('last_yers_chpos_dt','new_yers_chpos_dt','reuslts_chpos_dt')" value="<?=$otchetnostArrNew['number_visits_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_chpos_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_visits_kd'] - (int)$otchetnostArrLast['number_visits_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число книговыдач</th>
                                <th><input type="text" name="last_yers_knigv" class="inputsvvodcodtable last_yers_knigv" onkeyup="numresults('last_yers_knigv','new_yers_knigv','reuslts_knigv')" value="<?=$otchetnostArrLast['number_book_publishing']?>"></th>
                                <th><input type="text" name="new_yers_knigv" class="inputsvvodcodtable new_yers_knigv" onkeyup="numresults('last_yers_knigv','new_yers_knigv','reuslts_knigv')" value="<?=$otchetnostArrNew['number_book_publishing']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_knigv" value="<?=znakmatemformat((int)$otchetnostArrNew['number_book_publishing'] - (int)$otchetnostArrLast['number_book_publishing'])?>" readonly></th>
                                <th><input type="text" name="last_yers_knigv_dt" class="inputsvvodcodtable last_yers_knigv_dt" onkeyup="numresults('last_yers_knigv_dt','new_yers_knigv_dt','reuslts_knigv_dt')" value="<?=$otchetnostArrLast['number_book_publishing_kd']?>"></th>
                                <th><input type="text" name="new_yers_knigv_dt" class="inputsvvodcodtable new_yers_knigv_dt" onkeyup="numresults('last_yers_knigv_dt','new_yers_knigv_dt','reuslts_knigv_dt')" value="<?=$otchetnostArrNew['number_book_publishing_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_knigv_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_book_publishing_kd'] - (int)$otchetnostArrLast['number_book_publishing_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Работа на компьютере</th>
                                <th><input type="text" name="last_yers_workkomp" class="inputsvvodcodtable last_yers_workkomp" onkeyup="numresults('last_yers_workkomp','new_yers_workkomp','reuslts_workkomp')" value="<?=$otchetnostArrLast['work_komp']?>"></th>
                                <th><input type="text" name="new_yers_workkomp" class="inputsvvodcodtable new_yers_workkomp" onkeyup="numresults('last_yers_workkomp','new_yers_workkomp','reuslts_workkomp')" value="<?=$otchetnostArrNew['work_komp']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_workkomp" value="<?=znakmatemformat((int)$otchetnostArrNew['work_komp'] - (int)$otchetnostArrLast['work_komp'])?>" readonly></th>
                                <th><input type="text" name="last_yers_workkomp_dt" class="inputsvvodcodtable last_yers_workkomp_dt" onkeyup="numresults('last_yers_workkomp_dt','new_yers_workkomp_dt','reuslts_workkomp_dt')" value="<?=$otchetnostArrLast['work_komp_kd']?>"></th>
                                <th><input type="text" name="new_yers_workkomp_dt" class="inputsvvodcodtable new_yers_workkomp_dt" onkeyup="numresults('last_yers_workkomp_dt','new_yers_workkomp_dt','reuslts_workkomp_dt')" value="<?=$otchetnostArrNew['work_komp_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_workkomp_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['work_komp_kd'] - (int)$otchetnostArrLast['work_komp_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Гарант</th>
                                <th><input type="text" name="last_yers_garant" class="inputsvvodcodtable last_yers_garant" onkeyup="numresults('last_yers_garant','new_yers_garant','reuslts_garant')" value="<?=$otchetnostArrLast['garant']?>"></th>
                                <th><input type="text" name="new_yers_garant" class="inputsvvodcodtable new_yers_garant" onkeyup="numresults('last_yers_garant','new_yers_garant','reuslts_garant')" value="<?=$otchetnostArrNew['garant']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_garant" value="<?=znakmatemformat((int)$otchetnostArrNew['garant'] - (int)$otchetnostArrLast['garant'])?>" readonly></th>
                                <th><input type="text" name="last_yers_garant_dt" class="inputsvvodcodtable last_yers_garant_dt" onkeyup="numresults('last_yers_garant_dt','new_yers_garant_dt','reuslts_garant_dt')" value="<?=$otchetnostArrLast['garant_kd']?>"></th>
                                <th><input type="text" name="new_yers_garant_dt" class="inputsvvodcodtable new_yers_garant_dt" onkeyup="numresults('last_yers_garant_dt','new_yers_garant_dt','reuslts_garant_dt')" value="<?=$otchetnostArrNew['garant_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_garant_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['garant_kd'] - (int)$otchetnostArrLast['garant_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Консультант</th>
                                <th><input type="text" name="last_yers_konsult" class="inputsvvodcodtable last_yers_konsult" onkeyup="numresults('last_yers_konsult','new_yers_konsult','reuslts_konsult')" value="<?=$otchetnostArrLast['konsultant']?>"></th>
                                <th><input type="text" name="new_yers_konsult" class="inputsvvodcodtable new_yers_konsult" onkeyup="numresults('last_yers_konsult','new_yers_konsult','reuslts_konsult')" value="<?=$otchetnostArrNew['konsultant']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_konsult" value="<?=znakmatemformat((int)$otchetnostArrNew['konsultant'] - (int)$otchetnostArrLast['konsultant'])?>" readonly></th>
                                <th><input type="text" name="last_yers_konsult_dt" class="inputsvvodcodtable last_yers_konsult_dt" onkeyup="numresults('last_yers_konsult_dt','new_yers_konsult_dt','reuslts_konsult_dt')" value="<?=$otchetnostArrLast['konsultant_kd']?>"></th>
                                <th><input type="text" name="new_yers_konsult_dt" class="inputsvvodcodtable new_yers_konsult_dt" onkeyup="numresults('last_yers_konsult_dt','new_yers_konsult_dt','reuslts_konsult_dt')" value="<?=$otchetnostArrNew['konsultant_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_konsult_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['konsultant_kd'] - (int)$otchetnostArrLast['konsultant_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Интернет</th>
                                <th><input type="text" name="last_yers_ethernet" class="inputsvvodcodtable last_yers_ethernet" onkeyup="numresults('last_yers_ethernet','new_yers_ethernet','reuslts_ethernet')" value="<?=$otchetnostArrLast['ethernet']?>"></th>
                                <th><input type="text" name="new_yers_ethernet" class="inputsvvodcodtable new_yers_ethernet" onkeyup="numresults('last_yers_ethernet','new_yers_ethernet','reuslts_ethernet')" value="<?=$otchetnostArrNew['ethernet']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_ethernet" value="<?=znakmatemformat((int)$otchetnostArrNew['ethernet'] - (int)$otchetnostArrLast['ethernet'])?>" readonly></th>
                                <th><input type="text" name="last_yers_ethernet_dt" class="inputsvvodcodtable last_yers_ethernet_dt" onkeyup="numresults('last_yers_ethernet_dt','new_yers_ethernet_dt','reuslts_ethernet_dt')" value="<?=$otchetnostArrLast['ethernet_kd']?>"></th>
                                <th><input type="text" name="new_yers_ethernet_dt" class="inputsvvodcodtable new_yers_ethernet_dt" onkeyup="numresults('last_yers_ethernet_dt','new_yers_ethernet_dt','reuslts_ethernet_dt')" value="<?=$otchetnostArrNew['ethernet_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_ethernet_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['ethernet_kd'] - (int)$otchetnostArrLast['ethernet_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Электронный каталог</th>
                                <th><input type="text" name="last_yers_elkat" class="inputsvvodcodtable last_yers_elkat" onkeyup="numresults('last_yers_elkat','new_yers_elkat','reuslts_elkat')" value="<?=$otchetnostArrLast['electronic_catalog']?>"></th>
                                <th><input type="text" name="new_yers_elkat" class="inputsvvodcodtable new_yers_elkat" onkeyup="numresults('last_yers_elkat','new_yers_elkat','reuslts_elkat')" value="<?=$otchetnostArrNew['electronic_catalog']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_elkat" value="<?=znakmatemformat((int)$otchetnostArrNew['electronic_catalog'] - (int)$otchetnostArrLast['electronic_catalog'])?>" readonly></th>
                                <th><input type="text" name="last_yers_elkat_dt" class="inputsvvodcodtable last_yers_elkat_dt" onkeyup="numresults('last_yers_elkat_dt','new_yers_elkat_dt','reuslts_elkat_dt')" value="<?=$otchetnostArrLast['electronic_catalog_kd']?>"></th>
                                <th><input type="text" name="new_yers_elkat_dt" class="inputsvvodcodtable new_yers_elkat_dt" onkeyup="numresults('last_yers_elkat_dt','new_yers_elkat_dt','reuslts_elkat_dt')" value="<?=$otchetnostArrNew['electronic_catalog_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_elkat_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['electronic_catalog_kd'] - (int)$otchetnostArrLast['electronic_catalog_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Проведено мероприятий</th>
                                <th><input type="text" name="last_yers_provmer" class="inputsvvodcodtable last_yers_provmer" onkeyup="numresults('last_yers_provmer','new_yers_provmer','reuslts_provmer')" value="<?=$otchetnostArrLast['activities_carried']?>"></th>
                                <th><input type="text" name="new_yers_provmer" class="inputsvvodcodtable new_yers_provmer" onkeyup="numresults('last_yers_provmer','new_yers_provmer','reuslts_provmer')" value="<?=$otchetnostArrNew['activities_carried']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_provmer" value="<?=znakmatemformat((int)$otchetnostArrNew['activities_carried'] - (int)$otchetnostArrLast['activities_carried'])?>" readonly></th>
                                <th><input type="text" name="last_yers_provmer_dt" class="inputsvvodcodtable last_yers_provmer_dt" onkeyup="numresults('last_yers_provmer_dt','new_yers_provmer_dt','reuslts_provmer_dt')" value="<?=$otchetnostArrLast['activities_carried_kd']?>"></th>
                                <th><input type="text" name="new_yers_provmer_dt" class="inputsvvodcodtable new_yers_provmer_dt" onkeyup="numresults('last_yers_provmer_dt','new_yers_provmer_dt','reuslts_provmer_dt')" value="<?=$otchetnostArrNew['activities_carried_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_provmer_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['activities_carried_kd'] - (int)$otchetnostArrLast['activities_carried_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Число посещений мероприятий</th>
                                <th><input type="text" name="last_yers_numposmer" class="inputsvvodcodtable last_yers_numposmer" onkeyup="numresults('last_yers_numposmer','new_yers_numposmer','reuslts_numposmer')" value="<?=$otchetnostArrLast['number_event_visits']?>"></th>
                                <th><input type="text" name="new_yers_numposmer" class="inputsvvodcodtable new_yers_numposmer" onkeyup="numresults('last_yers_numposmer','new_yers_numposmer','reuslts_numposmer')" value="<?=$otchetnostArrNew['number_event_visits']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numposmer" value="<?=znakmatemformat((int)$otchetnostArrNew['number_event_visits'] - (int)$otchetnostArrLast['number_event_visits'])?>" readonly></th>
                                <th><input type="text" name="last_yers_numposmer_dt" class="inputsvvodcodtable last_yers_numposmer_dt" onkeyup="numresults('last_yers_numposmer_dt','new_yers_numposmer_dt','reuslts_numposmer_dt')" value="<?=$otchetnostArrLast['number_event_visits_kd']?>"></th>
                                <th><input type="text" name="new_yers_numposmer_dt" class="inputsvvodcodtable new_yers_numposmer_dt" onkeyup="numresults('last_yers_numposmer_dt','new_yers_numposmer_dt','reuslts_numposmer_dt')" value="<?=$otchetnostArrNew['number_event_visits_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numposmer_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_event_visits_kd'] - (int)$otchetnostArrLast['number_event_visits_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Школа компьютерной грамотности</th>
                                <th><input type="text" name="last_yers_sculkg" class="inputsvvodcodtable last_yers_sculkg" onkeyup="numresults('last_yers_sculkg','new_yers_sculkg','reuslts_sculkg')" value="<?=$otchetnostArrLast['computer_school']?>"></th>
                                <th><input type="text" name="new_yers_sculkg" class="inputsvvodcodtable new_yers_sculkg" onkeyup="numresults('last_yers_sculkg','new_yers_sculkg','reuslts_sculkg')" value="<?=$otchetnostArrNew['computer_school']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_sculkg" value="<?=znakmatemformat((int)$otchetnostArrNew['computer_school'] - (int)$otchetnostArrLast['computer_school'])?>" readonly></th>
                                <th><input type="text" name="last_yers_sculkg_dt" class="inputsvvodcodtable last_yers_sculkg_dt" onkeyup="numresults('last_yers_sculkg_dt','new_yers_sculkg_dt','reuslts_sculkg_dt')" value="<?=$otchetnostArrLast['computer_school_kd']?>"></th>
                                <th><input type="text" name="new_yers_sculkg_dt" class="inputsvvodcodtable new_yers_sculkg_dt" onkeyup="numresults('last_yers_sculkg_dt','new_yers_sculkg_dt','reuslts_sculkg_dt')" value="<?=$otchetnostArrNew['computer_school_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_sculkg_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['computer_school_kd'] - (int)$otchetnostArrLast['computer_school_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Количество обучающихся</th>
                                <th><input type="text" name="last_yers_numobuch" class="inputsvvodcodtable last_yers_numobuch" onkeyup="numresults('last_yers_numobuch','new_yers_numobuch','reuslts_numobuch')" value="<?=$otchetnostArrLast['number_students']?>"></th>
                                <th><input type="text" name="new_yers_numobuch" class="inputsvvodcodtable new_yers_numobuch" onkeyup="numresults('last_yers_numobuch','new_yers_numobuch','reuslts_numobuch')" value="<?=$otchetnostArrNew['number_students']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numobuch" value="<?=znakmatemformat((int)$otchetnostArrNew['number_students'] - (int)$otchetnostArrLast['number_students'])?>" readonly></th>
                                <th><input type="text" name="last_yers_numobuch_dt" class="inputsvvodcodtable last_yers_numobuch_dt" onkeyup="numresults('last_yers_numobuch_dt','new_yers_numobuch_dt','reuslts_numobuch_dt')" value="<?=$otchetnostArrLast['number_students_kd']?>"></th>
                                <th><input type="text" name="new_yers_numobuch_dt" class="inputsvvodcodtable new_yers_numobuch_dt" onkeyup="numresults('last_yers_numobuch_dt','new_yers_numobuch_dt','reuslts_numobuch_dt')" value="<?=$otchetnostArrNew['number_students_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numobuch_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_students_kd'] - (int)$otchetnostArrLast['number_students_kd'])?>" readonly></th>
                            </tr>
                            <tr>
                                <th class="txtleftth">Количество занятий</th>
                                <th><input type="text" name="last_yers_numzanyt" class="inputsvvodcodtable last_yers_numzanyt" onkeyup="numresults('last_yers_numzanyt','new_yers_numzanyt','reuslts_numzanyt')" value="<?=$otchetnostArrLast['number_classes']?>"></th>
                                <th><input type="text" name="new_yers_numzanyt" class="inputsvvodcodtable new_yers_numzanyt" onkeyup="numresults('last_yers_numzanyt','new_yers_numzanyt','reuslts_numzanyt')" value="<?=$otchetnostArrNew['number_classes']?>" ></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numzanyt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_classes'] - (int)$otchetnostArrLast['number_classes'])?>" readonly></th>
                                <th><input type="text" name="last_yers_numzanyt_dt" class="inputsvvodcodtable last_yers_numzanyt_dt" onkeyup="numresults('last_yers_numzanyt_dt','new_yers_numzanyt_dt','reuslts_numzanyt_dt')" value="<?=$otchetnostArrLast['number_classes_kd']?>"></th>
                                <th><input type="text" name="new_yers_numzanyt_dt" class="inputsvvodcodtable new_yers_numzanyt_dt" onkeyup="numresults('last_yers_numzanyt_dt','new_yers_numzanyt_dt','reuslts_numzanyt_dt')" value="<?=$otchetnostArrNew['number_classes_kd']?>"></th>
                                <th><input type="text" class="inputsvvodcodtable reuslts_numzanyt_dt" value="<?=znakmatemformat((int)$otchetnostArrNew['number_classes_kd'] - (int)$otchetnostArrLast['number_classes_kd'])?>" readonly></th>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="save_data_ochet_cod(<?=$idOtchet?>)">Сохранить</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?
}else{
$userifnar = querydb("SELECT * FROM `administatrors_user` WHERE `login` = '".chektextST($LoginUser)."' AND `hashauth` = '".chektextST($passUser)."'");
$otchetnostQr = querydb("SELECT * FROM `otchet_cod` WHERE `id_user` = '".$userifnar['id']."' ORDER BY id_otchet DESC",'noArray');
?>
    <div class="row">
    <div class="col_sm_12">
        <div class="card">
            <div class="card_body">
                <div class="table_responsive">
                    <table class="table user_table">
                        <thead>
                            <tr>
                                <th class="border_top_0">Библиотека</th>
                                <th class="border_top_0">ГГГГ | ММ</th>
                                <th class="border_top_0">Просмотр</th>
                                <th class="border_top_0">Загрузка</th>
                            </tr>
                        </thead>
                        <tbody>
<?while($otchetnostArr = mysqli_fetch_assoc($otchetnostQr)){
$infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$otchetnostArr['id_user']."'");
echo'<tr>';
echo'<th>'.$infuserID['biblios'].'</th>';
echo'<th>'.$otchetnostArr['date_otch'].'</th>';
echo'<th><a href="/work-cod'.$otchetnostArr['id_otchet'].'">Посмотреть</a></th>';
echo'<th><a href="#" onclick="downloadCodOtchet('.$otchetnostArr['id_otchet'].');return false;">Скачать</a></th>';
echo'</tr>';
}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?}?>