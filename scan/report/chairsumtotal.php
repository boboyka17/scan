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
   
<div id="top" ></div>
  </head>
  <body onload="document.getElementById('save').focus();" style="font-family: 'Kanit'">
  <style media="print">
  .noPrint{ display: none; }
  .yesPrint{ display: block !important; }
	</style>
  <div class="container">
        <div class="row noPrint">
        <center><img src="head.png"></center>
        </div>
<!---------------------------------------------------------------------------------->

    <div class="row">

      <div class="col-md-12 noPrint">
        <ul class="breadcrumb">
          <li><a href="reportotalchair.php">กลับ</a></li>
          <li><a href="chairsumnumtotal.php">สรุปเลขที่นั่ง</a></li>
          <li><a href="chairsumP.php">แถวพิเศษ</a></li>
        
        </ul>
      </div>

    </div>
    <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              รายงานเลขที่นั่งบัณฑิตทั้งหมด    <?php
			   $date=file_GET_contents("..//sphp/date.txt","w");
			   if($date=='date1' or $date=='date12'){
					$strqr="(chdate1 !='' or chdate12 !='')";
			   
			   }
			   else if($date=='date2' or $date=='date22'){
					$strqr="(chdate2 !='' or chdate22 !='')";
			   
			   }
			   else if($date=='date3' or $date=='date32'){
					$strqr="(chdate3 !='' or chdate32 !='')";
			   
			   }
			   else if($date=='date4' or $date=='date42'){
					$strqr="(chdate4 !='' or chdate42 !='')";
			   
			   }
			   
			   
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
											 echo "( วันที่"." ".$row1["date"]." ".$row1["mont"]." ".$row1["year"].")" ;?>       
            </center>
          </h3>
      </div>
        <div class="panel-body">
          <p></p>
          
         
          <table class="table table-bordered table2excel">
         
            <thead>
              <tr class="info">
                <th ><center>
                  เลขบัณฑิต
                </center></th>
                <th colspan="3"><center>
                  ชื่อ-สกุล
                </center></th>
                <th><center>
                  ปริญญา
                </center></th>
                <th><center>
                  ก
                </center></th>
                <th><center>
                  <?php echo "<span class='glyphicon glyphicon-ok'></span>".'<strong> / </strong>'."<span class='glyphicon glyphicon-remove'></span>";
?>
                </center></th>
                <th width="20"><center>
                  ลำดับแถว
                </center></th>
                <th width="20"><center>
                  ลำดับในแถว
                </center></th>
                <th><center>
                  หมายเหตุ
                </center></th>
              </tr>
              
			  <?php  
			   $i=1;  $id=1; $strid=1;  $sum=1;
			  
			  
				   while($sum<=4) { 
				 
					if($sum==1) $query="select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and ".$strqr.";";
					
					if($sum==2) $query="select  * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and ".$strqr.";";
					
			 		if($sum==3) $query="select * from scan2557 where education like '%มหาบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and ".$strqr.";";
					if($sum==4) {
						$query="select * from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and ".$strqr.";";
						
						}
					
					
					$result=$conn->query($query,$con);
					
				 while($row=($result->fetch_assoc())){
					
					 
					 if($row['education']=='ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') $row['education']='ครุศาสตรบัณฑิต';
					 $education=$row['education'];
					 if($row['degree']!='9')  $education=$row['education'].' เกียรตินิยมอันดับ '.$row['degree'];
					 
					 
					 if(@$showeducation!=$education){
						 $showeducation=$education;
						 ?><tr class="warning">
                <td colspan="11"><div align="left"><?php echo $showeducation;?></div></td>
              </tr>
             <?php }?>
              <tr class="warning">
             	 
                <td><div align="left"><?php echo $row['counteducation']?></div></td>
                <td><div align="left"><?php echo $row['pre']?></div></td>
                <td><div align="left"><?php echo $row['name']?></div></td>
                <td><div align="left"><?php echo $row['lastname']?></div></td>
                <td><div align="left"><?php echo $row['education'];?></div></td>
                <td><div align="left"><?php if($row['degree']=='9')echo '-';else echo $row['degree'];?>
                </div></td>
                <td></td>
                <td><div align="left"><?php echo $strid;?></div></td>
                <td><div align="left"><?php echo $id;?></div></td>
                <td><div align="left"><?php echo $row['statustext'];?></div></td>
              </tr>
             <?php 
				 
			 $i++;$id++;if($id>80){$strid++; $id=1;}
			 	}
				
				$sum++;
				
			 }
			?>
            </thead>
            <tbody>
            </tbody>
          </table>
          </tbody>
            
          </table>
          <p align="center">
            <input name="print" class="noPrint btn btn-success btn-md" type="button" value ="Print" onClick="window.print()">
            <input name="printt" class="noPrint btn btn-success btn-md" type="button" value ="Excel" onClick="printt()">
           
          </p>
          
            <p><a href="#top">▲GoTop</a></p>
          
          
          <p>&nbsp;</p>
          
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