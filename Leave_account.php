<?php
header("Content-Type: text/html; charset=UTF8");
require "DB_conn.php";

$name = $_COOKIE["uname"];
$id = $_COOKIE["uid"];
$pw = $_COOKIE["upw"];
$nick = $_COOKIE["unick"];
$email = $_COOKIE["uemail"];

$sql = "delete from member where id='$id' and name='$name' and pw='$pw' and nick='$nick' and email='$email'";
$sql_result = mysql_query($sql,$conn);

if($sql_result){
    echo"<script>alert('탈퇴 성공');";
    echo"location.href='Log_out.php'</script>";
}else{
    echo"<script>alert('탈퇴 실패');";
    echo"history.back();</script>";
}
?>