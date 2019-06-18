<!DOCTYPE HTML>
<html>
<head>
	<?php 
	include('dbconnect.php');

	$sql_motor = "SELECT COUNT(jenis_kendaraan) AS jumlah1 FROM tb_transaksi WHERE jenis_kendaraan = 'Motor'";
	$sql_mobil = "SELECT COUNT(jenis_kendaraan) AS jumlah2 FROM tb_transaksi WHERE jenis_kendaraan = 'Mobil'";

	$result_motor = mysqli_query($db,$sql_motor);
	$result_mobil = mysqli_query($db,$sql_mobil);
	$data_motor = mysqli_fetch_assoc($result_motor);
	$data_mobil = mysqli_fetch_assoc($result_mobil);
	$jumlah_data =  $data_mobil['jumlah2'] +  $data_motor['jumlah1'];
	$pros_motor = ($data_motor['jumlah1']/$jumlah_data)* 100;
	$pros_mobil = ($data_mobil['jumlah2']/$jumlah_data)* 100;


	// hadiah per area

	$sql_per_area_jakarta = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Jakarta'";
	$sql_per_area_bekasi = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Bekasi'";
	$sql_per_area_tanggerang = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Tanggerang'";

	$result_per_area_jakarta = mysqli_query($db,$sql_per_area_jakarta);
	$result_per_area_bekasi = mysqli_query($db,$sql_per_area_bekasi);
	$result_per_area_tanggerang = mysqli_query($db,$sql_per_area_tanggerang);
	$data_per_area_jakarta = mysqli_fetch_assoc($result_per_area_jakarta);
	$data_per_area_bekasi = mysqli_fetch_assoc($result_per_area_bekasi);
	$data_per_area_tanggerang = mysqli_fetch_assoc($result_per_area_tanggerang);
	$jumlah_data_per_area =  $data_per_area_jakarta['jumlah'] +  $data_per_area_bekasi['jumlah'] + $data_per_area_tanggerang['jumlah'] ;
	$pros_per_area_jakarta = ($data_per_area_jakarta['jumlah']/$jumlah_data_per_area)* 100;
	$pros_per_area_bekasi = ($data_per_area_bekasi['jumlah']/$jumlah_data_per_area)* 100;
	$pros_per_area_tanggerang = ($data_per_area_tanggerang['jumlah']/$jumlah_data_per_area)* 100;

	$pros_per_area_jakarta_result = $data_per_area_jakarta['jumlah'];
	$pros_per_area_bekasi_result = $data_per_area_bekasi['jumlah'];
	$pros_per_area_tanggerang_result = $data_per_area_tanggerang['jumlah'];
	// end

	// bargraph

	$sql_motor1 = "SELECT COUNT(nominal_belanja) AS jumlahmotor1 FROM tb_transaksi WHERE jenis_kendaraan = 'Motor' AND nominal_belanja >= 15000 AND nominal_belanja <= 50000";
	$sql_motor2 = "SELECT COUNT(nominal_belanja) AS jumlahmotor2 FROM tb_transaksi WHERE jenis_kendaraan = 'Motor' AND nominal_belanja >= 50001 AND nominal_belanja <= 100000";
	$sql_motor3 ="SELECT COUNT(nominal_belanja) AS jumlahmotor3 FROM tb_transaksi WHERE jenis_kendaraan = 'Motor' AND nominal_belanja >= 100001 AND nominal_belanja <= 500000";
	$sql_mobil1 = "SELECT COUNT(nominal_belanja) AS jumlahmobil1 FROM tb_transaksi WHERE jenis_kendaraan = 'Mobil' AND nominal_belanja >= 15000 AND nominal_belanja <= 50000";
	$sql_mobil2 = "SELECT COUNT(nominal_belanja) AS jumlahmobil2 FROM tb_transaksi WHERE jenis_kendaraan = 'Mobil' AND nominal_belanja >= 50001 AND nominal_belanja <= 100000";
	$sql_mobil3 = "SELECT COUNT(nominal_belanja) AS jumlahmobil3 FROM tb_transaksi WHERE jenis_kendaraan = 'Mobil' AND nominal_belanja >= 100001 AND nominal_belanja <= 500000";

	$result_motor1 = mysqli_query($db,$sql_motor1);
	$result_motor2 = mysqli_query($db,$sql_motor2);
	$result_motor3 = mysqli_query($db,$sql_motor3);
	$result_mobil1 = mysqli_query($db,$sql_mobil1);
	$result_mobil2 = mysqli_query($db,$sql_mobil2);
	$result_mobil3 = mysqli_query($db,$sql_mobil3);


	$data_motor1 = mysqli_fetch_assoc($result_motor1);
	$data_motor2 = mysqli_fetch_assoc($result_motor2);
	$data_motor3 = mysqli_fetch_assoc($result_motor3);
	$data_mobil1 = mysqli_fetch_assoc($result_mobil1);
	$data_mobil2 = mysqli_fetch_assoc($result_mobil2);
	$data_mobil3 = mysqli_fetch_assoc($result_mobil3);

