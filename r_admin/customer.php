<?php
// memanggil file config.php
// include "dbconnect.php";
require 'dbconnect.php';
?>
<html>
<head>
  <title>Lihat customer luckyfriday</title>
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>
  <div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
    <center><h2>FORM Input Customer</h2></center>
     <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_customer.php" style="margin-top: 20px;">
            <div>

                <div id="temp_image"></div>
              <!--   <input class="form-control" type="text" name="idHadiah" placeholder="idHadiah"  required="">
                <br> -->
                <input class="form-control" type="text" name="nama_customer" placeholder="Username" required="">
                <br>
                <input  class="form-control" type="text" name="no_hp" placeholder="No Hp" required="">
                <br>
                <input class="btn btn-success" type="submit" name="simpan" value="submitCust" method="post">
                </center>
            
        </form> 
  </div>
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"></div>
  </div>
<div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 50px;">
       <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id_customer</th>
                <th>nama_customer</th>
                <th>no_hp</th>
                <!-- <th>edit/delete</th> -->
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>id_customer</th>
                <th>nama_customer</th>
                <th>no_hp</th>
                <!-- <th>edit/delete</th> -->
            </tr>
        </tfoot>
        <tbody>
        <?php
        $sql = mysql_query("SELECT * FROM  tb_customer");
       while($query = mysql_fetch_array($sql)){

        ?>
          <tr>
                <td><?php echo $query['id_customer'];?></td>
                <td><?php echo $query['nama_customer'];?></td>
                <td><?php echo $query['no_hp'];?></td>

          </tr>
        <?php }?>
        </tbody>
    </table>
  </div>
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
</html>