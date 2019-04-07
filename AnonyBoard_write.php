<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>익명 글 작성</title>
		<link type="image/png" rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">
    	<link type="text/css" rel="stylesheet" href="css/Fonts.css"></link>
    	<link type="text/css" rel="stylesheet" href="css/moving_cloud2.css"></link>
    	<style>
			/* input 관련 css */
			input[type=text] {
			  width: 80%;
			  padding: 12px 20px;
			  box-sizing: border-box;
			  border: none;
			  border-bottom: 2px solid black;
			}
			/* table 관련 css */
			table[id=one]{
				border: 10px solid white;
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
    	</style>
		<script>
			function submit(){
				var id; var url;
				id = document.log_up.id.value;
				url = "Check_id.php?id=" + id ;
				check_window = window.open( url, "ID CHECK", "width=400, height=200, toolbar=no, menubar=no, scrollbars=no, resizable=yes" );
				check_window.document.getElementById('check_id_window').value = document.getElementById('id').value;
			}
		</script>
	</head>
	<body bgcolor="#86a1b5">
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
		<center>
			<tt>WRITE</tt>
			<br>
			<form action="AnonyBoard_write_confirm.php" method="post" name="form">
				<table id="one" bgcolor="#FFFFFF" width="60%">
					<tr align="center">
						<td width="65%">
							<t1><b>제목</b></t1>
						</td>
						<td>
							<t1><b>작성자</b></t1>
						</td>
					</tr>
					<tr align="center">
						<td>
							<input type="text" id="title" name="title" size=60% placeholder="제목을 입력해주세요." required>
						</td>
						<td>
							<input type="text" size=30% value="익명" readonly="readonly">
						</td>
					</tr>
					<tr align="center">
						<td width="80%" colspan=2>
						</td>
					</tr>
					<tr align="center">
						<td width="80%" colspan=2>
							<textarea type="content" required id="content" name="content" style="margin: 0px; width: 688px; height: 297px;" placeholder="내용을 입력해주세요."></textarea>
						</td>
					</tr>
					<tr>
						<td align="left">
							<input type='button' value='취소' onclick="location.href='AnonyBoard.php'">
						</td>
						<td align="right">
							<input type='submit' id="button" value='제출'>
						</td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>