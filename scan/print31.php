
<meta charset="utf-8">  
              <div class="col-md-12">
                   <ul class="breadcrumb">
                        <li>
                          <a href="main.php">˹����ѡ</a>
                        </li>
                        <li>
                         <a href="main.php">��¡����ѡ</a>
                        </li>
                        <li>
                        <a href="menu_3-0.php">��§ҹ��ػ������</a>
                       </li>
                       <li>
                        <a href="menu_3-1.php">�ӹǹ�ѳ�Ե ��Ф����ʵ��</a>
                       </li>
                  </ul>
              </div>
        </div>
    

        <div class="row">
              <div class="col-md-3">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title text-center">��¡����ѡ (Main Menu)</h3>
                      </div>
                  <div class="panel-body">
                      <ul class="nav nav-pills">
<?php
  if(!isset($_SESSION['suser']))
  {
?>
<li>
                              <a href="login.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login �������к�</a>
                            </li>
                <li>
                              <a href="menu_2-0.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;��§ҹ��ػ����ز�</a>
                            </li>
                            <li class="active">
                                <a href="menu_3-0.php">
                                  <span class="glyphicon glyphicon-info-sign"></span>&nbsp;��§ҹ��ػ������</a>
                            </li>
<?php
  }
    else
    {
?>
                        <li >
                            <a href="menu_1.php">
                                <span class="glyphicon glyphicon-list-alt"></span>&nbsp;�����źѳ�Ե / ŧ�����ѹ�����Ѻ </a> 
                        </li>
                        <li>
                            <a href="menu_2-0.php">
                                <span class="glyphicon glyphicon-info-sign"></span>&nbsp;��§ҹ��ػ����ز�</a>
                        </li>
                        <li class="active">
                            <a href="menu_3-0.php">
                                <span class="glyphicon glyphicon-info-sign"></span>&nbsp;��§ҹ��ػ������</a>
                        </li>
						<li>
							<a href="configmenu/mainconfig.php">
								<span class="glyphicon glyphicon-cog"></span>&nbsp;��¡�èѴ����к�</a>
                        </li>
                        <li>
                            <a href="sphp/sessionout.php">
								<span class="glyphicon glyphicon-off"></span>&nbsp;�͡�ҡ�к�</a>
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
                          <center><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;�ӹǹ�ѳ�Ե��Ф����ʵ��</a></center>
                     </h3>           
                  </div>
          
                    <div class="panel-body">
                                                    <!-- Nav tabs -->
        <table class="table table-bordered">
               <thead>
                    <tr class="info">
                      <th rowspan="3"><center>�ѹ / ��͹ / ��</center></th>
                      <th colspan="9"><center>�ӹǹ�ѳ�Ե�� 2558 <br>��Ф����ʵ��</center></th>
                    </tr>
                    <tr class="info">
                      <tr class="info">
                      <th colspan="2" ><center>�Ҥ����</center></th>
                      <th><center>���</center></th>
                      <th colspan="2"><center>�Ҥ ��.��.</center></th>
                      <th><center>���</center></th>
                      <th colspan="3"><center>���������</center></th>
                    </tr>
                    <tr class="info">
                      <tr class="success">
                      <th><center></center></th>
                      <th><center><span class="glyphicon glyphicon-ok"></span>&nbsp;��</center></th>
                      <th><center><span class="glyphicon glyphicon-remove"></span>&nbsp;�����</center></th>
                      <th><center></center></th>
                      <th><center><span class="glyphicon glyphicon-ok"></span>&nbsp;��</center></th>
                      <th><center><span class="glyphicon glyphicon-remove"></span>&nbsp;�����</center></th>
                      <th><center></center></th>
                      <th><center>������</center></th>
                      <th><center><span class="glyphicon glyphicon-ok"></span>&nbsp;��</center></th>
                      <th><center><span class="glyphicon glyphicon-remove"></span>&nbsp;�����</center></th>
                    </tr>

                </thead>
                <tbody>
				
<?php
include('sphp/conn.php');
		
//�ѹ��� 1
		//�����ʵ�� ����
		//��
		$queryA1 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level like '%����%' and type123='1' and chdate31 is not null;",$con);
		$totalA1 = mysql_num_rows($queryA1);
		//�����
		$queryA11 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level like '%����%' and type123='1' and chdate31 is null;",$con);
		$totalA11 = mysql_num_rows($queryA11);

		//�����ʵ�� ��.��.
		//��
		$queryB1 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level not like '%����%' and type123='1' and chdate31 is not null;",$con);
		$totalB1 = mysql_num_rows($queryB1);
		//�����
		$queryB11 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level not like '%����%' and type123='1' and chdate31 is null;",$con);
		$totalB11 = mysql_num_rows($queryB11);
//End --------------------

//�ѹ��� 2
		//�����ʵ�� ����
		//��
		$queryA2 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level like '%����%' and type123='1' and chdate1 is not null;",$con);
		$totalA2 = mysql_num_rows($queryA2);
		//�����
		$queryA22 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level like '%����%' and type123='1' and chdate1 is null;",$con);
		$totalA22 = mysql_num_rows($queryA22);

		//�����ʵ�� ��.��.
		//��
		$queryB2 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level not like '%����%' and type123='1' and chdate1 is not null;",$con);
		$totalB2 = mysql_num_rows($queryB2);
		//�����
		$queryB22 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level not like '%����%' and type123='1' and chdate1 is null;",$con);
		$totalB22 = mysql_num_rows($queryB22);
//End --------------------

//�ѹ��� 3
		//�����ʵ�� ����
		//��
		$queryA3 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level like '%����%' and type123='1' and chdate2 is not null;",$con);
		$totalA3 = mysql_num_rows($queryA3);
		//�����
		$queryA33 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level like '%����%' and type123='1' and chdate2 is null;",$con);
		$totalA33 = mysql_num_rows($queryA33);

		//�����ʵ�� ��.��.
		//��
		$queryB3 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level not like '%����%' and type123='1' and chdate2 is not null;",$con);
		$totalB3 = mysql_num_rows($queryB3);
		//�����
		$queryB33 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level not like '%����%' and type123='1' and chdate2 is null;",$con);
		$totalB33 = mysql_num_rows($queryB33);
//End --------------------

//�ѹ��� 4
		//�����ʵ�� ����
		//��
		$queryA4 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level like '%����%' and type123='1' and chdate3 is not null;",$con);
		$totalA4 = mysql_num_rows($queryA4);
		//�����
		$queryA44 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level like '%����%' and type123='1' and chdate3 is null;",$con);
		$totalA44 = mysql_num_rows($queryA44);

		//�����ʵ�� ��.��.
		//��
		$queryB4 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level not like '%����%' and type123='1' and chdate3 is not null;",$con);
		$totalB4 = mysql_num_rows($queryB4);
		//�����
		$queryB44 = mysql_query("select * from scan2557 where faculty = '�����ʵ��' and level not like '%����%' and type123='1' and chdate3 is null;",$con);
		$totalB44 = mysql_num_rows($queryB44);
//End --------------------
?>

                  <tr class="warning">
                    <td>19 �ѹ��¹ 2558</td>
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
                    <td>20 �ѹ��¹ 2558</td>
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
                    <td>21 �ѹ��¹ 2558</td>
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
                    <td>22 �ѹ��¹ 2558</td>
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