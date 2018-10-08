<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$niyojakamandalamname = $_POST['niyojakamandalamname'];
		$niyojakamandalamid = $_POST['niyojakamandalamid'];
		$sql =  "UPDATE tbl_niyojakamandalam SET tbl_niyojakamandalam_name = '$niyojakamandalamname' WHERE tbl_niyojakamandalam_id = '$niyojakamandalamid'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>