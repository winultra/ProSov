<?/*
Settings
title:Участники проекта
preincludepages:
postincludepages:
*/
?>
<div class="wrapperKontentCenter">
    <div class="page_title" style="margin-bottom:15px;"><a href="/">главная</a> &mdash; Участники проекта</div>
    <div class="wrapper_razdels_part">
        <div class="title_razdels">Разработчики проекта</div>
        <div class="wrapper_partis_user">
            <?
            $q = querydb('SELECT * FROM `ps_particpnts_progect` WHERE `cat`= "developers"','all');
            while($r = mysqli_fetch_assoc($q)){
                $img = '/img/particpnts_progect/'.$r['img'];
                if(!exif_imagetype ($DIR.$img)) $img = '/img/no_photo.png';
            ?>
            <div class="partis_user">
                <img src="<?=$img?>" alt="<?=$r['name_fam']?>">
                <div class="title_partis_user"><?=$r['name_fam']?></div>
                <div class="subtitle_partis_user"><?=$r['subtitle']?></div>
            </div>
            <?}?>
        </div>
        <div class="wrapper_razdels_part" style="margin-top:80px;">
            <div class="title_razdels">Участники проекта</div>
            <div class="wrapper_partis_user">
            <?
            $qq = querydb('SELECT * FROM `ps_particpnts_progect` WHERE `cat`= "volonters"','all');
            while($rr = mysqli_fetch_assoc($qq)){
                $imgg = '/img/particpnts_progect/'.$rr['img'];
                if(!exif_imagetype($DIR.$imgg)) $imgg = '/img/no_photo.png';
            ?>
                <div class="partis_user">
                    <img src="<?=$imgg?>" alt="<?=$rr['name_fam']?>">
                    <div class="title_partis_user"><?=$rr['name_fam']?></div>
                    <div class="subtitle_partis_user"><?=$rr['subtitle']?></div>
                </div>
            <?}?>
        </div>
    </div>
</div>