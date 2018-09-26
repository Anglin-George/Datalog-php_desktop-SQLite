<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$districtid = $_POST['tbl_district_id'];
		$result = $db->query("SELECT * FROM tbl_district WHERE tbl_district_id = '$districtid'");
		$ret = $result->fetchArray(SQLITE3_ASSOC);
		echo json_encode($ret);
	}
?>