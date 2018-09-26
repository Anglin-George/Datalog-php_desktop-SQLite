<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_district_id = $_POST['tbl_district_id'];
		$result = $db->query("SELECT * FROM tbl_block WHERE tbl_block_district_id = '$tbl_district_id'");
		while($ret[] = $result->fetchArray(SQLITE3_ASSOC));
		echo json_encode($ret);
	}
?>