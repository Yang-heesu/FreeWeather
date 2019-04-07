<?php
//header('Content-Type: text/html; charset=UTF-8');
$conn = mysql_connect("localhost","root","0000");
$result = mysql_select_db("freeweather",$conn);

// if($conn) {
//     echo 'MySQL 서버에 접속 성공<br>';
// } else {
//     echo 'MySQL 서버에 접속 실패<br>';
// }

//  mysql_query("set names utf8");
// mysql_set_charset("utf8", $conn);

// if($result){
//     echo "connect : 성공<br>";
// }
// else{
//     echo "disconnect : 실패<br>";
//     echo mysql_error();
// }
 
?>