<?php
include('sphp/conn.php');
//include('/sphp/connect.php');
  session_start();
  
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
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
      
      
      
  </head>
  <body onload="document.getElementById('save').focus();" style="font-family: 'Kanit'">
  <div class="container">
        <div class="row">
        <center><img src="head.png"></center>
        </div>
<!---------------------------------------------------------------------------------->

    <div class="row">

      <div class="col-md-12">
        <ul class="breadcrumb">
            <?php if(isset($_SESSION['suser'])){?>
          <li>
            <a href="main.php">หน้าหลัก</a>
          </li>
          <li>
            <a href="main.php">รายการหลัก</a>
          </li>
          <li>
            <a href="menu_1.php">ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ</a>
          </li>
          <li>
            <a href="detail.php">รายละเอียดบัณฑิต</a></li>
            
               <?php }?>
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
					<?php if(!isset($_SESSION['suser'])){?>
							<li>
                              <a href="login.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>

					<?php } ?>
					<li class="active">
						<a href="menu_1.php">
						  <span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a> 
					</li>
					<li>
					  <a href="report/reporsumtotal.php">
						  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
					</li>
					<li>
						<a href="report/reporsumkanatotal.php">
						  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
					</li>
					<?php if(isset($_SESSION['suser'])){?>
					<li>
						<a href="configmenu/mainconfig.php">
						  <span class="glyphicon glyphicon-cog"></span>&nbsp;รายการจัดการระบบ</a>
					</li>
					<?php } ?>
					<?php if(isset($_SESSION['suser'])){?>
					<li>
						<a href="sphp/sessionout.php">
						  <span class="glyphicon glyphicon-off"></span>&nbsp;ออกจากระบบ</a>
					</li>
					<?php } ?>
                </ul> 
          </div>
        </div>
<!---------------------------------------------------------------------------------->
<?php
$date=file_get_contents("sphp/date.txt","w");
$query = $conn->query("select * from scan2557 where std_id=".$_GET['id'].";");
$row = $query->fetch_array();
$row['status'];


///////    คิวรี่ ค่าสถานะ  จาน นาวิน

      
										$chstatus=$conn->query("select * from user2557 where user='".@$_SESSION['suser']."';");
										$showstatus=$chstatus->fetch_array();
										?>


      </div>
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">
              <center>
                &nbsp; รายละเอียดบัณฑิต</center>
            </h3>
          </div>

          <div class="panel-body">
          <div class="alert alert-warning" role="alert">

            <form class="form-horizontal" action="sphp/savedate.php" >
            <div>
              <h3><b><?php echo "รหัสบัณฑิต : ".$row['counteducation'];?></b></h3><center><img src="stdimg/login.png" width="80" height="80"></center>
            </div>
           <div class="panel panel-default">

      <!-- Default panel contents -->
      <div class="panel-heading"><h4>รายละเอียด</h4>

	  <input type="radio" name="status" value="1"  <?php if($row['status']==1){echo "checked";};?>  
	  
	  <?php if(!isset($_SESSION['suser'])or $showstatus['status']==3){echo "disabled";} ?>>ปกติ &nbsp

	  <input type="radio" name="status" value="2" <?php if($row['status']==2){echo "checked";};?>
	  <?php if(!isset($_SESSION['suser'])or $showstatus['status']==3){echo "disabled";} ?>> ตั้งครรภ์ &nbsp

	  <input type="radio" name="status" value="3" <?php if($row['status']==3){echo "checked";};?>
	  <?php if(!isset($_SESSION['suser'])or $showstatus['status']==3){echo "disabled";} ?>> ร่างกายไม่สมบูรณ์ &nbsp&nbsp&nbsp

	  <input type="radio" name="la" value="(ลา)" 
	  <?php if(!isset($_SESSION['suser'])or $showstatus['status']==3){echo "disabled";} ?>> ลา &nbsp

	  <input type="radio" name="savejob" value="2" <?php if($row['savejob']==2){echo "checked";};?> 
	  <?php if(!isset($_SESSION['suser'])or $showstatus['status']==3){echo "disabled";} ?>> ขาดการบันทึก(การมีงานทำ) &nbsp

	  <input type="radio" name="savejob" value="1" <?php echo "checked"; if($row['savejob']==1){echo "checked";};?>
	  <?php if(!isset($_SESSION['suser'])or $showstatus['status']==3){echo "disabled";} ?>> บันทึกแล้ว(การมีงานทำ)

	  
	  <br/>
	 


	  หมายเหตุพิเศษ<input type="text" name="statustext" size="55" value="<?php  echo $row['statustext'];?>" 
	  <?php if(!isset($_SESSION['suser'])or $showstatus['status']==3){echo "disabled";} ?>>
	  </div>


      <!-- Table -->
      <table class="table">
