<?php

mysql_connect("localhost","dapps","l1m4d1g1t") or die("Cant Connect to Server");
mysql_select_db("dapps_joker_pertamina_ecorun") or die("Cant Found Database");

$idtrx = $_GET['idtrx'];
$hadiahnya = $_GET['hadiahnya'];

$sql = mysql_query("UPDATE tb_users set nama_hadiah = '".$hadiahnya."' where id = '".$idtrx."' ");
if ($sql) {
	echo "succes";
}else{
	echo "gagal";
}


?>
