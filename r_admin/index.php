<?php
session_start();
?>

<?php
require 'dbconnect.php';

if(!$_SESSION['username']){
  include('Login.php');
}else{
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <title>ADMIN CLASSMILD</title>
  <head>
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>

    <div class="container">
      <?php
      include("topnav.php");
      switch ( $_GET['menu'] ) {
        case 'peserta':
        include('peserta.php');
        break;
        case 'hadiah':
        include('hadiah.php');
        break;
        case 'customer':
        include('customer.php');
        break;
        case 'spg':
        include('spg.php');
        break;
        case 'manage_admin':
        include ('manage_admin.php');
        break;
        case'graph';
        include('graph.php');
        break;
        case'live_track';
        include('realtime/index.php');
        break;
        case'live_track2';
        include('realtime2/index.php');
        break;
        case'detail_information';
        include('detail_information/index.php');
        break;
        case 'bargraph':
          include('bargraph.php');
          break;
        case 'logout':
        session_destroy();
          echo "<script>document.location.href='index.php'</script>";
        break;
      }
    }
    ?>
  </div>
</body>

<script src="js/bootstrap.min.js"></script>
</body>
<style type="text/css">
body {
  overflow-x: hidden;
  overflow-y: auto;
}
</style>
</html>
