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
							<li>
							  <a href="../menu_2-0.php">
								  <span	class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามวุฒิ</a>
							</li>
							<li>
								<a href="../menu_3-0.php">
								  <span	class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
							</li>
							<li	class="active">
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
			
			if($_GET['day']==1){
			$result=mysql_query("select * from datescan where idday=1;",$con);
			}elseif($_GET['day']==2){
			$result=mysql_query("select * from datescan where idday=2;",$con);
			}elseif($_GET['day']==3){
			$result=mysql_query("select * from datescan where idday=3;",$con);
			}else{
			$result=mysql_query("select * from datescan where idday=4;",$con);
			}
			$row1=mysql_fetch_assoc($result);
			
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
					<center><?php echo $row1['date']." ".$row1['mont']." ".$row1['year'];?></center>
					<br/>
						<table class="table	table-bordered">
							<thead>
							  <tr class="">
								<th	rowspan="1"><center>รายงานตามวุฒิ</center></th>
								<th	colspan="1"><center>จำนวนเต็ม</center></th>
								<th	rowspan="1"><center>มา</center></th>
								<th	rowspan="1"><center>มีครรภ์</center></th>
								<th	rowspan="1"><center>พิเศษ</center></th>
								<th	rowspan="1"><center>ไม่มา</center></th>
								<th	rowspan="1"><center>รวมผู้เข้าซ้อม</center></th>

							  </tr>
							</thead>
							<tbody>
							<?php
								if($_GET['day']==1){
									//$query=mysql_query("select * from scan2557",$con);
									$date="chdate31";
									$faculty[1]="บัณฑิตวิทยาลัย";
									$faculty[2]="ครุศาสตร์";
									$faculty[3]="มนุษยศาสตร์และสังคมศาสตร์";
									$faculty[4]="วิทยาศาสตร์และเทคโนโลยี";
									$faculty[5]="วิทยาการจัดการ";
									$faculty[6]="วิทยาลัยนานาชาติ";
									$faculty[7]="นิติศาสตร์";
									$faculty[8]="พยาบาลศาสตร์";
								}elseif($_GET['day']==2){
									$date="chdate1";
									$faculty[1]="บัณฑิตวิทยาลัย";
									$faculty[2]="ครุศาสตร์";
									$faculty[3]="มนุษยศาสตร์และสังคมศาสตร์";
									$faculty[4]="วิทยาศาสตร์และเทคโนโลยี";
									$faculty[5]="วิทยาการจัดการ";
									$faculty[6]="วิทยาลัยนานาชาติ";
									$faculty[7]="นิติศาสตร์";
									$faculty[8]="พยาบาลศาสตร์";
								}elseif($_GET['day']==3){
									$date="chdate2";
									$faculty[1]="บัณฑิตวิทยาลัย";
									$faculty[2]="ครุศาสตร์";
									$faculty[3]="มนุษยศาสตร์และสังคมศาสตร์";
									$faculty[4]="วิทยาศาสตร์และเทคโนโลยี";
									$faculty[5]="วิทยาการจัดการ";
									$faculty[6]="วิทยาลัยนานาชาติ";
									$faculty[7]="นิติศาสตร์";
									$faculty[8]="พยาบาลศาสตร์";
								}else{
									$date="chdate3";
									$faculty[1]="บัณฑิตวิทยาลัย";
									$faculty[2]="ครุศาสตร์";
									$faculty[3]="มนุษยศาสตร์และสังคมศาสตร์";
									$faculty[4]="วิทยาศาสตร์และเทคโนโลยี";
									$faculty[5]="วิทยาการจัดการ";
									$faculty[6]="วิทยาลัยนานาชาติ";
									$faculty[7]="นิติศาสตร์";
									$faculty[8]="พยาบาลศาสตร์";
								}
								$sum1=0;
								$sum2=0;
								$sum3=0;
								$sum4=0;
								$sum5=0;
								$sum6=0;
								for($num = 1;$num <=8 ;$num++){
									for($num2=1;$num2<=8 ;$num2++){
									
									$query1= mysql_query("select *	from scan2557 where	faculty like '%".$faculty[$num]."%' and status ='1'	and	".$date."!='';",$con);
									$total1= mysql_num_rows($query1);

									$query2	= mysql_query("select *	from scan2557 where	faculty	like'%".$faculty[$num]."%' and status ='2'	and	".$date."!='';",$con);
									$total2	= mysql_num_rows($query2);

									$query3	= mysql_query("select *	from scan2557 where	faculty like'%".$faculty[$num]."%'	and	status ='3'	and	".$date."!='';",$con);
									$total3	= mysql_num_rows($query3);

									$query4	= mysql_query("select *	from scan2557 where	faculty like'%".$faculty[$num]."%'	and	".$date."='';",$con);
									$total4	= mysql_num_rows($query4);

									
									$query5	= mysql_query("select *	from scan2557 where	faculty like'%".$faculty[$num]."%'	and	".$date."!='';",$con);
									$total5	= mysql_num_rows($query5);

									$query6	= mysql_query("select *	from scan2557 where	faculty like'%".$faculty[$num]."%';",$con);
									$total6	= mysql_num_rows($query6);
									}
									$sum1=$sum1+$total1;
									$sum2=$sum2+$total2;
									$sum3=$sum3+$total3;
									$sum4=$sum4+$total4;
									$sum5=$sum5+$total5;
									$sum6=$sum6+$total6;
									?>
									<tr>
									<td><?php echo $faculty[$num];?></td>
									<td><?php echo $total6;?></td>
									<td><?php echo $total1;?></td>
									<td><?php echo $total2;?></td>
									<td><?php echo $total3;?></td>
									<td><?php echo $total4;?></td>
									<td><?php echo $total5;?></td>
									<tr>
									<?php

								}
									?>
									<tr>
									<th>รวม</th>
									<th><?php echo $sum6;?></th>
									<th><?php echo $sum1;?></th>
									<th><?php echo $sum2;?></th>
									<th><?php echo $sum3;?></th>
									<th><?php echo $sum4;?></th>
									<th><?php echo $sum5;?></th>
									</tr>
								<?php
								include('../sphp/cconn.php');
								?>

							</tbody>
								
						</table>
						<input class="noPrint btn btn-success btn-md" type="button"	value ="Print" onClick="window.print()">
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
	}
		
?>