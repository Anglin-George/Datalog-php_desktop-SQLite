<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$result = $db->query("SELECT * FROM tbl_niyojakamandalam INNER JOIN tbl_district ON (tbl_niyojakamandalam.tbl_niyojakamandalam_district_id = tbl_district.tbl_district_id)");
		while($ret[] = $result->fetchArray(SQLITE3_ASSOC));
		echo json_encode($ret);
	}
?>