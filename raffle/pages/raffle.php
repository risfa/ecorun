<?php include('conn.php');?>

<?php   
$nama_table = "tb_users";
$getprize="";  
if(isset($_GET['prize'])){
  $getprize = $_GET['prize'];
}

$datahadiah = "SELECT * FROM hadiah WHERE hadiah_id = '$getprize'";
$resbarang = $sql->query($datahadiah);
$data_hadiah = $resbarang->fetch_row();

  $mainbelakang = "";//mabel = main belakang, digunakan bagi yang mau main belakang, cukup tuliskan ID Peserta (AI)
  
  if(isset($_GET['mabel'])){
    $mainbelakang = "AND id = '$_GET[mabel]'";
    $sqlwinner = ("SELECT * FROM $nama_table  WHERE checked = 'N' AND attendance = 'Y' ".$mainbelakang."  LIMIT 1");
  }else{
    $sqlwinner = ("SELECT * FROM $nama_table  WHERE unique_code != ' ' AND phone != '-' AND checked != 'Y' AND attendance = 'Y'   ORDER BY RAND() LIMIT 1");
  }
  
  $result = $sql->query($sqlwinner);
  // var_dump($result);
  $show_data = $result->fetch_row();

  if(isset($_POST['reshuffle'])){
    $update = ("UPDATE $nama_table SET checked = 'Y' WHERE id = '$_POST[kode]'");
    $sql->query($update);
    echo "<script>document.location.href='index.php?prize=$_GET[prize]'</script>";
  }

  if(isset($_POST['get_prize'])){
    $update = ("UPDATE $nama_table SET checked = 'Y', hadiah = 'Y', nama_hadiah='$data_hadiah[1]' WHERE id = '$_POST[kode]'");
    $jumlah_hadiah = $data_hadiah[2] -1;
    $update_barang = "UPDATE hadiah SET jumlah = '$jumlah_hadiah' WHERE hadiah_id = '$data_hadiah[0]'";
    $sql->query($update);
    $sql->query($update_barang);
    echo "<script>document.location.href='index.php?prize=$_GET[prize]'</script>";
  }

  if(empty($_GET['prize'])){
    $query = ("SELECT * FROM hadiah WHERE jumlah > 0 ORDER BY hadiah_id ASC");
    $result = $sql->query($query);
    $data = mysqli_fetch_array($result,MYSQLI_NUM);
    echo "<script>document.location.href='index.php?prize=$data[0]'</script>";

  }



  ?>

  <br>

  <div class="container-fluid" style="width: 100%; margin: 0 auto;">
    <center>
      <div><img src="images/Classmild-revisi_0002_Logo-Clasmild.png" alt="" style="height: 80px; margin-left: -13vw"></div>
      <div><img src="images/Classmild-revisi_0001_Puretaste.png" alt="" style="height: 100px;"></div>
    </center>
    <br>
    <div class="col-md-12">

      <div style="background-color:lightgray; opacity: 70%; border-radius: 10px; width: 96%; height: 200px; position: absolute; z-index: 9999999;" id="StartScreen"><br>
        <center>
          <div onclick="show_prize_panel();" style="color: black; font-size: 50px;">
            <center style="font-weight: bold;"><?php echo $data_hadiah[2]." Unit ".$data_hadiah[1];  ?>
              <div style="display: none;" id="prizeDivision">
                <?php 
                if(isset($_POST['prizeSelector'])){
                  $prizenya = $_POST['prizeSelector'];
                  echo "<script>document.location.href='index.php?prize=$prizenya'</script>";
                }
                ?>
                <form method="post">
                  <select name="prizeSelector" onchange="submit()" required="">
                    <option>SELECT PRIZE</option>
                    <?php 
                    $sqlnya = mysqli_query($sql,"SELECT * FROM hadiah WHERE jumlah > 0 ORDER BY hadiah_id");
                    while($data = mysqli_fetch_array($sqlnya,MYSQLI_NUM)){
                      echo "<option value='$data[0]'>$data[0] - $data[1] - $data[2]</option>";
                    }
                    ?>
                  </select>
                </form>
              </div>
            </center>
          </div>
        </center>


        <center>
          <button type="button" class="btn btn-default goldButton" id="btnStart" style=" margin-top: 10%; z-index: 99999; width: 20%; background: lightblue " onclick="start_ruffle()"   >START</button>



        </center>



      </div>
      

      <div class="widget-content padded" id="PanelShuffleResult" style="display: none; background-color:white; opacity: 70%; border-radius: 10px; width: 96%; height: 200px;  z-index: 9999999;">
        <div class="row">
          <div class="col-md-12">

          </div>
        </div>
        <center>
          <div style="text-transform: uppercase ; font-size: 2vw;"><?php echo $show_data[1]." <br> ".$show_data[13]?></div>
          <!-- <div style="text-transform: uppercase ; font-size: 1.5vw;"><?php echo $show_data[3] ?></div> -->
          <font style="font-size: 20px;"><?php echo " 1 Unit ".$data_hadiah[1];  ?></font>

        </center>
      </div>

      <div class="widget-content padded" id="PanelShuffle" style=" background-color:white; color: black; border-radius: 10px; width: 96%; height: 200px;  z-index: 9999999;">



        <center>
          <div class="textsbox2" id="textbsox2" style="text-transform: uppercase ; font-size: 1px; color: black;">A</div><br>
          <div class="textbox" id="textbox" style="text-transform: uppercase ; font-size: 50px; "></div>
          <div class="textbox2" id="textbox2" style="text-transform: uppercase ; font-size: 50px; margin-top: -30px;"></div>
        </center>
        <center id="tombolStop" style="display: none; margin-top: 20px; margin-top: 5%; z-index: 99999; width: 100%;">
          <?php if($_GET['prize']){?>
          <br>
          <button id="btnStop" class="btn  goldButton" onclick="stop()" style="width:50%; background: lightblue;">STOP </button>
          <?php } ?>
        </center>
      </div>
    </div>
  </div>

  <center>
  </center>
  <br><br>

  <center id="tombolReRaffle" style="display: none;">
    <form method="post" >
      <input type="hidden" name="kode" value="<?php echo $show_data[0]; ?>">
      <input type="hidden" name="prize" value="<?php echo $_GET['prize']; ?>">
      <input style="background: lightblue" type="submit" onclick="return confirm('Are You Sure? To Give the Prize?')" value="GET THE PRIZE!" class="btn  goldButton2" name="get_prize">
      <input style="background: lightblue" type="submit" onclick="return confirm('Are You Sure to reshuffle?')" value="RAFFLE AGAIN" class="btn  goldButton" name="reshuffle">
    </form>
  </center>

  <br>          
  <br>          
  <br>          
  <br><center>
          <div style="width: 100%; background: #000; height: 100px;">
            <img src="images/Classmild-revisi_0000_Peringatan.png" style="height:100%;" alt="">
          </div>
          </center>


  <script type='text/javascript'>
    <?php
    $query = "SELECT SUBSTRING(`NamaLengkap`, 1, 16) FROM $nama_table WHERE attendance = 'Y' AND checked != 'Y' LIMIT 200";
    $query2 = "SELECT unique_code FROM $nama_table WHERE unique_code != '' AND attendance = 'Y' AND checked != 'Y' LIMIT 200";

    $result = $sql->query($query);     
    if (!$result) {
      printf("Query failed: %s\n", $mysqli->error);
      exit;
    }      
    while($row = $result->fetch_row()) {
      $rows[]=$row;
    }

    $result->close();
    $oneDimensionalArray = array_map('current', $rows);
    $arrayVal = array_values($oneDimensionalArray);

    $php_array = $arrayVal;
    $js_array = json_encode($php_array);

    echo "var words = ". $js_array . ";\n";


    $result2 = $sql->query($query2);     
    if (!$result2) {
      printf("Query failed: %s\n", $mysqli->error);
      exit;
    }      
    while($row2 = $result2->fetch_row()) {
      $rows2[]=$row2;
    }

    $result2->close();
    $oneDimensionalArray2 = array_map('current', $rows2);
    $arrayVal2 = array_values($oneDimensionalArray2);

    $php_array2 = $arrayVal2;
    $js_array2 = json_encode($php_array2);

    echo "var words2 = ". $js_array2 . ";\n";

    ?>
  </script>

  <script type="text/javascript">
    var getRandomWord = function () {
      return words[Math.floor(Math.random() * words.length)];
    };
