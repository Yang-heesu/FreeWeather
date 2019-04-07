<?php
header("Content-Type: text/html; charset=UTF8");
require 'DB_conn.php';

$bnum = $_POST["bnum"];

$query="select * from anonyboard where bnum='$bnum'";
$result=mysql_query($query);

while($array=mysql_fetch_array($result)){
    $btitle = $array["title"];
    $bcontent = str_replace("<br />","",$array["content"]);
    $bnick = $array["nick"];
    $bdate = $array["date"];
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<title>게시물 보기</title>
		<link type="image/png" rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="css/Fonts.css"></link>
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
			table.one{
				border: 10px solid #BDC7CD;
			}
			table.one td{
                border-bottom: 1px solid #86a1b5;
			}
			input[type=submit] {
				background-color: white;
				color: black;
				font-size: 16px;
				padding: 8px 50px;
				border: none;
				cursor: pointer;
				text-align: center;
			}
			input[type=submit]:hover {
			  background-color: black;
			  color: white;
			}
		</style>
	</head>
    <body bgcolor="#86a1b5">
    	<div class="container">
        	<center>
        		<table class="one" bgcolor="#BDC7CD" width="60%">
    				<tr align="center">
    					<td width="50%">
    						<t1><b>제목</b></t1>
    					</td>
    					<td>
    						<t1><b>작성자</b></t1>
    					</td>
    					<td>
    						<t1><b>날짜</b></t1>
    					</td>
    				</tr>
    				<tr align="center">
    					<td>
    						<?= $btitle ?>
    					</td>
    					<td>
    						익명
    					</td>
    					<td>
    						<?= $bdate ?>
    					</td>
    				</tr>
    				<tr align="center">
    					<th width="80%" height="200px" colspan=3>
    						<form name="form" action="AnonyBoard_content_revise_confirm.php" method="post">
    							<textarea type="content" name="content" style="margin: 0px; width: 688px; height: 297px;" required><?= $bcontent ?></textarea>
    							<input type="hidden" name="bnum" value="<?= $bnum ?>">
    							<input type="submit" value="확인">
    						</form>
    					</th>
    				</tr>
    			</table>
    		</center>
		</div>
	</body>
</html>