<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$result = $db->query("SELECT * FROM tbl_mandalam INNER JOIN tbl_niyojakamandalam ON (tbl_mandalam.tbl_mandalam_nmandalam_id = tbl_niyojakamandalam.tbl_niyojakamandalam_id)");
		while($ret[] = $result->fetchArray(SQLITE3_ASSOC));
		echo json_encode($ret);
	}
?>