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
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร</title>
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
                         <a href="reportp1.php">ระบบรายงานผลบัณฑิต(ลา) แบ่งตามปริญญา</a>
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
                  <div class="panel-heading">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ระบบรายงานผลบัณฑิต(ลา) แบ่งตามปริญญา</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center><h3><span class="label label-info">ระบบรายงานผลบัณฑิต(ลา) แบ่งตามปริญญา</span></h3></center>
					<br/>
						<table class="table table-bordered table2excel">
							<thead>
							  <tr class="">
								<th rowspan="2"><center>ชื่อวุฒิ</center></th>
								<th colspan="5"><center>ระบบรายงานผลบัณฑิต(ลา) แบ่งตามปริญญา</center></th>
								
							  </tr>
							  <tr class="">
								<th><center>วันที่ <?php $query=sprintf("SELECT * FROM datescan WHERE idday='1';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]; ?></center></th>
								<th><center>วันที่ <?php $query=sprintf("SELECT * FROM datescan WHERE idday='2';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"];; ?></center></th>		

								<th><center>วันที่ <?php $query=sprintf("SELECT * FROM datescan WHERE idday='3';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"];; ?></center></th>
								<th><center>วันที่ <?php $query=sprintf("SELECT * FROM datescan WHERE idday='4';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"];; ?></center></th>
								<th><center></center></th>
							  </tr>
							</thead>
							<tbody>

								<?php
								
										
										//ศิลปศาสตรบัณฑิต(ศศ.บ.)
										$query1 = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total1 = $query1->num_rows;
										
										$query11 = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total11 = $query11->num_rows;
										
										$query111 = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total111 = $query111->num_rows;
										
										$query1111 = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total1111 = $query1111->num_rows;
										
										//ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)
										$query2 = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total2 = $query2->num_rows;
										
										$query22 = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total22 = $query22->num_rows;
										
										$query222 = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total222 = $query222->num_rows;
										
										$query2222 = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total2222 = $query2222->num_rows;
										
										//ครุศาสตรบัณฑิต(ค.บ.)
										$query3 = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total3 = $query3->num_rows;
										
										$query33 = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total33 = $query33->num_rows;
										
										$query333 = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total333 = $query333->num_rows;
										
										$query3333 = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total3333 = $query3333->num_rows;
										
										//วิทยาศาสตรบัณฑิต(วท.บ.)
										$query4 = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total4 = $query4->num_rows;
										
										$query44 = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total44 = $query44->num_rows;
										
										$query444 = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total444 = $query444->num_rows;
										
										$query4444 = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total4444 = $query4444->num_rows;
										
										//นิติศาสตรบัณฑิต(น.บ.)
										$query5 = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total5 = $query5->num_rows;
										
										$query55 = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total55 = $query55->num_rows;
										
										$query555 = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total555 = $query555->num_rows;
										
										$query5555 = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total5555 = $query5555->num_rows;
										
										//รัฐประศาสนศาสตรบัณฑิต(รป.บ.)
										$query6 = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total6 = $query6->num_rows;
										
										$query66 = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total66 = $query66->num_rows;
										
										$query666 = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total666 = $query666->num_rows;
										
										$query6666 = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total6666 = $query6666->num_rows;
										
										//บริหารธุรกิจบัณฑิต(บธ.บ.)
										$query7 = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total7 = $query7->num_rows;
										
										$query77 = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total77 = $query77->num_rows;
										
										$query777 = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total777 = $query777->num_rows;
										
										$query7777 = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total7777 = $query7777->num_rows;

										//บัญชีบัณฑิต(บช.บ.)
										$query8 = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total8 = $query8->num_rows;
										
										$query88 = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total88 = $query88->num_rows;
										
										$query888 = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total888 = $query888->num_rows;
										
										$query8888 = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total8888 = $query8888->num_rows;

										//พยาบาลศาสตรบัณฑิต(พย.บ.)
										$query9 = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total9 = $query9->num_rows;
										
										$query99 = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total99 = $query99->num_rows;
										
										$query999 = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total999 = $query999->num_rows;
										
										$query9999 = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total9999 = $query9999->num_rows;
										
										// นิเทศ
										$query10 = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$total10 = $query10->num_rows;
										
										$query100 = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$total100 = $query100->num_rows;
										
										$query1000 = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$total1000 = $query1000->num_rows;
										
										$query10000 = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$total10000 = $query10000->num_rows;
										// จบ

										// รัฐศาสตร์
										$queryrat = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$totalrat = $queryrat->num_rows;
										
										$queryrat1 = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$totalrat1 = $queryrat1->num_rows;
										
										$queryrat2 = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$totalrat2 = $queryrat2->num_rows;
										
										$queryrat3 = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$totalrat3 = $queryrat3->num_rows;
										// จบ

										// เศรษฐศาสตร์
										$queryses = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (chdate1 like '%ลา%' or chdate12 like '%ลา%') and type123='1';");
										$totalses = $queryses->num_rows;
										
										$queryses1 = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (chdate2 like '%ลา%' or chdate22 like '%ลา%') and type123='1';");
										$totalses1 = $queryses1->num_rows;
										
										$queryses2 = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (chdate3 like '%ลา%' or chdate32 like '%ลา%') and type123='1';");
										$totalses2 = $queryses2->num_rows;
										
										$queryses3 = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (chdate4 like '%ลา%' or chdate42 like '%ลา%') and type123='1';");
										$totalses3 = $queryses3->num_rows;
										// จบ
										
										?>
										<!-- 222222222222222222222222222222 วิทย์-->
										<tr class="warning">
										  <td>วิทยาศาสตรบัณฑิต(วท.บ.)</td>
										  <td><?php echo $total4;?></td>
										  <td><?php echo $total44;?></td>
										  <td><?php echo $total444;?></td>
										  <td><?php echo $total4444;?></td>
										   <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										</tr>
										<!-- End 2222222222222222222222 End -->

                                          <!-- 1010101010101010 นิเทศ -->
                                          <tr class="warning">
											<td>นิเทศศาสตรบัณฑิต</td>
											<td><?php echo $total10;?> </td>
											<td><?php echo $total100;?></td>
											<td><?php echo $total1000;?></td>
											<td><?php echo $total10000;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 1010101010101010 End -->

										
										  <!-- 444444444444444444444444444444 รัฐประ-->
										  <tr class="warning">
											<td>รัฐประศาสนศาสตรบัณฑิต(รป.บ.)</td>
											<td><?php echo $total6;?></td>
											<td><?php echo $total66;?></td>
											<td><?php echo $total666;?></td>
											<td><?php echo $total6666;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 4444444444444444444444 End -->
										  <!-- rat รัฐประ-->
										  <tr class="warning">
											<td>รัฐศาสตรบัณฑิต(รศ.บ.)</td>
											<td><?php echo $totalrat;?></td>
											<td><?php echo $totalrat1;?></td>
											<td><?php echo $totalrat2;?></td>
											<td><?php echo $totalrat3;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End rat End -->


										  <!-- 555555555555555555555555555555 ศิลป์ปกรรรม-->
										  <tr class="warning">
											<td>ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)</td>
											<td><?php echo $total2;?></td>
											<td><?php echo $total22;?></td>
											<td><?php echo $total222;?></td>
											<td><?php echo $total2222;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 5555555555555555555555 End -->

										  <!-- 999999999999999999999999999999 บริหาร-->
										  <tr class="warning">
											<td>บริหารธุรกิจบัณฑิต(บธ.บ.)</td>
											<td><?php echo $total7;?></td>
											<td><?php echo $total77;?></td>
											<td><?php echo $total777;?></td>
											<td><?php echo $total7777;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- ป.โท ป.เอก -->
										  <!--  -->

										  <!-- 111111111111111111111111111111 ครุศาสตร์-->
										  <tr class="warning">
											<td>ครุศาสตรบัณฑิต(ค.บ.)</td>
											<td><?php echo $total3;?></td>
											<td><?php echo $total33;?></td>
											<td><?php echo $total333;?></td>
											<td><?php echo $total3333;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 1111111111111111111111 End -->

										  <!-- 333333333333333333333333333333 นิติ-->
										  <tr class="warning">
											<td>นิติศาสตรบัณฑิต(น.บ.)</td>
											<td><?php echo $total5;?></td>
											<td><?php echo $total55;?></td>
											<td><?php echo $total555;?></td>
											<td><?php echo $total5555;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 3333333333333333333333 End -->

										  <!-- 777777777777777777777777777777 บัญชี-->
										  <tr class="warning">
											<td>บัญชีบัณฑิต(บช.บ.)</td>
											<td><?php echo $total8;?></td>
											<td><?php echo $total88;?></td>
											<td><?php echo $total888;?></td>
											<td><?php echo $total8888;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 7777777777777777777777 End -->

										  <!-- ses เศรษศาสตร์-->
										  <tr class="warning">
											<td>เศรษฐศาสตรบัณฑิต(ศ.บ.)</td>
											<td><?php echo $totalses;?></td>
											<td><?php echo $totalses1;?></td>
											<td><?php echo $totalses2;?></td>
											<td><?php echo $totalses3;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End ses End -->

										  <!-- 666666666666666666666666666666 ศิลป์ศาสตร์-->
										  <tr class="warning">
											<td>ศิลปศาสตรบัณฑิต(ศศ.บ.)</td>
											<td><?php echo $total1;?></td>
											<td><?php echo $total11;?></td>
											<td><?php echo $total111;?></td>
											<td><?php echo $total1111;?></td>
											<td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 6666666666666666666666 End -->

										  <!-- 888888888888888888888888888888 พยาบาล-->
										  <tr class="warning">
											<td>พยาบาลศาสตรบัณฑิต(พย.บ.)</td>
											<td><?php echo $total9;?></td>
											<td><?php echo $total99;?></td>
											<td><?php echo $total999;?></td>
											<td><?php echo $total9999;?></td>
											 <td><center><a class="noPrint" href="#"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 8888888888888888888888 End -->

										   <tr class="danger">
											<td>รวม</td>
											<td><?php echo ($total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9+$total10+$totalrat);?></td>
											<td><?php echo ($total11+$total22+$total33+$total44+$total55+$total66+$total77+$total88+$total99+$total100+$totalrat1);?></td>
											<td><?php echo ($total111+$total222+$total333+$total444+$total555+$total666+$total777+$total888+$total999+$total1000+$totalrat2);?></td>
											<td><?php echo ($total1111+$total2222+$total3333+$total4444+$total5555+$total6666+$total7777+$total8888+$total9999+$total10000+$totalrat3);?></td>
											<td></td>
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