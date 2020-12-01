<?php
include('../sphp/conn.php');
	session_start();
	if(!isset($_SESSION['suser']))
	{
?>		
		<meta http-equiv="refresh" content="0;url=../fail-login.php">
<?php
	}
	else
	{
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
  .noPrint{ display: none; }
  .yesPrint{ display: block !important; }
	</style>
  <div class="container">
        <div class="row noPrint">
        <center><img src="../head.png"></center>
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
                         <a href="reportp1.php">รายงานการบันทึกข้อมูล</a>
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
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;รายงานการบันทึกข้อมูล</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center><h3><span class="label label-info">รายงานการบันทึกข้อมูล แบ่งตามปริญญา</span></h3></center>
					<br/>
						<table class="table table-bordered table2excel">
							<thead>
							  <tr class="">
								<th rowspan="2"><center>ชื่อปริญญา</center></th>
								<th colspan="5"><center>รายงานการบันทึกข้อมูล แบ่งตามปริญญา</center></th>
								
							  </tr>
							  <tr class="">
								<th><center>จำนวนรายชื่อที่ยังไม่ได้บันทึก</center></th>
								<th><center>จำนวนรายชื่อบันทึกแล้ว</center></th>
								<th><center></center></th>
							  </tr>
							</thead>
							<tbody>

								<?php
								
										require_once("../sphp/connect.php");
										//ศิลปศาสตรบัณฑิต(ศศ.บ.)
										$query1 = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$total1 = $query1->num_rows;

										$query11 = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$total11 = $query11->num_rows;
										
										//ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)
										$query2 = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$total2 = $query2->num_rows;

										$query22 = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$total22 = $query22->num_rows;
										
										//ครุศาสตรบัณฑิต(ค.บ.)
										$query3 = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$total3 = $query3->num_rows;

										$query33 = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%' and savejob like '%1%' and type123='1;'");
										$total33 = $query33->num_rows;
										
										//วิทยาศาสตรบัณฑิต(วท.บ.)
										$query4 = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and savejob like '%2%' and type123='1'");
										$total4 = $query4->num_rows;

										$query44 = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$total44 = $query44->num_rows;
										
										//นิติศาสตรบัณฑิต(น.บ.)
										$query5 = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$total5 = $query5->num_rows;

										$query55 = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$total55 = $query55->num_rows;
										
										//รัฐประศาสนศาสตรบัณฑิต(รป.บ.)
										$query6 = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$total6 = $query6->num_rows;
										
										$query66 = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$total66 = $query66->num_rows;

										//บริหารธุรกิจบัณฑิต(บธ.บ.)
										$query7 = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and savejob like '%2%' and type123='1';");
										$total7 = $query7->num_rows;

										$query77 = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and savejob like '%1%' and type123='1';");
										$total77 = $query77->num_rows;

										//บัญชีบัณฑิต(บช.บ.)
										$query8 = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and savejob like '%2%' and type123='1';");
										$total8 = $query8->num_rows;

										$query88 = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and savejob like '%1%' and type123='1';");
										$total88 = $query88->num_rows;

										//พยาบาลศาสตรบัณฑิต(พย.บ.)
										$query9 = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$total9 = $query9->num_rows;

										$query99 = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$total99 = $query99->num_rows;

										//นิเทศ()
										$querynitas = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$totalnitas = $querynitas->num_rows;

										$querynitas1 = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$totalnitas1 = $querynitas1->num_rows;

										//รัฐศาสตร์(รศ.บ)
										$queryrat = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$totalrat = $queryrat->num_rows;

										$queryrat1 = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$totalrat1 = $queryrat1->num_rows;

										//เศรษศาสตร์()
										$queryses = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and savejob like '%2%' and type123='1';");
										$totalses = $queryses->num_rows;

										$queryses1 = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and savejob like '%1%' and type123='1';");
										$totalses1 = $queryses1->num_rows;
										
								?>
										  <!-- 222222222222222222222222222222 -->
										  <tr class="warning">
											<td>วิทยาศาสตรบัณฑิต(วท.บ.)</td>
											<td><?php echo $total4;?></td>
											<td><?php echo $total44;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 2222222222222222222222 End -->

										<!-- nitas นิเทศ-->
										<tr class="warning">
											<td>นิเทศศาสตรบัณฑิต(นศ.บ.)</td>
											<td><?php echo $totalnitas;?></td>
											<td><?php echo $totalnitas1;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End nitas End -->

										  <!-- 444444444444444444444444444444 -->
										  <tr class="warning">
											<td>รัฐประศาสนศาสตรบัณฑิต(รป.บ.)</td>
											<td><?php echo $total6;?></td>
											<td><?php echo $total66;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 4444444444444444444444 End -->

										<!-- 444444444444444444444444444444 -->
										<tr class="warning">
											<td>รัฐศาสตรบัณฑิต(รศ.บ.)</td>
											<td><?php echo $totalrat;?></td>
											<td><?php echo $totalrat1;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 4444444444444444444444 End -->

										  <!-- 555555555555555555555555555555 -->
										  <tr class="warning">
											<td>ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)</td>
											<td><?php echo $total2;?></td>
											<td><?php echo $total22;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 5555555555555555555555 End -->

										  <!-- 999999999999999999999999999999 -->
										  <tr class="warning">
											<td>บริหารธุรกิจบัณฑิต(บธ.บ.)</td>
											<td><?php echo $total7;?></td>
											<td><?php echo $total77;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 9999999999999999999999 End -->

										  <!-- 111111111111111111111111111111 -->
										  <tr class="warning">
											<td>ครุศาสตรบัณฑิต(ค.บ.)</td>
											<td><?php echo $total3;?></td>
											<td><?php echo $total33;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 1111111111111111111111 End -->

										  <!-- 333333333333333333333333333333 -->
										  <tr class="warning">
											<td>นิติศาสตรบัณฑิต(น.บ.)</td>
											<td><?php echo $total5;?></td>
											<td><?php echo $total55;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 3333333333333333333333 End -->

										  <!-- 777777777777777777777777777777 -->
											<tr class="warning">
											<td>บัญชีบัณฑิต(บช.บ.)</td>
											<td><?php echo $total8;?></td>
											<td><?php echo $total88;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 7777777777777777777777 End -->

										  <!-- 777777777777777777777777777777 -->
											<tr class="warning">
											<td>เศรษฐศาสตรบัณฑิต(..)</td>
											<td><?php echo $totalses;?></td>
											<td><?php echo $totalses1;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 7777777777777777777777 End -->

										  <!-- 666666666666666666666666666666 -->
										  <tr class="warning">
											<td>ศิลปศาสตรบัณฑิต(ศศ.บ.)</td>
											<td><?php echo $total1;?></td>
											<td><?php echo $total11;?></td>
											<td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 6666666666666666666666 End -->

										  <!-- 888888888888888888888888888888 -->
										  <tr class="warning">
											<td>พยาบาลศาสตรบัณฑิต(พย.บ.)</td>
											<td><?php echo $total9;?></td>
											<td><?php echo $total99;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 8888888888888888888888 End -->

										   <tr class="danger">
											<td>รวม</td>
											<td><?php echo ($total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9+$totalnitas+$totalrat+$totalses);?></td>
											<td><?php echo ($total11+$total22+$total33+$total44+$total55+$total66+$total77+$total88+$total99+$totalnitas1+$totalrat1+$totalses1);?></td>
										  </tr>
										</tbody>
								<?php
								include('../sphp/cconn.php');
								?>
						</table>
						 <p align="center">
            <input name="print" class="noPrint btn btn-success btn-md" type="button" value ="Print" onClick="window.print()">
            <input name="printt" class="noPrint btn btn-success btn-md" type="button" value ="Excel" onClick="printt()">
           
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