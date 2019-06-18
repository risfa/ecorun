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

            <title>CLAS MILD</title>
            <script>
                function setCat(cat) {
                    document.getElementById("cat").value = cat;
                }
                function setValue(gender) {
                    document.getElementById("genderIsi").value = gender;
                }
                function setCiger(cigerate) {
                        document.getElementById("cigerate").value = cigerate;
                }

                function berubah(value) {
                  document.getElementById("cigerate").value = value;

                }

            </script>
</head>

<body style="background-image: url('aset/BG.jpg'); background-repeat: no-repeat; background-position: center;">
    <div style="position: fixed; color: white; right: 55px; top: 5px; background: #3f86ddde; padding: 5px; position: absolute; top: 0; right: 0; border-radius:0px 0px 0px 5px;">
        Hello, <?php echo $_SESSION['logged_in']['username']; ?> !
    </div>

    <br>
    <img src="aset/Logo-Clasmild.png" style="width:25%; margin-left: 20%;">
    <center><img src="aset/Puretaste.png" style="width: 35%;"></center>

    <br>
    <div class="container-fluid">
        <!-- Form Start here -->
        <form method="POST" action="do_regist2.php">
           <!--  <div class="row radio-group" style="margin: 0 auto;">

                <div class="col-2"></div>
                <div class="col-8">
                    <center>
                        <div class="radio mybutton col-4" onclick="setCat('Guest')" style="width:100px; height: 70px;">
                            <label>Guest</label>
                        </div>
                        <div class="radio mybutton col-4" onclick="setCat('Media')" style="width:100px; margin-left: 20px; margin-right: 20px; height: 70px;">
                            <label>Media</label>
                        </div>
                        <div class="radio mybutton col-4" onclick="setCat('Others')" style="width:100px; height: 70px;">
                            <label>Others</label>
                        </div>
                    </center>
                </div>
                <div class="col-2"></div>

            </div>
 -->

            <input type="text" value="guest" id="cat" style="width:1px; height: 1px; background: none; border: none;" name="category">
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
            <div class="form-group row">
                <div class="col-3"></div>

                <div class="col-8 row" >

                    <div class="col-1" style="background: #12669a; text-align: center;padding-top: 6px;">
                        <i style="color: white" class="fas fa-envelope"></i></div>
                    <div class="col-9" style="padding: 0">
                        <input style="border-radius:0;" type="email" class="form-control" placeholder="Email" name="email" required="">
                    </div>

                </div>

            </div>

            <!-- tanggal lahir -->
            <div class="form-group row">
                <div class="col-3"></div>

                <div class="col-8 row" >

                    <div class="col-1" style="background: #12669a; text-align: center;padding-top: 6px;">
                        <i style="color: white" class="far fa-calendar-alt"></i></div>
                    <div class="col-9" style="padding: 0">
                        <input style="border-radius:0;" type="date" class="form-control"  name="tanggal_lahir" required="">

                    </div>

                </div>

            </div>
            
              <div class="form-group row">
                <div class="col-3"></div>

                <div class="col-8 row" >



                    <div class="col-1" style="background: #12669a; text-align: center;padding-top: 6px;">
                        <i style="color: white" class="fas fa-map-marker"></i></div>
                    <div class="col-9" style="padding: 0">
                        <select class="form-control" name="kota">
                        <option value="Makassar">Makassar</option>						
                        <option value="Aceh">Aceh</option>
                        <option value="Ambon">Ambon</option>
                        <option value="Balikpapan">Balikpapan</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Bangka">Bangka</option>
                        <option value="Banjarmasin">Banjarmasin</option>
                        <option value="Batam">Batam</option>
                        <option value="Baturaja">Baturaja</option>
                        <option value="Bekasi">Bekasi</option>
                        <option value="Belitung">Belitung</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="Bima">Bima</option>
                        <option value="Bogor">Bogor</option>
                        <option value="Cirebon">Cirebon</option>
                        <option value="Denpasar">Denpasar</option>
                        <option value="Jakarta  Barat">Jakarta  Barat</option>
                        <option value="Jakarta Selatan">Jakarta Selatan</option>
                        <option value="Jakarta Timur">Jakarta Timur</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Karawang">Karawang</option>
                        <option value="Kendari">Kendari</option>
                        <option value="Kudus">Kudus</option>
                        <option value="Lampung">Lampung</option>
                        <option value="Luwuk">Luwuk</option>
                        <option value="Madiun">Madiun</option>
                        <option value="Magelang">Magelang</option>
                        <option value="Makasar">Makasar</option>
                        <option value="Malang">Malang</option>
                        <option value="Manado">Manado</option>
                        <option value="Mataram">Mataram</option>
                        <option value="Medan">Medan</option>
                        <option value="Padang">Padang</option>
                        <option value="Padang Sidempuan">Padang Sidempuan</option>
                        <option value="Palembang">Palembang</option>
                        <option value="Palu">Palu</option>
                        <option value="Pamekasan">Pamekasan</option>
                        <option value="Pare - Pare">Pare - Pare</option>
                        <option value="Pekanbaru">Pekanbaru</option>
                        <option value="Pematang Siantar">Pematang Siantar</option>
                        <option value="Pontianak">Pontianak</option>
                        <option value="Purwokerto">Purwokerto</option>
                        <option value="Rengat">Rengat</option>
                        <option value="Samarinda">Samarinda</option>
                        <option value="Semarang">Semarang</option>
                        <option value="Serang">Serang</option>
                        <option value="Solo">Solo</option>
                        <option value="Subang">Subang</option>
                        <option value="Sukabumi">Sukabumi</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Tangerang">Tangerang</option>
                        <option value="Tarakan">Tarakan</option>
                        <option value="Tasik">Tasik</option>
                        <option value="Tegal">Tegal</option>
                        <option value="Ternate">Ternate</option>
                        <option value="Tulung Agung">Tulung Agung</option>
                        <option value="Yogya">Yogya</option>
                    </select>
                    </div>

                </div>

            </div>



            <!-- gender -->
            	<center style="color: white; margin: 5px;">Select gender:</center>
            <div class="row radio-group">

                <div class="col-4"></div>
                <div class="col-4">
                    <center>
                        <div class="mybutton radio " onclick="setValue('Male')" style="width:100px;  margin-right: 20px; height: 70px;  float: left;">MALE</div>

                        <div class="mybutton radio " onclick="setValue('Female')" style="width:100px;  height: 70px;  float: left;">FEMALE</div>
                        <div style="clear:both;"></div>
                    </center>
                </div>
                <div class="col-4"></div>

            </div>

            <input type="text" required="" id="genderIsi" style="width:1px; height: 1px; background: none; border: none;" value="" name="gender">

            <!-- smoke -->
            <center style="color: white;  margin: 5px;">Are you smoker?</center>
            <div class="row radio-group">

                <div class="col-4"></div>
                <div class="col-4">
                    <center>
                        <div class="mybutton radio" onclick="show_modal()" id="show" style="width:100px; line-height: 50px; margin-right: 20px; height: 70px;  float: left;"><i style="font-size: 1.6rem" data-value="smoker" class="fas fa-smoking"></i></div>

                        <div class="mybutton radio " onclick="hide_modal()" style="width:100px; line-height: 50px; height: 70px;  float: left;"><i style="font-size: 2rem" class="fas fa-smoking-ban"></i></div>

                        <div style="clear:both;"></div>
                    </center>
                </div>
                <div class="col-4"></div>

            </div>

            <div class="row radio-group" style="display: none;">
                <div class="col-3"></div>
                <div class="col-1 radio" onclick="show_modal()" id="show" style="background:#12669a;padding-top: 1%;padding-left: 15px;padding-bottom: 1%;"><i style="font-size: 1.6rem" data-value="smoker" class="fas fa-smoking"></i></div>
                <div class="col-4"></div>
                <div class="col-1 radio" onclick="hide_modal();" style="background: lightpink;padding-top: 1%;padding-left: 15px;padding-bottom: 1%;"><i style="font-size: 1.6rem" data-value="non-smoker" class="fas fa-smoking-ban"></i></div>

            </div>
            <div id="modal">
                <div class="row radio-group">
                    <div class="col-2"></div>
                    <div class="col-2 radio mybutton" onclick="setCiger('ClasMild')" style="padding-top: 1%;padding-bottom: 1%; height: 70px; text-align: center; margin: 2px;">
                        <label>Clas Mild</label>
                    </div>

                    <div class="col-2 radio mybutton" onclick="setCiger('A_mild')" style="padding-top: 1%;padding-bottom: 1%; height: 70px; text-align: center; margin: 2px;">
                        <label>A Mild</label>
                    </div>

                    <div class="col-2 radio mybutton" onclick="setCiger('dunhill_mild')" style="padding-top: 1%;padding-bottom: 1%; height: 70px; text-align: center; margin: 2px;">
                        <label>Dunhill Mild</label>
                    </div>

                    <div class="col-2 radio mybutton" onclick="setCiger('LA_bold')" style="padding-top: 1%;padding-bottom: 1%; height: 70px; text-align: center; margin: 2px;">
                        <label>LA Bold</label>
                    </div>
                    <div class="col-2"></div>

                    <div class="col-2 radio mybutton" onclick="setCiger('gg_surya')" style="padding-top: 1%;padding-bottom: 1%; height: 70px; text-align: center; margin: 2px;">
                        <label>GG Surya</label>
                    </div>

                    <div class="col-3 radio mybutton" onclick="setCiger('marlboro')" style="padding-top: 1%;padding-bottom: 1%; height: 70px; text-align: center; margin: 2px;">
                        <label>Marlboro Red/Gold</label>
                    </div>

                    <div class="col-3 radio mybutton" style="background:#12669a;padding-top: 1%;padding-bottom: 1%; margin: 2px;">
                        <input s oninput ="berubah(this.value)" class="form-control text_lainnya lainnya_style" placeholder="lainnya" type="text" >
                    </div>

                </div>


                <input type="text" style="width:1px; height: 1px; background: none; border: none;"  id="cigerate" name="cigerate">

            </div>

    </div>
    </div>

    <center>
      <br>
        <input type="submit" name="submit" class="btn btn-primary" style="width: 40%; margin-top: 10px;" value="REGISTER">
        <br>
        <font style="color: white;"><center>POWERED By LimaDigit</center></font>
    </center>
    </form>
    </div>
    <div style="position: fixed;bottom: 30px;z-index: -1;">
    	<img class="img-fluid" src="aset/Peringatan.png">


    </div>

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
