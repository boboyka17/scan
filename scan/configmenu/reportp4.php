<?php
	session_start();
	if(!isset($_SESSION['suser']))
	{
?>
		<meta http-equiv="refresh" content="0;url=../fail-login.php">
<?php
	}
	else
	{
	include('../sphp/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร 2558</title>

	<!-- Bootstrap -->
	<link href="../dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 Shim	and	Respond.js IE8 support of HTML5	elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if	lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  <body>
  <style media="print">
  .noPrint{	display: none; }
  .yesPrint{ display: block	!important;	}
	</style>
  <div class="container">
		<div class="row	noPrint">
		<center><img src="../headnew.png"></center>
		</div>



	  <!-- +++++++++++++++++++++ END OF	HEADER ++++++++++++++++++++++++-->

		<div class="row">
			  <div class="col-md-12	noPrint">
				   <ul class="breadcrumb">
						<li>
						  <a href="../main.php">หน้าหลัก</a>
						</li>
						<li>
						 <a	href="mainconfig.php">รายการจัดการระบบ</a>
						</li>
						<li>
						 <a	href="reportp1.php">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามวุฒิ</a>
						</li>
				  </ul>
			  </div>
		</div>


		<div class="row">
			  <div class="col-md-3 noPrint">
				  <div class="panel	panel-primary">
					  <div class="panel-heading">
						  <h3 class="panel-title text-center">รายการหลัก (Main Menu)</h3>
					  </div>
				  <div class="panel-body">
					<ul	class="nav nav-pills">
							<li>
								<a href="../menu_1.php">
								  <span	class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a>
							</li>
							<li >
							  <a href="../menu_2-0.php">
								  <span	class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามวุฒิ</a>
							</li>
							<li class="active">
								<a href="../menu_3-0.php">
								  <span	class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
							</li>
							<li	>
								<a href="mainconfig.php">
								  <span	class="glyphicon glyphicon-cog"></span>&nbsp;รายการจัดการระบบ</a>
							</li>
							<li>
								<a href="../sphp/sessionout.php">
								  <span	class="glyphicon glyphicon-off"></span>&nbsp;ออกจากระบบ</a>
							</li>
						</ul>
				  </div>
				</div>
		  </div>

		  <!-- +++++++++++++++++++++ END OF	MENU-BAR ++++++++++++++++++++++++-->
			<?php
				$query=sprintf("SELECT * FROM datescan");
				$result=mysql_query($query,$con);
			?>


		<div class="col-md-9">
			  <div class="panel	panel-primary">
				  <div class="panel-heading	noPrint">
					 <h3 class="panel-title">
						  <center>&nbsp; <span class="glyphicon	glyphicon-user"></span>&nbsp;ระบบรายงานผลบัณฑิตตามคณะ</center>
					 </h3>
				  </div>

					<div class="panel-body">
					<center><h3><span class="label label-warning">ระบบรายงานผลบัณฑิตตามคณะ</span></h3></center>
					<br/>
						<table class="table	table-bordered" border="5">
							<thead>
								<tr>
									<th colspan=""><center>กรุณาเลือกวัน</center></th>
									<th colspan=""><center>คลิก</center></th>
								</tr>
							</thead>
								
								<tr>
								<td>
								<form method="GET" action="reportp4-1.php">
								<select class="form-control" name="day">
									<option value="4">กรุณาเลือก</option>
									<?php while($row1=mysql_fetch_assoc($result)){?>
									<option value="<?php echo $row1['idday'];?>"><?php echo $row1['date']." ".$row1['mont']." ".$row1['year'];?></option>
									<?php }?>
								</select>
								</td>
								<td>
								<center><button type="submit" class="btn btn-success btn-xs">ตกลง&nbsp;<span class="glyphicon glyphicon-ok"></span></button></center>
								</td>
								</form>
								</tr>
								
						</table>
						<!--
						<input class="noPrint btn btn-success btn-md" type="button"	value ="Print" onClick="window.print()">-->
					</div>
		</div>

			<!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->


	<!-- jQuery	(necessary for Bootstrap's JavaScript plugins) -->
	<!--<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script	src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
include('../sphp/cconn.php');
	}
?>