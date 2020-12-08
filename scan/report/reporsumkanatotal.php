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
  <style media="print">
  .noPrint{ display: none; }
  .yesPrint{ display: block !important; }
	</style>
  <div class="container">
        <div class="row noPrint">
        <center><img src="../headnew.png"></center>
        </div>
<!---------------------------------------------------------------------------------->

    <div class="row">

      <div class="col-md-12 noPrint">
        <ul class="breadcrumb">
         <li><?php if(isset($_SESSION['suser'])){?><a href="../configmenu/mainconfig.php"><input name="back" class="noPrint btn btn-success btn-md" type="button" value ="กลับ"></a><?php }?></li>
        </ul>
      </div>

    </div>
    <div class="row">
        <?php if(!isset($_SESSION['suser'])){?>
            <div class="col-md-3 noPrint">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title text-center">รายการหลัก (Main Menu)</h3>
                      </div>
                  <div class="panel-body">
                    <ul class="nav nav-pills">
							
								<li >
                              <a href="../login.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>
							 <li>
							<a href="../menu_1.php">
							<span class="glyphicon glyphicon-info-sign"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ</a>
							</li>
 	   						<li>
                            	<a href="../report/reporsumtotal.php">
                                	<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                            </li>
                            <li class="active">
                                <a href="../report/reporsumkanatotal.php">
                                	<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                            </li>
                        </ul>    
                  </div>
                </div>
          </div>
            
            <div class="col-md-9">
                <?php }else {?>
                <div class="col-md-12">
                <?php }?>
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              รายงานสรุปยอดบัณฑิตจำแนกคณะ (   
              <?php
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
											 echo "วันที่"." ".$row1["date"]." ".$row1["mont"]." ".$row1["year"];
                                           if (isset($_SESSION['suser'])) { echo " ".$p; }
											 
											?> )     
             </center>
          </h3>
      </div>
      <div class="panel-body">
          
          
          <div align="center"></div>
          <p align="right">&nbsp;</p>
          <div align="center">
            <table class="table table-bordered table2excel">
              <thead>
                
                <tr class="info">
                  <th rowspan="2"><center>
                   หลักสูตร
                  </center></th>
                  <th rowspan="2"><center>
                    บัณฑิต
                  ทั้งหมด
                  </center></th>
                  
                  <th colspan="4"><center>
                    บัณฑิตหญิง
                  </center></th>
                  <th colspan="4"><center>
                    บัณฑิตชาย
                  </center></th>
                  <th rowspan="2"><center>
                    รวมบัณฑิต
                  (มา)
                  </center></th>
                  <th rowspan="2"><center>
                    รวมบัณฑิต
                  (ไม่มา)
                  </center></th>
                  <th rowspan="2" class="noPrint"><center>
                    รายละเอียด
                  </center></th>
                </tr>
                <tr class="info">
                  <th ><center>
                   ก.1
                  </center></th>
                  <th ><center>
                    ก.2
                  </center></th>
                  <th ><center>
                    บัณฑิต
                  </center></th>
                  <th><center>
                    รวม
                  </center></th>
                  <th ><center>
                   ก.1
                  </center></th>
                  <th ><center>
                    ก.2
                  </center></th>
                  <th ><center>
                    บัณฑิต
                  </center></th>
                  <th><center>
                    รวม
                  </center></th>
                  
                </tr>
                <?php 
				$result = $conn->query("select distinct faculty from scan2557;",$con);
				while ($row=$result->fetch_assoc()){
				?>
                <tr class="warning">
                  <td><div align="left"><?php echo $row['faculty'];?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where  faculty='".$row['faculty']."';",$con);
				$total= $query->num_rows; 
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'  and degree = 1 and sex = 'f' and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows;
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'  and degree = 2 and sex = 'f' and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows;
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'  and degree = 9 and sex = 'f' and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows;
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'   and sex = 'f' and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows;
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'   and degree = 1 and sex = 'm' and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows;
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'   and degree = 2 and sex = 'm' and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows;
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'   and degree = 9 and sex = 'm' and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows;
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'    and sex = 'm' and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows;
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'    and ch".$_POST['date']." !='';",$con);
				$total= $query->num_rows; 
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                  <td><div align="left"><?php 
				$query = $conn->query("select * from scan2557 where faculty='".$row['faculty']."'   and ch".$_POST['date']." ='';",$con);
				$total= $query->num_rows; 
				if ($total!=0)echo $total;
				else echo "-";?></div></td>
                <td class="noPrint"><center><a  href="reporsumsakatotal.php?faculty=<?php echo $row['faculty'];?>"><button type="button" class="btn btn-success btn-xs">รายละเอียด&nbsp;<span class="glyphicon glyphicon-new-window"></span></button></a></center></td>
                </tr>
                <?php }?>
                <tr  class="danger">
                  <td><div align="left">รวม</div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 ",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where  degree = 1 and sex = 'f' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where degree = 2 and sex = 'f' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where degree = 9 and sex = 'f' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where   sex = 'f' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where degree = 1 and sex = 'm' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where degree = 2 and sex = 'm' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where degree = 9 and sex = 'm' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where  sex = 'm' and ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where   ch".$_POST['date']." !='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                  <td><div align="left">
                    <?php 
			$query = $conn->query("select * from scan2557 where  ch".$_POST['date']." ='';",$con);
			$total= $query->num_rows;
			if($total!=0) echo $total;
			else echo "-";
			?>
                  </div></td>
                </tr>
				
                
              </thead>
              <tbody>
                
              </tbody>
            </table>
            
            </tbody>
            
            </table>
        </div>
        <p>&nbsp;</p>
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
  <center> Copyright © by สาขาวิทยาการคอมพิวเตอร์  คณะวิทยาศาสตร์และเทคโนโลยี  2017
</html>
<?php
include('../sphp/cconn.php');
?>