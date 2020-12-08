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
		
		//ครุศาสตร์
		if($_GET['status']==1){
		$query1 = mysql_query("select * from scan2557 where faculty LIKE '%ครุศาสตร์%' and statustext is not null and type123='1';",$con);
		$edu="ครุศาสตร์";
		
		}elseif($_GET['status']==2){
		//มนุษย์ศาสตร์และสังคมศาสตร์
		$query1 = mysql_query("select * from scan2557 where faculty LIKE '%มนุษยศาสตร์และสังคมศาสตร์%' and statustext is not null and type123='1';",$con);
		$edu="มนุษย์ศาสตร์และสังคมศาสตร์";
		
		}elseif($_GET['status']==3){
		//วิทยาศาสตร์และเทคโนโลยี
		$query1 = mysql_query("select * from scan2557 where faculty LIKE '%วิทยาศาสตร์และเทคโนโลยี%' and statustext is not null and type123='1';",$con);
		$edu="วิทยาศาสตร์และเทคโนโลยี";
		
		}elseif($_GET['status']==4){
		//วิทยาการจัดการ	
		$query1 = mysql_query("select * from scan2557 where faculty LIKE '%วิทยาการจัดการ%' and statustext is not null and type123='1';",$con);
		$edu="วิทยาการจัดการ";
		
		}elseif($_GET['status']==5){
		//วิทยาลัยนานาชาติ	
		$query1 = mysql_query("select * from scan2557 where faculty LIKE '%วิทยาลัยนานาชาติ%' and statustext is not null and type123='1';",$con);
		$edu="วิทยาลัยนานาชาติ";
		
		}elseif($_GET['status']==6){
		//นิติศาสตร์	
		$query1 = mysql_query("select * from scan2557 where faculty LIKE '%นิติศาสตร์%' and statustext is not null and type123='1';",$con);
		$edu="นิติศาสตร์";
		
		}else{
		//พยาบาลศาสตร์	
		$query1 = mysql_query("select * from scan2557 where faculty LIKE '%พยาบาลศาสตร์%' and statustext is not null and type123='1';",$con);
		$edu="พยาบาลศาสตร์";
		
		}/*elseif($_GET['status']==8){
		//พยาบาลศาสตรบัณฑิต(พย.บ.)
		$query1 = mysql_query("select * from scan2557 where education LIKE '%พยาบาลศาสตรบัณฑิต%' and statustext is not null and type123='1';",$con);
		$edu="พยาบาลศาสตรบัณฑิต(พย.บ.)";
		
		}else{
		//บริหารธุรกิจบัณฑิต(บธ.บ.)
		$query1 = mysql_query("select * from scan2557 where education LIKE '%บริหารธุรกิจบัณฑิต%' and statustext is not null and type123='1';",$con);
		$edu="บริหารธุรกิจบัณฑิต(บธ.บ.)";
		}*/
		
?>
      
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading noPrint ">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user "></span>&nbsp;ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามคณะ</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					
					<center><h3><span class="label label-info">ระบบรายงานผลบัณฑิต(พิเศษ) แบ่งตามคณะ</span></h3></center>
					
					<br/>
					<table class="table table-bordered">
						<!-- **************************************** -->
						<thead>
							<tr class="success">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="3"><center>รายงานผลบัณฑิต(พิเศษ) คณะ<?php echo " ".$edu;?></center></th>
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
							while($row1=mysql_fetch_array($query1))
							{
						?>
							<tr class="">

								<?php if($row1['status']==3 or $row1['status']==2){?>

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
								?>
								</td>
								<td><?php echo $row1['statustext'];?></td>

								<?php }?>


							</tr>
							<?php
							}
							?>
						</tbody>
						
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