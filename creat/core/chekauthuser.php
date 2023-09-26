<?php
include_once($DIR.'/core/linkbd.php');
include_once($DIR.'/core/lib_function.php');
include_once($DIR.'/pages/accesspages.php');
$authtrigger = "off";
if(isset($LoginUser) && isset($passUser)){
    $queryInfoUser = querydb("SELECT login,hashauth,name,familia FROM `ps_users` WHERE `login` = '".$LoginUser."' AND `hashauth` = '".$passUser."'");
    $nfuser = $queryInfoUser['familia'].' '.$queryInfoUser['name'];
    if($queryInfoUser['login'] != $LoginUser || $queryInfoUser['hashauth'] != $passUser){
        unset($_COOKIE['login_user']);unset($_COOKIE['pass_user']);
        setcookie('login_user', null, -1, '/');setcookie('pass_user', null, -1, '/');
    }
}
if(!isset($_COOKIE['login_user']) && !isset($_COOKIE['pass_user'])) $authtrigger="on";
?>