<?php
  include('session.php');
  include('connect.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agora Virtual</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/main.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/AgoraVirtual.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php?opcion=0">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?opcion=1">Bebidas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?opcion=2">Comida</a>
          </li>    
          <li class="nav-item">
            <a class="nav-link" href="index.php?opcion=3">Dulces</a>
          </li>    
          <li class="nav-item">
            <a class="nav-link" href="index.php?opcion=4">Cigarros</a>
          </li>    
          <li class="nav-item">
            <a class="nav-link" href="index.php?opcion=5">Postres</a>
          </li>        
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="usr.php" class="btn btn-outline-light btn-sm" role="button">Yo vendo</a>
          </li>
        </ul>
      </div>
    </div>  
  </nav>

  <div class="container" style="margin-top:80px;">
    <div class="row">
      <div class="col-md-3 col-lg-2">
        <?php echo "<h4>Bienvenido:<br/>$usr </h4>"; ?>
        <a href = "logout.php"><button type="button" class="btn btn-outline-danger w-50">Salir</button></a>
      </div>
      <div class="col-md-9 col-lg-10">
        <div class="row d-flex justify-content-around">
          <?php
            $query = mysqli_query($link, "SELECT nombre, precio, descripcion, id_producto FROM productos WHERE id_vendedor = ". $id);
            while ($row = mysqli_fetch_assoc($query)) {
              echo  '<div class="col-">
                  <div class="card">
                  <img class="card-img-top" src="img/food_1.jpg" alt="Card image cap">
                  <div class="card-img-overlay">
                    <h6 class="card-title">$'.$row['precio'].'</h6>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">'.$row['nombre'].'</h5>            
                    <p class="card-text">'.$row['descripcion'].'</p>
                    <input type="button" value="Borrar" onclick="eliminarProd('.$row['id_producto'].')">                    
                    <button type="button" class="btn btn-danger btn-T" value="Borrar" onclick="eliminarProd('.$row['id_producto'].')">
                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                    </div>
                </div></div>';
            }
          ?>
        </div>
      </div>
    </div>      
  </div>
  <footer class="py-3 bg-dark fixed-bottom">
  	<div class="container">
  	  <p class="m-0 text-center text-white"></p>
  	</div>
  </footer>
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
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