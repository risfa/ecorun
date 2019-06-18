<?php
// memanggil file config.php
// include "dbconnect.php";
require 'dbconnect.php';
?>
<html>                                                                                                                                                                                                                                                                                              
<head>
	<title>Lihat hadiah luckyfriday</title>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
</head>
<?php 
//EDIT
if(isset($_GET['edit'])){
	$sqledit = mysql_query("SELECT * FROM tb_hadiah WHERE id_hadiah='$_GET[edit]'");
	$Data = mysql_fetch_array($sqledit);
}

//DELETE
if(isset($_GET['delete'])){
	$sqldelete = mysql_query("DELETE FROM tb_hadiah WHERE id_hadiah='$_GET[delete]'");
	if($sqldelete){
		echo "<script>alert('Berhasil')</script>";
		echo "<script>document.location.href='index.php?menu=hadiah'</script>";
	}else{
		echo "<script>alert('tidak berhasil')</script>";
		echo "<script>document.location.href='index.php?menu=hadiah'</script>";
	}
}

?>
<body>
	<div class="container">
		<div class="row">

			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">

				<center><h2>FORM Input Hadiah</h2></center>

				<div>  
					<form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_hadiah.php">
						<input type="hidden" name="id_hadiah" value="<?php echo $Data[0]?>">

						<div id="temp_image"></div>
						<!--  <input class="form-control" type="text" name="idHadiah" placeholder="id_hadiah"  required=""> -->
						<br>
						<label>Nama Hadiah</label>
						<input class="form-control" type="text" name="nama_hadiah" placeholder="nama hadiah"  required="" value="<?php echo $Data['nama_hadiah']?>">
						<br>
						<label>Jumlah Hadiah</label>
						<input class="form-control" type="text" name="jumlah_hadiah" placeholder="Jumlah Hadiah" required="" value="<?php echo $Data['jumlah_hadiah']?>">
						<br>
						<label>Prosentase Menang</label>
						<input  class="form-control" type="text" name="prosentase_menang" placeholder="ProsentasiMenang" required="" value="<?php echo $Data['prosentase_menang']?>">
						<br>
						<label>Kategori Hadiah</label>
						<select name="kategori_hadiah" class="form-control" value="<?php echo $Data['kategori_hadiah']?>" >
							<option> <?php echo $Data['kategori_hadiah']?> </option>
							<option value="1">Mobil</option>
							<option value="2">Motor</option>
							<option value="3">Umum</option>
						</select>
						<br>
						<label>Status Hadiah</label>
						<select name="status_hadiah" class="form-control" value="<?php echo $Data['status_hadiah']?>">
							<option><?php echo $Data['status_hadiah'] ?></option>
							<option value="AKTIF">AKTIF</option>
							<option value="DISAKTIF">DISAKTIF</option>
						</select>
						<br>
						<label>Hadiah Spesial</label>
						<input class="form-control" type="text"  name="hadiah_spesial" required="" placeholder="HadiahSpesial" value="<?php echo $Data['hadiah_spesial']?>">
						<br>
						<label>Nama SPG</label>
						<select name="id_spbu" class="form-control" value="<?php echo $Data['status_hadiah']?>">
							<option><?php echo $Data['id_spbu'] ?></option>
							<?php 
								$sql = mysql_query("SELECT * FROM tb_spbu");
								while($data = mysql_fetch_array($sql)){
							 ?>
							<option value="<?php echo $data[0] ?>"><?php echo $data[3] ?></option>
							<?php } ?>
							<!-- <option value="2">Deactive</option> -->
						</select>
						<!-- <input class="form-control" type="text"  name="kota" required="" placeholder="Kota" value="<?php echo $Data['kota']?>"> -->
						<br>
						<label>Hadiah Awal</label>
						<input class="form-control" type="text"  name="total_awal" required="" placeholder="HadiahAwal" value="<?php echo $Data['total_awal']?>">
						<br>
						<?php if($_GET['edit']){ ?>
						<input type="submit" name="update" class="btn btn-success" value="Update">
						<a href="index.php?menu=hadiah" class="btn btn-success">Batal</a>
						<?php 
					}
					else{ ?>
					<input class="btn btn-success" type="submit" name="simpan" value="submit" method="post">
					<?php } ?>

				</form>
			</div> 
			<br>
			<br>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9" style="margin-top: 40px; overflow: auto;">    
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Id Hadiah</th>
						<th>Nama Hadiah</th>
						<th>Jumlah Hadiah</th>
						<th>Hadiah AWAL</th>
						<th>Prosentase Menang</th>
						<th>Status Hadiah</th>
						<th>Kategori Hadiah</th>
						<th>Hadiah Spesial</th>
						<th>Id SPG</th>
						<!-- <th>No Spbu</th>
						<th>Alamat Spbu</th> -->
						<!-- <th>kota</th> -->
						<th>Delete/edit</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysql_query("SELECT * FROM  tb_hadiah JOIN tb_spbu ON tb_hadiah.id_spbu = tb_spbu.id_spbu");
					while($query = mysql_fetch_array($sql)){

						?>
						<tr>
							<td><?php echo $query['id_hadiah'];?></td>
							<td><?php echo $query['nama_hadiah'];?></td>
							<td><?php echo $query['jumlah_hadiah'];?></td>
							<td><?php echo $query['total_awal'];?></td>
							<td><?php echo $query['prosentase_menang'];?></td>
							<td><?php echo $query['status_hadiah'];?></td>
							<td><?php echo $query['kategori_hadiah'];?></td>
							<td><?php echo $query['hadiah_spesial'];?></td>
							<td><?php echo $query['username'];?></td>
							<!-- <td><?php echo $query['nomor_spbu']; ?></td>
							<td><?php echo $query['alamat_spbu']; ?></td>
							<td><?php echo $query['kota']; ?></td> -->
							<td>
								<a href="index.php?menu=hadiah&edit=<?php echo $query['id_hadiah']?>">EDIT</a>/
								<a href="index.php?menu=hadiah&delete=<?php echo $query['id_hadiah']?>">DELETE</a></td>

							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="row">

		</div>
	</div>


	<script>
		$(document).ready(function() {
			$('#example').DataTable({
				 responsive: true
			});
		} );

	</script>


</div>
</div>
</div>

</body>
<style >
	.dataTables_length
	{
		float: right !important;
		margin-left: 35px;
	}
</style>
</html>