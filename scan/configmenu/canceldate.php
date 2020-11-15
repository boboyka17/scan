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
  <div class="container">
        <div class="row">
        <center><img src="../head.png"></center>
        </div>
       

      
      <!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->

        <div class="row">      
              <div class="col-md-12">
                   <ul class="breadcrumb">
                        <li>
                          <a href="../main.php">หน้าหลัก</a>
                        </li>
                        <li>
                         <a href="mainconfig.php">รายการจัดการระบบ</a>
                        </li>
						<li>
                         <a href="canceldate.php">ระบบถอนสแกน</a>
                        </li>
                  </ul>
              </div>
        </div>
    

        <div class="row">
              <div class="col-md-3">
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
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ระบบถอนสแกน</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center>
						
						<div class="row">
						
							<div class="col-xs-4">
							<img src="admin.png" width="120" height="120">
							</div>
							
							<div class="col-xs-4">
								<h4><span class="label label-success">ป้อนรหัส หรือ สแกนด้วยบาร์โค้ด</span></h4>
								<br/>
								<form>
								<input type="text" class="form-control" id="text" placeholder="ใส่รหัสที่ทำการบันทึกผิดพลาด!" name="id">
								<br/>
									<button type="submit" class="btn btn-warning">
										<span class="glyphicon glyphicon-search" style="font-family: 'kanit'"> เริ่มระบบ</span>
									</button>
								</form>
							</div>
							
							<div class="col-xs-4">
							</div>
						
						</div>