$(function() { // after page load
  setInterval(function(){
    $('.textbox').fadeOut(10, function(){
      $(this).html(getRandomWord()).fadeIn(10);
    });
    // 5 seconds
  }, 10);
});

var getRandomWord2 = function () {
  return words2[Math.floor(Math.random() * words2.length)];
};
$(function() { // after page load
  setInterval(function(){
    $('#textbox2').fadeOut(10, function(){
      $(this).html(getRandomWord2()).fadeIn(10);
    });
    // 5 seconds
  }, 10);
});



function show_prize_panel(){
  document.getElementById('prizeDivision').style.display = 'block';
}
function stop(){
  document.getElementById('PanelShuffle').style.display = 'none';
  document.getElementById('PanelShuffleResult').style.display = '';
  document.getElementById('tombolStop').style.display = 'none';
  document.getElementById('tombolReRaffle').style.display = 'block';

    // document.location.href='index.php?menu=3&prize'
  }

  function start_ruffle(){
    document.getElementById('StartScreen').style.display = 'none';
    document.getElementById('btnStart').style.display = 'none';
    document.getElementById('tombolStop').style.display = 'block';

  }
</script>



<style type="text/css">
#PanelShuffleResult{
  color:black;
  background-repeat: no-repeat;
  background-size: 100%;
}
.goldButton{
  background:none; color:black; border: 1px solid gold;
}
.goldButton:hover{
  background:gold; color:black; border: 1px solid gold;
}
.goldButton2{
  background:none; color:black; border: 1px solid gold;
  z-index: 9999;
}
.goldButton2:hover{
  background:gold; color:black; border: 1px solid gold;
}
</style>