// end

	// new graph 

   $sql_Mobil1 = "SELECT COUNT(nominal_belanja) AS Mobilspbu2 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 09:%' AND id_spbu = '1' AND jenis_kendaraan = 'Mobil' " ;
   $sql_mobil1_08 = "SELECT COUNT(nominal_belanja) AS Motorspbu_mobil FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 08:%' AND id_spbu = '1' and jenis_kendaraan = 'Mobil' ";
   $sql_Mobil2 = "SELECT COUNT(nominal_belanja) AS Mobilspbu3 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 10:%' AND id_spbu = '1' AND jenis_kendaraan = 'Mobil' " ;
   $sql_Mobil3 = "SELECT COUNT(nominal_belanja) AS Mobilspbu4 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 11:%' AND id_spbu = '1' AND jenis_kendaraan = 'Mobil' " ;
   $sql_Mobil4 = "SELECT COUNT(nominal_belanja) AS Mobilspbu5 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 12:%' AND id_spbu = '1' AND jenis_kendaraan = 'Mobil' " ;
   
   $sql_Motor1 = "SELECT COUNT(nominal_belanja) AS Motorspbu2 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 09:%' AND id_spbu = '1' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor1_08 = "SELECT COUNT(nominal_belanja) AS Motorspbu2 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 09:%' AND id_spbu = '1' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor2 = "SELECT COUNT(nominal_belanja) AS Motorspbu3 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 10:%' AND id_spbu = '1' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor3 = "SELECT COUNT(nominal_belanja) AS Motorspbu4 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 11:%' AND id_spbu = '1' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor4 = "SELECT COUNT(nominal_belanja) AS Motorspbu5 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%2018-03-05 12:%' AND id_spbu = '1' AND jenis_kendaraan = 'Motor'  " ; 

    $result_mobilSpbu2 = mysqli_query($db,$sql_Mobil1);
    $result_sql_mobil1_08 = mysqli_query($db,$sql_mobil1_08);
    $result_mobilSpbu3 = mysqli_query($db,$sql_Mobil2);
    $result_mobilSpbu4 = mysqli_query($db,$sql_Mobil3);
    $result_mobilSpbu5 = mysqli_query($db,$sql_Mobil4);
    $result_motorSpbu2 = mysqli_query($db,$sql_Motor1);
    $result_motorSpbu2_08 = mysqli_query($db,$sql_Motor1_08);
    $result_motorSpbu3 = mysqli_query($db,$sql_Motor2);
    $result_motorSpbu4 = mysqli_query($db,$sql_Motor3);
    $result_motorSpbu5 = mysqli_query($db,$sql_Motor4); 

    $dataSpbu1_Mobil2 = mysqli_fetch_assoc($result_mobilSpbu2);
    $dataSpbu1_Mobil_08 = mysqli_fetch_assoc($result_sql_mobil1_08);
    $dataSpbu1_Mobil3 = mysqli_fetch_assoc($result_mobilSpbu3);
    $dataSpbu1_Mobil4 = mysqli_fetch_assoc($result_mobilSpbu4);
    $dataSpbu1_Mobil5 = mysqli_fetch_assoc($result_mobilSpbu5);
    $dataSpbu1_Motor2 = mysqli_fetch_assoc($result_motorSpbu2);
    $dataSpbu1_Motor2_08 = mysqli_fetch_assoc($result_motorSpbu2_08);
    $dataSpbu1_Motor3 = mysqli_fetch_assoc($result_motorSpbu3);
    $dataSpbu1_Motor4 = mysqli_fetch_assoc($result_motorSpbu4);
    $dataSpbu1_Motor5 = mysqli_fetch_assoc($result_motorSpbu5);
	//end

