<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$block = $_POST['block'];
		$unit = $_POST['unit'];
		$sql =  "INSERT INTO tbl_unit (tbl_unit_name,tbl_unit_block_id) VALUES('$unit','$block')";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>