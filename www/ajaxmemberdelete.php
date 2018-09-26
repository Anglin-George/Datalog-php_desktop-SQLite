<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_member_id = $_POST['tbl_member_id'];
		$sql =  "DELETE FROM tbl_member WHERE tbl_member_id = '$tbl_member_id'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>