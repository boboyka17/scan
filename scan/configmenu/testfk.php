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
    <title>สรุปยอดบัณฑิตผู้มีสิทธิ์รับพระราชทานปริญญาบัตร 2558</title>

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
	<STYLE TYPE="text/css">
     p.breakhere {page-break-before: always}
</STYLE>
<P class="breakhere">

  <div class="container">
        <div >
        <center><img src="../headnew.png"></center>
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
                         <a href="reporttext.php">ระบบรายงานผล ReMark</a>
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
                            <li>
                                <a href="../menu_3-0.php">
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
      
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading noPrint">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-user "></span>&nbsp;สรุปยอดบัณฑิตผู้มีสิทธิ์รับพระราชทานปริญญาบัตร 2558 </center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
					
					
								<!--left-->
			
					</FORM>
					<?php  
					
?></center>			


<?php $cc=0;  $taw=1;echo "แถว ".$taw." อาจารย์คุมแถว....................................................................................................................";  ?>
					<table class="table table-bordered"   >
						<thead>
						
							<tr class="success">
							<th rowspan="2"><center><font size="2">จำนวนในแถว</center></th>
							<th rowspan="2"><center><font size="2">รหัสบัณฑิต</center></th>
							</center>
							<tr class="success">
							<th><center><font size="5">ชื่อ-สกุล</center></th>
							<th><center><font size="2">วุฒิปริญญา</center></th>
							<th><center><font size="5">ก</center></th>
							<th><center><?php echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>"; ?></center></th>
							<th><center><font size="5">หมายเหตุ</center></th>
							</tr>
						</thead>
						<?php 
						$cout=1;
						$query="SELECT * FROM scan2557 WHERE level LIKE '%ตรี%' and (education LIKE '%ครุ%' or education LIKE '%ศิลปศาส%' or education LIKE '%ศิลปกรรม%' or education LIKE '%รัฐ%' or education LIKE '%พยาบาล%')and (`chdate31`!='' or 'chdate1'!='' or 'chdate2'!='' )  and `status`='1'
ORDER BY `scan2557`.`count` ASC;";
						$result=mysql_query($query,$con);
						while($row1=mysql_fetch_assoc($result) )    { $cc++;
						?>
								<tr>
								<td><?php echo $cout; ?></td>
								<td><?php  echo $row1['counteducation']; $counteducation=$row1['counteducation']+1;  ?></td>
								<td><?php echo $row1['pre'].$row1['name'].' '.$row1['lastname']; ?></td>
								<td><?php if ($row1['education']==='ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)')
							{echo "ค.บ.";}else if ($row1['education']==='วิทยาศาสตรบัณฑิต')
							{echo "วท.บ.";}else if ($row1['education']==='นิติศาสตรบัณฑิต')
							{echo "น.บ.";}else if ($row1['education']==='รัฐประศาสนศาสตรบัณฑิต')
							{echo "รป.บ.";}else if ($row1['education']==='ศิลปกรรมศาสตรบัณฑิต')
							{echo "ศป.บ.";}else if ($row1['education']==='ศิลปศาสตรบัณฑิต')
							{echo "ศศ.บ.";}else if ($row1['education']==='บัญชีบัณฑิต')
							{echo "บช.บ.";}else if ($row1['education']==='พยาบาลศาสตรบัณฑิต')
							{echo "พย.บ.";}else if ($row1['education']==='บริหารธุรกิจบัณฑิต')
							{echo "บธ.บ."; } ?></td>
								<td><?php if($row1['degree']==='1'){echo "1";}else if($row1['degree']==='2'){echo "2";}else{}?></td>
								<td><?php echo @$cout;?></td>
								<td><?php if($row1['statustext']='NORMAL'){echo "";}else echo $row1['statustext']?></td>
								</tr> <?php //echo "<P CLASS='breakhere'>";?>
								
								
								<tr <?php //echo "<P CLASS='breakhere'>"; ?>>
								<?php $cout++;if($cout>80)  { 
									
									$cout=1; $taw++; ?>
									</table>
									<?php 
									echo "<p class='breakhere'>";
									echo "แถว ".$taw." อาจารย์คุมแถว...................................................................................................................."; 
									
									?>

									<table class="table table-bordered ">
									<thead>
						
							<tr class="success">
							<th rowspan="2"><center><font size="2">จำนวนในแถว</center></th>
							<th rowspan="2"><center><font size="2">รหัสบัณฑิต</center></th>
							</center>
							<tr class="success">
							<th><center><font size="5">ชื่อ-สกุล</center></th>
							<th><center><font size="2">วุฒิปริญญา</center></th>
							<th><center><font size="5">ก</center></th>
							<th><center><?php echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>"; ?></center></th>
							<th><center><font size="5">หมายเหตุ</center></th>
							</tr>
						</thead>
						
							<?php	
						  }//end if
							 }//end while
							?>

						<!------end table1------->
