<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$blockname = $_POST['blockname'];
		$blockid = $_POST['blockid'];
		$sql =  "UPDATE tbl_block SET tbl_block_name = '$blockname' WHERE tbl_block_id = '$blockid'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>