<?php 
// error_reporting(0);
// $sql = new mysqli("5dapps.com", "dapps_cip", "cippertamina", "dapps_amplified_cip_2017");
$sql = new mysqli("localhost", "root", "", "dapps_joker_swillhouse");
error_reporting(0);
if (!$sql) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit;
}
?>
