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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
                         <a href="reportp1.php">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามวุฒิ</a>
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
                              <a href="../menu_2-0.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามวุฒิ</a>
                            </li>
                            <li>
                                <a href="../menu_3-0.php">
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
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามวุฒิ</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center><h3><span class="label label-warning">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามวุฒิ</span></h3></center>
					<br/>
						<table class="table table-bordered">
							<thead>
							  <tr class="">
								<th rowspan="1"><center>รายงานตามวุฒิ</center></th>
								<th colspan="1"><center>จำนวนเต็ม</center></th>
								<th rowspan="1"><center>บัณฑิต</center></th>
								<th rowspan="1"><center>มีครรภ์</center></th>
								<th rowspan="1"><center>พิเศษ</center></th>
								<th rowspan="1"><center>ไม่มา</center></th>
								<th rowspan="1"><center>รวมผู้เข้าซ้อม</center></th>
								
							  </tr>
							  <!--<tr class="">
								<th><center>ตั้งครรภ์</center></th>
								<th><center>ร่างกายไม่สมบูรณ์</center></th>
								<th><center>รวม</center></th>
							  </tr>-->
							</thead>
							<tbody>

								<?php
								include('../sphp/conn.php');
										//ปริญญาโท
										$query1=mysql_query("select * from scan2557 where level like'%ปริญญาโท%';",$con);
										$total1=mysql_num_rows($query1);

										$query2 = mysql_query("select * from scan2557 where level like'%ปริญญาโท%' and status ='1' and chdate31!='';",$con);
										$total2 = mysql_num_rows($query2);

										$query3 = mysql_query("select * from scan2557 where level like'%ปริญญาโท%' and status ='2' and chdate31!='';",$con);
										$total3 = mysql_num_rows($query3);

										$query4 = mysql_query("select * from scan2557 where level like'%ปริญญาโท%' and status ='3' and chdate31!='';",$con);
										$total4 = mysql_num_rows($query4);

										$query5 = mysql_query("select * from scan2557 where level like'%ปริญญาโท%' and chdate31='';",$con);
										$total5 = mysql_num_rows($query5);

										$query6 = mysql_query("select * from scan2557 where level like'%ปริญญาโท%' and chdate31!='';",$con);
										$total6 = mysql_num_rows($query6);

										//ครุมหา										
										$query7=mysql_query("select * from scan2557 where education like'%ครุศาสตรมหาบัณฑิต%';",$con);
										$total7=mysql_num_rows($query7);

										$query8 = mysql_query("select * from scan2557 where education like'%ครุศาสตรมหาบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total8 = mysql_num_rows($query8);

										$query9 = mysql_query("select * from scan2557 where education like'%ครุศาสตรมหาบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total9 = mysql_num_rows($query9);

										$query10 = mysql_query("select * from scan2557 where education like'%ครุศาสตรมหาบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total10 = mysql_num_rows($query10);

										$query11 = mysql_query("select * from scan2557 where education like'%ครุศาสตรมหาบัณฑิต%' and chdate31='';",$con);
										$total11 = mysql_num_rows($query11);

										$query12 = mysql_query("select * from scan2557 where education like'%ครุศาสตรมหาบัณฑิต%' and chdate31!='';",$con);
										$total12 = mysql_num_rows($query12);

										//บริหารมหา
										$query13=mysql_query("select * from scan2557 where education like'%บริหารธุรกิจมหาบัณฑิต%';",$con);
										$total13=mysql_num_rows($query13);

										$query14= mysql_query("select * from scan2557 where education like'%บริหารธุรกิจมหาบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total14= mysql_num_rows($query14);

										$query15= mysql_query("select * from scan2557 where education like'%บริหารธุรกิจมหาบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total15= mysql_num_rows($query15);

										$query16= mysql_query("select * from scan2557 where education like'%บริหารธุรกิจมหาบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total16= mysql_num_rows($query16);

										$query17= mysql_query("select * from scan2557 where education like'%บริหารธุรกิจมหาบัณฑิต%' and chdate31='';",$con);
										$total17= mysql_num_rows($query17);

										$query18= mysql_query("select * from scan2557 where education like'%บริหารธุรกิจมหาบัณฑิต%' and chdate31!='';",$con);
										$total18= mysql_num_rows($query18);
										
										//รัฐมหา
										$query19=mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรมหาบัณฑิต%';",$con);
										$total19=mysql_num_rows($query19);

										$query20= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรมหาบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total20= mysql_num_rows($query20);

										$query21= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรมหาบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total21= mysql_num_rows($query21);

										$query22= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรมหาบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total22= mysql_num_rows($query22);

										$query23= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรมหาบัณฑิต%' and chdate31='';",$con);
										$total23= mysql_num_rows($query23);

										$query24= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรมหาบัณฑิต%' and chdate31!='';",$con);
										$total24= mysql_num_rows($query24);

										//ศิลปศาสตรมหาบัณฑิต
										$query25=mysql_query("select * from scan2557 where education like'%ศิลปศาสตรมหาบัณฑิต%';",$con);
										$total25=mysql_num_rows($query25);

										$query26= mysql_query("select * from scan2557 where education like'%ศิลปศาสตรมหาบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total26= mysql_num_rows($query26);

										$query27= mysql_query("select * from scan2557 where education like'%ศิลปศาสตรมหาบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total27= mysql_num_rows($query27);

										$query28= mysql_query("select * from scan2557 where education like'%ศิลปศาสตรมหาบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total28= mysql_num_rows($query28);

										$query29= mysql_query("select * from scan2557 where education like'%ศิลปศาสตรมหาบัณฑิต%' and chdate31='';",$con);
										$total29= mysql_num_rows($query29);

										$query30= mysql_query("select * from scan2557 where education like'%ศิลปศาสตรมหาบัณฑิต%' and chdate31!='';",$con);
										$total30= mysql_num_rows($query30);

										//สาธารณสุขมหาบัณฑิต
										$query31=mysql_query("select * from scan2557 where education like'%สาธารณสุขมหาบัณฑิต%';",$con);
										$total31=mysql_num_rows($query31);

										$query32= mysql_query("select * from scan2557 where education like'%สาธารณสุขมหาบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total32= mysql_num_rows($query32);

										$query33= mysql_query("select * from scan2557 where education like'%สาธารณสุขมหาบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total33= mysql_num_rows($query33);

										$query34= mysql_query("select * from scan2557 where education like'%สาธารณสุขมหาบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total34= mysql_num_rows($query34);

										$query35= mysql_query("select * from scan2557 where education like'%สาธารณสุขมหาบัณฑิต%' and chdate31='';",$con);
										$total35= mysql_num_rows($query35);

										$query36= mysql_query("select * from scan2557 where education like'%สาธารณสุขมหาบัณฑิต%' and chdate31!='';",$con);
										$total36= mysql_num_rows($query36);

										//ครุศาสตรบัณฑิต
										$query37=mysql_query("select * from scan2557 where education like'%ครุศาสตรบัณฑิต%';",$con);
										$total37=mysql_num_rows($query37);

										$query38= mysql_query("select * from scan2557 where education like'%ครุศาสตรบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total38= mysql_num_rows($query38);

										$query39= mysql_query("select * from scan2557 where education like'%ครุศาสตรบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total39= mysql_num_rows($query39);

										$query40= mysql_query("select * from scan2557 where education like'%ครุศาสตรบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total40= mysql_num_rows($query40);

										$query41= mysql_query("select * from scan2557 where education like'%ครุศาสตรบัณฑิต%' and chdate31='';",$con);
										$total41= mysql_num_rows($query41);

										$query42= mysql_query("select * from scan2557 where education like'%ครุศาสตรบัณฑิต%' and chdate31!='';",$con);
										$total42= mysql_num_rows($query42);

										//วิทยาศาสตรบัณฑิต
										$query43=mysql_query("select * from scan2557 where education like'%วิทยาศาสตรบัณฑิต%';",$con);
										$total43=mysql_num_rows($query43);

										$query44= mysql_query("select * from scan2557 where education like'%วิทยาศาสตรบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total44= mysql_num_rows($query44);

										$query45= mysql_query("select * from scan2557 where education like'%วิทยาศาสตรบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total45= mysql_num_rows($query45);

										$query46= mysql_query("select * from scan2557 where education like'%วิทยาศาสตรบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total46= mysql_num_rows($query46);

										$query47= mysql_query("select * from scan2557 where education like'%วิทยาศาสตรบัณฑิต%' and chdate31='';",$con);
										$total47= mysql_num_rows($query47);

										$query48= mysql_query("select * from scan2557 where education like'%วิทยาศาสตรบัณฑิต%' and chdate31!='';",$con);
										$total48= mysql_num_rows($query48);

										//นิติศาสตรบัณฑิต
										$query49=mysql_query("select * from scan2557 where education like'%นิติศาสตรบัณฑิต%';",$con);
										$total49=mysql_num_rows($query49);

										$query50= mysql_query("select * from scan2557 where education like'%นิติศาสตรบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total50= mysql_num_rows($query50);

										$query51= mysql_query("select * from scan2557 where education like'%นิติศาสตรบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total51= mysql_num_rows($query51);

										$query52= mysql_query("select * from scan2557 where education like'%นิติศาสตรบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total52= mysql_num_rows($query52);

										$query53= mysql_query("select * from scan2557 where education like'%นิติศาสตรบัณฑิต%' and chdate31='';",$con);
										$total53= mysql_num_rows($query53);

										$query54= mysql_query("select * from scan2557 where education like'%นิติศาสตรบัณฑิต%' and chdate31!='';",$con);
										$total54= mysql_num_rows($query54);

										//รัฐประศาสนศาสตรบัณฑิต
										$query55=mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรบัณฑิต%';",$con);
										$total55=mysql_num_rows($query55);

										$query56= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรบัณฑิต%' and status ='1' and chdate31!='';",$con);
										$total56= mysql_num_rows($query56);

										$query57= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรบัณฑิต%' and status ='2' and chdate31!='';",$con);
										$total57= mysql_num_rows($query57);

										$query58= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรบัณฑิต%' and status ='3' and chdate31!='';",$con);
										$total58= mysql_num_rows($query58);

										$query59= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรบัณฑิต%' and chdate31='';",$con);
										$total59= mysql_num_rows($query59);

										$query60= mysql_query("select * from scan2557 where education like'%รัฐประศาสนศาสตรบัณฑิต%' and chdate31!='';",$con);
										$total60= mysql_num_rows($query60);




								?>
										
										  <tr class="warning">
											<td>ครุศาสตรมหาบัณฑิต</td>
											<td><?php echo $total7;?></td>
											<td><?php echo $total8;?></td>
											<td><?php echo $total9;?></td>
											<td><?php echo $total10;?></td>
											<td><?php echo $total11;?></td>
											<td><?php echo $total12;?></td>
											
										  </tr>
										  <tr class="warning">
											<td>บริหารธุรกิจมหาบัณฑิต</td>
											<td><?php echo $total13;?></td>
											<td><?php echo $total14;?></td>
											<td><?php echo $total15;?></td>
											<td><?php echo $total16;?></td>
											<td><?php echo $total17;?></td>
											<td><?php echo $total18;?></td>
											
										  </tr>
										  <tr class="warning">
											<td>รัฐประศาสนศาสตรมหาบัณฑิต</td>
											<td><?php echo $total19;?></td>
											<td><?php echo $total20;?></td>
											<td><?php echo $total21;?></td>
											<td><?php echo $total22;?></td>
											<td><?php echo $total23;?></td>
											<td><?php echo $total24;?></td>
											
										  </tr>
										  <tr class="warning">
											<td>ศิลปศาสตรมหาบัณฑิต</td>
											<td><?php echo $total25;?></td>
											<td><?php echo $total26;?></td>
											<td><?php echo $total27;?></td>
											<td><?php echo $total28;?></td>
											<td><?php echo $total29;?></td>
											<td><?php echo $total30;?></td>
											
										  </tr>
										  <tr class="warning">
											<td>สาธารณสุขมหาบัณฑิต</td>
											<td><?php echo $total31;?></td>
											<td><?php echo $total32;?></td>
											<td><?php echo $total33;?></td>
											<td><?php echo $total34;?></td>
											<td><?php echo $total35;?></td>
											<td><?php echo $total36;?></td>
											
										  </tr>
										  
										  <tr class="warning">
											<td>ปริญญาโท</td>
											<td><?php echo $total1;?></td>
											<td><?php echo $total2;?></td>
											<td><?php echo $total3;?></td>
											<td><?php echo $total4;?></td>
											<td><?php echo $total5;?></td>
											<td><?php echo $total6;?></td>
										  </tr>
										  <tr class="warning">
											<td>ครุศาสตรบัณฑิต</td>
											<td><?php echo $total37;?></td>
											<td><?php echo $total38;?></td>
											<td><?php echo $total39;?></td>
											<td><?php echo $total40;?></td>
											<td><?php echo $total41;?></td>
											<td><?php echo $total42;?></td>
										  </tr>
										  <tr class="warning">
											<td>วิทยาศาสตรบัณฑิต</td>
											<td><?php echo $total43;?></td>
											<td><?php echo $total44;?></td>
											<td><?php echo $total45;?></td>
											<td><?php echo $total46;?></td>
											<td><?php echo $total47;?></td>
											<td><?php echo $total48;?></td>
										  </tr>
										  <tr class="warning">
											<td>นิติศาสตรบัณฑิต</td>
											<td><?php echo $total49;?></td>
											<td><?php echo $total50;?></td>
											<td><?php echo $total51;?></td>
											<td><?php echo $total52;?></td>
											<td><?php echo $total53;?></td>
											<td><?php echo $total54;?></td>
											
										  </tr>
										  <tr class="warning">
											<td>รัฐประศาสนศาสตรบัณฑิต</td>
											<td><?php echo $total55;?></td>
											<td><?php echo $total56;?></td>
											<td><?php echo $total57;?></td>
											<td><?php echo $total58;?></td>
											<td><?php echo $total59;?></td>
											<td><?php echo $total60;?></td>
											
										  </tr>
										  


										  <!-- 222222222222222222222222222222 -->
										  <tr class="warning">
											<td>วิทยาศาสตรบัณฑิต(วท.บ.)</td>
											<td><?php //echo $total4;?></td>
											<td><?php //echo $total44;?></td>
											<td><?php //echo ($total4+$total44);?></td>
											 <td><center><a href="/scan/configmenu/report1-1.php?status=2"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 2222222222222222222222 End -->


										  <!-- 333333333333333333333333333333 -->
										  <tr class="warning">
											<td>นิติศาสตรบัณฑิต(น.บ.)</td>
											<td><?php //echo $total5;?></td>
											<td><?php //echo $total55;?></td>
											<td><?php //echo ($total5+$total55);?></td>
											<td><center><a href="/scan/configmenu/report1-1.php?status=3"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 3333333333333333333333 End -->


										  <!-- 444444444444444444444444444444 -->
										  <tr class="warning">
											<td>รัฐประศาสนศาสตรบัณฑิต(รป.บ.)</td>
											<td><?php //echo $total6;?></td>
											<td><?php //echo $total66;?></td>
											<td><?php //echo ($total6+$total66);?></td>
											 <td><center><a href="/scan/configmenu/report1-1.php?status=4"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 4444444444444444444444 End -->


										  <!-- 555555555555555555555555555555 -->
										  <tr class="warning">
											<td>ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)</td>
											<td><?php //echo $total2;?></td>
											<td><?php //echo $total22;?></td>
											<td><?php //echo ($total2+$total22);?></td>
											<td><center><a href="/scan/configmenu/report1-1.php?status=5"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 5555555555555555555555 End -->


										  <!-- 666666666666666666666666666666 -->
										  <tr class="warning">
											<td>ศิลปศาสตรบัณฑิต(ศศ.บ.)</td>
											<td><?php //echo $total1;?></td>
											<td><?php //echo $total11;?></td>
											<td><?php //echo ($total1+$total11);?></td>
											<td><center><a href="/scan/configmenu/report1-1.php?status=6"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 6666666666666666666666 End -->


										  <!-- 777777777777777777777777777777 -->
										  <tr class="warning">
											<td>บัญชีบัณฑิต(บช.บ.)</td>
											<td><?php //echo $total8;?></td>
											<td><?php //echo $total88;?></td>
											<td><?php //echo ($total8+$total88);?></td>
											 <td><center><a href="/scan/configmenu/report1-1.php?status=7"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 7777777777777777777777 End -->


										  <!-- 888888888888888888888888888888 -->
										  <tr class="warning">
											<td>พยาบาลศาสตรบัณฑิต(พย.บ.)</td>
											<td><?php //echo $total9;?></td>
											<td><?php //echo $total99;?></td>
											<td><?php //echo ($total9+$total99);?></td>
											<td><center><a href="/scan/configmenu/report1-1.php?status=8"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 8888888888888888888888 End -->


										  <!-- 999999999999999999999999999999 -->
										  <tr class="warning">
											<td>บริหารธุรกิจบัณฑิต(บธ.บ.)</td>
											
											<td>
											</td>
											<td><?php //echo $total77;?></td>
											<td><?php //echo ($total7+$total77);?></td>
											 <td><center><a href="/scan/configmenu/report1-1.php?status=9"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <!-- End 9999999999999999999999 End -->

										   <tr class="danger">
											<td>รวม</td>
											<td><?php //echo ($total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9);?></td>
											<td><?php //echo ($total11+$total22+$total33+$total44+$total55+$total66+$total77+$total88+$total99);?></td>
											<td><?php //echo ($total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9)+($total11+$total22+$total33+$total44+$total55+$total66+$total77+$total88+$total99);?></td>
											 <td></td>
										  </tr>
										</tbody>
								<?php
								include('../sphp/cconn.php');
								?>
						</table>
						<input class="noPrint btn btn-success btn-md" type="button" value ="Print" onClick="window.print()">
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