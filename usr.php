<?php
  include('session.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agora Virtual</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <style>
    .listings{
      min-height: calc(100vh - 250px);
    }
  </style>
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
  <section id="secUser">    
    <div id="welcome">
      <?php
        require 'connect.php';
          
        echo "<h4>Bienvenido: $usr </h4>";
      ?>
      <a href = "logout.php"><button>Clean Session</button></a>
    </div>
  </section>

  <section class="listings">
    <div class="wrapper">    
      <ul class="properties_list">   
      <?php
        $query = mysqli_query($link, "SELECT nombre, precio, descripcion, id_producto FROM productos WHERE id_vendedor = ". $id);
        while ($row = mysqli_fetch_assoc($query)) {
          echo '<li><img src="img/food_3.jpg" class="property_img"/>
                  <span class="price">$'.$row['precio'].'</span>
                  <div class="property_details">
                  <h1>'.$row['nombre'].'</h1>
                  <p>'.$row['descripcion'].'</p>
                  <h3>'.$row['nombre_vendedor'].'</h3>                  
                  <input type="button" value="Borrar" onclick="eliminarProd('.$row['id_producto'].')"> 
                  </div>
                </li>';
        }
      ?>       
      </ul>      
    </div>
  
    <div id="usrStatus">
      <form action="update.php" method="post">
        <!-- <p>Disponible <input type="checkbox" data-role="flipswitch" name="available" id="switch" value="1"></p> -->
        <h3>Disponible <input type="checkbox" data-role="flipswitch" name="available" id="switch" value="1"/></h3>
        <h3>Horario<br>
            <input type="time" name="schedule_b" value="07:00:00" max="16:00:00" min="07:00:00" step="1">
            a
            <input type="time" name="schedule_f" value="16:00:00" max="16:00:00" min="07:00:00" step="1">
        </h3>
        <input type="hidden" name="userid" id="userid" value=<?php if(isset($usr)){echo "$usr";}?>>
        <h3><input type="submit" data-inline="true" value="Hecho"/></h3>
      </form>
      <br/>
      <br/>
      <input type="button" value="Agregar Producto" onclick="send()">
    </div>
  </section>
	<footer>			
	</footer>
  
  <script>
    var xmlHttp = false;
        if (!xmlHttp && typeof XMLHttpRequest !== 'undefined') {
            xmlHttp = new XMLHttpRequest();
        }

    function eliminarProd(id_producto){
        var url = "http://127.0.0.1/~asanchez/AV/eliminar.php";
            xmlHttp.open("POST", url, true);
            xmlHttp.onreadystatechange = function deleted(){
                if (xmlHttp.readyState === 4) {
                    location.reload();
                }
            };
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("producto=" + id_producto);
        }
  </script>
</body>
</html>