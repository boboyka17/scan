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
        <div class="row">
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
<?php
include('../sphp/conn.php');
		
		//ครุศาสตรบัณฑิต(ค.บ.)
		if($_GET['status']==1){
		$query1 = $conn->query("select * from scan2557 where education LIKE '%ครุศาสตรบัณฑิต%' and statustext is not null and type123='1';");
		$edu="ครุศาสตรบัณฑิต(ค.บ.)";
		
		}elseif($_GET['status']==2){
		//วิทยาศาสตรบัณฑิต(วท.บ.)
		$query1 = $conn->query("select * from scan2557 where education LIKE '%วิทยาศาสตรบัณฑิต%' and statustext is not null and type123='1';");
		$edu="วิทยาศาสตรบัณฑิต(วท.บ.)";
		
		}elseif($_GET['status']==3){
		//นิติศาสตรบัณฑิต(น.บ.)
		$query1 = $conn->query("select * from scan2557 where education LIKE '%นิติศาสตรบัณฑิต%' and statustext is not null and type123='1';");
		$edu="นิติศาสตรบัณฑิต(น.บ.)";
		
		}elseif($_GET['status']==4){
		//รัฐประศาสนศาสตรบัณฑิต(รป.บ.)	
		$query1 = $conn->query("select * from scan2557 where education LIKE '%รัฐประศาสนศาสตรบัณฑิต%' and statustext is not null and type123='1';");
		$edu="รัฐประศาสนศาสตรบัณฑิต(รป.บ.)";
		
		}elseif($_GET['status']==5){
		//ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)	
		$query1 = $conn->query("select * from scan2557 where education LIKE '%ศิลปกรรมศาสตรบัณฑิต%' and statustext is not null and type123='1';");
		$edu="ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)";
		
		}elseif($_GET['status']==6){
		//ศิลปศาสตรบัณฑิต(ศศ.บ.)	
		$query1 = $conn->query("select * from scan2557 where education LIKE '%ศิลปศาสตรบัณฑิต%' and statustext is not null and type123='1';");
		$edu="ศิลปศาสตรบัณฑิต(ศศ.บ.)";
		
		}elseif($_GET['status']==7){
		//บัญชีบัณฑิต(บช.บ.)	
		$query1 = $conn->query("select * from scan2557 where education LIKE '%บัญชีบัณฑิต%' and statustext is not null and type123='1';");
		$edu="บัญชีบัณฑิต(บช.บ.)";
		
		}elseif($_GET['status']==8){
		//พยาบาลศาสตรบัณฑิต(พย.บ.)
		$query1 = $conn->query("select * from scan2557 where education LIKE '%พยาบาลศาสตรบัณฑิต%' and statustext is not null and type123='1';");
		$edu="พยาบาลศาสตรบัณฑิต(พย.บ.)";
		
		}else{
		//บริหารธุรกิจบัณฑิต(บธ.บ.)
		$query1 = $conn->query("select * from scan2557 where education LIKE '%บริหารธุรกิจบัณฑิต%' and statustext is not null and type123='1';");
		$edu="บริหารธุรกิจบัณฑิต(บธ.บ.)";
		}
		
