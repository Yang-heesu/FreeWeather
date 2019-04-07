<?php
require 'DB_conn.php';

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "select id from member where name = '$name' and email = '$email'";
$sql_result = mysql_query($sql);

if($sql_result){
    $id = mysql_fetch_row($sql_result);
    if($pw=="" || empty($pw)){
        echo"<script>alert('아이디를 찾을 수 없습니다')</script>";
        echo"<script>location.href='Find_pw.php';</script>";
    }
    echo"<script>alert('$id')</script>";
    echo"<script>location.href='Main.php';</script>";
}
else{
    echo"<script>alert('아이디를 찾을 수 없습니다')</script>";
    echo"<script>location.href='Find_id.php';</script>";
}

?>