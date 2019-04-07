<?php
header("Content-Type: text/html; charset=UTF8");
require 'DB_conn.php';

$id = $_POST["id"];
$name = $_POST["name"];
$nick = $_POST["nick"];
$pw = $_POST["pw"];
$pw_confirm = $_POST["pw_confirm"];
$email = $_POST["email"];

$id_sql = "select id from member where id = '$name' and email = '$email'";
$id_result = mysql_query($id_sql);
$id_rcount = mysql_num_rows($id_result);

if($pw != $pw_confirm){
    echo "<script>alert('비밀번호가 같지 않습니다.');</script>";
}

if($id_rcount == 0 && $pw == $pw_confirm){
    $log_up_sql = "insert into member(name, nick, id, pw, email)";
    $log_up_sql.= "values ('$name', '$nick', '$id', '$pw', '$email')";
    $log_up_result = mysql_query($log_up_sql);
    
    if($log_up_result){
        echo"<script>alert('등록성공');";
        echo"location.href='Main.php';</script>";
    }
}else{
    echo"<script>alert('등록실패');</script>";
    echo"<script>history.back();</script>";
}
?>