<?php
  define('DB_SERVER', '127.0.0.1:3306');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_DATABASE', 'Agora');
  $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  
  if(!$link){
    die ('Error en la conexión'.mysql_error());
  }
?>