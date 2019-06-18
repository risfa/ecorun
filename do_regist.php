<?php
session_start();
require('connection.php');

$name = $_POST['nama'];
// $name = mysql_real_escape_string($name);
// $name = htmlspecialchars($name);

$phone = $_POST['phone'];
// $phone = mysql_real_escape_string($phone);
// $phone = htmlspecialchars($phone);

// $email = $_POST['email'];
$email = 'mail@mail.net';
// $email = mysql_real_escape_string($email);
// $email = htmlspecialchars($email);


$instagram = $_POST['instagram'];
// $instagram = mysql_real_escape_string($instagram);
// $instagram = htmlspecialchars($instagram);



$masuk_registrasi = mysqli_query($conn,"INSERT INTO tb_users(id,NamaLengkap,email,phone,instagram_id,checked,hadiah,nama_hadiah,attendance,spg_id,unique_code) VALUES(NULL,'".$name."','".$email."','".$phone."','".$instagram."','','N','','Y','$_SESSION[id]','1')");
	if($masuk_registrasi){
		$last_id = mysqli_insert_id($conn);

?>
	<script type="text/javascript">
		alert('Thanks for participating in this Event!')
		window.location.href = 'fortune.php?idtrx=<?php echo $last_id; ?>';
		// window.location.href = 'raffle.php?idtrx=<?php echo $last_id; ?>';
	</script>
<?php
	}
?>
