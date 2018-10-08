<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$mandalamname = $_POST['mandalamname'];
		$mandalamid = $_POST['mandalamid'];
		$sql =  "UPDATE tbl_mandalam SET tbl_mandalam_name = '$mandalamname' WHERE tbl_mandalam_id = $mandalamid ";
      	$ret = $db->exec($sql);
      	//echo"<script>alert($ret)</script>";
		echo json_encode($ret);
	}
?>