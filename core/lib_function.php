<?php
function chektext($val){
    return trim(strip_tags(htmlspecialchars($_POST[$val])));
}
function jsonecho($tttt,$rs='er'){
    if($rs=='sc'){$k = "seccess";}
    else{$k = "error";}
    echo json_encode(array($k => $tttt));
}
function chektextST($val){return trim(strip_tags(htmlspecialchars($val)));}
function generateCode($length=6) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
$code = "";
$clen = strlen($chars) - 1;  
while (strlen($code) < $length){$code .= $chars[mt_rand(0,$clen)];}
return $code;
}
function arrastr($str,$del1){
    $arres = array();
    $str = explode($del1, $str);
    foreach($str as $key => $value){
        $kps = explode('=',$value);
        $arres[$kps[0]] = $kps[1];
    }
    return $arres;
}
function routing_url($req){
    if(stripos($req,'?') !== false){
        $rss = stristr($req, '?', true);
    }else $rss = $req;
    $ar = explode('/',$rss);
    if(count($ar) > 1){
        $ls = '';
        for($i=0;$i < count($ar);$i++){
            $ls = $ar[$i];
        }
        return $ls;
    }else return NULL;
}
function routing_page($rt,$str){
    $fp = fopen('pages/'.$rt.'.php', 'r');
    $i = (int)$str;
    $strings = [];
    while ($i--){
        $strings[] = fgets($fp, 1000);
    }
    return $strings;
}
function therepage($rs){
    if(!file_exists('pages/'.$rs.'.php')) return 'nopage';
    else return 'yespage';
}
?>