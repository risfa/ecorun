<?php 
	require '../dbconnect.php';

	if(isset($_POST['simpan'])){

			
			$username =$_POST['username']; 
			$password =$_POST['password'];
			$kategori + $_POST['kategori'];
			
			
	$simpan =mysql_query("INSERT INTO tb_admin(id_admin,username,password,kategori) VALUES(NULL,'$username','$password','$kategori')");
		$Data = mysql_fetch_array($simpan);

	if($simpan){
		echo "<script>alert('yes')</script>";
		echo "<script>document.location.href='../index.php?menu=manage_admin'</script>";
	}else{
		echo "<script>alert('no')</script>";
		echo "<script>document.location.href='../index.php?menu=manage_admin'</script>";
	}
}

//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){
		$id_admin =$_POST['id_admin']; 
		$username =$_POST['username']; 
		$password =$_POST['password']; 
		$kategori =$_POST['kategori']; 
		

		$update = mysql_query("UPDATE tb_admin SET username ='$username', password='$password', kategori='$kategori' WHERE id_admin='$_POST[id_admin]'");
		if($update){
			echo "<script>alert('yes')</script>";
			echo "<script>document.location.href='../index.php?menu=manage_admin'</script>";
		}else{
			echo "<script>alert('no')</script>";
			echo "<script>document.location.href='../index.php?menu=manage_admin'</script>";
}
	}
 ?>