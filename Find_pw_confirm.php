<?php
require 'DB_conn.php';

$id = $_POST['id'];
$name = $_POST['name'];
$sql = "select pw from member where id='$id' and name='$name'";
$sql_result = mysql_query($sql);

if($sql_result == true){
    $pw = mysql_fetch_row($sql_result);
    if($pw=="" || empty($pw)){
        echo"<script>alert('비밀번호를 찾을 수 없습니다')</script>";
        echo"<script>location.href='Find_pw.php';</script>";
    }
    echo"<script>alert('$row[0]')</script>";
    echo"<script>location.href='Main.php';</script>";
}
else{
    echo"<script>alert('비밀번호를 찾을 수 없습니다')</script>";
    echo"<script>location.href='Find_pw.php';</script>";
}

?>