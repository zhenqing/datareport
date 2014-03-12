<?php include 'db_connect.php';?>
		
<?php
	$query = "select isbn,tulprice,avg_tulprice from textbook_good";
	$data = mysql_query($query) or die (mysql_error());
	$cols = array();
	while($col = mysql_fetch_field($data)){ 
		//echo $row['isbn'];
		$cols[]=$col;

	}
	echo "{";
	echo json_encode($cols);
	while($row = mysql_fetch_assoc($data)){ 
		//echo $row['isbn'];
		 $model['isbn'][]       = $row['isbn'];
            $model['tulprice'][] = $row['tulprice'];
            $model['avg_tulprice'][]     = $row['avg_tulprice'];

	}
	echo ",";
	echo json_encode(array('rows'=>$model));
	echo "}";
 include 'db_close.php';

 ?>

{
  "cols": [
        {"id":"","label":"Topping","pattern":"","type":"string"},
        {"id":"","label":"Slices","pattern":"","type":"number"}
      ],
  "rows": [
        {"c":[{"v":"Mushrooms","f":null},{"v":3,"f":null}]},
        {"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Olives","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
      ]
}