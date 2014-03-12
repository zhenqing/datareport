<?php include 'db_connect.php';?>
	
<html>	
	<head>
		 <?php 
		 $query = "select isbn,tulprice,time from pricebackup
		where isbn in (select distinct isbn from `textbook_good`) order by time";
			$data = mysql_query($query) or die (mysql_error());
			$rows = array();
			
			while($row = mysql_fetch_assoc($data)){ 
				//$rows[]=$row;
				//array("v"=>$row['isbn']),
				$rows[]=array("c"=>array(array("v"=>$row['tulprice']),array("v"=>$row['time'])));
			}
			
			//$cols=array(array("id"=>"",label"=>"isbn","type"=>"string"),array("id"=>"","label"=>"tulprice","type"=>"number"),array("id"=>"","label"=>"time","type"=>"time"));
			//array("label"=>"isbn","type"=>"string"),
			$cols=array(array("label"=>"tulprice","type"=>"number"),array("label"=>"time","type"=>"time"));
			
			$data = array("cols"=>$cols,"rows"=>$rows);
			
			echo json_encode($data).array_replace('\"c\"', "c").array_replace('\"v\"', "v");

		?>
	</head>
</html>
<?php
include 'db_close.php';
?>