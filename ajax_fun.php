<?php
  if ($_POST['action'] == "contactar") {
    $numero = $_POST['numero_vendedor'];
  
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

    // check if is a mobile
    if ($iphone || $android || $palmpre || $ipod || $berry == true) {
      echo "https://wa.me/$numero?text=Hola%20me%20interesa%20un%20";
    }
    else {
      echo "https://web.whatsapp.com/send?phone=$numero&text=Hola%20me%20interesa%20un%20";
    } 
  } 
  
  if($_POST['action'] == "borrar"){
    include("connect.php");

	  $producto = $_POST['id_producto'];
	  $query = mysqli_query($link, "DELETE FROM productos WHERE id_producto = '$producto'");

	  	if($query){
	  		echo "Record deleted";
	  	}else{
	  		echo "No records to delete";
	  	}
	  mysqli_close($link);
  }
?>
