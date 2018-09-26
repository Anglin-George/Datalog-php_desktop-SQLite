<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_member_no = $_POST['tbl_member_no'];
		$tbl_member_name = $_POST['tbl_member_name'];
		$tbl_member_mobile = $_POST['tbl_member_mobile'];
		$tbl_member_address = $_POST['tbl_member_address'];
		$tbl_member_doj = $_POST['tbl_member_doj'];
		$tbl_member_state = $_POST['tbl_member_state'];
		$tbl_member_district = $_POST['tbl_member_district'];
		$tbl_member_block = $_POST['tbl_member_block'];
		$tbl_member_unit = $_POST['tbl_member_unit'];
		date_default_timezone_set('Asia/Kolkata');
		$Updated_On = date('Y-m-d H:i');
		$sql =  "INSERT INTO tbl_member (tbl_member_no,tbl_member_name,tbl_member_mobile,tbl_member_address,tbl_member_doj,tbl_member_state,tbl_member_district,tbl_member_block,tbl_member_unit,Updated_On) VALUES('$tbl_member_no','$tbl_member_name','$tbl_member_mobile','$tbl_member_address','$tbl_member_doj','$tbl_member_state','$tbl_member_district','$tbl_member_block','$tbl_member_unit','$Updated_On')";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>