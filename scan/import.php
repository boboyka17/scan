<?php
require ("..//conn.php");

	$strFileName = "11111.txt";

	$objFopen = fopen($strFileName, 'r');

	if ($objFopen) {

	while (!feof($objFopen)) {

	$file = fgets($objFopen, 4096);

	$strSQL = "INSERT INTO scan2557 ";

	$strSQL .="(count) ";

	$strSQL .="VALUES ";

	$strSQL .="('".$file."') ";

	$objQuery = mysql_query($strSQL,$con);}

	fclose($objFopen);

}

 

echo "Import Done.";
?>