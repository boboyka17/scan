<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../sphp/conn.php');
if ($_POST['status'] == 1) {
    $st = "มา";
} else if ($_POST['status'] == 2) {
    $st = "ไม่มา";
} else {
    $st = "ทั้งหมด";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร <?php echo ($Year = DATE("Y", strtotime("now")) + 543); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


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
                    <li><a href="homereport.php">กลับ</a></li>
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <center>
                            รายงานรายชื่อ <?php
                                            if ($_POST['status'] != 3) {
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
                                                echo "วันที่" . " " . $row1["date"] . " " . $row1["mont"] . " " . $row1["year"] . " " . $p;
                                                echo "  (" . $st . ")";
                                            } else echo "ทั้งหมด";
                                            ?>
                        </center>
                    </h3>
                </div>
                <div class="panel-body">
                    <p></p>

                    <div align="center"></div>
                    <p align="right">
                        <input name="print" class="noPrint btn btn-success btn-md" type="button" value="Print" onClick="window.print()">
                        <input name="printt" class="noPrint btn btn-success btn-md" type="button" value="Excel" onClick="printt()">
                        <a href="homereport.php"> <input name="printt" class="noPrint btn btn-success btn-md" type="button" value="กลับ"></a>
                    </p>
                    <p align="right">ทั้งหมด <?php if ($_POST['status'] == 1) {
                                                    $query = "SELECT * FROM `scan2557` where ch" . $_POST['date'] . " !=''";
                                                    if (isset($_POST['parinya'])) {
                                                        $query = "SELECT * FROM `scan2557` where  education = '" . $_POST['parinya'] . "' and ch" . $_POST['date'] . " !=''";
                                                    }
                                                    if (isset($_POST['parinya2'])) {
                                                        $query = "SELECT * FROM `scan2557` where  faculty = '" . $_POST['parinya2'] . "' and ch" . $_POST['date'] . " !='' ";
                                                    }
                                                    if (isset($_POST['parinya3'])) {
                                                        $query = "SELECT * FROM `scan2557` where  major = '" . $_POST['parinya3'] . "' and faculty = '" . $_POST['id_faculty'] . "' and ch" . $_POST['date'] . " !=''";
                                                    }
                                                } else if ($_POST['status'] == 2) {
                                                    $query = "SELECT * FROM `scan2557` where ch" . $_POST['date'] . " =''";
                                                    if (isset($_POST['parinya'])) {
                                                        $query = "SELECT * FROM `scan2557` where education = '" . $_POST['parinya'] . "' and ch" . $_POST['date'] . " =''";
                                                    }
                                                    if (isset($_POST['parinya2'])) {
                                                        $query = "SELECT * FROM `scan2557` where  faculty = '" . $_POST['parinya2'] . "' and ch" . $_POST['date'] . " =''";
                                                    }
                                                    if (isset($_POST['parinya3'])) {
                                                        $query = "SELECT * FROM `scan2557` where   major = '" . $_POST['parinya3'] . "' and faculty = '" . $_POST['id_faculty'] . "' and ch" . $_POST['date'] . " =''";
                                                    }
                                                } else {

                                                    $query = "SELECT * FROM `scan2557`";
                                                    if (isset($_POST['parinya'])) {
                                                        $query = "SELECT * FROM `scan2557` where  education = '" . $_POST['parinya'] . "'";
                                                    }
                                                    if (isset($_POST['parinya2'])) {
                                                        $query = "SELECT * FROM `scan2557` where faculty = '" . $_POST['parinya2'] . "'";
                                                    }
                                                    if (isset($_POST['parinya3'])) {
                                                        $query = "SELECT * FROM `scan2557` where  major = '" . $_POST['parinya3'] . "' and faculty = '" . $_POST['id_faculty'] . "'";
                                                    }
                                                }

                                                $result = $conn->query($query);
                                                echo $result->num_rows; ?> คน</p>
                    <table class="table table-bordered table2excel">
                        <thead>

                            <tr class="info">

                                <th colspan="9">
                                    <center>
                                        รายชื่อบัณฑิตปี <?php echo ($Year = DATE("Y", strtotime("now")) + 543);
                                                        echo "  (" . $st . ")";
                                                        if (isset($_POST['parinya'])) echo "  " . $_POST['parinya'];
                                                        if (isset($_POST['parinya2'])) echo "  " . $_POST['parinya2'];
                                                        if (isset($_POST['parinya3'])) echo "  " . $_POST['parinya3'];
                                                        ?>
                                    </center>
                                </th>
                            </tr>

                            <tr class="info">
                                <th>
                                    <center>
                                        เลขบัณฑิต
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        รหัสนักศึกษา
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
                                <th width="10">
                                    <center>
                                        ก
                                    </center>
                                </th>
                                <th width="70">
                                    <center>
                                        มา/ไม่มา
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        หมายเหตุ
                                    </center>
                                </th>

                            </tr>

                        </thead>
                        <tbody>
                            <tr><?php

                                // $result=mysql_query($query,$con);
                                $i = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $i++;
                                    if ($row['education'] == 'ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') $row['education'] = 'ครุศาสตรบัณฑิต';
                                    $education = $row['education'];
                                    if ($row['degree'] != '9') $education = $row['education'] . ' เกียรตินิยมอันดับ ' . $row['degree'];


                                    if (@$showeducation != $education) {
                                        $showeducation = $education;
                                ?>
                            <tr class="warning">
                                <td colspan="10">
                                    <div align="left"><?php echo $showeducation; ?></div>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr class="warning">
                            <td>
                                <div align="center"><?php echo $row['counteducation']; ?></div>
                            </td>
                            <td><?php echo $row["std_id"]; ?></td>
                            <td><?php echo $row['pre']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td>
                                <div align="center">
                                    <?php echo $row['education'] ?>
                                </div>
                            </td>

                            <td>
                                <div align="center">
                                    <?php if ($row['degree'] == '9') echo '-';
                                    else echo $row['degree'] ?>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php $date = "ch" . $_POST['date'] . "";
                                    if ($row[$date] != '')
                                        echo "มา";
                                    else echo "ไม่มา"; ?>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php echo $row['statustext'] ?>
                                </div>
                            </td>


                        </tr>
                    <?php } ?>
                        </tbody>
                    </table>


                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
        <center> Copyright © by สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี 2020</center>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>


</body>

</html>

<?php
include('../sphp/cconn.php');
?>