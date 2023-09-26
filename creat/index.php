<?php
//error_reporting(0);
include_once('local_variables.php');//Подключение локальных глобальных переменных
include_once($DIR.'/core/chekauthuser.php');

$LoginUser = $_COOKIE['login_user'];
$passUser = $_COOKIE['pass_user'];

$arrcatpages = explode('/', $_SERVER['REQUEST_URI']);

$razdel_pages = $arrcatpages[1];

include_once('pages/title_generate.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title><?=$title?></title>
    <link href="/images/favicon.ico" rel="shortcut icon" sizes="16x16" type="image/vnd.microsoft.icon">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css?v=2" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/core.js"></script>
</head>
<body>
    <!--Прелоудер-->
    <div class="preloader">
        <div class="lds_ripple">
            <div class="lds_pos"></div>
            <div class="lds_pos"></div>
        </div>
    </div>
    <?
    if(!isset($LoginUser) && !isset($passUser)){
        include('pages/authuser.php');
        echo"</body></html>";
        die;
    }
    //Подключение модального опроса для всех пользователей
    include_once('pages/modal_message.php');
    ?>
    <!--основная обертка-->
    <div class="main_wrapper">
        <!--Верхнее меню-->
        <? include_once('pages/topbar.php'); ?>
        <? include_once('pages/left_sidbar.php'); ?>
        <!-- Начало PageWrapper -->
        <div class="page_wrapper">
            <!--Бредкамп-->
            <?if($get_page == ''){?><div class="container_fluid"><div class="row"><div class="col_sm_12"><div class="card" style="padding:15px;font-size:25px;text-align:center;">Выберите раздел для работы</div></div></div></div><?}?>
            <?if($get_page == 'history-city-edit'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/history_city.php');
                echo'</div>';
            }
            if($get_page == 'interviewguarded'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/interviewguarded.php');
                echo'</div>';
            }
            if($get_page == 'interview-writer'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/interview_writer.php');
                echo'</div>';
            }
            if($get_page == 'interviews-leaders'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/interviews_leaders.php');
                echo'</div>';
            }
            if($get_page == 'how-it-was'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/howitwas.php');
                echo'</div>';
            }
            if($get_page == 'about-authors'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/about_authors.php');
                echo'</div>';
            }
            if($get_page == 'attractions'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/attractions.php');
                echo'</div>';
            }
            if($get_page == 'about-edit'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/about.php');
                echo'</div>';
            }
            if($get_page == 'particpnts-progect'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/particpnts_progect.php');
                echo'</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>