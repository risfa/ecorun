<?php
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_classmild_roadshow");
if(isset($_POST["aktif"]))
{
 // $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE hadiah SET active = 1 WHERE hadiah_id = '".$_POST["id_hadiah"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}else if (isset($_POST["disaktif"])) {
	$query = "UPDATE hadiah SET active = 0 WHERE hadiah_id = '".$_POST["id_hadiah"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>
