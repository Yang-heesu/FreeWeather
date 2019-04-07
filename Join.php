<?php
require 'favicon.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>회원가입하기</title>
		<link type="text/css" rel="stylesheet" href="css/Fonts.css"></link>
		<style> 
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
			input[type=email] {
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
			input[type=reset] {
				background-color: #f1f1f1;
				color: black;
				font-size: 16px;
				padding: 10px 20px;
				border: none;
				cursor: pointer;
				border-radius: 5px;
				text-align: center;
			}
			input[type=reset]:hover {
			  background-color: black;
			  color: white;
			}
			/* table 관련 css */
			table[id=one]{
				border: 20px solid white;
			}
			.button {
				background-color: #f1f1f1;
				color: black;
				font-size: 16px;
				padding: 10px 20px;
				border: none;
				cursor: pointer;
				border-radius: 5px;
				text-align: center;
			}
			.button:hover {
			  background-color: black;
			  color: white;
			}
		</style>
		<script>
			function id_check(){
				var id; var url;
				id = document.log_up.id.value;
				url = "Check_id.php?id=" + id ;
				check_window = window.open( url, "ID CHECK", "width=400, height=150, toolbar=no, menubar=no, scrollbars=no, resizable=no" );
				check_window.document.getElementById('check_id_window').value = document.getElementById('id').value;
			}
			function nick_check(){
				var nick; var url;
				id = document.log_up.id.value;
				url = "Check_nick.php?nick=" + nick ;	
				check_window = window.open( url, "NICK CHECK", "width=400, height=150, toolbar=no, menubar=no, scrollbars=no, resizable=no" );
				check_window.document.getElementById('check_nick_window').value = document.getElementById('nick').value;
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
		<center>
			<tt>JOIN</tt>
			<section>
				<form action = "Join_confirm.php" method="post" name="log_up">
					<table id="one" bgcolor="#FFFFFF" width="50%">
						<tr>
							<th><label for="name"><t1>이름</t1></label></th>
							<td><input type="text" name="name" id="name" required></td>
						</tr>
						<tr>
							<th><label for="nick"><t1>닉네임</t1></label></th>
							<td><input type="text" name="nick" id="nick" required readonly="readonly"></td>
							<td><button class="button" type="button" onclick="nick_check();">중복확인</button></td>
						</tr>
						<tr>
							<th><label for="id"><t1>아이디</t1></label></th>
							<td><input type="text" name="id" id="id" required readonly="readonly"></td>
							<td><button class="button" type="button" onclick="id_check();">중복확인</button></td>
						</tr>
						<tr>
							<th><label for="pw"><t1>비밀번호</t1></label></th>
							<td><input type="text" name="pw" id="pw" required></td>
						</tr>
						<tr>
							<th><label for="pw_confirm"><t1>비밀번호 확인</t1></label></th>
							<td><input type="text" name="pw_confirm" id="pw_confirm" required></td>
						</tr>
						<tr>
							<th><label for="email"><t1>이메일</t1></label></th>
							<td><input type="email" name="email" id="email" required></td>
						</tr>
					</table>
				
					<table width="50%">
						<tr>
							<td align="left">
								<input type="reset" value="다시">
							</td>
							<td align="center">
								<a href="Main.php"><input type="button" value="돌아가기"></a>
							</td>
							<td align="right">
								<input type="submit" value="확인">
							</td>
						</tr>
					</table>
				</form>
			</section>
		</center>
	</body>
</html>