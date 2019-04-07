<?php
header("Content-Type: text/html; charset=UTF8");
require 'DB_conn.php';

$ori_nick = $_COOKIE["unick"];

$name = $_POST["name"];
$id = $_POST["id"];
$pw = $_POST["pw"];
$nick = $_POST["nick"];
$email = $_POST["email"];

$sql = "update member set name='$name', pw='$pw', nick='$nick', email='$email' where id='$id'";
$sql_result = mysql_query($sql,$conn);

$sql2 = "update board set nick='$nick' where nick='$ori_nick'";
$sql_result2 = mysql_query($sql2);

$sql3 = "update comment set nick='$nick' where nick='$ori_nick'";
$sql_result3 = mysql_query($sql3);

$sql4 = "update anonyboard set nick='$nick' where nick='$ori_nick'";
$sql_result4 = mysql_query($sql4);

$sql5 = "update anonycomment set nick='$nick' where nick='$ori_nick'";
$sql_result5 = mysql_query($sql5);

if($sql_result && $sql_result2 && $sql_result3 && $sql_result4 && $sql_result5){
    echo"
        <form name='form' action='log_in.php' method='post'>
			<input type='hidden' name='name' value='$name' readonly>
			<input type='hidden' name='nick' id='nick' value='$nick' readonly>
			<input type='hidden' name='id' value='$id' readonly>
			<input type='hidden' name='pw' value='$pw' readonly>
			<input type='hidden' name='email' value='$email' readonly>
		</form>";
    echo"<script>alert('회원정보 수정 성공');";
    echo"document.form.submit();</script>";
}
else{
    echo"<script>alert('회원정보 수정 실패');";
    echo"location.href='Manage.php';</script>";
}

?>