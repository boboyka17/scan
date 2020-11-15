
<?php
session_start();
if(!empty($_POST['user']) and !empty($_POST['pass']))
{
	include('conn.php');
	$query = $conn->query("select * from user2557 where user='".$_POST['user']."';");
	$row = $query->fetch_array();
	if(!$row){
		echo "<meta http-equiv='refresh' content='1;url=../fail-login.php'>";
	}else{
		$query = $conn -> query("select * from user2557 where user='".$_POST['user']."';");
		while($row = $query->fetch_array()){
			if ($_POST['user']==$row['user'] and $_POST['pass']==$row['pass']) {
				$chstatus=$conn->query("select * from user2557 where user='".$_POST['user']."';");
				$showstatus=$chstatus->fetch_array();
				$_SESSION['pass']=$row['pass'];
				if($showstatus['status']==2){
					include('haveuser.php');
				}else{
					include('sessionin.php');
				}
			}else{
				echo "<meta http-equiv='refresh' content='1;url=../fail-login.php'>";
			}
		}
	}
	include('cconn.php');
}else{
	echo "<meta http-equiv='refresh' content='1;url=../fail-login.php'>";
}
$conn->close();
?>
