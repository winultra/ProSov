<?/*
Settings
title:Об авторах
preincludepages:
postincludepages:
*/
$selid=$_GET['id'];
if(isset($selid)){
$selid = (int)chektextST($selid);
$queryinfoAuthor = querydb('SELECT * FROM `ps_to_author` WHERE `id`= "'.$selid.'"');
?>
<div class="wrapperKontentCenter">
    <div class="page_title" style="margin-bottom:15px;font-size:8pt;"><a href="/">главная</a> &mdash; <a href="/literary-life/about-authors">Об авторах</a> &mdash; <?=$queryinfoAuthor['name_fam']?></div>
    <div class="wrapinfoauthro">
        <img src="<?=$queryinfoAuthor['img']?>" alt="<?=$queryAuthrar['curl']?>">
        <div class="infoauthro">
            <div class="page_title" style="font-size:24pt;margin-bottom:15px;"><?=$queryinfoAuthor['name_fam']?></div>
            <div class="about_author"><?=$queryinfoAuthor['about']?></div>
            <br><br><br>
            <a href="<?=$queryinfoAuthor['url_past']?>" target="_blank">Перейти к произведениям автора</a>
        </div>
    </div>
</div>
<?
}else{
$queryAuthr = querydb('SELECT * FROM `ps_to_author`','all');
?>
<div class="wrapperKontentCenter">
    <div class="page_title" style="margin-bottom:15px;"><a href="/">главная</a> &mdash; Об авторах</div>
    <div class="wrapper_author">
        <?while($queryAuthrar = mysqli_fetch_assoc($queryAuthr)){?>
        <a href="/literary-life/about-authors?id=<?=$queryAuthrar['id']?>">
            <div class="author">
                <img src="<?=$queryAuthrar['img']?>" alt="<?=$queryAuthrar['curl']?>">
                <div class="namfamauthro"><?=$queryAuthrar['name_fam']?></div>
            </div>
        </a>
        <?}?>
    </div>
</div>
<?}?>