<?php include('../sphp/conn.php');
$sql = "SELECT DISTINCT`major` FROM `scan2557` where `faculty` like '%" . $_GET['id_faculty'] . "%'";

$rs = $conn->query($sql);

$strOption = null;
if ($_GET['id_faculty'] != "") {
	$strOption .= '<option value="">กรุณาเลือกสาขา</option>';
	while ($row = $rs->fetch_assoc()) {
		$strOption .= '<option value="' . $row['major'] . '">' . $row['major'] . '</option>';
	}
} else {
	$strOption .= '<option value="">กรุณาเลือกคณะก่อน</option>';
}
echo $strOption;
include('../sphp/cconn.php');
