<?php
// Создаем соединение
function querydb($query,$qs="select"){
    $servername = "host";
    $database = "nameBD";
    $username = "username";
    $password = "pass";
    $link = mysqli_connect($servername, $username, $password, $database);
    if (!$link) die("Connection failed: " . mysqli_connect_error());
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    mysqli_query($link,'SET NAMES "utf8"');
    if($qs == 'select'){
        $row_sql = mysqli_fetch_assoc(mysqli_query($link, $query));
        if($row_sql != null){
            if(count($row_sql) > 0) return $row_sql;
            else return NULL;
        }else return NULL;
    }else{
       return mysqli_query($link, $query);
    }
    mysqli_close($link);
}
?>
