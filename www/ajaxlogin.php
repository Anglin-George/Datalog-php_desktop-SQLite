<?php
session_start();
require 'avvcdb.php';
$db = new MyDB();   
if(!$db) {
	echo $db->lastErrorMsg();
}
else{
	$username = $_POST['username'];
	$userpassword = $_POST['userpassword'];
	$rows = $db->query("SELECT COUNT(*) as count FROM tbl_admin WHERE tbl_admin_name = '$username' AND tbl_admin_password = '$userpassword'");
	$row = $rows->fetchArray();
	$numRows = $row['count'];
	if($numRows==1)
	{
		$_SESSION['tbl_admin_name'] = $username;
	}
	echo json_encode($numRows);
}
?>