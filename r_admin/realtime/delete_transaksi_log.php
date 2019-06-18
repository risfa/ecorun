<?php
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_classmild_talkshow");
if(isset($_POST["id_spbu"]))
{
 // $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "DELETE FROM tb_transaksi_log where id_spbu = $_POST[id_spbu] ";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
  echo $_POST['id_spbu'];

 }
}
?>
