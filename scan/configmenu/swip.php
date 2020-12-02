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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ระบบสลับตำแหน่ง</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center>
						
						<div class="row">
						
							<div class="col-xs-4">
							<img src="admin.png" width="120" height="120">
							</div>
							
							<div class="col-xs-4">
								<form name="frm_input" method="get">
                  <br>
                  <font color="RED">
                  <?php 
                    if(isset($_GET["cmd"])){
                      switch($_GET["cmd"]){
                        case 'succ': echo "สลับตำแหน่งสำเร็จ!!!!! <br><br>"; break;
                        case 'failed': echo "เกิดข้อผิดพลาดบางอย่าง <br><br>"; break;
                      }
                    }
                  ?>
                  </font>
									<input type="text" class="form-control" id="from" placeholder="ลำดับ/รหัสนักศึกษา" name="from" min="1">
									<br>
									<button type="submit" class="btn btn-warning">
										<span class="glyphicon glyphicon-search" style="font-family: 'kanit'"> เริ่มระบบ</span>
									</button>
								</form>
							</div>
							
							<div class="col-xs-4">
							</div>
						</div>
<br/>
<form name="frm_show" method="GET" action="act_swip.php">
	<table class="table">
	<?php
		if(!empty($_GET['from'])){
			$date=file_get_contents("../sphp/date.txt","w");
			$query = $conn->query("select * from scan2557 where count=".$_GET['from']." or std_id=".$_GET['from'].";");
			$row = $query->fetch_assoc();
			if(!$row){
				echo "<center>ไม่พบรายชื่อบัณฑิณ!</center>";
			}else{
	?>
	<tbody>
    <tr>
      <td>
        <h4><font>ลำดับเดิม:</font> <?php echo $row['count'];?></h4>
      </td>
    </tr>
		<tr>
			<td>
				<h4><font>รหัสนักศึกษา:</font> <?php echo $row['std_id'];?></h4>
			</td>
		</tr>
		<tr>
			<td>
				<h4><font>ชื่อ-สกุล:</font> <?php echo $row['pre']." ".$row['name']." ".$row['lastname'];?></h4>
			</td>
		</tr>
    <tr>
      <td>
        <div class="row">
        <input type="number" class="form-control" id="fr" placeholder="ลำดับเดิม" name="fr" readonly="" value="<?php echo $row["count"]; ?>" style="width: 10%;margin-left: 15">
        <input type="number" class="form-control" id="to" placeholder="ลำดับใหม่" name="to" min="1" style="width: 85%" required="">
      </div>
      </td>
    </tr>
		<tr>
			<td>
	<center>
		<h4 style="color:red;">
		<?php
			echo "klk";
		?>
		</h4>
	</center>
			</td>
		</tr>
	</tbody>
	</table>
  <input type="submit" class="btn btn-danger">
</form>
	<?php
	
	}
}else{

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
<?php $conn->close(); ?>

