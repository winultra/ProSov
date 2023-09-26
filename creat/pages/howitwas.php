<?php  
if($section_page == 'add'){?>
<div class="wrapper_edit_history">
<form id="upload-image" name="howitwas" enctype="multipart/form-data">
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Заголовок: </div>
        <input type="text" name="title" class="info_save inut_edit_razdel" value="">
    </div>
    <input type="hidden" name="operation" value="add_howitwas">
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Описание: </div>
        <textarea name="about" class="info_save text_area_razdel"></textarea>
    </div>
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Автор: </div>
        <input type="text" name="author" class="info_save inut_edit_razdel" value="<?=$INFOUSER['familia'].' '.$INFOUSER['name']?>">
    </div>
    
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Загрзуить До</div>
        <div class="form-group">
              <input type="file" name="image_before" id="image_b" class="b_after" accept="image/*">
              <br>
              <div class="image-preview"><img id="preview_before" src="" alt=""></div>
        </div>
    </div>
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Загрзуить после</div>
        <div class="form-group">
            <input type="file" name="image_after" id="image_p" class="p_after" accept="image/*">
            <br>
            <div class="image-preview"><img id="preview_after" src="" alt=""></div>
        </div>
    </div>
    <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="add_howitwas();return false;">Добавить</button></div>
    </form>
</div>
<?
}else if($section_page == 'edit'){//Нет надобности в реализации...
    
}else{
    $queryhowitwas= querydb('SELECT * FROM `ps_howitwas`','all');
?>
    <div class="wrapper_author" style="margin-top:15px;">
    <a href="/creat/how-it-was-add">
        <div class="author_videos">
            <div class="add_vidios add_videos_bg" style="height:123px;font-size:82px;"><i class="mdi mdi-plus-circle"></i></div>
            <div class="namfamauthro">Добавить</div>
        </div>
    </a>
    <?while($rshowitwas=mysqli_fetch_assoc($queryhowitwas)){?>
        <div class="wphowitwas" style="position:relative;">
            <i class="mdi mdi-close" title="Удалить видео" onclick="delete_howitwas(<?=$rshowitwas['id']?>)"></i>
            <a href="/history/how-it-was?id=<?=$rshowitwas['id']?>" target="_tblank">
                <div class="atraction" style="background-image: url('..<?=$rshowitwas['img_after']?>');">
                    <div class="title_atraction"><?=$rshowitwas['title']?></div>
                </div>
            </a>
        </div>
        <?}?>
    </div>
<?}?>