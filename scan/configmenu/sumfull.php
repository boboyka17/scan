 <?php
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
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร 2558</title>

    <!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <style media="print">
  .noPrint{ display: none; }
  .yesPrint{ display: block !important; }
	</style>
  <div class="container">
        <div >
        <center><img src="../head.png"></center>
        </div>
  
      <!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->

        <div class="row">      
              <div class="col-md-12 noPrint">
                   <ul class="breadcrumb">
                        <li>
                          <a href="../main.php">หน้าหลัก</a>
                        </li>
                        <li>
                         <a href="mainconfig.php">รายการจัดการระบบ</a>
                        </li>
						<li>
                         <a href="menu_3-0.php">รายงานสรุปตามคณะ</a>
                        </li>
                  </ul>
              </div>
        </div>


        <div class="row">
              <div class="col-md-3 noPrint">
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
                              <a href="../menu_2-0.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามวุฒิ</a>
                            </li>
                            <li >
                                <a href="../menu_3-0.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                            </li>
							<li class="active" >
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
<?php
include('../sphp/conn.php');
		/**
		//ครุศาสตร์ ปกติ
		//มา

		//$query=sprintf("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and");

		$queryA1 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate31 !=' ';",$con);
		$totalA1 = mysql_num_rows($queryA1);
		//ไม่มา
		$queryA11 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate31 =' ';",$con);
		$totalA11 = mysql_num_rows($queryA11);
		
		

		//ครุศาสตร์ กศ.บท.
		//มา
		$queryB3 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate2 !=' ';",$con);
		$totalB3 = mysql_num_rows($queryB3);
		//ไม่มา
		$queryB33 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate2 =' ';",$con);
		$totalB33 = mysql_num_rows($queryB33);
		*/
