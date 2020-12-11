<?php
include('../sphp/conn.php');
if (isset($_GET["id"])) {
    $sql = sprintf(
        "UPDATE `teacher2` SET tcid='%s',tcname='%s',tcphone='%s' WHERE tcid = '%s'",
        $_POST["tcid"],
        $_POST["tcname"],
        $_POST["tcphone"],
        $_GET["id"]
    );
    if (!$conn->query($sql)) die($conn->error);
    header("location:editteacher2.php");
}
