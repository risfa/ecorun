<?php 
	require '../dbconnect.php';

	if(isset($_POST['simpan'])){
		$id_customer = $_POST['id_customer'];
		$nama_customer = $_POST['nama_customer'];
		$no_hp = $_POST['no_hp'];

		$simpan = mysql_query("INSERT INTO tb_customer(id_customer,nama_customer,no_hp) VALUES(NULL,'$nama_customer','$no_hp')");

		if($simpan){
			echo "<script>alert('yes')</script>";
			echo "<script>document.location.href='../index.php?menu=customer'</script>";
		}else{
			echo "<script>alert('no')</script>";
			echo "<script>document.location.href='../index.php?menu=customer'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){
		$id_customer = $_POST['id_customer'];
		$nama_customer = $_POST['nama_customer'];
		$no_hp = $_POST['no_hp'];

		$sqlupdate = mysql_query("UPDATE tb_customer SET id_customer='$id_customer', nama_customer = '$nama_customer', no_hp = '$no_hp' WHERE id_customer = '$id_customer'");
		if($sqlupdate){
			echo "<script>alert('yes')</script>";
			echo "<script>document.location.href='../index.php?menu=customer'</script>";
		}else{
			echo "<script>alert('yes')</script>";
			echo "<script>document.location.href='../index.php?menu=customer'</script>";
}
	}
 ?>