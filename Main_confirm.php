<?php
require 'DB_conn.php';

$id = $_POST["id"];
$pw = $_POST["pw"];

$sql = "select name,nick,email from member where id = '$id' and pw = '$pw'";
$sql_result = mysql_query($sql,$conn);
$rcount = mysql_num_rows($sql_result);

if($rcount != 0){
    $name = mysql_result($sql_result,0,0);
    $nick = mysql_result($sql_result,0,1);
    $email = mysql_result($sql_result,0,2);
    echo "<script>alert('$nick 님 환영합니다');</script>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
    	<form name="form" method="post" action="log_in.php">
    		<input type="hidden" name="id" value=<?= $id ?>>
    		<input type="hidden" name="pw" value=<?= $pw ?>>
    		<input type="hidden" name="name" value=<?= $name ?>>
    		<input type="hidden" name="nick" value=<?= $nick ?>>
    		<input type="hidden" name="email" value=<?= $email ?>>
    	</form>
    	<script>
    		document.form.submit();
    	</script>
    </body>
</html>
<?php
}else{
    echo "<script>alert('로그인 실패');</script>";
    echo "<script>location.href='Main.php'</script>";
}
?>