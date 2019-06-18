<?php

mysql_connect("localhost","dapps","l1m4d1g1t") or die("Cant Connect to Server");
mysql_select_db("dapps_joker_classmild_roadshow") or die("Cant Found Database");



$id_transaksi = $_POST['id_transaksi'];

$check_user = mysql_fetch_array(mysql_query("SELECT * from tb_users where id = '$id_transaksi' "));
if ($check_user['hadiah'] == 'Y' || $check_user['nama_hadiah'] != '') {
		$varible_rand = $check_user['nama_hadiah'];
		echo json_encode($arrayName = array('hadiah' => $varible_rand));
}else{
		echo json_encode($arrayName = array('hadiah' => ''));
}

?>
