<?
session_start();
			
			//echo "pass".$_POST["pass"];
			//echo "<br>pass2".$_SESSION['pass'];
			if($_FILES["filUpload"]["name"]!='' and $_POST['pass']==$_SESSION['pass']){
				include('../sphp/conn.php');
             $tmp_name = $_FILES["filUpload"]["tmp_name"];			
			 $dr="..\\im\\im.txt";
			 $name = $_FILES["filUpload"]["name"];
			  move_uploaded_file($tmp_name,$dr);
			  
			  $qr="LOAD DATA LOCAL INFILE '..\\\\im\\\\im.txt' INTO TABLE `scan2557` FIELDS TERMINATED BY ',' ENCLOSED BY '".'"'."' ESCAPED BY '".'"'."' LINES TERMINATED BY '".'\n'."'";
			 
				
				if(mysql_query($qr,$con)){
				  
				mysql_query("delete from scan2557",$con);
				mysql_query($qr,$con); 
			 	mysql_query("update scan2557 set chdate1 = '';",$con);
				mysql_query("update scan2557 set chdate12 = '';",$con);
				mysql_query("update scan2557 set chdate2 = '';",$con);
				mysql_query("update scan2557 set chdate22 = '';",$con);
				mysql_query("update scan2557 set chdate3 = '';",$con);
				mysql_query("update scan2557 set chdate32 = '';",$con);
				mysql_query("update scan2557 set chdate4 = '';",$con);
				mysql_query("update scan2557 set chdate42 = '';",$con);
				mysql_query("update scan2557 set status = '1';",$con);
				mysql_query("update scan2557 set savejob = '0';",$con);
				mysql_query("update scan2557 set statustext =NULL;",$con);
				mysql_query("update scan2557 set type123 ='1';",$con);
				include('../sphp/cconn.php');
				header("location: im.php?st=2");
				
				}else{
					  include('../sphp/cconn.php');
					  header("location: im.php?st=1");
					  }
			  
			}else{
				 header("location: im.php?st=1");
				}
			
			
			?>