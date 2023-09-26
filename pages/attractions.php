<?/*
Settings
title:Достопримечательности
preincludepages:
postincludepages:
*/

$id_atr = $_GET['id'];
if(isset($id_atr)){
$id_atr = (int)chektextST($id_atr);
$queryatraction=querydb('SELECT * FROM `ps_atraction` WHERE `id` = "'.$id_atr.'"');
?>
<div class="wrapperKontentCenter">
    <div class="page_title" style="margin-bottom:15px;font-size:8pt;"><a href="/">главная</a> &mdash; <a href="/about-modernity/attractions">Достопримечательности</a> &mdash; <?=$queryatraction['title']?></div>
    <div class="wrapinfoauthro">
        <img src="<?=$queryatraction['imgs']?>" alt="<?=$queryatraction['curl']?>">
        <div class="infoauthro">
            <div class="page_title" style="font-size:24pt;margin-bottom:15px;"><?=$queryatraction['title']?></div>
            <div class="about_author"><?=$queryatraction['article']?><div class="author_articl"><?=$queryatraction['author_article']?></div></div>
        </div>
</div>
<?}else{
$queryatraction= querydb('SELECT * FROM `ps_atraction`','all');
?>
<div class="wrapperKontentCenter">
    <div class="page_title"><a href="/">главная</a> &mdash; Достопримечательности</div>
    <div class="wrapper_author" style="margin-top:15px;">
    <?while($queryatractionar = mysqli_fetch_assoc($queryatraction)){?>
        <a href="/about-modernity/attractions?id=<?=$queryatractionar['id']?>">
            <div class="atraction" style="background-image: url('<?=$queryatractionar['imgs']?>');">
                <div class="title_atraction"><?=$queryatractionar['title']?></div>
            </div>
        </a>
        <?}?>
    </div>
</div>
<?}?>