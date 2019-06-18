
<div class="row">
	<div class="col-sm-4 col-md-4">
		<center><h2 style="color: white;">Manage Hadiah</h2></center>

		<form enctype="multipart/form-data" class="form-group"  method="post">
			<div>

				<!-- <div id="temp_image"></div> -->
				<input class="form-control" type="text" name="id_hadiah" placeholder="idHadiah"  required="">
				<br>
				<input class="form-control" type="text" name="jumlah_hadiah" placeholder="Jumlah Hadiah" required="">
				<br>
				<input  class="form-control" type="text" name="prosentase_menang" placeholder="ProsentasiMenang" required="">
				<br>
				<select name="kategoriHadiah" class="form-control">
					<option value="0">Kategori</option>
					<option value="1">Mobil</option>
					<option value="2">Motor</option>
					<option value="3">Umum</option>
				</select>
				<br>
				<center>
				<select name="status_hadiah" class="form-control">
					<option>Status Hadiah</option>
					<option value="1">Active</option>
					<option value="2">Deactive</option>
				</select>
				</center>
				<br>
				<input class="form-control" type="text"  name="hadiah_spesial" required="" placeholder="HadiahSpesial">
				<center>
					<input class="btn btn-success" type="submit" name="simpan" value="Save" method="post">
				</center>
			</div>
		</form>
	</div>
	<div class="col-sm-8 col-md-8">
		<div container style="border: 1px solid;">
			<table border="2" class="table">	
				<tr style="color: white; font-size: 14px;">

					<th>ID HADIAH</th>
					<th>JUMLAH HADIAH</th>
					<th>Prosentase</th>
					<th>Status Hadiah</th>
					<th>Kategori Hadiah</th>
					<th>Hadiah Spesial</th>

				</tr>
				<tr>
					<td>test</td>
				</tr>
			</table>
		</div>
	</div>