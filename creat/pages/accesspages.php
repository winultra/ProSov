<?
$LoginUser = chektextST($_COOKIE['login_user']);
$passUser = chektextST($_COOKIE['pass_user']);
$INFOUSER = querydb("SELECT * FROM `ps_users` WHERE `login` = '".$LoginUser."' AND `hashauth` = '".$passUser."'");
$get_page = $_GET['page'];
$section_page = $_GET['section'];
$RULS_USER = $INFOUSER['ruls'];
?>