<!DOCTYPE html>
<html>
<head>
  <?php 
    include('header.php'); 
  ?>
</head>
<body style="background-image: url('../aset/Background_mobile.png'); background-repeat: no-repeat; background: lightgray>

<div class="container" >
 
  <div class="row">
    <?php 
    // echo php_info();
    // phpinfo();
    // error_reporting();
      if(isset($_GET['menu'])){
        switch ($_GET['menu']) {
          
          default:
            include('pages/raffle.php');
            break;
          case 1:
            include('pages/attendance.php');
            break;
          case 2:
            include('pages/counters.php');
            break;
        }
      }else{
            include('pages/raffle.php');
      }
    ?>
  </div>

</div>
<div style="height: 10px;  background-color: blue; position: fixed; bottom:  0; left: 0;">150</div>
</body>
</html>