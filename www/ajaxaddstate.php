<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$state = $_POST['state'];
		$sql =  "INSERT INTO tbl_state (tbl_state_name) VALUES('$state')";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>