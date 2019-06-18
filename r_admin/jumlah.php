<?php 
	include('../config/connection.php');
	$sql = mysql_query("SELECT * FROM tb_spbu WHERE id_spbu = '4' OR id_spbu = '5' OR id_spbu = '6'");
	while($dataspbu = mysql_fetch_array($sql)){
		echo "SPBU ".$dataspbu[0]."<br>";		
		$data_hadiah1 = mysql_num_rows(mysql_query("SELECT (hadiahnya) FROM tb_transaksi WHERE id_spbu = '$dataspbu[0]' AND hadiahnya = 'Voucher BBK 25K'"));
		echo "Voucher ".$data_hadiah1."<br>";
		$data_hadiah2 = mysql_num_rows(mysql_query("SELECT (hadiahnya) FROM tb_transaksi WHERE id_spbu = '$dataspbu[0]' AND hadiahnya = 'Pouch Pertamina'"));
		echo "Pouch ".$data_hadiah2."<br>";
		$data_hadiah3 = mysql_num_rows(mysql_query("SELECT (hadiahnya) FROM tb_transaksi WHERE id_spbu = '$dataspbu[0]' AND hadiahnya = 'Dompet STNK'"));
		echo "Dompet STNK ".$data_hadiah3."<br>";
		$data_hadiah4 = mysql_num_rows(mysql_query("SELECT (hadiahnya) FROM tb_transaksi WHERE id_spbu = '$dataspbu[0]' AND hadiahnya = 'Trashbin Pertalite'"));
		echo "Trashbin Pertalite ".$data_hadiah4."<br>";
		$data_hadiah4 = mysql_num_rows(mysql_query("SELECT (hadiahnya) FROM tb_transaksi WHERE id_spbu = '$dataspbu[0]' AND hadiahnya = 'Sticker Pertalite'"));
		echo "Sticker Pertalite ".$data_hadiah4."<br>";
		echo "<hr>";
	}
 ?>
 <!-- INSERT INTO `tb_hadiah` (`id_hadiah`, `nama_hadiah`, `jumlah_hadiah`, `prosentase_menang`, `status_hadiah`, `kategori_hadiah`, `hadiah_spesial`, `id_spbu`) VALUES (NULL, 'Sticker Pertalite', '50', '50', 'AKTIF', '3', '0', '4'); -->