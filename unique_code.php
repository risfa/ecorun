<!doctype html>

<?php 
  
  include('connection.php');
session_start();
  $sql_kode_unik = mysqli_query($conn,"SELECT * FROM tb_users WHERE id = '$_GET[code]'");
  $data_kode_unik = mysqli_fetch_array($sql_kode_unik);


 ?>

<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  <title>CLASS MILD LOGIN</title>
</head>
<body style="background-image: url('aset/BG.jpg'); background-repeat: no-repeat; background-position: center;">
  <br><br><br>
  <div class="container-fluid" style="margin-top: 8vh">
    <center><img class="img-fluid" width="50%" src="aset/Logo.png" style="margin-top: 50px;"></center>
    <br><br>

    <div class="" style="color:white; text-align: center">
      <center>
        <h2>Hi! <?php echo $data_kode_unik['NamaLengkap']; ?></h2>
        <h1><?php echo $data_kode_unik['unique_code']; ?></h1>
        <h3>Capture this unique code <br> Wait for the surprize! <br> Good luck</h3>
        <?php echo date('d-M-Y H:i:s')." | <font style='text-transform: uppercase; '>".$_SESSION['logged_in']['nama']."</font>"; ?>
        <br><br>
        <a href="regist_2.php"><button>BACK TO REGISTRATION FORM</button></a>
        <a href="list.php"><button>BACK TO LIST</button></a>

      </center>

    </div>
  </div>
  <div style="position: fixed;bottom: 30px;z-index: -1;">
      <img class="img-fluid" src="aset/Peringatan.png">

      
    </div>
    <!-- <font style="color:white; margin-top:3px; -webkit-transform: rotate(90deg); position: absolute; padding: 6px; margin-left: -9.5vw; float: left; font-size: 13px; background: red;  font-weight: bolder; border-radius: 5px 5px 0px 0px;">POWERED By LimaDigit</font> -->



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>