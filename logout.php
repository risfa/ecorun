<?php 
session_start();
session_unset('logged_in');
echo "<script> alert('Goodbye'); document.location.href = 'index.php' </script>";
?>