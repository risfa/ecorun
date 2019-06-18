<?php

mysql_connect("localhost","dapps","l1m4d1g1t") or die("Cant Connect to Server");
mysql_select_db("dapps_joker_pertamina_ecorun") or die("Cant Found Database");



$id_transaksi = $_POST['id_transaksi'];


$check_user = mysql_fetch_array(mysql_query("SELECT * from tb_users where id = '$id_transaksi' "));
if ($check_user['hadiah'] == 'Y' || $check_user['nama_hadiah'] != '') {
		$varible_rand = $check_user['nama_hadiah'];
		echo json_encode($arrayName = array('hadiah' => $varible_rand));
}else{


	// $check_user = mysql_fetch_array(mysql_query("SELECT * from tb_users where id = '$id_transaksi' "));
	// if ($check_user['hadiah'] == 'Y' || $check_user['nama_hadiah'] != '') {
	// 		echo json_encode($arrayName = array('hadiah' => $varible_rand));
	// }else{
		// raffle

		$sql = 'SELECT hadiah_id FROM `hadiah` where jumlah >= 1 AND active != 0 ORDER BY RAND() LIMIT 1';
		$run_sql = mysql_query($sql);
		$query = mysql_fetch_array($run_sql);
		$num_rows = mysql_num_rows($run_sql);
		if ($num_rows <= 0) {
			$update_hadiah_user = mysql_query("UPDATE tb_users SET hadiah = 'Y', nama_hadiah = 'Anda Belum Beruntung'  WHERE id = '$id_transaksi' ");
			echo json_encode($arrayName = array('hadiah' => 'Anda Belum Beruntung'));
			// echo "string";
		}else{


				$kode_hadiah = $query['hadiah_id'];

				$data_hadiah = mysql_fetch_array(mysql_query("SELECT * FROM hadiah WHERE hadiah_id = '$kode_hadiah'"));
				if ($data_hadiah) {
					$varible_rand = $data_hadiah['nama_hadiah'];
					$jumlah_hadiah_baru = $data_hadiah['jumlah'] -= 1;

								$update_hadiah_user = mysql_query("UPDATE tb_users SET hadiah = 'Y', nama_hadiah = '$varible_rand'  WHERE id = '$id_transaksi' ");
								$update_jumlah_hadiah = mysql_query("UPDATE hadiah SET jumlah = '$jumlah_hadiah_baru' WHERE hadiah_id = '$kode_hadiah' ");
								if ($update_jumlah_hadiah) {
									echo json_encode($arrayName = array('hadiah' => $varible_rand, 'kode_hadiah' => $kode_hadiah,'jumlah_hadiah' => $jumlah_hadiah_baru));



								}



				}


		}


	// }


}



?>
