<?php
  require('connection.php');
  $username = $_POST['username'];
  $password = $_POST['password'];

  $login = mysqli_query($conn,"SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'");
  if(mysqli_num_rows($login) <=0){
    echo '<script>alert("username atau password salah")
    window.location.href = "index.php";
    </script>';

  }else{
    $log = mysqli_fetch_array($login);
    session_start();
    $_SESSION['logged_in'] = [
        'id' => $log['id'],
        'username' => $username,
        'password' => $password,
        'nama' => $log['nama'] 
    ];
    echo '<script>   
    window.location.href = "regist_2.php"; </script>';
  }
 ?>