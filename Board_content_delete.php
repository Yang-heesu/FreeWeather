<?php
header("Content-Type: text/html; charset=UTF8");
require 'DB_conn.php';

$bnum = $_POST["bnum"];

$sql = "delete from comment where bnum='$bnum'";
$sql_result=mysql_query($sql);

$sql2 ="delete from board where bnum='$bnum'";
$sql_result2 = mysql_query($sql2);

if($sql_result && $sql_result2){
    echo"<script> alert('삭제성공');
         location.href='Board.php';</script>";
}
else{
    echo"
    <form name='form' action='Board_content.php' method='post'>
        <input type='hidden' name='bnum' value='$bnum'>
    </form>";
    echo"<script>alert('삭제실패');";
    echo"document.form.submit();</script>";
}
?>