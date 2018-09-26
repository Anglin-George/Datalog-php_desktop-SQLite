<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$stateid = $_POST['tbl_state_id'];
		$result = $db->query("SELECT * FROM tbl_state WHERE tbl_state_id = '$stateid'");
		$ret = $result->fetchArray(SQLITE3_ASSOC);
		echo json_encode($ret);
	}
?>