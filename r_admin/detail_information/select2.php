<?php
$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_classmild_roadshow");
$output = '';
$transaksi_sebelumnya = 0;
   // kotak di bawah

  $output .= '
  <table border="1" class="table">
<tr style="font-weight: bold; color: white; background: #BABABA">
                      <td>Hadiah</td>
                      <td>Jumlah</td>
                      <td>Status</td>
                    </tr>';
  $sql = "SELECT * FROM hadiah ";
  $result = mysqli_query($connect, $sql);

$total_sisa_hadiahnya = 0;

  while($hadiahnya = mysqli_fetch_array($result))
  {

    $total_sisa_hadiahnya += $hadiahnya['jumlah'];
    $output .= '
    <tr>
    <td> <b>'.$hadiahnya[0].'</b>|'.$hadiahnya[1].' </td>
    <td> '.$hadiahnya[2].' </td>
    <td>
    ';

    if($hadiahnya['jumlah']>0){
      if($hadiahnya['active']==1){
        $output.= "<label onclick=disAktif('" . $hadiahnya['hadiah_id']. "')   class='label label-success'>Aktif</label>";
      }else if($hadiahnya['active']== 0){
        $output.= "<label onclick=aktif('" . $hadiahnya['hadiah_id']. "') class='label label-danger'>Tidak Aktif</label>";
      }
    }else{
        $output.= "<label    class='label label-warning'>HABIS</label>";
    }

  }


  $output .= '</td></tr><tr><td colspan="1">TOTAL</td><td>'.$total_sisa_hadiahnya.'</td></tr></table>';


// end

  // end kotak baru
  $output .= '</div>';







echo $output;
?>
