<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$result = $db->query("SELECT * FROM tbl_unit INNER JOIN tbl_mandalam ON (tbl_unit.tbl_unit_mandalam_id = tbl_mandalam.tbl_mandalam_id)");
		while($ret[] = $result->fetchArray(SQLITE3_ASSOC));
		echo json_encode($ret);
	}
?>