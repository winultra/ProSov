<?php  
if($section_page == 'add'){?>
<div class="wrapper_edit_history">
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Ссылка на видео</div>
        <input type="text" name="urls_video" class="info_save inut_edit_razdel" value="">
    </div>
    <div class="wp_razdel_ed">
        <div class="tittlerzdel">Название видео</div>
        <input type="text" name="title_video" class="info_save inut_edit_razdel" value="">
    </div>
    <!--<div class="wp_razdel_ed">
        <div class="tittlerzdel">Видеохостинг</div>
        <select name="">
            <option value="yt">YouTube</option>
        </select>
    </div>-->
    <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="add_video_interviewguarded()">Добавить</button></div>
</div>
<?
}else{
    $queryAuthr = querydb('SELECT * FROM `ps_interviewguarded`','all');  
?>
    <div class="wrapper_author">
    <a href="/creat/interviewguarded-add">
            <div class="author_videos">
                <div class="add_vidios add_videos_bg"><i class="mdi mdi-plus-circle"></i></div>
                <div class="namfamauthro">Добавить видео</div>
            </div>
        </a>
    <?while($queryAuthrar = mysqli_fetch_assoc($queryAuthr)){?>
            <?if($queryAuthrar['services'] == 'youtube'){?>
                <div class="author_videos">
                    <i class="mdi mdi-close" title="Удалить видео" onclick="delete_video_interviewguarded(<?=$queryAuthrar['id']?>)"></i>
                    <a href="/history/interviewguarded?id=<?=$queryAuthrar['id']?>" target="_tblank">
                        <img src="https://img.youtube.com/vi/<?=$queryAuthrar['url_code']?>/0.jpg" alt="<?=$queryAuthrar['curl']?>">
                        <div class="namfamauthro"><?=$queryAuthrar['title']?></div>
                    </a>
                </div>
            <?}?>
        <?}?>
    </div>
<?}?>