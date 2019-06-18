<?php
include('db_con.php');


$stmt=$db_con->prepare("SELECT tb_transaksi.tanggal_transaksi,tb_transaksi.penanggung_jawab,tb_customer.nama_customer,tb_customer.email,tb_transaksi.hadiahnya FROM tb_transaksi JOIN tb_spbu ON tb_transaksi.id_spbu = tb_spbu.id_spbu JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id_customer WHERE hadiahnya != ''");




$stmt->execute();


$columnHeader ='';
$columnHeader = "Tanggal"."\t"."Penangung Jawab"."\t"."Nama Customer"."\t"."Email"."\t"."Hadiahnya";


$setData='';

while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Record Transaksi Class Mild .xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".$setData."\n";

echo "<script>document.location.href='index.php?menu=transaksi'</script>";

?>
