﻿<?php
  session_start();
  date_default_timezone_set('Asia/Bangkok');
  include('../sphp/conn.php');
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร <?php echo ($Year=DATE("Y",strtotime("now"))+543); ?></title>
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
        <center><img src="../headnew.png"></center>
        </div>
<!---------------------------------------------------------------------------------->

    <div class="row">

      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="../configmenu/mainconfig.php"> <input name="back" class="noPrint btn btn-success btn-md" type="button" value ="กลับ"></a></li>
        </ul>
      </div>

    </div>
    <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              รายงาน    <?php
			   $date=file_GET_contents("..//sphp/date.txt","w");
			   $_POST['date']=$date;
			  if($_POST['date'] == "date1"){
				  $query=sprintf("SELECT * FROM datescan WHERE idday='1';");
				  $p="เช้า";
				  }
			else if($_POST['date'] == "date12"){
				  $query=sprintf("SELECT * FROM datescan WHERE idday='1';");
				  $p="บ่าย";
				  }
			else if($_POST['date'] == "date2"){
				  $query=sprintf("SELECT * FROM datescan WHERE idday='2';");
				  $p="เช้า";
				  }
			else if($_POST['date'] == "date22"){
				  $query=sprintf("SELECT * FROM datescan WHERE idday='2';");
				  $p="บ่าย";
				  }
			else if($_POST['date'] == "date3"){
				  $query=sprintf("SELECT * FROM datescan WHERE idday='3';");
				  $p="เช้า";
				  }
			else if($_POST['date'] == "date32"){
				  $query=sprintf("SELECT * FROM datescan WHERE idday='3';");
				  $p="บ่าย";
				  }
			else if($_POST['date'] == "date4"){
				  $query=sprintf("SELECT * FROM datescan WHERE idday='4';");
				  $p="รอบที่ 1";
				  }
			else if($_POST['date'] == "date42"){
				  $query=sprintf("SELECT * FROM datescan WHERE idday='4';");
				  $p="รอบที่ 2";
				  }
				 
											$result=$conn->query($query,$con);
											 $row1=$result->fetch_assoc();
											 echo "วันที่"." ".$row1["date"]." ".$row1["mont"]." ".$row1["year"]." ".$p;
											 
											 ?>      
            </center>
          </h3>
      </div>
        <div class="panel-body">
          <p>
          
          
          
          
          
          
          
          </p>
          
          <div align="center"></div>
          <p align="center"><a href="chairtotal.php"><input name="re" class="noPrint btn btn-success btn-md" type="button" value ="แบ่งสองรอบ"></a> || 
		  <a href="chairsumtotal.php"><input name="re" class="noPrint btn btn-success btn-md" type="button" value ="รอบรวม"></a></p>
          <div align="center">
            <table class="table table-bordered table2excel">
              <thead>
                
                <tr class="info">
                  <th><center>
                    ชื่อปริญญา
                  </center></th>
                  <th><center>
                    จำนวน
                  </center></th>
                  <th><center>
                    ลำดับ
                  (เริ่มต้น)
                  </center></th>
                  <th><center>
                    ลำดับ
                  (สิ้นสุด)
                  </center></th>
                </tr>
                <tr class="warning">
                  <td>ดุษฎีบันฑิต</td>
                  <td><div align="left">
                    <?php 
					$sum=0;
			$r = 1;
			
			$query = $conn->query("select * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">มหาบัณฑิต</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%มหาบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                
              </thead>
              <tbody>
                <tr class="warning">
                  <td><div align="left">ครุศาสตรบัณฑิต(ค.บ.)</div></td>
                  <td><div align="left">
                    <?php 
					$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";

			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">นิติศาสตรบัณฑิต(น.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">รัฐประศาสนศาสตรบัณฑิต(รป.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">รัฐศาสตรบัณฑิต(ร.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)</div></td>
                 <td><div align="left">
                   <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                 </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">ศิลปศาสตรบัณฑิต(ศศ.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">พยาบาลศาสตรบัณฑิต(พย.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">บริหารธุรกิจบัณฑิต(บธ.บ.)</div></td>
                 <td><div align="left">
                   <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                 </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">บัญชีบัณฑิต(บช.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">เศรษฐศาสตรบัณฑิต(ศ.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">วิทยาศาสตรบัณฑิต(วท.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">นิเทศศาสตรบัณฑิต(นศ.บ.)</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'  and ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext is null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td><div align="left">
                    <?php  if($total!=0) echo $sum;
					else echo "-";?>
                  </div></td>
                </tr>
                <tr class="warning">
                  <td><div align="left">พิเศษ</div></td>
                  <td><div align="left">
                    <?php 
			$r+=$total;
			$query = $conn->query("SELECT * FROM `scan2557` WHERE statustext like '%p%'  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			$sum+=$total;
			?>
                  </div></td>
                  <td><div align="left">
                    <?php if($total!=0) echo $r;
					else echo "-";?>
                  </div></td>
                  <td class="danger"><div align="left">
                    <?php   echo $sum;
					?>
                  </div></td>
                </tr>
                
              </tbody>
            </table>
            
            </tbody>
            
            </table>
          </div>
          <p align="center">
            <input name="print" class="noPrint btn btn-success btn-md" type="button" value ="Print" onClick="window.print()">
            <input name="printt" class="noPrint btn btn-success btn-md" type="button" value ="Excel" onClick="printt()">
           
          </p>
        </div>
  </div>
  </body>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>
	
  </body>
  <center> Copyright © by สาขาวิทยาการคอมพิวเตอร์  คณะวิทยาศาสตร์และเทคโนโลยี  2020
</html>
<?php
include('../sphp/cconn.php');
?>