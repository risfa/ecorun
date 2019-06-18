<?php
session_start();
require('connection.php');

$name = $_POST['nama'];
$name = mysql_real_escape_string($name);
$name = htmlspecialchars($name);

$phone = $_POST['phone'];
$phone = mysql_real_escape_string($phone);
$phone = htmlspecialchars($phone);

$email = $_POST['email'];
$email = mysql_real_escape_string($email);
$email = htmlspecialchars($email);

$tanggal_lahir = $_POST['tanggal_lahir'];
$tanggal_lahir = mysql_real_escape_string($tanggal_lahir);
$tanggal_lahir = htmlspecialchars($tanggal_lahir);

$gender = $_POST['gender'];
$gender = mysql_real_escape_string($gender);
$gender = htmlspecialchars($gender);

$Cigerate = $_POST['cigerate'];
$Cigerate = mysql_real_escape_string($Cigerate);
$Cigerate = htmlspecialchars($Cigerate);

$lainnya = $_POST['rokok_lainnya'];
$lainnya = mysql_real_escape_string($lainnya);
$lainnya = htmlspecialchars($lainnya);

$cigerFinal = '';
$category = $_POST['category'];
$category = mysql_real_escape_string($category);
$category = htmlspecialchars($category);

// if(empty($lainnya)){
// 	$cigerFinal = $Cigerate;
// }else{
// 	$cigerFinal = $lainnya;
// }

if(!empty($Cigerate)){
	$Smoker = "Yes";
}else{
	$Smoker = "No";
}
$spg_id = $_SESSION['logged_in']['id'];

function genRandStr(){
  $a = $b = $c = '';

  for($i = 0; $i < 2; $i++){
    $a .= chr(mt_rand(65, 90)); // see the ascii table why 65 to 90.
    $c .= chr(mt_rand(65, 90)); // see the ascii table why 65 to 90.
  }

  for($x = 0; $x < 3; $x++){
    $b .= mt_rand(0, 9);
  }
  return $a . $b . $c;
}

resuffle_unique_code :

$unique_code = genRandStr();
$sql_cek_unique_code = mysqli_query($conn, "SELECT COUNT(id) FROM tb_users WHERE unique_code = '$unique_code'");
$cek_unique_code = mysqli_fetch_array($cek_unique_code);
if($cek_unique_code[0]>0){
  goto resuffle_unique_code;
}else{
 
  $masuk_registrasi = mysqli_query($conn,"INSERT INTO tb_users(id,NamaLengkap,gender,email,tanggal_lahir,phone,merokok,nama_rokok,category,spg_id,unique_code) VALUES(NULL,'$name','$gender','$email','$tanggal_lahir','$phone','$Smoker','$Cigerate','$category','$spg_id','$unique_code')");
    if($masuk_registrasi == TRUE){
    $last_id = mysqli_insert_id($conn);
?>
    <script type="text/javascript">
      alert('Thanks for participating in this Event!')
      // window.location.href = 'regist_2.php';
    </script>
<?php
echo "INSERT INTO tb_users(id,NamaLengkap,gender,email,tanggal_lahir,phone,merokok,nama_rokok,category,spg_id,unique_code) VALUES(NULL,'$name','$gender','$email','$tanggal_lahir','$phone','$Smoker','$Cigerate','$category','$spg_id','$unique_code')";
    }
}
?>
