<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_niyojakamandalam_id = $_POST['tbl_niyojakamandalam_id'];
		$sql =  "DELETE FROM tbl_niyojakamandalam WHERE tbl_niyojakamandalam_id = '$tbl_niyojakamandalam_id'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>