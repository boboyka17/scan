<?php
	session_start();
  require_once('conn.php');
  //@mysql_query("update user2557 set status='0' where user='".$_SESSION['suser']."';");
  sleep(1);
  session_destroy();
  echo "<meta http-equiv='refresh' content='1;url=../login.php'>";
  $conn->close();
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
      <h3 class="panel-title">
        <center>&nbsp; <span class="glyphicon glyphicon-log-out"></span>&nbsp;การแจ้งเตือน </center>
      </h3>           
    </div>
    <div class="panel-body">
      <center><h3 style="color:red;font-family: 'Kanit'">กำลังนำท่านออกจากระบบกรุณารอซักครู่...</h3><br></center>
    </div>
  </div>
</div>
<div class="col-md-2">
</div>
<script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>