<table><tr><?php  $taw=1;echo "แถว ".$taw." อาจารย์คุมแถว....................................................................................................................";  ?></tr></table>

					
					<table class="table table-bordered"   >
						<thead>
						
							<tr class="success">
							<th rowspan="2"><center><font size="2">จำนวนในแถว</center></th>
							<th rowspan="2"><center><font size="2">รหัสบัณฑิต</center></th>
							</center>
							<tr class="success">
							<th><center><font size="5">ชื่อ-สกุล</center></th>
							<th><center><font size="2">วุฒิปริญญา</center></th>
							<th><center><font size="5">ก</center></th>
							<th><center><?php echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>"; ?></center></th>
							<th><center><font size="5">หมายเหตุ</center></th>
							</tr>
						</thead>


						<!--tbody-->
						
							<h3 align="right"><input class="noPrint btn btn-success btn-md " type="button" value ="Print" onClick="window.print()"></h3>
							<?php
							
							
						?>
							<tr class=""> <?php
							$cout=1;
						
						$query="SELECT * FROM scan2557 WHERE (level LIKE '%เอก%' and (`chdate31`!='' or 'chdate1'!='' or 'chdate2'!='' )  and status=1) or (level LIKE '%โท%' and (`chdate31`!='' or 'chdate1'!='' or 'chdate2'!='' )  and status=1) order by count ASC;";
						$result=mysql_query($query,$con); ?><?php
						$numrow = mysql_num_rows($result);
						$chnuml=80-$numrow;
						
						if($numrow<80)/*maek 80*/{ $tre="SELECT * FROM scan2557 WHERE level LIKE '%ตรี%' and (education LIKE '%หาร%') and (`chdate31`!='' or 'chdate1'!='' or 'chdate2'!='' ) and status=1 LIMIT ".$chnuml.";";
							$resulttree=mysql_query($tre,$con);
							while($row11=mysql_fetch_assoc($resulttree) )    {   $cc++;
							?>
								<tr>
								<td><?php echo $cout; ?></td>
								<td><?php  echo $row11['counteducation']; $counteducation=$row11['counteducation']+1;  ?></td>
								<td><?php echo $row11['pre'].$row11['name'].' '.$row11['lastname']; ?></td>
								<td><?php if ($row11['education']==='ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)')
							{echo "ค.บ.";}else if ($row11['education']==='วิทยาศาสตรบัณฑิต')
							{echo "วท.บ.";}else if ($row11['education']==='นิติศาสตรบัณฑิต')
							{echo "น.บ.";}else if ($row11['education']==='รัฐประศาสนศาสตรบัณฑิต')
							{echo "รป.บ.";}else if ($row11['education']==='ศิลปกรรมศาสตรบัณฑิต')
							{echo "ศป.บ.";}else if ($row11['education']==='ศิลปศาสตรบัณฑิต')
							{echo "ศศ.บ.";}else if ($row11['education']==='บัญชีบัณฑิต')
							{echo "บช.บ.";}else if ($row11['education']==='พยาบาลศาสตรบัณฑิต')
							{echo "พย.บ.";}else if ($row11['education']==='บริหารธุรกิจบัณฑิต')
							{echo "บธ.บ."; } ?></td>
								<td><?php if($row11['degree']==='1'){echo "1";}else if($row11['degree']==='2'){echo "2";}else{}?></td>
								<td><?php echo $cout;?></td>
								<td><?php if($row11['statustext']='NORMAL'){echo "";}else echo $row11['statustext']?></td>
								</tr> <?php //echo "<P CLASS='breakhere'>";?>
								
								
								<tr <?php //echo "<P CLASS='breakhere'>"; ?>>
								<?php $cout++;if($cout>80)  { 
									
									$cout=1; $taw++; ?>
									</table>
									<?php 
									echo "<p class='breakhere'>";
									echo "แถว ".$taw." อาจารย์คุมแถว...................................................................................................................."; 
									
									?>

									<table class="table table-bordered ">
									<thead>
						
							<tr class="success">
							<th rowspan="2"><center><font size="2">จำนวนในแถว</center></th>
							<th rowspan="2"><center><font size="2">รหัสบัณฑิต</center></th>
							</center>
							<tr class="success">
							<th><center><font size="5">ชื่อ-สกุล</center></th>
							<th><center><font size="2">วุฒิปริญญา</center></th>
							<th><center><font size="5">ก</center></th>
							<th><center><?php echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>"; ?></center></th>
							<th><center><font size="5">หมายเหตุ</center></th>
							</tr>
						</thead>
						
							<?php	
						  }//end if
							 }
						}//end numrow80
						while($row1=mysql_fetch_assoc($result) )    {   $cc++;
							?>
								<tr>
								<td><?php echo $cout; ?></td>
								<td><?php  echo $row1['counteducation'];  ?></td>
								<td><?php echo $row1['pre'].$row1['name'].' '.$row1['lastname']; ?></td>
								<td><?php if ($row1['education']==='ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)')
							{echo "ค.บ.";}else if ($row1['education']==='วิทยาศาสตรบัณฑิต')
							{echo "วท.บ.";}else if ($row1['education']==='นิติศาสตรบัณฑิต')
							{echo "น.บ.";}else if ($row1['education']==='รัฐประศาสนศาสตรบัณฑิต')
							{echo "รป.บ.";}else if ($row1['education']==='ศิลปกรรมศาสตรบัณฑิต')
							{echo "ศป.บ.";}else if ($row1['education']==='ศิลปศาสตรบัณฑิต')
							{echo "ศศ.บ.";}else if ($row1['education']==='บัญชีบัณฑิต')
							{echo "บช.บ.";}else if ($row1['education']==='พยาบาลศาสตรบัณฑิต')
							{echo "พย.บ.";}else if ($row1['education']==='บริหารธุรกิจบัณฑิต')
							{echo "บธ.บ."; } ?></td>
								<td><?php if($row1['degree']==='1'){echo "1";}else if($row1['degree']==='2'){echo "2";}else{}?></td>
								<td><?php echo $cout;?></td>
								<td><?php if($row1['statustext']='NORMAL'){echo "";}else echo $row1['statustext']?></td>
								</tr> <?php //echo "<P CLASS='breakhere'>";?>
								
								
								<tr <?php //echo "<P CLASS='breakhere'>"; ?>>
								<?php $cout++;if($cout>80)  { 
									
									$cout=1; $taw++; ?>
									</table>
									<?php 
									echo "<p class='breakhere'>";
									echo "แถว ".$taw." อาจารย์คุมแถว...................................................................................................................."; 
									
									?>

									<table class="table table-bordered ">
									<thead>
						
							<tr class="success">
							<th rowspan="2"><center><font size="2">จำนวนในแถว</center></th>
							<th rowspan="2"><center><font size="2">รหัสบัณฑิต</center></th>
							</center>
							<tr class="success">
							<th><center><font size="5">ชื่อ-สกุล</center></th>
							<th><center><font size="2">วุฒิปริญญา</center></th>
							<th><center><font size="5">ก</center></th>
							<th><center><?php echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>"; ?></center></th>
							<th><center><font size="5">หมายเหตุ</center></th>
							</tr>
						</thead>
						
							<?php	
						  }//end if
							 } // end while เอก โท?>
							 <?php
				
						
						$query="SELECT * FROM scan2557 WHERE level LIKE '%ตรี%' and (education LIKE '%หาร%' or education LIKE '%วิทยา%' or education LIKE '%นิติ%' or education LIKE '%บัญชี%')  and (`chdate31`!='' or 'chdate1'!='' or 'chdate2'!='' ) AND status=1 AND `counteducation` BETWEEN ".$counteducation."  AND 9999;";
							
						$result=mysql_query($query,$con); ?><?php
							
						while($row1=mysql_fetch_assoc($result) )    {   $cc++;
							?>
								<tr>
								<td><?php echo $cout; ?></td>
								<td><?php  echo $row1['counteducation'];  ?></td>
								<td><?php echo $row1['pre'].$row1['name'].' '.$row1['lastname']; ?></td>
								<td><?php if ($row1['education']==='ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)')
							{echo "ค.บ.";}else if ($row1['education']==='วิทยาศาสตรบัณฑิต')
							{echo "วท.บ.";}else if ($row1['education']==='นิติศาสตรบัณฑิต')
							{echo "น.บ.";}else if ($row1['education']==='รัฐประศาสนศาสตรบัณฑิต')
							{echo "รป.บ.";}else if ($row1['education']==='ศิลปกรรมศาสตรบัณฑิต')
							{echo "ศป.บ.";}else if ($row1['education']==='ศิลปศาสตรบัณฑิต')
							{echo "ศศ.บ.";}else if ($row1['education']==='บัญชีบัณฑิต')
							{echo "บช.บ.";}else if ($row1['education']==='พยาบาลศาสตรบัณฑิต')
							{echo "พย.บ.";}else if ($row1['education']==='บริหารธุรกิจบัณฑิต')
							{echo "บธ.บ."; } ?></td>
								<td><?php if($row1['degree']==='1'){echo "1";}else if($row1['degree']==='2'){echo "2";}else{}?></td>
								<td><?php echo $cout;?></td>
								<td><?php if($row1['statustext']='NORMAL'){echo "";}else echo $row1['statustext']?></td>
								</tr> <?php //echo "<P CLASS='breakhere'>";?>
								
								
								<tr <?php //echo "<P CLASS='breakhere'>"; ?>>
								<?php $cout++;if($cout>80)  { 
									
									$cout=1; $taw++; ?>
									</table>
									<?php 
									echo "<p class='breakhere'>";
									echo "แถว ".$taw." อาจารย์คุมแถว...................................................................................................................."; 
									
									?>

									<table class="table table-bordered ">
									<thead>
						
							<tr class="success">
							<th rowspan="2"><center><font size="2">จำนวนในแถว</center></th>
							<th rowspan="2"><center><font size="2">รหัสบัณฑิต</center></th>
							</center>
							<tr class="success">
							<th><center><font size="5">ชื่อ-สกุล</center></th>
							<th><center><font size="2">วุฒิปริญญา</center></th>
							<th><center><font size="5">ก</center></th>
							<th><center><?php echo "<h3><span class='glyphicon glyphicon-ok'></span></h3>"; ?></center></th>
							<th><center><font size="5">หมายเหตุ</center></th>
							</tr>
						</thead>
						
							<?php	
						  }//end if
							 } // end while เอก โท?>
							 
			
									



						<!--/tbody-->
						<!-- **************************************** -->
						
						
							
						
						<!-- **************************************** -->	
						
						
					</table>
					



					ยอดรวม <?php echo $cc-1; ?>
					</font >
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

	}
?>