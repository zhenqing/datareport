<?php include 'db_connect.php';?>
<html>
	<body>
		<form method="POST" name="choose isbn:">
			<select name="isbn">
			<option value="0">please select an isbn code</option>
<?php
	$query = "select isbn from textbook_good";
	$data = mysql_query($query) or die (mysql_error());

	while($row = mysql_fetch_assoc($data)){ 
		//echo $row['isbn'];
		?>

		<option value="<?php echo $row['isbn']; ?>">
		 <?php echo $row['isbn'];?>
		</option>
<?php
	}
?>
			</select>
		</form>
<?php include 'db_close.php';?>
	</body>
</html>