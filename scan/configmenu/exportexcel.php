<?php
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
        <title>สรุปยอดบัณฑิตผู้มีสิทธิ์รับพระราชทานปริญญาบัตร 2563</title>
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

    <body style="font-family: 'Kanit'">
        <style media="print">
            .noPrint {
                display: none;
            }

            .yesPrint {
                display: block !important;
            }
        </style>
        <STYLE TYPE="text/css">
            p.breakhere {
                page-break-before: always
            }
        </STYLE>
        <P class="breakhere">

            <div class="container">
                <div>
                    <center><img src="../headnew.png"></center>
                </div>

                <!-- +++++++++++++++++++++ END OF HEADER ++++++++++++++++++++++++-->

                <div class="row">
                    <div class="col-md-12 noPrint">
                        <ul class="breadcrumb">
                            <li>
                                <a href="../main.php">หน้าหลัก</a>
                            </li>
                            <li>
                                <a href="mainconfig.php">รายการจัดการระบบ</a>
                            </li>
                            <li>
                                <a href="reporttext.php">ระบบรายงานผล ReMark</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3 noPrint">
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
                                            <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามวุฒิ</a>
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
                    include('../sphp/conn.php');
                    /**
		//ครุศาสตร์ ปกติ
		//มา

		//$query=sprintf("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and");

		$queryA1 = $conn->query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate31 !=' ';");
		$totalA1 = $result->num_rows($queryA1);
		//ไม่มา
		$queryA11 = $conn->query("select * from scan2557 where faculty = 'ครุศาสตร์' and level like '%ปกติ%' and type123='1' and chdate31 =' ';");
		$totalA11 = $result->num_rows($queryA11);
		
		

		//ครุศาสตร์ กศ.บท.
		//มา
		$queryB3 = $conn->query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate2 !=' ';");
		$totalB3 = $result->num_rows($queryB3);
		//ไม่มา
		$queryB33 = $conn->query("select * from scan2557 where faculty = 'ครุศาสตร์' and level not like '%ปกติ%' and type123='1' and chdate2 =' ';");
		$totalB33 = $result->num_rows($queryB33);
                     */
                    ?>


                    <div class="col-md-9">
                        <div class="panel panel-primary">
                            <div class="panel-heading noPrint">
                                <h3 class="panel-title">
                                    <center>&nbsp; <span class="glyphicon glyphicon-user "></span>&nbsp;สรุปยอดบัณฑิตผู้มีสิทธิ์รับพระราชทานปริญญาบัตร 2563 </center>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <!--left-->
                                </FORM>
                                <?php

                                ?></center>
                                <form action="" method='get'>
                                    <div class="row">
                                        <div class="col-sm-5 col-md-6">
                                            <input id='n' type="number" name="n" style="height: 30px" min="0">
                                            <input type="submit" name="btn_action" value="Submit" class="btn btn-info">
                                        </div>
                                        <div class="col-sm-5 col-md-6">
                                            <input id="getExport" class="noPrint btn btn-success btn-md " style="float: right;" type="button" value="Export">
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function() {
                                        $('#getExport').click(function() {
                                            $("#table2excel").table2excel({
                                                // exclude CSS class
                                                exclude: ".noExl",
                                                name: "Worksheet Name",
                                                filename: "Report", //do not include extension
                                                fileext: ".xls" // file extension
                                            });
                                        })
                                    })
                                </script>
                                <style>
                                    #myBtn {
                                        position: fixed;
                                        bottom: 20px;
                                        right: 30px;
                                        z-index: 99;
                                    }
                                </style>
                                <button onclick="topFunction()" id="myBtn" class="btn btn-info" title="Go to top">กลับไปบนสุด</button>
                                <script>
                                    //Get the button
                                    var mybutton = document.getElementById("myBtn");

                                    // When the user scrolls down 20px from the top of the document, show the button
                                    window.onscroll = function() {
                                        scrollFunction()
                                    };

                                    function scrollFunction() {
                                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                            mybutton.style.display = "block";
                                        } else {
                                            mybutton.style.display = "none";
                                        }
                                    }

                                    // When the user clicks on the button, scroll to the top of the document
                                    function topFunction() {
                                        document.body.scrollTop = 0;
                                        document.documentElement.scrollTop = 0;
                                    }
                                </script>
                                <br>
                                <?php
                                if (isset($_GET["n"])) {
                                    $n = $_GET['n'];
                                }
                                ?>
                                <?php $cc = 0;
                                $taw = 1;
                                $query =  "SELECT * FROM scan2557 WHERE level LIKE '%ตรี%' and ( education LIKE '%ครุ%' or education LIKE '%นิติ%' or education LIKE '%บัญชี%' or education LIKE '%เศรษฐ%' or education LIKE '%ศิลปศาส%' or education LIKE '%พยาบาล%')and (`chdate1`!='' or `chdate12`!='' or `chdate2`!='' or `chdate22`!='' or `chdate3`!='' or `chdate32`!='' or `chdate4`!='' or `chdate42`!='') and type123!='1'ORDER BY `scan2557`.`count` ASC;";
                                //$query = "SELECT * FROM scan2557 WHERE level LIKE '%ตรี%' and ( education LIKE '%ศิลปกรรม%' or education LIKE '%รัฐป%' or education LIKE '%วิท%' or education LIKE '%นิเทศ%' or education LIKE '%รัฐศ%' or education LIKE '%บริหาร%') and (`chdate32`!='' or 'chdate1'!='' or 'chdate2'!='' or `chdate3`!='' or 'chdate12'!='' or 'chdate22'!='' ) and type123!='1'ORDER BY `scan2557`.`count` ASC;";
                                //echo $query . "<br><br>";
                                $result = $conn->query($query) or die($conn->error);
                                $tall = ceil($result->num_rows / $n);
                                //echo "แถว " . $taw . "/" . $tall . " (เช้า) อาจารย์คุมแถว....................................................................................................................";  
                                ?>
                                <?php
                                if (!empty($n)) :
                                ?>
                                    <table id="table2excel" class="table table-bordered">
                                        <thead>
                                            <tr class="success">
                                                <th>
                                                    <center>
                                                        <font size="2">แถวที่
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">ลำดับในแถว
                                                    </center>
                                                </th>
                                                </center>
                                                <th>
                                                    <center>
                                                        <font size="2">รหัสนักศึกษา
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">คำนำหน้า
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">ชื่อ
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">สกุล
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">วุฒิปริญญา
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">เกียรตินำยม
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">ลำดับในวุฒิ
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">ลำดับในรอบ
                                                    </center>
                                                </th>
                                                <th>
                                                    <center>
                                                        <font size="2">ลำดับ A/B
                                                    </center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <br>
                                            <?php
                                            $cout = 1;
                                            //ก่อนจะ import ให้เรียงคณะก่อน
                                            while ($row1 = $result->fetch_assoc()) {
                                            ?>
                                                <?php
                                                if ($cout - 1 == $n) :
                                                    $taw++;
                                                    $cout = 1;
                                                ?>
                                                    <tr>
                                                        <td><?= $char ?></td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                <?php
                                                //break;
                                                endif;
                                                ?>
                                                <tr>
                                                    <td><?php echo $taw; ?></td>
                                                    <td><?php echo $cout; ?></td>
                                                    <td><?php echo $row1["std_id"] ?></td>
                                                    <td><?php echo $row1['pre'] ?></td>
                                                    <td><?php echo $row1['name'] ?></td>
                                                    <td><?php echo $row1['lastname'] ?></td>
                                                    <td><?php
                                                        if ($row1['education'] === 'ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') {
                                                            echo "ค.บ.";
                                                        } else if ($row1['education'] === 'วิทยาศาสตรบัณฑิต') {
                                                            echo "วท.บ.";
                                                        } else if ($row1['education'] === 'นิติศาสตรบัณฑิต') {
                                                            echo "น.บ.";
                                                        } else if ($row1['education'] === 'รัฐประศาสนศาสตรบัณฑิต') {
                                                            echo "รป.บ.";
                                                        } else if ($row1['education'] === 'ศิลปกรรมศาสตรบัณฑิต') {
                                                            echo "ศป.บ.";
                                                        } else if ($row1['education'] === 'ศิลปศาสตรบัณฑิต') {
                                                            echo "ศศ.บ.";
                                                        } else if ($row1['education'] === 'บัญชีบัณฑิต') {
                                                            echo "บช.บ.";
                                                        } else if ($row1['education'] === 'พยาบาลศาสตรบัณฑิต') {
                                                            echo "พย.บ.";
                                                        } else if ($row1['education'] === 'บริหารธุรกิจบัณฑิต') {
                                                            echo "บธ.บ.";
                                                        } else if ($row1['education'] === 'นิเทศศาสตรบัณฑิต') {
                                                            echo "นศ.บ.";
                                                        } else if ($row1['education'] === 'รัฐศาสตรบัณฑิต') {
                                                            echo "ร.บ.";
                                                        } else if ($row1['education'] === 'ครุศาสตรบัณฑิต') {
                                                            echo "ค.บ.";
                                                        } else if ($row1['education'] === 'เศรษฐศาสตรบัณฑิต') {
                                                            echo "ศ.บ.";
                                                        }
                                                        ?></td>
                                                    <td><?php if ($row1['degree'] === '1') {
                                                            echo "1";
                                                        } else if ($row1['degree'] === '2') {
                                                            echo "2";
                                                        } else {
                                                        } ?></td>
                                                    <td>
                                                        <?php if ($row1['education'] === 'ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)') {
                                                            $kb = $kb + 1;
                                                            echo "ค.บ." . $kb;
                                                        } else if ($row1['education'] === 'วิทยาศาสตรบัณฑิต') {
                                                            $wt = $wt + 1;
                                                            echo "วท.บ." . $wt;
                                                        } else if ($row1['education'] === 'นิติศาสตรบัณฑิต') {
                                                            $ns = $ns + 1;
                                                            echo "น.บ." . $ns;
                                                        } else if ($row1['education'] === 'รัฐประศาสนศาสตรบัณฑิต') {
                                                            $ss = $ss + 1;
                                                            echo "รป.บ." . $ss;
                                                        } else if ($row1['education'] === 'ศิลปกรรมศาสตรบัณฑิต') {
                                                            $sw = $sq + 1;
                                                            echo "ศป.บ." . $sw;
                                                        } else if ($row1['education'] === 'ศิลปศาสตรบัณฑิต') {
                                                            $sa = $sa + 1;
                                                            echo "ศศ.บ." . $sa;
                                                        } else if ($row1['education'] === 'บัญชีบัณฑิต') {
                                                            $bc = $bc + 1;
                                                            echo "บช.บ." . $bc;
                                                        } else if ($row1['education'] === 'พยาบาลศาสตรบัณฑิต') {
                                                            $pp = $pp + 1;
                                                            echo "พย.บ." . $pp;
                                                        } else if ($row1['education'] === 'บริหารธุรกิจบัณฑิต') {
                                                            $bp = $bp + 1;
                                                            echo "บธ.บ." . $bp;
                                                        } else if ($row1['education'] === 'นิเทศศาสตรบัณฑิต') {
                                                            $st = $st + 1;
                                                            echo "นศ.บ." . $st;
                                                        } else if ($row1['education'] === 'รัฐศาสตรบัณฑิต') {
                                                            $sd = $sd + 1;
                                                            echo "ร.บ." . $sd;
                                                        } else if ($row1['education'] === 'ครุศาสตรบัณฑิต') {
                                                            $kk = $kk + 1;
                                                            echo "ค.บ." . $kk;
                                                        } else if ($row1['education'] === 'เศรษฐศาสตรบัณฑิต') {
                                                            $so = $so + 1;
                                                            echo "ศ.บ." . $so;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        N/A
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $nub = ($n / 2);
                                                        $co = $cout;
                                                        if ($co <= $nub) {
                                                            echo $co . "A";
                                                        } else {
                                                            echo $co . "B";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                $cout++;
                                            } //end while
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                else :
                                ?>
                                    <h1>กรุณาป้อนจำนวนแถว</h1>
                                <?php
                                endif;
                                ?>
                                <!------end table1------->
                                </font>
                            </div>
                        </div>
                        <?php

                        include('../sphp/cconn.php');
                        ?>
                        <!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->


                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
                        <!-- Include all compiled plugins (below), or include individual files as needed -->
                        <script src="../dist/js/bootstrap.min.js"></script>
                        <script src="../dist/js/jquery.table2excel.js"></script>
                        <script src="../dist/js/jquery-3.5.1.min.js"></script>

    </body>

    </html>
<?php

}
?>