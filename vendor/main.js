function show(){
  document.getElementById('sin_vendedores').style.visibility = "visible";
}

function whatsapp(numero){
  var dato = {
    "numero_vendedor" : numero,
    "action": "contactar"
  };
  $.ajax({
    data: dato,
    url: 'ajax_fun.php',
    type: 'post',
    success:function(response){
      window.location=response;
    }
  });
}

function borrar(producto){
  var dato = {
    "id_producto" : producto,
    "action": "borrar"
  };
  $.ajax({
    data: dato,
    url: 'ajax_fun.php',
    type: 'post',
    success:function(response){
      alert(response);
      location.reload();
    }
  });
}
