<?php
	include('conn.php');
		mysql_query("update scan2557 set statustext =NULL;");
			
		include('cconn.php');
		echo "สำเร็จ";


?>