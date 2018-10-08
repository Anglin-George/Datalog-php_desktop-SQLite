<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$niyojakamandalam = $_POST['niyojakamandalam'];
		$district = $_POST['district'];
		$sql =  "INSERT INTO tbl_niyojakamandalam (tbl_niyojakamandalam_name,tbl_niyojakamandalam_district_id) VALUES('$niyojakamandalam','$district')";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>