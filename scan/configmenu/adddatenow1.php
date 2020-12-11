<?php
	  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปยอดบัณฑิตเข้ารับพระราชทานปริญญาบัตร <?php echo ($Year=DATE("Y",strtotime("now"))+543); ?></title>

    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    
  </head>
 
       <?php 


	if (!empty($_POST['date1'])){  
	
	//$date=sprint('date'.$i);
	$e = explode("-", $_POST['date1']);
	// echo $e;
	$Year=$e[0];
	settype ($Year,"integer");
	$Year=$Year+543;
	$mont=$e[1];
	$day=$e[2];
		if ($mont>=12){
			$mont="ธันวาคม";
			}else if ($mont>=11){
				$mont="พฤศจิกายน";
			}else if ($mont>=10){
				$mont="ตุลาคม";
			}else if ($mont>=9){
				$mont="กันยายน";
			}else if ($mont>=8){
				$mont="สิงหาคม";
			}else if ($mont>=7){
				$mont="กรกฎาคม";
			}else if ($mont>=6){
				$mont="มิถุนายน";
			}else if ($mont>=5){
				$mont="พฤษภาคม";
			}else if ($mont>=4){
				$mont="เมษายน";
			}else if ($mont>=3){
				$mont="มีนาคม";
			}else if ($mont>=2){
				$mont="กุมภาพันธ์";
			}else if ($mont>=1){
				$mont="มกราคม";
			}
	   
require ("../sphp/conn.php");
	
	@$query=sprintf("UPDATE datescan SET  datescan.date='%s', datescan.mont='%s', datescan.year='%s'
                        WHERE    datescan.idday='1';",$day,$mont,$Year);
	@$result=mysql_query($query,$con);  
	@$query=sprintf("UPDATE datescan SET  datescan.date='%s', datescan.mont='%s', datescan.year='%s'
                        WHERE    datescan.idday='1.2';",$day,$mont,$Year);
	@$result=mysql_query($query,$con);    	

	
	   if(!$result){
	   echo "เกิดข้อผิดพลาด";
	   }else {echo "สำเร็จ";}
	  
	   
	   }


/*---------------------------------------*///


	   if (!empty($_POST['date2'])){  
	
	//$date=sprint('date'.$i);
	$e = explode("-", $_POST['date2']);
	
	$Year=$e[0];
	settype ($Year,"integer");
	$Year=$Year+543;
	$mont=$e[1];
	$day=$e[2];
		if ($mont>=12){
			$mont="ธันวาคม";
			}else if ($mont>=11){
				$mont="พฤศจิกายน";
			}else if ($mont>=10){
				$mont="ตุลาคม";
			}else if ($mont>=9){
				$mont="กันยายน";
			}else if ($mont>=8){
				$mont="สิงหาคม";
			}else if ($mont>=7){
				$mont="กรกฎาคม";
			}else if ($mont>=6){
				$mont="มิถุนายน";
			}else if ($mont>=5){
				$mont="พฤษภาคม";
			}else if ($mont>=4){
				$mont="เมษายน";
			}else if ($mont>=3){
				$mont="มีนาคม";
			}else if ($mont>=2){
				$mont="กุมภาพันธ์";
			}else if ($mont>=1){
				$mont="มกราคม";
			}
	   
require ("../sphp/conn.php");
	
	@$query=sprintf("UPDATE datescan SET  datescan.date='%s', datescan.mont='%s', datescan.year='%s'
                        WHERE    datescan.idday='2';",$day,$mont,$Year);
	@$result=mysql_query($query,$con);    
	@$query=sprintf("UPDATE datescan SET  datescan.date='%s', datescan.mont='%s', datescan.year='%s'
                        WHERE    datescan.idday='2.2';",$day,$mont,$Year);
	@$result=mysql_query($query,$con); 
	
	   if(!$result){
	   echo "เกิดข้อผิดพลาด";
	   }else {echo "สำเร็จ";}


	  
	   
	   }


	   /****************************************/

	   if (!empty($_POST['date3'])){  
	
	//$date=sprint('date'.$i);
	$e = explode("-", $_POST['date3']);
	
	$Year=$e[0];
	settype ($Year,"integer");
	$Year=$Year+543;
	$mont=$e[1];
	$day=$e[2];
		if ($mont>=12){
			$mont="ธันวาคม";
			}else if ($mont>=11){
				$mont="พฤศจิกายน";
			}else if ($mont>=10){
				$mont="ตุลาคม";
			}else if ($mont>=9){
				$mont="กันยายน";
			}else if ($mont>=8){
				$mont="สิงหาคม";
			}else if ($mont>=7){
				$mont="กรกฎาคม";
			}else if ($mont>=6){
				$mont="มิถุนายน";
			}else if ($mont>=5){
				$mont="พฤษภาคม";
			}else if ($mont>=4){
				$mont="เมษายน";
			}else if ($mont>=3){
				$mont="มีนาคม";
			}else if ($mont>=2){
				$mont="กุมภาพันธ์";
			}else if ($mont>=1){
				$mont="มกราคม";
			}
	   
require ("../sphp/conn.php");
	
	@$query=sprintf("UPDATE datescan SET  datescan.date='%s', datescan.mont='%s', datescan.year='%s'
                        WHERE    datescan.idday='3';",$day,$mont,$Year);
	@$result=mysql_query($query,$con);    
	@$query=sprintf("UPDATE datescan SET  datescan.date='%s', datescan.mont='%s', datescan.year='%s'
                        WHERE    datescan.idday='3.2';",$day,$mont,$Year);
	@$result=mysql_query($query,$con);   	

	
	   if(!$result){
	   echo "เกิดข้อผิดพลาด";
	   }else {echo "สำเร็จ";}
	  
	   
	   }


/************************************************/

	   if (!empty($_POST['date4'])){  
	
	//$date=sprint('date'.$i);
	$e = explode("-", $_POST['date4']);
	
	$Year=$e[0];
	settype ($Year,"integer");
	$Year=$Year+543;
	$mont=$e[1];
	$day=$e[2];
		if ($mont>=12){
			$mont="ธันวาคม";
			}else if ($mont>=11){
				$mont="พฤศจิกายน";
			}else if ($mont>=10){
				$mont="ตุลาคม";
			}else if ($mont>=9){
				$mont="กันยายน";
			}else if ($mont>=8){
				$mont="สิงหาคม";
			}else if ($mont>=7){
				$mont="กรกฎาคม";
			}else if ($mont>=6){
				$mont="มิถุนายน";
			}else if ($mont>=5){
				$mont="พฤษภาคม";
			}else if ($mont>=4){
				$mont="เมษายน";
			}else if ($mont>=3){
				$mont="มีนาคม";
			}else if ($mont>=2){
				$mont="กุมภาพันธ์";
			}else if ($mont>=1){
				$mont="มกราคม";
			}
	   
require ("../sphp/conn.php");
	
	@$query=sprintf("UPDATE datescan SET  datescan.date='%s', datescan.mont='%s', datescan.year='%s'
                        WHERE    datescan.idday='4';",$day,$mont,$Year);
	@$result=mysql_query($query,$con);    	

	
	   if(!$result){
	   echo "เกิดข้อผิดพลาด";
	   }else {echo "สำเร็จ";}
	   
	  
	   }
	
 header("Location: adminconfig.php");


	   
?>