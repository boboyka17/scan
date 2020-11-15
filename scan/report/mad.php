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
        <div class="col-md-12 noPrint">
            <ul class="breadcrumb">
                <li><a href="../configmenu/mainconfig.php">กลับ</a></li>
                <?php if ($_GET['st'] == 1) { ?><li><a href="mad.php?st=2">รอบสอง</a></li><?php } ?>
                <?php if ($_GET['st'] == 2) { ?><li><a href="mad.php?st=1">รอบแรก</a></li><?php } ?>
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


                        <tr class="info">
                            <th colspan="10">
                                <center>
                                    รายงานรายชื่อบัณฑิตเข้ารับพระราชทาน (สำหรับตัดมัด)
                                </center>
                            </th>
                        </tr>
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
                                    มัดที่
                                </center>
                            </th>

                            <th>
                                <center>
                                    คนที่
                                </center>
                            </th>
                        </tr>
                        <?php
                        $date = file_GET_contents("..//sphp/date.txt", "w");
                        $_POST['date'] = $date;
                        // $query="select * from scan2557 where level like '%ปริญญาตรี%'   and (`statustext` not like  '%p%' or `statustext` is null) and ch".$_POST['date']." !='';";
                        if ($_GET['st'] == 1) $query = "select * from scan2557 where ( education like '%ครุศาสตรบัณฑิต%' or education like '%นิติศาสตรบัณฑิต%' or education like '%รัฐประศาสนศาสตรบัณฑิต%' or education like '%รัฐศาสตรบัณฑิต%' or education like '%ศิลปกรรมศาสตรบัณฑิต%' or education like '%ศิลปศาสตรบัณฑิต%' or education like '%พยาบาลศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";
                        else $query = "select * from scan2557 where (education like '%บริหารธุรกิจบัณฑิต%' or education like '%บัญชีบัณฑิต%' or education like '%เศรษฐศาสตรบัณฑิต%' or education like '%วิทยาศาสตรบัณฑิต%' or education like '%นิเทศศาสตรบัณฑิต%' )  and  (`statustext` not like  '%p%' or `statustext` is null) and ch" . $_POST['date'] . " !='';";

                        $mad = 1;
                        $idmad = 1;
                        $im = 1;
                        $result = $conn->query($query);
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
                                    <div align="left"><?php echo $mad; ?>
                                </td>

                                <td>
                                    <div align="left"><?php echo $idmad; ?></div>
                                </td>
                            </tr>

                            <?php
                            $idmad++;
                            $im++;
                            if ($im > 30) {
                            ?>



                            <?php
                                $im = 1;
                            }
                            if ($idmad > 10 and $im < 30) {
                            ?><tr class="warning">
                                    <td colspan="10">&nbsp;</td>
                                </tr><?php
                                        $mad++;
                                        $idmad = 1;
                                    }
                                } ?>


                    </table>

                    <p align="right">สรุป ทั้งหมด <?php echo $mad; ?> มัด</p>

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


<center> Copyright © by สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี 2017</center>

</html>
<?php
include('../sphp/cconn.php');
?>