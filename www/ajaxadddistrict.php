<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$state = $_POST['state'];
		$district = $_POST['district'];
		$sql =  "INSERT INTO tbl_district (tbl_district_name,tbl_district_state_id) VALUES('$district','$state')";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>