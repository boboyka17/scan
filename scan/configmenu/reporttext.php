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
                         <a href="reporttext.php">ระบบรายงานผล ReMark</a>
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
<?php

		
		//ครุศาสตร์ ปกติ
		$query1 = $conn->query("select * from scan2557 where faculty ='ครุศาสตร์' and statustext is not null and type123='1';");
		
		//มนุษยศาสตร์และสังคมศาสตร์
		$query2 = $conn->query("select * from scan2557 where faculty ='มนุษยศาสตร์และสังคมศาสตร์' and statustext is not null and type123='1';");
		
		//วิทยาศาสตร์และเทคโนโลยี
		$query3 = $conn->query("select * from scan2557 where faculty ='วิทยาศาสตร์และเทคโนโลยี' and statustext is not null and type123='1';");
		
		//วิทยาการจัดการ
		$query4 = $conn->query("select * from scan2557 where faculty ='วิทยาการจัดการ' and statustext is not null and type123='1';");
		
		//วิทยาลัยนานาชาติการท่องเที่ยว
		$query5 = $conn->query("select * from scan2557 where faculty ='วิทยาลัยนานาชาติการท่องเที่ยว' and statustext is not null and type123='1';");
		
		//นิติศาสตร์
		$query6 = $conn->query("select * from scan2557 where faculty ='นิติศาสตร์' and statustext is not null and type123='1';");
		
		//พยาบาลศาสตร์
		$query7 = $conn->query("select * from scan2557 where faculty ='พยาบาลศาสตร์' and statustext is not null and type123='1';");
		
