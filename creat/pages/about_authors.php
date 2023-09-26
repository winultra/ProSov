<?php  
if($section_page == 'add'){?>
<div class="wrapper_edit_history">
    <form id="upload-image-author" name="aboutAuthor" enctype="multipart/form-data">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Имя и Фамилия</div>
            <input type="text" name="name_fam" class="info_save inut_edit_razdel" value="">
        </div>
        <input type="hidden" name="operation" value="add_aboutAuthor">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Описание</div>
            <textarea name="about" class="info_save text_area_razdel"></textarea>
        </div>
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Ссылка на библиотеку</div>
            <input type="text" name="urls_lib" class="info_save inut_edit_razdel" value="">
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
}else{
$queryAuthr = querydb('SELECT * FROM `ps_to_author`','all');
?>
    <div class="wrapper_author">
        <a href="/creat/about-authors-add">
            <div class="author_videos">
                <div class="add_vidios add_videos_bg" style="height:211px;"><i class="mdi mdi-plus-circle"></i></div>
                <div class="namfamauthro">Добавить</div>
            </div>
        </a>
        <?while($queryAuthrar = mysqli_fetch_assoc($queryAuthr)){?>
        <div class="wphowitwas" style="position:relative;">
            <i class="mdi mdi-close" title="Удалить автора" onclick="delete_aauthor(<?=$queryAuthrar['id']?>)"></i>
            <a href="/literary-life/about-authors?id=<?=$queryAuthrar['id']?>">
                <div class="author" style="height:250px;">
                    <img src="<?=$queryAuthrar['img']?>" alt="<?=$queryAuthrar['curl']?>">
                    <div class="namfamauthro"><?=$queryAuthrar['name_fam']?></div>
                </div>
            </a>
        </div>
        <?}?>
    </div>
<?}?>