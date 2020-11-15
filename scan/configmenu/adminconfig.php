<?php
include('../sphp/conn.php');
	session_start();
	if($_SESSION['suser']!="admin")
	{
?>		
		<meta charset="utf-8">
		<script>alert("สามารถใช้งานส่วนนี้ได้เฉพาะผู้ดูแลระบบเท่านั้น!");</script>
		<meta http-equiv="refresh" content="0;url=mainconfig.php">
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
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร <?php echo ($Year=DATE("Y",strtotime("now"))+543); ?></title>

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
                         <a href="adminconfig.php">Admin</a>
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
                  <div class="panel-heading">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;Admin</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center>
						
						<div class="row">
						
							<div class="col-xs-4">
							<img src="admin.png" width="120" height="120">
							</div>
							
							<div class="col-xs-4">
							<form>
								<h4><span class="label label-success">ระบบจัดการวันลงบันทึก!</span></h4>
								<br/>
								   <?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='1';");
											$result=mysql_query($query,$con);
											 $row1=mysql_fetch_assoc($result);
												
													 $_SESSION["day1"]=$row1["date"];
													$_SESSION["month"]=$row1["mont"];
									?>

									<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='2';");
											$result=mysql_query($query,$con);
											 $row2=mysql_fetch_assoc($result);
												
													 $_SESSION["day2"]=$row2["date"];
													$_SESSION["month2"]=$row2["mont"];
									?>

								<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='3';");
											$result=mysql_query($query,$con);
											 $row3=mysql_fetch_assoc($result);
												
													 $_SESSION["day3"]=$row3["date"];
													$_SESSION["month3"]=$row3["mont"];
									?>
							<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='4';");
											$result=mysql_query($query,$con);
											 $row4=mysql_fetch_assoc($result);
												
													 $_SESSION["day4"]=$row4["date"];
													$_SESSION["month4"]=$row4["mont"];
									?>

								<select class="form-control" name="savedate">
									<option value="zero">เลือกวันที่ระบบจะทำการบันทึก</option>
									<option value="date1">วันที่<?php  echo " ". $row1["date"]." ".$row1["mont"];?> เช้า</option>
                                    <option value="date12">วันที่<?php  echo " ". $row1["date"]." ".$row1["mont"];?> บ่าย</option>
									<option value="date2">วันที่<?php  echo " ". $row2["date"]." ".$row2["mont"];?> เช้า</option>
                                    <option value="date22">วันที่<?php  echo " ". $row2["date"]." ".$row2["mont"];?> บ่าย</option>
									<option value="date3">วันที่<?php  echo " ". $row3["date"]." ".$row3["mont"];?> เช้า</option>
                                    <option value="date32">วันที่<?php  echo " ". $row3["date"]." ".$row3["mont"];?> บ่าย</option>
									<option value="date4">วันที่<?php  echo " ". $row4["date"]." ".$row4["mont"];?> รอบที่ 1</option>
                                    <option value="date42">วันที่<?php  echo " ". $row4["date"]." ".$row4["mont"];?> รอบที่ 2</option>
								</select>
								<br/>
								<a href="addnow.php">
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-download-alt"> เรียบร้อย</span>
									</button>
								</a>
								<br/><br/>
							</form>
							<?php
								if(!empty($_GET['savedate']))
								{
									if($_GET['savedate']=="zero")
									{
										echo "<p style='color:red;'>กรุณาเลือกวันที่ต้องการทำรายการ!</p><br/>";
									}
									else
									{
										$save=fopen("../sphp/date.txt","w");
										fwrite($save,$_GET['savedate']);
										fclose($save);
										echo "<p style='color:blue;'>ได้ทำการอัพเดทวันเรียบร้อย!</p><br/>";
									}
								}
								else
								{
								
								}
							?>
							</div>
							
							<div class="col-xs-4">
							</div>
							
						</div>
						
						<div class="table-responsive">
							<table class="table table-bordered">
							<tr>
								<th colspan="4" style="text-align:center;" class="info">ขณะนี้กำลังทำรายการของวันที่</th>
							</tr>
							<tr>
							<?php //if($_SESSION['status']== 1){ ?>
							<form role="form" method="POST" action="adddatenow1.php" >
								

								<th style="text-align:center;"><input type="date" name="date1"><button type="send" class="btn btn-success" >
										<span class="glyphicon glyphicon-download-alt" > แก้ไข</span>
									</button> </th>

								</form>

								<form role="form" method="POST" action="adddatenow1.php" >
								

								<th style="text-align:center;"><input type="date" name="date2" ><button type="send" class="btn btn-success" >
										<span class="glyphicon glyphicon-download-alt" > แก้ไข</span>
									</button> </th>

								</form>


								<form role="form" method="POST" action="adddatenow1.php" >
								

								<th style="text-align:center;"><input type="date" name="date3" ><button type="send" class="btn btn-success" >
										<span class="glyphicon glyphicon-download-alt" > แก้ไข</span>
									</button> </th>

								</form>


								<form role="form" method="POST" action="adddatenow1.php" >
								

								<th style="text-align:center;"><input type="date" name="date4" ><button type="send" class="btn btn-success" >
										<span class="glyphicon glyphicon-download-alt" > แก้ไข</span>
									</button> </th>

								</form>
						<?php // } ?>
						
							</tr>
							
							
							
							

							
							<tr class="warning">
								<th style="text-align:center;"><?php  echo "". $row1["date"]." ".$row1["mont"]." ".$row2["year"];?></th>
								<th style="text-align:center;"><?php  echo "". $row2["date"]." ".$row2["mont"]." ".$row2["year"];?></th>
								<th style="text-align:center;"><?php  echo "". $row3["date"]." ".$row3["mont"]." ".$row2["year"];?></th>
								<th style="text-align:center;"><?php  echo "". $row4["date"]." ".$row4["mont"]." ".$row2["year"];?></th>
							</tr>
							<tr>
							<?php 
								$date=file_get_contents("../sphp/date.txt","w");
							?>
								<td style="text-align:center;">
									<?php
										if($date=="date1" or $date=="date12")
										{
											echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>";
											printf("<br>");
											if($date=="date1"){
												echo ("(เช้า)");
												}else{
													echo ("(บ่าย)");
													}
										}
									?>
								</td>
								<td style="text-align:center;">
									<?php
										if($date=="date2" or $date=="date22")
										{
											echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>";
											printf("<br>");
											if($date=="date2"){
												echo ("(เช้า)");
												}else{
													echo ("(บ่าย)");
													}
										}
									?>
								</td>
								<td style="text-align:center;">
									<?php
										if($date=="date3" or $date=="date32")
										{
											echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>";
											printf("<br>");
											if($date=="date3"){
												echo ("(เช้า)");
												}else{
													echo ("(บ่าย)");
													}
										}
									?>
								</td>
                                <td style="text-align:center;">
									<?php
										if($date=="date4" or $date=="date42")
										{
											echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>";
											printf("<br>");
											if($date=="date4"){
												echo ("(รอบที่ 1)");
												}else{
													echo ("(รอบที่ 2)");
													}
										}
									?>
								</td>
							</tr>
								
							</table>
								<?php $checkclick=0;
								
								?>
                                <a href="../im/im.php?st=0">
                               
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-cloud-upload">  อิมพอร์ทข้อมูล</span>
									</button>
									</a>
								<a href="adminconfig.php?checkclick=1">
                                
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-download-alt"> รีเซ็ต</span>
									</button>
									</a>
									
									<?php if(@$_GET['checkclick']==4){?>
										<BR> <font color="red"> <?php echo"**รีเซ็ตสำเร็จ**";?></font>
										<?php
										
										
									} 
									?>
									<?php 
									
									if(@$_GET['checkclick']==1){								
									
									echo"<H3>ต้องการหรือไม่?</H3>";?>
									<a href="adminconfig.php?checkclick=2">
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-download-alt"> ตกลง</span>
									</button>
									</a>
									<a href="adminconfig.php?checkclick=0">
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-download-alt"> ยกเลิก</span>
									</button>
									</a>
									

									<?php
									//echo" [<a href='adminconfig.php?checkclick=2'>ตกลง</a>]";
									//echo" [<a href='adminconfig.php?checkclick=0'>ยกเลิก</a>]";
								
									
									}else if(@$_GET['checkclick']==2 OR@$_GET['checkclick']==3){?>
										
										<BR>
										<BR>
										
									<FORM name="chk" method="POST" action="update.php">
										<INPUT type="password" name="pass" >
										<?php 
										if(@$_GET['checkclick']==3){?>
											<BR> <font color="red"> <?php echo"**รหัสผ่านไม่ถูกต้อง**";?></font>
										<?php
										}
											
										?>
										<BR>
										<BR>
										<button type="send" class="btn btn-success">
										<span class="glyphicon glyphicon-download-alt"> ตกลง </span>
										</button>

										<a href="adminconfig.php?checkclick=0">
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-download-alt"> ยกเลิก</span>
									</button>
									</a>
									</FORM>	

										<?php
									
									}

									
									
									
									?>
									</th>
								




<?php

/**	

		echo"<TABLE>";
		echo"<TR>";
		echo"<TD><H3>ต้องการลบหรือไม่?</H3></TD>";
		echo"</TR>";
		echo"<TR>";
		printf("<TD>[<a href='del_position2.php?id=%s'=>ตกลง</a>]",$_GET["id"]);
		echo" [<a href='c_login.php'>ยกเลิก</a>]</TD>";
		echo"</TR>";
		echo"</TABLE>";
		*/

?>
						</div>
						
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