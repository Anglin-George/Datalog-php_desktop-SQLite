<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_niyojakamandalam_id = $_POST['tbl_niyojakamandalam_id'];
		$result = $db->query("SELECT * FROM tbl_mandalam WHERE tbl_mandalam_nmandalam_id = '$tbl_niyojakamandalam_id'");
		while($ret[] = $result->fetchArray(SQLITE3_ASSOC));
		echo json_encode($ret);
	}
?>