<?php
include('../sphp/conn.php');
if (isset($_GET["id"])) {
    $sql = sprintf("DELETE FROM teacher WHERE tcid='%s'", $_GET["id"]);
    if (!$conn->query($sql)) die($conn->error);
    header("location:editteacher.php");
}
