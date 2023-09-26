<?/*
Settings
title:Как было как стало
preincludepages:
postincludepages:
*/
$id_hiw = $_GET['id'];
if(isset($id_hiw)){
    $id_hiw = (int)chektextST($id_hiw);
    $queryhowitwas=querydb('SELECT * FROM `ps_howitwas` WHERE `id` = "'.$id_hiw.'"');
?>
<link rel="stylesheet" type="text/css" href="/css/twentytwenty.css">
<div class="wrapperKontentCenter">
    <div class="page_title" style="margin-bottom:15px;"><a href="/">главная</a> &mdash; <a href="/history/how-it-was">Как было как стало</a> &mdash; <?=$queryhowitwas['title']?></div>
    <div id='container1'>
        <img src='<?=$queryhowitwas['img_befor']?>'>
        <img src='<?=$queryhowitwas['img_after']?>'>
    </div>
    <div class="infoauthro" style="width: 100%;">
        <div class="page_title" style="font-size:24pt;margin: 15px 0;"><?=$queryhowitwas['title']?></div>
        <div class="about_author"><?=$queryhowitwas['article']?></div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.event.move.js"></script>
<script type="text/javascript" src="/js/jquery.twentytwenty.js"></script>
<script>
$(window).load(function() {
    $('#container1').twentytwenty();
});
</script>
<?}else{
$queryhowitwas= querydb('SELECT * FROM `ps_howitwas`','all');
?>
<div class="wrapperKontentCenter">
    <div class="page_title" style="margin-bottom:15px;"><a href="/">главная</a> &mdash; Как было как стало</div>
    <div class="wrapper_author" style="margin-top:15px;">
    <?while($rshowitwas=mysqli_fetch_assoc($queryhowitwas)){?>
        <a href="/history/how-it-was?id=<?=$rshowitwas['id']?>">
            <div class="atraction" style="background-image: url('<?=$rshowitwas['img_after']?>');">
                <div class="title_atraction"><?=$rshowitwas['title']?></div>
            </div>
        </a>
        <?}?>
    </div>
</div>
<?}?>