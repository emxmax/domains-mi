$(function() { 
    $('#login-form').submit(function(e) { 
        e.preventDefault();
		var datos = $("#login-form").serialize()
        if ( $(this).parsley().isValid() ) {
            $.ajax({
              data: datos,
              url:'login.php',
              type:'POST',
              beforeSend: function(){
                $(".alerta").html("<span class='text-log text-info'>Procesando ...</span>");
              },
              success:  function (response) {
                var res = response;
                if (res == 'I') {
                   $(".alerta").html("<span class='text-log text-danger'>Usuario Inactivo / comunicarse con admin</span>");
                }
				else if (res =='exito') {
                   $(".alerta").html("<span class='text-log text-success'>Exito, redireccionando...</span>");
                  setTimeout("window.location='?accion=index'", 2200);
                }
                else{
                  $(".alerta").html("<span class='text-log text-danger'>Usuario Invalido</span>");
                }
              }
            });    
        }
    });
}); 