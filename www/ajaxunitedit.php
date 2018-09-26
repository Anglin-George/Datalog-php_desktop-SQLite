<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_unit_id = $_POST['tbl_unit_id'];
		$result = $db->query("SELECT * FROM tbl_unit WHERE tbl_unit_id = '$tbl_unit_id'");
		$ret = $result->fetchArray(SQLITE3_ASSOC);
		echo json_encode($ret);
	}
?>