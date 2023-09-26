<?php
/*Извиняюсь что такое меню и так много мусорного кода! ;( Можно было гораздо проще.*/
//История
$history_active='';$ha_hg='';$ha_is='';$ha_kbks='';$ha_dis='style="display:none;"';
if(trim($get_page) == 'history-city-edit' || trim($get_page) == 'interviewguarded' || trim($get_page) == 'how-it-was'){
    $history_active='active';$ha_dis='';
    if(trim($get_page) == 'history-city-edit') $ha_hg='active';
    if(trim($get_page) == 'interviewguarded') $ha_is='active';
    if(trim($get_page) == 'how-it-was') $ha_kbks='active';
}
//Литературная жизнь
$liter_life='';$la_oa='';$la_isp='';$la_g='';$la_dis='style="display:none;"';
if(trim($get_page) == 'about-authors' || trim($get_page) == 'interview-writer' || trim($get_page) == 'ssss'){
    $liter_life='active';$la_dis='';
    if(trim($get_page) == 'about-authors') $la_oa='active';
    if(trim($get_page) == 'interviewguarded') $la_isp='active';
    if(trim($get_page) == 'interview-writer') $la_iwi='active';
}
//О современности
$osovrem='';$s_dos='';$s_inter='';$s_dis='style="display:none;"';
if(trim($get_page) == 'attractions' || trim($get_page) == 'interviews-leaders'){
    $osovrem='active';$s_dis='';
    if(trim($get_page) == 'attractions') $s_dos='active';
    if(trim($get_page) == 'interviews-leaders') $s_inter='active';
}
//О нас
$about='';$a_proj='';$a_part='';$a_dis='style="display:none;"';
if(trim($get_page) == 'about-edit' || trim($get_page) == 'particpnts-progect'){
    $about='active';$a_dis='';
    if(trim($get_page) == 'about-edit') $a_proj='active';
    if(trim($get_page) == 'particpnts-progect') $a_part='active';
}
?>
<aside class="left_sidebar">
            <!--Прокручивающийся сайтбар-->
            <div class="scroll_sidebar">
                <nav class="sidebar_nav">
                    <ul class="sidebarnav">
                        <li class="sidebar_item">
                            <a href="#" class="sidbar_link waves-effect <?=$history_active?>">
                                <i class="mdi mdi-border-color"></i>
                                <span class="hide_menu">История</span>
                            </a>
                            <ul class="sidbar_podmenu" <?=$ha_dis?>>
                                <a href="/creat/history-city-edit" class="link_sidbar_podmenu"><li class="item_podmenu <?=$ha_hg?>">1. История города</li></a>
                                <a href="/creat/interviewguarded" class="link_sidbar_podmenu"><li class="item_podmenu <?=$ha_is?>">2. Интервью старожил</li></a>
                                <a href="/creat/how-it-was" class="link_sidbar_podmenu"><li class="item_podmenu <?=$ha_kbks?>">3. Как было как стало</li></a>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sidebarnav">
                        <li class="sidebar_item">
                            <a href="#" class="sidbar_link waves-effect <?=$liter_life?>">
                                <i class="mdi mdi-border-color"></i>
                                <span class="hide_menu">Литературная жизнь</span>
                            </a>
                            <ul class="sidbar_podmenu" <?=$la_dis?>>
                                <a href="/creat/about-authors" class="link_sidbar_podmenu"><li class="item_podmenu <?=$la_oa?>">1. Об авторах</li></a>
                                <a href="/creat/interview-writer" class="link_sidbar_podmenu"><li class="item_podmenu <?=$la_iwi?>">2. Интервью с писателем</li></a>
                                <!--<a href="/creat/#" class="link_sidbar_podmenu"><li class="item_podmenu ">3. Газета</li></a>-->
                            </ul>
                        </li>
                    </ul>
                    <ul class="sidebarnav">
                        <li class="sidebar_item">
                            <a href="#" class="sidbar_link waves-effect <?=$osovrem?>">
                                <i class="mdi mdi-border-color"></i>
                                <span class="hide_menu">О современности</span>
                            </a>
                            <ul class="sidbar_podmenu" <?=$s_dis?>>
                                <a href="/creat/attractions" class="link_sidbar_podmenu"><li class="item_podmenu <?=$s_dos?>">1. Достопримечательности</li></a>
                                <a href="/creat/interviews-leaders" class="link_sidbar_podmenu"><li class="item_podmenu <?=$s_inter?>">2. Интервью с лидерами</li></a>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sidebarnav">
                        <li class="sidebar_item">
                            <a href="#" class="sidbar_link waves-effect <?=$about?>">
                                <i class="mdi mdi-border-color"></i>
                                <span class="hide_menu">О нас</span>
                            </a>
                            <ul class="sidbar_podmenu" <?=$a_dis?>>
                                <a href="/creat/about-edit" class="link_sidbar_podmenu"><li class="item_podmenu <?=$a_proj?>">1. О проекте</li></a>
                                <a href="/creat/particpnts-progect" class="link_sidbar_podmenu"><li class="item_podmenu <?=$a_part?>">2. Участники проекта</li></a>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--подвал сайтбара-->
            <div class="sidebar_footer">
                <div class="row">
                    <div class="link_wrap">
                        <a onclick="exituser()" class="link" title="Выход"><i class="mdi mdi-power"></i></a>
                    </div>
                </div>
            </div>
        </aside>