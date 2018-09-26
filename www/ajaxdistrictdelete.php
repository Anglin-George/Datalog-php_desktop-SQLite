<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_district_id = $_POST['tbl_district_id'];
		$sql =  "DELETE FROM tbl_district WHERE tbl_district_id = '$tbl_district_id'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>