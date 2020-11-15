<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../src/jquery-3.1.0.min.js"></script>
	<script src="../src/jquery.table2excel.js"></script>
  </head>
	<body>
<?php
	include('../sphp/conn.php');
?>
	<table class="table2excel" data-tableName="header1">
	<tr><td>แถว </td><td><?php echo $taw;?></td><td>อาจารย์คุมแถว.....................................................................................................................</td></tr>
			<thead>
			<tr>
				<td>ลำดับที่</td>
				<td>รหัสบัณฑิต</td>
				<td>ชื่อ-สกุล</td>
				<td>วุฒิปริญญา</td>
				<td>ระดับ</td>
				<td>หมายเหตุ</td>
			</tr>
		</thead>
	</table>
<?php 
	$cc=0;
	$taw=1;
	$cout=1;
	$query="SELECT * FROM scan2557 WHERE (`chdate31`!='') and `status`='1' ORDER BY `scan2557`.`count` ASC;";
	$result=mysql_query($query,$con);
	while($row1=mysql_fetch_assoc($result) ){
		$cc++;	
?>	
	<table class="table2excel" data-tableName="detail">
		<tbody>
			<tr>
				<td><?php echo $cout; ?></td>
				<td><?php  echo $row1['counteducation']; $counteducation=$row1['counteducation']+1;  ?></td>
				<td><?php echo $row1['pre'].$row1['name'].' '.$row1['lastname']; ?></td>
				<td><?php if ($row1['education']==='ครุศาสตรบัณฑิต (หลักสูตร 5 ปี)')
					{echo "ค.บ.";}else if ($row1['education']==='วิทยาศาสตรบัณฑิต')
					{echo "วท.บ.";}else if ($row1['education']==='นิติศาสตรบัณฑิต')
					{echo "น.บ.";}else if ($row1['education']==='รัฐประศาสนศาสตรบัณฑิต')
					{echo "รป.บ.";}else if ($row1['education']==='ศิลปกรรมศาสตรบัณฑิต')
					{echo "ศป.บ.";}else if ($row1['education']==='ศิลปศาสตรบัณฑิต')
					{echo "ศศ.บ.";}else if ($row1['education']==='บัญชีบัณฑิต')
					{echo "บช.บ.";}else if ($row1['education']==='พยาบาลศาสตรบัณฑิต')
					{echo "พย.บ.";}else if ($row1['education']==='บริหารธุรกิจบัณฑิต')
					{echo "บธ.บ."; } ?></td>
				<td><?php if($row1['degree']==='1'){echo "1";}else if($row1['degree']==='2'){echo "2";}else{echo "";}?></td>
				<td><?php if($row1['statustext']='NORMAL'){echo "";}else echo $row1['statustext']?></td>
			</tr>		
		</tbody>
		<?php 
			$cout++;
			if($cout>80){ 
				$cout=1; $taw++;
		?>
				<table class="table2excel" data-tableName="header1">
				<tr><td>แถว </td><td><?php echo $taw;?></td><td>อาจารย์คุมแถว.....................................................................................................................</td></tr>
				<thead>
				<tr>
					<td>ลำดับที่</td>
					<td>รหัสบัณฑิต</td>
					<td>ชื่อ-สกุล</td>
					<td>วุฒิปริญญา</td>
					<td>ระดับ</td>
					<td>หมายเหตุ</td>
				</tr>
				</thead>				
				</table>
		<?php
			}
		?>	
	</table>
		<script>
			$(function() {
				$(".table2excel").table2excel({
					exclude: ".noExl",
					name: "Report",
					filename: "report",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
		</script>	
  </body>
</html>