<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agora Virtual</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
  
  <div class="container" style="margin-top:80px;margin-bottom:45px;">
    <div class="card-columns">

      <?php
      include("connect.php");
      $option = $_GET["opcion"];
      
      if($option == 0 ){
        $query = mysqli_query($link, "SELECT * FROM productos INNER JOIN vendedores ON productos.id_vendedor = vendedores.id_vendedor WHERE disponibilidad = 1");
        if (mysqli_affected_rows($link) == 0) {          
          echo "<script>alert(\"No hay nadie vendiendo\")</script>";
        }
        while ($row = mysqli_fetch_array($query, MYSQL_NUM)) {
          echo  '<div class="card">
                <img class="card-img-top" src='.$row[6].' alt="Card image cap">
                <div class="card-img-overlay text-center">
                  <h6 class="card-title">$'.$row[2].'</h6>
                </div>
                <div class="card-body">';
          echo utf8_encode("<h5 class=\"card-title\">$row[1]</h5>
                          <p class=\"card-text\">$row[3]</p> ");                  
          echo '<p class="card-text">'.$row[8].'</p>
                </div>
              </div>';
        }                
      }else{
        $query = mysqli_query($link, "SELECT * FROM productos INNER JOIN vendedores ON  productos.id_vendedor = vendedores.id_vendedor WHERE id_categoria = $option AND disponibilidad = 1");
        if (mysqli_affected_rows($link) == 0) {          
          echo "<script>alert(\"No hay nadie vendiendo\")</script>";
        }
        while ($row = mysqli_fetch_array($query, MYSQL_NUM)) {
          echo  '<div class="card">
                <img class="card-img-top" src='.$row[6].' alt="Card image cap">
                <div class="card-img-overlay text-center">
                  <h6 class="card-title">$'.$row[2].'</h6>
                </div>
                <div class="card-body">';
          echo utf8_encode("<h5 class=\"card-title\">$row[1]</h5>
                          <p class=\"card-text\">$row[3]</p> ");                  
          echo '<p class="card-text">'.$row[8].'</p>
                </div>
              </div>';
          }
      }
      mysqli_close($link);
      ?>
    </div>
  </div>
  <footer class="py-3 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white"></p>
    </div>
  </footer>
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>