// new graph TOTAL TRANSAKSI

   $sql_Mobil_total1 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '09' AND jenis_kendaraan = 'Mobil' " ;
   $sql_mobil_08_total2 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '08' AND jenis_kendaraan = 'Mobil' ";
   $sql_Mobil_total3 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '10' AND jenis_kendaraan = 'Mobil' " ;
   $sql_Mobil_total4 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '11' AND jenis_kendaraan = 'Mobil' " ;
   $sql_Mobil_total5 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '12' AND jenis_kendaraan = 'Mobil' " ;
   
   $sql_Motor_Total1 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '09' AND jenis_kendaraan = 'Motor' " ;
   $sql_Motor_08_Total2 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '08' AND jenis_kendaraan = 'Motor' " ;
   $sql_Motor_Total3 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '10' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor_Total4 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '11'  AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor_Total5 = "SELECT COUNT(nominal_belanja) AS nominal_belanja FROM tb_transaksi WHERE substring(tanggal_transaksi,12,2) = '12'  AND jenis_kendaraan = 'Motor'  " ; 

    $result_mobilSpbu2_total1 = mysqli_query($db,$sql_Mobil_total1);
    $result_sql_mobil1_08_total2 = mysqli_query($db,$sql_mobil_08_total2);
    $result_mobilSpbu3_total3 = mysqli_query($db,$sql_Mobil_total3);
    $result_mobilSpbu4_total4 = mysqli_query($db,$sql_Mobil_total4);
    $result_mobilSpbu5_total5 = mysqli_query($db,$sql_Mobil_total5);

    $result_motorSpbu2_Total1 = mysqli_query($db,$sql_Motor_Total1);
    $result_motorSpbu2_08_Total2 = mysqli_query($db,$sql_Motor_08_Total2);
    $result_motorSpbu3_Total3 = mysqli_query($db,$sql_Motor_Total3);
    $result_motorSpbu4_Total4 = mysqli_query($db,$sql_Motor_Total4);
    $result_motorSpbu5_Total5 = mysqli_query($db,$sql_Motor_Total5); 

    $dataSpbu1_Mobil2_total1 = mysqli_fetch_assoc($result_mobilSpbu2_total1);
    $dataSpbu1_Mobil_08_total2 = mysqli_fetch_assoc($result_sql_mobil1_08_total2);
    $dataSpbu1_Mobil3_total3 = mysqli_fetch_assoc($result_mobilSpbu3_total3);
    $dataSpbu1_Mobil4_total4 = mysqli_fetch_assoc($result_mobilSpbu4_total4);
    $dataSpbu1_Mobil5_total5 = mysqli_fetch_assoc($result_mobilSpbu5_total5);

    $dataSpbu1_Motor2_Total1 = mysqli_fetch_assoc($result_motorSpbu2_Total1);
    $dataSpbu1_Motor2_08_Total2 = mysqli_fetch_assoc($result_motorSpbu2_08_Total2);
    $dataSpbu1_Motor3_Total3 = mysqli_fetch_assoc($result_motorSpbu3_Total3);
    $dataSpbu1_Motor4_Total4 = mysqli_fetch_assoc($result_motorSpbu4_Total4);
    $dataSpbu1_Motor5_Total5 = mysqli_fetch_assoc($result_motorSpbu5_Total5);

    $result_total = $dataSpbu1_Motor2_Total1['nominal_belanja']+$dataSpbu1_Motor2_08_Total2['nominal_belanja']+$dataSpbu1_Motor3_Total3['nominal_belanja']+$dataSpbu1_Motor4_Total4['nominal_belanja']+$dataSpbu1_Motor5_Total5['nominal_belanja']+$dataSpbu1_Mobil2_total1['nominal_belanja']+$dataSpbu1_Mobil_08_total2['nominal_belanja']+$dataSpbu1_Mobil3_total3['nominal_belanja']+$dataSpbu1_Mobil4_total4['nominal_belanja']+$dataSpbu1_Mobil5_total5['nominal_belanja'];
	//end


	// query distribusi hadiah per area

    	

    	 $sql_hadiah_per_area_jakarta_mobil = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Jakarta' AND jenis_kendaraan = 'Mobil' " ;

    	 $sql_hadiah_per_area_bekasi_mobil = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Bekasi' AND jenis_kendaraan = 'Mobil' " ;

    	 $sql_hadiah_per_area_tanggerang_mobil = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Tanggerang' AND jenis_kendaraan = 'Mobil' " ;





    	 $sql_hadiah_per_area_jakarta_motor = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Jakarta' AND jenis_kendaraan = 'Motor' " ;

    	 $sql_hadiah_per_area_bekasi_motor = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Bekasi' AND jenis_kendaraan = 'Motor' " ;

    	 $sql_hadiah_per_area_tanggerang_motor = "SELECT COUNT(id_transaksi) as jumlah FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where kota = 'Tanggerang' AND jenis_kendaraan = 'Motor' " ;



    $query_hadiah_per_area_jakarta_mobil = mysqli_query($db,$sql_hadiah_per_area_jakarta_mobil);
    $query_hadiah_per_area_bekasi_mobil = mysqli_query($db,$sql_hadiah_per_area_bekasi_mobil);
    $query_hadiah_per_area_tanggerang_mobil = mysqli_query($db,$sql_hadiah_per_area_tanggerang_mobil);
    $query_hadiah_per_area_jakarta_motor = mysqli_query($db,$sql_hadiah_per_area_jakarta_motor);
    $query_hadiah_per_area_bekasi_motor = mysqli_query($db,$sql_hadiah_per_area_bekasi_motor);
    $query_hadiah_per_area_tanggerang_motor = mysqli_query($db,$sql_hadiah_per_area_tanggerang_motor);


    $result_hadiah_per_area_jakarta_mobil = mysqli_fetch_assoc($query_hadiah_per_area_jakarta_mobil);
    $result_hadiah_per_area_bekasi_mobil = mysqli_fetch_assoc($query_hadiah_per_area_bekasi_mobil);
    $result_hadiah_per_area_tanggerang_mobil = mysqli_fetch_assoc($query_hadiah_per_area_tanggerang_mobil);
    $result_hadiah_per_area_jakarta_motor = mysqli_fetch_assoc($query_hadiah_per_area_jakarta_motor);
    $result_hadiah_per_area_bekasi_motor = mysqli_fetch_assoc($query_hadiah_per_area_bekasi_motor);
    $result_hadiah_per_area_tanggerang_motor = mysqli_fetch_assoc($query_hadiah_per_area_tanggerang_motor);


