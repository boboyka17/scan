<?php
	include('../sphp/conn.php');
  session_start();
  date_default_timezone_set('Asia/Bangkok');
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
$(function(){
	$("#id_faculty").change(function(){
		var pid=$(this).val();
		//alert(pid);
		$.get("showmajar.php",{id_faculty: pid},function(data){
				//alert(data);
				$("#parinya3").children().remove().end();
				$("#parinya3").children().end().append(data);
				$("#parinya3").removeAttr('disabled');
			});
			
		});
	});

</script>

</head>
  <body onload="document.getElementById('save').focus();" style="font-family: 'Kanit'">
  <div class="container">
        <div class="row">
        <center><img src="head.png"></center>
        </div>
<!---------------------------------------------------------------------------------->

    <div class="row">

      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="../configmenu/mainconfig.php">กลับ</a></li>
        </ul>
      </div>

    </div>
    <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              รายงาน
            </center>
          </h3>
      </div>
        <div class="panel-body">
          <form action="reportotal.php" method="post">
            <div align="center">
              <table width="800" border="0">
              <tr>
                <td width="200"><div align="right">ทั้งหมด : </div></td>				
                  <td>
                 <?php 
										 $query=sprintf("SELECT * FROM datescan WHERE idday='1';");
											$result=$conn->query($query);
											 $row1=$result->fetch_assoc();
												
													
									?>

									<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='2';");
											$result=$conn->query($query);
											 $row2=$result->fetch_assoc();
												
									?>

								<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='3';");
											$result=$conn->query($query);
											 $row3=$result->fetch_assoc();
												
									?>
							<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='4';");
											$result=$conn->query($query);
											 $row4=$result->fetch_assoc();
												
									?>
                  <select class="form-control" name="date">
                    <option value="zero" selected="selected">เลือกวันที่</option>
                    <option value="date1">วันที่
                      <?php  echo " ". $row1["date"]." ".$row1["mont"];?>
                      เช้า</option>
                    <option value="date12">วันที่
                      <?php  echo " ". $row1["date"]." ".$row1["mont"];?>
                      บ่าย</option>
                    <option value="date2">วันที่
                      <?php  echo " ". $row2["date"]." ".$row2["mont"];?>
                      เช้า</option>
                    <option value="date22">วันที่
                      <?php  echo " ". $row2["date"]." ".$row2["mont"];?>
                      บ่าย</option>
                    <option value="date3">วันที่
                      <?php  echo " ". $row3["date"]." ".$row3["mont"];?>
                      เช้า</option>
                    <option value="date32">วันที่
                      <?php  echo " ". $row3["date"]." ".$row3["mont"];?>
                      บ่าย</option>
                    <option value="date4">วันที่
                      <?php  echo " ". $row4["date"]." ".$row4["mont"];?>
                      รอบที่ 1</option>
                    <option value="date42">วันที่
                      <?php  echo " ". $row4["date"]." ".$row4["mont"];?>
                      รอบที่ 2</option>
                </select></td>
                </tr>
				  <tr>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				  </tr>
                <tr>
                  <td width="200"><div align="right"></div></td>				
                  <td  width="600"><p>
                    <select class="form-control" name="status" id="status">
                      <option value="" selected="selected">กรุณาเลือก</option>
                      <option value="1">มา</option>
                      <option value="2">ไม่มา</option>
                      <option value="3">ทั้งหมด</option>
                    </select>
                  </p></td>
                </tr>
                
                <tr>
                  <td>&nbsp;</td>
                  <td><input  class="btn btn-success btn-md" type="submit" name="btn" id="btn" value="รายละเอียด"></td>
                </tr>
              </table>
              <p>&nbsp;</p>
            </div>
          </form>
          <form action="reportotal.php" method="post">
            <div align="center">
              <table width="800" border="0">
              <tr>
                <td width="200"><div align="right">ตามปริญญา :</div></td>				
                  <td>
                 <?php 
										 $query=sprintf("SELECT * FROM datescan WHERE idday='1';");
											$result=$conn->query($query);
											 $row1=$result->fetch_assoc();
												
													
									?>

									<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='2';");
											$result=$conn->query($query);
											 $row2=$result->fetch_assoc();
												
									?>

								<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='3';");
											$result=$conn->query($query);
											 $row3=$result->fetch_assoc();
												
									?>
							<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='4';");
											$result=$conn->query($query);
											 $row4=$result->fetch_assoc();
												
									?>
                  <select class="form-control" name="date">
                    <option value="zero">เลือกวันที่</option>
                    <option value="date1">วันที่
                      <?php  echo " ". $row1["date"]." ".$row1["mont"];?>
                      เช้า</option>
                    <option value="date12">วันที่
                      <?php  echo " ". $row1["date"]." ".$row1["mont"];?>
                      บ่าย</option>
                    <option value="date2">วันที่
                      <?php  echo " ". $row2["date"]." ".$row2["mont"];?>
                      เช้า</option>
                    <option value="date22">วันที่
                      <?php  echo " ". $row2["date"]." ".$row2["mont"];?>
                      บ่าย</option>
                    <option value="date3">วันที่
                      <?php  echo " ". $row3["date"]." ".$row3["mont"];?>
                      เช้า</option>
                    <option value="date32">วันที่
                      <?php  echo " ". $row3["date"]." ".$row3["mont"];?>
                      บ่าย</option>
                    <option value="date4">วันที่
                      <?php  echo " ". $row4["date"]." ".$row4["mont"];?>
                      รอบที่ 1</option>
                    <option value="date42">วันที่
                      <?php  echo " ". $row4["date"]." ".$row4["mont"];?>
                      รอบที่ 2</option>
                  </select></td>
                  
                </tr>
                  <tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
                <tr>
                  <td width="200"><div align="right"></div></td>				
                  <td  width="600">
                    <select class="form-control" name="status" id="status">
                      <option value="">กรุณาเลือก</option>
                      <option value="1">มา</option>
                      <option value="2">ไม่มา</option>
                       <option value="3">ทั้งหมด</option>
                    </select>
                  </td>
                </tr>
				  <tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
                 <tr>
                  <td width="200"><div align="right"></div></td>				
                  <td  width="600"><p>
                    <select class="form-control" name="parinya" id="parinya">
                      <option value="">กรุณาเลือกปริญญา</option>
                      <?php
                    
		$query="SELECT DISTINCT`education` FROM `scan2557`";
   		$result=$conn->query($query,$con);
		//$row=mysql_fetch_assoc($Recordset1); 

 while ($row = $result->fetch_assoc()){
 ?>
                      <option value="<?php echo $row['education']?>"><?php echo $row['education']?></option>
                      <?php }
					
					?>
                    </select>
                  </p></td>
                </tr>
                <tr>
               <td>&nbsp;</td>
               <td><input  class="btn btn-success btn-md" type="submit" name="btn2" id="btn2" value="รายละเอียด"></td>
               
               </tr>
              </table>
              <p>&nbsp;</p>
            </div>
          
          
          </form>
          <form action="reportotal.php" method="post">
          <div align="center">
            <table width="800" border="0">
            <tr>
                <td width="200"><div align="right">ตามคณะ : </div></td>				
                  <td>
                 <?php 
										 $query=sprintf("SELECT * FROM datescan WHERE idday='1';");
											$result=$conn->query($query);
											 $row1=$result->fetch_assoc();
												
													
									?>

									<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='2';");
											$result=$conn->query($query);
											 $row2=$result->fetch_assoc();
												
									?>

								<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='3';");
											$result=$conn->query($query);
											 $row3=$result->fetch_assoc();
												
									?>
							<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='4';");
											$result=$conn->query($query);
											 $row4=$result->fetch_assoc();
												
									?>
                  <select class="form-control" name="date">
                    <option value="zero">เลือกวันที่</option>
                    <option value="date1">วันที่
                      <?php  echo " ". $row1["date"]." ".$row1["mont"];?>
                      เช้า</option>
                    <option value="date12">วันที่
                      <?php  echo " ". $row1["date"]." ".$row1["mont"];?>
                      บ่าย</option>
                    <option value="date2">วันที่
                      <?php  echo " ". $row2["date"]." ".$row2["mont"];?>
                      เช้า</option>
                    <option value="date22">วันที่
                      <?php  echo " ". $row2["date"]." ".$row2["mont"];?>
                      บ่าย</option>
                    <option value="date3">วันที่
                      <?php  echo " ". $row3["date"]." ".$row3["mont"];?>
                      เช้า</option>
                    <option value="date32">วันที่
                      <?php  echo " ". $row3["date"]." ".$row3["mont"];?>
                      บ่าย</option>
                    <option value="date4">วันที่
                      <?php  echo " ". $row4["date"]." ".$row4["mont"];?>
                      รอบที่ 1</option>
                    <option value="date42">วันที่
                      <?php  echo " ". $row4["date"]." ".$row4["mont"];?>
                      รอบที่ 2</option>
                  </select></td>
              </tr>
				<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
			  </tr>
                <tr>
                  <td width="200"><div align="right"></div></td>				
                  <td  width="600">
                    <select class="form-control" name="status" id="status">
                      <option value="">กรุณาเลือก</option>
                      <option value="1">มา</option>
                      <option value="2">ไม่มา</option>
                       <option value="3">ทั้งหมด</option>
                    </select>
                  </td>
                </tr>
				<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
			  </tr>
             	 <tr>
                <td  width="200"><div align="right"></div></td>
                <td  width="600">
                 
                  <select  class="form-control" name="parinya2" id="parinya2">
                    <option value="">กรุณาเลือกคณะ</option>
                    <?php
		
		$query="SELECT DISTINCT`faculty` FROM `scan2557`";
   		$result=$conn->query($query,$con);
		//$row=mysql_fetch_assoc($Recordset1); 

 while ($row = $result->fetch_assoc()){
 ?>
                    <option value="<?php echo $row['faculty']?>"><?php echo $row['faculty']?></option>
                    <?php }
