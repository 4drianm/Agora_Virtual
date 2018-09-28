<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agora Virtual</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
  <header>
	  <div class="wrapper">
	  	<a href="index.php"><img src="img/AgoraVirtual.png" class="logo"/></a>
	  	<a href="#" class="hamburger"></a>
	  	<nav>
	  	  <ul>
	  	    <li><a href="index.php?opcion=0">Inicio</a></li> 
	  	    <li><a href="index.php?opcion=1">Bebidas</a></li>
	  	    <li><a href="index.php?opcion=2">Comida</a></li>
	  	    <li><a href="index.php?opcion=3">Dulces</a></li>
	  	    <li><a href="index.php?opcion=4">Cigarros</a></li>
	  	    <li><a href="index.php?opcion=5">Postres</a></li>
	  	  </ul>
	  		<a href="usr.php" class="login_btn">Yo Vendo</a>
	  	</nav>
	  </div>
	</header>

	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">

      <?php
      include("connect.php");      

        $option = $_GET['opcion'];
        
        if($option == 0){
          $query = mysqli_query($link, "SELECT * FROM productos INNER JOIN vendedores ON productos.id_vendedor = vendedores.id_vendedor");

            while ($row = mysqli_fetch_assoc($query)) {
            echo '<li><img src="img/food_3.jpg" class="property_img"/>
                    <span class="price">$'.$row['precio'].'</span>
                    <div class="property_details">
                    <h1>'.$row['nombre'].'</h1>
                    <p>'.$row['descripcion'].'</p>
                    <h3>'.$row['nombre_vendedor'].'</h3>
                    </div>
                  </li>';
            }
        }else{

          $query = mysqli_query($link, "SELECT * FROM productos INNER JOIN vendedores ON  productos.id_vendedor = vendedores.id_vendedor where id_categoria = $option");

            while ($row = mysqli_fetch_assoc($query)) {
            echo '<li><img src="img/food_3.jpg" class="property_img"/>
                    <span class="price">$'.$row['precio'].'</span>
                    <div class="property_details">
                    <h1>'.$row['nombre'].'</h1>
                    <p>'.$row['descripcion'].'</p>
                    <h3>'.$row['nombre_vendedor'].'</h3>
                    </div>
                  </li>';
            }
        }
      ?>
			</ul>
		</div>
	</section>

	<footer>
	</footer>
</body>
</html>