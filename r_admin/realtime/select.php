<?php
 $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_classmild_roadshow");  
 $output = '';
 $sql = "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC";
 $result = mysqli_query($connect, $sql);
 $output .= '
      <div class="table-responsive" id="example">
           <table class="table table-bordered">
                <tr>
                     <th width="10%">Id</th>
                     <th width="40%">Hadiahnya</th>
                     <th width="40%">Tanggal Transaksi</th>
                     <th width="40%">Nominal Belanja</th>
                     <th width="40%">penangung jawab</th>
                </tr>';
 if(mysqli_num_rows($result) > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr>
                     <td>'.$row["id_transaksi"].'</td>
                     <td class="first_name" data-id1="'.$row["id_transaksi"].'" contenteditable>'.$row["hadiahnya"].'</td>
                     <td class="first_name" data-id1="'.$row["id_transaksi"].'" contenteditable>'.$row["tanggal_transaksi"].'</td>
                     <td class="first_name" data-id1="'.$row["id_transaksi"].'" contenteditable>'.$row["nominal_belanja"].'</td>
                     <td class="first_name" data-id1="'.$row["id_transaksi"].'" contenteditable>'.$row["penanggung_jawab"].'</td>
                </tr>
           ';
      }
      $output .= '
           <tr>
                <td></td>
                <td id="first_name" contenteditable></td>
                <td id="last_name" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
           </tr>
      ';
 }
 else
 {
      $output .= '<tr>
                          <td colspan="4">Data not Found</td>
                     </tr>';
 }
 $output .= '</table>
      </div>';
 echo $output;
 ?>