?>
                  </select>
                </td>
              </tr>
				<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
			  </tr>
              <tr>
               <td>&nbsp;</td>
               <td><input type="submit"  class="btn btn-success btn-md" name="btn2" id="btn2" value="รายละเอียด"></td>
               
              </tr>
            </table>
            <p>&nbsp;</p>
          </div>
          </form>
     
          <form name="form1" method="post" action="reportotal.php">
            <div align="center">
              <table width="800" border="0">
               <tr>
                <td width="200"><div align="right">ตามสาขา : </div></td>				
                  <td>
                 <?php 
										 $query=sprintf("SELECT * FROM datescan WHERE idday='1';");
											$result=$conn->query($query);
											 $row1=$result->fetch_assoc();
												
													
									?>

									<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='2';");
											$result=$conn->query($query);
											 $row2=$result->fetch_assoc();
												
									?>

								<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='3';");
											$result=$conn->query($query);
											 $row3=$result->fetch_assoc();
												
									?>
							<?php 
								   
							
										 $query=sprintf("SELECT * FROM datescan WHERE idday='4';");
											$result=$conn->query($query);
											 $row4=$result->fetch_assoc();
												
									?>
                  <select class="form-control" name="date">
                    <option value="zero">เลือกวันที่</option>
                    <option value="date1">วันที่
                      <?php  echo " ". $row1["date"]." ".$row1["mont"];?>
                      เช้า</option>
                    <option value="date12">วันที่
                      <?php  echo " ". $row1["date"]." ".$row1["mont"];?>
                      บ่าย</option>
                    <option value="date2">วันที่
                      <?php  echo " ". $row2["date"]." ".$row2["mont"];?>
                      เช้า</option>
                    <option value="date22">วันที่
                      <?php  echo " ". $row2["date"]." ".$row2["mont"];?>
                      บ่าย</option>
                    <option value="date3">วันที่
                      <?php  echo " ". $row3["date"]." ".$row3["mont"];?>
                      เช้า</option>
                    <option value="date32">วันที่
                      <?php  echo " ". $row3["date"]." ".$row3["mont"];?>
                      บ่าย</option>
                    <option value="date4">วันที่
                      <?php  echo " ". $row4["date"]." ".$row4["mont"];?>
                      รอบที่ 1</option>
                    <option value="date42">วันที่
                      <?php  echo " ". $row4["date"]." ".$row4["mont"];?>
                      รอบที่ 2</option>
                  </select></td>
                </tr>
				  <tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
                <tr>
                  <td width="200"><div align="right"></div></td>				
                  <td  width="600">
                    <select class="form-control" name="status" id="status">
                      <option value="">กรุณาเลือก</option>
                      <option value="1">มา</option>
                      <option value="2">ไม่มา</option>
                       <option value="3">ทั้งหมด</option>
                    </select>
                  </td>
                </tr>
				  <tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
              <tr>
                
                    <td  width="200"><div align="right"></div></td>
                <td width="600">
                      
                      </select>
                    
                  <p>
                    <select class="form-control" name="id_faculty" id="id_faculty">
                          <option value="">กรุณาเลือกคณะ</option>
                          <?php
					$query="SELECT DISTINCT`faculty` FROM `scan2557`";
   		$result=$conn->query($query,$con);
while ($row = $result->fetch_assoc()){
 ?>
                          <option value="<?php echo $row['faculty']?>"><?php echo $row['faculty']?></option>
                          <?php }
?>
                    </select>
                  </p>
                  <p>
                        <select class="form-control" name="parinya3" id="parinya3" disabled="disabled">
                          <option value="">กรุณาเลือกคณะก่อน</option>
                        </select>
                </p></td>
                  </tr>
			  <tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
			    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit"  class="btn btn-success btn-md" name="btn3" id="btn3" value="รายละเอียด"></td>
                  </tr>
			  <tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
			    </tr>
                </table>                  <p>&nbsp;</p></td>
              </tr>
              </table>
            </div>
          </form>
<p align="center"><a href="reprotpisit.php">
            <input name="print" class="noPrint btn btn-success btn-md" type="button" value ="บัณฑิตพิเศษ">
</a></p>
          <div align="center"></div>
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