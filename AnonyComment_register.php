<?php
header("Content-Type: text/html; charset=UTF8");
require "DB_conn.php";

$nick = $_COOKIE["unick"];

$bnum = $_POST["bnum"];
$content = nl2br($_POST["content"]);

$date = $date = date("Y-m-d");

$sql = "insert into anonycomment (bnum, nick, content , date) value ('$bnum', '$nick','$content','$date')";
$sql_result = mysql_query($sql);

if($sql_result){
    echo"
    <form name='form' action='AnonyBoard_content.php' method='post'>
        <input type='hidden' name='bnum' value='$bnum'>
    </form>";
    echo"<script>document.form.submit();</script>";
}
else{
    echo"
    <form name='form' action='AnonyBoard_content.php' method='post'>
        <input type='hidden' name='bnum' value='$bnum'>
    </form>";
    echo"<script>alert('등록실패');";
    echo"document.form.submit();</script>";
}
?>