$(document).ready(function(){
   $("#formulario").validate({
  // Specify validation rules
    rules: {
      nombre: "required",
      apellidos: "required",
      telefono: "required",
      correo: "required",
      empresa: "required",
      ciudad: "required",
      autoriza: "required"
    },
    // Specify validation error messages
    messages: {
      nombre:"Ingresar nombre",
      
      apellidos: "ingresar apellido",
      
      telefono: "Ingresar teléfono",
      
      correo: "Ingresar correo electrónico",
      
      empresa: "Ingresar empresa",
      
      ciudad: "Ingresar ciudad",
      
      autoriza: "Falta autorizar"
     
    }
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
  });
  $("#enviar-datos").click(function(event) {
    /* Act on the event */
    if ($("#formulario").valid())
    {
      var formData = new FormData();
      datos = $("#formulario").serialize();
      console.log(datos);
      _url = "./controller/contacto/enviar.php";
      $.ajax({
          type:"POST",
          url:_url,
          data:datos,
          success: function(response){
              top.location.href = './gracias';
          }
      });
    }
    return false;
  });
});