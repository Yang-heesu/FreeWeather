<?php
header("Content-Type: text/html; charset=UTF8");
require 'DB_conn.php';

$bnum = $_POST["bnum"];
$content = nl2br($_POST["content"]);

$sql = "update anonyboard set content='$content' where bnum='$bnum'";
$sql_result = mysql_query($sql);

if($sql_result){
    echo"<form name ='form' action='AnonyBoard_content.php' method='post'>
            <input type='hidden' name='bnum' value='$bnum'>
        </form>
        <script>
            document.form.submit();
        </script>";
}
else{
    echo"<script>alert('수정실패');</script>";
    echo"<form name ='form' action='AnonyBoard_content.php' method='post'>
            <input type='hidden' name='bnum' value='$bnum'>
        </form>
        <script>
            document.form.submit();
        </script>";
}
?>