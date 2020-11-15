
<?php
include('../sphp/conn.php');
	session_start();
	date_default_timezone_set('Asia/Bangkok');
	if($_SESSION['suser']!="admin")
	{
?>		
		<meta charset="utf-8">
		<script>alert("สามารถใช้งานส่วนนี้ได้เฉพาะผู้ดูแลระบบเท่านั้น!");</script>
		<meta http-equiv="refresh" content="0;url=../main.php">
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
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
<div id="top" ></div>
  </head>
  <body onload="document.getElementById('save').focus();">
  <style media="print">
  .noPrint{ display: none; }
  .yesPrint{ display: block !important; }
	</style>
  <div class="container">
        <div class="row noPrint">
        <center><img src="../head.png"></center>
        </div>
<!---------------------------------------------------------------------------------->

    <div class="row">

      <div class="col-md-12 noPrint">
        <ul class="breadcrumb">
          <li><a href="../configmenu/adminconfig.php">กลับ</a></li>
       
        
        </ul>
      </div>

    </div>
    <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              อิมพอร์ทข้อมูล
            </center>
          </h3>
      </div>
        <div class="panel-body">
          <p></p>
          <? if($_GET['st'] != 2){
          
			?>

         <form action="imm.php" method="post" enctype="multipart/form-data">
          <table class="table table-bordered table2excel">
         
            <thead>
              <tr class="info">
                
                <th ><center>
                  เลือกไฟล์
                  </center>
              </th>
                
                <th>
                <input type="file" name="filUpload">
                </th>
              </tr>
              
			 
            </thead>
            <tbody>
            </tbody>
          </table>
          </tbody>
            
          </table>
          <p align="center">
           <INPUT type="password" name="pass" >
          
           <BR>
           <? if($_GET['st'] == 1){?> <font color="red"> <?php echo"**อิมพอร์ทไม่สำเร็จ**";?></font><? }?>
           <BR>
           <BR>
            <input name="printt" class="noPrint btn btn-success btn-md" type="submit" value ="ตกลง" >
        
          </p>
         
										
										
										
          </form>
            
          
            <?  }else{
			  ?>
              <div align="center">
              <p><font color="blue"> อิมพอร์ทสำเร็จ </font></p>
              
              <p>
            <a href="../main.php">
              <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-retweet"> กลับ</span>
              </button>
            </a></p>
            </div>
            <?
			  }?>
            
          
          <p>&nbsp;</p>
          
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
include('../sphp/cconn.php');
	}
?>