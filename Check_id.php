<?php 
require 'DB_conn.php';
require 'favicon.php';
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>ID 중복확인</title>
    	<link type="text/css" rel="stylesheet" href="css/Fonts.css"></link>
    	<style>
    		input[type=submit] {
    			background-color: #f1f1f1;
    			color: black;
    			font-size: 9px;
    			padding: 6px 12px;
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
    			font-size: 9px;
    			padding: 6px 12px;
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
    		document.getElementById("check_id_window").value = opener.document.getElementById("id").value;
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
    	<section>
            <form action ="Check_id.php" method="post">
            	<center>
    				<t1><b>ID 중복확인</b></t1>
    				<br><br>
                    <t1>ID : </t1><input type='text' id="check_id_window" name = "id" required>&nbsp; 
                    <br>
                    <?php 
                    	if(!strcmp($w_ary, "맑음")){
                    	    echo"<input type='text' id='check_mark' style='border:none; background:#73c1e3;' disabled>";
                    	}
                    	else if(!strcmp($w_ary, "흐림") || !strcmp($w_ary, "구름조금") || !strcmp($w_ary, "구름많음")){
                    	    echo"<input type='text' id='check_mark' style='border:none; background:#86a1b5;' disabled>";
                    	}
                    	else{
                    	    echo"<input type='text' id='check_mark' style='border:none; background:#808080;' disabled>";
                    	}
                    ?>
                    <br>
                    <input type='submit' value='중복확인'>
                    <input type='button' value='닫기' onclick='window.close()'>
            	</center>
    		</form>
    	</section>
    </body>
</html>

<?php

if($_POST['id']){
    $id = $_POST['id'];
}

if($id != ""){
    $sql = "select name from member where id = '$id'";
    $sql_result = mysql_query($sql,$conn);
    $sql_rcount = mysql_num_rows($sql_result);
    
    if($sql_rcount != 0){
        echo("<script> document.getElementById('check_mark').value = '중복되는 아이디';
              document.getElementById('check_id_window').value = '';
              window.opener.document.getElementById('id').value = '';
              </script>");
    }
    else{
        echo("<script> document.getElementById('check_mark').value = '사용가능한 아이디';
              document.getElementById('check_id_window').value = '$id';
              window.opener.document.getElementById('id').value
              window.opener.document.getElementById('id').value = window.document.getElementById('check_id_window').value;
              </script>");
    }
}

mysql_close($conn);

?>