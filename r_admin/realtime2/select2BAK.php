<?php  
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_classmild_talkshow");  
 $output = '';  
 $sql = "SELECT * FROM tb_hadiah WHERE id_spbu = '10' ";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <table border="1" class="table">
                    <tr style="font-weight: bold; color: white; background: #BABABA">
                      <td>Hadiah</td>
                      <td>Awal</td>
                      <td>Trx</td>
                      <td>Sisa DB</td>
                    </tr>';  
 
      while($hadiahnya = mysqli_fetch_array($result))  
      {  

              $output .= '  
                 <tr>
                      <td> '.$hadiahnya[1].' </td>
                      <td>'.$hadiahnya['total_awal'].' </td>
                      <td>
           ';  

             $sqljumlahhadiahtrx = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(hadiahnya) FROM tb_transaksi WHERE id_spbu = 10 AND hadiahnya = '$hadiahnya[nama_hadiah]'"));
             $output .= $sqljumlahhadiahtrx[0];
             $output.= '</td>
              <td>'.$hadiahnya['jumlah_hadiah'] .'</td>
                      <td>
              ';

               /*if($hadiahnya['status_hadiah']=='AKTIF'){
                            $output.= "<label onclick=disAktif('" . $hadiahnya['id_hadiah']. "')   class='label label-success'>".$hadiahnya['status_hadiah']."</label>"; 
                          }else{
                            $output.= "<label onclick=aktif('" . $hadiahnya['id_hadiah']. "') class='label label-danger'>".$hadiahnya['status_hadiah']."</label>"; 
                          }    */
            
 
      }   

  $output .= '</td></tr></table>';
 echo $output;  
 ?>
