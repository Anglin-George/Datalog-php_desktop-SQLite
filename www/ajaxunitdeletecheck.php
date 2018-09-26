<?php
session_start();
require 'avvcdb.php';
$db = new MyDB();   
if(!$db) {
	echo $db->lastErrorMsg();
}
else{
	$tbl_unit_id = $_POST['tbl_unit_id'];
	$rows = $db->query("SELECT COUNT(*) as count FROM tbl_member WHERE tbl_member_unit = '$tbl_unit_id'");
	$row = $rows->fetchArray();
	$numRows = $row['count'];
	echo json_encode($numRows);
}
?>