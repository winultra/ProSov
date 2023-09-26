<?php  
if($section_page == 'add'){?>
<div class="wrapper_edit_history">
    <form id="upload-image-author" name="aboutAuthor" enctype="multipart/form-data">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Название: </div>
            <input type="text" name="title" class="info_save inut_edit_razdel" value="">
        </div>
        <input type="hidden" name="operation" value="add_attractions">
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Описание: </div>
            <textarea name="about" class="info_save text_area_razdel"></textarea>
        </div>
        <div class="wp_razdel_ed">
            <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Автор: </div>
            <input type="text" name="author" class="info_save inut_edit_razdel" value="<?=$INFOUSER['familia'].' '.$INFOUSER['name']?>">
        </div>
        <div class="wp_razdel_ed">
        <div class="tittlerzdel" style="font-size:16px;padding-top:6px;">Фото</div>
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
    $queryatraction= querydb('SELECT * FROM `ps_atraction`','all');
?>
        <div class="wrapper_author" style="margin-top:15px;">
        <a href="/creat/attractions-add">
            <div class="author_videos">
                <div class="add_vidios add_videos_bg" style="height:147px;font-size:98px;"><i class="mdi mdi-plus-circle"></i></div>
            </div>
        </a>
        <?while($queryatractionar = mysqli_fetch_assoc($queryatraction)){?>
        <div class="wphowitwas" style="position:relative;">
            <i class="mdi mdi-close" title="Удалить запись" onclick="delete_attraction(<?=$queryatractionar['id']?>)"></i>
            <a href="/about-modernity/attractions?id=<?=$queryatractionar['id']?>">
                <div class="atraction" style="background-image: url('<?=$queryatractionar['imgs']?>');">
                    <div class="title_atraction"><?=$queryatractionar['title']?></div>
                </div>
            </a>
        </div>
            <?}?>
        </div>
<?}?>