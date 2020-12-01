<?php
if (isset($_POST)) {
    include('connect.php');
    $id = $_POST["id"];
    $l = $_POST["level"];
    $sql = sprintf("UPDATE `scan2557` SET type123='%s' WHERE std_id = '%s'", $l, $id);
    if (!$conn->query($sql)) die($conn->error);
}
