<?php
include('../sphp/conn.php');
$to=$_GET["to"];
$fr=$_GET["fr"];
if($fr>$to){
	$upd=sprintf("UPDATE scan2557 SET count='0' WHERE count='%s'",$fr);
	if($conn->query($upd)===TRUE){
		$btw=$fr-$to;
		for($i=$fr-1;$i>=$to;$i--){
			$swp=sprintf("UPDATE scan2557 SEt count='%s' WHERE count='%s'",$i+1,$i);
			if($conn->query($swp)===TRUE){
				$bac=sprintf("UPDATE scan2557 SET count='%s' WHERE count='0' ",$to);
				if($conn->query($bac)===TRUE){
					header("location:swip.php?cmd=succ");
				}
			}
		}
	}else{
		header("location:swip.php?cmd=failed");
	}
}elseif($fr<$to){
	echo $fr;
	echo $to;
	$upd=sprintf("UPDATE scan2557 SET count='0' WHERE count='%s' ",$fr);
	if($conn->query($upd)===TRUE){
		for($i=$fr+1;$i<=$to;$i++){
			$swp=sprintf("UPDATE scan2557 SET count='%s' WHERE count='%s'",$i-1,$i);
			if($conn->query($swp)===TRUE){
				$bac=sprintf("UPDATE scan2557 SET count='%s' WHERE count='0'",$to);
				if($conn->query($bac)===TRUE){
					header("location:swip.php?cmd=succ");
				}
			}
		}
	}else{
		header("location:swip.php?cmd=failed");
	}
}

	$conn->close();
?>