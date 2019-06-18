<?php

mysql_connect("localhost","dapps","l1m4d1g1t") or die("Cant Connect to Server");
mysql_select_db("dapps_joker_pertamina_ecorun") or die("Cant Found Database");

$sql = mysql_query("SELECT * from hadiah");


$array = [];
$i = 0;
while ($data = mysql_fetch_assoc($sql)) {

	// array_push($array,$data[1]);

	$array[$i]['label'] = $data['nama_hadiah'];
	$array[$i]['value'] = 1;
	$array[$i]['question'] = $data['nama_hadiah'];
	$i++;
}



	echo json_encode($array);

?>
