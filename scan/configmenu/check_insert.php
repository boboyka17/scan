<?php
include('../sphp/conn.php');
if (isset($_POST)) {
    $sql = sprintf(
        "INSERT INTO teacher VALUES('%s','%s','%s')",
        $_POST["tcid"],
        $_POST["tcname"],
        $_POST["tcphone"]
    );
    if (!$conn->query($sql)) die($conn->error);
    header("location:editteacher.php");
}
