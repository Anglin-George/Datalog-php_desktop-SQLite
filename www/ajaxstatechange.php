<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_state_id = $_POST['tbl_state_id'];
		$result = $db->query("SELECT * FROM tbl_district WHERE tbl_district_state_id = '$tbl_state_id'");
		while($ret[] = $result->fetchArray(SQLITE3_ASSOC));
		echo json_encode($ret);
	}
?>