<?php
// memanggil file config.php
// include "dbconnect.php";
require 'dbconnect.php';
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
//EDIT
if(isset($_GET['edit'])){
  $sqledit = mysql_query("SELECT * FROM tb_login WHERE id ='$_GET[edit]'");
  $Data = mysql_fetch_array($sqledit);
}
//DELETE
if(isset($_GET['delete'])){
  $sqldelete = mysql_query("DELETE FROM tb_login WHERE id ='$_GET[delete]'");

  if($sqldelete){
    echo "<script>alert('yes')</script>";
    echo"<script>document.location.href='index.php?menu=spg'</script>";
  }else{
    echo "<script>alert('no')</script>";
    echo"<script>document.location.href='index.php?menu=spg'</script>";


  }
}
?>
<body>
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
      <center><h2>Database SPG</h2></center>
      <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_spbu.php" style="margin-top: 20px;">
        <input type="hidden" name="id_spbu" value="<?php echo $Data[0]?>">

          <div id="temp_image"></div>
              <!--   <input class="form-control" type="text" name="idHadiah" placeholder="idHadiah"  required="">
                <br> -->
                <input class="form-control" type="text" name="nomor_spbu" placeholder="Username" required="" value="<?php echo $Data['username']?>">
                <br>
                <input  class="form-control" type="text" name="alamat_spbu" placeholder="Nama SPG" required="" value="<?php echo $Data['nama']?>">
                <br>
                <!-- <input  class="form-control" type="text" name="kota" placeholder="kota" required="" value="<?php echo $Data['kota']?>"> -->
                <br>
                <?php if($_GET['edit']){ ?>
                <input type="submit" name="update" class="btn btn-success" value="Update">
                <a href="index.php?menu=spg" class="btn btn-success">Batal</a>
                <?php
              }
              else{ ?>
              <input class="btn btn-success" type="submit" name="simpan" value="SAVE" method="post">

              <?php } ?>
            </form>
          </div>
          <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
            <br><br>
            <table id="example" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID SPG</th>
                  <th>Username</th>
                  <th>Nama SPG</th>
                  <!-- <th>Kota</th> -->
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $sql = mysql_query("SELECT * FROM  tb_login");
                while($simpan = mysql_fetch_array($sql)){
                 ?>
                 <tr>
                  <td><?php echo $simpan['id'];?></td>
                  <td><?php echo $simpan['username'];?></td>
                  <td><?php echo $simpan['nama'];?></td>
                  <!-- <td><?php echo $simpan['kota']; ?></td> -->
                  <td>
                    <a href="index.php?menu=spg&edit=<?php echo $simpan['id']?>">EDIT</a>/
                    <a href="index.php?menu=spg&delete=<?php echo $simpan['id']?>">DELETE</a>

                  </td>
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
