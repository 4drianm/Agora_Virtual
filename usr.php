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
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendor/main.css" rel="stylesheet">
  <script src="vendor/main.js"></script>
  <style>
    @media screen and (max-width: 992px) {	
	    .card-columns{
		    column-count:3;
      }
    }
    @media screen and (max-width: 576px) {
	    .card-columns{
		    column-count:2;
	    }
    }
    @media screen and (max-width: 400px) {
	    .card-columns{
	    	column-count:1;
      }
    }
  </style>
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

  <section>
      <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document" style="top:-10%;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Agregar producto</h5>        
          </div>
          <div class="modal-body">
            <form action="insertar.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label class="col-form-label">Producto:</label>
                <input type="text" class="form-control" name="product" requierd maxlength="50">
              </div>
              <div class="form-group">
                <label class="col-form-label">Descripción:</label>
                <textarea class="form-control" rows="2" name="description" maxlength="150"></textarea>
              </div>
              <div class="form-group">
                <label class="col-form-label">Categoria:</label>
                <br/>
                <select name="category" required>
                    <option>Elige una...</option>
                    <option value="1">Bebidas</option>
                    <option value="2">Comida</option>
                    <option value="3">Dulces</option>
                    <option value="4">Cigarros</option>
                    <option value="5">Postres</option>
                </select>

                <label class="col-form-label" style="margin-left:4%">Precio $</label>
                <input type="number" size="3" name="price" min="1" max="200" required style="max-width: 27%">
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" required>
                  <label class="custom-file-label" for="inputGroupFile04">Selecciona una imagen</label>
                </div>
              </div>
              <input type="hidden" name="userid" value='<?php echo "$id";?>' >
              <div class="modal-footer" style="margin-top:30px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container" style="margin-top:80px;margin-bottom:45px;">
    <div class="row">
      <div class="col-md-3 col-lg-2" style="margin-bottom:30px;">
        <?php echo "<h4>Bienvenido:<br/>$usr </h4><br/>"; ?>
        <button type="button" class="btn btn-primary w-65" data-toggle="modal" data-target="#exampleModalCenter">
          Agregar
        </button>
        <br/>
        <br/>
        <a href = "logout.php"><button type="button" class="btn btn-outline-danger w-50">Salir</button></a>
      </div>
      <div class="col-md-9 col-lg-10">
        <div class="card-columns">
          <?php
            $query = mysqli_query($link, "SELECT * FROM productos WHERE id_vendedor = ". $id);
            while ($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
              echo  '<div class="card">
                    <img class="card-img-top" src='.$row[6].' alt="Card image cap">
                    <div class="card-img-overlay text-center">
                      <h6 class="card-title">$'.$row[2].'</h6>
                    </div>
                    <div class="card-body">';
              echo utf8_encode("<h5 class=\"card-title\">$row[1]</h5>
                              <p class=\"card-text\">$row[3]</p> ");
              echo  '<button type="button" class="btn btn-danger btn-T text-right" value="Borrar" onclick="borrar('.$row[0].')" aria-label="Delete">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    </div>
                </div>';
            }
            mysqli_close($link);
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

</body>
</html>