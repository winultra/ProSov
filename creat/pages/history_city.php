<?php
$queryhistCity = querydb('SELECT * FROM `ps_statick_page_inform` WHERE `page` = \'history-city\'');
$inf = json_decode($queryhistCity['about'],true);
?>
<div class="wrapper_edit_history">
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Заголовок:</div>
        <input type="text" name="title" class="info_save inut_edit_razdel" value="<?=$inf['title']?>">
    </div>
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Статья: </div>
        <textarea name="text" class="info_save text_area_razdel"><?=$queryhistCity['text']?></textarea>
    </div>
    <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="save_info_history_page()">Сохранить</button></div>
</div>