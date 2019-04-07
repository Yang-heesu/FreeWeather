<?php
header("Content-Type: text/html; charset=UTF8");
require "DB_conn.php";

$nick = $_COOKIE["unick"];

$bnum = $_POST["bnum"];

$query="select * from board where bnum='$bnum'";
$result=mysql_query($query);

while($array=mysql_fetch_array($result)){
    $btitle = $array["title"];
    $bcontent = $array["content"];
    $bnick = $array["nick"];
    $bdate = $array["date"];
}

?>
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<title>게시물 보기</title>
		<link type="image/png" rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="css/Fonts.css"></link>
		<link type="text/css" rel="stylesheet" href="css/moving_cloud.css"></link>
		<style>
			table.one td{
                border-bottom: 1px solid #73c1e3;
			}
			table.two{
				border: 10px solid white;
                border-bottom: 1px solid #73c1e3;
			}
			table.two tbody td{
                border-bottom: 1px solid #73c1e3;
			}
			input[type=button] {
				background-color: #f1f1f1;
				color: black;
				font-size: 16px;
				padding: 10px 20px;
				border: none;
				cursor: pointer;
				text-align: center;
			}
			input[type=button]:hover {
			  background-color: black;
			  color: white;
			}
			input[type=submit] {
				background-color: #f1f1f1;
				color: black;
				font-size: 16px;
				padding: 30px 15px;
				border: none;
				cursor: pointer;
				text-align: center;
			}
			input[type=submit]:hover {
			  background-color: black;
			  color: white;
			}
			input[id=reg] {
				background-color: #f1f1f1;
				color: black;
				font-size: 16px;
				padding: 8px 15px;
				border: none;
				cursor: pointer;
				text-align: center;
			}
			input[id=reg]:hover {
			  background-color: black;
			  color: white;
			}
		</style>
	</head>
    <body bgcolor="#73c1e3">
    	<center>
    		<table class="one" bgcolor="white" width="60%">
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
						<?= $bnick ?>
					</td>
					<td>
						<?= $bdate ?>
					</td>
				</tr>
				<tr align="center">
					<th width="80%" height="200px" colspan=3>
						<?= $bcontent ?>
					</th>
				</tr>
				<?php
				if($nick == $bnick){
				echo"<tr>
					<th align='left'>
						<form action='Board_content_delete.php' method='post'>
                            <input type='hidden' name='bnum' value='$bnum'>
							<input class='con_btn' id='reg' type='submit' value='삭제'>
						</form>
					</th>
					<th align='right' colspan='2'>
						<form action='Board_content_revise.php' method='post'>
                            <input type='hidden' name='bnum' value='$bnum'>
							<input class='con_btn' id='reg' type='submit' value='수정'>
						</form>
					</th>
				</tr>";
				}
				?>
			</table>
			
			<br><br>
			
        	<table class="two" bgcolor="white" width="60%">
        	<form name="form" id="form" action="Comment_register.php" method="post">
        		<tr>
        			<th>
        				<textarea type="content" required rows="5%" cols="95%" name="content" form="form" placeholder="댓글을 작성해주세요"></textarea>
    				</th>
        			<th>
        				<input type="submit" value="등록">
    				</th>
        		</tr>
        		<input type="hidden" name="bnum" value="<?= $bnum ?>">
			</form>
        	</table>
        	
			<table class="two" bgcolor="white" width="60%">
				<?php
                    $query="select * from comment where bnum='$bnum' order by cnum desc";
                    $result=mysql_query($query);
                    
                    while($array=mysql_fetch_array($result)){
                        
                        echo "
                <tbody>
                    <tr align=center>
                        <td width=15%>
                            <p>$array[nick]</p>
                        </td>
                        <td width=40%>
                            <p>$array[content]</p>
                        </td>
                        <td width=10%>
                            <p>$array[date]</p>
                        </td>
                        <td width=10%>";
                        if($nick == $array[nick]){ 
                         echo"
                        <form action='Comment_delete.php' method='post'>
                        <input class='con_btn' id='reg' type='submit' value='삭제'>
                        <input type='hidden' name='cnum' value='$array[cnum]'>
                        <input type='hidden' name='bnum' value='$bnum'>
                        ";}
                         echo"</td></tr>
                        </form>
                    </tbody>
                            ";
                    }
                ?>
					<tr>
						<th width="80%" colspan=3 align="left">
							<input type='button' id="button" value='게시판으로' onclick="location.href='Board.php'">
						</th>
					</tr>
			</table>
    	</center>
    </body>
</html>