//QUERY NAMA HADIAH

   $sql_nama_hadiah1_Motor=" SELECT COUNT(id_transaksi) as TotalMotor1 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Pouch Pertamina' AND jenis_kendaraan = 'Motor' ";
   $sql_nama_hadiah2_Motor=" SELECT COUNT(id_transaksi) as TotalMotor2 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Dompet STNK' AND jenis_kendaraan = 'Motor' ";
   $sql_nama_hadiah3_Motor=" SELECT COUNT(id_transaksi) as TotalMotor3 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Payung' AND jenis_kendaraan = 'Motor' ";
   $sql_nama_hadiah4_Motor=" SELECT COUNT(id_transaksi) as TotalMotor4 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Trashbin Pertalite' AND jenis_kendaraan = 'Motor'";
   $sql_nama_hadiah5_Motor= " SELECT COUNT(id_transaksi) as TotalMotor5 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Voucher BBK 25K' OR hadiahnya='Voucher BBK 25rb' AND jenis_kendaraan = 'Motor'";
   $sql_nama_hadiah6_Motor=" SELECT COUNT(id_transaksi) as TotalMotor6 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Handphone Samsung #2' AND jenis_kendaraan = 'Motor'";
   $sql_nama_hadiah7_Motor=" SELECT COUNT(id_transaksi) as TotalMotor7 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Hadiah Hiburan' AND jenis_kendaraan = 'Motor'";


   $sql_nama_hadiah1_Mobil=" SELECT COUNT(id_transaksi) as TotalMobil1 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Pouch Pertamina' AND jenis_kendaraan = 'Mobil' ";
   $sql_nama_hadiah2_Mobil= " SELECT COUNT(id_transaksi) as TotalMobil2 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Dompet STNK' AND jenis_kendaraan = 'Mobil' ";
   $sql_nama_hadiah3_Mobil=" SELECT COUNT(id_transaksi) as TotalMobil3 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Payung' AND jenis_kendaraan = 'Mobil' ";
   $sql_nama_hadiah4_Mobil=" SELECT COUNT(id_transaksi) as TotalMobil4 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Trashbin Pertalite' AND jenis_kendaraan = 'Mobil'";
   $sql_nama_hadiah5_Mobil=" SELECT COUNT(id_transaksi) as TotalMobil5 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Voucher BBK 25K' OR hadiahnya='Voucher BBK 25rb' AND jenis_kendaraan = 'Mobil'";
   $sql_nama_hadiah6_Mobil=" SELECT COUNT(id_transaksi) as TotalMobil6 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Handphone Samsung #1' AND jenis_kendaraan = 'Mobil'";
   $sql_nama_hadiah7_Mobil=" SELECT COUNT(id_transaksi) as TotalMobil7 FROM `tb_transaksi` INNER JOIN tb_spbu on tb_transaksi.id_spbu = tb_spbu.id_spbu where hadiahnya = 'Hadiah Hiburan' AND jenis_kendaraan = 'Mobil'";

$query_nama_hadiah1_Motor = mysqli_query($db,$sql_nama_hadiah1_Motor);
$query_nama_hadiah2_Motor = mysqli_query($db,$sql_nama_hadiah2_Motor);
$query_nama_hadiah3_Motor = mysqli_query($db,$sql_nama_hadiah3_Motor);
$query_nama_hadiah4_Motor = mysqli_query($db,$sql_nama_hadiah4_Motor);
$query_nama_hadiah5_Motor = mysqli_query($db,$sql_nama_hadiah5_Motor);
$query_nama_hadiah6_Motor = mysqli_query($db,$sql_nama_hadiah6_Motor);
$query_nama_hadiah7_Motor = mysqli_query($db,$sql_nama_hadiah7_Motor);

$query_nama_hadiah1_Mobil = mysqli_query($db,$sql_nama_hadiah1_Mobil);
$query_nama_hadiah2_Mobil = mysqli_query($db,$sql_nama_hadiah2_Mobil);
$query_nama_hadiah3_Mobil = mysqli_query($db,$sql_nama_hadiah3_Mobil);
$query_nama_hadiah4_Mobil = mysqli_query($db,$sql_nama_hadiah4_Mobil);
$query_nama_hadiah5_Mobil = mysqli_query($db,$sql_nama_hadiah5_Mobil);
$query_nama_hadiah6_Mobil = mysqli_query($db,$sql_nama_hadiah6_Mobil);
$query_nama_hadiah7_Mobil = mysqli_query($db,$sql_nama_hadiah7_Mobil);

$Result_nama_hadiah1_Motor = mysqli_fetch_assoc($query_nama_hadiah1_Motor);
$Result_nama_hadiah2_Motor = mysqli_fetch_assoc($query_nama_hadiah2_Motor);
$Result_nama_hadiah3_Motor = mysqli_fetch_assoc($query_nama_hadiah3_Motor);
$Result_nama_hadiah4_Motor = mysqli_fetch_assoc($query_nama_hadiah4_Motor);
$Result_nama_hadiah5_Motor = mysqli_fetch_assoc($query_nama_hadiah5_Motor);
$Result_nama_hadiah6_Motor = mysqli_fetch_assoc($query_nama_hadiah6_Motor);
$Result_nama_hadiah7_Motor = mysqli_fetch_assoc($query_nama_hadiah7_Motor);

