<?php
	include("connect.php");

	$producto = $_POST['producto'];
	$query = mysqli_query($link, "DELETE FROM productos WHERE id_producto = '$producto'");

		if($query){
			echo "Record deleted";
		}else{
			echo "No records to delete";
		}
	mysqli_close($link);
?>