<!doctype html>
<?php session_start(); ?>
<html lang="en">

<head>

    <?php

  if(!isset($_SESSION['logged_in'])){
    echo '<script> alert("Login First");  window.location.href = "index.php"; </script>';
  }
   ?>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

            <title></title>
</head>

<body style="background-image: url('aset/ECO_RUN2.jpg'); background-repeat: no-repeat; background-position:center top;">
    <div style="position: fixed; color: white; right: 55px; top: 5px; background: #3f86ddde; padding: 5px; position: absolute; top: 0; right: 0; border-radius:0px 0px 0px 5px;">
        Hello, <?php echo $_SESSION['logged_in']['username']; ?> !
    </div>

    <br>
    <img src="" style="width:25%; margin-left: 20%;">
    <center><img src="" style="width: 35%;"></center>

    <br>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="container-fluid">
        <!-- Form Start here -->
        <form method="POST" action="do_regist.php">

            <br>
            <!-- name -->
            <div class="form-group row">
                <div class="col-3"></div>

                <div class="col-8 row" >

                    <div class="col-1" style="background: #12669a; text-align: center;padding-top: 6px;">
                        <i style="color: white" class="fas fa-user"></i></div>
                    <div class="col-9" style="padding: 0">
                        <input style="border-radius:0;" type="text" class="form-control" placeholder="Full Name" name="nama" required="">
                    </div>

                </div>

            </div>

            <!-- phone -->
            <div class="form-group row">
                <div class="col-3"></div>

                <div class="col-8 row" >

                    <div class="col-1" style="background: #12669a; text-align: center;padding-top: 6px;">
                        <i style="color: white" class="fas fa-phone"></i></div>
                    <div class="col-9" style="padding: 0">
                        <input style="border-radius:0;" type="Number" class="form-control" placeholder="Phone Number" name="phone" required="">
                    </div>

                </div>

            </div>

            <!-- mail -->
            <!-- <div class="form-group row">
                <div class="col-3"></div>

                <div class="col-8 row" >

                    <div class="col-1" style="background: #12669a; text-align: center;padding-top: 6px;">
                        <i style="color: white" class="fas fa-envelope"></i></div>
                    <div class="col-9" style="padding: 0">
                        <input style="border-radius:0;" type="email" class="form-control" placeholder="Email" name="email" required="">
                    </div>

                </div>

            </div> -->

            <!-- tanggal lahir -->
            <div class="form-group row">
                <div class="col-3"></div>

                <div class="col-8 row" >

                    <div class="col-1" style="background: #12669a; text-align: center;padding-top: 6px;">
                        <i style="color: white" class="fab fa-instagram"></i></div>
                    <div class="col-9" style="padding: 0">
                        <input style="border-radius:0;" type="Text" class="form-control"  name="instagram" placeholder="Your ID Instagram" required="">

                    </div>

                </div>

            </div>

              <div class="form-group row">
                <div class="col-3"></div>

                <div class="col-8 row" >


                  <center>
                    <br>
                    <center>  <input type="submit" name="submit" class="btn btn-primary" style="width: 250%; margin-top: 10px;" value="REGISTER"></center>
                      <br>
                      <font style="color: white;"><center>POWERED By LimaDigit</center></font>
                  </center>

            </div>




    </form>
    </div>
    <!-- <div style="position: fixed;bottom: 30px;z-index: -1;">
    	<img class="img-fluid" src="aset/Peringatan.png">


    </div> -->

    <!-- <font style="color:white; margin-top:3px; -webkit-transform: rotate(90deg); position: absolute; padding: 6px; margin-left: -9.5vw; float: left; font-size: 13px; background: red;  font-weight: bolder; border-radius: 5px 5px 0px 0px;">POWERED By LimaDigit</font> -->


    <div class="container-fluid" style="position: fixed; bottom: 0;">
        <div class="row">
    <a href="regist_2.php" class="col-4 " style="text-align: center;padding: 1%; background: grey "><i style="font-size: 2rem " class="fas fa-plus "></i></a>
    <a href="list.php " class="col-4 " style="text-align: center;padding: 1%; background: #dadddd "><i style="font-size: 2rem " class="fas fa-list-ul "></i></a>
    <a href="#" class="col-4 " style="text-align: center;padding: 1%;background: #dadddd "> <i  style="font-size: 2rem; " class="fas fa-sign-out-alt "></i></a>
  </div>
</div>

<style>

.mybutton{
  line-height: 55px;
  border: none;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  color: #000000;
  padding: 10px 20px;
  background: #ece6e6;
  border-radius: 10px;
  border: 1px solid #ffffff;
  box-shadow:
  0px 1px 7px rgba(15,13,15,0.9),
  inset 0px 0px 1px rgba(255,255,255,0.5);

}
.radio-group{
  position: relative;
}

.lainnya_style::placeholder{
  color: white;
}

.lainnya_style{
  margin-left: -15px;
    width: 118%;
    background: none;
    color: white;
    border-bottom: 3px solid white;
    border-top: none;
    border-left: none;
    border-right: none;
}

.radio{
  display:inline-block;
  border: 2px solid white;
  cursor:pointer;
  margin: 2px 0;
}

.radio.selected{
  background:#12669a;
  color: white;
  font-weight: bolder;
}
</style>
<script>
  $('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
    var val = $(this).attr('data-value');
    //alert(val);
    $(this).parent().find('input').val(val);
  });
  $('.radio-group .text_lainnya').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
    var val = $(this).attr('data-value');
    //alert(val);
    $(this).parent().find('input').val(val);
  });
</script>

<script>

  function show_modal(){
    $("#modal ").show();
    $("#modal ").stylesheet('display','block');

  }
  function hide_modal(){
    $("#modal ").hide();
  }

  $(document).ready(function(){
//     $("#hide ").click(function(){
  $("#modal ").hide();
//     });
//     $("#show ").click(function(){
//     });
});
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous "></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy " crossorigin="anonymous "></script>
</body>
</html>
