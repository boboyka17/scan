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
        <div class="row noPrint">
        <center><img src="headnew.png"></center>
        </div>
       

      
      <!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->

        <!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->

        <div class="row">      
              <div class="col-md-12 noPrint ">
                   <ul class="breadcrumb ">
                        <li>
                          <a href="main.php">หน้าหลัก</a>
                        </li>
                        <li>
                         <a href="main.php">รายการหลัก</a>
                        </li>
                        <li>
                        <a href="menu_2-0.php">รายงานสรุปตามปริญญา</a>
                       </li>
                  </ul>
              </div>
        </div>
    

        <div class="row">
              <div class="col-md-3 noPrint">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title text-center  ">รายการหลัก (Main Menu)</h3>
                      </div>
                  <div class="panel-body">
						<ul class="nav nav-pills">
<?php
	if(!isset($_SESSION['suser']))
 	{
?>
<li>
                              <a href="login.php">
                                  <span class="glyphicon glyphicon-info-sign  noPrint"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>
							<li >
                            <a href="menu_1.php">
								<span class="glyphicon glyphicon-list-alt  noPrint"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a> 
                        </li>
 	   						<li class="active">
                            	<a href="menu_2-0.php">
                                	<span class="glyphicon glyphicon-info-sign  noPrint"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                            </li>
                            <li>
                                <a href="menu_3-0.php">
                                	<span class="glyphicon glyphicon-info-sign  noPrint"></span>&nbsp;รายงานสรุปตามคณะ</a>
                            </li>
<?php
 	}
  	else
  	{
?>
	                    <li >
                            <a href="menu_1.php">
								<span class="glyphicon glyphicon-list-alt  noPrint"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a> 
                        </li>
                        <li class="active">
                            <a href="menu_2-0.php">
								<span class="glyphicon glyphicon-info-sign  noPrint"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                        </li>
                        <li>
                            <a href="menu_3-0.php">
								<span class="glyphicon glyphicon-info-sign noPrint"></span>&nbsp;รายงานสรุปตามคณะ</a>
                        </li>
						<li>
                            <a href="configmenu/mainconfig.php">
								<span class="glyphicon glyphicon-cog noPrint"></span>&nbsp;รายการจัดการระบบ</a>
                        </li>
                        <li>
                            <a href="sphp/sessionout.php">
								<span class="glyphicon glyphicon-off noPrint"></span>&nbsp;ออกจากระบบ</a>
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
                          <center>&nbsp; <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a></center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">


      <table class="table-bordered table ">
        <thead>
          <tr class="success">
            <th rowspan="2"><center>ชื่อปริญญา</center></th>
            <th colspan="3"><center>จำนวนบัณฑิตปี <?php 

					echo ($Year=DATE("Y",strtotime("now"))+543); 
					
					
					?></center></th>
             
          </tr>
          <tr class="success">
            <th><center>ภาคปกติ</center></th>
            <th><center>ภาค กศ.บท.</center></th>
            <th><center>รวม</center></th>
          </tr>
        </thead>
        <tbody>

<?php

//ศิลปศาสตรบัณฑิต(ศศ.บ.)
		$query1 = mysql_query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and level like '%ปกติ%' and type123='1'  ;",$con);
		$tota20 = mysql_num_rows($query1);
		//ศิลปศาสตรบัณฑิต(ศศ.บ.) กศ.บท.
		$query11 = mysql_query("select * from scan2557 where education like '%นิเทศศาสตรบัณฑิต%' and level not like '%ปกติ%' and type123='1' ;",$con);
		$tota200 = mysql_num_rows($query11);
		
		//ศิลปศาสตรบัณฑิต(ศศ.บ.)
		$query1 = mysql_query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and level like '%ปกติ%' and type123='1'  ;",$con);
		$total1 = mysql_num_rows($query1);
		//ศิลปศาสตรบัณฑิต(ศศ.บ.) กศ.บท.
		$query11 = mysql_query("select * from scan2557 where education like '%ศิลปศาสตรบัณฑิต%' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total11 = mysql_num_rows($query11);
		
		//ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)
		$query2 = mysql_query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and level like '%ปกติ%' and type123='1' ;",$con);
		$total2 = mysql_num_rows($query2);
		//ศิลปกรรมศาสตรบัณฑิต(ศป.บ.) กศ.บท.
		$query22 = mysql_query("select * from scan2557 where education like '%ศิลปกรรมศาสตรบัณฑิต%' and not level like '%ปกติ%' and type123='1' ;",$con);
		$total22 = mysql_num_rows($query22);
		
		//ครุศาสตรบัณฑิต(ค.บ.)
		$query3 = mysql_query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%' and level like '%ปกติ%' and type123='1' ;",$con);
		$total3 = mysql_num_rows($query3);
		//ครุศาสตรบัณฑิต(ค.บ.) กศ.บท.
		$query33 = mysql_query("select * from scan2557 where education like '%ครุศาสตรบัณฑิต%' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total33 = mysql_num_rows($query33);
		
		//วิทยาศาสตรบัณฑิต(วท.บ.)
		$query4 = mysql_query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and level like '%ปกติ%' and type123='1' ;",$con);
		$total4 = mysql_num_rows($query4);
		//วิทยาศาสตรบัณฑิต(วท.บ.) กศ.บท.
		$query44 = mysql_query("select * from scan2557 where education like '%วิทยาศาสตรบัณฑิต%' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total44 = mysql_num_rows($query44);
		
		//นิติศาสตรบัณฑิต(น.บ.)
		$query5 = mysql_query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%' and level like '%ปกติ%' and type123='1' ;",$con);
		$total5 = mysql_num_rows($query5);
		//นิติศาสตรบัณฑิต(น.บ.) กศ.บท.
		$query55 = mysql_query("select * from scan2557 where education like '%นิติศาสตรบัณฑิต%' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total55 = mysql_num_rows($query55);
		
		//รัฐประศาสนศาสตรบัณฑิต(รป.บ.)
		$query6 = mysql_query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and level like '%ปกติ%' and type123='1' ;",$con);
		$total6 = mysql_num_rows($query6);
		//รัฐประศาสนศาสตรบัณฑิต(รป.บ.) กศ.บท.
		$query66 = mysql_query("select * from scan2557 where education like '%รัฐประศาสนศาสตรบัณฑิต%' and level not like '%ปกติ%' and type123='1';",$con);
		$total66 = mysql_num_rows($query66);
		
		//บริหารธุรกิจบัณฑิต(บธ.บ.)
		$query7 = mysql_query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and level like '%ปกติ%' and type123='1';",$con);
		$total7 = mysql_num_rows($query7);
		//บริหารธุรกิจบัณฑิต(บธ.บ.) กศ.บท.
		$query77 = mysql_query("select * from scan2557 where education like '%บริหารธุรกิจบัณฑิต%' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total77 = mysql_num_rows($query77);

		//บัญชีบัณฑิต(บช.บ.)
		$query8 = mysql_query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and level like '%ปกติ%' and type123='1' ;",$con);
		$total8 = mysql_num_rows($query8);
		//บัญชีบัณฑิต(บช.บ.) กศ.บท.
		$query88 = mysql_query("select * from scan2557 where education like '%บัญชีบัณฑิต%' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total88 = mysql_num_rows($query88);

		//พยาบาลศาสตรบัณฑิต(พย.บ.)
		$query9 = mysql_query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and level like '%ปกติ%' and type123='1' ;",$con);
		$total9 = mysql_num_rows($query9);
		//พยาบาลศาสตรบัณฑิต(พย.บ.) กศ.บท.
		$query99 = mysql_query("select * from scan2557 where education like '%พยาบาลศาสตรบัณฑิต%' and level not like '%ปกติ%' and type123='1' ;",$con);
		$total99 = mysql_num_rows($query99);


		//ครุศาสตรดุษฎีบัณฑิต 
		$query100 = mysql_query("select * from scan2557 where education like '%ครุศาสตรดุษฎีบัณฑิต%'  and type123='1' ;",$con);
		$total100 = mysql_num_rows($query100);

		
		//ครุศาสตรมหาบัณฑิต 
		$query105 = mysql_query("select * from scan2557 where education like '%ครุศาสตรมหาบัณฑิต%'  and type123='1' ;",$con);
		$total105 = mysql_num_rows($query105);
		
		

		//รัฐประศาสนศาสตรมหาบัณฑิต 
		$query101 = mysql_query("select * from scan2557 where education like '%รัฐประศาสนศาสตรมหาบัณฑิต%'  and type123='1' ;",$con);
		$total101 = mysql_num_rows($query101);


		//ศิลปศาสตรมหาบัณฑิต 
		$query102 = mysql_query("select * from scan2557 where education like '%ศิลปศาสตรมหาบัณฑิต%'  and type123='1' ;",$con);
		$total102 = mysql_num_rows($query102);


		//บริหารธุรกิจมหาบัณฑิต 
		$query103 = mysql_query("select * from scan2557 where education like '%บริหารธุรกิจมหาบัณฑิต%'  and type123='1' ;",$con);
		$total103 = mysql_num_rows($query103);



		//สาธารณสุขศาสตรมหาบัณฑิต 
		$query104 = mysql_query("select * from scan2557 where education like '%สาธารณสุขศาสตรมหาบัณฑิต%'  and type123='1' ;",$con);
		$total104 = mysql_num_rows($query104);


		


		
?>
			<!-- ป เอก-->
          <tr class="warning">
            <td>ครุศาสตรดุษฎีบัณฑิต(ค.ด.)</td>
            <td><?php echo $total100;?></td>
            <td><?php echo "0";?></td>
            <td><?php echo ($total100);?></td>
          </tr>
           <!-- 101010101010101010 -->
			

				<!-- ป โท-->
          <tr class="warning">
            <td>ครุศาสตรมหาบัณฑิต(ค.ม.)</td>
            <td><?php echo $total105;?></td>
            <td><?php echo "0";?></td>
            <td><?php echo ($total105);?></td>
          </tr>
           <!-- 101010101010101010 -->


			<!-- ป โท-->
          <tr class="warning">
            <td>บริหารธุรกิจมหาบัณฑิต(บธ.ม.)</td>
            <td><?php echo $total103;?></td>
            <td><?php echo "0";?></td>
            <td><?php echo ($total103);?></td>
         </tr>
           <!-- 101010101010101010 -->



		<!-- ป โท -->
          <tr class="warning">
            <td>รัฐประศาสนศาสตรมหาบัณฑิต (รป.ม.)</td>
            <td><?php echo $total101;?></td>
            <td><?php echo "0";?></td>
            <td><?php echo ($total101);?></td>
          </tr>
           <!-- 101010101010101010 -->



          <!-- ป โท -->
          <tr class="warning">
            <td>ศิลปศาสตรมหาบัณฑิต(ศศ.ม.)</td>
            <td><?php echo $total102;?></td>
            <td><?php echo "0";?></td>
            <td><?php echo ($total102);?></td>
          </tr>
          <!-- End 1111111111111111111111 End -->


		  <!-- ป โท -->
          <tr class="warning">
            <td>สาธารณสุขมหาบัณฑิต</td>
            <td><?php echo $total104;?></td>
            <td><?php echo "0";?></td>
            <td><?php echo ($total104);?></td>
         </tr>
          <!-- End 1111111111111111111111 End -->



		  <!-- 111111111111111111111111111111 -->
          <tr class="warning">
            <td>ครุศาสตรบัณฑิต(ค.บ.)</td>
            <td><?php echo $total3;?></td>
            <td><?php echo $total33;?></td>
            <td><?php echo ($total3+$total33);?></td>
          </tr>
          <!-- End 1111111111111111111111 End -->


          <!-- 222222222222222222222222222222 -->
          <tr class="warning">
            <td>วิทยาศาสตรบัณฑิต(วท.บ.)</td>
            <td><?php echo $total4;?></td>
            <td><?php echo $total44;?></td>
            <td><?php echo ($total4+$total44);?></td>
          </tr>
          <!-- End 2222222222222222222222 End -->


          <!-- 333333333333333333333333333333 -->
          <tr class="warning">
            <td>นิติศาสตรบัณฑิต(น.บ.)</td>
            <td><?php echo $total5;?></td>
            <td><?php echo $total55;?></td>
            <td><?php echo ($total5+$total55);?></td>
          </tr>
          <!-- End 3333333333333333333333 End -->


          <!-- 444444444444444444444444444444 -->
          <tr class="warning">
            <td>รัฐประศาสนศาสตรบัณฑิต(รป.บ.)</td>
            <td><?php echo $total6;?></td>
            <td><?php echo $total66;?></td>
            <td><?php echo ($total6+$total66);?></td>
          </tr>
          <!-- End 4444444444444444444444 End -->


          <!-- 555555555555555555555555555555 -->
          <tr class="warning">
            <td>ศิลปกรรมศาสตรบัณฑิต(ศป.บ.)</td>
            <td><?php echo $total2;?></td>
            <td><?php echo $total22;?></td>
            <td><?php echo ($total2+$total22);?></td>
          </tr>
          <!-- End 5555555555555555555555 End -->


          <!-- 666666666666666666666666666666 -->
          <tr class="warning">
            <td>ศิลปศาสตรบัณฑิต(ศศ.บ.)</td>
            <td><?php echo $total1;?></td>
            <td><?php echo $total11;?></td>
            <td><?php echo ($total1+$total11);?></td>
          </tr>
          <!-- End 6666666666666666666666 End -->


          <!-- 777777777777777777777777777777 -->
          <tr class="warning">
            <td>บัญชีบัณฑิต(บช.บ.)</td>
            <td><?php echo $total8;?></td>
            <td><?php echo $total88;?></td>
            <td><?php echo ($total8+$total88);?></td>
          </tr>
          <!-- End 7777777777777777777777 End -->


          <!-- 888888888888888888888888888888 -->
          <tr class="warning">
            <td>พยาบาลศาสตรบัณฑิต(พย.บ.)</td>
            <td><?php echo $total9;?></td>
            <td><?php echo $total99;?></td>
            <td><?php echo ($total9+$total99);?></td>
         </tr>
          <!-- End 8888888888888888888888 End -->


          <!-- 999999999999999999999999999999 -->
          <tr class="warning">
            <td>บริหารธุรกิจบัณฑิต(บธ.บ.)</td>
            <td><?php echo $total7;?></td>
            <td><?php echo $total77;?></td>
            <td><?php echo ($total7+$total77);?></td>
          </tr>
          <!-- End 9999999999999999999999 End -->


			<tr class="warning">
            <td>นิเทศศาสตรบัณฑิต</td>
            <td><?php echo $tota20;?></td>
            <td><?php echo $tota200;?></td>
            <td><?php echo ($tota20+$tota200);?></td>
          </tr>
          <!-- End 9999999999999999999999 End -->
		  

           <tr class="danger">
            <td>รวมบัณฑิต</td>
            <td><?php $q=mysql_query("select * from scan2557 where level like '%ปกติ%' and type123='1' ;",$con); echo mysql_num_rows($q);?></td>
            <td><?php $q=mysql_query("select * from scan2557 where level not like '%ปกติ%' and type123='1' ;",$con); echo mysql_num_rows($q);?></td>
            <td><?php $q=mysql_query("select * from scan2557 where type123='1' ;",$con); echo mysql_num_rows($q);?></td>
          </tr>
        </tbody>

	</table>
	<center>
				
					<input TYPE="button" value="Print" class="noPrint btn btn-success btn-md" onClick="window.print()">
                    
			

			</center>
                    </div>

        </div>

            <!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="dist/js/bootstrap.min.js"></script>
		<center> Copyright © by สาขาวิทยาการคอมพิวเตอร์  คณะวิทยาศาสตร์และเทคโนโลยี  2017
		<br><br>
  </body>
</html>
<?php
include('sphp/cconn.php');
?>