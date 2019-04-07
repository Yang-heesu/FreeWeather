<?php
header("Content-Type: text/html; charset=UTF8");
require 'DB_conn.php';

$cnum = $_POST["cnum"];
$bnum = $_POST["bnum"];

$sql = "delete from anonycomment where cnum='$cnum'";
$sql_result = mysql_query($sql);

if($sql_result){
    echo"
    <form name='form' action='AnonyBoard_content.php' method='post'>
    <input type='hidden' name='bnum' value='$bnum'>
    </form>
    <script>
    document.form.submit();
    </script>";
}
else{
    echo"<script>alert('댓글삭제 실패');</script>";
    echo"
    <form name='form' action='AnonyBoard_content.php' method='post'>
    <input type='hidden' name='bnum' value='$bnum'>
    </form>
    <script>
    document.form.submit();
    </script>";
}

?>