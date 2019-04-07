<?php
header("Content-Type: text/html; charset=UTF8");
require 'DB_conn.php';

$nick = $_COOKIE["unick"];
$title = $_POST["title"];
$content = nl2br($_POST["content"]);
$date = date("Y-m-d H:i:s");

$log_up_sql = "insert into anonyboard(title, content, date, nick)";
$log_up_sql.= "values ('$title', '$content', '$date', '$nick')";
$log_up_result = mysql_query($log_up_sql);

if($log_up_result){
    echo"<script>location.href='AnonyBoard.php';</script>";
}
else{
    echo"<script>alert('등록실패');</script>";
    echo"<script>history.back();</script>";
    echo $title;
    echo $content;
    echo $date;
    echo mysql_error();
}
?>