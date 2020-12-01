<?php
if (isset($_POST)) {
    include('../sphp/connect.php');
    $std_id_new = $_POST["std_id_new"];
    $pre = $_POST["pre"];
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $edittext = $_POST["edittext"];
    $std_id = $_POST["std_id"];
    $sql = sprintf(
        "UPDATE `scan2557` SET std_id='%s',pre='%s',name='%s',lastname='%s',statustext='%s' WHERE std_id='%s'",
        $std_id_new,
        $pre,
        $name,
        $lastname,
        $edittext,
        $std_id
    );
    if (!$conn->query($sql)) die($conn->error);
    // print_r($_POST);
    //Array ( [std_id_new] => 5515071001207 [pre] => นาง [name] => จตุรงค์ [lastname] => ใจมั่น [std_id] => 5515071001207 )
}
