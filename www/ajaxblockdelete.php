<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_block_id = $_POST['tbl_block_id'];
		$sql =  "DELETE FROM tbl_block WHERE tbl_block_id = '$tbl_block_id'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>