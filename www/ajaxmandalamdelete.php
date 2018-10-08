<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_mandalam_id = $_POST['tbl_mandalam_id'];
		$sql =  "DELETE FROM tbl_mandalam WHERE tbl_mandalam_id = '$tbl_mandalam_id'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>