$Result_nama_hadiah1_Mobil = mysqli_fetch_assoc($query_nama_hadiah1_Mobil);
$Result_nama_hadiah2_Mobil = mysqli_fetch_assoc($query_nama_hadiah2_Mobil);
$Result_nama_hadiah3_Mobil = mysqli_fetch_assoc($query_nama_hadiah3_Mobil);
$Result_nama_hadiah4_Mobil = mysqli_fetch_assoc($query_nama_hadiah4_Mobil);
$Result_nama_hadiah5_Mobil = mysqli_fetch_assoc($query_nama_hadiah5_Mobil);
$Result_nama_hadiah6_Mobil = mysqli_fetch_assoc($query_nama_hadiah6_Mobil);
$Result_nama_hadiah7_Mobil = mysqli_fetch_assoc($query_nama_hadiah7_Mobil);

	// end

	?>
	<!-- <?php 
		$dataPoints = array(
					  array("label"=>"Mobil","y"=>177),
					  array("label"=>"Motor","y"=>617)
		)
	 ?> -->
	<script>

		//pie graph
		window.onload = function () {
			var jumlah_data=<?php echo $jumlah_data; ?>;
			var options = {
				title: {
					text: "Prosentase"
				},
				subtitles: [{
					text: "jumlah pengguna "+ jumlah_data
				}],
				animationEnabled: true,
				exportEnabled: true,
				data: [{
					type: "pie",
					startAngle: 40,
					toolTipContent: "<b>{label}</b>: {label2}",
					showInLegend: "true",
					legendText: "{label} : {label2}",
					indexLabelFontSize: 16,
					indexLabel: "{label} - {y} : {label2}",
					yValueFormatString: "#,##0.00\"%\"",
		            // indexLabelPlacement: "inside",
					dataPoints: [
					// dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
						// { y: <?php echo $jumlah_motor['jumlah1']; ?>, label: "Motor" },
						{ label2 : <?php echo $data_mobil['jumlah2'] ?> , y: <?php echo round($pros_mobil);?>, label: "Mobil" },
						{ label2 : <?php echo $data_motor['jumlah1'] ?> , y: <?php echo round($pros_motor); ?>, label: "Motor" }

						
						

						]
					}]

				};
				$("#chartContainer").CanvasJSChart(options);

		
			// bargraph
			var raw_motor1 = <?php echo $data_motor1['jumlahmotor1']?>;
			var raw_motor2 = <?php echo $data_motor2["jumlahmotor2"]?>;
			var raw_motor3 = <?php echo $data_motor3["jumlahmotor3"]?>;
			var raw_mobil1 = <?php echo $data_mobil1["jumlahmobil1"]?>;
			var raw_mobil2 = <?php echo $data_mobil2["jumlahmobil2"]?>;
			var raw_mobil3 = <?php echo $data_mobil3["jumlahmobil3"]?>;
			var chart = new CanvasJS.Chart("chartContainer2", {
				exportEnabled: true,
				animationEnabled: true,
				title:{
					text: "Jumlah Pembelian "
				},
				subtitles: [{
					text: ""
				}], 
				axisX: {
					title: "States"
				},
				axisY: {
					title: "",
					titleFontColor: "#4F81BC",
					lineColor: "#4F81BC",
					labelFontColor: "#4F81BC",
					tickColor: "#4F81BC"
				},
				axisY2: {
					title: "",
					titleFontColor: "#C0504E",
					lineColor: "#C0504E",
					labelFontColor: "#C0504E",
					tickColor: "#C0504E"
				},
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [{
					type: "column",
					indexLabel: "{y}",
					name: "Motor",
					showInLegend: true,      
					yValueFormatString: "#,##0.#",
					dataPoints: [
					{ label: "20.000-50.000",  y: raw_motor1},
					{label: "50.000-100.000", y: raw_motor2},
					{label: "100.000-500.000", y:raw_motor3}
					]
				},
				{
					type: "column",
					indexLabel: "{y}",
					name: "Mobil",
					axisYType: "secondary",
					showInLegend: true,
					yValueFormatString: "#,##0.#",
					dataPoints: [
					{ label: "20.000-50.000", y:raw_mobil1},
					{label: "50.000- 100.000", y:raw_mobil2},
					{label: "100.000- 500.000",y:raw_mobil3}
					]
				}]
			});
			chart.render();
			// end


			// distribusi Hadiah Per Area
			// bargraph
			var raw_mobil_jakarta = <?php echo $result_hadiah_per_area_jakarta_mobil['jumlah']?>;
			var raw_mobil_bekasi = <?php echo $result_hadiah_per_area_bekasi_mobil["jumlah"]?>;
			var raw_mobil_tanggerang = <?php echo $result_hadiah_per_area_tanggerang_mobil["jumlah"]?>;

			var raw_motor_jakarta = <?php echo $result_hadiah_per_area_jakarta_motor["jumlah"]?>;
			var raw_motor_bekasi = <?php echo $result_hadiah_per_area_bekasi_motor["jumlah"]?>;
			var raw_motor_tanggerang = <?php echo $result_hadiah_per_area_tanggerang_motor["jumlah"]?>;

			var chartHadiahPerArea = new CanvasJS.Chart("chartHadiahPerArea", {
				exportEnabled: true,
				animationEnabled: true,
				title:{
					text: "Distribusi Hadiah Per Area "
				},
				subtitles: [{
					text: ""
				}], 
				axisX: {
					title: "States"
				},
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [{
					type: "column",
					indexLabel: "{y}",
					name: "Motor",
					showInLegend: true,      
					yValueFormatString: "#,##0.# ",
					dataPoints: [
					{ label: "Jakarta",  y: raw_motor_jakarta},
					{label: "Tanggerang", y: raw_motor_tanggerang},
					{label: "Bekasi", y:raw_motor_bekasi}
					]
				},
				{
					type: "column",
					indexLabel: "{y}",
					name: "Mobil",
					axisYType: "secondary",
					showInLegend: true,
					yValueFormatString: "#,##0.# ",
					dataPoints: [
					{ label: "Jakarta", y:raw_mobil_jakarta},
					{label: "Tanggerang", y:raw_mobil_tanggerang},
					{label: "Bekasi",y:raw_mobil_bekasi}
					]
				}]
			});
			chartHadiahPerArea.render();
			// end


			//nama hadiahnya
		var raw_motor_pouch1 = <?php echo $Result_nama_hadiah1_Motor["TotalMotor1"]?>;
		var raw_motor_dompet2 = <?php echo $Result_nama_hadiah2_Motor["TotalMotor2"]?>;
		var raw_motor_payung3 = <?php echo $Result_nama_hadiah3_Motor["TotalMotor3"]?>;
	    var raw_motor_trash4 = <?php echo $Result_nama_hadiah4_Motor["TotalMotor4"]?>;
		var raw_motor_voucher5 = <?php echo $Result_nama_hadiah5_Motor["TotalMotor5"]?>;
		var raw_motor_hp6 = <?php echo $Result_nama_hadiah6_Motor["TotalMotor6"]?>;
		var raw_motor_Hiburan7 = <?php echo $Result_nama_hadiah7_Motor["TotalMotor7"]?>;

		var raw_mobil_hadiah1 = <?php echo $Result_nama_hadiah1_Mobil["TotalMobil1"]?>;
		var raw_mobil_hadiah2 = <?php echo $Result_nama_hadiah2_Mobil["TotalMobil2"]?>;
		var raw_mobil_hadiah3 = <?php echo $Result_nama_hadiah3_Mobil["TotalMobil3"]?>;
		var raw_mobil_hadiah4 = <?php echo $Result_nama_hadiah4_Mobil["TotalMobil4"]?>;
		var raw_mobil_hadiah5 = <?php echo $Result_nama_hadiah5_Mobil["TotalMobil5"]?>;
		var raw_mobil_hadiah6 = <?php echo $Result_nama_hadiah6_Mobil["TotalMobil6"]?>;
		var raw_mobil_hadiah7 = <?php echo $Result_nama_hadiah7_Mobil["TotalMobil7"]?>;

		var chartNamaHadiahPerArea = new CanvasJS.Chart("chartNamaHadiahPerArea", {
				exportEnabled: true,
				animationEnabled: true,
				title:{
					text: "Nama Hadiah  "
				},
				subtitles: [{
					text: ""
				}], 
				axisX: {
					title: "States"
				},
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [{
					type: "column",
					indexLabel: "{y}",
					name: "Motor",
					showInLegend: true,      
					yValueFormatString: "#,##0.#",
					dataPoints: [
					{ label: "Pouch Pertamina",  y: raw_motor_pouch1},
					{label: "Dompet STNK", y:  raw_motor_dompet2},
					{label: "Payung", y:raw_motor_payung3},
					{label: "Trashbin Pertalite", y:raw_motor_trash4},
					{label: "Voucher BBK", y:raw_motor_voucher5},
					{label: "Handphone Samsung", y:raw_motor_hp6},
					{label: "Hadiah Hiburan", y:raw_motor_Hiburan7}
					]
				},
				{
					type: "column",
					indexLabel: "{y}",
					name: "Mobil",
					axisYType: "secondary",
					showInLegend: true,
					yValueFormatString: "#,##0.#",
					dataPoints: [
					{ label: "Pouch Pertamina", y:raw_mobil_hadiah1},
					{label: "Dompet STNK", y:raw_mobil_hadiah2},
					{label: "Payung",y:raw_mobil_hadiah3},
					{label: "Trashbin Pertalite",y:raw_mobil_hadiah4},
					{label: "Voucher BBK",y:raw_mobil_hadiah5},
					{label: "Handphone Samsung",y:raw_mobil_hadiah6},
					{label: "Hadiah Hiburan",y:raw_mobil_hadiah7}
					]
				}]
			});
			chartNamaHadiahPerArea.render();
			//end

			// new bar graph TOTAL
			var raw_total_mobil1 = <?php echo $dataSpbu1_Mobil2_total1['nominal_belanja'] + $dataSpbu1_Mobil_08_total2['nominal_belanja']?>;

			var raw_total_mobil2 = <?php echo $dataSpbu1_Mobil3_total3['nominal_belanja']?>;
			var raw_total_mobil3 = <?php echo $dataSpbu1_Mobil4_total4['nominal_belanja']?>;
			var raw_total_mobil4 = <?php echo $dataSpbu1_Mobil5_total5['nominal_belanja']?>;

			var raw_Total_motor1 = <?php echo $dataSpbu1_Motor2_Total1["nominal_belanja"] + $dataSpbu1_Motor2_08_Total2['nominal_belanja']?>;

			var raw_Total_motor2 = <?php echo $dataSpbu1_Motor3_Total3["nominal_belanja"]?>;
			var raw_Total_motor3 = <?php echo $dataSpbu1_Motor4_Total4["nominal_belanja"]?>;
			var raw_Total_motor4 = <?php echo $dataSpbu1_Motor5_Total5["nominal_belanja"]?>;
			var chartNewTotal = new CanvasJS.Chart("chartContainerNewTotal", {
				exportEnabled: true,
				animationEnabled: true,
				title:{
					text: "Total Transaksi "
				},
				subtitles: [{
					text: "Total " + <?php echo $result_total;?>
				}], 

				axisX: {
					title: "States"
				},
				axisY: {
					title: "",
					titleFontColor: "#4F81BC",
					lineColor: "#4F81BC",
					labelFontColor: "#4F81BC",
					tickColor: "#4F81BC"
				},
				axisY2: {
					title: "",
					titleFontColor: "#C0504E",
					lineColor: "#C0504E",
					labelFontColor: "#C0504E",
					tickColor: "#C0504E"
				},
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [{
					type: "column",
					indexLabel: "{y}",
					name: "Motor",
					showInLegend: true,      
					yValueFormatString: "#,##0.# ",
					dataPoints: [
					{label: "08.00-09.00",  y:raw_Total_motor1},
					{label: "09.00-10.00", y:raw_Total_motor2},
					{label: "10.00-11.00", y:raw_Total_motor3},
					{label: "11.00-12.00", y:raw_Total_motor4}
					]
				},
				{
					type: "column",
					indexLabel: "{y}",
					name: "Mobil",
					axisYType: "secondary",
					showInLegend: true,
					yValueFormatString: "#,##0.# ",
					dataPoints: [
					{ label: "08.00-09.00", y:raw_total_mobil1},
					{label: "09.00-10.00", y:raw_total_mobil2},
					{label: "10.00-11.00",y:raw_total_mobil3},
					{label: "11.00-12.00",y:raw_total_mobil4}
					]
				}]
			});
			chartNewTotal.render();

			// end

			// pie graph distribsi per hari
			var jumlah_data_per_area=<?php echo $jumlah_data_per_area; ?>;
			var chartPieHadiahPerArea = {
				title: {
					text: "Prosentase Distribusi Hadiah Per Area"
				},
				subtitles: [{
					text: "jumlah pengguna "+ jumlah_data_per_area
				}],
				
				animationEnabled: true,
				exportEnabled: true,
				data: [{
					type: "pie",
					startAngle: 40,
					toolTipContent: "<b>{label}</b>: {label2}",
					showInLegend: "true",
					legendText: "{label} : {label2}",
					indexLabelFontSize: 16,
					indexLabel: "{label} - {y} : {label2}",
					yValueFormatString: "#,##0.00\"%\"",
		            // indexLabelPlacement: "inside",

					dataPoints: [
						{ label2: <?php echo round($pros_per_area_jakarta_result);?>,y: <?php echo round($pros_per_area_jakarta);?>, label: "Jakarta" },
						{ label2: <?php echo round($pros_per_area_bekasi_result);?>,y: <?php echo round($pros_per_area_bekasi);?>, label: "Bekasi" },
						{ label2: <?php echo round($pros_per_area_tanggerang_result);?>,y: <?php echo round($pros_per_area_tanggerang); ?>, label: "Tanggerang" }
						

						]
					}]

				};
				$("#chartPieHadiahPerArea").CanvasJSChart(chartPieHadiahPerArea);
			// end

			// new bar graph
			var raw_mobil1 = <?php echo $dataSpbu1_Mobil2['Mobilspbu2'] + $dataSpbu1_Mobil_08['Motorspbu_mobil']?>;
			var raw_mobil2 = <?php echo $dataSpbu1_Mobil3['Mobilspbu3']?>;
			var raw_mobil3 = <?php echo $dataSpbu1_Mobil4['Mobilspbu4']?>;
			var raw_mobil4 = <?php echo $dataSpbu1_Mobil5['Mobilspbu5']?>;
			var raw_motor1 = <?php echo $dataSpbu1_Motor2["Motorspbu2"] + $dataSpbu1_Motor2_08['Motorspbu2']?>;
			var raw_motor2 = <?php echo $dataSpbu1_Motor3["Motorspbu3"]?>;
			var raw_motor3 = <?php echo $dataSpbu1_Motor4["Motorspbu4"]?>;
			var raw_motor4 = <?php echo $dataSpbu1_Motor5["Motorspbu5"]?>;
			var chartNew = new CanvasJS.Chart("chartContainerNew", {
				exportEnabled: true,
				animationEnabled: true,
				title:{
					text: "Jumlah Transaksi Per Area"
				},
				subtitles: [{
					text: ""
				}], 
				axisX: {
					title: "States"
				},
				axisY: {
					title: "",
					titleFontColor: "#4F81BC",
					lineColor: "#4F81BC",
					labelFontColor: "#4F81BC",
					tickColor: "#4F81BC"
				},
				axisY2: {
					title: "",
					titleFontColor: "#C0504E",
					lineColor: "#C0504E",
					labelFontColor: "#C0504E",
					tickColor: "#C0504E"
				},
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [{
					type: "column",
					indexLabel: "{y}",
					name: "Motor",
					showInLegend: true,      
					yValueFormatString: "#,##0.# ",
					dataPoints: [
					{label: "08.00-09.00",  y:raw_motor1},
					{label: "09.00-10.00", y:raw_motor2},
					{label: "10.00-11.00", y:raw_motor3},
					{label: "11.00-12.00", y:raw_motor4}
					]
				},
				{
					type: "column",
					indexLabel: "{y}",
					name: "Mobil",
					axisYType: "secondary",
					showInLegend: true,
					yValueFormatString: "#,##0.# ",
					dataPoints: [
					{ label: "08.00-09.00", y:raw_mobil1},
					{label: "09.00-10.00", y:raw_mobil2},
					{label: "10.00-11.00",y:raw_mobil3},
					{label: "11.00-12.00",y:raw_mobil4}
					]
				}]
			});
			chartNew.render();

			// end





			function toggleDataSeries(e) {
				if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
					e.dataSeries.visible = false;
				} else {
					e.dataSeries.visible = true;
				}+
				e.chart.render();
			}
			// end
		}
	</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<h1>INTERACTIVE CHART</h1>
