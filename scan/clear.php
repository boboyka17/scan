<?php
@mysql_connect("localhost", "root", "") or die("Connection Failed");
mysql_select_db("scan2557")or die("Connection Failed");
$query = "truncate table scan2557";
if(mysql_query($query)){
echo "Clear ข้อมูลในตาราง scan2557 แล้ว";}
else{
echo "fail";}
?>