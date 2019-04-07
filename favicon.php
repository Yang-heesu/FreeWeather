<?php
require 'Weather.php';

if(!strcmp($w_ary, "맑음")){
    echo"<link type='image/png' rel='shortcut icon' href='image/favicon.ico' type='image/x-icon'>";
}
else if(!strcmp($w_ary, "흐림") || !strcmp($w_ary, "구름조금") || !strcmp($w_ary, "구름많음")){
    echo"<link type='image/png' rel='shortcut icon' href='image/favicon2.ico' type='image/x-icon'>";
}
else{
    echo"<link type='image/png' rel='shortcut icon' href='image/favicon3.ico' type='image/x-icon'>";
}
?>