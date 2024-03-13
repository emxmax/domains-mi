$(function() {
	 $('#add_precio_redgalar').submit(function(e){
		e.preventDefault();
		//var formData = new FormData($("#add_precio_redgalar")[0]);
	    var datos = $("#add_precio_redgalar").serialize();
		console.log(datos);
		if ( $(this).parsley().isValid() ) {
			$.ajax({
			  data: datos,
			  url:'?accion=newprecio',
			  type:'POST',
			  beforeSend: function(){
				//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
			  },
			  success:  function (response) {
				console.log(response);
				var res = response;
				if (res =='exito') {
					$.notify({
						title: "Exito: ",
						message: "Precio Registrado",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location='?accion=precios'", 2200);
				}
				else if (res =='existe'){
					$.notify({
						title: "Alto: ",
						message: " Distrito ya existe",
						icon: 'fa fa-info-circle' 
					},{
						type: "info"
					});
				}
				else{
					$.notify({
						title: "Error: ",
						message: "Usuario no registrado",
						icon: 'fa fa-check' 
					},{
						type: "danger"
					});
				}
			  }
			});
		}
	});
	
	$(document).on("click",".btn-eliminar-precio", function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		datos = {"id": id, "acc":3};
		var r = confirm("Eliminar Precio");
		if(r == true){
		
			$.ajax({
			  data: datos,
			  url:'?accion=precios',
			  type:'POST',
			  beforeSend: function(){
				//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
			  },
			  success:  function (response) {
				var res = response;
				if (res =='exito') {
					$.notify({
						title: "Exito: ",
						message: "El Precio ha sido eliminado",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location='?accion=precios'", 2200);
				}
				else{
					$.notify({
						title: "Error: ",
						message: "El Precio no ha sido eliminado!",
						icon: 'fa fa-close' 
					},{
						type: "danger"
					});
				}
			  }
			});
		}
	});
	
	$('#act_precio_redgalar').submit(function(e){
		e.preventDefault();
		//var formData = new FormData($("#add_precio_redgalar")[0]);
	    var datos = $("#act_precio_redgalar").serialize();
		console.log(datos);
		if ( $(this).parsley().isValid() ) {
			$.ajax({
			  data: datos,
			  url:'?accion=precios',
			  type:'POST',
			  beforeSend: function(){
				//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
			  },
			  success:  function (response) {
				console.log(response);
				var res = response;
				if (res =='exito') {
					$.notify({
						title: "Exito: ",
						message: "Precio Actualizado",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location=window.location", 2200);
				}
				else if (res =='existe'){
					$.notify({
						title: "Alto: ",
						message: " Distrito ya existe",
						icon: 'fa fa-info-circle' 
					},{
						type: "info"
					});
				}
				else{
					$.notify({
						title: "Error: ",
						message: "Precio no actualizado",
						icon: 'fa fa-check' 
					},{
						type: "danger"
					});
				}
			  }
			});
		}
	});
}); 