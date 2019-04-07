<?php
header("Content-Type: text/html; charset=UTF8");
require "DB_conn.php";

$nick = $_COOKIE["unick"];

$bnum = $_POST["bnum"];

$query="select * from anonyboard where bnum='$bnum'";
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
        <title>익명 게시물 보기</title>
		<link type="image/png" rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">
    	<link type="text/css" rel="stylesheet" href="css/Fonts.css"></link>
    	<link type='text/css' rel='stylesheet' href='css/moving_cloud2.css'></link>
		<style>
		#center { position:absolute; top:50%; 
            		left:50%; 
            		width:300px; 
            		height:200px; 
            		overflow:hidden; 
                    margin-top:-150px; 
                    margin-left:-100px;}
			table.one td{
                border-bottom: 1px solid #86a1b5;
			}
			table.two{
				border: 10px solid #BDC7CD;
                border-bottom: 1px solid #86a1b5;
			}
			table.two tbody td{
                border-bottom: 1px solid #86a1b5;
			}
			input[type=button] {
				background-color: #9DAEB8;
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
				background-color: #9DAEB8;
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
				background-color: #9DAEB8;
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
						<?= $bcontent ?>
					</th>
				</tr>
				<?php
				if($nick == $bnick){
				echo"<tr>
					<th align=left>
						<form action='AnonyBoard_content_delete.php' method='post'>
                            <input type='hidden' name='bnum' value='$bnum'>
							<input type='submit' id='reg' value='삭제'>
						</form>
					</th>
					<th colspan=2 align=right>
						<form action='AnonyBoard_content_revise.php' method='post'>
                            <input type='hidden' name='bnum' value='$bnum'>
							<input type='submit' id='reg' value='수정'>
						</form>
					</th>
				</tr>";
				}
				?>
			</table>
    				<br>
			<form name="form" id="form" action="AnonyComment_register.php" method="post">
				<table class="two" bgcolor="#BDC7CD" width="60%">
					<tr>
        				<th>
        					<textarea type="content" required rows="5%" cols="95%" name="content" form="form" placeholder="댓글을 작성해주세요"></textarea>
    					</th>
        				<th>
        					<input type="submit" value="등록">
    					</th>
					</tr>
					<input type="hidden" name="bnum" value="<?= $bnum ?>">
				</table>
			</form>
			<table class="two" bgcolor="#BDC7CD" width="60%">
				<?php
                        $query="select * from anonycomment where bnum='$bnum' order by cnum desc";
                        $result=mysql_query($query);
                        
                        while($array=mysql_fetch_array($result)){
                            
                            echo "
                    <tbody>
                        <tr>
                            <td width=15%>
                                <p align=center>익명</p>
                            </td>
                            <td width=40%>
                                <p align=center>$array[content]</p>
                            </td>
                            <td width=10%>
                                <p align=center>$array[date]</p>
                            </td><td width=10% align=right>";
                        if($nick == $array[nick]){ 
                         echo"
                        <form action='AnonyComment_delete.php' method='post'>
                        <input type='submit' id='reg' value='삭제'>
                        <input type='hidden' name='cnum' value='$array[cnum]'>
                        <input type='hidden' name='bnum' value='$bnum'>
    					<input type='hidden' name='btitle' value='$btitle'>
    					<input type='hidden' name='bdate' value='$bdate'>
                        ";}
                         echo"</td></tr>
                        </form>
                    </tbody>
                            ";
                            
                            $cur_num++;
                        }
                    ?>
					<tr>
						<th width="80%" colspan=3 align="left">
							<input type='button' id="button" value='게시판으로' onclick="location.href='AnonyBoard.php'">
						</th>
					</tr>
			</table>
    	</center>
    </body>
</html>