<div id="chartContainer" style="height: 300px; width: 100%; margin-top: 50px;"></div>
<div id="chartContainer2" style="height: 300px; width: 100%; margin-top: 50px;"></div>
<div id="chartPieHadiahPerArea" style="height: 300px; width: 100%; margin-top: 50px;"></div>
<div id="chartHadiahPerArea" style="height: 300px; width: 100%; margin-top: 50px;"></div>
<div id="chartNamaHadiahPerArea" style="height: 300px; width: 100%; margin-top: 50px;"></div>
<div id="chartContainerNewTotal" style="height: 300px; width: 100%; margin-top: 50px;"></div>

<select id="tanggal">
  <?php
      $mysql_query = mysqli_query($db,'SELECT LEFT(tanggal_transaksi,10) as tanggal FROM tb_transaksi JOIN tb_spbu ON tb_spbu.id_spbu = tb_transaksi.id_spbu GROUP BY YEAR(tanggal_transaksi), MONTH(tanggal_transaksi), DATE(tanggal_transaksi)');
      while($data = mysqli_fetch_assoc($mysql_query)){

  ?>
  <option value="<?php echo $data['tanggal'] ?>"><?php echo $data['tanggal']?></option>
  <?php

      }
  ?>`

</select>

<select id="spbu">
	<?php
			$mysql_query = mysqli_query($db,'SELECT * from tb_spbu');
			while($data = mysqli_fetch_assoc($mysql_query)){

	?>
	<option value="<?php echo $data['id_spbu'] ?>" data-value="1"><?php echo $data['alamat_spbu']?></option>
	<?php

			}
	?>`
