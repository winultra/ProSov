<?/*
Settings
title: Интервью с писателем
preincludepages:
postincludepages:
*/
$selid=$_GET['id'];
?><div class="wrapperKontentCenter"><?
if(isset($selid)){
$selid = (int)chektextST($selid);
$queryinfoAuthor = querydb('SELECT * FROM `ps_interview_writer` WHERE `id`= "'.$selid.'"');
?>
<div class="page_title" style="margin-bottom:15px;"><a href="/">Главная</a> &mdash; <a href="/literary-life/Interview-writer">Интервью с писателем</a> &mdash; <?=$queryinfoAuthor['title']?></div>
    <?if($queryinfoAuthor['services'] == 'youtube'){?>
        <div class="wrapper_video_youtube">
            <iframe style="height:calc(100vh - 318px);width:inherit;" src="https://www.youtube.com/embed/<?=$queryinfoAuthor['url_code']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
<?    }
}else{
$queryAuthr = querydb('SELECT * FROM `ps_interview_writer`','all');
$index=0;
?>
    <div class="page_title" style="margin-bottom:15px;"><a href="/">Главная</a> &mdash; Интервью с писателем</div>
    <div class="wrapper_author">
    <?while($queryAuthrar = mysqli_fetch_assoc($queryAuthr)){?>
        <a href="/history/Interview-writer?id=<?=$queryAuthrar['id']?>">
            <?if($queryAuthrar['services'] == 'youtube'){?>
                <div class="author_videos">
                    <img src="https://img.youtube.com/vi/<?=$queryAuthrar['url_code']?>/0.jpg" alt="<?=$queryAuthrar['curl']?>">
                    <div class="namfamauthro"><?=$queryAuthrar['title']?></div>
                </div>
            <?}?>
        </a>
        <?$index++;}
        if($index == 0){echo'<div class="NoData">Контент временно отсутсвует</div>';}
        ?>
    </div>
<?}?>
</div>