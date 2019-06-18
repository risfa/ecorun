	<?php
	// memanggil file config.php
	include "dbconnect.php";
	// require 'dbconnect.php';
	?>
	<html>
	<head>
		<title>Lihat transaksi luckyfriday</title>
		<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<!-- <h4>DATA TRANSAKSI</h4> -->
	    <br><br>
	    <a href="http://joker.5dapps.com/classmild/talk_show/r_admin/export-excel2.php"> Export to excel </a>
	    <div class="row" style="margin:none;">
	    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 10px;">
	        <!-- <a href="export-excel.php">Export To Excel</a> -->
		<table id="example" class="display" cellspacing="0" width="101%">
	        <thead>
	            <tr>
	                <th>No</th>
	                <th>Nama</th>
	                <th>Gender</th>

	                <th>Email | Phone</th>
	                <!-- <th>Kendaraan</th> -->
	                <!-- <th>No Ktp </th> -->
	                <th>Unique Code</th>
	                <th>category</th>


	                <th>Checked </th>
	                <th>Hadiah</th>
	                <th>Nama Hadiah </th>
	                <th>Attendence</th>
	                <!-- <th>Foto</th> -->
	            </tr>
	        </thead>
	        <tbody>
	        <?php
	        $No =1;
	        $sql = "SELECT * FROM  tb_users ORDER BY NamaLengkap ";
	        $query = mysql_query($sql);

	        while ($row = mysql_fetch_array($query)){


	        ?>

	        	<tr>
	                <td><?php echo $No?></td>
	                <td><?php echo $row['NamaLengkap'];?></td>
	                <td><?php echo $row['gender'];?></td>
	                <td><?php echo $row['email']."<br>".$row['phone'];?></td>
									<td><?php echo $row['unique_code'];?></td>
								  <td><?php echo $row['category'];?></td>
	                <td><?php echo $row['checked'];?></td>
	                <td><?php echo $row['hadiah'];?></td>
	                <td><?php echo $row['nama_hadiah'];?></td>
	                <td><?php echo $row['attendance'];?></td>
	        		<!-- <td><a target="blank" href="../assets/strukBBM/<?php echo $row['id_transaksi'];?>.jpg"><img style="height: 50px; width:50px;" src="../assets/strukBBM/<?php echo $row['id_transaksi'];?>.jpg"></a></td> -->

	        	</tr>
	        <?php $No++;} ?>
	        </tbody>
	    </table>
	    </div>
	    </div>
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>

		<script>

	    $(document).ready(function() {
		   $('#example').DataTable();
		} );

		</script>



	</body>
	<style>
		.dataTables_length
		{
			float: right !important;
			margin-left: 25px !important;
		}
	</style>
	</html>
