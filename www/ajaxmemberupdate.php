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
		$nominee = $_POST['nominee'];
		$state = $_POST['state'];
		$district = $_POST['district'];
		//$block = $_POST['block'];
		$niyojakamandalam = $_POST['niyojakamandalam'];
		$mandalam = $_POST['mandalam'];
		$unit = $_POST['unit'];	
		$tbl_member_certificate = $_POST['tbl_member_certificate'];
		$tbl_member_admission = $_POST['tbl_member_admission'];
		date_default_timezone_set('Asia/Kolkata');
		$Updated_On = date('Y-m-d H:i');	
		$sql =  "UPDATE tbl_member SET tbl_member_no = '$membershipno', tbl_member_name = '$membername', tbl_member_nominee = '$nominee',tbl_member_address = '$address', tbl_member_mobile = '$mobile', tbl_member_doj = '$doj', tbl_member_state = '$state', tbl_member_district = '$district', tbl_member_niyojakamandalam = '$niyojakamandalam',tbl_member_mandalam='$mandalam', tbl_member_unit = '$unit', tbl_member_certificate = '$tbl_member_certificate', tbl_member_admission = '$tbl_member_admission'  ,Updated_On = '$Updated_On' WHERE tbl_member_id = '$memberid'";
      	$ret = $db->exec($sql);
		echo json_encode($ret);
	}
?>