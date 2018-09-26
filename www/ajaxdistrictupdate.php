<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$districtname = $_POST['districtname'];
		$districtid = $_POST['districtid'];
		$sql =  "UPDATE tbl_district SET tbl_district_name = '$districtname' WHERE tbl_district_id = '$districtid'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>