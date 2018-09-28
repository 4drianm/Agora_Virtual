<?php
  include('connect.php');
  session_start();
  
  $user_check = $_SESSION['login_user'];
  
  $sql = "SELECT id_vendedor, nombre_vendedor from vendedores where mail ='$user_check'";
  $result = mysqli_query($link, $sql);
  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
  $id = $_SESSION['id_usr'];          
  $usr = $_SESSION['nombre_usr'];

  if(!isset($_SESSION['login_user'])){
    header("location:login.php");
  }
?>