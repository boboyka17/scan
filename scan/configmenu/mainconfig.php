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

	<body style="font-family:'Kanit'">
		<div class="container">
			<div class="row">
				<center><img src="../headnew.png"></center>
			</div>
			<!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li>
							<a href="../main.php">หน้าหลัก</a>
						</li>
						<li>
							<a href="mainconfig.php">รายการจัดการระบบ</a>
						</li>
					</ul>
				</div>
			</div>


			<div class="row">
				<div class="col-md-3">
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

				$chstatus = $conn->query("select * from user2557 where user='" . $_SESSION['suser'] . "';");
				$showstatus = $chstatus->fetch_array();
				?>

				<div class="col-md-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								<center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;รายการจัดการระบบ</center>
							</h3>
						</div>

						<div class="panel-body">
							<center>
								<img src="admin.png" width="120" height="120">
								<br /><br />
								<button type="button" class="btn btn-danger" onclick="cf()">เครียข้อมูล</button>
								<script>
									function cf() {
										var r = confirm("แน่ใจไหมที่จะเครียข้อมูล!");
										if (r) {
											location.href = "clear.php?clear";
										} else {
											console.log('cc');
										}
									}
								</script>
								<br>
								<br>
								<div class="row">

									<div class="col-xs-4">
										<?php if ($showstatus['status'] == 1 or  $showstatus['status'] == 9) { ?>
											<a href="canceldate.php">
												<button type="button" class="btn btn-danger">
													<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> ระบบถอนสแกน</span>
												</button>
											</a>
											<br /><br />
										<?php	} ?>
										<a href="reportp1.php">
											<button type="button" class="btn btn-success">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานผลพิเศษ(ปริญญา)</span>
											</button>
										</a>
										<br /><br />
										<a href="reportpjob.php">
											<button type="button" class="btn btn-info">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานลงข้อมูลการทำงาน</span>
											</button>
										</a>
										<br /><br />

										<a href="../report/reporsumtotal.php">
											<button type="button" class="btn btn-success">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานสรุปยอดตามปริญญา</span>
											</button>
										</a>
										<br /><br />

										<a href="../report/mad.php?st=1">
											<button type="button" class="btn btn-success">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานตัดมัด</span>
											</button>
										</a>
										<br /><br />
										<a href="../configmenu/swip.php">
											<button type="button" class="btn btn-success">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> สลับ</span>
											</button>
										</a>
										<br /><br />
									</div>

									<div class="col-xs-4">


										<a href="search.php">
											<button type="button" class="btn btn-warning">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> ค้นหาแบบพิเศษ</span>
											</button>
										</a>


										<br /><br />
										<a href="reportp2.php">
											<button type="button" class="btn btn-info">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานผลพิเศษ(คณะ)</span>
											</button>
										</a>
										<br /><br />
										<a href="reporttext.php">
											<button type="button" class="btn btn-warning">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานผล ReMark</span>
											</button>
										</a>
										<br /><br />
										<a href="../report/reporsumkanatotal.php">
											<button type="button" class="btn btn-info">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานสรุปยอดตามคณะ</span>
											</button>
										</a>
										<br /><br />
										<a href="../configmenu/row.80.php">
											<button type="button" class="btn btn-info">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> ตัดแถวเช้า</span>
											</button>
										</a>
										<br /><br />
										<a href="../configmenu/sumtaw.php">
											<button type="button" class="btn btn-warning">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> sumtaw</span>
											</button>
										</a>
										<br /><br />
									</div>

									<div class="col-xs-4">
										<a href="reportpl.php">
											<button type="button" class="btn btn-success">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานผลพิเศษ(ลา)</span>
											</button>
										</a>
										<br /><br />
										<a href="../report/reportotalchair.php">
											<button type="button" class="btn btn-info">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานลำดับที่นั้ง</span>
											</button>
										</a>
										<br /><br />
										<a href="../report/homereport.php">
											<button type="button" class="btn btn-warning">
												<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> รายงานยอดบัณฑิตทั้งหมดทั้งมวล</span>
											</button>
										</a>

										<br /><br />
										<?php if ($showstatus['status'] == 1) { ?>
											<a href="adminconfig.php">
												<button type="button" class="btn btn-primary">
													<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> เฉพาะผู้ดูแลระบบเท่านั้น!</span>
												</button>
											</a>
											<br /><br />
											<a href="../configmenu/row80a.php">
												<button type="button" class="btn btn-info">
													<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> ตัดแถวบ่าย</span>
												</button>
											</a>
											<br /><br />
											<a href="../configmenu/exportexcel.php">
												<button type="button" class="btn btn-info">
													<span class="glyphicon glyphicon-cog" style="font-family: 'Kanit'"> Export รวม</span>
												</button>
											</a>
											<br /><br />
										<?php } ?>
									</div>

								</div>

							</center>
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