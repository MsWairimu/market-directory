<?php
session_start();
include 'connection.php';
if(isset($_SESSION['name'])){
  if($_SESSION['name'] == 'admin'){
    header("Location: dashboard.php");
  }
  else if(isset($_SESSION['isSupervisor'])){
    header("Location: ../userlogin.php");
  }
}
else{
  echo 'Login failed';
}
?>