<?php

if(!$row)
{
    echo "<center>ไม่พบรายชื่อบัณฑิณ!</center>";
?>
      </table>
            </div>
            </form>
                    <center><a href="menu_1.php"><button type="button" class="btn btn-danger" id="save"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;กลับ</button></a></center>
<?php
}
else
{
?>
        <tbody>
          <tr>
            <td><h4 style="color:#8181F7;">รหัสนักศึกษา: <input type="text" name="id" value="<?php echo $row['std_id'];?>" size="13"  <?php if(!isset($_SESSION['suser'])or $showstatus['status']==3){echo "disabled";} ?>></h4></td>
            
            
          </tr>
          <tr>
            <td><h4 style="color:#04B431;"><font style="color:#2E2E2E;">ชื่อ-สกุล:</font> <?php echo $row['pre']." ".$row['name']." ".$row['lastname'];?></h4></td>
            
            
          </tr>
          <tr>
	            <td>
	            	<font style="font-size:16px;">การเข้าร่วมฝึกซ้อม</font>
	            	<table class="table" style="color:#B45F04;">
	            		<?php require_once("sphp/connect.php")?>
	            		<tr>
	            			<th style="text-align:center;">
								<?php
								$query = $conn->query("select * from datescan where idday= 1;");
								$row = $query->fetch_array();
									echo "วันที่ ".$row["date"]." เช้า";
								?>
							</th>
                            <th style="text-align:center;">
								<?php
								$query = $conn->query("select * from datescan where idday= 1.2;");
								$row = $query->fetch_array();
									echo "วันที่ ".$row["date"]." บ่าย";
								?>
							</th>
	            			<th style="text-align:center;">
								<?php
								$query = $conn->query("select * from datescan where idday= 2;");
								$row = $query->fetch_array();
									echo "วันที่ ".$row["date"]." เช้า";
								?>
							</th>
                            <th style="text-align:center;">
								<?php
								$query = $conn->query("select * from datescan where idday= 2.2;");
								$row = $query->fetch_array();
									echo "วันที่ ".$row["date"]." บ่าย";
								?>
							</th>
	            			<th style="text-align:center;">
								<?php
								$query = $conn->query("select * from datescan where idday= 3;");
								$row = $query->fetch_array();
									echo "วันที่ ".$row["date"]." เช้า";
								?>
							</th>
                            <th style="text-align:center;">
								<?php
								$query = $conn->query("select * from datescan where idday= 3.2;");
								$row = $query->fetch_array();
									echo "วันที่ ".$row["date"]." บ่าย";
								?>
							</th>
	            			<th style="text-align:center;">
								<?php
								$query = $conn->query("select * from datescan where idday= 4;");
								$row = $query->fetch_array();
									echo "วันที่ ".$row["date"]." รอบที่ 1";
								?>
							</th>
                            <th style="text-align:center;">
								<?php
								$query = $conn->query("select * from datescan where idday= 4;");
								$row = $query->fetch_array();
									echo "วันที่ ".$row["date"]." รอบที่ 2";
								?>
							</th>
	            		</tr>
	            		<tr style="text-align:center;">
	            			<td>
	            				<?php 
								$query = $conn->query("select * from scan2557 where std_id=".$_GET['id'].";");
									$row = $query->fetch_array();
	            					if($row['chdate1']=="" or $row['chdate1']==" ")
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
								$query = $conn->query("select * from scan2557 where std_id=".$_GET['id'].";");
									$row = $query->fetch_array();
	            					if($row['chdate12']=="" or $row['chdate12']==" ")
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
	            					if($row['chdate2']=="" or $row['chdate2']==" ")
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
	            					if($row['chdate22']=="" or $row['chdate22']==" ")
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
	            					if($row['chdate3']=="" or $row['chdate3']==" ")
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
	            					if($row['chdate32']=="" or $row['chdate32']==" ")
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
	            					if($row['chdate4']=="" or $row['chdate4']==" ")
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
	            					if($row['chdate42']=="" or $row['chdate42']==" ")
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
                            if(isset($_SESSION['suser'])){
										if($date=="date1"){
											echo "<h4><span class='glyphicon glyphicon-hand-up'></span> บันทึก</h4>";
                                        }
                                }else{
                                $qla = $conn->query("select * from scan2557 where std_id=".$_GET['id']." and chdate1 like '%(ลา)%';");
                                            $nla = $qla->num_rows();
                                            if($nla!=0){
                                               echo "<h4><span</span>(ลา)</h4>";
                                            }
                                }
									?>
								</td>
                                <td>
									<?php
                            if(isset($_SESSION['suser'])){
										if($date=="date12")
										{
											echo "<h4><span class='glyphicon glyphicon-hand-up'></span> บันทึก</h4>";
                                            
										}
                                }else{
                                $qla = $conn->query("select * from scan2557 where std_id=".$_GET['id']." and chdate12 like '%(ลา)%';");
                                            $nla = $qla->num_rows();
                                            if($nla!=0){
                                               echo "<h4><span</span>(ลา)</h4>";
                                                
                                            }
    
                                }
									?>
								</td>
								<td>
									<?php
                            if(isset($_SESSION['suser'])){
										if($date=="date2"){
											echo "<h4><span class='glyphicon glyphicon-hand-up'></span> บันทึก</h4>";  
										}
                                }else{
                                $qla = $conn->query("select * from scan2557 where std_id=".$_GET['id']." and chdate2 like '%(ลา)%';");
                                            $nla = $qla->num_rows();
                                            if($nla!=0){
                                               echo "<h4><span</span>(ลา)</h4>";
                                                
                                            }
    
                                }
									?>
								</td>
                                <td>
									<?php
                            if(isset($_SESSION['suser'])){
										if($date=="date22")
										{
											echo "<h4><span class='glyphicon glyphicon-hand-up'></span> บันทึก</h4>";
                                            
										}
                                }else{
                                $qla = $conn->query("select * from scan2557 where std_id=".$_GET['id']." and chdate22 like '%(ลา)%';");
                                            $nla = $qla->num_rows();
                                            if($nla!=0){
                                               echo "<h4><span</span>(ลา)</h4>";
                                                
                                            }
    
                                }
									?>
								</td>
								<td>
									<?php
                            if(isset($_SESSION['suser'])){
										if($date=="date3")
										{
											echo "<h4><span class='glyphicon glyphicon-hand-up'></span> บันทึก</h4>";
                                            
										}
                                }else{
                                $qla = $conn->query("select * from scan2557 where std_id=".$_GET['id']." and chdate3 like '%(ลา)%';");
                                            $nla = $qla->num_rows();
                                            if($nla!=0){
                                               echo "<h4><span</span>(ลา)</h4>";
                                                
                                            }
    
                                }
									?>
								</td>
                                <td>
									<?php
                            if(isset($_SESSION['suser'])){
										if($date=="date32")
										{
											echo "<h4><span class='glyphicon glyphicon-hand-up'></span> บันทึก</h4>";
                                            
										}
                                }else{
                                $qla = $conn->query("select * from scan2557 where std_id=".$_GET['id']." and chdate32 like '%(ลา)%';");
                                            $nla = $qla->num_rows();
                                            if($nla!=0){
                                               echo "<h4><span</span>(ลา)</h4>";
                                                
                                            }
    
                                }
									?>
								</td>
								<td>
									<?php
                            if(isset($_SESSION['suser'])){
										if($date=="date4")
										{
											echo "<h4><span class='glyphicon glyphicon-hand-up'></span> บันทึก</h4>";
                                            
										}
                                }else{
                                $qla = $conn->query("select * from scan2557 where std_id=".$_GET['id']." and chdate4 like '%(ลา)%';");
                                            $nla = $qla->num_rows();
                                            if($nla!=0){
                                               echo "<h4><span</span>(ลา)</h4>";
                                                
                                            }
    
                                }
									?>
								</td>
                                <td>
									<?php
                            if(isset($_SESSION['suser'])){
										if($date=="date42")
										{
											echo "<h4><span class='glyphicon glyphicon-hand-up'></span> บันทึก</h4>";
                                            
										}
                                }else{
                                $qla = $conn->query("select * from scan2557 where std_id=".$_GET['id']." and chdate42 like '%(ลา)%';");
                                            $nla = $qla->num_rows();
                                            if($nla!=0){
                                               echo "<h4><span</span>(ลา)</h4>";
                                                
                                            }
    
                                }
									?>
								</td>
							</tr>
	            	</table>
	            </td>
          </tr>
        </tbody>
        </table>
    </div>

					

					 <?php if( isset($_SESSION['suser']) and  $showstatus['status']!=3){ ?>
                    <center><button type="submit" class="btn btn-danger" id="save"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;ลงบันทึก</button></center>
					 <?php }else { ?>
					 <center><a href="menu_1.php">
									<button type="button" class="back">
										<span class="glyphicon glyphicon-cog"> ย้อนกลับ</span>
									</button>
								</a>
								</center>
								
								
								 <?php } ?>
            </form>
<?php
}
include('sphp/cconn.php');
?>
                  </div>
          </div>
      </div>
          </body>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>
	
  </body>
  <center> Copyright © by สาขาวิทยาการคอมพิวเตอร์  คณะวิทยาศาสตร์และเทคโนโลยี  2017
</html>
<?php

?>