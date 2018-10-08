<?php
session_start();
require 'avvcdb.php';
$db = new MyDB();   
if(!$db) {
	echo $db->lastErrorMsg();
}
else{
	$tbl_niyojakamandalam_id = $_POST['tbl_niyojakamandalam_id'];
	$rows = $db->query("SELECT COUNT(*) as count FROM tbl_member WHERE tbl_member_niyojakamandalam = '$tbl_niyojakamandalam_id'");
	$row = $rows->fetchArray();
	$numRows = $row['count'];
	echo json_encode($numRows);
}
?>