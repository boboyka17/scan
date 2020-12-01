<?php
include('../sphp/connect.php');
if (isset($_GET["clear"])) {
    $sql = "UPDATE  `scan2557` SET chdate1='',status='',savejob='',type123='',statustext=''";
    if (!$conn->query($sql)) die($conn->error);
    header("location:mainconfig.php");
}