?>
      
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ระบบรายงานผล ReMark</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					
					<center><h3><span class="label label-info">ระบบรายงานผล ReMark</span></h3></center>
					
					<br/>
					<table class="table table-bordered table2excel">
						<!-- **************************************** -->
						<thead>
							<tr class="success">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผล ReMark คณะครุศาสตร์</center></th>
							<th rowspan="2"><center>ReMark</center></th>
							</tr>
							
							<tr class="success">
							<th><center>รหัสนักศึกษา</center></th>
							<th><center>ชื่อ สกุล</center></th>
							<th><center>สถานะ</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row1=$query1->fetch_array())
							{
						?>
							<tr class="">
								<td><?php echo $row1['count'];?></td>
								<td><?php echo $row1['std_id'];?></td>
								<td><?php echo $row1['pre']." ".$row1['name']." ".$row1['lastname'];?></td>
								<td><?php 
								//	if($row1['status']==1)echo "ปกติ";
								if($row1['status']==3){
									echo "ร่างกายไม่สมบูรณ์";
									}else if($row1['status']==2){
										echo "ตั้งครรภ์";
									}
								
								?></td>
								<td><?php echo $row1['statustext'];?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<!-- **************************************** -->
						
						<!-- **************************************** -->
						<thead>
							<tr class="danger">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผล ReMark คณะมนุษย์ศาสตร์และสังคมศาสตร์</center></th>
							<th rowspan="2"><center>ReMark</center></th>
							</tr>
							
							<tr class="danger">
							<th><center>รหัสนักศึกษา</center></th>
							<th><center>ชื่อ สกุล</center></th>
							<th><center>สถานะ</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row2=$query2->fetch_array())
							{
						?>
							<tr class="">
								<td><?php echo $row2['count'];?></td>
								<td><?php echo $row2['std_id'];?></td>
								<td><?php echo $row2['pre']." ".$row2['name']." ".$row2['lastname'];?></td>
								<td><?php 
									if($row2['status']==3){
										echo "ร่างกายไม่สมบูรณ์";
										}else if($row2['status']==2){
											echo "ตั้งครรภ์";
										}
								?></td>
								<td><?php echo $row2['statustext'];?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<!-- **************************************** -->
						
						<!-- **************************************** -->
						<thead>
							<tr class="info">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผล ReMark คณะวิทยาศาสตร์และเทคโนโลยี</center></th>
							<th rowspan="2"><center>ReMark</center></th>
							</tr>
							
							<tr class="info">
							<th><center>รหัสนักศึกษา</center></th>
							<th><center>ชื่อ สกุล</center></th>
							<th><center>สถานะ</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row3=$query3->fetch_array())
							{
						?>
							<tr class="">
								<td><?php echo $row3['count'];?></td>
								<td><?php echo $row3['std_id'];?></td>
								<td><?php echo $row3['pre']." ".$row3['name']." ".$row3['lastname'];?></td>
								<td><?php 
									if($row3['status']==3){
										echo "ร่างกายไม่สมบูรณ์";
										}else if($row3['status']==2){
											echo "ตั้งครรภ์";
										}
								?></td>
								<td><?php echo $row3['statustext'];?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<!-- **************************************** -->
							
						<!-- **************************************** -->
						<thead>
							<tr class="warning">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผล ReMark คณะวิทยาการจัดการ</center></th>
							<th rowspan="2"><center>ReMark</center></th>
							</tr>
							
							<tr class="warning">
							<th><center>รหัสนักศึกษา</center></th>
							<th><center>ชื่อ สกุล</center></th>
							<th><center>สถานะ</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row4=$query4->fetch_array())
							{
						?>
							<tr class="">
								<td><?php echo $row4['count'];?></td>
								<td><?php echo $row4['std_id'];?></td>
								<td><?php echo $row4['pre']." ".$row4['name']." ".$row4['lastname'];?></td>
								<td><?php 
									if($row4['status']==3){
										echo "ร่างกายไม่สมบูรณ์";
										}else if($row4['status']==2){
											echo "ตั้งครรภ์";
										}
								?></td>
								<td><?php echo $row4['statustext'];?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<!-- **************************************** -->	
							
						<!-- **************************************** -->
						<thead>
							<tr class="danger">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผล ReMark คณะวิทยาลัยนานาชาติ</center></th>
							<th rowspan="2"><center>ReMark</center></th>
							</tr>
							
							<tr class="danger">
							<th><center>รหัสนักศึกษา</center></th>
							<th><center>ชื่อ สกุล</center></th>
							<th><center>สถานะ</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row5=$query5->fetch_array())
							{
						?>
							<tr class="">
								<td><?php echo $row5['count'];?></td>
								<td><?php echo $row5['std_id'];?></td>
								<td><?php echo $row5['pre']." ".$row5['name']." ".$row5['lastname'];?></td>
								<td><?php 
									if($row5['status']==3){
										echo "ร่างกายไม่สมบูรณ์";
										}else if($row5['status']==2){
											echo "ตั้งครรภ์";
										}
								?></td>
								<td><?php echo $row5['statustext'];?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<!-- **************************************** -->	
							
						<!-- **************************************** -->
						<thead>
							<tr class="info">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผล ReMark คณะนิติศาสตร์</center></th>
							<th rowspan="2"><center>ReMark</center></th>
							</tr>
							
							<tr class="info">
							<th><center>รหัสนักศึกษา</center></th>
							<th><center>ชื่อ สกุล</center></th>
							<th><center>สถานะ</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row6=$query6->fetch_array())
							{
						?>
							<tr class="">
								<td><?php echo $row6['count'];?></td>
								<td><?php echo $row6['std_id'];?></td>
								<td><?php echo $row6['pre']." ".$row6['name']." ".$row6['lastname'];?></td>
								<td><?php 
									if($row6['status']==3){
										echo "ร่างกายไม่สมบูรณ์";
										}else if($row6['status']==2){
											echo "ตั้งครรภ์";
										}
								?></td>
								<td><?php echo $row6['statustext'];?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<!-- **************************************** -->	
							
						<!-- **************************************** -->
						<thead>
							<tr class="success">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผล ReMark คณะพยาบาลศาสตร์</center></th>
							<th rowspan="2"><center>ReMark</center></th>
							</tr>
							
							<tr class="success">
							<th><center>รหัสนักศึกษา</center></th>
							<th><center>ชื่อ สกุล</center></th>
							<th><center>สถานะ</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row7=$query7->fetch_array())
							{
						?>
							<tr class="">
								<td><?php echo $row7['count'];?></td>
								<td><?php echo $row7['std_id'];?></td>
								<td><?php echo $row7['pre']." ".$row7['name']." ".$row7['lastname'];?></td>
								<td><?php 
									if($row7['status']==3){
										echo "ร่างกายไม่สมบูรณ์";
										}else if($row7['status']==2){
											echo "ตั้งครรภ์";
										}
								?></td>
								<td><?php echo $row7['statustext'];?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<!-- **************************************** -->	
						
						
					</table>
					<p align="center">
            <input name="print" class="noPrint btn btn-success btn-md" type="button" value ="Print" onClick="window.print()">
            <input name="printt" class="noPrint btn btn-success btn-md" type="button" value ="Excel" onClick="printt()">
           
          </p>
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