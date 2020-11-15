<?php
	session_start();
	//echo $_POST["pass"],$_SESSION['pass'];
	if(!isset($_SESSION['suser'])){
		echo "<meta http-equiv='refresh' content='4;url=../login.php'>";
	}
	else {
		
		if(@$_POST["pass"]==$_SESSION['pass']){
			
		include('../sphp/conn.php');
		
			mysql_query("update scan2557 set chdate1 = '';");
			mysql_query("update scan2557 set chdate12 = '';");
			mysql_query("update scan2557 set chdate2 = '';");
			mysql_query("update scan2557 set chdate22 = '';");
			mysql_query("update scan2557 set chdate3 = '';");
			mysql_query("update scan2557 set chdate32 = '';");
			mysql_query("update scan2557 set chdate4 = '';");
			mysql_query("update scan2557 set chdate42 = '';");
			mysql_query("update scan2557 set status = '1';");//ถาม
			mysql_query("update scan2557 set savejob = '0';");
			mysql_query("update scan2557 set statustext =NULL;");
			mysql_query("update scan2557 set type123 ='1';");
		include('../sphp/cconn.php');
		echo "<center><h4>System Update...</h4></center>";
		echo "<meta http-equiv='refresh' content='2;url=adminconfig.php?checkclick=4'>";
			
		}
		else {header("Location: adminconfig.php?checkclick=3");
		}
		}
		
?>