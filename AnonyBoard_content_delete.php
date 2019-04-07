<?php
header("Content-Type: text/html; charset=UTF8");
require 'DB_conn.php';

$name = $_COOKIE["uname"];
$id = $_COOKIE["uid"];
$pw = $_COOKIE["upw"];
$nick = $_COOKIE["unick"];
$email = $_COOKIE["uemail"];

$bnum = $_POST["bnum"];
$btitle = $_POST["btitle"];
$bnick = $_POST["bnick"];
$bdate = $_POST["bdate"];

$sql = "delete from anonycomment where bnum='$bnum'";
$sql_result=mysql_query($sql);

$sql2 ="delete from anonyboard where bnum='$bnum'";
$sql_result2 = mysql_query($sql2);

if($sql_result && $sql_result2){
    echo"<script> alert('삭제성공');
         location.href='AnonyBoard.php';</script>";
}
else{
    echo"
    <form name='form' action='AnonyBoard_content.php' method='post'>
        <input type='hidden' name='title' value='$btitle'>
        <input type='hidden' name='nick' value='$bnick'>
        <input type='hidden' name='date' value='$bdate'>
    </form>";
    echo"<script>alert('삭제실패');";
    echo"document.form.submit();</script>";
}
?>