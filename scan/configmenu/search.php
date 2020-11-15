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
  <body onload="document.getElementById('text').focus();" style="font-family: 'kanit'">
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
                         <a href="search.php">ค้นหาแบบพิเศษ</a>
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
                          <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;ค้นหาแบบพิเศษ</center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					<center>
						
						<div class="row">
						
							<div class="col-xs-4">
							<img src="admin.png" width="120" height="120">
							</div>
							<form method="POST">
								<div class="col-xs-4">
									<h4><span class="label label-success">กรุณาป้อนเลือกประเภทที่ต้องการค้นหา!</span></h4>
									<br/>
									
										<input type="radio" name="typekeyword" value="counteducation" checked> รหัสบัณฑิต 
										<!--<input type="radio" name="typekeyword" value="std_id"> Barcode &nbsp-->
										<input type="radio" name="typekeyword" value="name"> ชื่อ 
										<!--<input type="radio" name="typekeyword" value="card_id"> บัตรนักศึกษา<br>-->
										<!--<input type="radio" name="typekeyword" value="lastname"> สกุล &nbsp-->


<!-- ปุ่มเลือกจากน้อยไปมาก จากมากไปน้อย
<input type="radio" name="oder" value=" ORDER BY `<?php echo $_POST['typekeyword'];?>`ASC" checked> เรียงจากน้อยไปมาก &nbsp
									<input type="radio" name="oder" value="ORDER BY `<?php echo $_POST['typekeyword'];?>`DESC" > เรียงจากมากไปน้อย &nbsp-->
</form>
									
									<br/><br/>
									<input type="text" class="form-control" id="text" placeholder="คำที่ต้องการค้นหา" name="keyword">
									<br/>

									<BR>
 										<button type="submit" class="btn btn-warning">
											<span class="glyphicon glyphicon-search" style="font-family: 'Kanit'"> ค้นหา</span>
										</button>
								</div>
								
								<div class="col-xs-4">
								</div>
							
						</div>
            <br/>
			<center>
			<table class="table table-bordered">
				<tr class="success">
					<th style="text-align:center;">เลขที่บัณฑิต</th>
					<th style="text-align:center;">รหัส</th>
					<th style="text-align:center;">ชื่อ สกุล</th>
					<th style="text-align:center;">บันทึก</th>
					<th style="text-align:center;">แก้ไข</th>
				</tr>
<?php
	if(!empty($_POST['typekeyword']) and !empty($_POST['keyword'])){
		
		$a='%';
		$sql = sprintf("select * from scan2557  where %s like'%s%s' ORDER BY `%s`ASC;",$_POST['typekeyword'],$_POST['keyword'],$a,$_POST['typekeyword']);
//sql แบบเลือกจากน้อยไปมากจากมาไปน้อย
/*$sql = sprintf("select * from scan2557  where %s like'%s%s%s' ORDER BY `%s`ASC;",$_POST['typekeyword'],$a,$_POST['keyword'],$a,$_POST['typekeyword']);*/


		$query=$conn->query($sql);
		$row=$query->num_rows;
		if($row==0)
		{
			echo "<center><h4 style='color:green;'>ไม่พบข้อมูลที่ค้นหา!</h4></center>";
		}
		else
		{
			while($row=$query->fetch_array())
			{
				?>
				<tr>
					<td><?php echo $row['counteducation'];?></td>
					<td><?php echo $row['std_id'];?></td>
					<td><?php echo $row['pre']." ".$row['name']." ".$row['lastname'];?></td>
					<td>
						<center>
							<a href="../detail.php?id=<?php echo $row['std_id'];?>">
								<button type="button" class="btn btn-info">
									<span class="glyphicon glyphicon-ok"> บันทึก</span>
								</button>
							</a>
						</center>
					</td>
					<td>
						<center>
							<a href="edit.php?std_id=<?php echo $row['std_id'];?>">
								<button type="button" class="btn btn-active">
									<span class="glyphicon glyphicon-pencil"> แก้ไข</span>
								</button>
							</a>
						</center>
					</td>
				</tr>
				<?php
			}
		}
		$conn->close();
	}
	else
	{
	}
?>
			</table>
			</center>
<?php
}
?>
</div>
</div>
<center> Copyright © by สาขาวิทยาการคอมพิวเตอร์  คณะวิทยาศาสตร์และเทคโนโลยี  2020</center>