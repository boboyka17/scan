<?php
	include('../sphp/conn.php');
	$conn->query("update scan2557 set ch".$_GET['date']."='',status='1',statustext=NULL,savejob='1' where std_id='".$_GET['id']."';",$con);
	//echo "update scan2557 set ch".$_GET['date']."='',status='1',statustext=NULL,savejob='1' where std_id='".$_GET['id']."';";
	echo "<center><h4>System Update...</h4></center>";
	echo "<meta http-equiv='refresh' content='1;url=canceldate.php'>";
	$conn->close();
?>