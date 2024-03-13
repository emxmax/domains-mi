function VistaFormulario(){
	var contendio = $("<div role='form'>");

	var formGrupo = $("<div class='form-group'>");
	var textoReferencial = $("<label>");
	textoReferencial.html("Correo");
	var lblCorreo = $("<input type = 'email' class='form-control' placeholder='Correo'>");
	formGrupo.append(textoReferencial);
	formGrupo.append(lblCorreo);
	contendio.append(formGrupo);

	formGrupo = $("<div class='form-group'>");
	textoReferencial = $("<label>");
	textoReferencial.html("Mensaje");
	var lblMensaje = $("<textarea class='form-control' placeholder='Mensaje'>");
	formGrupo.append(textoReferencial);
	formGrupo.append(lblMensaje);
	contendio.append(formGrupo);

	var ventana = new PopUpApp("Enviar un mensaje",contendio,function(){
		enviarMensaje();
	})
	ventana.setTextoSuccess("Enviar");
	function enviarMensaje(){
		var correo = lblCorreo.val();
		var mensaje = lblMensaje.val();
		var mensajeApp = {
			"correo":correo,
			"mensaje":mensaje
		}
		textoMensaje = $.toJSON(mensajeApp);
		var jqxhr = $.ajax( "http://gosucoders.com/git/gosu/reportesApp.php?correo="+correo+"&mensaje="+mensaje)
		//var jqxhr = $.ajax( "reportesApp.php?correo="+correo+"&mensaje="+mensaje)
		  	.done(function(evt) {
			    console.log("se envio mensaje",evt);
			    alert("¡Su mensaje fue enviado!");
		  	})
		  	.fail(function(evt) {
		    	//alert( "error" );
		    	//console.log("error",evt);
		    	mostrarError("formulario","Hubo un error al enviar el mensaje");
		  	})
		  	.always(function(evt) {
		    	//alert( "complete" );
		  	});
	}


// 	<form role="form">
//   <div class="form-group">
//     <label for="exampleInputEmail1">Email address</label>
//     <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
//   </div>
//   <div class="form-group">
//     <label for="exampleInputPassword1">Password</label>
//     <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
//   </div>
//   <div class="form-group">
//     <label for="exampleInputFile">File input</label>
//     <input type="file" id="exampleInputFile">
//     <p class="help-block">Example block-level help text here.</p>
//   </div>
//   <div class="checkbox">
//     <label>
//       <input type="checkbox"> Check me out
//     </label>
//   </div>
//   <button type="submit" class="btn btn-default">Submit</button>
// </form>
}