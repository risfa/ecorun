<?php
	require '../dbconnect.php';

	if(isset($_POST['simpan'])){


			$nomor_spbu =$_POST['nomor_spbu'];
			$alamat_spbu =$_POST['alamat_spbu'];
			$kota = $_POST['kota'];
			$username = str_replace(".", "", $_POST['nomor_spbu']);
			$password = md5($username);
	$simpan =mysql_query("INSERT INTO tb_login(id,username,password,nama) VALUES(NULL,'$nomor_spbu','$kota')");
		$Data = mysql_fetch_array($simpan);

	if($simpan){
		echo "<script>alert('yes')</script>";
		echo "<script>document.location.href='../index.php?menu=spbu'</script>";
	}else{
		echo "<script>alert('no')</script>";
		echo "<script>document.location.href='../index.php?menu=spbu'</script>";
	}
}

//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){
		$id_spbu =$_POST['id_spbu'];
		$nomor_spbu =$_POST['nomor_spbu'];
		$alamat_spbu =$_POST['alamat_spbu'];
		$kota = $_POST['kota'];


		$update = mysql_query("UPDATE tb_login SET username ='$nomor_spbu', nama='$alamat_spbu' WHERE id='$_POST[id_spbu]'");
		if($update){
			echo "<script>alert('yes')</script>";
			echo "<script>document.location.href='../index.php?menu=spg'</script>";
		}else{
			echo "<script>alert('no')</script>";
			echo "<script>document.location.href='../index.php?menu=spg'</script>";
}
	}
 ?>
