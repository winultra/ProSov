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
function generateBredcummenu($title, $urls){
    $result=[];
    for($i=0; $i < count($title); $i++){
        $result[]=[$title[$i],$urls[$i]];
    }
    return $result;
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
function znakmatemformat($num){
    if($num > 0) return '+'.$num;
    else return $num;
}
function prostomat($chisla,$metod='+'){
    $arrch = explode(',', $chisla);
    if(count($arrch) <= 2){
        if($metod == '+') return $arrch[0] + $arrch[1];
        if($metod == '-') return $arrch[0] - $arrch[1];
        else return false;
    }else{
        $result=0;
        for($i=0; $i < count($arrch); $i++){
            if($metod == '+') $result = $result + $arrch[$i];
            //if($metod == '-') $result = $result - $arrch[$i];
        }
        return $result;
    }
}
function russionTranslitMoth($moth,$typdedate='num'){
    if($typdedate == 'num'){
        $moth = $moth-1;
        $arMethRussin = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        return $arMethRussin[$moth];
    }
}
function translit($str){
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"'","э"=>"e","ю"=>"yu","я"=>"ya",
    "."=>"_"," "=>"_","?"=>"_","/"=>"_","\\"=>"_",
    "*"=>"_",":"=>"_","*"=>"_","\""=>"_","<"=>"_",
    ">"=>"_","|"=>"_"
    );
    return strtr($str,$tr);
}
?>