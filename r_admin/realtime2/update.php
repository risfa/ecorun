<?php
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_classmild_talkshow");
if(isset($_POST["aktif"]))
{
 // $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tb_hadiah SET status_hadiah = 'AKTIF' WHERE id_hadiah = '".$_POST["id_hadiah"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}else if (isset($_POST["disaktif"])) {
	$query = "UPDATE tb_hadiah SET status_hadiah = 'DISAKTIF' WHERE id_hadiah = '".$_POST["id_hadiah"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>
