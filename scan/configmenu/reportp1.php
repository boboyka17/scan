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
							<a href="reportp1.php">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามปริญญา</a>
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



				<div class="col-md-9">
					<div class="panel panel-primary">
						<div class="panel-heading noPrint">
							<h3 class="panel-title">
								<center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามปริญญา</center>
							</h3>
						</div>

						<div class="panel-body">
							<center>
								<h3><span class="label label-warning">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามปริญญา</span></h3>
							</center>
							<br />
							<table class="table table-bordered table2excel">
								<thead>
									<tr class="">
										<th rowspan="2">
											<center>ชื่อปริญญา</center>
										</th>
										<th colspan="3">
											<center>ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามปริญญา</center>
										</th>
										<th rowspan="2" class="noPrint"></th>

									</tr>
									<tr class="">
										<th>
											<center>ตั้งครรภ์</center>
										</th>
										<th>
											<center>ร่างกายไม่สมบูรณ์</center>
										</th>
										<th>
											<center>รวม</center>
										</th>
									</tr>
								</thead>
								<tbody>

									<?php


									//ศิลปศาสตรบัณฑิต(ศศ.บ.)
									$query1 = $conn->query("select * from scan2557 where education like'%ศิลปศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total1 = $query1->num_rows;
									//ศิลปศาสตรบัณฑิต(ศศ.บ.) กศ.บท.
									$query11 = $conn->query("select * from scan2557 where education like'%ศิลปศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total11 = $query11->num_rows;

									//ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)
									$query2 = $conn->query("select * from scan2557 where education like'%ศิลปกรรมศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total2 = $query2->num_rows;
									//ศิลปกรรมศาสตรบัณฑิต(ศป.บ.) กศ.บท.
									$query22 = $conn->query("select * from scan2557 where education like'%ศิลปกรรมศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total22 = $query22->num_rows;

									//ครุศาสตรบัณฑิต(ค.บ.)
									$query3 = $conn->query("select * from scan2557 where education like'%ครุศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total3 = $query3->num_rows;
									//ครุศาสตรบัณฑิต(ค.บ.) กศ.บท.
									$query33 = $conn->query("select * from scan2557 where education like'%ครุศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total33 = $query33->num_rows;

									//วิทยาศาสตรบัณฑิต(วท.บ.)
									$query4 = $conn->query("select * from scan2557 where education like'%วิทยาศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total4 = $query4->num_rows;
									//วิทยาศาสตรบัณฑิต(วท.บ.) กศ.บท.
									$query44 = $conn->query("select * from scan2557 where education like'%วิทยาศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total44 = $query44->num_rows;

									//นิติศาสตรบัณฑิต(น.บ.)
									$query5 = $conn->query("select * from scan2557 where education like'%นิติศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total5 = $query5->num_rows;
									//นิติศาสตรบัณฑิต(น.บ.) กศ.บท.
									$query55 = $conn->query("select * from scan2557 where education like'%นิติศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total55 = $query55->num_rows;

									//รัฐประศาสนศาสตรบัณฑิต(รป.บ.)
									$query6 = $conn->query("select * from scan2557 where education like'%รัฐประศาสนศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total6 = $query6->num_rows;
									//รัฐประศาสนศาสตรบัณฑิต(รป.บ.) กศ.บท.
									$query66 = $conn->query("select * from scan2557 where education like'%รัฐประศาสนศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total66 = $query66->num_rows;

									//บริหารธุรกิจบัณฑิต(บธ.บ.)
									$query7 = $conn->query("select * from scan2557 where education like'%บริหารธุรกิจบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total7 = $query7->num_rows;
									//บริหารธุรกิจบัณฑิต(บธ.บ.) กศ.บท.
									$query77 = $conn->query("select * from scan2557 where education like'%บริหารธุรกิจบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total77 = $query77->num_rows;

									//บัญชีบัณฑิต(บช.บ.)
									$query8 = $conn->query("select * from scan2557 where education like'%บัญชีบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total8 = $query8->num_rows;
									//บัญชีบัณฑิต(บช.บ.) กศ.บท.
									$query88 = $conn->query("select * from scan2557 where education like'%บัญชีบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total88 = $query88->num_rows;

									//พยาบาลศาสตรบัณฑิต(พย.บ.)
									$query9 = $conn->query("select * from scan2557 where education like'%พยาบาลศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total9 = $query9->num_rows;
									//พยาบาลศาสตรบัณฑิต(พย.บ.) กศ.บท.
									$query99 = $conn->query("select * from scan2557 where education like'%พยาบาลศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total99 = $query99->num_rows;

									$query10 = $conn->query("select * from scan2557 where education like'%นิเทศศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total10 = $query10->num_rows;
									$query1010 = $conn->query("select * from scan2557 where education like'%นิเทศศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total1010 = $query1010->num_rows;

									$query11 = $conn->query("select * from scan2557 where education like'%รัฐศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total11 = $query11->num_rows;
									$query1111 = $conn->query("select * from scan2557 where education like'%รัฐศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total1111 = $query1111->num_rows;

									$query12 = $conn->query("select * from scan2557 where education like'%บริการธุรกิจบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$total12 = $query12->num_rows;
									$query1212 = $conn->query("select * from scan2557 where education like'%บริการธุรกิจบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$total1212 = $query1212->num_rows;

									$queryses = $conn->query("select * from scan2557 where education like'%เศรษฐศาสตรบัณฑิต%' and status ='2' and type123 IS NOT NULL;");
									$totalses = $queryses->num_rows;
									$queryses1 = $conn->query("select * from scan2557 where education like'%เศรษฐศาสตรบัณฑิต%' and status ='3' and type123 IS NOT NULL;");
									$totalses1 = $queryses1->num_rows;

									?>
									<!-- 222222222222222222222222222222 -->
									<tr class="warning">
										<td>วิทยาศาสตรบัณฑิต(วท.บ.)</td>
										<td><?php echo $total4; ?></td>
										<td><?php echo $total44; ?></td>
										<td><?php echo ($total4 + $total44); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=2"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<!-- End 2222222222222222222222 End -->
									<tr class="warning">
										<td>นิเทศศาสตรบัณฑิต(...)</td>
										<td><?php echo $total10; ?></td>
										<td><?php echo $total1010; ?></td>
										<td><?php echo ($total10 + $total1010); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=2"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<tr class="warning">
										<td>รัฐประศาสนศาสตรบัณฑิต(รป.บ.)</td>
										<td><?php echo $total6; ?></td>
										<td><?php echo $total66; ?></td>
										<td><?php echo ($total6 + $total66); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=4"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<tr class="warning">
										<td>รัฐศาสตรบัณฑิต(...)</td>
										<td><?php echo $total11; ?></td>
										<td><?php echo $total1111; ?></td>
										<td><?php echo ($total11 + $total1111); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=4"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<tr class="warning">
										<td>ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)</td>
										<td><?php echo $total2; ?></td>
										<td><?php echo $total22; ?></td>
										<td><?php echo ($total2 + $total22); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=5"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<tr class="warning">
										<td>บริหารธุนกิจบัณฑิต(...)</td>
										<td><?php echo $total12; ?></td>
										<td><?php echo $total1212; ?></td>
										<td><?php echo ($total12 + $total1212); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=5"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<!-- 11111111111111111 ้เอก โท 1111111111111 -->
									<tr class="warning">
										<td>ครุศาสตรบัณฑิต(ค.บ.)</td>
										<td><?php echo $total3; ?></td>
										<td><?php echo $total33; ?></td>
										<td><?php echo ($total3 + $total33); ?></td>
										<td class="noPrint">
											<center><a href="/scan/scan/configmenu/report1-1.php?status=1"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<!-- End 1111111111111111111111 End -->




									<!-- 333333333333333333333333333333 -->
									<tr class="warning">
										<td>นิติศาสตรบัณฑิต(น.บ.)</td>
										<td><?php echo $total5; ?></td>
										<td><?php echo $total55; ?></td>
										<td><?php echo ($total5 + $total55); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=3"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<tr class="warning">
										<td>บัญชีบัณฑิต(บช.บ.)</td>
										<td><?php echo $total8; ?></td>
										<td><?php echo $total88; ?></td>
										<td><?php echo ($total8 + $total88); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=7"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<!-- End 3333333333333333333333 End -->

									<!-- ses -->
									<tr class="warning">
										<td>เศรษฐศาสตรบัณฑิต(บช.บ.)</td>
										<td><?php echo $totalses; ?></td>
										<td><?php echo $totalses1; ?></td>
										<td><?php echo ($totalses + $totalses1); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=7"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<!-- End ses End -->

									<!-- 666666666666666666666666666666 -->
									<tr class="warning">
										<td>ศิลปศาสตรบัณฑิต(ศศ.บ.)</td>
										<td><?php echo $total1; ?></td>
										<td><?php echo $total11; ?></td>
										<td><?php echo ($total1 + $total11); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=6"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<!-- End 6666666666666666666666 End -->

									<!-- 888888888888888888888888888888 -->
									<tr class="warning">
										<td>พยาบาลศาสตรบัณฑิต(พย.บ.)</td>
										<td><?php echo $total9; ?></td>
										<td><?php echo $total99; ?></td>
										<td><?php echo ($total9 + $total99); ?></td>
										<td class="noPrint">
											<center><a href="/scan//scan/configmenu/report1-1.php?status=8"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center>
										</td>
									</tr>
									<!-- End 8888888888888888888888 End -->

									<tr class="danger">
										<td>รวม</td>
										<td><?php echo ($total1 + $total2 + $total3 + $total4 + $total5 + $total6 + $total7 + $total8 + $total9 + $total10 + $total11 + $total12 + $totalses); ?></td>
										<td><?php echo ($total11 + $total22 + $total33 + $total44 + $total55 + $total66 + $total77 + $total88 + $total99 + $total1010 +$total1111 + $total1212 + $totalses1); ?></td>
										<td><?php echo ($total1 + $total2 + $total3 + $total4 + $total5 + $total6 + $total7 + $total8 + $total9 + $total10 + $total11 + $total12 + $totalses) + ($total11 + $total22 + $total33 + $total44 + $total55 + $total66 + $total77 + $total88 + $total99 + $total1010 +$total1111 + $total1212 + $totalses1); ?></td>
										<td class="noPrint"></td>
									</tr>
								</tbody>
								<?php
								include('../sphp/cconn.php');
								?>
							</table>
							<p align="center">
								<input name="print" class="noPrint btn btn-success btn-md" type="button" value="Print" onClick="window.print()">
								<input name="printt" class="noPrint btn btn-success btn-md" type="button" value="Excel" onClick="printt()">

							</p>
						</div>
					</div>

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