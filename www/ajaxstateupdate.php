<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$statename = $_POST['statename'];
		$stateid = $_POST['stateid'];
		$sql =  "UPDATE tbl_state SET tbl_state_name = '$statename' WHERE tbl_state_id = '$stateid'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>