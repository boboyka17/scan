<?php


	$con=mysql_connect("localhost","root") or die ("Error Connect todatabase");
	$objDB=mysql_select_db ("scan2557",$con);
	$objCSV = fopen ("test.CSV","r");

	
	while(($objArr =fgetcsv($objCSV,3555,","))!==false){
		$STRSQL="INSERT INTO scan2558";
		$STRSQL .="('count','counteducation','std_id','pre','name','lastname','sex','card_id','birthday','age','grad','major','education','std_type','faculty','groups','level','datein','dateout','year','term','degree','oldschool','	oldeducation','repayment','degree_id','chdate31','chdate1','chdate2','chdate3','status','savejob','type123','statustext')";
		$STRSQL .="VALUES";
		$STRSQL.="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."','".$objArr[9]."','".$objArr[10]."','".$objArr[11]."','".$objArr[12]."','".$objArr[13]."','".$objArr[14]."','".$objArr[15]."','".$objArr[16]."','".$objArr[17]."','".$objArr[18]."','".$objArr[19]."','".$objArr[20]."','".$objArr[21]."','".$objArr[22]."','".$objArr[23]."','".$objArr[24]."','".$objArr[25]."','".$objArr[26]."','".$objArr[27]."','".$objArr[28]."','".$objArr[29]."','".$objArr[30]."','".$objArr[31]."','".$objArr[32]."','".$objArr[33]."')";
	mysql_query("SET NAMES UTF8");

	$objQuery =mysql_query($STRSQL,$con) or die(mysql_error());
	//echo $STRSQL;
	}//echo "2";
	fclose ($objCSV);


	//echo "import".$objQuery;
?>