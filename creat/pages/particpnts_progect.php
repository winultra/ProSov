<?php
error_reporting(0);
if($section_page == 'add'){
$roles = 'volonters';
if($_GET['rule'] == 'dev') $roles = 'developers';
?>
<div class="wrapper_edit_history">
    <form id="upload-image-author" name="aboutAuthor" enctype="multipart/form-data">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Имя и Фамилия</div>
            <input type="text" name="name_fam" class="info_save inut_edit_razdel" value="">
        </div>
        <input type="hidden" name="operation" value="add_partic">
        <input type="hidden" name="roles" value="<?=$roles?>">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Род занатия</div>
            <input type="text" name="zanim" class="info_save inut_edit_razdel" value="">
        </div>
        <div class="wp_razdel_ed">
        <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Фото автора</div>
        <div class="form-group">
              <input type="file" name="image_after" id="image_after" class="image_after" accept="image/*">
              <br>
              <div class="image-preview_aftor"><img style="width:200px;" id="image_after_prew" src="" alt=""></div>
        </div>
    </div>
        <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo">Добавить</button></div>
    </form>
</div>
<?
}else if($section_page == 'edit'){
    $id = (int)$_GET['id'];
    $q = querydb('SELECT * FROM `ps_particpnts_progect` WHERE `id`= "'.$id.'"'); 
    $urlimg = '../img/particpnts_progect/'.$q['img']; 
?>
<div class="wrapper_edit_history">
    <form id="upload-image-author" name="aboutAuthor" enctype="multipart/form-data">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Имя и Фамилия</div>
            <input type="text" name="name_fam" class="info_save inut_edit_razdel" value="<?=$q['name_fam'];?>">
        </div>
        <input type="hidden" name="operation" value="edit_partic">
        <input type="hidden" name="id_user" value="<?=$id?>">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Род занатия</div>
            <input type="text" name="zanim" class="info_save inut_edit_razdel" value="<?=$q['subtitle']?>">
        </div>
        <div class="wp_razdel_ed">
        <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Фото автора</div>
        <div class="form-group">
              <input type="file" name="image_after" id="image_after" class="image_after" accept="image/*">
              <br>
              <div class="image-preview_aftor"><img style="width:200px;" id="image_after_prew" src="<?=$urlimg?>" alt=""></div>
        </div>
    </div>
        <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo">Сохранить</button></div>
    </form>
</div>
<?
}else{
?>
    <div class="wrapper_razdels_part">
        <div class="title_razdels">Разработчики проекта</div>
        <div class="wrapper_partis_user">
            <a href="/creat/particpnts-progect-add-dev">
                <div class="author_videos">
                    <div class="add_vidios add_videos_bg" style="height:227px;width:185px;font-size:142px;"><i class="mdi mdi-plus-circle"></i></div>
                    <div class="namfamauthro">Добавить</div>
                </div>
            </a>
            <?
            $q = querydb('SELECT * FROM `ps_particpnts_progect` WHERE `cat`= "developers"','all');
            while($r = mysqli_fetch_assoc($q)){
                $img = '../img/particpnts_progect/'.$r['img'];
                if(!exif_imagetype($img)) $img = '/img/no_photo.png';
            ?>
            <div class="partis_user" style="position:relative;">
                <i class="mdi mdi-close" title="Удалить" style="right:7px;" onclick="delete_partic(<?=$r['id']?>)"></i>
                <a href="/creat/particpnts-progect-edit<?=$r['id']?>"><i class="mdi mdi-pencil" title="Редактировать" style="bottom: 21px;right: 14px;top: unset;font-size: 35px;"></i></a>
                <img src="<?=$img?>" alt="<?=$r['name_fam']?>">
                <div class="title_partis_user"><?=$r['name_fam']?></div>
                <div class="subtitle_partis_user"><?=$r['subtitle']?></div>
            </div>
            <?}?>
        </div>
        <div class="wrapper_razdels_part" style="margin-top:80px;">
            <div class="title_razdels">Участники проекта</div>
            <div class="wrapper_partis_user">
            <a href="/creat/particpnts-progect-add-vol">
                <div class="author_videos">
                    <div class="add_vidios add_videos_bg" style="height:227px;width:185px;font-size:142px;"><i class="mdi mdi-plus-circle"></i></div>
                    <div class="namfamauthro">Добавить</div>
                </div>
            </a>
            <?
            $qq = querydb('SELECT * FROM `ps_particpnts_progect` WHERE `cat`= "volonters"','all');
            while($rr = mysqli_fetch_assoc($qq)){
                $imgg = '../img/particpnts_progect/'.$rr['img'];
                if(!exif_imagetype($imgg)) $imgg = '/img/no_photo.png';
            ?>
                <div class="partis_user" style="position:relative;">
                    <i class="mdi mdi-close" title="Удалить автора" style="right:7px;" onclick="delete_partic(<?=$rr['id']?>)"></i>
                    <a href="/creat/particpnts-progect-edit<?=$r['id']?>"><i class="mdi mdi-pencil" title="Редактировать" style="bottom: 21px;right: 14px;top: unset;font-size: 35px;"></i></a>
                    <img src="<?=$imgg?>" alt="<?=$rr['name_fam']?>">
                    <div class="title_partis_user"><?=$rr['name_fam']?></div>
                    <div class="subtitle_partis_user"><?=$rr['subtitle']?></div>
                </div>
            <?}?>
        </div>
    </div>
<?}?>