?>
      
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading noPrint">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user "></span>&nbsp;ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามวุฒิ</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					
					<center><h3><span class="label label-info">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามวุฒิ</span></h3></center>
					
					<br/>
					<table class="table table-bordered">
						<!-- **************************************** -->
						<thead>
							<tr class="success">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผลบัณฑิต(พิเศษ)<?php echo " ".$edu;?></center></th>
							<th rowspan="2"><center>หมายเหตุ</center></th>
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

								<?php if($row1['status']==3 or $row1['status']==2){?>

								<td><font size="4.5"><?php echo $row1['count'];?></font></td>
								<td><font size="4.5"><?php echo $row1['std_id'];?></font></td>
								<td><font size="4.5"><?php echo $row1['pre']." ".$row1['name']." ".$row1['lastname'];?></font></td>
								<td><font size="4.5"><?php 
								//	if($row1['status']==1)echo "ปกติ";
								if($row1['status']==3){
									echo "ร่างกายไม่สมบูรณ์";
									}else if($row1['status']==2){
										echo "ตั้งครรภ์";
									}
								?></font>
								</td>
								<td><font size="4.5"><?php echo $row1['statustext'];?></font></td>

								<?php }?>


							</tr>
							<?php
							}
							?>
						</tbody>
						<!-- **************************************** -->
						<!-- **************************************** -->
						<!--
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
							while($row2=mysql_fetch_array($query2))
							{
						?>
							<tr class="">

								<?php if($row2['status']==3 or $row2['status']==2){?>

								<td><font size="4"><?php echo $row2['count'];?></font></td>
								<td><font size="4"><?php echo $row2['std_id'];?></font></td>
								<td><font size="4"><?php echo $row2['pre']." ".$row2['name']." ".$row2['lastname'];?></font></td>
								<td><font size="4"><?php 
								//	if($row1['status']==1)echo "ปกติ";
								if($row2['status']==3){
									echo "ร่างกายไม่สมบูรณ์";
									}else if($row2['status']==2){
										echo "ตั้งครรภ์";
									}
								?></font>
								</td>
								<td><font size="4"><?php echo $row2['statustext'];?></font></td>

								<?php }?>


							</tr>
							<?php
							}
							?>
						</tbody>
						-->
						<!-- **************************************** -->
						
						<!-- **************************************** -->
						<!--
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
							while($row3=mysql_fetch_array($query3))
							{
						?>
							<tr class="">

								<?php if($row3['status']==3 or $row3['status']==2){?>

								<td><font size="4"><?php echo $row3['count'];?></font></td>
								<td><font size="4"><?php echo $row3['std_id'];?></font></td>
								<td><font size="4"><?php echo $row3['pre']." ".$row3['name']." ".$row3['lastname'];?></font></td>
								<td><font size="4"><?php 
								//	if($row1['status']==1)echo "ปกติ";
								if($row3['status']==3){
									echo "ร่างกายไม่สมบูรณ์";
									}else if($row3['status']==2){
										echo "ตั้งครรภ์";
									}
								?></font>
								</td>
								<td><font size="4"><?php echo $row3['statustext'];?></font></td>

								<?php }?>


							</tr>
							<?php
							}
							?>
						</tbody>
						-->
						<!-- **************************************** -->
							
						<!-- **************************************** -->
						<!--
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
							while($row4=mysql_fetch_array($query4))
							{
						?>
							<tr class="">

								<?php if($row4['status']==3 or $row4['status']==2){?>

								<td><font size="4"><?php echo $row4['count'];?></font></td>
								<td><font size="4"><?php echo $row4['std_id'];?></font></td>
								<td><font size="4"><?php echo $row4['pre']." ".$row4['name']." ".$row4['lastname'];?></font></td>
								<td><font size="4"><?php 
								//	if($row1['status']==1)echo "ปกติ";
								if($row4['status']==3){
									echo "ร่างกายไม่สมบูรณ์";
									}else if($row4['status']==2){
										echo "ตั้งครรภ์";
									}
								?></font>
								</td>
								<td><font size="4"><?php echo $row4['statustext'];?></font></td>

								<?php }?>


							</tr>
							<?php
							}
							?>
						</tbody>
						-->
						<!-- **************************************** -->	
							
						<!-- **************************************** -->
						<!--
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
							while($row5=mysql_fetch_array($query5))
							{
						?>
							<tr class="">

								<?php if($row5['status']==3 or $row5['status']==2){?>

								<td><font size="4"><?php echo $row5['count'];?></font></td>
								<td><font size="4"><?php echo $row5['std_id'];?></font></td>
								<td><font size="4"><?php echo $row5['pre']." ".$row5['name']." ".$row5['lastname'];?></font></td>
								<td><font size="4"><?php 
								//	if($row1['status']==1)echo "ปกติ";
								if($row5['status']==3){
									echo "ร่างกายไม่สมบูรณ์";
									}else if($row5['status']==2){
										echo "ตั้งครรภ์";
									}
								?></font>
								</td>
								<td><font size="4"><?php echo $row5['statustext'];?></font></td>

								<?php }?>


							</tr>
							<?php
							}
							?>
						</tbody>
						-->
						<!-- **************************************** -->	
							
						<!-- **************************************** -->
						<!--
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
							while($row6=mysql_fetch_array($query6))
							{
						?>
							<tr class="">

								<?php if($row6['status']==3 or $row6['status']==2){?>

								<td><font size="4"><?php echo $row6['count'];?></font></td>
								<td><font size="4"><?php echo $row6['std_id'];?></font></td>
								<td><font size="4"><?php echo $row6['pre']." ".$row6['name']." ".$row6['lastname'];?></font></td>
								<td><font size="4"><?php 
								//	if($row1['status']==1)echo "ปกติ";
								if($row6['status']==3){
									echo "ร่างกายไม่สมบูรณ์";
									}else if($row6['status']==2){
										echo "ตั้งครรภ์";
									}
								?></font>
								</td>
								<td><font size="4"><?php echo $row6['statustext'];?></font></td>

								<?php }?>


							</tr>
							<?php
							}
							?>
						</tbody>
						-->
						<!-- **************************************** -->	
							
						<!-- **************************************** -->
						<!--
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
							while($row7=mysql_fetch_array($query7))
							{
						?>
							<tr class="">

								<?php if($row7['status']==3 or $row7['status']==2){?>

								<td><font size="4"><?php echo $row7['count'];?></font></td>
								<td><font size="4"><?php echo $row7['std_id'];?></font></td>
								<td><font size="4"><?php echo $row7['pre']." ".$row7['name']." ".$row7['lastname'];?></font></td>
								<td><font size="4"><?php 
								//	if($row1['status']==1)echo "ปกติ";
								if($row7['status']==3){
									echo "ร่างกายไม่สมบูรณ์";
									}else if($row7['status']==2){
										echo "ตั้งครรภ์";
									}
								?></font>
								</td>
								<td><font size="4"><?php echo $row7['statustext'];?></font></td>

								<?php }?>


							</tr>
							<?php
							}
							?>
						</tbody>
						-->
						<!-- **************************************** -->	
						
					</table>
					<h3 align="center"><input class="noPrint btn btn-success btn-md " type="button" value ="Print" onClick="window.print()"></h3>
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