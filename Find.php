<?php
require 'favicon.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Find </title>
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
		<div class="container">
			<center>
				<table width="70%">
					<tr align="center">
						<td>
							<a href="Find_id.php">
							<input type='button' id="find_id" value='id'></a>
						</td>
						<td>
							<a href="Find_pw.php">
							<input type='button' id="find_pw" value='pw'></a>
						</td>
					</tr>
				</table>
			</center>
		</div>
	</body>
</html>