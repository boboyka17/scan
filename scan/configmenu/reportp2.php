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
                         <a href="reportp2.php">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามคณะ</a>
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

      
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading noPrint">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามคณะ</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center><h3><span class="label label-danger">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามคณะ</span></h3></center>
					<br/>
					<table class="table table-bordered table2excel">
						<thead>
							<tr class="">
							<th rowspan="2"><center>คณะ</center></th>
							<th colspan="3"><center>ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามคณะ</center></th>
							<th rowspan="2" class="noPrint"> </th>
							</tr>
							
							<tr class="">
							<th><center>ตั้งครรภ์</center></th>
							<th><center>ร่างกายไม่สมบูรณ์</center></th>
							<th><center>รวม</center></th>
							</tr>
						</thead>
						<tbody>
				
						<?php
						
								
								//ครุศาสตร์ ตั้งครรภ์
								$query1 = $conn->query("select * from scan2557 where faculty ='ครุศาสตร์' and status ='2' and type123='1';");
								$total1 = $query1->num_rows;
								//ครุศาสตร์ ร่างกายไม่สมบูรณ์
								$query11 = $conn->query("select * from scan2557 where faculty ='ครุศาสตร์' and status ='3' and type123='1';");
								$total11 = $query11->num_rows;
								
								//มนุษยศาสตร์และสังคมศาสตร์  ตั้งครรภ์
								$query2 = $conn->query("select * from scan2557 where faculty ='มนุษยศาสตร์และสังคมศาสตร์' and status ='2' and type123='1';");
								$total2 = $query2->num_rows;
								//มนุษยศาสตร์และสังคมศาสตร์ ร่างกายไม่สมบูรณ์
								$query22 = $conn->query("select * from scan2557 where faculty ='มนุษยศาสตร์และสังคมศาสตร์' and status ='3' and type123='1';");
								$total22 = $query22->num_rows;
								
								//วิทยาศาสตร์และเทคโนโลยี ตั้งครรภ์
								$query3 = $conn->query("select * from scan2557 where faculty ='วิทยาศาสตร์และเทคโนโลยี' and status ='2' and type123='1';");
								$total3 = $query3->num_rows;
								//วิทยาศาสตร์และเทคโนโลยี ร่างกายไม่สมบูรณ์
								$query33 = $conn->query("select * from scan2557 where faculty ='วิทยาศาสตร์และเทคโนโลยี' and status ='3' and type123='1';");
								$total33 = $query33->num_rows;
								
								
								//วิทยาการจัดการ ตั้งครรภ์
								$query4 = $conn->query("select * from scan2557 where faculty ='วิทยาการจัดการ' and status ='2' and type123='1';");
								$total4 = $query4->num_rows;
								//วิทยาการจัดการ ร่างกายไม่สมบูรณ์
								$query44 = $conn->query("select * from scan2557 where faculty ='วิทยาการจัดการ' and status ='3' and type123='1';");
								$total44 = $query44->num_rows;
								
								//วิทยาลัยนานาชาติการท่องเที่ยว ตั้งครรภ์
								$query5 = $conn->query("select * from scan2557 where faculty ='วิทยาลัยนานาชาติการท่องเที่ยว' and status ='2' and type123='1';");
								$total5 = $query5->num_rows;
								//วิทยาลัยนานาชาติการท่องเที่ยว ร่างกายไม่สมบูรณ์
								$query55 = $conn->query("select * from scan2557 where faculty ='วิทยาลัยนานาชาติการท่องเที่ยว' and status ='3' and type123='1';");
								$total55 = $query55->num_rows;
								
								//นิติศาสตร์ ตั้งครรภ์
								$query6 = $conn->query("select * from scan2557 where faculty ='นิติศาสตร์' and status ='2' and type123='1';");
								$total6 = $query6->num_rows;
								//นิติศาสตร์ ร่างกายไม่สมบูรณ์
								$query66 = $conn->query("select * from scan2557 where faculty ='นิติศาสตร์' and status ='3' and type123='1';");
								$total66 = $query66->num_rows;
								
								//พยาบาลศาสตร์ ตั้งครรภ์
								$query7 = $conn->query("select * from scan2557 where faculty ='พยาบาลศาสตร์' and status ='2' and type123='1';");
								$total7 = $query7->num_rows;
								//พยาบาลศาสตร์ ร่างกายไม่สมบูรณ์
								$query77 = $conn->query("select * from scan2557 where faculty ='พยาบาลศาสตร์' and status ='3' and type123='1';");
								$total77 = $query77->num_rows;
								

								//บัณฑิต ตั้งครรภ์
								$query8 = $conn->query("select * from scan2557 where faculty ='บัณฑิตวิทยาลัย' and status ='2' and type123='1';");
								$total8 = $query8->num_rows;
								//บัณฑิต ร่างกายไม่สมบูรณ์
								$query9 = $conn->query("select * from scan2557 where faculty ='บัณฑิตวิทยาลัย' and status ='3' and type123='1';");
								$total9 = $query9->num_rows;


						?>					<tr class="warning">
											<td>บัณฑิตวิทยาลัย</td>
											<td><?php echo $total8;?></td>
											<td><?php echo $total9;?></td>
											<td><?php echo ($total8+$total9);?></td>
											<td class="noPrint"><center><a class="noPrint" href="/scan/configmenu/reportp2-1.php?status=1"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										
										  <tr class="warning">
											<td>ครุศาสตร์</td>
											<td><?php echo $total1;?></td>
											<td><?php echo $total11;?></td>
											<td><?php echo ($total1+$total11);?></td>
											<td class="noPrint"> <center><a class="noPrint" href="/scan/configmenu/reportp2-1.php?status=1"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <tr class="warning">
											<td>มนุษย์ศาสตร์และสังคมศาสตร์</td>
											<td><?php echo $total2;?></td>
											<td><?php echo $total22;?></td>
											<td><?php echo ($total2+$total22);?></td>
											 <td class="noPrint"><center><a class="noPrint" href="/scan/configmenu/reportp2-1.php?status=2"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										   <tr class="warning">
											<td>วิทยาศาสตร์และเทคโนโลยี</td>
											<td><?php echo $total3;?></td>
											<td><?php echo $total33;?></td>
											<td><?php echo ($total3+$total33);?></td>
											 <td class="noPrint"><center><a class="noPrint" href="/scan/configmenu/reportp2-1.php?status=3"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										   <tr class="warning">
											<td>วิทยาการจัดการ</td>
											<td><?php echo $total4;?></td>
											<td><?php echo $total44;?></td>
											<td><?php echo ($total4+$total44);?></td>
											 <td class="noPrint"><center><a class="noPrint" href="/scan/configmenu/reportp2-1.php?status=4"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										   <tr class="warning">
											<td>วิทยาลัยนานาชาติ</td>
											<td><?php echo $total5;?></td>
											<td><?php echo $total55;?></td>
											<td><?php echo ($total5+$total55);?></td>
											 <td class="noPrint"><center><a class="noPrint" href="/scan/configmenu/reportp2-1.php?status=5"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										   <tr class="warning">
											<td>นิติศาสตร์</td>
											<td><?php echo $total6;?></td>
											<td><?php echo $total66;?></td>
											<td><?php echo ($total6+$total66);?></td>
											 <td class="noPrint"><center><a class="noPrint" href="/scan/configmenu/reportp2-1.php?status=6"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										   <tr class="warning">
											<td>พยาบาลศาสตร์</td>
											<td><?php echo $total7;?></td>
											<td><?php echo $total77;?></td>
											<td><?php echo ($total7+$total77);?></td>
											 <td class="noPrint"><center><a  href="/scan/configmenu/reportp2-1.php?status=7"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
										  </tr>
										  <tr class="danger">
											<td>รวม</td>
											<td><?php echo ($total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8);?></td>
											<td><?php echo ($total11+$total22+$total33+$total44+$total55+$total66+$total77+$total9);?></td>
											<td><?php echo ($total1+$total2+$total3+$total4+$total5+$total6+$total7)+($total11+$total22+$total33+$total44+$total55+$total66+$total77+$total8+$total9);?></td>
											 <td class="noPrint"><center></center></td>
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