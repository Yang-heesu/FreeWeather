<?php
require 'favicon.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Find ID</title>
    	<link type="text/css" rel="stylesheet" href="css/Font.css"></link>
    	
    	<style> 		
			html, body{
			    height: 100%;
			}
			body {
			    display: table;
			    margin: 0 auto;
			}	
			.container {
			    height: 100%;
			    display: table-cell;
			    vertical-align: middle;
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
			input[type=submit] {
				background-color: #f1f1f1;
				color: black;
				font-size: 16px;
				padding: 10px 20px;
				border: none;
				cursor: pointer;
				border-radius: 5px;
				text-align: center;
			}
			input[type=submit]:hover {
			  background-color: black;
			  color: white;
			}
			
			input[type=button] {
			  background-color: #f1f1f1;
				color: black;
				font-size: 16px;
				padding: 10px 20px;
				border: none;
				cursor: pointer;
				border-radius: 5px;
				text-align: center;
			}
			
			input[type=button]:hover {
			  background-color: black;
			  color: white;
			}
			input[type=email] {
			  width: 80%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  box-sizing: border-box;
			  border: none;
			  border-bottom: 2px solid black;
			}
			/* table 관련 css */
			table[id=table]{
				border: 40px solid white;
			}
    	</style>
    	<script>
        	function btn_click(){
        		location.href="Main.php";
        	}
    	</script>
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
		<div class="container">
			<center>
			<form action="Find_id_confirm.php" method="post">
				<table id="table" bgcolor="#FFFFFF" width="50%">
					<tr align="center">
						<td width="20%">
							<t1><b>NAME</b></t1>
						</td>
						<td>
							<input type=text id="name" name="name" size=100 required>
						</td>
					</tr>
					<tr align="center">
						<td>
							<t1><b>E-MAIL</b></t1>
						</td>
						<td>
							<input type="email" placeholder="xxx@email.com" name="email" required ><p>
						</td>
					</tr>
					<tr>
						<td align="left">
							<input type='button' value="돌아가기" onclick='btn_click()'>
						</td>
						<td align="right" colspan=2>
							<input type='submit' id="button" value='CHECK'>
						</td>
					</tr>
				</table>
				</form>
			</center>
		</div>
	</body>
</html>