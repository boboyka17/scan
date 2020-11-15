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
                          <a href="main.php">หน้าหลัก</a>
                        </li>
                        <li>
                         <a href="main.php">รายการหลัก</a>
                        </li>
                        <li>
                        <a href="menu_2-0.php">รายงานสรุปตามปริญญา</a>
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
<?php
	if(!isset($_SESSION['suser']))
 	{
?>
								<li class="active">
                              <a href="login.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>
							 <li>
							<a href="menu_1.php">
							<span class="glyphicon glyphicon-info-sign"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ</a>
							</li>
 	   						<li ">
                            	<a href="menu_2-0.php">
                                	<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                            </li>
                            <li>
                                <a href="menu_3-0.php">
                                	<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                            </li>
<?php
 	}
  	else
  	{
?>
	                    <li class="active">
                            <a href="menu_1.php">
								<span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a> 
                        </li>
                        <li >
                            <a href="menu_2-0.php">
								<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                        </li>
                        <li>
                            <a href="menu_3-0.php">
								<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                        </li>
						<li>
                            <a href="configmenu/mainconfig.php">
								<span class="glyphicon glyphicon-cog"></span>&nbsp;รายการจัดการระบบ</a>
                        </li>
                        <li>
                            <a href="sphp/sessionout.php">
								<span class="glyphicon glyphicon-off"></span>&nbsp;ออกจากระบบ</a>
                        </li>
<?php
}
?>
                        </ul>

                    </div>
                </div>
          </div>

          <!-- +++++++++++++++++++++ END OF MENU-BAR ++++++++++++++++++++++++-->


      
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;เข้าสู่ระบบ</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
                           <form role="form" method="POST" action="ch80.php">
								<center>
                                <div class="form-group">
                                  <label for="exampleUsername">ป้อนตัวเลขที่จะจัดแถวแบบปกตื</label>
                                  <input   name="taw"  type="radio" value = "40" checked> 40 คนต่อแถว
								  <input   name="taw"  type="radio" value = "80"> 80 คนต่อแถว
                                </div>
                                </center>
                                <center>
                                  <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    &nbsp;ใส่ตัวเลข</button>
                                </center>
                            </form>
							<br>
							<form role="form" method="POST" action="noch80.php">
								<center>
                                <div class="form-group">
                                  <label for="exampleUsername">ป้อนตัวเลขที่จะจัดแถวพิเศษ</label>
                                  <input   name="taw"  type="radio" value = "40" checked> 40 คนต่อแถว
								  <input   name="taw"  type="radio" value = "80"> 80 คนต่อแถว
                                </div>
                                </center>
                                <center>
                                  <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    &nbsp;ใส่ตัวเลข</button>
                                </center>
                            </form>
                    </div>
        </div>

            <!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>