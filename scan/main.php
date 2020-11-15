<?php
  session_start();
  if(!isset($_SESSION['suser']))
  {
    echo "<meta http-equiv='refresh' content='1;url=fail-login.php'>";
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
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

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
      <center><img src="head.png"></center>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li>
            <a href="main.php">หน้าหลัก</a>
          </li>
          <li>
            <a href="main.php">รายการหลัก</a>
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
            <ul class="nav nav-list">
							<li class="active" >
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
							<li>
								<a href="configmenu/mainconfig.php">
								<span class="glyphicon glyphicon-cog"></span>&nbsp;รายการจัดการระบบ</a>
							</li>
              <li>
                <a href="sphp/sessionout.php">
								<span class="glyphicon glyphicon-off"></span>&nbsp;ออกจากระบบ</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">
              <center>
                &nbsp; ระบบสรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร</center>
            </h3>
          </div>
          <div class="panel-body">
            <div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              ยินดีต้อนรับคุณ :<strong> <?php echo $_SESSION['suser'];?> </strong>เข้าสู่ระบบ</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
<?php

  }

?>