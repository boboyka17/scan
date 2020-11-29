<?php
//echo ($_GET['statustext'].$_GET['id']);
$statustext = (trim($_GET['statustext']));
if (!empty($statustext)) {
	//$statustext=$_GET['statustext'];
	date_default_timezone_set("Asia/Bangkok");
	$date = file_GET_contents("date.txt", "w");
	include('conn.php');
	if (isset($_GET['la']) and isset($_GET['savejob'])) {
		echo "if1";
		$conn->query("update scan2557 set ch" . $date . "='" . date("Y-m-d | H:i:s") . "| (ลา)',status='" . $_GET['status'] . "',savejob='" . $_GET['savejob'] . "',statustext='" . $statustext . "' where std_id='" . $_GET['id'] . "';");
		echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
	}
	if (!isset($_GET['la']) and !isset($_GET['savejob'])) {
		echo "if2";
		$conn->query("update scan2557 set ch" . $date . "='" . date("Y-m-d | H:i:s") . "',status='" . $_GET['status'] . "',statustext='" . $statustext . "' where std_id='" . $_GET['id'] . "';");
		echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
	}
	if (isset($_GET['la']) and !isset($_GET['savejob'])) {
		$conn->query("update scan2557 set ch" . $date . "='" . date("Y-m-d | H:i:s") . " | (ลา)',status='" . $_GET['status'] . "',statustext='" . $statustext . "' where std_id='" . $_GET['id'] . "';");
		echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
	}
	if (!isset($_GET['la']) and isset($_GET['savejob'])) {
		echo "if4";
		$conn->query("update scan2557 set ch" . $date . "='" . date("Y-m-d | H:i:s") . "',status='" . $_GET['status'] . "',savejob='" . $_GET['savejob'] . "',statustext='" . $statustext . "' where std_id='" . $_GET['id'] . "';");
		echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
	}
	include('cconn.php');
	echo "<center><h4>System Update...</h4></center>";
	echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
} else {
	//$statustext=$_GET['statustext'];
	date_default_timezone_set("Asia/Bangkok");
	$date = file_GET_contents("date.txt", "w");
	include('conn.php');
	if (isset($_GET['la']) and isset($_GET['savejob'])) {
		echo "elseif1";
		$conn->query("update scan2557 set ch" . $date . "='" . date("Y-m-d | H:i:s") . "| (ลา)',status='" . $_GET['status'] . "',savejob='" . $_GET['savejob'] . "',statustext=NULL where std_id='" . $_GET['id'] . "';");
		echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
	}
	if (!isset($_GET['la']) and !isset($_GET['savejob'])) {
		echo "elseif2";
		$conn->query("update scan2557 set ch" . $date . "='" . date("Y-m-d | H:i:s") . "',status='" . $_GET['status'] . "',statustext=NULL where std_id='" . $_GET['id'] . "';");
		echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
	}
	if (isset($_GET['la']) and !isset($_GET['savejob'])) {
		echo "elseif3";
		$conn->query("update scan2557 set ch" . $date . "='" . date("Y-m-d | H:i:s") . " | (ลา)',status='" . $_GET['status'] . "',statustext=NULL where std_id='" . $_GET['id'] . "';");
		echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
	}
	if (!isset($_GET['la']) and isset($_GET['savejob'])) {
		echo "elseif4";
		$conn->query("update scan2557 set ch" . $date . "='" . date("Y-m-d | H:i:s") . "',status='" . $_GET['status'] . "',savejob='" . $_GET['savejob'] . "',statustext=NULL where std_id='" . $_GET['id'] . "';");
		echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
	}
	$conn->close();
	echo "<center><h4>System Update...</h4></center>";
	//echo "update scan2557 set ch".$date."='".date("Y-m-d | H:i:s")." | (ลา)',status='".$_GET['status']."',statustext=NULL where std_id='".$_GET['id']."';";
	echo "<meta http-equiv='refresh' content='0;url=../menu_1.php'>";
}
