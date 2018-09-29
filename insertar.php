<?php
	include('connect.php');

	$producto = $_POST['product'];
//echo ("<script>console.log('producto: ".$producto."');</script>");
	$categoria = $_POST['category'];	
	$precio = $_POST['price'];
	$descripcion = $_POST['description'];	
	$userid = $_POST['userid'];
	
	$query = mysqli_query($link, "INSERT INTO productos (nombre, precio, descripcion, id_vendedor, id_categoria) 
				VALUES ('$producto', $precio, '$descripcion', $userid, $categoria)");
	
	if($query){
		header("Location:usr.php");
		echo ("<script>console.log('Producto agregado');</script>");
	}else{
		echo ("<script>console.log('Producto NO agregado');</script>");
	}
	
	mysqli_close($link);
?> 