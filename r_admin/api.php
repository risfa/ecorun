<?php

include('dbconnect.php');

$idspbu = $_GET['idspbu'];
// $tanggal = '2018-03-16';
$tanggal = $_GET['tanggal'];

    $sql_Mobil1_08 = "SELECT COUNT(nominal_belanja) AS Mobilspbu2 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 08:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Mobil' " ;
    $sql_Mobil1 = "SELECT COUNT(nominal_belanja) AS Mobilspbu2 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 09:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Mobil' " ;
   $sql_Mobil2 = "SELECT COUNT(nominal_belanja) AS Mobilspbu3 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 10:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Mobil' " ;
   $sql_Mobil3 = "SELECT COUNT(nominal_belanja) AS Mobilspbu4 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 11:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Mobil' " ;
   $sql_Mobil4 = "SELECT COUNT(nominal_belanja) AS Mobilspbu5 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 12:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Mobil' " ;
   
   $sql_Motor1_08 = "SELECT COUNT(nominal_belanja) AS Motorspbu2 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 08:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor1 = "SELECT COUNT(nominal_belanja) AS Motorspbu2 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 09:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor2 = "SELECT COUNT(nominal_belanja) AS Motorspbu3 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 10:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor3 = "SELECT COUNT(nominal_belanja) AS Motorspbu4 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 11:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Motor'  " ;
   $sql_Motor4 = "SELECT COUNT(nominal_belanja) AS Motorspbu5 FROM tb_transaksi WHERE tanggal_transaksi LIKE '%$tanggal 12:%' AND id_spbu = '$idspbu' AND jenis_kendaraan = 'Motor'  " ; 

   $data = array();
   
    $result_mobilSpbu2 = mysqli_query($db,$sql_Mobil1);
    $result_mobilSpbu2_08 = mysqli_query($db,$sql_Mobil1_08);
    $result_mobilSpbu3 = mysqli_query($db,$sql_Mobil2);
    $result_mobilSpbu4 = mysqli_query($db,$sql_Mobil3);
    $result_mobilSpbu5 = mysqli_query($db,$sql_Mobil4);
    $result_motorSpbu2 = mysqli_query($db,$sql_Motor1);
    $result_motorSpbu2_08 = mysqli_query($db,$sql_Motor1_08);
    $result_motorSpbu3 = mysqli_query($db,$sql_Motor2);
    $result_motorSpbu4 = mysqli_query($db,$sql_Motor3);
    $result_motorSpbu5 = mysqli_query($db,$sql_Motor4); 


    $dataSpbu1_Mobil2_08 = mysqli_fetch_assoc($result_mobilSpbu2_08);
    $dataSpbu1_Motor2_08 = mysqli_fetch_assoc($result_motorSpbu2_08);

   
	// //end

    // mobil
    while ($dataSpbu1_Mobil2 = mysqli_fetch_assoc($result_mobilSpbu2)) {

    	array_push($data,$dataSpbu1_Mobil2['Mobilspbu2']+$dataSpbu1_Mobil2_08['Mobilspbu2'] );
    	
    }

    while ($dataSpbu1_Mobil3 = mysqli_fetch_assoc($result_mobilSpbu3)) {

    	array_push($data,$dataSpbu1_Mobil3['Mobilspbu3'] );
    }
    while ($dataSpbu1_Mobil4 = mysqli_fetch_assoc($result_mobilSpbu4)) {

    	array_push($data,$dataSpbu1_Mobil4['Mobilspbu4'] );
    }
    while ($dataSpbu1_Mobil5 = mysqli_fetch_assoc($result_mobilSpbu5)) {

    	array_push($data,$dataSpbu1_Mobil5['Mobilspbu5'] );
    }
    // end
    // motor

    while ($dataSpbu1_Motor2 = mysqli_fetch_assoc($result_motorSpbu2)) {

    	array_push($data,$dataSpbu1_Motor2['Motorspbu2']+$dataSpbu1_Motor2_08['Motorspbu2'] );
    }

    while ($dataSpbu1_Motor3 = mysqli_fetch_assoc($result_motorSpbu3)) {

    	array_push($data,$dataSpbu1_Motor3['Motorspbu3'] );
    }

    while ($dataSpbu1_Motor4 = mysqli_fetch_assoc($result_motorSpbu4)) {

    	array_push($data,$dataSpbu1_Motor4['Motorspbu4'] );
    }

    while ($dataSpbu1_Motor5 = mysqli_fetch_assoc($result_motorSpbu5)) {

    	array_push($data,$dataSpbu1_Motor5['Motorspbu5'] );
    }
    // end


    echo json_encode($data);
?>