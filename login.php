<?php
   include("connect.php");   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      
      $sql = "SELECT id_vendedor, nombre_vendedor FROM vendedores WHERE mail = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
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
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</head>
	<body>
	  <header>
	  	<div class="wrapper">
	  		<a href="#"><img src="img/AgoraVirtual.png" class="logo"/></a>
	  		<a href="#" class="hamburger"></a>
	  		<nav>
	  		  <ul>
	  		    <li><a href="index.php?opcion=0">Inicio</a></li> 
	  		    <li><a href="index.php?opcion=1">Bebidas</a></li>
	  		    <li><a href="index.php?opcion=2">Comida</a></li>
	  		    <li><a href="index.php?opcion=3">Dulces</a></li>
	  		    <li><a href="index.php?opcion=4">Postres</a></li>
	  		    <li><a href="index.php?opcion=5">Cigarros</a></li>
	  		  </ul>
	  			<a href="usr.php" class="login_btn">Yo Vendo</a>
	  		</nav>
	  	</div>
	  </header>
	  <section class="listings">
			<h2>Enter Username and Password</h2> 
      	<div class="container">      
      	  <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">      	              
      	     <label>mail  :</label><input type="text" class="form-control" name="username" placeholder="admin@mail.com" required autofocus><br/>
      	     <label>Password  :</label><input type="password" class="form-control" name="password" placeholder="admin" required><br/>
      	     <p><button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button></p>
      	  </form>
      	  <button><a href = "logout.php">Clean Session.</a></button>
      	</div>
	  </section>
		<footer>
			<p class="copyrights wrapper"></p>
		</footer>
	</body>
</html>




