<?php
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
		<title>สรุปยอดบัณฑิตผู้มีสิทธิ์รับพระราชทานปริญญาบัตร 2563</title>
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
		<STYLE TYPE="text/css">
			p.breakhere {
				page-break-before: always
			}
		</STYLE>
		<P class="breakhere">

			<div class="container">
				<div>
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
											<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามวุฒิ</a>
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
					include('../sphp/conn.php');
					/**
		//ครุศาสตร์ ปกติ
		//มา

		//$query=sprintf("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and");

		$queryA1 = $conn->query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate31 !=' ';");
		$totalA1 = $result->num_rows($queryA1);
		//ไม่มา
		$queryA11 = $conn->query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate31 =' ';");
		$totalA11 = $result->num_rows($queryA11);
		
		

		//ครุศาสตร์ กศ.บท.
		//มา
		$queryB3 = $conn->query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate2 !=' ';");
		$totalB3 = $result->num_rows($queryB3);
		//ไม่มา
		$queryB33 = $conn->query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate2 =' ';");
		$totalB33 = $result->num_rows($queryB33);
					 */
					?>


					<div class="col-md-9">
						<div class="panel panel-primary">
							<div class="panel-heading noPrint">
								<h3 class="panel-title">
									<center>&nbsp; <span class="glyphicon glyphicon-user "></span>&nbsp;สรุปยอดบัณฑิตผู้มีสิทธิ์รับพระราชทานปริญญาบัตร 2563 </center>
								</h3>
							</div>
							<div class="panel-body">
								<!--left-->
								</FORM>
								<?php

								?></center>
								<form action="" method='get'>
								<div class="row">
  									<div class="col-sm-5 col-md-6">
  										<input id='n' type="number" name="n" style="height: 30px" min="0">
										<input type="submit" name="btn_action" value="Submit" class="btn btn-info">
  									</div>
  									<div class="col-sm-5 col-md-6">
  										<input class="noPrint btn btn-success btn-md " style="float: right;" type="button" value="Print" onClick="window.print()">
  										<a href="police.php"><input type="button" name="v" value="สำหรับตำรวจ" class="btn btn-info" style="float: right;margin-right: 10px"></a>
  										
  									</div>
								</div>
									
									
								</form>
								<br>
								<?php
								if (isset($_GET["n"])) {
									$n = $_GET['n'];
								}
								?>
								<?php $cc = 0;
								$taw = 1;

								// $query = "SELECT * FROM scan2557 WHERE level LIKE '%ตรี%' and ( education LIKE '%ศิลปกรรม%' or education LIKE '%รัฐป%' or education LIKE '%วิท%' or education LIKE '%นิเทศ%' or education LIKE '%รัฐศ%' or education LIKE '%บริหาร%') and ((`chdate32`!='' or 'chdate1'!='' or 'chdate2'!='' or `chdate3`!='' or 'chdate12'!='' or 'chdate22'!='' ) or (`chdate32` is not null or 'chdate1'is not null or 'chdate2'is not null or `chdate3`is not null or 'chdate12'is not null or 'chdate22'is not null )) and type123!='1'ORDER BY `scan2557`.`count` ASC;";
								$query = $query = "SELECT * FROM scan2557 WHERE level LIKE '%ตรี%' and ( education LIKE '%ศิลปกรรม%' or education LIKE '%รัฐป%' or education LIKE '%วิท%' or education LIKE '%นิเทศ%' or education LIKE '%รัฐศ%' or education LIKE '%บริหาร%') and (`chdate1`!=' ' or `chdate12`!=' ' or `chdate2`!=' ' or`chdate22`!=' ' or`chdate3`!=' ' or`chdate32`or `chdate4`!=' ' or `chdate42`!=' ') ";
								$result = $conn->query($query) or die($conn->error);
								$tall=ceil($result->num_rows/$n);
								//echo $tall;
								?>
								<table class="table table-bordered">
									<thead>
										<tr class="success">
											<th rowspan="2">
												<center>
													<font size="2">แถวที่
												</center>
											</th>
											<th rowspan="2">
												<center>
													<font size="2">คณะ
												</center>
											</th>
											<th rowspan="2">
												<center>
													<font size="2">จาก - ถึง
												</center>
											</th>
										</tr>
									</thead>
									<?php
									$cout = 1;
									//ก่อนจะ import ให้เรียงคณะก่อน
									for($i=0;$i<$tall;$i++){
										$va1=($i*$n)+1;
										$va2=($i*$n)+$n;
										$check=sprintf("SELECT DISTINCT education , count(*) as ct FROM scan2557 WHERE count BETWEEN '%d' AND '%d' GROUP BY education ORDER BY count",$va1,$va2);
										$rs=$conn->query($check);
										$nr=$rs->num_rows;
										$cht=0;
										$chr=0;
										$chrr=0;
										while ($row1 = $rs->fetch_assoc()) {
											$cc++;
									?>
										<tr>
											<td><?php 
												if($nr==1){
													echo $taw;
												}elseif($nr>1 && $cht==0){
													echo $taw;
													$cht=1;
												}
											?></td>
											<td><?php
												if ($row1['education'] === 'ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') {
													echo "ค.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'วิทยาศาสตรบัณฑิต') {
													echo "วท.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'นิติศาสตรบัณฑิต') {
													echo "น.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'รัฐประศาสนศาสตรบัณฑิต') {
													echo "รป.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'ศิลปกรรมศาสตรบัณฑิต') {
													echo "ศป.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'ศิลปศาสตรบัณฑิต') {
													echo "ศศ.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'บัญชีบัณฑิต') {
													echo "บช.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'พยาบาลศาสตรบัณฑิต') {
													echo "พย.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'บริหารธุรกิจบัณฑิต') {
													echo "บธ.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'นิเทศศาสตรบัณฑิต') {
													echo "นศ.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'รัฐศาสตรบัณฑิต') {
													echo "ร.บ.".'('.$row1['ct'].')';
												} else if ($row1['education'] === 'เศรษฐศาสตรบัณฑิต') {
													echo "ศ.บ.".'('.$row1['ct'].')';
												}
											?></td>
											<td><?php
												if($nr==1){
													echo $va1." - ".$va2;
													$back=$va2;
													$front=$va1;
												}elseif($nr>1){
													if($chr==0){
														$va3=$back+1;
														$va4=$va3+$row1['ct']-1;
														$chr=1;
														$back=$va4;
														$front=$va3;
													}else{
														$va3=$back+1;
														$va4=$back+$row1['ct'];
														$back=$va4;
														$front=$va3;		
													}
													echo $va3." - ".$va4;
												}
											?></td>
										</tr>


										<tr <?php //echo "<P CLASS='breakhere'>"; 
											?>>
											<?php $cout++;
											if ($cout > $n) {

												$cout = 1;
												 ?>
								</table>
								
								<table class="table table-bordered ">
									<thead>

										<tr class="success">
											<th rowspan="2">
												<center>
													<font size="2">แถวที่
												</center>
											</th>
											<th rowspan="2">
												<center>
													<font size="2">คณะ
												</center>
											</th>
											<th rowspan="2">
												<center>
													<font size="2">จาก
												</center>
											</th>
										</tr>
									</thead>

							<?php
											} //end if
										}$taw++; }//end while
							?>

							<!------end table1------->
							
							</table>
							</font>
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
