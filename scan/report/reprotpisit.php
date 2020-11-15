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
  <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร <?php echo ($Year = DATE("Y", strtotime("now")) + 543); ?></title>

  <!-- Bootstrap -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <div id="top"></div>
</head>

<body onload="document.getElementById('save').focus();">
  <style media="print">
    .noPrint {
      display: none;
    }

    .yesPrint {
      display: block !important;
    }
  </style>
  <div class="container">
    <div class="row noPrint">
      <center><img src="head.png"></center>
    </div>
    <!---------------------------------------------------------------------------------->

    <div class="row">

      <div class="col-md-12 noPrint">
        <ul class="breadcrumb">

        </ul>
      </div>

    </div>
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              รายงานรายชื่อบัณฑิตพิเศษ
              <!-- รายงานคนที่มาวันที่ 6 แต่ไม่มาวันที่ 7 -->
              <!-- รายงานคนที่มาวันที่ 7(บ่าย) แต่ไม่มาวันที่ 6-->

              <?php
              $date = file_GET_contents("..//sphp/date.txt", "w");
              $_POST['date'] = $date;
              if ($_POST['date'] == "date1") {
                $query = sprintf("SELECT * FROM datescan WHERE idday='1';");
                $p = "เช้า";
              } else if ($_POST['date'] == "date12") {
                $query = sprintf("SELECT * FROM datescan WHERE idday='1';");
                $p = "บ่าย";
              } else if ($_POST['date'] == "date2") {
                $query = sprintf("SELECT * FROM datescan WHERE idday='2';");
                $p = "เช้า";
              } else if ($_POST['date'] == "date22") {
                $query = sprintf("SELECT * FROM datescan WHERE idday='2';");
                $p = "บ่าย";
              } else if ($_POST['date'] == "date3") {
                $query = sprintf("SELECT * FROM datescan WHERE idday='3';");
                $p = "เช้า";
              } else if ($_POST['date'] == "date32") {
                $query = sprintf("SELECT * FROM datescan WHERE idday='3';");
                $p = "บ่าย";
              } else if ($_POST['date'] == "date4") {
                $query = sprintf("SELECT * FROM datescan WHERE idday='4';");
                $p = "รอบที่ 1";
              } else if ($_POST['date'] == "date42") {
                $query = sprintf("SELECT * FROM datescan WHERE idday='4';");
                $p = "รอบที่ 2";
              }
              $result = $conn->query($query);
              $row1 = $result->fetch_assoc();
              // echo "( วันที่"." ".$row1["date"]." ".$row1["mont"]." ".$row1["year"]." ".$p.")" ;
              ?>
            </center>
          </h3>
        </div>
        <div class="panel-body">
          <div align="right">
            <p> <?php
                $query = "select * from scan2557 where statustext like '%p%' or statustext like '%P%'";
                //$query="select * from scan2557 where (chdate1!='' or chdate12!='') and  chdate2=''";
                //$query="SELECT * FROM `scan2557` WHERE `chdate22` != '' and `chdate1` = ''";
                $result = $conn->query($query);
                echo 'ทั้งหมด ' . $result->num_rows . '   คน'; ?>
            </p>
          </div>




          <table class="table table-bordered table2excel">

            <thead>
              <tr class="info">

                <th>
                  <center>
                    เลขบัณฑิต
                  </center>
                </th>
                <th colspan="3">
                  <center>
                    ชื่อ-สกุล
                  </center>
                </th>
                <th>
                  <center>
                    ปริญญา
                  </center>
                </th>
                <th>
                  <center>
                    ก
                  </center>
                </th>

                <th width="20">
                  <center>
                    คณะ
                  </center>
                </th>
                <th width="20">
                  <center>
                    สาขา
                  </center>
                </th>
                <th>
                  <center>
                    หมายเหตุ
                  </center>
                </th>
              </tr>
              <?php
              $query = "select * from scan2557 where statustext like '%p%' or statustext like '%P%'";
              //$query="select * from scan2557 where (chdate1!='' or chdate12!='') and  chdate2=''"; 
              //  $query="SELECT * FROM `scan2557` WHERE `chdate22` != '' and `chdate1` = ''";
              $result = $conn->query($query);

              while ($row = $result->fetch_assoc($result)) {
              ?>


                <tr class="warning">

                  <td>
                    <div align="left"><?php echo $row['counteducation'] ?></div>
                  </td>
                  <td>
                    <div align="left"><?php echo $row['pre'] ?></div>
                  </td>
                  <td>
                    <div align="left"><?php echo $row['name'] ?></div>
                  </td>
                  <td>
                    <div align="left"><?php echo $row['lastname'] ?></div>
                  </td>
                  <td>
                    <div align="left"><?php echo $row['education']; ?></div>
                  </td>
                  <td>
                    <div align="left"><?php if ($row['degree'] == '9') echo '-';
                                      else echo $row['degree']; ?>
                    </div>
                  </td>

                  <td>
                    <div align="left"><?php echo $row['major']; ?></div>
                  </td>
                  <td>
                    <div align="left"><?php echo $row['faculty']; ?></div>
                  </td>
                  <td>
                    <div align="left"><?php echo $row['statustext']; ?></div>
                  </td>
                </tr>
              <?php


              }
              ?>




            </thead>
            <tbody>
            </tbody>
          </table>

          <p align="center">
            <input name="print" class="noPrint btn btn-success btn-md" type="button" value="Print" onClick="window.print()">
            <input name="printt" class="noPrint btn btn-success btn-md" type="button" value="Excel" onClick="printt()">
            <a href="homereport.php">
              <input name="printt" class="noPrint btn btn-success btn-md" type="button" value="กลับ">
            </a>
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
<center> Copyright © by สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี 2017

</html>
<?php
include('../sphp/cconn.php');
?>