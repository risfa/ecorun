<?php  

function convert_to_rupiah($angka)
  {
    return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
  }


 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_classmild_talkshow");  
 $output = '';  


 $sql2 = "SELECT * FROM tb_spbu WHERE status = '1'";

 $result2 = mysqli_query($connect,$sql2);
 while ($data = mysqli_fetch_array($result2)) {
// kotak paling atas

  $total_jumlah_awal=0;
$total_jumlah_hadiah=0;
$total_sisa_hadiahnya = 0;
  $output .= '<div class="col-md-6" style="border: 1px solid #BABABA; margin-top: 20px;"><br>';
$transaksi2 = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(id_transaksi),id_spbu FROM tb_transaksi WHERE id_spbu = '$data[0]' AND hadiahnya != ''"));
 $new_transaksi = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(id) FROM tb_transaksi_log WHERE id_spbu = '$data[0]'"));
 /*$output.= " <span style='padding:5px; background:red; color:white;' onclick=test('" .$transaksi2['id_spbu']. "')>".$new_transaksi[0]."</span> ";*/

  $output .= '<b style="font-size: 20px;">['.$data[1].']</b><span></span>
                  <p>'.$data[2].' | '.$data[5].'</p>
                  <hr>
                    <table style="width: 100%; text-align: center; margin-top: -20px;">
                    <tr style="font-size: 50px; font-weight: bold;">
                      <td>';
                            $hadiah_awal = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(total_awal) FROM tb_hadiah WHERE id_spbu = '$data[0]'"));
                          
                            $output .= $hadiah_awal[0];
         $output .= '</td>';
         $output .= ' <td>';

                            $transaksi = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(id_transaksi),id_spbu FROM tb_transaksi WHERE id_spbu = '$data[0]' AND hadiahnya != ''"));
                            // $new_transaksi = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(id) FROM tb_transaksi_log WHERE id_spbu = '$data[0]'"));
                            

                            $output.= $transaksi[0];
                             // $output.= "<label style='cursor:pointer' onclick=disAktif('" . $hadiahnya['id_hadiah']. "')   class='label label-success'>".$hadiahnya['status_hadiah']."</label>";
        $output .=   '</td>';
        $output .= '<td>';
                     $output .=  $hadiah_awal[0] - $transaksi[0];
        $output.= '</td>
                    </tr>';
        $output .= '<tr>
                      <td>Hadiah Awal</td>
                      <td>Transaksi</td>
                      <td>Sisa Hadiah</td>
                    </tr>
                  </table><br>';
   

   // kotak di bawah
 
 $output .= '  
      <table border="1" class="table" style="width:100%;">
                    <tr style="font-weight: bold; color: white; background: #BABABA">
                      <td>Hadiah</td>
                      <td>Kategori</td>
                      <td>Awal</td>
                      <td>Trx</td>
                      <td>Sisa DB</td>
                    </tr>';  
         $sql = "SELECT * FROM tb_hadiah WHERE id_spbu = '$data[0]' ";  
          $result = mysqli_query($connect, $sql);  
 
      while($hadiahnya = mysqli_fetch_array($result))  
      {  
          if($hadiahnya[5]=='1'){
            $kategori = 'Mobil';
          }else if($hadiahnya[5]=='2'){
            $kategori = 'Motor';
          }else{
            $kategori = 'Umum';
          }

              $output .= '  
                 <tr>
                      <td> '.$hadiahnya[0].'|'.$hadiahnya[1].' </td>
                      <td> '.$kategori.' </td>';
                      $hadiah_log = $hadiahnya['total_awal'];
                      $output.='<td>'.$hadiahnya['total_awal'].' </td>
                      <td>
           ';  
           $total_jumlah_awal += $hadiahnya['total_awal'];

             $sqljumlahhadiahtrx = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(hadiahnya) FROM tb_transaksi WHERE id_spbu = '$data[0]' AND hadiahnya = '$hadiahnya[nama_hadiah]'"));
             $total_jumlah_hadiah += $sqljumlahhadiahtrx[0];
             $output .= $sqljumlahhadiahtrx[0];
             $output.= '</td>
              <td>'.$hadiahnya['jumlah_hadiah'] .'</td>
              ';
              $total_sisa_hadiahnya += $hadiahnya['jumlah_hadiah'];

/*if($hadiahnya['jumlah_hadiah']>0){
      if($hadiahnya['status_hadiah']=='AKTIF'){
        $output.= "<label onclick=disAktif('" . $hadiahnya['id_hadiah']. "')   class='label label-success'>".$hadiahnya['status_hadiah']."</label>"; 
      }else if($hadiahnya['status_hadiah']=='DISAKTIF'){
        $output.= "<label onclick=aktif('" . $hadiahnya['id_hadiah']. "') class='label label-danger'>".$hadiahnya['status_hadiah']."</label>"; 
      }
    }else{
        $output.= "<label    class='label label-warning'>HABIS</label>"; 
    }    */
            
 
      }   

  $output .= '</tr><tr><td colspan="2">Total</td><td>'.$total_jumlah_awal.'</td><td>'.$total_jumlah_hadiah.'</td><td>'.$total_sisa_hadiahnya.'</td></tr></table>';

  $output .= '<label>Total Pembelian </label>
              <table border="1" class="table" style="width:100%;"> 
              <tr style="font-weight: bold; color: white; background: #BABABA">
                <td>Jenis Kendaraan
                </td>
                <td>Jumlah
                </td>
                <td>Total Pembelian
                </td>
              </tr>';
        $jumlah_kendaraan_motor = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(id_transaksi) FROM `tb_transaksi` where id_spbu = '$data[0]' AND jenis_kendaraan = 'Motor'"));
        $jumlah_kendaraan_mobil = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(id_transaksi) FROM `tb_transaksi` where id_spbu = '$data[0]' AND jenis_kendaraan = 'Mobil'"));
        $sum_nominal_belanja_motor = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(nominal_belanja) FROM `tb_transaksi` where id_spbu = '$data[0]' AND jenis_kendaraan = 'Motor'"));
        $sum_nominal_belanja_mobil = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(nominal_belanja) FROM `tb_transaksi` where id_spbu = '$data[0]' AND jenis_kendaraan = 'Mobil'"));

      if ($sum_nominal_belanja_mobil[0] == NULL) {

          $sum_nominal_belanja_mobil[0] = 0;
        }
        

        if ($sum_nominal_belanja_motor[0] == null) {
          $sum_nominal_belanja_motor[0] = 0;
        }

        

  $output.='<tr>
              <td>Motor
              </td>
              <td>'.$jumlah_kendaraan_motor[0].'
              </td>
              <td>'.convert_to_rupiah($sum_nominal_belanja_motor[0]).'
                </td>
            </tr>

            <tr>
              <td>Mobil
              </td>
              <td>'.$jumlah_kendaraan_mobil[0].'
              </td>
              <td>'.convert_to_rupiah($sum_nominal_belanja_mobil[0]).'
                </td>
            </tr>
            ';


              $output.='</table>';


// end

  // end kotak baru
  $output .= '</div>';
  }




 echo $output;  
 ?>
