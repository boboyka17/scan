<?php
include('../sphp/conn.php');
session_start();
if (!isset($_SESSION['suser'])) {
?>
    <meta http-equiv="refresh" content="0;url=../fail-login.php">
<?php
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร 2560</title>
        <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body style="font-family:'Kanit'">
        <div class="container">
            <div class="row">
                <center><img src="../headnew.png"></center>
            </div>
            <!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="../main.php">หน้าหลัก</a>
                        </li>
                        <li>
                            <a href="mainconfig.php">รายการจัดการระบบ</a>
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
                                <li>
                                    <a href="../menu_1.php">
                                        <span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลบัณฑิต / ลงชื่อวันซ้อมรับ </a>
                                </li>
                                <li>
                                    <a href="../report/reporsumtotal.php">
                                        <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                                </li>
                                <li>
                                    <a href="../report/reporsumkanatotal.php">
                                        <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามคณะ</a>
                                </li>
                                <li class="active">
                                    <a href="mainconfig.php">
                                        <span class="glyphicon glyphicon-cog"></span>&nbsp;รายการจัดการระบบ</a>
                                </li>
                                <li>
                                    <a href="../sphp/sessionout.php">
                                        <span class="glyphicon glyphicon-off"></span>&nbsp;ออกจากระบบ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- +++++++++++++++++++++ END OF MENU-BAR ++++++++++++++++++++++++-->
                <?php

                $chstatus = $conn->query("select * from user2557 where user='" . $_SESSION['suser'] . "';");
                $showstatus = $chstatus->fetch_array();
                ?>

                <div class="col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;รายชื่ออาจารย์คุมแถวรอบแรก</center>
                            </h3>
                        </div>
                        <style>
                            .foo {
                                padding: 50px;
                            }
                        </style>
                        <div class="panel-body foo">
                            <?php
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                $sql = sprintf("SELECT * FROM teacher2 WHERE tcid='%s'", $_GET["id"]);
                                $result = $conn->query($sql) or die($conn->error);
                                $row = $result->fetch_assoc();
                            }
                            ?>
                            <form action="check_edit2.php?id=<?= $id ?>" method="POST">
                                <div class="form-group">
                                    <label for="">ลำดับแถว</label>
                                    <input name="tcid" type="number" class="form-control" value="<?= $row["tcid"] ?>" placeholder="ป้อนลำดับแถว">
                                </div>
                                <div class="form-group">
                                    <label for="">ชื่อ-สกุล อาจารย์คุมแถว</label>
                                    <input name="tcname" type="text" class="form-control" value="<?= $row["tcname"] ?>" placeholder="ป้อนชื่อ-สกุล อาจารย์คุมแถว">
                                </div>
                                <div class="form-group">
                                    <label for="">เบอร์โทรศัพท์</label>
                                    <input name="tcphone" type="text" class="form-control" value="<?= $row["tcphone"] ?>" placeholder="ป้อนเบอร์โทรศัพท์">
                                </div>
                                <button class="btn btn-success">แก้ไข</button>
                            </form>
                            <div class="text-right">
                                <a href="editteacher2.php">ย้อนกลับ</a>
                            </div>
                        </div>
                    </div>

                    <!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->


                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="../dist/js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
}
?>