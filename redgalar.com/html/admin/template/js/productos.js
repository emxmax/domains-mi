$(function() {

	$('#sampleTable').DataTable();
	
	$(document).on("click",".btn-eliminar-user", function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		datos = {"id": id, "acc":3};
		var r = confirm("Desactivar Producto");
		if(r == true){
		
			$.ajax({
			  data: datos,
			  url:'?accion=productos',
			  type:'POST',
			  beforeSend: function(){
				//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
			  },
			  success:  function (response) {
				var res = response;
				if (res =='exito') {
					$.notify({
						title: "Exito: ",
						message: "El Producto ha sido inactivado",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location='?accion=productos'", 2200);
				}
				else{
					$.notify({
						title: "Error: ",
						message: "El Producto no ha sido desactivado!",
						icon: 'fa fa-close' 
					},{
						type: "danger"
					});
				}
			  }
			});
		}
	});
	
	$(document).on("click",".btn-activar-user", function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		datos = {"id": id, "acc":2};
		var r = confirm("Activar Productos");
		if(r == true){
		
			$.ajax({
			  data: datos,
			  url:'?accion=productos',
			  type:'POST',
			  beforeSend: function(){
				//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
			  },
			  success:  function (response) {
				var res = response;
				if (res =='exito') {
					$.notify({
						title: "Exito: ",
						message: "El producto ha sido activado!",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location='?accion=productos'", 2200);
				}
				else{
					$.notify({
						title: "Erro: ",
						message: "El producto no ha sido activado!",
						icon: 'fa fa-close' 
					},{
						type: "danger"
					});
				}
			  }
			});
		}
	});
}); 