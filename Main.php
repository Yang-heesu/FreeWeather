<?php
require 'favicon.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>FreeWeather</title>
    	<link type="text/css" rel="stylesheet" href="css/Fonts.css"></link>
    	<?php 
    	if(!strcmp($w_ary, "맑음")){
    	    echo"<link type='text/css' rel='stylesheet' href='css/moving_cloud.css'></link>";
    	}
    	else if(!strcmp($w_ary, "흐림") || !strcmp($w_ary, "구름조금") || !strcmp($w_ary, "구름많음")){
    	    echo"<link type='text/css' rel='stylesheet' href='css/moving_cloud2.css'></link>";
    	}
    	else{
    	    echo"<script type='text/javascript' src='js/Snow_falling.js'></script>";
    	}
    	?>
    	<style> 
    	    body{
    	       height:100%;
    	    }
			/* input 관련 css */
			input[type=text] {
			  width: 80%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  box-sizing: border-box;
			  border: none;
			  border-bottom: 2px solid black;
			}
			input[type=password] {
			  width: 80%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  box-sizing: border-box;
			  border: none;
			  border-bottom: 2px solid black;
			}
			input[type=submit] {
				background-color: #f1f1f1;
				color: black;
				font-size: 16px;
				padding: 50px 20px;
				border: none;
				cursor: pointer;
				border-radius: 5px;
				text-align: center;
			}
			input[type=submit]:hover {
			  background-color: black;
			  color: white;
			}
			/* table 관련 css */
			table[id=one]{
				border: 40px solid white;
			}
			/* 링크 관련 css */
			A:link { text-decoration:none; color:black; } 
			A:visited { text-decoration:none; color:black; } 
			A:hover { text-decoration:none; color:red; }

    	</style>
	</head>
	<?php 
	if(!strcmp($w_ary, "맑음")){
	    echo"<body bgcolor='#73c1e3'>";
	}
	else if(!strcmp($w_ary, "흐림") || !strcmp($w_ary, "구름조금") || !strcmp($w_ary, "구름많음")){
	    echo"<body bgcolor='#86a1b5'>";
	}
	else{
	    echo"<body bgcolor='#808080'>";
	}
	?>
		<center>

			<br><br>
			<tt>FreeWeather</tt>
			<br><br><br>
			<div id="background-wrap">
                <div class="x1">
                    <div class="cloud"></div>
                </div>
            
                <div class="x2">
                    <div class="cloud"></div>
                </div>
            
                <div class="x3">
                    <div class="cloud"></div>
                </div>
            
                <div class="x4">
                    <div class="cloud"></div>
                </div>
            
                <div class="x5">
                    <div class="cloud"></div>
                </div>
        	</div>
			<form action="Main_confirm.php" method="post">
			<table id="one" bgcolor="#FFFFFF" width="33%">
				<tr align="center">
					<td>
						<t1><b>ID</b></t1>
					</td>
					<td>
						<input type="text" id="id" name="id" size=15%>
					</td>
					<td width="25%" rowspan=2>
						<input type="submit" id="button" onClick='check()' value='LOGIN'>
					</td>
				</tr>
				<tr align="center">
					<td>
						<t1><b>PW</b></t1>
					</td>
					<td>
						<input type="password" id="pw" name="pw" size=15%>
					</td>
				</tr>
			</table>
			</form>
			<table width="33%">
				<tr>
					<td align="left">
						<font size="2pt"><a href="Find.php">잃어버리셨나요?</a></font>
					</td>
					<td align="right">
						<font size="2pt"><a href="Join.php">회원가입</a></font>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>