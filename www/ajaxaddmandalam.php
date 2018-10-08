<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$mandalam = $_POST['mandalam'];
		$niyojakamandalam = $_POST['niyojakamandalam'];
		$sql =  "INSERT INTO tbl_mandalam (tbl_mandalam_name,tbl_mandalam_nmandalam_id) VALUES('$mandalam','$niyojakamandalam')";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>