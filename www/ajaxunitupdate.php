<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$unitname = $_POST['unitname'];
		$unitid = $_POST['unitid'];
		$sql =  "UPDATE tbl_unit SET tbl_unit_name = '$unitname' WHERE tbl_unit_id = '$unitid'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>