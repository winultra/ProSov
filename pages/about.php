<?/*
Settings
title:О проекте
preincludepages:
postincludepages:
*/
$queryhistCity = querydb('SELECT * FROM `ps_statick_page_inform` WHERE `page` = \'about\'');
$inf = json_decode($queryhistCity['about'],true);
?>
<img src="<?=$inf['img']?>" class="history_case">
<div class="wrapperKontentCenter">
    <div class="page_title" style="margin-bottom:15px;"><a href="/">главная</a> &mdash; О проекте</div>
    <div class="text_articles">
        <span class="heading_articles"><?=$inf['title']?></span>
        <?php echo $queryhistCity['text'];?>
    </div>
</div>