<br/>
<table class="table">
<?php
if(!empty($_GET['id']))
{
	$date=file_get_contents("../sphp/date.txt","w");
	$query = $conn->query("select * from scan2557 where std_id=".$_GET['id'].";",$con);
	$row = $query->fetch_assoc();
	
	if(!$row)
	{
		echo "<center>ไม่พบรายชื่อบัณฑิณ!</center>";
	}
	else
	{
	?>
			<tbody>
			  <tr>
				<td><h4><font>รหัสนักศึกษา:</font> <?php echo $row['std_id'];?></h4></td>
				
				
			  </tr>
			  <tr>
				<td><h4><font>ชื่อ-สกุล:</font> <?php echo $row['pre']." ".$row['name']." ".$row['lastname'];?></h4></td>
				
				
			  </tr>
			  <tr>
					<td>
						<font style="font-size:16px;">การเข้าร่วมฝึกซ้อม</font>
						<table class="table">
							<tr>
								<th style="text-align:center;">
								<?php
							
									$query=sprintf("SELECT * FROM datescan WHERE idday='1';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]." ".$row1["mont"]." ".$row1["year"].' เช้า';
								?>
								</th>
                                <th style="text-align:center;">
								<?php
							
									$query=sprintf("SELECT * FROM datescan WHERE idday='1';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]." ".$row1["mont"]." ".$row1["year"].' บ่าย';
								?>
								</th>
								<th style="text-align:center;">
								<?php
									$query=sprintf("SELECT * FROM datescan WHERE idday='2';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]." ".$row1["mont"]." ".$row1["year"].' เช้า';
								?>
								</th>
                                <th style="text-align:center;">
								<?php
									$query=sprintf("SELECT * FROM datescan WHERE idday='2';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]." ".$row1["mont"]." ".$row1["year"].' บ่าย';
								?>
								</th>
								<th style="text-align:center;">
								<?php
									$query=sprintf("SELECT * FROM datescan WHERE idday='3';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]." ".$row1["mont"]." ".$row1["year"].' เช้า';
								?>
								</th>
                                <th style="text-align:center;">
								<?php
									$query=sprintf("SELECT * FROM datescan WHERE idday='3';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]." ".$row1["mont"]." ".$row1["year"].' บ่าย';
								?>
								</th>
								<th style="text-align:center;">
								<?php
									$query=sprintf("SELECT * FROM datescan WHERE idday='4';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]." ".$row1["mont"]." ".$row1["year"].' รอบที่ 1';
								?>
								</th>
                                <th style="text-align:center;">
								<?php
									$query=sprintf("SELECT * FROM datescan WHERE idday='4';");
									$result=$conn->query($query);
									$row1=$result->fetch_assoc();
									echo $row1["date"]." ".$row1["mont"]." ".$row1["year"].' รอบที่ 2';
								?>
								</th>
							</tr>
							<tr style="text-align:center;">
								<td>
									<?php 
										if($row['chdate1']==""){
										echo "<span class='glyphicon glyphicon-remove'></span> ไม่มา";
										}else{
										echo "<span class='glyphicon glyphicon-ok'></span> มา";
										}
									?>
								</td>
                                <td>
									<?php 
										if($row['chdate12']==""){
										echo "<span class='glyphicon glyphicon-remove'></span> ไม่มา";
										}else{
										echo "<span class='glyphicon glyphicon-ok'></span> มา";
										}
									?>
								</td>
								<td>
									<?php 
										if($row['chdate2']==""){
										echo "<span class='glyphicon glyphicon-remove'></span> ไม่มา";
										}else{
										echo "<span class='glyphicon glyphicon-ok'></span> มา";
										}
									?>
								</td>
                                <td>
									<?php 
										if($row['chdate22']=="")
										{
										echo "<span class='glyphicon glyphicon-remove'></span> ไม่มา";
										}
										else
										{
										echo "<span class='glyphicon glyphicon-ok'></span> มา";
										}
									?>
								</td>
								<td>
									<?php 
										if($row['chdate3']=="")
										{
										echo "<span class='glyphicon glyphicon-remove'></span> ไม่มา";
										}
										else
										{
										echo "<span class='glyphicon glyphicon-ok'></span> มา";
										}
									?>
								</td>
                                <td>
									<?php 
										if($row['chdate32']=="")
										{
										echo "<span class='glyphicon glyphicon-remove'></span> ไม่มา";
										}
										else
										{
										echo "<span class='glyphicon glyphicon-ok'></span> มา";
										}
									?>
								</td>
								<td>
									<?php 
										if($row['chdate4']=="")
										{
										echo "<span class='glyphicon glyphicon-remove'></span> ไม่มา";
										}
										else
										{
										echo "<span class='glyphicon glyphicon-ok'></span> มา";
										}
									?>
								</td>
                                <td>
									<?php 
										if($row['chdate42']=="")
										{
										echo "<span class='glyphicon glyphicon-remove'></span> ไม่มา";
										}
										else
										{
										echo "<span class='glyphicon glyphicon-ok'></span> มา";
										}
									?>
								</td>
							</tr>
							<tr style="text-align:center;">
								<td>
									<?php
										if($date=="date1")
										{
											echo "<h3><span class='glyphicon glyphicon-hand-up'></span></h3><br/>ถอน";
										}
									?>
								</td>
                                <td>
									<?php
										if($date=="date12")
										{
											echo "<h3><span class='glyphicon glyphicon-hand-up'></span></h3><br/>ถอน";
										}
									?>
								</td>
								<td>
									<?php
										if($date=="date2")
										{
											echo "<h3><span class='glyphicon glyphicon-hand-up'></span></h3><br/>ถอน";
										}
									?>
								</td>
                                <td>
									<?php
										if($date=="date22")
										{
											echo "<h3><span class='glyphicon glyphicon-hand-up'></span></h3><br/>ถอน";
										}
									?>
								</td>
								<td>
									<?php
										if($date=="date3")
										{
											echo "<h3><span class='glyphicon glyphicon-hand-up'></span></h3><br/>ถอน";
										}
									?>
								</td>
                                <td>
									<?php
										if($date=="date32")
										{
											echo "<h3><span class='glyphicon glyphicon-hand-up'></span></h3><br/>ถอน";
										}
									?>
								</td>
								<td>
									<?php
										if($date=="date4")
										{
											echo "<h3><span class='glyphicon glyphicon-hand-up'></span></h3><br/>ถอน";
										}
									?>
								</td>
                                <td>
									<?php
										if($date=="date42")
										{
											echo "<h3><span class='glyphicon glyphicon-hand-up'></span></h3><br/>ถอน";
										}
									?>
								</td>
							</tr>
						</table>
						<center>
							<h4 style="color:red;">
							<?php
								if($date=="date1" or $date=="date12")
								{
									$query=sprintf("SELECT * FROM datescan WHERE idday='1';");
									$result=$conn->query($query,$con);
									$row101=$result->fetch_assoc();
									echo "ขณะนี้กำลังจะดำเนินการถอนการลงวันซ้อมของวันที่  ".$row101["date"]." ".$row101["mont"]." ".$row101["year"];
								
									
								}
								elseif($date=="date2" or $date=="date22")
								{
									$query=sprintf("SELECT * FROM datescan WHERE idday='2';");
									$result=$conn->query($query,$con);
									$row101=$result->fetch_assoc();
									echo "ขณะนี้กำลังจะดำเนินการถอนการลงวันซ้อมของวันที่  ".$row101["date"]." ".$row101["mont"]." ".$row101["year"];
								}
								elseif($date=="date3" or $date=="date32")
								{
									$query=sprintf("SELECT * FROM datescan WHERE idday='3';");
									$result=$conn->query($query,$con);
									$row101=$result->fetch_assoc();
									echo "ขณะนี้กำลังจะดำเนินการถอนการลงวันซ้อมของวันที่  ".$row101["date"]." ".$row101["mont"]." ".$row101["year"];
								}
								elseif($date=="date4" or $date=="date42")
								{
									$query=sprintf("SELECT * FROM datescan WHERE idday='4';");
									$result=$conn->query($query,$con);
									$row101=$result->fetch_assoc();
									echo "ขณะนี้กำลังจะดำเนินการถอนการลงวันซ้อมของวันที่  ".$row101["date"]." ".$row101["mont"]." ".$row101["year"];
								}
								
							?>
							</h4>
								<a href="runcanceldate.php?id=<?php echo $_GET['id'];?>&date=<?php echo $date;?>">
								<button type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-export" style="font-family: 'Kanit'"> ถอน</span>
								</button>
								</a>
						</center>
					</td>
			  </tr>
			</tbody>
			</table>
	<?php
	include('../sphp/cconn.php');
	}
}
else
{
}
	?>
					</center>
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