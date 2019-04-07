<?php
require 'DB_conn.php';

$s_text=$_POST['text'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>게시판 목록</title>
		<link type="image/png" rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="css/total_style.css"></link>
    	<link type="text/css" rel="stylesheet" href="css/Fonts.css"></link>
    	<link type='text/css' rel='stylesheet' href='css/moving_cloud2.css'></link>
    	<style>
        	table.one {
                border-collapse: collapse;
                background: #BDC7CD;
            }
            table.one thead th {
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                color: #369;
                border-bottom: 5px solid #86a1b5;
            }
            table.one tbody th {
				font-size: 13px;
                font-weight: bold;
                border-bottom: 1px solid #86a1b5;
                background: #9DAEB8;
            }
            table.one td {
				font-size: 14px;
                border-bottom: 1px solid #86a1b5;
            }
			input[type=button] {
				background-color: #B1BEC5;
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
			<a href="AnonyBoard.php"><tt>Board</tt></a>
				<table class="one" width="70%">
					<thead>
    				    <tr align="center">
    				        <th width="5%"><t1>번호</t1></th>
    		                <th width="20%"><t1>제목</t1></th>
    		                <th width="10%"><t1>닉네임</t1></th>
    		                <th width="15%"><t1>작성일</t1></th>
    				    </tr>
				    </thead>
                    <?php
                        $page = $_REQUEST['page'];
                        if($page=='') $page=1;
                        $list_num=15;
                        $page_num=15;
                        $offset=$list_num*($page-1);
                        
                        $query="select count(*) from anonyboard where title like '%$s_text%'";
                        $result=mysql_query($query);
                        $row=mysql_fetch_row($result);
                        $total_no=$row[0];
                        
                        if($total_no==0){
                            echo "<script> alert('검색 결과가 없습니다');";
                            echo"location.href='AnonyBoard.php'</script>";
                        }
                        
                        $total_page=ceil($total_no/$list_num);
                        $cur_num= $total_no - (($page-1)*$page_num);
                        
                        $query="select * from anonyboard where title like '%$s_text%' order by bnum desc limit $offset, $list_num";
                        $result=mysql_query($query);
                        
                        while($array=mysql_fetch_array($result)){
                            $date=date("Y/M/D", $array[date]);
                            
                            echo "
                    <tbody>
                        <tr>
                            <th>
                                <p align=center>$cur_num</p>
                            </th>
                            <td>
                                <p align=center><a id='link' href='javascript:document.form$cur_num.submit();'>$array[title]</p></a>
                            </td>
                            <td>
                                <p align=center>익명</p>
                            </td>
                            <td>
                                <p align=center>$array[date]</p>
                            </td>
                        </tr>
                        <form method='post' name='form$cur_num' action='AnonyBoard_content.php'>
                            <input type='hidden' name='bnum' value='$array[bnum]'>
                        </form>
                    </tbody>
                            ";
                            
                            $cur_num--;
                        }
                    ?>
					<tr>
						<td width="80%" colspan=3 align="left">
							<input type='button' id="button" value='내 정보' onclick="location.href='Manage.php'">
						</td>
						<td align="right">
							<input type='button' id="button" value='글쓰기' onclick="location.href='Board_write.php'">
						</td>
					</tr>
				</table>
				<table>
					<tr><br>
					<form action='Search_Anonyboard.php' method='post'>
    					<td>
    						<select name="kind" required>
                                <option value="title">제목</option>
                            </select>
    					</td>
    					<td>
    						<input type = 'text' name='text'>
    					</td>
    					<td>
    						<input type='submit' value='검색'>
    					</td>
    				</form>
					</tr>
				</table>
		</center>
	</body>
</html>

<?php 
$total_block=ceil($total_page/$page_num);
$block=ceil($page/$page_num); //현재 블록
$first=($block-1)*$page_num; // 페이지 블록이 시작하는 첫 페이지
$last=$block*$page_num; //페이지 블록의 끝 페이지

if($block >= $total_block) {
    $last=$total_page;
}
echo "&nbsp; <p align=center>";
//[처음][*개앞]
if($block > 1) {
    $prev=$first-1;
    echo "<a href='Search_Anonyboard.php?page=1'>[처음]</a>&nbsp; ";
}

//[이전]
if($page > 1) {
    $go_page=$page-1;
    echo " <a href='Search_Anonyboard.php?page=$go_page'><</a>&nbsp; ";
}

//페이지 링크
for ($page_link=$first+1;$page_link<=$last;$page_link++) {
    if($page_link==$page) {
        echo "<font color=white>&nbsp;<b>$page_link</b>&nbsp;</font>";
    }
    else {
        echo "&nbsp;<a href='Search_Anonyboard.php?page=$page_link'>$page_link</a>&nbsp;";
    }
}

//[다음]
if($total_page > $page) {
    $go_page=$page+1;
    echo "&nbsp;<a href='Search_Anonyboard.php?page=$go_page'>></a>";
}

//[*개뒤][마지막]
if($block < $total_block) {
    
    $next=$last+1;
    echo "<a href='Search_Anonyboard.php?page=$total_page'>[마지막]</a></p>";
    
}


?>