<?
error_reporting(0);
include_once('local_variables.php');//Подключение глобальный переменных для сайта
include_once($DIR.'/core/linkbd.php');
include_once($DIR.'/core/lib_function.php');
$page = routing_url($_SERVER["REQUEST_URI"]);
if($page == null) $page = 'index';
if(therepage($page) == 'nopage') $page = 'index';
$arinf = routing_page($page,5);
//Array ( [0] => Settings [2] => title: ProSov [3] => includepages: top_img,top_sliders )
$title_inf = explode(':',$arinf[2]);
$preinclude = explode(',',explode(':',$arinf[3])[1]);
$posinclude = explode(',',explode(':',$arinf[4])[1]);
//Array ( [0] => top_img [1] => top_sliders )
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title_inf[1]?></title>
    <link rel="stylesheet" type="text/css" href="/css/style.css?v=6">
    <!--Favicons-->
    <link type="image/x-icon" rel="shortcut icon" href="/images/favicon.ico">
    <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
    <link type="image/png" sizes="16x16" rel="icon" href="/images/favicon.png">
    <link type="image/png" sizes="32x32" rel="icon" href="/images/favicon.png">
    <link type="image/png" sizes="96x96" rel="icon" href="/images/favicon.png">
    <link type="image/png" sizes="120x120" rel="icon" href="/images/favicon.png">
    <link type="image/png" sizes="192x192" rel="icon" href="/images/favicon.png">
    <?/*<!--

    <link sizes="57x57" rel="apple-touch-icon" href="…/apple-touch-icon-57x57.png">
    <link sizes="60x60" rel="apple-touch-icon" href="…/apple-touch-icon-60x60.png">
    <link sizes="72x72" rel="apple-touch-icon" href="…/apple-touch-icon-72x72.png">
    <link sizes="76x76" rel="apple-touch-icon" href="…/apple-touch-icon-76x76.png">
    <link sizes="114x114" rel="apple-touch-icon" href="…/apple-touch-icon-114x114.png">
    <link sizes="120x120" rel="apple-touch-icon" href="…/apple-touch-icon-120x120.png">
    <link sizes="144x144" rel="apple-touch-icon" href="…/apple-touch-icon-144x144.png">
    <link sizes="152x152" rel="apple-touch-icon" href="…/apple-touch-icon-152x152.png">
    <link sizes="180x180" rel="apple-touch-icon" href="…/apple-touch-icon-180x180.png">

    <link color="#e52037" rel="mask-icon" href="…/safari-pinned-tab.svg">

    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-TileImage" content="…/mstile-144x144.png">
    <meta name="msapplication-square70x70logo" content="…/mstile-70x70.png">
    <meta name="msapplication-square150x150logo" content="…/mstile-150x150.png">
    <meta name="msapplication-wide310x150logo" content="…/mstile-310x310.png">
    <meta name="msapplication-square310x310logo" content="…/mstile-310x150.png">
    <meta name="application-name" content="My Application">
    <meta name="msapplication-config" content="…/browserconfig.xml">

    <link rel="manifest" href="…/manifest.json">
    <meta name="theme-color" content="#ffffff"> может карасить*/?>
</head>
<body>
    <?
    include_once($DIR.'/pages/tophead.php');
    ?><div class="wrapper"><?
        for($i=0; $i < count($preinclude); $i++){
            $ls = trim($preinclude[$i]);
            if(!empty($ls)) include_once($DIR.'/pages/'.$ls.'.php');
        }
        include_once($DIR.'/pages/'.$page.'.php');
        for($i=0; $i < count($posinclude); $i++){
            $ls = trim($posinclude[$i]);
            if(!empty($ls)) include_once($DIR.'/pages/'.$ls.'.php');
        }
        ?></div><?
        include_once($DIR.'/pages/footer.php');
        ?>
    <script type="text/javascript" src="/js/main.js?v=3"></script>
</body>
</html>