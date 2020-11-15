<?php
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
        <div class="row noPrint">
        <center><img src="head.png"></center>
        </div>
<!---------------------------------------------------------------------------------->

    <div class="row">

      <div class="col-md-12">
        <ul class="breadcrumb noPrint">
          <li><a href="reportotalchair.php">กลับ</a></li>
        </ul>
      </div>

    </div>
    <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              รายงานสรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร    <?php
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
											 echo "( วันที่"." ".$row1["date"]." ".$row1["mont"]." ".$row1["year"]." ".$p." )";
											 
											 ;?>      
            </center>
          </h3>
      </div>
        <div class="panel-body">
          <p>
          
          
          
          
          
          
          
          </p>
          
          <div align="center"></div>
          <p align="right"></p>
          <table class="table table-bordered table2excel">
         
            <thead>
              <tr class="info">
                <th rowspan="2"><center>
                  รอบแรก
                </center></th>
                <th ><center>
                  ค.บ.
                </center></th>
                <th ><center>
                  น.บ.
                </center></th>
                <th ><center>
                  รป.บ.
                </center></th>
                <th ><center>
                  ร.บ.
                </center></th>
                <th ><center>
                  ศป.บ.
                </center></th>
                <th><center>
                  ศศ.บ.
                </center></th>
                <th ><center>
                  พย.บ.
                </center></th>
                <th  ><center>
                  รวม
                </center></th>
              </tr>
              <tr class="warning">
                <td><div align="left">
                  <?php 
			$query = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </div></td>
                <td ><div align="left">
                  <?php 
			$query = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </div></td>
                <td><div align="left">
                  <div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div>
                </div></td>
                <td ><div align="left">
                  <div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div>
                </div></td>
                <td><div align="left">
                  <?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </div></td>
                <td><div align="left">
                  <?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total=$query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </div></td>
                <td><div align="left">
                  <div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div>
                </div></td>
                <td><a href="chair.php?st=1"><div align="left"><?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and ch".$_POST['date']." !=''  ;",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></div></a></td>
              </tr>
              <tr class="info">
                <th rowspan="2"><center>
                  รอบสอง
                </center></th>
                <th ><center>
                ป.เอก
                </center></th>
                <th ><center>
                ป.โท
                </center></th>
                <th ><center>
                  บธ.บ.
                </center></th>
                <th ><center>
                บช.บ.
                </center></th>
                <th><center>
                ศ.บ.
                </center></th>
                <th><center>
                  วท.บ.
                </center></th>
                <th><center>
                นศ.บ.
                </center></th>
                <th ><center>
                  รวม
                </center></th>
              </tr>
              <tr class="warning">
                <td><div align="left">
                  <?php 
			$query = $conn->query("select * from scan2557 where education like '%ดุษฎีบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </div></td>
                <td ><div align="left">
                  <div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where education like '%มหาบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div>
                </div></td>
                <td ><div align="left">
                  <div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div>
                </div></td>
                <td ><div align="left">
                  <?php 
			$query = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </div></td>
                <td><div align="left">
                  <div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div>
                </div></td>
                <td><div align="left">
                  <?php 
			$query = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </div></td>
                <td><div align="left">
                  <?php 
			$query = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </div></td>
                <td><a href="chair.php?st=2"><div align="left"><?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%' or education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></div></a></td>
              </tr>
              <tr class=" info">
              <th colspan="8" class="danger"><div align="center">รวมทั้งสิ้น</div>
				</th> 
       			 <td class="danger"><div align="center"><?php 
			$query = $conn->query("select * from scan2557 where ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></div>
				</td>

            </tr>
            
            </thead>
          </table>
            
            <table class="table table-bordered table2excel">
           
            <thead>
            <tr class="info">
            <th colspan="5"><center>
              บัณฑิต
                  รอบแรก
                </center></th>
              </tr>
              <tr class="info">  
                <th ><center>
                  ปริญญา
                </center></th>
                <th ><center>
                  มา
                </center></th>
                <th width="100"><center>
                  มีครรภ์
                </center></th>
                <th ><center>
                  พิเศษ
                </center></th>
                <th><center>
                  รวมบัณฑิตเข้ารับฯ
                </center></th>
                
              </tr>
              <tr class="warning">
                <td>ครุศาสตรบัณฑิต(ค.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'   and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%'  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>นิติศาสตรบัณฑิต(น.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null)  and ch".$_POST['date']." !=''; ",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'  and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>รัฐประศาสนศาสตรบัณฑิต(รป.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>รัฐศาสตรบัณฑิต(ร.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null)  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%รัฐศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'  and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td height="43">ศิลปศาสตรบัณฑิต(ศศ.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'  and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td height="43">พยาบาลศาสตรบัณฑิต(พย.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="danger">
                <td>รวมบัณฑิตปริญญาตรีรอบแรก</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and ch".$_POST['date']." !=''  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) ;",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and status=2 and ch".$_POST['date']." !=''  and (statustext like '%p%' or statustext like '%P%');",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' ) and status=3 and ch".$_POST['date']." !='' and (statustext like '%p%' or statustext like '%P%');",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><a href="chair.php?st=1">
                  <div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div>
                </a></td>
</tr>
            </thead>
            <tbody>
            </tbody>
        
            <thead>
              <tr class="info">
                <th colspan="5"><center>
                  บัณฑิต
                  รอบสอง
                </center></th>
              </tr>
              <tr class="info">
                <th ><center>
                  ปริญญา
                </center></th>
                <th ><center>
                  มา
                </center></th>
                <th ><center>
                  มีครรภ์
                </center></th>
                <th ><center>
                  พิเศษ
                </center></th>
                <th><center>
                  รวมบัณฑิตเข้ารับฯ
                </center></th>
              </tr>
              <tr class="warning">
                <td>ดุษฎีบันฑิต</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%ดุษฎีบัณฑิต%' and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%ดุษฎีบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%ดุษฎีบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>มหาบัณฑิต</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%มหาบัณฑิต%' and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%มหาบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' )  and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%มหาบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%มหาบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="danger">
                <td>รวม ดุษฎีบันฑิต/มหาบัณฑิต</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where  (level like '%ปริญญาโท%' or  level like '%ปริญญาเอก%') and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where (level like '%ปริญญาโท%' or  level like '%ปริญญาเอก%') and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where  (level like '%ปริญญาโท%' or  level like '%ปริญญาเอก%') and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where  (level like '%ปริญญาโท%' or  level like '%ปริญญาเอก%') and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>บริหารธุรกิจบัณฑิต(บธ.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' )  and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'  and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>บัญชีบัณฑิต(บช.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%บัญชีบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>เศรษฐศาสตรบัณฑิต(ศ.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%' and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null)  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%เศรษฐศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>วิทยาศาสตรบัณฑิต(วท.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>นิเทศศาสตรบัณฑิต(นศ.บ.)</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null)  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%'   and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="danger">
                <td>รวมบัณฑิตปริญญาตรีรอบสอง</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%' or education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )   and ch".$_POST['date']." !=''  and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null);",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%' or education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and status=2 and ch".$_POST['date']." !='' and (statustext like '%p%' or statustext like '%P%');",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%' or education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and status=3 and ch".$_POST['date']." !='' and (statustext like '%p%' or statustext like '%P%');",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><a href="chair.php?st=2">
                  <?php 
			$query = $conn->query("select * from scan2557 where ( education like '%ดุษฎีบัณฑิต%' or education like '%มหาบัณฑิต%' or education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                </a></td>
              </tr>
            </thead>
            <tbody>
            </tbody>
         
            <thead>
              <tr class="info">
                <th colspan="5"><center>
                  รวม
                </center></th>
              </tr>
              <tr class="info">
                <th  ><center>
                  ปริญญา
                </center></th>
                <th ><center>
                  มา
                </center></th>
                <th  ><center>
                  มีครรภ์
                </center></th>
                <th  ><center>
                  พิเศษ
                </center></th>
                <th ><center>
                  รวมบัณฑิตเข้ารับฯ
                </center></th>
              </tr>
              <tr class="warning">
                <td>ดุษฎีบันฑิต</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาเอก%' and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาเอก%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาเอก%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาเอก%' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>มหาบัณฑิต</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาโท%' and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาโท%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาโท%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td> <?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาโท%' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="warning">
                <td>บัณฑิต</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาตรี%' and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null)  and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาตรี%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=2 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาตรี%' and (statustext  like '%p%' or statustext  like '%P%' ) and status=3 and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where  level like '%ปริญญาตรี%'and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
              <tr class="danger">
                <td>รวม</td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where   ch".$_POST['date']." !='' and (statustext not like '%p%' or statustext not like '%P%' or statustext is  null) ;",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where  status=2 and ch".$_POST['date']." !='' and (statustext  like '%p%' or statustext  like '%P%');",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td ><?php 
			$query = $conn->query("select * from scan2557 where   status=3 and ch".$_POST['date']." !='' and (statustext  like '%p%' or statustext  like '%P%' );",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
                <td><?php 
			$query = $conn->query("select * from scan2557 where  ch".$_POST['date']." !='' ;",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?></td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
       
          
        </div>
        <p align="center" class="noPrint">
           <input name="print" class="noPrint btn btn-success btn-md" type="button" value ="Print" onClick="window.print()">
            <input name="printt" class="noPrint btn btn-success btn-md" type="button" value ="Excel" onClick="printt()">
          </p>
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