</select>


<div id="chartContainerNew" style="height: 300px; width: 100%; margin-top: 50px;"></div>

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type="text/javascript">

	// $('#Process').click(function(){
	// 	alert();
	// });
	var value_spbu = '';
	var value_tanggal = '';
	$('#tanggal').on('change',function(){
			 // alert(this.value + '- id spbu' +value_spbu);
			value_tanggal = this.value;
			var dataPoints = [];
			var dataPoints2 = [];
			var dataArray = '';
			$.get("http://joker.5dapps.com/pertamina/luckyfriday/r_admin/api.php?idspbu="+value_spbu+"&tanggal="+value_tanggal, function(data, status){
				var data123 = JSON.parse(data);
				var time1 = 8
				var time2 = 9
				var time1_2 = 8
				var time2_2 = 9
				for (var i = 0; i < 4; i++) {
				console.log(data123[i])
						dataPoints.push({
						 label: '0'+time1.toString()+'.00-'+time2.toString()+'.00',
						 y: parseInt(data123[i])
						});
						time1++
						time2++
				}
					for (var k =4; k< 8; k++) {
						dataPoints2.push({
						 label: '0'+time1_2.toString()+'.00-'+time2_2.toString()+'.00',
						 y: parseInt(data123[k])
						});
						time1_2++
						time2_2++
					}

		    var chartNew = new CanvasJS.Chart("chartContainerNew",{
						    	exportEnabled: true,
								animationEnabled: true,
								title:{
									text:"Jumlah Transaksi"
								},
								subtitles: [{
									text: ""
								}], 
								axisX: {
									title: "States"
								},
								axisY: {
									title: "",
									titleFontColor: "#4F81BC",
									lineColor: "#4F81BC",
									labelFontColor: "#4F81BC",
									tickColor: "#4F81BC"
								},
								axisY2: {
									title: "",
									titleFontColor: "#C0504E",
									lineColor: "#C0504E",
									labelFontColor: "#C0504E",
									tickColor: "#C0504E"
								},
								data: [{
									type: "column",
									name:'Motor',
									showInLegend: true,      
									yValueFormatString: "#,##0.# ",
									dataPoints: dataPoints,
								},{
									type: "column",
									name:'Mobil',
									axisYType: "secondary",
									showInLegend: true,      
									yValueFormatString: "#,##0.# ",
									dataPoints: dataPoints2,
								}]
							});
			chartNew.render();
		    });




	});



	$('#spbu').on('change',function(){
			value_spbu = this.value;
			// alert(value_spbu);

			var dataPoints = [];
			var dataPoints2 = [];
			$.get("http://joker.5dapps.com/pertamina/luckyfriday/r_admin/api.php?idspbu="+value_spbu+"&spbu="+value_tanggal, function(data, status){
				var data123 = JSON.parse(data);
				var time1 = 8
				var time2 = 9
				var time1_2 = 8
				var time2_2 = 9
				for (var i = 0; i < 4; i++) {
				console.log(data123[i])
						dataPoints.push({
						 label: '0'+time1.toString()+'.00-'+time2.toString()+'.00',
						 y: parseInt(data123[i])
						});
						time1++
						time2++
				}
					for (var k =4; k< 8; k++) {
						dataPoints2.push({
						 label: '0'+time1_2.toString()+'.00-'+time2_2.toString()+'.00',
						 y: parseInt(data123[k])
						});
						time1_2++
						time2_2++
					}

		      
		    var chartNew = new CanvasJS.Chart("chartContainerNew",{
						    	exportEnabled: true,
								animationEnabled: true,
								title:{
									text:"Jumlah Transaksi"
								},
								subtitles: [{
									text: ""
								}], 
								axisX: {
									title: "States"
								},
								axisY: {
									title: "",
									titleFontColor: "#4F81BC",
									lineColor: "#4F81BC",
									labelFontColor: "#4F81BC",
									tickColor: "#4F81BC"
								},
								axisY2: {
									title: "",
									titleFontColor: "#C0504E",
									lineColor: "#C0504E",
									labelFontColor: "#C0504E",
									tickColor: "#C0504E"
								},
								data: [{
									type: "column",
									name:'Motor',
									showInLegend: true,      
									yValueFormatString: "#,##0.# ",
									dataPoints: dataPoints,
								},{
									type: "column",
									name:'Mobil',
									axisYType: "secondary",
									showInLegend: true,      
									yValueFormatString: "#,##0.# ",
									dataPoints: dataPoints2,
								}]
							});
			chartNew.render();
		    });



			

	});
	
</script>
</html>