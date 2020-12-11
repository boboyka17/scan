﻿<?php
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
    <div class="col-md-12 noPrint">
      <ul class="breadcrumb">
        <li><a href="mad.php?st=<?php echo $_GET['st']; ?>">กลับ</a></li>
        <?php if ($_GET['st'] == 1) { ?><li><a href="madtotal.php?st=2">รอบสอง</a></li><?php } ?>
        <?php if ($_GET['st'] == 2) { ?><li><a href="madtotal.php?st=1">รอบแรก</a></li><?php } ?>
        <li><a href="madtotal.php?st=<?php echo $_GET['st']; ?>">รายงานสรุปตัดมัด</a></li>
      </ul>
    </div>
    <div class="row">
      <center>
      </center>
    </div>
    <!---------------------------------------------------------------------------------->

    <div class="row">



    </div>
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-body">

          <table class="table table-bordered table2excel">

            <thead>
              <tr class="info">
                <th colspan="10">
                  <center>
                    <p>สรุปข้อมูลบัณฑิต (มัดที่) </p>
                    <p><?php echo $st; ?></p>
                  </center>
                </th>
              </tr>
              <tr class="info">

                <th>
                  <center>
                    มัดที่
                  </center>
                </th>
                <th colspan="2">
                  <center>
                    รหัสบัณฑิตเริ่ม
                  </center>
                </th>
                <th colspan="2">
                  <center>
                    รหัสบัณฑิตสิ้นสุด
                  </center>
                </th>
                <th>
                  <center>
                    ลังที
                  </center>
                </th>

              </tr>
              <?php
              $date = file_GET_contents("..//sphp/date.txt", "w");
              $_POST['date'] = $date;
              // $query="select * from scan2557 where level like '%ปริญญาตรี%'   and (`statustext` not like  '%p%' or `statustext` is null) and ch".$_POST['date']." !='';";
              if ($_GET['st'] == 1) $query = "select * from scan2557 where level LIKE '%ตรี%' and ( education LIKE '%ศิลปกรรม%' or education LIKE '%รัฐป%' or education LIKE '%วิท%' or education LIKE '%นิเทศ%' or education LIKE '%รัฐศ%' or education LIKE '%บริหาร%')  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
              else $query2 = "select * from scan2557 where level LIKE '%ตรี%' or level LIKE '%โท%' or level LIKE '%เอก%' and (education LIKE '%ครุ%' or education LIKE '%นิติ%' or education LIKE '%บัญชี%' or education LIKE '%เศรษฐ%' or education LIKE '%ศิลปศาส%' or education LIKE '%พยาบาล%' or education LIKE '%มหา%' or education LIKE '%ดุษฎี%')  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
              $mad = 1;
              $idmad = 1;
              $im = 1;
              $lang = 1;
              $result = $conn->query($query);
              echo $count = $result->num_rows;
              while ($row = $result->fetch_assoc()) {
                if ($row['education'] == 'ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') $row['education'] = 'ค.บ.';
                else if ($row['education'] == 'นิติศาสตรบัณฑิต') $row['education'] = 'น.บ.';
                else  if ($row['education'] == 'วิทยาศาสตรบัณฑิต') $row['education'] = 'วท.บ.';
                else if ($row['education'] == 'รัฐประศาสนศาสตรบัณฑิต') $row['education'] = 'รป.บ.';
                else if ($row['education'] == 'ศิลปกรรมศาสตรบัณฑิต') $row['education'] = 'ศป.บ.';
                else if ($row['education'] == 'ศิลปศาสตรบัณฑิต') $row['education'] = 'ศศ.บ.';
                else if ($row['education'] == 'บัญชีบัณฑิต') $row['education'] = 'บช.บ.';
                else if ($row['education'] == 'พยาบาลศาสตรบัณฑิต') $row['education'] = 'พย.บ.';
                else if ($row['education'] == 'บริหารธุรกิจบัณฑิต') $row['education'] = 'บธ.บ.';
                else if ($row['education'] == 'นิเทศศาสตรบัณฑิต') $row['education'] = 'นศ.บ.';
                else if ($row['education'] == 'รัฐศาสตรบัณฑิต') $row['education'] = 'ร.บ.';
                else if ($row['education'] == 'เศรษฐศาสตรบัณฑิต') $row['education'] = 'ศ.บ.';


                $education = $row['education'];
                $counteducation = $row['counteducation'];

                if ($idmad == 1) { ?>
                  <tr class="warning">
                    <td>
                      <div align="left"><?php echo $mad; ?></div>
                    </td>
                    <td>
                      <div align="left"><?php echo $row['education'] ?></div>
                    </td>
                    <td>
                      <div align="left"><?php echo $row['counteducation'] ?></div>
                    </td><?php }
                        if ($idmad == 10) { ?>
                    <td>
                      <div align="left"><?php echo $row['education'] ?></div>
                    </td>
                    <td>
                      <div align="left"><?php echo $row['counteducation'] ?></div>
                    </td>
                    <td>
                      <div align="left">
                        <?php echo $lang; ?>
                    </td>
                  </tr>
                  <?php $idmad = 0;
                          $im++;
                          $mad++;
                          if ($im > 3) {
                            $lang++;
                            $im = 1;
                          }
                        }

                        $idmad++;
                      }
                      if ($_GET['st'] == 1) {
                        $spquery = "select * from scan2557 where level LIKE '%ตรี%' and ( education LIKE '%ศิลปกรรม%' or education LIKE '%รัฐป%' or education LIKE '%วิท%' or education LIKE '%นิเทศ%' or education LIKE '%รัฐศ%' or education LIKE '%บริหาร%') and(type123='1') and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
                        $resultsp = $conn->query($spquery);
                        echo "<hr>";
                        echo $count = $resultsp->num_rows;
                        while ($rowsp = $resultsp->fetch_assoc()) {
                          // -----------

                          if ($rowsp['education'] == 'ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') $rowsp['education'] = 'ค.บ.';
                          else if ($rowsp['education'] == 'นิติศาสตรบัณฑิต') $rowsp['education'] = 'น.บ.';
                          else  if ($rowsp['education'] == 'วิทยาศาสตรบัณฑิต') $rowsp['education'] = 'วท.บ.';
                          else if ($rowsp['education'] == 'รัฐประศาสนศาสตรบัณฑิต') $rowsp['education'] = 'รป.บ.';
                          else if ($rowsp['education'] == 'ศิลปกรรมศาสตรบัณฑิต') $rowsp['education'] = 'ศป.บ.';
                          else if ($rowsp['education'] == 'ศิลปศาสตรบัณฑิต') $rowsp['education'] = 'ศศ.บ.';
                          else if ($rowsp['education'] == 'บัญชีบัณฑิต') $rowsp['education'] = 'บช.บ.';
                          else if ($rowsp['education'] == 'พยาบาลศาสตรบัณฑิต') $rowsp['education'] = 'พย.บ.';
                          else if ($rowsp['education'] == 'บริหารธุรกิจบัณฑิต') $rowsp['education'] = 'บธ.บ.';
                          else if ($rowsp['education'] == 'นิเทศศาสตรบัณฑิต') $rowsp['education'] = 'นศ.บ.';
                          else if ($rowsp['education'] == 'รัฐศาสตรบัณฑิต') $rowsp['education'] = 'ร.บ.';
                          else if ($rowsp['education'] == 'เศรษฐศาสตรบัณฑิต') $rowsp['education'] = 'ศ.บ.';


                          $education = $rowsp['education'];
                          $counteducation = $rowsp['counteducation'];

                          if ($idmad == 1) { ?>
                    <tr class="danger">
                      <td>
                        <div align="left"><?php echo $mad; ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $rowsp['education'] ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $rowsp['counteducation'] ?></div>
                      </td><?php }
                          if ($idmad == 10) { ?>
                      <td>
                        <div align="left"><?php echo $rowsp['education'] ?></div>
                      </td>
                      <td>
                        <div align="left"><?php echo $rowsp['counteducation'] ?></div>
                      </td>
                      <td>
                        <div align="left">
                          <?php echo $lang; ?>
                      </td>
                    </tr>
                <?php $idmad = 0;
                            $im++;
                            $mad++;
                            if ($im > 3) {
                              $lang++;
                              $im = 1;
                            }
                          }

                          $idmad++;
                          // -----------
                        }
                      } else {
                        $spquery2 = "";
                      }
                      if ($idmad < 10 and $idmad != 1) { ?>
                <td>
                  <div align="left"><?php echo $education; ?></div>
                </td>
                <td>
                  <div align="left"><?php echo $counteducation; ?></div>
                </td>
                <td>
                  <div align="left">
                    <?php echo $lang; ?>
                </td>
                </tr>
              <?php } ?>
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
          <p></p>


        </div>
      </div>
</body>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="dist/js/bootstrap.min.js"></script>

</body>
<center> Copyright © by สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี 2017</center>

</html>
<?php
include('../sphp/cconn.php');
?>