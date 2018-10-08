<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$mandalam = $_POST['mandalam'];
		$unit = $_POST['unit'];
		$sql =  "INSERT INTO tbl_unit (tbl_unit_name,tbl_unit_mandalam_id) VALUES('$unit','$mandalam')";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>