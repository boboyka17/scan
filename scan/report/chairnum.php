<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../sphp/conn.php');
if ($_GET['st'] == 1) {
	$st = 'รอบแรก';
} else if ($_GET['st'] == 2) {
	$st = 'รอบสอง';
}

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
					<li><a href="chair.php?st=<?php echo $_GET['st']; ?>">กลับ</a></li>

				</ul>
			</div>

		</div>
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<center>
							รายงานสรุปเลขที่นั่งบัณฑิต <?php
														$date = file_GET_contents("..//sphp/date.txt", "w");
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
														echo "( วันที่" . " " . $row1["date"] . " " . $row1["mont"] . " " . $row1["year"] . " " . $p . ")"; ?>
						</center>
					</h3>
				</div>
				<div class="panel-body">



					<?php
					$chair = '<table  class="table table-bordered table2excel"><thead><tr class="info"><th colspan="2"><center>แถว</center></th> <th width="35%"><center>ผู้ดูแลแถวบัณฑิต</center></th><th width="25%"><center>หมายเหตุ</center></th></tr>';
					$chairid = 1;
					if ($_GET['st'] == 1 or @$_SESSION['stchair'] == 1) {
						$i = 1;
						$id = 1;
						$strid = 1;
						$query = "select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";

						$result = $conn->query($query);
						$ed = 'ค.บ.';
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

							//if($id==1) {$chair.='<tr class="warning"><td>แถวที่  '.$chairid.'</td><td> รอบแรก '.$ed.' '.$row['counteducation'].' -';}
							if ($ed != $row['education']) {
								$chair .= ' ' . $counteducation . '</td><td></td><td></td></tr>';
								$ed = $row['education'];
								$chair .= '<tr class="warning"><td></td><td> รอบแรก ' . $ed . ' ลำดับที่ ' . $row['counteducation'] . ' -';
							}
							$counteducation = $row['counteducation'];
							if ($id == 1) {
								$chair .= '<tr class="warning"><td>แถวที่  ' . $chairid . '</td><td> รอบแรก ' . $ed . ' ลำดับที่ ' . $row['counteducation'] . ' -';
							}
							if ($id == 80) {
								$chair .= ' ' . $row['counteducation'] . '</td><td></td><td></td></tr>';
								$chairid++;
							}
							if ($id < 80) $counteducation = $row['counteducation'];

							$i++;
							$id++;
							if ($id > 80) {
								$strid++;
								$id = 1;
							}
						}
						if ($id < 80) {
							$chair .= ' ' . $counteducation . '</td><td></td><td></td></tr>';
						}

						$chair .= '<tr class="warning"><td></td><td> รอบแรก บัณฑิตตั้งครรภ์และบัณฑิตพิเศษ </td><td></td><td></td></tr>';
						$chair .= '</thead></table>';
					} else {
						$r = $conn->query("select max(count) as maxcount from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null);");
						$maxcount = $r->fetch_assoc();
						$sum = 1;
						$i = 1;
						$id = 1;
						$strid = 1;
						$t = 1;

						$r = $conn->query("select * from scan2557 where (education like '%มหาบัณฑิต%' or education like '%ดุษฎีบัณฑิต%')  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';");
						$num = $r->num_rows;
						$num = floor($num /= 80);
						$num = $num * 80;
						$num1 = $r->num_rows - $num;
						$num2 = 80 - $num1;
						$ed = 'ดุษฎีบัณฑิต';
						while ($sum <= 3) {
							if ($sum == 1) $query = "select  * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
							if (@$sum == 2) {
								if (@$stq == 3) {
									$count++;
									$query = "select * from scan2557 where education like '%มหาบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and count = " . $count . " and ch" . $_POST['date'] . " !='';";
								} else $query = "select * from scan2557 where education like '%มหาบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
							}
							if ($sum == 3) {

								if (@$stq == 4) {
									$count2++;
									$query = "select * from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and count = " . $count2 . " and ch" . $_POST['date'] . " !='';";
									if ($maxcount['maxcount'] == $count2) $t = 0;
									$result = $conn->query($query);
									//$t=mysql_num_rows($result);
								} else $query = "select * from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
							}


							$result = $conn->query($query);

							while ($row = $result->fetch_assoc()) {
								// $querych="select * from scan2557 where std_id=".$row['std_id'].";";
								//$resultch=mysql_query($querych,$con);
								// $rowch=mysql_fetch_assoc($resultch);
								// if($rowch['education'])
								if ($sum == 1)	$row['education'] = 'ดุษฎีบัณฑิต';
								if ($sum == 2) $row['education'] = 'มหาบัณฑิต';
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

								//if($id==1) {$chair.='<tr class="warning"><td>แถวที่  '.$chairid.'</td><td> รอบแรก '.$ed.' '.$row['counteducation'].' -';}
								if ($id != 1) {
									if ($ed != $row['education']) {
										$chair .= ' ' . $counteducation2 . '</td><td></td><td></td></tr>';
										$ed = $row['education'];
										$chair .= '<tr class="warning"><td></td><td> รอบสอง ' . $ed . ' ลำดับที่ ' . $row['counteducation'] . ' -';
									}
								} else $ed = $row['education'];
								$counteducation2 = $row['counteducation'];
								if ($id == 1) {
									$chair .= '<tr class="warning"><td>แถวที่  ' . $chairid . '</td><td> รอบสอง ' . $ed . ' ลำดับที่ ' . $row['counteducation'] . ' -';
								}
								if ($id == 80) {
									$chair .= ' ' . $row['counteducation'] . '</td><td></td><td></td></tr>';
									$chairid++;
								}
								if ($id < 80) $counteducation = $row['counteducation'];
								$i++;
								$id++;
								if ($id > 80) {
									$strid++;
									$id = 1;
								}
								if ($i == $num + 1) {
									$sum = 3;
									$ich = 0;
									$st = 1;
									$count = $row['count'];
									break;
								}
								if (@$st == 1) $ich++;
								if (@$ich == $num2) {
									$sum = 2;
									$stq = 3;
									$ich2 = 0;
									$count2 = $row['count'];
									break;
								}
								if (@$stq == 3) $ich2++;
								if (@$ich2 == $num1) {
									$stq = 4;
									$sum = 3;
								}
							}

							if ($t == 0) break;
							if (@$st != 1) $sum++;
						}
						if ($id < 80) {
							$chair .= ' ' . $counteducation . '</td><td></td><td></td></tr>';
						}
						$chair .= '<tr class="warning"><td></td><td> รอบสอง บัณฑิตตั้งครรภ์และบัณฑิตพิเศษ </td><td></td><td></td></tr>';
						$chair .= '</thead></table>';
					}

					echo $chair;

					?>
					</thead>
					<tbody>
					</tbody>
					</table>
					</tbody>

					</table>




					<p>&nbsp;</p>
					<p align="center">
						<input name="print" class="noPrint btn btn-success btn-md" type="button" value="Print" onClick="window.print()">
						<input name="printt" class="noPrint btn btn-success btn-md" type="button" value="Excel" onClick="printt()">

					</p>
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