?>			

						<?php 	
						$query1=sprintf("SELECT * FROM datescan WHERE idday='1';");
						$result1=mysql_query($query1,$con);
						$row1=mysql_fetch_assoc($result1);
						
						?> 
						<?php 	
						$query2=sprintf("SELECT * FROM datescan WHERE idday='2';");
						$result2=mysql_query($query2,$con);
						$row2=mysql_fetch_assoc($result2);
						
						?> 
						<?php 	
						$query3=sprintf("SELECT * FROM datescan WHERE idday='3';");
						$result3=mysql_query($query3,$con);
						$row3=mysql_fetch_assoc($result3);
						
						?> 
						<?php 	
						$query4=sprintf("SELECT * FROM datescan WHERE idday='4';");
						$result4=mysql_query($query4,$con);
						$row4=mysql_fetch_assoc($result4);
						
						?> 
      
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading noPrint">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user "></span>&nbsp;รายงานการเข้าร่วม </center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					
					<center><h3><span class="label label-info"><?php 
																	

																	if(@$_POST['come']==="!='';"){
																		echo "สรุปรายชื่อผู้เข้าร่วมซ้อมพิธีพระราชทานปริญญาบัตร ";
																		echo ($Year=DATE("Y",strtotime("now"))+543);
																		
																		
																	
																	}
																	if(@$_POST['come']==="='';") {echo "สรุปรายชื่อผู้ไม่เข้าร่วมซ้อมพิธีพระราชทานปริญญาบัตร"; 
																	echo ($Year=DATE("Y",strtotime("now"))+543);}
					
					?>

																	
																	
																</span></h3></center>
								<center>
								<table>
								<tr>
								
								<td>
								<FORM method="POST">
								<select class="form-control noPrint" name="selectpak" >
									
									<option  value="select * from scan2557 where chdate31"> <?php echo "วันที่ ".$row1["date"] ?></option>
									<option value="select * from scan2557 where chdate1 " > <?php echo "  วันที่ ".$row2["date"] ?> </option>
									<option value=" select * from scan2557 where chdate2" > <?php echo "  วันที่ ".$row3["date"] ?> </option>
									<option value=" select * from scan2557 where chdate3" > <?php echo "  วันที่ ".$row4["date"] ?> </option>


									<!--<option value="select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and ">ภาค กศ.บท</option> -->
									
								</select>
								
								</td>

								
								<td></td>
								
								<td>

								
								<select class="form-control noPrint" name="come">
									
									<option value="!='';"selected>รายชื่อคนมา </option>
									<option value="='';">รายชื่อคนไม่มา</option>
									</td></tr>
									
									<tr>
									<td colspan="10"><center>
									<br/>
									<a href="addnow.php"class="row noPrint">
									<button type="send" class="btn btn-success">
										<span class="glyphicon glyphicon-download-alt noPrint"> เรียบร้อย</span>
									</button></center>
								</a>
								</td>
								</tr>
								
								
									</FORM>
								</select>
								
							
							<table>
							
							</center>
					<br/>

					
					<table class="table table-bordered">
						<!-- **************************************** -->
						<thead>
							<tr class="success">
							<th rowspan="2"><center>รหัสบัณฑิต</center></th>
							<th colspan="5"><center>
							<?php


						
					?>
							
							</center>
							
							<tr class="success">
							<th><center>ชื่อ-สกุล</center></th>
							<th><center>วุฒิปริญญา</center></th>
							<th><center>ก</center></th>
							<th><center><?php echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>"; ?></center></th>
							<th><center>หมายเหตุ</center></th>
							</tr>
						</thead>
						<tbody>
						
							<h3 align="right"><input class="noPrint btn btn-success btn-md " type="button" value ="Print" onClick="window.print()"></h3>
							<?php
							$query=sprintf("%s %s",@$_POST['selectpak'],@$_POST['come']);
							@$result=mysql_query($query,$con);
									$count1=0;
									$count2=0;
									
							while(@$row1=mysql_fetch_assoc($result))
							{
						?>
							<tr class="">
								<td><?php echo $row1['count'];?></td>
								<td><?php echo $row1['pre']." ".$row1['name']." ".$row1['lastname'];?></td>
								<td><?php   $setlevel=$row1['education'];
															if($setlevel==="ครุศาสตรดุษฎีบัณฑิต"){
																echo"ค.ด.";
															}elseif($setlevel==="ครุศาสตรมหาบัณฑิต"){
																echo"ค.ม.";
															}elseif($setlevel==="บริหารธุรกิจมหาบัณฑิต"){
																echo"บธ.ม.";
															}elseif($setlevel==="รัฐประศาสนศาสตรมหาบัณฑิต"){
																echo"รป.ม.";
															}elseif($setlevel==="ศิลปศาสตรมหาบัณฑิต"){
																echo"ศศ.ม.";
															}elseif($setlevel==="สาธารณสุขศาสตรมหาบัณฑิต"){
																echo"สธ.ม.";
															}elseif($setlevel==="ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)"){
																echo"ค.บ.";
															}elseif($setlevel==="วิทยาศาสตรบัณฑิต"){
																echo"วท.บ.";
															}elseif($setlevel==="นิติศาสตรบัณฑิต"){
																echo"น.บ..";
															}elseif($setlevel==="รัฐประศาสนศาสตรบัณฑิต"){
																echo"รป.บ.";
															}elseif($setlevel==="ศิลปกรรมศาสตรบัณฑิต"){
																echo"ศป.บ.";
															}elseif($setlevel==="ศิลปศาสตรบัณฑิต"){
																echo"ศศ.บ.";
															}elseif($setlevel==="บัญชีบัณฑิต"){
																echo"บช.บ.";
															}elseif($setlevel==="พยาบาลศาสตรบัณฑิต"){
																echo"พย.บ.";
															}elseif($setlevel==="บริหารธุรกิจบัณฑิต"){
																echo"บธ.บ.";
															}

																

						?>
								<td><?php $ch= $row1['degree'];?>
														 <?php if($ch>=9) 
														 {echo "";
														 }else if($ch>=2){
															echo "2";
														 }else if($ch>=1){
															echo "1";
														 }
														 $count1++;
														
														 
						?>
								
								
								
								</td>
								<td></td>
								<td></td>
						</td>
								
								
								
						<?php } ?>
								
								
							</tr>
							

						</tbody>
						<!-- **************************************** -->
						
						
							
						</tbody>
						<!-- **************************************** -->	
						
						
					</table>
					
                    </div>
        </div>
<?php
include('../sphp/cconn.php');
?>
            <!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>



<?php
				if(@$_POST['come']==="!='';"){
				echo "ยอดผู้มาซ้อม ". $count1;
		}
		if(@$_POST['come']==="='';") {
			echo "ยอดผู้ไม่มาซ้อม ". $count1;}

	
	}
?>