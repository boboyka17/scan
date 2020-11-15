<?php
if(isset($_GET['user']))
{
include('conn.php');
@mysql_query("update user2557 set status='0' where user='".$_GET['user']."';");
include('cconn.php');
echo "<meta http-equiv='refresh' content='1;url=../login.php'>";
}
else
{
	echo "<br/><center><h1 style='color:red;'>Error 404!</h1></center>";
	echo "<meta http-equiv='refresh' content='1;url=../login.php'>";
}
?>