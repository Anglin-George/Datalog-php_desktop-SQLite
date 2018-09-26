<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_unit_id = $_POST['tbl_unit_id'];
		$sql =  "DELETE FROM tbl_unit WHERE tbl_unit_id = '$tbl_unit_id'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>