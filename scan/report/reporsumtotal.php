<?php
session_start();
date_default_timezone_set( 'Asia/Bangkok' );
include( '../sphp/conn.php' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร
		<?php echo ($Year=DATE("Y",strtotime("now"))+543); ?>
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	</title>
	<!-- Bootstrap -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="document.getElementById('save').focus();" style="font-family: 'Kanit'">
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
			<center><img src="head.png">
			</center>
		</div>
		<!---------------------------------------------------------------------------------->

		<div class="row">

			<div class="col-md-12 noPrint">
				<ul class="breadcrumb">
					<li><?php if(isset($_SESSION['suser'])){?><a href="../configmenu/mainconfig.php"><input name="back" class="noPrint btn btn-success btn-md" type="button" value ="กลับ"></a><?php }?>
					</li>
				</ul>
			</div>

		</div>
        
		<div class="row">
            <?php if(!isset($_SESSION['suser'])){?>
            <div class="col-md-3 noPrint">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title text-center">รายการหลัก (Main Menu)</h3>
                      </div>
                  <div class="panel-body ">
                    <ul class="nav nav-pills">
							
								<li>
                              <a href="../login.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>
							 <li>
							<a href="../menu_1.php">
							<span class="glyphicon glyphicon-info-sign"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ</a>
							</li>
 	   						<li class="active">
                            	<a href="../report/reporsumtotal.php">
                                	<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                            </li>
                            <li>
                                <a href="../report/reporsumkanatotal.php">
                                	<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                            </li>
                        </ul>    
                  </div>
                </div>
          </div>
            <div class="col-md-9">
                <?php }else {?>
                <div class="col-md-12">
                <?php }?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<center>
							รายงานสรุปยอดบัณฑิต (
							<?php
							$date = file_GET_contents( "../sphp/date.txt", "w" );

							$_POST[ 'date' ] = $date;

							if ( $_POST[ 'date' ] == "date1" ) {
								$query = sprintf( "SELECT * FROM datescan WHERE idday='1';" );
								$p = "เช้า";
							} else if ( $_POST[ 'date' ] == "date12" ) {
								$query = sprintf( "SELECT * FROM datescan WHERE idday='1';" );
								$p = "บ่าย";
							} else if ( $_POST[ 'date' ] == "date2" ) {
								$query = sprintf( "SELECT * FROM datescan WHERE idday='2';" );
								$p = "เช้า";
							} else if ( $_POST[ 'date' ] == "date22" ) {
								$query = sprintf( "SELECT * FROM datescan WHERE idday='2';" );
								$p = "บ่าย";
							} else if ( $_POST[ 'date' ] == "date3" ) {
								$query = sprintf( "SELECT * FROM datescan WHERE idday='3';" );
								$p = "เช้า";
							} else if ( $_POST[ 'date' ] == "date32" ) {
								$query = sprintf( "SELECT * FROM datescan WHERE idday='3';" );
								$p = "บ่าย";
							} else if ( $_POST[ 'date' ] == "date4" ) {
								$query = sprintf( "SELECT * FROM datescan WHERE idday='4';" );
								$p = "รอบที่ 1";
							} else if ( $_POST[ 'date' ] == "date42" ) {
								$query = sprintf( "SELECT * FROM datescan WHERE idday='4';" );
								$p = "รอบที่ 2";
							}

							$result = $conn->query( $query, $con );
							$row1 = $result->fetch_assoc();
							echo "วันที่" . " " . $row1[ "date" ] . " " . $row1[ "mont" ] . " " . $row1[ "year" ] ;
                            
                              if (isset($_SESSION['suser'])) { echo " ".$p; }

							?> )
						</center>
					</h3>
				</div>
				<div class="panel-body">
					<p>
					</p>
					<div align="center"></div>
					<div class="" align="center">
						<table class="table table-bordered table2excel">
							<thead>

								<tr class="info">
									<th rowspan="2" width="40%">
										<center>
											หลักสูตร
										</center>
									</th>
									<th rowspan="2">
										<center>
											บัณฑิต ทั้งหมด
										</center>
									</th>

									<th colspan="4">
										<center>
											บัณฑิตหญิง
										</center>
									</th>
									<th colspan="4">
										<center>
											บัณฑิตชาย
										</center>
									</th>
									<th rowspan="2">
										<center>
										  <strong>											รวมบัณฑิต (มา)
										  
										  
										  
										  
										  </strong>
										</center>
									</th>
									<th rowspan="2">
										<center>
										  <strong>											รวมบัณฑิต (ไม่มา)
										  
										  
										  
										  
										  </strong>
										</center>
									</th>
								</tr>
								<tr class="info">
									<th>
										<center>
											ก.1
										</center>
									</th>
									<th>
										<center>
											ก.2
										</center>
									</th>
									<th>
										<center>
											บัณฑิต
										</center>
									</th>
									<th>
										<center>
											รวม
										</center>
									</th>
									<th>
										<center>
											ก.1
										</center>
									</th>
									<th>
										<center>
											ก.2
										</center>
									</th>
									<th>
										<center>
											บัณฑิต
										</center>
									</th>
									<th>
										<center>
										  <strong>											รวม
										  </strong>
										</center>
									</th>

								</tr>

								<tr class="warning">
									<td>
										<div align="left">ดุษฎีบันฑิต</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total =$query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ดุษฎีบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">มหาบัณฑิต</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%มหาบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="info">
									<td>
										<div align="left"><strong>รวม บันฑิตมหาวิทยาลัย</strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>

									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%')  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and  sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
							            </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
			                            </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where (education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%') and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
			                            </strong></div>
									</td>
								</tr>
							</thead>
							<tbody>


								<tr class="warning">
									<td>
										<div align="left">ครุศาสตรบัณฑิต(ค.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">นิติศาสตรบัณฑิต(น.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query =$conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">รัฐประศาสนศาสตรบัณฑิต(รป.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query =$conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">รัฐศาสตรบัณฑิต(ร.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">ศิลปศาสตรบัณฑิต(ศศ.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">

											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">พยาบาลศาสตรบัณฑิต(พย.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">บริหารธุรกิจบัณฑิต(บธ.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">บัญชีบัณฑิต(บช.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%บัญชีบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">เศรษฐศาสตรบัณฑิต(ศ.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'  ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">วิทยาศาสตรบัณฑิต(วท.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="warning">
									<td>
										<div align="left">นิเทศศาสตรบัณฑิต(นศ.บ.)</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'   ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>

									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'   and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'  and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
		                               </div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'   and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'   and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>
								<tr class="info">
									<td>
										<div align="left"><strong>รวมปริญญาตรี</strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where  education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%' ;", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%'  and degree = 1 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query =$conn->query( "select * from scan2557 where education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%'  and degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total =$query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%'  and degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where  education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%' and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%'  and degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%'  and degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
									    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%' and degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
                                        </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%' and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
										</div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where  education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%' and ch" . $_POST[ 'date' ] . " !='';", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
									<td>
										<div align="left">
											<strong>
											<?php
											$query = $conn->query( "select * from scan2557 where  education not like '%ดุษฎีบัณฑิต%' and  education not like '%มหาบัณฑิต%' and ch" . $_POST[ 'date' ] . " ='';", $con );
											$total =$query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
					                    </strong></div>
									</td>
								</tr>

								<tr class="danger text-lg">
									<td class="">
										<div align="left "><strong>รวมบัณฑิตทั้งหมด
										</strong></div>
									</td>
									<td>
										<div align="left">
											
										  <strong>
										  <?php
											$query = $conn->query( "select * from scan2557 ", $con );
											$total = $query->num_rows;
											if ( $total != 0 )echo $total;
											else echo "-";
											?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where  degree = 1 and sex = 'f' and ch" . $date . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where degree = 2 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where degree = 9 and sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where   sex = 'f' and ch" . $_POST[ 'date' ] . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where degree = 1 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where degree = 2 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where degree = 9 and sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
                                        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where  sex = 'm' and ch" . $_POST[ 'date' ] . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
								        </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query = $conn->query( "select * from scan2557 where   ch" . $_POST[ 'date' ] . " !='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
			                            </strong></div>
									</td>
									<td>
										<div align="left">
											
											<strong>
											<?php
												$query =$conn->query( "select * from scan2557 where   ch" . $_POST[ 'date' ] . " ='';", $con );
												$total = $query->num_rows;
												if ( $total != 0 )echo $total;
												else echo "-";
												?>
			                            </strong></div>
									</td>
								</tr>


							</tbody>
						</table>

						
					</div>
					<p>&nbsp;</p>
					<p align="center">
						<input name="print" class="noPrint btn btn-success btn-md" type="button" value="Print" onClick="window.print()">
						<input name="printt" class="noPrint btn btn-success btn-md" type="button" value="Excel" onClick="printt()">
					</p>
				</div>
			</div>
                     <center> Copyright © by สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี 2017</center>
        </div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="dist/js/bootstrap.min.js"></script>

    </div>
             
        </div>
      
    </div>
</body>
</html>




<?php
include( '../sphp/cconn.php' );
?>