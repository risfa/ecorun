<?php
// memanggil file config.php
// include "dbconnect.php";
require 'dbconnect.php';
?>
<html>
<head>
    <title>Lihat admin luckyfriday</title>
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
//EDIT 
  if(isset($_GET['edit'])){
    $sqledit = mysql_query("SELECT * FROM tb_admin WHERE id_admin ='$_GET[edit]'");
    $Data = mysql_fetch_array($sqledit);
    }
//DELETE
    if(isset($_GET['delete'])){
      $sqldelete = mysql_query("DELETE FROM tb_admin WHERE id_admin ='$_GET[delete]'");

      if($sqldelete){
        echo "<script>alert('yes')</script>";
        echo"<script>document.location.href='index.php?menu=manage_admin'</script>";
      }else{
        echo "<script>alert('no')</script>";
        echo"<script>document.location.href='index.php?menu=manage_admin'</script>";

      
    }
  }
 ?>
<body>
  <div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
    <center><h2>FORM Input ADMIN</h2></center>
     <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_admin.php" style="margin-top: 20px;">
      <input type="hidden" name="id_admin" value="<?php echo $Data[0]?>">
            <div>

                <div id="temp_image"></div>
              <!--   <input class="form-control" type="text" name="idHadiah" placeholder="idHadiah"  required="">
                <br> -->
                <input class="form-control" type="text" name="username" placeholder="Username" required="" value="<?php echo $Data['username']?>">
                <br>
                <input  class="form-control" type="text" name="password" placeholder="Password" required="" value="<?php echo $Data['password']?>">
                <br>
                <select name="kategori" class="form-control" value="<?php echo $Data['kategori']?>">
                            <option>Kategori</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                <br>
                <?php if($_GET['edit']){ ?>
                <input type="submit" name="update" class="btn btn-success" value="Update">
                <a href="index.php?menu=manage_admin" class="btn btn-success">Batal</a>
                <?php 
                  }
                 else{ ?>
                 <input class="btn btn-success" type="submit" name="simpan" value="submitCust" method="post">
                
                <?php } ?>           
        </form> 
  </div>
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"></div>
  </div>
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 50px;">
        <table id="example" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Id Admin</th>
              <th>Username</th>
              <th>Password</th>
              <th>Kategori</th>
              <th>Edit/Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = mysql_query("SELECT * FROM  tb_admin");
            while($simpan = mysql_fetch_array($sql)){
             ?>
            <tr>
              <td><?php echo $simpan['id_admin'];?></td>
              <td><?php echo $simpan['username'];?></td>
              <td><?php echo $simpan['password'];?></td>
              <td><?php echo $simpan['kategori'] ?></td>
              <td>
                <a href="index.php?menu=manage_admin&edit=<?php echo $simpan['id_admin']?>">EDIT</a>/
                <a href="index.php?menu=manage_admin&delete=<?php echo $simpan['id_admin']?>">DELETE</a>

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