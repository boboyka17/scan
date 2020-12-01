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
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร </title>

    <!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="row">
        <center><img src="../head.png"></center>
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
            <li>
              <a href="addnow.php">เพิ่มรายชื่อฉุกเฉิน</a>
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
                  <a href="../menu_2-0.php">
                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;รายงานสรุปตามปริญญา</a>
                </li>
                <li>
                  <a href="../menu_3-0.php">
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



        <div class="col-md-9">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">
                <center>&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;เพิ่มรายชื่อฉุกเฉิน</center>
              </h3>
            </div>

            <div class="panel-body">
              <center>

                <div class="row">

                  <div class="col-xs-4">
                    <img src="admin.png" width="120" height="120">
                  </div>
                  <form method="POST">
                    <div class="col-xs-4">
                      <h4><span class="label label-success">กรุณาป้อนข้อมูลเบื้องต้นให้ครบถ้วน</span></h4>
                      <br />
                      <?php
                      $query = $conn->query("select * from scan2557 where std_id='" . $_GET['std_id'] . "';");
                      $row = $query->fetch_array();
                      ?>
                      <table border="0" width="90%">
                        <tr style="background-color:#BCF5A9;">
                          <th>
                            <h4>&nbsp <input type="text" name="std_id" value="<?php echo $row['std_id']; ?>"></h4>
                          </th>
                        </tr>
                        <tr style="background-color:#E1F5A9">
                          <th>
                            <h4>&nbsp<input type="text" name="pre" value="<?php echo $row['pre']; ?>"></h4>
                          </th>
                        </tr>
                        <tr style="background-color:#E1F5A9">
                          <th>
                            <h4>&nbsp<input type="text" name="name" value="<?php echo $row['name']; ?>"></h4>
                          </th>
                        </tr>
                        <tr style="background-color:#E1F5A9">
                          <th>
                            <h4>&nbsp<input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"></h4>
                          </th>
                        </tr>
                      </table>
                      <br />
                      <button id="update" type="submit" class="btn btn-warning">
                        <span class="glyphicon glyphicon-ok"> เรียบร้อย</span>
                      </button>
                    </div>

                    <div class="col-xs-4">
                      <br /><br /><br />
                      <p style="background-color:#BCF5A9;color:red;">หมายเหตุการเปลี่ยนแปลงข้อมูล</p>

                      <textarea id="textarea" rows="4" cols="25" name="edittext"><?php echo $row['statustext']; ?>
                </textarea>
                    </div>
                  </form>
                </div>

              </center>

              <?php
              // if (isset($_POST['std_id'])) {
              //   $std_id = $_POST['std_id'];
              //   $pre = $_POST['pre'];
              //   $name = $_POST['name'];
              //   $lastname = $_POST['lastname'];
              //   $edittext = $_POST['edittext'];
              //   if (!empty($std_id)) {
              //     if (!empty($std_id) and !empty($pre) and !empty($name) and !empty($lastname) and !empty($edittext)) {
              //       //include('../sphp/conn.php');
              //       $sql = sprintf("UPDATE `scan2557` SET std_id='%s',pre='%s',name='%s',lastname='%s',statustext='%s' WHERE std_id = '%s'", $std_id, $pre, $name, $lastname, $edittext, $_GET["std_id"]);
              //       if (!$conn->query($sql)) die($conn->error);

              //       // $c1 = sprintf("update scan2557 set std_id='" . $std_id . "' where std_id='" . $_GET['std_id'] . "' ;");
              //       // $c2 = sprintf("update scan2557 set pre='" . $pre . "' where std_id='" . $_GET['std_id'] . "' ;");
              //       // $c3 = sprintf("update scan2557 set name='" . $name . "' where std_id='" . $_GET['std_id'] . "' ;");
              //       // $c4 = sprintf("update scan2557 set lastname='" . $lastname . "' where std_id='" . $_GET['std_id'] . "' ;");
              //       // $c5 = sprintf("update scan2557 set statustext='" . $edittext . "' where std_id='" . $_GET['std_id'] . "' ;");
              //       // include('../sphp/cconn.php');
              //       // echo "<center><h4 style='color:green;'>System Update...</h4></center>";
              //       // if ($conn->query($c1) === TRUE and $conn->query($c2) === TRUE and $conn->query($c3) === TRUE and $conn->query($c4) === TRUE and $conn->query($c5) === TRUE) {
              //       //   header('location:search.php');
              //       // }
              //     } else {
              //       // echo "<center><h4 style='color:red;'>กรุณาป้อนข้อมูลให้ครบถ้วน!</h4></center>";
              //     }
              //   } else {
              //   }
              // }
              ?>

            </div>
          </div>

          <!-- +++++++++++++++++++++ END OF MAIN ++++++++++++++++++++++++-->


          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
          <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../dist/js/bootstrap.min.js"></script>
          <script src="../dist/js/jquery-3.5.1.min.js"></script>
  </body>

  </html>
  <script>
    $(document).ready(function() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const std_id = urlParams.get('std_id');
      $('#update').click(function(e) {
        e.preventDefault();
        var std_id_new = $('input[name="std_id"]').val();
        var pre = $('input[name="pre"]').val();
        var name = $('input[name="name"]').val();
        var lastname = $('input[name="lastname"]').val();
        var edittext = $('#textarea').val();
        $.ajax({
          url: 'update_bio.php',
          type: 'post',
          data: {
            std_id_new: std_id_new,
            pre: pre,
            name: name,
            lastname: lastname,
            edittext: edittext,
            std_id: std_id
          },
          success: function(result) {
            alert('บันทึกข้อมูลสำเร็จ')
          }
        })
      })
    })
  </script>
<?php
}
?>