<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_block_id = $_POST['tbl_block_id'];
		$result = $db->query("SELECT * FROM tbl_unit WHERE tbl_unit_block_id = '$tbl_block_id'");
		while($ret[] = $result->fetchArray(SQLITE3_ASSOC));
		echo json_encode($ret);
	}
?>