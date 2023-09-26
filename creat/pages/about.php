<?
$queryhistabout = querydb('SELECT * FROM `ps_statick_page_inform` WHERE `page` = \'about\'');
$inf = json_decode($queryhistabout['about'],true);
?>
<div class="wrapper_edit_history">
    <form id="upload-image-author" name="aboutAuthor" enctype="multipart/form-data">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Загловок: </div>
            <input type="text" name="title" class="info_save inut_edit_razdel" value="<?=$inf['title']?>">
        </div>
        <input type="hidden" name="operation" value="edit_about">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Описание</div>
            <textarea name="about" class="info_save text_area_razdel"><?=$queryhistabout['text']?></textarea>
        </div>
        <div class="wp_razdel_ed">
        <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Фото</div>
        <div class="form-group">
              <input type="file" name="image_after" id="image_after" class="image_after" accept="image/*">
              <br>
              <div class="image-preview_aftor"><img style="width:200px;" id="image_after_prew" src="<?=$inf['img']?>" alt=""></div>
        </div>
    </div>
        <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo">Добавить</button></div>
    </form>
</div>