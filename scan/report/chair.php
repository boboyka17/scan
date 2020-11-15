<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../sphp/conn.php');
if ($_GET['st'] == 1) {
  $st = 'รอบแรก';
} else if ($_GET['st'] == 2) {
  $st = 'รอบสอง';
}

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
          <li><a href="chairtotal.php">กลับ</a></li>
          <li><a href="chairnum.php?st=<?php echo $_GET['st']; ?>">สรุปเลขที่นั่ง</a></li>
          <li><a href="chairP.php?st=<?php echo $_GET['st']; ?>">แถวพิเศษ</a></li>

        </ul>
      </div>

    </div>
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              รายงานเลขที่นั่งบัณฑิต <?php
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
                                      $result = $conn->query($query) or die($conn->error);
                                      $row1 = $result->fetch_assoc();
                                      echo "( วันที่" . " " . $row1["date"] . " " . $row1["mont"] . " " . $row1["year"] . " " . $p . ")"; ?>
            </center>
          </h3>
        </div>
        <div class="panel-body">
          <p></p>


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
                <th>
                  <center>
                    <?php echo "<span class='glyphicon glyphicon-ok'></span>" . '<strong> / </strong>' . "<span class='glyphicon glyphicon-remove'></span>";
                    ?>
                  </center>
                </th>
                <th width="20">
                  <center>
                    ลำดับแถว
                  </center>
                </th>
                <th width="20">
                  <center>
                    ลำดับในแถว
                  </center>
                </th>
                <th>
                  <center>
                    หมายเหตุ
                  </center>
                </th>
                <th>
                  <center>
                    ที่
                  </center>
                </th>
              </tr>

              <?php

              if ($_GET['st'] == 1) {
                $i = 1;
                $id = 1;
                $strid = 1;

                $query = "select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";

                $result = $conn->query($query) or die($conn->error);
                while ($row = $result->fetch_assoc()) {


                  if ($row['education'] == 'ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') $row['education'] = 'ครุศาสตรบัณฑิต';
                  $education = $row['education'];
                  if ($row['degree'] != '9')  $education = $row['education'] . ' เกียรตินิยมอันดับ ' . $row['degree'];


                  if (@$showeducation != $education) {
                    $showeducation = $education;
              ?><tr class="warning">
                      <td colspan="10">
                        <div align="left"><?php echo $showeducation; ?></div>
                      </td>
                    </tr>
                  <?php } ?>
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
                    <td></td>
                    <td>
                      <div align="left"><?php echo $strid; ?></div>
                    </td>
                    <td>
                      <div align="left"><?php echo $id; ?></div>
                    </td>
                    <td>
                      <div align="left"><?php echo $row['statustext']; ?></div>
                    </td>
                    <td>
                      <div align="left"><?php echo $i; ?></div>
                    </td>
                  </tr>
                  <?php

                  $i++;
                  $id++;
                  if ($id > 80) {
                    $strid++;
                    $id = 1;
                  }
                }
              } else {
                $r = $conn->query("select max(count) as maxcount from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null);") or die($conn->error);
                $maxcount = $r->fetch_assoc();
                $sum = 1;
                $i = 1;
                $id = 1;
                $strid = 1;
                $t = 1;

                $r = $conn->query("select * from scan2557 where (education like '%มหาบัณฑิต%' or education like '%ดุษฎีบัณฑิต%')  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';") or die($conn->error);
                $num = $r->num_rows;
                $num = floor($num /= 80);
                $num = $num * 80;
                $num1 = $r->num_rows - $num;
                $num2 = 80 - $num1;
                while ($sum <= 3) {
                  if ($sum == 1) $query = "select  * from scan2557 where education like '%ดุษฎีบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
                  if ($sum == 2) {
                    if (@$stq == 3) {
                      $count++;
                      $query = "select * from scan2557 where education like '%มหาบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and count = " . $count . " and ch" . $_POST['date'] . " !='';";
                    } else $query = "select * from scan2557 where education like '%มหาบัณฑิต%'  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
                  }
                  if ($sum == 3) {

                    if (@$stq == 4) {
                      $count2++;
                      $query = "select * from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and count = " . $count2 . " and ch" . $_POST['date'] . " !='';";
                      if ($maxcount['maxcount'] == $count2) $t = 0;
                      $result = $conn->query($query) or die($conn->error);
                    } else $query = "select * from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
                  }


                  $result = $conn->query($query) or die($conn->error);

                  while ($row = $result->fetch_assoc()) {


                    $education = $row['education'];
                    if ($row['degree'] != '9')  $education = $row['education'] . ' เกียรตินิยมอันดับ ' . $row['degree'];

                    if (@$showeducation != $education) {
                      $showeducation = $education;
                  ?><tr class="warning">
                        <td colspan="10">
                          <div align="left"><?php echo $showeducation; ?></div>
                        </td>
                      </tr>
                    <?php } ?>
                    <tr class="warning">

                      <td>
                        <div align="left"><?php echo $row['counteducation']; ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $row['pre']; ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $row['name']; ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $row['lastname']; ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $row['education']; ?></div>
                      </td>
                      <td>
                        <div align="left">
                          <?php if ($row['degree'] == '9') echo '-';
                          else echo $row['degree']; ?>
                        </div>
                      </td>
                      <td></td>
                      <td>
                        <div align="left"><?php echo $strid; ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $id; ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $row['statustext']; ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $i; ?></div>
                      </td>
                    </tr>
              <?php

                    $i++;
                    $id++;
                    if ($id > 80) {
                      $strid++;
                      $id = 1;
                    }
                    if ($i == $num + 1) {
                      $sum = 3;
                      $ich = 0;
                      $st = 1;
                      $count = $row['count'];
                      break;
                    }
                    if (@$st == 1) $ich++;
                    if (@$ich == $num2) {
                      $sum = 2;
                      $stq = 3;
                      $ich2 = 0;
                      $count2 = $row['count'];
                      break;
                    }
                    if (@$stq == 3) $ich2++;
                    if (@$ich2 == $num1) {
                      $stq = 4;
                      $sum = 3;
                    }
                  }

                  if ($t == 0) break;
                  if (@$st != 1) $sum++;
                }
              }
              ?>
            </thead>
            <tbody>
            </tbody>
          </table>
          </tbody>

          </table>
          <p align="center">
            <input name="print" class="noPrint btn btn-success btn-md" type="button" value="Print" onClick="window.print()">
            <input name="printt" class="noPrint btn btn-success btn-md" type="button" value="Excel" onClick="printt()">

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