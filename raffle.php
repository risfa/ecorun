<head>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<?php
//Kalo ID Trx Gak Ada Getnya gak ada
if(!$_GET['idtrx']){
	echo "<script>document.location.href='regist_2.php'</script>";
}else{
	//Kalo dia udah pernah raffle tapi glitch terjadi, maka akan kita masukan ke halaman lain

	$cekapakah_sudah_ada_hadiah = mysql_fetch_array(mysql_query("SELECT * FROM tb_users WHERE tb_users.id = '$_GET[idtrx]'"));
	if($cekapakah_sudah_ada_hadiah['hadiahnya']!=""){
		echo "<script>document.location.href='index.php?menu=raffle2&idtrx=$_GET[idtrx]'</script>";
	}
}



	//1 Mobil, 2 Motor, 3 Umum
	$idtrx = $_GET['idtrx'];


//
// if(isset($_POST['simpantrnsaksinya'])){
// 	echo "<script>document.location.href='regist_2.php'</script>";
// }



?>

<body style="background-image: url('aset/BG.jpg'); background-repeat: no-repeat; background-position: center; color: white;">
<div class="container" style="background: none;">
	<div class="row">
		<div class="col-md-12 col-sm-12" style="margin-top: 100px;">

			<center>
			    <br>
			    <img src="aset/Logo-Clasmild.png" style="width:25%; margin-left: -43%;">
			    <center><img src="aset/Puretaste.png" style="width: 55%;"></center>

				<div style="display: block; height: 200px; font-size: 5.2vw; text-transform: uppercase;" id="raffleBox" class="styleBox">
					<div class="boxnya"  style="font-size: 6vw; margin-top: 13vw">LOADING DATA..</div>
				</div>

				<div style="display: none; height: 200px; font-size: 5.2vw; text-transform: uppercase;" id="resultBox">
					<div id="hadiah" style="font-size: 6vw; margin-top: 13vw"></div>
				</div>

				<div style="margin-top: 14vw">
					<input class="btn btn-lg btn-danger buttonStop" type="submit" name="" onclick="stop()" style="height: 100px; width: 100px; border-radius: 180%;" value="STOP!">

					<a href="regist_2.php">
						<input  onclick="return confirm('Terima Kasih Telah Mengikuti Event')" class="btn btn-lg btn-info buttonGetThePrize" type="button" style="display: none;"  value="BACK TO MAIN SCREEN">
					</a>
				</div>

			</center>

		</div>
	</div>
</div>
    <div style="position: fixed;bottom: 30px;z-index: -1;">
    	<img class="img-fluid" src="aset/Peringatan.png">


    </div>
</body>

<script type="text/javascript">
	var words = [
	'2 BUNGKUS ROKOK',
	'KAOS TSHIRT CLASMILD',
	'ANDA BELUM BERUNTUNG'
	];

	var getRandomWord = function () {
		return words[Math.floor(Math.random() * words.length)];
	};
	// var hadiahnya = "<?php echo $varible_rand ?>";



	function stop(){
		$('.buttonStop').hide();
		$('#raffleBox').hide();
		$('#PrizeBox').hide();
		document.getElementById("raffleBox").style.visibility = "hidden";


		var id_transaksi = <?php echo $idtrx ; ?>;


		$.ajax({
			url:"raffle_api.php",
			method:"POST",
			data:{
				id_transaksi:id_transaksi
				// status_spesial:status_spesial,
				// id_spbu:id_spbu,
				// jenis_kendaraan:jenis_kendaraan
			},
			success:function(data)
			{
				var data = JSON.parse(data);
				document.getElementById('hadiah').innerHTML = data.hadiah;


			},error: function (error) {
				alert('Koneksi Anda Terputus, Silahkan ulangi');
				location.reload();
			}
		});



		$('#resultBox').show();
		$('.buttonGetThePrize').show();
	}



	$(function() { // after page load
		// check if hadiah sudah di Dapat



		$('.result').hide();
		setInterval(function(){
			$('.boxnya').hide(1, function(){
				$(this).html(getRandomWord()).show();
			});
		// 5 seconds
	}, 1);

	});
</script>
