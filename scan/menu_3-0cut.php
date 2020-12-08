<?php
include('sphp/conn.php');
	  session_start();
	  date_default_timezone_set('asia/bangkok');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร <?php echo ($Year=DATE("Y",strtotime("now"))+543); ?></title>

    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

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
        <div class="row noPrint">
        <center><img src="headnew.png"></center>
        </div>
	</div>
       

      
     
  <!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->

        <div class="row">      
              <div class="col-md-12 noPrint ">
                   <ul class="breadcrumb">
                        <li>
                          <a href="main.php">หน้าหลัก</a>
                        </li>
                        <li>
                         <a href="main.php">รายการหลัก</a>
                        </li>
                        <li>
                        <a href="menu_3-0.php">รายงานสรุปตามคณะ</a>
                       </li>
                  </ul>
              </div>
        </div>
    

        <div class="row">
              <div class="col-md-3 noPrint ">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title text-center">รายการหลัก (Main Menu)</h3>
                      </div>
                  <div class="panel-body">
						<ul class="nav nav-pills">
<?php
	if(!isset($_SESSION['suser']))
 	{
?>
<li>
                              <a href="login.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>
							<li >
                            <a href="menu_1.php">
								<span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a> 
                        </li>
 	   						<li >
                            	<a href="menu_2-0.php">
                                	<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                            </li>
                            <li  class="active">
                                <a href="menu_3-0.php">
                                	<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                            </li>
<?php
 	}
  	else
  	{
?>
	                    <li >
                            <a href="menu_1.php">
								<span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a> 
                        </li>
                        <li >
                            <a href="menu_2-0.php">
								<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                        </li>
                        <li class="active">
                            <a href="menu_3-0.php">
								<span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                        </li>
						<li>
                            <a href="configmenu/mainconfig.php">
								<span class="glyphicon glyphicon-cog"></span>&nbsp;รายการจัดการระบบ</a>
                        </li>
                        <li>
                            <a href="sphp/sessionout.php">
								<span class="glyphicon glyphicon-off"></span>&nbsp;ออกจากระบบ</a>
                        </li>
<?php
}
?>
                        </ul>

                    </div>
                </div>
          </div>

          <!-- +++++++++++++++++++++ END OF MENU-BAR ++++++++++++++++++++++++-->


      
      
        <div class="col-md-9">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">
                          <center>&nbsp; <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a></center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
                                                    <!-- Nav tabs -->
               <table class="table table-bordered ">
        <thead>
          <tr class="info">
            <th rowspan="2"><center>คณะ</center></th>
            <th colspan="3"><center>จำนวนบัณฑิตปี <?php echo ($Year=DATE("Y",strtotime("now"))+543); ?></center></th>
          
            
          </tr>
          <tr class="info">
            <th><center>ภาคปกติ</center></th>
            <th><center>ภาค กศ.บท.</center></th>
            <th><center>รวม</center></th>
          </tr>
                </thead>
                <tbody>
				
