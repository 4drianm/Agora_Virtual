<?php
  include("connect.php");

  session_start();
  if(session_destroy()) {
    $id_ = $_SESSION['id_usr'];
		mysqli_query($link, "UPDATE vendedores SET disponibilidad = 0 WHERE id_vendedor = $id_");
    header("Location: index.php");
  }
?>
