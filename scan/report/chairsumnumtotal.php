<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../sphp/conn.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร <?php echo ($Year = DATE("Y", strtotime("now")) + 543); ?></title>

	<!-- Bootstrap -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<div id="top"></div>
</head>

<body onload="document.getElementById('save').focus();">
	<style media="print">
		.noPrint {
			display: none;
		}

		.yesPrint {
			display: block !important;
		}
	</style>
	<div class="container">
		<div class="row noPrint">
			<center><img src="head.png"></center>
		</div>
		<!---------------------------------------------------------------------------------->

		<div class="row">

			<div class="col-md-12 noPrint">
				<ul class="breadcrumb">
					<li><a href="chairsumtotal.php">กลับ</a></li>

					<li></li>

				</ul>
			</div>

		</div>
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<center>
							รายงานสรุปเลขที่นั่งบัณฑิตทั้งหมด <?php
																$date = file_GET_contents("..//sphp/date.txt", "w");
																if ($date == 'date1' or $date == 'date12') {
																	$strqr = "(chdate1 !='' or chdate12 !='')";
																} else if ($date == 'date2' or $date == 'date22') {
																	$strqr = "(chdate2 !='' or chdate22 !='')";
																} else if ($date == 'date3' or $date == 'date32') {
																	$strqr = "(chdate3 !='' or chdate32 !='')";
																} else if ($date == 'date4' or $date == 'date42') {
																	$strqr = "(chdate4 !='' or chdate42 !='')";
																}
																$_POST['date'] = $date;
																if ($_POST['date'] == "date1") {
																	$query = sprintf("SELECT * FROM datescan WHERE idday='1';");
																	$p = "เช้า";
																} else if ($_POST['date'] == "date12") {
																	$query = sprintf("SELECT * FROM datescan WHERE idday='1';");
																	$p = "บ่าย";
																} else if ($_POST['date'] == "date2") {
																	$query = sprintf("SELECT * FROM datescan WHERE idday='2';");
																	$p = "เช้า";
																} else if ($_POST['date'] == "date22") {
																	$query = sprintf("SELECT * FROM datescan WHERE idday='2';");
																	$p = "บ่าย";
																} else if ($_POST['date'] == "date3") {
																	$query = sprintf("SELECT * FROM datescan WHERE idday='3';");
																	$p = "เช้า";
																} else if ($_POST['date'] == "date32") {
																	$query = sprintf("SELECT * FROM datescan WHERE idday='3';");
																	$p = "บ่าย";
																} else if ($_POST['date'] == "date4") {
																	$query = sprintf("SELECT * FROM datescan WHERE idday='4';");
																	$p = "รอบที่ 1";
																} else if ($_POST['date'] == "date42") {
																	$query = sprintf("SELECT * FROM datescan WHERE idday='4';");
																	$p = "รอบที่ 2";
																}
																$result = $conn->query($query);
																$row1 = $result->fetch_assoc();
																echo "( วันที่" . " " . $row1["date"] . " " . $row1["mont"] . " " . $row1["year"] . ")"; ?>
						</center>
					</h3>
				</div>
				<div class="panel-body">
					<p></p>



					<?php
					$i = 1;
					$id = 1;
					$strid = 1;
					$sum = 1;
					$chairid = 1;

					$chair = '<table  class="table table-bordered table2excel"><thead><tr class="info"><th colspan="2"><center>แถว</center></th> <th width="35%"><center>ผู้ดูแลแถวบัณฑิต</center></th><th width="25%"><center>หมายเหตุ</center></th></tr>';
					$ed = 'ค.บ.';
					while ($sum <= 4) {

						if ($sum == 1) $query = "select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and " . $strqr . ";";

						if ($sum == 2) $query = "select  * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and " . $strqr . ";";

						if ($sum == 3) $query = "select * from scan2557 where education like '%มหาบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and " . $strqr . ";";
						if ($sum == 4) {
							$query = "select * from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and " . $strqr . ";";
						}


						$result = $conn->query($query);

						while ($row = $result->fetch_assoc()) {

							if ($row['education'] == 'ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') $row['education'] = 'ค.บ.';
							else if ($row['education'] == 'นิติศาสตรบัณฑิต') $row['education'] = 'น.บ.';
							else  if ($row['education'] == 'วิทยาศาสตรบัณฑิต') $row['education'] = 'วท.บ.';
							else if ($row['education'] == 'รัฐประศาสนศาสตรบัณฑิต') $row['education'] = 'รป.บ.';
							else if ($row['education'] == 'ศิลปกรรมศาสตรบัณฑิต') $row['education'] = 'ศป.บ.';
							else if ($row['education'] == 'ศิลปศาสตรบัณฑิต') $row['education'] = 'ศศ.บ.';
							else if ($row['education'] == 'บัญชีบัณฑิต') $row['education'] = 'บช.บ.';
							else if ($row['education'] == 'พยาบาลศาสตรบัณฑิต') $row['education'] = 'พย.บ.';
							else if ($row['education'] == 'บริหารธุรกิจบัณฑิต') $row['education'] = 'บธ.บ.';
							else if ($row['education'] == 'นิเทศศาสตรบัณฑิต') $row['education'] = 'นศ.บ.';
							else if ($row['education'] == 'รัฐศาสตรบัณฑิต') $row['education'] = 'ร.บ.';
							else if ($row['education'] == 'เศรษฐศาสตรบัณฑิต') $row['education'] = 'ศ.บ.';
							else if ($row['education'] == 'ครุศาสตรดุษฎีบัณฑิต') $row['education'] = 'ดุษฎีบัณฑิต';
							else if ($row['education'] == 'ครุศาสตรมหาบัณฑิต') $row['education'] = 'มหาบัณฑิต';
							else if ($row['education'] == 'รัฐประศาสนศาสตรมหาบัณฑิต') $row['education'] = 'มหาบัณฑิต';
							else if ($row['education'] == 'ศิลปศาสตรมหาบัณฑิต') $row['education'] = 'มหาบัณฑิต';
							else if ($row['education'] == 'วิทยาศาสตรมหาบัณฑิต') $row['education'] = 'มหาบัณฑิต';
							else if ($row['education'] == 'บริหารธุรกิจมหาบัณฑิต') $row['education'] = 'มหาบัณฑิต';
							else if ($row['education'] == 'สาธารณสุขศาสตรมหาบัณฑิต') $row['education'] = 'มหาบัณฑิต';

							//if($id==1) {$chair.='<tr class="warning"><td>แถวที่  '.$chairid.'</td><td> รอบแรก '.$ed.' '.$row['counteducation'].' -';}
							if ($ed != $row['education']) {
								$chair .= ' ' . $counteducation . '</td><td></td><td></td></tr>';
								$ed = $row['education'];
								$chair .= '<tr class="warning"><td></td><td>  ' . $ed . ' ลำดับที่ ' . $row['counteducation'] . ' -';
							}
							$counteducation = $row['counteducation'];
							if ($id == 1) {
								$chair .= '<tr class="warning"><td>แถวที่  ' . $chairid . '</td><td>  ' . $ed . ' ลำดับที่ ' . $row['counteducation'] . ' -';
							}
							if ($id == 80) {
								$chair .= ' ' . $row['counteducation'] . '</td><td></td><td></td></tr>';
								$chairid++;
							}
							if ($id < 80) $counteducation = $row['counteducation'];

							$id++;
							if ($id > 80) {
								$id = 1;
							}
						}
						$sum++;
					}
					if ($id < 80) {
						$chair .= ' ' . $counteducation . '</td><td></td><td></td></tr>';
					}
					$chair .= '<tr class="warning"><td></td><td>  บัณฑิตตั้งครรภ์และบัณฑิตพิเศษ </td><td></td><td></td></tr>';
					$chair .= '</thead></table>';
					echo $chair;
					?>

					<p align="center">
						<input name="print" class="noPrint btn btn-success btn-md" type="button" value="Print" onClick="window.print()">
						<input name="printt" class="noPrint btn btn-success btn-md" type="button" value="Excel" onClick="printt()">

					</p>

					<p><a href="#top">▲GoTop</a></p>


					<p>&nbsp;</p>

				</div>
			</div>
</body>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="dist/js/bootstrap.min.js"></script>

</body>
<center> Copyright © by สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี 2017

</html>
<?php
include('../sphp/cconn.php');
?>