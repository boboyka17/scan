<?php
	session_start();
	$_SESSION['suser']=$_POST['user'];
	echo "<meta http-equiv='refresh' content='1;url=../main.php'>";
    //mysql_query("update user2557 set status='1' where user='".$_POST['user']."';");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  </head>
<body>

<div class="col-md-2">
</div>
<div class="col-md-8">
				<br></br>
              <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title" style="font-family: 'Kanit'">
                          <center>&nbsp; <span class="glyphicon glyphicon-log-out"></span>&nbsp;การแจ้งเตือน </center>
                     </h3>           
                  </div>
          
                    <div class="panel-body" style="font-family: 'Kanit'"> 
                        <center>
                        <h3 style="color:blue;">กำลังนำท่านเข้าสู่ระบบกรุณารอซักครู่...</h3>
                          <br></br>
                        </center>
                    </div>
        </div>
</div>
<div class="col-md-2">
</div>
<script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>