<?php

		
		//ครุศาสตร์ปกติ
		$query1 = mysql_query("select * from scan2557 where faculty ='ครุศาสตร์' and level like '%ปกติ%' and type123='1' ;",$con);
		$total1 = mysql_num_rows($query1);
		//ครุศาสตร์ กศ.บท.
		$query11 = mysql_query("select * from scan2557 where faculty ='ครุศาสตร์' and level not like '%ปกติ%' and type123='1'  ;",$con);
		$total11 = mysql_num_rows($query11);
		
		//มนุษยศาสตร์และสังคมศาสร์
		$query2 = mysql_query("select * from scan2557 where faculty ='มนุษยศาสตร์และสังคมศาสตร์' and level like '%ปกติ%' and type123='1'   ;",$con);
		$total2 = mysql_num_rows($query2);
		//มนุษยศาสตร์และสังคมศาสตร์ กศ.บท.
		$query22 = mysql_query("select * from scan2557 where faculty ='มนุษยศาสตร์และสังคมศาสตร์' and not level like '%ปกติ%' and type123='1'  ;",$con);
		$total22 = mysql_num_rows($query22);
		
		//วิทยาศาสตร์และเทคโนโลยี
		$query3 = mysql_query("select * from scan2557 where faculty ='วิทยาศาสตร์และเทคโนโลยี' and level like '%ปกติ%' and type123='1'  ;",$con);
		$total3 = mysql_num_rows($query3);
		//วิทยาศาสตร์และเทคโนโลยี กศ.บท.
		$query33 = mysql_query("select * from scan2557 where faculty ='วิทยาศาสตร์และเทคโนโลยี' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total33 = mysql_num_rows($query33);
		
		
		//วิทยาการจัดการ
		$query4 = mysql_query("select * from scan2557 where faculty ='วิทยาการจัดการ' and level like '%ปกติ%' and type123='1'  ;",$con);
		$total4 = mysql_num_rows($query4);
		//วิทยาการจัดการ กศ.บท.
		$query44 = mysql_query("select * from scan2557 where faculty ='วิทยาการจัดการ' and level not like '%ปกติ%' and type123='1'  ;",$con);
		$total44 = mysql_num_rows($query44);
		
		//วิทยาลัยนานาชาติการท่องเที่ยว
		$query5 = mysql_query("select * from scan2557 where faculty ='วิทยาลัยนานาชาติการท่องเที่ยว' and level like '%ปกติ%' and type123='1'  ;",$con);
		$total5 = mysql_num_rows($query5);
		//วิทยาลัยนานาชาติการท่องเที่ยว กศ.บท.
		$query55 = mysql_query("select * from scan2557 where faculty ='วิทยาลัยนานาชาติการท่องเที่ยว' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total55 = mysql_num_rows($query55);
		
		//นิติศาสร์
		$query6 = mysql_query("select * from scan2557 where faculty ='นิติศาสตร์' and level like '%ปกติ%' and type123='1' ;",$con);
		$total6 = mysql_num_rows($query6);
		//นิติศาสตร์ กศ.บท.
		$query66 = mysql_query("select * from scan2557 where faculty ='นิติศาสตร์' and level not like '%ปกติ%' and type123='1'  ;",$con);
		$total66 = mysql_num_rows($query66);
		
		//พยาบาลศาสร์
		$query7 = mysql_query("select * from scan2557 where faculty ='พยาบาลศาสตร์' and level like '%ปกติ%' and type123='1' ;",$con);
		$total7 = mysql_num_rows($query7);
		//พยาบาลศาสตร์ กศ.บท.
		$query77 = mysql_query("select * from scan2557 where faculty ='พยาบาลศาสตร์' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total77 = mysql_num_rows($query77);

		////บัณฑิตวิทยาลัย
		$query8 = mysql_query("SELECT * FROM `scan2557` WHERE `faculty` LIKE '%บัณฑิตวิทยาลัย%'  ;",$con);
		$total88 = mysql_num_rows($query8);
		
?>
				<tr class="warning">
                    <td>บัณฑิตวิทยาลัย</td>
                    <td><?php echo $total88;?></td>
                    <td><?php echo "0";?></td>
                    <td><?php echo $total88;?></td>
                     </tr>

                  <tr class="warning">
                    <td>ครุศาสตร์</td>
                    <td><?php echo $total1;?></td>
                    <td><?php echo $total11;?></td>
                    <td><?php echo ($total1+$total11);?></td>
                    </tr>
                  <tr class="warning">
                    <td>มนุษย์ศาสตร์และสังคมศาสตร์</td>
                    <td><?php echo $total2;?></td>
                    <td><?php echo $total22;?></td>
                    <td><?php echo ($total2+$total22);?></td>
                   </tr>
                   <tr class="warning">
                    <td>วิทยาศาสตร์และเทคโนโลยี</td>
                    <td><?php echo $total3;?></td>
                    <td><?php echo $total33;?></td>
                    <td><?php echo ($total3+$total33);?></td>
                  </tr>
                   <tr class="warning">
                    <td>วิทยาการจัดการ</td>
                    <td><?php echo $total4;?></td>
                    <td><?php echo $total44;?></td>
                    <td><?php echo ($total4+$total44);?></td>
                  </tr>
                   <tr class="warning">
                    <td>วิทยาลัยนานาชาติ</td>
                    <td><?php echo $total5;?></td>
                    <td><?php echo $total55;?></td>
                    <td><?php echo ($total5+$total55);?></td>
                  </tr>
                   <tr class="warning">
                    <td>นิติศาสตร์</td>
                    <td><?php echo $total6;?></td>
                    <td><?php echo $total66;?></td>
                    <td><?php echo ($total6+$total66);?></td>
                 </tr>
                   <tr class="warning">
                    <td>พยาบาลศาสตร์</td>
                    <td><?php echo $total7;?></td>
                    <td><?php echo $total77;?></td>
                    <td><?php echo ($total7+$total77);?></td>
                  </tr>

                  <tr class="danger">
                    <td>รวม</td>
                    <td><?php echo ($total1+$total2+$total3+$total4+$total5+$total6+$total7+$total88);?></td>
                    <td><?php echo ($total11+$total22+$total33+$total44+$total55+$total66+$total77);?></td>
                    <td><?php echo ($total1+$total2+$total3+$total4+$total5+$total6+$total7)+($total11+$total22+$total33+$total44+$total55+$total66+$total77+$total88);?></td>
                  </tr>
                </tbody>

    </table>
	
	

                    </div>
                    <p align="center">
            <input name="print" class="noPrint btn btn-success btn-md" type="button" value ="Print" onClick="window.print()">
            
           
          </p>
        </div>

            <!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="dist/js/bootstrap.min.js"></script>
		<center> Copyright © by สาขาวิทยาการคอมพิวเตอร์  คณะวิทยาศาสตร์และเทคโนโลยี  2017
		
  </body>
</html>
<?php
include('sphp/cconn.php');
?>