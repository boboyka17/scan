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
										$chstatus=mysql_query("select * from user2557 where user='".$_SESSION['suser']."';");
										$showstatus=mysql_fetch_array($chstatus);
										?>
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;รายการจัดการระบบ</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center>
						<img src="admin.png" width="120" height="120">
						<br/><br/>
						<div class="row">
						
							<div class="col-xs-4">
								<?php if($showstatus['status']==1 or $showstatus['status']==0 or $showstatus['status'] == 9){ ?>
								<a href="canceldate.php">
									<button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-cog"> ระบบถอนสแกน</span>
									</button>
								</a>
						<?php	} ?>
								<br/><br/>
								<a href="reportp1.php">
									<button type="button" class="btn btn-success">
										<span class="glyphicon glyphicon-cog"> รายงานผลพิเศษ(วุฒิ)</span>
									</button>
								</a>
								<br/><br/>
								<a href="reportpjob.php">
									<button type="button" class="btn btn-info">
										<span class="glyphicon glyphicon-cog"> รายงานลงข้อมูลการทำงาน</span>
									</button>
								</a>
							</div>
							
							<div class="col-xs-4">
							<?php
										
										if($showstatus['status']==1 or $showstatus['status']==9)
										{
									?>
							
								<a href="search.php">
									<button type="button" class="btn btn-warning">
										<span class="glyphicon glyphicon-cog"> ค้นหาแบบพิเศษ</span>
									</button>
								</a>
								<?php 
									}
								?>

								<br/><br/>
								<a href="reportp2.php">
									<button type="button" class="btn btn-info">
										<span class="glyphicon glyphicon-cog"> รายงานผลพิเศษ(คณะ)</span>
									</button>
								</a>
								<br/><br/>
								<a href="reporttext.php">
									<button type="button" class="btn btn-warning">
										<span class="glyphicon glyphicon-cog"> รายงานผล ReMark</span>
									</button>
								</a>
							</div>
							
							<div class="col-xs-4">
								<a href="reportpl.php">
									<button type="button" class="btn btn-success">
										<span class="glyphicon glyphicon-cog"> รายงานผลพิเศษ(ลา)</span>
									</button>
								</a>
								<br/><br/>
								<a href="reportp3.php">
									<button type="button" class="btn btn-warning">
										<span class="glyphicon glyphicon-cog"> รายงานยอดบัณฑิตทั้งหมดทั้งมวล</span>
									</button>
								</a>

								<br/><br/>
								<?php
										
										if($showstatus['status']==1)
										{
									?>
								<a href="adminconfig.php">
									<button type="button" class="btn btn-primary">
										<span class="glyphicon glyphicon-cog"> เฉพาะผู้ดูแลระบบเท่านั้น!</span>
									</button>
								</a>
								
								<?php 
									}
								?>
							</div>
						
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