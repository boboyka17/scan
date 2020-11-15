
<meta charset="utf-8">  
              <div class="col-md-12">
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
                       <li>
                        <a href="menu_3-1.php">จำนวนบัณฑิต คณะครุศาสตร์</a>
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
<?php
  if(!isset($_SESSION['suser']))
  {
?>
<li>
                              <a href="login.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>
                <li>
                              <a href="menu_2-0.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามวุฒิ</a>
                            </li>
                            <li class="active">
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
                        <li>
                            <a href="menu_2-0.php">
                                <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามวุฒิ</a>
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
                          <center><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;จำนวนบัณฑิตคณะครุศาสตร์</a></center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
                                                    <!-- Nav tabs -->
        <table class="table table-bordered">
               <thead>
                    <tr class="info">
                      <th rowspan="3"><center>วัน / เดือน / ปี</center></th>
                      <th colspan="9"><center>จำนวนบัณฑิตปี 2558 <br>คณะครุศาสตร์</center></th>
                    </tr>
                    <tr class="info">
                      <tr class="info">
                      <th colspan="2" ><center>ภาคปกติ</center></th>
                      <th><center>รวม</center></th>
                      <th colspan="2"><center>ภาค กศ.บท.</center></th>
                      <th><center>รวม</center></th>
                      <th colspan="3"><center>รวมทั้งหมด</center></th>
                    </tr>
                    <tr class="info">
                      <tr class="success">
                      <th><center></center></th>
                      <th><center><span class="glyphicon glyphicon-ok"></span>&nbsp;มา</center></th>
                      <th><center><span class="glyphicon glyphicon-remove"></span>&nbsp;ไม่มา</center></th>
                      <th><center></center></th>
                      <th><center><span class="glyphicon glyphicon-ok"></span>&nbsp;มา</center></th>
                      <th><center><span class="glyphicon glyphicon-remove"></span>&nbsp;ไม่มา</center></th>
                      <th><center></center></th>
                      <th><center>ทั้งหมด</center></th>
                      <th><center><span class="glyphicon glyphicon-ok"></span>&nbsp;มา</center></th>
                      <th><center><span class="glyphicon glyphicon-remove"></span>&nbsp;ไม่มา</center></th>
                    </tr>

                </thead>
                <tbody>
				
<?php
include('sphp/conn.php');
		
//วันที่ 1
		//ครุศาสตร์ ปกติ
		//มา
		$queryA1 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate31 is not null;",$con);
		$totalA1 = mysql_num_rows($queryA1);
		//ไม่มา
		$queryA11 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate31 is null;",$con);
		$totalA11 = mysql_num_rows($queryA11);

		//ครุศาสตร์ กศ.บท.
		//มา
		$queryB1 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate31 is not null;",$con);
		$totalB1 = mysql_num_rows($queryB1);
		//ไม่มา
		$queryB11 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate31 is null;",$con);
		$totalB11 = mysql_num_rows($queryB11);
//End --------------------

//วันที่ 2
		//ครุศาสตร์ ปกติ
		//มา
		$queryA2 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate1 is not null;",$con);
		$totalA2 = mysql_num_rows($queryA2);
		//ไม่มา
		$queryA22 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate1 is null;",$con);
		$totalA22 = mysql_num_rows($queryA22);

		//ครุศาสตร์ กศ.บท.
		//มา
		$queryB2 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate1 is not null;",$con);
		$totalB2 = mysql_num_rows($queryB2);
		//ไม่มา
		$queryB22 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate1 is null;",$con);
		$totalB22 = mysql_num_rows($queryB22);
//End --------------------

//วันที่ 3
		//ครุศาสตร์ ปกติ
		//มา
		$queryA3 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate2 is not null;",$con);
		$totalA3 = mysql_num_rows($queryA3);
		//ไม่มา
		$queryA33 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate2 is null;",$con);
		$totalA33 = mysql_num_rows($queryA33);

		//ครุศาสตร์ กศ.บท.
		//มา
		$queryB3 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate2 is not null;",$con);
		$totalB3 = mysql_num_rows($queryB3);
		//ไม่มา
		$queryB33 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate2 is null;",$con);
		$totalB33 = mysql_num_rows($queryB33);
//End --------------------

//วันที่ 4
		//ครุศาสตร์ ปกติ
		//มา
		$queryA4 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate3 is not null;",$con);
		$totalA4 = mysql_num_rows($queryA4);
		//ไม่มา
		$queryA44 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate3 is null;",$con);
		$totalA44 = mysql_num_rows($queryA44);

		//ครุศาสตร์ กศ.บท.
		//มา
		$queryB4 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate3 is not null;",$con);
		$totalB4 = mysql_num_rows($queryB4);
		//ไม่มา
		$queryB44 = mysql_query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate3 is null;",$con);
		$totalB44 = mysql_num_rows($queryB44);
//End --------------------
?>

                  <tr class="warning">
                    <td>19 กันยายน 2558</td>
                    <td><?php echo $totalA1;?></td>
                    <td><?php echo $totalA11;?></td>
                    <td><?php echo ($totalA1+$totalA11);?></td>
                    <td><?php echo $totalB1;?></td>
                    <td><?php echo $totalB11;?></td>
                    <td><?php echo ($totalB1+$totalB11);?></td>
                    <td><?php echo ($totalA1+$totalA11+$totalB1+$totalB11);?></td>
                    <td><?php echo ($totalA1+$totalB1);?></td>
                    <td><?php echo ($totalA11+$totalB11);?></td>
                  </tr>

                  <tr class="warning">
                    <td>20 กันยายน 2558</td>
                    <td><?php echo $totalA2;?></td>
                    <td><?php echo $totalA22;?></td>
                    <td><?php echo ($totalA2+$totalA22);?></td>
                    <td><?php echo $totalB2;?></td>
                    <td><?php echo $totalB22;?></td>
                    <td><?php echo ($totalB2+$totalB22);?></td>
                    <td><?php echo ($totalA2+$totalA22+$totalB2+$totalB22);?></td>
                    <td><?php echo ($totalA2+$totalB2);?></td>
                    <td><?php echo ($totalA22+$totalB22);?></td>
                  </tr>

                  <tr class="warning">
                    <td>21 กันยายน 2558</td>
                    <td><?php echo $totalA3;?></td>
                    <td><?php echo $totalA33;?></td>
                    <td><?php echo ($totalA3+$totalA33);?></td>
                    <td><?php echo $totalB3;?></td>
                    <td><?php echo $totalB33;?></td>
                    <td><?php echo ($totalB3+$totalB33);?></td>
                    <td><?php echo ($totalA3+$totalA33+$totalB3+$totalB33);?></td>
                    <td><?php echo ($totalA3+$totalB3);?></td>
                    <td><?php echo ($totalA33+$totalB33);?></td>
                  </tr>

                  <tr class="warning">
                    <td>22 กันยายน 2558</td>
                    <td><?php echo $totalA4;?></td>
                    <td><?php echo $totalA44;?></td>
                    <td><?php echo ($totalA4+$totalA44);?></td>
                    <td><?php echo $totalB4;?></td>
                    <td><?php echo $totalB44;?></td>
                    <td><?php echo ($totalB4+$totalB44);?></td>
                    <td><?php echo ($totalA4+$totalA44+$totalB4+$totalB44);?></td>
                    <td><?php echo ($totalA4+$totalB4);?></td>
                    <td><?php echo ($totalA44+$totalB44);?></td>
					 <tr colspan="4"><th colspan="10" style="text-align:center;"  >
									

								</th></tr>
                  </tr>
                 
                </tbody>				
<?php
include('sphp/cconn.php');
?>		

              </table>


      
                    </div>
        </div>