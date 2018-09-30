<?php
   include("connect.php");   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      
      $sql = "SELECT id_vendedor, nombre_vendedor, disponibilidad FROM vendedores WHERE mail = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
				$id_ = $row["id_vendedor"];
				mysqli_query($link, "UPDATE vendedores SET disponibilidad = 1 WHERE id_vendedor = $id_");
				session_start();
				$_SESSION['valid'] = true;
				$_SESSION['id'] = time();
				$_SESSION['login_user'] = $myusername;
				$_SESSION['nombre_usr'] = $row["nombre_vendedor"];
				$_SESSION['id_usr'] = $row["id_vendedor"];
				
				header("location: usr.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
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
		<div class="container">
	 		<div id="cont_admin">
			 	<form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">      	              
					 <label>mail  :</label>
					 <input type="text" class="form-control" name="username" placeholder="admin@mail.com" required autofocus><br/>
					 <label>Password  :</label>
					 <input type="password" class="form-control" name="password" placeholder="admin" required><br/>
					 <br/>
					 <br/>
					 <div class="text-center">
							<button type="submit" name="login" class="btn btn-primary col-5 col-sm-5 col-md-5">Iniciar sesión</button>
							<a href="#"><button class="btn btn-primary col-5 col-sm-5 col-md-5">Registrarse</button></a>
						</div>
				</form>
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




