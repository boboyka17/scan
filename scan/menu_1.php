<?php
session_start();
require_once("sphp/connect.php");
require_once("sphp/conn.php");
?>
<HTML>

<HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร 2563</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</HEAD>

<BODY onload="document.getElementById('id').focus();" style="font-family: 'Kanit'">
    <div class="container">
        <div class="row">
            <center>
                <img src="head.png">
            </center>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <?php if (isset($_SESSION['suser'])) { ?>
                        <li>
                            <a href="main.php">หน้าหลัก</a>
                        </li>
                        <li>
                            <a href="main.php">รายการหลัก</a>
                        </li>
                        <li>
                            <a href="report/reporsumtotal.php">รายงานสรุปตามปริญญา</a>
                        </li>
                    <?php } ?>
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
                            <li>
                                <a href="login.php"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>
                            <!-- <li class="active">
                                <a href="menu_1.php"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ</a>
                            </li> -->
                            <!-- <li>
                            <a href="report/reporsumtotal.php"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                        </li> -->
                            <!-- <li>
                            <a href="report/reporsumkanatotal.php"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                        </li> -->
                            <li class="active">
                                <a href="menu_1.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a>
                            </li>
                            <li>
                                <a href="report/reporsumtotal.php"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                            </li>
                            <li>
                                <a href="report/reporsumkanatotal.php"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                            </li>
                            <li>
                                <a href="configmenu/mainconfig.php"><span class="glyphicon glyphicon-cog"></span>&nbsp;รายการจัดการระบบ</a>
                            </li>
                            <li>
                                <a href="sphp/sessionout.php"><span class="glyphicon glyphicon-off"></span>&nbsp;ออกจากระบบ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <center>&nbsp; <span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </center>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="detail.php">
                            <div class="input-group">
                                <span class="input-group-addon">รหัสนักศึกษา </span>
                                <input id="id" name="id" type="text" class="form-control input-md">
                            </div><br>
                            <center>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search"></span>&nbsp;ตรวจสอบ</button>
                            </center>
                        </form><br /><br /><br />
                        <center>
                            <?php
                            $chstatus = $conn->query("select * from user2557 where user='" . @$_SESSION['suser'] . "';");
                            $showstatus = $chstatus->fetch_array();
                            if ($showstatus['status'] == 1 or $showstatus['status'] == 9 or $showstatus['status'] == 0) {
                                if (isset($_SESSION['suser'])) {
                            ?>
                                    <a href="configmenu/search.php"><button class="btn btn-primary" type="button">ค้นหาแบบพิเศษ!</button></a>
                                <?php
                                }
                                if ($showstatus['status'] == 1 or $showstatus['status'] == 9  and isset($_SESSION['suser'])) {
                                ?>
                                    <a href="configmenu/canceldate.php"><button class="btn btn-warning" type="button">ถอนสแกน!</button></a>
                            <?php }
                            } ?>
                        </center>
                    </div>
                </div>
                <center> Copyright © by สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี 2020</center>
            </div>
        </div>
    </div>
    <script src="dist/js/bootstrap.min.js"></script>
</BODY>

</HTML>