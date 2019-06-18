<?php
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_classmild_roadshow");
 $output = '';
 $sql = "SELECT * FROM tb_users  ORDER BY id DESC LIMIT 10";
 $result = mysqli_query($connect, $sql);
 $num_rows = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(*) FROM tb_users  ORDER BY id DESC"));
 $output .= '<p> Total Pengunjung = '.$num_rows[0].' </p>';
 $output .= '
      <div class="col-md-7">
           <table class="table table-bordered">
                <tr>
                     <th width="10%">Nama Lengkap</th>
                     <th width="10%">email</th>
                     <th width="40%">phone</th>
                     <th width="40%">hadiah</th>
                     <th width="40%">Nama Hadiah</th>
                </tr>';

 if(mysqli_num_rows($result) > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
           $output .= '<tr>'.
                     '<td class="first_name">'.$row["NamaLengkap"].'</td>'.
                     '<td class="first_name">'.$row['email'].'</td>'.

                     '<td class="first_name">'.$row['phone'].'</td>'.

                     '<td class="first_name">'.$row["hadiah"].'</td>'.
                     '<td class="first_name">'.$row["nama_hadiah"].'</td>';
                      // <td class="first_name" data-id1="'.$row["id_transaksi"].'" contenteditable>'.number_format($row['nominal_belanja'],0,".",".").'</td>
                      // <td class="first_name" data-id1="'.$row["id_transaksi"].'" contenteditable>'.$row['jenis_kendaraan'].'</td>
                      // $output .= '<td><a target="blank" href="../assets/strukBBM/'.$row['id_transaksi'].'.jpg"><img style="height: 50px; width:50px;" src="../assets/strukBBM/'.$row['id_transaksi'].'.jpg"></a></td>';



            $output .= '</tr>';
      }

 }
 else
 {
      $output .= '<tr>
                          <td colspan="7">No Transaction Available</td>
                     </tr>';
 }
 $output .= '</table>
      </div>';
 echo $output;
 ?>
