<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$state = $_POST['tbl_state_id'];
		$sql =  "DELETE FROM tbl_state WHERE tbl_state_id = '$state'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>