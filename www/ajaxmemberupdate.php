<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$memberid = $_POST['memberid'];
		$membershipno = $_POST['membershipno'];
		$membername = $_POST['membername'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$doj = $_POST['doj'];
		$state = $_POST['state'];
		$district = $_POST['district'];
		$block = $_POST['block'];
		$unit = $_POST['unit'];	
		date_default_timezone_set('Asia/Kolkata');
		$Updated_On = date('Y-m-d H:i');	
		$sql =  "UPDATE tbl_member SET tbl_member_no = '$membershipno', tbl_member_name = '$membername', tbl_member_address = '$address', tbl_member_mobile = '$mobile', tbl_member_doj = '$doj', tbl_member_state = '$state', tbl_member_district = '$district', tbl_member_block = '$block', tbl_member_unit = '$unit' ,Updated_On = '$Updated_On' WHERE tbl_member_id = '$memberid'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>