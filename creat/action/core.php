<?php
include_once('../local_variables.php');//Подключение локальных глобальных переменных
include_once($DIR.'/core/linkbd.php');
include_once($DIR.'/core/lib_function.php');
include_once($DIR.'/pages/accesspages.php');
$authmetod = chektext('operation');
$LoginUser = chektextST($_COOKIE['login_user']);
$passUser = chektextST($_COOKIE['pass_user']);
//ini_set('max_execution_time', 240);
if($authmetod == 'authuser'){
/*Авторизация пользователя*/
    $login = chektext('login');
    $pass = chektext('pass');
    if(isset($login) && isset($pass) && !isset($_COOKIE['login_user']) && !isset($_COOKIE['pass_user'])){
        $sol1="sj7kasj2";$sol2="ldkf!ss2";
        $respass = md5(md5($sol1.$pass.$sol2));
        $queryInfoUser = querydb("SELECT password,ruls FROM `ps_users` WHERE `login` = '".$login."'");
        $passbd = $queryInfoUser['password'];
        $ruls = $queryInfoUser['ruls'];
        if($ruls != 'admin' && $ruls != 'moder'){jsonecho('auth_error');die;}
        if($passbd == $respass){
            $hashKod = generateCode(10).time();
            $hash = hash('sha256', $hashKod);
            querydb("UPDATE `ps_users` SET `hashauth` = '".$hash."' WHERE `login` = '".$login."' AND `password` = '".$respass."'",'update');
            $date = date("Y-m-d H:i:s");
            setcookie("login_user", $login, time() + 60*60*24*365,"/");
            setcookie("pass_user", $hash , time() + 60*60*24*365,"/");
            jsonecho('sc','sc');die;
        }else{jsonecho('nopasslo');die;}
    }else{jsonecho('obradmin');die;}
}
if($authmetod == 'exit'){
/*Деавторизация пользователя*/
    querydb("UPDATE `ps_users` SET `hashauth` = ' ' WHERE `login` = '".$LoginUser."' AND `hashauth` = '".$passUser."'",'update');
    unset($_COOKIE['login_user']);unset($_COOKIE['pass_user']);
    setcookie('login_user', null, -1, '/');setcookie('pass_user', null, -1, '/');
    jsonecho('sc','sc');die;
}
if($authmetod == 'save_info_history_page'){
    $data = arrastr($_POST['date'], '&');
    if($RULS_USER == 'admin'){
        $queryhistCity = querydb('SELECT * FROM `ps_statick_page_inform` WHERE `page` = \'history-city\'');
        $inf = json_decode($queryhistCity['about'],true);
        $update_info = '{"title" : "'.$data['title'].'", "img" : "'.$inf['img'].'"}';
        querydb("UPDATE `ps_statick_page_inform` SET `text`='".$data['text']."',`about`='".$update_info."',`last_author_edit_id`='".$INFOUSER['id']."' WHERE `page` = 'history-city'",'insert');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'add_video_interviewguarded'){
    $date_res = explode('&', $_POST['date']);
    if($RULS_USER == 'admin' || $RULS_USER == 'moder'){
        $rsd = [];
        for($i=0; $i < count($date_res);$i++){
            if(stristr($date_res[$i], 'watch?v=') === FALSE){
                if(stristr($date_res[$i], 'youtu.be/') !== FALSE){
                    $s = explode('youtu.be/',$date_res[$i]);
                }else{
                    $s = explode('=',$date_res[$i]);
                }
                $rsd[] = trim($s[1]);
            }else{
                $s = explode('=',$date_res[$i]);
                $rsd[] = trim($s[2]);
            }
        }
        $curl = translit($rsd[1]);
        querydb("INSERT INTO `ps_interviewguarded`(`curl`, `title`, `about`, `url_code`, `services`, `author_id`) VALUES ('".$curl."','".$rsd[1]."','','".$rsd[0]."','youtube','".$INFOUSER['id']."')",'insert');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'delete_video_interviewguarded'){
    $id=(int)$_POST['id'];
    if($RULS_USER == 'admin'){
        querydb("DELETE FROM `ps_interviewguarded` WHERE `id` = '".$id."' ",'del');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'add_video_interviewwriter'){
    $date_res = explode('&', $_POST['date']);
    if($RULS_USER == 'admin' || $RULS_USER == 'moder'){
        $rsd = [];
        for($i=0; $i < count($date_res);$i++){
            if(stristr($date_res[$i], 'watch?v=') === FALSE){
                if(stristr($date_res[$i], 'youtu.be/') !== FALSE){
                    $s = explode('youtu.be/',$date_res[$i]);
                }else{
                    $s = explode('=',$date_res[$i]);
                }
                $rsd[] = trim($s[1]);
            }else{
                $s = explode('=',$date_res[$i]);
                $rsd[] = trim($s[2]);
            }
        }
        $curl = translit($rsd[1]);
        querydb("INSERT INTO `ps_interview_writer`(`curl`, `title`, `about`, `url_code`, `services`, `author_id`) VALUES ('".$curl."','".$rsd[1]."','','".$rsd[0]."','youtube','".$INFOUSER['id']."')",'insert');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'delete_video_interviewwriter'){
    $id=(int)$_POST['id'];
    if($RULS_USER == 'admin'){
        querydb("DELETE FROM `ps_interview_writer` WHERE `id` = '".$id."' ",'del');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}

if($authmetod == 'add_video_interviews_leaders'){
    $date_res = explode('&', $_POST['date']);
    if($RULS_USER == 'admin' || $RULS_USER == 'moder'){
        $rsd = [];
        for($i=0; $i < count($date_res);$i++){
            if(stristr($date_res[$i], 'watch?v=') === FALSE){
                if(stristr($date_res[$i], 'youtu.be/') !== FALSE){
                    $s = explode('youtu.be/',$date_res[$i]);
                }else{
                    $s = explode('=',$date_res[$i]);
                }
                $rsd[] = trim($s[1]);
            }else{
                $s = explode('=',$date_res[$i]);
                $rsd[] = trim($s[2]);
            }
        }
        $curl = translit($rsd[1]);
        querydb("INSERT INTO `ps_interviews_leaders`(`curl`, `title`, `about`, `url_code`, `services`, `author_id`) VALUES ('".$curl."','".$rsd[1]."','','".$rsd[0]."','youtube','".$INFOUSER['id']."')",'insert');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'delete_video_interviews_leaders'){
    $id=(int)$_POST['id'];
    if($RULS_USER == 'admin'){
        querydb("DELETE FROM `ps_interviews_leaders` WHERE `id` = '".$id."' ",'del');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'add_howitwas'){
    $titileST = chektextST($_POST['title']);
    $aboutST = chektextST($_POST['about']);
    $authorST = chektextST($_POST['author']);
    $curl = translit($titileST);
    if($RULS_USER != 'admin' && $RULS_USER != 'moder'){jsonecho('noruls');die;}
    if( (isset($_FILES) && isset($_FILES['image_before'])) && (isset($_FILES) && isset($_FILES['image_after'])) ) {
        //Переданный массив сохраняем в переменной
        $image_after = $_FILES['image_after'];
        $image_before = $_FILES['image_before'];
        if($image_after['size'] > 500000 || $image_before['size'] > 500000) {jsonecho('maxfiles');die;}
        $imageFormat_after = explode('.', $image_after['name']);
        $imageFormat_after = $imageFormat_after[1];
        $imageFormat_before = explode('.', $image_before['name']);
        $imageFormat_before = $imageFormat_before[1];
        $imageFullNameAfter = '../../img/howitwas/' . hash('crc32',time()).'_after.'.$imageFormat_after;
        $imageNameAfterBD = '/img/howitwas/' . hash('crc32',time()).'_after.'.$imageFormat_after;
        $imageFullNameBefore = '../../img/howitwas/' . hash('crc32',time()) . '_before.' . $imageFormat_before;
        $imageNameBeforeBD = '/img/howitwas/' . hash('crc32',time()) . '_before.' . $imageFormat_before;
        $imageType_after = $image_after['type'];
        $imageType_before = $image_before['type'];
        if($imageType_after == 'image/jpeg' || $imageType_after == 'image/png'){$moveafter = move_uploaded_file($image_after['tmp_name'],$imageFullNameAfter);}
        if($imageType_before == 'image/jpeg' || $imageType_before == 'image/png'){$movebefore = move_uploaded_file($image_before['tmp_name'],$imageFullNameBefore);}
    }else{jsonecho('noimage');die;}
    if($moveafter == true && $movebefore == true){
        querydb("INSERT INTO `ps_howitwas`(`curl`, `title`, `img_after`, `img_befor`, `article`, `author_article`, `author_id`) VALUES ('".$curl."','".$titileST."','".$imageNameAfterBD."','".$imageNameBeforeBD."','".$aboutST."','".$authorST."','".$INFOUSER['id']."')",'insert');
        jsonecho('sc','sc');die;
    }else{jsonecho('noloadimage');die;}
}
if($authmetod == 'delete_howitwas'){
    $id=(int)$_POST['id'];
    if($RULS_USER == 'admin'){
        $selInfo = querydb("SELECT * FROM `ps_howitwas` WHERE `id` = '".$id."'");
        unlink('../../'.$selInfo['img_after']);
        unlink('../../'.$selInfo['img_befor']);
        querydb("DELETE FROM `ps_howitwas` WHERE `id` = '".$id."' ",'del');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'add_aboutAuthor'){
    $name_famST = chektextST($_POST['name_fam']);
    $aboutST = chektextST($_POST['about']);
    $urls_libST = chektextST($_POST['urls_lib']);
    $curl = translit($name_famST);
    if($RULS_USER != 'admin' && $RULS_USER != 'moder'){jsonecho('noruls');die;}
    if(isset($_FILES) && isset($_FILES['image_after'])) {
        //Переданный массив сохраняем в переменной
        $image_after = $_FILES['image_after'];
        if($image_after['size'] > 500000) {jsonecho('maxfiles');die;}
        $imageFormat_after = explode('.', $image_after['name']);
        $imageFormat_after = $imageFormat_after[1];
        $imageFullNameAfter = '../../img/author/' . hash('crc32',time()).'.'.$imageFormat_after;
        $imageNameAfterBD = '/img/author/' . hash('crc32',time()).'.'.$imageFormat_after;
        $imageType_after = $image_after['type'];
        if($imageType_after == 'image/jpeg' || $imageType_after == 'image/png'){$moveafter = move_uploaded_file($image_after['tmp_name'],$imageFullNameAfter);}
    }else{jsonecho('noimage');die;}
    if($moveafter == true){
        querydb("INSERT INTO `ps_to_author`(`curl`, `img`, `name_fam`, `about`, `url_past`, `author_id`) VALUES ('".$curl."','".$imageNameAfterBD."','".$name_famST."','".$aboutST."','".$urls_libST."','".$INFOUSER['id']."')",'insert');
        jsonecho('aboutauthors','sc');die;
    }else{jsonecho('noloadimage');die;}
}
if($authmetod == 'delete_aauthor'){
    $id=(int)$_POST['id'];
    if($RULS_USER == 'admin'){
        $selInfo = querydb("SELECT * FROM `ps_to_author` WHERE `id` = '".$id."'");
        unlink('../../'.$selInfo['img']);
        querydb("DELETE FROM `ps_to_author` WHERE `id` = '".$id."' ",'del');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'add_attractions'){
    $titleST = chektextST($_POST['title']);
    $aboutST = chektextST($_POST['about']);
    $authorST = chektextST($_POST['author']);
    $curl = translit($name_famST);
    if($RULS_USER != 'admin' && $RULS_USER != 'moder'){jsonecho('noruls');die;}
    if(isset($_FILES) && isset($_FILES['image_after'])){
        //Переданный массив сохраняем в переменной
        $image_after = $_FILES['image_after'];
        if($image_after['size'] > 500000) {jsonecho('maxfiles');die;}
        $imageFormat_after = explode('.', $image_after['name']);
        $imageFormat_after = $imageFormat_after[1];
        $imageFullNameAfter = '../../img/attractions/' . hash('crc32',time()).'.'.$imageFormat_after;
        $imageNameAfterBD = '/img/attractions/' . hash('crc32',time()).'.'.$imageFormat_after;
        $imageType_after = $image_after['type'];
        if($imageType_after == 'image/jpeg' || $imageType_after == 'image/png'){$moveafter = move_uploaded_file($image_after['tmp_name'],$imageFullNameAfter);}
    }else{jsonecho('noimage');die;}
    if($moveafter == true){
        querydb("INSERT INTO `ps_atraction`(`curl`, `imgs`, `title`, `article`, `author_article`, `author_id`) VALUES ('".$curl."','".$imageNameAfterBD."','".$titleST."','".$aboutST."','".$authorST."','".$INFOUSER['id']."')",'insert');
        jsonecho('attractions','sc');die;
    }else{jsonecho('noloadimage');die;}
}
if($authmetod == 'delete_attraction'){
    $id=(int)$_POST['id'];
    if($RULS_USER == 'admin'){
        $selInfo = querydb("SELECT * FROM `ps_atraction` WHERE `id` = '".$id."'");
        unlink('../../'.$selInfo['imgs']);
        querydb("DELETE FROM `ps_atraction` WHERE `id` = '".$id."' ",'del');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'edit_about'){
    $titleST = chektextST($_POST['title']);
    $aboutST = $_POST['about'];
    if($RULS_USER != 'admin'){jsonecho('noruls');die;}
    if(isset($_FILES) && isset($_FILES['image_after'])){
        //Переданный массив сохраняем в переменной
        $image_after = $_FILES['image_after'];
        if($image_after['size'] > 500000) {jsonecho('maxfiles');die;}
        $imageFormat_after = explode('.', $image_after['name']);
        $imageFormat_after = $imageFormat_after[1];
        $imageFullNameAfter = '../../img/' . hash('crc32',time()).'.'.$imageFormat_after;
        $imageNameAfterBD = '/img/' . hash('crc32',time()).'.'.$imageFormat_after;
        $imageType_after = $image_after['type'];
        if($imageType_after == 'image/jpeg' || $imageType_after == 'image/png'){$moveafter = move_uploaded_file($image_after['tmp_name'],$imageFullNameAfter);}
    }else{jsonecho('noimage');die;}
    if($moveafter == true){
        $generateAbout = '{"title" : "'.$titleST.'", "img" : "'.$imageNameAfterBD.'"}';
        querydb("UPDATE `ps_statick_page_inform` SET `text`='".$aboutST."',`about`='".$generateAbout."',`last_author_edit_id`='".$INFOUSER['id']."' WHERE `page` = 'about'",'insert');
        jsonecho('aboutedit','sc');die;
    }else{jsonecho('noloadimage');die;}
}
if($authmetod == 'add_partic'){
    $name_famST = chektextST($_POST['name_fam']);
    $rolesST = $_POST['roles'];
    $zanimST = chektextST($_POST['zanim']);
    if($RULS_USER != 'admin'){jsonecho('noruls');die;}
    if(isset($_FILES) && isset($_FILES['image_after'])){
        //Переданный массив сохраняем в переменной
        $image_after = $_FILES['image_after'];
        if($image_after['size'] > 500000) {jsonecho('maxfiles');die;}
        $imageFormat_after = explode('.', $image_after['name']);
        $imageFormat_after = $imageFormat_after[1];
        $imageFullNameAfter = '../../img/particpnts_progect/' . hash('crc32',time()).'.'.$imageFormat_after;
        $imageNameAfterBD = hash('crc32',time()).'.'.$imageFormat_after;
        $imageType_after = $image_after['type'];
        if($imageType_after == 'image/jpeg' || $imageType_after == 'image/png'){$moveafter = move_uploaded_file($image_after['tmp_name'],$imageFullNameAfter);}
    }else{jsonecho('noimage');die;}
    if($moveafter == true){
        querydb("INSERT INTO `ps_particpnts_progect`(`name_fam`, `subtitle`, `img`, `cat`) VALUES ('".$name_famST."','".$zanimST."','".$imageNameAfterBD."','".$rolesST."')",'insert');
        jsonecho('particpntsprogectadd','sc');die;
    }else{jsonecho('noloadimage');die;}
}
if($authmetod == 'delete_partic'){
    $id=(int)$_POST['id'];
    if($RULS_USER == 'admin'){
        $selInfo = querydb("SELECT * FROM `ps_particpnts_progect` WHERE `id` = '".$id."'");
        unlink('../../img/particpnts_progect/'.$selInfo['img']);
        querydb("DELETE FROM `ps_particpnts_progect` WHERE `id` = '".$id."' ",'del');
        jsonecho('sc','sc');die;
    }else{jsonecho('noruls');die;}
}
if($authmetod == 'edit_partic'){
    $name_famST = chektextST($_POST['name_fam']);
    $rolesST = (int)$_POST['id_user'];
    if($rolesST <= 0){jsonecho('noruls');die;}
    $zanimST = chektextST($_POST['zanim']);
    if($RULS_USER != 'admin'){jsonecho('noruls');die;}
    $selInfo = querydb("SELECT * FROM `ps_particpnts_progect` WHERE `id` = '".$rolesST."'");
    if($_FILES['image_after']['error'] == 0){
        unlink('../../img/particpnts_progect/'.$selInfo['img']);
        $image_after = $_FILES['image_after'];
        if($image_after['size'] > 500000) {jsonecho('maxfiles');die;}
        $imageFormat_after = explode('.', $image_after['name']);
        $imageFormat_after = $imageFormat_after[1];
        $imageFullNameAfter = '../../img/particpnts_progect/' . hash('crc32',time()).'.'.$imageFormat_after;
        $imageNameAfterBD = hash('crc32',time()).'.'.$imageFormat_after;
        $imageType_after = $image_after['type'];
        if($imageType_after == 'image/jpeg' || $imageType_after == 'image/png'){$moveafter = move_uploaded_file($image_after['tmp_name'],$imageFullNameAfter);}
    }else{$imageNameAfterBD = $selInfo['img'];}
        querydb("UPDATE `ps_particpnts_progect` SET `name_fam`='".$name_famST."',`subtitle`='".$zanimST."',`img`='".$imageNameAfterBD."' WHERE `id` = '".$rolesST."'",'insert');
        jsonecho('particpntsprogectadd','sc');die;
}
?>