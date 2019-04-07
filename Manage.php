<?php
require 'favicon.php';

$name = $_COOKIE["uname"];
$id = $_COOKIE["uid"];
$pw = $_COOKIE["upw"];
$nick = $_COOKIE["unick"];
$email = $_COOKIE["uemail"];
?>
<!DOCTYPE html>
<html>
    <head>
   		<meta charset="UTF-8">
    	<title>회원정보변경하기</title>
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
        	function btn_click(str){
        		form.setAttribute("charset", "UTF-8");
                form.setAttribute("method", "Post");
                
        		if(str=="modify"){
        			form.action="Modify_account.php";
        		}
        		else if(str=="leave"){
        			form.action="Leave_account.php";
        		}
        		else{
        			form.action="Log_out.php";
        		}
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
    		<tt>CHANGE</tt>
        	<section>
        		<form name="form">
            		<table id="one" bgcolor="#FFFFFF" width="50%">
            			<tr>
    						<th><label for="name"><t1>이름</t1></label></th>
            				<td><input type="text" name="name" value="<?= $name ?>"></td>
            			</tr>
            			<tr>
    						<th><label for="nick"><t1>닉네임</t1></label></th>
            				<td><input type="text" name="nick" value="<?= $nick ?>"></td>
            				<td></td>
            			</tr>
            			<tr>
    						<th><label for="id"><t1>아이디</t1></label></th>
            				<td><input type="text" name="id" value="<?= $id ?>"></td>
            				<td></td>
            			</tr>
            			<tr>
    						<th><label for="pw"><t1>비밀번호</t1></label></th>
            				<td><input type="text" name="pw" value="<?= $pw ?>"></td>
            			</tr>
            			<tr>
    						<th><label for="email"><t1>이메일</t1></label></th>
            				<td><input type="text" name="email" value="<?= $email ?>"></td>
            			</tr>
            		</table>
            		<br>
            		<table width="50%">
            			<tr>
            				<td align="left">
            					<input type="submit" value="수정" onclick="btn_click('modify')">
        					</td>
            				<td align="center">
            				<?php
            				
            				if(!strcmp($w_ary, "맑음")){?>
            				    <input type="button" value="게시판으로" onclick="location.href='Board.php'"><?php
            				}
            				else if(!strcmp($w_ary, "흐림") || !strcmp($w_ary, "구름조금") || !strcmp($w_ary, "구름많음")){?>
            				    <input type="button" value="게시판으로" onclick="location.href='AnonyBoard.php'"><?php
            				}
            				else{ ?>
            				    <input type="button" value="게시판으로" onclick="location.href='Tetris.html'"><?php
            				}
        					?>
        					</td>
        					<td align="center">
        						<input type="submit" value="로그아웃" onclick="btn_click('out')">
        					</td>
            				<td align="right">
            					<input type="submit" value="탈퇴" onclick="btn_click('leave')">
        					</td>
            			</tr>
            		</table>
        		</form>
        	</section>
    	</center>
    </body>
</html>