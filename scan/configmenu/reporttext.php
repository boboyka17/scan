<?php
include('../sphp/conn.php');
session_start();
if (!isset($_SESSION['suser'])) {
?>
	<meta http-equiv="refresh" content="0;url=../fail-login.php">
<?php
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร 2560</title>
		<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	<body style="font-family: 'Kanit'">
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
				<center><img src="../headnew.png"></center>
			</div>



			<!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->

			<div class="row">
				<div class="col-md-12 noPrint">
					<ul class="breadcrumb">
						<li>
							<a href="../main.php">หน้าหลัก</a>
						</li>
						<li>
							<a href="mainconfig.php">รายการจัดการระบบ</a>
						</li>
						<li>
							<a href="reporttext.php">ระบบรายงานผล ReMark</a>
						</li>
					</ul>
				</div>
			</div>


			<div class="row">
				<div class="col-md-3 noPrint">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title text-center">รายการหลัก (Main Menu)</h3>
						</div>
						<div class="panel-body">
							<ul class="nav nav-pills">
								<li>
									<a href="../menu_1.php">
										<span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a>
								</li>
								<li>
									<a href="../report/reporsumtotal.php">
										<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
								</li>
								<li>
									<a href="../report/reporsumkanatotal.php">
										<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
								</li>
								<li class="active">
									<a href="mainconfig.php">
										<span class="glyphicon glyphicon-cog"></span>&nbsp;รายการจัดการระบบ</a>
								</li>
								<li>
									<a href="../sphp/sessionout.php">
										<span class="glyphicon glyphicon-off"></span>&nbsp;ออกจากระบบ</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- +++++++++++++++++++++ END OF MENU-BAR ++++++++++++++++++++++++-->
				<?php


				//ครุศาสตร์ ปกติ
				$query1 = $conn->query("select * from scan2557 where statustext is not null and (type123='1' or type123='2') and  status='3' order by count;");

				//มนุษยศาสตร์และสังคมศาสตร์
				$query2 = $conn->query("select * from scan2557 where faculty ='มนุษยศาสตร์และสังคมศาสตร์' and statustext is not null and (type123='1' or type123='2') and type123='2' order by count;");

				//วิทยาศาสตร์และเทคโนโลยี
				$query3 = $conn->query("select * from scan2557 where faculty ='วิทยาศาสตร์และเทคโนโลยี' and statustext is not null and (type123='1' or type123='2') and type123='2' order by count;");

				//วิทยาการจัดการ
				$query4 = $conn->query("select * from scan2557 where faculty ='วิทยาการจัดการ' and statustext is not null and (type123='1' or type123='2') and type123='2' order by count;");

				//วิทยาลัยนานาชาติการท่องเที่ยว
				$query5 = $conn->query("select * from scan2557 where faculty ='วิทยาลัยนานาชาติการท่องเที่ยว' and statustext is not null and (type123='1' or type123='2') and type123='2' order by count;");

				//นิติศาสตร์
				$query6 = $conn->query("select * from scan2557 where faculty ='นิติศาสตร์' and statustext is not null and (type123='1' or type123='2') and type123='2' order by count;");

				//พยาบาลศาสตร์
				$query7 = $conn->query("select * from scan2557 where faculty ='พยาบาลศาสตร์' and statustext is not null and (type123='1' or type123='2') and type123='2' order by count;");

				//บัณฑิตวิทยาลัย
				$query8 = $conn->query("select * from scan2557 where faculty ='บัณฑิตวิทยาลัย' and statustext is not null and (type123='1' or type123='2') and type123='2' order by count;");

				?>


				<div class="col-md-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								<center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ระบบรายงานผล ReMark</center>
							</h3>
						</div>

						<div class="panel-body">

							<center>
								<h3><span class="label label-info">ระบบรายงานผล ReMark</span></h3>
							</center>

							<br />
							<table class="table table-bordered table2excel">
								<!-- **************************************** -->
								<thead>
									<tr class="success">
										<th rowspan="2">
											<center>รหัสบัณฑิต</center>
										</th>
										<!-- <th colspan="3">
											<center>รายงานผล ReMark คณะครุศาสตร์</center>
										</th> -->

									</tr>

									<tr class="success">
										<th>
											<center>รหัสนักศึกษา</center>
										</th>
										<th>
											<center>ชื่อ สกุล</center>
										</th>

										<th>
											<center>สถานะ</center>
										</th>
										<th rowspan="2">
											<center>ReMark</center>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ($row1 = $query1->fetch_array()) {
									?>
										<tr class="">
											<td><?php echo $row1['count']; ?></td>
											<td><?php echo $row1['std_id']; ?></td>
											<td><?php echo $row1['pre'] . " " . $row1['name'] . " " . $row1['lastname']; ?></td>
											<td><?php
												//	if($row1['status']==1)echo "ปกติ";
												if ($row1['status'] == 3) {
													echo "ร่างกายไม่สมบูรณ์";
												} else if ($row1['status'] == 2) {
													echo "ตั้งครรภ์";
												}

												?></td>
											<td><?php echo $row1['statustext']; ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<!-- **************************************** -->




							</table>
							<p align="center">
								<input name="print" class="noPrint btn btn-success btn-md" type="button" value="Print" onClick="window.print()">
								<input name="printt" class="noPrint btn btn-success btn-md" type="button" value="Excel" onClick="printt()">

							</p>
						</div>
					</div>
					<?php
					include('../sphp/cconn.php');
					?>
					<!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->


					<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
					<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
					<!-- Include all compiled plugins (below), or include individual files as needed -->
					<script src="../dist/js/bootstrap.min.js"></script>
	</body>

	</html>
<?php
}
?>