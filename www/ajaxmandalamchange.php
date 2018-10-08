<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_mandalam_id = $_POST['tbl_mandalam_id'];
		$result = $db->query("SELECT * FROM tbl_unit WHERE tbl_unit_mandalam_id = '$tbl_mandalam_id'");
		while($ret[] = $result->fetchArray(SQLITE3_ASSOC));
		echo json_encode($ret);
	}
?>

