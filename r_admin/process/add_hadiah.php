<?php 
	require '../dbconnect.php';

	if(isset($_POST['simpan'])){

		$id_hadiah = $_POST['id_hadiah'];
		$nama_hadiah = $_POST['nama_hadiah'];
		$jumlah_hadiah = $_POST['jumlah_hadiah'];
		$prosentase_menang = $_POST['prosentase_menang'];
		$status_hadiah = $_POST['status_hadiah'];
		$kategori_hadiah = $_POST['kategori_hadiah'];
		$hadiah_spesial = $_POST['hadiah_spesial'];
		$total_awal = $_POST['total_awal'];
		// $kota = $_POST['kota'];
		$id_spbu = $_POST['id_spbu'];

		$simpan = mysql_query("INSERT INTO tb_hadiah(id_hadiah,nama_hadiah,jumlah_hadiah,prosentase_menang,status_hadiah,kategori_hadiah,hadiah_spesial,id_spbu,total_awal) VALUES ('$id_hadiah','$nama_hadiah','$jumlah_hadiah','$prosentase_menang','$status_hadiah','$kategori_hadiah','$hadiah_spesial','$id_spbu','$total_awal')");
		if($simpan){
			echo "<script>alert('yes')</script>";
			echo "<script>document.location.href='../index.php?menu=hadiah'</script>";
		}else{
			echo "<script>alert('no')</script>";
			echo "<script>document.location.href='../index.php?menu=hadiah'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){

		$id_hadiah = $_POST['id_hadiah'];
		$nama_hadiah = $_POST['nama_hadiah'];
		$jumlah_hadiah = $_POST['jumlah_hadiah'];
		$prosentase_menang = $_POST['prosentase_menang'];
		$status_hadiah = $_POST['status_hadiah'];
		$kategori_hadiah = $_POST['kategori_hadiah'];
		$hadiah_spesial = $_POST['hadiah_spesial'];
		$total_awal = $_POST['total_awal'];
		// $kota = $_POST['kota'];
		$id_spbu = $_POST['id_spbu'];

		$sqlupdate = mysql_query("UPDATE tb_hadiah SET nama_hadiah='$nama_hadiah', jumlah_hadiah='$jumlah_hadiah', prosentase_menang='$prosentase_menang', kategori_hadiah='$kategori_hadiah', status_hadiah='$status_hadiah', hadiah_spesial = '$hadiah_spesial',id_spbu='$id_spbu', total_awal='$total_awal' WHERE id_hadiah = '$_POST[id_hadiah]'");
		if($sqlupdate){
			echo "<script>alert('yes')</script>";
			echo "<script>document.location.href='../index.php?menu=hadiah'</script>";
		}else{
			echo "<script>alert('no')</script>";
			echo "<script>document.location.href='../index.php?menu=hadiah'</script>";
}
	}

 ?>