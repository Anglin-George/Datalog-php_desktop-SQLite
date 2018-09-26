<?php
	require 'avvcdb.php';
	$db = new MyDB();   
	if(!$db) {
		echo $db->lastErrorMsg();
	}
	else{
		$tbl_member_id = $_POST['tbl_member_id'];
		$result = $db->query("SELECT * FROM tbl_member INNER JOIN tbl_state ON (tbl_member.tbl_member_state = tbl_state.tbl_state_id) INNER JOIN tbl_district ON (tbl_member.tbl_member_district = tbl_district.tbl_district_id) INNER JOIN tbl_block ON (tbl_member.tbl_member_block = tbl_block.tbl_block_id) INNER JOIN tbl_unit ON (tbl_member.tbl_member_unit = tbl_unit.tbl_unit_id) WHERE tbl_member.tbl_member_id = '$tbl_member_id'");
		$ret = $result->fetchArray(SQLITE3_ASSOC);
		echo json_encode($ret);
	}
?>