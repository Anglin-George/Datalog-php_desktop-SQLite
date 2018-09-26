<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$block = $_POST['block'];
		$district = $_POST['district'];
		$sql =  "INSERT INTO tbl_block (tbl_block_name,tbl_block_district_id) VALUES('$block','$district')";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>