<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร 2563</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>
<body>
<div class="container" style="font-family: 'Kanit'">
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
                        <a href="report/homereport.php">รายงานสรุปตามปริญญา</a></li>
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
                        <?php
                        if (!isset($_SESSION['suser'])) {
                            ?>
                            <li class="active">
                                <a href="login.php">
                                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Login เข้าสู่ระบบ</a>
                            </li>
                            <li>
                                <a href="menu_1.php">
                                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;ข้อมูลบัณฑิต /
                                    ลงชื่อวันซ้อมรับ</a>
                            </li>
                            <li>
                                <a href="report/reporsumtotal.php">
                                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                            </li>
                            <li>
                                <a href="report/reporsumkanatotal.php">
                                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="active">
                                <a href="menu_1.php">
                                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต /
                                    ลงชื่อวันซ้อมรับ </a>
                            </li>
                            <li>
                                <a href="report/reporsumtotal.php">
                                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                            </li>
                            <li>
                                <a href="report/reporsumkanatotal.php">
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
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;เข้าสู่ระบบ</center>
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="sphp/chuser.php">
                        <div class="form-group">
                            <label for="exampleUsername">User name</label>
                            <input class="form-control" id="user" name="user" placeholder="Username" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input class="form-control" id="pass" name="pass" placeholder="Password" type="password">
                        </div>
                        <center>
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok"></span>
                                &nbsp;เข้าสู่ระบบ
                            </button>
                        </center>
                    </form>
                </div>
            </div>
            <center>Copyright © by สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี 2020</center>
        </div>
    </div>
</div>
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
