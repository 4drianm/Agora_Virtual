<?php
	include('connect.php');

	$producto = $_POST['product'];

	$categoria = $_POST['category'];	
	$precio = $_POST['price'];
	$descripcion = $_POST['description'];	
	$userid = $_POST['userid'];

	$nombre_img = $_FILES['image']['name'];
	$tipo_img = $_FILES['image']['type'];
	$tam_img = $_FILES['image']['size'];

	
	if ($tam_img < 1000000) {
		if ($tipo_img=="image/jpeg" || $tipo_img=="image/jpg" || $tipo_img=="image/png" || $tipo_img=="image/gif") {
			
			//$folder = "$_SERVER['DOCUMENT_ROOT'] . '/uploads/";
			//echo $_SERVER['DOCUMENT_ROOT'];

			$folder = "/Users/Asanchez/Sites/av/uploads/";
	    move_uploaded_file($_FILES['image']['tmp_name'], $folder.$nombre_img);    
	  }
	}
	
	$query = mysqli_query($link, "INSERT INTO productos (nombre, precio, descripcion, id_vendedor, id_categoria, imagen) 
				VALUES ('$producto', $precio, '$descripcion', $userid, $categoria, 'uploads/$nombre_img' )");
	
	if($query){
		header("Location:usr.php");
		echo ("<script>console.log('Producto agregado');</script>");
	}else{
		echo ("<script>console.log('Producto NO agregado');</script>");
	}
	
	mysqli_close($link);
?> 