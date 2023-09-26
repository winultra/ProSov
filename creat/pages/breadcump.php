<?php
$page_titile="";$arrBredcummenu=[];
if($get_page == 'history-city-edit'){
    $page_titile = "Редактировать страницу - История города";
}
if($get_page == 'interviewguarded'){
    $page_titile = "Редактировать контент - Интервью старожил";
    //$arrBredcummenu[]=generateBredcummenu(['Добавить новость'],['/creat/interviewguarded-add']);
}
if($get_page == 'interview-writer'){
    $page_titile = "Редактировать контент - Интервью с писателем";
}
if($get_page == 'interviews-leaders'){
    $page_titile = "Редактировать контент - Интервью с лидерами";
}
if($get_page == 'how-it-was'){
    $page_titile = "Редактировать контент - Как было как стало";
}
if($get_page == 'about-authors'){
    $page_titile = "Редактировать контент - Об авторах";
}
if($get_page == 'attractions'){
    $page_titile = "Редактировать контент - ДОСТОПРИМЕЧАТЕЛЬНОСТИ";
}
if($get_page == 'about-edit'){
    $page_titile = "Редактировать контент - О нас";
}
if($get_page == 'particpnts-progect'){
    $page_titile = "Редактировать контент - Команда проекта";
}
?>
<div class="page_breadcrumb">
    <div class="align_itms row">
        <div class="alig_self">
            <h3 class="page_title"><?=$page_titile?></h3>
        </div>
        <div class="bredacummenu">
        <?
        for($i=0; $i < count($arrBredcummenu); $i++){
            echo '<a href="'.$arrBredcummenu[$i][0][1].'"><div class="itme_bredcaumomenu">'.$arrBredcummenu[$i][0][0].'</div></a>';
        }
        ?>
        </div>
    </div>
</div>