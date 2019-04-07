<?php
setcookie("uid",$_POST["id"],time() + 86400);
setcookie("upw",$_POST["pw"],time() + 86400);
setcookie("uname",$_POST["name"],time() + 86400);
setcookie("unick",$_POST["nick"],time() + 86400);
setcookie("uemail",$_POST["email"],time() + 86400);

require 'Weather.php';

if(!strcmp($w_ary, "맑음")){
    echo"<script>location.href='Board.php'</script>";
}
else if(!strcmp($w_ary, "흐림") || !strcmp($w_ary, "구름조금") || !strcmp($w_ary, "구름많음")){
    echo"<script>location.href='AnonyBoard.php'</script>";
}
else{
    echo"<script>location.href='Tetris.html'</script>";
}
?>